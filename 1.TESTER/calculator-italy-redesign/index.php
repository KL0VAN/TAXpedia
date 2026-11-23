<?php
declare(strict_types=1);

// Isolated presentation adapter: render the existing page, then adapt only its UI.
// Fiscal code and datasets stay in calculator/italia/calculatorItalia.js.
$prototypeRoot = dirname(__DIR__, 2);
header('X-Robots-Tag: noindex, nofollow');
if (!class_exists('DOMDocument')) {
  http_response_code(503);
  exit('This development prototype requires the PHP DOM extension.');
}
ob_start();
require $prototypeRoot . '/calculator/italia/italia.php';
$prototypeHtml = (string) ob_get_clean();

$prototypeEnglish = $ITLP_LANG === 'en';
$prototypeText = static function (string $it, string $en) use ($prototypeEnglish): string {
  return $prototypeEnglish ? $en : $it;
};
$prototypeDocument = new DOMDocument('1.0', 'UTF-8');
$prototypeDocument->loadHTML('<?xml encoding="UTF-8">' . $prototypeHtml, LIBXML_NONET | LIBXML_NOERROR | LIBXML_NOWARNING);
foreach (iterator_to_array($prototypeDocument->childNodes) as $prototypeNode) {
  if ($prototypeNode->nodeType === XML_PI_NODE) $prototypeDocument->removeChild($prototypeNode);
}
$prototypeXPath = new DOMXPath($prototypeDocument);
$prototypeElement = static function (string $tag, string $class = '', string $text = '') use ($prototypeDocument): DOMElement {
  $element = $prototypeDocument->createElement($tag);
  if ($class !== '') $element->setAttribute('class', $class);
  if ($text !== '') $element->appendChild($prototypeDocument->createTextNode($text));
  return $element;
};

// Resolve the original page's relative assets against its own directory.
$prototypeLocalUrl = static function (string $value): string {
  if ($value === '' || $value[0] === '/' || $value[0] === '#' || preg_match('/^[a-z][a-z0-9+.-]*:/i', $value)) return $value;
  $segments = [];
  foreach (explode('/', '/calculator/italia/' . $value) as $segment) {
    if ($segment === '..') array_pop($segments);
    elseif ($segment !== '' && $segment !== '.') $segments[] = $segment;
  }
  return '/' . implode('/', $segments);
};
foreach ($prototypeXPath->query('//*[@href or @src]') as $prototypeNode) {
  foreach (['href', 'src'] as $attribute) {
    if ($prototypeNode->hasAttribute($attribute)) $prototypeNode->setAttribute($attribute, $prototypeLocalUrl($prototypeNode->getAttribute($attribute)));
  }
}

// Remove only the original wizard's UI controller. Keep the fiscal engine intact.
// Local prototype previews must not be counted as public analytics visits.
$prototypeControllersRemoved = 0;
foreach (iterator_to_array($prototypeDocument->getElementsByTagName('script')) as $prototypeNode) {
  $controller = strpos($prototypeNode->textContent, 'STATE + FLOW CONTROLLER') !== false;
  $analytics = strpos($prototypeNode->getAttribute('src'), 'statcounter.com') !== false || strpos($prototypeNode->textContent, 'var sc_project=') !== false;
  if ($controller || $analytics) {
    $prototypeNode->parentNode->removeChild($prototypeNode);
    if ($controller) $prototypeControllersRemoved++;
  }
}
foreach (iterator_to_array($prototypeXPath->query('//noscript[.//img[contains(@src,"statcounter")]]')) as $prototypeNode) $prototypeNode->parentNode->removeChild($prototypeNode);

$prototypeMain = $prototypeDocument->getElementById('main');
$prototypeInputCard = $prototypeDocument->getElementById('slide-1');
$prototypeMap = $prototypeDocument->getElementById('slide-2');
$prototypeSelect = $prototypeDocument->getElementById('regione');
$prototypeResults = $prototypeDocument->getElementById('risultati');
if ($prototypeControllersRemoved !== 1 || !$prototypeMain || !$prototypeInputCard || !$prototypeMap || !$prototypeSelect || !$prototypeResults) {
  http_response_code(503);
  exit('The source calculator layout changed. Review the isolated prototype adapter.');
}
$prototypeBody = $prototypeDocument->getElementsByTagName('body')->item(0);
$prototypeBody->setAttribute('class', trim($prototypeBody->getAttribute('class') . ' italy-redesign-prototype'));
$prototypeBody->setAttribute('data-step', 'prototype');
$prototypeMain->setAttribute('class', 'container prototype-page');
$prototypeInputCard->setAttribute('aria-label', $prototypeText('Dati per il calcolo', 'Calculation inputs'));
$prototypeMap->setAttribute('aria-label', $prototypeText('Mappa delle regioni', 'Map of regions'));
$prototypeDocument->getElementById('slide-3')->setAttribute('aria-label', $prototypeText('Risultati del calcolo', 'Calculation results'));
foreach ($prototypeXPath->query('//*[contains(concat(" ", normalize-space(@class), " "), " tp-map ")]') as $prototypeNode) {
  $prototypeNode->setAttribute('role', 'group');
  $prototypeNode->setAttribute('aria-label', $prototypeText('Mappa interattiva delle regioni italiane', 'Interactive map of Italian regions'));
}
foreach ($prototypeXPath->query('//*[@data-value and @data-code]') as $prototypeNode) {
  $prototypeRegionKey = $prototypeNode->getAttribute('data-value');
  $prototypeRegionName = $ITLP_REGION_LABELS[$prototypeRegionKey][$ITLP_LANG] ?? $prototypeNode->getAttribute('data-name');
  $prototypeNode->setAttribute('data-name', $prototypeRegionName);
  $prototypeNode->setAttribute('aria-label', $prototypeRegionName . ' (' . $prototypeNode->getAttribute('data-code') . ')');
}
foreach ($prototypeXPath->query('//*[contains(concat(" ", normalize-space(@class), " "), " tp-map-scope ")]') as $prototypeNode) {
  $prototypeNode->setAttribute('aria-label', $prototypeText('Seleziona una regione dalla mappa', 'Select a region on the map'));
}

