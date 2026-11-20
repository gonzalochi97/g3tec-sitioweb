<?php
require_once '../config/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "INSERT INTO productos
            (nombre, descripcion, precio, stock, id_categoria)
            VALUES
            (:nombre, :descripcion, :precio, :stock, 1)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nombre' => $nombre,
        ':descripcion' => $descripcion,
        ':precio' => $precio,
        ':stock' => $stock
    ]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Producto</title>
</head>
<body>

<h2>Nuevo Producto</h2>

<form method="POST">

    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion"></textarea><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" required><br><br>

    <label>Stock:</label><br>
    <input type="number" name="stock" required><br><br>

    <button type="submit">Guardar</button>

</form>

</body>
</html>