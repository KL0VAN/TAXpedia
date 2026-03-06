<?php
require_once __DIR__ . '/../i18n/i18n.php';

$na_cards = require __DIR__ . '/../article/article_data.php';
$na_lang = tp_lang();
$na_is_en = ($na_lang === 'en');

$na_t = static function (string $it, string $en) use ($na_is_en): string {
  return $na_is_en ? $en : $it;
};

$na_h = static function (string $s): string {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
};

$home_cards = array_values(array_filter($na_cards, static function (array $card): bool {
  return !empty($card['in_homepage']);
}));

usort($home_cards, static function (array $a, array $b): int {
  return ($a['home_order'] ?? 9999) <=> ($b['home_order'] ?? 9999);
});
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

    <div class="posts-grid">
      <?php foreach ($home_cards as $card):
        $tag = $na_is_en ? ($card['tag_en'] ?? '') : ($card['tag_it'] ?? '');
        $date = $na_is_en ? ($card['date_en'] ?? '') : ($card['date_it'] ?? '');
        $title = $na_is_en ? ($card['title_en'] ?? '') : ($card['title_it'] ?? '');
        $excerpt = $na_is_en ? ($card['excerpt_en'] ?? '') : ($card['excerpt_it'] ?? '');
        $aria = $na_is_en ? ($card['aria_en'] ?? '') : ($card['aria_it'] ?? '');
      ?>
      <a class="post-card post-card-link"
         href="<?php echo $na_h((string) ($card['link'] ?? '#')); ?>"
         aria-label="<?php echo $na_h((string) $aria); ?>">
        <div class="post-thumb" style="--thumb:url('<?php echo $na_h((string) ($card['thumb'] ?? '')); ?>')" aria-hidden="true"></div>
        <div class="post-body">
          <div class="post-top">
            <?php if ($tag !== ''): ?>
            <p class="post-tag"><?php echo $na_h((string) $tag); ?></p>
            <?php endif; ?>
            <time class="post-date" datetime="<?php echo $na_h((string) ($card['date_iso'] ?? '')); ?>"><?php echo $na_h((string) $date); ?></time>
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
