<?php
require_once __DIR__ . '/../../i18n/i18n.php';
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (pubblica_amministrazione.php)
 * - NON usa bootstrap/globale
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - NON cambia CSS/classi/struttura DOM/path
 */

if (!function_exists('pamm_get_lang')) {
  function pamm_get_lang() {
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

$PAMM_LANG = pamm_get_lang();

$PAMM_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'title' => 'Pubblica amministrazione — TAXpedia',
    'h2'    => 'Pubblica amministrazione',

    'p1'    => 'La spesa italiana per la pubblica amministrazione nel 2025 è di circa 79,3 mld di euro, pari al 8,6% circa della spesa pubblica complessiva.',
    'p2'    => 'Questa cifra è destinata a finanziare le attività di tutti i Ministeri che si interfacciano con i cittadini; fra questi quelli che hanno una spesa maggiore in questo settore sono sicuramente il Ministero dell’Economia e delle Finanze e il Ministero dell’Interno. In dettaglio, la Legge di Bilancio per il 2025 prevede per il Ministero dell’Economia e delle Finanze una spesa di circa 59 mld di euro per diversi programmi del bilancio di questo Ministero, che prevede le principali spese per la retribuzione di enti territoriali e regionali che si interfacciano con i cittadini, spese relative a costi per le cariche del nostro Paese e tutte le spese relative a analisi, monitoraggio e gestione della finanza pubblica.',
    'p3'    => 'In questo settore sono comprese anche delle spese relative al Ministero degli Affari Esteri e della Cooperazione Internazionale, che si concentrano principalmente su fondi relativi al mantenimento di relazioni internazionali da parte dello stato italiano in tutto il mondo.',
    'p4'    => 'La spesa per la pubblica amministrazione comprende diverse voci, tra cui:',

    'li1'   => 'Personale:',
    'li1d'  => 'stipendi e retribuzioni per personale vario inerente a questo ampio settore.',
    'li2'   => 'Relazioni internazionali:',
    'li2d'  => 'parte dei fondi sono adibiti al mantenimento e alla creazione di nuovi rapporti internazionali con diverse istituzioni e Paesi.',
    'li3'   => 'Fondi per la tutela dei cittadini italiani all\'estero:',
    'li3d'  => 'parte dei fondi sono adibiti alle politiche e servizi erogati a cittadini italiani in materia consolare, di tutela o assistenza.',

    'img_alt' => 'Ripartizione spesa pubblica amministrazione',
    'fig'     => 'Ripartizione della spesa per la pubblica amministrazione nel 2025.',

    'p5'    => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa costante per quanto riguarda questo settore, senza significativi cambiamenti.',

    'fonti' => 'Fonti:',
    'src1'  => 'Bilancio preventivo del Ministero dell\'Ambiente e della Sicurezza Energetica 2025-2027',
    'src2'  => 'Bilancio preventivo del Ministero dell’Interno 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'Public Administration (Pubblica amministrazione) — TAXpedia',
    'h2'    => 'Public Administration (Pubblica amministrazione)',

    'p1'    => 'Italian expenditure on public administration in 2025 amounts to approximately €79.3 billion, corresponding to about 8.6% of total public expenditure.',
    'p2'    => 'These resources are allocated to finance the activities of all Ministries that directly interact with citizens. Among these, the Ministries with the largest expenditure in this sector are the Ministry of Economy and Finance and the Ministry of the Interior. Specifically, the 2025 Budget Law allocates approximately €59 billion to the Ministry of Economy and Finance across several programmes of its budget. These resources cover the main expenditures related to remuneration of territorial and regional authorities interacting with citizens, costs associated with institutional offices of the State, and all expenditure related to the analysis, monitoring, and management of public finance.',
    'p3'    => 'This sector also includes expenditure related to the Ministry of Foreign Affairs and International Cooperation, which is mainly focused on funding activities aimed at maintaining Italy’s international relations worldwide.',
    'p4'    => 'Expenditure on public administration includes several components, such as:',

    'li1'   => 'Personnel:',
    'li1d'  => 'salaries and remuneration for staff employed across this broad sector.',
    'li2'   => 'International relations:',
    'li2d'  => 'resources allocated to maintaining and establishing international relations with institutions and foreign countries.',
    'li3'   => 'Funds for the protection of Italian citizens abroad:',
    'li3d'  => 'resources allocated to consular services and policies aimed at protecting and assisting Italian citizens residing abroad.',

    'img_alt' => 'Public administration spending breakdown',
    'fig'     => 'Public administration expenditure breakdown in 2025.',

    'p5'    => 'Overall, based on the 2025–2027 budgets of the relevant Ministries, expenditure in this sector is expected to remain stable, with no significant changes.',

    'fonti' => 'Sources:',
    'src1'  => 'Bilancio preventivo del Ministero dell\'Ambiente e della Sicurezza Energetica 2025-2027',
    'src2'  => 'Bilancio preventivo del Ministero dell’Interno 2025-2027',
  ),
);

if (!function_exists('pamm_t')) {
  function pamm_t($key) {
    global $PAMM_LANG, $PAMM_I18N;
    if (isset($PAMM_I18N[$PAMM_LANG][$key])) return $PAMM_I18N[$PAMM_LANG][$key];
    if (isset($PAMM_I18N['it'][$key])) return $PAMM_I18N['it'][$key];
    return '';
  }
}
if (!function_exists('pamm_e')) {
  function pamm_e($key) {
    return htmlspecialchars(pamm_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($PAMM_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo pamm_e('title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <!-- Contenuto principale -->
  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 id="h-protezione-ambientale" class="sector-title" style="text-align:center;"><?php echo pamm_e('h2'); ?></h2>

      <p><?php echo pamm_e('p1'); ?>
      </br><?php echo pamm_e('p2'); ?> <?php echo pamm_e('p3'); ?>
      <br><br><?php echo pamm_e('p4'); ?></br></p>

      <ul>
        <li><strong><?php echo pamm_e('li1'); ?></strong> <?php echo pamm_e('li1d'); ?></li>
        <li><strong><?php echo pamm_e('li2'); ?></strong> <?php echo pamm_e('li2d'); ?></li>
        <li><strong><?php echo pamm_e('li3'); ?></strong> <?php echo pamm_e('li3d'); ?></br></li>
      </ul>

      <figure class="media">
        <img src="imm/amministrazione.png"
        alt="<?php echo pamm_e('img_alt'); ?>" align="center"
        width="100%" height="auto" loading="lazy" >
        <figcaption><small><?php echo pamm_e('fig'); ?></small></figcaption>
      </figure>

      <p></br><?php echo pamm_e('p5'); ?></p>
    </section>

    <p align="center"><?php echo pamm_e('fonti'); ?> <br><?php echo pamm_e('src1'); ?></p>
    <p align="center"><?php echo pamm_e('src2'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
