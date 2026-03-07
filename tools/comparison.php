<?php
declare(strict_types=1);
require_once __DIR__ . '/../i18n/i18n.php';

/* ===================== i18n (locale) ===================== */
if (!function_exists('tp_get_lang')) {
  function tp_get_lang(): string {
    $q = isset($_GET['lang']) ? strtolower((string)$_GET['lang']) : '';
    $lang = ($q === 'en' || $q === 'it') ? $q : '';
    if ($lang === '') {
      $c = isset($_COOKIE['tp_lang']) ? strtolower((string)$_COOKIE['tp_lang']) : '';
      $lang = ($c === 'en' || $c === 'it') ? $c : 'it';
    }
    return $lang;
  }
}

if (!function_exists('tp_set_lang_cookie')) {
  function tp_set_lang_cookie(string $lang): void {
    // Set cookie solo se l’utente ha passato ?lang=
    if (!isset($_GET['lang'])) return;
    $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
    setcookie('tp_lang', $lang, [
      'expires'  => time() + 60 * 60 * 24 * 365,
      'path'     => '/',
      'secure'   => $secure,
      'httponly' => false,
      'samesite' => 'Lax',
    ]);
  }
}

if (!function_exists('tp_t')) {
  function tp_t(string $key, array $dict, string $lang): string {
    if (isset($dict[$lang][$key])) return (string)$dict[$lang][$key];
    if (isset($dict['it'][$key])) return (string)$dict['it'][$key];
    return $key;
  }
}

