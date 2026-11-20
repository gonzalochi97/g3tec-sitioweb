<?php
session_start();

require_once '../config/conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
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

        header('Location: ../admin/index.php');
        exit;

    } else {

        $mensaje = "Credenciales incorrectas.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h2>Iniciar Sesión</h2>

<p><?= htmlspecialchars($mensaje) ?></p>

<form method="POST">

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Ingresar</button>

</form>

</body>
</html>