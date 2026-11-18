<!doctype html>
<html lang="es-AR" data-bs-theme="dark">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Reparación de PC y notebooks | G3 Tec</title>
    <meta
      name="description"
      content="Reparación y mantenimiento de PC y notebooks en Salta con garantía de 90 días."
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
              <li class="nav-item"><a class="nav-link" href="catalogo.html">Catálogo</a></li>
              <li class="nav-item">
                <a class="nav-link" href="mayorista.html">Venta mayorista</a>
              </li>
              <li class="nav-item"><a class="nav-link" href="soporte.html">Soporte técnico</a></li>
              <li class="nav-item">
                <a class="nav-link active" href="reparacion.html" aria-current="page"
                  >Reparación de PC</a
                >
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
          <li class="breadcrumb-item active" aria-current="page">Reparación de PC y notebooks</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Servicio técnico especializado</p>
      <h1 class="display-6 fw-bold">
        Reparación y mantenimiento de <span class="accent">PC y notebooks</span>
      </h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Diagnóstico, limpieza, upgrades y reparaciones con repuestos de calidad y garantía escrita
        de 90 días.
      </p>
      <h2 class="h3 fw-bold mt-5 mb-3">Qué hacemos</h2>
      <div class="row row-cols-1 row-cols-md-3 g-3">
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-search" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Diagnóstico completo</h3>
            <p class="text-secondary small mb-0">Revisión de hardware y software con informe.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-wind" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Limpieza y pasta térmica</h3>
            <p class="text-secondary small mb-0">Eliminamos polvo y bajamos la temperatura.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-device-ssd" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Upgrade de SSD y RAM</h3>
            <p class="text-secondary small mb-0">Tu equipo hasta 5 veces más rápido.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-shield-check" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Formateo y antivirus</h3>
            <p class="text-secondary small mb-0">Windows/Linux, drivers y respaldo.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-laptop" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Pantallas y teclados</h3>
            <p class="text-secondary small mb-0">Repuestos para notebooks de todas las marcas.</p>
          </div>
        </div>
        <div class="col">
          <div class="g3-card p-4 h-100">
            <span class="ico mb-3"><i class="bi bi-pc-display" aria-hidden="true"></i></span>
            <h3 class="h6 fw-bold">Armado de PC a medida</h3>
            <p class="text-secondary small mb-0">Gamer, oficina o diseño.</p>
          </div>
        </div>
      </div>
      <h2 class="h3 fw-bold mt-5 mb-3">Precios de referencia</h2>
      <div class="row g-3">
        <div class="col-md-4">
          <div class="g3-card p-4 h-100">
            <h3 class="h5 fw-bold">Básico</h3>
            <p class="price">$ 35.000</p>
            <ul class="text-secondary small">
              <li>Diagnóstico</li>
              <li>Limpieza interna</li>
              <li>Revisión de temperaturas</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="g3-card p-4 h-100">
            <h3 class="h5 fw-bold">Completo</h3>
            <p class="price">$ 60.000</p>
            <ul class="text-secondary small">
              <li>Todo lo del plan Básico</li>
              <li>Cambio de pasta térmica</li>
              <li>Optimización del sistema</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="g3-card p-4 h-100">
            <h3 class="h5 fw-bold">Empresas</h3>
            <p class="price">A medida</p>
            <ul class="text-secondary small">
              <li>Mantenimiento mensual</li>
              <li>Soporte remoto</li>
              <li>Facturación mensual</li>
            </ul>
          </div>
        </div>
      </div>
      <h2 class="h3 fw-bold mt-5 mb-3">Pedí tu turno</h2>
      <form class="g3-card p-4 row g-3" novalidate data-demo>
        <div class="col-md-4">
          <label for="equipo" class="form-label">Equipo</label
          ><select class="form-select" id="equipo" name="equipo" required>
            <option>Notebook</option>
            <option>PC de escritorio</option>
            <option>All in one</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="servicio" class="form-label">Servicio</label
          ><select class="form-select" id="servicio" name="servicio" required>
            <option>Diagnóstico completo</option>
            <option>Limpieza y pasta térmica</option>
            <option>Upgrade de SSD y RAM</option>
            <option>Formateo y antivirus</option>
            <option>Pantallas y teclados</option>
            <option>Armado de PC a medida</option>
          </select>
        </div>
        <div class="col-md-4">
          <label for="fecha" class="form-label">Fecha preferida</label
          ><input
            type="date"
            class="form-control"
            id="fecha"
            name="fecha"
            placeholder=""
            required
          />
        </div>
        <div class="col-md-6">
          <label for="tnombre" class="form-label">Nombre</label
          ><input
            type="text"
            class="form-control"
            id="tnombre"
            name="tnombre"
            placeholder="Juan Pérez"
            autocomplete="name"
            required
          />
        </div>
        <div class="col-md-6">
          <label for="twa" class="form-label">WhatsApp</label
          ><input
            type="tel"
            class="form-control"
            id="twa"
            name="twa"
            placeholder="387 400-0000"
            autocomplete="tel"
            required
          />
        </div>
        <div class="col-12">
          <button class="btn btn-neon" type="submit">Solicitar turno</button>
          <div class="alert alert-success d-none mt-3" role="status" data-ok>
            ¡Turno solicitado! Te confirmamos por WhatsApp.
          </div>
        </div>
      </form>
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
