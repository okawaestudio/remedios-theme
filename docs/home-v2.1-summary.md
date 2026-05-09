# Home v2.1 — resumen ejecutivo (correcciones)

**Iteración**: rollback parcial sobre `v2.0-home`. Se recupera la estructura
del staging migrado y se abandonan las secciones extra. **No es un restore**:
trabajado encima del v2.0 con commits acumulativos.

**Tag**: `v2.1-home` · **Fecha**: 2026-05-09

---

## 1 · Estructura final (8 bloques)

```
1. header               (sin top-strip — header sólido cream)
2. hero                 ← FULL-BLEED Madrid skyline + overlay navy gradient
3. sobre-el-despacho    (foto Remedios izq + chip "[200+ EXPEDIENTES]" + texto der)
4. areas-grid           (3×2, primera card LSO destacada en navy con texto blanco)
5. equipo               (5 cards con fotos reales + creds mono)
6. hablemos + form      (split 5/7, form integrado en card blanca a la derecha)
7. resenas              (server-side, 6 placeholders dashed con schema.org)
8. footer               (sin cambios respecto a v2.0 · 4 cols + bottom bar)
```

## 2 · Eliminado del front-page

Los partials **siguen en repo** (no borrados), solo dejan de incluirse:

- `patterns/top-strip-v2.php` — mono ticker
- `patterns/proceso-v2.php` — timeline horizontal 4 pasos
- `patterns/cifras-v2.php` — 4 cifras editoriales 2×2
- `patterns/casos-v2.php` — 3 casos destacados
- `patterns/lead-magnet-v2.php` — PDF "7 errores LSO"
- `patterns/blog-teaser-v2.php` — 3 últimos posts
- `patterns/stats-bar-v2.php` — banda 3 stats con counter
- `patterns/form-consulta-v2.php` — form standalone (ahora integrado en `cta-hablemos-v2`)
- Mini-tarjeta terminal `[ ESTADO · ATENDIENDO ]` (eliminada del partial `cta-hablemos-v2`)
- Numeración `[01 — …]` `[02 — …]` … en todos los eyebrows

Quedan disponibles para reusar en otras páginas o en una iteración futura
si el cliente cambia de criterio.

## 3 · Tipografía cambiada · Fraunces → Inter Display

Cambio sustancial en la familia display:

| | Antes (v2.0) | Después (v2.1) |
|---|---|---|
| Display (H1, H2) | **Fraunces** serif 300/400/500/700 | **Inter Display** sans 600/700 (alias del mismo Inter weights 600/700) |
| Body / UI | Inter (alias `InterV2`) 400/500/600 | sin cambios |
| Metadata / eyebrows | JetBrains Mono (alias `JBMono`) 400/500 | sin cambios |
| Tracking display | n/a | `-0.02em` (Inter bold pide más tight) |
| Preload | Fraunces 700 + Inter 500 | **solo Inter 600** |
| Total fonts en disco | 404 KB (8 Fraunces + 6 Inter + 4 JBM) | **244 KB** (8 Inter + 4 JBM) |

Detalle antes/después en `CHANGELOG.md` apartado `v2.1 · Tipografía sans moderna`.

## 4 · Hero v2.1 — full-bleed Madrid optimizado

Imagen Madrid (`assets/img/hero/madrid-granvia.jpg`, 1500×1001, 601 KB) se
mantiene como JPG fallback. Generadas 3 versiones WebP responsive:

- `madrid-granvia-720.webp` · 64 KB (mobile)
- `madrid-granvia-1280.webp` · 151 KB (tablet)
- `madrid-granvia.webp` · 242 KB (desktop)

**`<picture>` con `<source srcset>`** + **`<link rel="preload"
imagesrcset imagesizes fetchpriority="high">`** en `header-v2.php` para
acelerar LCP. Resultado: LCP mobile 3.5s (vs 5.7s sin optimizar).

