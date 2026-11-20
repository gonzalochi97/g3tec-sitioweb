<?php

header('Content-Type: application/json; charset=utf-8');

require_once '../config/conexion.php';

$busqueda = $_GET['q'] ?? '';

try {

    if (!empty($busqueda)) {

        $sql = "SELECT id_producto, nombre, precio
                FROM productos
                WHERE nombre LIKE :busqueda";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':busqueda' => "%$busqueda%"
        ]);

    } else {

        $stmt = $pdo->query("
            SELECT id_producto, nombre, precio
            FROM productos
        ");
    }

    $productos = $stmt->fetchAll();

    http_response_code(200);

    echo json_encode([
        'status' => 'success',
        'data' => $productos
    ]);

} catch (PDOException $e) {

    http_response_code(500);

    echo json_encode([
        'status' => 'error'
    ]);
}