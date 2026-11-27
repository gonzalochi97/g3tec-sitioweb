<?php
// Subida y muestra de la imagen de cada producto (se guardan en img/productos)
$tipos_imagen = ['image/jpeg' => 'jpg', 'image/png' => 'png', 'image/webp' => 'webp'];

function error_imagen($archivo)
{
    global $tipos_imagen;

    if (!isset($archivo) || $archivo['error'] == UPLOAD_ERR_NO_FILE) {
        return '';
    }
    if ($archivo['error'] != UPLOAD_ERR_OK || $archivo['size'] > 2 * 1024 * 1024) {
        return 'La imagen tiene que pesar hasta 2 MB.';
    }

    $info = getimagesize($archivo['tmp_name']);
    if (!$info || !isset($tipos_imagen[$info['mime']])) {
        return 'La imagen tiene que ser JPG, PNG o WEBP.';
    }

    return '';
}

function borrar_imagen($pdo, $id)
{
    $stmt = $pdo->prepare("SELECT imagen FROM productos WHERE id_producto = :id");
    $stmt->execute([':id' => $id]);
    $imagen = $stmt->fetchColumn();

    if ($imagen && file_exists(__DIR__ . '/../img/productos/' . $imagen)) {
        unlink(__DIR__ . '/../img/productos/' . $imagen);
    }

    $stmt = $pdo->prepare("UPDATE productos SET imagen = NULL WHERE id_producto = :id");
    $stmt->execute([':id' => $id]);
}

function guardar_imagen($pdo, $archivo, $id)
{
    global $tipos_imagen;

    if (!isset($archivo) || $archivo['error'] != UPLOAD_ERR_OK) {
        return;
    }

    $info = getimagesize($archivo['tmp_name']);
    $nombre = 'producto_' . $id . '.' . $tipos_imagen[$info['mime']];

    borrar_imagen($pdo, $id);
    move_uploaded_file($archivo['tmp_name'], __DIR__ . '/../img/productos/' . $nombre);

    $stmt = $pdo->prepare("UPDATE productos SET imagen = :imagen WHERE id_producto = :id");
    $stmt->execute([':imagen' => $nombre, ':id' => $id]);
}

// Devuelve la foto del producto o, si no tiene, el icono de su categoria
function imagen_producto($producto, $raiz = '')
{
    $ruta = 'img/productos/' . ($producto['imagen'] ?? '');

    if (!empty($producto['imagen']) && file_exists(__DIR__ . '/../' . $ruta)) {
        return '<img src="' . $raiz . $ruta . '?v=' . filemtime(__DIR__ . '/../' . $ruta) . '" alt="'
            . htmlspecialchars($producto['nombre']) . '" loading="lazy" />';
    }

    return '<i class="bi ' . icono_categoria($producto['categoria'] ?? '') . '" aria-hidden="true"></i>';
}
