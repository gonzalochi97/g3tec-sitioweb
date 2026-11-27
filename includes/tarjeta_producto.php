<?php
// Tarjeta de un producto del catalogo. Necesita $producto
?>
            <div class="col">
              <article class="card h-100 card-hover p-3">
                <div class="prod-img mb-3"><i class="bi <?= icono_categoria($producto['categoria']) ?>" aria-hidden="true"></i></div>
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
                  <p class="wholesale mb-3">Mayorista desde <?= MINIMO_MAYORISTA ?> u: <strong><?= pesos($producto['precio_mayorista']) ?></strong></p>
                <?php endif; ?>
                <form class="mt-auto" method="POST" action="carrito.php">
                  <input type="hidden" name="accion" value="agregar" />
                  <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>" />
                  <?php if ($producto['stock'] > 0): ?>
                    <button type="submit" class="btn btn-neon btn-sm w-100"
                      aria-label="Agregar <?= htmlspecialchars($producto['nombre']) ?> al carrito">
                      <i class="bi bi-cart-plus" aria-hidden="true"></i> Agregar
                    </button>
                  <?php else: ?>
                    <button type="button" class="btn btn-outline-secondary btn-sm w-100" disabled>Sin stock</button>
                  <?php endif; ?>
                </form>
              </article>
            </div>
