<?php
require_once __DIR__ . '/i18n/i18n.php';

/**
 * Traduzioni SOLO per questa pagina (index)
 * (così non devi per forza riempire subito i dizionari globali)
 */
$lang = tp_lang();

$page_i18n = array(
  // NAV + FOOTER (così header/footer funzionano anche se i dizionari globali sono incompleti)
  'lang_label' => ($lang === 'en') ? 'Language' : 'Lingua',
  'nav_home' => 'Home',
  'nav_calculator' => ($lang === 'en') ? 'Calculator' : 'Calcolatore',
  'nav_about' => ($lang === 'en') ? 'About us' : 'Chi siamo',

  'footer_note' => ($lang === 'en') ? 'Information for educational purposes.' : 'Informazioni a scopo divulgativo.',
  'footer_rights' => ($lang === 'en') ? 'All rights reserved.' : 'Tutti i diritti riservati.',
  'footer_privacy' => 'Privacy Policy',

  // META
  'meta_title' => ($lang === 'en') ? 'TAXpedia — Simple tax transparency' : 'TAXpedia — Trasparenza fiscale semplice',
  'meta_description' => ($lang === 'en')
    ? 'TAXpedia makes taxes understandable: a free calculator, official public-spending data, and simple guides for citizens.'
    : 'TAXpedia rende le tasse comprensibili: calcolatore gratuito, dati ufficiali sulla spesa pubblica e guide semplici per cittadini.',

  // HERO
  'hero_h1' => ($lang === 'en')
    ? 'Your taxes, explained in a <span class="hl">simple</span> and <span class="hl">transparent</span> way.'
    : 'Le tue tasse, spiegate in modo <span class="hl">semplice</span> e <span class="hl">trasparente</span>.',
  'hero_subtitle' => ($lang === 'en')
    ? 'With TAXpedia you understand how public spending is composed and where your contributions go.
       A <strong>free</strong>, <strong>clear</strong> and <strong>reliable</strong> tool.'
    : 'Con TAXpedia capisci come è composta la spesa pubblica e dove vengono impiegati i tuoi contributi.
       Uno strumento <strong>gratuito</strong>, <strong>chiaro</strong> e <strong>affidabile</strong>.',
  'cta_calc' => ($lang === 'en') ? 'Try the calculator now' : 'Prova ora il calcolatore',
  'cta_edu' => ($lang === 'en') ? 'Learn with us' : 'Impara con noi',
  'hero_micro' => ($lang === 'en') ? 'Free • official data • no registration' : 'Gratis • dati ufficiali • nessuna registrazione',
  'trust_1' => ($lang === 'en') ? 'Data from <strong>official</strong> sources' : 'Dati da fonti <strong>ufficiali</strong>',
  'trust_2' => ($lang === 'en') ? 'No registration required' : 'Nessuna registrazione richiesta',

  // EDUCATION PROGRAM
  'program_h2' => ($lang === 'en') ? 'Tools for financial education' : 'Strumenti per l’educazione finanziaria',
  'program_p' => ($lang === 'en') ? 'Practical resources for understanding the world of taxes easily.' : 'Risorse pratiche per conoscere il mondo del fisco in modo semplice.',
  'edu-badge_1' => ($lang === 'en') ? 'Program' : 'Programma',
  'edu-text_1' => ($lang === 'en') ? 'Ready-to-use lessons: tax basics, examples, and definitions.' : 'Lezioni pronte da usare: basi sulle tasse, esempi e definizioni.',
  'download_edu' => ($lang === 'en') ? 'Download the lessons' : 'Scarica le lezioni',
  'edu-badge_2' => ($lang === 'en') ? 'Glossary' : 'Glossario',
  'gloss_h3' => ($lang === 'en') ? 'Not sure about a term? Check our glossary' : 'Qualche termine non ti è chiaro? Consulta il nostro glossario',
  'gloss_sub' => ($lang === 'en') ? 'Short definitions of the most technical terms' : 'Brevi definizioni dei termini più tecnici',
  'gloss_btn' => ($lang === 'en') ? 'Open the glossary' : 'Usa il glossario',

  // ABOUT
  'about_h2' => ($lang === 'en') ? 'What is TAXpedia?' : 'Cos’è TAXpedia?',
  'about_sub' => ($lang === 'en')
    ? 'An initiative started by young students to raise awareness by showing, in a <strong>clear</strong> and <strong>simple</strong> way, where the taxes paid by each taxpayer are used.'
    : 'Un’iniziativa nata da giovani studenti per cercare di sensibilizzare la popolazione mostrando in modo <strong>chiaro</strong> e <strong>semplice</strong> dove vengono impiegate le tasse versate da ciascun contribuente.',
  'feat_1_h3' => ($lang === 'en') ? 'Reliability' : 'Affidabilità',
  'feat_1_p' => ($lang === 'en') ? 'Data collected from official ministerial budgets.' : 'Dati raccolti dai bilanci ufficiali dei Ministeri.',
  'feat_2_h3' => ($lang === 'en') ? 'Clarity' : 'Chiarezza',
  'feat_2_p' => ($lang === 'en') ? 'Charts and data simplified into language everyone can understand.' : 'Grafici e dati semplificati in un linguaggio comprensibili a tutti.',
  'feat_3_h3' => ($lang === 'en') ? 'Impartiality' : 'Imparzialità',
  'feat_3_p' => ($lang === 'en') ? 'Data analyzed objectively and without political bias.' : 'Dati analizzati in modo oggettivo e apolitico.',
  'about_btn' => ($lang === 'en') ? 'Find out more about us' : 'Scopri di più su di noi',


  'stat' => '5000+ mld',
  'stat_label' => ($lang === 'en') ? 'of public spending<br> analyzed' : 'di spesa pubblica<br> analizzata',
  'about_stat_1_num' => '20',
  'about_stat_1_label' => ($lang === 'en') ? 'Countries covered' : 'Paesi coperti',
  'about_stat_2_num' => '31',
  'about_stat_2_label' => ($lang === 'en') ? 'Glossary entries' : 'Voci di glossario',
  'about_stat_3_num' => '20+',
  'about_stat_3_label' => ($lang === 'en') ? 'Articles & guides' : 'Articoli e guide',

  // SOCIAL + CONTACT
  'social_h2' => ($lang === 'en') ? 'Follow us on social' : 'Seguici sui social',
  'social_sub' => ($lang === 'en')
    ? 'So you don’t miss updates and always stay informed about public finance.</br></br>'
    : 'Per non perderti le ultime novità e per restare sempre aggiornato sulla finanza pubblica.</br></br>',
  'contact_h2' => ($lang === 'en') ? 'Contact us' : 'Contattaci',
  'contact_sub' => ($lang === 'en')
    ? 'For any question or deeper dive, we’re here for you.</br></br>'
    : 'Per qualunque dubbio, domanda o approfondimento siamo a tua disposizione.</br></br>',

  // COOKIE
  'cookie_strong' => ($lang === 'en')
    ? 'We only use essential technical cookies to improve the user experience.'
    : 'Utilizziamo solo cookie tecnici essenziali per migliorare l’esperienza utente.',
  'cookie_sub' => ($lang === 'en') ? 'No advertising.' : 'Nessuna pubblicità.',
  'cookie_accept' => ($lang === 'en') ? 'Accept' : 'Accetta',
  'cookie_info' => ($lang === 'en') ? 'Read the policy' : 'Leggi l’informativa',
);

