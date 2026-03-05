<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (aboutus/aboutus.php)
 * - NON usa bootstrap/globale
 * - Lingua da i18n.php globale (stesso meccanismo di GET/cookie su tutte le pagine)
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */

require_once $_SERVER['DOCUMENT_ROOT'] . '/i18n/i18n.php';

if (!isset($ABU_SUPPORTED)) $ABU_SUPPORTED = array('it', 'en');

$ABU_LANG = tp_lang();
if (!in_array($ABU_LANG, $ABU_SUPPORTED, true)) $ABU_LANG = 'it';

$ABU_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title' => 'Chi Siamo — TAXpedia',
    'meta_desc'  => 'TAXpedia — Team, missione e contatti. Scopri chi siamo: Francesco Calabrese Vallino, Luka Ribić e Riccardo Cervillio.',

    'h1_about'   => 'Cos\'è TAXpedia',
    'p1'         => 'TAXpedia è un osservatorio indipendente sulla finanza pubblica europea. Raccontiamo come vengono raccolte e spese le risorse pubbliche – tra tasse, bilanci, fondi, bandi e programmi – con un linguaggio chiaro, dati ufficiali e strumenti interattivi.',
    'p2'         => 'Il nostro obiettivo è rendere comprensibili a tutti temi che di solito restano chiusi nei documenti tecnici di ministeri, enti locali e istituzioni europee. La spesa pubblica non è un concetto lontano, bensì uno dei cardini della democrazia e conoscere come vengono utilizzate le finanze locali, statali e europee dovrebbe far parte della normale partecipazione alla vita politica.',
    'p3'         => 'Così nasce TAXpedia, uno spazio di divulgazione e analisi che punta sulla trasparenza delle fonti e sulla semplicità delle spiegazioni. Attraverso articoli, infografiche, glossari e contenuti social, aiutiamo cittadini, studenti, giornalisti, amministratori e professionisti a orientarsi nella finanza pubblica, a leggere meglio i numeri e a capire l’impatto concreto delle scelte di spesa sul territorio.',
    'h2_where'   => 'Paesi coinvolti',
    'soon'       => 'Presto in arrivo altri paesi europei.',

    'h2_team'    => 'Il Team di TAXpedia',
    'team_sub'   => 'La redazione di TAXpedia ha sede a Milano e si occupa della raccolta, analisi e pubblicazione di dati riguradanti la finanza pubblica europea.',
    'founders'   => 'I nostri fondatori',

    'role_1'     => 'Direttore Editoriale',
    'desc_1'     => 'Nato a Milano, ha frequentato il Liceo Volta dove è stato rappresentante d\'Istituto. Da settembre 2025 studia ingegneria meccanica al Politecnico di Milano. Definisce la linea editoriale del sito e ne coordina il lavoro.',

    'role_2'     => 'Direttore Sviluppo & UX/UI',
    'desc_2'     => 'Nato a Osijek, Croazia. A 13 anni si è trasferito a Milano dove sta finendo le superiori da tecnico informatico e delle telecomunicazioni. Si occupa dello sviluppo tecnico del sito e della sua interfaccia utente.',

    'role_3'     => 'Direttore Ricerca e Analisi Dati',
    'desc_3'     => 'Nato a Milano, ha frequentato il Liceo Leonardo da Vinci. Da settembre 2024 studia economia aziendale all\'Università Bocconi di Milano. Analizza fonti ufficiali e struttura dataset affidabili per i nostri calcoli e spiegazioni.',

    'collab_h2'  => 'Abbiamo collaborato con:',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title' => 'About us — TAXpedia',
    'meta_desc'  => 'TAXpedia — Team, mission and contacts. We make public spending understandable and transparent. Francesco Calabrese Vallino, Luka Ribić and Riccardo Cervillio.',

    'h1_about'   => 'What is TAXpedia?',
    'p1'         => 'TAXpedia is an independent observatory on European public finances. We explain how public resources are collected and spent – including taxes, budgets, funds, calls for proposals, and programs – using clear language, official data, and interactive tools.',
    'p2'         => 'Our goal is to make topics that are usually covered in the technical documents of ministries, local authorities, and European institutions understandable to everyone. Public spending is not a distant concept, but rather one of the cornerstones of democracy, and understanding how local, state, and European finances are used should be part of normal participation in political life.',
    'p3'         => 'This is how TAXpedia was born, a space for dissemination and analysis that focuses on transparent sources and simple explanations. Through articles, infographics, glossaries, and social media content, we help citizens, students, journalists, administrators, and professionals navigate public finances, better understand the numbers, and understand the concrete impact of spending choices on the local community.',
    'h2_where'   => 'Countries involved',
    'soon'       => 'More European countries coming soon.',

    'h2_team'    => 'The TAXpedia team',
    'team_sub'   => 'The TAXpedia editorial team is based in Milan and handles the collection, analysis, and publication of public european public finance.',
    'founders'   => 'Our founders',

    'role_1'     => 'Editorial Director',
    'desc_1'     => 'Born in Milan, Italy, he attended Volta High School, where he was a school representative. Since September 2025, he has been studying mechanical engineering at the Polytechnic University of Milan. Defines the site\'s editorial line and coordinates its work.',

    'role_2'     => 'Development & UX/UI Director',
    'desc_2'     => 'Born in Osijek, Croatia. At 14, he moved to Milan, where he is finishing high school as a computer and telecommunications technician. Handles the site’s technical development and its user interface.',

    'role_3'     => 'Research & Data Analysis Director',
    'desc_3'     => 'Born in Milan, Italy, he attended the Leonardo da Vinci High School. Since September 2024, he has been studying business economics at Bocconi University in Milan. Analyzes official sources and structures reliable datasets for our calculations and explanations.',

    'collab_h2'  => 'We collaborated with:',
  ),
);

