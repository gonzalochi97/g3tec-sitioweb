<?php
$titulo_pagina = "Términos y condiciones";
$descripcion_pagina = "Términos y condiciones de compra, envíos, garantía y servicio técnico de G3 Tec.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Términos y condiciones</li>
        </ol>
      </nav>
      <h1 class="display-6 fw-bold">Términos y condiciones</h1>
      <p class="text-secondary col-lg-6">
        Última actualización: noviembre 2026. Texto de ejemplo, reemplazar por el texto legal definitivo.
      </p>
      <div class="g3-card p-4 col-lg-8">
        <h2 class="h5 fw-bold">1. Generalidades</h2>
        <p class="text-secondary">
          Al utilizar este sitio aceptás los presentes términos y condiciones. <?= APP_NAME ?> se reserva el
          derecho de modificarlos en cualquier momento.
        </p>
        <h2 class="h5 fw-bold">2. Precios y stock</h2>
        <p class="text-secondary">
          Los precios están expresados en pesos argentinos (ARS) e incluyen IVA. Las compras minoristas no tienen
          monto mínimo. Los precios mayoristas aplican solo a cuentas validadas. El stock puede variar sin previo aviso.
        </p>
        <h2 class="h5 fw-bold">3. Envíos</h2>
        <p class="text-secondary">
          Realizamos envíos a todo el país. Los plazos de entrega son estimados y dependen del transportista.
        </p>
        <h2 class="h5 fw-bold">4. Garantía y devoluciones</h2>
        <p class="text-secondary">
          Todos los productos cuentan con garantía. Podés ejercer el derecho de arrepentimiento dentro de los
          10 días de recibida la compra.
        </p>
        <h2 class="h5 fw-bold">5. Servicio técnico</h2>
        <p class="text-secondary mb-0">
          Las reparaciones cuentan con garantía de 90 días sobre el trabajo realizado. Los equipos no retirados
          en 90 días podrán considerarse abandonados.
        </p>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
