<?php

require_once '../auth/auth_guard.php';
require_once '../config/conexion.php';

$stmt = $pdo->query("SELECT * FROM productos");
$productos = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos G3TEC</title>
</head>
<body>

<h1>Listado de Productos</h1>


<p>
Bienvenido:
<?= htmlspecialchars($_SESSION['usuario_nombre']) ?>
</p>

<a href="../auth/logout.php">
Cerrar sesion
</a>

<br><br>

<a href="crear.php">
Agregar producto
</a>

<br><br>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Acciones</th>

    </tr>

    <?php foreach ($productos as $producto): ?>
    <tr>
    <td><?= htmlspecialchars($producto['id_producto']) ?></td>
    <td><?= htmlspecialchars($producto['nombre']) ?></td>
    <td>$<?= htmlspecialchars($producto['precio']) ?></td>
    <td><?= htmlspecialchars($producto['stock']) ?></td>

    <td>
        <a href="editar.php?id=<?= $producto['id_producto'] ?>">Editar</a>

        <a href="eliminar.php?id=<?= $producto['id_producto'] ?>">Eliminar</a>
    </td>
</tr>
    <?php endforeach; ?>

</table>

</body>
</html>