if (!function_exists('abu_t')) {
  function abu_t($key) {
    global $ABU_LANG, $ABU_I18N;

    $lang = isset($ABU_LANG) ? $ABU_LANG : 'it';
    $dict = isset($ABU_I18N) ? $ABU_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('abu_e')) {
  function abu_e($key) {
    return htmlspecialchars(abu_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($ABU_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo abu_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <meta name="description" content="<?php echo abu_e('meta_desc'); ?>">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="AboutUs.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>
  <main class="container" id="main" role="main">
    <section class="about-us">
      <header class="page-head" style="text-align:left;margin:2.25rem 0 1rem">
        <h1 style="text-align:center;margin:0;color:var(--brand);font-family:Merriweather,serif"><?php echo abu_e('h1_about'); ?></h1>
        <p class="subtitle" style="margin-top:.5rem;color:var(--muted)"><?php echo abu_e('p1'); ?></p>
        <p class="subtitle" style="margin-top:.5rem;color:var(--muted)"><?php echo abu_e('p2'); ?></p>
        <p class="subtitle" style="margin-top:.5rem;color:var(--muted)"><?php echo abu_e('p3'); ?></p>
        <h2 style="text-align:center;margin:0;color:var(--brand);font-family:Merriweather,serif"><?php echo abu_e('h2_where'); ?></h2>
        <figure style="text-align:center">
        <a target="_blank" align="center">
          <img src="imm/map.png" alt="" loading="lazy" 
          style="max-width:300px;width:100%;height:auto;">
        </a>
        </figure>
        <p class="subtitle" style="text-align:center;margin-top:.5rem;color:var(--muted)"><?php echo abu_e('soon'); ?></p>
      </header>
      <header class="page-head" style="text-align:left;margin:2.25rem 0 1rem">
        <h2 style="text-align:center;margin:0;color:var(--brand);font-family:Merriweather,serif"><?php echo abu_e('h2_team'); ?></h2>
        <p class="subtitle" style="margin-top:.5rem;color:var(--muted)"><?php echo abu_e('team_sub'); ?></p>
      </header>
        <p class="intro" style="text-align: center;"><?php echo abu_e('founders'); ?></p>
      <div class="team-grid">
        <div class="team-member" id="member-1">
          <div class="member-card">
            <img src="imm/calabrese.jpg" alt="Francesco Calabrese Vallino" class="member-photo">
            <h3>Francesco Calabrese Vallino</h3>
            <p class="muted"><?php echo abu_e('role_1'); ?></p>
            <p style="text-align: left;"><?php echo abu_e('desc_1'); ?></p>
            <div class="member-socials">
              <a href="https://linkedin.com/in/francesco-calabrese-vallino-93692730a" target="_blank" rel="noopener">LinkedIn</a>
              <a href="https://www.instagram.com/fra_calabrese06" target="_blank" rel="noopener">Instagram</a>
            </div>
          </div>
        </div>

        <div class="team-member" id="member-2">
          <div class="member-card">
            <img src="imm/ribic.jpg" alt="Luka Ribić" class="member-photo">
            <h3>Luka Ribić</h3>
            <p class="muted"><?php echo abu_e('role_2'); ?></p>
            <p style="text-align: left;"><?php echo abu_e('desc_2'); ?></p>
            <div class="member-socials">
              <a href="https://linkedin.com/in/luka-ribi%C4%87-97a8881aa/" target="_blank" rel="noopener">LinkedIn</a>
              <a href="https://www.instagram.com/luka.ribic.hr/" target="_blank" rel="noopener">Instagram</a>
            </div>
          </div>
        </div>

        <div class="team-member" id="member-3">
          <div class="member-card">
            <img src="imm/cervillio.jpg" alt="Riccardo Francesco Cervillio" class="member-photo">
            <h3>Riccardo Francesco Cervillio</h3>
            <p class="muted"><?php echo abu_e('role_3'); ?></p>
            <p style="text-align: left;"><?php echo abu_e('desc_3'); ?></p>
            <div class="member-socials">
              <a href="https://linkedin.com/in/riccardo-francesco-cervillio-373667302" target="_blank" rel="noopener">LinkedIn</a>
              <a href="https://www.instagram.com/_riccardo.cervi_" target="_blank" rel="noopener">Instagram</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <header class="page-head" style="text-align:center;margin:2.25rem 0 1rem">
      <h2 style="margin:0;color:var(--brand);font-family:Merriweather,serif"><?php echo abu_e('collab_h2'); ?></h2>
    </header>
    <div class="collab" style="text-align: center;">
        <a href="https://democraseeds.wordpress.com/" target="_blank">
          <img src="/article/italia/imm/logo_democraseeds.jpg"
            alt="" width="160" height="160" loading="lazy" >
        </a>
    </div>
  </main>

  <!-- ===================== FOOTER ===================== -->
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
