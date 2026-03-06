<?php
require_once __DIR__ . '/../../i18n/i18n.php';
/* ===================== TP i18n (local) ===================== */
if (!function_exists('tp_i18n_get_lang')) {
  function tp_i18n_get_lang() {
    if (function_exists('tp_lang')) {
      return tp_lang();
    }

    $lang = 'it';
    if (isset($_GET['lang'])) {
      $q = strtolower(trim((string)$_GET['lang']));
      if (in_array($q, array('it', 'en'), true)) {
        $lang = $q;
        if (!headers_sent()) {
          setcookie('tp_lang', $lang, time() + 60*60*24*365, '/');
        }
      }
    } elseif (!empty($_COOKIE['tp_lang'])) {
      $c = strtolower(trim((string)$_COOKIE['tp_lang']));
      if (in_array($c, array('it', 'en'), true)) {
        $lang = $c;
      }
    }
    return $lang;
  }
}

if (!function_exists('tp_i18n_t')) {
  function tp_i18n_t($key) {
    $lang = isset($GLOBALS['tp_i18n_lang']) ? $GLOBALS['tp_i18n_lang'] : 'it';
    $dict = isset($GLOBALS['tp_i18n_dict']) ? $GLOBALS['tp_i18n_dict'] : array();
    if (isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it'][$key])) return $dict['it'][$key];
    return $key;
  }
}

if (!function_exists('tp_i18n_e')) {
  function tp_i18n_e($key) {
    echo htmlspecialchars(tp_i18n_t($key), ENT_QUOTES, 'UTF-8');
  }
}

$tp_lang = tp_i18n_get_lang();

$GLOBALS['tp_i18n_dict'] = array(
  'it' => array(
    'title' => 'Bilancio UE â€” TAXpedia',
    'h2' => 'Migrazione e Gestione delle Frontiere',
    'p1' => 'L\'Unione Europea spende un totale di 4,8 mld di euro per la migrazione e la gestione delle frontiere. Nello specifico 2,1 mld per il controllo dei flussi migratori mentre 2,7 mld per la gestione delle frontiere.',
    'sources_label' => 'Fonti:',
    'sources_detail' => 'Bilancio 2025 concordato tra Consiglio Europeo e Parlamento Europeo',
  ),

  'en' => array(
    'title' => 'EU Budget â€” TAXpedia',
    'h2' => 'Migration and Border Management',
    'p1' => 'The European Union allocates a total of â‚¬4.8bn to migration and border management. Specifically, â‚¬2.1bn for managing migration flows and â‚¬2.7bn for border management.',
    'sources_label' => 'Sources:',
    'sources_detail' => '2025 budget agreed between the European Council and the European Parliament',
  ),
);

$GLOBALS['tp_i18n_lang'] = $tp_lang;
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($tp_lang, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php tp_i18n_e('title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php tp_i18n_e('h2'); ?></h2>

      <p><?php tp_i18n_e('p1'); ?></p>
    </section>
    <p align="center"><?php tp_i18n_e('sources_label'); ?> <br><?php tp_i18n_e('sources_detail'); ?></p>
  
  </main>

  <!-- ===================== FOOTER ===================== -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

</body>
</html>
