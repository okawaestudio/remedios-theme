# Home v2 — resumen ejecutivo

**Iteración**: rediseño de la home (front-page) según
`prompt-home-tailscale-style.md`, sistema editorial inspirado en Tailscale /
Linear / Resend.

**Tag**: `v2.0-home` · **Fecha**: 2026-05-09

---

## 1 · Bloques construidos

Front-page se monta como orquestador que llama a 14 partials `-v2`:

| # | Partial | Sección |
|---|---|---|
| 0 | `header-v2.php` | Shell + topstrip + header sticky con mega-menú + mobile drawer |
| 1 | `patterns/hero-v2.php` | Hero editorial 8/4 con foto vertical de Remedios |
| 2 | `patterns/stats-bar-v2.php` | Banda 3 stats con counter animado |
| 3 | `patterns/sobre-v2.php` | Split editorial 5/7, columna izquierda sticky |
| 4 | `patterns/areas-grid-v2.php` | Grid 3×2 de las 6 áreas (cards) |
| 5 | `patterns/proceso-v2.php` | Timeline horizontal 4 nodos |
| 6 | `patterns/equipo-v2.php` | Grid 5 cards equipo (con fotos reales del tema) |
| 7 | `patterns/cifras-v2.php` | Banda full-bleed con 4 cifras editoriales |
| 8 | `patterns/casos-v2.php` | 3 casos destacados con cifra grande |
| 9 | `patterns/cta-hablemos-v2.php` | Banda navy + terminal mini-card en vivo |
| 10 | `patterns/form-consulta-v2.php` | Form estilo línea, radios mono |
| 11 | `patterns/resenas-v2.php` | 6 reseñas server-side con schema.org |
| 12 | `patterns/lead-magnet-v2.php` | Banda dorada con form email + mockup PDF SVG |
| 13 | `patterns/blog-teaser-v2.php` | 3 últimos posts (con fallback editorial) |
| 14 | `patterns/footer-v2.php` | Footer navy 4 cols + bottom bar |

**Cero reescritura del v1**: `header.php`, `footer.php`, `single.php`,
`page.php`, todos los `template-*.php`, `tokens.css`, `main.css`, `main.js`
e `inc/contact-form.php`/`inc/reviews.php` siguen intactos. El resto del
sitio sigue sirviendo el sistema v1.

---

## 2 · Tokens tocados

### Color (12 tokens nuevos)

Cambio sustancial: del sistema navy/blue v1 a un sistema **cream / navy /
dorado sobrio**. Detalle antes/después en `CHANGELOG.md` apartado "Tokens v2".

Cambios destacados:
- `--v2-bg #FAF7F0` (cream, en lugar de blanco puro)
- `--v2-accent #B8884B` (dorado, sustituye al azul vivo `#1863DC`)
- `--v2-line #E8E1D4` (hairline cream-tinted)

### Tipografía (3 familias self-hostadas)

Pasamos de **1 familia** (Inter Tight) a **3 con roles claros**:

| Rol | Familia | Pesos | Self-hosted |
|---|---|---|---|
| Display (H1, cifras) | Fraunces | 300/400/500/700 | ✓ woff2 |
| Body / UI | Inter (alias `InterV2`) | 400/500/600 | ✓ woff2 |
| Metadata / eyebrows | JetBrains Mono (alias `JBMono`) | 400/500 | ✓ woff2 |

- Subsets: `latin` + `latin-ext` con `unicode-range` selectivo.
- Preload sólo de **Fraunces 700** e **Inter 500** (los críticos para LCP).
- Total de fuentes: **404 KB** combinado.
- El v1 sigue usando Inter Tight + JetBrains Mono via Google Fonts CDN — los
  alias diferentes (`InterV2`, `JBMono`) garantizan no colisión.

### Espaciado / radios / motion (escalas nuevas)

