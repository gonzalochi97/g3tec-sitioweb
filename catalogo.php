<?php
$titulo_pagina = "Catálogo";
$descripcion_pagina = "Catálogo de insumos informáticos, tecnología, electro, cargadores y audio con precios mayoristas.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
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
<?php require_once 'includes/footer.php'; ?>
