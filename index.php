<!doctype html>
<html lang="es-AR" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inicio | G3 Tec</title>
    <meta
      name="description"
      content="Mayorista de insumos informáticos, tecnología y electro en Salta. Comprá por mayor y por menor."
    />
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
        <a href="index.html" class="navbar-brand me-1"
          ><img src="img/logo-sm.webp" alt="G3 Tec, inicio" width="58" height="48"
        /></a>
        <a href="carrito.html" class="btn btn-outline-neon d-flex align-items-center gap-2"
          ><i class="bi bi-cart3" aria-hidden="true"></i> Tu carrito
          <span class="badge rounded-pill badge-neon"
            >3<span class="visually-hidden"> productos</span></span
          ></a
        >
        <form
          class="search input-group flex-grow-1 ms-lg-auto"
          role="search"
          action="catalogo.html"
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
        <a href="cuenta.html" class="btn btn-outline-neon"
          ><i class="bi bi-person" aria-hidden="true"></i> Cuenta</a
        >
        <button
          id="btnTema"
          type="button"
          class="btn btn-outline-neon"
          aria-label="Cambiar tema"
        ></button>
      </div>
      <nav class="navbar navbar-expand-lg py-1 border-top" aria-label="Menú principal">
        <div class="container">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu"
            aria-controls="menu"
            aria-expanded="false"
            aria-label="Abrir menú"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav gap-1">
              <li class="nav-item">
                <a class="nav-link active" href="index.html" aria-current="page">Inicio</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="catalogo.html">Catálogo</a></li>
              <li class="nav-item">
                <a class="nav-link" href="mayorista.html">Venta mayorista</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="soporte.html">Soporte técnico</a></li>
              <li class="nav-item">
                <a class="nav-link" href="reparacion.html">Reparación de PC</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="nosotros.html">Sobre nosotros</a></li>
              <li class="nav-item"><a class="nav-link" href="contacto.html">Contacto</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
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
              <a href="catalogo.html" class="btn btn-neon btn-lg"
                >Comprar ahora <i class="bi bi-arrow-right" aria-hidden="true"></i></a
              ><a href="mayorista.html" class="btn btn-outline-neon btn-lg">Quiero ser mayorista</a>
            </div>
            <ul class="list-inline mt-4 mb-0">
              <li class="list-inline-item me-4">
                <strong class="fs-4">+2.500</strong><br /><span class="small text-secondary"
                  >productos</span
                >
              </li>
              <li class="list-inline-item me-4">
                <strong class="fs-4">24 h</strong><br /><span class="small text-secondary"
                  >despacho</span
                >
              </li>
              <li class="list-inline-item">
                <strong class="fs-4">+800</strong><br /><span class="small text-secondary"
                  >comercios</span
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
          <a href="catalogo.html" class="btn btn-outline-neon btn-sm">Ver todo</a>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
          <div class="col">
            <a href="catalogo.html" class="card card-hover h-100 p-3 text-decoration-none text-body"
              ><span class="ico mb-3"><i class="bi bi-keyboard" aria-hidden="true"></i></span
              ><span class="fw-semibold">Insumos informáticos</span
              ><span class="small text-secondary">820 productos</span></a
            >
          </div>
          <div class="col">
            <a href="catalogo.html" class="card card-hover h-100 p-3 text-decoration-none text-body"
              ><span class="ico mb-3"><i class="bi bi-smartwatch" aria-hidden="true"></i></span
              ><span class="fw-semibold">Tecnología</span
              ><span class="small text-secondary">540 productos</span></a
            >
          </div>
          <div class="col">
            <a href="catalogo.html" class="card card-hover h-100 p-3 text-decoration-none text-body"
              ><span class="ico mb-3"><i class="bi bi-cup-hot" aria-hidden="true"></i></span
              ><span class="fw-semibold">Electro</span
              ><span class="small text-secondary">310 productos</span></a
            >
          </div>
          <div class="col">
            <a href="catalogo.html" class="card card-hover h-100 p-3 text-decoration-none text-body"
              ><span class="ico mb-3"><i class="bi bi-plug" aria-hidden="true"></i></span
              ><span class="fw-semibold">Cargadores y fuentes</span
              ><span class="small text-secondary">210 productos</span></a
            >
          </div>
          <div class="col">
            <a href="catalogo.html" class="card card-hover h-100 p-3 text-decoration-none text-body"
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
            <a href="registro.html" class="btn btn-neon">Registrarme</a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="g3-card p-4 h-100">
            <p class="eyebrow">Servicio técnico</p>
            <h2 class="h3 fw-bold">Reparación y mantenimiento de PC y notebooks</h2>
            <p class="text-secondary">
              Diagnóstico, limpieza, upgrades y garantía escrita de 90 días.
            </p>
            <a href="reparacion.html" class="btn btn-neon">Pedir turno</a>
          </div>
        </div>
      </section>
    </main>
    <footer class="site-footer pt-5 pb-4 mt-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4">
            <img
              src="img/logo-sm.webp"
              alt="G3 Tec"
              width="77"
              height="64"
              loading="lazy"
              class="mb-3"
            />
            <p class="text-secondary small">
              Mayorista de insumos informáticos, tecnología y electro. Venta por mayor y por menor
              desde Salta a todo el país.
            </p>
            <div class="d-flex gap-3 fs-5">
              <a href="#" aria-label="Instagram de G3 Tec"
                ><i class="bi bi-instagram" aria-hidden="true"></i></a
              ><a href="#" aria-label="Facebook de G3 Tec"
                ><i class="bi bi-facebook" aria-hidden="true"></i></a
              ><a href="#" aria-label="YouTube de G3 Tec"
                ><i class="bi bi-youtube" aria-hidden="true"></i
              ></a>
            </div>
          </div>
          <div class="col-6 col-lg-2">
            <h2 class="h6 fw-bold">Catálogo</h2>
            <ul class="list-unstyled small d-grid gap-2">
              <li><a href="catalogo.html">Insumos informáticos</a></li>
              <li><a href="catalogo.html">Tecnología</a></li>
              <li><a href="catalogo.html">Electro</a></li>
              <li><a href="catalogo.html">Cargadores</a></li>
              <li><a href="catalogo.html">Audio</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-3">
            <h2 class="h6 fw-bold">Servicios</h2>
            <ul class="list-unstyled small d-grid gap-2">
              <li><a href="mayorista.html">Venta mayorista</a></li>
              <li><a href="registro.html">Registro mayorista</a></li>
              <li><a href="soporte.html">Soporte técnico</a></li>
              <li><a href="reparacion.html">Reparación de PC</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h2 class="h6 fw-bold">Empresa</h2>
            <ul class="list-unstyled small d-grid gap-2">
              <li><a href="nosotros.html">Sobre nosotros</a></li>
              <li><a href="contacto.html">Contacto / Sucursales</a></li>
              <li><a href="cuenta.html">Mi cuenta</a></li>
              <li><a href="mailto:ventas@g3tec.com.ar">ventas@g3tec.com.ar</a></li>
            </ul>
          </div>
        </div>
        <hr class="my-4" />
        <p class="small text-secondary mb-0">
          © 2026 G3 Tec. Todos los derechos reservados. Contenido de ejemplo.
        </p>
      </div>
    </footer>
    <a href="https://wa.me/543874000000" class="wa-float" aria-label="Escribinos por WhatsApp"
      ><i class="bi bi-whatsapp" aria-hidden="true"></i
    ></a>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="js/main.js"></script>
  </body>
</html>
