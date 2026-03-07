/* calculatorItalia.js
   Versione aggiornata — i18n IT/EN (locale), doppio grafico, legenda colonna, hover slice più pronunciato

   Requisiti HTML (id):
   - input id="reddito"
   - form id="calc-form"
   - btn id="btn-calcola"
   - risultati id="risultati"
   - totale id="totaleTasse"
   - tabellaDati id="tabellaDati" (opzionale; legenda sostituisce la tabella)
   - tabellaUE id="tabellaUE"
   - canvas grafico Italia id="graficoItalia"
   - canvas grafico UE id="graficoUE"
   - legend containers id="legend-italia" e id="legend-ue"
   - explanation boxes id="explanation-it" e id="explanation-ue"

   i18n (come da regole progetto):
   - lingua da cookie tp_lang (fallback IT)
   - ?lang= ha priorità
*/

/* ========================= i18n (LOCAL) ========================= */
function calcit_getLang() {
  // 0) helper condiviso (se disponibile)
  if (window.tpI18n && typeof window.tpI18n.lang === 'string') {
    const l = window.tpI18n.lang.toLowerCase().trim();
    if (l === 'it' || l === 'en') return l;
  }

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

  // 3) cookie site_lang
  const m2 = document.cookie.match(/(?:^|;\s*)site_lang=([^;]+)/);
  if (m2 && m2[1]) {
    const c2 = decodeURIComponent(m2[1]).toLowerCase().trim();
    if (c2 === 'it' || c2 === 'en') return c2;
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
    expl_default: "Tocca sul grafico per i dettagli.",
    tooltip_label: (label, amount, percent) => `${label}: ${amount} (${percent}%)`,
    legend_title: "Settore — Importo ",
    legend_note: "Clicca per aprire il dettaglio. Hover per evidenziare la fetta.",
    legend_subtle_reg: "(Lombardia)",
    chart_reg_aria: "Grafico ripartizione Lombardia",
  },

  // =========================
  // EN
  // =========================
  en: {
    error_income_invalid:
      "Enter a valid income (greater than zero). You may use spaces, dots, or commas as thousands separators.",
    expl_default: "Tap the chart for details.",
    tooltip_label: (label, amount, percent) => `${label}: ${amount} (${percent}%)`,
    legend_title: "Sector — Amount ",
    legend_note: "Click to open details. Hover to highlight the slice.",
    legend_subtle_reg: "(Lombardy)",
    chart_reg_aria: "Lombardy allocation chart",
  },
};

function calcit_t(key) {
  const L = CALCIT_LANG;
  if (CALCIT_I18N[L] && Object.prototype.hasOwnProperty.call(CALCIT_I18N[L], key)) return CALCIT_I18N[L][key];
  if (CALCIT_I18N.it && Object.prototype.hasOwnProperty.call(CALCIT_I18N.it, key)) return CALCIT_I18N.it[key];
  return '';
}

/* ========================= CONFIG ========================= */
const TAX_BRACKETS = [
  { upper: 28000, rate: 0.23 },
  { upper: 50000, rate: 0.35 },
  { upper: Infinity, rate: 0.43 }
];

// Addizionale regionale IRPEF (scaglioni coerenti con la tabella che mi hai passato)
const REGIONAL_BRACKETS = [15000, 28000, 50000, Infinity];

// Aliquote in formato decimale (es. 1,23% => 0.0123)
// Nota: queste aliquote sono quelle che mi hai incollato tu.
const REGIONAL_RATES = {
  'Abruzzo':                [0.0167, 0.0167, 0.0287, 0.0333],
  'Basilicata':             [0.0123, 0.0123, 0.0123, 0.0123],
  'Calabria':               [0.0173, 0.0173, 0.0173, 0.0173],
  'Campania':               [0.0173, 0.0296, 0.0320, 0.0333],
  'Emilia-Romagna':         [0.0133, 0.0193, 0.0293, 0.0333],
  'Friuli-Venezia Giulia':  [0.0070, 0.0123, 0.0123, 0.0123],
  'Lazio':                  [0.0173, 0.0333, 0.0333, 0.0333],
  'Liguria':                [0.0123, 0.0123, 0.0318, 0.0323],
  'Lombardia':              [0.0123, 0.0158, 0.0172, 0.0173],
  'Marche':                 [0.0123, 0.0153, 0.0170, 0.0173],
  'Molise':                 [0.0173, 0.0193, 0.0333, 0.0333],
  'Piemonte':               [0.0162, 0.0213, 0.0275, 0.0333],
  'Puglia':                 [0.0133, 0.0143, 0.0163, 0.0185],
  'Sardegna':               [0.0123, 0.0123, 0.0123, 0.0123],
  'Sicilia':                [0.0123, 0.0123, 0.0123, 0.0123],
  'Toscana':                [0.0142, 0.0143, 0.0332, 0.0333],
  'Trentino-Alto Adige':    [0.0123, 0.0123, 0.0123, 0.0173],
  'Umbria':                 [0.0173, 0.0302, 0.0312, 0.0333],
  "Valle d'Aosta":         [0.0000, 0.0123, 0.0123, 0.0123],
  'Veneto':                 [0.0123, 0.0123, 0.0123, 0.0123],
};

