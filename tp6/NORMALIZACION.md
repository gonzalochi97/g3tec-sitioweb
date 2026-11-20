# Trabajo Práctico N° 6 - Normalización de Base de Datos

## Proyecto Integrador: Tienda Online G3TEC

### Tabla sin Normalizar

Inicialmente se podría almacenar la información de un pedido de la siguiente manera:

| id_pedido | cliente    | email          | productos                | categorias               | cantidades | total |
| --------- | ---------- | -------------- | ------------------------ | ------------------------ | ---------- | ----- |
| 1         | Juan Pérez | juan@gmail.com | Mouse Gamer, Teclado RGB | Periféricos, Periféricos | 1,1        | 75000 |

Problemas detectados:

- Existen campos multivalorados.
- Se repiten categorías.
- Los productos están almacenados en una misma columna.
- Dificulta búsquedas y actualizaciones.

---

## Primera Forma Normal (1FN)

Se eliminan los grupos repetitivos y cada atributo contiene un único valor.

### Pedidos

| id_pedido | cliente    | email          | total |
| --------- | ---------- | -------------- | ----- |
| 1         | Juan Pérez | juan@gmail.com | 75000 |

### Detalle_Pedidos

| id_detalle | id_pedido | producto    | cantidad |
| ---------- | --------- | ----------- | -------- |
| 1          | 1         | Mouse Gamer | 1        |
| 2          | 1         | Teclado RGB | 1        |

---

## Segunda Forma Normal (2FN)

Se eliminan las dependencias parciales.

Se separa la información de productos en una tabla propia.

### Productos

| id_producto | nombre_producto | precio |
| ----------- | --------------- | ------ |
| 1           | Mouse Gamer     | 25000  |
| 2           | Teclado RGB     | 50000  |

### Detalle_Pedidos

| id_detalle | id_pedido | id_producto | cantidad |
| ---------- | --------- | ----------- | -------- |
| 1          | 1         | 1           | 1        |
| 2          | 1         | 2           | 1        |

---

## Tercera Forma Normal (3FN)

Se eliminan dependencias transitivas.

Las categorías pasan a una tabla independiente.

### Categorias

| id_categoria | nombre_categoria |
| ------------ | ---------------- |
| 1            | Periféricos      |

### Productos

| id_producto | nombre_producto | precio | id_categoria |
| ----------- | --------------- | ------ | ------------ |
| 1           | Mouse Gamer     | 25000  | 1            |
| 2           | Teclado RGB     | 50000  | 1            |

---

# Tablas Finales Normalizadas

## roles

- id_rol (PK)
- nombre

## usuarios

- id_usuario (PK)
- nombre
- apellido
- email
- password
- id_rol (FK)

## categorias

- id_categoria (PK)
- nombre

## productos

- id_producto (PK)
- nombre
- descripcion
- precio
- stock
- id_categoria (FK)

## pedidos

- id_pedido (PK)
- id_usuario (FK)
- fecha_pedido
- total

## detalle_pedidos

- id_detalle (PK)
- id_pedido (FK)
- id_producto (FK)
- cantidad
- precio_unitario
