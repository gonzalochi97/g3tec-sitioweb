<?php
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
          <form class="g3-card p-4 row g-3" novalidate data-demo>
            <div class="col-md-6">
              <label for="cnombre" class="form-label">Nombre</label
              ><input
                type="text"
                class="form-control"
                id="cnombre"
                name="cnombre"
                placeholder="Juan Pérez"
                autocomplete="name"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="cemail" class="form-label">Email</label
              ><input
                type="email"
                class="form-control"
                id="cemail"
                name="cemail"
                placeholder="tu@email.com"
                autocomplete="email"
                required
              />
            </div>
            <div class="col-12">
              <label for="cmensaje" class="form-label">Mensaje</label
              ><textarea class="form-control" id="cmensaje" rows="3" required></textarea>
            </div>
            <div class="col-12">
              <button class="btn btn-neon" type="submit">Enviar mensaje</button>
              <div class="alert alert-success d-none mt-3" role="status" data-ok>
                ¡Mensaje enviado!
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
