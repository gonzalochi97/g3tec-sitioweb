<?php
require_once __DIR__ . '/../config/env.php';

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
    <link rel="icon" href="img/logo-sm.webp" type="image/webp" />
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
    <link href="css/estilos.css" rel="stylesheet" />
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
        <a href="index.php" class="navbar-brand me-1"
          ><img src="img/logo-sm.webp" alt="<?= APP_NAME ?>, inicio" width="58" height="48"
        /></a>
        <a href="carrito.php" class="btn btn-outline-neon d-flex align-items-center gap-2"
          ><i class="bi bi-cart3" aria-hidden="true"></i> Tu carrito
          <span class="badge rounded-pill badge-neon"
            >3<span class="visually-hidden"> productos</span></span
          ></a
        >
        <form
          class="search input-group flex-grow-1 ms-lg-auto"
          role="search"
          action="catalogo.php"
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
        <a href="cuenta.php" class="btn btn-outline-neon"
          ><i class="bi bi-person" aria-hidden="true"></i> Cuenta</a
        >
        <button
          id="btnTema"
          type="button"
          class="btn btn-outline-neon"
          aria-label="Cambiar tema"
        ></button>
      </div>
<?php require_once __DIR__ . '/nav.php'; ?>
    </header>
