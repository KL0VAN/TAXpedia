/* Reuse the existing Statcounter project on pages that lack their own snippet. */
(function () {
  'use strict';

  function loadStats() {
    var path = window.location.pathname;
    var host = window.location.hostname;
    if (host === 'localhost' || host === '127.0.0.1' || host === '[::1]') return;
    if (path.indexOf('/1.TESTER/') === 0 ||
        path.indexOf('/article/STANDARD') === 0 ||
        path === '/article/italia/articolo_prova_standard.php' ||
        path === '/tools/chart-preview.php') return;

    // The deferred footer loader runs after parsing, including any legacy
    // snippet after the footer. A page must send only one counter request.
    if (document.querySelector('script[src="https://www.statcounter.com/counter/counter.js"]') ||
        window.tpStatcounterLoaded) return;

    window.tpStatcounterLoaded = true;
    window.sc_project = 13170178;
    window.sc_invisible = 1;
    window.sc_security = 'f093464a';

    var script = document.createElement('script');
    script.src = 'https://www.statcounter.com/counter/counter.js';
    script.async = true;
    document.body.appendChild(script);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', loadStats, { once: true });
  } else {
    loadStats();
  }
})();
