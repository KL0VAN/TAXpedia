<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (aboutus/aboutus.php)
 * - NON usa bootstrap/globale
 * - Lingua da i18n.php globale (stesso meccanismo di GET/cookie su tutte le pagine)
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */

require_once __DIR__ . '/../i18n/i18n.php';

if (!isset($ABU_SUPPORTED)) $ABU_SUPPORTED = array('it', 'en');

$ABU_LANG = tp_lang();
if (!in_array($ABU_LANG, $ABU_SUPPORTED, true)) $ABU_LANG = 'it';

$ABU_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title' => 'Chi Siamo — TAXpedia',
    'meta_desc'  => 'TAXpedia — Team, redazione, missione e contatti. Scopri chi siamo e come è organizzata la nostra redazione.',

    'h1_about'   => 'Cos\'è TAXpedia',
    'p1'         => 'TAXpedia è un osservatorio indipendente sulla finanza pubblica europea. Raccontiamo come vengono raccolte e spese le risorse pubbliche – tra tasse, bilanci, fondi, bandi e programmi – con un linguaggio chiaro, dati ufficiali e strumenti interattivi.',
    'p2'         => 'Il nostro obiettivo è rendere comprensibili a tutti temi che di solito restano chiusi nei documenti tecnici di ministeri, enti locali e istituzioni europee. La spesa pubblica non è un concetto lontano, bensì uno dei cardini della democrazia: conoscere come vengono utilizzate le finanze locali, statali ed europee dovrebbe far parte della normale partecipazione alla vita politica.',
    'p3'         => 'Così nasce TAXpedia, uno spazio di divulgazione e analisi che punta sulla trasparenza delle fonti e sulla semplicità delle spiegazioni. Attraverso articoli, infografiche, glossari e contenuti social, aiutiamo cittadini, studenti, giornalisti, amministratori e professionisti a orientarsi nella finanza pubblica, a leggere meglio i numeri e a capire l’impatto concreto delle scelte di spesa sul territorio.',

    'impact_btn' => 'Il nostro impatto',
    'disclaimer_btn' => 'Come lavoriamo',

    'h2_team'    => 'Il Team di TAXpedia',
    'team_sub'   => 'La redazione di TAXpedia si occupa della raccolta, analisi e pubblicazione di dati riguardanti la finanza pubblica europea. Ha sede principalmente a Milano con redazioni distaccate a Zagabria e Edimburgo.',

    'tier_1' => 'Piano 1',
    'tier_2' => 'Piano 2',
    'tier_3' => 'Piano 3',
    'tier_1_title' => 'Direzione e fondatori',
    'tier_1_sub' => 'Il nucleo che ha fondato TAXpedia e ne coordina identità editoriale, sviluppo e metodo di ricerca.',
    'tier_2_title' => 'Coordinamento e aree',
    'tier_2_sub' => 'Le persone che contribuiscono con continuità alla crescita editoriale, alla ricerca e allo sviluppo dei contenuti.',
    'tier_3_title' => 'Redazione',
    'tier_3_sub' => 'La rete redazionale che lavora su articoli, raccolta fonti, revisione, approfondimenti e nuove rubriche.',

    'profile_cta' => 'Vai alla scheda',
    'profile_soon' => 'Scheda in preparazione',
    'area_label' => 'Area',

    'role_1'     => 'Direttore Editoriale',
    'role_2'     => 'Direttore Sviluppo & UX/UI',
    'role_3'     => 'Direttore Ricerca e Analisi Dati',

    'role_coord_1' => 'Coordinamento amministrativo',
    'role_coord_2' => 'Direttore TAXpedia NEWS',
    'role_reda' => 'Redazione',
    'area_public_finance' => 'Finanza pubblica e politiche europee',
    'area_data' => 'Dati, fonti e approfondimenti',
    'area_articles' => 'Articoli e contenuti',
    'area_research' => 'Ricerca e documentazione',

    'collab_h2'  => 'Abbiamo collaborato con:',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title' => 'About us — TAXpedia',
    'meta_desc'  => 'TAXpedia — Team, editorial board, mission and contacts. Discover who we are and how our newsroom is organised.',

    'h1_about'   => 'What is TAXpedia?',
    'p1'         => 'TAXpedia is an independent observatory on European public finances. We explain how public resources are collected and spent – including taxes, budgets, funds, calls for proposals, and programs – using clear language, official data, and interactive tools.',
    'p2'         => 'Our goal is to make topics that are usually covered in the technical documents of ministries, local authorities, and European institutions understandable to everyone. Public spending is not a distant concept, but rather one of the cornerstones of democracy, and understanding how local, state, and European finances are used should be part of normal participation in political life.',
    'p3'         => 'This is how TAXpedia was born, a space for dissemination and analysis that focuses on transparent sources and simple explanations. Through articles, infographics, glossaries, and social media content, we help citizens, students, journalists, administrators, and professionals navigate public finances, better understand the numbers, and understand the concrete impact of spending choices on the local community.',

    'impact_btn' => 'Our impact',
    'disclaimer_btn' => 'How We work',

    'h2_team'    => 'The TAXpedia team',
    'team_sub'   => 'The TAXpedia editorial team collects, analyses, and publishes data on European public finance. It is primarily based in Milan, with additional editorial teams in Zagreb and Edinburgh.',

    'tier_1' => 'Level 1',
    'tier_2' => 'Level 2',
    'tier_3' => 'Level 3',
    'tier_1_title' => 'Leadership and founders',
    'tier_1_sub' => 'The founding group behind TAXpedia, responsible for its editorial identity, development and research method.',
    'tier_2_title' => 'Coordination and areas',
    'tier_2_sub' => 'The people who steadily contribute to editorial growth, research and content development.',
    'tier_3_title' => 'Editorial team',
    'tier_3_sub' => 'The editorial network working on articles, source gathering, review, explainers and new formats.',

    'profile_cta' => 'View profile',
    'profile_soon' => 'Profile coming soon',
    'area_label' => 'Area',

    'role_1'     => 'Editorial Director',
    'role_2'     => 'Development & UX/UI Director',
    'role_3'     => 'Research & Data Analysis Director',

    'role_coord_1' => 'Administrative Coordinator',
    'role_coord_2' => 'Director of TAXpedia NEWS',
    'role_reda' => 'Editorial team',
    'area_public_finance' => 'Public finance and EU policies',
    'area_data' => 'Data, sources and explainers',
    'area_articles' => 'Articles and content',
    'area_research' => 'Research and documentation',

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

