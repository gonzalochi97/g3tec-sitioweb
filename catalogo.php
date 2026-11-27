<?php
session_start();

require_once 'config/conexion.php';
require_once 'includes/carrito.php';

$categorias = $pdo->query("SELECT * FROM categorias ORDER BY nombre")->fetchAll();

$q = trim($_GET['q'] ?? '');
$id_categoria = (int) ($_GET['categoria'] ?? 0);
$solo_ofertas = isset($_GET['ofertas']);
$orden = $_GET['orden'] ?? '';

$ordenes = [
    'menor' => 'precio_actual ASC',
    'mayor' => 'precio_actual DESC',
];

// El precio actual es el de oferta si tiene, si no el precio normal
$sql = "SELECT productos.*, categorias.nombre AS categoria,
               IF(precio_oferta IS NOT NULL AND precio_oferta < precio, precio_oferta, precio) AS precio_actual
        FROM productos
        LEFT JOIN categorias ON productos.id_categoria = categorias.id_categoria
        WHERE 1 = 1";
$parametros = [];

if ($q != '') {
    $sql .= " AND productos.nombre LIKE :q";
    $parametros[':q'] = "%$q%";
}
if ($id_categoria > 0) {
    $sql .= " AND productos.id_categoria = :categoria";
    $parametros[':categoria'] = $id_categoria;
}
if ($solo_ofertas) {
    $sql .= " AND precio_oferta IS NOT NULL AND precio_oferta < precio";
}

if (isset($ordenes[$orden])) {
    $sql .= " ORDER BY " . $ordenes[$orden];
} else {
    $sql .= " ORDER BY productos.nombre";
}

$stmt = $pdo->prepare($sql);
$stmt->execute($parametros);
$productos = $stmt->fetchAll();

$total_ofertas = $pdo->query("SELECT COUNT(*) FROM productos
                              WHERE precio_oferta IS NOT NULL AND precio_oferta < precio")->fetchColumn();

// Filtros actuales, para volver al mismo lugar despues de agregar al carrito
$filtros = http_build_query(array_filter([
    'q' => $q,
    'categoria' => $id_categoria,
    'ofertas' => $solo_ofertas ? 1 : 0,
    'orden' => $orden,
]));

$es_mayorista = isset($_SESSION['rol']) && $_SESSION['rol'] == 3;

$aviso = $_SESSION['aviso'] ?? '';
unset($_SESSION['aviso']);

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
        Todos nuestros productos con precio por unidad y precio mayorista desde <?= MINIMO_MAYORISTA ?> unidades.
        Valores en pesos argentinos (ARS).
      </p>

      <?php if ($aviso != ''): ?>
        <div class="alert alert-success aviso-flotante shadow" role="status"><?= htmlspecialchars($aviso) ?></div>
      <?php endif; ?>

      <div class="row g-4 mt-1">
        <aside class="col-lg-3" aria-label="Filtros">
          <div class="g3-card p-3">
            <h2 class="h6 fw-bold">Categorías</h2>
            <div class="list-group list-group-flush small">
              <a href="catalogo.php"
                class="list-group-item list-group-item-action bg-transparent filtro <?= $id_categoria == 0 && !$solo_ofertas ? 'active' : '' ?>">Todos</a>
              <a href="catalogo.php?ofertas=1"
                class="list-group-item list-group-item-action bg-transparent filtro filtro-ofertas d-flex justify-content-between align-items-center <?= $solo_ofertas ? 'active' : '' ?>">
                <span><i class="bi bi-tag-fill" aria-hidden="true"></i> Ofertas</span>
                <span class="badge rounded-pill badge-neon"><?= $total_ofertas ?></span>
              </a>
              <?php foreach ($categorias as $categoria): ?>
                <a href="catalogo.php?categoria=<?= $categoria['id_categoria'] ?>"
                  class="list-group-item list-group-item-action bg-transparent filtro <?= $categoria['id_categoria'] == $id_categoria ? 'active' : '' ?>">
                  <?= htmlspecialchars($categoria['nombre']) ?>
                </a>
              <?php endforeach; ?>
            </div>
          </div>
        </aside>
        <div class="col-lg-9">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <p class="small text-secondary mb-0">
              Mostrando <?= count($productos) ?> productos
              <?php if ($q != ''): ?>para "<?= htmlspecialchars($q) ?>"<?php endif; ?>
            </p>
            <form method="GET" action="catalogo.php">
              <input type="hidden" name="q" value="<?= htmlspecialchars($q) ?>" />
              <?php if ($id_categoria > 0): ?>
                <input type="hidden" name="categoria" value="<?= $id_categoria ?>" />
              <?php endif; ?>
              <?php if ($solo_ofertas): ?>
                <input type="hidden" name="ofertas" value="1" />
              <?php endif; ?>
              <label for="orden" class="visually-hidden">Ordenar</label>
              <select id="orden" name="orden" class="form-select form-select-sm" onchange="this.form.submit()">
                <option value="">Por nombre</option>
                <option value="menor" <?= $orden == 'menor' ? 'selected' : '' ?>>Menor precio</option>
                <option value="mayor" <?= $orden == 'mayor' ? 'selected' : '' ?>>Mayor precio</option>
              </select>
            </form>
          </div>
          <?php if (count($productos) == 0): ?>
            <div class="alert alert-secondary">No encontramos productos con esos filtros.</div>
          <?php endif; ?>
          <div class="row row-cols-1 row-cols-sm-2 row-cols-xl-3 g-3">
            <?php foreach ($productos as $producto): ?>
              <?php require 'includes/tarjeta_producto.php'; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
