<?php
/* ===================== TP i18n (local) ===================== */
if (!function_exists('tp_i18n_get_lang')) {
  function tp_i18n_get_lang() {
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
    'title' => 'Bilancio UE — TAXpedia',
    'h2' => 'Coesione, Resilienza e Valori',
    'p1' => 'L’Unione Europea nel 2025 ha investito 78 mld di euro per favorire la coesione nei paesi comunitari.',
    'p2' => 'Di cui 49,2 mld sono stati investiti nello sviluppo regionale e nella coesione, 17,2 mld per il fondo sociale europeo (FSE), 6,2 mld per la ripresa e la resilienza, 5,4 mld nella coesione sociale e nei valori dell’Unione.',
    'sources_label' => 'Fonti:',
    'sources_detail' => 'Bilancio 2025 concordato tra Consiglio Europeo e Parlamento Europeo.',
  ),

  'en' => array(
    'title' => 'EU Budget — TAXpedia',
    'h2' => 'Cohesion, Resilience and Values',
    'p1' => 'In 2025, the European Union invested €78bn to foster cohesion across Member States.',
    'p2' => 'Of this, €49.2bn went to regional development and cohesion, €17.2bn to the European Social Fund (ESF), €6.2bn to recovery and resilience, and €5.4bn to social cohesion and the Union’s values.',
    'sources_label' => 'Sources:',
    'sources_detail' => '2025 budget agreed between the European Council and the European Parliament.',
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
      <p><?php tp_i18n_e('p1'); ?>
      <br> <?php tp_i18n_e('p2'); ?></p>
    </section>
    <p align="center"><?php tp_i18n_e('sources_label'); ?> <br><?php tp_i18n_e('sources_detail'); ?></p>
  
  </main>

  <!-- ===================== FOOTER ===================== -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

</body>
</html>
