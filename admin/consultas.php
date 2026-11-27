<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';
require_once '../includes/csrf.php';

// Marcar una consulta o un presupuesto como respondido
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verificar_csrf();
    $id = (int) $_POST['id'];

    if ($_POST['tipo'] == 'consulta') {
        $stmt = $pdo->prepare("UPDATE consultas_reparacion SET estado = 'respondida' WHERE id_consulta = :id");
        $stmt->execute([':id' => $id]);
    }
    if ($_POST['tipo'] == 'presupuesto') {
        $stmt = $pdo->prepare("UPDATE presupuestos SET estado = 'respondido' WHERE id_presupuesto = :id");
        $stmt->execute([':id' => $id]);
    }

    header('Location: consultas.php');
    exit;
}

$consultas = $pdo->query("SELECT * FROM consultas_reparacion
                          ORDER BY estado = 'pendiente' DESC, created_at DESC")->fetchAll();
$presupuestos = $pdo->query("SELECT * FROM presupuestos
                             ORDER BY estado = 'pendiente' DESC, created_at DESC")->fetchAll();

$raiz = '../';
$titulo_pagina = 'Panel - Consultas y presupuestos';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Consultas y presupuestos</h1>

      <h2 class="h4 fw-bold mt-4">Consultas de reparación</h2>
      <?php if (empty($consultas)): ?>
        <div class="g3-card p-4">Todavía no hay consultas.</div>
      <?php else: ?>
        <div class="g3-card p-3 table-responsive">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Equipo</th>
                <th>Falla</th>
                <th>Contacto</th>
                <th>Estado</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($consultas as $consulta): ?>
                <tr>
                  <td><?= $consulta['id_consulta'] ?></td>
                  <td><?= date('d/m/Y', strtotime($consulta['created_at'])) ?></td>
                  <td>
                    <?= htmlspecialchars($consulta['tipo_equipo']) ?><br />
                    <span class="small text-secondary"><?= htmlspecialchars($consulta['marca'] . ' ' . $consulta['modelo']) ?>
                      <?= $consulta['garantia'] ? '· En garantía' : '' ?></span>
                  </td>
                  <td class="small"><?= nl2br(htmlspecialchars($consulta['falla'])) ?></td>
                  <td>
                    <?= htmlspecialchars($consulta['nombre']) ?><br />
                    <span class="small text-secondary"><?= htmlspecialchars($consulta['contacto']) ?></span>
                  </td>
                  <td>
                    <span class="badge <?= $consulta['estado'] == 'pendiente' ? 'text-bg-warning' : 'text-bg-success' ?>"><?= ucfirst($consulta['estado']) ?></span>
                  </td>
                  <td class="text-end">
                    <?php if ($consulta['estado'] == 'pendiente'): ?>
                      <form method="POST">
                        <?= campo_csrf() ?>
                        <input type="hidden" name="tipo" value="consulta" />
                        <input type="hidden" name="id" value="<?= $consulta['id_consulta'] ?>" />
                        <button class="btn btn-sm btn-outline-success">Marcar respondida</button>
                      </form>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>

      <h2 class="h4 fw-bold mt-5">Pedidos de presupuesto</h2>
      <?php if (empty($presupuestos)): ?>
        <div class="g3-card p-4">Todavía no hay pedidos de presupuesto.</div>
      <?php else: ?>
        <div class="g3-card p-3 table-responsive">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Empresa</th>
                <th>Productos</th>
                <th>Entrega / Pago</th>
                <th>Estado</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($presupuestos as $presupuesto): ?>
                <tr>
                  <td><?= $presupuesto['id_presupuesto'] ?></td>
                  <td><?= date('d/m/Y', strtotime($presupuesto['created_at'])) ?></td>
                  <td>
                    <?= htmlspecialchars($presupuesto['empresa']) ?><br />
                    <span class="small text-secondary"><?= htmlspecialchars($presupuesto['email']) ?> · <?= htmlspecialchars($presupuesto['telefono']) ?></span>
                  </td>
                  <td class="small"><?= nl2br(htmlspecialchars($presupuesto['productos'])) ?></td>
                  <td class="small"><?= htmlspecialchars($presupuesto['plazo']) ?><br /><?= htmlspecialchars($presupuesto['forma_pago']) ?></td>
                  <td>
                    <span class="badge <?= $presupuesto['estado'] == 'pendiente' ? 'text-bg-warning' : 'text-bg-success' ?>"><?= ucfirst($presupuesto['estado']) ?></span>
                  </td>
                  <td class="text-end">
                    <?php if ($presupuesto['estado'] == 'pendiente'): ?>
                      <form method="POST">
                        <?= campo_csrf() ?>
                        <input type="hidden" name="tipo" value="presupuesto" />
                        <input type="hidden" name="id" value="<?= $presupuesto['id_presupuesto'] ?>" />
                        <button class="btn btn-sm btn-outline-success">Marcar respondido</button>
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
