<?php

require_once '../config/conexion.php';

$id = $_GET['id'];

$sql = "DELETE FROM productos WHERE id_producto = :id";

$stmt = $pdo->prepare($sql);

$stmt->execute([
    ':id' => $id
]);

header("Location: index.php");
exit;