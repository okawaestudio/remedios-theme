# CHANGELOG

## [v2.4-home] · 2026-05-10 — Proceso + Casos + footer editorial + form refinado

7 ajustes acumulativos sobre `v2.3-home` según brief del cliente:

### 2 bloques recuperados con diseño nuevo

**Proceso** (`patterns/proceso-v2.php`): timeline horizontal 4 pasos sobre
bg cream. Header 2-col: H2 "De la primera llamada a la sentencia, *en 4 pasos*"
+ aside mono "¿Y mientras tanto? — te llamo yo". Cada step: dot navy 12px
clavado en hairline horizontal hairline-strong, meta `0X · tiempo`,
título serif-bold, descripción muted.

**Casos públicos** (`patterns/casos-v2.php`): grid 3 cards sobre bg mist.
Header 2-col: H2 "Casos resueltos. *Cifras reales*. Detalles públicos…" +
btn ghost "Ver todos los casos →". Cada card: header (área en navy + ID
en muted), cifra grande navy `87.420 €`, descripción, foot
(juzgado · fecha) separado por hairline.

`front-page.php` ahora orquesta 8 partials en el orden: hero · sobre ·
áreas · **proceso** · equipo · **casos** · hablemos · reseñas · footer.

### Logo header reducido

`height` desktop `48px → 36px`, mobile `38px → 30px`. Mejor proporción.

### Hablemos · garantías rediseñadas

La línea suelta "Confidencial · sin compromiso · sin discurso comercial"
del lead se sustituye por una `<ul>` de 3 garantías:

- Confidencial
- Sin compromiso
- Sin coste si no hay viabilidad

Cada item: pill check navy 22×22 (`<svg>` icono dentro) + texto Jakarta
500 14.5px. La lista lleva borders top + bottom hairline para destacar
como bloque de garantías propio.

### Form Hablemos · provincia alineada + 52 provincias

- `select#v2-provincia` ahora usa la misma estructura `.v2-field--select`
  con label flotante (siempre arriba, color primary) en lugar del label
  estático que estaba desalineado respecto al input email contiguo.
- Custom appearance: chevron SVG inline como `background-image`, sin
  `appearance: auto` (no nativo del browser).
- Lista completa: **52 provincias** + Ceuta + Melilla en orden alfabético
  (A Coruña, Álava, …, Zaragoza). Antes solo había 3 opciones (Madrid,
  Málaga, Otra).

### Footer rediseño editorial

Reescrito de cero sobre `patterns/footer-v2.php` + reglas CSS dedicadas:

- **Dos zonas claras** separadas por hairline blanco al .10 con margin
  64px:
  - Brand zone (1.4fr/1fr): logo SVG + tagline 440px + CTA pill ghost
    "Hablemos →" + tel/email grandes apilados a la derecha.
  - Nav zone (4×1): Áreas · Despacho · Legal · **Visítanos** (sedes
    pasan a su columna propia, antes vivían pegadas al logo).
- **Eyebrows sin corchetes**: `ÁREAS` con hairline 24×1px decorativa
  debajo (sustituye al `[ÁREAS]`).
- Bottom-bar minimal sin acento dorado (ya no encaja con la paleta
  monocromática navy): hairline blanco al .08, copyright + horario
  ambos 13px muted.
- Hover en links: `translateX(2px)` + color blanco puro.
- CTA "Hablemos" pill ghost-on-dark border `rgba(255,255,255,.24)` →
  hover bg `rgba(255,255,255,.08)` + border `.48`.

### Métricas Lighthouse v2.4 (LocalWP HTTP)

| Categoría | Mobile | Desktop | Δ vs v2.3 |
|---|---:|---:|---|
| Performance | **88** | **100** | -6 / = |
| Accessibility | 94 | 94 | = |
| Best Practices | 78 | 78 | = |
| SEO | 92 | 92 | = |

El bajón mobile (-6) es por +2 bloques + más CSS/DOM. Sigue por encima
del baseline aceptable. En producción Cloudways esperamos +5-8 puntos.

---

## [v2.3-home] · 2026-05-09 — Hero compacto + form 4 campos + logo footer

