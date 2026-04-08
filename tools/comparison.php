<?php
declare(strict_types=1);

require_once __DIR__ . '/../i18n/i18n.php';

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

$lang = function_exists('tp_lang') ? tp_lang() : 'it';

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
    'noscript' => 'Per usare il confronto, abilita JavaScript.',
    'country_a_summary' => 'Riepilogo Paese 1',
    'country_b_summary' => 'Riepilogo Paese 2',
    'comparison_table_aria' => 'Tabella comparativa',
    'flag_of' => 'Bandiera di',
    'politiche_economiche' => 'Politiche economiche',
    'protezione_sociale' => 'Protezione sociale',
    'pubblica_amministrazione' => 'Pubblica amministrazione',
    'sanita' => 'Sanità',
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
    'noscript' => 'To use the comparison, please enable JavaScript.',
    'country_a_summary' => 'Country 1 summary',
    'country_b_summary' => 'Country 2 summary',
    'comparison_table_aria' => 'Comparison table',
    'flag_of' => 'Flag of',
    'politiche_economiche' => 'Economic policies',
    'protezione_sociale' => 'Social protection',
    'pubblica_amministrazione' => 'Public administration',
    'sanita' => 'Healthcare',
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

$comparisonData = require __DIR__ . '/comparison_data.php';
$rawMetrics = isset($comparisonData['metrics']) && is_array($comparisonData['metrics']) ? $comparisonData['metrics'] : [];
$rawCountries = isset($comparisonData['countries']) && is_array($comparisonData['countries']) ? $comparisonData['countries'] : [];

$metrics = [];
foreach ($rawMetrics as $metric) {
  if (!is_array($metric) || empty($metric['key'])) continue;
  $metrics[] = $metric;
}

$countries = [];
foreach ($rawCountries as $code => $country) {
  if (!is_array($country)) continue;

  $isoCode = strtoupper((string)$code);
  $nameKey = ($lang === 'en') ? 'name_en' : 'name_it';
  $name = isset($country[$nameKey]) ? (string)$country[$nameKey] : $isoCode;

  $countries[$isoCode] = [
    'code' => $isoCode,
    'name' => $name,
    'flag_path' => isset($country['flag_path']) ? (string)$country['flag_path'] : '',
    'metrics' => isset($country['metrics']) && is_array($country['metrics']) ? $country['metrics'] : [],
  ];
}

$allowed = array_keys($countries);

$A = isset($_GET['a']) ? strtoupper((string)$_GET['a']) : '';
$B = isset($_GET['b']) ? strtoupper((string)$_GET['b']) : '';
if ($A !== '' && !in_array($A, $allowed, true)) $A = '';
if ($B !== '' && !in_array($B, $allowed, true)) $B = '';

$bootstrap = [
  'lang' => $lang,
  'dict' => $DICT,
  'metrics' => $metrics,
  'countries' => $countries,
  'initial' => [
    'a' => $A,
    'b' => $B,
  ],
];
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
  <link rel="stylesheet" href="/tools/stylecomparison.css" />
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
        <label class="label" id="countryALabel" for="countryA"><?php tp_e('country_a', $DICT, $lang); ?></label>
        <div class="custom-select" data-custom-select>
          <select
            id="countryA"
            class="comparison-native-select"
            name="a"
            aria-labelledby="countryALabel"
          >
            <option value="" disabled <?php echo ($A === '') ? 'selected' : ''; ?>><?php tp_e('select_country', $DICT, $lang); ?></option>
            <?php foreach ($countries as $code => $country): ?>
              <option value="<?php echo htmlspecialchars($code, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" <?php echo ($A === $code) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($country['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="field">
        <label class="label" id="countryBLabel" for="countryB"><?php tp_e('country_b', $DICT, $lang); ?></label>
        <div class="custom-select" data-custom-select>
          <select
            id="countryB"
            class="comparison-native-select"
            name="b"
            aria-labelledby="countryBLabel"
          >
            <option value="" disabled <?php echo ($B === '') ? 'selected' : ''; ?>><?php tp_e('select_country', $DICT, $lang); ?></option>
            <?php foreach ($countries as $code => $country): ?>
              <option value="<?php echo htmlspecialchars($code, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>" <?php echo ($B === $code) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($country['name'], ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>
    </div>

    <div class="error" id="sameCountryError" role="alert"><?php tp_e('same_country_error', $DICT, $lang); ?></div>

    <div class="grid is-hidden" id="compareCards">
      <section class="card" aria-label="<?php echo htmlspecialchars(tp_t('country_a_summary', $DICT, $lang), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
        <div class="country-summary">
          <div class="country-summary-flag" id="cardAFlag" aria-hidden="true"></div>
          <div class="country-summary-text">
            <h2 id="cardATitle"></h2>
            <div class="muted" id="cardASub"></div>
          </div>
        </div>
      </section>

      <section class="card" aria-label="<?php echo htmlspecialchars(tp_t('country_b_summary', $DICT, $lang), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
        <div class="country-summary">
          <div class="country-summary-flag" id="cardBFlag" aria-hidden="true"></div>
          <div class="country-summary-text">
            <h2 id="cardBTitle"></h2>
            <div class="muted" id="cardBSub"></div>
          </div>
        </div>
      </section>
    </div>

    <div class="table-wrap is-hidden" id="compareTable" aria-label="<?php echo htmlspecialchars(tp_t('comparison_table_aria', $DICT, $lang), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
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
      <p class="error error-noscript"><?php tp_e('noscript', $DICT, $lang); ?></p>
    </noscript>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <script type="application/json" id="comparison-bootstrap"><?php
    echo json_encode($bootstrap, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
  ?></script>
  <script defer src="/tools/comparison.js"></script>
</body>
</html>
