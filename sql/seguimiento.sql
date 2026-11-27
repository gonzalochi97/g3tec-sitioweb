-- Seguimiento de pedidos y de reparaciones
-- Ejecutar una sola vez (base mi_proyecto_web)

USE mi_proyecto_web;

-- Estados de los pedidos (minoristas y especiales)
ALTER TABLE pedidos
    MODIFY estado ENUM('confirmado', 'pendiente', 'aprobado', 'rechazado',
                       'en preparacion', 'enviado', 'entregado') NOT NULL DEFAULT 'confirmado';

-- Estados de las reparaciones: primero se agregan los nuevos, se pasan los viejos y se quitan
ALTER TABLE consultas_reparacion
    MODIFY estado ENUM('pendiente', 'respondida', 'recibido', 'en revision', 'en reparacion',
                       'listo para retirar', 'entregado') NOT NULL DEFAULT 'recibido';

UPDATE consultas_reparacion SET estado = 'recibido' WHERE estado = 'pendiente';
UPDATE consultas_reparacion SET estado = 'en revision' WHERE estado = 'respondida';

ALTER TABLE consultas_reparacion
    MODIFY estado ENUM('recibido', 'en revision', 'en reparacion',
                       'listo para retirar', 'entregado') NOT NULL DEFAULT 'recibido';

-- Los turnos de "Pedí tu turno" se guardan en la misma tabla
ALTER TABLE consultas_reparacion
    ADD tipo ENUM('consulta', 'turno') NOT NULL DEFAULT 'consulta' AFTER id_consulta,
    ADD fecha_turno DATE NULL AFTER garantia;
