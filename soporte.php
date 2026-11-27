<?php
$titulo_pagina = "Soporte técnico";
$descripcion_pagina = "Consultas de reparación y pedidos de presupuesto para empresas y particulares.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Soporte técnico</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Soporte técnico</p>
      <h1 class="display-6 fw-bold">¿Necesitás una reparación o un presupuesto?</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Nuestro equipo técnico revisa tu consulta y te responde en el día.
      </p>
      <div class="row g-4">
        <div class="col-lg-5">
          <div class="g3-card p-4 h-100">
            <h2 class="h5 fw-bold">Te respondemos en el día</h2>
            <ul class="list-unstyled d-grid gap-3 mt-3 mb-0">
              <li>
                <strong>Consultas de reparación</strong><br /><span class="text-secondary small"
                  >Diagnóstico de PC, notebooks y periféricos.</span
                >
              </li>
              <li>
                <strong>Presupuestos</strong><br /><span class="text-secondary small"
                  >Cotizaciones para compras grandes y empresas.</span
                >
              </li>
              <li>
                <strong>Atención por WhatsApp</strong><br /><span class="text-secondary small"
                  >+54 387 400-0000 · Lun a Vie 9 a 18 h</span
                >
              </li>
            </ul>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="row g-3">
            <div class="col-md-6">
              <a href="consulta_reparacion.php" class="g3-card card-hover p-4 h-100 d-block text-reset text-decoration-none">
                <i class="bi bi-tools fs-3 text-neon" aria-hidden="true"></i>
                <h2 class="h5 fw-bold mt-2">Consulta de reparación</h2>
                <p class="text-secondary small mb-0">Contanos qué le pasa a tu equipo y te pasamos un diagnóstico estimado.</p>
              </a>
            </div>
            <div class="col-md-6">
              <a href="presupuesto.php" class="g3-card card-hover p-4 h-100 d-block text-reset text-decoration-none">
                <i class="bi bi-file-earmark-text fs-3 text-neon" aria-hidden="true"></i>
                <h2 class="h5 fw-bold mt-2">Pedir presupuesto</h2>
                <p class="text-secondary small mb-0">Cotizaciones para compras grandes, oficinas y licitaciones.</p>
              </a>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