5 ajustes acumulativos sobre `v2.2-home`:

### Hero más compacto
- `--v2-fs-h1`: clamp max bajado de **4.25rem → 3.5rem**. H1 pasa de
  4 líneas a 3.
- Hero `padding-block`: `clamp(6rem, 12vw, 12rem) → clamp(4rem, 7vw, 6.5rem)`.
- `min-height: 600px` ELIMINADO (la altura sigue al contenido).

### Form hero · 4 campos + checkbox + más translúcido
- Añadido **email** entre teléfono e importe.
- Añadido **checkbox de política de privacidad** antes del submit.
- Background opacidad bajada de **0.96 → 0.78** + blur subido de
  `blur(10px) → blur(16px)` para mantener legibilidad. Ahora se ve la
  foto Madrid detrás (efecto "vidrio escarchado").
- Inputs height `46px → 42px` (más compacto, cabe el 5º campo).
- Stack gap `14px → 10px`.
- Padding card: `28px 28px 24px → 24px 24px 22px`.

### Header phone · botón pill ghost
- Antes: `[634 717 166]` con border hairline simple, sin padding consistente.
- Ahora: pill ghost (height 40px, radius 999, border line-strong, ícono ☎
  con `::before`). Hover: bg navy, color cream.
- Quitados los corchetes `[...]` del texto.

### Logo en footer · SVG faldón
- SVG `remedios_morillo_aboagada (1).svg` copiado a
  `assets/img/brand/logo-faldon-cream.svg` (11.5 KB).
- Logo blanco horizontal (viewBox 984.5×255.95) → perfecto para fondo
  navy del footer.
- Sustituye al título de texto `[REMEDIOS MORILLO ABOGADOS]` que había
  antes en la columna brand del footer.
- Width 220px responsive.

### Métricas Lighthouse v2.3 (LocalWP HTTP)

| Categoría | Mobile | Desktop | Δ vs v2.2 |
|---|---:|---:|---|
| Performance | **94** | **100** | +4 / = |
| Accessibility | 94 | 94 | = |
| Best Practices | 78 | 78 | = |
| SEO | 92 | 92 | = |

Mobile sube +4 al haber bajado el LCP del hero (menos altura = menos
viewport para pintar antes del paint final).

---

## [v2.2-home] · 2026-05-09 — Plus Jakarta Sans + UI moderna + rhythm de bloques

Iteración acumulativa sobre `v2.1-home`. Brief del cliente (acotado):

> "no me gusta JB Mono, soy más tipo Jakarta o similar, aspecto moderno;
> las fotos del equipo y los botones no se ven bien, hay que actualizar el
> diseño; el hero me gusta pero el title debe alinearse con el header
> (mismo origen X que el logo) y meter un form sutil a la derecha como CTA
> rápido; diferenciar los bloques: ahora todo es #FAF7F0 y no se distinguen."

### Tipografía · Plus Jakarta Sans (única familia)

- **JetBrains Mono ELIMINADO** (8 woff2 fuera, -64 KB).
- **Inter Display alias ELIMINADO** + **Inter ELIMINADO** (8 woff2 fuera, -240 KB).
- **Plus Jakarta Sans añadido**: weights 400/500/600/700, latin + latin-ext,
  self-hosted en `assets/fonts/jakarta/` (8 woff2, 100 KB).
- Tokens unificados:
  - `--v2-font-display` = `--v2-font-sans` = `--v2-font-mono` = Jakarta.
  - `--v2-tracking-eyebrow: 0.14em` (Jakarta uppercase pide tracking generoso).
  - `--v2-tracking-display: -0.02em` (Jakarta semi-bold tight).
- **Eyebrows ya NO van en mono** (`[01 — …]`, `[ICAM Nº …]`, `[200+ EXPEDIENTES]`):
  ahora Jakarta uppercase 11px weight 600 con tracking 0.14em. Look más limpio
  y menos "tech-corporate".
- Preload: solo Jakarta 600.

### Botones · pill modernos con jerarquía

