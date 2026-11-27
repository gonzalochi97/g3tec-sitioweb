-- Carga los productos que faltaban porque no existian sus categorias
-- Se puede ejecutar una sola vez (no repite productos ni categorias)

USE mi_proyecto_web;

INSERT IGNORE INTO categorias (nombre) VALUES ('Tecnología');

INSERT INTO productos (nombre, descripcion, precio, precio_mayorista, stock, id_categoria)
SELECT 'Disco SSD 480 GB', 'SATA III 2,5 pulgadas', 42900, 36500, 60, id_categoria
FROM categorias WHERE nombre = 'Componentes de PC'
AND NOT EXISTS (SELECT 1 FROM productos WHERE nombre = 'Disco SSD 480 GB');

INSERT INTO productos (nombre, descripcion, precio, precio_mayorista, stock, id_categoria)
SELECT 'Router WiFi 6', 'Doble banda, 4 antenas', 69900, 59400, 30, id_categoria
FROM categorias WHERE nombre = 'Tecnología'
AND NOT EXISTS (SELECT 1 FROM productos WHERE nombre = 'Router WiFi 6');

INSERT INTO productos (nombre, descripcion, precio, precio_mayorista, stock, id_categoria)
SELECT 'Smartwatch AMOLED', 'Pantalla AMOLED, resistente al agua', 54900, 46700, 40, id_categoria
FROM categorias WHERE nombre = 'Tecnología'
AND NOT EXISTS (SELECT 1 FROM productos WHERE nombre = 'Smartwatch AMOLED');

INSERT INTO productos (nombre, descripcion, precio, precio_mayorista, stock, id_categoria)
SELECT 'Auriculares TWS ANC', 'Cancelación activa de ruido', 34900, 29700, 100, id_categoria
FROM categorias WHERE nombre = 'Auriculares'
AND NOT EXISTS (SELECT 1 FROM productos WHERE nombre = 'Auriculares TWS ANC');

INSERT INTO productos (nombre, descripcion, precio, precio_mayorista, stock, id_categoria)
SELECT 'Parlante Bluetooth 10W', 'Batería de 12 horas', 38500, 32700, 45, id_categoria
FROM categorias WHERE nombre = 'Parlantes y Audio'
AND NOT EXISTS (SELECT 1 FROM productos WHERE nombre = 'Parlante Bluetooth 10W');
