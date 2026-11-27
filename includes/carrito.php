<?php
// Funciones de precios y del carrito. El carrito se guarda en
// $_SESSION['carrito'] como [id_producto => cantidad]
define('MINIMO_MAYORISTA', 10);

function pesos($numero)
{
    return '$ ' . number_format($numero, 0, ',', '.');
}

function tiene_oferta($producto)
{
    return $producto['precio_oferta'] !== null && $producto['precio_oferta'] < $producto['precio'];
}

// Precio por unidad: el de oferta si tiene, y el mayorista desde 10 u si es mas barato
function precio_unitario($producto, $cantidad)
{
    $precio = $producto['precio'];

    if (tiene_oferta($producto)) {
        $precio = $producto['precio_oferta'];
    }

    if ($cantidad >= MINIMO_MAYORISTA && $producto['precio_mayorista'] !== null
        && $producto['precio_mayorista'] < $precio) {
        $precio = $producto['precio_mayorista'];
    }

    return $precio;
}

function icono_categoria($categoria)
{
    $iconos = [
        'Insumos informáticos' => 'bi-keyboard',
        'Tecnología' => 'bi-cpu',
        'Electro' => 'bi-plug',
        'Cargadores' => 'bi-lightning-charge',
        'Audio' => 'bi-earbuds',
    ];

    return $iconos[$categoria] ?? 'bi-box-seam';
}

// Devuelve los productos del carrito con su precio y subtotal (leidos de la base)
function es_mayorista()
{
    return isset($_SESSION['rol']) && $_SESSION['rol'] == 3;
}

function items_carrito($pdo)
{
    $items = [];
    $carrito = $_SESSION['carrito'] ?? [];

    $stmt = $pdo->prepare("SELECT productos.*, categorias.nombre AS categoria
                           FROM productos
                           LEFT JOIN categorias ON productos.id_categoria = categorias.id_categoria
                           WHERE id_producto = :id");

    foreach ($carrito as $id => $cantidad) {
        $stmt->execute([':id' => $id]);
        $producto = $stmt->fetch();

        if (!$producto) {
            unset($_SESSION['carrito'][$id]);
            continue;
        }

        $precio = precio_unitario($producto, $cantidad);

        $items[] = [
            'producto' => $producto,
            'cantidad' => $cantidad,
            'precio' => $precio,
            'subtotal' => $precio * $cantidad,
        ];
    }

    return $items;
}

function total_carrito($items)
{
    $total = 0;
    foreach ($items as $item) {
        $total += $item['subtotal'];
    }
    return $total;
}