- Border-radius `var(--v2-radius-pill)` (999px) en lugar de 4px.
- Heights consistentes: 48px default, 56px lg.
- Variantes:
  - `--primary` navy con hover `--primary-3` (más claro, no shift transform).
  - `--ghost` outline hairline-strong con hover invertido (bg navy, texto cream).
  - `--inverse` cream sobre fondos dark.
  - `--inverse-ghost` outline blanco sobre fondos dark.
  - `--mono` mantiene la clase pero ahora también es Jakarta con `font-feature-settings: tnum` para números tabulares.
  - `--block` (full-width).
  - `--lg` (height 56px, padding 28px).

### Cards equipo · rediseño completo

- Radius `--v2-radius-md` (12px) en lugar de 4px.
- `overflow: hidden` para que la foto haga "bleed" hasta el borde.
- Foto en wrapper con aspect 4/5, **sin `filter: saturate(.85)`** (las hacía
  planas y desaturadas).
- Hover: `transform: translateY(-4px)` + `box-shadow` + scale 1.04 en la foto.
- Body wrapper `padding: 18px 20px 20px` con jerarquía:
  - Nombre: serif 16.5px weight 600.
  - Rol: 13px muted.
  - Creds: separados por hairline arriba, 10.5px tracking 0.08em.

### Hero · alineado con header + form sutil derecha (NUEVO)

- `.v2-hero-bg__inner` ahora usa `width: var(--v2-container)` (igual que el
  header). H1 alinea con logo en el mismo eje X.
- Grid 1.4fr / 1fr (izq texto, der form). Mobile colapsa.
- "Ley de Segunda Oportunidad" ahora en italic + color `#DCE7FB` (azul muy
  claro) en lugar del dorado `--v2-accent` anterior.
- **Form lateral nuevo `.v2-hero-form`**:
  - Card max 380px, bg `rgba(253,252,250,0.96)` con `backdrop-filter: blur(10px)`.
  - Border 1px white-translucent + border-top 3px navy accent.
  - Sombra `0 24px 48px rgba(14,19,32,0.18)`.
  - 3 campos: Nombre, Teléfono, Importe deuda (select).
  - Submit pill primary full-width.
  - Microcopy mono: "SIN COMPROMISO · CONFIDENCIAL".
  - Honeypot anti-spam oculto. Action: `#contacto-home` (delegado al form
    completo en sección Hablemos hasta conectar handler dedicado).

### Backgrounds rhythm · diferenciar bloques

Antes: TODO `#FAF7F0` → bloques no se distinguían.
Ahora rhythm editorial alternando:

| Bloque | Background v2.1 | Background v2.2 | Clase |
|---|---|---|---|
| Hero | navy + bg img | navy + bg img | (sin cambio) |
| Sobre | cream | **white** | `v2-section--white` |
| Áreas | cream | **cream** | `v2-section--cream` |
| Equipo | cream | **cream-2 más cálido** `#F2EBDD` | `v2-section--cream-2` |
| Hablemos | cream | **white** | `v2-section--white` |
| Reseñas | cream | **cream-2 más cálido** | `v2-section--cream-2` |
| Footer | navy | navy | (sin cambio) |

Patrón: `dark · white · cream · cream-2 · white · cream-2 · dark`.

Nuevos tokens de superficie:
- `--v2-surface: #FFFFFF` (white limpio para bloques de "respiro").
- `--v2-surface-alt: #F2EBDD` (cream cálido para banda equipo/reseñas).
- `--v2-surface-mist: #EDF1F5` (cool blue-mist, disponible pero sin uso aún).

### Performance recovery · Motion.js eliminado del enqueue

- TBT mobile bajó de **3,710 ms → 0 ms** al desencolar `assets/js/vendor/motion.js`
  (132 KB que nadie usa). Lo dejamos en disco como infraestructura para
  cuando se necesite.
- Performance mobile sube de v2.1 89 → v2.2 90 a pesar de añadir el form
  hero (~1 KB extra HTML/CSS).
- Preload del hero img cambia de `1280w` → `720w` (mejor para LCP mobile).

### Métricas Lighthouse v2.2 (LocalWP HTTP)