Estructura del hero:
- `<section>` 100vw, padding-block 12rem, min-height 600px, isolation.
- `<picture>` posicionado absoluto z-index -2 con `object-fit: cover`.
- `<div>` overlay z-index -1 con `linear-gradient(135deg, rgba(22,37,66,.78), rgba(22,37,66,.55))`.
- Contenido centrado horizontal max 880px, eyebrow blanco mono, H1 con
  "Ley de Segunda Oportunidad" en italic + color accent dorado, lead
  blanco soft, 2 botones (inverse + inverse-ghost mono), microstats
  inline mono al pie con divisores hairline.

## 5 · Áreas v2.1 — primera card destacada navy

- Grid 3×2.
- Primera card (LSO): variant `.v2-card-area--feature` con
  `background: var(--v2-primary)` + texto blanco + icono dorado.
- Otras 5: white con borde hairline.
- Sin números `01.` `02.` … en cards.
- Icono SVG line-art via helper existente `morillo_area_icon($key)`.

## 6 · Sobre v2.1 — foto + chip

- Grid 5/7. Izq: foto Remedios vertical 3/4 con hairline + chip absoluto
  esquina inf izq `[ 200+ EXPEDIENTES RESUELTOS ]` (mono).
- Der: eyebrow `SOBRE EL DESPACHO` (sin numeritos), H2 con `Remedios
  Morillo` en italic primary, 2 párrafos lead, link mono al equipo.

## 7 · Hablemos v2.1 — form integrado

- Sustituye al `cta-hablemos-v2` v2.0 (que era CTA navy + terminal).
- Grid 5/7 fondo cream (no navy).
- Izq: eyebrow `HABLEMOS`, H2 `¿Crees que tu caso encaja?` con énfasis
  italic primary, lead, 2 filas tel/email grandes en mono con bordes
  hairline (clickables, hover desplaza padding-left).
- Der: card blanca con borde hairline + radius 4px, padding generoso,
  form completo (nombre, teléfono, email, provincia, importe deuda
  radios mono pills, textarea, checkbox privacidad, submit).

## 8 · Reseñas v2.1 — placeholders dashed

6 cards `.v2-review--placeholder`:
- Borde 1px **dashed** `--v2-line-strong` (en lugar de solid).
- Quote en mono uppercase: `Pendiente sincronizar con Google My Business.`
- Sign mono: `— Conectar con la API de Google Reviews —`.
- Header con 5 estrellas + `[ RESEÑA PENDIENTE · GOOGLE ]`.

Mantiene `itemscope itemtype="https://schema.org/Review"`. Cuando lleguen
reseñas reales, sustituir el `$placeholders` array por loop dinámico.

## 9 · Métricas Lighthouse v2.1

(LocalWP HTTP, sin gzip ni CDN — ver `docs/lighthouse/home-v2.1.md` detalle)

| | Mobile | Desktop |
|---|---:|---:|
| Performance | **89** | **99** |
| Accessibility | 94 | 94 |
| Best Practices | 78 | 78 |
| SEO | 92 | 92 |

| CWV | Mobile | Desktop |
|---|---|---|
| LCP | 3.5 s | 0.9 s |
| FCP | 1.8 s | 0.4 s |
| TBT | 0 ms | 0 ms |
| CLS | 0 | 0 |

**Comparación con v2.0**:

| | v2.0 | v2.1 | Δ |
|---|---:|---:|---|
| Perf mobile | 96 | 89 | -7 |
| Perf desktop | 100 | 99 | -1 |
| LCP mobile | 2.5 s | 3.5 s | +1 s |
| Accessibility | 92 | 94 | +2 |

El bajón de Performance mobile (96 → 89) es por el bg image del hero
incluso con WebP responsive y preload — un bg image grande es
intrínsicamente costoso en mobile con throttling 3G simulado.

**En producción Cloudways con HTTPS + h2 + Breeze cache** esperamos
recuperar 5-8 puntos mobile (compresión + multiplexación HTTP/2 + CDN
de imágenes).

## 10 · Capturas Playwright

`docs/screens/home-v2.1/` con 4 anchos × 2 versiones (above-fold +
fullpage):

