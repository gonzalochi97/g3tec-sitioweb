-- Etapa 3: categorias del sitio (sin repetidas)
-- Ejecutar una sola vez en phpMyAdmin (base mi_proyecto_web, pestaña Importar o SQL)

USE mi_proyecto_web;

-- Las mismas categorias que muestra el sitio
INSERT INTO categorias (nombre) VALUES
('Insumos informáticos'), ('Tecnología'), ('Electro'), ('Cargadores'), ('Audio');

-- Los productos de las categorias de ejemplo (Perifericos y Componentes) pasan a Insumos informaticos
UPDATE productos
SET id_categoria = (SELECT id_categoria FROM categorias WHERE nombre = 'Insumos informáticos')
WHERE id_categoria IN (SELECT id_categoria FROM categorias WHERE nombre IN ('Perifericos', 'Componentes'));

UPDATE productos
SET id_categoria = (SELECT id_categoria FROM categorias WHERE nombre = 'Cargadores')
WHERE nombre LIKE '%Cargador%';

UPDATE productos
SET id_categoria = (SELECT id_categoria FROM categorias WHERE nombre = 'Audio')
WHERE nombre LIKE '%Auricular%' OR nombre LIKE '%Parlante%';

-- Borramos las categorias de ejemplo (estaban repetidas por importar consultas.sql dos veces)
DELETE FROM categorias WHERE nombre IN ('Perifericos', 'Componentes');

-- Desde ahora no se pueden repetir nombres
ALTER TABLE categorias ADD UNIQUE (nombre);