| Categoría | Mobile | Desktop | (Δ vs v2.1) |
|---|---:|---:|---|
| Performance | **90** | **100** | +1 / +1 |
| Accessibility | 94 | 94 | = |
| Best Practices | 78 | 78 | = |
| SEO | 92 | 92 | = |

| CWV | Mobile | Desktop |
|---|---|---|
| LCP | ~3.0 s | 0.8 s |
| TBT | 0 ms | 0 ms |
| CLS | 0 | 0 |

---

## [v2.1-home-correcciones] · 2026-05-09 — Rollback a estructura staging

Tras feedback del cliente, recuperamos la estructura de la home migrada
desde staging (6 bloques en lugar de 14) y abandonamos las secciones
extra. Trabajado encima de `v2.0-home` — **no es un restore, son
correcciones acumulativas**.

### Estructura final

```
header (sin top-strip)
hero          ← FULL-BLEED Madrid skyline + overlay navy
sobre         ← foto Remedios + chip "[200+ EXPEDIENTES RESUELTOS]"
áreas-grid    ← 3×2, primera card LSO destacada en navy
equipo        ← 5 cards
hablemos      ← split 5/7 con form integrado en card blanca
reseñas       ← server-side schema.org, 6 placeholders dashed
footer
```

### Eliminado del front-page (los partials siguen en repo)

- `top-strip-v2` (mono ticker)
- `cta-hablemos-v2` mini-tarjeta terminal estado en vivo (sustituido
  por la versión sin terminal)
- `lead-magnet-v2` (PDF "7 errores")
- `casos-v2` (3 casos destacados)
- `cifras-v2` (4 cifras 2×2)
- `proceso-v2` (timeline horizontal 4 nodos)
- `blog-teaser-v2` (3 últimos posts)
- `form-consulta-v2` standalone (form ahora va integrado en
  `cta-hablemos-v2`)
- Numeración `[01 — …]` en TODOS los eyebrows

### Tokens v2.1 · Tipografía sans moderna

Fraunces eliminado. Sustituido por **Inter Display** (alias del mismo
archivo Inter, weights 600/700) + Inter (body, weights 400/500) +
JetBrains Mono (meta, sin cambios).

| Token | Antes (v2.0) | Después (v2.1) |
|---|---|---|
| `--v2-font-display` | n/a | `'Inter Display', 'InterV2', system-ui, sans-serif` |
| `--v2-font-serif` | `'Fraunces', ...` | alias → `var(--v2-font-display)` (compat) |
| `--v2-font-sans` | `'InterV2', 'Söhne', ...` | sin cambios |
| `--v2-font-mono` | `'JBMono', ...` | sin cambios |
| `--v2-tracking-display` | n/a | `-0.02em` (display tight para Inter bold) |
| `--v2-fs-h1` | `clamp(2.75, ..., 5rem)` | `clamp(2.5, ..., 4.5rem)` (Inter más denso) |
| `--v2-fs-h2` | `clamp(2, ..., 3.25rem)` | `clamp(2, ..., 3rem)` |

**Archivos eliminados**: 8 woff2 de Fraunces (160 KB).
**Archivos añadidos**: 2 woff2 de Inter weight 700 (latin + latin-ext).
**Preload**: ahora sólo Inter 600 (en lugar de Fraunces 700 + Inter 500).

### Hero v2.1 · LCP optimizado

- `<picture>` con WebP responsive (`srcset` 720w/1280w/1920w) + JPG fallback.
- `<link rel="preload" as="image" imagesrcset="..." imagesizes="100vw" fetchpriority="high">`
  en `header-v2.php`.
- WebP generadas con `cwebp -q 75`:
  - 720w: 64 KB
  - 1280w: 151 KB
  - 1920w: 242 KB
  - JPG fallback original: 601 KB

### Áreas v2.1 · primera card destacada navy

- Variant `.v2-card-area--feature` con `background: var(--v2-primary)`
  + texto blanco. Aplicada a la primera card (LSO).
- Quitados los números `01.` `02.` `03.` … de las cards.
- Añadido `.v2-card-area__icon` con cuadro 44×44 hairline + icono
  SVG line-art (helper `morillo_area_icon($key)` ya existente).
- En la card `--feature`, el icono se vuelve dorado.

### Sobre v2.1 · foto + chip

