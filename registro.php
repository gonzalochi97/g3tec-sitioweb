<?php
session_start();

require_once 'config/conexion.php';
require_once 'includes/csrf.php';

$provincias = ['Salta', 'Jujuy', 'Tucumán', 'Catamarca', 'Santiago del Estero', 'Otra'];
$rubros = ['Comercio de informática', 'Librería', 'Electrodomésticos', 'Servicio técnico', 'Otro'];

$logueado = isset($_SESSION['usuario_id']);
$errores = [];
$datos = [
    'razon' => '', 'cuit' => '', 'nombre' => '', 'apellido' => '', 'email' => '',
    'tel' => '', 'provincia' => 'Salta', 'rubro' => 'Comercio de informática',
];

// Si ya inicio sesion, revisamos si ya es mayorista o si tiene una solicitud pendiente
$aviso = '';
if ($logueado) {
    if ($_SESSION['rol'] == 1) {
        $aviso = 'Estás ingresado como administrador. Las solicitudes se revisan desde el panel.';
    } elseif ($_SESSION['rol'] == 3) {
        $aviso = 'Tu cuenta ya es mayorista.';
    } else {
        $stmt = $pdo->prepare("SELECT id_solicitud FROM solicitudes_mayoristas
                               WHERE id_usuario = :id AND estado = 'pendiente'");
        $stmt->execute([':id' => $_SESSION['usuario_id']]);
        if ($stmt->fetch()) {
            $aviso = 'Ya enviaste una solicitud. Podés ver su estado en Mi cuenta.';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $aviso == '') {
    verificar_csrf();

    foreach ($datos as $campo => $valor) {
        if (isset($_POST[$campo])) {
            $datos[$campo] = trim($_POST[$campo]);
        }
    }

    if ($datos['razon'] == '') {
        $errores[] = 'Completá la razón social.';
    }
    // CUIT: 11 numeros, con o sin guiones (20-12345678-9)
    if (!preg_match('/^\d{2}-?\d{8}-?\d$/', $datos['cuit'])) {
        $errores[] = 'El CUIT tiene que tener 11 números, por ejemplo 20-12345678-9.';
    }
    if ($datos['tel'] == '') {
        $errores[] = 'Completá el teléfono.';
    }
    if (!in_array($datos['provincia'], $provincias) || !in_array($datos['rubro'], $rubros)) {
        $errores[] = 'Elegí una provincia y un rubro de la lista.';
    }
    if (!isset($_POST['terminos'])) {
        $errores[] = 'Tenés que aceptar los términos y condiciones.';
    }

    // Si no tiene cuenta, tambien se crea el usuario
    if (!$logueado) {
        $password = $_POST['password'];

        if ($datos['nombre'] == '' || $datos['apellido'] == '') {
            $errores[] = 'Completá tu nombre y apellido.';
        }
        if (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
            $errores[] = 'El email no es válido.';
        }
        if (strlen($password) < 6) {
            $errores[] = 'La contraseña tiene que tener al menos 6 caracteres.';
        }
        if (empty($errores)) {
            $stmt = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email = :email");
            $stmt->execute([':email' => $datos['email']]);
            if ($stmt->fetch()) {
                $errores[] = 'El email ya está registrado. Ingresá con tu cuenta y volvé a esta página.';
            }
        }
    }

    if (empty($errores)) {

        if (!$logueado) {
            $sql = "INSERT INTO usuarios (nombre, apellido, email, password, id_rol)
                    VALUES (:nombre, :apellido, :email, :password, 2)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':nombre' => $datos['nombre'],
                ':apellido' => $datos['apellido'],
                ':email' => $datos['email'],
                ':password' => password_hash($password, PASSWORD_BCRYPT)
            ]);

            // Dejamos la sesion iniciada con la cuenta nueva (todavia como cliente)
            session_regenerate_id(true);
            $_SESSION['usuario_id'] = $pdo->lastInsertId();
            $_SESSION['usuario_nombre'] = $datos['nombre'];
            $_SESSION['rol'] = 2;
        }

        $sql = "INSERT INTO solicitudes_mayoristas
                (id_usuario, razon_social, cuit, telefono, provincia, rubro)
                VALUES (:id_usuario, :razon, :cuit, :tel, :provincia, :rubro)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':id_usuario' => $_SESSION['usuario_id'],
            ':razon' => $datos['razon'],
            ':cuit' => $datos['cuit'],
            ':tel' => $datos['tel'],
            ':provincia' => $datos['provincia'],
            ':rubro' => $datos['rubro']
        ]);

        header('Location: cuenta.php?solicitud=enviada');
        exit;
    }
}

