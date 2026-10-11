<?php
declare(strict_types=1);

$dashboardSiteRoot = dirname(__DIR__, 3);
require_once $dashboardSiteRoot . '/i18n/i18n.php';
$DASH_LANG = tp_lang() === 'en' ? 'en' : 'it';
$DASH_DATA = require __DIR__ . '/countries-data.php';
$DASH_BASE = '/1.TESTER/DASHBOARD';

function dash_h($value): string {
  return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function dash_t(string $it, string $en): string {
  global $DASH_LANG;
  return $DASH_LANG === 'en' ? $en : $it;
}

function dash_url(string $path, array $parameters = []): string {
  global $DASH_LANG;
  $parameters['lang'] = $DASH_LANG;
  return $path . '?' . http_build_query($parameters);
}

function dash_name(array $country): string {
  global $DASH_LANG;
  return $country['name_' . $DASH_LANG];
}

function dash_metric_value(array $metric, array $country): string {
  global $DASH_DATA, $DASH_LANG;
  $value = $country['metrics'][$metric['key']] ?? null;
  if ($value === null) return dash_t('Dato non disponibile', 'Data not available');

  if ($metric['fmt'] === 'translated_text') {
    return $DASH_DATA['value_labels'][$value][$DASH_LANG] ?? dash_t('Dato non disponibile', 'Data not available');
  }
  if ($metric['fmt'] === 'eur0') {
    return '€' . number_format((float) $value, 0, dash_t(',', '.'), dash_t('.', ',')) . dash_t(' / anno', ' / year');
  }
  if ($metric['fmt'] === 'pct1') {
    return number_format((float) $value, 1, dash_t(',', '.'), dash_t('.', ',')) . '%';
  }
  return (string) $value;
}

function dash_metric_meta(string $key, array $country): array {
  global $DASH_DATA;
  return array_replace($DASH_DATA['metric_metadata'][$key] ?? [], $country['metric_meta'][$key] ?? []);
}

function dash_articles(array $country): array {
  global $dashboardSiteRoot;
  $articles = require $dashboardSiteRoot . '/article/article_data.php';
  $matches = array_filter($articles, static function (array $article) use ($country, $dashboardSiteRoot): bool {
    if (isset($article['in_archive']) && !$article['in_archive']) return false;
    $path = $article['link'] ?? '';
    // Country-related articles only: exclude calculator cards and unavailable files.
    if (strpos($path, '/article/') !== 0 || !is_file($dashboardSiteRoot . $path)) return false;
    if (!empty($article['countries'])) return in_array($country['code'], $article['countries'], true);
    return ($article['country_it'] ?? '') === $country['name_it'] || ($article['country_en'] ?? '') === $country['name_en'];
  });
  // Retain the archive's editorial ordering; do not infer dates from inconsistent metadata.
  usort($matches, static function (array $a, array $b): int {
    return ($a['archive_order'] ?? PHP_INT_MAX) <=> ($b['archive_order'] ?? PHP_INT_MAX);
  });
  return array_slice($matches, 0, 4);
}

function dash_article_text(array $article, string $key): string {
  global $DASH_LANG;
  return (string) (($article[$key . '_' . $DASH_LANG] ?? '') ?: ($article[$key . '_it'] ?? ''));
}
