<?php
/**
 * NOTE (futuro):
 * - Se un domani vuoi tradurre anche testi generati via JS (legende/settori/chart),
 *   conviene spostare le stringhe in un oggetto JS alimentato da PHP (data-* o window.__I18N__).
 */
require_once __DIR__ . '/../../i18n/i18n.php';

if (!function_exists('itlp_get_lang')) {
  function itlp_get_lang() {
    $lang = 'it';
    if (isset($_GET['lang'])) {
      $lang = strtolower(trim((string) $_GET['lang']));
    } elseif (isset($_COOKIE['tp_lang'])) {
      $lang = strtolower(trim((string) $_COOKIE['tp_lang']));
    }
    return in_array($lang, array('it','en'), true) ? $lang : 'it';
  }
}
$ITLP_LANG = function_exists('tp_lang') ? tp_lang() : itlp_get_lang();

if (!function_exists('itlp_h')) {
  function itlp_h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}

$ITLP_I18N = array(
  'it' => array(
    'title' => "Dove vanno le tue tasse? — TAXpedia",
    'meta_desc' => "Inserisci il tuo reddito e scopri come lo Stato utilizza i tuoi contributi.",
    'h1' => "Come spende l'Italia le tasse dei cittadini?",
    'subtitle' => "Inserisci il tuo reddito e scopri come lo Stato utilizza i tuoi contributi.",

    'btn_start' => "Calcola",

    'label_income' => "Reddito lordo (€)",
    'income_ph' => "es. 31.856 (reddito medio in Italia)",
    'income_aria' => "Inserisci il tuo reddito lordo in euro",

    'map_title' => "Seleziona la tua Regione",
    'map_hint'  => "Clicca una regione sulla mappa per proseguire.",
    'calc_title' => "Calcolatore",
    'calc_hint'  => "Inserisci il reddito: i risultati si aggiornano automaticamente.",

    'help_pre' => "Consulta il ",
    'help_link' => "disclaimer",
    'help_post' => " per maggiori informazioni.",
    'help_link_aria' => "Apri il disclaimer in una nuova finestra",

    'results_h2_pre' => "Hai versato circa ",
    'results_h2_post' => " in tasse",
    'results_note' => "Tocca i singoli settori per leggere gli approfondimenti.",

    'box_it_title' => "Spesa statale",
    'box_it_amount' => "Tasse statali stimate:",
    'legend_it_aria' => "Dettaglio (Italia)",
    'legend_title' => "Settore — Importo ",
    'legend_subtle_it' => "(Italia)",
    'legend_note' => "Clicca per aprire il dettaglio. Hover per evidenziare la fetta.",
    'chart_it_aria' => "Grafico ripartizione Italia",
    'explain_it' => "Tocca sul grafico per i dettagli.",
    'comparison_btn' => "Confronta i dati con altri paesi europei",

    'box_eu_title' => "Spesa europea",
    'box_eu_desc' => "Distribuzione del contributo italiano al bilancio dell'Unione Europea.",
    'legend_eu_aria' => "Dettaglio (UE)",
    'legend_subtle_eu' => "(UE)",
    'chart_eu_aria' => "Grafico contributo bilancio UE",
    'explain_eu' => "Tocca sul grafico per i dettagli.",

    'box_reg_title' => "Spesa regione ",
    'box_reg_amount' => "Addizionale regionale stimata:",
    'box_reg_soon' => "Ripartizione del bilancio regionale presto disponibile.",

    'region_none' => "Nessuna selezione (solo tasse statali)",
    'region_aria' => "Regione selezionata (hidden)",

    'sources' => "Fonti",
  ),

  'en' => array(
    'title' => "Where do your taxes go? — TAXpedia",
    'meta_desc' => "Enter your income and see how the State allocates your contributions.",
    'h1' => "How does Italy spend taxpayers’ money?",
    'subtitle' => "Enter your income and see how the State allocates your contributions.",

    'btn_start' => "Calculate",

    'label_income' => "Gross income (€)",
    'income_ph' => "e.g. 31.856 (average income in Italy)",
    'income_aria' => "Enter your gross income in euros",

    'map_title' => "Select your Region",
    'map_hint'  => "Click a region on the map to continue.",
    'calc_title' => "Calculator",
    'calc_hint'  => "Enter income: results update automatically.",

    'help_pre' => "See the ",
    'help_link' => "disclaimer",
    'help_post' => " for more information.",
    'help_link_aria' => "Open the disclaimer in a new window",

    'results_h2_pre' => "You have paid approximately ",
    'results_h2_post' => " in taxes",
    'results_note' => "Tap individual sectors to read the detailed notes.",

    'box_it_title' => "National expenditure",
    'box_it_amount' => "Estimated national taxes:",
    'legend_it_aria' => "Breakdown (Italy)",
    'legend_title' => "Sector — Amount ",
    'legend_subtle_it' => "(Italy)",
    'legend_note' => "Click to open details. Hover to highlight the slice.",
    'chart_it_aria' => "Italy allocation chart",
    'explain_it' => "Tap the chart for details.",
    'comparison_btn' => "Compare data with other European countries",

    'box_eu_title' => "European expenditure",
    'box_eu_desc' => "Allocation of Italy’s contribution to the European Union budget.",
    'legend_eu_aria' => "Breakdown (EU)",
    'legend_subtle_eu' => "(EU)",
    'chart_eu_aria' => "EU contribution chart",
    'explain_eu' => "Tap the chart for details.",

    'box_reg_title' => "Regional expenditure ",
    'box_reg_amount' => "Estimated regional surtax:",
    'box_reg_soon' => "Regional budget breakdown coming soon.",

    'region_none' => "No selection (national taxes only)",
    'region_aria' => "Selected region (hidden)",

    'sources' => "Sources",
  ),
);