$prototypeNotice = $prototypeElement('div', 'prototype-notice');
$prototypeNotice->appendChild($prototypeElement('span', '', $prototypeText('Prototipo italiano · fase 1', 'Italian prototype · phase 1')));
$prototypeCurrent = $prototypeElement('a', '', $prototypeText('Versione attuale', 'Current calculator'));
$prototypeCurrent->setAttribute('href', '/calculator/italia/italia.php?' . http_build_query(['lang'=>$ITLP_LANG]));
$prototypeNotice->appendChild($prototypeCurrent);
$prototypeMain->insertBefore($prototypeNotice, $prototypeMain->firstChild);

$prototypeIntro = $prototypeElement('div', 'prototype-intro');
$prototypeMain->insertBefore($prototypeIntro, $prototypeInputCard);
$prototypeCopy = $prototypeElement('div', 'prototype-intro-copy');
$prototypeIntro->appendChild($prototypeCopy);
foreach (iterator_to_array($prototypeMain->childNodes) as $prototypeNode) {
  if ($prototypeNode instanceof DOMElement && ($prototypeNode->getAttribute('class') === 'page-title' || $prototypeNode->getAttribute('class') === 'subtitle')) $prototypeCopy->appendChild($prototypeNode);
}
$prototypeIntro->appendChild($prototypeInputCard);

$prototypeRegionRow = $prototypeSelect->parentNode;
$prototypeRegionRow->setAttribute('class', 'input-row prototype-region-row');
$prototypeRegionLabel = $prototypeElement('label', 'label', $prototypeText('Regione per l’addizionale', 'Region for the surtax'));
$prototypeRegionLabel->setAttribute('for', 'regione');
$prototypeRegionRow->insertBefore($prototypeRegionLabel, $prototypeSelect);
$prototypeSelect->setAttribute('aria-label', $prototypeText('Regione per l’addizionale', 'Region for the surtax'));
foreach ($prototypeXPath->query('.//p[contains(@class,"tp-muted")]', $prototypeInputCard) as $prototypeNode) {
  $prototypeNode->textContent = $prototypeText('Puoi scegliere la regione dall’elenco o dalla mappa.', 'Choose the region from the list or the map.');
}
$prototypeMapDetails = $prototypeElement('details', 'prototype-map');
$prototypeMapDetails->setAttribute('id', 'prototype-map');
$prototypeMain->insertBefore($prototypeMapDetails, $prototypeMap);
$prototypeMapDetails->appendChild($prototypeElement('summary', '', $prototypeText('Scegli dalla mappa', 'Choose on the map')));
$prototypeMapDetails->appendChild($prototypeMap);
$prototypeTooltip = $prototypeDocument->getElementById('map-tooltip');
$prototypeTooltip->removeAttribute('aria-hidden');
$prototypeTooltip->setAttribute('role', 'status');
$prototypeTooltip->textContent = $prototypeText('Seleziona una regione.', 'Select a region.');

