<?php
// /i18n/i18n.php  (compatibile PHP 5.3+)

if (!defined('TP_DEFAULT_LANG')) define('TP_DEFAULT_LANG', 'it');
if (!defined('TP_LANG_COOKIE'))  define('TP_LANG_COOKIE', 'tp_lang');

$GLOBALS['TP_SUPPORTED_LANGS'] = array('it', 'en');

if (!function_exists('tp_normalize_lang')) {
  function tp_normalize_lang($lang, $supported, $default) {
    $lang = strtolower(trim((string)$lang));
    return in_array($lang, $supported, true) ? $lang : $default;
  }
}

if (!function_exists('tp_lang')) {
  function tp_lang() {
    return isset($GLOBALS['TP_LANG']) ? $GLOBALS['TP_LANG'] : TP_DEFAULT_LANG;
  }
}

/**
 * Genera URL lingua preservando eventuali query param esistenti.
 * Esempio: ?foo=1 -> ?foo=1&lang=en
 */
if (!function_exists('tp_lang_url')) {
  function tp_lang_url($lang) {
    $req = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : '/';
    $path = parse_url($req, PHP_URL_PATH);
    if (!$path) $path = '/';

    $q = $_GET;
    if (!is_array($q)) $q = array();
    $q['lang'] = $lang;

    $qs = http_build_query($q);
    return $qs ? ($path . '?' . $qs) : $path;
  }
}

// Init dizionari + lingua
$get = isset($_GET['lang']) ? $_GET['lang'] : null;
$cookie = isset($_COOKIE[TP_LANG_COOKIE]) ? $_COOKIE[TP_LANG_COOKIE] : null;

$supported = isset($GLOBALS['TP_SUPPORTED_LANGS']) ? $GLOBALS['TP_SUPPORTED_LANGS'] : array('it','en');

$lang = tp_normalize_lang($get ? $get : $cookie, $supported, TP_DEFAULT_LANG);
$GLOBALS['TP_LANG'] = $lang;

// IMPORTANTE: Salva il cookie in PHP se l'utente ha cliccato IT/EN (da ?lang=...)
// Questo garantisce persistenza della lingua tra pagine, indipendentemente da JavaScript
if ($get && in_array($get, $supported, true) && !headers_sent()) {
  $maxAge = 31536000; // 1 anno
  setcookie(TP_LANG_COOKIE, $lang, time() + $maxAge, '/', '', false, false);
}

// Root sicura: cartella parent di /i18n
$root = dirname(__FILE__);
$root = dirname($root);

$it  = @include $root . '/i18n/it.php';
$sel = ($lang !== 'it') ? (@include $root . '/i18n/' . $lang . '.php') : array();

if (!is_array($it))  $it = array();
if (!is_array($sel)) $sel = array();

// fallback IT per chiavi mancanti
$GLOBALS['TP_I18N'] = $sel + $it;

if (!function_exists('t')) {
  function t($key, $vars = array()) {
    $dict = isset($GLOBALS['TP_I18N']) ? $GLOBALS['TP_I18N'] : array();
    $s = isset($dict[$key]) ? $dict[$key] : '';
    if ($s === '') return '';

    if (is_array($vars)) {
      foreach ($vars as $k => $v) {
        $s = str_replace('{' . $k . '}', (string)$v, $s);
      }
    }
    return $s;
  }
}

if (!function_exists('e')) {
  function e($key, $vars = array()) {
    return htmlspecialchars(t($key, $vars), ENT_QUOTES, 'UTF-8');
  }
}