- Grid 5/7. Izquierda: foto Remedios vertical 3/4 con borde hairline
  + chip absoluto en esquina inferior izquierda
  `[ 200+ EXPEDIENTES RESUELTOS ]` (mono uppercase).
- Derecha: eyebrow `SOBRE EL DESPACHO`, H2 con `Remedios Morillo`
  en énfasis italic + color primary, 2 párrafos, link mono al equipo.

### Hablemos v2.1 · form integrado

- Reemplaza `cta-hablemos-v2` v2.0 (que era CTA + terminal mini-card).
- Grid 5/7. Izq: eyebrow `HABLEMOS`, H2 `¿Crees que tu caso encaja?`
  con `tu caso encaja` en italic primary, lead, 2 filas tel/email
  grandes mono con bordes hairline.
- Der: card blanca con borde hairline conteniendo el form completo
  (nombre, teléfono, email, provincia, importe deuda radios mono,
  textarea, checkbox privacidad, submit).
- Eliminado el bloque terminal `[ESTADO ATENDIENDO]`.

### Reseñas v2.1 · placeholders dashed

- 6 cards `.v2-review--placeholder` con borde 1px dashed
  `--v2-line-strong`, texto mono "[ RESEÑA PENDIENTE · GOOGLE · ★★★★★ ]"
  y firma "— Conectar con la API de Google Reviews —".
- Mantienen el schema.org `Review` para que cuando lleguen reseñas
  reales, sólo haya que sustituir el array `$placeholders`.

### Header v2.1 sin top-strip

- Eliminado `get_template_part( 'patterns/top-strip-v2' )` del
  `header-v2.php`.
- Header ahora sólido (`v2-header--solid`): cream con backdrop-filter
  + hairline inferior, en lugar de transparente con scroll-toggle.

### Métricas Lighthouse v2.1 (LocalWP HTTP)

| Categoría | Mobile | Desktop | (Δ vs v2.0) |
|---|---:|---:|---|
| Performance | **89** | **99** | -7 / -1 |
| Accessibility | 94 | 94 | +2 / +2 |
| Best Practices | 78 | 78 | = |
| SEO | 92 | 92 | = |

| CWV | Mobile | Desktop |
|---|---|---|
| LCP | 3.5 s | 0.9 s |
| FCP | 1.8 s | 0.4 s |
| TBT | 0 ms | 0 ms |
| CLS | 0 | 0 |

- Mobile bajó de 96 → 89 por el bg image del hero (incluso optimizado
  WebP responsive). LCP 3.5s mobile vs 2.5s v2.0 (que no tenía bg
  image). Desktop apenas se mueve. En producción Cloudways con HTTPS
  + h2 + Breeze cache, esperamos +5 puntos mobile.

---

## [v2.0-home] · 2026-05-09 — Rediseño Home (sistema editorial Tailscale-style)

Iteración v2 del front-page. **Solo afecta a la home.** El resto del sitio sigue
sirviendo `header.php`, `footer.php`, `tokens.css` y `main.css` v1 sin cambios.

### Estrategia general

- **Patterns -v2 nuevos** (no se sobrescribe nada existente): `header-v2.php`,
  `footer-v2.php`, y 14 partials en `patterns/*-v2.php`.
- **Front-page** reescrito como orquestador minimal de partials -v2.
- **Enqueue condicional**: tokens-v2, home-v2 CSS, motion JS y fuentes
  self-hostadas solo cargan si `is_front_page()`. Cero impacto en otras URLs.

### Tokens v2

Sustituyen el sistema navy/blue/Inter Tight v1 por un sistema cream / 3-fonts
inspirado en Tailscale/Linear/Resend. Conviven en archivos separados; v1 sigue
intacto para el resto del sitio.

#### Color

