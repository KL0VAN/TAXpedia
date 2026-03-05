<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (cultura_sport.php)
 * - NON usa bootstrap/globale
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */

if (!isset($CUS_SUPPORTED)) $CUS_SUPPORTED = array('it', 'en');

$CUS_LANG = 'it';
if (isset($_GET['lang'])) {
  $CUS_LANG = strtolower(trim((string) $_GET['lang']));
} elseif (isset($_COOKIE['tp_lang'])) {
  $CUS_LANG = strtolower(trim((string) $_COOKIE['tp_lang']));
}
if (!in_array($CUS_LANG, $CUS_SUPPORTED, true)) $CUS_LANG = 'it';

$CUS_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'     => 'Cultura e sport — TAXpedia',
    'h2'             => 'Cultura e sport',
    'p1'             => 'La spesa italiana per la cultura e lo sport nel 2025 è di circa 5,4 mld di euro, pari al 0,6% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare le attività del Ministero della Cultura, tra cui le spese relative all’accoglienza e garanzia dei diritti e le spese inerenti alla creazioni di eventi culturali e sportivi per i giovani, volte alla salvaguardia e alla trasmissione di antiche tradizioni.',
    'p2'             => 'In dettaglio, la Legge di Bilancio per il 2025 prevede una spesa di circa 3 mld da parte del Ministero della Cultura, spesi prevalentemente per la Missione 1 relativa alla tutela e alla valorizzazione dei beni e attività culturali e paesaggistici, mentre la restante parte della spesa viene gestita dal Ministero dell’Economia e delle Finanze, spesi prevalentemente nelle Missioni 16 e 18 e riguardano le spese relative ai rapporti con le diverse religioni presenti nel nostro Paese (fondi 8 per mille) e le spese relative alla creazione di eventi con lo scopo di promuovere la pratica dello sport fra i giovani.',
    'p3'             => 'La spesa per la cultura e sport comprende diverse voci, tra cui:',
    'li1_lbl'        => 'Personale:',
    'li1_desc'       => 'stipendi e retribuzioni per personale vario, sia inerente alla gestione dei fondi, sia per la creazione degli eventi.',
    'li2_lbl'        => 'Agevolazioni fiscali:',
    'li2_desc'       => 'seppur in misura minima (circa 76 mln di euro) vi sono una serie di incentivi e agevolazioni inerenti donazioni da parte di aziende e privati.',
    'li3_lbl'        => 'Eventi:',
    'li3_desc'       => 'spese destinate alla creazione degli eventi che interessano questo settore, che occupano la maggior parte della spesa.',
    'p4'             => 'In generale in base ai bilanci relativi al triennio 2025-2027 dei Ministeri interessati, si prevede una diminuzione della spesa inerente questo settore per un totale di circa poche centinaia di milioni di euro.',
    'sources_label'  => 'Fonti:',
    'src1'           => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'           => 'Bilancio preventivo del Ministero degli Affari Esteri 2025-2027',
    'src3'           => 'Bilancio preventivo del Ministero della Cultura 2025-2027',
    'src4'           => 'Bilancio preventivo del Ministero dell’Interno 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'     => 'Culture and Sport (Cultura e sport) — TAXpedia',
    'h2'             => 'Culture and Sport (Cultura e sport)',
    'p1'             => 'Italian expenditure on culture and sport in 2025 amounts to approximately €5.4 billion, corresponding to about 0.6% of total public expenditure. These resources are allocated to finance the activities of the Ministry of Culture, including expenditure related to reception services and the protection of rights, as well as spending aimed at the organisation of cultural and sporting events for young people, with the objective of preserving and transmitting historical traditions.',
    'p2'             => 'Specifically, the 2025 Budget Law allocates approximately €3 billion to the Ministry of Culture, mainly under Mission 1, which concerns the protection and enhancement of cultural and landscape heritage. The remaining share of expenditure is managed by the Ministry of Economy and Finance, primarily under Missions 16 and 18, and relates to funding for relations with the various religious denominations present in Italy (“8 per mille” funds), as well as expenditure aimed at promoting sports participation among young people.',
    'p3'             => 'Expenditure on culture and sport includes several items, such as:',
    'li1_lbl'        => 'Personnel:',
    'li1_desc'       => 'salaries and remuneration for staff involved both in fund management and event organisation.',
    'li2_lbl'        => 'Tax incentives:',
    'li2_desc'       => 'although limited in scale (approximately €76 million), a number of incentives and tax benefits are provided for donations by companies and private individuals.',
    'li3_lbl'        => 'Events:',
    'li3_desc'       => 'expenditure dedicated to the organisation of events, which represents the largest share of spending in this sector.',
    'p4'             => 'Overall, based on the 2025–2027 budgets of the relevant Ministries, a reduction in expenditure for this sector of several hundred million euros is expected.',
    'sources_label'  => 'Sources:',
    'src1'           => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'           => 'Bilancio preventivo del Ministero degli Affari Esteri 2025-2027',
    'src3'           => 'Bilancio preventivo del Ministero della Cultura 2025-2027',
    'src4'           => 'Bilancio preventivo del Ministero dell’Interno 2025-2027',
  ),
);

if (!function_exists('cus_t')) {
  function cus_t($key) {
    global $CUS_LANG, $CUS_I18N;

    $lang = isset($CUS_LANG) ? $CUS_LANG : 'it';
    $dict = isset($CUS_I18N) ? $CUS_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('cus_e')) {
  function cus_e($key) {
    return htmlspecialchars(cus_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($CUS_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo cus_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo cus_e('h2'); ?></h2>

      <p><?php echo cus_e('p1'); ?>
      </br><?php echo cus_e('p2'); ?>
      </br><?php echo cus_e('p3'); ?></br></p>
      <ul>
        <li><strong><?php echo cus_e('li1_lbl'); ?></strong> <?php echo cus_e('li1_desc'); ?></li>
        <li><strong><?php echo cus_e('li2_lbl'); ?></strong> <?php echo cus_e('li2_desc'); ?></li>
        <li><strong><?php echo cus_e('li3_lbl'); ?></strong> <?php echo cus_e('li3_desc'); ?></br></li>
      </ul>
      <p></br><?php echo cus_e('p4'); ?></p>
    </section>
    <p align="center"><?php echo cus_e('sources_label'); ?> <br><?php echo cus_e('src1'); ?></p>
    <p align="center"><?php echo cus_e('src2'); ?></p>
    <p align="center"><?php echo cus_e('src3'); ?></p>
    <p align="center"><?php echo cus_e('src4'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
