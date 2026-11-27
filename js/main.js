// Tema oscuro / claro con preferencia guardada
(function () {
  const root = document.documentElement;
  const saved = localStorage.getItem("g3-tema");
  if (saved) root.setAttribute("data-bs-theme", saved);
  const btn = document.getElementById("btnTema");
  const sync = () => {
    const dark = root.getAttribute("data-bs-theme") === "dark";
    btn.innerHTML = dark
      ? '<i class="bi bi-sun" aria-hidden="true"></i>'
      : '<i class="bi bi-moon" aria-hidden="true"></i>';
    btn.setAttribute("aria-label", dark ? "Cambiar a tema claro" : "Cambiar a tema oscuro");
  };
  btn.addEventListener("click", () => {
    const next = root.getAttribute("data-bs-theme") === "dark" ? "light" : "dark";
    root.setAttribute("data-bs-theme", next);
    localStorage.setItem("g3-tema", next);
    sync();
  });
  sync();

  // El aviso de "agregado al carrito" se oculta solo
  const aviso = document.querySelector(".aviso-flotante");
  if (aviso) setTimeout(() => aviso.remove(), 3000);

  // Formularios de demostración
  document.querySelectorAll("form[data-demo]").forEach((form) => {
    form.addEventListener("submit", (e) => {
      e.preventDefault();
      if (!form.checkValidity()) {
        form.classList.add("was-validated");
        return;
      }
      const msg = form.querySelector("[data-ok]");
      if (msg) msg.classList.remove("d-none");
      form.reset();
      form.classList.remove("was-validated");
    });
  });
})();
