<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (bilancio_ue.php)
 * - NON usa bootstrap/globale
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */

if (!isset($BUE_SUPPORTED)) $BUE_SUPPORTED = array('it', 'en');

$BUE_LANG = 'it';
if (isset($_GET['lang'])) {
  $BUE_LANG = strtolower(trim((string) $_GET['lang']));
} elseif (isset($_COOKIE['tp_lang'])) {
  $BUE_LANG = strtolower(trim((string) $_COOKIE['tp_lang']));
}
if (!in_array($BUE_LANG, $BUE_SUPPORTED, true)) $BUE_LANG = 'it';

$BUE_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'     => 'Bilancio UE — TAXpedia',
    'h2'             => 'Bilancio UE',
    'p1'             => 'Il contributo italiano per il bilancio europeo nel 2025 è di circa 22,5 mld di euro, pari al 2,5% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare il bilancio europeo e questa spesa è trattata dal Ministero dell’Economia e delle Finanze. In dettaglio, la Legge di Bilancio per il 2025 prevede una spesa di circa 22,5 mld spesi per il programma 3.1 del bilancio del MEF. Questi fondi servono in maniera prevalente a garantire la copertura degli oneri finanziari derivanti dalla partecipazione dell’Italia all’UE. Operativamente i fondi che vengono versati vengono gestiti dall’Unione Europea insieme a quelli versati dagli altri Stati membri e vengono usati per diverse politiche come quella agraria, di sicurezza, ambientali e molte altre iniziative.',
    'p2'             => 'In generale in base ai bilanci relativi al triennio 2025-2027 del Ministero dell’Economia e delle Finanze si prevede che negli anni successivi ci sarà un aumento abbastanza importante delle risorse allocate a questo settore.',
    'sources_label'  => 'Fonti:',
    'src1'           => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'     => 'EU Budget (Bilancio UE) — TAXpedia',
    'h2'             => 'EU Budget (Bilancio UE)',
    'p1'             => 'Italy’s contribution to the European Union budget in 2025 amounts to approximately €22.5 billion, equal to around 2.5% of total public expenditure. This amount is allocated to financing the EU budget and is managed by the Ministry of Economy and Finance. Specifically, the 2025 Budget Law provides for approximately €22.5 billion under Programme 3.1 of the MEF budget. These resources are primarily intended to ensure coverage of the financial obligations arising from Italy’s participation in the European Union. Operationally, the funds transferred are managed by the European Union together with the contributions of other Member States and are used to finance a wide range of policies, including agricultural, security, environmental policies, and many other initiatives.',
    'p2'             => 'Overall, based on the 2025–2027 budget projections of the Ministry of Economy and Finance, a significant increase in resources allocated to this sector is expected in the coming years.',
    'sources_label'  => 'Sources:',
    'src1'           => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
  ),
);

if (!function_exists('bue_t')) {
  function bue_t($key) {
    global $BUE_LANG, $BUE_I18N;

    $lang = isset($BUE_LANG) ? $BUE_LANG : 'it';
    $dict = isset($BUE_I18N) ? $BUE_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('bue_e')) {
  function bue_e($key) {
    return htmlspecialchars(bue_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($BUE_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo bue_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo bue_e('h2'); ?></h2>

      <p><?php echo bue_e('p1'); ?></br>
      </br><?php echo bue_e('p2'); ?></p></br>
      
    </section>
    <p align="center"><?php echo bue_e('sources_label'); ?> <br><?php echo bue_e('src1'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
