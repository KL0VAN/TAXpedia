/* CalcolatoriNazioni.js
   Renderizza dinamicamente le card delle nazioni in #country-grid (array-driven).
   Aggiungi qui nuovi paesi senza toccare l'HTML.
*/

const NAZIONI = [
  {
    id: 'it',
    nome: 'Italia',
    attivo: true,
    href: './CalcolatoreItalia/CalculatorItalia.html', // ← corretto da dentro "Nazione"
    flagClass: 'flag-italy',
    ariaLabel: 'Apri calcolatore Italia'
  },
  {
    id: 'eu',
    nome: 'Nuova Nazione UE',
    attivo: false,
    href: '#',
    flagClass: 'flag-eu',
    ariaLabel: 'Calcolatore UE in valutazione'
  }
];

  // Esempio futura espansione:
  // { id:"FR", name:"Francia", href:"../Francia/CalcolatoreFrancia/CalculatorFrancia.html", active:true, flagClass:"flag-france", footText:"Vai al calcolatore" }
];

function renderCountryGrid() {
  const grid = document.getElementById('country-grid');
  if (!grid) return;

  // Svuota fallback statico
  grid.innerHTML = "";

  for (const c of COUNTRIES) {
    const el = document.createElement(c.active ? 'a' : 'div');
    el.className = `nation-card ${c.active ? 'is-active' : 'is-soon'}`;
    el.setAttribute('role', 'listitem');

    if (c.active && c.href) {
      el.href = c.href;
      el.setAttribute('aria-label', `Apri calcolatore ${c.name}`);
    } else {
      el.setAttribute('aria-disabled', 'true');
      el.addEventListener('click', (e) => e.preventDefault());
    }

    el.innerHTML = `
      <div class="nation-header">
        <span class="nation-name">${c.name}</span>
      </div>
      <div class="nation-flag ${c.flagClass}" aria-hidden="true"></div>
      <div class="nation-foot">${c.footText || ''}</div>
    `;

    grid.appendChild(el);
  }
}

document.addEventListener('DOMContentLoaded', renderCountryGrid);
