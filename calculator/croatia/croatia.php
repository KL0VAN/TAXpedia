<?php
/**
 * NOTE (futuro):
 * - Se un domani vuoi tradurre anche testi generati via JS (legende/settori/chart),
 *   conviene spostare le stringhe in un oggetto JS alimentato da PHP (data-* o window.__I18N__).
 */

if (!function_exists('hrlp_get_lang')) {
  function hrlp_get_lang(): string {
    $lang = 'it';
    if (isset($_GET['lang'])) {
      $lang = strtolower(trim((string) $_GET['lang']));
    } elseif (isset($_COOKIE['tp_lang'])) {
      $lang = strtolower(trim((string) $_COOKIE['tp_lang']));
    }
    return in_array($lang, array('it','en'), true) ? $lang : 'it';
  }
}
$HRLP_LANG = hrlp_get_lang();

if (!function_exists('hrlp_h')) {
  function hrlp_h($s): string { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}

$HRLP_I18N = array(
  'it' => array(
    'title' => "Dove vanno le tue tasse? — TAXpedia",
    'meta_desc' => "Inserisci il tuo reddito e scopri come lo Stato utilizza i tuoi contributi.",
    'h1' => "Come spende la Croazia le tasse dei cittadini?",
    'subtitle' => "Inserisci il tuo reddito e scopri come lo Stato utilizza i tuoi contributi.",

    // CTA / form
    'btn_start' => "Calcola",

    // Slide 2
    'map_title' => "Seleziona la tua Regione",
    'map_hint'  => "Clicca una regione sulla mappa per proseguire.",

    // Slide 3
    'calc_title' => "Calcolatore",
    'calc_hint'  => "Inserisci il reddito: i risultati si aggiornano automaticamente.",

    // Input
    'label_income' => "Reddito lordo (€)",
    'income_ph' => "es. 25.000",
    'income_aria' => "Inserisci il tuo reddito lordo in euro",

    // Region UI
    'region_prefix' => "Regione:",
    'region_none' => "—",
    'region_aria' => "Regione selezionata (hidden)",

    // Disclaimer
    'help_pre' => "Consulta il ",
    'help_link' => "disclaimer",
    'help_post' => " per maggiori informazioni.",
    'help_link_aria' => "Apri il disclaimer in una nuova finestra",

    // Results
    'results_h2_pre' => "Hai versato circa ",
    'results_h2_post' => " in tasse",
    'results_note' => "Tocca i singoli settori per leggere gli approfondimenti.",

    'box_it_title' => "Spesa nazionale",
    'box_it_amount' => "Tasse nazionali stimate:",
    'legend_it_aria' => "Dettaglio (Croazia)",
    'legend_title' => "Settore — Importo ",
    'legend_subtle_it' => "(Croazia)",
    'legend_note' => "Clicca per aprire dettagli. Hover per evidenziare la fetta.",
    'chart_it_aria' => "Grafico ripartizione Croazia",
    'explain_it' => "Tocca sul grafico per i dettagli.",

    'comparison_btn' => "Confronta i dati con altri paesi europei",

    'box_ue_title' => "Spesa europea",
    'box_ue_desc' => "Distribuzione del contributo croato al bilancio dell'Unione Europea.",
    'legend_ue_aria' => "Dettaglio (UE)",
    'legend_subtle_ue' => "(UE)",
    'chart_ue_aria' => "Grafico contributo bilancio UE",
    'explain_ue' => "Tocca sul grafico per i dettagli.",

    'box_reg_title' => "Spesa regione ",
    'box_reg_amount' => "Addizionale regionale stimata:",
    'box_reg_soon' => "Ripartizione del bilancio regionale presto disponibile.",

    'sources' => "Fonti",
  ),

  'en' => array(
    'title' => "Where do your taxes go? — TAXpedia",
    'meta_desc' => "Enter your income and see how the State allocates your contributions.",
    'h1' => "How does Croatia spend taxpayers’ money?",
    'subtitle' => "Enter your income and see how the State allocates your contributions.",

    'btn_start' => "Calculate",

    'map_title' => "Select your Region",
    'map_hint'  => "Click a region on the map to continue.",

    'calc_title' => "Calculator",
    'calc_hint'  => "Enter income: results update automatically.",

    'label_income' => "Gross income (€)",
    'income_ph' => "e.g. 25.000",
    'income_aria' => "Enter your gross income in euros",

    'region_prefix' => "Region:",
    'region_none' => "—",
    'region_aria' => "Selected region (hidden)",

    'help_pre' => "See the ",
    'help_link' => "disclaimer",
    'help_post' => " for more information.",
    'help_link_aria' => "Open the disclaimer in a new window",

    'results_h2_pre' => "You have paid approximately ",
    'results_h2_post' => " in taxes",
    'results_note' => "Tap individual sectors to read the detailed notes.",

    'box_it_title' => "National expenditure",
    'box_it_amount' => "Estimated national taxes:",
    'legend_it_aria' => "Breakdown (Croatia)",
    'legend_title' => "Sector — Amount ",
    'legend_subtle_it' => "(Croatia)",
    'legend_note' => "Click to open details. Hover to highlight the slice.",
    'chart_it_aria' => "Croatia allocation chart",
    'explain_it' => "Tap the chart for details.",

    'comparison_btn' => "Compare data with other European countries",

    'box_ue_title' => "European expenditure",
    'box_ue_desc' => "Allocation of Croatia’s contribution to the European Union budget.",
    'legend_ue_aria' => "Breakdown (EU)",
    'legend_subtle_ue' => "(EU)",
    'chart_ue_aria' => "EU contribution chart",
    'explain_ue' => "Tap the chart for details.",

    'box_reg_title' => "Regional expenditure ",
    'box_reg_amount' => "Estimated regional surtax:",
    'box_reg_soon' => "Regional budget breakdown coming soon.",

    'sources' => "Sources",
  ),
);

if (!function_exists('hrlp_t')) {
  function hrlp_t(string $key): string {
    global $HRLP_LANG, $HRLP_I18N;
    if (isset($HRLP_I18N[$HRLP_LANG][$key])) return (string)$HRLP_I18N[$HRLP_LANG][$key];
    if (isset($HRLP_I18N['it'][$key])) return (string)$HRLP_I18N['it'][$key];
    return '';
  }
}
if (!function_exists('hrlp_e')) {
  function hrlp_e(string $key): string { return hrlp_h(hrlp_t($key)); }
}

/**
 * IMPORTANTISSIMO:
 * - Questi VALUE devono matchare ESATTAMENTE le chiavi di REGIONAL_RATES in calculatorCroatia.js
 */
$HR_REGION_OPTIONS = array(
  "Contea di Zagabria (Zagrebačka županija)" => array('it' => "Contea di Zagabria (Zagrebačka županija)", 'en' => "Zagreb County (Zagrebačka županija)"),
  "Contea di Krapina-Zagorje (Krapinsko-zagorska županija)" => array('it' => "Contea di Krapina-Zagorje (Krapinsko-zagorska županija)", 'en' => "Krapina-Zagorje County (Krapinsko-zagorska županija)"),
  "Contea di Sisak-Moslavina (Sisačko-moslavačka županija)" => array('it' => "Contea di Sisak-Moslavina (Sisačko-moslavačka županija)", 'en' => "Sisak-Moslavina County (Sisačko-moslavačka županija)"),
  "Contea di Karlovac (Karlovačka županija)" => array('it' => "Contea di Karlovac (Karlovačka županija)", 'en' => "Karlovac County (Karlovačka županija)"),
  "Contea di Varaždin (Varaždinska županija)" => array('it' => "Contea di Varaždin (Varaždinska županija)", 'en' => "Varaždin County (Varaždinska županija)"),
  "Contea di Koprivnica-Križevci (Koprivničko-križevačka županija)" => array('it' => "Contea di Koprivnica-Križevci (Koprivničko-križevačka županija)", 'en' => "Koprivnica-Križevci County (Koprivničko-križevačka županija)"),
  "Contea di Bjelovar-Bilogora (Bjelovarsko-bilogorska županija)" => array('it' => "Contea di Bjelovar-Bilogora (Bjelovarsko-bilogorska županija)", 'en' => "Bjelovar-Bilogora County (Bjelovarsko-bilogorska županija)"),
  "Contea del Litoraneo-montana (Primorsko-goranska županija)" => array('it' => "Contea del Litoraneo-montana (Primorsko-goranska županija)", 'en' => "Primorje-Gorski Kotar County (Primorsko-goranska županija)"),
  "Contea di Lika-Senj (Ličko-senjska županija)" => array('it' => "Contea di Lika-Senj (Ličko-senjska županija)", 'en' => "Lika-Senj County (Ličko-senjska županija)"),
  "Contea di Virovitica-Podravina (Virovitičko-podravska županija)" => array('it' => "Contea di Virovitica-Podravina (Virovitičko-podravska županija)", 'en' => "Virovitica-Podravina County (Virovitičko-podravska županija)"),
  "Contea di Požega-Slavonia (Požeško-slavonska županija)" => array('it' => "Contea di Požega-Slavonia (Požeško-slavonska županija)", 'en' => "Požega-Slavonia County (Požeško-slavonska županija)"),
  "Contea di Brod-Posavina (Brodsko-posavska županija)" => array('it' => "Contea di Brod-Posavina (Brodsko-posavska županija)", 'en' => "Brod-Posavina County (Brodsko-posavska županija)"),
  "Contea di Zara (Zadarska županija)" => array('it' => "Contea di Zara (Zadarska županija)", 'en' => "Zadar County (Zadarska županija)"),
  "Contea di Osijek-Baranja (Osječko-baranjska županija)" => array('it' => "Contea di Osijek-Baranja (Osječko-baranjska županija)", 'en' => "Osijek-Baranja County (Osječko-baranjska županija)"),
  "Contea di Šibenik-Knin (Šibensko-kninska županija)" => array('it' => "Contea di Šibenik-Knin (Šibensko-kninska županija)", 'en' => "Šibenik-Knin County (Šibensko-kninska županija)"),
  "Contea di Vukovar-Srijem (Vukovarsko-srijemska županija)" => array('it' => "Contea di Vukovar-Srijem (Vukovarsko-srijemska županija)", 'en' => "Vukovar-Srijem County (Vukovarsko-srijemska županija)"),
  "Contea di Spalato-Dalmazia (Splitsko-dalmatinska županija)" => array('it' => "Contea di Spalato-Dalmazia (Splitsko-dalmatinska županija)", 'en' => "Split-Dalmatia County (Splitsko-dalmatinska županija)"),
  "Istria (Istarska županija)" => array('it' => "Istria (Istarska županija)", 'en' => "Istria (Istarska županija)"),
  "Contea di Dubrovnik-Neretva (Dubrovačko-neretvanska županija)" => array('it' => "Contea di Dubrovnik-Neretva (Dubrovačko-neretvanska županija)", 'en' => "Dubrovnik-Neretva County (Dubrovačko-neretvanska županija)"),
  "Contea di Međimurje (Međimurska županija)" => array('it' => "Contea di Međimurje (Međimurska županija)", 'en' => "Međimurje County (Međimurska županija)"),
  "Città di Zagabria (Grad Zagreb)" => array('it' => "Città di Zagabria (Grad Zagreb)", 'en' => "City of Zagreb (Grad Zagreb)"),
);

/* =========================
   SVG INLINE (prepare in PHP)
   ========================= */
$svgFile = __DIR__ . '/CROATIA SVG/croatiaHigh.svg';

/**
 * Mappa ISO -> value (chiave calcolatore)
 * id originali nello SVG: HR-01 ... HR-21
 */
$REGIONS_HR = array(
  'HR-01' => array('slug'=>'zagreb-county',       'code'=>'HR-01', 'value'=>"Contea di Zagabria (Zagrebačka županija)"),
  'HR-02' => array('slug'=>'krapina-zagorje',     'code'=>'HR-02', 'value'=>"Contea di Krapina-Zagorje (Krapinsko-zagorska županija)"),
  'HR-03' => array('slug'=>'sisak-moslavina',     'code'=>'HR-03', 'value'=>"Contea di Sisak-Moslavina (Sisačko-moslavačka županija)"),
  'HR-04' => array('slug'=>'karlovac',            'code'=>'HR-04', 'value'=>"Contea di Karlovac (Karlovačka županija)"),
  'HR-05' => array('slug'=>'varazdin',            'code'=>'HR-05', 'value'=>"Contea di Varaždin (Varaždinska županija)"),
  'HR-06' => array('slug'=>'koprivnica-krizevci', 'code'=>'HR-06', 'value'=>"Contea di Koprivnica-Križevci (Koprivničko-križevačka županija)"),
  'HR-07' => array('slug'=>'bjelovar-bilogora',   'code'=>'HR-07', 'value'=>"Contea di Bjelovar-Bilogora (Bjelovarsko-bilogorska županija)"),
  'HR-08' => array('slug'=>'primorje-gorski',     'code'=>'HR-08', 'value'=>"Contea del Litoraneo-montana (Primorsko-goranska županija)"),
  'HR-09' => array('slug'=>'lika-senj',           'code'=>'HR-09', 'value'=>"Contea di Lika-Senj (Ličko-senjska županija)"),
  'HR-10' => array('slug'=>'virovitica-podravina','code'=>'HR-10', 'value'=>"Contea di Virovitica-Podravina (Virovitičko-podravska županija)"),
  'HR-11' => array('slug'=>'pozega-slavonia',     'code'=>'HR-11', 'value'=>"Contea di Požega-Slavonia (Požeško-slavonska županija)"),
  'HR-12' => array('slug'=>'brod-posavina',       'code'=>'HR-12', 'value'=>"Contea di Brod-Posavina (Brodsko-posavska županija)"),
  'HR-13' => array('slug'=>'zadar',               'code'=>'HR-13', 'value'=>"Contea di Zara (Zadarska županija)"),
  'HR-14' => array('slug'=>'osijek-baranja',      'code'=>'HR-14', 'value'=>"Contea di Osijek-Baranja (Osječko-baranjska županija)"),
  'HR-15' => array('slug'=>'sibenik-knin',        'code'=>'HR-15', 'value'=>"Contea di Šibenik-Knin (Šibensko-kninska županija)"),
  'HR-16' => array('slug'=>'vukovar-srijem',      'code'=>'HR-16', 'value'=>"Contea di Vukovar-Srijem (Vukovarsko-srijemska županija)"),
  'HR-17' => array('slug'=>'split-dalmatia',      'code'=>'HR-17', 'value'=>"Contea di Spalato-Dalmazia (Splitsko-dalmatinska županija)"),
  'HR-18' => array('slug'=>'istria',              'code'=>'HR-18', 'value'=>"Istria (Istarska županija)"),
  'HR-19' => array('slug'=>'dubrovnik-neretva',   'code'=>'HR-19', 'value'=>"Contea di Dubrovnik-Neretva (Dubrovačko-neretvanska županija)"),
  'HR-20' => array('slug'=>'medimurje',           'code'=>'HR-20', 'value'=>"Contea di Međimurje (Međimurska županija)"),
  'HR-21' => array('slug'=>'zagreb-city',         'code'=>'HR-21', 'value'=>"Città di Zagabria (Grad Zagreb)"),
);

function hrlp_load_and_prepare_svg(string $svgFile, array $regions, array $labelsByValue, string $lang): string {
  if (!is_file($svgFile)) {
    return '<!-- ERRORE: File SVG non trovato: ' . htmlspecialchars($svgFile, ENT_QUOTES, 'UTF-8') . ' -->';
  }

  $raw = file_get_contents($svgFile);
  if ($raw === false) {
    return '<!-- ERRORE: Impossibile leggere il file SVG -->';
  }

  // Rimuove BOM UTF-8 se presente
  $raw = preg_replace('/^\xEF\xBB\xBF/', '', $raw ?? '') ?? '';

  libxml_use_internal_errors(true);

  $doc = new DOMDocument();
  $doc->preserveWhiteSpace = false;
  $doc->formatOutput = false;

  if (!$doc->loadXML($raw)) {
    return '<!-- ERRORE: SVG non valido (XML parse error) -->';
  }

  $xpath = new DOMXPath($doc);
  $xpath->registerNamespace('svg', 'http://www.w3.org/2000/svg');

  /** @var DOMElement|null $svgEl */
  $svgEl = $doc->getElementsByTagName('svg')->item(0);
  if (!$svgEl) {
    return '<!-- ERRORE: Elemento <svg> non trovato -->';
  }

  // Root SVG: responsivo + accessibile
  $svgEl->setAttribute('class', 'tp-map');
  $svgEl->setAttribute('viewBox', '-8 -8 628 615');
  $svgEl->setAttribute('preserveAspectRatio', 'xMidYMid meet');
  $svgEl->setAttribute('role', 'img');
  $svgEl->setAttribute('aria-label', 'Mappa interattiva delle regioni croate');

  // Rimuove eventuali <style> interni nello SVG (CSS lo gestiamo fuori)
  foreach ($xpath->query('//svg:style') as $styleNode) {
    $styleNode->parentNode?->removeChild($styleNode);
  }

  // Normalizza i path regione: id + class + data-*
  $paths = $xpath->query('//svg:path');
  foreach ($paths as $p) {
    if (!($p instanceof DOMElement)) continue;

    $origId = $p->getAttribute('id');
    if (!isset($regions[$origId])) {
      $p->parentNode?->removeChild($p);
      continue;
    }

    $r = $regions[$origId];
    $value = $r['value'];
    $label = isset($labelsByValue[$value][$lang]) ? $labelsByValue[$value][$lang] : $value;

    $newId = 'region-' . $r['slug'];

    $p->setAttribute('id', $newId);
    $p->setAttribute('class', 'tp-region');

    // IMPORTANT: dataset usati in JS (tooltip + pill)
    $p->setAttribute('data-code', $r['code']);
    $p->setAttribute('data-value', $value);   // <-- CHIAVE calcolatore
    $p->setAttribute('data-name', $label);    // <-- UI (tradotta)

    $p->setAttribute('tabindex', '0');
    $p->setAttribute('role', 'button');
    $p->setAttribute('aria-label', $label . ' (' . $r['code'] . ')');
    $p->setAttribute('vector-effect', 'non-scaling-stroke');
    $p->setAttribute('title', $label);
  }

  return $doc->saveXML($svgEl) ?: '<!-- ERRORE: impossibile serializzare SVG -->';
}

$TP_CROATIA_SVG = hrlp_load_and_prepare_svg($svgFile, $REGIONS_HR, $HR_REGION_OPTIONS, $HRLP_LANG);?>
<!doctype html>
<html lang="<?php echo hrlp_h($HRLP_LANG); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo hrlp_e('title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png" />
  <meta name="description" content="<?php echo hrlp_e('meta_desc'); ?>" />

  <!-- Font identici alla home -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />

  <!-- Stili -->
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="../CalculatorStyle.css" />

  <!-- Chart.js UNA VOLTA SOLA -->
  <script defer src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

  <!-- Il tuo calcolatore legacy -->
  <script defer src="calculatorCroatia.js"></script>

  <style>

    body[data-step="1"] #slide-2,
    body[data-step="1"] #slide-3 { max-height:0; opacity:0; transform: translateY(10px); pointer-events:none; }

    body[data-step="2"] #slide-2 { max-height: 3000px; opacity:1; transform:none; pointer-events:auto; }
    body[data-step="2"] #slide-3 { max-height:0; opacity:0; transform: translateY(10px); pointer-events:none; }

    body[data-step="3"] #slide-2 { max-height: 3000px; opacity:1; transform:none; pointer-events:auto; }
    body[data-step="3"] #slide-3 { max-height: 9999px; opacity:1; transform:none; pointer-events:auto; }

    .tp-slide{
      transition: opacity .25s ease, transform .25s ease, max-height .35s ease;
      overflow: hidden;
      opacity: 1;
      transform: none;
      max-height: 9999px;
      will-change: opacity, transform;
      margin: 14px 0 18px;
    }

    .tp-card{
      border: 1px solid #e2e8f0;
      border-radius: 14px;
      background: #fff;
      box-shadow: 0 10px 30px rgba(2, 6, 23, .10);
      padding: 16px;
    }

    .tp-center{ text-align:center; }
    .tp-muted{ color:#475569; margin: 6px 0 0; }

    /* =========================
       MAP (scoped)
       ========================= */
    .tp-map-scope{
      --line: #e2e8f0;
      --region-base: #d9dee7;
      --region-stroke: #ffffff;
      --region-hover: #8b1e2d;
      --region-active: #6f1420;
      --shadow: 0 10px 30px rgba(2, 6, 23, .10);
      margin-top: 10px;
    }

    .tp-map-scope .map-card{
      border: 1px solid var(--line);
      border-radius: 14px;
      box-shadow: var(--shadow);
      padding: 14px;
      background: #fff;
      position: relative;
    }

    /* Dimensione mappa: 500px */
    .tp-map-scope .map-wrap{
      width:100%;
      max-width: 500px;
      margin:0 auto;
      display:flex;
      justify-content:center;
    }
    .tp-map-scope .tp-map{
      width:100%;
      height:auto;
      display:block;
    }

    .tp-map-scope .tp-region{
      fill: var(--region-fill, var(--region-base));
      stroke: var(--region-stroke);
      stroke-width: .7;
      cursor: pointer;
      transition: fill .18s ease, filter .18s ease;
      outline: none;
    }
    .tp-map-scope .tp-region:hover{
      fill: var(--region-hover);
      filter: drop-shadow(0 1px 1px rgba(0,0,0,.16));
    }
    .tp-map-scope .tp-region.is-active{ fill: var(--region-active); }
    .tp-map-scope .tp-region:focus-visible{
      fill: var(--region-hover);
      stroke: #111827;
      stroke-width: 1.2;
    }

    .tp-map-scope .map-tooltip{
      position: fixed;
      z-index: 9999;
      pointer-events: none;
      opacity: 0;
      transform: translate(-9999px, -9999px);
      transition: opacity .12s ease;
      padding: 8px 10px;
      border-radius: 10px;
      background: rgba(15, 23, 42, .92);
      color: #fff;
      font-size: 13px;
      line-height: 1.2;
      box-shadow: 0 10px 24px rgba(2, 6, 23, .18);
      border: 1px solid rgba(255,255,255,.12);
      white-space: nowrap;
    }
    .tp-map-scope .map-tooltip.is-visible{ opacity: 1; }

    .tp-hidden{ display:none !important; }

    /* Pill Regione (come Italia) */
    .tp-pill{
      display:inline-flex;
      align-items:center;
      justify-content:center;
      gap:8px;
      padding: 8px 12px;
      border-radius: 999px;
      border: 1px solid #e2e8f0;
      background: #f8fafc;
      font-weight: 800;
      margin: 10px 0 14px;
      width: 100%;
    }

    /* Risultati: micro-fix identici a italia.php */
    .results .box{ margin-top: 14px; }
    .canvas-wrap { position: relative; min-height: 360px; }
    .explanation { margin-top: 10px; }
  </style>
</head>

<body data-step="1">
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <h1 class="page-title"><?php echo hrlp_e('h1'); ?></h1>
    <p class="subtitle"><?php echo hrlp_e('subtitle'); ?></p>

    <section id="slide-1" class="box" aria-label="Avvio">
      <div>
        <form id="calc-form" class="calc-form" novalidate>
          <label class="label" for="reddito"><?php echo hrlp_e('label_income'); ?></label>

          <div class="input-row">
            <input
              id="reddito"
              type="text"
              inputmode="numeric"
              placeholder="<?php echo hrlp_e('income_ph'); ?>"
              required
              aria-label="<?php echo hrlp_e('income_aria'); ?>"
            />
            <button id="btn-calcola" type="submit" class="btn btn-primary">
              <?php echo hrlp_e('btn_start'); ?>
            </button>
          </div>

          <p class="help" style="margin-top:10px;">
            <?php echo hrlp_e('help_pre'); ?>
            <a
              class="foot-plain-link"
              href="/aboutus/disclaimer.php"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="<?php echo hrlp_e('help_link_aria'); ?>"
            ><?php echo hrlp_e('help_link'); ?></a><?php echo hrlp_e('help_post'); ?>
          </p>

          <p class="tp-muted" style="margin: 8px 0 0;">
            <?php echo ($HRLP_LANG === 'en')
              ? 'Click “Calculate” to open the map and choose your Region.'
              : 'Clicca “Calcola” per aprire la mappa e scegliere la Regione.'; ?>
          </p>

          <!-- SELECT “ponte” (hidden): compatibilità con calculatorCroatia.js -->
          <div class="input-row tp-hidden">
            <select id="regione" name="regione" aria-label="<?php echo hrlp_e('region_aria'); ?>">
              <option value=""></option>
              <?php foreach ($HR_REGION_OPTIONS as $value => $labels): ?>
                <option value="<?php echo hrlp_h($value); ?>">
                  <?php echo hrlp_h(isset($labels[$HRLP_LANG]) ? $labels[$HRLP_LANG] : $labels['it']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>
        </form>
      </div>
    </section>

    <section id="slide-2" class="box" aria-label="Mappa">
      <div>
        <h2 class="tp-center" style="margin:0 0 6px;"><?php echo hrlp_e('map_title'); ?></h2>
        <p class="tp-muted tp-center" style="margin:0 0 10px;"><?php echo hrlp_e('map_hint'); ?></p>

        <section class="tp-map-scope" aria-label="Seleziona una regione dalla mappa">
          <div class="map-card">
            <div class="map-wrap">
              <?php echo $TP_CROATIA_SVG; ?>
            </div>
            <div id="map-tooltip" class="map-tooltip" aria-hidden="true"></div>
          </div>
        </section>
      </div>
    </section>

    <section id="slide-3" class="box" aria-label="Calcolatore">
      <div>
        <h2 class="tp-center" style="margin:0 0 6px;"><?php echo hrlp_e('calc_title'); ?></h2>
        <p class="tp-muted tp-center" style="margin:0 0 8px;"><?php echo hrlp_e('calc_hint'); ?></p>

        <div class="tp-pill tp-center" aria-live="polite">
          <?php echo hrlp_e('region_prefix'); ?> <span id="ui-region-label"><?php echo hrlp_e('region_none'); ?></span>
        </div>

        <!-- RISULTATI (identici al tuo calcolatore) -->
        <div id="risultati" class="results" hidden aria-live="polite" aria-atomic="true">
          <h2 class="results-head">
            <?php echo hrlp_e('results_h2_pre'); ?><span id="totaleTasse" class="totale"></span><?php echo hrlp_e('results_h2_post'); ?>
          </h2>
          <p class="results-head"><small><?php echo hrlp_e('results_note'); ?></small></p>

          <!-- BOX NAZIONALE (ID legacy “italia” usati dal JS) -->
          <section class="box">
            <h2 class="box-title" id="titolo-italia"><?php echo hrlp_e('box_it_title'); ?></h2>
            <p class="region-amount">
              <?php echo hrlp_e('box_it_amount'); ?> <strong><span id="tasseStatali"></span></strong>
            </p>
            <div class="box-grid">
              <aside id="legend-italia" class="legend-col" aria-label="<?php echo hrlp_e('legend_it_aria'); ?>">
                <div class="legend-header">
                  <h3 class="legend-title">
                    <?php echo hrlp_e('legend_title'); ?>
                    <span class="legend-subtle"><?php echo hrlp_e('legend_subtle_it'); ?></span>
                  </h3>
                  <p class="legend-note"><?php echo hrlp_e('legend_note'); ?></p>
                </div>
              </aside>

              <div class="chart-col">
                <div class="canvas-wrap">
                  <canvas id="graficoItalia" role="img" aria-label="<?php echo hrlp_e('chart_it_aria'); ?>" width="300" height="380"></canvas>
                  <div id="explanation-it" class="explanation"><?php echo hrlp_e('explain_it'); ?></div>
                </div>
              </div>
            </div>
          </section>

          <div class="cta-row" style="text-align: center;">
            <a class="btn btn-primary" href="/tools/comparison.php?a=HR"><?php echo hrlp_e('comparison_btn'); ?></a>
          </div><br>

          <!-- BOX UE -->
          <section class="box">
            <h2 class="box-title" id="titolo-ue"><?php echo hrlp_e('box_ue_title'); ?></h2>
            <p class="region-amount"><?php echo hrlp_e('box_ue_desc'); ?></p>
            <div class="box-grid">
              <aside id="legend-ue" class="legend-col" aria-label="<?php echo hrlp_e('legend_ue_aria'); ?>">
                <div class="legend-header">
                  <h3 class="legend-title">
                    <?php echo hrlp_e('legend_title'); ?>
                    <span class="legend-subtle"><?php echo hrlp_e('legend_subtle_ue'); ?></span>
                  </h3>
                </div>
              </aside>

              <div class="chart-col">
                <div class="canvas-wrap">
                  <canvas id="graficoUE" role="img" aria-label="<?php echo hrlp_e('chart_ue_aria'); ?>" width="300" height="380"></canvas>
                  <div id="explanation-ue" class="explanation"><?php echo hrlp_e('explain_ue'); ?></div>
                </div>
              </div>
            </div>
          </section>

          <!-- BOX REGIONE (mostrato dal JS legacy) -->
          <section class="box" id="box-regione" hidden>
            <h2 class="box-title"><?php echo hrlp_e('box_reg_title'); ?><span id="titolo-regione-nome"></span></h2>
            <p class="region-amount">
              <?php echo hrlp_e('box_reg_amount'); ?> <strong><span id="importoRegione"></span></strong>
            </p>
            <p class="explanation"><?php echo hrlp_e('box_reg_soon'); ?></p>
          </section>

          <section class="box">
            <h2 class="box-title" id="fonti"><?php echo hrlp_e('sources'); ?></h2>
            <ul>
              <li>Ministero delle finanze (Croazia)</li>
              <li>Commissione Europea</li>
            </ul>
          </section>
        </div>
      </div>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <script>
    (function () {
      const state = { step: 1, regionValue: '', regionName: '', regionCode: '' };

      const els = {
        body: document.body,
        slide2: document.getElementById('slide-2'),
        slide3: document.getElementById('slide-3'),
        form: document.getElementById('calc-form'),
        btnCalcola: document.getElementById('btn-calcola'),
        inputIncome: document.getElementById('reddito'),
        selectRegion: document.getElementById('regione'),
        uiRegionLabel: document.getElementById('ui-region-label'),
        regions: Array.from(document.querySelectorAll('.tp-region')),
        tooltip: document.getElementById('map-tooltip'),
      };

      function setStep(nextStep, scrollToEl) {
        state.step = nextStep;
        els.body.dataset.step = String(nextStep);

        els.slide2?.setAttribute('aria-hidden', nextStep < 2 ? 'true' : 'false');
        els.slide3?.setAttribute('aria-hidden', nextStep < 3 ? 'true' : 'false');

        if (scrollToEl) scrollToEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }

      function setActiveRegion(activeEl) {
        els.regions.forEach(r => r.classList.toggle('is-active', r === activeEl));
      }

      function showTooltip(text) {
        if (!els.tooltip) return;
        els.tooltip.textContent = text;
        els.tooltip.classList.add('is-visible');
        els.tooltip.setAttribute('aria-hidden', 'false');
      }

      function moveTooltip(x, y) {
        if (!els.tooltip) return;
        const offset = 14;
        els.tooltip.style.transform = `translate(${x + offset}px, ${y + offset}px)`;
      }

      function hideTooltip() {
        if (!els.tooltip) return;
        els.tooltip.classList.remove('is-visible');
        els.tooltip.setAttribute('aria-hidden', 'true');
        els.tooltip.style.transform = 'translate(-9999px, -9999px)';
      }

      function parseIncome() {
        if (typeof window.parseEuroInput === 'function') {
          return window.parseEuroInput(String(els.inputIncome?.value || ''));
        }
        const raw = String(els.inputIncome?.value || '').replace(/\./g, '').replace(',', '.');
        return Number(raw);
      }

      function hasValidIncome() {
        const n = parseIncome();
        return Number.isFinite(n) && n > 0;
      }

      function runReactiveCalc() {
        if (!state.regionValue) return;
        if (!hasValidIncome()) return;
        if (typeof window.runCalcolo === 'function') window.runCalcolo();
      }

      function onCalcolaIntent() {
        if (typeof window.clearFormError === 'function') window.clearFormError();

        if (!hasValidIncome()) {
          if (typeof window.showFormError === 'function' && typeof window.calcit_t === 'function') {
            window.showFormError(window.calcit_t('enterIncome'));
          }
          els.inputIncome?.focus({ preventScroll: true });
          return;
        }

        if (state.step === 1) {
          setStep(2, els.slide2);
          return;
        }

        els.slide2?.scrollIntoView({ behavior: 'smooth', block: 'start' });

        if (state.regionValue) {
          setStep(3);
          runReactiveCalc();
        }
      }

      if (els.form) {
        els.form.addEventListener('submit', function (e) {
          e.preventDefault();
          e.stopPropagation();
          e.stopImmediatePropagation();
          onCalcolaIntent();
        }, true);
      }

      els.btnCalcola?.addEventListener('click', function (e) {
        e.preventDefault();
        onCalcolaIntent();
      });

      function setRegionFromMap(el) {
        const value = el?.dataset?.value || '';
        const name  = el?.dataset?.name  || value;
        const code  = el?.dataset?.code  || '';

        state.regionValue = value;
        state.regionName = name;
        state.regionCode = code;

        if (els.uiRegionLabel) els.uiRegionLabel.textContent = name || '—';

        if (els.selectRegion) {
          els.selectRegion.value = value;
          els.selectRegion.dispatchEvent(new Event('change', { bubbles: true }));
        }

setStep(3);

runReactiveCalc();

// scroll solo quando i risultati sono davvero visibili
const resultsEl = document.getElementById('risultati');
if (resultsEl && !resultsEl.hidden) {
  const target =
    resultsEl.querySelector('h2.results-head') ||
    resultsEl.querySelector('.results-head') ||
    resultsEl;

  target.scrollIntoView({ behavior: 'smooth', block: 'start' });
}



        if (!hasValidIncome()) els.inputIncome?.focus({ preventScroll: true });
      }

      els.regions.forEach((el) => {
        el.addEventListener('mouseenter', (e) => {
          const name = el.dataset.name || '';
          const code = el.dataset.code || '';
          showTooltip(code ? `${name} · ${code}` : `${name}`);
          moveTooltip(e.clientX, e.clientY);
        });
        el.addEventListener('mousemove', (e) => moveTooltip(e.clientX, e.clientY));
        el.addEventListener('mouseleave', hideTooltip);

        el.addEventListener('focus', () => {
          const name = el.dataset.name || '';
          const code = el.dataset.code || '';
          showTooltip(code ? `${name} · ${code}` : `${name}`);
        });
        el.addEventListener('blur', hideTooltip);

        el.addEventListener('click', (e) => {
          e.preventDefault();
          setActiveRegion(el);
          setRegionFromMap(el);
        });

        el.addEventListener('keydown', (e) => {
          if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            el.click();
          }
        });
      });

      let t = 0;
      function scheduleCalc() {
        window.clearTimeout(t);
        t = window.setTimeout(() => {
          if (state.step >= 3) runReactiveCalc();
        }, 260);
      }
      els.inputIncome?.addEventListener('input', scheduleCalc);

      els.selectRegion?.addEventListener('change', () => {
        state.regionValue = String(els.selectRegion.value || '');
        const opt = els.selectRegion.options[els.selectRegion.selectedIndex];
        const label = opt ? String(opt.textContent || '').trim() : state.regionValue;
        state.regionName = label || state.regionValue;

        if (els.uiRegionLabel) els.uiRegionLabel.textContent = state.regionName || '—';
        if (state.step >= 3) scheduleCalc();
      });

      setStep(1);
    })();
  </script>

  <!-- Statcounter (tuo) -->
  <script type="text/javascript">
    var sc_project=13170178;
    var sc_invisible=1;
    var sc_security="f093464a";
  </script>
  <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
  <noscript><div class="statcounter"><a title="hit counter" href="https://statcounter.com/" target="_blank"><img
    class="statcounter"
    src="https://c.statcounter.com/13170178/0/f093464a/1/"
    alt="hit counter"
    referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
</body>
</html>