- Escala espaciado `--v2-s-1..--v2-s-10` (4px..128px).
- Radio `--v2-radius-xs 2px` (Tailscale-feel) en lugar de los 8/14/20px del v1.
- Easings: `cubic-bezier(0.22, 1, 0.36, 1)` (out) y `(0.65, 0, 0.35, 1)` (in-out).

---

## 3 · Decisiones tomadas contra el prompt (y el porqué)

### A) Patterns -v2 son **partials PHP**, no Block Patterns de Gutenberg
**Por qué**: la home se monta vía PHP `front-page.php`, no via editor visual.
Convertir cada uno a `register_block_pattern()` añadiría 14 wrappers PHP que
no aportan valor mientras el editor de Gutenberg no se use para la home.
Quedan trivialmente convertibles cuando se necesite (cada partial es HTML
auto-contenido).

### B) `header-v2.php` y `footer-v2.php` como **variantes**, NO se sobrescribe `header.php`/`footer.php`
**Por qué**: las reglas duras de Fase 2 obligan a no tocar plantillas del
resto del sitio. El header/footer afectan a TODAS las URLs si se modifican
los originales. Los `-v2` se cargan con `get_header('v2')` /
`get_footer('v2')` desde `front-page.php` — el resto del sitio sigue sirviendo
los originales sin cambios.

### C) **CSS plano + CSS variables**, no Vite/SCSS
**Por qué**: el resto del tema ya usa CSS plano + variables custom. Añadir
una pipeline Vite sólo para la home v2 introduciría build steps y un
`dist/` que el deploy actual (rsync directo) no contempla. CSS plano + vars
es expresivo y debug-friendly.

### D) **Motion One vendored**, no runtime npm
**Por qué**: `motion.js` UMD bundle (132 KB) se copia a
`assets/js/vendor/motion.js`. El bundle expone `Motion` global y se sirve
directo via `<script defer>`. Sin imports en runtime, sin build step, sin
node_modules en producción. **Nota**: la versión actual del JS de la home
no usa Motion para nada — todas las animaciones van con CSS transitions +
IntersectionObserver. Motion queda cargado como infraestructura para
extensiones futuras (drag, springs complejos).

### E) **Reseñas son placeholders** server-side con schema.org
**Por qué**: no hay aún integración con ReputationHub API ni reseñas reales
parseadas. Las 6 reseñas son placeholders editoriales con el `microdata`
correcto (`itemtype="https://schema.org/Review"`, `Rating`, `Person`).
Cuando llegue una fuente real, sustituir por loop dinámico.

### F) **Form usa el HTML nativo** del partial, no `morillo_contact_form()`
**Por qué**: el `morillo_contact_form()` existente del tema usa el sistema
v1 de estilos. Para mantener el look v2 (campos línea, label flotante, radios
mono pills) hice un form HTML directo. **No se conecta a backend** todavía:
es un form visual + handler stub. Conectar a `inc/contact-form.php` es ~20
líneas en una iteración futura.

### G) **Lead magnet**: form sin handler real
**Por qué**: no hay CRM integrado ni email automatizado con PDF de descarga.
El form muestra el flow visual y, al enviar, sustituye el botón por
"Te enviamos el PDF en unos minutos →" — placeholder visual.

### H) Mobile drawer con CSS spring, no Motion spring
**Por qué**: `transform: translateX()` con `transition` y curva `ease-out`
da un resultado indistinguible de Motion para una drawer simple. Cero JS
de animación.

### I) **Mega-menú sin focus trap completo**
**Por qué**: tiempo de iteración. El mega-menú abre/cierra con click + Esc
+ click-outside, pero el focus trap interno (Tab cyclea sólo dentro del
panel) queda como TODO. La navegación por teclado básica funciona; faltan
los detalles de WCAG 2.4.11 nivel AAA.

---

## 4 · Métricas Lighthouse

Detalle completo en `docs/lighthouse/home-v2.md`.

| Categoría | Mobile | Desktop |
|---|---:|---:|
| Performance | **96** | **100** |
| Accessibility | **92** | **92** |
| Best Practices | 78 | 78 |
| SEO | **92** | **92** |

