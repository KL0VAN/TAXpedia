(() => {
  const svg = document.querySelector('.tp-map');
  if (!svg) return;

  const regions = Array.from(svg.querySelectorAll('.tp-region'));
  const tooltip = document.getElementById('map-tooltip');

  const getRegionPayload = (el, event) => ({
    name: el.dataset.name || '',
    code: el.dataset.code || '',
    element: el,
    event
  });

  // Callback estendibile (specifico Croazia):
  // window.tpCroatiaOnRegionClick = ({name, code, element, event}) => { ... }
  if (typeof window.tpCroatiaOnRegionClick !== 'function') {
    window.tpCroatiaOnRegionClick = ({ name, code }) => {
      // placeholder: aggancia qui calcolo tasse / routing / fetch dati, ecc.
      console.info('[tpCroatiaOnRegionClick] override this:', { name, code });
    };
  }

  const setActive = (activeEl) => {
    regions.forEach(r => r.classList.toggle('is-active', r === activeEl));
  };

  const showTooltip = (text) => {
    if (!tooltip) return;
    tooltip.textContent = text;
    tooltip.classList.add('is-visible');
    tooltip.setAttribute('aria-hidden', 'false');
  };

  const moveTooltip = (clientX, clientY) => {
    if (!tooltip) return;
    const offset = 14;
    tooltip.style.transform = `translate(${clientX + offset}px, ${clientY + offset}px)`;
  };

  const hideTooltip = () => {
    if (!tooltip) return;
    tooltip.classList.remove('is-visible');
    tooltip.setAttribute('aria-hidden', 'true');
    tooltip.style.transform = 'translate(-9999px, -9999px)';
  };

  regions.forEach((el) => {
    el.addEventListener('mouseenter', (e) => {
      const { name, code } = getRegionPayload(el, e);
      showTooltip(`${name} · ${code}`);
      moveTooltip(e.clientX, e.clientY);
    });

    el.addEventListener('mousemove', (e) => {
      moveTooltip(e.clientX, e.clientY);
    });

    el.addEventListener('mouseleave', hideTooltip);

    el.addEventListener('focus', () => {
      const { name, code } = getRegionPayload(el, null);
      showTooltip(`${name} · ${code}`);
    });

    el.addEventListener('blur', hideTooltip);

    el.addEventListener('click', (e) => {
      const payload = getRegionPayload(el, e);
      console.log(payload.name, payload.code);
      setActive(el);
      window.tpCroatiaOnRegionClick(payload);
    });

    el.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        el.click();
      }
    });
  });

  // Data-driven UI (specifico Croazia):
  // window.tpCroatiaRenderRegionData({ "HR-08": 123, "HR-21": 88, ... })
  window.tpCroatiaRenderRegionData = (dataByCode = {}) => {
    regions.forEach((el) => {
      const code = el.dataset.code;
      const value = dataByCode?.[code];

      if (value == null) {
        el.style.removeProperty('--region-fill');
        return;
      }

      // Esempio minimale: se value > 0, evidenzia
      el.style.setProperty('--region-fill', value > 0 ? 'var(--region-hover)' : 'var(--region-base)');
    });
  };
})();
