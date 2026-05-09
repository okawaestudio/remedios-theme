/* ==========================================================================
   home-v2.js · Microinteracciones de la home
   --------------------------------------------------------------------------
   Motion One global (window.Motion) cargado antes (vendored UMD).
   Sin imports — el script sirve directo en <script defer>.
   ========================================================================== */
(function () {
  'use strict';

  var doc = document;
  var root = doc.querySelector('.v2-home');
  if (!root) return;

  // No-JS fallback flag: si JS corre, removemos la clase que asegura visibilidad
  root.classList.remove('no-js');

  var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ── 1. Header sticky blur ─────────────────────────────────────────── */
  (function header() {
    var header = doc.querySelector('.v2-header');
    if (!header) return;
    var lastY = -1;
    function tick() {
      var y = window.scrollY || window.pageYOffset;
      if (y === lastY) return;
      lastY = y;
      if (y > 16) header.classList.add('is-scrolled');
      else header.classList.remove('is-scrolled');
    }
    window.addEventListener('scroll', tick, { passive: true });
    tick();
  })();

  /* ── 2. IntersectionObserver: añade .is-visible a [data-animate] / [data-stagger] / .v2-process ── */
  (function reveals() {
    if (!('IntersectionObserver' in window)) {
      // Fallback: marcar todo visible
      doc.querySelectorAll('[data-animate], [data-stagger], .v2-process').forEach(function (el) {
        el.classList.add('is-visible');
      });
      return;
    }
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.classList.add('is-visible');
          io.unobserve(e.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -10% 0px' });

    doc.querySelectorAll('[data-animate], [data-stagger], .v2-process').forEach(function (el) {
      io.observe(el);
    });
  })();

  /* ── 3. Counters animados (stats, cifras) ─────────────────────────── */
  (function counters() {
    var counters = doc.querySelectorAll('[data-counter]');
    if (!counters.length) return;
    if (!('IntersectionObserver' in window)) {
      // Fallback: poner el valor final
      counters.forEach(function (el) { el.textContent = el.getAttribute('data-counter'); });
      return;
    }

    function easeOutExpo(t) { return t === 1 ? 1 : 1 - Math.pow(2, -10 * t); }

    function animateNumber(el, target, decimals) {
      if (prefersReduced) {
        el.textContent = formatValue(target, decimals);
        return;
      }
      var start = performance.now();
      var duration = 1400;
      function step(now) {
        var p = Math.min(1, (now - start) / duration);
        var eased = easeOutExpo(p);
        el.textContent = formatValue(target * eased, decimals);
        if (p < 1) requestAnimationFrame(step);
        else el.textContent = formatValue(target, decimals);
      }
      requestAnimationFrame(step);
    }
    function formatValue(n, decimals) {
      if (decimals > 0) return n.toFixed(decimals).replace('.', ',');
      return Math.round(n).toString();
    }

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (!e.isIntersecting) return;
        var el = e.target;
        var raw = el.getAttribute('data-counter');
        var decimals = parseInt(el.getAttribute('data-counter-decimals') || '0', 10);
        var target = parseFloat(raw.replace(',', '.'));
        if (!isNaN(target)) animateNumber(el, target, decimals);
        io.unobserve(el);
      });
    }, { threshold: 0.5 });
    counters.forEach(function (el) { io.observe(el); });
  })();

  /* ── 4. Mega-menu toggle ──────────────────────────────────────────── */
  (function megamenu() {
    var triggers = doc.querySelectorAll('[data-megamenu-trigger]');
    triggers.forEach(function (btn) {
      var targetSel = btn.getAttribute('data-megamenu-trigger');
      var menu = doc.querySelector(targetSel);
      if (!menu) return;

      var isOpen = false;
      function open() {
        menu.classList.add('is-open');
        btn.setAttribute('aria-expanded', 'true');
        isOpen = true;
      }
      function close() {
        menu.classList.remove('is-open');
        btn.setAttribute('aria-expanded', 'false');
        isOpen = false;
      }

      btn.addEventListener('click', function (e) {
        e.stopPropagation();
        if (isOpen) close(); else open();
      });
      doc.addEventListener('click', function (e) {
        if (isOpen && !menu.contains(e.target) && e.target !== btn) close();
      });
      doc.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && isOpen) { close(); btn.focus(); }
      });
    });
  })();

  /* ── 5. Mobile drawer ─────────────────────────────────────────────── */
  (function drawer() {
    var burger = doc.querySelector('[data-drawer-trigger]');
    var drawer = doc.querySelector('[data-drawer]');
    var closeBtn = doc.querySelector('[data-drawer-close]');
    if (!burger || !drawer) return;

    function open() {
      drawer.classList.add('is-open');
      doc.body.style.overflow = 'hidden';
      burger.setAttribute('aria-expanded', 'true');
    }
    function close() {
      drawer.classList.remove('is-open');
      doc.body.style.overflow = '';
      burger.setAttribute('aria-expanded', 'false');
    }
    burger.addEventListener('click', open);
    if (closeBtn) closeBtn.addEventListener('click', close);
    drawer.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', close); });
    doc.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && drawer.classList.contains('is-open')) close();
    });
  })();

  /* ── 6. Estado del despacho (terminal mini-card) ──────────────────── */
  (function despachoStatus() {
    var statusEl = doc.querySelector('[data-despacho-status]');
    if (!statusEl) return;
    function tick() {
      var now = new Date();
      var dow = now.getDay(); // 0 dom, 6 sab
      var hour = now.getHours();
      var enHorario = (dow >= 1 && dow <= 5) && (hour >= 9 && hour < 19);
      if (enHorario) {
        statusEl.textContent = 'ATENDIENDO';
        statusEl.classList.remove('v2-terminal__value--amber');
        statusEl.classList.add('v2-terminal__value--green');
      } else {
        statusEl.textContent = 'EN BREVE';
        statusEl.classList.remove('v2-terminal__value--green');
        statusEl.classList.add('v2-terminal__value--amber');
      }
    }
    tick();
    setInterval(tick, 60 * 1000);
  })();

  /* ── 7. Lead-magnet form: stub que no rompe (placeholder) ─────────── */
  (function leadmagnet() {
    var form = doc.querySelector('[data-leadmagnet-form]');
    if (!form) return;
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      var btn = form.querySelector('button');
      if (btn) {
        btn.disabled = true;
        btn.textContent = 'Te enviamos el PDF en unos minutos →';
      }
    });
  })();

})();
