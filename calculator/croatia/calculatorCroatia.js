/* calculatorCroatia.js
   Versione completa aggiornata — i18n IT/EN (locale), selezione regione obbligatoria

   Assicurati che Chart.js sia incluso nel HTML (script tag con defer) e che gli id HTML corrispondano:
   - input id="reddito"
   - select id="regione"  (oppure id="county" o name="regione")
   - form id="calc-form"
   - btn id="btn-calcola"
   - risultati id="risultati"
   - totale id="totaleTasse"
   - tabellaDati id="tabellaDati" (opzionale; la legenda sostituisce la tabella)
   - tabellaUE id="tabellaUE"
   - canvas grafico HR id="graficoItalia"
   - canvas grafico UE id="graficoUE"
   - legend containers id="legend-italia" e id="legend-ue"
   - explanation boxes id="explanation-it" e id="explanation-ue"

   i18n (come da regole progetto):
   - lingua da cookie tp_lang (fallback IT)
   - ?lang= ha priorità
*/

/* ========================= i18n (LOCAL) ========================= */
function calcit_getLang() {
  // 1) URL param ?lang=
  try {
    const sp = new URLSearchParams(window.location.search || '');
    const q = (sp.get('lang') || '').toLowerCase().trim();
    if (q === 'it' || q === 'en') return q;
  } catch (e) { /* ignore */ }

  // 2) cookie tp_lang
  const m = document.cookie.match(/(?:^|;\s*)tp_lang=([^;]+)/);
  if (m && m[1]) {
    const c = decodeURIComponent(m[1]).toLowerCase().trim();
    if (c === 'it' || c === 'en') return c;
  }

  return 'it';
}

const CALCIT_LANG = calcit_getLang();

const CALCIT_I18N = {
  // =========================
  // IT
  // =========================
  it: {
    error_income_invalid:
      "Inserisci un reddito valido (maggiore di zero). Puoi usare spazi, punti o virgole come separatori delle migliaia.",
    error_region_required: "Seleziona la regione.",
    error_region_invalid:
      "Regione non valida: assicurati che la selezione corrisponda alle opzioni disponibili.",
    expl_default: "Tocca sul grafico per i dettagli.",
    tooltip_label: (label, amount, percent) => `${label}: ${amount} (${percent}%)`,
  },

  // =========================
  // EN
  // =========================
  en: {
    error_income_invalid:
      "Enter a valid income (greater than zero). You may use spaces, dots, or commas as thousands separators.",
    error_region_required: "Select a region.",
    error_region_invalid:
      "Invalid region: make sure your selection matches the available options.",
    expl_default: "Tap the chart for details.",
    tooltip_label: (label, amount, percent) => `${label}: ${amount} (${percent}%)`,
  },
};

function calcit_t(key) {
  const L = CALCIT_LANG;
  if (CALCIT_I18N[L] && Object.prototype.hasOwnProperty.call(CALCIT_I18N[L], key)) return CALCIT_I18N[L][key];
  if (CALCIT_I18N.it && Object.prototype.hasOwnProperty.call(CALCIT_I18N.it, key)) return CALCIT_I18N.it[key];
  return '';
}

/* ========================= CONFIG ========================= */
// scaglioni (Croazia: 2 scaglioni)
const REGIONAL_BRACKETS = [60000, Infinity];

// Aliquote in formato decimale
const REGIONAL_RATES = {
  'Contea di Zagabria (Zagrebačka županija)':                        [0.23, 0.33],
  'Contea di Krapina-Zagorje (Krapinsko-zagorska županija)':         [0.20, 0.30],
  'Contea di Sisak-Moslavina (Sisačko-moslavačka županija)':         [0.216, 0.316],
  'Contea di Karlovac (Karlovačka županija)':                        [0.19, 0.29],
  'Contea di Varaždin (Varaždinska županija)':                       [0.21, 0.32],
  'Contea di Koprivnica-Križevci (Koprivničko-križevačka županija)': [0.20, 0.30],
  'Contea di Bjelovar-Bilogora (Bjelovarsko-bilogorska županija)':   [0.18, 0.25],
  'Contea del Litoraneo-montana (Primorsko-goranska županija)':      [0.20, 0.25],
  'Contea di Lika-Senj (Ličko-senjska županija)':                    [0.22, 0.32],
  'Contea di Virovitica-Podravina (Virovitičko-podravska županija)': [0.20, 0.30],
  'Contea di Požega-Slavonia (Požeško-slavonska županija)':          [0.20, 0.30],
  'Contea di Brod-Posavina (Brodsko-posavska županija)':             [0.20, 0.30],
  'Contea di Zara (Zadarska županija)':                              [0.20, 0.30],
  'Contea di Osijek-Baranja (Osječko-baranjska županija)':           [0.20, 0.30],
  'Contea di Šibenik-Knin (Šibensko-kninska županija)':              [0.20, 0.30],
  'Contea di Vukovar-Srijem (Vukovarsko-srijemska županija)':        [0.20, 0.30],
  'Contea di Spalato-Dalmazia (Splitsko-dalmatinska županija)':      [0.215, 0.32],
  'Istria (Istarska županija)':                                      [0.22, 0.30],
  'Contea di Dubrovnik-Neretva (Dubrovačko-neretvanska županija)':   [0.20, 0.30],
  'Contea di Međimurje (Međimurska županija)':                       [0.20, 0.30],
  'Città di Zagabria (Grad Zagreb)':                        [0.23, 0.33],
};

