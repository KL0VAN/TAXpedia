<?php
/**
 * Personal founder page draft for TAXpedia.
 * Built from the current About Us content for Francesco Calabrese Vallino.
 */

require_once __DIR__ . '/../../i18n/i18n.php';

if (!isset($FP_SUPPORTED)) $FP_SUPPORTED = array('it', 'en');

$FP_LANG = tp_lang();
if (!in_array($FP_LANG, $FP_SUPPORTED, true)) $FP_LANG = 'it';

$FP_I18N = array(
  'it' => array(
    'meta_title' => "Francesco Calabrese Vallino | Fondatore TAXpedia e curatore Fondo Tullio Vallino",
    'meta_desc'  => "Francesco Calabrese Vallino, fondatore di TAXpedia e curatore del Fondo Tullio Vallino. Si occupa di finanza pubblica, educazione civica, memoria democratica ed Europa.",

    'back'        => "Torna all'About us",
    'eyebrow'     => "Fondatore di TAXpedia",
    'role'        => "Direttore Editoriale",
    'lead'        => "Definisce la linea editoriale del sito e ne coordina il lavoro.",

    'profile_h2'  => "Profilo",
    'bio'         => 'Nato a Milano, ha frequentato il Liceo Scientifico Alessandro Volta, dove è stato rappresentante d’Istituto. Da settembre 2025 studia Ingegneria Meccanica al Politecnico di Milano. È tra i fondatori di TAXpedia e, come Direttore Editoriale, definisce la linea del progetto, coordina la redazione e cura la qualità dei contenuti pubblicati. Cura inoltre il <a href="https://www.fondovallino.it/">Fondo Tullio Vallino</a>, progetto di digitalizzazione e valorizzazione di documenti sulla Resistenza milanese e sul dopoguerra. Dal 2026 è parte dell\'editorial board di <a href="https://www.studiourbanism.com/">STUDIO Urbanism</a>.',

    'details_h2'  => "Informazioni",
    'born_l'      => "Citt\u{00E0} di nascita",
    'born_v'      => "Milano, Italia",
    'university_l'=> "Percorso universitario",
    'university_v'=> "Ingegneria meccanica al Politecnico di Milano, da settembre 2025",
    'role_l'      => "Ruolo in TAXpedia",
    'role_v'      => "Direttore editoriale",

    'links_h2'    => "Link personali",
    'linkedin'    => "LinkedIn",
    'instagram'   => "Instagram",
    'mail'        => "Mail",
    'linktree'    => "I miei link",

    'articles_h2'      => "Articoli pubblicati",
    'articles_intro'   => "Gli articoli e i contributi pubblicati da Francesco Calabrese Vallino su TAXpedia.",
    'articles_loading' => "Caricamento articoli...",
    'articles_empty'   => "Nessun articolo pubblicato per ora.",
    'articles_all'     => "Vedi tutti gli articoli di Francesco",
    'article_read'      => "Leggi l'articolo",
  ),

  'en' => array(
    'meta_title' => "Francesco Calabrese Vallino | TAXpedia Founder and Fondo Tullio Vallino Curator",
    'meta_desc'  => "Francesco Calabrese Vallino, founder of TAXpedia and curator of the Fondo Tullio Vallino. He works on public finance, civic education, democratic memory, and Europe.",

    'back'        => "Back to About us",
    'eyebrow'     => "Founder of TAXpedia",
    'role'        => "Editorial Director",
    'lead'        => "Defines the site's editorial line and coordinates its work.",

    'profile_h2'  => "Profile",
    'bio'         => "Born in Milan, he attended Liceo Scientifico Alessandro Volta, where he served as student representative. Since September 2025, he has been studying Mechanical Engineering at Politecnico di Milano. As one of TAXpedia’s founders and Editorial Director, he defines the project’s editorial direction, coordinates the editorial team, and oversees the quality of published content. He also curates the <a href=\"https://www.fondovallino.it/\">Fondo Tullio Vallino</a>, a digital archive project focused on documents from the Milanese Resistance and the post-war period. Since 2026 he has been part of the editorial board of <a href=\"https://www.studiourbanism.com/\">STUDIO Urbanism</a>.",

    'details_h2'  => "Information",
    'born_l'      => "Place of birth",
    'born_v'      => "Milan, Italy",
    'university_l'=> "University background",
    'university_v'=> "Mechanical engineering at the Polytechnic University of Milan, since September 2025",
    'role_l'      => "Role at TAXpedia",
    'role_v'      => "Editorial Director",

    'links_h2'    => "Personal links",
    'linkedin'    => "LinkedIn",
    'instagram'   => "Instagram",
    'mail'        => "Mail",
    'linktree'    => "My links",

    'articles_h2'      => "Published articles",
    'articles_intro'   => "Articles and contributions published by Francesco Calabrese Vallino on TAXpedia.",
    'articles_loading' => "Loading articles...",
    'articles_empty'   => "No articles published yet.",
    'articles_all'     => "See all Francesco's articles",
    'article_read'      => "Read the article",
  ),
);

