<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';
require_once '../includes/csrf.php';
require_once '../includes/carrito.php';
require_once '../includes/estados.php';

// Cambiar el estado de un pedido (solo a un estado valido para su tipo)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verificar_csrf();

    $stmt = $pdo->prepare("SELECT tipo FROM pedidos WHERE id_pedido = :id");
    $stmt->execute([':id' => (int) $_POST['id_pedido']]);
    $pedido = $stmt->fetch();

    if ($pedido) {
        $validos = array_keys(pasos_pedido($pedido['tipo']));
        if ($pedido['tipo'] == 'especial') {
            $validos[] = 'rechazado';
        }

        if (in_array($_POST['estado'], $validos)) {
            $stmt = $pdo->prepare("UPDATE pedidos SET estado = :estado WHERE id_pedido = :id");
            $stmt->execute([':estado' => $_POST['estado'], ':id' => (int) $_POST['id_pedido']]);
        }
    }

    header('Location: pedidos.php');
    exit;
}

$sql = "SELECT pedidos.*, usuarios.nombre, usuarios.apellido, usuarios.email
        FROM pedidos
        INNER JOIN usuarios ON pedidos.id_usuario = usuarios.id_usuario
        ORDER BY pedidos.estado IN ('entregado', 'rechazado'), pedidos.fecha_pedido DESC";
$pedidos = $pdo->query($sql)->fetchAll();

$raiz = '../';
$titulo_pagina = 'Panel - Pedidos';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Pedidos</h1>
      <p class="text-secondary">Actualizá el estado para que el cliente siga su pedido desde Mi cuenta.</p>

      <?php if (empty($pedidos)): ?>
        <div class="g3-card p-4">Todavía no hay pedidos.</div>
      <?php else: ?>
        <div class="g3-card p-3 table-responsive">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th>N.º</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Tipo</th>
                <th class="text-end">Total</th>
                <th>Estado</th>
                <th class="text-end">Cambiar estado</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($pedidos as $pedido): ?>
                <?php $pasos = pasos_pedido($pedido['tipo']); ?>
                <tr>
                  <td><?= $pedido['id_pedido'] ?></td>
                  <td><?= date('d/m/Y', strtotime($pedido['fecha_pedido'])) ?></td>
                  <td>
                    <?= htmlspecialchars($pedido['nombre'] . ' ' . $pedido['apellido']) ?><br />
                    <span class="small text-secondary"><?= htmlspecialchars($pedido['email']) ?></span>
                  </td>
                  <td><?= $pedido['tipo'] == 'especial' ? 'Especial' : 'Minorista' ?></td>
                  <td class="text-end text-nowrap"><?= pesos($pedido['total']) ?></td>
                  <td style="min-width: 11rem"><?= barra_estado($pasos, $pedido['estado']) ?></td>
                  <td class="text-end">
                    <form method="POST" class="d-flex gap-2 justify-content-end">
                      <?= campo_csrf() ?>
                      <input type="hidden" name="id_pedido" value="<?= $pedido['id_pedido'] ?>" />
                      <label class="visually-hidden" for="estado<?= $pedido['id_pedido'] ?>">Estado del pedido <?= $pedido['id_pedido'] ?></label>
                      <select id="estado<?= $pedido['id_pedido'] ?>" name="estado" class="form-select form-select-sm" style="width: auto">
                        <?php foreach ($pasos as $clave => $texto): ?>
                          <option value="<?= $clave ?>" <?= $clave == $pedido['estado'] ? 'selected' : '' ?>><?= $texto ?></option>
                        <?php endforeach; ?>
                        <?php if ($pedido['tipo'] == 'especial'): ?>
                          <option value="rechazado" <?= $pedido['estado'] == 'rechazado' ? 'selected' : '' ?>>Rechazado</option>
                        <?php endif; ?>
                      </select>
                      <button type="submit" class="btn btn-sm btn-outline-neon">Guardar</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </main>
<?php require_once '../includes/footer.php'; ?>
