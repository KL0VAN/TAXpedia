<?php
require_once __DIR__ . '/../../i18n/i18n.php';
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (altro.php)
 * - NON usa bootstrap/globale
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */

$ALT_LANG = function_exists('tp_lang') ? tp_lang() : 'it';

$ALT_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'     => 'Altro — TAXpedia',
    'h2'             => 'Altro',
    'p1'             => 'La spesa allocata in questa sezione ammonta a 46,9 mld di euro e corrisponde a circa il 5,1% della spesa pubblica italiana. Questo settore comprende una molteplicità di spese varie che non si sono allocate alle altre ripartizioni poiché ritenute esterne ad esse. Una parte importante di questi fondi, circa 21 mld di euro, sono destinati alla Missione 23 del bilancio del Ministero dell’Economia e delle Finanze, e sono adibiti alla copertura di spese “impreviste” o comunque non risultano ancora allocati a qualcosa di specifico. Un’altra parte importante di questi fondi, circa 20 mld di euro, sono destinati al rimborso e al pagamento di vincite derivanti dai giochi e le lotterie, esplicitate in diversi punti del Programma 1.4 del bilancio del MEF. Altre spese in questa sezione sono relative all’immigrazione, accoglienza e più in generale alla garanzia dei diritti.',
    'p2'             => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa abbastanza costante in questo settore.',
    'sources_label'  => 'Fonti:',
    'src1'           => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'           => 'Bilancio preventivo del Ministero del Lavoro e delle Politiche Sociali 2025-2027',
    'src3'           => 'Bilancio preventivo del Ministero degli Affari Esteri e della Cooperazione Internazionale 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'     => 'Other Expenditure (Altro) — TAXpedia',
    'h2'             => 'Other Expenditure (Altro)',
    'p1'             => 'The expenditure allocated to this section amounts to approximately €46.9 billion, corresponding to about 5.1% of total Italian public spending. This sector includes a wide range of miscellaneous expenditures that could not be allocated to the other categories, as they are considered external to them. A significant portion of these funds, approximately €21 billion, is allocated to Mission 23 of the budget of the Ministry of Economy and Finance, and is intended to cover “unforeseen” expenditures or expenses that have not yet been assigned to a specific purpose. Another substantial share of these funds, approximately €20 billion, is allocated to the reimbursement and payment of winnings derived from gambling and lotteries, explicitly reported in several sections of Programme 1.4 of the MEF budget. Additional expenditures in this category relate to immigration, reception systems, and more generally to the protection of rights.',
    'p2'             => 'Overall, based on the budgets of the various Ministries for the 2025–2027 triennium, expenditure in this sector is expected to remain relatively stable.',
    'sources_label'  => 'Sources:',
    'src1'           => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'           => 'Bilancio preventivo del Ministero del Lavoro e delle Politiche Sociali 2025-2027',
    'src3'           => 'Bilancio preventivo del Ministero degli Affari Esteri e della Cooperazione Internazionale 2025-2027',
  ),
);

if (!function_exists('alt_t')) {
  function alt_t($key) {
    global $ALT_LANG, $ALT_I18N;

    $lang = isset($ALT_LANG) ? $ALT_LANG : 'it';
    $dict = isset($ALT_I18N) ? $ALT_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('alt_e')) {
  function alt_e($key) {
    return htmlspecialchars(alt_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($ALT_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo alt_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo alt_e('h2'); ?></h2>

      <p><?php echo alt_e('p1'); ?></br>
      </br><?php echo alt_e('p2'); ?></p>
    </section>
    <p align="center"><?php echo alt_e('sources_label'); ?> <br><?php echo alt_e('src1'); ?></p>
    <p align="center"><?php echo alt_e('src2'); ?></p>
    <p align="center"><?php echo alt_e('src3'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
