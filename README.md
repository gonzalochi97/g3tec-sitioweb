# G3 Tec – Sitio web maquetado

Maquetación en **HTML5 + Bootstrap 5** del sitio de **G3 Tec**, mayorista de insumos informáticos, tecnología y electro de Salta, Argentina. Venta por mayor y por menor.

- **Sitio en vivo:** https://gonzalochi97.github.io/g3tec-sitioweb/
- **Diseño en Figma:** https://www.figma.com/design/GMRcCAacl5hp73FwPItskw/Mockup-G3-TEC
- **Repositorio del diseño (wireframes y mockups):** https://github.com/gonzalochi97/Pagina-web

## Vistas

| #   | Página                       | Archivo           |
| --- | ---------------------------- | ----------------- |
| 1   | Inicio                       | `index.html`      |
| 2   | Catálogo                     | `catalogo.html`   |
| 3   | Venta mayorista              | `mayorista.html`  |
| 4   | Registro mayorista           | `registro.html`   |
| 5   | Soporte técnico              | `soporte.html`    |
| 6   | Reparación de PC y notebooks | `reparacion.html` |
| 7   | Sobre nosotros               | `nosotros.html`   |
| 8   | Contacto y sucursales        | `contacto.html`   |
| 9   | Tu carrito                   | `carrito.html`    |
| 10  | Cuenta (ingreso y registro)  | `cuenta.html`     |

## Tecnologías

- HTML5 semántico
- [Bootstrap 5.3](https://getbootstrap.com/) (CDN) y Bootstrap Icons
- CSS propio (`css/estilos.css`) con colores neón y **tema oscuro / claro** (`data-bs-theme`)
- JavaScript (`js/main.js`): cambio de tema guardado en el navegador y validación de formularios de demostración
- Prettier para el formato del código
- Lighthouse para la auditoría de calidad y accesibilidad (ver [LIGHTHOUSE.md](LIGHTHOUSE.md))

## Estructura

```
g3tec-sitio/
├─ index.html … cuenta.html   (10 vistas)
├─ css/estilos.css
├─ js/main.js
├─ img/                       (logo)
├─ docs/lighthouse/           (informe de Lighthouse)
├─ LIGHTHOUSE.md
└─ README.md
```

## Cómo verlo en local

Abrir `index.html` en el navegador, o usar la extensión **Live Server** de VS Code.

## Flujo de trabajo con Git

1. `git init` y commit de la estructura base (`css/`, `js/`, `img/`).
2. Rama de trabajo `feature/maquetacion`.
3. Maquetación de las 10 vistas con Bootstrap y estilos propios.
4. Formato con Prettier y auditoría con Lighthouse.
5. `git push origin feature/maquetacion` y Pull Request hacia `main`.
6. Merge del Pull Request.
7. Despliegue en GitHub Pages.

> Contenido, precios y datos de contacto de ejemplo. Los formularios no envían datos reales.
