document.addEventListener("DOMContentLoaded", () => {
  const inputBusqueda = document.getElementById("inputBusqueda");

  const resultados = document.getElementById("resultados");

  inputBusqueda.addEventListener("input", async () => {
    const texto = inputBusqueda.value;

    try {
      const response = await fetch(
        `../api/buscar_productos.php?q=${encodeURIComponent(texto)}`,
      );

      const datos = await response.json();

      resultados.innerHTML = "";

      datos.data.forEach((producto) => {
        resultados.innerHTML += `
                    <div class="col-md-4">
                        <div class="g3-card p-3 h-100">
                            <h2 class="h6 fw-bold">${producto.nombre}</h2>
                            <p class="price mb-0">$ ${producto.precio}</p>
                        </div>
                    </div>
                `;
      });
    } catch (error) {
      console.error(error);

      resultados.innerHTML = "Error al buscar productos";
    }
  });
});
