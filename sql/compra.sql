-- Precio mayorista, precio de oferta y productos del catalogo
-- Ejecutar una sola vez en phpMyAdmin (base mi_proyecto_web, pestaña SQL)

USE mi_proyecto_web;

-- precio_oferta queda vacio (NULL) si el producto no esta en oferta
ALTER TABLE productos
    ADD precio_mayorista DECIMAL(10,2) NULL AFTER precio,
    ADD precio_oferta DECIMAL(10,2) NULL AFTER precio_mayorista;

-- A los productos que ya estaban les ponemos un 15% menos como precio mayorista
UPDATE productos SET precio_mayorista = ROUND(precio * 0.85);

INSERT INTO productos (nombre, descripcion, precio, precio_mayorista, stock, id_categoria)
SELECT 'Cable USB-C a USB-C 60W 1 m', 'Carga rápida y datos', 6900, 5900, 200, id_categoria FROM categorias WHERE nombre = 'Insumos informáticos'
UNION ALL SELECT 'Mouse inalámbrico 2.4G', 'Receptor USB, 1600 DPI', 9800, 8300, 120, id_categoria FROM categorias WHERE nombre = 'Insumos informáticos'
UNION ALL SELECT 'Teclado USB español', 'Teclado con ñ, resistente a salpicaduras', 15900, 13500, 80, id_categoria FROM categorias WHERE nombre = 'Insumos informáticos'
UNION ALL SELECT 'Disco SSD 480 GB', 'SATA III 2,5 pulgadas', 42900, 36500, 60, id_categoria FROM categorias WHERE nombre = 'Tecnología'
UNION ALL SELECT 'Router WiFi 6', 'Doble banda, 4 antenas', 69900, 59400, 30, id_categoria FROM categorias WHERE nombre = 'Tecnología'
UNION ALL SELECT 'Smartwatch AMOLED', 'Pantalla AMOLED, resistente al agua', 54900, 46700, 40, id_categoria FROM categorias WHERE nombre = 'Tecnología'
UNION ALL SELECT 'Pava eléctrica 1,7 L', 'Acero inoxidable, corte automático', 36900, 31400, 50, id_categoria FROM categorias WHERE nombre = 'Electro'
UNION ALL SELECT 'Freidora de aire 4 L', 'Panel digital, 8 programas', 129900, 110400, 25, id_categoria FROM categorias WHERE nombre = 'Electro'
UNION ALL SELECT 'Cargador GaN 65W', 'USB-C PD, carga notebooks', 39900, 33900, 70, id_categoria FROM categorias WHERE nombre = 'Cargadores'
UNION ALL SELECT 'Power bank 10.000 mAh', 'Dos salidas USB y una USB-C', 32900, 28000, 90, id_categoria FROM categorias WHERE nombre = 'Cargadores'
UNION ALL SELECT 'Auriculares TWS ANC', 'Cancelación activa de ruido', 34900, 29700, 100, id_categoria FROM categorias WHERE nombre = 'Audio'
UNION ALL SELECT 'Parlante Bluetooth 10W', 'Batería de 12 horas', 38500, 32700, 45, id_categoria FROM categorias WHERE nombre = 'Audio';

-- Dos ofertas de ejemplo (despues se cambian desde Editar producto)
UPDATE productos SET precio_oferta = 34900 WHERE nombre = 'Cargador GaN 65W';
UPDATE productos SET precio_oferta = 7900 WHERE nombre = 'Mouse inalámbrico 2.4G';
