<?php
require_once __DIR__ . '/../i18n/i18n.php';

$tp_cards = require __DIR__ . '/article_data.php';

$archive_cards = array_values(array_filter($tp_cards, static function (array $card): bool {
  return !empty($card['in_archive']);
}));

usort($archive_cards, static function (array $a, array $b): int {
  return ($a['archive_order'] ?? 9999) <=> ($b['archive_order'] ?? 9999);
});

$tp_lang = tp_lang();
$is_en = ($tp_lang === 'en');

$__t = function (string $it, string $en) use ($is_en): string {
  return $is_en ? $en : $it;
};

$__h = function (string $s): string {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
};

$js_i18n = [
  'locale' => $is_en ? 'en' : 'it',
  'allTags' => $__t('Tutti i tag', 'All tags'),
  'noTag' => $__t('Senza tag', 'No tag'),
  'allCountries' => $__t('Tutti i paesi', 'All countries'),
  'noCountry' => $__t('Senza paese', 'No country'),
  'countTpl' => $__t('{shown} di {total} contenuti visibili', '{shown} of {total} visible items'),
];
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
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

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

      <div class="posts-controls" role="region" aria-label="<?php echo $__h($__t('Filtri articoli', 'Article filters')); ?>">
        <div class="posts-controls-row">
          <div class="posts-search">
            <label class="sr-only" for="postSearch"><?php echo $__h($__t('Cerca un articolo', 'Search for an article')); ?></label>
            <input
              id="postSearch"
              type="search"
              placeholder="<?php echo $__h($__t('Cerca per titolo o descrizione...', 'Search by title or description...')); ?>"
              autocomplete="off"
            />
            <button type="button" id="clearSearch" class="search-clear" aria-label="<?php echo $__h($__t('Svuota ricerca', 'Clear search')); ?>" hidden>×</button>
          </div>

          <div class="posts-select">
            <label class="sr-only" for="tagSelect"><?php echo $__h($__t('Filtra per tag', 'Filter by tag')); ?></label>
            <select id="tagSelect" aria-label="<?php echo $__h($__t('Filtra per tag', 'Filter by tag')); ?>">
              <option value=""><?php echo $__h($__t('Tutti i tag', 'All tags')); ?></option>
            </select>
          </div>

          <div class="posts-select">
            <label class="sr-only" for="countrySelect"><?php echo $__h($__t('Filtra per paese', 'Filter by country')); ?></label>
            <select id="countrySelect" aria-label="<?php echo $__h($__t('Filtra per paese', 'Filter by country')); ?>">
              <option value=""><?php echo $__h($__t('Tutti i paesi', 'All countries')); ?></option>
            </select>
          </div>
        </div>

        <p class="posts-count" id="postsCount" aria-live="polite"></p>
      </div>

      <p class="posts-empty" id="postsEmpty" hidden>
        <?php echo $__h($__t('Nessun risultato. Prova a cambiare ricerca o filtri.', 'No results. Try changing your search or filters.')); ?>
      </p>

      <div class="posts-grid">
        <?php foreach ($archive_cards as $card):
          $country = $is_en ? ($card['country_en'] ?? '') : ($card['country_it'] ?? '');
          $tag = $is_en ? ($card['tag_en'] ?? '') : ($card['tag_it'] ?? '');
          $date = $is_en ? ($card['date_en'] ?? '') : ($card['date_it'] ?? '');
          $title = $is_en ? ($card['title_en'] ?? '') : ($card['title_it'] ?? '');
          $excerpt = $is_en ? ($card['excerpt_en'] ?? '') : ($card['excerpt_it'] ?? '');
          $aria = $is_en ? ($card['aria_en'] ?? '') : ($card['aria_it'] ?? '');
        ?>
        <a class="post-card post-card-link"
           href="<?php echo $__h((string) ($card['link'] ?? '#')); ?>"
           aria-label="<?php echo $__h((string) $aria); ?>">
          <div class="post-thumb" style="--thumb:url('<?php echo $__h((string) ($card['thumb'] ?? '')); ?>')" aria-hidden="true"></div>
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
    </div>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <script type="text/javascript">
  var sc_project=13170178;
  var sc_invisible=1;
  var sc_security="f093464a";
  </script>
  <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
  <noscript><div class="statcounter"><a title="hit counter" href="https://statcounter.com/" target="_blank"><img class="statcounter" src="https://c.statcounter.com/13170178/0/f093464a/1/" alt="hit counter" referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>

