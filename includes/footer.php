    <footer class="site-footer pt-5 pb-4 mt-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-lg-4">
            <img
              src="img/logo-sm.webp"
              alt="<?= APP_NAME ?>"
              width="77"
              height="64"
              loading="lazy"
              class="mb-3"
            />
            <p class="text-secondary small">
              Mayorista de insumos informáticos, tecnología y electro. Venta por mayor y por menor
              desde Salta a todo el país.
            </p>
            <div class="d-flex gap-3 fs-5">
              <a href="#" aria-label="Instagram de <?= APP_NAME ?>"
                ><i class="bi bi-instagram" aria-hidden="true"></i></a
              ><a href="#" aria-label="Facebook de <?= APP_NAME ?>"
                ><i class="bi bi-facebook" aria-hidden="true"></i></a
              ><a href="#" aria-label="YouTube de <?= APP_NAME ?>"
                ><i class="bi bi-youtube" aria-hidden="true"></i
              ></a>
            </div>
          </div>
          <div class="col-6 col-lg-2">
            <h2 class="h6 fw-bold">Catálogo</h2>
            <ul class="list-unstyled small d-grid gap-2">
              <li><a href="catalogo.php">Insumos informáticos</a></li>
              <li><a href="catalogo.php">Tecnología</a></li>
              <li><a href="catalogo.php">Electro</a></li>
              <li><a href="catalogo.php">Cargadores</a></li>
              <li><a href="catalogo.php">Audio</a></li>
            </ul>
          </div>
          <div class="col-6 col-lg-3">
            <h2 class="h6 fw-bold">Servicios</h2>
            <ul class="list-unstyled small d-grid gap-2">
              <li><a href="mayorista.php">Venta mayorista</a></li>
              <li><a href="registro.php">Registro mayorista</a></li>
              <li><a href="soporte.php">Soporte técnico</a></li>
              <li><a href="reparacion.php">Reparación de PC</a></li>
            </ul>
          </div>
          <div class="col-lg-3">
            <h2 class="h6 fw-bold">Empresa</h2>
            <ul class="list-unstyled small d-grid gap-2">
              <li><a href="nosotros.php">Sobre nosotros</a></li>
              <li><a href="contacto.php">Contacto / Sucursales</a></li>
              <li><a href="cuenta.php">Mi cuenta</a></li>
              <li><a href="mailto:<?= APP_EMAIL ?>"><?= APP_EMAIL ?></a></li>
              <li><?= APP_TELEFONO ?></li>
            </ul>
          </div>
        </div>
        <hr class="my-4" />
        <p class="small text-secondary mb-0">
          © <?= date('Y') ?> <?= APP_NAME ?>. Todos los derechos reservados. Contenido de ejemplo.
          <?php if (APP_ENV == 'local'): ?>
            <span class="badge text-bg-warning ms-2">Entorno local</span>
          <?php endif; ?>
        </p>
      </div>
    </footer>
    <a href="https://wa.me/<?= APP_WHATSAPP ?>" class="wa-float" aria-label="Escribinos por WhatsApp"
      ><i class="bi bi-whatsapp" aria-hidden="true"></i
    ></a>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="js/main.js"></script>
  </body>
</html>
