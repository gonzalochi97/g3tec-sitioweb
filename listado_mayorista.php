<?php
session_start();

require_once 'config/conexion.php';
require_once 'includes/carrito.php';

// Los precios mayoristas solo se muestran a mayoristas validados y al administrador
$puede_ver = isset($_SESSION['rol']) && ($_SESSION['rol'] == 3 || $_SESSION['rol'] == 1);

$categorias = $pdo->query("SELECT * FROM categorias ORDER BY nombre")->fetchAll();
$id_categoria = (int) ($_GET['categoria'] ?? 0);

$sql = "SELECT productos.*, categorias.nombre AS categoria
        FROM productos
        LEFT JOIN categorias ON productos.id_categoria = categorias.id_categoria";
$parametros = [];
if ($id_categoria > 0) {
    $sql .= " WHERE productos.id_categoria = :categoria";
    $parametros[':categoria'] = $id_categoria;
}
$sql .= " ORDER BY categorias.nombre, productos.nombre";

$stmt = $pdo->prepare($sql);
$stmt->execute($parametros);
$productos = $stmt->fetchAll();

$filtros = $id_categoria > 0 ? 'categoria=' . $id_categoria : '';

$aviso = $_SESSION['aviso'] ?? '';
unset($_SESSION['aviso']);

$titulo_pagina = "Listado mayorista";
$descripcion_pagina = "Listado de productos con precios por cantidad para clientes mayoristas.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item"><a href="mayorista.php">Venta mayorista</a></li>
          <li class="breadcrumb-item active" aria-current="page">Listado de productos mayorista</li>
        </ol>
      </nav>
      <h1 class="display-6 fw-bold">Listado de productos mayorista</h1>
      <p class="text-secondary">
        Precios por cantidad y carga rápida de tu pedido especial (mínimo <?= MINIMO_MAYORISTA ?> u por producto).
      </p>

      <?php if ($aviso != ''): ?>
        <div class="alert alert-success aviso-flotante shadow" role="status"><?= htmlspecialchars($aviso) ?></div>
      <?php endif; ?>

      <?php if (!$puede_ver): ?>
        <div class="g3-card p-4">
          <p class="mb-3">
            <i class="bi bi-info-circle text-neon" aria-hidden="true"></i>
            Los precios mayoristas se muestran solo a cuentas validadas.
          </p>
          <?php if (isset($_SESSION['usuario_id'])): ?>
            <a class="btn btn-neon" href="registro.php">Pedir cuenta mayorista</a>
          <?php else: ?>
            <a class="btn btn-neon" href="auth/login.php">Ingresar</a>
            <a class="btn btn-outline-neon" href="registro.php">Registrarme como mayorista</a>
          <?php endif; ?>
        </div>
      <?php else: ?>
        <div class="d-flex flex-wrap gap-2 mb-3">
          <a href="listado_mayorista.php" class="btn btn-sm rounded-pill <?= $id_categoria == 0 ? 'btn-neon' : 'btn-outline-neon' ?>">Todos</a>
          <?php foreach ($categorias as $categoria): ?>
            <a href="listado_mayorista.php?categoria=<?= $categoria['id_categoria'] ?>"
              class="btn btn-sm rounded-pill <?= $categoria['id_categoria'] == $id_categoria ? 'btn-neon' : 'btn-outline-neon' ?>">
              <?= htmlspecialchars($categoria['nombre']) ?>
            </a>
          <?php endforeach; ?>
        </div>

        <div class="g3-card p-2 table-responsive">
          <table class="table align-middle mb-0">
            <thead>
              <tr>
                <th scope="col">Producto</th>
                <th scope="col">Categoría</th>
                <th scope="col">Unitario</th>
                <th scope="col"><?= MINIMO_MAYORISTA ?>+ u</th>
                <th scope="col">Cant.</th>
                <th scope="col"><span class="visually-hidden">Agregar</span></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($productos as $producto): ?>
                <tr id="producto-<?= $producto['id_producto'] ?>">
                  <th scope="row" class="fw-semibold">
                    <i class="bi <?= icono_categoria($producto['categoria']) ?> text-neon me-1" aria-hidden="true"></i>
                    <?= htmlspecialchars($producto['nombre']) ?>
                  </th>
                  <td class="small"><?= htmlspecialchars($producto['categoria']) ?></td>
                  <td class="text-nowrap"><?= pesos(precio_unitario($producto, 1)) ?></td>
                  <td class="text-nowrap fw-bold text-neon"><?= pesos(precio_unitario($producto, MINIMO_MAYORISTA)) ?></td>
                  <td colspan="2">
                      <form method="POST" action="carrito.php" class="d-flex gap-2">
                        <input type="hidden" name="accion" value="agregar" />
                        <input type="hidden" name="id_producto" value="<?= $producto['id_producto'] ?>" />
                        <input type="hidden" name="pagina" value="listado_mayorista.php" />
                        <input type="hidden" name="volver" value="<?= $filtros ?>" />
                        <label class="visually-hidden" for="cantidad-<?= $producto['id_producto'] ?>">Cantidad</label>
                        <input id="cantidad-<?= $producto['id_producto'] ?>" name="cantidad" type="number"
                          min="<?= MINIMO_MAYORISTA ?>" value="<?= MINIMO_MAYORISTA ?>"
                          class="form-control form-control-sm" style="width: 5rem" />
                        <button type="submit" class="btn btn-neon btn-sm"
                          aria-label="Agregar <?= htmlspecialchars($producto['nombre']) ?> al carrito">
                          <i class="bi bi-cart-plus" aria-hidden="true"></i>
                        </button>
                      </form>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      <?php endif; ?>
    </main>
<?php require_once 'includes/footer.php'; ?>
