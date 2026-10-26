<?php
require_once __DIR__ . '/../i18n/i18n.php';

require_once __DIR__ . '/../article/article_helpers.php';
$na_cards = tp_article_public_cards(null, tp_lang());
$na_lang = tp_lang();
$na_is_en = ($na_lang === 'en');

$na_t = static function (string $it, string $en) use ($na_is_en): string {
  return $na_is_en ? $en : $it;
};

$na_h = static function (string $s): string {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
};

$na_date = static function (array $card): ?DateTimeImmutable {
  $raw = trim((string) ($card['date_it'] ?? ''));
  $date = DateTimeImmutable::createFromFormat('!d/m/Y', $raw);

  if (!$date || $date->format('d/m/Y') !== $raw) {
    return null;
  }

  return $date;
};

/*
 * La homepage mostra automaticamente gli ultimi cinque contenuti pubblicati.
 * article_data.php resta la fonte unica: non occorre più aggiornare a mano
 * in_homepage e home_order quando viene pubblicato un nuovo articolo.
 */
$home_cards = array_values(array_filter($na_cards, static function (array $card): bool {
  return !empty($card['in_archive']);
}));

usort($home_cards, static function (array $a, array $b) use ($na_date): int {
  $a_date = $na_date($a);
  $b_date = $na_date($b);
  $a_timestamp = $a_date ? $a_date->getTimestamp() : 0;
  $b_timestamp = $b_date ? $b_date->getTimestamp() : 0;

  if ($a_timestamp !== $b_timestamp) {
    return $b_timestamp <=> $a_timestamp;
  }

  return ($a['archive_order'] ?? 9999) <=> ($b['archive_order'] ?? 9999);
});

$home_cards = array_slice($home_cards, 0, 5);
?>

<section class="posts" aria-labelledby="posts-title">
  <div class="container">
    <div class="section-head">
      <h2 id="posts-title"><?php echo $na_h($na_t('I nostri articoli', 'Our articles')); ?></h2>
      <p class="section-sub">
        <?php echo $na_h($na_t(
          'Approfondimenti chiari e verificati su tasse, spesa pubblica e bilancio dello Stato.',
          'Clear, verified insights on taxes, public spending, and the State budget.'
        )); ?>
      </p>
    </div>

    <div class="posts-grid"
         role="list"
         aria-label="<?php echo $na_h($na_t('Ultimi cinque articoli', 'Latest five articles')); ?>">
      <?php foreach ($home_cards as $card):
        $tag = $na_is_en ? ($card['tag_en'] ?? '') : ($card['tag_it'] ?? '');
        $date = $na_is_en ? ($card['date_en'] ?? '') : ($card['date_it'] ?? '');
        $title = $na_is_en ? ($card['title_en'] ?? '') : ($card['title_it'] ?? '');
        $excerpt = $na_is_en ? ($card['excerpt_en'] ?? '') : ($card['excerpt_it'] ?? '');
        $aria = $na_is_en ? ($card['aria_en'] ?? '') : ($card['aria_it'] ?? '');
        $thumb = trim((string) ($card['thumb'] ?? ''));
        $card_date = $na_date($card);
        $date_iso = $card_date
          ? $card_date->format('Y-m-d')
          : (string) ($card['date_iso'] ?? '');

        if ($aria === '' || $aria === 'Apri' || $aria === 'Open') {
          $aria = $na_t('Apri: ', 'Open: ') . $title;
        }
      ?>
      <a class="post-card post-card-link"
         role="listitem"
         href="<?php echo $na_h((string) ($card['link'] ?? '#')); ?>"
         aria-label="<?php echo $na_h((string) $aria); ?>">
        <?php if ($thumb !== ''): ?>
        <img class="post-thumb"
             src="<?php echo $na_h($thumb); ?>"
             alt=""
             width="640"
             height="360"
             loading="lazy"
             decoding="async"
             fetchpriority="low">
        <?php endif; ?>
        <div class="post-body">
          <div class="post-top">
            <?php if ($tag !== ''): ?>
            <p class="post-tag"><?php echo $na_h((string) $tag); ?></p>
            <?php endif; ?>
            <time class="post-date" datetime="<?php echo $na_h($date_iso); ?>"><?php echo $na_h((string) $date); ?></time>
          </div>
          <h3 class="post-title"><?php echo $na_h((string) $title); ?></h3>
          <p class="post-excerpt"><?php echo $na_h((string) $excerpt); ?></p>
          <span class="post-open" aria-hidden="true"><?php echo $na_h($na_t('Apri →', 'Open →')); ?></span>
        </div>
      </a>
      <?php endforeach; ?>
    </div>

    <div class="cta-center" style="margin-top:1.25rem">
      <a class="btn btn-outline" href="/article/articoli.php"><?php echo $na_h($na_t('Tutti gli articoli', 'All articles')); ?></a>
    </div>
  </div>
</section>
