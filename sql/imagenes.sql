-- Imagen de cada producto (nombre del archivo dentro de img/productos)
-- Ejecutar una sola vez (base mi_proyecto_web)

USE mi_proyecto_web;

ALTER TABLE productos ADD imagen VARCHAR(100) NULL AFTER descripcion;
