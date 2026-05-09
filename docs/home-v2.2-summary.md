# Home v2.2 — resumen ejecutivo

**Iteración**: 6 ajustes de UI sobre `v2.1-home` según brief acotado del
cliente (sin migración a Gutenberg, sin nueva estructura, sin recuperar
bloques eliminados — el prompt grande v2.2 se descartó).

**Tag**: `v2.2-home` · **Fecha**: 2026-05-09

---

## 1 · Lo que cambia (6 ajustes)

| # | Cambio | Estado |
|---|---|---|
| 1 | Quitar JetBrains Mono (no le gusta) | ✅ — fuente única Plus Jakarta Sans |
| 2 | Cards de equipo más modernas | ✅ — sin desaturate, foto bleed, hover lift |
| 3 | Botones más actuales | ✅ — pill, heights consistentes, jerarquía clara |
| 4 | Hero: H1 alineado con header + form sutil a la derecha | ✅ — mismo container, grid 1.4/1, form 3 campos |
| 5 | Diferenciar bloques (todo era cream antes) | ✅ — rhythm dark-white-cream-cream2-white-cream2-dark |
| 6 | Look general moderno (Jakarta) | ✅ — eyebrows en Jakarta uppercase, no más mono |

## 2 · Tipografía · Plus Jakarta Sans única

- **Eliminado**: JetBrains Mono (8 woff2, -64 KB) + Inter (8 woff2, -240 KB).
- **Añadido**: Plus Jakarta Sans 400/500/600/700 latin + latin-ext (8 woff2, 100 KB).
- **Roles**: display (H1/H2 600/700), body (400/500), eyebrows (600 uppercase
  con tracking 0.14em). Una sola familia para TODO.
- **Por qué Jakarta sin mono**: el cliente dijo "tipo Jakarta o similar,
  aspecto moderno". Eyebrows en Jakarta uppercase + tracking generoso dan
  el mismo "feel editorial" que la mono pero más limpio y menos "tech".

## 3 · Botones · pill modernos

```
.v2-btn          height: 48px  · radius: 999px  · weight 500
.v2-btn--lg      height: 56px
.v2-btn--block   width: 100%

--primary        bg navy → hover primary-3 (más claro)
--ghost          outline → hover invertido
--inverse        bg cream sobre fondos dark
--inverse-ghost  outline sobre dark
--mono           Jakarta + font-feature-settings: tnum (números tabulares)
```

Sin `transform: translateY(-1px)` en hover (lo quité — se sentía nervioso).
Solo cambio de color suave.

## 4 · Cards equipo · rediseño

Antes: padding interno + foto con `filter: saturate(.85)` + hover suave.
Ahora:
- `border-radius: 12px` (era 4px).
- `overflow: hidden` → la foto hace bleed al borde superior.
- Foto **sin filter** (las fotos reales se ven naturales).
- Hover: `translateY(-4px)` + sombra + `transform: scale(1.04)` en la foto
  (transición 600ms para no saturar).
- Body separado en `.v2-team-card__body` con padding `18px 20px 20px` y
  jerarquía clara: nombre 16.5px, rol 13px muted, creds 10.5px con
  hairline separador.

## 5 · Hero · alineado con header + form lateral

### Alineación con header

Antes: `.v2-hero-bg__inner` tenía `width: min(880px, ...)` distinto del
header (1200px). El H1 quedaba descentrado respecto al logo.
Ahora: ambos usan `var(--v2-container)` (`min(1200px, 100% - 2*gutter)`).
H1 y logo arrancan en el mismo eje X.

### Form lateral derecha (`.v2-hero-form`)

Card sutil con backdrop-blur sobre la foto Madrid:

- **Background**: `rgba(253,252,250,0.96)` con `backdrop-filter: blur(10px) saturate(140%)`.
- **Border**: 1px white-translucent + **border-top 3px navy accent** (firma visual).
- **Sombra**: `0 24px 48px rgba(14,19,32,0.18)` (sutil pero da profundidad).
- **Layout**: 3 campos en columna → submit pill full-width:
  1. Nombre (input text)
  2. Teléfono (input tel)
  3. Importe aproximado de deuda (select con 4 rangos)
  4. Botón "Pedir consulta gratuita →"
  5. Microcopy "SIN COMPROMISO · CONFIDENCIAL"

