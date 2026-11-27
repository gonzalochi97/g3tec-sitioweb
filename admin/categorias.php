<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';

$error = '';
$editando = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $accion = $_POST['accion'];
    $id_categoria = $_POST['id_categoria'] ?? 0;
    $nombre = trim($_POST['nombre'] ?? '');

    if ($accion == 'eliminar') {
        // No dejamos borrar una categoria que todavia tiene productos
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM productos WHERE id_categoria = :id");
        $stmt->execute([':id' => $id_categoria]);

        if ($stmt->fetchColumn() > 0) {
            header('Location: categorias.php?error=con_productos');
            exit;
        }

        $stmt = $pdo->prepare("DELETE FROM categorias WHERE id_categoria = :id");
        $stmt->execute([':id' => $id_categoria]);
        header('Location: categorias.php?ok=eliminada');
        exit;
    }

    if ($nombre == '') {
        $error = 'Escribí el nombre de la categoría.';
    } elseif (strlen($nombre) > 100) {
        $error = 'El nombre puede tener hasta 100 caracteres.';
    } else {
        // Que no haya dos categorias con el mismo nombre
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM categorias WHERE nombre = :nombre AND id_categoria != :id");
        $stmt->execute([':nombre' => $nombre, ':id' => $id_categoria]);

        if ($stmt->fetchColumn() > 0) {
            $error = 'Ya existe una categoría con ese nombre.';
        }
    }

    if ($error == '' && $accion == 'crear') {
        $stmt = $pdo->prepare("INSERT INTO categorias (nombre) VALUES (:nombre)");
        $stmt->execute([':nombre' => $nombre]);
        header('Location: categorias.php?ok=creada');
        exit;
    }

    if ($error == '' && $accion == 'editar') {
        $stmt = $pdo->prepare("UPDATE categorias SET nombre = :nombre WHERE id_categoria = :id");
        $stmt->execute([':nombre' => $nombre, ':id' => $id_categoria]);
        header('Location: categorias.php?ok=editada');
        exit;
    }

    // Si hubo un error al editar, el formulario sigue en modo edicion
    if ($accion == 'editar') {
        $editando = ['id_categoria' => $id_categoria, 'nombre' => $nombre];
    }
}

if (isset($_GET['editar'])) {
    $stmt = $pdo->prepare("SELECT * FROM categorias WHERE id_categoria = :id");
    $stmt->execute([':id' => $_GET['editar']]);
    $editando = $stmt->fetch();
}

$sql = "SELECT categorias.id_categoria, categorias.nombre, COUNT(productos.id_producto) AS cantidad
        FROM categorias
        LEFT JOIN productos ON productos.id_categoria = categorias.id_categoria
        GROUP BY categorias.id_categoria, categorias.nombre
        ORDER BY categorias.nombre";
$categorias = $pdo->query($sql)->fetchAll();

$avisos = ['creada' => 'Categoría agregada.', 'editada' => 'Cambios guardados.', 'eliminada' => 'Categoría eliminada.'];

$raiz = '../';
$titulo_pagina = 'Panel - Categorías';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Categorías</h1>
      <p class="text-secondary">Las categorías se usan al cargar productos y para ordenar el catálogo.</p>

      <?php if (isset($_GET['ok']) && isset($avisos[$_GET['ok']])): ?>
        <div class="alert alert-success" role="status"><?= $avisos[$_GET['ok']] ?></div>
      <?php endif; ?>
      <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger" role="alert">No se puede eliminar una categoría que tiene productos. Primero cambiales la categoría a esos productos.</div>
      <?php endif; ?>

      <div class="row g-4">
        <div class="col-lg-4">
          <form method="POST" class="g3-card p-4">
            <h2 class="h5 fw-bold"><?= $editando ? 'Editar categoría' : 'Nueva categoría' ?></h2>
            <?php if ($error): ?>
              <div class="alert alert-danger py-2" role="alert"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
            <label class="form-label" for="nombre">Nombre</label>
            <input class="form-control mb-3" id="nombre" name="nombre" maxlength="100" required
              value="<?= htmlspecialchars($editando['nombre'] ?? '') ?>" />
            <?php if ($editando): ?>
              <input type="hidden" name="id_categoria" value="<?= htmlspecialchars($editando['id_categoria']) ?>" />
              <button class="btn btn-neon" name="accion" value="editar">Guardar cambios</button>
              <a class="btn btn-outline-secondary" href="categorias.php">Cancelar</a>
            <?php else: ?>
              <button class="btn btn-neon" name="accion" value="crear"><i class="bi bi-plus-lg" aria-hidden="true"></i> Agregar</button>
            <?php endif; ?>
          </form>
        </div>

        <div class="col-lg-8">
          <div class="g3-card p-3 table-responsive">
            <table class="table align-middle mb-0">
              <thead>
                <tr>
                  <th>Nombre</th>
                  <th class="text-end">Productos</th>
                  <th class="text-end">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categorias as $categoria): ?>
                  <tr>
                    <td><?= htmlspecialchars($categoria['nombre']) ?></td>
                    <td class="text-end"><?= $categoria['cantidad'] ?></td>
                    <td class="text-end">
                      <form method="POST" class="d-flex gap-2 justify-content-end"
                        onsubmit="return confirm('¿Eliminar esta categoría?')">
                        <a class="btn btn-sm btn-outline-neon" href="categorias.php?editar=<?= $categoria['id_categoria'] ?>">Editar</a>
                        <input type="hidden" name="id_categoria" value="<?= $categoria['id_categoria'] ?>" />
                        <button class="btn btn-sm btn-outline-danger" name="accion" value="eliminar"
                          <?= $categoria['cantidad'] > 0 ? 'disabled title="Tiene productos"' : '' ?>>Eliminar</button>
                      </form>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </main>
<?php require_once '../includes/footer.php'; ?>
