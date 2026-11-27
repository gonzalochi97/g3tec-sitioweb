<?php
$titulo_pagina = "Venta mayorista";
$descripcion_pagina = "Venta mayorista para comercios: registro con CUIT, validación y listado de precios por cantidad.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Venta mayorista</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Venta mayorista</p>
      <h1 class="display-6 fw-bold">Comprá al por mayor para tu comercio</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Registrate con tu CUIT, validamos tu cuenta y accedés al listado con precios por cantidad.
        También podés comprar por unidad sin registrarte.
      </p>
      <div class="row g-3 my-4">
        <div class="col-md-4">
          <div class="g3-card p-4 h-100">
            <span class="step-num mb-3">1</span>
            <h2 class="h5 fw-bold">Registro</h2>
            <p class="text-secondary mb-0">Completá tus datos y CUIT en 2 minutos.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="g3-card p-4 h-100">
            <span class="step-num mb-3">2</span>
            <h2 class="h5 fw-bold">Validación</h2>
            <p class="text-secondary mb-0">Aprobamos tu cuenta en menos de 24 h hábiles.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="g3-card p-4 h-100">
            <span class="step-num mb-3">3</span>
            <h2 class="h5 fw-bold">Listado de productos</h2>
            <p class="text-secondary mb-0">Precios mayoristas y stock en tiempo real.</p>
          </div>
        </div>
      </div>
      <div class="d-flex flex-wrap gap-2 mb-5">
        <a href="registro.php" class="btn btn-neon">Registrarme como mayorista</a>
        <a href="listado_mayorista.php" class="btn btn-outline-neon">Ver listado mayorista</a>
      </div>
      <h2 class="h3 fw-bold">Listado de precios mayoristas</h2>
      <div class="table-responsive g3-card p-2">
        <table class="table align-middle mb-0">
          <caption class="px-2">
            Precios de ejemplo en pesos argentinos (ARS).
          </caption>
          <thead>
            <tr>
              <th scope="col">Producto</th>
              <th scope="col">Categoría</th>
              <th scope="col">1 u</th>
              <th scope="col">10+ u</th>
              <th scope="col">50+ u</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">Cable USB-C a USB-C 60W 1 m</th>
              <td>Insumos informáticos</td>
              <td>$ 6.900</td>
              <td>$ 5.900</td>
              <td>$ 5.200</td>
            </tr>
            <tr>
              <th scope="row">Mouse inalámbrico 2.4G</th>
              <td>Insumos informáticos</td>
              <td>$ 9.800</td>
              <td>$ 8.300</td>
              <td>$ 7.400</td>
            </tr>
            <tr>
              <th scope="row">Teclado USB español</th>
              <td>Insumos informáticos</td>
              <td>$ 15.900</td>
              <td>$ 13.500</td>
              <td>$ 11.900</td>
            </tr>
            <tr>
              <th scope="row">Disco SSD 480 GB</th>
              <td>Tecnología</td>
              <td>$ 42.900</td>
              <td>$ 36.500</td>
              <td>$ 32.200</td>
            </tr>
            <tr>
              <th scope="row">Router WiFi 6</th>
              <td>Tecnología</td>
              <td>$ 69.900</td>
              <td>$ 59.400</td>
              <td>$ 52.400</td>
            </tr>
            <tr>
              <th scope="row">Smartwatch AMOLED</th>
              <td>Tecnología</td>
              <td>$ 54.900</td>
              <td>$ 46.700</td>
              <td>$ 41.200</td>
            </tr>
            <tr>
              <th scope="row">Pava eléctrica 1,7 L</th>
              <td>Electro</td>
              <td>$ 36.900</td>
              <td>$ 31.400</td>
              <td>$ 27.700</td>
            </tr>
            <tr>
              <th scope="row">Freidora de aire 4 L</th>
              <td>Electro</td>
              <td>$ 129.900</td>
              <td>$ 110.400</td>
              <td>$ 97.400</td>
            </tr>
            <tr>
              <th scope="row">Cargador GaN 65W</th>
              <td>Cargadores y fuentes</td>
              <td>$ 39.900</td>
              <td>$ 33.900</td>
              <td>$ 29.900</td>
            </tr>
            <tr>
              <th scope="row">Power bank 10.000 mAh</th>
              <td>Cargadores y fuentes</td>
              <td>$ 32.900</td>
              <td>$ 28.000</td>
              <td>$ 24.700</td>
            </tr>
            <tr>
              <th scope="row">Auriculares TWS ANC</th>
              <td>Audio y auriculares</td>
              <td>$ 34.900</td>
              <td>$ 29.700</td>
              <td>$ 26.200</td>
            </tr>
            <tr>
              <th scope="row">Parlante Bluetooth 10W</th>
              <td>Audio y auriculares</td>
              <td>$ 38.500</td>
              <td>$ 32.700</td>
              <td>$ 28.900</td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
