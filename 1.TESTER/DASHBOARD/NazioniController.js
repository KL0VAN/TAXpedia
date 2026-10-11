/* Optional dynamic renderer for calculator country cards.
   The current menu is server-rendered; this file stays clean for pages that
   may expose a #country-grid placeholder in the future. */

const NAZIONI = [
  { id: 'IT', name: 'Italia', href: '/calculator/italia/italia.php', active: true, flagClass: 'flag-italy' },
  { id: 'FR', name: 'Francia', href: '/calculator/france/france.php', active: true, flagClass: 'flag-france' },
  { id: 'DE', name: 'Germania', href: '/calculator/germany/germany.php', active: true, flagClass: 'flag-germany' },
  { id: 'ES', name: 'Spagna', href: '/calculator/spain/spain.php', active: true, flagClass: 'flag-spain' },
  { id: 'BE', name: 'Belgio', href: '/calculator/belgium/belgium.php', active: true, flagClass: 'flag-belgium' },
  { id: 'NL', name: 'Olanda', href: '/calculator/netherlands/netherlands.php', active: true, flagClass: 'flag-netherlands' },
  { id: 'LU', name: 'Lussemburgo', href: '/calculator/luxembourg/luxembourg.php', active: true, flagClass: 'flag-luxembourg' },
  { id: 'AT', name: 'Austria', href: '/calculator/austria/austria.php', active: true, flagClass: 'flag-austria' },
  { id: 'HR', name: 'Croazia', href: '/calculator/croatia/croatia.php', active: true, flagClass: 'flag-croatia' },
  { id: 'PL', name: 'Polonia', href: '/calculator/poland/poland.php', active: true, flagClass: 'flag-poland' },
  { id: 'PT', name: 'Portogallo', href: '/calculator/portugal/portugal.php', active: true, flagClass: 'flag-portugal' },
  { id: 'SI', name: 'Slovenia', href: '/calculator/slovenia/slovenia.php', active: true, flagClass: 'flag-slovenia' },
  { id: 'BG', name: 'Bulgaria', href: '/calculator/bulgaria/bulgaria.php', active: true, flagClass: 'flag-bulgaria' },
  { id: 'CZ', name: 'Cechia', href: '/calculator/czech/czech.php', active: true, flagClass: 'flag-czech' },
  { id: 'DK', name: 'Danimarca', href: '/calculator/denmark/denmark.php', active: true, flagClass: 'flag-denmark' },
  { id: 'GR', name: 'Grecia', href: '/calculator/greece/greece.php', active: true, flagClass: 'flag-greece' },
  { id: 'HU', name: 'Ungheria', href: '/calculator/hungary/hungary.php', active: true, flagClass: 'flag-hungary' },
  { id: 'IE', name: 'Irlanda', href: '/calculator/ireland/ireland.php', active: true, flagClass: 'flag-ireland' },
  { id: 'RO', name: 'Romania', href: '/calculator/romania/romania.php', active: true, flagClass: 'flag-romania' },
  { id: 'SE', name: 'Svezia', href: '/calculator/sweden/sweden.php', active: true, flagClass: 'flag-sweden' },
];

function renderCountryGrid() {
  const grid = document.getElementById('country-grid');
  if (!grid) return;

  grid.innerHTML = '';

  for (const country of NAZIONI) {
    const el = document.createElement(country.active ? 'a' : 'div');
    el.className = `nation-card ${country.active ? 'is-active' : 'is-soon'}`;
    el.setAttribute('role', 'listitem');

    if (country.active && country.href) {
      el.href = country.href;
      el.setAttribute('aria-label', `Apri calcolatore ${country.name}`);
    } else {
      el.setAttribute('aria-disabled', 'true');
    }

    el.innerHTML = `
      <span class="nation-flag ${country.flagClass}" aria-hidden="true"></span>
      <div class="nation-header">
        <h3 class="nation-name">${country.name}</h3>
      </div>
      <div class="nation-foot">Calcolatore spesa pubblica</div>
    `;

    grid.appendChild(el);
  }
}

document.addEventListener('DOMContentLoaded', renderCountryGrid);
