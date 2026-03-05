<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (interessi.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Dizionario IT/EN locale
 * - Funzioni con prefisso dedicato + anti-redeclare
 */

if (!isset($INTR_SUPPORTED)) $INTR_SUPPORTED = array('it', 'en');

$INTR_LANG = 'it';
if (isset($_GET['lang'])) {
  $INTR_LANG = strtolower(trim((string) $_GET['lang']));
} elseif (isset($_COOKIE['tp_lang'])) {
  $INTR_LANG = strtolower(trim((string) $_COOKIE['tp_lang']));
}
if (!in_array($INTR_LANG, $INTR_SUPPORTED, true)) $INTR_LANG = 'it';

$INTR_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'    => 'Interessi — TAXpedia',
    'h2'            => 'Interessi',

    'p1'            => 'La spesa italiana per il rimborso degli interessi nel 2025 è di circa 106,4 mld di euro, pari al 11,6% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare interamente le spese per il Ministero dell’Economia e delle Finanze.',
    'p2'            => 'Una parte delle risorse sono allocate per il pagamento degli oneri finanziari legati sia alla gestione della tesoreria, sia per il rimborso delle imposte. La maggior parte dei fondi, all’incirca 100 mld di euro, sono destinati al pagamento della quota interessi sul debito statale e al pagamento degli interessi sui buoni postali fruttiferi.',
    'p3'            => 'La spesa per il pagamento degli interessi comprende diverse voci, tra cui:',

    'li1_lbl'       => 'Personale:',
    'li1_desc'      => 'stipendi e retribuzioni per personale vario impegnato in questo settore.',
    'li2_lbl'       => 'Rimborsi e pagamenti:',
    'li2_desc'      => 'la maggior parte dei fondi viene adibita al pagamento e al rimborso degli interessi emessi dallo stato stesso.',

    'p4'            => 'In generale in base al bilancio del Ministero dell’Economia e delle Finanze relativo al triennio 2025-2027 si prevede una spesa in costante aumento per quanto riguarda questo settore, con quindi un aumento della spesa volta alla retribuzione del debito statale.',

    'sources_label' => 'Fonti:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'    => 'Interest (Interessi) — TAXpedia',
    'h2'            => 'Interest (Interessi)',

    'p1'            => 'Italian expenditure for interest payments in 2025 amounts to approximately €106.4 billion, corresponding to about 11.6% of total public expenditure. These resources are entirely allocated to the Ministry of Economy and Finance.',
    'p2'            => 'A portion of the resources is allocated to the payment of financial charges related to treasury management and tax refunds. The vast majority of the funds, approximately €100 billion, is devoted to the payment of interest on public debt and interest on postal savings bonds.',
    'p3'            => 'Expenditure related to interest payments includes several components, such as:',

    'li1_lbl'       => 'Personnel:',
    'li1_desc'      => 'salaries and remuneration for staff employed in this sector.',
    'li2_lbl'       => 'Repayments and payments:',
    'li2_desc'      => 'the largest share of funds, used for the payment and servicing of interest issued by the State.',

    'p4'            => 'Overall, based on the 2025–2027 budget of the Ministry of Economy and Finance, expenditure in this sector is expected to increase steadily, reflecting a growing cost associated with public debt servicing.',

    'sources_label' => 'Sources:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
  ),
);

if (!function_exists('intr_t')) {
  function intr_t($key) {
    global $INTR_LANG, $INTR_I18N;

    $lang = isset($INTR_LANG) ? $INTR_LANG : 'it';
    $dict = isset($INTR_I18N) ? $INTR_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('intr_e')) {
  function intr_e($key) {
    return htmlspecialchars(intr_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($INTR_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo intr_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo intr_e('h2'); ?></h2>

      <p><?php echo intr_e('p1'); ?></br>
      </br><?php echo intr_e('p2'); ?></br>
      </br><?php echo intr_e('p3'); ?></br></p>

      <ul>
        <li><strong><?php echo intr_e('li1_lbl'); ?></strong> <?php echo intr_e('li1_desc'); ?></li>
        <li><strong><?php echo intr_e('li2_lbl'); ?></strong> <?php echo intr_e('li2_desc'); ?></li>
      </ul>

      <p></br><?php echo intr_e('p4'); ?></p>
    </section>

    <p align="center"><?php echo intr_e('sources_label'); ?> <br><?php echo intr_e('src1'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