// Percorsi ai file di testo - NON cambiare i path
const SETTORI = [
  { id: 'eco',  nome: { it:'Politiche economiche',        en:'Economic policies' },            percentuale:0.209, link:'/article/italia/politiche_economiche.php' },
  { id: 'welf', nome: { it:'Protezione sociale',          en:'Social protection' },           percentuale:0.206, link:'/article/italia/protezione_sociale.php' },
  { id: 'int',  nome: { it:'Interessi',                   en:'Interest payments' },          percentuale:0.116, link:'/article/italia/interessi.php' },
  { id: 'san',  nome: { it:'Sanità',                      en:'Healthcare' },                 percentuale:0.101, link:'/article/italia/sanita.php' },
  { id: 'pa',   nome: { it:'Pubblica amministrazione',    en:'Public administration' },      percentuale:0.086, link:'/article/italia/pubblica_amministrazione.php' },
  { id: 'edu',  nome: { it:'Istruzione e ricerca',        en:'Education and research' },     percentuale:0.079, link:'/article/italia/istruzione_ricerca.php' },
  { id: 'def',  nome: { it:'Difesa',                      en:'Defence' },                    percentuale:0.034, link:'/article/italia/difesa.php' },
  { id: 'ue',   nome: { it:'Bilancio UE',                 en:'EU budget' },                  percentuale:0.025, link:'/article/italia/bilancio_ue.php' },
  { id: 'inf',  nome: { it:'Infrastrutture e trasporti',  en:'Infrastructure and transport' },percentuale:0.025, link:'/article/italia/infrastrutture_trasporti.php' },
  { id: 'sic',  nome: { it:'Sicurezza e ordine pubblico', en:'Public security' },            percentuale:0.025, link:'/article/italia/sicurezza_ordine.php' },
  { id: 'amb',  nome: { it:'Protezione ambientale',       en:'Environmental protection' },   percentuale:0.024, link:'/article/italia/protezione_ambientale.php' },
  { id: 'giu',  nome: { it:'Giustizia',                   en:'Justice' },                    percentuale:0.013, link:'/article/italia/giustizia.php' },
  { id: 'cul',  nome: { it:'Cultura e sport',             en:'Culture and sport' },          percentuale:0.006, link:'/article/italia/cultura_sport.php' },
  { id: 'alt',  nome: { it:'Altro',                       en:'Other' },                      percentuale:0.051, link:'/article/italia/altro.php' }
];

const SETTORI_UE = [
  { nome:{ it:'Coesione, resilienza e valori',                en:'Cohesion, resilience and values' },                percentuale:0.0098, link:'/article/europe/coesione.php' },
  { nome:{ it:'Risorse naturali e ambiente',                  en:'Natural resources and environment' },              percentuale:0.0071, link:'/article/europe/risorse_naturali.php' },
  { nome:{ it:'Mercato unico, innovazione e agenda digitale', en:'Single market, innovation and digital' },         percentuale:0.0027, link:'/article/europe/mercato_unico.php' },
  { nome:{ it:'Rapporti con il vicinato e con il mondo',      en:'Neighbourhood and the world' },                   percentuale:0.0021, link:'/article/europe/rapporti_vicinato.php' },
  { nome:{ it:'Pubblica amministrazione europea',             en:'European public administration' },                percentuale:0.0016, link:'/article/europe/pubblica_amm_ue.php' },
  { nome:{ it:'Strumenti speciali',                           en:'Special instruments' },                           percentuale:0.0008, link:'/article/europe/strumenti_speciali.php' },
  { nome:{ it:'Migrazione e gestione delle frontiere',        en:'Migration and border management' },               percentuale:0.0006, link:'/article/europe/migrazione_gestione.php' },
  { nome:{ it:'Sicurezza e Difesa',                           en:'Security and defence' },                           percentuale:0.0003, link:'/article/europe/sicurezza_difesa.php' },
];

