<?php
$titulo_pagina = "Reparación de PC y notebooks";
$descripcion_pagina = "Reparación y mantenimiento de PC y notebooks en Salta con garantía de 90 días.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Reparación de PC y notebooks</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Servicio técnico especializado</p>
      <h1 class="display-6 fw-bold">
        Reparación y mantenimiento de <span class="accent">PC y notebooks</span>
      </h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Diagnóstico, limpieza, upgrades y reparaciones con repuestos de calidad y garantía escrita
        de 90 días.
      </p>
      <h2 class="h3 fw-bold mt-5 mb-3">Qué hacemos</h2>
      <div class="row row-cols-1 row-cols-md-3 g-3">
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-search" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Diagnóstico completo</h3>
            <p class="text-secondary small mb-0">Revisión de hardware y software con informe.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-wind" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Limpieza y pasta térmica</h3>
            <p class="text-secondary small mb-0">Eliminamos polvo y bajamos la temperatura.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-device-ssd" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Upgrade de SSD y RAM</h3>
            <p class="text-secondary small mb-0">Tu equipo hasta 5 veces más rápido.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-shield-check" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Formateo y antivirus</h3>
            <p class="text-secondary small mb-0">Windows/Linux, drivers y respaldo.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-laptop" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Pantallas y teclados</h3>
            <p class="text-secondary small mb-0">Repuestos para notebooks de todas las marcas.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-pc-display" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Armado de PC a medida</h3>
            <p class="text-secondary small mb-0">Gamer, oficina o diseño.</p>
          </div>
        </div>
      </div>
      <h2 class="h3 fw-bold mt-5 mb-3">Precios de referencia</h2>
      <div class="row g-3">
        <div class="col-md-4">
          <div class="g3-card p-4 h-100">
            <h3 class="h5 fw-bold">Básico</h3>
            <p class="price">$ 35.000</p>
            <ul class="text-secondary small">
              <li>Diagnóstico</li>
              <li>Limpieza interna</li>
              <li>Revisión de temperaturas</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="g3-card p-4 h-100">
            <h3 class="h5 fw-bold">Completo</h3>
            <p class="price">$ 60.000</p>
            <ul class="text-secondary small">
              <li>Todo lo del plan Básico</li>
              <li>Cambio de pasta térmica</li>
              <li>Optimización del sistema</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="g3-card p-4 h-100">
            <h3 class="h5 fw-bold">Empresas</h3>
            <p class="price">A medida</p>
            <ul class="text-secondary small">
              <li>Mantenimiento mensual</li>
              <li>Soporte remoto</li>
              <li>Facturación mensual</li>
            </ul>
          </div>
        </div>
      </div>
      <h2 class="h3 fw-bold mt-5 mb-3">Pedí tu turno</h2>
      <form class="g3-card p-4 row g-3" novalidate data-demo>
        <div class="col-md-4">
          <label for="equipo" class="form-label">Equipo</label
          ><select class="form-select" id="equipo" name="equipo" required>
            <option>Notebook</option>
            <option>PC de escritorio</option>
            <option>All in one</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="servicio" class="form-label">Servicio</label
          ><select class="form-select" id="servicio" name="servicio" required>
            <option>Diagnóstico completo</option>
            <option>Limpieza y pasta térmica</option>
            <option>Upgrade de SSD y RAM</option>
            <option>Formateo y antivirus</option>
            <option>Pantallas y teclados</option>
            <option>Armado de PC a medida</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="fecha" class="form-label">Fecha preferida</label
          ><input
            type="date"
            class="form-control"
            id="fecha"
            name="fecha"
            placeholder=""
            required
          />
        </div>
        <div class="col-md-6">
          <label for="tnombre" class="form-label">Nombre</label
          ><input
            type="text"
            class="form-control"
            id="tnombre"
            name="tnombre"
            placeholder="Juan Pérez"
            autocomplete="name"
            required
          />
        </div>
        <div class="col-md-6">
          <label for="twa" class="form-label">WhatsApp</label
          ><input
            type="tel"
            class="form-control"
            id="twa"
            name="twa"
            placeholder="387 400-0000"
            autocomplete="tel"
            required
          />
        </div>
        <div class="col-12">
          <button class="btn btn-neon" type="submit">Solicitar turno</button>
          <div class="alert alert-success d-none mt-3" role="status" data-ok>
            ¡Turno solicitado! Te confirmamos por WhatsApp.
          </div>
        </div>
      </form>
    </main>
<?php require_once 'includes/footer.php'; ?>