if (!function_exists('itlp_t')) {
  function itlp_t($key) {
    global $ITLP_LANG, $ITLP_I18N;
    if (isset($ITLP_I18N[$ITLP_LANG][$key])) return $ITLP_I18N[$ITLP_LANG][$key];
    if (isset($ITLP_I18N['it'][$key])) return $ITLP_I18N['it'][$key];
    return '';
  }
}

if (!function_exists('itlp_e')) {
  function itlp_e($key) {
    return itlp_h(itlp_t($key));
  }
}

/**
 * Regione: il calcolatore usa questi VALUE (stringhe) come chiave delle aliquote.
 * Quindi il data-value della mappa DEVE matchare questi nomi.
 */
$ITLP_REGION_LABELS = array(
  'Abruzzo' => array('it' => 'Abruzzo', 'en' => 'Abruzzo'),
  'Basilicata' => array('it' => 'Basilicata', 'en' => 'Basilicata'),
  'Calabria' => array('it' => 'Calabria', 'en' => 'Calabria'),
  'Campania' => array('it' => 'Campania', 'en' => 'Campania'),
  'Emilia-Romagna' => array('it' => 'Emilia-Romagna', 'en' => 'Emilia-Romagna'),
  'Friuli-Venezia Giulia' => array('it' => 'Friuli-Venezia Giulia', 'en' => 'Friuli-Venezia Giulia'),
  'Lazio' => array('it' => 'Lazio', 'en' => 'Lazio'),
  'Liguria' => array('it' => 'Liguria', 'en' => 'Liguria'),
  'Lombardia' => array('it' => 'Lombardia', 'en' => 'Lombardy'),
  'Marche' => array('it' => 'Marche', 'en' => 'Marche'),
  'Molise' => array('it' => 'Molise', 'en' => 'Molise'),
  'Piemonte' => array('it' => 'Piemonte', 'en' => 'Piedmont'),
  'Puglia' => array('it' => 'Puglia', 'en' => 'Apulia'),
  'Sardegna' => array('it' => 'Sardegna', 'en' => 'Sardinia'),
  'Sicilia' => array('it' => 'Sicilia', 'en' => 'Sicily'),
  'Toscana' => array('it' => 'Toscana', 'en' => 'Tuscany'),
  'Trentino-Alto Adige' => array('it' => 'Trentino-Alto Adige', 'en' => 'Trentino–South Tyrol'),
  'Umbria' => array('it' => 'Umbria', 'en' => 'Umbria'),
  "Valle d'Aosta" => array('it' => "Valle d'Aosta", 'en' => 'Aosta Valley'),
  'Veneto' => array('it' => 'Veneto', 'en' => 'Veneto'),
);

