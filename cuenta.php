<?php
session_start();

// Si no inicio sesion, lo mandamos a ingresar
if (!isset($_SESSION['usuario_id'])) {
    header('Location: auth/login.php');
    exit;
}

require_once 'config/conexion.php';

$sql = "SELECT usuarios.nombre, usuarios.apellido, usuarios.email, roles.nombre AS rol
        FROM usuarios
        INNER JOIN roles ON usuarios.id_rol = roles.id_rol
        WHERE usuarios.id_usuario = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $_SESSION['usuario_id']]);
$usuario = $stmt->fetch();

// Ultima solicitud mayorista del usuario (si tiene)
$stmt = $pdo->prepare("SELECT estado FROM solicitudes_mayoristas
                       WHERE id_usuario = :id ORDER BY created_at DESC LIMIT 1");
$stmt->execute([':id' => $_SESSION['usuario_id']]);
$solicitud = $stmt->fetch();

$stmt = $pdo->prepare("SELECT pedidos.id_pedido, pedidos.fecha_pedido, pedidos.total, SUM(detalle_pedidos.cantidad) AS unidades
                       FROM pedidos
                       INNER JOIN detalle_pedidos ON pedidos.id_pedido = detalle_pedidos.id_pedido
                       WHERE pedidos.id_usuario = :id
                       GROUP BY pedidos.id_pedido
                       ORDER BY pedidos.fecha_pedido DESC");
$stmt->execute([':id' => $_SESSION['usuario_id']]);
$pedidos = $stmt->fetchAll();

$titulo_pagina = "Mi cuenta";
$descripcion_pagina = "Datos de tu cuenta en G3 Tec.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Mi cuenta</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Usuario</p>
      <h1 class="display-6 fw-bold">Hola, <?= htmlspecialchars($usuario['nombre']) ?></h1>
      <?php if (isset($_GET['solicitud'])): ?>
        <div class="alert alert-success" role="status">
          Recibimos tu solicitud mayorista. La revisamos en menos de 24 h hábiles.
        </div>
      <?php endif; ?>
      <?php if (isset($_GET['error']) && $_GET['error'] == 'sin_permiso'): ?>
        <div class="alert alert-warning" role="alert">Esa sección es solo para administradores.</div>
      <?php endif; ?>
      <div class="row g-4">
        <div class="col-lg-6">
          <div class="g3-card p-4 h-100">
            <h2 class="h4 fw-bold">Tus datos</h2>
            <dl class="row mb-0">
              <dt class="col-sm-4">Nombre</dt>
              <dd class="col-sm-8"><?= htmlspecialchars($usuario['nombre'] . ' ' . $usuario['apellido']) ?></dd>
              <dt class="col-sm-4">Email</dt>
              <dd class="col-sm-8"><?= htmlspecialchars($usuario['email']) ?></dd>
              <dt class="col-sm-4">Tipo de cuenta</dt>
              <dd class="col-sm-8"><?= htmlspecialchars($usuario['rol']) ?></dd>
              <?php if ($solicitud && $usuario['rol'] != 'Mayorista'): ?>
                <dt class="col-sm-4">Solicitud mayorista</dt>
                <dd class="col-sm-8"><?= ucfirst($solicitud['estado']) ?></dd>
              <?php endif; ?>
            </dl>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="g3-card p-4 h-100 d-grid gap-2 align-content-start">
            <h2 class="h4 fw-bold">Accesos</h2>
            <?php if ($_SESSION['rol'] == 1): ?>
              <a class="btn btn-neon" href="admin/index.php">Ir al panel de administrador</a>
            <?php endif; ?>
            <?php if ($usuario['rol'] == 'Cliente' && (!$solicitud || $solicitud['estado'] == 'rechazada')): ?>
              <a class="btn btn-outline-neon" href="registro.php">Solicitar cuenta mayorista</a>
            <?php endif; ?>
            <a class="btn btn-outline-neon" href="catalogo.php">Ver el catálogo</a>
            <a class="btn btn-outline-neon" href="carrito.php">Ver mi carrito</a>
            <a class="btn btn-outline-secondary" href="auth/logout.php">Cerrar sesión</a>
          </div>
        </div>
      </div>
      <div class="g3-card p-4 mt-4">
        <h2 class="h4 fw-bold">Mis pedidos</h2>
        <?php if (count($pedidos) == 0): ?>
          <p class="text-secondary mb-0">Todavía no hiciste pedidos.</p>
        <?php else: ?>
          <div class="table-responsive">
            <table class="table align-middle mb-0">
              <thead>
                <tr>
                  <th>N.º</th>
                  <th>Fecha</th>
                  <th class="text-end">Unidades</th>
                  <th class="text-end">Total</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                  <tr>
                    <td><?= $pedido['id_pedido'] ?></td>
                    <td><?= date('d/m/Y H:i', strtotime($pedido['fecha_pedido'])) ?></td>
                    <td class="text-end"><?= $pedido['unidades'] ?></td>
                    <td class="text-end">$ <?= number_format($pedido['total'], 0, ',', '.') ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
