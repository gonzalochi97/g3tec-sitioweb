<?php

require_once __DIR__ . '/../Models/Producto.php';

class ProductoController
{
    private $producto;

    public function __construct($pdo)
    {
        $this->producto = new Producto($pdo);
    }

    public function index()
    {
        return $this->producto->obtenerTodos();
    }
}