if (!function_exists('abu_role')) {
  function abu_role($member, $field) {
    global $ABU_LANG;
    $langField = $field . '_' . $ABU_LANG;
    if (isset($member[$langField])) return $member[$langField];
    if (isset($member[$field . '_it'])) return $member[$field . '_it'];
    return '';
  }
}


if (!function_exists('abu_initial')) {
  function abu_initial($name) {
    $name = trim($name);
    if ($name === '') return '';
    if (function_exists('mb_substr')) return mb_substr($name, 0, 1, 'UTF-8');
    if (preg_match('/^./u', $name, $match)) return $match[0];
    return substr($name, 0, 1);
  }
}

if (!function_exists('abu_profile_exists')) {
  function abu_profile_exists($profilePath) {
    if ($profilePath === '') return false;
    $pathOnly = parse_url($profilePath, PHP_URL_PATH);
    if (!$pathOnly) return false;
    return is_file($_SERVER['DOCUMENT_ROOT'] . $pathOnly);
  }
}

if (!function_exists('abu_profile_href')) {
  function abu_profile_href($profilePath) {
    global $ABU_LANG;
    $separator = (strpos($profilePath, '?') === false) ? '?' : '&';
    return $profilePath . $separator . 'lang=' . urlencode($ABU_LANG);
  }
}

$ABU_FOUNDERS = array(
  array(
    'name' => 'Francesco Calabrese Vallino',
    'image' => 'imm/calabrese.jpg',
    'alt' => 'Francesco Calabrese Vallino',
    'role_key' => 'role_1',
    'profile' => '/aboutus/team/francesco-calabrese-vallino.php',
  ),
  array(
    'name' => 'Luka Ribić',
    'image' => 'imm/ribic.jpg',
    'alt' => 'Luka Ribić',
    'role_key' => 'role_2',
    'profile' => '/aboutus/team/luka-ribic.php',
  ),
  array(
    'name' => 'Riccardo Francesco Cervillio',
    'image' => 'imm/cervillio.jpg',
    'alt' => 'Riccardo Francesco Cervillio',
    'role_key' => 'role_3',
    'profile' => '/aboutus/team/riccardo-cervillio.php',
  ),
);

