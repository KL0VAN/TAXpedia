<?php
/**
 * i18n LOCALE (IT/EN) — Impact page
 * - NON usa bootstrap/globale
 * - Lingua da i18n.php globale (stesso meccanismo di GET/cookie su tutte le pagine)
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */

require_once __DIR__ . '/../i18n/i18n.php';

if (!isset($IMP_SUPPORTED)) $IMP_SUPPORTED = array('it', 'en');

$IMP_LANG = tp_lang();
if (!in_array($IMP_LANG, $IMP_SUPPORTED, true)) $IMP_LANG = 'it';

$IMP_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title' => 'Impact — TAXpedia',
    'meta_desc'  => 'L’impatto di TAXpedia: Paesi coperti, contenuti pubblicati, risorse educative, giovani coinvolti e obiettivi futuri.',

    'stats_title' => 'TAXpedia in numeri',
    'stats_sub'   => 'Questa sezione raccoglie le principali metriche del progetto.',

    'stat_1_label' => 'Paesi UE coperti',
    'stat_1_desc'  => 'Calcolatori e pagine dedicate ai 27 Stati membri dell’Unione Europea.',

    'stat_2_label' => 'Voci di glossario',
    'stat_2_desc'  => 'Definizioni semplici per orientarsi tra tasse, bilanci e finanza pubblica.',

    'stat_3_label' => 'Articoli e guide',
    'stat_3_desc'  => 'Contenuti divulgativi pubblicati per spiegare dati, concetti e politiche pubbliche.',

    'stat_4_label' => 'Giovani coinvolti',
    'stat_4_desc'  => 'Studenti e giovani contributor impegnati in redazione, dati, sviluppo e divulgazione.',

    'stat_5_label' => 'Risorse educative',
    'stat_5_desc'  => 'Materiali didattici e lezioni del programma EU Youth Tax Literacy Program.',

    'stat_6_label' => 'Lingue disponibili',
    'stat_6_desc'  => 'Contenuti e pagine principali disponibili in italiano e inglese.',

    'stat_7_label' => 'Utenti raggiunti',
    'stat_7_desc'  => 'Utenti del sito e followers dei profili social.',

    'stat_8_label' => 'Partner',
    'stat_8_desc'  => 'Istituti, associazioni, enti e organizzazioni coinvolte.',

    'areas_title' => 'Dove generiamo impatto',
    'areas_sub'   => 'Misuriamo l’impatto non solo in termini di traffico, ma anche in base alla capacità del progetto di rendere comprensibile il denaro pubblico e favorire partecipazione informata.',

    'area_1_title' => 'Educazione civica e fiscale',
    'area_1_text'  => 'Produciamo materiali semplici e riutilizzabili per aiutare studenti e giovani cittadini a capire tasse, IVA, IRPEF, bilanci pubblici e bilancio dell’Unione Europea.',

    'area_2_title' => 'Copertura europea',
    'area_2_text'  => 'Raccogliamo e organizziamo dati sui 27 Paesi dell’Unione Europea per confrontare modelli di spesa pubblica, sistemi fiscali e priorità nazionali.',

    'area_3_title' => 'Accessibilità dei dati',
    'area_3_text'  => 'Trasformiamo documenti tecnici e fonti istituzionali in spiegazioni, calcolatori e contenuti leggibili anche da chi non ha competenze economiche specialistiche.',

    'area_4_title' => 'Partecipazione democratica',
    'area_4_text'  => 'Crediamo che capire come vengono raccolte e spese le risorse pubbliche aiuti i cittadini a partecipare in modo più consapevole al dibattito democratico.',

    'last_update' => 'Ultimo aggiornamento: 25 settembre 2026',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title' => 'Impact — TAXpedia',
    'meta_desc'  => 'TAXpedia impact: countries covered, published content, educational resources, young people involved and future goals.',

    'stats_title' => 'TAXpedia in numbers',
    'stats_sub'   => 'This section collects the project’s main metrics.',

    'stat_1_label' => 'EU countries covered',
    'stat_1_desc'  => 'Calculators and pages dedicated to the 27 Member States of the European Union.',

    'stat_2_label' => 'Glossary entries',
    'stat_2_desc'  => 'Simple definitions to understand taxes, budgets and public finance.',

    'stat_3_label' => 'Articles and guides',
    'stat_3_desc'  => 'Published explainers that make data, concepts and public policies easier to understand.',

    'stat_4_label' => 'Young people involved',
    'stat_4_desc'  => 'Students and young contributors working on editorial content, data, development and outreach.',

    'stat_5_label' => 'Educational resources',
    'stat_5_desc'  => 'Learning materials and lessons from the EU Youth Tax Literacy Program.',

    'stat_6_label' => 'Available languages',
    'stat_6_desc'  => 'Main content and pages available in Italian and English.',

    'stat_7_label' => 'Users reached',
    'stat_7_desc'  => 'Website users and social media reach.',

    'stat_8_label' => 'Partners',
    'stat_8_desc'  => 'Schools, associations, institutions and organizations involved.',

    'areas_title' => 'Where we create impact',
    'areas_sub'   => 'We measure impact not only through traffic, but also through the project’s ability to make public money understandable and support informed participation.',

    'area_1_title' => 'Civic and tax education',
    'area_1_text'  => 'We create simple, reusable materials to help students and young citizens understand taxes, VAT, personal income tax, public budgets and the EU budget.',

    'area_2_title' => 'European coverage',
    'area_2_text'  => 'We collect and organize data on all 27 EU Member States to compare public spending models, tax systems and national priorities.',

    'area_3_title' => 'Data accessibility',
    'area_3_text'  => 'We turn technical documents and institutional sources into explanations, calculators and readable content for non-specialist audiences.',

    'area_4_title' => 'Democratic participation',
    'area_4_text'  => 'We believe that understanding how public resources are collected and spent helps citizens participate more consciously in democratic debate.',

    'last_update' => 'Last update: 25 september 2026',
  ),
);

