<?php
require_once __DIR__ . '/../../i18n/i18n.php';

if (!function_exists('country_get_lang')) {
  function country_get_lang() {
    if (function_exists('tp_lang')) {
      return tp_lang();
    }

    $lang = 'it';
    if (isset($_GET['lang'])) {
      $lang = strtolower(trim((string) $_GET['lang']));
    } elseif (isset($_COOKIE['tp_lang'])) {
      $lang = strtolower(trim((string) $_COOKIE['tp_lang']));
    }

    return in_array($lang, array('it', 'en'), true) ? $lang : 'it';
  }
}

$COUNTRY_LANG = country_get_lang();

if (!function_exists('country_h')) {
  function country_h($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
  }
}

$COUNTRY_I18N = array(
  'it' => array(
    'title' => 'Francia — TAXpedia',
    'meta_desc' => 'Scopri le informazioni essenziali sulla Francia e accedi agli strumenti TAXpedia dedicati al Paese.',
    'eyebrow' => 'Scheda Paese',
    'country_name' => 'Francia',
    'intro' => 'Informazioni essenziali sul Paese e accesso diretto agli strumenti TAXpedia.',
    'currency_label' => 'Valuta',
    'currency_value' => 'Euro (€)',
    'salary_label' => 'Stipendio medio lordo',
    'salary_value' => '€43.709 annui (2024)',
    'inflation_label' => 'Tasso di inflazione',
    'inflation_value' => '0,9% (media 2025)',
    'taxation_label' => 'Tipo di tassazione',
    'taxation_value' => 'Progressiva',
    'debt_label' => 'Debito/PIL',
    'debt_value' => '117,6% (1° trim. 2026)',
    'unemployment_label' => 'Tasso di disoccupazione',
    'unemployment_value' => '7,7% (2025)',
    'tax_title' => 'La tassazione sul reddito',
    'tax_intro' => 'La Francia applica un’imposta personale sul reddito progressiva, calcolata per quote familiari. Le aliquote marginali aumentano con il reddito imponibile attribuito a ciascuna quota.',
    'tax_band_label' => 'Reddito imponibile per quota',
    'tax_rate_label' => 'Aliquota',
    'tax_band_1' => 'Fino a €11.600',
    'tax_rate_1' => '0%',
    'tax_band_2' => 'Da €11.601 a €29.579',
    'tax_rate_2' => '11%',
    'tax_band_3' => 'Da €29.580 a €84.577',
    'tax_rate_3' => '30%',
    'tax_band_4' => 'Da €84.578 a €181.917',
    'tax_rate_4' => '41%',
    'tax_band_5' => 'Oltre €181.917',
    'tax_rate_5' => '45%',
    'tax_note' => 'Scaglioni 2026 applicati ai redditi 2025. Il quoziente familiare e le agevolazioni incidono sull’imposta effettiva.',
    'calculator_cta' => 'Prova il calcolatore per la Francia',
    'compare_cta' => 'Confronta con altri Paesi',
    'articles_title' => 'Gli ultimi articoli sulla Francia',
    'articles_intro' => 'Gli ultimi articoli e approfondimenti pubblicati da TAXpedia sulla Francia.',
    'articles_empty' => 'Nessun articolo pubblicato per ora.',
    'articles_all' => 'Vedi tutti gli articoli sulla Francia',
    'article_read' => 'Leggi l’articolo',
  ),
  'en' => array(
    'title' => 'France — TAXpedia',
    'meta_desc' => 'Discover essential information about France and access TAXpedia tools dedicated to the country.',
    'eyebrow' => 'Country profile',
    'country_name' => 'France',
    'intro' => 'Essential information about the country and direct access to TAXpedia tools.',
    'currency_label' => 'Currency',
    'currency_value' => 'Euro (€)',
    'salary_label' => 'Average gross salary',
    'salary_value' => '€43,709 per year (2024)',
    'inflation_label' => 'Inflation rate',
    'inflation_value' => '0.9% (2025 average)',
    'taxation_label' => 'Type of taxation',
    'taxation_value' => 'Progressive',
    'debt_label' => 'Debt-to-GDP',
    'debt_value' => '117.6% (Q1 2026)',
    'unemployment_label' => 'Unemployment rate',
    'unemployment_value' => '7.7% (2025)',
    'tax_title' => 'Personal income taxation',
    'tax_intro' => 'France applies a progressive personal income tax calculated using household tax shares. Marginal rates increase with taxable income allocated to each share.',
    'tax_band_label' => 'Taxable income per share',
    'tax_rate_label' => 'Rate',
    'tax_band_1' => 'Up to €11,600',
    'tax_rate_1' => '0%',
    'tax_band_2' => '€11,601 to €29,579',
    'tax_rate_2' => '11%',
    'tax_band_3' => '€29,580 to €84,577',
    'tax_rate_3' => '30%',
    'tax_band_4' => '€84,578 to €181,917',
    'tax_rate_4' => '41%',
    'tax_band_5' => 'Over €181,917',
    'tax_rate_5' => '45%',
    'tax_note' => '2026 brackets applying to 2025 income. The family quotient and tax reliefs affect the final amount due.',
    'calculator_cta' => 'Try the calculator for France',
    'compare_cta' => 'Compare with other countries',
    'articles_title' => 'Latest articles about France',
    'articles_intro' => 'The latest TAXpedia articles and insights about France.',
    'articles_empty' => 'No articles have been published yet.',
    'articles_all' => 'See all articles about France',
    'article_read' => 'Read the article',
  ),
);