// NB: link lasciati invariati (placeholder). Aggiungili quando disponibili.
const SETTORI = [
  { id: 'welf', nome:{ it:'Protezione sociale',          en:'Social protection' },              percentuale:0.325, link:'' },
  { id: 'san',  nome:{ it:'Sanità',                      en:'Healthcare' },                     percentuale:0.129, link:'' },
  { id: 'eco',  nome:{ it:'Politiche economiche',        en:'Economic policies' },              percentuale:0.116, link:'' },
  { id: 'edu',  nome:{ it:'Istruzione e ricerca',        en:'Education and research' },         percentuale:0.074, link:'' },
  { id: 'inf',  nome:{ it:'Infrastrutture e trasporti',  en:'Infrastructure and transport' },   percentuale:0.068, link:'' },
  { id: 'pa',   nome:{ it:'Pubblica amministrazione',    en:'Public administration' },          percentuale:0.053, link:'' },
  { id: 'sic',  nome:{ it:'Sicurezza e ordine pubblico', en:'Public security' },                percentuale:0.046, link:'' },
  { id: 'def',  nome:{ it:'Difesa',                      en:'Defence' },                        percentuale:0.041, link:'' },
  { id: 'cul',  nome:{ it:'Cultura e sport',             en:'Culture and sport' },              percentuale:0.031, link:'' },
  { id: 'int',  nome:{ it:'Interessi',                   en:'Interest payments' },              percentuale:0.029, link:'' },
  { id: 'ue',   nome:{ it:'Bilancio UE',                 en:'EU budget' },                      percentuale:0.021, link:'' },
  { id: 'giu',  nome:{ it:'Giustizia',                   en:'Justice' },                        percentuale:0.019, link:'' },
  { id: 'amb',  nome:{ it:'Protezione ambientale',       en:'Environmental protection' },       percentuale:0.006, link:'' },
  { id: 'alt',  nome:{ it:'Altro',                       en:'Other' },                          percentuale:0.042, link:'' }
];

const SETTORI_UE = [
  { nome:{ it:'Coesione, resilienza e valori',                en:'Cohesion, resilience and values' },          percentuale:0.0082, link:'/article/europe/coesione.php' },
  { nome:{ it:'Risorse naturali e ambiente',                  en:'Natural resources and environment' },        percentuale:0.0060, link:'/article/europe/risorse_naturali.php' },
  { nome:{ it:'Mercato unico, innovazione e agenda digitale', en:'Single market, innovation and digital' },   percentuale:0.0023, link:'/article/europe/mercato_unico.php' },
  { nome:{ it:'Rapporti con il vicinato e con il mondo',      en:'Neighbourhood and the world' },             percentuale:0.0018, link:'/article/europe/rapporti_vicinato.php' },
  { nome:{ it:'Pubblica amministrazione europea',             en:'European public administration' },          percentuale:0.0013, link:'/article/europe/pubblica_amm_ue.php' },
  { nome:{ it:'Strumenti speciali',                           en:'Special instruments' },                     percentuale:0.0007, link:'/article/europe/strumenti_speciali.php' },
  { nome:{ it:'Migrazione e gestione delle frontiere',        en:'Migration and border management' },         percentuale:0.0005, link:'/article/europe/migrazione_gestione.php' },
  { nome:{ it:'Sicurezza e Difesa',                           en:'Security and defence' },                     percentuale:0.0002, link:'/article/europe/sicurezza_difesa.php' },
];

/* ========================= UTIL ========================= */
const nfEuro = new Intl.NumberFormat(
  CALCIT_LANG === 'en' ? 'en-GB' : 'it-IT',
  { style: 'currency', currency: 'EUR' }
);
const euro = (n) => nfEuro.format(Number(n || 0));

