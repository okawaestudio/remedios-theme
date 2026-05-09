# Lighthouse · home-v2.1

Ejecutado: 2026-05-09T21:02:13.933Z
URL: http://remedios-morillo-v3.local/

> **Notas sobre el entorno**: este Lighthouse corre contra LocalWP en HTTP/1.1
> sin compresión gzip/brotli ni CDN, con cache desactivado. Las métricas son
> orientativas. Para benchmark real, repetir tras desplegar a Cloudways con
> Breeze + HTTPS.

## Scores

| Categoría        | Mobile | Desktop |
|------------------|-------:|--------:|
| Performance      | **89** | **99** |
| Accessibility    | **94** | **94** |
| Best Practices   | **78** | **78** |
| SEO              | **92** | **92** |

## Core Web Vitals

| Métrica | Mobile | Desktop |
|---|---|---|
| LCP (Largest Contentful Paint) | 3.5 s | 0.9 s |
| FCP (First Contentful Paint)   | 1.8 s   | 0.4 s   |
| TBT (Total Blocking Time)      | 0 ms      | 0 ms      |
| CLS (Cumulative Layout Shift)  | 0  | 0  |
| Speed Index                    | 2.7 s              | 0.4 s              |
| TTI (Time to Interactive)      | 3.6 s              | 0.9 s              |

## Top oportunidades (mobile)

- **Reduce unused JavaScript** — ahorro estimado 150ms

## Accesibilidad — issues binary fail (mobile)

- **Heading elements are not in a sequentially-descending order**
- **Form elements do not have associated labels**
