<?php
require_once '../auth/admin_guard.php';
require_once '../config/conexion.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $sql = "UPDATE productos
            SET nombre = :nombre,
                descripcion = :descripcion,
                precio = :precio,
                precio_mayorista = :precio_mayorista,
                precio_oferta = :precio_oferta,
                stock = :stock,
                id_categoria = :id_categoria
            WHERE id_producto = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':nombre' => trim($_POST['nombre']),
        ':descripcion' => trim($_POST['descripcion']),
        ':precio' => $_POST['precio'],
        ':precio_mayorista' => $_POST['precio_mayorista'] == '' ? null : $_POST['precio_mayorista'],
        ':precio_oferta' => $_POST['precio_oferta'] == '' ? null : $_POST['precio_oferta'],
        ':stock' => $_POST['stock'],
        ':id_categoria' => $_POST['id_categoria'],
        ':id' => $id
    ]);

    header("Location: index.php?ok=editado");
    exit;
}

$sql = "SELECT * FROM productos WHERE id_producto = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

$producto = $stmt->fetch();

if (!$producto) {
    header('Location: index.php');
    exit;
}

$categorias = $pdo->query("SELECT * FROM categorias ORDER BY nombre")->fetchAll();

$raiz = '../';
$titulo_pagina = 'Panel - Editar producto';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Editar producto</h1>
      <div class="row">
        <div class="col-lg-8">
          <form class="g3-card p-4 row g-3" method="POST">
<?php require_once '../includes/form_producto.php'; ?>
            <div class="col-12 d-flex gap-2">
              <button class="btn btn-neon" type="submit">Guardar cambios</button>
              <a class="btn btn-outline-secondary" href="index.php">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </main>
<?php require_once '../includes/footer.php'; ?>