function pickLabel(obj) {
  // obj = {it:'', en:''} OR string
  if (!obj) return '';
  if (typeof obj === 'string') return obj;
  return (CALCIT_LANG === 'en' ? (obj.en || obj.it) : (obj.it || obj.en)) || '';
}

function calcolaIRPEF(reddito, regione) {
  const rates = REGIONAL_RATES[regione];
  if (!rates) return 0;

  let imposta = 0;
  let prev = 0;
  for (let i = 0; i < REGIONAL_BRACKETS.length; i++) {
    const upper = REGIONAL_BRACKETS[i];
    const rate = rates[i] ?? rates[rates.length - 1] ?? 0;
    const base = Math.min(reddito, upper) - prev;
    if (base > 0) {
      imposta += base * rate;
      prev = upper;
    } else break;
  }
  return Number(imposta.toFixed(2));
}

/* parsing input permissivo */
function parseEuroInput(str) {
  if (typeof str !== 'string') return NaN;
  const s = str.trim();
  if (s === '') return NaN;

  let tmp = s.replace(/\s+/g, '');

  const commaCount = (tmp.match(/,/g) || []).length;
  const dotCount = (tmp.match(/\./g) || []).length;

  if (commaCount > 0 && dotCount > 0) {
    tmp = tmp.replace(/\./g, '').replace(/,/g, '.');
  } else if (dotCount > 0 && commaCount === 0) {
    if (/\.\d{3}$/.test(tmp)) tmp = tmp.replace(/\./g, '');
    else tmp = tmp.replace(',', '.');
  } else if (commaCount > 0 && dotCount === 0) {
    tmp = tmp.replace(/,/g, '.');
  }

  tmp = tmp.replace(/[^\d.\-]/g, '');
  const val = parseFloat(tmp);
  return Number.isFinite(val) ? val : NaN;
}

/* ========================= CHART HELPERS ========================= */
let chartItalia = null;
let chartUE = null;

function genColors(n, hueOffset = 0) {
  return Array.from({ length: n }, (_, i) => `hsl(${(hueOffset + Math.round((i * 360) / n)) % 360} 68% 52%)`);
}

function genBlueShades(n) {
  const H = 210;
  const S1 = 80, S2 = 98;
  const L1 = 22, L2 = 78;
  return Array.from({ length: n }, (_, i) => {
    const s = S1 + (i * (S2 - S1)) / Math.max(1, n - 1);
    const l = L1 + (i * (L2 - L1)) / Math.max(1, n - 1);
    return `hsl(${H} ${s}% ${l}%)`;
  });
}

function safeDestroy(chartRef) {
  if (chartRef && typeof chartRef.destroy === 'function') {
    try { chartRef.destroy(); } catch (e) { /* ignore */ }
  }
}

function renderTable(tbody, rows) {
  if (!tbody) return;
  tbody.innerHTML = rows.map(r =>
    `<tr><td>${r.nome}</td><td>${euro(r.importo)}</td></tr>`
  ).join('');
}

function renderLegendInColumn(containerEl, labels, values, colors, options = {}) {
  if (!containerEl) return;
  containerEl.innerHTML = '';

  const wrap = document.createElement('div');
  wrap.className = 'legend-wrap';

  const ul = document.createElement('ul');

  labels.forEach((lab, i) => {
    const li = document.createElement('li');
    li.tabIndex = 0;
    li.setAttribute('role', 'button');
    li.style.display = 'flex';
    li.style.justifyContent = 'space-between';
    li.style.alignItems = 'center';
    li.style.padding = '.45rem .5rem';
    li.style.borderRadius = '.6rem';
    li.style.cursor = 'pointer';

    const left = document.createElement('span');
    left.style.display = 'inline-flex';
    left.style.alignItems = 'center';
    left.style.gap = '8px';

    const sw = document.createElement('span');
    sw.className = 'legend-swatch';
    sw.style.background = colors[i];
    sw.style.width = '14px';
    sw.style.height = '14px';
    sw.style.borderRadius = '3px';
    sw.setAttribute('aria-hidden','true');

    const labSpan = document.createElement('span');
    labSpan.className = 'legend-label';
    labSpan.textContent = lab;

    left.appendChild(sw);
    left.appendChild(labSpan);

    const valueSpan = document.createElement('span');
    valueSpan.className = 'legend-value';
    valueSpan.textContent = euro(values[i]);

    li.appendChild(left);
    li.appendChild(valueSpan);

    li.addEventListener('mouseenter', () => { if (typeof options.onHover === 'function') options.onHover(i); });
    li.addEventListener('mouseleave', () => { if (typeof options.onLeave === 'function') options.onLeave(i); });
    li.addEventListener('click', () => { if (typeof options.onClick === 'function') options.onClick(i); });

    li.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        li.click();
      }
    });

    ul.appendChild(li);
  });

  wrap.appendChild(ul);
  containerEl.appendChild(wrap);
}

