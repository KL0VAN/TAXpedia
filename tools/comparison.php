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
$lang = $lang === 'en' ? 'en' : 'it';

$DICT = [
  'it' => [
    'flat_taxation' => 'Aliquota unica',
    'reference_period' => 'Riferimento',
    'verified_on' => 'Verificato al',
    'source' => 'Fonte',
    'methodology' => 'Definizione e fonti',
    'provisional' => 'Dato provvisorio',
    'not_comparable' => 'Non disponibile nella serie comparabile',
    'missing_value' => 'Dato non disponibile',
    'no_spending' => 'La composizione della spesa pubblica non è disponibile per questi paesi.',
    'partial_spending' => 'Copertura parziale: i dati mancanti non indicano una spesa pari a zero. Periodi e classificazioni della spesa possono differire tra paesi.',
    'controls' => 'Selezione dei paesi da confrontare',
    'salary_note' => 'Retribuzione lorda annua equivalente a tempo pieno, in euro nominali. Non misura il potere d’acquisto.',
    'tax_note' => 'Struttura ordinaria dell’imposta sul reddito da lavoro dei residenti; non indica il carico fiscale effettivo.',
    'currency_note' => 'Valuta in uso alla data di verifica.',
    'salary_sources_note' => 'Serie Eurostat 2024, consultata anche nelle ripubblicazioni DBnomics e Visual Capitalist/Voronoi.',

    'title' => 'Confronta i Paesi',
    'subtitle' => 'Seleziona fino a 2 paesi e confronta gli indicatori.',
    'selector_title' => 'Scegli i paesi da confrontare',
    'selector_hint' => 'Il confronto si aggiorna automaticamente dopo la seconda selezione.',
    'select_country' => 'Seleziona stato',
    'country_a' => 'Paese 1',
    'country_b' => 'Paese 2',
    'note' => 'Gli anni di riferimento possono variare per indicatore.',
    'overview_title' => 'Indicatori economici e fiscali',
    'overview_intro' => 'Sei indicatori per confrontare i 27 paesi UE. Periodi, definizioni e fonti sono indicati in ogni scheda.',
    'spending_title' => 'Composizione della spesa pubblica',
    'spending_intro' => 'Le barre rappresentano la quota percentuale attribuita a ciascuna voce di spesa.',
    'versus' => 'VS',
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
    'reddito_medio' => 'Stipendio medio lordo',
    'inflation_rate' => 'Tasso di inflazione',
    'taxation_type' => 'Tipo di tassazione',
    'progressive_taxation' => 'Progressiva',
    'proportional_taxation' => 'Proporzionale',
    'mixed_taxation' => 'Mista',
    'debt_gdp' => 'Debito/PIL',
    'unemployment_rate' => 'Tasso di disoccupazione',
    'unit_pct' => '%',
    'unit_eur_year' => '€/anno',
  ],
  'en' => [
    'flat_taxation' => 'Flat rate',
    'reference_period' => 'Reference period',
    'verified_on' => 'Checked on',
    'source' => 'Source',
    'methodology' => 'Definition and sources',
    'provisional' => 'Provisional data',
    'not_comparable' => 'Unavailable in the comparable series',
    'missing_value' => 'Data unavailable',
    'no_spending' => 'Public spending composition is not available for these countries.',
    'partial_spending' => 'Partial coverage: missing data do not mean zero spending. Spending periods and classifications may differ between countries.',
    'controls' => 'Country comparison controls',
    'salary_note' => 'Full-time adjusted gross annual salary, in nominal euros. Does not measure purchasing power.',
    'tax_note' => 'Standard tax structure for residents’ employment income; does not indicate the effective tax burden.',
    'currency_note' => 'Currency in use on the verification date.',
    'salary_sources_note' => 'Eurostat 2024 series, also consulted through DBnomics and Visual Capitalist/Voronoi republications.',

    'title' => 'Compare Countries',
    'subtitle' => 'Select up to 2 countries and compare key indicators.',
    'selector_title' => 'Choose the countries to compare',
    'selector_hint' => 'The comparison updates automatically after the second selection.',
    'select_country' => 'Select country',
    'country_a' => 'Country 1',
    'country_b' => 'Country 2',
    'note' => 'Reference years may vary by indicator.',
    'overview_title' => 'Economic and tax indicators',
    'overview_intro' => 'Six indicators across the 27 EU countries. Each card includes reference periods, definitions and sources.',
    'spending_title' => 'Public spending composition',
    'spending_intro' => 'The bars show the percentage allocated to each spending category.',
    'versus' => 'VS',
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
    'reddito_medio' => 'Average gross salary',
    'inflation_rate' => 'Inflation rate',
    'taxation_type' => 'Type of taxation',
    'progressive_taxation' => 'Progressive',
    'proportional_taxation' => 'Proportional',
    'mixed_taxation' => 'Mixed',
    'debt_gdp' => 'Debt/GDP',
    'unemployment_rate' => 'Unemployment rate',
    'unit_pct' => '%',
    'unit_eur_year' => '€/year',
  ],
];

