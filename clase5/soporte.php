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
          <form class="g3-card p-4 row g-3" novalidate data-demo>
            <div class="col-12">
              <label for="tipo" class="form-label">Tipo de consulta</label
              ><select class="form-select" id="tipo" name="tipo" required>
                <option>Reparación</option>
                <option>Presupuesto</option>
                <option>Otro</option>
              </select>
            </div>
            <div class="col-md-6">
              <label for="snombre" class="form-label">Nombre</label
              ><input
                type="text"
                class="form-control"
                id="snombre"
                name="snombre"
                placeholder="Juan Pérez"
                autocomplete="name"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="scontacto" class="form-label">Email o WhatsApp</label
              ><input
                type="text"
                class="form-control"
                id="scontacto"
                name="scontacto"
                placeholder="tu@email.com"
                required
              />
            </div>
            <div class="col-12">
              <label for="mensaje" class="form-label">Mensaje</label
              ><textarea
                class="form-control"
                id="mensaje"
                rows="4"
                placeholder="Contanos qué necesitás…"
                required
              ></textarea>
            </div>
            <div class="col-12">
              <button class="btn btn-neon" type="submit">Enviar consulta</button>
              <div class="alert alert-success d-none mt-3" role="status" data-ok>
                ¡Consulta enviada! Te respondemos en menos de 24 h.
              </div>
            </div>
          </form>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