$prototypeResults->removeAttribute('aria-live');
$prototypeResults->removeAttribute('aria-atomic');
foreach ($prototypeXPath->query('./h2', $prototypeResults) as $prototypeNode) $prototypeNode->setAttribute('aria-live', 'polite');
$prototypeContext = $prototypeElement('div', 'prototype-context');
$prototypeContext->appendChild($prototypeElement('p', '', $prototypeText('Il totale stimato comprende imposta statale e addizionale regionale, se selezionata. La quota UE è già compresa nel riparto statale.', 'The estimated total includes national income tax and the regional surtax, if selected. The EU allocation is already included in the national breakdown.')));
$prototypeContext->appendChild($prototypeElement('p', 'prototype-rounding', $prototypeText('I totali dei grafici sommano le voci arrotondate del modello: sono possibili differenze di pochi centesimi rispetto alle imposte stimate.', 'Chart totals sum the model’s rounded category amounts: they may differ by a few cents from estimated taxes.')));
foreach ($prototypeXPath->query('./p[contains(@class,"results-head")]', $prototypeResults) as $prototypeNode) {
  $prototypeNode->textContent = $prototypeText('Seleziona una voce dalla legenda o dal grafico per consultarne il dettaglio.', 'Select a category in the legend or chart to inspect its details.');
  $prototypeResults->insertBefore($prototypeContext, $prototypeNode->nextSibling);
}
$prototypeInvalid = $prototypeElement('p', 'prototype-stale', $prototypeText('Controlla i dati inseriti. I risultati mostrati si riferiscono all’ultimo calcolo valido.', 'Check your inputs. The results shown are from the last valid calculation.'));
$prototypeInvalid->setAttribute('id', 'prototype-stale');
$prototypeInvalid->setAttribute('hidden', '');
$prototypeResults->insertBefore($prototypeInvalid, $prototypeResults->firstChild);
foreach ($prototypeXPath->query('//*[@id="slide-3"]/div/h2 | //*[@id="slide-3"]/div/p | //*[@id="slide-3"]//div[contains(@class,"tp-pill")]', $prototypeMain) as $prototypeNode) $prototypeNode->setAttribute('class', trim($prototypeNode->getAttribute('class') . ' prototype-original-hint'));

$prototypeNoScript = $prototypeElement('noscript', 'prototype-noscript', $prototypeText('Questo calcolatore richiede JavaScript per elaborare il reddito e visualizzare i risultati.', 'This calculator needs JavaScript to process income and display results.'));
$prototypeMain->insertBefore($prototypeNoScript, $prototypeIntro);

// Reuse only existing editorial summaries. Regional categories with no linked
// verified content get a neutral, explicit fallback in the presentation layer.
require_once $prototypeRoot . '/article/article_helpers.php';
$prototypeArticles = [];
foreach (tp_article_public_cards(null, $ITLP_LANG) as $prototypeCard) {
  $prototypeArticles[$prototypeCard['link']] = [
    'excerpt'=>tp_article_text($prototypeCard, 'excerpt', $ITLP_LANG),
    'title'=>tp_article_text($prototypeCard, 'title', $ITLP_LANG),
  ];
}
$prototypeConfig = [
  'lang'=>$ITLP_LANG,
  'articles'=>$prototypeArticles,
  'text'=>[
    'legend'=>$prototypeText('Voci di spesa', 'Spending categories'),
    'selected'=>$prototypeText('Voce selezionata', 'Selected category'),
    'share'=>$prototypeText('del totale del grafico', 'of this chart’s total'),
    'total'=>$prototypeText('Totale rappresentato', 'Total represented'),
    'national'=>$prototypeText('Riparto statale', 'National allocation'),
    'eu'=>$prototypeText('Quota UE', 'EU allocation'),
    'regional'=>$prototypeText('Riparto regionale', 'Regional allocation'),
    'fallback'=>$prototypeText('Il calcolatore non fornisce una descrizione verificata aggiuntiva per questa voce.', 'The calculator provides no additional verified description for this category.'),
    'article'=>$prototypeText('Leggi l’approfondimento', 'Read the article'),
    'keyboard'=>$prototypeText('Usa la legenda o i tasti freccia sul grafico per selezionare una voce.', 'Use the legend or the chart’s arrow keys to select a category.'),
    'empty'=>$prototypeText('Nessun importo da ripartire', 'No amount to allocate'),
  ],
];
$prototypeHead = $prototypeDocument->getElementsByTagName('head')->item(0);
$prototypeRobots = $prototypeElement('meta');
$prototypeRobots->setAttribute('name', 'robots');
$prototypeRobots->setAttribute('content', 'noindex, nofollow');
$prototypeHead->appendChild($prototypeRobots);
$prototypeStyle = $prototypeElement('link');
$prototypeStyle->setAttribute('rel', 'stylesheet');
$prototypeStyle->setAttribute('href', '/1.TESTER/calculator-italy-redesign/prototype.css?v=' . filemtime(__DIR__ . '/prototype.css'));
$prototypeHead->appendChild($prototypeStyle);
$prototypeConfigNode = $prototypeElement('script');
$prototypeConfigNode->setAttribute('type', 'application/json');
$prototypeConfigNode->setAttribute('id', 'prototype-config');
$prototypeConfigNode->appendChild($prototypeDocument->createTextNode(json_encode($prototypeConfig, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_THROW_ON_ERROR)));
$prototypeHead->appendChild($prototypeConfigNode);
$prototypeScript = $prototypeElement('script');
$prototypeScript->setAttribute('defer', '');
$prototypeScript->setAttribute('src', '/1.TESTER/calculator-italy-redesign/prototype.js?v=' . filemtime(__DIR__ . '/prototype.js'));
$prototypeHead->appendChild($prototypeScript);
$prototypeDocument->getElementsByTagName('title')->item(0)->textContent = $prototypeText('Italia · Prototipo calcolatore — TAXpedia', 'Italy · Calculator prototype — TAXpedia');
echo $prototypeDocument->saveHTML();
