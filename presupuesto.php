<?php
session_start();

require_once 'config/conexion.php';
require_once 'includes/csrf.php';

$plazos = ['Lo antes posible', 'Esta semana', 'Este mes', 'Sin apuro'];
$formas_pago = ['Transferencia', 'Efectivo', 'Tarjeta', 'Cuenta corriente'];

$errores = [];
$enviado = isset($_GET['enviado']);
$datos = [
    'empresa' => '', 'cuit' => '', 'email' => '', 'telefono' => '',
    'productos' => '', 'plazo' => 'Lo antes posible', 'forma_pago' => 'Transferencia',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verificar_csrf();

    foreach ($datos as $campo => $valor) {
        if (isset($_POST[$campo])) {
            $datos[$campo] = trim($_POST[$campo]);
        }
    }

    if ($datos['empresa'] == '') {
        $errores[] = 'Completá la empresa o comercio.';
    }
    // El CUIT es opcional, pero si lo completa tiene que ser valido
    if ($datos['cuit'] != '' && !preg_match('/^\d{2}-?\d{8}-?\d$/', $datos['cuit'])) {
        $errores[] = 'El CUIT tiene que tener 11 números, por ejemplo 30-12345678-9.';
    }
    if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El email no es válido.';
    }
    if ($datos['telefono'] == '') {
        $errores[] = 'Completá el teléfono.';
    }
    if (strlen($datos['productos']) < 10) {
        $errores[] = 'Contanos qué productos y cantidades necesitás.';
    }
    if (!in_array($datos['plazo'], $plazos) || !in_array($datos['forma_pago'], $formas_pago)) {
        $errores[] = 'Elegí un plazo y una forma de pago de la lista.';
    }

    if (empty($errores)) {
        $sql = "INSERT INTO presupuestos (empresa, cuit, email, telefono, productos, plazo, forma_pago)
                VALUES (:empresa, :cuit, :email, :telefono, :productos, :plazo, :forma_pago)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':empresa' => $datos['empresa'],
            ':cuit' => $datos['cuit'] == '' ? null : $datos['cuit'],
            ':email' => $datos['email'],
            ':telefono' => $datos['telefono'],
            ':productos' => $datos['productos'],
            ':plazo' => $datos['plazo'],
            ':forma_pago' => $datos['forma_pago']
        ]);

        header('Location: presupuesto.php?enviado=' . $pdo->lastInsertId());
        exit;
    }
}

$titulo_pagina = "Presupuestos";
$descripcion_pagina = "Pedí presupuesto para compras grandes, proyectos, equipamiento de oficinas o licitaciones.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item"><a href="soporte.php">Soporte técnico</a></li>
          <li class="breadcrumb-item active" aria-current="page">Presupuestos</li>
        </ol>
      </nav>
      <h1 class="display-6 fw-bold">Pedí tu presupuesto</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Para compras grandes, proyectos, equipamiento de oficinas o licitaciones.
      </p>
      <div class="row g-4">
        <div class="col-lg-7">
          <?php if ($enviado): ?>
            <div class="g3-card p-4">
              <h2 class="h5 fw-bold">¡Pedido de presupuesto enviado!</h2>
              <p class="mb-3">Tu número de presupuesto es el <strong>#<?= (int) $_GET['enviado'] ?></strong>. Te respondemos en menos de 24 h hábiles.</p>
              <a class="btn btn-neon" href="catalogo.php">Ver el catálogo</a>
            </div>
          <?php else: ?>
          <form class="g3-card p-4 row g-3" method="POST" action="presupuesto.php">
            <?= campo_csrf() ?>
            <?php if (!empty($errores)): ?>
              <div class="alert alert-danger mb-0" role="alert">
                <?php foreach ($errores as $error): ?>
                  <div><?= htmlspecialchars($error) ?></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <div class="col-md-6">
              <label for="empresa" class="form-label">Empresa / Comercio</label>
              <input type="text" class="form-control" id="empresa" name="empresa"
                value="<?= htmlspecialchars($datos['empresa']) ?>" placeholder="Comercial Pérez SRL" autocomplete="organization" required />
            </div>
            <div class="col-md-6">
              <label for="cuit" class="form-label">CUIT (opcional)</label>
              <input type="text" class="form-control" id="cuit" name="cuit"
                value="<?= htmlspecialchars($datos['cuit']) ?>" placeholder="30-00000000-0" />
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email"
                value="<?= htmlspecialchars($datos['email']) ?>" placeholder="compras@empresa.com" autocomplete="email" required />
            </div>
            <div class="col-md-6">
              <label for="telefono" class="form-label">Teléfono</label>
              <input type="tel" class="form-control" id="telefono" name="telefono"
                value="<?= htmlspecialchars($datos['telefono']) ?>" placeholder="+54 387 400-0000" autocomplete="tel" required />
            </div>
            <div class="col-12">
              <label for="productos" class="form-label">Productos y cantidades</label>
              <textarea class="form-control" id="productos" name="productos" rows="4"
                placeholder="Ej: 100 cables USB-C 1 m, 50 mouse inalámbricos, 20 pavas eléctricas..." required><?= htmlspecialchars($datos['productos']) ?></textarea>
            </div>
            <div class="col-md-6">
              <label for="plazo" class="form-label">Plazo de entrega deseado</label>
              <select class="form-select" id="plazo" name="plazo">
                <?php foreach ($plazos as $plazo): ?>
                  <option <?= $datos['plazo'] == $plazo ? 'selected' : '' ?>><?= $plazo ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-md-6">
              <label for="forma_pago" class="form-label">Forma de pago</label>
              <select class="form-select" id="forma_pago" name="forma_pago">
                <?php foreach ($formas_pago as $forma): ?>
                  <option <?= $datos['forma_pago'] == $forma ? 'selected' : '' ?>><?= $forma ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-12 d-flex justify-content-between align-items-center">
              <span class="small text-secondary">Respuesta en menos de 24 h hábiles.</span>
              <button class="btn btn-neon" type="submit">Solicitar presupuesto <i class="bi bi-arrow-right" aria-hidden="true"></i></button>
            </div>
          </form>
          <?php endif; ?>
        </div>
        <div class="col-lg-5">
          <div class="g3-card p-4">
            <h2 class="h5 fw-bold">Ventajas</h2>
            <div class="d-grid gap-3 mt-3">
              <div class="d-flex gap-3">
                <i class="bi bi-tag fs-4 text-neon" aria-hidden="true"></i>
                <div><strong>Mejor precio por volumen</strong><br /><span class="small text-secondary">Descuentos especiales desde 200 unidades.</span></div>
              </div>
              <div class="d-flex gap-3">
                <i class="bi bi-receipt fs-4 text-neon" aria-hidden="true"></i>
                <div><strong>Factura A o B</strong><br /><span class="small text-secondary">Emitimos según tu condición fiscal.</span></div>
              </div>
              <div class="d-flex gap-3">
                <i class="bi bi-truck fs-4 text-neon" aria-hidden="true"></i>
                <div><strong>Logística incluida</strong><br /><span class="small text-secondary">Entregas programadas a todo el país.</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
