<?php
/**
 * Personal founder page draft for TAXpedia.
 * Built from the current About Us content for Ottilia Ogliari.
 */

require_once __DIR__ . '/../../i18n/i18n.php';

if (!isset($FP_SUPPORTED)) $FP_SUPPORTED = array('it', 'en');

$FP_LANG = tp_lang();
if (!in_array($FP_LANG, $FP_SUPPORTED, true)) $FP_LANG = 'it';

$FP_I18N = array(
  'it' => array(
    'meta_title' => "Ottilia Ogliari \u{2014} Redattrice | TAXpedia",
    'meta_desc'  => "Pagina personale di Ottilia Ogliari, Redattrice di TAXpedia.",

    'back'        => "Torna all'About us",
    'role'        => "Redattrice",
    'lead'        => "Scrive articoli per TAXpedia.",

    'profile_h2'  => "Profilo",
    'bio'         => "Nata a Milano nel 2006, ha frequentato il Liceo Berchet, sezione con potenziamento IGCSE. Dal 2025 studia International Relations and Global Affairs presso l'Università Cattolica del Sacro Cuore. Scrive articoli per TAXpedia.",

    'details_h2'  => "Informazioni",
    'born_l'      => "Citt\u{00E0} di nascita",
    'born_v'      => "Milano, Italia",
    'university_l'=> "Percorso universitario",
    'university_v'=> "International Relations and Global Affairs all'Università Cattolica del Sacro Cuore, dal 2025",
    'role_l'      => "Ruolo in TAXpedia",
    'role_v'      => "Redattrice",

    'links_h2'    => "Link personali",
    'instagram'   => "Instagram",

    'articles_h2'      => "Articoli pubblicati",
    'articles_intro'   => "Gli articoli e i contributi pubblicati da Ottilia Ogliari su TAXpedia.",
    'articles_empty'   => "Nessun articolo pubblicato per ora.",
    'articles_all'     => "Vedi tutti gli articoli di Ottilia",
    'article_read'      => "Leggi l'articolo",
  ),

  'en' => array(
    'meta_title' => "Ottilia Ogliari — Editor | TAXpedia",
    'meta_desc'  => "Personal page of Ottilia Ogliari, Editor at TAXpedia.",

    'back'        => "Back to About us",
    'role'        => "Editor",
    'lead'        => "She writes articles for TAXpedia.",

    'profile_h2'  => "Profile",
    'bio'         => "Born in Milan in 2006, she attended Liceo Berchet, in the IGCSE-enhanced programme. Since 2025, she has been studying International Relations and Global Affairs at Università Cattolica del Sacro Cuore. She writes articles for TAXpedia.",

    'details_h2'  => "Information",
    'born_l'      => "Place of birth",
    'born_v'      => "Milan, Italy",
    'university_l'=> "University programme",
    'university_v'=> "International Relations and Global Affairs at Università Cattolica del Sacro Cuore, since 2025",
    'role_l'      => "Role at TAXpedia",
    'role_v'      => "Editor",

    'links_h2'    => "Personal links",
    'instagram'   => "Instagram",

    'articles_h2'      => "Published articles",
    'articles_intro'   => "Articles and contributions published by Ottilia Ogliari on TAXpedia.",
    'articles_empty'   => "No articles published yet.",
    'articles_all'     => "See all Ottilia's articles",
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

$FP_AUTHOR_SLUG = 'ottilia-ogliari';
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
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($FP_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo fp_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <meta name="description" content="<?php echo fp_e('meta_desc'); ?>">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="../AboutUs.css" />

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

    .profile-photo-wrap {
      display: flex;
      justify-content: center;
    }

    .profile-photo {
      width: min(100%, 280px);
      aspect-ratio: 1 / 1;
      object-fit: cover;
      border-radius: 24px;
      box-shadow: 0 16px 35px rgba(15, 23, 42, .14);
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

      <section class="profile-hero" aria-label="Ottilia Ogliari">
        <div class="profile-photo-wrap">
          <img src="../imm/people/ottilia.jpg" alt="Ottilia Ogliari" class="profile-photo">
        </div>

        <div class="profile-copy">
          <h1 class="profile-title" id="founder-title">Ottilia Ogliari</h1>
          <p class="profile-role"><?php echo fp_e('role'); ?></p>
          <p class="profile-lead"><?php echo fp_e('lead'); ?></p>

          <div class="profile-socials" aria-label="<?php echo fp_e('links_h2'); ?>">
            <a href="https://www.instagram.com/ottilia_ogliari/" target="_blank" rel="noopener"><?php echo fp_e('instagram'); ?></a>
          </div>
        </div>
      </section>

      <div class="profile-content">
        <section class="profile-section" aria-labelledby="profile-heading">
          <h2 id="profile-heading"><?php echo fp_e('profile_h2'); ?></h2>
          <p><?php echo fp_e('bio'); ?></p>
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
