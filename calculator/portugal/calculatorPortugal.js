/* calculatorItalia.js
   Versione completa aggiornata — doppio grafico, legenda colonna, hover slice più pronunciato
   Assicurati che Chart.js sia incluso nel HTML (script tag con defer) e che gli id HTML corrispondano:
   - input id="reddito"
   - form id="calc-form"
   - btn id="btn-calcola"
   - risultati id="risultati"
   - totale id="totaleTasse"
   - tabellaDati id="tabellaDati" (opzionale; la legenda sostituisce la tabella)
   - tabellaUE id="tabellaUE"
   - canvas grafico Italia id="graficoItalia"
   - canvas grafico UE id="graficoUE"
   - legend containers id="legend-italia" e id="legend-ue"
   - explanation boxes id="explanation-it" e id="explanation-ue"
*/

/* ========================= CONFIG ========================= */
const TAX_BRACKETS = [
  { upper: 8342,  rate: 0.125 },
  { upper: 12587, rate: 0.157 },
  { upper: 17838, rate: 0.212 },
  { upper: 23089, rate: 0.241 },
  { upper: 29397, rate: 0.311 },
  { upper: 43090, rate: 0.349 },
  { upper: 46566, rate: 0.431 },
  { upper: 86634, rate: 0.446 },
  { upper: Infinity, rate: 0.48 },
];

// Percorsi ai file di testo - aggiornare i nomi/file se necessario
const SETTORI = [
  { id: 'welf', nome:'Protezione sociale',               percentuale:0.367, link:'' },
  { id: 'san',  nome:'Sanità',                           percentuale:0.172, link:'' },
  { id: 'edu',  nome:'Istruzione e ricerca',             percentuale:0.131, link:'' },
  { id: 'inf',  nome:'Infrastrutture e trasporti',       percentuale:0.071, link:'' },
  { id: 'eco',  nome:'Politiche economiche',             percentuale:0.061, link:'' },
  { id: 'pa',   nome:'Pubblica amministrazione',         percentuale:0.039, link:'' },
  { id: 'cul',  nome:'Cultura e sport',                  percentuale:0.032, link:'' },
  { id: 'def',  nome:'Difesa',                           percentuale:0.030, link:'' },
  { id: 'int',  nome:'Interessi',                        percentuale:0.027, link:'' },
  { id: 'sic',  nome:'Sicurezza e ordine pubblico',      percentuale:0.020, link:'' },
  { id: 'ue',   nome:'Bilancio UE',                      percentuale:0.020, link:'' },
  { id: 'amb',  nome:'Protezione ambientale',            percentuale:0.015, link:'' },
  { id: 'giu',  nome:'Giustizia',                        percentuale:0.013, link:'' },
  { id: 'alt',  nome:'Altro',                            percentuale:0.002, link:'' },
];

const SETTORI_UE = [
  { nome:'Coesione, resilienza e valori',                percentuale:0.0071, link:'/article/europe/coesione.php' },
  { nome:'Risorse naturali e ambiente',                  percentuale:0.0051, link:'/article/europe/risorse_naturali.php' },
  { nome:'Mercato unico, innovazione e agenda digitale', percentuale:0.0019, link:'/article/europe/mercato_unico.php' },
  { nome:'Rapporti con il vicinato e con il mondo',      percentuale:0.0015, link:'/article/europe/rapporti_vicinato.php' },
  { nome:'Pubblica amministrazione europea',             percentuale:0.0012, link:'/article/europe/pubblica_amm_ue.php' },
  { nome:'Strumenti speciali',                           percentuale:0.0005, link:'/article/europe/strumenti_speciali.php' },
  { nome:'Migrazione e gestione delle frontiere',        percentuale:0.0004, link:'/article/europe/migrazione_gestione.php' },
  { nome:'Sicurezza e Difesa',                           percentuale:0.0003, link:'/article/europe/sicurezza_difesa.php' },
];

/* ========================= UTIL ========================= */
const nfEuro = new Intl.NumberFormat('it-IT', { style: 'currency', currency: 'EUR' });
const euro = n => nfEuro.format(Number(n || 0));

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
    // se punto seguito da esattamente 3 cifre tratteremo come migliaia
    if (/\.\d{3}$/.test(tmp)) {
      tmp = tmp.replace(/\./g, '');
    } else {
      // altrimenti punto come decimale
      tmp = tmp.replace(',', '.');
    }
  } else if (commaCount > 0 && dotCount === 0) {
    // es. "28,5" -> virgola decimale
    tmp = tmp.replace(/,/g, '.');
  }

  // rimuove eventuali altri caratteri non numerici (tenendo il punto decimale e segno)
  tmp = tmp.replace(/[^\d.\-]/g, '');
  const val = parseFloat(tmp);
  return Number.isFinite(val) ? val : NaN;
}

