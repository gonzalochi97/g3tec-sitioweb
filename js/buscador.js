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
                    <div>
                        <h3>${producto.nombre}</h3>
                        <p>$${producto.precio}</p>
                    </div>
                    <hr>
                `;
      });
    } catch (error) {
      console.error(error);

      resultados.innerHTML = "Error al buscar productos";
    }
  });
});
