<?php
$titulo_pagina = "Sobre nosotros";
$descripcion_pagina = "Conocé a G3 Tec: tecnología de buena calidad y accesible desde Salta.";
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
      <h1 class="display-6 fw-bold">Tecnología de calidad, al alcance de todos</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Somos un grupo de personas buscando innovar con productos de buena calidad y accesibles
        para todo público, siempre en las tendencias. Desde Salta vendemos insumos informáticos,
        tecnología y electro por unidad y por mayor, y damos servicio técnico a tus equipos.
      </p>

      <div class="row g-3 my-4">
        <div class="col-md-6">
          <div class="g3-card p-4 h-100">
            <h2 class="h5 fw-bold">Nuestra misión</h2>
            <p class="text-secondary mb-0">
              Que cualquier persona o comercio pueda acceder a tecnología actual sin pagar de más,
              con una atención cercana que lo ayude a elegir bien.
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="g3-card p-4 h-100">
            <h2 class="h5 fw-bold">Lo que nos mueve</h2>
            <p class="text-secondary mb-0">
              Buscamos siempre lo nuevo del mercado: probamos los productos antes de sumarlos al
              catálogo y solo vendemos lo que recomendaríamos a un amigo.
            </p>
          </div>
        </div>
      </div>

      <h2 class="h3 fw-bold mb-3">Por qué elegirnos</h2>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3">
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-stars" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Siempre en tendencia</h3>
            <p class="small text-secondary mb-0">Renovamos el catálogo con lo último en tecnología.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-tag" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Precios accesibles</h3>
            <p class="small text-secondary mb-0">Ofertas todas las semanas y precio mayorista desde 10 unidades.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-patch-check" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Calidad y garantía</h3>
            <p class="small text-secondary mb-0">Productos probados y con garantía.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-tools" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Servicio técnico propio</h3>
            <p class="small text-secondary mb-0">Reparamos tu PC o notebook y seguís el estado online.</p>
          </div>
        </div>
      </div>

      <div class="g3-card p-4 p-lg-5 mt-5 d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div>
          <h2 class="h4 fw-bold mb-1">¿Tenés un comercio?</h2>
          <p class="text-secondary mb-0">Sumate como mayorista y accedé a precios especiales.</p>
        </div>
        <div class="d-flex gap-2">
          <a class="btn btn-neon" href="mayorista.php">Venta mayorista</a>
          <a class="btn btn-outline-neon" href="catalogo.php">Ver catálogo</a>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