if (!function_exists('fp_t')) {
  function fp_t($key) {
    global $FP_LANG, $FP_I18N;

    $lang = isset($FP_LANG) ? $FP_LANG : 'it';
    $dict = isset($FP_I18N) ? $FP_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('fp_e')) {
  function fp_e($key) {
    return htmlspecialchars(fp_t($key), ENT_QUOTES, 'UTF-8');
  }
}

$FP_CANONICAL_URL = 'https://www.taxpedia.eu/aboutus/team/francesco-calabrese-vallino.php?lang=' . rawurlencode($FP_LANG);
$FP_PROFILE_IMAGE_URL = 'https://www.taxpedia.eu/aboutus/imm/people/calabrese.jpg';
$FP_PROFILE_DESCRIPTION = fp_t('meta_desc');
$FP_IS_EN = ($FP_LANG === 'en');

$FP_AUTHOR_SLUG = 'francesco-calabrese-vallino';
$FP_AUTHOR_ARTICLE_LIMIT = 6;
$FP_ARTICLE_DATA_PATH = __DIR__ . '/../../article/article_data.php';
$FP_ARTICLES = array();

if (is_file($FP_ARTICLE_DATA_PATH)) {
  $FP_LOADED_ARTICLES = require $FP_ARTICLE_DATA_PATH;
  if (is_array($FP_LOADED_ARTICLES)) {
    $FP_ARTICLES = $FP_LOADED_ARTICLES;
  }
}

if (!function_exists('fp_article_lang_value')) {
  function fp_article_lang_value($article, $base_key, $lang) {
    $suffix = ($lang === 'en') ? 'en' : 'it';
    $localized_key = $base_key . '_' . $suffix;

    if (isset($article[$localized_key]) && $article[$localized_key] !== '') {
      return $article[$localized_key];
    }

    $fallback_key = $base_key . '_it';
    if (isset($article[$fallback_key])) {
      return $article[$fallback_key];
    }

    return '';
  }
}

if (!function_exists('fp_normalize_article_authors')) {
  function fp_normalize_article_authors($article) {
    if (!isset($article['authors'])) return array();

    if (is_array($article['authors'])) {
      return array_values(array_filter(array_map('trim', $article['authors'])));
    }

    if (is_string($article['authors'])) {
      return array_values(array_filter(array_map('trim', explode(',', $article['authors']))));
    }

    return array();
  }
}

if (!function_exists('fp_filter_author_articles')) {
  function fp_filter_author_articles($articles, $author_slug, $limit) {
    $filtered = array();

    foreach ($articles as $article) {
      if (!is_array($article)) continue;
      if (isset($article['in_archive']) && !$article['in_archive']) continue;

      $authors = fp_normalize_article_authors($article);
      if (in_array($author_slug, $authors, true)) {
        $filtered[] = $article;
      }
    }

    usort($filtered, function($a, $b) {
      $a_order = isset($a['archive_order']) ? (int) $a['archive_order'] : 999999;
      $b_order = isset($b['archive_order']) ? (int) $b['archive_order'] : 999999;

      if ($a_order === $b_order) {
        $a_date = isset($a['date_iso']) ? $a['date_iso'] : '';
        $b_date = isset($b['date_iso']) ? $b['date_iso'] : '';
        return strcmp($b_date, $a_date);
      }

      return $a_order <=> $b_order;
    });

    if ($limit > 0) {
      return array_slice($filtered, 0, $limit);
    }

    return $filtered;
  }
}

$FP_AUTHOR_ARTICLES = fp_filter_author_articles($FP_ARTICLES, $FP_AUTHOR_SLUG, $FP_AUTHOR_ARTICLE_LIMIT);

$FP_PROFILE_JSON_LD = array(
  '@context' => 'https://schema.org',
  '@type' => 'ProfilePage',
  '@id' => $FP_CANONICAL_URL . '#profilepage',
  'url' => $FP_CANONICAL_URL,
  'name' => 'Francesco Calabrese Vallino',
  'description' => $FP_PROFILE_DESCRIPTION,
  'inLanguage' => $FP_IS_EN ? 'en' : 'it',
  'mainEntity' => array(
    '@type' => 'Person',
    '@id' => 'https://www.taxpedia.eu/#francesco-calabrese-vallino',
    'name' => 'Francesco Calabrese Vallino',
    'alternateName' => array(
      'Francesco Calabrese',
      'Francesco C. Vallino',
      'Calabrese Vallino'
    ),
    'description' => $FP_PROFILE_DESCRIPTION,
    'url' => $FP_CANONICAL_URL,
    'image' => $FP_PROFILE_IMAGE_URL,
    'jobTitle' => $FP_IS_EN
      ? 'Founder of TAXpedia and curator of the Fondo Tullio Vallino'
      : 'Fondatore di TAXpedia e curatore del Fondo Tullio Vallino',
    'birthPlace' => array(
      '@type' => 'Place',
      'name' => $FP_IS_EN ? 'Milan, Italy' : 'Milano, Italia'
    ),
    'affiliation' => array(
      array(
        '@type' => 'Organization',
        'name' => 'TAXpedia',
        'url' => 'https://www.taxpedia.eu/'
      ),
      array(
        '@type' => 'Organization',
        'name' => 'Fondo Tullio Vallino',
        'url' => 'https://www.fondovallino.it/'
      )
    ),
    'knowsAbout' => $FP_IS_EN
      ? array(
        'public finance',
        'civic education',
        'democratic memory',
        'Europe',
        'taxation',
        'public spending transparency'
      )
      : array(
        'finanza pubblica',
        'educazione civica',
        'memoria democratica',
        'Europa',
        'fiscalità',
        'trasparenza della spesa pubblica'
      ),
    'sameAs' => array(
      'https://linkedin.com/in/francesco-calabrese-vallino-93692730a',
      'https://www.instagram.com/fra_calabrese06'
    )
  )
);
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($FP_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo fp_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <meta name="description" content="<?php echo fp_e('meta_desc'); ?>">
  <link rel="canonical" href="<?php echo htmlspecialchars($FP_CANONICAL_URL, ENT_QUOTES, 'UTF-8'); ?>">
  <link rel="alternate" hreflang="it" href="https://www.taxpedia.eu/aboutus/team/francesco-calabrese-vallino.php?lang=it">
  <link rel="alternate" hreflang="en" href="https://www.taxpedia.eu/aboutus/team/francesco-calabrese-vallino.php?lang=en">
  <script type="application/ld+json">
<?php echo json_encode($FP_PROFILE_JSON_LD, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
  </script>
  <meta name="google-site-verification" content="ZQpv4uU57cKEw5MLUEZdjioIljDoFeQtcM4QgD2er5Q" />

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="../AboutUs.css?v=<?php echo filemtime(__DIR__ . '/../AboutUs.css'); ?>" />

  <style>
    .founder-profile {
      max-width: 1040px;
      margin: 2.25rem auto 3rem;
    }

    .profile-back {
      display: inline-flex;
      align-items: center;
      gap: .35rem;
      margin-bottom: 1rem;
      color: var(--brand);
      font-weight: 700;
      text-decoration: none;
    }

    .profile-back:hover,
    .profile-back:focus {
      text-decoration: underline;
    }

    .profile-hero {
      display: grid;
      grid-template-columns: minmax(220px, 310px) 1fr;
      gap: clamp(1.5rem, 4vw, 3rem);
      align-items: center;
      padding: clamp(1.25rem, 4vw, 2.5rem);
      border: 1px solid rgba(15, 23, 42, .08);
      border-radius: 28px;
      background: #fff;
      box-shadow: 0 18px 45px rgba(15, 23, 42, .08);
    }

    .profile-eyebrow {
      margin: 0 0 .55rem;
      color: var(--muted);
      font-weight: 700;
      letter-spacing: .08em;
      text-transform: uppercase;
      font-size: .78rem;
    }

    .profile-title {
      margin: 0;
      color: var(--brand);
      font-family: Merriweather, serif;
      font-size: clamp(2rem, 5vw, 3.4rem);
      line-height: 1.05;
    }

    .profile-role {
      display: inline-flex;
      margin: 1rem 0 .75rem;
      padding: .45rem .85rem;
      border-radius: 999px;
      background: rgba(35, 91, 160, .10);
      color: var(--brand);
      font-weight: 700;
    }

    .profile-lead {
      max-width: 640px;
      margin: 0;
      color: var(--muted);
      font-size: 1.08rem;
      line-height: 1.65;
    }

    .profile-socials {
      display: flex;
      flex-wrap: wrap;
      gap: .75rem;
      margin-top: 1.35rem;
    }

    .profile-socials a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-height: 42px;
      padding: .65rem 1rem;
      border-radius: 999px;
      border: 1px solid rgba(35, 91, 160, .24);
      color: var(--brand);
      font-weight: 700;
      text-decoration: none;
    }

    .profile-socials a:hover,
    .profile-socials a:focus {
      text-decoration: underline;
    }

    .profile-content {
      display: grid;
      grid-template-columns: minmax(0, 1.1fr) minmax(280px, .9fr);
      gap: 1.25rem;
      margin-top: 1.25rem;
    }

    .profile-section {
      padding: 1.35rem;
      border: 1px solid rgba(15, 23, 42, .08);
      border-radius: 22px;
      background: #fff;
    }

    .profile-section h2 {
      margin: 0 0 .75rem;
      color: var(--brand);
      font-family: Merriweather, serif;
    }

    .profile-section p {
      margin: 0;
      color: var(--muted);
      line-height: 1.75;
    }

    .profile-details {
      display: grid;
      gap: .9rem;
      margin: 0;
    }

    .profile-details div {
      padding-bottom: .9rem;
      border-bottom: 1px solid rgba(15, 23, 42, .08);
    }

    .profile-details div:last-child {
      padding-bottom: 0;
      border-bottom: 0;
    }

    .profile-details dt {
      margin: 0 0 .25rem;
      color: var(--brand);
      font-weight: 700;
    }

    .profile-details dd {
      margin: 0;
      color: var(--muted);
      line-height: 1.55;
    }

    .profile-articles {
      margin-top: 1.25rem;
    }

    .profile-articles p {
      max-width: 720px;
    }

    .author-articles-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1rem;
      margin-top: 1.1rem;
    }

    .author-articles-grid .article-card {
      display: flex;
      flex-direction: column;
      gap: .65rem;
      min-height: 100%;
      padding: 1rem;
      border: 1px solid rgba(15, 23, 42, .08);
      border-radius: 18px;
      background: rgba(248, 250, 252, .72);
    }

    .author-articles-grid .article-meta {
      display: flex;
      flex-wrap: wrap;
      gap: .45rem;
      align-items: center;
      color: var(--muted);
      font-size: .84rem;
      font-weight: 700;
    }

    .author-articles-grid .article-meta span {
      display: inline-flex;
      align-items: center;
      padding: .22rem .5rem;
      border-radius: 999px;
      background: rgba(35, 91, 160, .08);
      color: var(--brand);
    }

    .author-articles-grid .article-card h3 {
      margin: 0;
      color: var(--brand);
      font-family: Merriweather, serif;
      font-size: 1.05rem;
      line-height: 1.35;
    }

    .author-articles-grid .article-card h3 a {
      color: inherit;
      text-decoration: none;
    }

    .author-articles-grid .article-card h3 a:hover,
    .author-articles-grid .article-card h3 a:focus {
      text-decoration: underline;
    }

    .author-articles-grid .article-card p {
      margin: 0;
      color: var(--muted);
      line-height: 1.6;
    }

    .author-articles-grid .article-link {
      margin-top: auto;
      color: var(--brand);
      font-weight: 800;
      text-decoration: none;
    }

    .author-articles-grid .article-link:hover,
    .author-articles-grid .article-link:focus {
      text-decoration: underline;
    }

    .article-loading,
    .article-empty {
      margin-top: 1rem;
      padding: 1rem;
      border-radius: 16px;
      background: rgba(248, 250, 252, .9);
      color: var(--muted);
      font-weight: 700;
    }

    .profile-all-articles {
      display: inline-flex;
      align-items: center;
      margin-top: 1rem;
      color: var(--brand);
      font-weight: 800;
      text-decoration: none;
    }

    .profile-all-articles:hover,
    .profile-all-articles:focus {
      text-decoration: underline;
    }

    @media (max-width: 780px) {
      .profile-hero,
      .profile-content {
        grid-template-columns: 1fr;
      }

      .profile-copy,
      .profile-title,
      .profile-lead {
        text-align: center;
      }

      .profile-role,
      .profile-socials,
      .profile-back {
        justify-content: center;
      }

      .profile-socials {
        justify-content: center;
      }
    }
  </style>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main" role="main">
    <article class="founder-profile" aria-labelledby="founder-title">
      <a class="profile-back" href="/aboutus/aboutus.php?lang=<?php echo urlencode($FP_LANG); ?>">
        <span aria-hidden="true">&larr;</span>
        <?php echo fp_e('back'); ?>
      </a>

      <section class="profile-hero" aria-label="Francesco Calabrese Vallino">
        <div class="profile-photo-wrap">
          <img src="/aboutus/imm/people/calabrese.jpg" alt="Francesco Calabrese Vallino" class="profile-photo">
        </div>

        <div class="profile-copy">
          <p class="profile-eyebrow"><?php echo fp_e('eyebrow'); ?></p>
          <h1 class="profile-title" id="founder-title">Francesco Calabrese Vallino</h1>
          <p class="profile-role"><?php echo fp_e('role'); ?></p>
          <p class="profile-lead"><?php echo fp_e('lead'); ?></p>

          <div class="profile-socials" aria-label="<?php echo fp_e('links_h2'); ?>">
            <a href="https://linkedin.com/in/francesco-calabrese-vallino-93692730a" target="_blank" rel="noopener"><?php echo fp_e('linkedin'); ?></a>
            <a href="https://www.instagram.com/fra_calabrese06" target="_blank" rel="noopener"><?php echo fp_e('instagram'); ?></a>
            <a href="mailto:francesco.calaval@gmail.com" target="_blank" rel="noopener"><?php echo fp_e('mail'); ?></a>
            <a href="https://linktr.ee/fcv" target="_blank" rel="noopener"><?php echo fp_e('linktree'); ?></a>
          </div>
        </div>
      </section>

      <div class="profile-content">
        <section class="profile-section" aria-labelledby="profile-heading">
          <h2 id="profile-heading"><?php echo fp_e('profile_h2'); ?></h2>
          <p><?php echo fp_t('bio'); ?></p>
        </section>

        <section class="profile-section" aria-labelledby="details-heading">
          <h2 id="details-heading"><?php echo fp_e('details_h2'); ?></h2>
          <dl class="profile-details">
            <div>
              <dt><?php echo fp_e('born_l'); ?></dt>
              <dd><?php echo fp_e('born_v'); ?></dd>
            </div>
            <div>
              <dt><?php echo fp_e('university_l'); ?></dt>
              <dd><?php echo fp_e('university_v'); ?></dd>
            </div>
            <div>
              <dt><?php echo fp_e('role_l'); ?></dt>
              <dd><?php echo fp_e('role_v'); ?></dd>
            </div>
          </dl>
        </section>
      </div>

      <section class="profile-section profile-articles" aria-labelledby="articles-heading">
        <h2 id="articles-heading"><?php echo fp_e('articles_h2'); ?></h2>
        <p><?php echo fp_e('articles_intro'); ?></p>

        <?php if (empty($FP_AUTHOR_ARTICLES)): ?>
          <p class="article-empty"><?php echo fp_e('articles_empty'); ?></p>
        <?php else: ?>
          <div id="author-articles" class="author-articles-grid">
            <?php foreach ($FP_AUTHOR_ARTICLES as $article): ?>
              <?php
                $article_title = fp_article_lang_value($article, 'title', $FP_LANG);
                $article_excerpt = fp_article_lang_value($article, 'excerpt', $FP_LANG);
                $article_country = fp_article_lang_value($article, 'country', $FP_LANG);
                $article_tag = fp_article_lang_value($article, 'tag', $FP_LANG);
                $article_date = fp_article_lang_value($article, 'date', $FP_LANG);
                $article_link = isset($article['link']) ? $article['link'] : '#';
              ?>
              <article class="article-card">
                <div class="article-meta">
                  <?php if ($article_country !== ''): ?><span><?php echo htmlspecialchars($article_country, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
                  <?php if ($article_tag !== ''): ?><span><?php echo htmlspecialchars($article_tag, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
                  <?php if ($article_date !== ''): ?><span><?php echo htmlspecialchars($article_date, ENT_QUOTES, 'UTF-8'); ?></span><?php endif; ?>
                </div>

                <h3>
                  <a href="<?php echo htmlspecialchars($article_link, ENT_QUOTES, 'UTF-8'); ?>">
                    <?php echo htmlspecialchars($article_title, ENT_QUOTES, 'UTF-8'); ?>
                  </a>
                </h3>

                <?php if ($article_excerpt !== ''): ?>
                  <p><?php echo htmlspecialchars($article_excerpt, ENT_QUOTES, 'UTF-8'); ?></p>
                <?php endif; ?>

                <a class="article-link" href="<?php echo htmlspecialchars($article_link, ENT_QUOTES, 'UTF-8'); ?>">
                  <?php echo fp_e('article_read'); ?> →
                </a>
              </article>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <a class="profile-all-articles" href="/article/articoli.php?lang=<?php echo urlencode($FP_LANG); ?>&amp;authors=<?php echo urlencode($FP_AUTHOR_SLUG); ?>">
          <?php echo fp_e('articles_all'); ?> →
        </a>
      </section>
    </article>
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