/* ========================= CHART HELPERS ========================= */

let chartItalia = null;
let chartUE = null;

/* palette HSL coerente; hueOffset per differenziare le due palette */
function genColors(n, hueOffset = 0) {
  return Array.from({ length: n }, (_, i) => `hsl(${(hueOffset + Math.round((i * 360) / n)) % 360} 68% 52%)`);
}

/* sfumature di blu (da scuro a chiaro) per il grafico UE */
/* ⬇️ UNICA MODIFICA: saturazione e range di luminosità più ampi per aumentare il contrasto */
function genBlueShades(n) {
  const H = 210;            // hue blu
  const S1 = 80, S2 = 98;   // saturazione più intensa (80–98%)
  const L1 = 22, L2 = 78;   // luminosità più ampia (scuro → chiaro)
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

/* render della "tabella" (se vuoi tenerla come fallback) */
function renderTable(tbody, rows) {
  if (!tbody) return;
  tbody.innerHTML = rows.map(r =>
    `<tr><td>${r.nome}</td><td>${euro(r.importo)}</td></tr>`
  ).join('');
}

/* crea una legenda nella colonna (solo Settore + Importo in euro)
   options:
     - onHover(index)
     - onLeave()
     - onClick(index)
*/
function renderLegendInColumn(containerEl, labels, values, colors, options = {}) {
  if (!containerEl) return;
  containerEl.innerHTML = ''; // pulisce

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

    // left: swatch + label
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

    // right: valore (solo euro, senza percentuale visibile)
    const valueSpan = document.createElement('span');
    valueSpan.className = 'legend-value';
    valueSpan.textContent = euro(values[i]);

    li.appendChild(left);
    li.appendChild(valueSpan);

    // hover / leave -> callback (di norma evidenziamo slice nel grafico)
    li.addEventListener('mouseenter', () => {
      if (typeof options.onHover === 'function') options.onHover(i);
    });
    li.addEventListener('mouseleave', () => {
      if (typeof options.onLeave === 'function') options.onLeave(i);
    });

    // click -> callback (per ITA apre pagina dettaglio o link UE)
    li.addEventListener('click', () => {
      if (typeof options.onClick === 'function') options.onClick(i);
    });

    // keyboard accessibility
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

/* render grafico pie generico; hoverOffset maggiore per fetta che "sbuca" */
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
        // effetto: fetta esce di più
        hoverOffset: 22
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }, // legend grafica disabilitata (usiamo legenda a colonna)
        tooltip: {
          callbacks: {
            label(ctx) {
              const val = ctx.raw ?? 0;
              const tot = ctx.dataset.data.reduce((a,b)=>a+Number(b||0),0) || 1;
              const percent = ((val/tot)*100).toFixed(1);
              return `${ctx.label}: ${euro(val)} (${percent}%)`;
            }
          }
        }
      },
      onHover(evt, elems) {
        // mostra spiegazione con percentuale nel box explanation se presente
        const explEl = options.explanationEl;
        if (!explEl) return;
        if (elems && elems.length) {
          const idx = elems[0].index;
          const val = data[idx] || 0;
          const tot = data.reduce((a,b)=>a+Number(b||0),0) || 1;
          explEl.textContent = `${labels[idx]}: ${euro(val)} (${((val/tot)*100).toFixed(1)}%)`;
        } else {
          explEl.textContent = options.defaultExplanation || 'Tocca sul grafico per i dettagli.';
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

  // parse input permissivo (accetta punti/spazi/virgole)
  const raw = String(input.value || '');
  const reddito = parseEuroInput(raw);
  if (!Number.isFinite(reddito) || reddito <= 0) {
    showFormError('Inserisci un reddito valido (maggiore di zero). Puoi usare spazi o punti come separatori delle migliaia.');
    input.focus();
    return;
  }

  // UX loading sul bottone
  if (btn) { btn.setAttribute('aria-busy','true'); btn.classList.add('is-loading'); }

  // calcolo imposta totale
  const tasse = calcolaIRPEF(reddito);
  if (totaleEl) totaleEl.textContent = euro(tasse);
  if (risultati) risultati.hidden = false;

  /* ------------------ ITALIA: table + chart + legend (colonna) ------------------ */
  // righe (tabella fallback)
  const rowsIt = SETTORI.map(s => ({
    nome: `<a href="${s.link}" target="_blank" rel="noopener noreferrer" style="color:inherit;text-decoration:underline">${s.nome}</a>`,
    importo: s.percentuale * tasse
  }));
  renderTable(tabIt, rowsIt);

  // chart ITALIA
  const labelsIt = SETTORI.map(s => s.nome);
  const valuesIt = SETTORI.map(s => Number((s.percentuale * tasse).toFixed(2)));
  const colorsIt = genColors(labelsIt.length, 8);
  safeDestroy(chartItalia);
  chartItalia = renderPieChart(canvasIt, labelsIt, valuesIt, colorsIt, {
    existingChart: chartItalia,
    explanationEl: explIt,
    defaultExplanation: 'Tocca sul grafico per i dettagli.'
  });

  // legenda colonna ITALIA: solo Settore + Importo; hover evidenzia fetta; click apre dettaglio
  renderLegendInColumn(legendItContainer, labelsIt, valuesIt, colorsIt, {
    onHover: (i) => {
      if (chartItalia && typeof chartItalia.setActiveElements === 'function') {
        chartItalia.setActiveElements([{ datasetIndex:0, index:i }]);
        chartItalia.update();
      }
      if (explIt) {
        const tot = valuesIt.reduce((a,b)=>a+Number(b||0),0) || 1;
        explIt.textContent = `${labelsIt[i]}: ${euro(valuesIt[i])} (${((valuesIt[i]/tot)*100).toFixed(1)}%)`;
      }
    },
    onLeave: () => {
      if (chartItalia && typeof chartItalia.setActiveElements === 'function') {
        chartItalia.setActiveElements([]);
        chartItalia.update();
      }
      if (explIt) explIt.textContent = 'Tocca sul grafico per i dettagli.';
    },
    onClick: (i) => {
      const sector = SETTORI[i];
      if (sector && sector.link) {
        window.open(sector.link, '_blank', 'noopener');
      }
    }
  });

  /* ------------------ UE: table + chart + legend (colonna) ------------------ */
  const rowsUe = SETTORI_UE.map(s => ({ nome: s.nome, importo: s.percentuale * tasse }));
  renderTable(tabUe, rowsUe);

  const labelsUe = SETTORI_UE.map(s => s.nome);
  const valuesUe = SETTORI_UE.map(s => Number((s.percentuale * tasse).toFixed(2)));
  const colorsUe = genBlueShades(labelsUe.length); // ⬅️ sfumature di blu per il grafico UE
  safeDestroy(chartUE);
  chartUE = renderPieChart(canvasUe, labelsUe, valuesUe, colorsUe, {
    existingChart: chartUE,
    explanationEl: explUe,
    defaultExplanation: 'Tocca sul grafico per i dettagli.'
  });

  // legenda UE: hover evidenzia slice, click APRE LINK
  renderLegendInColumn(legendUeContainer, labelsUe, valuesUe, colorsUe, {
    onHover: (i) => {
      if (chartUE && typeof chartUE.setActiveElements === 'function') {
        chartUE.setActiveElements([{ datasetIndex:0, index:i }]);
        chartUE.update();
      }
      if (explUe) {
        const tot = valuesUe.reduce((a,b)=>a+Number(b||0),0) || 1;
        explUe.textContent = `${labelsUe[i]}: ${euro(valuesUe[i])} (${((valuesUe[i]/tot)*100).toFixed(1)}%)`;
      }
    },
    onLeave: () => {
      if (chartUE && typeof chartUE.setActiveElements === 'function') {
        chartUE.setActiveElements([]);
        chartUE.update();
      }
      if (explUe) explUe.textContent = 'Tocca sul grafico per i dettagli.';
    },
    onClick: (i) => {
      const sector = SETTORI_UE[i];
      if (sector && sector.link) {
        window.open(sector.link, '_blank', 'noopener');
      }
    }
  });

  // rimuovo loading e riporto focus sul bottone
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

  // supporta invio da input con comportamento moderno
  input.addEventListener('keydown', (e) => {
    if (e.key === 'Enter') {
      e.preventDefault();
      form.requestSubmit();
    }
  });

  // funzione globale per compatibilità con chiamate inline
  window.calcolaTasse = () => form.requestSubmit();
}

document.addEventListener('DOMContentLoaded', attachCalculator);

