<?php
require_once __DIR__ . '/../../i18n/i18n.php';
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (istruzione_ricerca.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Dizionario IT/EN locale
 * - Funzioni con prefisso dedicato + anti-redeclare
 */

$EDU_LANG = function_exists('tp_lang') ? tp_lang() : 'it';

$EDU_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'    => 'Istruzione e ricerca — TAXpedia',
    'h2'            => 'Istruzione e ricerca',

    'p1'            => 'La spesa italiana per l’istruzione e la ricerca nel 2025 è di circa 72,3 mld di euro, pari al 7,9% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare le attività del Ministero dell’Istruzione e del Merito e del Ministero dell’Università e della Ricerca, tra cui stipendi del personale, transizione digitale delle scuole e corsi annessi, vari sostegni alle famiglie e studenti per garantire il diritto allo studio.',
    'p2'            => 'In dettaglio, la Legge di Bilancio per il 2025 prevede per il Ministero dell’Istruzione e del Merito una spesa di circa 56,7 mld di euro per la Missione 1 del MIM, che prevede le principali spese inerenti al mantenimento delle scuole, i pagamenti del personale e tutto ciò che comporta la spesa per la transizione al digitale.',
    'p3'            => 'Per quanto riguarda le spese relative al Ministero dell’Università e della Ricerca esse si concentrano maggiormente nella Missione 2 per l’equivalente di 11,5 mld.',
    'p4'            => 'La spesa per l’istruzione comprende diverse voci, tra cui:',

    'li1_lbl'       => 'Personale:',
    'li1_desc'      => 'stipendi e retribuzioni per personale vario, sia inerente l’ambiente scolastico, sia per quanto riguarda il personale inerente ad istruire i primi.',
    'li2_lbl'       => 'Ricerca e innovazione:',
    'li2_desc'      => 'stipendi e retribuzioni per il personale, fondi privati e pubblici destinati alla ricerca.',
    'li3_lbl'       => 'Contributi per studenti e famiglie:',
    'li3_desc'      => 'fondi stanziati da distribuire a famiglie e studenti per garantire il diritto allo studio sotto forma di borse di studio o incentivi.',

    'img_alt'       => 'Ripartizione spesa istruzione',
    'figcaption'    => 'Ripartizione della spesa per il settore dell\'istruzione nel 2025.',

    'p5'            => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa costante per quanto riguarda questo settore, senza significativi cambiamenti.',

    'sources_label' => 'Fonti:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero dell’Università e della Ricerca 2025-2027',
    'src3'          => 'Bilancio preventivo del Ministero dell’Istruzione e del Merito 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'    => 'Education and Research (Istruzione e ricerca) — TAXpedia',
    'h2'            => 'Education and Research (Istruzione e ricerca)',

    'p1'            => 'Italian expenditure on education and research in 2025 amounts to approximately €72.3 billion, corresponding to about 7.9% of total public expenditure. These resources finance the activities of the Ministry of Education and Merit and the Ministry of University and Research, including staff salaries, the digital transition of schools and related training programmes, and various forms of support for families and students to ensure the right to education.',
    'p2'            => 'Specifically, the 2025 Budget Law allocates approximately €56.7 billion to the Ministry of Education and Merit under Mission 1, covering the main expenditure related to school maintenance, staff remuneration, and the digital transition of the education system.',
    'p3'            => 'Expenditure related to the Ministry of University and Research is mainly concentrated under Mission 2, amounting to approximately €11.5 billion.',
    'p4'            => 'Education expenditure includes several components, such as:',

    'li1_lbl'       => 'Personnel:',
    'li1_desc'      => 'salaries and remuneration for staff working in the school system and in educational activities.',
    'li2_lbl'       => 'Research and innovation:',
    'li2_desc'      => 'salaries, as well as public and private funds allocated to research activities.',
    'li3_lbl'       => 'Student and family support:',
    'li3_desc'      => 'funds allocated to families and students to guarantee the right to education, including scholarships and incentives.',

    'img_alt'       => 'Education spending breakdown',
    'figcaption'    => 'Education spending breakdown in 2025.',

    'p5'            => 'Overall, based on the 2025–2027 budgets of the relevant Ministries, expenditure in this sector is expected to remain stable, with no significant changes.',

    'sources_label' => 'Sources:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero dell’Università e della Ricerca 2025-2027',
    'src3'          => 'Bilancio preventivo del Ministero dell’Istruzione e del Merito 2025-2027',
  ),
);

if (!function_exists('edu_t')) {
  function edu_t($key) {
    global $EDU_LANG, $EDU_I18N;

    $lang = isset($EDU_LANG) ? $EDU_LANG : 'it';
    $dict = isset($EDU_I18N) ? $EDU_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('edu_e')) {
  function edu_e($key) {
    return htmlspecialchars(edu_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($EDU_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo edu_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo edu_e('h2'); ?></h2>

      <p><?php echo edu_e('p1'); ?></br>
      </br><?php echo edu_e('p2'); ?></br>
      </br><?php echo edu_e('p3'); ?></br>
      </br><?php echo edu_e('p4'); ?></br></p>

      <ul>
        <li><strong><?php echo edu_e('li1_lbl'); ?></strong> <?php echo edu_e('li1_desc'); ?></li>
        <li><strong><?php echo edu_e('li2_lbl'); ?></strong> <?php echo edu_e('li2_desc'); ?></li>
        <li><strong><?php echo edu_e('li3_lbl'); ?></strong> <?php echo edu_e('li3_desc'); ?></li>
      </ul>

      <figure>
        <img src="imm/istruzione.png"
          alt="<?php echo edu_e('img_alt'); ?>" align="center"
          width="100%" height="auto" loading="lazy" >
        <figcaption><small><?php echo edu_e('figcaption'); ?></small></figcaption>
      </figure>

      <p></br><?php echo edu_e('p5'); ?></p>
    </section>

    <p align="center"><?php echo edu_e('sources_label'); ?> <br><?php echo edu_e('src1'); ?></p>
    <p align="center"><?php echo edu_e('src2'); ?></p>
    <p align="center"><?php echo edu_e('src3'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
