<?php
require_once __DIR__ . '/../../i18n/i18n.php';
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (infrastrutture_trasporti.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Dizionario IT/EN locale
 * - Funzioni con prefisso dedicato + anti-redeclare
 */

$INT_LANG = function_exists('tp_lang') ? tp_lang() : 'it';

$INT_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'    => 'Infrastrutture e trasporti — TAXpedia',
    'h2'            => 'Infrastrutture e trasporti',

    'p1'            => 'La spesa italiana per l’istruzione e la ricerca nel 2025 è di circa 23,1 mld di euro, pari al 2,5% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare le attività del Ministero delle Infrastrutture e Trasporti e del Ministero dell’Economia e delle Finanze.',
    'p2'            => 'In dettaglio, la Legge di Bilancio per il 2025 prevede per il Ministero delle Infrastrutture e dei Trasporti una spesa di circa 16,3 mld di euro per le prime tre Missioni del Ministero, che prendono spese relative alla creazione di nuove infrastrutture e opere di interesse internazionale. Inoltre questo Ministero comprende tutte le spese adibite all’immatricolazione e tutto ciò relativo alla regolamentazione della circolazione stradale. Per quanto riguarda il MEF invece la spesa è maggiormente concentrata nella Missione 8 che si preoccupa di dispensare i fondi relativi alla protezione e al mantenimento della rete ferroviaria, stradale e aerea dello Stato italiano. La restante parte dei fondi vengono destinati per bandi e concorsi ai cittadini per aiutarli all’acquisto della prima casa fornendo delle garanzia per i prestiti rilasciati dalle banche (come ad esempio il fondo di garanzia per la prima casa).',
    'p3'            => 'La spesa per le infrastrutture e i trasporti comprende diverse voci, tra cui:',

    'li1_lbl'       => 'Personale:',
    'li1_desc'      => 'stipendi e retribuzioni per personale vario impegnato nei diversi programmi relativi ai Ministeri.',
    'li2_lbl'       => 'Riqualificazione e fondi per i cittadini:',
    'li2_desc'      => 'fondi destinati alla riqualificazione di zone rurali e fondi destinati ad aiutare giovani per l’accesso a finanziamenti per l’acquisto della prima casa.',
    'li3_lbl'       => 'Protezione e manutenzione:',
    'li3_desc'      => 'fondi destinati alla protezione e al mantenimento delle reti stradali, ferroviarie e aeree con i relativi progetti di ampliamento.',

    'p4'            => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa destinata ad aumentare per quanto riguarda questo settore.',

    'sources_label' => 'Fonti:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero delle Infrastrutture e dei Trasporti 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'    => 'Infrastructure and Transport (Infrastrutture e trasporti) — TAXpedia',
    'h2'            => 'Infrastructure and Transport (Infrastrutture e trasporti)',

    'p1'            => 'Italian expenditure on infrastructure and transport in 2025 amounts to approximately €23.1 billion, representing about 2.5% of total public expenditure. These resources finance the activities of the Ministry of Infrastructure and Transport and the Ministry of Economy and Finance.',
    'p2'            => 'Specifically, the 2025 Budget Law allocates approximately €16.3 billion to the Ministry of Infrastructure and Transport for its first three Missions, which include expenditure related to the construction of new infrastructure and projects of international relevance. This Ministry also covers all expenditure related to vehicle registration and road traffic regulation. With regard to the Ministry of Economy and Finance, spending is mainly concentrated under Mission 8, which is responsible for allocating funds for the protection and maintenance of the Italian railway, road, and air transport networks. The remaining resources are allocated through public calls and programmes aimed at supporting citizens in the purchase of their first home, by providing guarantees on bank loans (such as the First Home Guarantee Fund).',
    'p3'            => 'Expenditure on infrastructure and transport includes several components, such as:',

    'li1_lbl'       => 'Personnel:',
    'li1_desc'      => 'salaries and remuneration for staff involved in the various ministerial programmes.',
    'li2_lbl'       => 'Urban regeneration and citizen support:',
    'li2_desc'      => 'funds allocated to the regeneration of rural areas and to supporting young people in accessing financing for the purchase of their first home.',
    'li3_lbl'       => 'Protection and maintenance:',
    'li3_desc'      => 'resources allocated to the protection and maintenance of road, rail, and air networks, including expansion projects.',

    'p4'            => 'Overall, based on the 2025–2027 budgets of the various Ministries, expenditure in this sector is expected to increase.',

    'sources_label' => 'Sources:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero delle Infrastrutture e dei Trasporti 2025-2027',
  ),
);

if (!function_exists('int_t')) {
  function int_t($key) {
    global $INT_LANG, $INT_I18N;

    $lang = isset($INT_LANG) ? $INT_LANG : 'it';
    $dict = isset($INT_I18N) ? $INT_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('int_e')) {
  function int_e($key) {
    return htmlspecialchars(int_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($INT_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo int_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo int_e('h2'); ?></h2>

      <p><?php echo int_e('p1'); ?></br>
      </br><?php echo int_e('p2'); ?></br>
      </br><?php echo int_e('p3'); ?></br></p>

      <ul>
        <li><strong><?php echo int_e('li1_lbl'); ?></strong> <?php echo int_e('li1_desc'); ?></li>
        <li><strong><?php echo int_e('li2_lbl'); ?></strong> <?php echo int_e('li2_desc'); ?></li>
        <li><strong><?php echo int_e('li3_lbl'); ?></strong> <?php echo int_e('li3_desc'); ?></br></li>
      </ul>
      <figure class="media">
        <img src="imm/infrastrutture.png"
        alt="Ripartizione spesa infrastrutture" align="center"
        width="100%" height="auto" loading="lazy" >
        <figcaption><small>Ripartizione della spesa per le infrastrutture e i trasporti nel 2025.</small></figcaption>
      </figure>
      <p></br><?php echo int_e('p4'); ?></p>
    </section>

    <p align="center"><?php echo int_e('sources_label'); ?> <br><?php echo int_e('src1'); ?></p>
    <p align="center"><?php echo int_e('src2'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