// =========================
// Spesa Regione (SOLO Lombardia) — placeholder
// Le percentuali devono sommare a 1.00
// Quando avrai i dati reali, modifica questi valori.
// =========================
const SETTORI_LOMBARDIA = [
  { nome:{ it:'Sanità',                      en:'Healthcare' },                   percentuale:0.54, link:null },
  { nome:{ it:'Protezione sociale',          en:'Social protection' },            percentuale:0.148, link:null },
  { nome:{ it:'Infrastrutture e trasporti',  en:'Infrastructure & transport' },   percentuale:0.075, link:null },
  { nome:{ it:'Politiche economiche',        en:'Economic policies' },            percentuale:0.07, link:null },
  { nome:{ it:'Pubblica amministrazione',    en:'Public administration' },        percentuale:0.062, link:null },
  { nome:{ it:'Istruzione e ricerca',        en:'Education & research' },         percentuale:0.041, link:null },  
  { nome:{ it:'Sicurezza e ordine pubblico', en:'Public security' },              percentuale:0.021, link:null },
  { nome:{ it:'Cultura e sport',             en:'Culture & sport' },              percentuale:0.009, link:null },
  { nome:{ it:'Protezione ambientale',       en:'Environmental protection' },     percentuale:0.008, link:null },
  { nome:{ it:'Altro',                       en:'Other' },                        percentuale:0.003, link:null },
];

/* ========================= UTIL ========================= */
const nfEuro = new Intl.NumberFormat(
  CALCIT_LANG === 'en' ? 'en-GB' : 'it-IT',
  { style: 'currency', currency: 'EUR' }
);
const euro = (n) => nfEuro.format(Number(n || 0));

function pickLabel(obj) {
  // obj = {it:'', en:''}
  if (!obj) return '';
  return (CALCIT_LANG === 'en' ? (obj.en || obj.it) : (obj.it || obj.en)) || '';
}

function calcolaIRPEF(reddito) {
  // Calcolo IRPEF semplificato in base a TAX_BRACKETS
  let imposta = 0;
  let prev = 0;
  for (const { upper, rate } of TAX_BRACKETS) {
    const base = Math.min(reddito, upper) - prev;
    if (base > 0) {
      imposta += base * rate;
      prev = upper;
    } else break;
  }
  return Number(imposta.toFixed(2));
}