- `360.png` · `360.full.png`
- `768.png` · `768.full.png`
- `1280.png` · `1280.full.png`
- `1920.png` · `1920.full.png`

## 11 · Decisiones tomadas (v2.1)

### A) Mantener partials abandonados en `patterns/`
**Por qué**: el cliente puede cambiar de opinión o querer reutilizar
algunos en otras páginas (proceso → /equipo, casos → /casos-de-exito,
blog-teaser → /blog). Borrarlos cuesta 0 en disco y pierden valor
documental.

### B) "Inter Display" como alias del mismo Inter
**Por qué**: rsms.me/inter ofrece "Inter Display" como subfamilia óptica
para tamaños grandes, pero @fontsource no la empaqueta separada. El
matiz visual entre "Inter" y "Inter Display" en weight 700 a 64px es
mínimo. Crear el alias `font-family: 'Inter Display'` con
`src: url(inter-700-normal.woff2)` permite mantener la semántica de
roles (display vs body) sin coste extra.

### C) Picture + WebP responsive para el hero
**Por qué**: una sola WebP 1920w (242 KB) es overkill para mobile.
Tres tamaños (720/1280/1920) + sizes="100vw" + browser elige el
correcto. Reducción de 242 KB → ~64 KB en mobile sin pérdida visual.

### D) Eliminé el `data-stagger` del hero v2.1
Para que la animación de entrada no oculte el LCP candidate (el `<img>`
del bg). Sigue habiendo `data-stagger` en otras secciones.

### E) Header sólido cream, no transparent + scroll-toggle
**Por qué**: con el hero full-bleed dark, un header transparent al
inicio quedaba ilegible (logo navy sobre Madrid azul). Header sólido
cream con hairline inferior es coherente desde el primer frame.

## 12 · Pendientes / TODO

### Performance · llegar a 95+ mobile

- **Optimizar bg image más**: bajar quality a 65 + considerar AVIF
  además de WebP. Ahorro estimado 30-40 KB en mobile.
- **CSS unused**: home-v2.css carga estilos de los partials no usados
  (proceso, cifras, casos, lead-magnet, blog-teaser, top-strip,
  terminal, statsbar). Limpiar bajaría el CSS de 41 KB → ~25 KB.
- **JS unused** (~150 ms): el counter de stats ya no se usa. El handler
  del despacho-status tampoco (terminal eliminado). El handler del
  lead-magnet form tampoco. Limpiar 3 IIFEs.

### Accesibilidad · llegar a 100

- **Heading order**: Lighthouse marca "no sequentially descending".
  Sospechoso: el `<picture>` del hero o algún chip mono que
  Lighthouse interprete como heading rank inesperado. Revisar.
- **Form labels**: probable algún radio sin `<label>` correctamente
  asociado. Auditoría manual del form.

### Funcional

- Conectar el form de hablemos al `morillo_contact_form()` existente
  en `inc/contact-form.php` (handler ya hecho, solo wire-up).
- Conectar reseñas a Google Reviews API o a `wp_options` con datos
  reales.
- Mega-menú: focus trap WCAG 2.4.11 AAA.

## 13 · Cómo iterar v2.1

```bash
# Capturas Playwright
node scripts/screens-v2.1.mjs

# Lighthouse
node scripts/lighthouse-v2.1.mjs

# Vendorizar motion (si actualizas dep)
npm run vendor:motion
```

## 14 · Validación pendiente con el cliente

Antes de proceder con Fase 3 (otras páginas), validar:

1. ¿La estructura recortada (8 bloques) es la correcta?
2. ¿La tipografía Inter Display + Inter encaja con el tono del
   despacho? (Inter es muy "tech-corporate"; si quiere algo más cálido
   podemos volver a un serif pero no Fraunces — quizás Source Serif).
3. ¿El hero full-bleed con foto Madrid + overlay navy es lo que
   buscaba? (vs un hero más sobrio sin imagen).
4. ¿Las reseñas placeholder se sustituyen por embed de Google o por
   sincronización a wp_options manual?