$countryData = require __DIR__ . '/country_data.php';
$comparisonDataPath = __DIR__ . '/comparison_data.php';
$localComparisonData = is_file($comparisonDataPath) ? require $comparisonDataPath : [];

$countryMetrics = isset($countryData['metrics']) && is_array($countryData['metrics']) ? $countryData['metrics'] : [];
$comparisonMetrics = isset($localComparisonData['metrics']) && is_array($localComparisonData['metrics'])
  ? $localComparisonData['metrics']
  : $countryMetrics;
$rawCountries = isset($countryData['countries']) && is_array($countryData['countries']) ? $countryData['countries'] : [];
$comparisonCountries = isset($localComparisonData['countries']) && is_array($localComparisonData['countries'])
  ? $localComparisonData['countries']
  : $rawCountries;

$overviewKeys = ['valuta', 'reddito_medio', 'inflation_rate', 'taxation_type', 'debt_gdp', 'unemployment_rate'];
$overviewMetrics = [];
foreach ($countryMetrics as $metric) {
  if (!is_array($metric) || empty($metric['key'])) continue;
  if (in_array((string)$metric['key'], $overviewKeys, true)) {
    $overviewMetrics[] = $metric;
  }
}

$spendingMetrics = [];
foreach ($comparisonMetrics as $metric) {
  if (!is_array($metric) || empty($metric['key'])) continue;
  if (!in_array((string)$metric['key'], $overviewKeys, true)) {
    $spendingMetrics[] = $metric;
  }
}

$countries = [];
foreach ($rawCountries as $code => $country) {
  if (!is_array($country)) continue;

  $isoCode = strtoupper((string)$code);
  $nameKey = ($lang === 'en') ? 'name_en' : 'name_it';
  $name = isset($country[$nameKey]) ? (string)$country[$nameKey] : $isoCode;
  $sharedValues = isset($country['metrics']) && is_array($country['metrics']) ? $country['metrics'] : [];
  $localCountry = isset($comparisonCountries[$isoCode]) && is_array($comparisonCountries[$isoCode])
    ? $comparisonCountries[$isoCode]
    : [];
  $localValues = isset($localCountry['metrics']) && is_array($localCountry['metrics'])
    ? $localCountry['metrics']
    : $localCountry;
  foreach ($overviewKeys as $sharedKey) {
    unset($localValues[$sharedKey]);
  }

  $flagPath = isset($country['flag_path']) ? (string)$country['flag_path'] : '';
  if ($flagPath !== '' && substr($flagPath, 0, 1) === '/' && !is_file(rtrim((string)($_SERVER['DOCUMENT_ROOT'] ?? ''), '/') . $flagPath)) {
    $flagPath = ''; // Render the ISO code when the local image is unavailable.
  }

  $countries[$isoCode] = [
    'code' => $isoCode,
    'name' => $name,
    'flag_path' => $flagPath,
    'metric_meta' => $country['metric_meta'] ?? [],
    'metrics' => array_merge($sharedValues, $localValues),
  ];
}

$allowed = array_keys($countries);

