<?php
require_once __DIR__ . '/../i18n/i18n.php';
require_once __DIR__ . '/article_helpers.php';

$tp_lang = tp_lang();
$is_en = ($tp_lang === 'en');
$__t = static function (string $it, string $en) use ($is_en): string { return $is_en ? $en : $it; };
$__h = 'tp_article_h';
$filters = tp_article_filters($_GET);
$results = tp_article_select(tp_article_registry(), $filters, $tp_lang);
$pagination = tp_article_page($results, $filters['page']);
$archive_cards = $pagination['cards'];
$page_links = array_unique(array_merge([1], range(max(1, $pagination['page'] - 2), min($pagination['pages'], $pagination['page'] + 2)), [$pagination['pages']]));
$country_options = tp_article_countries();
uasort($country_options, static function (array $a, array $b) use ($tp_lang): int {
  return strcmp(tp_article_normalize($a['name_' . $tp_lang]), tp_article_normalize($b['name_' . $tp_lang]));
});
?>
<!doctype html>
<html lang="<?php echo $__h($tp_lang); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo $__h($__t('I nostri Articoli — TAXpedia', 'Our Articles — TAXpedia')); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css"/>
  <link rel="stylesheet" href="/style/StyleTesti.css"/>
  <link rel="stylesheet" href="stylearticoli.css"/>
</head>

