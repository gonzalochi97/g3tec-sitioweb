<?php
session_start();

require_once 'config/conexion.php';
require_once 'includes/csrf.php';

$errores = [];
$enviado = isset($_GET['enviado']);
$datos = ['nombre' => '', 'email' => '', 'mensaje' => ''];

// Si tiene sesion iniciada, completamos su nombre y email
if (isset($_SESSION['usuario_id'])) {
    $stmt = $pdo->prepare("SELECT nombre, apellido, email FROM usuarios WHERE id_usuario = :id");
    $stmt->execute([':id' => $_SESSION['usuario_id']]);
    $usuario = $stmt->fetch();
    $datos['nombre'] = $usuario['nombre'] . ' ' . $usuario['apellido'];
    $datos['email'] = $usuario['email'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verificar_csrf();

    foreach ($datos as $campo => $valor) {
        $datos[$campo] = trim($_POST[$campo] ?? '');
    }

    if (strlen($datos['nombre']) < 3) {
        $errores[] = 'Ingresá tu nombre.';
    }
    if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'Ingresá un email válido.';
    }
    if (strlen($datos['mensaje']) < 10) {
        $errores[] = 'El mensaje tiene que tener al menos 10 caracteres.';
    }

    if (empty($errores)) {
        $stmt = $pdo->prepare("INSERT INTO mensajes (id_usuario, nombre, email, mensaje)
                               VALUES (:usuario, :nombre, :email, :mensaje)");
        $stmt->execute([
            ':usuario' => $_SESSION['usuario_id'] ?? null,
            ':nombre' => $datos['nombre'],
            ':email' => $datos['email'],
            ':mensaje' => $datos['mensaje'],
        ]);

        header('Location: contacto.php?enviado=1#mensaje');
        exit;
    }
}

$titulo_pagina = "Contacto";
$descripcion_pagina = "Contacto, teléfono y ubicación de G3 Tec en Salta.";
$direccion = 'San Martín esquina Florida (Ex HR Maluf), Salta';
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contacto</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Contacto</p>
      <h1 class="display-6 fw-bold">Contacto</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Escribinos, llamanos o visitanos en nuestro local de Salta.
      </p>
      <div class="row g-4">
        <div class="col-lg-5 d-grid gap-3 align-content-start">
          <div class="g3-card p-3 d-flex gap-3">
            <span class="ico flex-shrink-0"><i class="bi bi-geo-alt" aria-hidden="true"></i></span>
            <div>
              <h2 class="h6 fw-bold mb-1">Local y depósito</h2>
              <p class="small mb-0"><?= $direccion ?></p>
              <p class="small text-secondary mb-0">Lun a Vie 9 a 18 h · Sáb 9 a 13 h</p>
            </div>
          </div>
          <div class="g3-card p-3">
            <p class="mb-1">
              <i class="bi bi-telephone text-neon" aria-hidden="true"></i> <?= APP_TELEFONO ?>
            </p>
            <p class="mb-0">
              <i class="bi bi-envelope text-neon" aria-hidden="true"></i>
              <a href="mailto:<?= APP_EMAIL ?>"><?= APP_EMAIL ?></a>
            </p>
          </div>
          <div class="g3-card p-3">
            <h2 class="h6 fw-bold mb-2">Seguinos</h2>
            <div class="d-flex gap-3 fs-4">
              <a href="#" aria-label="Instagram de <?= APP_NAME ?>"><i class="bi bi-instagram" aria-hidden="true"></i></a>
              <a href="#" aria-label="Facebook de <?= APP_NAME ?>"><i class="bi bi-facebook" aria-hidden="true"></i></a>
              <a href="#" aria-label="TikTok de <?= APP_NAME ?>"><i class="bi bi-tiktok" aria-hidden="true"></i></a>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <iframe
            class="w-100 rounded-4 border mb-3"
            height="300"
            src="https://www.google.com/maps?q=<?= urlencode('San Martín y Florida, Salta, Argentina') ?>&output=embed"
            title="Mapa: <?= $direccion ?>"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"
          ></iframe>
          <?php if ($enviado): ?>
            <div id="mensaje" class="g3-card p-4">
              <h2 class="h5 fw-bold">¡Mensaje enviado!</h2>
              <p class="mb-0">
                Te respondemos a la brevedad.
                <?php if (isset($_SESSION['usuario_id'])): ?>
                  Vas a ver la respuesta en <a href="cuenta.php">Mi cuenta</a>.
                <?php else: ?>
                  Te llega la respuesta por email.
                <?php endif; ?>
              </p>
            </div>
          <?php else: ?>
          <form id="mensaje" class="g3-card p-4 row g-3" method="POST" action="contacto.php#mensaje">
            <?= campo_csrf() ?>
            <?php if (!empty($errores)): ?>
              <div class="alert alert-danger mb-0" role="alert">
                <?php foreach ($errores as $error): ?>
                  <div><?= htmlspecialchars($error) ?></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <div class="col-md-6">
              <label for="cnombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="cnombre" name="nombre" placeholder="Juan Pérez"
                autocomplete="name" value="<?= htmlspecialchars($datos['nombre']) ?>" required />
            </div>
            <div class="col-md-6">
              <label for="cemail" class="form-label">Email</label>
              <input type="email" class="form-control" id="cemail" name="email" placeholder="tu@email.com"
                autocomplete="email" value="<?= htmlspecialchars($datos['email']) ?>" required />
            </div>
            <div class="col-12">
              <label for="cmensaje" class="form-label">Mensaje</label>
              <textarea class="form-control" id="cmensaje" name="mensaje" rows="4" required><?= htmlspecialchars($datos['mensaje']) ?></textarea>
            </div>
            <div class="col-12">
              <button class="btn btn-neon" type="submit">Enviar mensaje</button>
            </div>
          </form>
          <?php endif; ?>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