/* =========================
   SVG INLINE (prepare in PHP)
   ========================= */
$svgFile = __DIR__ . '/ITALIA SVG/italyHigh.svg';

$REGIONS_IT = [
  'IT-23' => ['slug' => 'valle-daosta',          'name' => "Valle d'Aosta/Vallée d'Aoste", 'code' => 'IT-23', 'value' => "Valle d'Aosta"],
  'IT-21' => ['slug' => 'piemonte',              'name' => "Piemonte",                      'code' => 'IT-21', 'value' => "Piemonte"],
  'IT-25' => ['slug' => 'lombardia',             'name' => "Lombardia",                     'code' => 'IT-25', 'value' => "Lombardia"],
  'IT-34' => ['slug' => 'veneto',                'name' => "Veneto",                        'code' => 'IT-34', 'value' => "Veneto"],
  'IT-36' => ['slug' => 'friuli-venezia-giulia', 'name' => "Friuli-Venezia Giulia",         'code' => 'IT-36', 'value' => "Friuli-Venezia Giulia"],
  'IT-42' => ['slug' => 'liguria',               'name' => "Liguria",                       'code' => 'IT-42', 'value' => "Liguria"],
  'IT-45' => ['slug' => 'emilia-romagna',        'name' => "Emilia-Romagna",                'code' => 'IT-45', 'value' => "Emilia-Romagna"],
  'IT-32' => ['slug' => 'trentino-alto-adige',   'name' => "Trentino-Alto Adige/Südtirol",  'code' => 'IT-32', 'value' => "Trentino-Alto Adige"],

  'IT-52' => ['slug' => 'toscana',               'name' => "Toscana",                       'code' => 'IT-52', 'value' => "Toscana"],
  'IT-55' => ['slug' => 'umbria',                'name' => "Umbria",                        'code' => 'IT-55', 'value' => "Umbria"],
  'IT-57' => ['slug' => 'marche',                'name' => "Marche",                        'code' => 'IT-57', 'value' => "Marche"],
  'IT-62' => ['slug' => 'lazio',                 'name' => "Lazio",                         'code' => 'IT-62', 'value' => "Lazio"],

  'IT_65' => ['slug' => 'abruzzo',               'name' => "Abruzzo",                       'code' => 'IT-65', 'value' => "Abruzzo"], // nel tuo SVG è IT_65
  'IT-67' => ['slug' => 'molise',                'name' => "Molise",                        'code' => 'IT-67', 'value' => "Molise"],
  'IT-72' => ['slug' => 'campania',              'name' => "Campania",                      'code' => 'IT-72', 'value' => "Campania"],
  'IT-75' => ['slug' => 'puglia',                'name' => "Puglia",                        'code' => 'IT-75', 'value' => "Puglia"],
  'IT-77' => ['slug' => 'basilicata',            'name' => "Basilicata",                    'code' => 'IT-77', 'value' => "Basilicata"],
  'IT-78' => ['slug' => 'calabria',              'name' => "Calabria",                      'code' => 'IT-78', 'value' => "Calabria"],
  'IT-82' => ['slug' => 'sicilia',               'name' => "Sicilia",                       'code' => 'IT-82', 'value' => "Sicilia"],
  'IT-88' => ['slug' => 'sardegna',              'name' => "Sardegna",                      'code' => 'IT-88', 'value' => "Sardegna"],
];

function tp_load_and_prepare_svg(string $svgFile, array $regions): string {
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
  $svgEl->setAttribute('viewBox', '-5 -5 630 810');
  $svgEl->setAttribute('preserveAspectRatio', 'xMidYMid meet');
  $svgEl->setAttribute('role', 'img');
  $svgEl->setAttribute('aria-label', 'Mappa interattiva delle regioni italiane');

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
      // elimina elementi non-regioni (Vaticano / San Marino / ecc.)
      $p->parentNode?->removeChild($p);
      continue;
    }

    $r = $regions[$origId];
    $newId = 'region-' . $r['slug'];

    $p->setAttribute('id', $newId);
    $p->setAttribute('class', 'tp-region');
    $p->setAttribute('data-name', $r['name']);
    $p->setAttribute('data-code', $r['code']);
    $p->setAttribute('data-value', $r['value']); // <-- CHIAVE per il calcolatore
    $p->setAttribute('tabindex', '0');
    $p->setAttribute('role', 'button');
    $p->setAttribute('aria-label', $r['name'] . ' (' . $r['code'] . ')');
    $p->setAttribute('vector-effect', 'non-scaling-stroke');
    $p->setAttribute('title', $r['name']);
  }

  return $doc->saveXML($svgEl) ?: '<!-- ERRORE: impossibile serializzare SVG -->';
}

