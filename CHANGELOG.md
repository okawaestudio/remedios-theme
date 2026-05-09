# CHANGELOG

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