$titulo_pagina = "Registro mayorista";
$descripcion_pagina = "Registrate como cliente mayorista de G3 Tec con tu CUIT.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Registro mayorista</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Venta mayorista</p>
      <h1 class="display-6 fw-bold">Registro de cliente mayorista</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Completá el formulario. Validamos tu cuenta en menos de 24 h hábiles.
      </p>
      <div class="row g-4">
        <div class="col-lg-8">
          <?php if ($aviso != ''): ?>
            <div class="g3-card p-4">
              <p class="mb-3"><?= $aviso ?></p>
              <a class="btn btn-neon" href="cuenta.php">Ir a Mi cuenta</a>
            </div>
          <?php else: ?>
          <form class="g3-card p-4 row g-3" method="POST" action="registro.php">
            <?= campo_csrf() ?>
            <?php if (!empty($errores)): ?>
              <div class="alert alert-danger mb-0" role="alert">
                <?php foreach ($errores as $error): ?>
                  <div><?= htmlspecialchars($error) ?></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <div class="col-md-6">
              <label for="razon" class="form-label">Razón social</label>
              <input type="text" class="form-control" id="razon" name="razon"
                value="<?= htmlspecialchars($datos['razon']) ?>" placeholder="Mi Comercio SRL" autocomplete="organization" required />
            </div>
            <div class="col-md-6">
              <label for="cuit" class="form-label">CUIT</label>
              <input type="text" class="form-control" id="cuit" name="cuit"
                value="<?= htmlspecialchars($datos['cuit']) ?>" placeholder="20-12345678-9" autocomplete="off" required />
            </div>
            <?php if (!$logueado): ?>
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre"
                value="<?= htmlspecialchars($datos['nombre']) ?>" placeholder="Juan" autocomplete="given-name" required />
            </div>
            <div class="col-md-6">
              <label for="apellido" class="form-label">Apellido</label>
              <input type="text" class="form-control" id="apellido" name="apellido"
                value="<?= htmlspecialchars($datos['apellido']) ?>" placeholder="Pérez" autocomplete="family-name" required />
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email"
                value="<?= htmlspecialchars($datos['email']) ?>" placeholder="tu@email.com" autocomplete="email" required />
            </div>
            <div class="col-md-6">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password"
                minlength="6" autocomplete="new-password" required />
            </div>
            <p class="small text-secondary mb-0">¿Ya tenés cuenta? <a href="auth/login.php">Ingresá</a> y volvé a esta página para enviar la solicitud.</p>
            <?php endif; ?>
            <div class="col-md-6">
              <label for="tel" class="form-label">Teléfono</label>
              <input type="tel" class="form-control" id="tel" name="tel"
                value="<?= htmlspecialchars($datos['tel']) ?>" placeholder="387 400-0000" autocomplete="tel" required />
            </div>
            <div class="col-md-6">
              <label for="provincia" class="form-label">Provincia</label>
              <select class="form-select" id="provincia" name="provincia" required>
                <?php foreach ($provincias as $opcion): ?>
                  <option <?= $opcion == $datos['provincia'] ? 'selected' : '' ?>><?= $opcion ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-12">
              <label for="rubro" class="form-label">Rubro</label>
              <select class="form-select" id="rubro" name="rubro" required>
                <?php foreach ($rubros as $opcion): ?>
                  <option <?= $opcion == $datos['rubro'] ? 'selected' : '' ?>><?= $opcion ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-12 form-check ms-2">
              <input class="form-check-input" type="checkbox" id="terminos" name="terminos" required />
              <label class="form-check-label" for="terminos">Acepto los términos y condiciones</label>
            </div>
            <div class="col-12">
              <button class="btn btn-neon" type="submit">Enviar solicitud</button>
            </div>
          </form>
          <?php endif; ?>
        </div>
        <div class="col-lg-4">
          <div class="g3-card p-4">
            <h2 class="h5 fw-bold">Beneficios</h2>
            <ul class="text-secondary mb-0">
              <li>15 % de descuento desde 10 unidades</li>
              <li>25 % desde 50 unidades</li>
              <li>Cuenta corriente para clientes frecuentes</li>
              <li>Envíos a todo el país</li>
            </ul>
          </div>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