if (!function_exists('country_t')) {
  function country_t($key) {
    global $COUNTRY_LANG, $COUNTRY_I18N;

    if (isset($COUNTRY_I18N[$COUNTRY_LANG][$key])) {
      return $COUNTRY_I18N[$COUNTRY_LANG][$key];
    }
    if (isset($COUNTRY_I18N['it'][$key])) {
      return $COUNTRY_I18N['it'][$key];
    }

    return '';
  }
}

if (!function_exists('country_e')) {
  function country_e($key) {
    return country_h(country_t($key));
  }
}

$calculatorUrl = '/calculator/france/france.php?lang=' . rawurlencode($COUNTRY_LANG);
$comparisonUrl = '/tools/comparison.php?a=FR&lang=' . rawurlencode($COUNTRY_LANG);

$COUNTRY_ARTICLE_COUNTRY_IT = 'Francia';
$COUNTRY_ARTICLE_COUNTRY_EN = 'France';
$COUNTRY_CODE = 'FR';
$COUNTRY_ARTICLE_LIMIT = 4;
require_once __DIR__ . '/../article_helpers.php';

if (!function_exists('country_article_lang_value')) {
  function country_article_lang_value($article, $base_key, $lang) {
    return tp_article_text($article, $base_key, $lang);
  }
}

