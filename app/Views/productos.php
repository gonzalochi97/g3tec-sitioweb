<h1>Productos MVC</h1>

<table border="1">

<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Precio</th>
</tr>

<?php foreach ($productos as $producto): ?>

<tr>
    <td><?= htmlspecialchars($producto['id_producto']) ?></td>
    <td><?= htmlspecialchars($producto['nombre']) ?></td>
    <td>$<?= htmlspecialchars($producto['precio']) ?></td>
</tr>

<?php endforeach; ?>

</table>