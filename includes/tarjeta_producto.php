<?php
// Tarjeta de un producto del catalogo. Necesita $producto, $filtros y $es_mayorista
require_once __DIR__ . '/imagen_producto.php';
?>
            <div class="col">
              <article id="producto-<?= $producto['id_producto'] ?>" class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><?= imagen_producto($producto) ?></div>
                <p class="small text-secondary mb-1"><?= htmlspecialchars($producto['categoria']) ?></p>
                <h2 class="h6 fw-semibold"><?= htmlspecialchars($producto['nombre']) ?></h2>
                <?php if (tiene_oferta($producto)): ?>
                  <p class="mb-0">
                    <span class="badge badge-neon me-1">Oferta</span>
                    <del class="text-secondary small"><?= pesos($producto['precio']) ?></del>
                  </p>
                  <p class="price mb-0"><?= pesos($producto['precio_oferta']) ?></p>
                <?php else: ?>
                  <p class="price mb-0"><?= pesos($producto['precio']) ?></p>
                <?php endif; ?>
                <p class="small text-secondary mb-2">Precio por unidad · ARS</p>
                <?php if (precio_unitario($producto, MINIMO_MAYORISTA) < precio_unitario($producto, 1)): ?>
                  <p class="wholesale mb-2">Mayorista desde <?= MINIMO_MAYORISTA ?> u: <strong><?= pesos($producto['precio_mayorista']) ?></strong></p>
                <?php endif; ?>
                <?php if ($es_mayorista): ?>
                  <p class="small text-secondary mb-3">Pedido especial desde <?= MINIMO_MAYORISTA ?> u.</p>
                <?php else: ?>
                  <p class="small mb-3 <?= $producto['stock'] > 0 ? 'text-secondary' : 'text-danger' ?>">
                    <i class="bi bi-box-seam" aria-hidden="true"></i> Stock disponible: <?= $producto['stock'] ?> u.
                  </p>
                <?php endif; ?>
                <form class="mt-auto d-flex gap-2" method="POST" action="carrito.php">
                  <?= campo_csrf() ?>
                  <input type="hidden" name="accion" value="agregar" />
                  <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>" />
                  <input type="hidden" name="volver" value="<?= htmlspecialchars($filtros) ?>" />
                  <?php if ($producto['stock'] > 0 || $es_mayorista): ?>
                    <?php if ($es_mayorista): ?>
                      <label class="visually-hidden" for="cantidad-<?= $producto['id_producto'] ?>">Cantidad</label>
                      <input id="cantidad-<?= $producto['id_producto'] ?>" name="cantidad" type="number"
                        min="<?= MINIMO_MAYORISTA ?>" value="<?= MINIMO_MAYORISTA ?>"
                        class="form-control form-control-sm" style="width: 5rem" title="Cantidad" />
                    <?php endif; ?>
                    <button type="submit" class="btn btn-neon btn-sm flex-grow-1"
                      aria-label="Agregar <?= htmlspecialchars($producto['nombre']) ?> al carrito">
                      <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                    </button>
                  <?php else: ?>
                    <button type="button" class="btn btn-outline-secondary btn-sm w-100" disabled>Sin stock</button>
                  <?php endif; ?>
                </form>
              </article>
            </div>