function renderPieChart(canvasEl, labels, data, colors, options = {}) {
  if (!canvasEl) return null;
  safeDestroy(options.existingChart);

  const ctx = canvasEl.getContext('2d');

  const chart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels,
      datasets: [{
        data,
        backgroundColor: colors,
        borderColor: '#fff',
        borderWidth: 2,
        hoverOffset: 22
      }]
    },
options: {
  responsive: true,
  animation: false, // <-- stop rotazione/animazione
  plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label(c) {
              const val = Number(c.raw ?? 0);
              const tot = (c.dataset.data || []).reduce((a,b)=>a + Number(b || 0), 0) || 1;
              const percent = ((val / tot) * 100).toFixed(1);
              const fn = calcit_t('tooltip_label');
              return typeof fn === 'function'
                ? fn(c.label, euro(val), percent)
                : `${c.label}: ${euro(val)} (${percent}%)`;
            }
          }
        }
      },
      onHover(evt, elems) {
        const explEl = options.explanationEl;
        if (!explEl) return;

        if (elems && elems.length) {
          const idx = elems[0].index;
          const val = Number(data[idx] || 0);
          const tot = data.reduce((a,b)=>a + Number(b || 0), 0) || 1;
          const percent = ((val / tot) * 100).toFixed(1);
          const fn = calcit_t('tooltip_label');
          explEl.textContent = typeof fn === 'function'
            ? fn(labels[idx], euro(val), percent)
            : `${labels[idx]}: ${euro(val)} (${percent}%)`;
        } else {
          explEl.textContent = options.defaultExplanation || calcit_t('expl_default');
        }
      }
    }
  });

  return chart;
}

/* ========================= CONTROLLER ========================= */
function showFormError(message) {
  let el = document.querySelector('.form-error');
  if (!el) {
    const form = document.querySelector('.calc-form') || document.getElementById('calc-form');
    if (!form) return;
    el = document.createElement('div');
    el.className = 'form-error';
    el.setAttribute('role', 'alert');
    el.style.color = '#b91c1c';
    el.style.marginTop = '.5rem';
    form.appendChild(el);
  }
  el.textContent = message;
}
function clearFormError() {
  const el = document.querySelector('.form-error');
  if (el) el.remove();
}

/* prende la regione dal select in modo robusto */
function getSelectedRegione() {
  const sel =
    document.getElementById('regione') ||
    document.getElementById('county') ||
    document.querySelector('select[name="regione"]');

  if (!sel) return { value: '', el: null };

  // Consideriamo "non selezionato" anche placeholder tipo "" o "0"
  const value = String(sel.value || '').trim();
  return { value, el: sel };
}

