<?php
declare(strict_types=1);

/**
 * Italia - mappa SVG interattiva (regioni)
 * Dipende da: italyHigh.svg (stessa cartella)
 */

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
$ITLP_LANG = itlp_get_lang();

$svgFile = __DIR__ . '/italyHigh.svg';

$REGIONS_IT = [
  // Nord
  'IT-23' => ['slug' => 'valle-daosta',           'name' => "Valle d'Aosta/Vallée d'Aoste",      'code' => 'IT-23'],
  'IT-21' => ['slug' => 'piemonte',               'name' => 'Piemonte',                           'code' => 'IT-21'],
  'IT-25' => ['slug' => 'lombardia',              'name' => 'Lombardia',                          'code' => 'IT-25'],
  'IT-34' => ['slug' => 'veneto',                 'name' => 'Veneto',                             'code' => 'IT-34'],
  'IT-36' => ['slug' => 'friuli-venezia-giulia',  'name' => 'Friuli-Venezia Giulia',             'code' => 'IT-36'],
  'IT-42' => ['slug' => 'liguria',                'name' => 'Liguria',                            'code' => 'IT-42'],
  'IT-45' => ['slug' => 'emilia-romagna',         'name' => 'Emilia-Romagna',                     'code' => 'IT-45'],
  'IT-32' => ['slug' => 'trentino-alto-adige',    'name' => 'Trentino-Alto Adige/Südtirol',       'code' => 'IT-32'],

  // Centro
  'IT-52' => ['slug' => 'toscana',                'name' => 'Toscana',                            'code' => 'IT-52'],
  'IT-55' => ['slug' => 'umbria',                 'name' => 'Umbria',                             'code' => 'IT-55'],
  'IT-57' => ['slug' => 'marche',                 'name' => 'Marche',                             'code' => 'IT-57'],
  'IT-62' => ['slug' => 'lazio',                  'name' => 'Lazio',                              'code' => 'IT-62'],

  // Sud e isole
  'IT_65' => ['slug' => 'abruzzo',                'name' => 'Abruzzo',                            'code' => 'IT-65'], // nel tuo SVG è IT_65
  'IT-67' => ['slug' => 'molise',                 'name' => 'Molise',                             'code' => 'IT-67'],
  'IT-72' => ['slug' => 'campania',               'name' => 'Campania',                           'code' => 'IT-72'],
  'IT-75' => ['slug' => 'puglia',                 'name' => 'Puglia',                             'code' => 'IT-75'],
  'IT-77' => ['slug' => 'basilicata',             'name' => 'Basilicata',                         'code' => 'IT-77'],
  'IT-78' => ['slug' => 'calabria',               'name' => 'Calabria',                           'code' => 'IT-78'],
  'IT-82' => ['slug' => 'sicilia',                'name' => 'Sicilia',                            'code' => 'IT-82'],
  'IT-88' => ['slug' => 'sardegna',               'name' => 'Sardegna',                           'code' => 'IT-88'],
];

function load_and_prepare_svg(string $svgFile, array $regions): string {
  if (!is_file($svgFile)) {
    http_response_code(500);
    return '<!-- ERRORE: File SVG non trovato: ' . htmlspecialchars($svgFile, ENT_QUOTES, 'UTF-8') . ' -->';
  }

  $raw = file_get_contents($svgFile);
  if ($raw === false) {
    http_response_code(500);
    return '<!-- ERRORE: Impossibile leggere il file SVG -->';
  }

  // Rimuove BOM UTF-8 se presente
  $raw = preg_replace('/^\xEF\xBB\xBF/', '', $raw ?? '') ?? '';

  libxml_use_internal_errors(true);

  $doc = new DOMDocument();
  $doc->preserveWhiteSpace = false;
  $doc->formatOutput = false;

  if (!$doc->loadXML($raw)) {
    http_response_code(500);
    return '<!-- ERRORE: SVG non valido (XML parse error) -->';
  }

  $xpath = new DOMXPath($doc);
  $xpath->registerNamespace('svg', 'http://www.w3.org/2000/svg');

  /** @var DOMElement|null $svgEl */
  $svgEl = $doc->getElementsByTagName('svg')->item(0);
  if (!$svgEl) {
    http_response_code(500);
    return '<!-- ERRORE: Elemento <svg> non trovato -->';
  }

  // Root SVG: rendilo responsivo e “embeddabile”
  $svgEl->setAttribute('class', 'tp-map');
  $svgEl->setAttribute('viewBox', '-5 -5 630 810');
  $svgEl->setAttribute('preserveAspectRatio', 'xMidYMid meet');
  $svgEl->setAttribute('role', 'img');
  $svgEl->setAttribute('aria-label', 'Mappa interattiva delle regioni italiane');

  // Rimuove eventuali <style> interni nello SVG (così comandi tu da CSS esterno)
  foreach ($xpath->query('//svg:style') as $styleNode) {
    $styleNode->parentNode?->removeChild($styleNode);
  }

  // Tieni solo i path delle regioni, e normalizza attributi (id + data-*)
  $paths = $xpath->query('//svg:path');
  foreach ($paths as $p) {
    if (!($p instanceof DOMElement)) continue;

    $origId = $p->getAttribute('id');
    if (!isset($regions[$origId])) {
      // elimina Vaticano/San Marino/Corsica/Malta ecc.
      $p->parentNode?->removeChild($p);
      continue;
    }

    $r = $regions[$origId];
    $newId = 'region-' . $r['slug'];

    $p->setAttribute('id', $newId);
    $p->setAttribute('class', 'tp-region');
    $p->setAttribute('data-name', $r['name']);
    $p->setAttribute('data-code', $r['code']);
    $p->setAttribute('tabindex', '0');
    $p->setAttribute('role', 'button');
    $p->setAttribute('aria-label', $r['name'] . ' (' . $r['code'] . ')');
    $p->setAttribute('vector-effect', 'non-scaling-stroke');

    // Title utile come fallback tooltip nativo
    $p->setAttribute('title', $r['name']);
  }

  // Output solo del nodo <svg> (senza XML declaration)
  return $doc->saveXML($svgEl) ?: '<!-- ERRORE: impossibile serializzare SVG -->';
}

$svgMarkup = load_and_prepare_svg($svgFile, $REGIONS_IT);
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($ITLP_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Mappa Regioni Italia</title>
  <link rel="stylesheet" href="italia-map.css" />
  <script src="italia-map.js" defer></script>
</head>
<body>

  <main class="page">
    <header class="page__header">
      <h1 class="page__title">Italia — Regioni (SVG interattivo)</h1>
      <p class="page__subtitle">Hover e click su una regione per ottenere nome e codice.</p>
    </header>

    <section class="map-card" aria-label="Mappa interattiva">
      <div class="map-wrap">
        <?= $svgMarkup ?>
      </div>
      <div id="map-tooltip" class="map-tooltip" aria-hidden="true"></div>
    </section>
  </main>

</body>
</html>
