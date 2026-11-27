<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';
require_once '../includes/csrf.php';

$roles = $pdo->query("SELECT * FROM roles ORDER BY id_rol")->fetchAll();
$ids_roles = array_column($roles, 'id_rol');

// Cambiar el rol de un usuario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verificar_csrf();

    $id_usuario = $_POST['id_usuario'];
    $id_rol = $_POST['id_rol'];

    // El admin no se puede sacar el rol a si mismo, asi no se queda afuera del panel
    if ($id_usuario != $_SESSION['usuario_id'] && in_array($id_rol, $ids_roles)) {
        $stmt = $pdo->prepare("UPDATE usuarios SET id_rol = :rol WHERE id_usuario = :id");
        $stmt->execute([':rol' => $id_rol, ':id' => $id_usuario]);
        header('Location: usuarios.php?ok=1');
        exit;
    }

    header('Location: usuarios.php');
    exit;
}

// Filtro por rol (Todos, Administrador, Cliente o Mayorista)
$filtro = $_GET['rol'] ?? '';

$sql = "SELECT usuarios.id_usuario, usuarios.nombre, usuarios.apellido, usuarios.email,
               usuarios.id_rol, usuarios.created_at, roles.nombre AS rol
        FROM usuarios
        INNER JOIN roles ON usuarios.id_rol = roles.id_rol";

if (in_array($filtro, $ids_roles)) {
    $stmt = $pdo->prepare($sql . " WHERE usuarios.id_rol = :rol ORDER BY usuarios.created_at DESC");
    $stmt->execute([':rol' => $filtro]);
} else {
    $filtro = '';
    $stmt = $pdo->query($sql . " ORDER BY usuarios.created_at DESC");
}
$usuarios = $stmt->fetchAll();

$raiz = '../';
$titulo_pagina = 'Panel - Usuarios';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Usuarios</h1>
      <p class="text-secondary">Los que se registran en el sitio entran como clientes. Los mayoristas se aprueban desde Solicitudes mayoristas.</p>

      <?php if (isset($_GET['ok'])): ?>
        <div class="alert alert-success" role="status">Rol actualizado. El usuario lo ve la próxima vez que inicie sesión.</div>
      <?php endif; ?>

      <div class="d-flex flex-wrap gap-2 mb-3">
        <a class="btn btn-sm <?= $filtro == '' ? 'btn-neon' : 'btn-outline-neon' ?>" href="usuarios.php">Todos</a>
        <?php foreach ($roles as $rol): ?>
          <a class="btn btn-sm <?= $filtro == $rol['id_rol'] ? 'btn-neon' : 'btn-outline-neon' ?>"
            href="usuarios.php?rol=<?= $rol['id_rol'] ?>"><?= htmlspecialchars($rol['nombre']) ?></a>
        <?php endforeach; ?>
      </div>

      <div class="g3-card p-3 table-responsive">
        <table class="table align-middle mb-0">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Email</th>
              <th>Alta</th>
              <th class="text-end">Rol</th>
            </tr>
          </thead>
          <tbody>
            <?php if (empty($usuarios)): ?>
              <tr><td colspan="4" class="text-secondary">No hay usuarios con ese rol.</td></tr>
            <?php endif; ?>
            <?php foreach ($usuarios as $usuario): ?>
              <tr>
                <td><?= htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']) ?></td>
                <td><?= htmlspecialchars($usuario['email']) ?></td>
                <td><?= date('d/m/Y', strtotime($usuario['created_at'])) ?></td>
                <td class="text-end">
                  <?php if ($usuario['id_usuario'] == $_SESSION['usuario_id']): ?>
                    <span class="badge text-bg-secondary"><?= htmlspecialchars($usuario['rol']) ?> (vos)</span>
                  <?php else: ?>
                    <form method="POST" class="d-flex gap-2 justify-content-end">
                      <?= campo_csrf() ?>
                      <input type="hidden" name="id_usuario" value="<?= $usuario['id_usuario'] ?>" />
                      <select class="form-select form-select-sm w-auto" name="id_rol" aria-label="Rol">
                        <?php foreach ($roles as $rol): ?>
                          <option value="<?= $rol['id_rol'] ?>" <?= $rol['id_rol'] == $usuario['id_rol'] ? 'selected' : '' ?>><?= htmlspecialchars($rol['nombre']) ?></option>
                        <?php endforeach; ?>
                      </select>
                      <button class="btn btn-sm btn-outline-neon">Guardar</button>
                    </form>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </main>
<?php require_once '../includes/footer.php'; ?>
