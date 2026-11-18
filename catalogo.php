<!doctype html>
<html lang="es-AR" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Catálogo | G3 Tec</title>
    <meta
      name="description"
      content="Catálogo de insumos informáticos, tecnología, electro, cargadores y audio con precios mayoristas."
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
              <li class="nav-item"><a class="nav-link" href="index.html">Inicio</a></li>
              <li class="nav-item">
                <a class="nav-link active" href="catalogo.html" aria-current="page">Catálogo</a>
              </li>
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
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Productos</p>
      <h1 class="display-6 fw-bold">Catálogo de productos</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Todos nuestros productos con precio por unidad y precio mayorista por cantidad. Valores en
        pesos argentinos (ARS).
      </p>
      <div class="row g-4 mt-1">
        <aside class="col-lg-3" aria-label="Filtros">
          <div class="g3-card p-3">
            <h2 class="h6 fw-bold">Categorías</h2>
            <div class="list-group list-group-flush small">
              <a href="#" class="list-group-item list-group-item-action bg-transparent"
                >Insumos informáticos</a
              ><a href="#" class="list-group-item list-group-item-action bg-transparent"
                >Tecnología</a
              ><a href="#" class="list-group-item list-group-item-action bg-transparent">Electro</a
              ><a href="#" class="list-group-item list-group-item-action bg-transparent"
                >Cargadores y fuentes</a
              ><a href="#" class="list-group-item list-group-item-action bg-transparent"
                >Audio y auriculares</a
              >
            </div>
            <h2 class="h6 fw-bold mt-3">Disponibilidad</h2>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="stock" checked /><label
                class="form-check-label small"
                for="stock"
                >Solo con stock</label
              >
            </div>
          </div>
        </aside>
        <div class="col-lg-9">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="small text-secondary mb-0">Mostrando 12 productos</p>
            <div>
              <label for="orden" class="visually-hidden">Ordenar</label
              ><select id="orden" class="form-select form-select-sm">
                <option>Más vendidos</option>
                <option>Menor precio</option>
                <option>Mayor precio</option>
              </select>
            </div>
          </div>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3">
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><i class="bi bi-usb-c" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Insumos informáticos</p>
                <h2 class="h6 fw-semibold">Cable USB-C a USB-C 60W 1 m</h2>
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
                <div class="prod-img mb-3"><i class="bi bi-mouse" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Insumos informáticos</p>
                <h2 class="h6 fw-semibold">Mouse inalámbrico 2.4G</h2>
                <p class="price mb-0">$ 9.800</p>
                <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 8.300</strong></p>
                <button
                  type="button"
                  class="btn btn-neon btn-sm mt-auto"
                  aria-label="Agregar Mouse inalámbrico 2.4G al carrito"
                >
                  <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                </button>
              </article>
            </div>
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><i class="bi bi-keyboard" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Insumos informáticos</p>
                <h2 class="h6 fw-semibold">Teclado USB español</h2>
                <p class="price mb-0">$ 15.900</p>
                <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 13.500</strong></p>
                <button
                  type="button"
                  class="btn btn-neon btn-sm mt-auto"
                  aria-label="Agregar Teclado USB español al carrito"
                >
                  <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                </button>
              </article>
            </div>
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><i class="bi bi-device-ssd" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Tecnología</p>
                <h2 class="h6 fw-semibold">Disco SSD 480 GB</h2>
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
                <div class="prod-img mb-3"><i class="bi bi-router" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Tecnología</p>
                <h2 class="h6 fw-semibold">Router WiFi 6</h2>
                <p class="price mb-0">$ 69.900</p>
                <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 59.400</strong></p>
                <button
                  type="button"
                  class="btn btn-neon btn-sm mt-auto"
                  aria-label="Agregar Router WiFi 6 al carrito"
                >
                  <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                </button>
              </article>
            </div>
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><i class="bi bi-smartwatch" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Tecnología</p>
                <h2 class="h6 fw-semibold">Smartwatch AMOLED</h2>
                <p class="price mb-0">$ 54.900</p>
                <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 46.700</strong></p>
                <button
                  type="button"
                  class="btn btn-neon btn-sm mt-auto"
                  aria-label="Agregar Smartwatch AMOLED al carrito"
                >
                  <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                </button>
              </article>
            </div>
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><i class="bi bi-cup-hot" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Electro</p>
                <h2 class="h6 fw-semibold">Pava eléctrica 1,7 L</h2>
                <p class="price mb-0">$ 36.900</p>
                <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 31.400</strong></p>
                <button
                  type="button"
                  class="btn btn-neon btn-sm mt-auto"
                  aria-label="Agregar Pava eléctrica 1,7 L al carrito"
                >
                  <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                </button>
              </article>
            </div>
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><i class="bi bi-fire" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Electro</p>
                <h2 class="h6 fw-semibold">Freidora de aire 4 L</h2>
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
                <h2 class="h6 fw-semibold">Cargador GaN 65W</h2>
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
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3">
                  <i class="bi bi-battery-charging" aria-hidden="true"></i>
                </div>
                <p class="small text-secondary mb-1">Cargadores y fuentes</p>
                <h2 class="h6 fw-semibold">Power bank 10.000 mAh</h2>
                <p class="price mb-0">$ 32.900</p>
                <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 28.000</strong></p>
                <button
                  type="button"
                  class="btn btn-neon btn-sm mt-auto"
                  aria-label="Agregar Power bank 10.000 mAh al carrito"
                >
                  <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                </button>
              </article>
            </div>
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><i class="bi bi-earbuds" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Audio y auriculares</p>
                <h2 class="h6 fw-semibold">Auriculares TWS ANC</h2>
                <p class="price mb-0">$ 34.900</p>
                <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 29.700</strong></p>
                <button
                  type="button"
                  class="btn btn-neon btn-sm mt-auto"
                  aria-label="Agregar Auriculares TWS ANC al carrito"
                >
                  <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                </button>
              </article>
            </div>
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><i class="bi bi-speaker" aria-hidden="true"></i></div>
                <p class="small text-secondary mb-1">Audio y auriculares</p>
                <h2 class="h6 fw-semibold">Parlante Bluetooth 10W</h2>
                <p class="price mb-0">$ 38.500</p>
                <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                <p class="wholesale mb-3">Mayorista desde 10 u: <strong>$ 32.700</strong></p>
                <button
                  type="button"
                  class="btn btn-neon btn-sm mt-auto"
                  aria-label="Agregar Parlante Bluetooth 10W al carrito"
                >
                  <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                </button>
              </article>
            </div>
          </div>
        </div>
      </div>
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