- **Honeypot anti-spam** oculto.
- **Action actual**: `#contacto-home` (ancla al form completo de Hablemos).
  Cuando se conecte al handler `morillo_contact_form()`, será POST directo.

### Acento del H1

Antes: "Ley de Segunda Oportunidad" en italic + dorado `--v2-accent #B8884B`.
Ahora: italic + azul claro `#DCE7FB`. Más coherente con la paleta navy
(monocromática) que con el dorado. El dorado queda fuera de la home.

## 6 · Backgrounds rhythm

Era TODO `#FAF7F0` → bloques planos sin diferenciación.
Ahora rhythm:

```
[hero       ]   navy + bg Madrid
[sobre      ]   white            ← respiro tras el navy
[áreas      ]   cream            ← banda cálida
[equipo     ]   cream-2 (#F2EBDD)← banda más cálida (foco en personas)
[hablemos   ]   white            ← respiro para destacar el form card
[reseñas    ]   cream-2          ← cierra banda cálida
[footer     ]   navy             ← cierra simétrico
```

Patrón: `dark · white · cream · cream2 · white · cream2 · dark`.

Nuevos tokens:
- `--v2-surface: #FFFFFF` (white).
- `--v2-surface-alt: #F2EBDD` (cream warm).
- `--v2-surface-mist: #EDF1F5` (cool, disponible pero sin uso).

Aplicado vía clases utilitarias `.v2-section--white`, `.v2-section--cream`,
`.v2-section--cream-2` añadidas en cada `<section>` de los partials.

## 7 · Performance · Motion.js eliminado del enqueue

Hallazgo crítico de Lighthouse v2.2 inicial: **TBT mobile 3,710 ms** —
Motion.js (132 KB) bloqueaba el main thread sin ser usado por nadie. El
JS de la home solo usa CSS transitions + IntersectionObserver, no Motion.

Acción: `wp_enqueue_script('morillo-motion', ...)` desactivado en
`inc/enqueue-home-v2.php`. El bundle queda en disco
(`assets/js/vendor/motion.js`) por si algún partial futuro lo necesita.

Resultado: **TBT 3,710 ms → 0 ms**. Performance mobile **62 → 90** (+28).

Bonus: cambio del preload del hero img de `1280w` → `720w` ayuda LCP mobile
(el browser elegía mal el tamaño antes).

## 8 · Métricas Lighthouse v2.2

| Categoría | Mobile | Desktop | Δ vs v2.1 |
|---|---:|---:|---|
| Performance | **90** | **100** | +1 / +1 |
| Accessibility | 94 | 94 | = |
| Best Practices | 78 | 78 | = |
| SEO | 92 | 92 | = |

| CWV | Mobile | Desktop |
|---|---|---|
| LCP | ~3.0 s | 0.8 s |
| FCP | 1.4 s | 0.4 s |
| TBT | 0 ms | 0 ms |
| CLS | 0 | 0 |

Detalle en `docs/lighthouse/home-v2.2.md`.

## 9 · Capturas Playwright

`docs/screens/home-v2.2/` con 4 anchos × 2 versiones (above-fold + fullpage).
Visual destacado en `1280.png` y `1280.full.png`.

## 10 · Decisiones tomadas

### A) "Tipo Jakarta o similar" → Plus Jakarta Sans
**Por qué**: la única "Jakarta" en Google Fonts es Plus Jakarta Sans.
Geometría humanista, x-height generoso, look 2024+. Se renderiza
excelente en cualquier peso entre 400-700.

### B) Eliminar Inter completo (no solo Inter Display alias)
**Por qué**: si la fuente única es Jakarta, mantener Inter como fallback
de body solo añade ~240 KB sin valor. system-ui es fallback suficiente
mientras Jakarta carga (font-display: swap).