<body class="posts-archive-page">
  <?php include __DIR__ . '/../partials/header.php'; ?>

  <main class="container" id="main">
    <div class="container">
      <div class="section-head">
        <h2 id="posts-title"><?php echo $__h($__t('I nostri articoli', 'Our articles')); ?></h2>
        <p class="section-sub">
          <?php echo $__h($__t(
            'Approfondimenti chiari e verificati su tasse, spesa pubblica e bilancio dello Stato.',
            'Clear, verified insights on taxes, public spending, and the state budget.'
          )); ?>
        </p>
      </div>

      <form class="posts-controls" method="get" action="/article/articoli.php" role="search" aria-label="<?php echo $__h($__t('Filtri articoli', 'Article filters')); ?>">
        <input type="hidden" name="lang" value="<?php echo $__h($tp_lang); ?>">
        <div class="posts-controls-row">
          <div class="posts-search">
            <label for="postSearch"><?php echo $__h($__t('Cerca', 'Search')); ?></label>
            <input id="postSearch" name="q" type="search" maxlength="500" value="<?php echo $__h($filters['q']); ?>" placeholder="<?php echo $__h($__t('Titolo o descrizione...', 'Title or description...')); ?>">
          </div>
          <div class="posts-select">
            <label for="countrySelect"><?php echo $__h($__t('Paese', 'Country')); ?></label>
            <select id="countrySelect" name="country">
              <option value=""><?php echo $__h($__t('Tutti i paesi', 'All countries')); ?></option>
              <option value="EU"<?php echo $filters['country'] === 'EU' ? ' selected' : ''; ?>><?php echo $__h($__t('Europa / Unione europea', 'Europe / European Union')); ?></option>
              <?php foreach ($country_options as $code => $country_option): ?>
              <option value="<?php echo $__h($code); ?>"<?php echo $filters['country'] === $code ? ' selected' : ''; ?>><?php echo $__h($country_option['name_' . $tp_lang]); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="posts-select">
            <label for="topicSelect"><?php echo $__h($__t('Argomento', 'Topic')); ?></label>
            <select id="topicSelect" name="topic">
              <option value=""><?php echo $__h($__t('Tutti gli argomenti', 'All topics')); ?></option>
              <?php foreach (tp_article_topics() as $topic_id => $labels): ?>
              <option value="<?php echo $__h($topic_id); ?>"<?php echo $filters['topic'] === $topic_id ? ' selected' : ''; ?>><?php echo $__h($labels[$tp_lang]); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="posts-select">
            <label for="tagSelect"><?php echo $__h($__t('Tipo di contenuto', 'Content type')); ?></label>
            <select id="tagSelect" name="type">
              <option value=""><?php echo $__h($__t('Tutti i tipi', 'All types')); ?></option>
              <?php foreach (tp_article_types() as $type_id => $labels): ?>
              <option value="<?php echo $__h($type_id); ?>"<?php echo $filters['type'] === $type_id ? ' selected' : ''; ?>><?php echo $__h($labels[$tp_lang]); ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="posts-filter-actions">
          <button class="btn btn-primary" type="submit"><?php echo $__h($__t('Applica filtri', 'Apply filters')); ?></button>
          <a class="btn btn-outline" href="<?php echo $__h(tp_article_archive_url([], $tp_lang)); ?>"><?php echo $__h($__t('Azzera filtri', 'Reset filters')); ?></a>
          <span><?php echo $__h($__t('Più recenti prima', 'Newest first')); ?></span>
        </div>
        <p class="posts-count" id="postsCount" aria-live="polite"><?php echo $__h(sprintf($__t('%d di %d contenuti · Pagina %d di %d', '%d of %d items · Page %d of %d'), count($archive_cards), $pagination['total'], $pagination['page'], $pagination['pages'])); ?></p>
      </form>

      <?php if (!$results): ?>
      <p class="posts-empty" id="postsEmpty"><?php echo $__h($filters['invalid']
        ? $__t('Filtro non valido. Azzera i filtri e riprova.', 'Invalid filter. Reset the filters and try again.')
        : $__t('Nessun risultato. Prova a cambiare ricerca o filtri.', 'No results. Try changing your search or filters.')); ?></p>
      <?php endif; ?>

      <div class="posts-grid">
        <?php foreach ($archive_cards as $card):
          $country = tp_article_text($card, 'country', $tp_lang);
          $tag = tp_article_text($card, 'tag', $tp_lang);
          $date = tp_article_text($card, 'date', $tp_lang);
          $title = tp_article_text($card, 'title', $tp_lang);
          $excerpt = tp_article_text($card, 'excerpt', $tp_lang);
          $aria = tp_article_text($card, 'aria', $tp_lang);
          if ($aria === '' || $aria === 'Apri' || $aria === 'Open') $aria = $__t('Apri: ', 'Open: ') . $title;
        ?>
        <a class="post-card post-card-link"
           href="<?php echo $__h((string) ($card['link'] ?? '#')); ?>"
           aria-label="<?php echo $__h((string) $aria); ?>">
          <div class="post-thumb" aria-hidden="true"><?php if ($card['thumb'] !== ''): ?><img src="<?php echo $__h($card['thumb']); ?>" alt="" width="640" height="420" loading="lazy" decoding="async"><?php endif; ?></div>
          <div class="post-body">
            <div class="post-top">
              <?php if ($country !== ''): ?>
              <p class="post-country"><?php echo $__h((string) $country); ?></p>
              <?php endif; ?>
              <?php if ($tag !== ''): ?>
              <p class="post-tag"><?php echo $__h((string) $tag); ?></p>
              <?php endif; ?>
              <time class="post-date" datetime="<?php echo $__h((string) ($card['date_iso'] ?? '')); ?>"><?php echo $__h((string) $date); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h((string) $title); ?></h3>
            <p class="post-excerpt"><?php echo $__h((string) $excerpt); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
      <?php if ($pagination['pages'] > 1): ?>
      <nav class="posts-pagination" aria-label="<?php echo $__h($__t('Pagine degli articoli', 'Article pages')); ?>">
        <?php $previous_page = 0; foreach ($page_links as $page_number): ?>
        <?php if ($page_number > $previous_page + 1): ?><span aria-hidden="true">…</span><?php endif; ?>
        <a class="btn btn-outline" href="<?php echo $__h(tp_article_archive_url($filters, $tp_lang, $page_number)); ?>" aria-label="<?php echo $__h($__t('Pagina ', 'Page ') . $page_number); ?>"<?php echo $page_number === $pagination['page'] ? ' aria-current="page"' : ''; ?>><?php echo $page_number; ?></a>
        <?php $previous_page = $page_number; endforeach; ?>
      </nav>
      <?php endif; ?>
    </div>
  </main>

  <?php include __DIR__ . '/../partials/footer.php'; ?>

  <script type="text/javascript">
  var sc_project=13170178;
  var sc_invisible=1;
  var sc_security="f093464a";
  </script>
  <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
  <noscript><div class="statcounter"><a title="hit counter" href="https://statcounter.com/" target="_blank"><img class="statcounter" src="https://c.statcounter.com/13170178/0/f093464a/1/" alt="hit counter" referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>



</body>
</html>