$COUNTRY_FILTERED_ARTICLES = array_slice(
  tp_article_select(tp_article_registry(), ['country'=>$COUNTRY_CODE], $COUNTRY_LANG),
  0,
  $COUNTRY_ARTICLE_LIMIT
);
?>
<!doctype html>
<html lang="<?php echo country_h($COUNTRY_LANG); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo country_e('title'); ?></title>
  <meta name="description" content="<?php echo country_e('meta_desc'); ?>">

  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css">

  <style>
    .country-page {
      width: min(100% - 2rem, 1040px);
      margin: 0 auto;
      padding: 4rem 0 5rem;
    }

    .country-heading {
      margin-bottom: 1.75rem;
    }

    .country-eyebrow {
      margin: 0 0 .45rem;
      color: #696969;
      font: 700 .78rem/1.2 Inter, sans-serif;
      letter-spacing: .12em;
      text-transform: uppercase;
    }

    .country-title {
      margin: 0;
      color: #111;
      font: 800 clamp(2.6rem, 7vw, 4.75rem)/1 Merriweather, serif;
    }

    .country-intro {
      max-width: 620px;
      margin: .85rem 0 0;
      color: #565656;
      font: 400 1rem/1.65 Inter, sans-serif;
    }

    .country-card {
      display: grid;
      grid-template-columns: minmax(250px, .9fr) minmax(340px, 1.1fr);
      gap: clamp(1.5rem, 4vw, 3.5rem);
      align-items: center;
      padding: clamp(1.35rem, 4vw, 3rem);
      border: 1px solid #e6e6e6;
      border-radius: 24px;
      background: #fff;
      box-shadow: 0 18px 55px rgba(0, 0, 0, .06);
    }

    .country-flag-wrap {
      display: grid;
      place-items: center;
      min-height: 280px;
      padding: 2rem;
      border-radius: 18px;
      background: #f5f5f2;
    }

    .country-flag {
      width: min(100%, 360px);
      aspect-ratio: 3 / 2;
      border: 1px solid rgba(0, 0, 0, .12);
      border-radius: 4px;
      background: linear-gradient(
        to right,
        #0055a4 0 33.333%,
        #fff 33.333% 66.666%,
        #ef4135 66.666% 100%
      );
      box-shadow: 0 12px 28px rgba(0, 0, 0, .13);
    }

    .country-facts {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      margin: 0;
    }

    .country-fact {
      padding: 1.15rem 0;
      border-bottom: 1px solid #e8e8e8;
    }

    .country-fact:nth-child(odd) {
      padding-right: 1.2rem;
    }

    .country-fact:nth-child(even) {
      padding-left: 1.2rem;
      border-left: 1px solid #e8e8e8;
    }

    .country-fact--wide {
      grid-column: 1 / -1;
      padding-right: 0;
    }

    .country-fact dt {
      margin-bottom: .3rem;
      color: #777;
      font: 600 .76rem/1.3 Inter, sans-serif;
      letter-spacing: .045em;
      text-transform: uppercase;
    }

    .country-fact dd {
      margin: 0;
      color: #161616;
      font: 700 1.03rem/1.4 Inter, sans-serif;
    }

    .country-actions {
      display: grid;
      grid-template-columns: repeat(2, minmax(0, 1fr));
      gap: 1rem;
      margin-top: 1.35rem;
    }

    .country-button {
      display: flex;
      align-items: center;
      justify-content: space-between;
      min-height: 76px;
      padding: 1rem 1.25rem;
      border: 2px solid #111;
      border-radius: 15px;
      color: #111;
      font: 800 .95rem/1.35 Inter, sans-serif;
      text-decoration: none;
      transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
    }

    .country-button::after {
      content: '→';
      flex: 0 0 auto;
      margin-left: 1rem;
      font-size: 1.45rem;
    }

    .country-button--primary {
      border-color: #f5d000;
      background: #f5d000;
    }

    .country-button--secondary {
      background: #fff;
    }

    .country-button:hover,
    .country-button:focus-visible {
      transform: translateY(-2px);
      box-shadow: 0 10px 24px rgba(0, 0, 0, .10);
    }

    .country-tax {
      margin-top: 3.75rem;
      padding: clamp(1.35rem, 4vw, 2.4rem);
      border-radius: 22px;
      background: #f5d000;
    }

    .country-tax h2 {
      margin: 0;
      font: 800 clamp(1.55rem, 4vw, 2.15rem)/1.2 Merriweather, serif;
    }

    .country-tax-intro {
      max-width: 780px;
      margin: .8rem 0 1.35rem;
      color: #292929;
      font: 400 .96rem/1.65 Inter, sans-serif;
    }

    .country-tax-table-wrap {
      overflow-x: auto;
      border-radius: 14px;
      background: #fff;
    }

    .country-tax-table {
      width: 100%;
      border-collapse: collapse;
      color: #171717;
      font: 600 .92rem/1.45 Inter, sans-serif;
    }

    .country-tax-table th,
    .country-tax-table td {
      padding: .85rem 1rem;
      border-bottom: 1px solid #e8e8e8;
      text-align: left;
    }

    .country-tax-table th {
      color: #666;
      font-size: .76rem;
      letter-spacing: .045em;
      text-transform: uppercase;
    }

    .country-tax-table th:last-child,
    .country-tax-table td:last-child {
      width: 110px;
      text-align: right;
    }

    .country-tax-table tbody tr:last-child td {
      border-bottom: 0;
    }

    .country-tax-note {
      margin: .9rem 0 0;
      color: #3a3a3a;
      font: 600 .78rem/1.5 Inter, sans-serif;
    }

    .country-articles {
      margin-top: 3.75rem;
    }

    .country-articles h2 {
      margin: 0 0 1.15rem;
      font: 800 clamp(1.55rem, 4vw, 2.15rem)/1.2 Merriweather, serif;
    }

    .country-articles-intro {
      max-width: 720px;
      margin: -.45rem 0 0;
      color: #666;
      font: 400 .96rem/1.6 Inter, sans-serif;
    }

    .country-articles-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 1rem;
      margin-top: 1.25rem;
    }

    .country-article-card {
      display: flex;
      flex-direction: column;
      gap: .65rem;
      min-height: 100%;
      padding: 1.15rem;
      border: 1px solid #e4e4e4;
      border-radius: 18px;
      background: #fafafa;
    }

    .country-article-meta {
      display: flex;
      flex-wrap: wrap;
      gap: .45rem;
      align-items: center;
      color: #555;
      font: 700 .82rem/1.35 Inter, sans-serif;
    }

    .country-article-meta span {
      display: inline-flex;
      align-items: center;
      padding: .22rem .5rem;
      border-radius: 999px;
      background: #f0f0f0;
    }

    .country-article-card h3 {
      margin: 0;
      color: #111;
      font: 700 1.06rem/1.4 Merriweather, serif;
    }

    .country-article-card h3 a {
      color: inherit;
      text-decoration: none;
    }

    .country-article-card h3 a:hover,
    .country-article-card h3 a:focus {
      text-decoration: underline;
    }

    .country-article-card p {
      margin: 0;
      color: #5f5f5f;
      font: 400 .91rem/1.58 Inter, sans-serif;
    }

    .country-article-link,
    .country-all-articles {
      color: #111;
      font: 800 .91rem/1.4 Inter, sans-serif;
      text-decoration: none;
    }

    .country-article-link {
      margin-top: auto;
    }

    .country-article-link:hover,
    .country-article-link:focus,
    .country-all-articles:hover,
    .country-all-articles:focus {
      text-decoration: underline;
    }

    .country-articles-empty {
      margin: 1rem 0 0;
      padding: 1rem 1.2rem;
      border-radius: 14px;
      background: #f7f7f7;
      color: #666;
      font: 700 .92rem/1.5 Inter, sans-serif;
    }

    .country-all-articles {
      display: inline-flex;
      align-items: center;
      margin-top: 1.2rem;
    }

    @media (max-width: 760px) {
      .country-page {
        padding-top: 2.75rem;
      }

      .country-card,
      .country-actions {
        grid-template-columns: 1fr;
      }

      .country-flag-wrap {
        min-height: auto;
      }
    }

    @media (max-width: 460px) {
      .country-facts {
        grid-template-columns: 1fr;
      }

      .country-fact,
      .country-fact:nth-child(odd),
      .country-fact:nth-child(even),
      .country-fact--wide {
        grid-column: auto;
        padding: 1rem 0;
        border-left: 0;
      }
    }
  </style>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="country-page" id="main">
    <header class="country-heading">
      <p class="country-eyebrow"><?php echo country_e('eyebrow'); ?></p>
      <h1 class="country-title"><?php echo country_e('country_name'); ?></h1>
      <p class="country-intro"><?php echo country_e('intro'); ?></p>
    </header>

    <section class="country-card" aria-label="<?php echo country_e('country_name'); ?>">
      <div class="country-flag-wrap">
        <div class="country-flag" role="img" aria-label="<?php echo country_e('country_name'); ?>"></div>
      </div>

      <dl class="country-facts">
        <div class="country-fact">
          <dt><?php echo country_e('currency_label'); ?></dt>
          <dd><?php echo country_e('currency_value'); ?></dd>
        </div>
        <div class="country-fact">
          <dt><?php echo country_e('salary_label'); ?></dt>
          <dd><?php echo country_e('salary_value'); ?></dd>
        </div>
        <div class="country-fact">
          <dt><?php echo country_e('inflation_label'); ?></dt>
          <dd><?php echo country_e('inflation_value'); ?></dd>
        </div>
        <div class="country-fact">
          <dt><?php echo country_e('taxation_label'); ?></dt>
          <dd><?php echo country_e('taxation_value'); ?></dd>
        </div>
        <div class="country-fact">
          <dt><?php echo country_e('debt_label'); ?></dt>
          <dd><?php echo country_e('debt_value'); ?></dd>
        </div>
        <div class="country-fact">
          <dt><?php echo country_e('unemployment_label'); ?></dt>
          <dd><?php echo country_e('unemployment_value'); ?></dd>
        </div>
      </dl>
    </section>

    <nav class="country-actions" aria-label="TAXpedia tools">
      <a class="country-button country-button--primary" href="<?php echo country_h($calculatorUrl); ?>">
        <?php echo country_e('calculator_cta'); ?>
      </a>
      <a class="country-button country-button--secondary" href="<?php echo country_h($comparisonUrl); ?>">
        <?php echo country_e('compare_cta'); ?>
      </a>
    </nav>

    <section class="country-tax" aria-labelledby="country-tax-title">
      <h2 id="country-tax-title"><?php echo country_e('tax_title'); ?></h2>
      <p class="country-tax-intro"><?php echo country_e('tax_intro'); ?></p>
      <div class="country-tax-table-wrap">
        <table class="country-tax-table">
          <thead>
            <tr>
              <th scope="col"><?php echo country_e('tax_band_label'); ?></th>
              <th scope="col"><?php echo country_e('tax_rate_label'); ?></th>
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 1; $i <= 5; $i++): ?>
              <tr>
                <td><?php echo country_e('tax_band_' . $i); ?></td>
                <td><?php echo country_e('tax_rate_' . $i); ?></td>
              </tr>
            <?php endfor; ?>
          </tbody>
        </table>
      </div>
      <p class="country-tax-note"><?php echo country_e('tax_note'); ?></p>
    </section>

    <section class="country-articles" aria-labelledby="country-articles-title">
      <h2 id="country-articles-title"><?php echo country_e('articles_title'); ?></h2>
      <p class="country-articles-intro"><?php echo country_e('articles_intro'); ?></p>

      <?php if (empty($COUNTRY_FILTERED_ARTICLES)): ?>
        <p class="country-articles-empty"><?php echo country_e('articles_empty'); ?></p>
      <?php else: ?>
        <div class="country-articles-grid">
          <?php foreach ($COUNTRY_FILTERED_ARTICLES as $article): ?>
            <?php
              $article_title = country_article_lang_value($article, 'title', $COUNTRY_LANG);
              $article_excerpt = country_article_lang_value($article, 'excerpt', $COUNTRY_LANG);
              $article_country = country_article_lang_value($article, 'country', $COUNTRY_LANG);
              $article_tag = country_article_lang_value($article, 'tag', $COUNTRY_LANG);
              $article_date = country_article_lang_value($article, 'date', $COUNTRY_LANG);
              $article_link = isset($article['link']) ? $article['link'] : '#';
            ?>
            <article class="country-article-card">
              <div class="country-article-meta">
                <?php if ($article_country !== ''): ?><span><?php echo country_h($article_country); ?></span><?php endif; ?>
                <?php if ($article_tag !== ''): ?><span><?php echo country_h($article_tag); ?></span><?php endif; ?>
                <?php if ($article_date !== ''): ?><span><?php echo country_h($article_date); ?></span><?php endif; ?>
              </div>

              <h3>
                <a href="<?php echo country_h($article_link); ?>">
                  <?php echo country_h($article_title); ?>
                </a>
              </h3>

              <?php if ($article_excerpt !== ''): ?>
                <p><?php echo country_h($article_excerpt); ?></p>
              <?php endif; ?>

              <a class="country-article-link" href="<?php echo country_h($article_link); ?>">
                <?php echo country_e('article_read'); ?> →
              </a>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <a class="country-all-articles" href="/article/articoli.php?lang=<?php echo rawurlencode($COUNTRY_LANG); ?>&amp;country=<?php echo rawurlencode($COUNTRY_CODE); ?>">
        <?php echo country_e('articles_all'); ?> →
      </a>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <script type="text/javascript">
  var sc_project=13170178;
  var sc_invisible=1;
  var sc_security="f093464a";
  </script>
  <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
  <noscript><div class="statcounter"><a title="hit counter" href="https://statcounter.com/" target="_blank"><img class="statcounter" src="https://c.statcounter.com/13170178/0/f093464a/1/" alt="hit counter" referrerpolicy="no-referrer-when-downgrade"></a></div></noscript>
</body>
</html>
