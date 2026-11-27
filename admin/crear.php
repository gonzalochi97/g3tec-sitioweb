<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';

$categorias = $pdo->query("SELECT * FROM categorias ORDER BY nombre")->fetchAll();

$producto = [
    'nombre' => '',
    'descripcion' => '',
    'precio' => '',
    'precio_mayorista' => '',
    'precio_oferta' => '',
    'stock' => '',
    'id_categoria' => '',
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = "INSERT INTO productos
            (nombre, descripcion, precio, precio_mayorista, precio_oferta, stock, id_categoria)
            VALUES
            (:nombre, :descripcion, :precio, :precio_mayorista, :precio_oferta, :stock, :id_categoria)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nombre' => trim($_POST['nombre']),
        ':descripcion' => trim($_POST['descripcion']),
        ':precio' => $_POST['precio'],
        ':precio_mayorista' => $_POST['precio_mayorista'] == '' ? null : $_POST['precio_mayorista'],
        ':precio_oferta' => $_POST['precio_oferta'] == '' ? null : $_POST['precio_oferta'],
        ':stock' => $_POST['stock'],
        ':id_categoria' => $_POST['id_categoria']
    ]);

    header('Location: index.php?ok=creado');
    exit;
}

$raiz = '../';
$titulo_pagina = 'Panel - Agregar producto';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Agregar producto</h1>
      <div class="row">
        <div class="col-lg-8">
          <form class="g3-card p-4 row g-3" method="POST">
<?php require_once '../includes/form_producto.php'; ?>
            <div class="col-12 d-flex gap-2">
              <button class="btn btn-neon" type="submit">Guardar</button>
              <a class="btn btn-outline-secondary" href="index.php">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </main>
<?php require_once '../includes/footer.php'; ?>
