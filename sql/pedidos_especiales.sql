-- Pedidos especiales de mayoristas
-- Los pedidos de mayoristas quedan pendientes y no descuentan stock
-- Ejecutar una sola vez (base mi_proyecto_web)

USE mi_proyecto_web;

ALTER TABLE pedidos
    ADD tipo ENUM('minorista', 'especial') NOT NULL DEFAULT 'minorista' AFTER total,
    ADD estado ENUM('confirmado', 'pendiente', 'aprobado', 'rechazado') NOT NULL DEFAULT 'confirmado' AFTER tipo;
