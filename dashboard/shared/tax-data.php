<?php
declare(strict_types=1);

/**
 * Read the calculators' existing literal configuration, never execute JavaScript.
 * Only the current array/object/number/string syntax is supported. Expressions,
 * functions or an unrecognised schema yield an unavailable state, not guessed data.
 * Infinity is represented as null in the display model (an open upper bound).
 */
function dash_tax_literal(string $source, string $name): ?array {
  $pattern = '/^\h*const\s+' . preg_quote($name, '/') . '\s*=\s*(\[.*?\]|\{.*?\})\s*;/ms';
  if (preg_match_all($pattern, $source, $definitions) !== 1) return null;
  $literal = $definitions[1][0];
  if (!preg_match('//u', $literal)) return null;
  $tokenPattern = <<<'REGEX'
~\G(?:\s+|//[^\r\n]*|/\*.*?\*/|"[^"\\]*"|'[^'\\]*'|-?(?:0|[1-9][0-9]*)(?:\.[0-9]+)?(?:[eE][+-]?[0-9]+)?|[A-Za-z_][A-Za-z_0-9]*|[\[\]{},:])~s
REGEX;
  $tokens = [];
  $offset = 0;
  while ($offset < strlen($literal)) {
    if (!preg_match($tokenPattern, $literal, $match, 0, $offset)) return null;
    $token = $match[0];
    $offset += strlen($token);
    if (trim($token) === '' || substr($token, 0, 2) === '//' || substr($token, 0, 2) === '/*') continue;
    if ($token[0] === '"' || $token[0] === "'") {
      $tokens[] = json_encode(substr($token, 1, -1), JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
    } elseif ($token === 'Infinity') {
      $tokens[] = 'null';
    } elseif (preg_match('/^[A-Za-z_]/', $token)) {
      if (!preg_match('/^\s*:/', substr($literal, $offset))) return null;
      $tokens[] = json_encode($token, JSON_THROW_ON_ERROR);
    } else {
      if (($token === ']' || $token === '}') && end($tokens) === ',') array_pop($tokens);
      $tokens[] = $token;
    }
  }
  try {
    $value = json_decode(implode('', $tokens), true, 32, JSON_THROW_ON_ERROR);
  } catch (JsonException $exception) {
    return null;
  }
  return is_array($value) ? $value : null;
}

function dash_tax_numeric($value): bool {
  return (is_int($value) || is_float($value)) && is_finite((float) $value);
}

function dash_tax_valid_bounds(array $bounds): bool {
  if (!$bounds || $bounds !== array_values($bounds) || end($bounds) !== null) return false;
  $previous = 0.0;
  foreach ($bounds as $index => $upper) {
    if ($upper === null) return $index === count($bounds) - 1;
    if (!dash_tax_numeric($upper) || $upper <= $previous) return false;
    $previous = (float) $upper;
  }
  return false;
}

function dash_tax_regional(string $source): ?array {
  $bounds = dash_tax_literal($source, 'REGIONAL_BRACKETS');
  $regions = dash_tax_literal($source, 'REGIONAL_RATES');
  if ($bounds === null || !dash_tax_valid_bounds($bounds) || !$regions) return null;
  foreach ($regions as $name => $rates) {
    if (!is_string($name) || !is_array($rates) || $rates !== array_values($rates) || count($rates) !== count($bounds)) return null;
    foreach ($rates as $rate) {
      if (!dash_tax_numeric($rate) || $rate < 0 || $rate > 1) return null;
    }
  }
  return ['bounds'=>$bounds, 'regions'=>$regions];
}

function dash_tax_parse_source(string $source, bool $regionalOnly = false, bool $includeRegional = false): ?array {
  $regional = ($regionalOnly || $includeRegional) ? dash_tax_regional($source) : null;
  $bands = [];
  $previous = 0.0;
  $formula = false;
  if ($regionalOnly) {
    if ($regional === null) return null;
    foreach ($regional['bounds'] as $index => $upper) {
      $rates = array_column($regional['regions'], $index);
      $bands[] = ['lower'=>$previous, 'upper'=>$upper, 'rate_min'=>min($rates), 'rate_max'=>max($rates), 'approximate'=>false];
      $previous = $upper;
    }
  } else {
    $rows = dash_tax_literal($source, 'TAX_BRACKETS');
    if (!$rows || $rows !== array_values($rows)) return null;
    foreach ($rows as $row) {
      if (!is_array($row)) return null;
      if (array_key_exists('upper', $row)) {
        $upper = $row['upper'];
      } elseif (array_key_exists('max', $row) && isset($row['min']) && dash_tax_numeric($row['min']) && abs($row['min'] - $previous) < 0.000001) {
        $upper = $row['max'];
      } else {
        return null;
      }
      if ($upper !== null && (!dash_tax_numeric($upper) || $upper <= $previous)) return null;
      $type = $row['type'] ?? 'rate';
      $approximate = false;
      if ($type === 'zero') {
        $minimum = $maximum = 0.0;
      } elseif ($type === 'rate' || $type === 'linear') {
        $minimum = $maximum = $row['rate'] ?? null;
      } elseif ($type === 'y' || $type === 'z') {
        // Germany: derive marginal rates from the polynomial already in its code.
        // The scale is read from that code too; no fiscal coefficients are copied.
        $variable = preg_quote($type, '/');
        $scalePattern = '/const\s+' . $variable . '\s*=\s*\(x\s*-\s*zone\.base\)\s*\/\s*([0-9]+)\s*;/';
        $add = $type === 'z' ? '\s*\+\s*zone\.add' : '';
        $formulaPattern = '/tax\s*=\s*\(zone\.a\s*\*\s*' . $variable . '\s*\+\s*zone\.b\)\s*\*\s*' . $variable . $add . '\s*;/';
        if (!preg_match($scalePattern, $source, $scaleMatch) || !preg_match($formulaPattern, $source)) return null;
        $scale = (float) $scaleMatch[1];
        if ($scale <= 0 || $upper === null) return null;
        foreach (['base', 'a', 'b'] as $field) {
          if (!isset($row[$field]) || !dash_tax_numeric($row[$field])) return null;
        }
        if ($row['a'] < 0 || abs($row['base'] - $previous) > 0.000001) return null;
        $minimum = $row['b'] / $scale;
        $maximum = (2 * $row['a'] * (($upper - $row['base']) / $scale) + $row['b']) / $scale;
        $approximate = $formula = true;
      } else {
        return null;
      }
      if (!dash_tax_numeric($minimum) || !dash_tax_numeric($maximum) || $minimum < 0 || $maximum > 1 || $maximum < $minimum) return null;
      $bands[] = ['lower'=>$previous, 'upper'=>$upper, 'rate_min'=>$minimum, 'rate_max'=>$maximum, 'approximate'=>$approximate];
      $previous = $upper;
      if ($upper === null && count($bands) !== count($rows)) return null;
    }
    if (!dash_tax_valid_bounds(array_column($bands, 'upper'))) return null;
  }
  $positiveRates = [];
  $hasZeroBand = false;
  foreach ($bands as $band) {
    if ($band['rate_min'] === 0.0 || $band['rate_min'] === 0) $hasZeroBand = true;
    if ($band['rate_max'] > 0) $positiveRates[(string) $band['rate_max']] = true;
  }
  return [
    'bands'=>$bands,
    'regional'=>$regional,
    'regional_only'=>$regionalOnly,
    'regional_missing'=>$includeRegional && $regional === null,
    'formula'=>$formula,
    'single_rate'=>!$regionalOnly && !$formula && count($positiveRates) === 1,
    'zero_band'=>$hasZeroBand,
  ];
}

function dash_tax_model(array $country): ?array {
  $slug = $country['slug'] ?? '';
  $code = $country['code'] ?? '';
  if (!is_string($slug) || !preg_match('/^[a-z]+$/D', $slug) || !is_string($code) || !preg_match('/^[A-Z]{2}$/D', $code)) return null;
  $filename = $code === 'FR' ? 'calculatorFrancia.js' : 'calculator' . ucfirst($slug) . '.js';
  $path = dirname(__DIR__, 2) . '/calculator/' . $slug . '/' . $filename;
  static $cache = [];
  if (!array_key_exists($path, $cache)) {
    $source = is_file($path) && is_readable($path) ? file_get_contents($path) : false;
    $cache[$path] = $source === false ? null : dash_tax_parse_source($source, $code === 'HR', $code === 'IT');
  }
  return $cache[$path];
}

function dash_tax_number(float $value, int $decimals = 2): string {
  $separator = dash_t(',', '.');
  return rtrim(rtrim(number_format($value, $decimals, $separator, dash_t('.', ',')), '0'), $separator);
}

function dash_tax_income(float $lower, ?float $upper): string {
  if ($upper === null) return dash_t('Oltre ', 'Over ') . '€' . dash_tax_number($lower);
  if ($lower === 0.0) return dash_t('Fino a ', 'Up to ') . '€' . dash_tax_number($upper);
  return dash_t('Oltre ', 'Over ') . '€' . dash_tax_number($lower) . dash_t(' e fino a ', ' and up to ') . '€' . dash_tax_number($upper);
}

function dash_tax_rate(array $band): string {
  $decimals = $band['approximate'] ? 2 : 4;
  $minimum = dash_tax_number($band['rate_min'] * 100, $decimals) . '%';
  if (abs($band['rate_max'] - $band['rate_min']) > 0.0000001) $minimum .= '–' . dash_tax_number($band['rate_max'] * 100, $decimals) . '%';
  return ($band['approximate'] ? dash_t('Circa ', 'Approx. ') : '') . $minimum;
}
