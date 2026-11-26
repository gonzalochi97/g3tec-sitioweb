<?php
// Menu principal. Marca como activa la pagina que se esta viendo
// (solo en las paginas de la raiz, en auth/ y admin/ no se marca ninguna)
$pagina_actual = '';
if ($raiz == '') {
    $pagina_actual = basename($_SERVER['PHP_SELF']);
}

$menu = [
    'index.php' => 'Inicio',
    'catalogo.php' => 'Catálogo',
    'mayorista.php' => 'Venta mayorista',
    'soporte.php' => 'Soporte técnico',
    'reparacion.php' => 'Reparación de PC',
    'nosotros.php' => 'Sobre nosotros',
    'contacto.php' => 'Contacto',
];
?>
      <nav class="navbar navbar-expand-lg py-1 border-top" aria-label="Menú principal">
        <div class="container">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu"
            aria-controls="menu"
            aria-expanded="false"
            aria-label="Abrir menú"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav gap-1">
              <?php foreach ($menu as $archivo => $texto): ?>
                <?php if ($archivo == $pagina_actual): ?>
                  <li class="nav-item">
                    <a class="nav-link active" href="<?= $raiz . $archivo ?>" aria-current="page"><?= $texto ?></a>
                  </li>
                <?php else: ?>
                  <li class="nav-item"><a class="nav-link" href="<?= $raiz . $archivo ?>"><?= $texto ?></a></li>
                <?php endif; ?>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
      </nav>