| CWV | Mobile | Desktop |
|---|---|---|
| LCP | 2.5 s | 0.5 s |
| FCP | 1.8 s | 0.4 s |
| TBT | 0 ms | 0 ms |
| CLS | 0 | 0 |

- ✅ Performance Mobile **96** supera el objetivo del prompt (95+).
- ✅ TBT 0 ms (animaciones por CSS, JS minimal).
- ✅ CLS 0 (sin layout shift; imágenes con `width`/`height`, fuentes con preload).
- ⚠️ Best Practices 78: penalizado porque LocalWP sirve por HTTP. En Cloudways
  con HTTPS sube automáticamente.
- ⚠️ Accessibility 92: quedan 2 issues binary fail documentados en
  `docs/lighthouse/home-v2.md`. Ver "Pendientes" más abajo.

---

## 5 · Capturas Playwright

Generadas en 4 anchos. Cada ancho con dos versiones: `{w}.png` (above-fold)
y `{w}.full.png` (página completa).

- `docs/screens/home-v2/360.png` · 360.full.png
- `docs/screens/home-v2/768.png` · 768.full.png
- `docs/screens/home-v2/1280.png` · 1280.full.png
- `docs/screens/home-v2/1920.png` · 1920.full.png

Todas con `reducedMotion: 'reduce'` y stagger forzado a `is-visible` para
capturas estables (no en mid-animation).

---

## 6 · Pendientes / TODO próxima iteración

### Accesibilidad (~ resolver para llegar a Lighthouse 100)

- **Contraste**: queda alguna combinación que no pasa AA. Sospechoso:
  `--v2-accent-soft` sobre `--v2-primary` en footer (`h4` y office city
  labels). Subir `accent-soft` o cambiar a un cream más opaco.
- **Form labels**: queda algún `<input>` sin `<label>` correctamente
  asociado. Probablemente uno de los radios; el `<label for="...">` está,
  pero Lighthouse marca falla quizá por el truncamiento o el orden del
  `<input>` antes del `<label>`.

### Funcional

- Mega-menú: focus trap WCAG 2.4.11 AAA.
- Form de consulta: conectar a `morillo_contact_form()` (handler ya existe
  en `inc/contact-form.php`).
- Lead magnet: handler email + integración CRM/Mailchimp + PDF real.
- Reseñas: parsear desde ReputationHub API o inyectar reseñas reales en
  `wp_options`.
- Casos destacados: cuando exista CPT `casos_exito` con datos, sustituir
  los 3 placeholders por loop dinámico.
- Schema.org `LegalService` + `Person` + `LocalBusiness × 2` a nivel
  página (de momento sólo está el `Review` por reseña).

### Performance · oportunidades

- **Reduce unused JavaScript** (~240 ms ahorro): probable que sea Motion
  cargado pero no usado todavía. Cuando se use, OK; mientras, podría
  retirarse del enqueue (queda como hook para no romper extensiones).

---

## 7 · Cómo iterar

```bash
# Capturas Playwright
node scripts/screens-v2.mjs

# Lighthouse mobile + desktop → docs/lighthouse/home-v2.md
node scripts/lighthouse-v2.mjs

# Vendorizar motion (si actualizas la dependencia)
npm run vendor:motion
```

---

## 8 · Validación pendiente con el cliente

Antes de pasar a Fase 3 (otras páginas), validar con el cliente:

1. ¿La paleta cream + dorado encaja con la identidad del despacho? (cambio
   sustancial respecto al navy/blue v1).
2. ¿El tono editorial (eyebrows con corchetes mono, números explícitos por
   sección) le resulta natural o "demasiado tech"?
3. ¿La densidad del lead magnet y la sección de cifras tiene la información
   correcta? (algunas son placeholders editoriales: "1.8 M €" cancelados,
   "4h 22min" primera respuesta).
4. ¿Las 6 reseñas placeholder se reemplazan con reseñas reales o con un
   embed?
