<?php
// Campos del formulario de producto. Lo usan crear.php y editar.php
// Necesita $producto (array con los datos), $categorias y $error
?>
            <?php if ($error != ''): ?>
              <div class="alert alert-danger mb-0" role="alert"><?= $error ?></div>
            <?php endif; ?>
            <div class="col-md-8">
              <label for="nombre" class="form-label">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre"
                value="<?= htmlspecialchars($producto['nombre']) ?>" required />
            </div>
            <div class="col-md-4">
              <label for="id_categoria" class="form-label">Categoría</label>
              <select class="form-select" id="id_categoria" name="id_categoria">
                <?php foreach ($categorias as $categoria): ?>
                  <option value="<?= $categoria['id_categoria'] ?>"
                    <?= $categoria['id_categoria'] == $producto['id_categoria'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($categoria['nombre']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-12">
              <label for="descripcion" class="form-label">Descripción</label>
              <textarea class="form-control" id="descripcion" name="descripcion" rows="3"><?= htmlspecialchars($producto['descripcion']) ?></textarea>
            </div>
            <div class="col-md-6">
              <label for="precio" class="form-label">Precio ($)</label>
              <input type="number" class="form-control" id="precio" name="precio" min="0" step="0.01"
                value="<?= htmlspecialchars($producto['precio']) ?>" required />
            </div>
            <div class="col-md-6">
              <label for="stock" class="form-label">Stock</label>
              <input type="number" class="form-control" id="stock" name="stock" min="0"
                value="<?= htmlspecialchars($producto['stock']) ?>" required />
            </div>
            <div class="col-md-6">
              <label for="precio_mayorista" class="form-label">Precio mayorista ($)</label>
              <input type="number" class="form-control" id="precio_mayorista" name="precio_mayorista" min="0" step="0.01"
                value="<?= htmlspecialchars($producto['precio_mayorista'] ?? '') ?>" />
              <div class="form-text">Se aplica desde 10 unidades.</div>
            </div>
            <div class="col-md-6">
              <label for="precio_oferta" class="form-label">Precio de oferta ($)</label>
              <input type="number" class="form-control" id="precio_oferta" name="precio_oferta" min="0" step="0.01"
                value="<?= htmlspecialchars($producto['precio_oferta'] ?? '') ?>" />
              <div class="form-text">Opcional. Dejalo vacío si el producto no está en oferta.</div>
            </div>
            <div class="col-12">
              <label for="imagen" class="form-label">Imagen</label>
              <div class="d-flex gap-3 align-items-center">
                <span class="ico flex-shrink-0"><?= imagen_producto($producto, '../') ?></span>
                <input type="file" class="form-control" id="imagen" name="imagen" accept="image/jpeg,image/png,image/webp" />
              </div>
              <div class="form-text">JPG, PNG o WEBP de hasta 2 MB. Si no subís ninguna, se muestra el ícono de la categoría.</div>
              <?php if (!empty($producto['imagen'])): ?>
                <div class="form-check mt-2">
                  <input class="form-check-input" type="checkbox" id="quitar_imagen" name="quitar_imagen" value="1" />
                  <label class="form-check-label" for="quitar_imagen">Quitar la imagen actual</label>
                </div>
              <?php endif; ?>
            </div>
