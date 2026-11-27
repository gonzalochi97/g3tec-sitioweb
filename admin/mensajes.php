<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';
require_once '../includes/csrf.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verificar_csrf();
    $id = (int) $_POST['id'];

    if ($_POST['accion'] == 'responder' && trim($_POST['respuesta']) != '') {
        $stmt = $pdo->prepare("UPDATE mensajes SET respuesta = :respuesta, leido = 1, respondido_at = NOW()
                               WHERE id_mensaje = :id");
        $stmt->execute([':respuesta' => trim($_POST['respuesta']), ':id' => $id]);
    }

    if ($_POST['accion'] == 'leido') {
        $stmt = $pdo->prepare("UPDATE mensajes SET leido = 1 WHERE id_mensaje = :id");
        $stmt->execute([':id' => $id]);
    }

    header('Location: mensajes.php');
    exit;
}

$mensajes = $pdo->query("SELECT * FROM mensajes ORDER BY leido, created_at DESC")->fetchAll();

$raiz = '../';
$titulo_pagina = 'Panel - Mensajes';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Mensajes</h1>
      <p class="text-secondary">Lo que escriben desde Contacto. Si el cliente tiene cuenta, ve tu respuesta en Mi cuenta.</p>

      <?php if (empty($mensajes)): ?>
        <div class="g3-card p-4">Todavía no hay mensajes.</div>
      <?php endif; ?>

      <div class="d-grid gap-3">
        <?php foreach ($mensajes as $mensaje): ?>
          <div class="g3-card p-4">
            <div class="d-flex flex-wrap justify-content-between gap-2">
              <div>
                <h2 class="h6 fw-bold mb-0">
                  <?= htmlspecialchars($mensaje['nombre']) ?>
                  <?php if (!$mensaje['leido']): ?>
                    <span class="badge text-bg-danger">Nuevo</span>
                  <?php endif; ?>
                  <?php if (!$mensaje['id_usuario']): ?>
                    <span class="badge text-bg-secondary">Sin cuenta</span>
                  <?php endif; ?>
                </h2>
                <p class="small text-secondary mb-0">
                  <?= htmlspecialchars($mensaje['email']) ?> · <?= date('d/m/Y H:i', strtotime($mensaje['created_at'])) ?>
                </p>
              </div>
              <div class="d-flex gap-2 align-items-start">
                <a class="btn btn-sm btn-outline-secondary" href="mailto:<?= htmlspecialchars($mensaje['email']) ?>?subject=Respuesta de G3 Tec">
                  <i class="bi bi-envelope" aria-hidden="true"></i> Email
                </a>
                <?php if (!$mensaje['leido']): ?>
                  <form method="POST">
                    <?= campo_csrf() ?>
                    <input type="hidden" name="id" value="<?= $mensaje['id_mensaje'] ?>" />
                    <input type="hidden" name="accion" value="leido" />
                    <button class="btn btn-sm btn-outline-neon">Marcar leído</button>
                  </form>
                <?php endif; ?>
              </div>
            </div>

            <p class="my-3"><?= nl2br(htmlspecialchars($mensaje['mensaje'])) ?></p>

            <?php if ($mensaje['respuesta']): ?>
              <div class="border-start border-3 ps-3" style="border-color: var(--g3-neon) !important">
                <p class="small text-secondary mb-1">Respondido el <?= date('d/m/Y H:i', strtotime($mensaje['respondido_at'])) ?></p>
                <p class="mb-0"><?= nl2br(htmlspecialchars($mensaje['respuesta'])) ?></p>
              </div>
            <?php elseif ($mensaje['id_usuario']): ?>
              <form method="POST" class="d-grid gap-2">
                <?= campo_csrf() ?>
                <input type="hidden" name="id" value="<?= $mensaje['id_mensaje'] ?>" />
                <input type="hidden" name="accion" value="responder" />
                <label class="visually-hidden" for="respuesta<?= $mensaje['id_mensaje'] ?>">Respuesta</label>
                <textarea class="form-control" id="respuesta<?= $mensaje['id_mensaje'] ?>" name="respuesta" rows="2" placeholder="Escribí la respuesta" required></textarea>
                <div><button class="btn btn-sm btn-neon">Responder</button></div>
              </form>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </main>
<?php require_once '../includes/footer.php'; ?>
