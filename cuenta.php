<form
  class="g3-card p-4 row g-3 h-100"
  method="POST"
  action="auth/registro.php"
>
  <h2 class="h4 fw-bold">Crear cuenta</h2>

  <div class="col-12">
    <label for="nombre" class="form-label">Nombre</label>
    <input
      type="text"
      class="form-control"
      id="nombre"
      name="nombre"
      autocomplete="given-name"
      required
    />
  </div>

  <div class="col-12">
    <label for="apellido" class="form-label">Apellido</label>
    <input
      type="text"
      class="form-control"
      id="apellido"
      name="apellido"
      autocomplete="family-name"
      required
    />
  </div>

  <div class="col-12">
    <label for="email" class="form-label">Email</label>
    <input
      type="email"
      class="form-control"
      id="email"
      name="email"
      placeholder="tu@email.com"
      autocomplete="email"
      required
    />
  </div>

  <div class="col-12">
    <label for="password" class="form-label">Contraseña</label>
    <input
      type="password"
      class="form-control"
      id="password"
      name="password"
      autocomplete="new-password"
      required
    />
  </div>

  <div class="col-12">
    <button class="btn btn-outline-neon" type="submit">
      Crear cuenta
    </button>
  </div>

  <p class="small text-secondary mb-0">
    ¿Tenés un comercio?
    <a href="registro.php">Registrate como mayorista</a>.
  </p>
</form>
