<?php
$titulo_pagina = "Contacto y sucursales";
$descripcion_pagina = "Contacto, teléfonos y sucursales de G3 Tec en Salta.";
require_once 'includes/funciones.php';

$nombre = '';
$email = '';
$mensaje = '';
$errores = [];
$enviado = false;

// El formulario se procesa solo cuando llega por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = isset($_POST['nombre']) ? limpiar($_POST['nombre']) : '';
    $email = isset($_POST['email']) ? limpiar($_POST['email']) : '';
    $mensaje = isset($_POST['mensaje']) ? limpiar($_POST['mensaje']) : '';

    if (empty($nombre)) {
        $errores['nombre'] = 'Ingresá tu nombre.';
    } elseif (strlen($nombre) < 3) {
        $errores['nombre'] = 'El nombre debe tener al menos 3 letras.';
    }

    if (empty($email)) {
        $errores['email'] = 'Ingresá tu email.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El email no tiene un formato válido (ej: nombre@correo.com).';
    }

    if (empty($mensaje)) {
        $errores['mensaje'] = 'Escribí tu mensaje.';
    } elseif (strlen($mensaje) < 10) {
        $errores['mensaje'] = 'El mensaje debe tener al menos 10 caracteres.';
    }

    if (count($errores) == 0) {
        $enviado = true;
        $nombre_enviado = $nombre;
        // Se vacian los campos para que el formulario quede limpio
        $nombre = '';
        $email = '';
        $mensaje = '';
    }
}

require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Contacto / Sucursales</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Contacto</p>
      <h1 class="display-6 fw-bold">Contacto y sucursales</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Escribinos o visitanos en cualquiera de nuestras sucursales de Salta.
      </p>
      <div class="row g-4">
        <div class="col-lg-5 d-grid gap-3">
          <div class="g3-card p-3 d-flex gap-3">
            <span class="ico flex-shrink-0"><i class="bi bi-geo-alt" aria-hidden="true"></i></span>
            <div>
              <h2 class="h6 fw-bold mb-1">Casa central</h2>
              <p class="small mb-0">Av. Belgrano 1234, Salta Capital</p>
              <p class="small text-secondary mb-0">Lun a Vie 9 a 18 h · Sáb 9 a 13 h</p>
            </div>
          </div>
          <div class="g3-card p-3 d-flex gap-3">
            <span class="ico flex-shrink-0"><i class="bi bi-geo-alt" aria-hidden="true"></i></span>
            <div>
              <h2 class="h6 fw-bold mb-1">Sucursal Norte</h2>
              <p class="small mb-0">Av. Bolivia 4500, Salta</p>
              <p class="small text-secondary mb-0">Lun a Vie 9 a 18 h</p>
            </div>
          </div>
          <div class="g3-card p-3 d-flex gap-3">
            <span class="ico flex-shrink-0"><i class="bi bi-geo-alt" aria-hidden="true"></i></span>
            <div>
              <h2 class="h6 fw-bold mb-1">Depósito mayorista</h2>
              <p class="small mb-0">Parque Industrial, Salta</p>
              <p class="small text-secondary mb-0">Retiro de pedidos mayoristas</p>
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
        </div>
        <div class="col-lg-7">
          <div
            class="map-ph d-grid place-items-center mb-3 text-center p-5"
            role="img"
            aria-label="Mapa de ejemplo con las sucursales de Salta"
          >
            <span class="text-secondary align-self-center">Mapa de sucursales (ejemplo)</span>
          </div>
          <?php if ($enviado): ?>
            <div class="alert alert-success" role="status">
              <i class="bi bi-check-circle" aria-hidden="true"></i>
              ¡Gracias, <?= $nombre_enviado ?>! Recibimos tu mensaje y te respondemos a la brevedad.
            </div>
          <?php elseif (count($errores) > 0): ?>
            <div class="alert alert-danger" role="alert">
              Revisá los campos marcados en rojo y volvé a enviar el formulario.
            </div>
          <?php endif; ?>
          <form class="g3-card p-4 row g-3" action="contacto.php" method="post" novalidate>
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control <?= isset($errores['nombre']) ? 'is-invalid' : '' ?>"
                id="nombre"
                name="nombre"
                placeholder="Juan Pérez"
                autocomplete="name"
                value="<?= $nombre ?>"
              />
              <?php if (isset($errores['nombre'])): ?>
                <div class="invalid-feedback"><?= $errores['nombre'] ?></div>
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control <?= isset($errores['email']) ? 'is-invalid' : '' ?>"
                id="email"
                name="email"
                placeholder="tu@email.com"
                autocomplete="email"
                value="<?= $email ?>"
              />
              <?php if (isset($errores['email'])): ?>
                <div class="invalid-feedback"><?= $errores['email'] ?></div>
              <?php endif; ?>
            </div>
            <div class="col-12">
              <label for="mensaje" class="form-label">Mensaje</label>
              <textarea
                class="form-control <?= isset($errores['mensaje']) ? 'is-invalid' : '' ?>"
                id="mensaje"
                name="mensaje"
                rows="3"
              ><?= $mensaje ?></textarea>
              <?php if (isset($errores['mensaje'])): ?>
                <div class="invalid-feedback"><?= $errores['mensaje'] ?></div>
              <?php endif; ?>
            </div>
            <div class="col-12">
              <button class="btn btn-neon" type="submit">Enviar mensaje</button>
            </div>
          </form>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
