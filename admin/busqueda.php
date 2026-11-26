<?php
require_once '../auth/admin_guard.php';

$raiz = '../';
$titulo_pagina = 'Panel - Buscar productos';
require_once '../includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
<?php require_once '../includes/admin_menu.php'; ?>
      <h1 class="display-6 fw-bold">Buscar productos</h1>
      <p class="text-secondary">Los resultados aparecen mientras escribís (Fetch API + JSON).</p>
      <div class="col-lg-6 mb-4">
        <label for="inputBusqueda" class="visually-hidden">Buscar producto</label>
        <input type="search" class="form-control" id="inputBusqueda" placeholder="Buscar producto..." />
      </div>
      <div id="resultados" class="row g-3"></div>
    </main>
    <script src="../js/buscador.js"></script>
<?php require_once '../includes/footer.php'; ?>