if (!isset($GLOBALS['TP_I18N']) || !is_array($GLOBALS['TP_I18N'])) {
  $GLOBALS['TP_I18N'] = array();
}
$GLOBALS['TP_I18N'] = $page_i18n + $GLOBALS['TP_I18N'];
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars(tp_lang(), ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo e('meta_title'); ?></title>
  <link rel="icon" href="imm/logoT.png" type="image/png">
  <meta name="description" content="<?php echo e('meta_description'); ?>">
  <meta name="robots" content="index, follow" />
  <link rel="canonical" href="https://taxpedia.eu/" />

  <!-- Open Graph -->
  <meta property="og:site_name" content="TAXpedia" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="<?php echo e('meta_title'); ?>" />
  <meta property="og:description" content="<?php echo e('meta_description'); ?>" />
  <meta property="og:url" content="https://taxpedia.eu/" />
  <meta property="og:image" content="https://taxpedia.eu/assets/og-home.jpg" />
  <meta property="og:image:alt" content="TAXpedia — Trasparenza fiscale" />

  <!-- Fonts + CSS -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="styleIndex.css" />
  <link rel="stylesheet" href="article/stylearticoli.css" />

  <!-- JSON-LD Organization + WebSite -->
  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@graph":[
      {
        "@type":"Organization",
        "@id":"https://taxpedia.eu/#organization",
        "name":"TAXpedia",
        "url":"https://taxpedia.eu",
        "logo":"https://taxpedia.eu/assets/logo-taxpedia.png",
        "sameAs":[
          "https://www.linkedin.com/company/taxpedia-eu",
          "https://www.instagram.com/taxpedia.eu"
        ],
        "contactPoint":[{"@type":"ContactPoint","contactType":"customer service","email":"info@taxpedia.eu"}]
      },
      {
        "@type":"WebSite",
        "@id":"https://taxpedia.eu/#website",
        "url":"https://taxpedia.eu",
        "name":"TAXpedia",
        "publisher":{"@id":"https://taxpedia.eu/#organization"},
        "potentialAction":{
          "@type":"SearchAction",
          "target":"https://taxpedia.eu/search?q={search_term_string}",
          "query-input":"required name=search_term_string"
        }
      }
    ]
  }
  </script>
