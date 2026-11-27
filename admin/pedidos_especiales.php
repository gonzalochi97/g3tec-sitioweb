<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';
require_once '../includes/csrf.php';
require_once '../includes/carrito.php';

// Aprobar o rechazar un pedido especial. No modifica el stock de la tienda
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verificar_csrf();
    $estado = $_POST['accion'] == 'aprobar' ? 'aprobado' : 'rechazado';

    $stmt = $pdo->prepare("UPDATE pedidos SET estado = :estado
                           WHERE id_pedido = :id AND tipo = 'especial' AND estado = 'pendiente'");
    $stmt->execute([':estado' => $estado, ':id' => (int) $_POST['id_pedido']]);

    header('Location: pedidos_especiales.php');
    exit;
}

$sql = "SELECT pedidos.*, usuarios.nombre, usuarios.apellido, usuarios.email
        FROM pedidos
        INNER JOIN usuarios ON pedidos.id_usuario = usuarios.id_usuario
        WHERE pedidos.tipo = 'especial'
        ORDER BY pedidos.estado = 'pendiente' DESC, pedidos.fecha_pedido DESC";
$pedidos = $pdo->query($sql)->fetchAll();

$detalle = $pdo->prepare("SELECT detalle_pedidos.cantidad, detalle_pedidos.precio_unitario, productos.nombre
                          FROM detalle_pedidos
                          INNER JOIN productos ON detalle_pedidos.id_producto = productos.id_producto
                          WHERE detalle_pedidos.id_pedido = :id");

$colores = ['pendiente' => 'text-bg-warning', 'aprobado' => 'text-bg-success', 'rechazado' => 'text-bg-secondary'];

$raiz = '../';
$titulo_pagina = 'Panel - Pedidos especiales';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Pedidos especiales</h1>
      <p class="text-secondary">Pedidos de mayoristas. No descuentan el stock de la tienda.</p>

      <?php if (empty($pedidos)): ?>
        <div class="g3-card p-4">Todavía no hay pedidos especiales.</div>
      <?php else: ?>
        <div class="g3-card p-3 table-responsive">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th>N.º</th>
                <th>Fecha</th>
                <th>Mayorista</th>
                <th>Productos</th>
                <th class="text-end">Total</th>
                <th>Estado</th>
                <th class="text-end">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pedidos as $pedido): ?>
                <?php $detalle->execute([':id' => $pedido['id_pedido']]); ?>
                <tr>
                  <td><?= $pedido['id_pedido'] ?></td>
                  <td><?= date('d/m/Y', strtotime($pedido['fecha_pedido'])) ?></td>
                  <td>
                    <?= htmlspecialchars($pedido['nombre'] . ' ' . $pedido['apellido']) ?><br />
                    <span class="small text-secondary"><?= htmlspecialchars($pedido['email']) ?></span>
                  </td>
                  <td class="small">
                    <?php foreach ($detalle->fetchAll() as $linea): ?>
                      <div><?= $linea['cantidad'] ?> u · <?= htmlspecialchars($linea['nombre']) ?> (<?= pesos($linea['precio_unitario']) ?> c/u)</div>
                    <?php endforeach; ?>
                  </td>
                  <td class="text-end text-nowrap"><?= pesos($pedido['total']) ?></td>
                  <td><span class="badge <?= $colores[$pedido['estado']] ?>"><?= ucfirst($pedido['estado']) ?></span></td>
                  <td class="text-end">
                    <?php if ($pedido['estado'] == 'pendiente'): ?>
                      <form method="POST" class="d-flex gap-2 justify-content-end">
                        <?= campo_csrf() ?>
                        <input type="hidden" name="id_pedido" value="<?= $pedido['id_pedido'] ?>" />
                        <button class="btn btn-sm btn-outline-success" name="accion" value="aprobar">Aprobar</button>
                        <button class="btn btn-sm btn-outline-danger" name="accion" value="rechazar">Rechazar</button>
                      </form>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </main>
<?php require_once '../includes/footer.php'; ?>