| Token (v2) | Antes (v1, `tokens.css`) | Después (`tokens-v2.css`) | Notas |
|---|---|---|---|
| `--v2-bg` | n/a (`--paper #ffffff`) | `#FAF7F0` | Cream cálido, fondo de página |
| `--v2-surface` | `--paper #ffffff` | `#FFFFFF` | Tarjetas/hero/footer |
| `--v2-surface-alt` | `--paper-2 #f7f8fa` (frío) | `#F2EBDD` | Bandas alternas |
| `--v2-ink` | `--ink #0f1d3d` | `#0E1320` | Texto principal (más neutro, menos azul) |
| `--v2-ink-soft` | `--ink-2 rgba(15,29,61,0.72)` | `#2A3142` | Sólido, no rgba |
| `--v2-muted` | `--ink-3 rgba(15,29,61,0.55)` | `#6B7280` | |
| `--v2-primary` | `--ink #0f1d3d` (era body) | `#162542` | Navy clásico, ahora rol de marca |
| `--v2-primary-2` | n/a | `#243559` | Hover/active |
| `--v2-accent` | `--blue #1863DC` | `#B8884B` | **Cambio fuerte**: dorado sobrio en lugar de azul vivo |
| `--v2-accent-soft` | n/a | `#E5D6B8` | Backgrounds suaves |
| `--v2-line` | `--rule rgba(15,29,61,0.10)` | `#E8E1D4` | Hairline cream-tinted |
| `--v2-line-strong` | `--rule-strong rgba(15,29,61,0.18)` | `#C8BFA8` | |

**Razón del cambio dorado**: en v1 el azul `#1863DC` competía con el navy
`#162542` por la atención. v2 usa el navy como marca y reserva un dorado
sobrio (`#B8884B`) para subrayados y divisores con personalidad. Más editorial.

#### Tipografía

| Familia | Antes (v1) | Después (v2) | Subset | Pesos |
|---|---|---|---|---|
| Display | n/a (era Inter Tight) | **Fraunces** (self-hosted) | latin + latin-ext | 300/400/500/700 |
| Sans | Inter Tight (Google Fonts CDN) | **Inter** (self-hosted) | latin + latin-ext | 400/500/600 |
| Mono | JetBrains Mono (Google Fonts CDN) | **JetBrains Mono** (self-hosted) | latin + latin-ext | 400/500 |

- **Cambio sustancial**: pasamos de 1 familia (Inter Tight) a 3 con roles claros
  (display serif, body sans, metadata mono). El mono es la firma del sistema.
- Self-hosted via woff2 con `font-display: swap` y `unicode-range` selectivo.
- Preload sólo de `fraunces-700` y `inter-500` en `header-v2.php`.

#### Escala fluida

Nueva escala con `clamp()`. Sustituye los 8 tokens `--fs-*` v1 por 11 tokens
`--v2-fs-*` (eyebrow, meta, body, lead, h6..h1, display).

#### Espaciado / radios / motion

- Espaciado: nueva escala 1..10 (4px..128px) en tokens `--v2-space-N`.
- Radios: `--v2-radius-xs 2px` (Tailscale-feel) en lugar de `--r-sm 8px` v1.
- Easings: `cubic-bezier(0.22, 1, 0.36, 1)` (out) y `cubic-bezier(0.65,0,0.35,1)` (in-out).

### Bloques nuevos en la home

`top-strip` · `header-v2` · `hero-v2` · `stats-bar-v2` · `sobre-v2` ·
`areas-grid-v2` · `proceso-v2` · `equipo-v2` · `cifras-v2` · `casos-v2` ·
`cta-hablemos-v2` · `form-consulta-v2` · `resenas-v2` · `lead-magnet-v2` ·
`blog-teaser-v2` · `footer-v2`

### Dependencias nuevas

- `motion` (npm) — vendored en `assets/js/vendor/motion.min.js`. No se carga
  ningún módulo desde npm en runtime; el bundle estático va al footer.

### Pendiente / no incluido

- Mega-menú con focus trap completo (la versión v2 tiene mega-menú visual
  pero el focus trap es un TODO para iteración siguiente).
- Lead magnet: el form envía el email, pero el handler real (CRM + email
  automático con PDF) queda como stub.
- Reseñas: 6 cards placeholder con schema.org `Review`. Cuando lleguen
  reseñas reales (ReputationHub API o similar), conectar.
- Casos destacados: placeholders editoriales. Cuando exista CPT
  `casos_exito` con datos, sustituir por loop dinámico.
