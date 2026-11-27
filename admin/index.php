<?php

require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';
require_once '../includes/csrf.php';

$sql = "SELECT productos.*, categorias.nombre AS categoria
        FROM productos
        LEFT JOIN categorias ON productos.id_categoria = categorias.id_categoria
        ORDER BY productos.id_producto";
$stmt = $pdo->query($sql);
$productos = $stmt->fetchAll();

$raiz = '../';
$titulo_pagina = 'Panel - Productos';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <h1 class="display-6 fw-bold mb-0">Productos</h1>
        <a class="btn btn-neon" href="crear.php"><i class="bi bi-plus-lg" aria-hidden="true"></i> Agregar producto</a>
      </div>
      <p class="text-secondary mt-2">Bienvenido, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>. Hay <?= count($productos) ?> productos cargados.</p>

      <?php if (isset($_GET['ok'])): ?>
        <div class="alert alert-success" role="status">
          <?php if ($_GET['ok'] == 'creado'): ?>Producto agregado.<?php endif; ?>
          <?php if ($_GET['ok'] == 'editado'): ?>Cambios guardados.<?php endif; ?>
          <?php if ($_GET['ok'] == 'eliminado'): ?>Producto eliminado.<?php endif; ?>
        </div>
      <?php endif; ?>

      <div class="g3-card p-3 table-responsive">
        <table class="table align-middle mb-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Categoría</th>
              <th class="text-end">Precio</th>
              <th class="text-end">Oferta</th>
              <th class="text-end">Stock</th>
              <th class="text-end">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($productos as $producto): ?>
              <tr>
                <td><?= htmlspecialchars($producto['id_producto']) ?></td>
                <td><?= htmlspecialchars($producto['nombre']) ?></td>
                <td><?= htmlspecialchars($producto['categoria'] ?? '-') ?></td>
                <td class="text-end">$ <?= number_format($producto['precio'], 0, ',', '.') ?></td>
                <td class="text-end"><?= $producto['precio_oferta'] !== null ? '$ ' . number_format($producto['precio_oferta'], 0, ',', '.') : '-' ?></td>
                <td class="text-end"><?= htmlspecialchars($producto['stock']) ?></td>
                <td class="text-end">
                  <a class="btn btn-sm btn-outline-neon" href="editar.php?id=<?= $producto['id_producto'] ?>">Editar</a>
                  <form method="POST" action="eliminar.php" class="d-inline"
                    onsubmit="return confirm('¿Eliminar este producto?')">
                    <?= campo_csrf() ?>
                    <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>" />
                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
<?php require_once '../includes/footer.php'; ?>
