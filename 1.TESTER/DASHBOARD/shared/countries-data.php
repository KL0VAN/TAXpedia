<?php
declare(strict_types=1);

// Read existing editorial data; never substitute Italian figures for other countries.
$source = require dirname(__DIR__, 3) . '/tools/country_data.php';

// Keep the public calculator menu's order and existing folder names.
$routes = [
  'IT' => 'italia', 'FR' => 'france', 'DE' => 'germany',
  'ES' => 'spain', 'BE' => 'belgium', 'NL' => 'netherlands',
  'LU' => 'luxembourg', 'AT' => 'austria', 'HR' => 'croatia',
  'PL' => 'poland', 'PT' => 'portugal', 'SI' => 'slovenia',
  'BG' => 'bulgaria', 'CZ' => 'czech', 'DK' => 'denmark',
  'GR' => 'greece', 'HU' => 'hungary', 'IE' => 'ireland',
  'RO' => 'romania', 'SE' => 'sweden', 'LV' => 'latvia',
  'EE' => 'estonia', 'LT' => 'lithuania', 'SK' => 'slovakia',
  'FI' => 'finland', 'CY' => 'cyprus', 'MT' => 'malta',
];

$countries = [];
foreach ($routes as $code => $slug) {
  $country = $source['countries'][$code];
  $countries[$code] = [
    'code' => $code,
    'slug' => $slug,
    'name_it' => $country['name_it'],
    'name_en' => $country['name_en'],
    'flag_path' => $country['flag_path'],
    'calculator_path' => '/calculator/' . $slug . '/' . $slug . '.php',
    'metrics' => $country['metrics'],
    'metric_meta' => $country['metric_meta'] ?? [],
  ];
}

return [
  'countries' => $countries,
  'metrics' => $source['metrics'],
  'metric_metadata' => $source['metric_metadata'],
  'sources' => $source['sources'],
  'value_labels' => $source['value_labels'],
];
