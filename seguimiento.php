<?php
session_start();

require_once 'config/conexion.php';
require_once 'includes/estados.php';

// Busca la orden por numero y contacto, asi nadie ve ordenes ajenas
$numero = trim($_GET['numero'] ?? '');
$contacto = trim($_GET['contacto'] ?? '');
$orden = null;

if ($numero != '' && $contacto != '') {
    $id = (int) str_ireplace('G3-', '', $numero);

    $stmt = $pdo->prepare("SELECT * FROM consultas_reparacion
                           WHERE id_consulta = :id AND contacto = :contacto");
    $stmt->execute([':id' => $id, ':contacto' => $contacto]);
    $orden = $stmt->fetch();
}

$titulo_pagina = "Seguimiento de reparación";
$descripcion_pagina = "Consultá el estado de tu reparación o garantía en G3 Tec.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item"><a href="soporte.php">Soporte técnico</a></li>
          <li class="breadcrumb-item active" aria-current="page">Seguimiento</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Seguimiento</p>
      <h1 class="display-6 fw-bold">Seguí tu orden de servicio</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Ingresá el número de orden y el email o teléfono que dejaste en la consulta o el turno.
      </p>

      <form class="g3-card p-4 row g-3 align-items-end" method="GET" action="seguimiento.php">
        <div class="col-md-4">
          <label for="numero" class="form-label">Número de orden</label>
          <input type="text" class="form-control" id="numero" name="numero" placeholder="G3-0001"
            value="<?= htmlspecialchars($numero) ?>" required />
        </div>
        <div class="col-md-5">
          <label for="contacto" class="form-label">Email o teléfono</label>
          <input type="text" class="form-control" id="contacto" name="contacto"
            value="<?= htmlspecialchars($contacto) ?>" required />
        </div>
        <div class="col-md-3">
          <button type="submit" class="btn btn-neon w-100">Consultar</button>
        </div>
      </form>

      <?php if ($numero != '' && !$orden): ?>
        <div class="alert alert-warning mt-4" role="alert">
          No encontramos una orden con esos datos. Revisá el número y el contacto.
        </div>
      <?php endif; ?>

      <?php if ($orden): ?>
        <div class="g3-card p-4 mt-4">
          <div class="d-flex flex-wrap justify-content-between gap-2">
            <div>
              <h2 class="h4 fw-bold mb-1">Orden <?= numero_orden($orden['id_consulta']) ?></h2>
              <p class="text-secondary mb-0">
                <?= $orden['tipo'] == 'turno' ? 'Turno' : 'Consulta' ?> ·
                <?= htmlspecialchars($orden['tipo'] == 'turno' ? $orden['tipo_equipo'] . ' · ' . $orden['falla'] : $orden['tipo_equipo'] . ' ' . $orden['marca'] . ' ' . $orden['modelo']) ?> ·
                ingresó el <?= date('d/m/Y', strtotime($orden['created_at'])) ?>
                <?php if ($orden['fecha_turno']): ?>
                  · turno el <?= date('d/m/Y', strtotime($orden['fecha_turno'])) ?>
                <?php endif; ?>
              </p>
            </div>
            <?php if ($orden['garantia']): ?>
              <span class="badge badge-neon align-self-start">Reparación por garantía</span>
            <?php endif; ?>
          </div>

          <div class="my-4"><?= barra_estado($pasos_reparacion, $orden['estado']) ?></div>

          <ol class="list-unstyled d-grid gap-2 mb-0">
            <?php $listo = true; ?>
            <?php foreach ($pasos_reparacion as $clave => $texto): ?>
              <li class="<?= $listo ? '' : 'text-secondary' ?>">
                <i class="bi <?= $listo ? 'bi-check-circle-fill text-neon' : 'bi-circle' ?>" aria-hidden="true"></i>
                <?= $texto ?>
              </li>
              <?php if ($clave == $orden['estado']) $listo = false; ?>
            <?php endforeach; ?>
          </ol>
        </div>
      <?php endif; ?>
    </main>
<?php require_once 'includes/footer.php'; ?>
