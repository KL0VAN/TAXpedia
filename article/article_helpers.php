<?php
declare(strict_types=1);

// Selection is shared; each consumer retains its own layout and display policy.
function tp_article_h($value): string {
  return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function tp_article_text(array $card, string $key, string $lang): string {
  return (string) (($card[$key . '_' . $lang] ?? '') ?: ($card[$key . '_it'] ?? ''));
}

function tp_article_normalize(string $value): string {
  // Also works on hosts without mbstring or intl, including decomposed accents.
  $value = strtr($value, [
    'À'=>'a','Á'=>'a','Â'=>'a','Ã'=>'a','Ä'=>'a','Å'=>'a','à'=>'a','á'=>'a','â'=>'a','ã'=>'a','ä'=>'a','å'=>'a',
    'Æ'=>'ae','æ'=>'ae','Ç'=>'c','ç'=>'c','Ć'=>'c','ć'=>'c','Č'=>'c','č'=>'c',
    'È'=>'e','É'=>'e','Ê'=>'e','Ë'=>'e','è'=>'e','é'=>'e','ê'=>'e','ë'=>'e','Ě'=>'e','ě'=>'e',
    'Ì'=>'i','Í'=>'i','Î'=>'i','Ï'=>'i','ì'=>'i','í'=>'i','î'=>'i','ï'=>'i',
    'Ñ'=>'n','ñ'=>'n','Ń'=>'n','ń'=>'n','Ò'=>'o','Ó'=>'o','Ô'=>'o','Õ'=>'o','Ö'=>'o','Ø'=>'o',
    'ò'=>'o','ó'=>'o','ô'=>'o','õ'=>'o','ö'=>'o','ø'=>'o','Œ'=>'oe','œ'=>'oe',
    'Ù'=>'u','Ú'=>'u','Û'=>'u','Ü'=>'u','ù'=>'u','ú'=>'u','û'=>'u','ü'=>'u',
    'Ý'=>'y','Ÿ'=>'y','ý'=>'y','ÿ'=>'y','Š'=>'s','š'=>'s','Ś'=>'s','ś'=>'s','ß'=>'ss',
    'Ž'=>'z','ž'=>'z','Ź'=>'z','ź'=>'z','Ż'=>'z','ż'=>'z','Ł'=>'l','ł'=>'l',
    'Ř'=>'r','ř'=>'r','Ť'=>'t','ť'=>'t','Ď'=>'d','ď'=>'d','Đ'=>'d','đ'=>'d',
    'Ğ'=>'g','ğ'=>'g','İ'=>'i','ı'=>'i','Ő'=>'o','ő'=>'o','Ű'=>'u','ű'=>'u',
  ]);
  return strtolower(trim(preg_replace('/\p{M}+/u', '', $value) ?? $value));
}

function tp_article_countries(): array {
  static $countries;
  if ($countries === null) {
    $data = require __DIR__ . '/../tools/country_data.php';
    $countries = $data['countries'];
  }
  return $countries;
}

function tp_article_topics(): array {
  return [
    'taxes' => ['it'=>'Tasse', 'en'=>'Taxes'],
    'public-spending' => ['it'=>'Spesa pubblica', 'en'=>'Public spending'],
    'economy' => ['it'=>'Economia', 'en'=>'Economy'],
    'infrastructure' => ['it'=>'Infrastrutture e trasporti', 'en'=>'Infrastructure and transport'],
    'education' => ['it'=>'Istruzione e ricerca', 'en'=>'Education and research'],
    'european-policy' => ['it'=>'Politiche europee', 'en'=>'European policy'],
    'health' => ['it'=>'Sanità', 'en'=>'Healthcare'],
    'environment' => ['it'=>'Ambiente', 'en'=>'Environment'],
    'welfare' => ['it'=>'Welfare e pensioni', 'en'=>'Welfare and pensions'],
    'defence' => ['it'=>'Difesa e sicurezza', 'en'=>'Defence and security'],
    'culture' => ['it'=>'Cultura e sport', 'en'=>'Culture and sport'],
    'institutions' => ['it'=>'Istituzioni e giustizia', 'en'=>'Institutions and justice'],
  ];
}

function tp_article_types(): array {
  return [
    'article' => ['it'=>'Articolo', 'en'=>'Article'],
    'sector' => ['it'=>'Settore', 'en'=>'Sector'],
    'tool' => ['it'=>'Strumento / novità', 'en'=>'Tool / news'],
  ];
}

function tp_article_country_code(string $value): ?string {
  $key = tp_article_normalize($value);
  if ($key === '') return '';
  if (in_array($key, ['eu', 'europe', 'europa', 'european union', 'unione europea'], true)) return 'EU';
  foreach (tp_article_countries() as $code => $country) {
    if (in_array($key, [strtolower($code), tp_article_normalize($country['name_it']), tp_article_normalize($country['name_en'])], true)) return $code;
  }
  return null;
}

function tp_article_local_file(string $path): bool {
  if ($path === '' || $path[0] !== '/' || strpbrk($path, "\\\0?#") !== false) return false;
  if (in_array('..', explode('/', $path), true)) return false;
  $root = str_replace('\\', '/', (string) realpath(__DIR__ . '/..')) . '/';
  $resolved = realpath($root . ltrim($path, '/'));
  return $resolved !== false && strpos(str_replace('\\', '/', $resolved), $root) === 0 && is_file($resolved);
}

function tp_article_valid_date(string $value): bool {
  if (!preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/D', $value)) return false;
  $date = DateTimeImmutable::createFromFormat('!Y-m-d', $value);
  return $date !== false && $date->format('Y-m-d') === $value;
}

function tp_article_registry(): array {
  static $cards;
  if ($cards === null) $cards = require __DIR__ . '/article_data.php';
  return $cards;
}

function tp_article_public_cards(?array $cards = null, ?string $lang = null): array {
  $result = [];
  foreach ($cards ?? tp_article_registry() as $card) {
    if (!is_array($card) || ($card['status'] ?? '') !== 'published' || empty($card['in_archive'])) continue;
    if (empty($card['id']) || !isset(tp_article_types()[$card['content_type'] ?? ''])) continue;
    if (!tp_article_valid_date((string) ($card['date_iso'] ?? ''))) continue;
    if (!tp_article_local_file((string) ($card['link'] ?? ''))) continue;
    if ($lang !== null && !in_array($lang, $card['languages'] ?? [], true)) continue;
    if (!tp_article_local_file((string) ($card['thumb'] ?? ''))) $card['thumb'] = '';
    $result[] = $card;
  }
  return $result;
}

function tp_article_filters(array $input): array {
  $filters = ['country'=>'', 'topic'=>'', 'type'=>'', 'q'=>'', 'sort'=>'newest', 'page'=>1, 'invalid'=>false];
  foreach (['country', 'topic', 'type', 'q', 'sort', 'page'] as $key) {
    if (!isset($input[$key])) continue;
    if (!is_string($input[$key]) || strlen($input[$key]) > ($key === 'q' ? 500 : 100) || !preg_match('//u', $input[$key])) {
      $filters['invalid'] = true;
      continue;
    }
    $raw = trim($input[$key]);
    if ($key === 'country') {
      $code = tp_article_country_code($raw);
      if ($code === null) $filters['invalid'] = true;
      $filters[$key] = $code ?? '';
    } elseif ($key === 'page') {
      if (!preg_match('/^[1-9][0-9]{0,5}$/D', $raw)) $filters['invalid'] = true;
      else $filters[$key] = (int) $raw;
    } elseif ($key === 'sort') {
      if ($raw !== 'newest') $filters['invalid'] = true;
    } else {
      $filters[$key] = $raw;
      if ($raw !== '' && (($key === 'topic' && !isset(tp_article_topics()[$raw])) || ($key === 'type' && !isset(tp_article_types()[$raw])))) $filters['invalid'] = true;
    }
  }
  return $filters;
}

function tp_article_select(array $cards, array $filters, string $lang): array {
  if (!empty($filters['invalid'])) return [];
  $country = $filters['country'] ?? '';
  $topic = $filters['topic'] ?? '';
  $type = $filters['type'] ?? '';
  $query = tp_article_normalize($filters['q'] ?? '');
  $matches = array_filter(tp_article_public_cards($cards, $lang), static function (array $card) use ($country, $topic, $type, $query, $lang): bool {
    if ($country !== '') {
      if (!in_array($card['content_type'], ['article', 'sector'], true)) return false;
      if ($country === 'EU') {
        if (($card['scope'] ?? '') !== 'eu') return false;
      } elseif (!in_array($country, $card['countries'] ?? [], true)) return false;
    }
    if ($topic !== '' && !in_array($topic, $card['topics'] ?? [], true)) return false;
    if ($type !== '' && $card['content_type'] !== $type) return false;
    if ($query !== '') {
      $text = tp_article_text($card, 'title', $lang) . ' ' . tp_article_text($card, 'excerpt', $lang) . ' ' . tp_article_text($card, 'country', $lang) . ' ' . tp_article_text($card, 'tag', $lang);
      foreach ($card['topics'] ?? [] as $id) $text .= ' ' . (tp_article_topics()[$id][$lang] ?? '');
      foreach ($card['countries'] ?? [] as $code) $text .= ' ' . (tp_article_countries()[$code]['name_' . $lang] ?? $code);
      if (strpos(tp_article_normalize($text), $query) === false) return false;
    }
    return true;
  });
  usort($matches, static function (array $a, array $b): int {
    return strcmp($b['date_iso'], $a['date_iso'])
      ?: (($a['archive_order'] ?? PHP_INT_MAX) <=> ($b['archive_order'] ?? PHP_INT_MAX))
      ?: strcmp($a['id'], $b['id']);
  });
  return array_values($matches);
}

function tp_article_page(array $cards, int $page, int $size = 12): array {
  $total = count($cards);
  $pages = max(1, (int) ceil($total / $size));
  $page = max(1, min($page, $pages));
  return ['cards'=>array_slice($cards, ($page - 1) * $size, $size), 'total'=>$total, 'page'=>$page, 'pages'=>$pages];
}

function tp_article_archive_url(array $filters, string $lang, int $page = 1): string {
  $parameters = ['lang'=>$lang];
  foreach (['country', 'topic', 'type', 'q'] as $key) {
    if (($filters[$key] ?? '') !== '') $parameters[$key] = $filters[$key];
  }
  if ($page > 1) $parameters['page'] = $page;
  return '/article/articoli.php?' . http_build_query($parameters);
}
