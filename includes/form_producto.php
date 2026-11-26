<?php
// Campos del formulario de producto. Lo usan crear.php y editar.php
// Necesita $producto (array con los datos) y $categorias
?>
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
