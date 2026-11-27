-- Rol Mayorista y solicitudes de cuenta mayorista
-- Ejecutar una sola vez en phpMyAdmin (base mi_proyecto_web, pestaña SQL)

USE mi_proyecto_web;

-- Si consultas.sql se importó dos veces, quedan roles repetidos.
-- Dejamos solo 1 = Administrador y 2 = Cliente, y agregamos 3 = Mayorista
UPDATE usuarios SET id_rol = 2 WHERE id_rol > 2;
DELETE FROM roles WHERE id_rol > 2;
INSERT INTO roles (id_rol, nombre) VALUES (3, 'Mayorista');

CREATE TABLE solicitudes_mayoristas (
    id_solicitud INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    razon_social VARCHAR(150) NOT NULL,
    cuit VARCHAR(13) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    provincia VARCHAR(50) NOT NULL,
    rubro VARCHAR(50) NOT NULL,
    estado ENUM('pendiente', 'aprobada', 'rechazada') NOT NULL DEFAULT 'pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario) ON DELETE CASCADE
);
