<?php
require_once __DIR__ . '/../../i18n/i18n.php';
// Sicurezza e ordine pubblico — TAXpedia
// Versione PHP con header e footer unificati

/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (sicurezza_ordine.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - NON cambia CSS/classi/struttura DOM/path
 */

if (!function_exists('sop_get_lang')) {
  function sop_get_lang() {
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

$SOP_LANG = sop_get_lang();

$SOP_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'title' => 'Sicurezza e ordine pubblico — TAXpedia',
    'h2'    => 'Sicurezza e ordine pubblico',

    'p1'    => 'La spesa italiana per la sicurezza e l’ordine pubblico nel 2025 è di circa 22,9 mld di euro, pari al 2,5% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare numerose attività che vengono attribuite a numerosi Ministeri, tra cui le spese più ingenti risultano essere associate al Ministero dell’Economia e delle Finanze e al Ministero dell’Interno.',
    'p2'    => 'In dettaglio, la Legge di Bilancio per il 2025 prevede per il Ministero dell’Interno una spesa di circa 12 mld di euro per le Missione 3 e 4, che rispettivamente si occupano della sicurezza pubblica e contrasto alla criminalità interna e delle frontiere e dell’organizzazione e pianificazione degli eserciti nazionali.',
    'p3'    => 'Altri fondi, per un totale di circa 6 mld di euro sono di competenza del Ministero dell’Economia e delle Finanze, sono destinati per il contrasto all’evasione fiscale e all’antiriciclaggio, sviluppati nel Programma 1.2 e 1.3 del bilancio del Ministero. La restante parte dei fondi vengono spesi da altri Ministeri e vengono adibiti per il mantenimento della Guardia Costiera e altri enti e in generale per le spese relative ad enti per la prevenzione e la protezione di frodi di vario genere.',
    'p4'    => 'La spesa per la sicurezza e l’ordine pubblico comprende diverse voci, tra cui:',

    'li1'   => 'Personale:',
    'li1d'  => 'stipendi e retribuzioni per personale vario, sia inerente i singoli enti, sia per il funzionamento di tutto l’apparato.',
    'li2'   => 'Fondi internazionali:',
    'li2d'  => 'fondi spesi per il mantenimento della pace mediante il pagamento di tributi dovuti da trattati stipulati nei decenni precedenti.',
    'li3'   => 'Prevenzione:',
    'li3d'  => 'gran parte di questi fondi vengono spesi per cercare di prevenire e di conseguenza ridurre numerose frodi.',

    'p5'    => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa costante per quanto riguarda questo settore, senza significativi cambiamenti.',

    'fonti' => 'Fonti:',
    'src1'  => 'Bilancio preventivo del Ministero dell\'Ambiente e della Sicurezza Energetica 2025-2027',
    'src2'  => 'Bilancio preventivo del Ministero delle Infrastrutture e dei Trasporti 2025-2027',
    'src3'  => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src4'  => 'Bilancio preventivo del Ministero delgli Affari Esteri 2025-2027',
    'src5'  => 'Bilancio preventivo del Ministero dell’Interno 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'Public Security and Law Enforcement (Sicurezza e ordine pubblico) — TAXpedia',
    'h2'    => 'Public Security and Law Enforcement (Sicurezza e ordine pubblico)',

    'p1'    => 'Italian expenditure on public security and law enforcement in 2025 amounts to approximately €22.9 billion, corresponding to about 2.5% of total public expenditure. These resources finance a wide range of activities attributed to several Ministries, with the most significant expenditure associated with the Ministry of Economy and Finance and the Ministry of the Interior.',
    'p2'    => 'Specifically, the 2025 Budget Law allocates approximately €12 billion to the Ministry of the Interior under Missions 3 and 4, which are respectively responsible for public security and the fight against domestic crime, border control, and the organisation and planning of national armed forces.',
    'p3'    => 'Additional funds, amounting to approximately €6 billion, fall under the responsibility of the Ministry of Economy and Finance and are allocated to combating tax evasion and money laundering, as provided for under Programmes 1.2 and 1.3 of the Ministry’s budget. The remaining share of expenditure is managed by other Ministries and is allocated to the maintenance of the Coast Guard and other bodies, as well as to expenditure related to fraud prevention and protection activities.',
    'p4'    => 'Expenditure on public security and law enforcement includes several components, such as:',

    'li1'   => 'Personnel:',
    'li1d'  => 'salaries and remuneration for staff employed within individual bodies and for the operation of the entire security apparatus.',
    'li2'   => 'International funds:',
    'li2d'  => 'resources allocated to peacekeeping efforts through contributions arising from international treaties concluded in previous decades.',
    'li3'   => 'Prevention:',
    'li3d'  => 'a significant share of funds is devoted to preventing and, consequently, reducing various forms of fraud.',

    'p5'    => 'Overall, based on the 2025–2027 budgets of the relevant Ministries, expenditure in this sector is expected to remain stable, with no significant changes.',

    'fonti' => 'Sources:',
    'src1'  => 'Bilancio preventivo del Ministero dell\'Ambiente e della Sicurezza Energetica 2025-2027',
    'src2'  => 'Bilancio preventivo del Ministero delle Infrastrutture e dei Trasporti 2025-2027',
    'src3'  => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src4'  => 'Bilancio preventivo del Ministero delgli Affari Esteri 2025-2027',
    'src5'  => 'Bilancio preventivo del Ministero dell’Interno 2025-2027',
  ),
);

if (!function_exists('sop_t')) {
  function sop_t($key) {
    global $SOP_LANG, $SOP_I18N;
    if (isset($SOP_I18N[$SOP_LANG][$key])) return $SOP_I18N[$SOP_LANG][$key];
    if (isset($SOP_I18N['it'][$key])) return $SOP_I18N['it'][$key];
    return '';
  }
}
if (!function_exists('sop_e')) {
  function sop_e($key) {
    return htmlspecialchars(sop_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($SOP_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo sop_e('title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo sop_e('h2'); ?></h2>

      <p><?php echo sop_e('p1'); ?>
      <?php echo sop_e('p2'); ?>
      </br><?php echo sop_e('p3'); ?>
      <br><br><?php echo sop_e('p4'); ?></br>
      <ul>
        <li><strong><?php echo sop_e('li1'); ?></strong> <?php echo sop_e('li1d'); ?></li>
        <li><strong><?php echo sop_e('li2'); ?></strong> <?php echo sop_e('li2d'); ?></li>
        <li><strong><?php echo sop_e('li3'); ?></strong> <?php echo sop_e('li3d'); ?></br></li>
      </ul>
      <p></br><?php echo sop_e('p5'); ?></p>
    </section>
    <p align="center"><?php echo sop_e('fonti'); ?> <br><?php echo sop_e('src1'); ?></p>
    <p align="center"><?php echo sop_e('src2'); ?></p>
    <p align="center"><?php echo sop_e('src3'); ?></p>
    <p align="center"><?php echo sop_e('src4'); ?></p>
    <p align="center"><?php echo sop_e('src5'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
