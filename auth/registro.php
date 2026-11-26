<?php
require_once '../config/conexion.php';

$errores = [];
$nombre = '';
$apellido = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if ($nombre == '' || $apellido == '') {
        $errores[] = 'Completá tu nombre y apellido.';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'El email no es válido.';
    }
    if (strlen($password) < 6) {
        $errores[] = 'La contraseña tiene que tener al menos 6 caracteres.';
    }

    if (empty($errores)) {

        $sql = "SELECT id_usuario FROM usuarios WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':email' => $email]);

        if ($stmt->fetch()) {
            $errores[] = 'El email ya está registrado.';
        }
    }

    if (empty($errores)) {

        $passwordHash = password_hash($password, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios
                (nombre, apellido, email, password, id_rol)
                VALUES
                (:nombre, :apellido, :email, :password, 2)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':email' => $email,
            ':password' => $passwordHash
        ]);

        header('Location: login.php?registrado=1');
        exit;
    }
}

$raiz = '../';
$titulo_pagina = 'Crear cuenta';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Crear cuenta</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Usuario</p>
      <h1 class="display-6 fw-bold">Crear cuenta</h1>
      <div class="row g-4">
        <div class="col-lg-6">
          <form class="g3-card p-4 row g-3" method="POST" action="registro.php">
            <?php if (!empty($errores)): ?>
              <div class="alert alert-danger mb-0" role="alert">
                <?php foreach ($errores as $error): ?>
                  <div><?= htmlspecialchars($error) ?></div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre"
                value="<?= htmlspecialchars($nombre) ?>" autocomplete="given-name" required />
            </div>
            <div class="col-md-6">
              <label for="apellido" class="form-label">Apellido</label>
              <input type="text" class="form-control" id="apellido" name="apellido"
                value="<?= htmlspecialchars($apellido) ?>" autocomplete="family-name" required />
            </div>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email"
                value="<?= htmlspecialchars($email) ?>" placeholder="tu@email.com" autocomplete="email" required />
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Contraseña</label>
              <input type="password" class="form-control" id="password" name="password"
                minlength="6" autocomplete="new-password" required />
            </div>
            <div class="col-12">
              <button class="btn btn-neon" type="submit">Crear cuenta</button>
            </div>
            <p class="small text-secondary mb-0">
              ¿Ya tenés cuenta? <a href="login.php">Ingresá</a>.
              ¿Tenés un comercio? <a href="../registro.php">Registrate como mayorista</a>.
            </p>
          </form>
        </div>
      </div>
    </main>
<?php require_once '../includes/footer.php'; ?>