</head>

<body>
  <?php require_once __DIR__ . '/partials/header.php'; ?>

  <!-- === COOKIE BANNER (minimal, solo tecnici) === -->
  <div id="cookie-banner"
       class="cookie-banner"
       role="region"
       aria-label="Informativa sui cookie"
       aria-live="polite"
       hidden>
    <div class="cookie-text">
      <strong><?php echo t('cookie_strong'); ?></strong>
      <span class="cookie-sub"><?php echo t('cookie_sub'); ?></span>
    </div>

    <div class="cookie-actions">
      <button id="accept-cookies" class="btn-accept" type="button"><?php echo t('cookie_accept'); ?></button>
      <a class="btn-info" href="/aboutus/privacy.php" rel="noopener"><?php echo t('cookie_info'); ?></a>
    </div>
  </div>

  <!-- ===================== HERO ===================== -->
  <section class="hero hero--eu">
    <div class="container hero-grid">
      <div class="hero-copy">
        <h1><?php echo t('hero_h1'); ?></h1>
        <p class="subtitle"><?php echo t('hero_subtitle'); ?></p>

        <div class="cta-row">
          <a class="btn btn-primary" href="calculator/menu.php"><?php echo t('cta_calc'); ?></a>
          <a class="btn btn-ghost" href="#edu-tools"><?php echo t('cta_edu'); ?></a>
        </div>

        <ul class="trust-bar" role="list">
          <li><span class="check" aria-hidden="true">✓</span> <?php echo t('trust_1'); ?></li>
          <li><span class="check" aria-hidden="true">✓</span> <?php echo t('trust_2'); ?></li>
        </ul>
      </div>

      <div class="hero-map" aria-hidden="true">
        <img class="eu-map-img" src="imm/eu-map.svg" alt="" loading="eager" decoding="async">
      </div>
    </div>
  </section>

  <!-- ===================== I NOSTRI ARTICOLI ===================== -->
  <?php require_once __DIR__ . '/partials/new-article.php'; ?>

  <!-- ==================== EDUCATION ======================== -->
  <section id="edu-tools" class="edu-tools" aria-label="Strumenti per l’educazione finanziaria">
  <div class="container">
    <div class="section-head section-head--center">
      <h2 style="color:white"><?php echo t('program_h2'); ?></h2>
      <p style="color:white" class="subtitle"><?php echo t('program_p'); ?></p>
    </div>

    <div class="edu-grid">
      <!-- Programma -->
      <article class="edu-card">
        <div class="edu-card-top">
          <span class="edu-badge"><?php echo t('edu-badge_1'); ?></span>
          <h3>EU Youth Tax Literacy Program</h3>
          <p class="edu-text"><?php echo t('edu-text_1'); ?></p>
        </div>
        <div class="edu-actions">
          <a class="btn btn-primary" href="/tools/program.php"><?php echo t('download_edu'); ?></a>
        </div>
      </article>

      <!-- Glossario -->
      <article class="edu-card">
        <div class="edu-card-top">
          <span class="edu-badge"><?php echo t('edu-badge_2'); ?></span>
          <h3><?php echo t('gloss_h3'); ?></h3>
          <p class="edu-text"><?php echo t('gloss_sub'); ?></p>
        </div>

        <div class="edu-actions">
          <a class="btn btn-primary" href="/glossary/glossario.php"><?php echo t('gloss_btn'); ?></a>
        </div>
      </article>
    </div>
    </div>
  </section>


  <!-- ===================== PRESENTAZIONE ===================== -->
  <section class="value" id="about">
    <div class="container">
      <div class="section-head">
        <h2><?php echo t('about_h2'); ?></h2>
        <p class="section-sub"><?php echo t('about_sub'); ?></p>
      </div>

      <div class="features">
        <article class="feature">
          <h3><?php echo t('feat_1_h3'); ?></h3>
          <p><?php echo t('feat_1_p'); ?></p>
        </article>
        <article class="feature">
          <h3><?php echo t('feat_2_h3'); ?></h3>
          <p><?php echo t('feat_2_p'); ?></p>
        </article>
        <article class="feature">
          <h3><?php echo t('feat_3_h3'); ?></h3>
          <p><?php echo t('feat_3_p'); ?></p>
        </article>
      </div>

      <div class="container final-cta-inner">
        <div class="cta-row">
          <a class="btn btn-outline" href="aboutus/aboutus.php"><?php echo t('about_btn'); ?></a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===================== DATA ===================== -->
  <section class="final-cta final-cta--eu" aria-label="Invito all’azione">
    <div class="stats-strip" role="list" aria-label="Numeri chiave">
        <div>
          <div class="stat-pill-num"><?php echo t('about_stat_1_num'); ?></div>
          <div class="stat-pill-label"><?php echo t('about_stat_1_label'); ?></div>
        </div>
        <div>
          <div class="stat-pill-num"><?php echo t('about_stat_2_num'); ?></div>
          <div class="stat-pill-label"><?php echo t('about_stat_2_label'); ?></div>
        </div>
        <div>
          <div class="stat-pill-num"><?php echo t('about_stat_3_num'); ?></div>
          <div class="stat-pill-label"><?php echo t('about_stat_3_label'); ?></div>
        </div>
      </div>
  </section>

  <!-- ===================== SEZIONE SOCIAL ===================== -->
  <section class="social" id="about">
    <div class="container">
      <div class="section-head">
        <h2><?php echo t('social_h2'); ?></h2>
        <p class="section-sub"><?php echo t('social_sub'); ?></p>
        <div class="cta-row">
          <a class="btn btn-outline" href="https://linkedin.com/company/taxpedia-eu">LinkedIn</a>
          <a class="btn btn-outline" href="https://www.instagram.com/taxpedia.eu/">Instagram</a>
          <a class="btn btn-outline" href="https://www.threads.com/@taxpedia.eu">Threads</a>
        </div>
      </div>
    </div>

    <div class="section-head">
      <h2><?php echo t('contact_h2'); ?></h2>
      <p class="section-sub"><?php echo t('contact_sub'); ?></p>
      <a class="btn btn-outline" href="mailto:team@taxpedia.eu">team@taxpedia.eu</a>
    </div>
  </section>

  <?php require_once __DIR__ . '/partials/footer.php'; ?>

  <script>
    /* Cookie banner: identico al tuo originale */
    (function(){
      var LS_KEY = 'cookie-consent';
      var banner = document.getElementById('cookie-banner');
      var accept = document.getElementById('accept-cookies');
      if(!banner) return;

      try{
        if(!localStorage.getItem(LS_KEY)){
          requestAnimationFrame(function(){
            banner.hidden = false;
            banner.classList.add('show');
          });
        }
      }catch(e){
        requestAnimationFrame(function(){
          banner.hidden = false;
          banner.classList.add('show');
        });
      }

      if(accept){
        accept.addEventListener('click', function(){
          try { localStorage.setItem(LS_KEY, 'true'); } catch(e){}
          banner.classList.remove('show');
          banner.classList.add('hide');
          setTimeout(function(){ banner.hidden = true; }, 380);
        });
      }
    })();
  </script>

  <!-- Statcounter -->
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
</body>
</html>
