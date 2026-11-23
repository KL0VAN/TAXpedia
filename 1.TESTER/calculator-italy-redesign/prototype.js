/* Presentation-only adapter. The unchanged Italian engine supplies every amount. */
(() => {
  'use strict';
  if (!document.body.classList.contains('italy-redesign-prototype')) return;
  const config = JSON.parse(document.getElementById('prototype-config').textContent);
  const text = config.text;
  const states = new Map();
  const selections = new Map();
  const nationalColors = {
    eco: '#D9574B', welf: '#5B73B4', int: '#8796A5', san: '#35A778',
    pa: '#268FB5', edu: '#D3AE3B', def: '#8E65AC', ue: '#003399',
    inf: '#E99138', sic: '#536C86', amb: '#5B8E50', giu: '#927B68',
    cul: '#BB6C92', alt: '#C1CCD5'
  };
  const europeanColors = ['#194F90', '#7CA9D4', '#366EAB', '#A8C7E4', '#275A97', '#6593C5', '#123F75', '#90B6DA'];
  const percent = new Intl.NumberFormat(config.lang === 'en' ? 'en-GB' : 'it-IT', { style: 'percent', maximumFractionDigits: 1 });
  const regionSelect = document.getElementById('regione');
  const form = document.getElementById('calc-form');
  const incomeInput = document.getElementById('reddito');
  const results = document.getElementById('risultati');
  const normalize = value => String(value).normalize('NFD').replace(/[\u0300-\u036f]/g, '').toLowerCase().trim();
  const categoryKey = item => {
    if (item.id) return item.id;
    const name = normalize(item.nome.it);
    const national = SETTORI.find(sector => normalize(sector.nome.it) === name);
    if (national) return national.id;
    // Only genuine equivalents in the existing Italian regional dataset.
    if (name === 'interessi sul debito pubblico') return 'int';
    if (name === 'ordine pubblico e sicurezza') return 'sic';
    return item.link || name;
  };
  const element = (tag, className, content) => {
    const node = document.createElement(tag);
    if (className) node.className = className;
    if (content !== undefined) node.textContent = content;
    return node;
  };
  const metadata = id => id === 'graficoItalia' ? SETTORI : id === 'graficoUE' ? SETTORI_UE : getSettoriRegionali(regionSelect.value);
  const contextLabel = id => id === 'graficoItalia' ? text.national : id === 'graficoUE' ? text.eu : text.regional;

  function prepareLayout(canvas) {
    const grid = canvas.closest('.box-grid');
    grid.classList.add('proto-chart-layout');
    const chartColumn = canvas.closest('.chart-col');
    const wrap = canvas.closest('.canvas-wrap');
    wrap.querySelectorAll('.explanation').forEach(node => { node.hidden = true; });
    let center = wrap.querySelector('.proto-donut-center');
    if (!center) {
      center = element('div', 'proto-donut-center');
      center.append(element('span', 'proto-center-label', contextLabel(canvas.id)), element('strong', 'proto-center-amount'), element('span', 'proto-center-context', text.total));
      wrap.append(center);
      const hint = element('p', 'proto-chart-hint', text.keyboard);
      hint.id = canvas.id + '-hint';
      chartColumn.append(hint);
    }
    let panel = grid.querySelector('.proto-detail');
    if (!panel) {
      panel = element('aside', 'proto-detail');
      panel.id = canvas.id + '-detail';
      panel.setAttribute('aria-live', 'polite');
      panel.setAttribute('aria-atomic', 'true');
      const heading = element('h3', 'proto-detail-title');
      heading.id = panel.id + '-title';
      panel.setAttribute('aria-labelledby', heading.id);
      panel.append(element('p', 'proto-detail-eyebrow', text.selected), heading,
        element('strong', 'proto-detail-amount'), element('p', 'proto-detail-share'),
        element('p', 'proto-detail-excerpt'), element('a', 'proto-detail-link', text.article));
      grid.append(panel);
    }
    canvas.tabIndex = 0;
    canvas.setAttribute('aria-describedby', canvas.id + '-hint ' + panel.id);
    return { center, panel };
  }

  function selectCategory(state, index, updateChart = true) {
    if (!state.labels.length) return;
    index = (index + state.labels.length) % state.labels.length;
    state.index = index;
    selections.set(state.id, state.keys[index]);
    const { panel } = state;
    panel.style.setProperty('--category-color', state.colors[index]);
    panel.querySelector('.proto-detail-title').textContent = state.labels[index];
    panel.querySelector('.proto-detail-amount').textContent = euro(state.values[index]);
    panel.querySelector('.proto-detail-share').textContent = percent.format(state.total ? state.values[index] / state.total : 0) + ' ' + text.share;
    const item = state.items[index];
    const article = item && item.link ? config.articles[item.link] : null;
    panel.querySelector('.proto-detail-excerpt').textContent = article && article.excerpt ? article.excerpt : text.fallback;
    const link = panel.querySelector('.proto-detail-link');
    link.hidden = !article;
    if (article) {
      link.href = window.tpLangUrl ? window.tpLangUrl(item.link) : item.link;
      link.setAttribute('aria-label', text.article + ': ' + (article.title || state.labels[index]));
    } else link.removeAttribute('href');
    state.buttons.forEach((button, i) => button.setAttribute('aria-pressed', String(i === index)));
    if (state.chart && updateChart) {
      state.chart.data.datasets[0].borderColor = state.values.map((_, i) => i === index ? '#173559' : '#ffffff');
      state.chart.data.datasets[0].borderWidth = state.values.map((_, i) => i === index ? 3 : 1.5);
      state.chart.update('none');
    }
  }

  // Override only presentation entry points used by the original runCalcolo().
  window.renderPieChart = function (canvas, labels, values) {
    if (!canvas) return null;
    document.body.classList.add('prototype-has-results');
    const items = metadata(canvas.id);
    const keys = items.map(categoryKey);
    const colors = items.map((item, i) => canvas.id === 'graficoUE' ? europeanColors[i % europeanColors.length] : (nationalColors[keys[i]] || nationalColors.alt));
    const { center, panel } = prepareLayout(canvas);
    const state = { id: canvas.id, labels, values, items, keys, colors, center, panel, buttons: [], total: values.reduce((sum, value) => sum + value, 0), index: 0, chart: null };
    states.set(canvas.id, state);
    const remembered = keys.indexOf(selections.get(canvas.id));
    state.index = remembered < 0 ? 0 : remembered;
    center.querySelector('.proto-center-amount').textContent = euro(state.total);
    center.querySelector('.proto-center-context').textContent = state.total ? text.total : text.empty;
    // A zero-value chart gets a neutral ring, never an invented fiscal slice.
    const emptyRing = {
      id: 'prototypeEmptyRing',
      afterDraw(chart) {
        if (state.total || !chart.chartArea) return;
        const area = chart.chartArea;
        const radius = Math.max(0, Math.min(area.width, area.height) / 2 - 8);
        const ctx = chart.ctx;
        ctx.save(); ctx.strokeStyle = '#e2e8f0'; ctx.lineWidth = radius * .25;
        ctx.beginPath(); ctx.arc((area.left + area.right) / 2, (area.top + area.bottom) / 2, radius * .85, 0, Math.PI * 2); ctx.stroke(); ctx.restore();
      }
    };
    state.chart = new Chart(canvas.getContext('2d'), {
      type: 'doughnut',
      data: { labels, datasets: [{ data: values, backgroundColor: colors, borderColor: values.map((_, i) => i === state.index ? '#173559' : '#ffffff'), borderWidth: values.map((_, i) => i === state.index ? 3 : 1.5), hoverOffset: 0, hoverBorderColor: '#173559' }] },
      plugins: [emptyRing],
      options: {
        responsive: true, maintainAspectRatio: false, cutout: '70%', animation: false,
        plugins: { legend: { display: false }, tooltip: { callbacks: {
          label: item => item.label + ': ' + euro(item.raw) + ' (' + percent.format(state.total ? item.raw / state.total : 0) + ')'
        } } },
        onClick(event, parts) { if (parts.length) selectCategory(state, parts[0].index); }
      }
    });
    canvas.onkeydown = event => {
      const moves = { ArrowRight: 1, ArrowDown: 1, ArrowLeft: -1, ArrowUp: -1 };
      if (Object.hasOwn(moves, event.key)) { event.preventDefault(); selectCategory(state, state.index + moves[event.key]); }
      else if (event.key === 'Home' || event.key === 'End') { event.preventDefault(); selectCategory(state, event.key === 'Home' ? 0 : state.labels.length - 1); }
    };
    selectCategory(state, state.index, false);
    return state.chart;
  };

  window.renderLegendInColumn = function (container) {
    if (!container) return;
    const canvas = container.closest('.box-grid').querySelector('canvas');
    const state = states.get(canvas.id);
    container.replaceChildren(element('h3', 'proto-legend-heading', text.legend));
    const list = element('ul', 'proto-legend');
    state.buttons = state.labels.map((label, index) => {
      const row = element('li');
      const button = element('button', 'proto-legend-button');
      button.type = 'button';
      button.style.setProperty('--category-color', state.colors[index]);
      button.setAttribute('aria-controls', state.panel.id);
      button.setAttribute('aria-pressed', String(index === state.index));
      const swatch = element('span', 'proto-swatch');
      swatch.setAttribute('aria-hidden', 'true');
      const amount = element('span', 'proto-legend-value');
      amount.append(element('span', 'proto-legend-amount', euro(state.values[index])), element('span', 'proto-legend-percent', percent.format(state.total ? state.values[index] / state.total : 0)));
      button.append(swatch, element('span', 'proto-legend-label', label), amount);
      button.addEventListener('click', () => selectCategory(state, index));
      button.addEventListener('keydown', event => {
        if (!['ArrowDown', 'ArrowUp', 'Home', 'End'].includes(event.key)) return;
        event.preventDefault();
        const next = event.key === 'Home' ? 0 : event.key === 'End' ? state.labels.length - 1 : (index + (event.key === 'ArrowDown' ? 1 : -1) + state.labels.length) % state.labels.length;
        state.buttons[next].focus(); selectCategory(state, next);
      });
      row.append(button); list.append(row);
      return button;
    });
    container.append(list);
  };

  function updatePresentation() {
    for (const [id, state] of states) if (!document.getElementById(id)) states.delete(id);
    document.getElementById('prototype-stale').hidden = results.hidden || !form.querySelector('.form-error');
    // With no region the engine's total is the national tax; reuse that output.
    if (!results.hidden && !regionSelect.value && !form.querySelector('.form-error')) document.getElementById('tasseStatali').textContent = document.getElementById('totaleTasse').textContent;
    document.querySelectorAll('.tp-region').forEach(path => {
      const active = path.dataset.value === regionSelect.value;
      path.classList.toggle('is-active', active);
      path.setAttribute('aria-pressed', String(active));
    });
  }
  let timer;
  form.addEventListener('submit', () => { clearTimeout(timer); queueMicrotask(updatePresentation); });
  regionSelect.addEventListener('change', () => {
    const focused = document.activeElement;
    queueMicrotask(() => {
      updatePresentation();
      if (focused === regionSelect) regionSelect.focus({ preventScroll: true });
    });
  });
  incomeInput.addEventListener('input', () => {
    clearTimeout(timer);
    if (!results.hidden) timer = setTimeout(() => {
      const focused = document.activeElement;
      const start = incomeInput.selectionStart;
      const end = incomeInput.selectionEnd;
      form.requestSubmit();
      // The source engine focuses Calculate after rendering. During typing,
      // retain the editing position without changing the engine itself.
      if (focused === incomeInput) {
        incomeInput.focus({ preventScroll: true });
        incomeInput.setSelectionRange(start, end);
      }
    }, 260);
  });
  const map = document.getElementById('prototype-map');
  const tooltip = document.getElementById('map-tooltip');
  document.querySelectorAll('.tp-region').forEach(path => {
    const chooseRegion = () => {
      regionSelect.value = path.dataset.value;
      regionSelect.dispatchEvent(new Event('change', { bubbles: true }));
      if (results.hidden) form.requestSubmit();
      map.open = false;
      regionSelect.focus({ preventScroll: true });
    };
    path.addEventListener('click', chooseRegion);
    path.addEventListener('keydown', event => {
      if (event.key === 'Enter' || event.key === ' ') { event.preventDefault(); chooseRegion(); }
    });
    path.addEventListener('pointerenter', () => { tooltip.textContent = path.dataset.name; });
    path.addEventListener('focus', () => { tooltip.textContent = path.dataset.name; });
  });
  updatePresentation();
})();
