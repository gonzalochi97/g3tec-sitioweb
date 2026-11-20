<?php
require_once '../config/conexion.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $sql = "UPDATE productos
            SET nombre = :nombre,
                descripcion = :descripcion,
                precio = :precio,
                stock = :stock
            WHERE id_producto = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nombre' => $nombre,
        ':descripcion' => $descripcion,
        ':precio' => $precio,
        ':stock' => $stock,
        ':id' => $id
    ]);

    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM productos WHERE id_producto = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

$producto = $stmt->fetch();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
</head>
<body>

<h2>Editar Producto</h2>

<form method="POST">

    <label>Nombre</label><br>
    <input type="text" name="nombre"
    value="<?= htmlspecialchars($producto['nombre']) ?>"><br><br>

    <label>Descripción</label><br>
    <textarea name="descripcion"><?= htmlspecialchars($producto['descripcion']) ?></textarea><br><br>

    <label>Precio</label><br>
    <input type="number" name="precio"
    value="<?= htmlspecialchars($producto['precio']) ?>"><br><br>

    <label>Stock</label><br>
    <input type="number" name="stock"
    value="<?= htmlspecialchars($producto['stock']) ?>"><br><br>

    <button type="submit">Guardar cambios</button>

</form>

</body>
</html>