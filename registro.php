<?php
$titulo_pagina = "Registro mayorista";
$descripcion_pagina = "Registrate como cliente mayorista de G3 Tec con tu CUIT.";
require_once 'includes/header.php';
?>
    <main id="contenido" class="container py-4 py-lg-5">
      <nav aria-label="Ruta de navegación">
        <ol class="breadcrumb small">
          <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
          <li class="breadcrumb-item active" aria-current="page">Registro mayorista</li>
        </ol>
      </nav>
      <p class="eyebrow mb-2">Venta mayorista</p>
      <h1 class="display-6 fw-bold">Registro de cliente mayorista</h1>
      <p class="text-secondary lead fs-6 col-lg-8">
        Completá el formulario. Validamos tu cuenta en menos de 24 h hábiles.
      </p>
      <div class="row g-4">
        <div class="col-lg-8">
          <form class="g3-card p-4 row g-3" novalidate data-demo>
            <div class="col-md-6">
              <label for="razon" class="form-label">Razón social</label
              ><input
                type="text"
                class="form-control"
                id="razon"
                name="razon"
                placeholder="Mi Comercio SRL"
                autocomplete="organization"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="cuit" class="form-label">CUIT</label
              ><input
                type="text"
                class="form-control"
                id="cuit"
                name="cuit"
                placeholder="20-12345678-9"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="nombre" class="form-label">Nombre y apellido</label
              ><input
                type="text"
                class="form-control"
                id="nombre"
                name="nombre"
                placeholder="Juan Pérez"
                autocomplete="name"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email</label
              ><input
                type="email"
                class="form-control"
                id="email"
                name="email"
                placeholder="tu@email.com"
                autocomplete="email"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="tel" class="form-label">Teléfono</label
              ><input
                type="tel"
                class="form-control"
                id="tel"
                name="tel"
                placeholder="387 400-0000"
                autocomplete="tel"
                required
              />
            </div>
            <div class="col-md-6">
              <label for="provincia" class="form-label">Provincia</label
              ><select class="form-select" id="provincia" name="provincia" required>
                <option>Salta</option>
                <option>Jujuy</option>
                <option>Tucumán</option>
                <option>Catamarca</option>
                <option>Santiago del Estero</option>
                <option>Otra</option>
              </select>
            </div>
            <div class="col-12">
              <label for="rubro" class="form-label">Rubro</label
              ><select class="form-select" id="rubro" name="rubro" required>
                <option>Comercio de informática</option>
                <option>Librería</option>
                <option>Electrodomésticos</option>
                <option>Servicio técnico</option>
                <option>Otro</option>
              </select>
            </div>
            <div class="col-12 form-check ms-2">
              <input class="form-check-input" type="checkbox" id="terminos" required /><label
                class="form-check-label"
                for="terminos"
                >Acepto los términos y condiciones</label
              >
            </div>
            <div class="col-12">
              <button class="btn btn-neon" type="submit">Enviar solicitud</button>
              <div class="alert alert-success d-none mt-3" role="status" data-ok>
                ¡Solicitud enviada! Te avisamos por email cuando tu cuenta esté validada.
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-4">
          <div class="g3-card p-4">
            <h2 class="h5 fw-bold">Beneficios</h2>
            <ul class="text-secondary mb-0">
              <li>15 % de descuento desde 10 unidades</li>
              <li>25 % desde 50 unidades</li>
              <li>Cuenta corriente para clientes frecuentes</li>
              <li>Envíos a todo el país</li>
            </ul>
          </div>
        </div>
      </div>
    </main>
<?php require_once 'includes/footer.php'; ?>
