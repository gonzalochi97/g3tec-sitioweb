<?php
session_start();

require_once '../config/conexion.php';
require_once '../includes/csrf.php';

$mensaje = '';
$email = '';

if (isset($_GET['error']) && $_GET['error'] == 'acceso_denegado') {
    $mensaje = 'Tenés que iniciar sesión para entrar a esa página.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verificar_csrf();

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email = :email";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email
    ]);

    $usuario = $stmt->fetch();

    if ($usuario && password_verify($password, $usuario['password'])) {

        session_regenerate_id(true);

        $_SESSION['usuario_id'] = $usuario['id_usuario'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['rol'] = $usuario['id_rol'];

        // El administrador va al panel, el que tiene carrito a la compra y el resto a su cuenta
        if ($usuario['id_rol'] == 1) {
            header('Location: ../admin/index.php');
        } elseif (!empty($_SESSION['carrito'])) {
            header('Location: ../compra.php');
        } else {
            header('Location: ../cuenta.php');
        }
        exit;

    } else {

        $mensaje = "Email o contraseña incorrectos.";
    }
}

$raiz = '../';
$titulo_pagina = 'Ingresar';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Ingresar</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Usuario</p>
      <h1 class="display-6 fw-bold">Ingresar a tu cuenta</h1>
      <div class="row g-4">
        <div class="col-lg-6">
          <form class="g3-card p-4 row g-3" method="POST" action="login.php">
            <?= campo_csrf() ?>
            <?php if ($mensaje != ''): ?>
              <div class="alert alert-danger mb-0" role="alert"><?= htmlspecialchars($mensaje) ?></div>
            <?php endif; ?>
            <?php if (isset($_GET['registrado'])): ?>
              <div class="alert alert-success mb-0" role="status">Cuenta creada. Ya podés ingresar.</div>
            <?php endif; ?>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email"
                value="<?= htmlspecialchars($email) ?>" placeholder="tu@email.com" autocomplete="email" required />
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password"
                autocomplete="current-password" required />
            </div>
            <div class="col-12">
              <button class="btn btn-neon" type="submit">Ingresar</button>
            </div>
            <p class="small text-secondary mb-0">
              ¿No tenés cuenta? <a href="registro.php">Creá una acá</a>.
            </p>
          </form>
        </div>
      </div>
    </main>
<?php require_once '../includes/footer.php'; ?>
