<?php
session_start();

require_once 'config/conexion.php';
require_once 'includes/csrf.php';
require_once 'includes/carrito.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verificar_csrf();

    $accion = $_POST['accion'] ?? '';
    $id = (int) ($_POST['id_producto'] ?? 0);

    $stmt = $pdo->prepare("SELECT nombre, stock FROM productos WHERE id_producto = :id");
    $stmt->execute([':id' => $id]);
    $producto = $stmt->fetch();

    // Desde el catalogo: suma 1 (o la cantidad elegida si es mayorista) y vuelve al catalogo
    if ($accion == 'agregar') {
        // El mayorista arma un pedido especial: minimo 10 u y no depende del stock
        if (es_mayorista() && $producto) {
            $en_carrito = $_SESSION['carrito'][$id] ?? 0;
            $cantidad = $en_carrito + max(MINIMO_MAYORISTA, (int) ($_POST['cantidad'] ?? 0));
            $_SESSION['carrito'][$id] = $cantidad;
            $_SESSION['aviso'] = 'Agregaste ' . $producto['nombre'] . ' al pedido (' . $cantidad . ' en total).';
        } elseif ($producto && $producto['stock'] > 0) {
            $en_carrito = $_SESSION['carrito'][$id] ?? 0;
            $cantidad = min($en_carrito + 1, $producto['stock']);
            $_SESSION['carrito'][$id] = $cantidad;

            if ($cantidad == $en_carrito) {
                $_SESSION['aviso'] = 'Ya tenés en el carrito todo el stock disponible de ' . $producto['nombre'] . '.';
            } else {
                $_SESSION['aviso'] = 'Agregaste ' . $producto['nombre'] . ' al carrito (' . $cantidad . ' en total).';
            }
        }

        // Vuelve a la pagina desde donde agrego (catalogo o listado mayorista)
        $pagina = 'catalogo.php';
        if (($_POST['pagina'] ?? '') == 'listado_mayorista.php') {
            $pagina = 'listado_mayorista.php';
        }
        parse_str($_POST['volver'] ?? '', $filtros);
        header('Location: ' . $pagina . '?' . http_build_query($filtros) . '#producto-' . $id);
        exit;
    }

    if ($accion == 'actualizar' && $producto) {
        $cantidad = (int) $_POST['cantidad'];
        if ($cantidad > 0 && es_mayorista()) {
            $_SESSION['carrito'][$id] = max($cantidad, MINIMO_MAYORISTA);
        } elseif ($cantidad > 0) {
            $_SESSION['carrito'][$id] = min($cantidad, $producto['stock']);
        } else {
            unset($_SESSION['carrito'][$id]);
        }
    }

    if ($accion == 'quitar') {
        unset($_SESSION['carrito'][$id]);
    }

    if ($accion == 'vaciar') {
        $_SESSION['carrito'] = [];
    }

    header('Location: carrito.php');
    exit;
}

$items = items_carrito($pdo);
$total = total_carrito($items);
$es_mayorista = es_mayorista();

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
        <?php if ($es_mayorista): ?>
          Pedido especial mayorista: mínimo <?= MINIMO_MAYORISTA ?> unidades por producto. Lo revisamos y te confirmamos.
        <?php else: ?>
          El precio mayorista se aplica automáticamente desde <?= MINIMO_MAYORISTA ?> unidades del mismo producto.
        <?php endif; ?>
      </p>
      <?php if (count($items) == 0): ?>
        <div class="g3-card p-4">
          <p class="mb-3">Tu carrito está vacío.</p>
          <a href="catalogo.php" class="btn btn-neon">Ver el catálogo</a>
        </div>
      <?php else: ?>
        <div class="row g-4">
          <div class="col-lg-8">
            <ul class="list-group g3-card">
              <?php foreach ($items as $item): ?>
                <?php $producto = $item['producto']; ?>
                <li class="list-group-item bg-transparent d-flex align-items-center gap-3 py-3 flex-wrap">
                  <span class="ico flex-shrink-0"><i class="bi <?= icono_categoria($producto['categoria']) ?>" aria-hidden="true"></i></span>
                  <div class="flex-grow-1">
                    <h2 class="h6 fw-semibold mb-0"><?= htmlspecialchars($producto['nombre']) ?></h2>
                    <p class="small text-secondary mb-0">
                      <?= pesos($item['precio']) ?> c/u
                      <?php if ($item['precio'] < $producto['precio']): ?>
                        · <del><?= pesos($producto['precio']) ?></del>
                      <?php endif; ?>
                      <?php if ($item['cantidad'] >= MINIMO_MAYORISTA && $item['precio'] == $producto['precio_mayorista']): ?>
                        · precio mayorista
                      <?php elseif (tiene_oferta($producto)): ?>
                        · oferta
                      <?php endif; ?>
                    </p>
                    <?php if (!$es_mayorista): ?>
                      <p class="small text-secondary mb-0">Stock disponible: <?= $producto['stock'] ?> u.</p>
                    <?php endif; ?>
                  </div>
                  <form method="POST" action="carrito.php" class="d-flex gap-2">
                    <?= campo_csrf() ?>
                    <input type="hidden" name="accion" value="actualizar" />
                    <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>" />
                    <label class="visually-hidden" for="cant<?= $producto['id_producto'] ?>">Cantidad de <?= htmlspecialchars($producto['nombre']) ?></label>
                    <input id="cant<?= $producto['id_producto'] ?>" name="cantidad" type="number" min="0"
                      <?= $es_mayorista ? '' : 'max="' . $producto['stock'] . '"' ?> value="<?= $item['cantidad'] ?>"
                      class="form-control form-control-sm" style="width: 5rem" />
                    <button type="submit" class="btn btn-sm btn-outline-neon" aria-label="Actualizar cantidad">
                      <i class="bi bi-arrow-repeat" aria-hidden="true"></i>
                    </button>
                  </form>
                  <strong class="text-nowrap"><?= pesos($item['subtotal']) ?></strong>
                  <form method="POST" action="carrito.php">
                    <?= campo_csrf() ?>
                    <input type="hidden" name="accion" value="quitar" />
                    <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>" />
                    <button type="submit" class="btn btn-sm btn-outline-danger"
                      aria-label="Quitar <?= htmlspecialchars($producto['nombre']) ?>">
                      <i class="bi bi-trash" aria-hidden="true"></i>
                    </button>
                  </form>
                </li>
              <?php endforeach; ?>
            </ul>
            <form method="POST" action="carrito.php" class="mt-2">
              <?= campo_csrf() ?>
              <input type="hidden" name="accion" value="vaciar" />
              <button type="submit" class="btn btn-sm btn-outline-secondary">Vaciar carrito</button>
            </form>
          </div>
          <div class="col-lg-4">
            <div class="g3-card p-4">
              <h2 class="h5 fw-bold">Resumen del pedido</h2>
              <dl class="row small mb-0">
                <dt class="col-7 fw-normal text-secondary">Subtotal</dt>
                <dd class="col-5 text-end"><?= pesos($total) ?></dd>
                <dt class="col-7 fw-normal text-secondary">Envío</dt>
                <dd class="col-5 text-end">A calcular</dd>
                <dt class="col-7">Total</dt>
                <dd class="col-5 text-end price"><?= pesos($total) ?></dd>
              </dl>
              <a href="compra.php" class="btn btn-neon w-100 mt-3"><?= $es_mayorista ? 'Enviar pedido especial' : 'Finalizar compra' ?></a>
              <a href="catalogo.php" class="btn btn-outline-neon w-100 mt-2">Seguir comprando</a>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </main>
<?php require_once 'includes/footer.php'; ?>
