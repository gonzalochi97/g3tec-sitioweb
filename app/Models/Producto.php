<?php

class Producto
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function obtenerTodos()
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM productos"
        );

        return $stmt->fetchAll();
    }
}