$IMP_STATS = array(
  array('value' => '27',  'label' => 'stat_1_label', 'desc' => 'stat_1_desc'),
  array('value' => '50',  'label' => 'stat_2_label', 'desc' => 'stat_2_desc'),
  array('value' => '30+', 'label' => 'stat_3_label', 'desc' => 'stat_3_desc'),
  array('value' => '9',   'label' => 'stat_4_label', 'desc' => 'stat_4_desc'),
  array('value' => '10',  'label' => 'stat_5_label', 'desc' => 'stat_5_desc'),
  array('value' => '2',   'label' => 'stat_6_label', 'desc' => 'stat_6_desc'),
  array('value' => '3500+','label' => 'stat_7_label', 'desc' => 'stat_7_desc'),
  array('value' => '3',   'label' => 'stat_8_label', 'desc' => 'stat_8_desc'),
);

$IMP_AREAS = array(
  array('title' => 'area_1_title', 'text' => 'area_1_text'),
  array('title' => 'area_2_title', 'text' => 'area_2_text'),
  array('title' => 'area_3_title', 'text' => 'area_3_text'),
  array('title' => 'area_4_title', 'text' => 'area_4_text'),
);

if (!function_exists('imp_t')) {
  function imp_t($key) {
    global $IMP_LANG, $IMP_I18N;

    $lang = isset($IMP_LANG) ? $IMP_LANG : 'it';
    $dict = isset($IMP_I18N) ? $IMP_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('imp_e')) {
  function imp_e($key) {
    return htmlspecialchars(imp_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($IMP_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo imp_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <meta name="description" content="<?php echo imp_e('meta_desc'); ?>">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="AboutUs.css" />

  <style>
    .impact-page {
      padding-bottom: 3rem;
    }

    .impact-hero {
      margin: 2.25rem 0 1.75rem;
      padding: 2rem;
      border: 1px solid rgba(0, 0, 0, .08);
      border-radius: 24px;
      background: linear-gradient(135deg, rgba(178, 34, 34, .08), rgba(178, 34, 34, .02));
      text-align: center;
    }

    .impact-kicker {
      margin: 0 0 .55rem;
      color: var(--brand);
      font-size: .88rem;
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
    }

    .impact-hero h1,
    .impact-section h2 {
      color: var(--brand);
      font-family: Merriweather, serif;
    }

    .impact-hero h1 {
      margin: 0;
      font-size: clamp(2rem, 5vw, 3.4rem);
      line-height: 1.05;
    }

    .impact-hero p {
      max-width: 850px;
      margin: 1rem auto 0;
      color: var(--muted);
      font-size: 1.05rem;
      line-height: 1.7;
    }

    .impact-section {
      margin: 2.25rem 0;
    }

    .impact-section-head {
      max-width: 850px;
      margin: 0 auto 1.2rem;
      text-align: center;
    }

    .impact-section-head h2 {
      margin: 0;
      font-size: clamp(1.55rem, 3vw, 2.2rem);
    }

    .impact-section-head p {
      margin: .65rem 0 0;
      color: var(--muted);
      line-height: 1.65;
    }

    .impact-grid {
      display: grid;
      grid-template-columns: repeat(4, minmax(0, 1fr));
      gap: 1rem;
    }

    .impact-card {
      min-height: 180px;
      padding: 1.25rem;
      border: 1px solid rgba(0, 0, 0, .08);
      border-radius: 20px;
      background: #fff;
      box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
    }

    .impact-number {
      display: block;
      color: var(--brand);
      font-family: Merriweather, serif;
      font-size: 2.35rem;
      font-weight: 800;
      line-height: 1;
    }

    .impact-card h3 {
      margin: .8rem 0 .45rem;
      font-size: 1.05rem;
    }

    .impact-card p {
      margin: 0;
      color: var(--muted);
      line-height: 1.55;
    }

    .impact-area-grid {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 1rem;
    }

    .impact-area {
      padding: 1.35rem;
      border-left: 5px solid var(--brand);
      border-radius: 18px;
      background: rgba(0, 0, 0, .025);
    }

    .impact-area h3 {
      margin: 0 0 .45rem;
      color: var(--brand);
    }

    .impact-area p {
      margin: 0;
      color: var(--muted);
      line-height: 1.65;
    }

    .impact-targets {
      max-width: 900px;
      margin: 0 auto;
      padding: 1.5rem;
      border-radius: 22px;
      background: #fff;
      border: 1px solid rgba(0, 0, 0, .08);
      box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
    }

    .impact-targets ul {
      margin: 0;
      padding-left: 1.2rem;
    }

    .impact-targets li {
      margin: .65rem 0;
      color: var(--muted);
      line-height: 1.55;
    }

    .impact-note {
      max-width: 900px;
      margin: 2.25rem auto 0;
      padding: 1.25rem 1.5rem;
      border-radius: 20px;
      background: rgba(178, 34, 34, .06);
      color: var(--muted);
      line-height: 1.65;
    }

    .impact-note h2 {
      margin: 0 0 .55rem;
      color: var(--brand);
      font-family: Merriweather, serif;
      font-size: 1.35rem;
    }

    .impact-note p {
      margin: 0;
    }

    .impact-last-update {
      margin-top: .9rem;
      font-size: .92rem;
      font-weight: 700;
    }

    @media (max-width: 960px) {
      .impact-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
      }
    }

    @media (max-width: 640px) {
      .impact-hero {
        padding: 1.35rem;
        border-radius: 20px;
      }

      .impact-grid,
      .impact-area-grid {
        grid-template-columns: 1fr;
      }

      .impact-card {
        min-height: auto;
      }
    }
  </style>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container impact-page" id="main" role="main">
    <section class="impact-section" aria-labelledby="stats-title">
      <div class="impact-section-head">
        <h2 id="stats-title"><?php echo imp_e('stats_title'); ?></h2>
        <p><?php echo imp_e('stats_sub'); ?></p>
      </div>

      <div class="impact-grid">
        <?php foreach ($IMP_STATS as $stat): ?>
          <article class="impact-card">
            <span class="impact-number"><?php echo htmlspecialchars($stat['value'], ENT_QUOTES, 'UTF-8'); ?></span>
            <h3><?php echo imp_e($stat['label']); ?></h3>
            <p><?php echo imp_e($stat['desc']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

    <p class="impact-last-update"><?php echo imp_e('last_update'); ?></p>

    <section class="impact-section" aria-labelledby="areas-title">
      <div class="impact-section-head">
        <h2 id="areas-title"><?php echo imp_e('areas_title'); ?></h2>
        <p><?php echo imp_e('areas_sub'); ?></p>
      </div>

      <div class="impact-area-grid">
        <?php foreach ($IMP_AREAS as $area): ?>
          <article class="impact-area">
            <h3><?php echo imp_e($area['title']); ?></h3>
            <p><?php echo imp_e($area['text']); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </section>

  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <!-- Default Statcounter code for Home https://www.taxpedia.eu/ -->
  <script type="text/javascript">
  var sc_project=13170178;
  var sc_invisible=1;
  var sc_security="f093464a";
  </script>
  <script type="text/javascript"
  src="https://www.statcounter.com/counter/counter.js"
  async></script>
  <noscript><div class="statcounter"><a title="hit counter"
  href="https://statcounter.com/" target="_blank"><img
  class="statcounter"
  src="https://c.statcounter.com/13170178/0/f093464a/1/"
  alt="hit counter"
  referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
  <!-- End of Statcounter Code -->
</body>
</html>
