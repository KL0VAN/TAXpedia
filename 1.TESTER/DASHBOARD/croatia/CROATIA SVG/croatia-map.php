<?php
declare(strict_types=1);

if (!function_exists('hrlp_get_lang')) {
  function hrlp_get_lang() {
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
$HRLP_MAP_META_TITLE = ($HRLP_LANG === 'en') ? 'Interactive Map of Croatian Counties - TAXpedia' : 'Mappa Interattiva Contee Croazia - TAXpedia';

/**
 * Croazia - mappa SVG interattiva (21 contee + Grad Zagreb)
 * Dipende da: croatiaHigh.svg (stessa cartella)
 */

$svgFile = __DIR__ . '/croatiaHigh.svg';

$REGIONS_HR = [
  'HR-01' => ['slug' => 'zagrebacka',               'name' => 'Zagrebačka županija',              'code' => 'HR-01'],
  'HR-02' => ['slug' => 'krapinsko-zagorska',       'name' => 'Krapinsko-zagorska županija',      'code' => 'HR-02'],
  'HR-03' => ['slug' => 'sisacko-moslavacka',       'name' => 'Sisačko-moslavačka županija',      'code' => 'HR-03'],
  'HR-04' => ['slug' => 'karlovacka',               'name' => 'Karlovačka županija',              'code' => 'HR-04'],
  'HR-05' => ['slug' => 'varazdinska',              'name' => 'Varaždinska županija',             'code' => 'HR-05'],
  'HR-06' => ['slug' => 'koprivnicko-krizevacka',   'name' => 'Koprivničko-križevačka županija',  'code' => 'HR-06'],
  'HR-07' => ['slug' => 'bjelovarsko-bilogorska',   'name' => 'Bjelovarsko-bilogorska županija',  'code' => 'HR-07'],
  'HR-08' => ['slug' => 'primorsko-goranska',       'name' => 'Primorsko-goranska županija',      'code' => 'HR-08'],
  'HR-09' => ['slug' => 'licko-senjska',            'name' => 'Ličko-senjska županija',           'code' => 'HR-09'],
  'HR-10' => ['slug' => 'viroviticko-podravska',    'name' => 'Virovitičko-podravska županija',   'code' => 'HR-10'],
  'HR-11' => ['slug' => 'pozesko-slavonska',        'name' => 'Požeško-slavonska županija',       'code' => 'HR-11'],
  'HR-12' => ['slug' => 'brodsko-posavska',         'name' => 'Brodsko-posavska županija',        'code' => 'HR-12'],
  'HR-13' => ['slug' => 'zadarska',                 'name' => 'Zadarska županija',                'code' => 'HR-13'],
  'HR-14' => ['slug' => 'osjecko-baranjska',        'name' => 'Osječko-baranjska županija',       'code' => 'HR-14'],
  'HR-15' => ['slug' => 'sibensko-kninska',         'name' => 'Šibensko-kninska županija',        'code' => 'HR-15'],
  'HR-16' => ['slug' => 'vukovarsko-srijemska',     'name' => 'Vukovarsko-srijemska županija',    'code' => 'HR-16'],
  'HR-17' => ['slug' => 'splitsko-dalmatinska',     'name' => 'Splitsko-dalmatinska županija',    'code' => 'HR-17'],
  'HR-18' => ['slug' => 'istarska',                 'name' => 'Istarska županija',                'code' => 'HR-18'],
  'HR-19' => ['slug' => 'dubrovacko-neretvanska',   'name' => 'Dubrovačko-neretvanska županija',  'code' => 'HR-19'],
  'HR-20' => ['slug' => 'medimurska',               'name' => 'Međimurska županija',              'code' => 'HR-20'],
  'HR-21' => ['slug' => 'grad-zagreb',              'name' => 'Grad Zagreb',                      'code' => 'HR-21'],
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

  // Root SVG: responsivo
  $svgEl->setAttribute('class', 'tp-map');
  // Bounding box coerente con il tuo SVG (ammap): 0..612 x 0..598 + padding
  $svgEl->setAttribute('viewBox', '-8 -8 628 615');
  $svgEl->setAttribute('preserveAspectRatio', 'xMidYMid meet');
  $svgEl->setAttribute('role', 'img');
  $svgEl->setAttribute('aria-label', 'Mappa interattiva della Croazia (contee)');

  // Rimuove eventuali <style> interni
  foreach ($xpath->query('//svg:style') as $styleNode) {
    $styleNode->parentNode?->removeChild($styleNode);
  }

  // Normalizza i path delle contee
  foreach ($xpath->query('//svg:path') as $p) {
    if (!($p instanceof DOMElement)) continue;

    $origId = $p->getAttribute('id');
    if (!isset($regions[$origId])) {
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
    $p->setAttribute('title', $r['name']);
  }

  return $doc->saveXML($svgEl) ?: '<!-- ERRORE: impossibile serializzare SVG -->';
}

$svgMarkup = load_and_prepare_svg($svgFile, $REGIONS_HR);
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($HRLP_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo htmlspecialchars($HRLP_MAP_META_TITLE, ENT_QUOTES, 'UTF-8'); ?></title>
  <link rel="stylesheet" href="croatia-map.css" />
  <script src="croatia-map.js" defer></script>
</head>
<body>

  <main class="page">
    <header class="page__header">
      <h1 class="page__title">Croazia — Contee (SVG interattivo)</h1>
      <p class="page__subtitle">Hover e click su una contea per ottenere nome e codice.</p>
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
