<?php
require_once __DIR__ . '/../../i18n/i18n.php';
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (protezione_sociale.php)
 * - NON usa bootstrap/globale
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - NON cambia CSS/classi/struttura DOM/path
 */

if (!function_exists('psoc_get_lang')) {
  function psoc_get_lang() {
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

$PSOC_LANG = psoc_get_lang();

$PSOC_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'title' => 'Protezione sociale — TAXpedia',
    'h2'    => 'Protezione sociale',

    'p1'    => 'La spesa italiana per la protezione sociale nel 2025 è di circa 189,3 mld di euro, pari al 20,6% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare le attività di numerosi Ministeri fra cui quello dell’Economia e delle Finanze, quello dell’Interno e del Ministero del Lavoro e delle Politiche Sociali. In dettaglio, la Legge di Bilancio per il 2025 prevede per il Ministero del Lavoro e delle Politiche Sociali una spesa di circa 174 mld di euro, per la Missione 2 e 3 del Ministero, che si occupano di gestire il lato pensionistico e una serie di politiche di coesione, integrazione ed inclusione della popolazione. Inoltre vi è anche il Ministero dell’Economia e delle Finanze che ha un portafoglio di circa 13 mld di euro in questo settore. Questi fondi sono prevalentemente affidati alla Missione 14 e 15 del Ministero, che si occupano di finanziare una serie di politiche sociali rivolte ai lavoratori e di politiche di sostegno per le famiglie.',
    'p2'    => 'Infine la restante parte dei fondi sono affidati al Ministero dell’Interno che con il Programma 5.1 si occupa di ricoprire una parte delle spese sostenute dalla Repubblica d’Albania per l’accordo del 2023 in materia migratoria, quindi questi fondi vengono effettivamente adibiti a favorire una tutela in materia degli stranieri richiedenti asilo.',
    'p3'    => 'La spesa per la protezione sociale comprende diverse voci, tra cui:',

    'li1'   => 'Politiche sociali:',
    'li1d'  => 'stipendi e retribuzioni per personale vario impegnato nei diversi programmi relativi ai Ministeri.',
    'li2'   => 'Fondo pensionistico e lavoratori:',
    'li2d'  => 'fondi destinati alla riqualificazione di zone rurali e fondi destinati ad aiutare giovani per l’accesso a finanziamenti per l’acquisto della prima casa.',
    'li3'   => 'Sostegno famiglie e stranieri:',
    'li3d'  => 'fondi destinati alla protezione e al mantenimento delle reti stradali, ferroviarie e aeree con i relativi progetti di ampliamento.',

    'img_alt' => 'Ripartizione spesa protezione sociale',
    'fig'     => 'Ripartizione della spesa per la protezione sociale nel 2025.',

    'p4'    => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa destinata a rimanere uguale per quanto riguarda questo settore.',

    'fonti' => 'Fonti:',
    'src1'  => 'Bilancio preventivo del Ministero del Lavoro e delle Politiche Sociali 2025-2027',
    'src2'  => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src3'  => 'Bilancio preventivo del Ministero dell’Interno 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'Social Protection (Protezione sociale) — TAXpedia',
    'h2'    => 'Social Protection (Protezione sociale)',

    'p1'    => 'Italian expenditure on social protection in 2025 amounts to approximately €189.3 billion, corresponding to about 20.6% of total public expenditure. These resources are allocated to finance the activities of several Ministries, including the Ministry of Economy and Finance, the Ministry of the Interior, and the Ministry of Labour and Social Policies. Specifically, the 2025 Budget Law provides for expenditure of approximately €174 billion under the Ministry of Labour and Social Policies, allocated to Missions 2 and 3, which are responsible for managing pension schemes as well as a range of cohesion, integration, and social inclusion policies. In addition, the Ministry of Economy and Finance manages approximately €13 billion within this sector, mainly allocated to Missions 14 and 15, which finance social policies aimed at workers and support measures for families.',
    'p2'    => 'Finally, the remaining share of the funds is managed by the Ministry of the Interior, which, through Programme 5.1, covers part of the expenditure incurred by the Republic of Albania under the 2023 migration agreement. These resources are therefore effectively allocated to measures aimed at protecting foreign nationals seeking asylum.',
    'p3'    => 'Expenditure on social protection includes several components, such as:',

    'li1'   => 'Social policies:',
    'li1d'  => 'salaries and remuneration for staff involved in the various ministerial programmes.',
    'li2'   => 'Pension and labour funds:',
    'li2d'  => 'resources allocated to pension schemes and labour-related measures.',
    'li3'   => 'Support for families and foreign nationals:',
    'li3d'  => 'funds allocated to policies aimed at supporting families and providing protection to migrants and asylum seekers.',

    'img_alt' => 'Social protection spending breakdown',
    'fig'     => 'Social protection expenditure breakdown in 2025.',

    'p4'    => 'Overall, based on the 2025–2027 budgets of the relevant Ministries, expenditure in this sector is expected to remain stable.',

    'fonti' => 'Sources:',
    'src1'  => 'Bilancio preventivo del Ministero del Lavoro e delle Politiche Sociali 2025-2027',
    'src2'  => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src3'  => 'Bilancio preventivo del Ministero dell’Interno 2025-2027',
  ),
);

if (!function_exists('psoc_t')) {
  function psoc_t($key) {
    global $PSOC_LANG, $PSOC_I18N;
    if (isset($PSOC_I18N[$PSOC_LANG][$key])) return $PSOC_I18N[$PSOC_LANG][$key];
    if (isset($PSOC_I18N['it'][$key])) return $PSOC_I18N['it'][$key];
    return '';
  }
}
if (!function_exists('psoc_e')) {
  function psoc_e($key) {
    return htmlspecialchars(psoc_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($PSOC_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo psoc_e('title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo psoc_e('h2'); ?></h2>

      <p><?php echo psoc_e('p1'); ?>
         <br><br><?php echo psoc_e('p2'); ?>
      <br><br><?php echo psoc_e('p3'); ?></br>
      <ul>
        <li><strong><?php echo psoc_e('li1'); ?></strong> <?php echo psoc_e('li1d'); ?></li>
        <li><strong><?php echo psoc_e('li2'); ?></strong> <?php echo psoc_e('li2d'); ?></li>
        <li><strong><?php echo psoc_e('li3'); ?></strong> <?php echo psoc_e('li3d'); ?></br></li>
      </ul>
      <figure class="media">
        <img src="imm/welfare.png"
          alt="<?php echo psoc_e('img_alt'); ?>" align="center"
          width="100%" height="auto" loading="lazy" >
        <figcaption><small><?php echo psoc_e('fig'); ?></small></figcaption>
      </figure>
      </br><?php echo psoc_e('p4'); ?></p>
    </section>
    <p align="center"><?php echo psoc_e('fonti'); ?> <br><?php echo psoc_e('src1'); ?></p>
    <p align="center"><?php echo psoc_e('src2'); ?></p>
    <p align="center"><?php echo psoc_e('src3'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
