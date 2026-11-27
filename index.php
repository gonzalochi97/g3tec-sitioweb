<?php
$titulo_pagina = "Inicio";
$descripcion_pagina = "Mayorista de insumos informáticos, tecnología y electro en Salta. Comprá por mayor y por menor.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <section class="hero p-4 p-lg-5 mb-5">
        <div class="row align-items-center g-4">
          <div class="col-lg-7">
            <p class="eyebrow">Mayorista de insumos informáticos, tecnología y electro</p>
            <h1 class="display-5 fw-bold">
              Comprá <span>por mayor y por menor</span> en un solo lugar
            </h1>
            <p class="text-secondary my-3">
              Insumos informáticos, tecnología y electro desde 1 unidad, con descuentos por
              cantidad. Stock real y envíos desde Salta a todo el país.
            </p>
            <div class="d-flex gap-2 flex-wrap">
              <a href="catalogo.php" class="btn btn-neon btn-lg"
                >Comprar ahora <i class="bi bi-arrow-right" aria-hidden="true"></i></a
              ><a href="mayorista.php" class="btn btn-outline-neon btn-lg">Quiero ser mayorista</a>
            </div>
            <ul class="list-inline mt-4 mb-0">
              <li class="list-inline-item me-4">
                <strong class="fs-4">10 u</strong><br /><span class="small text-secondary"
                  >precio mayorista</span
                >
              </li>
              <li class="list-inline-item me-4">
                <strong class="fs-4">24 h</strong><br /><span class="small text-secondary"
                  >despacho</span
                >
              </li>
              <li class="list-inline-item">
                <strong class="fs-4">Online</strong><br /><span class="small text-secondary"
                  >seguimiento de reparaciones</span
                >
              </li>
            </ul>
          </div>
          <div class="col-lg-5 text-center">
            <img
              src="img/logo.webp"
              alt="Logo de G3 Tec"
              class="img-fluid hero-logo"
              width="320"
              height="267"
            />
          </div>
        </div>
      </section>
      <section class="mb-5" aria-labelledby="t-cat">
        <div class="d-flex justify-content-between align-items-end mb-3">
          <div>
            <p class="eyebrow mb-2">Catálogo</p>
            <h2 id="t-cat" class="h2 fw-bold">Categorías</h2>
          </div>
          <a href="catalogo.php" class="btn btn-outline-neon btn-sm">Ver todo</a>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
          <div class="col">
            <a href="catalogo.php" class="card card-hover h-100 p-3 text-decoration-none text-body"
              ><span class="ico mb-3"><i class="bi bi-keyboard" aria-hidden="true"></i></span
              ><span class="fw-semibold">Insumos informáticos</span
              ><span class="small text-secondary">820 productos</span></a
            >
          </div>
          <div class="col">
            <a href="catalogo.php" class="card card-hover h-100 p-3 text-decoration-none text-body"
              ><span class="ico mb-3"><i class="bi bi-smartwatch" aria-hidden="true"></i></span
              ><span class="fw-semibold">Tecnología</span
              ><span class="small text-secondary">540 productos</span></a
            >
          </div>
          <div class="col">
            <a href="catalogo.php" class="card card-hover h-100 p-3 text-decoration-none text-body"
              ><span class="ico mb-3"><i class="bi bi-cup-hot" aria-hidden="true"></i></span
              ><span class="fw-semibold">Electro</span
              ><span class="small text-secondary">310 productos</span></a
            >
          </div>
          <div class="col">
            <a href="catalogo.php" class="card card-hover h-100 p-3 text-decoration-none text-body"
              ><span class="ico mb-3"><i class="bi bi-plug" aria-hidden="true"></i></span
              ><span class="fw-semibold">Cargadores y fuentes</span
              ><span class="small text-secondary">210 productos</span></a
            >
          </div>
          <div class="col">
            <a href="catalogo.php" class="card card-hover h-100 p-3 text-decoration-none text-body"
              ><span class="ico mb-3"><i class="bi bi-headphones" aria-hidden="true"></i></span
              ><span class="fw-semibold">Audio y auriculares</span
              ><span class="small text-secondary">180 productos</span></a
            >
          </div>
        </div>
      </section>
      <section class="mb-5" aria-labelledby="t-dest">
        <p class="eyebrow mb-2">Destacados</p>
        <h2 id="t-dest" class="h2 fw-bold">Productos más vendidos</h2>
        <p class="text-secondary lead fs-6 col-lg-8">
          Precio por unidad para todos y precio mayorista desde 10 unidades. Valores en pesos
          argentinos (ARS).
        </p>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3">
          <div class="col">
            <article class="card h-100 card-hover p-3">
              <div class="prod-img mb-3"><i class="bi bi-usb-c" aria-hidden="true"></i></div>
              <p class="small text-secondary mb-1">Insumos informáticos</p>
              <h3 class="h6 fw-semibold">Cable USB-C a USB-C 60W 1 m</h3>
              <p class="price mb-0">$ 6.900</p>
              <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
              <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 5.900</strong></p>
              <button
                type="button"
                class="btn btn-neon btn-sm mt-auto"
                aria-label="Agregar Cable USB-C a USB-C 60W 1 m al carrito"
              >
                <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
              </button>
            </article>
          </div>
          <div class="col">
            <article class="card h-100 card-hover p-3">
              <div class="prod-img mb-3"><i class="bi bi-device-ssd" aria-hidden="true"></i></div>
              <p class="small text-secondary mb-1">Tecnología</p>
              <h3 class="h6 fw-semibold">Disco SSD 480 GB</h3>
              <p class="price mb-0">$ 42.900</p>
              <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
              <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 36.500</strong></p>
              <button
                type="button"
                class="btn btn-neon btn-sm mt-auto"
                aria-label="Agregar Disco SSD 480 GB al carrito"
              >
                <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
              </button>
            </article>
          </div>
          <div class="col">
            <article class="card h-100 card-hover p-3">
              <div class="prod-img mb-3"><i class="bi bi-fire" aria-hidden="true"></i></div>
              <p class="small text-secondary mb-1">Electro</p>
              <h3 class="h6 fw-semibold">Freidora de aire 4 L</h3>
              <p class="price mb-0">$ 129.900</p>
              <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
              <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 110.400</strong></p>
              <button
                type="button"
                class="btn btn-neon btn-sm mt-auto"
                aria-label="Agregar Freidora de aire 4 L al carrito"
              >
                <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
              </button>
            </article>
          </div>
          <div class="col">
            <article class="card h-100 card-hover p-3">
              <div class="prod-img mb-3">
                <i class="bi bi-lightning-charge" aria-hidden="true"></i>
              </div>
              <p class="small text-secondary mb-1">Cargadores y fuentes</p>
              <h3 class="h6 fw-semibold">Cargador GaN 65W</h3>
              <p class="price mb-0">$ 39.900</p>
              <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
              <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 33.900</strong></p>
              <button
                type="button"
                class="btn btn-neon btn-sm mt-auto"
                aria-label="Agregar Cargador GaN 65W al carrito"
              >
                <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
              </button>
            </article>
          </div>
        </div>
      </section>
      <section class="row g-3">
        <div class="col-lg-6">
          <div class="g3-card p-4 h-100">
            <p class="eyebrow">Venta mayorista</p>
            <h2 class="h3 fw-bold">Comprá al por mayor para tu comercio</h2>
            <p class="text-secondary">Registrate con tu CUIT y accedé a precios por cantidad.</p>
            <a href="registro.php" class="btn btn-neon">Registrarme</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="g3-card p-4 h-100">
            <p class="eyebrow">Servicio técnico</p>
            <h2 class="h3 fw-bold">Reparación y mantenimiento de PC y notebooks</h2>
            <p class="text-secondary">
              Diagnóstico, limpieza, upgrades y garantía escrita de 90 días.
            </p>
            <a href="reparacion.php" class="btn btn-neon">Pedir turno</a>
          </div>
        </div>
      </section>
    </main>
<?php require_once 'includes/footer.php'; ?>
