<?php
$titulo_pagina = "Tu carrito";
$descripcion_pagina = "Revisá los productos de tu carrito y finalizá la compra.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tu carrito</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Compra</p>
      <h1 class="display-6 fw-bold">Tu carrito</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        El precio mayorista se aplica automáticamente desde 10 unidades del mismo producto.
      </p>
      <div class="row g-4">
        <div class="col-lg-8">
          <ul class="list-group g3-card">
            <li class="list-group-item bg-transparent d-flex align-items-center gap-3 py-3">
              <span class="ico flex-shrink-0"
                ><i class="bi bi-lightning-charge" aria-hidden="true"></i
              ></span>
              <div class="flex-grow-1">
                <h2 class="h6 fw-semibold mb-0">Cargador GaN 65W</h2>
                <p class="small text-secondary mb-0">$ 39.900 c/u</p>
              </div>
              <label class="visually-hidden" for="qCarg">Cantidad de Cargador GaN 65W</label
              ><input
                id="qCarg"
                type="number"
                min="1"
                value="1"
                class="form-control form-control-sm"
                style="width: 5rem"
              /><strong class="text-nowrap">$ 39.900</strong>
            </li>
            <li class="list-group-item bg-transparent d-flex align-items-center gap-3 py-3">
              <span class="ico flex-shrink-0"><i class="bi bi-usb-c" aria-hidden="true"></i></span>
              <div class="flex-grow-1">
                <h2 class="h6 fw-semibold mb-0">Cable USB-C a USB-C 60W 1 m</h2>
                <p class="small text-secondary mb-0">$ 5.900 c/u · precio mayorista</p>
              </div>
              <label class="visually-hidden" for="qCabl"
                >Cantidad de Cable USB-C a USB-C 60W 1 m</label
              ><input
                id="qCabl"
                type="number"
                min="1"
                value="10"
                class="form-control form-control-sm"
                style="width: 5rem"
              /><strong class="text-nowrap">$ 59.000</strong>
            </li>
            <li class="list-group-item bg-transparent d-flex align-items-center gap-3 py-3">
              <span class="ico flex-shrink-0"
                ><i class="bi bi-earbuds" aria-hidden="true"></i
              ></span>
              <div class="flex-grow-1">
                <h2 class="h6 fw-semibold mb-0">Auriculares TWS ANC</h2>
                <p class="small text-secondary mb-0">$ 34.900 c/u</p>
              </div>
              <label class="visually-hidden" for="qAuri">Cantidad de Auriculares TWS ANC</label
              ><input
                id="qAuri"
                type="number"
                min="1"
                value="2"
                class="form-control form-control-sm"
                style="width: 5rem"
              /><strong class="text-nowrap">$ 69.800</strong>
            </li>
          </ul>
        </div>
        <div class="col-lg-4">
          <div class="g3-card p-4">
            <h2 class="h5 fw-bold">Resumen del pedido</h2>
            <dl class="row small mb-0">
              <dt class="col-7 fw-normal text-secondary">Subtotal</dt>
              <dd class="col-5 text-end">$ 168.700</dd>
              <dt class="col-7 fw-normal text-secondary">Envío</dt>
              <dd class="col-5 text-end">A calcular</dd>
              <dt class="col-7">Total</dt>
              <dd class="col-5 text-end price">$ 168.700</dd>
            </dl>
            <a href="cuenta.php" class="btn btn-neon w-100 mt-3">Finalizar compra</a
            ><a href="catalogo.php" class="btn btn-outline-neon w-100 mt-2">Seguir comprando</a>
          </div>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
