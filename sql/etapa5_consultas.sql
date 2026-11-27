-- Etapa 5: consultas de reparacion y pedidos de presupuesto
-- Ejecutar una sola vez (base mi_proyecto_web)

USE mi_proyecto_web;

CREATE TABLE consultas_reparacion (
    id_consulta INT AUTO_INCREMENT PRIMARY KEY,
    tipo_equipo VARCHAR(30) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    modelo VARCHAR(50) NOT NULL,
    falla TEXT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    contacto VARCHAR(100) NOT NULL,
    garantia TINYINT(1) NOT NULL DEFAULT 0,
    estado ENUM('pendiente', 'respondida') NOT NULL DEFAULT 'pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE presupuestos (
    id_presupuesto INT AUTO_INCREMENT PRIMARY KEY,
    empresa VARCHAR(150) NOT NULL,
    cuit VARCHAR(13) NULL,
    email VARCHAR(100) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    productos TEXT NOT NULL,
    plazo VARCHAR(30) NOT NULL,
    forma_pago VARCHAR(30) NOT NULL,
    estado ENUM('pendiente', 'respondido') NOT NULL DEFAULT 'pendiente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
