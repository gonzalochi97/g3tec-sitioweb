<?php
require_once '../config/conexion.php';

$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nombre = trim($_POST['nombre']);
    $apellido = trim($_POST['apellido']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT id_usuario FROM usuarios WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);

    if ($stmt->fetch()) {

        $mensaje = "El email ya está registrado.";

    } else {

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

        $mensaje = "Usuario registrado correctamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>

<h2>Registro de Usuario</h2>

<p><?= htmlspecialchars($mensaje) ?></p>

<form method="POST">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Apellido:</label><br>
    <input type="text" name="apellido" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Contraseña:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Registrarse</button>

</form>

</body>
</html>