/* Morillo · main.js — interacciones mínimas */
(function () {
  'use strict';

  // Mobile nav toggle
  const burger = document.getElementById('navBurger');
  const drawer = document.getElementById('mobileNav');
  if (burger && drawer) {
    burger.addEventListener('click', () => {
      const isOpen = burger.classList.toggle('is-open');
      drawer.hidden = !isOpen;
      burger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
      document.body.style.overflow = isOpen ? 'hidden' : '';
    });
    drawer.addEventListener('click', (e) => {
      if (e.target.tagName === 'A') {
        burger.classList.remove('is-open');
        drawer.hidden = true;
        burger.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
      }
    });
  }

  // Submenu toggle (desktop tap-friendly fallback)
  document.querySelectorAll('.nav-toggle').forEach((btn) => {
    btn.addEventListener('click', (e) => {
      const parent = btn.closest('.nav-item--has-children');
      const submenu = parent && parent.querySelector('.nav-submenu');
      if (!submenu) return;
      const isExpanded = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', String(!isExpanded));
    });
  });
})();