function runCalcolo() {
  const input = document.getElementById('reddito');
  const risultati = document.getElementById('risultati');
  const totaleEl = document.getElementById('totaleTasse');
  const tabIt = document.getElementById('tabellaDati');
  const tabUe = document.getElementById('tabellaUE');
  const canvasIt = document.getElementById('graficoItalia');
  const canvasUe = document.getElementById('graficoUE');
  const legendItContainer = document.getElementById('legend-italia');
  const legendUeContainer = document.getElementById('legend-ue');
  const explIt = document.getElementById('explanation-it');
  const explUe = document.getElementById('explanation-ue');
  const btn = document.getElementById('btn-calcola');

  clearFormError();
  if (!input) return;

  // valida regione selezionata
  const { value: regione, el: regioneEl } = getSelectedRegione();
  if (!regione) {
    showFormError(calcit_t('error_region_required'));
    if (regioneEl) regioneEl.focus();
    return;
  }
  if (!REGIONAL_RATES[regione]) {
    showFormError(calcit_t('error_region_invalid'));
    if (regioneEl) regioneEl.focus();
    return;
  }

  // parse input permissivo
  const reddito = parseEuroInput(String(input.value || ''));
  if (!Number.isFinite(reddito) || reddito <= 0) {
    showFormError(calcit_t('error_income_invalid'));
    input.focus();
    return;
  }

  // UX loading
  if (btn) { btn.setAttribute('aria-busy','true'); btn.classList.add('is-loading'); }

  const tasse = calcolaIRPEF(reddito, regione);

  if (totaleEl) totaleEl.textContent = euro(tasse);
  if (risultati) risultati.hidden = false;

  /* ------------------ HR: table + chart + legend ------------------ */
  const labelsIt = SETTORI.map(s => pickLabel(s.nome));
  const valuesIt = SETTORI.map(s => Number((s.percentuale * tasse).toFixed(2)));
  const colorsIt = genColors(labelsIt.length, 8);

  const rowsIt = SETTORI.map((s, idx) => ({
    nome: `<a href="${s.link}" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:underline">${labelsIt[idx]}</a>`,
    importo: s.percentuale * tasse
  }));
  renderTable(tabIt, rowsIt);

  safeDestroy(chartItalia);
  chartItalia = renderPieChart(canvasIt, labelsIt, valuesIt, colorsIt, {
    existingChart: chartItalia,
    explanationEl: explIt,
    defaultExplanation: calcit_t('expl_default')
  });

  renderLegendInColumn(legendItContainer, labelsIt, valuesIt, colorsIt, {
    onHover: (i) => {
      if (chartItalia && typeof chartItalia.setActiveElements === 'function') {
        chartItalia.setActiveElements([{ datasetIndex:0, index:i }]);
        chartItalia.update();
      }
      if (explIt) {
        const tot = valuesIt.reduce((a,b)=>a + Number(b || 0), 0) || 1;
        const percent = ((valuesIt[i] / tot) * 100).toFixed(1);
        const fn = calcit_t('tooltip_label');
        explIt.textContent = typeof fn === 'function'
          ? fn(labelsIt[i], euro(valuesIt[i]), percent)
          : `${labelsIt[i]}: ${euro(valuesIt[i])} (${percent}%)`;
      }
    },
    onLeave: () => {
      if (chartItalia && typeof chartItalia.setActiveElements === 'function') {
        chartItalia.setActiveElements([]);
        chartItalia.update();
      }
      if (explIt) explIt.textContent = calcit_t('expl_default');
    },
    onClick: (i) => {
      const sector = SETTORI[i];
      if (sector && sector.link) window.open(sector.link, '_blank', 'noopener');
    }
  });

  /* ------------------ UE: table + chart + legend ------------------ */
  const labelsUe = SETTORI_UE.map(s => pickLabel(s.nome));
  const valuesUe = SETTORI_UE.map(s => Number((s.percentuale * tasse).toFixed(2)));
  const colorsUe = genBlueShades(labelsUe.length);

  const rowsUe = SETTORI_UE.map((s, idx) => ({
    nome: `<a href="${s.link}" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:underline">${labelsUe[idx]}</a>`,
    importo: s.percentuale * tasse
  }));
  renderTable(tabUe, rowsUe);

  safeDestroy(chartUE);
  chartUE = renderPieChart(canvasUe, labelsUe, valuesUe, colorsUe, {
    existingChart: chartUE,
    explanationEl: explUe,
    defaultExplanation: calcit_t('expl_default')
  });

  renderLegendInColumn(legendUeContainer, labelsUe, valuesUe, colorsUe, {
    onHover: (i) => {
      if (chartUE && typeof chartUE.setActiveElements === 'function') {
        chartUE.setActiveElements([{ datasetIndex:0, index:i }]);
        chartUE.update();
      }
      if (explUe) {
        const tot = valuesUe.reduce((a,b)=>a + Number(b || 0), 0) || 1;
        const percent = ((valuesUe[i] / tot) * 100).toFixed(1);
        const fn = calcit_t('tooltip_label');
        explUe.textContent = typeof fn === 'function'
          ? fn(labelsUe[i], euro(valuesUe[i]), percent)
          : `${labelsUe[i]}: ${euro(valuesUe[i])} (${percent}%)`;
      }
    },
    onLeave: () => {
      if (chartUE && typeof chartUE.setActiveElements === 'function') {
        chartUE.setActiveElements([]);
        chartUE.update();
      }
      if (explUe) explUe.textContent = calcit_t('expl_default');
    },
    onClick: (i) => {
      const sector = SETTORI_UE[i];
      if (sector && sector.link) window.open(sector.link, '_blank', 'noopener');
    }
  });

  if (btn) { btn.removeAttribute('aria-busy'); btn.classList.remove('is-loading'); btn.focus(); }
}

/* ========================= INIT & binding ========================= */
function attachCalculator() {
  const form = document.getElementById('calc-form');
  const input = document.getElementById('reddito');

  if (!form || !input) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    runCalcolo();
  });

  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      e.preventDefault();
      form.requestSubmit();
    }
  });

  // compatibilità con eventuali chiamate inline
  window.calcolaTasse = () => form.requestSubmit();
}

document.addEventListener('DOMContentLoaded', attachCalculator);
