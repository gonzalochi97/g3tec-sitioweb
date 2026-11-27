<?php
require_once __DIR__ . '/../config/env.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Las paginas que estan en subcarpetas (auth/, admin/) usan $raiz = '../'
if (!isset($raiz)) {
    $raiz = '';
}

$cantidad_carrito = array_sum($_SESSION['carrito'] ?? []);

if (!isset($titulo_pagina)) {
    $titulo_pagina = 'Inicio';
}
if (!isset($descripcion_pagina)) {
    $descripcion_pagina = 'Mayorista de insumos informáticos, tecnología y electro en Salta.';
}
?>
<!doctype html>
<html lang="es-AR" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $titulo_pagina ?> | <?= APP_NAME ?></title>
    <meta name="description" content="<?= $descripcion_pagina ?>" />
    <link rel="icon" href="<?= $raiz ?>img/logo-sm.webp" type="image/webp" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
      rel="stylesheet"
    />
    <link href="<?= $raiz ?>css/estilos.css" rel="stylesheet" />
  </head>
  <body>
    <a class="skip-link" href="#contenido">Saltar al contenido</a>
    <div class="topbar py-2">
      <div class="container d-flex justify-content-between flex-wrap gap-2">
        <span><strong>Venta mayorista y minorista</strong> · Salta, Argentina</span>
        <span class="text-secondary d-none d-md-inline"
          >Envíos desde Salta a todo el país · Lun a Vie 9 a 18 h</span
        >
      </div>
    </div>
    <header class="site-header sticky-top">
      <div class="container py-3 d-flex align-items-center gap-3 flex-wrap">
        <a href="<?= $raiz ?>index.php" class="navbar-brand me-1"
          ><img src="<?= $raiz ?>img/logo-sm.webp" alt="<?= APP_NAME ?>, inicio" width="58" height="48"
        /></a>
        <a href="<?= $raiz ?>carrito.php" class="btn btn-outline-neon d-flex align-items-center gap-2"
          ><i class="bi bi-cart3" aria-hidden="true"></i> Tu carrito
          <span class="badge rounded-pill badge-neon"
            ><?= $cantidad_carrito ?><span class="visually-hidden"> productos</span></span
          ></a
        >
        <form
          class="search input-group flex-grow-1 ms-lg-auto"
          role="search"
          action="<?= $raiz ?>catalogo.php"
        >
          <span class="input-group-text"><i class="bi bi-search" aria-hidden="true"></i></span>
          <label for="buscar" class="visually-hidden">Buscar productos</label>
          <input
            id="buscar"
            name="q"
            class="form-control"
            type="search"
            placeholder="Busca accesorios"
          />
        </form>
        <?php if (isset($_SESSION['usuario_id'])): ?>
          <div class="dropdown">
            <button
              class="btn btn-outline-neon dropdown-toggle"
              type="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="bi bi-person-check" aria-hidden="true"></i>
              <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="<?= $raiz ?>cuenta.php">Mi cuenta</a></li>
              <?php if ($_SESSION['rol'] == 1): ?>
                <li><a class="dropdown-item" href="<?= $raiz ?>admin/index.php">Panel de administrador</a></li>
              <?php endif; ?>
              <li><hr class="dropdown-divider" /></li>
              <li><a class="dropdown-item" href="<?= $raiz ?>auth/logout.php">Cerrar sesión</a></li>
            </ul>
          </div>
        <?php else: ?>
          <a href="<?= $raiz ?>auth/login.php" class="btn btn-outline-neon"
            ><i class="bi bi-person" aria-hidden="true"></i> Ingresar</a
          >
        <?php endif; ?>
        <button
          id="btnTema"
          type="button"
          class="btn btn-outline-neon"
          aria-label="Cambiar tema"
        ></button>
      </div>
<?php require_once __DIR__ . '/nav.php'; ?>
    </header>
