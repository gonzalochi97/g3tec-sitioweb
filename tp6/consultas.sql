USE mi_proyecto_web;

-- =====================================
-- CREATE (INSERT)
-- =====================================

INSERT INTO roles (nombre)
VALUES ('Administrador'),
       ('Cliente');

INSERT INTO categorias (nombre)
VALUES ('Perifericos'),
       ('Componentes');

INSERT INTO usuarios
(nombre, apellido, email, password, id_rol)
VALUES
('Juan', 'Perez', 'juan@gmail.com', '123456', 2),
('Maria', 'Lopez', 'maria@gmail.com', '123456', 2);

INSERT INTO productos
(nombre, descripcion, precio, stock, id_categoria)
VALUES
('Mouse Gamer RGB', 'Mouse para gaming', 25000, 20, 1),
('Memoria RAM 16GB', 'DDR4 3200MHz', 60000, 15, 2);

INSERT INTO pedidos
(id_usuario, total)
VALUES
(1, 25000),
(2, 60000);

INSERT INTO detalle_pedidos
(id_pedido, id_producto, cantidad, precio_unitario)
VALUES
(1, 1, 1, 25000),
(2, 2, 1, 60000);

-- =====================================
-- READ (SELECT)
-- =====================================

SELECT *
FROM productos
WHERE precio > 30000
ORDER BY precio DESC;

SELECT
    p.nombre AS producto,
    c.nombre AS categoria
FROM productos p
INNER JOIN categorias c
ON p.id_categoria = c.id_categoria;

-- =====================================
-- UPDATE
-- =====================================

UPDATE productos
SET precio = 27000
WHERE id_producto = 1;

-- =====================================
-- DELETE
-- =====================================

DELETE FROM detalle_pedidos
WHERE id_detalle = 2;