<script>
(function () {
  const I18N = <?php echo json_encode($js_i18n, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

  const grid = document.querySelector('.posts-grid');
  if (!grid) return;

  const searchInput = document.getElementById('postSearch');
  const clearBtn = document.getElementById('clearSearch');
  const tagSelect = document.getElementById('tagSelect');
  const countrySelect = document.getElementById('countrySelect');
  const countEl = document.getElementById('postsCount');
  const emptyEl = document.getElementById('postsEmpty');

  const cards = Array.from(grid.querySelectorAll('a.post-card-link'));

  const normalize = (s) => {
    if (!s) return '';
    try {
      return s
        .toString()
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '')
        .trim();
    } catch (e) {
      return s.toString().toLowerCase().trim();
    }
  };

  const textOf = (card, sel) => card.querySelector(sel)?.textContent?.trim() || '';

  cards.forEach((card) => {
    const title = textOf(card, '.post-title');
    const excerpt = textOf(card, '.post-excerpt');
    const tag = textOf(card, '.post-tag');
    const country = textOf(card, '.post-country');

    card._meta = {
      title,
      excerpt,
      tag,
      country,
      nTitle: normalize(title),
      nExcerpt: normalize(excerpt),
      nTag: normalize(tag),
      nCountry: normalize(country),
    };
  });

  const buildOptions = (selectEl, map, allLabel, noneLabel, hasMissing) => {
    if (!selectEl) return;

    selectEl.innerHTML = '';
    selectEl.add(new Option(allLabel, ''));

    if (hasMissing) selectEl.add(new Option(noneLabel, '__none'));

    Array.from(map.entries())
      .sort((a, b) => a[1].localeCompare(b[1], I18N.locale, { sensitivity: 'base' }))
      .forEach(([key, label]) => selectEl.add(new Option(label, key)));
  };

  const tagMap = new Map();
  const countryMap = new Map();
  let hasMissingTag = false;
  let hasMissingCountry = false;

  cards.forEach((c) => {
    if (c._meta.nTag) tagMap.set(c._meta.nTag, c._meta.tag);
    else hasMissingTag = true;

    if (c._meta.nCountry) countryMap.set(c._meta.nCountry, c._meta.country);
    else hasMissingCountry = true;
  });

  buildOptions(tagSelect, tagMap, I18N.allTags, I18N.noTag, hasMissingTag);
  buildOptions(countrySelect, countryMap, I18N.allCountries, I18N.noCountry, hasMissingCountry);

  const applyFilters = () => {
    const q = normalize(searchInput?.value || '');
    const hasQ = q.length > 0;

    const tagKey = tagSelect?.value || '';
    const countryKey = countrySelect?.value || '';

    let shown = 0;

    cards.forEach((card) => {
      const m = card._meta;

      const matchText = !hasQ || m.nTitle.includes(q) || m.nExcerpt.includes(q);

      const matchTag =
        !tagKey ||
        (tagKey === '__none' ? !m.nTag : m.nTag === tagKey);

      const matchCountry =
        !countryKey ||
        (countryKey === '__none' ? !m.nCountry : m.nCountry === countryKey);

      const ok = matchText && matchTag && matchCountry;

      card.style.display = ok ? '' : 'none';
      if (ok) shown += 1;
    });

    const total = cards.length;

    if (countEl) {
      countEl.textContent = (I18N.countTpl || '')
        .replace('{shown}', String(shown))
        .replace('{total}', String(total));
    }

    if (emptyEl) emptyEl.hidden = shown !== 0;
    if (clearBtn) clearBtn.hidden = !hasQ;
  };

  const debounce = (fn, ms) => {
    let t;
    return function (...args) {
      clearTimeout(t);
      t = setTimeout(() => fn.apply(this, args), ms);
    };
  };

  applyFilters();

  searchInput?.addEventListener('input', debounce(applyFilters, 60));
  clearBtn?.addEventListener('click', () => {
    searchInput.value = '';
    searchInput.focus();
    applyFilters();
  });

  tagSelect?.addEventListener('change', applyFilters);
  countrySelect?.addEventListener('change', applyFilters);
})();
</script>

</body>
</html>
