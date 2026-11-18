<?php
$titulo_pagina = "Cuenta";
$descripcion_pagina = "Ingresá a tu cuenta de G3 Tec o creá una nueva.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Cuenta</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Usuario</p>
      <h1 class="display-6 fw-bold">Tu cuenta</h1>
      <div class="row g-4">
        <div class="col-lg-6">
          <form class="g3-card p-4 row g-3 h-100" novalidate data-demo>
            <h2 class="h4 fw-bold">Ingresar</h2>
            <div class="col-12">
              <label for="lemail" class="form-label">Email</label
              ><input
                type="email"
                class="form-control"
                id="lemail"
                name="lemail"
                placeholder="tu@email.com"
                autocomplete="email"
                required
              />
            </div>
            <div class="col-12">
              <label for="lpass" class="form-label">Contraseña</label
              ><input
                type="password"
                class="form-control"
                id="lpass"
                name="lpass"
                placeholder=""
                autocomplete="current-password"
                required
              />
            </div>
            <div class="col-12">
              <button class="btn btn-neon" type="submit">Ingresar</button>
              <div class="alert alert-success d-none mt-3" role="status" data-ok>
                Ingreso de demostración correcto.
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-6">
          <form class="g3-card p-4 row g-3 h-100" novalidate data-demo>
            <h2 class="h4 fw-bold">Crear cuenta</h2>
            <div class="col-12">
              <label for="rnombre" class="form-label">Nombre y apellido</label
              ><input
                type="text"
                class="form-control"
                id="rnombre"
                name="rnombre"
                placeholder=""
                autocomplete="name"
                required
              />
            </div>
            <div class="col-12">
              <label for="remail" class="form-label">Email</label
              ><input
                type="email"
                class="form-control"
                id="remail"
                name="remail"
                placeholder="tu@email.com"
                autocomplete="email"
                required
              />
            </div>
            <div class="col-12">
              <label for="rpass" class="form-label">Contraseña</label
              ><input
                type="password"
                class="form-control"
                id="rpass"
                name="rpass"
                placeholder=""
                autocomplete="new-password"
                required
              />
            </div>
            <div class="col-12">
              <button class="btn btn-outline-neon" type="submit">Crear cuenta</button>
              <div class="alert alert-success d-none mt-3" role="status" data-ok>
                ¡Cuenta creada! (demostración)
              </div>
            </div>
            <p class="small text-secondary mb-0">
              ¿Tenés un comercio? <a href="registro.php">Registrate como mayorista</a>.
            </p>
          </form>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