### C) Eyebrows en Jakarta uppercase, no en mono
**Por qué**: el cliente dijo "no me gusta JB Mono". Las dos opciones eran
(1) cambiar a otra mono o (2) abandonar mono. Opté por (2) porque "look
moderno" + "tipo Jakarta o similar" sugiere preferencia por sans
geométrico, no editorial-tech.

### D) Form hero: 3 campos mínimo
**Por qué**: el user eligió "mínimo" en la pregunta. Captura inicial sin
fricción → cualifica el lead vía el campo Importe → llamada de seguimiento.
El form completo (nombre, tel, email, provincia, importe, mensaje,
checkbox) sigue intacto en la sección Hablemos para quien quiera dar más
contexto.

### E) Mantener el form action="#contacto-home"
**Por qué**: el handler `morillo_contact_form()` existente espera campos
con nombres específicos (`nombre`, `telefono`, `email`, `mensaje`,
`acepto`). El form hero usa nombres diferentes (`hf_*`) para no chocar.
Al hacer submit, el browser navega al ancla `#contacto-home` donde está
el form completo; el cliente puede rellenar el resto.

Si quieres conexión directa al handler con solo 3 campos, dime y añado
una variante de `morillo_contact_form()` que acepte el set reducido.

### F) Sin migración a Block Patterns / Gutenberg
**Por qué**: el cliente descartó explícitamente el prompt grande v2.2 que
pedía esa migración. Mantenemos partials PHP. Si más adelante quiere
edición visual desde `/wp-admin`, hay 3 caminos documentados (convertir
partials a Block Patterns, instalar Bricks, dejar como está).

## 11 · Pendientes

### Performance · llegar a 95+ mobile

- **CSS unused** (~15 KB): `home-v2.css` carga estilos de partials no
  incluidos en home v2.1/v2.2 (proceso, cifras, casos, lead-magnet,
  blog-teaser, top-strip, terminal, statsbar). Limpiar bajaría a ~25 KB.
- **JS unused**: `home-v2.js` aún tiene IIFEs de counter (no se usa) y
  despachoStatus (terminal eliminado). Limpiar ahorra ~150 ms.
- **CSS critical inline**: el primer above-fold carga sin CSS hasta que
  llega `home-v2.css`. Inlinear el CSS crítico (hero + header) en `<style>`
  podría dar +3-5 puntos de LCP mobile.

### A11y · llegar a 100

- **Heading order**: Lighthouse marca "no sequentially descending". Hay
  algún H4 antes del H1 (probablemente del megamenú aún, aunque ya cambié
  uno; queda otro o el footer h4 antes de algo).
- **Form labels**: Lighthouse marca "Form elements do not have associated
  labels". Posiblemente algún `<select>` (provincia o importe del hero
  form) sin `<label for>` correctamente asociado.

### Funcional

- Conectar form hero al handler PHP (variante reducida 3 campos).
- Conectar form Hablemos al `morillo_contact_form()` existente.
- Conectar reseñas a Google Reviews API o sustituir placeholders por
  reseñas reales.

## 12 · Cómo iterar

```bash
# Capturas
node scripts/screens-v2.2.mjs

# Lighthouse
node scripts/lighthouse-v2.2.mjs
```

## 13 · Validación pendiente con el cliente

Antes de proceder a Fase 3, validar:

1. ¿Plus Jakarta Sans encaja con el tono del despacho? (es minimal-moderno;
   si quiere más editorial, alternativas: Geist, Söhne, Manrope).
2. ¿El form sutil del hero envía a `#contacto-home` o conecto handler
   directo con 3 campos solo?
3. ¿La diferenciación de bloques (rhythm dark-white-cream-cream2) se ve
   suficiente o quiere más contraste?
4. ¿Las cards de equipo modernas (sin desaturate, hover scale) le gustan
   o prefiere algo distinto (ej. cards más grandes, tipo perfil
   destacado)?
