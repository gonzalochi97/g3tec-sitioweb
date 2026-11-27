<?php
session_start();

// Para comprar hay que iniciar sesion
if (!isset($_SESSION['usuario_id'])) {
    header('Location: auth/login.php?error=acceso_denegado');
    exit;
}

require_once 'config/conexion.php';
require_once 'includes/carrito.php';

$error = '';
$items = items_carrito($pdo);
$total = total_carrito($items);
$es_mayorista = es_mayorista();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && count($items) > 0) {

    try {
        $pdo->beginTransaction();

        // El pedido del mayorista es especial: queda pendiente y no descuenta stock
        $tipo = $es_mayorista ? 'especial' : 'minorista';
        $estado = $es_mayorista ? 'pendiente' : 'confirmado';

        $stmt = $pdo->prepare("INSERT INTO pedidos (id_usuario, total, tipo, estado)
                               VALUES (:usuario, :total, :tipo, :estado)");
        $stmt->execute([
            ':usuario' => $_SESSION['usuario_id'],
            ':total' => $total,
            ':tipo' => $tipo,
            ':estado' => $estado,
        ]);
        $id_pedido = $pdo->lastInsertId();

        $detalle = $pdo->prepare("INSERT INTO detalle_pedidos (id_pedido, id_producto, cantidad, precio_unitario)
                                  VALUES (:pedido, :producto, :cantidad, :precio)");

        // Solo descuenta si alcanza el stock
        $stock = $pdo->prepare("UPDATE productos SET stock = stock - :cantidad
                                WHERE id_producto = :producto AND stock >= :cantidad2");

        foreach ($items as $item) {
            $id_producto = $item['producto']['id_producto'];

            if (!$es_mayorista) {
                $stock->execute([
                    ':cantidad' => $item['cantidad'],
                    ':cantidad2' => $item['cantidad'],
                    ':producto' => $id_producto,
                ]);

                if ($stock->rowCount() == 0) {
                    throw new Exception('No hay stock suficiente de ' . $item['producto']['nombre'] . '.');
                }
            }

            $detalle->execute([
                ':pedido' => $id_pedido,
                ':producto' => $id_producto,
                ':cantidad' => $item['cantidad'],
                ':precio' => $item['precio'],
            ]);
        }

        $pdo->commit();

        $_SESSION['carrito'] = [];
        header('Location: compra.php?pedido=' . $id_pedido);
        exit;

    } catch (Exception $e) {
        $pdo->rollBack();
        $error = $e->getMessage();
    }
}

$titulo_pagina = "Finalizar compra";
$descripcion_pagina = "Confirmá tu pedido en G3 Tec.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item"><a href="carrito.php">Tu carrito</a></li>
          <li class="breadcrumb-item active" aria-current="page">Finalizar compra</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Compra</p>
      <h1 class="display-6 fw-bold">Finalizar compra</h1>

      <?php if (isset($_GET['pedido'])): ?>
        <div class="g3-card p-4">
          <?php if ($es_mayorista): ?>
            <div class="alert alert-success" role="status">
              ¡Recibimos tu pedido especial N.º <?= (int) $_GET['pedido'] ?>!
            </div>
            <p class="text-secondary">Lo revisamos y te avisamos cuando esté aprobado. Podés ver el estado en Mi cuenta.</p>
          <?php else: ?>
            <div class="alert alert-success" role="status">
              ¡Gracias por tu compra! Registramos tu pedido N.º <?= (int) $_GET['pedido'] ?>.
            </div>
            <p class="text-secondary">Te vamos a escribir por email para coordinar el pago y el envío.</p>
          <?php endif; ?>
          <a href="cuenta.php" class="btn btn-neon">Ver mis pedidos</a>
          <a href="catalogo.php" class="btn btn-outline-neon">Seguir comprando</a>
        </div>
      <?php elseif (count($items) == 0): ?>
        <div class="g3-card p-4">
          <p class="mb-3">Tu carrito está vacío.</p>
          <a href="catalogo.php" class="btn btn-neon">Ver el catálogo</a>
        </div>
      <?php else: ?>
        <?php if ($error != ''): ?>
          <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <div class="row g-4">
          <div class="col-lg-8">
            <div class="g3-card p-3 table-responsive">
              <table class="table align-middle mb-0">
                <thead>
                  <tr>
                    <th>Producto</th>
                    <th class="text-end">Cantidad</th>
                    <th class="text-end">Precio c/u</th>
                    <th class="text-end">Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($items as $item): ?>
                    <tr>
                      <td><?= htmlspecialchars($item['producto']['nombre']) ?></td>
                      <td class="text-end"><?= $item['cantidad'] ?></td>
                      <td class="text-end"><?= pesos($item['precio']) ?></td>
                      <td class="text-end"><?= pesos($item['subtotal']) ?></td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="col-lg-4">
            <form class="g3-card p-4" method="POST" action="compra.php">
              <h2 class="h5 fw-bold">Total a pagar</h2>
              <p class="price"><?= pesos($total) ?></p>
              <p class="small text-secondary">Comprás como <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>. El envío se coordina después.</p>
              <button type="submit" class="btn btn-neon w-100"><?= $es_mayorista ? 'Enviar pedido especial' : 'Confirmar pedido' ?></button>
              <a href="carrito.php" class="btn btn-outline-neon w-100 mt-2">Volver al carrito</a>
            </form>
          </div>
        </div>
      <?php endif; ?>
    </main>
<?php require_once 'includes/footer.php'; ?>
