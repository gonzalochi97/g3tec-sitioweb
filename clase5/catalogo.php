<?php
$titulo_pagina = "Catálogo";
$descripcion_pagina = "Catálogo de insumos informáticos, tecnología, electro, cargadores y audio con precios mayoristas.";
require_once 'includes/header.php';

$productos = [
    ['nombre' => 'Cable USB-C a USB-C 60W 1 m', 'categoria' => 'Insumos informáticos', 'icono' => 'bi-usb-c', 'precio' => 6900, 'mayorista' => 5900],
    ['nombre' => 'Mouse inalámbrico 2.4G', 'categoria' => 'Insumos informáticos', 'icono' => 'bi-mouse', 'precio' => 9800, 'mayorista' => 8300],
    ['nombre' => 'Teclado USB español', 'categoria' => 'Insumos informáticos', 'icono' => 'bi-keyboard', 'precio' => 15900, 'mayorista' => 13500],
    ['nombre' => 'Disco SSD 480 GB', 'categoria' => 'Tecnología', 'icono' => 'bi-device-ssd', 'precio' => 42900, 'mayorista' => 36500],
    ['nombre' => 'Router WiFi 6', 'categoria' => 'Tecnología', 'icono' => 'bi-router', 'precio' => 69900, 'mayorista' => 59400],
    ['nombre' => 'Smartwatch AMOLED', 'categoria' => 'Tecnología', 'icono' => 'bi-smartwatch', 'precio' => 54900, 'mayorista' => 46700],
    ['nombre' => 'Pava eléctrica 1,7 L', 'categoria' => 'Electro', 'icono' => 'bi-cup-hot', 'precio' => 36900, 'mayorista' => 31400],
    ['nombre' => 'Freidora de aire 4 L', 'categoria' => 'Electro', 'icono' => 'bi-fire', 'precio' => 129900, 'mayorista' => 110400],
    ['nombre' => 'Cargador GaN 65W', 'categoria' => 'Cargadores y fuentes', 'icono' => 'bi-lightning-charge', 'precio' => 39900, 'mayorista' => 33900],
    ['nombre' => 'Power bank 10.000 mAh', 'categoria' => 'Cargadores y fuentes', 'icono' => 'bi-battery-charging', 'precio' => 32900, 'mayorista' => 28000],
    ['nombre' => 'Auriculares TWS ANC', 'categoria' => 'Audio y auriculares', 'icono' => 'bi-earbuds', 'precio' => 34900, 'mayorista' => 29700],
    ['nombre' => 'Parlante Bluetooth 10W', 'categoria' => 'Audio y auriculares', 'icono' => 'bi-speaker', 'precio' => 38500, 'mayorista' => 32700],
];

$categorias = ['Insumos informáticos', 'Tecnología', 'Electro', 'Cargadores y fuentes', 'Audio y auriculares'];

// Datos que llegan por GET ($busqueda ya viene limpia desde header.php)
$categoria = isset($_GET['categoria']) ? limpiar($_GET['categoria']) : '';
$error = '';

// Solo se acepta una categoria que exista en la lista
if ($categoria != '' && !in_array($categoria, $categorias)) {
    $error = 'La categoría elegida no existe. Se muestran todos los productos.';
    $categoria = '';
}

$resultado = [];
foreach ($productos as $producto) {
    $coincide_texto = $busqueda == '' || stripos($producto['nombre'], $busqueda) !== false;
    $coincide_categoria = $categoria == '' || $producto['categoria'] == $categoria;

    if ($coincide_texto && $coincide_categoria) {
        $resultado[] = $producto;
    }
}
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
          <form class="g3-card p-3" action="catalogo.php" method="get">
            <h2 class="h6 fw-bold">Buscar y filtrar</h2>
            <label for="filtro-q" class="form-label small">Producto</label>
            <input
              type="text"
              class="form-control form-control-sm mb-3"
              id="filtro-q"
              name="q"
              placeholder="Ej: mouse"
              value="<?= $busqueda ?>"
            />
            <label for="filtro-categoria" class="form-label small">Categoría</label>
            <select class="form-select form-select-sm mb-3" id="filtro-categoria" name="categoria">
              <option value="">Todas</option>
              <?php foreach ($categorias as $cat): ?>
                <option value="<?= $cat ?>" <?= $cat == $categoria ? 'selected' : '' ?>><?= $cat ?></option>
              <?php endforeach; ?>
            </select>
            <button type="submit" class="btn btn-neon btn-sm w-100">
              <i class="bi bi-funnel" aria-hidden="true"></i> Filtrar
            </button>
            <a href="catalogo.php" class="btn btn-outline-neon btn-sm w-100 mt-2">Limpiar filtros</a>
          </form>
        </aside>
        <div class="col-lg-9">
          <?php if ($error != ''): ?>
            <div class="alert alert-warning" role="alert"><?= $error ?></div>
          <?php endif; ?>

          <?php if ($busqueda != '' || $categoria != ''): ?>
            <p class="small mb-3" role="status">
              Resultados
              <?php if ($busqueda != ''): ?>para "<strong><?= $busqueda ?></strong>"<?php endif; ?>
              <?php if ($categoria != ''): ?>en <strong><?= $categoria ?></strong><?php endif; ?>
              — <?= count($resultado) ?> producto(s).
            </p>
          <?php else: ?>
            <p class="small text-secondary mb-3">Mostrando <?= count($resultado) ?> productos</p>
          <?php endif; ?>

          <?php if (count($resultado) == 0): ?>
            <div class="alert alert-info" role="status">
              No encontramos productos con esa búsqueda. Probá con otra palabra o elegí otra categoría.
            </div>
          <?php endif; ?>

          <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3">
            <?php foreach ($resultado as $producto): ?>
              <div class="col">
                <article class="card h-100 card-hover p-3">
                  <div class="prod-img mb-3"><i class="bi <?= $producto['icono'] ?>" aria-hidden="true"></i></div>
                  <p class="small text-secondary mb-1"><?= $producto['categoria'] ?></p>
                  <h2 class="h6 fw-semibold"><?= $producto['nombre'] ?></h2>
                  <p class="price mb-0">$ <?= number_format($producto['precio'], 0, ',', '.') ?></p>
                  <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                  <p class="wholesale mb-3">
                    Mayorista desde 10 u: <strong>$ <?= number_format($producto['mayorista'], 0, ',', '.') ?></strong>
                  </p>
                  <button
                    type="button"
                    class="btn btn-neon btn-sm mt-auto"
                    aria-label="Agregar <?= $producto['nombre'] ?> al carrito"
                  >
                    <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                  </button>
                </article>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
