# Auditoría Lighthouse y formato con Prettier

## Formato del código (Prettier)

Todo el código HTML, CSS y JavaScript se formateó con [Prettier](https://prettier.io/) usando la configuración de `.prettierrc` (ancho de línea 100, comillas dobles).

```bash
npm install --global prettier
prettier --write "**/*.{html,css,js}"
```

## Auditoría Lighthouse

- **Herramienta:** Lighthouse (Chrome DevTools → pestaña _Lighthouse_)
- **Modo:** navegación, dispositivo **escritorio**
- **Categorías:** Rendimiento, Accesibilidad, Prácticas recomendadas y SEO
- **Páginas auditadas:** las 10 vistas del sitio

### Resultados antes de las correcciones

| Página          | Rendimiento | Accesibilidad | Prácticas recomendadas | SEO |
| --------------- | :---------: | :-----------: | :--------------------: | :-: |
| index.html      |     100     |      96       |          100           | 100 |
| catalogo.html   |     100     |      96       |          100           | 100 |
| mayorista.html  |     100     |      96       |          100           | 100 |
| registro.html   |     100     |      96       |          100           | 100 |
| soporte.html    |     100     |      96       |          100           | 100 |
| reparacion.html |     100     |      96       |          100           | 100 |
| nosotros.html   |     100     |      96       |          100           | 100 |
| contacto.html   |     100     |      96       |          100           | 100 |
| carrito.html    |     100     |      97       |          100           | 100 |
| cuenta.html     |     100     |      96       |          100           | 100 |

### Falla de accesibilidad detectada

**"Los colores de fondo y de primer plano no tienen una relación de contraste suficiente"** (`color-contrast`).

Los textos secundarios usaban la clase `.text-secondary` de Bootstrap, que pinta el texto con el gris `#6c757d`. Sobre los fondos oscuros del sitio (`#07080a` y `#0f1115`) el contraste era de **4,02:1 a 4,27:1**, por debajo del mínimo de **4,5:1** que exige la norma WCAG 2.1 (nivel AA).

### Corrección aplicada

En `css/estilos.css` se redefinió `.text-secondary` para que use la variable de color secundario de cada tema: `#a3abb9` en tema oscuro y `#4b5361` en tema claro. Ambos superan el contraste de 4,5:1.

```css
.text-secondary {
  color: var(--bs-secondary-color) !important;
}
```

### Resultados después de las correcciones

| Página          | Rendimiento | Accesibilidad | Prácticas recomendadas | SEO |
| --------------- | :---------: | :-----------: | :--------------------: | :-: |
| index.html      |     100     |      100      |          100           | 100 |
| catalogo.html   |     100     |      100      |          100           | 100 |
| mayorista.html  |     100     |      100      |          100           | 100 |
| registro.html   |     100     |      100      |          100           | 100 |
| soporte.html    |     100     |      100      |          100           | 100 |
| reparacion.html |     100     |      100      |          100           | 100 |
| nosotros.html   |     100     |      100      |          100           | 100 |
| contacto.html   |     100     |      100      |          100           | 100 |
| carrito.html    |     100     |      100      |          100           | 100 |
| cuenta.html     |     100     |      100      |          100           | 100 |

El informe completo de Lighthouse de la página de inicio está en [`docs/lighthouse/index.html`](docs/lighthouse/index.html).

### Buenas prácticas de accesibilidad incluidas

- Idioma del documento declarado (`<html lang="es-AR">`).
- Enlace "Saltar al contenido" para navegar con teclado.
- Estructura semántica: `header`, `nav`, `main`, `section`, `article`, `aside` y `footer`.
- Un solo `h1` por página y jerarquía de títulos ordenada.
- Todas las imágenes con texto alternativo (`alt`) y medidas (`width` / `height`).
- Íconos decorativos ocultos a lectores de pantalla (`aria-hidden="true"`) y botones de solo ícono con `aria-label`.
- Todos los campos de formulario con su `<label>` asociado y `autocomplete`.
- Indicador de foco visible en enlaces, botones y campos.
- `aria-current="page"` en el ítem activo del menú y en la ruta de navegación (breadcrumb).
