#!/usr/bin/env node
/**
 * Lighthouse mobile + desktop sobre la home.
 * Salida: docs/lighthouse/home-v2.4.md con scores + CWV.
 */
import lighthouse from 'lighthouse';
import * as chromeLauncher from 'chrome-launcher';
import { mkdir, writeFile } from 'node:fs/promises';
import { dirname, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const __dirname = dirname(fileURLToPath(import.meta.url));
const ROOT = resolve(__dirname, '..');
const OUT  = resolve(ROOT, 'docs/lighthouse');
const URL  = process.env.URL || 'http://remedios-morillo-v3.local/';

await mkdir(OUT, { recursive: true });

async function run(formFactor) {
  const chrome = await chromeLauncher.launch({
    chromeFlags: ['--headless=new', '--no-sandbox', '--ignore-certificate-errors'],
  });
  try {
    const result = await lighthouse(URL, {
      port: chrome.port,
      output: 'json',
      logLevel: 'error',
      onlyCategories: ['performance', 'accessibility', 'best-practices', 'seo'],
      formFactor,
      screenEmulation: formFactor === 'mobile'
        ? { mobile: true, width: 412, height: 823, deviceScaleFactor: 1.75, disabled: false }
        : { mobile: false, width: 1350, height: 940, deviceScaleFactor: 1, disabled: false },
      throttling: formFactor === 'mobile'
        ? { rttMs: 150, throughputKbps: 1638.4, requestLatencyMs: 562.5, downloadThroughputKbps: 1474.56, uploadThroughputKbps: 675, cpuSlowdownMultiplier: 4 }
        : { rttMs: 40, throughputKbps: 10240, cpuSlowdownMultiplier: 1, requestLatencyMs: 0, downloadThroughputKbps: 0, uploadThroughputKbps: 0 },
    });
    return result.lhr;
  } finally {
    await chrome.kill();
  }
}

function pct(score) { return score === null ? 'n/a' : Math.round(score * 100); }
function fmtAudit(lhr, key) {
  const a = lhr.audits[key];
  if (!a) return 'n/a';
  return a.displayValue || (a.numericValue ? `${Math.round(a.numericValue)}ms` : 'n/a');
}

console.log('▶ Lighthouse mobile…');
const mobile = await run('mobile');
console.log('  ✓ mobile listo · perf=' + pct(mobile.categories.performance.score));
console.log('▶ Lighthouse desktop…');
const desktop = await run('desktop');
console.log('  ✓ desktop listo · perf=' + pct(desktop.categories.performance.score));

const md = `# Lighthouse · home-v2.4

Ejecutado: ${new Date().toISOString()}
URL: ${URL}

> **Notas sobre el entorno**: este Lighthouse corre contra LocalWP en HTTP/1.1
> sin compresión gzip/brotli ni CDN, con cache desactivado. Las métricas son
> orientativas. Para benchmark real, repetir tras desplegar a Cloudways con
> Breeze + HTTPS.

## Scores

| Categoría        | Mobile | Desktop |
|------------------|-------:|--------:|
| Performance      | **${pct(mobile.categories.performance.score)}** | **${pct(desktop.categories.performance.score)}** |
| Accessibility    | **${pct(mobile.categories.accessibility.score)}** | **${pct(desktop.categories.accessibility.score)}** |
| Best Practices   | **${pct(mobile.categories['best-practices'].score)}** | **${pct(desktop.categories['best-practices'].score)}** |
| SEO              | **${pct(mobile.categories.seo.score)}** | **${pct(desktop.categories.seo.score)}** |

## Core Web Vitals

| Métrica | Mobile | Desktop |
|---|---|---|
| LCP (Largest Contentful Paint) | ${fmtAudit(mobile, 'largest-contentful-paint')} | ${fmtAudit(desktop, 'largest-contentful-paint')} |
| FCP (First Contentful Paint)   | ${fmtAudit(mobile, 'first-contentful-paint')}   | ${fmtAudit(desktop, 'first-contentful-paint')}   |
| TBT (Total Blocking Time)      | ${fmtAudit(mobile, 'total-blocking-time')}      | ${fmtAudit(desktop, 'total-blocking-time')}      |
| CLS (Cumulative Layout Shift)  | ${fmtAudit(mobile, 'cumulative-layout-shift')}  | ${fmtAudit(desktop, 'cumulative-layout-shift')}  |
| Speed Index                    | ${fmtAudit(mobile, 'speed-index')}              | ${fmtAudit(desktop, 'speed-index')}              |
| TTI (Time to Interactive)      | ${fmtAudit(mobile, 'interactive')}              | ${fmtAudit(desktop, 'interactive')}              |

## Top oportunidades (mobile)

${Object.values(mobile.audits)
  .filter(a => a.details && a.details.overallSavingsMs > 100 && a.score !== null && a.score < 1)
  .sort((a, b) => (b.details.overallSavingsMs || 0) - (a.details.overallSavingsMs || 0))
  .slice(0, 5)
  .map(a => `- **${a.title}** — ahorro estimado ${Math.round(a.details.overallSavingsMs)}ms`)
  .join('\n') || '_(ninguna oportunidad significativa)_'}

## Accesibilidad — issues binary fail (mobile)

${(mobile.categories.accessibility.auditRefs || [])
  .map(r => mobile.audits[r.id])
  .filter(a => a && a.score !== null && a.score < 1 && a.scoreDisplayMode === 'binary')
  .map(a => `- **${a.title}**`)
  .join('\n') || '_(sin issues binary fail)_'}
`;

await writeFile(`${OUT}/home-v2.4.md`, md, 'utf8');
console.log('▶ Escrito', `${OUT}/home-v2.4.md`);
