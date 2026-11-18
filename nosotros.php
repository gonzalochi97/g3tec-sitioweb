<?php
$titulo_pagina = "Sobre nosotros";
$descripcion_pagina = "Conocé la historia de G3 Tec, mayorista de tecnología en Salta.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Sobre nosotros</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Sobre nosotros</p>
      <h1 class="display-6 fw-bold">Tecnología al por mayor desde Salta</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        <?= $nombre_sitio ?> nació en Salta para abastecer a comercios del NOA con insumos informáticos,
        tecnología y electro a precios mayoristas, sin dejar de lado al cliente que compra por
        unidad.
      </p>
      <div class="row g-3 my-4">
        <div class="col-6 col-md-3">
          <div class="g3-card p-4 text-center">
            <p class="price text-neon mb-0">+10</p>
            <p class="small text-secondary mb-0">años en el mercado</p>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="g3-card p-4 text-center">
            <p class="price text-neon mb-0">+2.500</p>
            <p class="small text-secondary mb-0">productos</p>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="g3-card p-4 text-center">
            <p class="price text-neon mb-0">+800</p>
            <p class="small text-secondary mb-0">comercios clientes</p>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="g3-card p-4 text-center">
            <p class="price text-neon mb-0">3</p>
            <p class="small text-secondary mb-0">sucursales</p>
          </div>
        </div>
      </div>
      <h2 class="h3 fw-bold mb-3">Por qué elegirnos</h2>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-truck" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Envío a todo el país</h3>
            <p class="small text-secondary mb-0">Despachamos en 24 h.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-chat-dots" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Asesoramiento</h3>
            <p class="small text-secondary mb-0">Te ayudamos a elegir.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-patch-check" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Garantía oficial</h3>
            <p class="small text-secondary mb-0">Todos los productos con garantía.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-shop" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Sucursales</h3>
            <p class="small text-secondary mb-0">Retiro en nuestros locales de Salta.</p>
          </div>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
