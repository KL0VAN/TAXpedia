<?php
require_once __DIR__ . '/../i18n/i18n.php';

if (!function_exists('itlp_get_lang')) {
  function itlp_get_lang() {
    if (function_exists('tp_lang')) return tp_lang();

    $lang = 'it';
    if (isset($_GET['lang'])) {
      $lang = strtolower(trim((string) $_GET['lang']));
    } elseif (isset($_COOKIE['tp_lang'])) {
      $lang = strtolower(trim((string) $_COOKIE['tp_lang']));
    }
    return in_array($lang, array('it','en'), true) ? $lang : 'it';
  }
}
$ITLP_LANG = itlp_get_lang();

if (!function_exists('itlp_h')) {
  function itlp_h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}

$ITLP_I18N = array(
  'it' => array(
    'meta_title' => 'Programma Educazione Fiscale UE - TAXpedia',
    'program-lede' => 'EU Youth Tax Literacy Program è un’iniziativa educativa di TAXpedia che rende accessibili i concetti fondamentali di tassazione e finanza pubblica, collegandoli alla cittadinanza europea e alla partecipazione democratica. Attraverso lezioni brevi e basate su fonti ufficiali, il programma aiuta i giovani a interpretare imposte su reddito e consumi, comprendere il ruolo dei contributi, e leggere in modo critico come vengono finanziati servizi e politiche pubbliche, a livello nazionale ed europeo.',
    'update' => 'Ultimo aggiornamento:',
    'download' => 'Scarica le lezioni',
    'download_p' => 'Ogni lezione è pensata per essere letta individualmente. Contengono definizioni, concetti essenziali e un recap finale.',
    'download_pdf' => 'Scarica il PDF',
    'download_pdf_it' => 'Scarica il PDF in italiano',
    'download_pdf_en' => 'Scarica il PDF in inglese',
    'soon' => 'In preparazione',
  
    'Starter-title' => 'Starter Pack: Tasse 101',
    'Starter-description' => 'Tipi di tasse, a cosa servono, chi le paga (legale vs reale), differenze chiave tra imposte e contributi.',
    'feature1' => 'Livello:',
    'feature2' => ' Base',
    'feature3' => 'Lingua:',

    'IRPEF-title' => 'IRPEF e imposte sul reddito',
    'IRPEF-description' => 'Cos’è l’IRPEF, come funzionano le imposte sul reddito.',
    
    'IVA-title' => 'IVA e tasse sui consumi',
    'IVA-description' => 'Cos’è l’IVA, perché è diversa dalle imposte sul reddito, e perché “chi la versa” non è sempre “chi la paga”.',
    'IVA-feature' => ' Base',

    'EU-title' => 'Bilancio UE',
    'EU-description' => 'Cos’è il bilancio dell’Unione Europea e come funziona.',
    'EU-feature' => ' Base',

    'DEBT-title' => 'Debito pubblico e deficit',
    'DEBT-description' => 'Cosa sono il debito pubblico e il deficit, come si formano e perché sono importanti per l’economia di uno Stato.',
    'DEBT-feature' => ' Base',

    'STATE-BUDGET-title' => 'Bilancio dello Stato',
    'STATE-BUDGET-description' => 'Come è strutturato il bilancio dello Stato, da dove provengono le entrate e come vengono programmate le spese.',
    'STATE-BUDGET-feature' => ' Base',

    'PUBLIC-SPENDING-title' => 'Spesa pubblica',
    'PUBLIC-SPENDING-description' => 'Come vengono utilizzate le risorse pubbliche, quali sono le principali voci di spesa e come incidono sulla vita dei cittadini.',
    'PUBLIC-SPENDING-feature' => ' Base',

    'LOCAL-FINANCE-title' => 'Finanza locale',
    'LOCAL-FINANCE-description' => 'Come Comuni e Regioni raccolgono e utilizzano le risorse per finanziare servizi e investimenti sul territorio.',
    'LOCAL-FINANCE-feature' => ' Base',

    'EU-FUNDS-title' => 'Fondi europei',
    'EU-FUNDS-description' => 'Cosa sono i fondi europei, da dove provengono e come finanziano progetti e investimenti negli Stati membri.',
    'EU-FUNDS-feature' => ' Base',

    'ECONOMIC-DATA-title' => 'Leggere i dati economici',
    'ECONOMIC-DATA-description' => 'Come interpretare indicatori, grafici e statistiche economiche per comprendere meglio l’economia e le notizie.',
    'ECONOMIC-DATA-feature' => ' Base',

    'disclaimer' => 'Materiale educativo: non è consulenza fiscale. Le regole possono cambiare, controlla sempre le fonti ufficiali.',
  ),
  'en' => array(
    'meta_title' => 'EU Youth Tax Literacy Program - TAXpedia',
    'program-lede' => 'The EU Youth Tax Literacy Program is an educational initiative by TAXpedia that makes the fundamental concepts of taxation and public finance accessible, connecting them to European citizenship and democratic participation. Through short lessons based on official sources, the program helps young people interpret income and consumption taxes, understand the role of contributions, and critically analyze how public services and policies are financed at the national and European levels.',
    'update' => 'Last update:', 
    'download' => 'Download the lessons',
    'download_p' => 'Each lesson is designed to be read individually. They contain definitions, key concepts, and a final summary.',
    'download_pdf' => 'Download the PDF',
    'download_pdf_it' => 'Download the PDF in Italian',
    'download_pdf_en' => 'Download the PDF in English',
    'soon' => 'In preparation',

    'Starter-title' => 'Starter Pack: Taxes 101',
    'Starter-description' => 'Types of taxes, what they are for, who pays them (legal vs. real), key differences between taxes and contributions.',
    'feature1' => 'Level:',
    'feature2' => ' Basic',
    'feature3' => 'Language:',

    'IRPEF-title' => 'IRPEF and income taxes',
    'IRPEF-description' => 'What is IRPEF, how do income taxes work?',
  
    'IVA-title' => 'VAT and consumption taxes',
    'IVA-description' => 'What is VAT, why is it different from income taxes, and why “the one who pays it” is not always “the one who pays it”.',
    'IVA-feature' => ' Basic',

    'EU-title' => 'EU budget',
    'EU-description' => 'What is the European Union budget and how does it work?',
    'EU-feature' => ' Basic',

    'DEBT-title' => 'Public debt and deficit',
    'DEBT-description' => 'What public debt and deficit are, how they arise, and why they matter for a country’s economy.',
    'DEBT-feature' => ' Basic',

    'STATE-BUDGET-title' => 'The State budget',
    'STATE-BUDGET-description' => 'How the State budget is structured, where public revenue comes from, and how expenditure is planned.',
    'STATE-BUDGET-feature' => ' Basic',

    'PUBLIC-SPENDING-title' => 'Public spending',
    'PUBLIC-SPENDING-description' => 'How public resources are used, the main areas of expenditure, and how they affect citizens’ lives.',
    'PUBLIC-SPENDING-feature' => ' Basic',

    'LOCAL-FINANCE-title' => 'Local public finance',
    'LOCAL-FINANCE-description' => 'How local and regional governments raise and use resources to fund services and investments.',
    'LOCAL-FINANCE-feature' => ' Basic',

    'EU-FUNDS-title' => 'European funds',
    'EU-FUNDS-description' => 'What European funds are, where they come from, and how they finance projects and investments across Member States.',
    'EU-FUNDS-feature' => ' Basic',

    'ECONOMIC-DATA-title' => 'Understanding economic data',
    'ECONOMIC-DATA-description' => 'How to interpret economic indicators, charts, and statistics to better understand the economy and the news.',
    'ECONOMIC-DATA-feature' => ' Basic',

    'disclaimer' => 'Educational materials: This is not tax advice. Rules may change, always check official sources.',
  ),
);
if (!function_exists('itlp_t')) {
  function itlp_t($key) {
    global $ITLP_LANG, $ITLP_I18N;
    if (isset($ITLP_I18N[$ITLP_LANG][$key])) return $ITLP_I18N[$ITLP_LANG][$key];
    if (isset($ITLP_I18N['it'][$key])) return $ITLP_I18N['it'][$key];
    return '';
  }
}

