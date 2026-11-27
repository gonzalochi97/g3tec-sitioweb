<?php
session_start();

require_once 'config/conexion.php';
require_once 'includes/csrf.php';

$equipos = ['Notebook', 'PC', 'Fuente / cargador', 'Otro'];

$errores = [];
$enviada = isset($_GET['enviada']);
$datos = [
    'equipo' => 'Notebook', 'marca' => '', 'modelo' => '', 'falla' => '',
    'nombre' => '', 'contacto' => '', 'garantia' => '0',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verificar_csrf();

    foreach ($datos as $campo => $valor) {
        if (isset($_POST[$campo])) {
            $datos[$campo] = trim($_POST[$campo]);
        }
    }

    if (!in_array($datos['equipo'], $equipos)) {
        $errores[] = 'Elegí el tipo de equipo.';
    }
    if ($datos['marca'] == '' || $datos['modelo'] == '') {
        $errores[] = 'Completá la marca y el modelo.';
    }
    if (strlen($datos['falla']) < 10) {
        $errores[] = 'Contanos la falla con al menos 10 caracteres.';
    }
    if ($datos['nombre'] == '') {
        $errores[] = 'Completá tu nombre.';
    }
    if ($datos['contacto'] == '') {
        $errores[] = 'Completá tu email o WhatsApp.';
    }

    if (empty($errores)) {
        $sql = "INSERT INTO consultas_reparacion
                (tipo_equipo, marca, modelo, falla, nombre, contacto, garantia)
                VALUES (:equipo, :marca, :modelo, :falla, :nombre, :contacto, :garantia)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':equipo' => $datos['equipo'],
            ':marca' => $datos['marca'],
            ':modelo' => $datos['modelo'],
            ':falla' => $datos['falla'],
            ':nombre' => $datos['nombre'],
            ':contacto' => $datos['contacto'],
            ':garantia' => $datos['garantia'] == '1' ? 1 : 0
        ]);

        header('Location: consulta_reparacion.php?enviada=' . $pdo->lastInsertId());
        exit;
    }
}

$titulo_pagina = "Consulta de reparación";
$descripcion_pagina = "Describí el problema de tu equipo y te respondemos con un diagnóstico estimado.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item"><a href="soporte.php">Soporte técnico</a></li>
          <li class="breadcrumb-item active" aria-current="page">Consulta de reparación</li>
        </ol>
      </nav>
      <h1 class="display-6 fw-bold">Consulta de reparación</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Describí el problema y te respondemos con un diagnóstico estimado en menos de 24 h hábiles.
      </p>
      <div class="row g-4">
        <div class="col-lg-7">
          <?php if ($enviada): ?>
            <div class="g3-card p-4">
              <h2 class="h5 fw-bold">¡Consulta enviada!</h2>
              <p class="mb-3">Tu número de consulta es el <strong>#<?= (int) $_GET['enviada'] ?></strong>. Te respondemos en menos de 24 h.</p>
              <a class="btn btn-neon" href="index.php">Volver al inicio</a>
            </div>
          <?php else: ?>
          <form class="g3-card p-4 row g-3" method="POST" action="consulta_reparacion.php">
            <?= campo_csrf() ?>
            <?php if (!empty($errores)): ?>
              <div class="alert alert-danger mb-0" role="alert">
                <?php foreach ($errores as $error): ?>
                  <div><?= htmlspecialchars($error) ?></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <fieldset class="col-12">
              <legend class="form-label fs-6">Tipo de equipo</legend>
              <div class="row g-2">
                <?php foreach ($equipos as $i => $equipo): ?>
                  <div class="col-6 col-md-3">
                    <input type="radio" class="btn-check" name="equipo" id="equipo<?= $i ?>" value="<?= $equipo ?>"
                      <?= $datos['equipo'] == $equipo ? 'checked' : '' ?> />
                    <label class="btn btn-outline-neon btn-sm w-100 h-100" for="equipo<?= $i ?>"><?= $equipo ?></label>
                  </div>
                <?php endforeach; ?>
              </div>
            </fieldset>
            <div class="col-md-6">
              <label for="marca" class="form-label">Marca</label>
              <input type="text" class="form-control" id="marca" name="marca"
                value="<?= htmlspecialchars($datos['marca']) ?>" placeholder="Ej: Lenovo" required />
            </div>
            <div class="col-md-6">
              <label for="modelo" class="form-label">Modelo</label>
              <input type="text" class="form-control" id="modelo" name="modelo"
                value="<?= htmlspecialchars($datos['modelo']) ?>" placeholder="Ej: IdeaPad 3" required />
            </div>
            <div class="col-12">
              <label for="falla" class="form-label">¿Qué falla tiene?</label>
              <textarea class="form-control" id="falla" name="falla" rows="4"
                placeholder="Ej: no enciende, se calienta, pantalla rota..." required><?= htmlspecialchars($datos['falla']) ?></textarea>
            </div>
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre"
                value="<?= htmlspecialchars($datos['nombre']) ?>" placeholder="Juan Pérez" autocomplete="name" required />
            </div>
            <div class="col-md-6">
              <label for="contacto" class="form-label">Email o WhatsApp</label>
              <input type="text" class="form-control" id="contacto" name="contacto"
                value="<?= htmlspecialchars($datos['contacto']) ?>" placeholder="juan@mail.com" required />
            </div>
            <div class="col-12">
              <label for="garantia" class="form-label">¿Está en garantía?</label>
              <select class="form-select" id="garantia" name="garantia">
                <option value="0">No</option>
                <option value="1" <?= $datos['garantia'] == '1' ? 'selected' : '' ?>>Sí</option>
              </select>
            </div>
            <div class="col-12 d-flex justify-content-between align-items-center">
              <span class="small text-secondary">Te enviamos el número de consulta al terminar.</span>
              <button class="btn btn-neon" type="submit">Enviar consulta <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
            </div>
          </form>
          <?php endif; ?>
        </div>
        <div class="col-lg-5">
          <div class="g3-card p-4">
            <h2 class="h5 fw-bold">¿Cómo funciona?</h2>
            <div class="d-grid gap-3 mt-3">
              <div class="d-flex gap-3">
                <span class="step-num">1</span>
                <div><strong>Enviás la consulta</strong><br /><span class="small text-secondary">Con la mayor cantidad de detalles posible.</span></div>
              </div>
              <div class="d-flex gap-3">
                <span class="step-num">2</span>
                <div><strong>Diagnóstico estimado</strong><br /><span class="small text-secondary">Te respondemos en menos de 24 h.</span></div>
              </div>
              <div class="d-flex gap-3">
                <span class="step-num">3</span>
                <div><strong>Reparación</strong><br /><span class="small text-secondary">Traés el equipo o lo retiramos.</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
