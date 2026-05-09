# CHANGELOG

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
