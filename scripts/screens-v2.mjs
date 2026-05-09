#!/usr/bin/env node
/**
 * Capturas Playwright de la home en 4 viewports.
 * Salida: docs/screens/home-v2/{viewport}.png + {viewport}.full.png
 */
import { chromium } from 'playwright';
import { mkdir } from 'node:fs/promises';
import { dirname, resolve } from 'node:path';
import { fileURLToPath } from 'node:url';

const __dirname = dirname(fileURLToPath(import.meta.url));
const ROOT = resolve(__dirname, '..');
const OUT  = resolve(ROOT, 'docs/screens/home-v2');
const URL  = process.env.URL || 'http://remedios-morillo-v3.local/';

const VIEWPORTS = [
  { name: '360',  width: 360,  height: 800,  deviceScaleFactor: 2 },
  { name: '768',  width: 768,  height: 1024, deviceScaleFactor: 2 },
  { name: '1280', width: 1280, height: 800,  deviceScaleFactor: 1 },
  { name: '1920', width: 1920, height: 1080, deviceScaleFactor: 1 },
];

await mkdir(OUT, { recursive: true });

const browser = await chromium.launch();
console.log('▶ Capturando home en 4 viewports…');

for (const vp of VIEWPORTS) {
  const ctx = await browser.newContext({
    viewport: { width: vp.width, height: vp.height },
    deviceScaleFactor: vp.deviceScaleFactor,
    reducedMotion: 'reduce', // Capturas estables sin estados intermedios
  });
  const page = await ctx.newPage();
  await page.goto(URL, { waitUntil: 'networkidle' });
  // Forzar visibilidad de elementos animados (data-stagger / data-animate)
  await page.evaluate(() => {
    document.querySelectorAll('[data-animate], [data-stagger], .v2-process')
      .forEach(el => el.classList.add('is-visible'));
    document.querySelectorAll('[data-counter]').forEach(el => {
      const v = el.getAttribute('data-counter');
      el.textContent = v;
    });
  });
  await page.waitForTimeout(400);

  // Above-the-fold
  await page.screenshot({ path: `${OUT}/${vp.name}.png`, fullPage: false });
  // Fullpage
  await page.screenshot({ path: `${OUT}/${vp.name}.full.png`, fullPage: true });
  console.log(`  ✓ ${vp.name}px (above-fold + fullpage)`);
  await ctx.close();
}

await browser.close();
console.log('▶ Listo. Archivos en', OUT);