$A = isset($_GET['a']) && is_string($_GET['a']) ? strtoupper((string)$_GET['a']) : '';
$B = isset($_GET['b']) && is_string($_GET['b']) ? strtoupper((string)$_GET['b']) : '';
if ($A !== '' && !in_array($A, $allowed, true)) $A = '';
if ($B !== '' && !in_array($B, $allowed, true)) $B = '';

$bootstrap = [
  'metricMetadata' => $countryData['metric_metadata'] ?? [],
  'sources' => $countryData['sources'] ?? [],
  'valueLabels' => $countryData['value_labels'] ?? [],
  'lang' => $lang,
  'dict' => $DICT,
  'overviewMetrics' => $overviewMetrics,
  'spendingMetrics' => $spendingMetrics,
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
  <link rel="stylesheet" href="./stylecomparison.css?v=<?php echo (int)filemtime(__DIR__ . '/stylecomparison.css'); ?>" />
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

    <section class="selector-panel" aria-labelledby="selectorTitle">
      <div class="selector-panel-heading">
        <h2 id="selectorTitle"><?php tp_e('selector_title', $DICT, $lang); ?></h2>
        <p><?php tp_e('selector_hint', $DICT, $lang); ?></p>
      </div>

      <div class="compare-controls" aria-label="<?php tp_e('controls', $DICT, $lang); ?>">
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

      <div class="versus-badge" aria-hidden="true"><?php tp_e('versus', $DICT, $lang); ?></div>

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
    </section>

    <div class="error" id="sameCountryError" role="alert"><?php tp_e('same_country_error', $DICT, $lang); ?></div>

    <section class="comparison-results is-hidden" id="comparisonResults" aria-live="polite">
      <div class="country-banner-grid" id="compareCards">
      <article class="country-banner country-banner-a" aria-label="<?php echo htmlspecialchars(tp_t('country_a_summary', $DICT, $lang), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
        <div class="country-summary">
          <div class="country-summary-flag" id="cardAFlag" aria-hidden="true"></div>
          <div class="country-summary-text">
            <h2 id="cardATitle"></h2>
            <div class="muted" id="cardASub"></div>
          </div>
        </div>
      </article>

      <div class="results-versus" aria-hidden="true"><?php tp_e('versus', $DICT, $lang); ?></div>

      <article class="country-banner country-banner-b" aria-label="<?php echo htmlspecialchars(tp_t('country_b_summary', $DICT, $lang), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
        <div class="country-summary">
          <div class="country-summary-flag" id="cardBFlag" aria-hidden="true"></div>
          <div class="country-summary-text">
            <h2 id="cardBTitle"></h2>
            <div class="muted" id="cardBSub"></div>
          </div>
        </div>
      </article>
      </div>

      <section class="comparison-section overview-section" aria-labelledby="overviewTitle">
        <div class="section-heading">
          <span class="section-kicker">01</span>
          <div>
            <h2 id="overviewTitle"><?php tp_e('overview_title', $DICT, $lang); ?></h2>
            <p><?php tp_e('overview_intro', $DICT, $lang); ?></p>
          </div>
        </div>
        <div class="metric-grid" id="overviewGrid"></div>
      </section>

      <section class="comparison-section spending-section" id="spendingSection" aria-labelledby="spendingTitle">
        <div class="section-heading">
          <span class="section-kicker">02</span>
          <div>
            <h2 id="spendingTitle"><?php tp_e('spending_title', $DICT, $lang); ?></h2>
            <p><?php tp_e('spending_intro', $DICT, $lang); ?></p>
          </div>
        </div>
        <div class="spending-legend" id="spendingLegend"></div>
        <div class="spending-list" id="spendingRows"></div>
        <p class="data-note" id="spendingAvailability"></p>
        <p class="data-note"><?php tp_e('note', $DICT, $lang); ?></p>
      </section>
    </section>

    <noscript>
      <p class="error error-noscript"><?php tp_e('noscript', $DICT, $lang); ?></p>
    </noscript>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <script type="application/json" id="comparison-bootstrap"><?php
    echo json_encode($bootstrap, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
  ?></script>
  <script defer src="./comparison.js?v=<?php echo (int)filemtime(__DIR__ . '/comparison.js'); ?>"></script>
</body>
</html>