if (!function_exists('itlp_e')) {
  function itlp_e($key) {
    return itlp_h(itlp_t($key));
  }
};
?>
<!doctype html>
<html lang="<?php echo itlp_h($ITLP_LANG); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo itlp_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />

  <style>
    /* Program page layout (no white container box) */
    .program-page{padding:0;margin:0;}
    .program-hero{width:100%;height:min(150vh,620px);overflow:hidden;}
    .program-hero img{width:100%;height:100%;object-fit:cover;display:block;}
    .program-content{max-width:720px;margin:3rem auto 5rem;padding:0 1.25rem;text-align:left;}
    .program-content .section-title{text-align:center;margin-top:0;}
    .lessons{list-style:none;padding:0;display:grid;gap:1rem;margin:1.25rem 0 0;}
    .lesson-card{border:1px solid rgba(0,0,0,.12);border-radius:12px;padding:1rem;background:transparent;}
    .lesson-meta{margin:0 0 .75rem;font-size:.95rem;opacity:.85;}
    .lesson-actions{display:flex;gap:.5rem;flex-wrap:wrap;margin-top:.5rem;}
  </style>

</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

<main id="main" class="program-page">

  <section class="hero hero--eu"
    style="position:relative; min-height:60vh; background:#0B3D91; overflow:hidden;">
    <!-- fascia laterale -->
    <div style="position:absolute;top:0;left:0;height:100%;width:72px;background:#FFCC00; /* colore fascia */display:flex;align-items:center;justify-content:center;" aria-hidden="true">
      <div style="transform:rotate(-90deg);transform-origin:center;white-space:nowrap;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif; /* se vuoi */
          font-weight:700;letter-spacing:.08em;color:#0B3D91; /* colore testo */font-size:50px;">
        EU YOUTH
      </div>
    </div>

    <!-- contenuto hero -->
    <div style="text-align:center; padding-left:72px;">
      <div class="hero-copy">
        <h1 style="margin:0; padding-top:40px; color:#FFFFFF;">
          EU Youth Tax Literacy Program
        </h1>
        <div style="margin-top:140px;"></div>
      </div>
    </div>
  </section>

  <section class="program-content">

  <header class="program-header">

    <p class="program-lede">
      <?php echo itlp_e('program-lede'); ?>
    </p>

    <p><strong><?php echo itlp_e('update'); ?></strong> <time datetime="2026-09-25"> 25/09/2026</time></p>
  </header>

  <hr style="margin:2rem 0;" />

  <h3 id="tutte-le-lezioni"><?php echo itlp_e('download'); ?></h3>
  <p style="margin-top:.25rem;"><?php echo itlp_e('download_p'); ?></p>

  <ul class="lessons" style="list-style:none; padding:0; display:grid; gap:1rem;">
    <!-- CARD 1 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('Starter-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;"><?php echo itlp_e('Starter-description'); ?></p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('feature2'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT</span>
      </p>

      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary" href="/tools/downloads/TAXpedia_Tasse101.pdf" download><?php echo itlp_e('download_pdf'); ?></a>
      </div>
    </li>

    <!-- CARD 2 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('IRPEF-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;">
        <?php echo itlp_e('IRPEF-description'); ?>
      </p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('feature2'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT</span>
      </p>
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary" href="/tools/downloads/TAXpedia_IRPEF.pdf" download><?php echo itlp_e('download_pdf'); ?></a>
      </div>
    </li>

    <!-- CARD 3 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('IVA-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;">
        <?php echo itlp_e('IVA-description'); ?>
      </p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('feature2'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT</span>
      </p>
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary" href="/tools/downloads/TAXpedia_IVA.pdf" download><?php echo itlp_e('download_pdf'); ?></a>
      </div>
    </li>

    <!-- CARD 4 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('EU-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;">
        <?php echo itlp_e('EU-description'); ?>
      </p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('feature2'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT, EN</span>
      </p>
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary" href="/tools/downloads/TAXpedia_Bilancio_UE.pdf" download><?php echo itlp_e('download_pdf_it'); ?></a>
        <a class="btn btn-secondary" href="/tools/downloads/TAXpedia_EU_Budget.pdf" download><?php echo itlp_e('download_pdf_en'); ?></a>
      </div>
    </li>

    <!-- CARD 5 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('DEBT-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;">
        <?php echo itlp_e('DEBT-description'); ?>
      </p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('DEBT-feature'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT</span>
      </p>
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary"><?php echo itlp_e('soon'); ?></a>
      </div>
    </li>

    <!-- CARD 6 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('STATE-BUDGET-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;">
        <?php echo itlp_e('STATE-BUDGET-description'); ?>
      </p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('STATE-BUDGET-feature'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT</span>
      </p>
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary"><?php echo itlp_e('soon'); ?></a>
      </div>
    </li>

    <!-- CARD 7 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('PUBLIC-SPENDING-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;">
        <?php echo itlp_e('PUBLIC-SPENDING-description'); ?>
      </p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('PUBLIC-SPENDING-feature'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT</span>
      </p>
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary"><?php echo itlp_e('soon'); ?></a>
      </div>
    </li>

    <!-- CARD 8 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('LOCAL-FINANCE-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;">
        <?php echo itlp_e('LOCAL-FINANCE-description'); ?>
      </p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('LOCAL-FINANCE-feature'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT</span>
      </p>
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary"><?php echo itlp_e('soon'); ?></a>
      </div>
    </li>

    <!-- CARD 9 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('EU-FUNDS-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;">
        <?php echo itlp_e('EU-FUNDS-description'); ?>
      </p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('EU-FUNDS-feature'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT</span>
      </p>
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary"><?php echo itlp_e('soon'); ?></a>
      </div>
    </li>

    <!-- CARD 10 -->
    <li class="lesson-card">
      <h4 style="margin:.25rem 0;"><?php echo itlp_e('ECONOMIC-DATA-title'); ?></h4>
      <p style="margin:.25rem 0 0.75rem;">
        <?php echo itlp_e('ECONOMIC-DATA-description'); ?>
      </p>
      <p class="lesson-meta" style="margin:0 0 .75rem; font-size:.95rem; opacity:.85;">
        <span><strong><?php echo itlp_e('feature1'); ?></strong><?php echo itlp_e('ECONOMIC-DATA-feature'); ?></span> · <span><strong><?php echo itlp_e('feature3'); ?></strong> IT</span>
      </p>
      <div style="display:flex; gap:.5rem; flex-wrap:wrap;">
        <a class="btn btn-secondary"><?php echo itlp_e('soon'); ?></a>
      </div>
    </li>
  </ul>

  <hr style="margin:2rem 0;" />

  <h3>Disclaimer</h3>
    <p style="margin-top:.75rem;">
      <?php echo itlp_e('disclaimer'); ?>
    </p>
  </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