function calcolaAddizionaleRegionale(reddito, regione) {
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

/* parsing input permissivo:
   accetta "28 000", "28.000", "28,000", "28000", "28 000,50" ecc.
*/
function parseEuroInput(str) {
  if (typeof str !== 'string') return NaN;
  const s = str.trim();
  if (s === '') return NaN;

  // rimuove spazi di gruppo
  let tmp = s.replace(/\s+/g, '');

  // conteggi punti e virgole
  const commaCount = (tmp.match(/,/g) || []).length;
  const dotCount = (tmp.match(/\./g) || []).length;

  if (commaCount > 0 && dotCount > 0) {
    // es. "1.234,56" -> elimina punti, trasforma virgola in punto
    tmp = tmp.replace(/\./g, '').replace(/,/g, '.');
  } else if (dotCount > 0 && commaCount === 0) {
    // es. "28.000" -> probabilmente separatore migliaia
    if (/\.\d{3}$/.test(tmp)) tmp = tmp.replace(/\./g, '');
    else tmp = tmp.replace(',', '.');
  } else if (commaCount > 0 && dotCount === 0) {
    // es. "28,5" -> virgola decimale
    tmp = tmp.replace(/,/g, '.');
  }

  tmp = tmp.replace(/[^\d.\-]/g, '');
  const val = parseFloat(tmp);
  return Number.isFinite(val) ? val : NaN;
}

/* ========================= CHART HELPERS ========================= */
let chartItalia = null;
let chartUE = null;
// Grafico sezione “Spesa regione” (solo Lombardia)
let chartRegione = null;

/* palette HSL coerente; hueOffset per differenziare le due palette */
function genColors(n, hueOffset = 0) {
  return Array.from({ length: n }, (_, i) => `hsl(${(hueOffset + Math.round((i * 360) / n)) % 360} 68% 52%)`);
}

/* sfumature di blu (da scuro a chiaro) per il grafico UE (contrasto aumentato) */
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

/* render tabella fallback (se presente) */
function renderTable(tbody, rows) {
  if (!tbody) return;
  tbody.innerHTML = rows.map(r => `<tr><td>${r.nome}</td><td>${euro(r.importo)}</td></tr>`).join('');
}

/* legenda in colonna: Settore + Importo; hover/click via callback */
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
    sw.setAttribute('aria-hidden', 'true');

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

/* pie generico */
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
      responsive: false,// <-- stop rotazione/animazione
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
    const form = document.querySelector('.calc-form');
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

function runCalcolo() {
  const input = document.getElementById('reddito');
  const regionSelect = document.getElementById('regione');
  const risultati = document.getElementById('risultati');
  const totaleEl = document.getElementById('totaleTasse');

  const tasseStataliEl = document.getElementById('tasseStatali');
  const breakdownEl = document.getElementById('breakdown-tasse');      // opzionale
  const tasseRegionaliEl = document.getElementById('tasseRegionali');  // opzionale
  const nomeRegioneSelEl = document.getElementById('nomeRegioneSel');  // opzionale

  const boxRegioneEl = document.getElementById('box-regione');
  const titoloRegioneNomeEl = document.getElementById('titolo-regione-nome');
  const importoRegioneEl = document.getElementById('importoRegione');

  const boxRegioneSoonEl = document.getElementById('box-regione-soon');
  const boxRegioneBreakdownEl = document.getElementById('box-regione-breakdown');

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

  const reddito = parseEuroInput(String(input.value || ''));
  if (!Number.isFinite(reddito) || reddito <= 0) {
    showFormError(calcit_t('error_income_invalid'));
    input.focus();
    return;
  }

  if (btn) { btn.setAttribute('aria-busy', 'true'); btn.classList.add('is-loading'); }

  const regione = regionSelect ? String(regionSelect.value || '') : '';

  const isLombardia = regione === 'Lombardia';

  const tasseStatali = calcolaIRPEF(reddito);
  const tasseRegionali = regione ? calcolaAddizionaleRegionale(reddito, regione) : 0;
  const tasseTotali = Number((tasseStatali + tasseRegionali).toFixed(2));

  if (totaleEl) totaleEl.textContent = euro(tasseTotali);
  if (risultati) risultati.hidden = false;

  // elementi opzionali (se presenti)
  if (regione) {
    if (breakdownEl) breakdownEl.hidden = false;
    if (tasseStataliEl) tasseStataliEl.textContent = euro(tasseStatali);
    if (tasseRegionaliEl) tasseRegionaliEl.textContent = euro(tasseRegionali);
    if (nomeRegioneSelEl) nomeRegioneSelEl.textContent = regione;

    if (boxRegioneEl) boxRegioneEl.hidden = false;
    if (titoloRegioneNomeEl) titoloRegioneNomeEl.textContent = regione;
    if (importoRegioneEl) importoRegioneEl.textContent = euro(tasseRegionali);

// Regione: grafico SOLO per Lombardia. Per le altre regioni resta il testo “presto disponibile”.
if (boxRegioneSoonEl) boxRegioneSoonEl.hidden = isLombardia;

if (boxRegioneBreakdownEl) {
  if (isLombardia) {
    // Inietta (una volta) il markup del grafico/legenda
    if (!boxRegioneBreakdownEl.querySelector('#graficoRegione')) {
      boxRegioneBreakdownEl.innerHTML = `
        <div class="box-grid">
          <aside id="legend-regione" class="legend-col" aria-label="${calcit_t('chart_reg_aria')}">
            <div class="legend-header">
              <h3 class="legend-title">
                ${calcit_t('legend_title')}
                <span class="legend-subtle">${calcit_t('legend_subtle_reg')}</span>
              </h3>
              <p class="legend-note">${calcit_t('legend_note')}</p>
            </div>
          </aside>

          <div class="chart-col">
            <div class="canvas-wrap">
              <canvas id="graficoRegione" role="img" aria-label="${calcit_t('chart_reg_aria')}" width="300" height="380"></canvas>
              <div id="explanation-regione" class="explanation">${calcit_t('expl_default')}</div>
            </div>
          </div>
        </div>
      `;
    }

    boxRegioneBreakdownEl.hidden = false;

    const canvasReg = boxRegioneBreakdownEl.querySelector('#graficoRegione');
    const legendRegContainer = boxRegioneBreakdownEl.querySelector('#legend-regione');
    const explReg = boxRegioneBreakdownEl.querySelector('#explanation-regione');

    const labelsReg = SETTORI_LOMBARDIA.map(s => pickLabel(s.nome));
    const valuesReg = SETTORI_LOMBARDIA.map(s => Number((s.percentuale * tasseRegionali).toFixed(2)));
    const colorsReg = genColors(labelsReg.length, 160);

    safeDestroy(chartRegione);
    chartRegione = renderPieChart(canvasReg, labelsReg, valuesReg, colorsReg, {
      existingChart: chartRegione,
      explanationEl: explReg,
      defaultExplanation: calcit_t('expl_default')
    });

    renderLegendInColumn(legendRegContainer, labelsReg, valuesReg, colorsReg, {
      onHover: (i) => {
        if (chartRegione && typeof chartRegione.setActiveElements === 'function') {
          chartRegione.setActiveElements([{ datasetIndex: 0, index: i }]);
          chartRegione.update();
        }
        if (explReg) {
          const tot = valuesReg.reduce((a,b)=>a + Number(b || 0), 0) || 1;
          const percent = ((valuesReg[i] / tot) * 100).toFixed(1);
          const fn = calcit_t('tooltip_label');
          explReg.textContent = typeof fn === 'function'
            ? fn(labelsReg[i], euro(valuesReg[i]), percent)
            : `${labelsReg[i]}: ${euro(valuesReg[i])} (${percent}%)`;
        }
      },
      onLeave: () => {
        if (chartRegione && typeof chartRegione.setActiveElements === 'function') {
          chartRegione.setActiveElements([]);
          chartRegione.update();
        }
        if (explReg) explReg.textContent = calcit_t('expl_default');
      },
      onClick: (i) => {
        const sector = SETTORI_LOMBARDIA[i];
        if (sector && sector.link) window.open(window.tpLangUrl ? window.tpLangUrl(sector.link) : sector.link, '_blank', 'noopener');
      }
    });

  } else {
    // Non Lombardia: nessun grafico (torna al layout “vecchio”)
    boxRegioneBreakdownEl.hidden = true;
    boxRegioneBreakdownEl.innerHTML = '';
    safeDestroy(chartRegione);
    chartRegione = null;
  }
} else {
  safeDestroy(chartRegione);
  chartRegione = null;
}

  } else {
    if (breakdownEl) breakdownEl.hidden = true;
    if (boxRegioneEl) boxRegioneEl.hidden = true;
// Cleanup grafico regione (eventuale selezione precedente)
if (boxRegioneSoonEl) boxRegioneSoonEl.hidden = false;
if (boxRegioneBreakdownEl) {
  boxRegioneBreakdownEl.hidden = true;
  boxRegioneBreakdownEl.innerHTML = '';
}
safeDestroy(chartRegione);
chartRegione = null;
  }

  /* ------------------ ITALIA ------------------ */
  const labelsIt = SETTORI.map(s => pickLabel(s.nome));
  const valuesIt = SETTORI.map(s => Number((s.percentuale * tasseStatali).toFixed(2)));
  const colorsIt = genColors(labelsIt.length, 8);

  // tabella fallback (se esiste)
  const rowsIt = SETTORI.map((s, idx) => ({
    nome: `<a href="${window.tpLangUrl ? window.tpLangUrl(s.link) : s.link}" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:underline">${labelsIt[idx]}</a>`,
    importo: valuesIt[idx]
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
        chartItalia.setActiveElements([{ datasetIndex: 0, index: i }]);
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
      if (sector && sector.link) window.open(window.tpLangUrl ? window.tpLangUrl(sector.link) : sector.link, '_blank', 'noopener');
    }
  });

  /* ------------------ UE ------------------ */
  const labelsUe = SETTORI_UE.map(s => pickLabel(s.nome));
  const valuesUe = SETTORI_UE.map(s => Number((s.percentuale * tasseStatali).toFixed(2)));
  const colorsUe = genBlueShades(labelsUe.length);

  const rowsUe = SETTORI_UE.map((s, idx) => ({
    nome: `<a href="${window.tpLangUrl ? window.tpLangUrl(s.link) : s.link}" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:underline">${labelsUe[idx]}</a>`,
    importo: valuesUe[idx]
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
        chartUE.setActiveElements([{ datasetIndex: 0, index: i }]);
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
      if (sector && sector.link) window.open(window.tpLangUrl ? window.tpLangUrl(sector.link) : sector.link, '_blank', 'noopener');
    }
  });

  if (btn) { btn.removeAttribute('aria-busy'); btn.classList.remove('is-loading'); btn.focus(); }
}

/* ========================= INIT & BINDING ========================= */
function attachCalculator() {
  const form = document.getElementById('calc-form');
  const input = document.getElementById('reddito');
  const regionSelect = document.getElementById('regione');

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

  // se cambi Regione dopo il calcolo, ricalcola
  if (regionSelect) {
    regionSelect.addEventListener('change', () => {
      const risultati = document.getElementById('risultati');
      if (risultati && !risultati.hidden) runCalcolo();
    });
  }
}

document.addEventListener('DOMContentLoaded', attachCalculator);
