<?php

require_once 'config/conexion.php';

require_once 'app/Models/Producto.php';
require_once 'app/Controllers/ProductoController.php';

$controller = new ProductoController($pdo);

$productos = $controller->index();

require_once 'app/Views/productos.php';