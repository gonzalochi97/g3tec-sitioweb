<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';

// Aprobar o rechazar una solicitud (llega por POST desde los botones de la tabla)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_solicitud = $_POST['id_solicitud'];
    $accion = $_POST['accion'];

    $stmt = $pdo->prepare("SELECT id_usuario FROM solicitudes_mayoristas WHERE id_solicitud = :id");
    $stmt->execute([':id' => $id_solicitud]);
    $solicitud = $stmt->fetch();

    if ($solicitud && $accion == 'aprobar') {
        $stmt = $pdo->prepare("UPDATE solicitudes_mayoristas SET estado = 'aprobada' WHERE id_solicitud = :id");
        $stmt->execute([':id' => $id_solicitud]);

        // El usuario pasa a tener el rol Mayorista
        $stmt = $pdo->prepare("UPDATE usuarios SET id_rol = 3 WHERE id_usuario = :id");
        $stmt->execute([':id' => $solicitud['id_usuario']]);
    }

    if ($solicitud && $accion == 'rechazar') {
        $stmt = $pdo->prepare("UPDATE solicitudes_mayoristas SET estado = 'rechazada' WHERE id_solicitud = :id");
        $stmt->execute([':id' => $id_solicitud]);
    }

    header('Location: solicitudes.php');
    exit;
}

$sql = "SELECT solicitudes_mayoristas.*, usuarios.nombre, usuarios.apellido, usuarios.email
        FROM solicitudes_mayoristas
        INNER JOIN usuarios ON solicitudes_mayoristas.id_usuario = usuarios.id_usuario
        ORDER BY solicitudes_mayoristas.estado = 'pendiente' DESC, solicitudes_mayoristas.created_at DESC";
$solicitudes = $pdo->query($sql)->fetchAll();

$colores = ['pendiente' => 'text-bg-warning', 'aprobada' => 'text-bg-success', 'rechazada' => 'text-bg-secondary'];

$raiz = '../';
$titulo_pagina = 'Panel - Solicitudes mayoristas';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Solicitudes mayoristas</h1>
      <p class="text-secondary">Al aprobar una solicitud, la cuenta del cliente pasa a ser mayorista.</p>

      <?php if (empty($solicitudes)): ?>
        <div class="g3-card p-4">Todavía no hay solicitudes.</div>
      <?php else: ?>
        <div class="g3-card p-3 table-responsive">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th>Fecha</th>
                <th>Razón social</th>
                <th>CUIT</th>
                <th>Contacto</th>
                <th>Provincia / Rubro</th>
                <th>Estado</th>
                <th class="text-end">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($solicitudes as $solicitud): ?>
                <tr>
                  <td><?= date('d/m/Y', strtotime($solicitud['created_at'])) ?></td>
                  <td><?= htmlspecialchars($solicitud['razon_social']) ?></td>
                  <td class="text-nowrap"><?= htmlspecialchars($solicitud['cuit']) ?></td>
                  <td>
                    <?= htmlspecialchars($solicitud['nombre'] . ' ' . $solicitud['apellido']) ?><br />
                    <span class="small text-secondary"><?= htmlspecialchars($solicitud['email']) ?> · <?= htmlspecialchars($solicitud['telefono']) ?></span>
                  </td>
                  <td><?= htmlspecialchars($solicitud['provincia']) ?><br />
                    <span class="small text-secondary"><?= htmlspecialchars($solicitud['rubro']) ?></span></td>
                  <td><span class="badge <?= $colores[$solicitud['estado']] ?>"><?= ucfirst($solicitud['estado']) ?></span></td>
                  <td class="text-end">
                    <?php if ($solicitud['estado'] == 'pendiente'): ?>
                      <form method="POST" class="d-flex gap-2 justify-content-end">
                        <input type="hidden" name="id_solicitud" value="<?= $solicitud['id_solicitud'] ?>" />
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