$ABU_COORDINATION = array(
  array(
    'name' => 'Ludovico Prünster',
    'role_key' => 'role_coord_1',
    'area_key' => 'area_research',
    'profile' => '/aboutus/team/ludovico-prunster.php',
  ),
  array(
    'name' => 'Alessandro Marangoni',
    'role_key' => 'role_coord_2',
    'area_key' => 'area_data',
    'profile' => '/aboutus/team/alessandro-marangoni.php',
  ),
);

$ABU_EDITORIAL = array(
  array(
    'name' => 'Ottilia Ogliari',
    'role_key' => 'role_reda',
    'area_key' => 'area_articles',
    'profile' => '/aboutus/team/ottilia-ogliari.php',
  ),
  array(
    'name' => 'Tommaso Prever',
    'role_key' => 'role_reda',
    'area_key' => 'area_articles',
    'profile' => '/aboutus/team/tommaso-prever.php',
  ),
  array(
    'name' => 'Lorenzo Oliva',
    'role_key' => 'role_reda',
    'area_key' => 'area_articles',
    'profile' => '/aboutus/team/lorenzo-oliva.php',
  ),
  array(
    'name' => 'Francesca Ricciuti',
    'role_key' => 'role_reda',
    'area_key' => 'area_articles',
    'profile' => '/aboutus/team/francesca-ricciuti.php',
  ),
  
);
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

  <main class="container about-container" id="main" role="main">
    <section class="about-us about-page-section" aria-labelledby="about-title">
      <header class="page-head about-hero">
        <h1 id="about-title"><?php echo abu_e('h1_about'); ?></h1>
        <div class="about-copy">
          <p><?php echo abu_e('p1'); ?></p>
          <p><?php echo abu_e('p2'); ?></p>
          <p><?php echo abu_e('p3'); ?></p>
        </div>
      </header>
        <div class="cta-row" style="text-align: center;">
          <a class="btn btn-secondary" href="impact.php"><?php echo abu_t('impact_btn'); ?></a>
          <a class="btn btn-secondary" href="disclaimer.php"><?php echo abu_t('disclaimer_btn'); ?></a>
        </div>
      
    </section>

    <section class="about-page-section team-overview" aria-labelledby="team-title">
      <header class="page-head team-head">
        <p class="section-kicker">Team</p>
        <h2 id="team-title"><?php echo abu_e('h2_team'); ?></h2>
        <p class="subtitle"><?php echo abu_e('team_sub'); ?></p>
      </header>

      <section class="team-tier team-tier-founders" aria-labelledby="tier-founders-title">
        <div class="tier-heading">
          <div>
            <h3 id="tier-founders-title"><?php echo abu_e('tier_1_title'); ?></h3>
            <p><?php echo abu_e('tier_1_sub'); ?></p>
          </div>
        </div>

        <div class="team-grid founders-grid">
          <?php foreach ($ABU_FOUNDERS as $member): ?>
            <article class="team-member founder-preview">
              <a class="member-card founder-link" href="<?php echo htmlspecialchars(abu_profile_href($member['profile']), ENT_QUOTES, 'UTF-8'); ?>" aria-label="<?php echo abu_e('profile_cta'); ?> <?php echo htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8'); ?>">
                <img src="<?php echo htmlspecialchars($member['image'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($member['alt'], ENT_QUOTES, 'UTF-8'); ?>" class="member-photo">
                <h4><?php echo htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8'); ?></h4>
                <p class="muted"><?php echo abu_e($member['role_key']); ?></p>
                <span class="profile-link"><?php echo abu_e('profile_cta'); ?></span>
              </a>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="team-tier" aria-labelledby="tier-coordination-title">
        <div class="tier-heading">
          <div>
            <h3 id="tier-coordination-title"><?php echo abu_e('tier_2_title'); ?></h3>
            <p><?php echo abu_e('tier_2_sub'); ?></p>
          </div>
        </div>

        <div class="editorial-grid editorial-grid-featured">
          <?php foreach ($ABU_COORDINATION as $member): ?>
            <?php $hasProfile = abu_profile_exists($member['profile']); ?>
            <article class="editorial-card editorial-card-featured <?php echo $hasProfile ? 'has-profile' : 'no-profile'; ?>">
              <div class="member-initial" aria-hidden="true"><?php echo htmlspecialchars(abu_initial($member['name']), ENT_QUOTES, 'UTF-8'); ?></div>
              <div class="editorial-card-body">
                <h4><?php echo htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8'); ?></h4>
                <p class="editorial-role"><?php echo abu_e($member['role_key']); ?></p>
                <p class="editorial-area"><strong><?php echo abu_e('area_label'); ?>:</strong> <?php echo abu_e($member['area_key']); ?></p>
                <?php if ($hasProfile): ?>
                  <a class="profile-link profile-link-soft" href="<?php echo htmlspecialchars(abu_profile_href($member['profile']), ENT_QUOTES, 'UTF-8'); ?>"><?php echo abu_e('profile_cta'); ?></a>
                <?php else: ?>
                  <span class="profile-status"><?php echo abu_e('profile_soon'); ?></span>
                <?php endif; ?>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>

      <section class="team-tier" id="redazione" aria-labelledby="tier-redazione-title">
        <div class="tier-heading">
          <div>
            <h3 id="tier-redazione-title"><?php echo abu_e('tier_3_title'); ?></h3>
            <p><?php echo abu_e('tier_3_sub'); ?></p>
          </div>
        </div>

        <div class="editorial-grid editorial-grid-compact">
          <?php foreach ($ABU_EDITORIAL as $member): ?>
            <?php $hasProfile = abu_profile_exists($member['profile']); ?>
            <article class="editorial-card editorial-card-compact <?php echo $hasProfile ? 'has-profile' : 'no-profile'; ?>">
              <div class="member-initial" aria-hidden="true"><?php echo htmlspecialchars(abu_initial($member['name']), ENT_QUOTES, 'UTF-8'); ?></div>
              <div class="editorial-card-body">
                <h4><?php echo htmlspecialchars($member['name'], ENT_QUOTES, 'UTF-8'); ?></h4>
                <p class="editorial-role"><?php echo abu_e($member['role_key']); ?></p>
                <p class="editorial-area"><strong><?php echo abu_e('area_label'); ?>:</strong> <?php echo abu_e($member['area_key']); ?></p>
                <?php if ($hasProfile): ?>
                  <a class="profile-link profile-link-soft" href="<?php echo htmlspecialchars(abu_profile_href($member['profile']), ENT_QUOTES, 'UTF-8'); ?>"><?php echo abu_e('profile_cta'); ?></a>
                <?php else: ?>
                  <span class="profile-status"><?php echo abu_e('profile_soon'); ?></span>
                <?php endif; ?>
              </div>
            </article>
          <?php endforeach; ?>
        </div>
      </section>
    </section>

    <section class="about-page-section collaborations" aria-labelledby="collab-title">
      <header class="page-head collab-head">
        <h2 id="collab-title"><?php echo abu_e('collab_h2'); ?></h2>
      </header>
      <div class="collab">
        <a href="https://democraseeds.it/" target="_blank" rel="noopener noreferrer" aria-label="DemocraSeeds">
          <img src="/article/italia/imm/logo_democraseeds.jpg" alt="DemocraSeeds" width="160" height="160" loading="lazy">
        </a>
        <a href="https://www.instagram.com/rethink_uni/" target="_blank" rel="noopener noreferrer" aria-label="rethink_uni">
          <img src="/article/italia/imm/logo_rethink.png" alt="rethink_uni" width="160" height="160" loading="lazy">
        </a>
        <a href="https://giovanifederalisti.eu/" target="_blank" rel="noopener noreferrer" aria-label="GFE">
          <img src="/aboutus/imm/logo-gfe.webp" alt="Gioventù Federalista Europea" width="160" height="100%" loading="lazy">
        </a>
        <a href="https://www.instagram.com/trasportamilano/" target="_blank" rel="noopener noreferrer" aria-label="TM">
          <img src="/aboutus/imm/logo-tm.jpg" alt="Trasporta Milano" width="160" height="100%" loading="lazy">
        </a>
      </div>
    </section>
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