$TP_ITALIA_SVG = tp_load_and_prepare_svg($svgFile, $REGIONS_IT);
?>
<!doctype html>
<html lang="<?php echo itlp_h($ITLP_LANG); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo itlp_e('title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png" />
  <meta name="description" content="<?php echo itlp_e('meta_desc'); ?>" />

  <!-- Font identici alla home -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />

  <!-- Stili -->
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="../CalculatorStyle.css" />

  <!-- Chart.js UNA VOLTA SOLA -->
  <script defer src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

  <!-- Helper i18n condiviso -->
  <script defer src="/calculator/js/tp-i18n-local.js"></script>

  <!-- Il tuo calcolatore (non lo duplichiamo: lo rendiamo reattivo da qui) -->
  <script defer src="calculatorItalia.js"></script>

  <style>
    /* Center helper (slide headings + hint) */
.tp-center{ text-align:center; }
.tp-center .tp-muted{ text-align:center; }
/* Center “Regione: …” pill */
.tp-pill{
  justify-content:center;   /* centra contenuto inline-flex */
  width:100%;               /* prende tutta la riga */
  margin-left:auto;         /* centra il blocco */
  margin-right:auto;
  text-align:center;
}

/* Centra anche la pill “Regione: …” */
.tp-pill{ justify-content:center; }

    /* =========================
       SLIDES (3 layer)
       ========================= */
    body[data-step="1"] #slide-2,
    body[data-step="1"] #slide-3 { max-height:0; opacity:0; transform: translateY(10px); pointer-events:none; }

    /* Slide 1 NON viene più nascosta (Calcola sempre sopra) */
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

    .tp-muted{ color:#475569; margin: 6px 0 0; }

    /* =========================
       MAP (scoped) — MOLTO PIÙ PICCOLA
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
      padding: 12px;
      background: #fff;
      position: relative;
    }

    /* ↓↓↓ RIDUZIONE FORTE DIMENSIONI MAPPA */
.tp-map-scope .map-wrap{
  width:100%;
  max-width: 420px;   /* 320 * 1.2 = 384 (+20%) */
  margin:0 auto;
}
.tp-map-scope .tp-map{
  width:100%;
  height:auto;
  display:block;
  max-height: 420px;  /* 320 * 1.2 = 384 (+20%) */
}


    .tp-map-scope .tp-region{
      fill: var(--region-fill, var(--region-base));
      stroke: var(--region-stroke);
      stroke-width: .6;
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

    /* Hidden UI (select ponte) */
    .tp-hidden{ display:none !important; }

    /* Piccola pill di stato */
    .tp-pill{
      display:inline-flex;
      align-items:center;
      gap:8px;
      padding: 8px 12px;
      border-radius: 999px;
      border: 1px solid #e2e8f0;
      background: #f8fafc;
      font-weight: 700;
      margin: 8px 0 10px;
    }

/* =========================
   GRAFICI — SIZE (come Croazia)
   ========================= */
  .canvas-wrap{
  max-width: 420px;
  margin: 0 auto;
  }
  .canvas-wrap canvas{
  width: 300px !important;
  height: 380px !important;
  max-width: 100%;
  display: block;
  margin: 0 auto;
  }

  </style>
</head>

<body data-step="1">
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <h1 class="page-title"><?php echo itlp_e('h1'); ?></h1>
    <p class="subtitle"><?php echo itlp_e('subtitle'); ?></p>

    <!-- =========================================================
         SLIDE 1 — AVVIO
         - bottone “Calcola”
         - niente mappa
         - niente calcolatore
         ========================================================= -->
    <section id="slide-1" class="box" aria-label="Avvio">
      <div>

        <!-- “CALCOLA” IN STILE AUSTRIA.PHP: input + bottone stessa riga -->
        <form id="calc-form" class="calc-form" novalidate>
          <label class="label" for="reddito"><?php echo itlp_e('label_income'); ?></label>

          <div class="input-row">
            <input
              id="reddito"
              type="text"
              inputmode="numeric"
              placeholder="<?php echo itlp_e('income_ph'); ?>"
              required
              aria-label="<?php echo itlp_e('income_aria'); ?>"
            />
            <button id="btn-calcola" type="submit" class="btn btn-primary">
              <?php echo itlp_e('btn_start'); ?>
            </button>
          </div>

          <!-- SELECT “ponte” (hidden): compatibilità con calculatorItalia.js -->
          <div class="input-row tp-hidden">
            <select id="regione" name="regione" aria-label="<?php echo itlp_e('region_aria'); ?>">
              <option value=""><?php echo itlp_e('region_none'); ?></option>
              <?php foreach ($ITLP_REGION_LABELS as $value => $labels): ?>
                <option value="<?php echo itlp_h($value); ?>">
                  <?php echo itlp_h(isset($labels[$ITLP_LANG]) ? $labels[$ITLP_LANG] : $labels['it']); ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <p class="help" style="margin-top:10px;">
            <?php echo itlp_e('help_pre'); ?>
            <a
              class="foot-plain-link"
              href="/aboutus/disclaimer.php"
              target="_blank"
              rel="noopener noreferrer"
              aria-label="<?php echo itlp_e('help_link_aria'); ?>"
            ><?php echo itlp_e('help_link'); ?></a><?php echo itlp_e('help_post'); ?>
          </p>

          <p class="tp-muted" style="margin: 8px 0 0;">
            Clicca “Calcola” per aprire la mappa e scegliere la Regione.
          </p>
        </form>
      </div>
    </section>

    <!-- =========================================================
         SLIDE 2 — MAPPA SVG
         - SVG inline
         - click regione => stato + scroll + mostra slide3
         ========================================================= -->
    <section id="slide-2" class="box" aria-label="Mappa">
      <div>
        <h2 class="tp-center" style="margin:0 0 6px;"><?php echo itlp_e('map_title'); ?></h2>
          <p class="tp-muted tp-center" style="margin:0 0 10px;"><?php echo itlp_e('map_hint'); ?></p>

        <section class="tp-map-scope" aria-label="Seleziona una regione dalla mappa">
          <div class="map-card">
            <div class="map-wrap">
              <?php echo $TP_ITALIA_SVG; ?>
            </div>
            <div id="map-tooltip" class="map-tooltip" aria-hidden="true"></div>
          </div>
        </section>
      </div>
    </section>

    <!-- =========================================================
         SLIDE 3 — CALCOLATORE
         - usa regione selezionata
         - nessun pulsante calcola
         - reattivo su input reddito + cambio regione (mappa)
         ========================================================= -->
    <section id="slide-3" class="box" aria-label="Calcolatore">
      <div>
      <h2 class="tp-center" style="margin:0 0 6px;"><?php echo itlp_e('calc_title'); ?></h2>
        <p class="tp-muted tp-center" style="margin:0 0 8px;"><?php echo itlp_e('calc_hint'); ?></p>

        <div class="tp-pill tp-center" aria-live="polite">
          Regione: <span id="ui-region-label">—</span>
        </div>

        <!-- RISULTATI (identici al tuo calcolatore) -->
        <div id="risultati" class="results" hidden aria-live="polite" aria-atomic="true">
          <h2 class="results-head">
            <?php echo itlp_e('results_h2_pre'); ?><span id="totaleTasse" class="totale"></span><?php echo itlp_e('results_h2_post'); ?>
          </h2>
          <p class="results-head"><small><?php echo itlp_e('results_note'); ?></small></p>

          <!-- BOX ITALIA -->
          <section class="box">
            <h2 class="box-title" id="titolo-italia"><?php echo itlp_e('box_it_title'); ?></h2>
            <p class="region-amount">
              <?php echo itlp_e('box_it_amount'); ?> <strong><span id="tasseStatali"></span></strong>
            </p>
            <div class="box-grid">
              <aside id="legend-italia" class="legend-col" aria-label="<?php echo itlp_e('legend_it_aria'); ?>">
                <div class="legend-header">
                  <h3 class="legend-title">
                    <?php echo itlp_e('legend_title'); ?>
                    <span class="legend-subtle"><?php echo itlp_e('legend_subtle_it'); ?></span>
                  </h3>
                  <p class="legend-note"><?php echo itlp_e('legend_note'); ?></p>
                </div>
              </aside>

              <div class="chart-col">
                <div class="canvas-wrap">
                  <!-- ↓↓↓ CANVAS PIÙ PICCOLO -->
                <canvas id="graficoItalia" role="img" aria-label="<?php echo itlp_e('chart_it_aria'); ?>" width="300" height="380"></canvas>
                  <div id="explanation-it" class="explanation"><?php echo itlp_e('explain_it'); ?></div>
                </div>
              </div>
            </div>
          </section>

          <div class="cta-row" style="text-align: center;">
            <a class="btn btn-primary" href="/tools/comparison.php?a=IT"><?php echo itlp_e('comparison_btn'); ?></a>
          </div><br>

          <!-- BOX UE -->
          <section class="box">
            <h2 class="box-title" id="titolo-ue"><?php echo itlp_e('box_eu_title'); ?></h2>
            <p class="region-amount"><?php echo itlp_e('box_eu_desc'); ?></p>
            <div class="box-grid">
              <aside id="legend-ue" class="legend-col" aria-label="<?php echo itlp_e('legend_eu_aria'); ?>">
                <div class="legend-header">
                  <h3 class="legend-title">
                    <?php echo itlp_e('legend_title'); ?>
                    <span class="legend-subtle"><?php echo itlp_e('legend_subtle_eu'); ?></span>
                  </h3>
                </div>
              </aside>

              <div class="chart-col">
                <div class="canvas-wrap">
                  <!-- ↓↓↓ CANVAS PIÙ PICCOLO -->
                  <canvas id="graficoUE" role="img" aria-label="<?php echo itlp_e('chart_eu_aria'); ?>" width="300" height="380"></canvas>
                  <div id="explanation-ue" class="explanation"><?php echo itlp_e('explain_eu'); ?></div>
                </div>
              </div>
            </div>
          </section>

          <!-- BOX REGIONE -->
          <section class="box" id="box-regione" hidden>
            <h2 class="box-title"><?php echo itlp_e('box_reg_title'); ?><span id="titolo-regione-nome"></span></h2>
            <p class="region-amount">
              <?php echo itlp_e('box_reg_amount'); ?> <strong><span id="importoRegione"></span></strong>
            </p>

            <!-- Default (tutte le regioni): solo questo testo -->
            <p class="explanation" id="box-regione-soon"><?php echo itlp_e('box_reg_soon'); ?></p>

            <!-- Solo Lombardia: legenda + grafico (iniettati via JS) -->
            <div id="box-regione-breakdown" hidden></div>
          </section>

          <section class="box" style="text-align: left;">
            <h2 class="box-title" id="fonti"><?php echo itlp_e('sources'); ?></h2>
            <ul>
              <li>Ministero dell'economia e della finanza</li>
              <li>Ragioneria dello Stato</li>
            </ul>
          </section>
        </div>
      </div>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <script>
    /**
     * =========================
     * STATE + FLOW CONTROLLER (3 slide)
     * - tutto qui (no reload, no file extra)
     * - step progressivo: 1 -> 2 -> 3
     * - “Calcola” resta sempre sopra (slide-1 non viene nascosta)
     * =========================
     */
    (function(){
      const state = {
        step: 1,
        regionValue: '',
        regionName: '',
        regionCode: ''
      };

      const els = {
        body: document.body,
        slide1: document.getElementById('slide-1'),
        slide2: document.getElementById('slide-2'),
        slide3: document.getElementById('slide-3'),

        // Form “Calcola” stile Austria
        form: document.getElementById('calc-form'),
        btnCalcola: document.getElementById('btn-calcola'),
        inputIncome: document.getElementById('reddito'),

        svg: document.querySelector('.tp-map'),
        regions: Array.from(document.querySelectorAll('.tp-region')),
        tooltip: document.getElementById('map-tooltip'),

        selectRegion: document.getElementById('regione'),
        uiRegionLabel: document.getElementById('ui-region-label'),
      };

      function setStep(nextStep, { scrollTo = null } = {}) {
        state.step = nextStep;
        els.body.dataset.step = String(nextStep);

        // a11y: aria-hidden coerente
        // Slide 1 sempre visibile
        if (els.slide1) els.slide1.setAttribute('aria-hidden', 'false');
        if (els.slide2) els.slide2.setAttribute('aria-hidden', nextStep < 2 ? 'true' : 'false');
        if (els.slide3) els.slide3.setAttribute('aria-hidden', nextStep < 3 ? 'true' : 'false');

        if (scrollTo) {
          scrollTo.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
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

      function isIncomeValid() {
        // riusa il parser del tuo calculatorItalia.js (se presente)
        if (typeof window.parseEuroInput !== 'function') return false;
        const n = window.parseEuroInput(String(els.inputIncome?.value || ''));
        return Number.isFinite(n) && n > 0;
      }

      // Calcolo reattivo: chiamato quando (income valido) + (regione presente)
      function runReactiveCalc() {
        if (!state.regionValue) return;
        if (!isIncomeValid()) return;

        // Chiamiamo il tuo runCalcolo (calculatorItalia.js)
        if (typeof window.runCalcolo === 'function') {
          window.runCalcolo();
        }
      }

      function setRegionFromMap(el) {
        const value = (el && el.dataset) ? (el.dataset.value || '') : '';
        const name  = (el && el.dataset) ? (el.dataset.name  || '') : '';
        const code  = (el && el.dataset) ? (el.dataset.code  || '') : '';

        state.regionValue = value;
        state.regionName = name;
        state.regionCode = code;

        // Sync UI (pill) + select hidden (ponte col calcolatore)
        if (els.uiRegionLabel) {
          els.uiRegionLabel.textContent = value ? value : '—';
        }
        if (els.selectRegion) {
          els.selectRegion.value = value;
          els.selectRegion.dispatchEvent(new Event('change', { bubbles: true }));
        }

        // Step 3 reveal + scroll al calcolatore
        setStep(3, { scrollTo: els.slide3 });

        // Se reddito già valido, aggiorna risultati senza click
        runReactiveCalc();

        // Se reddito non valido, focus (senza scroll)
        if (!isIncomeValid() && els.inputIncome) {
          els.inputIncome.focus({ preventScroll: true });
        }
      }

      // “CALCOLA” (submit) in stile Austria:
      // - se non ho ancora scelto la regione => apro la mappa (step 2) e scrollo
      // - se ho già una regione => vado ai risultati (step 3) e ricalcolo
     if (els.form) {
  els.form.addEventListener('submit', (e) => {
    e.preventDefault();
    e.stopPropagation();
    e.stopImmediatePropagation();

    if (!state.regionValue) {
      setStep(2, { scrollTo: els.slide2 });
      return;
    }

    setStep(3, { scrollTo: els.slide3 });
    runReactiveCalc();
  }, true); // <--- IMPORTANT: capture
}


      // MAPPA: hover + click + tastiera
      els.regions.forEach((el) => {
        el.addEventListener('mouseenter', (e) => {
          const name = el.dataset.name || '';
          const code = el.dataset.code || '';
          showTooltip(`${name} · ${code}`);
          moveTooltip(e.clientX, e.clientY);
        });
        el.addEventListener('mousemove', (e) => moveTooltip(e.clientX, e.clientY));
        el.addEventListener('mouseleave', hideTooltip);

        el.addEventListener('focus', () => {
          const name = el.dataset.name || '';
          const code = el.dataset.code || '';
          showTooltip(`${name} · ${code}`);
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

      // Calcolo reattivo su input reddito (debounce)
      let t = 0;
      function scheduleCalc() {
        window.clearTimeout(t);
        t = window.setTimeout(() => {
          if (state.step >= 3) runReactiveCalc();
        }, 260);
      }
      if (els.inputIncome) {
        els.inputIncome.addEventListener('input', scheduleCalc);
      }

      // Se per qualsiasi motivo cambia la select hidden, ricalcola (stato sempre sincronizzato)
      if (els.selectRegion) {
        els.selectRegion.addEventListener('change', () => {
          state.regionValue = String(els.selectRegion.value || '');
          if (els.uiRegionLabel) els.uiRegionLabel.textContent = state.regionValue || '—';
          if (state.step >= 3) scheduleCalc();
        });
      }

      // Stato iniziale
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
