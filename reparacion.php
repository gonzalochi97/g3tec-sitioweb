<?php
session_start();

require_once 'config/conexion.php';
require_once 'includes/csrf.php';
require_once 'includes/estados.php';

$equipos = ['Notebook', 'PC de escritorio', 'All in one'];
$servicios = ['Diagnóstico completo', 'Limpieza y pasta térmica', 'Upgrade de SSD y RAM',
              'Formateo y antivirus', 'Pantallas y teclados', 'Armado de PC a medida'];
$modalidades = ['Lo llevo a la sucursal', 'Retiro a domicilio'];

$errores = [];
$datos = [
    'equipo' => 'Notebook', 'servicio' => 'Diagnóstico completo',
    'modalidad' => 'Lo llevo a la sucursal', 'nombre' => '', 'whatsapp' => '', 'fecha' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verificar_csrf();

    foreach ($datos as $campo => $valor) {
        $datos[$campo] = trim($_POST[$campo] ?? '');
    }

    if (!in_array($datos['equipo'], $equipos) || !in_array($datos['servicio'], $servicios)
        || !in_array($datos['modalidad'], $modalidades)) {
        $errores[] = 'Elegí el equipo, el servicio y la modalidad de la lista.';
    }
    if (strlen($datos['nombre']) < 3) {
        $errores[] = 'Ingresá tu nombre.';
    }
    if (!preg_match('/^[0-9 +()-]{8,20}$/', $datos['whatsapp'])) {
        $errores[] = 'Ingresá un WhatsApp válido.';
    }
    if ($datos['fecha'] == '' || strtotime($datos['fecha']) < strtotime(date('Y-m-d'))) {
        $errores[] = 'Elegí una fecha desde hoy en adelante.';
    }

    if (empty($errores)) {
        $stmt = $pdo->prepare("INSERT INTO consultas_reparacion
                (tipo, tipo_equipo, marca, modelo, falla, nombre, contacto, garantia, fecha_turno)
                VALUES ('turno', :equipo, '-', '-', :falla, :nombre, :contacto, 0, :fecha)");
        $stmt->execute([
            ':equipo' => $datos['equipo'],
            ':falla' => $datos['servicio'] . ' · ' . $datos['modalidad'],
            ':nombre' => $datos['nombre'],
            ':contacto' => $datos['whatsapp'],
            ':fecha' => $datos['fecha'],
        ]);

        header('Location: reparacion.php?turno=' . $pdo->lastInsertId() . '#turno');
        exit;
    }
}

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
      <h2 id="turno" class="h3 fw-bold mt-5 mb-3">Pedí tu turno</h2>
      <?php if (isset($_GET['turno'])): ?>
        <div class="g3-card p-4">
          <h3 class="h5 fw-bold">¡Turno solicitado!</h3>
          <p class="mb-0">
            Tu número de orden es <strong><?= numero_orden((int) $_GET['turno']) ?></strong>. Te confirmamos por WhatsApp.
            Seguí el estado en <a href="seguimiento.php">Seguimiento</a> con ese número y tu WhatsApp.
          </p>
        </div>
      <?php else: ?>
      <form class="g3-card p-4 row g-3" method="POST" action="reparacion.php#turno">
        <?= campo_csrf() ?>
        <?php if (!empty($errores)): ?>
          <div class="alert alert-danger mb-0" role="alert">
            <?php foreach ($errores as $error): ?>
              <div><?= htmlspecialchars($error) ?></div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <div class="col-md-4">
          <label for="equipo" class="form-label">Equipo</label>
          <select class="form-select" id="equipo" name="equipo">
            <?php foreach ($equipos as $opcion): ?>
              <option <?= $datos['equipo'] == $opcion ? 'selected' : '' ?>><?= $opcion ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-4">
          <label for="servicio" class="form-label">Servicio</label>
          <select class="form-select" id="servicio" name="servicio">
            <?php foreach ($servicios as $opcion): ?>
              <option <?= $datos['servicio'] == $opcion ? 'selected' : '' ?>><?= $opcion ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-4">
          <label for="modalidad" class="form-label">Modalidad</label>
          <select class="form-select" id="modalidad" name="modalidad">
            <?php foreach ($modalidades as $opcion): ?>
              <option <?= $datos['modalidad'] == $opcion ? 'selected' : '' ?>><?= $opcion ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="col-md-4">
          <label for="tnombre" class="form-label">Nombre</label>
          <input type="text" class="form-control" id="tnombre" name="nombre" placeholder="Juan Pérez"
            autocomplete="name" value="<?= htmlspecialchars($datos['nombre']) ?>" required />
        </div>
        <div class="col-md-4">
          <label for="twa" class="form-label">WhatsApp</label>
          <input type="tel" class="form-control" id="twa" name="whatsapp" placeholder="387 400-0000"
            autocomplete="tel" value="<?= htmlspecialchars($datos['whatsapp']) ?>" required />
        </div>
        <div class="col-md-4">
          <label for="fecha" class="form-label">Fecha preferida</label>
          <input type="date" class="form-control" id="fecha" name="fecha" min="<?= date('Y-m-d') ?>"
            value="<?= htmlspecialchars($datos['fecha']) ?>" required />
        </div>
        <div class="col-12">
          <button class="btn btn-neon" type="submit">Solicitar turno</button>
        </div>
      </form>
      <?php endif; ?>
    </main>
<?php require_once 'includes/footer.php'; ?>
