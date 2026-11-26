<?php
// Menu de las paginas del panel. Marca la que se esta viendo
$pagina_admin = basename($_SERVER['PHP_SELF']);

$menu_admin = [
    'index.php' => 'Productos',
    'crear.php' => 'Agregar producto',
    'busqueda.php' => 'Buscar',
];
?>
      <p class="eyebrow mb-2">Panel de administrador</p>
      <ul class="nav nav-pills gap-2 mb-4">
        <?php foreach ($menu_admin as $archivo => $texto): ?>
          <li class="nav-item">
            <a class="btn <?= $archivo == $pagina_admin ? 'btn-neon' : 'btn-outline-neon' ?>" href="<?= $archivo ?>"><?= $texto ?></a>
          </li>
        <?php endforeach; ?>
        <li class="nav-item ms-lg-auto">
          <a class="btn btn-outline-secondary" href="../index.php"><i class="bi bi-shop" aria-hidden="true"></i> Ver el sitio</a>
        </li>
      </ul>
