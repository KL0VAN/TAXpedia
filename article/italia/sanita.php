<?php
require_once __DIR__ . '/../../i18n/i18n.php';
// Sanità — TAXpedia
// Versione PHP con header e footer unificati

/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (sanita.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - NON cambia CSS/classi/struttura DOM/path
 */

if (!function_exists('san_get_lang')) {
  function san_get_lang() {
    if (function_exists('tp_lang')) {
      return tp_lang();
    }

    $lang = 'it';
    if (isset($_GET['lang'])) {
      $lang = strtolower(trim((string) $_GET['lang']));
    } elseif (isset($_COOKIE['tp_lang'])) {
      $lang = strtolower(trim((string) $_COOKIE['tp_lang']));
    }
    return in_array($lang, array('it','en'), true) ? $lang : 'it';
  }
}

$SAN_LANG = san_get_lang();

$SAN_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'title' => 'Sanità — TAXpedia',
    'h2'    => 'Sanità',

    'p1'    => 'La spesa italiana per la sanità nel 2025 è di circa 92,2 mld di euro, pari al 10,1%  circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare le attività del Ministero dell’Economia e delle Finanze e del Ministero della Salute.',
    'p2'    => 'In dettaglio, la Legge di Bilancio per il 2025 prevede che la maggior parte dei fondi, circa 90 mld di euro, sono gestiti dal Ministero dell’Economia e delle Finanze. Questi fondi vengono usati per la dematerializzazione delle ricette mediche e di tutte le spese relative alla realizzazione della tessera sanitaria e del fascicolo sanitario, contenuto all’interno del Programma 1.6 azione 5 del bilancio del Ministero.',
    'p3'    => 'La maggior parte dei fondi sono destinati alla sanità pubblica e vi è anche una piccola parte, circa 100 mln di euro, destinata al contributo per il mantenimento delle strutture private, contenuto nel Programma 2.4 dello stesso bilancio.',
    'p4'    => 'Infine la restante parte, circa 2,2 mld di euro sono gestiti dal Ministero della Salute per la ricerca nel settore pubblico, al quale sono destinati circa 350 mln di euro, e per la prevenzione e protezione della salute umana per delle fasce di popolazione in particolare.',
    'p5'    => 'spesa per la sanità comprende diverse voci, tra cui:',

    'li1'   => 'Personale:',
    'li1d'  => 'stipendi e retribuzioni per personale vario inerente tutte le posizioni in questo settore.',
    'li2'   => 'Ricerca e innovazione:',
    'li2d'  => 'stipendi e retribuzioni per il personale, fondi destinati alla ricerca nel settore pubblico.',
    'li3'   => 'Protezione e prevenzione:',
    'li3d'  => 'sanità pubblica a disposizione di tutta la popolazione alla quale si cerca di dare particolare importanza a coloro che ne hanno più bisogno.',

    'p6'    => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa in leggero aumento per questo settore.',

    'fonti' => 'Fonti:',
    'src1'  => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'  => 'Bilancio preventivo del Ministero della Sanità 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'Healthcare (Sanità) — TAXpedia',
    'h2'    => 'Healthcare (Sanità)',

    'p1'    => 'Italian healthcare expenditure in 2025 amounts to approximately €92.2 billion, corresponding to about 10.1% of total public expenditure. These resources are allocated to finance the activities of the Ministry of Economy and Finance and the Ministry of Health.',
    'p2'    => 'Specifically, the 2025 Budget Law provides that the majority of resources, approximately €90 billion, are managed by the Ministry of Economy and Finance. These funds are used for the digitalisation of medical prescriptions and for all expenditure related to the implementation of the health insurance card and the electronic health record, included under Programme 1.6, Action 5 of the Ministry’s budget.',
    'p3'    => 'The majority of resources are allocated to public healthcare, while a smaller portion, approximately €100 million, is allocated as a contribution to the maintenance of private healthcare facilities, included under Programme 2.4 of the same budget.',
    'p4'    => 'The remaining share of expenditure, amounting to approximately €2.2 billion, is managed by the Ministry of Health and is allocated to research in the public healthcare sector (approximately €350 million), as well as to prevention and health protection measures targeting specific population groups.',
    'p5'    => 'Healthcare expenditure includes several components, such as:',

    'li1'   => 'Personnel:',
    'li1d'  => 'salaries and remuneration for staff employed across all positions within the healthcare sector.',
    'li2'   => 'Research and innovation:',
    'li2d'  => 'salaries and research funding allocated to public healthcare research.',
    'li3'   => 'Protection and prevention:',
    'li3d'  => 'public healthcare services available to the entire population, with particular attention given to the most vulnerable groups.',

    'p6'    => 'Overall, based on the 2025–2027 budgets of the relevant Ministries, expenditure in this sector is expected to increase slightly.',

    'fonti' => 'Sources:',
    'src1'  => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'  => 'Bilancio preventivo del Ministero della Sanità 2025-2027',
  ),
);

if (!function_exists('san_t')) {
  function san_t($key) {
    global $SAN_LANG, $SAN_I18N;
    if (isset($SAN_I18N[$SAN_LANG][$key])) return $SAN_I18N[$SAN_LANG][$key];
    if (isset($SAN_I18N['it'][$key])) return $SAN_I18N['it'][$key];
    return '';
  }
}
if (!function_exists('san_e')) {
  function san_e($key) {
    return htmlspecialchars(san_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($SAN_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo san_e('title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo san_e('h2'); ?></h2>

      <p><?php echo san_e('p1'); ?>
      </br><?php echo san_e('p2'); ?>
      </br><?php echo san_e('p3'); ?>
      </br><?php echo san_e('p4'); ?> <br><br> <?php echo san_e('p5'); ?></br>
      <ul>
        <li><strong><?php echo san_e('li1'); ?></strong> <?php echo san_e('li1d'); ?></li>
        <li><strong><?php echo san_e('li2'); ?></strong> <?php echo san_e('li2d'); ?></li>
        <li><strong><?php echo san_e('li3'); ?></strong> <?php echo san_e('li3d'); ?></br></li>
      </ul>
      <p></br><?php echo san_e('p6'); ?></p>
    </section>
    <p align="center"><?php echo san_e('fonti'); ?> <br><?php echo san_e('src1'); ?></p>
    <p align="center"><?php echo san_e('src2'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