if (!function_exists('tp_e')) {
  function tp_e(string $key, array $dict, string $lang): void {
    echo htmlspecialchars(tp_t($key, $dict, $lang), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
  }
}

$lang = function_exists('tp_lang') ? tp_lang() : tp_get_lang();

$DICT = [
  'it' => [
    'title' => 'Confronta i Paesi',
    'subtitle' => 'Seleziona fino a 2 paesi e confronta gli indicatori.',
    'select_country' => 'Seleziona stato',
    'country_a' => 'Paese 1',
    'country_b' => 'Paese 2',
    'note' => 'Dati aggiornati al 2025.',
    'table_indicator' => 'Indicatore',
    'table_a' => 'Paese 1',
    'table_b' => 'Paese 2',
    'nodata' => '—',
    'same_country_error' => 'Seleziona due paesi diversi.',
    'lang_it' => 'IT',
    'lang_en' => 'EN',
    'noscript' => 'Per usare il confronto, abilita JavaScript.',
    'politiche_economiche' => 'Politiche economiche',
    'protezione_sociale' => 'Protezione sociale',
    'pubblica_amministrazione' => 'Pubblica amministrazione',
    'sanità' => 'Sanità',
    'interessi' => 'Interessi sul debito pubblico',
    'istruzione_ricerca' => 'Istruzione e ricerca',
    'difesa' => 'Difesa',
    'bilancio_ue' => 'Bilancio UE',         
    'infrastrutture' => 'Infrastrutture e trasporti',      
    'sicurezza' => 'Sicurezza e ordine',
    'protezione_ambientale' => 'Protezione ambientale',
    'giustizia' => 'Giustizia',
    'cultura' => 'Cultura',
    'altro' => 'Altro',
    'valuta' => 'Valuta',
    'reddito_medio' => 'Reddito medio',
    'debt_gdp' => 'Debito/PIL',
    'unit_pct' => '%',
    'unit_eur_year' => '€/anno',
  ],
  'en' => [
    'title' => 'Compare Countries',
    'subtitle' => 'Select up to 2 countries and compare key indicators.',
    'select_country' => 'Select country',
    'country_a' => 'Country 1',
    'country_b' => 'Country 2',
    'note' => 'Data updated to 2025.',
    'table_indicator' => 'Indicator',
    'table_a' => 'Country 1',
    'table_b' => 'Country 2',
    'nodata' => '—',
    'same_country_error' => 'Please select two different countries.',
    'lang_it' => 'IT',
    'lang_en' => 'EN',
    'noscript' => 'To use the comparison, please enable JavaScript.',
    'politiche_economiche' => 'Economic policies',
    'protezione_sociale' => 'Social protection',
    'pubblica_amministrazione' => 'Public administration',
    'sanità' => 'Healthcare',
    'interessi' => 'Interest on public debt',
    'istruzione_ricerca' => 'Education and research',
    'difesa' => 'Defence',
    'bilancio_ue' => 'EU budget',
    'infrastrutture' => 'Infrastructure and transport',
    'sicurezza' => 'Security and public order',
    'protezione_ambientale' => 'Environmental protection',
    'giustizia' => 'Justice',
    'cultura' => 'Culture',
    'altro' => 'Other',
    'valuta' => 'Currency',
    'reddito_medio' => 'Average income',
    'debt_gdp' => 'Debt/GDP',
    'unit_pct' => '%',
    'unit_eur_year' => '€/year',
  ],
];

/* ===================== Dati (placeholder) ===================== */
/* Qui aggiungerai i valori quando li avrai, es: */
$COUNTRIES = [
  'IT' => [
    'flag' => '🇮🇹',
    'name' => ($lang === 'en') ? 'Italy' : 'Italia',
    'metrics' => [
      'valuta' => 'EUR',
      'reddito_medio' => 31856,
      'debt_gdp' => 136.65,
      'politiche_economiche' => '20.9',
      'protezione_sociale' => '20.6',
      'pubblica_amministrazione' => '8.6',
      'sanità' => '10.1',
      'interessi' => '11.6',
      'istruzione_ricerca' => '7.9',
      'difesa' => '3.4',
      'bilancio_ue' => '2.5',
      'infrastrutture' => '2.5',
      'sicurezza' => '2.5',
      'protezione_ambientale' => '2.4',
      'giustizia' => '1.3',
      'cultura' => '0.6',
      'altro' => '5.1',
    ],
  ],
  'FR' => [
    'flag' => '🇫🇷',
    'name' => ($lang === 'en') ? 'France' : 'Francia',
    'metrics' => [
      'valuta' => 'EUR',
      'reddito_medio' => 43356,
      'debt_gdp' => 115.5,
      'politiche_economiche'   => '29.0',
      'protezione_sociale'     => '9.6',
      'pubblica_amministrazione'=> '7.4',
      'sanità'                 => '0.2',
      'interessi'              => '8.2',
      'istruzione_ricerca'     => '17.5',
      'difesa'                 => '8.8',
      'bilancio_ue'            => '3.4',
      'infrastrutture'         => '1.5',
      'sicurezza'              => '3.7',
      'protezione_ambientale'  => '2.9',
      'giustizia'              => '1.9',
      'cultura'                => '1.2',
      'altro'                  => '4.7',
    ],
  ],
 'DE' => [
    'flag' => '🇩🇪',
    'name' => ($lang === 'en') ? 'Germany' : 'Germania',
    'metrics' => [
      'valuta' => 'EUR',
      'reddito_medio' => 51000,
      'debt_gdp' => 63.1,
      'politiche_economiche'    => '6.2',
      'protezione_sociale'      => '40.5',
      'pubblica_amministrazione'=> '8.9',
      'sanità'                  => '3.9',
      'interessi'               => '5.6',
      'istruzione_ricerca'      => '5.8',
      'difesa'                  => '13.0',
      'bilancio_ue'             => '6.3',
      'infrastrutture'          => '5.8',
      'sicurezza'               => '1.6',
      'protezione_ambientale'   => '0.5',
      'giustizia'               => '0.2',
      'cultura'                 => '0.1',
      'altro'                   => '1.6',
    ],
  ],
  'ES' => [
    'flag' => '🇪🇸',
    'name' => ($lang === 'en') ? 'Spain' : 'Spagna',
    'metrics' => [
      'valuta' => 'EUR',
      'reddito_medio' => 23349,
      'debt_gdp' => 100.1,
      'politiche_economiche'     => '3.4',
      'protezione_sociale'       => '56.0',
      'pubblica_amministrazione' => '17.4',
      'sanità'                   => '1.2',
      'interessi'                => '6.9',
      'istruzione_ricerca'       => '2.8',
      'difesa'                   => '2.7',
      'bilancio_ue'              => '3.9',
      'infrastrutture'           => '0.7',
      'sicurezza'                => '2.3',
      'protezione_ambientale'    => '1.8',
      'giustizia'                => '0.5',
      'cultura'                  => '0.3',
      'altro'                    => '0.1',
    ],
  ],
  'BE' => [
    'flag' => '🇧🇪',
    'name' => ($lang === 'en') ? 'Belgium' : 'Belgio',
    'metrics' => [
      'valuta' => 'EUR',
      'reddito_medio' => 58000,
      'debt_gdp' => 106.7,
      'politiche_economiche'     => '6.7',
      'protezione_sociale'       => '37.7',
      'pubblica_amministrazione' => '7.1',
      'sanità'                   => '14.8',
      'interessi'                => '4.1',
      'istruzione_ricerca'       => '11.7',
      'difesa'                   => '2.4',
      'bilancio_ue'              => '2.0',
      'infrastrutture'           => '5.2',
      'sicurezza'                => '2.7',
      'protezione_ambientale'    => '2.1',
      'giustizia'                => '0.4',
      'cultura'                  => '2.3',
      'altro'                    => '0.8',
    ],
  ],
  'LU' => [
    'flag' => '🇱🇺',
    'name' => ($lang === 'en') ? 'Luxembourg' : 'Lussemburgo',
    'metrics' => [
      'valuta' => 'EUR',
      'reddito_medio' => 75919,
      'debt_gdp' => 26.75,
      'politiche_economiche'     => '5.6',
      'protezione_sociale'       => '24.3',
      'pubblica_amministrazione' => '6.8',
      'sanità'                   => '8.8',
      'interessi'                => '1.0',
      'istruzione_ricerca'       => '17.2',
      'difesa'                   => '4.7',
      'bilancio_ue'              => '1.6',
      'infrastrutture'           => '10.8',
      'sicurezza'                => '9.7',
      'protezione_ambientale'    => '1.6',
      'giustizia'                => '1.2',
      'cultura'                  => '1.2',
      'altro'                    => '5.5',
    ],
  ],
  'NL' => [
    'flag' => '🇳🇱',
    'name' => ($lang === 'en') ? 'Netherlands' : 'Olanda',
    'metrics' => [
      'valuta' => 'EUR',
      'reddito_medio' => 54900,
      'debt_gdp' => 45.8,
      'politiche_economiche'     => '6.1',
      'protezione_sociale'       => '23.8',
      'pubblica_amministrazione' => '13.5',
      'sanità'                   => '24.2',
      'interessi'                => '1.8',
      'istruzione_ricerca'       => '11.7',
      'difesa'                   => '4.7',
      'bilancio_ue'              => '2.3',
      'infrastrutture'           => '3.9',
      'sicurezza'                => '2.4',
      'protezione_ambientale'    => '1.1',
      'giustizia'                => '1.4',
      'cultura'                  => '0.7',
      'altro'                    => '2.4',
    ],
  ],
  'AT' => [
    'flag' => '🇦🇹',
    'name' => ($lang === 'en') ? 'Austria' : 'Austria',
    'metrics' => [
      'valuta' => 'EUR',
      'reddito_medio' => 55678,
      'debt_gdp' => 82.8,
      'politiche_economiche'     => '7.6',
      'protezione_sociale'       => '45.9',
      'pubblica_amministrazione' => '2.5',
      'sanità'                   => '2.2',
      'interessi'                => '6.6',
      'istruzione_ricerca'       => '15.9',
      'difesa'                   => '3.5',
      'bilancio_ue'              => '2.5',
      'infrastrutture'           => '4.8',
      'sicurezza'                => '3.8',
      'protezione_ambientale'    => '1.7',
      'giustizia'                => '1.9',
      'cultura'                  => '0.9',
      'altro'                    => '0.2',
    ],
  ],
  'HR' => [
    'flag' => '🇭🇷',
    'name' => ($lang === 'en') ? 'Croatia' : 'Croazia',
    'metrics' => [
      'valuta' => 'EUR',
      'reddito_medio' => 25000,
      'debt_gdp' => 56.9,
      'politiche_economiche'     => '11.6',
      'protezione_sociale'       => '32.5',
      'pubblica_amministrazione' => '5.3',
      'sanità'                   => '12.9',
      'interessi'                => '2.9',
      'istruzione_ricerca'       => '7.4',
      'difesa'                   => '4.1',
      'bilancio_ue'              => '2.1',
      'infrastrutture'           => '6.8',
      'sicurezza'                => '4.6',
      'protezione_ambientale'    => '0.6',
      'giustizia'                => '1.9',
      'cultura'                  => '3.1',
      'altro'                    => '4.2',
    ],
  ],
];

$METRICS = [
  // Nuove metriche macro
  ['key' => 'valuta',                   'label_key' => 'valuta',                   'fmt' => 'text'],
  ['key' => 'reddito_medio',            'label_key' => 'reddito_medio',            'unit_key' => 'unit_eur_year', 'fmt' => 'eur0'],
  ['key' => 'debt_gdp',                 'label_key' => 'debt_gdp',                 'unit_key' => 'unit_pct',      'fmt' => 'pct1'],

  // Voci di spesa esistenti
  ['key' => 'politiche_economiche',     'label_key' => 'politiche_economiche',     'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'protezione_sociale',       'label_key' => 'protezione_sociale',       'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'sanità',                   'label_key' => 'sanità',                   'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'interessi',                'label_key' => 'interessi',                'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'pubblica_amministrazione', 'label_key' => 'pubblica_amministrazione', 'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'istruzione_ricerca',       'label_key' => 'istruzione_ricerca',       'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'difesa',                   'label_key' => 'difesa',                   'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'bilancio_ue',              'label_key' => 'bilancio_ue',              'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'infrastrutture',           'label_key' => 'infrastrutture',           'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'sicurezza',                'label_key' => 'sicurezza',                'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'protezione_ambientale',    'label_key' => 'protezione_ambientale',    'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'giustizia',                'label_key' => 'giustizia',                'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'cultura',                  'label_key' => 'cultura',                  'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
  ['key' => 'altro',                    'label_key' => 'altro',                    'unit_key' => 'unit_pct', 'fmt' => 'pct1'],
];


/* ===================== Selezione iniziale da URL ===================== */
$allowed = array_keys($COUNTRIES);

$A = isset($_GET['a']) ? strtoupper((string)$_GET['a']) : '';
$B = isset($_GET['b']) ? strtoupper((string)$_GET['b']) : '';
if ($A !== '' && !in_array($A, $allowed, true)) $A = '';
if ($B !== '' && !in_array($B, $allowed, true)) $B = '';

function tp_build_lang_url(string $lang): string {
  $params = $_GET;
  $params['lang'] = $lang;
  $qs = http_build_query($params);
  $path = strtok((string)($_SERVER['REQUEST_URI'] ?? ''), '?');
  return $path . ($qs ? ('?' . $qs) : '');
}

?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($lang, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php tp_e('title', $DICT, $lang); ?> | Taxpedia</title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">


  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="stylecomparison.css" />

</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>
  <main class="container" id="main">
    <div class="topbar">
      <div>
        <h1 class="page-title"><?php tp_e('title', $DICT, $lang); ?></h1>
        <p class="subtitle"><?php tp_e('subtitle', $DICT, $lang); ?></p>
      </div>
    </div>

    <div class="compare-controls" aria-label="Country comparison controls">
      <div class="field">
        <label class="label" for="countryA"><?php tp_e('country_a', $DICT, $lang); ?></label>
        <select id="countryA" name="a" aria-label="<?php echo htmlspecialchars(tp_t('country_a', $DICT, $lang), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
          <option value="" disabled <?php echo ($A === '') ? 'selected' : ''; ?>><?php tp_e('select_country', $DICT, $lang); ?></option>
          <?php foreach ($COUNTRIES as $code => $c): ?>
            <option value="<?php echo htmlspecialchars($code, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" <?php echo ($A === $code) ? 'selected' : ''; ?>>
              <?php echo htmlspecialchars($c['flag'].' '.$c['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="field">
        <label class="label" for="countryB"><?php tp_e('country_b', $DICT, $lang); ?></label>
        <select id="countryB" name="b" aria-label="<?php echo htmlspecialchars(tp_t('country_b', $DICT, $lang), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
          <option value="" disabled <?php echo ($B === '') ? 'selected' : ''; ?>><?php tp_e('select_country', $DICT, $lang); ?></option>
          <?php foreach ($COUNTRIES as $code => $c): ?>
            <option value="<?php echo htmlspecialchars($code, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" <?php echo ($B === $code) ? 'selected' : ''; ?>>
              <?php echo htmlspecialchars($c['flag'].' '.$c['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>

    <div class="error" id="sameCountryError" role="alert"><?php tp_e('same_country_error', $DICT, $lang); ?></div>

    <div class="grid is-hidden" id="compareCards" style="margin-top:12px">
      <section class="card" aria-label="Country A summary">
        <h2 id="cardATitle"></h2>
        <div class="muted" id="cardASub"></div>
      </section>

      <section class="card" aria-label="Country B summary">
        <h2 id="cardBTitle"></h2>
        <div class="muted" id="cardBSub"></div>
      </section>
    </div>

    <div class="table-wrap is-hidden" id="compareTable" style="margin-top:12px" aria-label="Comparison table">
      <table>
        <thead>
          <tr>
            <th><?php tp_e('table_indicator', $DICT, $lang); ?></th>
            <th class="num" id="thA"><?php tp_e('table_a', $DICT, $lang); ?></th>
            <th class="num" id="thB"><?php tp_e('table_b', $DICT, $lang); ?></th>
          </tr>
        </thead>
        <tbody id="rows"></tbody>
      </table>
    </div>

    <noscript>
      <p class="error" style="display:block"><?php tp_e('noscript', $DICT, $lang); ?></p>
    </noscript>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <script>
    (function () {
      "use strict";

      const lang = <?php echo json_encode($lang, JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT); ?>;

      const DICT = <?php echo json_encode($DICT, JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT); ?>;
      const METRICS = <?php echo json_encode($METRICS, JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT); ?>;
      const COUNTRIES = <?php echo json_encode($COUNTRIES, JSON_HEX_TAG|JSON_HEX_AMP|JSON_HEX_APOS|JSON_HEX_QUOT); ?>;

      const elA = document.getElementById("countryA");
      const elB = document.getElementById("countryB");
      const errSame = document.getElementById("sameCountryError");
      const rows = document.getElementById("rows");

      const cardsWrap = document.getElementById("compareCards");
      const tableWrap = document.getElementById("compareTable");
      const noteWrap = document.getElementById("compareNote");

      const cardATitle = document.getElementById("cardATitle");
      const cardBTitle = document.getElementById("cardBTitle");
      const cardASub = document.getElementById("cardASub");
      const cardBSub = document.getElementById("cardBSub");

      const thA = document.getElementById("thA");
      const thB = document.getElementById("thB");

      function t(key){
        return (DICT[lang] && DICT[lang][key]) || (DICT.it && DICT.it[key]) || key;
      }

      function setVisible(el, on){
        if (!el) return;
        el.classList.toggle("is-hidden", !on);
      }

      function fmt(val, fmtKey, unitKey){
        if (val === null || val === undefined) return t("nodata");

        // metriche testuali (es. valuta)
        if (fmtKey === "text") return String(val);

        const unit = t(unitKey);
        const n = Number(val);
        if (Number.isNaN(n)) return t("nodata");

        if (fmtKey === "pct1") return n.toFixed(1) + " " + unit;
        if (fmtKey === "pct1signed") return (n > 0 ? "+" : "") + n.toFixed(1) + " " + unit;
        if (fmtKey === "eur0") {
          // Formattazione semplice locale
          const s = new Intl.NumberFormat(
            lang === "en" ? "en-GB" : "it-IT",
            { maximumFractionDigits: 0 }
          ).format(n);
          return s + " " + unit;
        }
        return String(n) + " " + unit;
      }

      function getMetric(countryCode, key){
        const c = COUNTRIES[countryCode];
        if (!c || !c.metrics) return null;
        const v = c.metrics[key];
        return (v === undefined) ? null : v;
      }

      function setUrlParams(a, b){
        const url = new URL(window.location.href);
        if (a) url.searchParams.set("a", a); else url.searchParams.delete("a");
        if (b) url.searchParams.set("b", b); else url.searchParams.delete("b");
        window.history.replaceState({}, "", url.toString());
      }

      function hideAll(){
        errSame.style.display = "none";
        rows.innerHTML = "";
        setVisible(cardsWrap, false);
        setVisible(tableWrap, false);
        setVisible(noteWrap, false);
      }

      function render(){
        const a = (elA && elA.value) ? String(elA.value) : "";
        const b = (elB && elB.value) ? String(elB.value) : "";

        // Finché non vengono selezionati entrambi i paesi, non mostrare nulla sotto i selettori
        if (!a || !b) {
          hideAll();
          setUrlParams(a, b);
          return;
        }

        if (a === b) {
          hideAll();
          errSame.style.display = "block";
          setUrlParams(a, b);
          return;
        }

        const ca = COUNTRIES[a];
        const cb = COUNTRIES[b];

        // Mostra output
        setVisible(cardsWrap, true);
        setVisible(tableWrap, true);
        setVisible(noteWrap, true);
        errSame.style.display = "none";

        // Card + intestazioni tabella
        cardATitle.textContent = (ca ? (ca.flag + " " + ca.name) : a);
        cardBTitle.textContent = (cb ? (cb.flag + " " + cb.name) : b);

        cardASub.textContent = t("note");
        cardBSub.textContent = t("note");

        thA.textContent = ca ? ca.name : t("table_a");
        thB.textContent = cb ? cb.name : t("table_b");

        // Righe
        const frag = document.createDocumentFragment();

        METRICS.forEach(m => {
          const tr = document.createElement("tr");

          const tdLabel = document.createElement("td");
          const unitLabel = t(m.unit_key);
          tdLabel.textContent = unitLabel
            ? t(m.label_key) + " (" + unitLabel + ")"
            : t(m.label_key);
          tr.appendChild(tdLabel);

          const va = getMetric(a, m.key);
          const vb = getMetric(b, m.key);

          const tdA = document.createElement("td");
          tdA.className = "num";
          tdA.textContent = fmt(va, m.fmt, m.unit_key);
          tr.appendChild(tdA);

          const tdB = document.createElement("td");
          tdB.className = "num";
          tdB.textContent = fmt(vb, m.fmt, m.unit_key);
          tr.appendChild(tdB);

          frag.appendChild(tr);
        });

        rows.innerHTML = "";
        rows.appendChild(frag);

        setUrlParams(a, b);
      }

      elA && elA.addEventListener("change", render);
      elB && elB.addEventListener("change", render);

      // Render iniziale
      render();
    })();
  </script>
</body>
</html>
