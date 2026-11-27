<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';
require_once '../includes/csrf.php';
require_once '../includes/imagen_producto.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    header('Location: index.php');
    exit;
}

verificar_csrf();

$id = $_POST['id'];

borrar_imagen($pdo, $id);

$sql = "DELETE FROM productos WHERE id_producto = :id";

$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

header('Location: index.php?ok=eliminado');
exit;
