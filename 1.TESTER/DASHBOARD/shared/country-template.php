<?php
declare(strict_types=1);
require_once __DIR__ . '/bootstrap.php';
if (!isset($dashboardCountryCode, $DASH_DATA['countries'][$dashboardCountryCode])) {
  http_response_code(404);
  echo dash_h(dash_t('Paese non disponibile.', 'Country not available.'));
  return;
}
$country = $DASH_DATA['countries'][$dashboardCountryCode];
$dashboardTitle = dash_name($country);
$articles = dash_articles($country);
$taxMetric = ['key' => 'taxation_type', 'fmt' => 'translated_text'];
$taxMeta = dash_metric_meta('taxation_type', $country);
require __DIR__ . '/page-top.php';
?>
  <main class="dash-page dash-profile" id="main" data-country="<?php echo dash_h($country['code']); ?>">
    <a class="dash-back" href="<?php echo dash_h(dash_url($DASH_BASE . '/index.php')); ?>">← <?php echo dash_h(dash_t('Tutti i Paesi', 'All countries')); ?></a>
    <header class="dash-country-heading">
      <p class="dash-eyebrow"><?php echo dash_h(dash_t('Scheda Paese', 'Country profile')); ?></p>
      <h1><?php echo dash_h($dashboardTitle); ?></h1>
      <p class="dash-intro"><?php echo dash_h(dash_t('Informazioni essenziali sul Paese e accesso diretto agli strumenti TAXpedia.', 'Essential country information and direct access to TAXpedia tools.')); ?></p>
    </header>

    <section class="dash-summary" aria-label="<?php echo dash_h(dash_t('Riepilogo del Paese', 'Country summary')); ?>">
      <div class="dash-flag-wrap">
        <img class="dash-profile-flag" src="<?php echo dash_h($country['flag_path']); ?>" alt="<?php echo dash_h(dash_t('Bandiera: ', 'Flag: ') . $dashboardTitle); ?>">
      </div>
      <dl class="dash-facts">
        <?php foreach ($DASH_DATA['metrics'] as $metric): ?>
          <?php $meta = dash_metric_meta($metric['key'], $country); ?>
          <div class="dash-fact" data-metric="<?php echo dash_h($metric['key']); ?>">
            <dt><?php echo dash_h($metric['label_' . $DASH_LANG]); ?></dt>
            <dd><?php echo dash_h(dash_metric_value($metric, $country)); ?></dd>
            <dd class="dash-period"><?php echo dash_h($meta['period'] ?? $meta['as_of'] ?? $meta['checked_on'] ?? $metric['period'] ?? ''); ?><?php if (($meta['status'] ?? '') === 'provisional'): ?> · <?php echo dash_h(dash_t('provvisorio', 'provisional')); ?><?php endif; ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
    </section>
    <details class="dash-methodology">
      <summary><?php echo dash_h(dash_t('Definizioni e fonti dei dati', 'Data definitions and sources')); ?></summary>
      <p><?php echo dash_h(dash_t('Dati ripresi dal comparatore TAXpedia, con i rispettivi periodi di riferimento. La scheda prototipo non aggiunge una nuova verifica fiscale.', 'Data reused from the TAXpedia comparator with their reference periods. This prototype does not add a new fiscal verification.')); ?></p>
      <ul>
        <?php foreach ($DASH_DATA['metrics'] as $metric): ?>
          <?php $meta = dash_metric_meta($metric['key'], $country); $sourceUrl = $meta['source_url'] ?? ($DASH_DATA['sources'][$meta['source_id'] ?? '']['url'] ?? ''); ?>
          <li><strong><?php echo dash_h($metric['label_' . $DASH_LANG]); ?>:</strong> <?php echo dash_h($meta['definition_' . $DASH_LANG] ?? dash_metric_value($metric, $country)); ?>
            <?php if ($sourceUrl !== ''): ?><a href="<?php echo dash_h($sourceUrl); ?>" target="_blank" rel="noopener noreferrer"><?php echo dash_h(dash_t('Fonte', 'Source')); ?></a><?php endif; ?>
          </li>
        <?php endforeach; ?>
      </ul>
    </details>

    <nav class="dash-actions" aria-label="<?php echo dash_h(dash_t('Strumenti TAXpedia', 'TAXpedia tools')); ?>">
      <a class="dash-button dash-button-primary" href="<?php echo dash_h(dash_url($country['calculator_path'])); ?>"><?php echo dash_h(dash_t('Apri il calcolatore: ', 'Open the calculator: ') . $dashboardTitle); ?></a>
      <a class="dash-button" href="<?php echo dash_h(dash_url('/tools/comparison.php', ['a' => $country['code']])); ?>"><?php echo dash_h(dash_t('Confronta con altri Paesi', 'Compare with other countries')); ?></a>
    </nav>

    <section class="dash-tax" aria-labelledby="tax-title">
      <h2 id="tax-title"><?php echo dash_h(dash_t('La tassazione sul reddito', 'Personal income taxation')); ?></h2>
      <p class="dash-tax-type"><?php echo dash_h($dashboardTitle . ' · ' . dash_metric_value($taxMetric, $country)); ?></p>
      <p><?php echo dash_h($taxMeta['definition_' . $DASH_LANG] ?? dash_t('Contenuti in arrivo.', 'Content coming soon.')); ?></p>
      <?php if (!empty($taxMeta['source_url'])): ?>
        <p class="dash-tax-source"><a href="<?php echo dash_h($taxMeta['source_url']); ?>" target="_blank" rel="noopener noreferrer"><?php echo dash_h(dash_t('Fonte della classificazione', 'Classification source')); ?></a> · <?php echo dash_h($taxMeta['checked_on'] ?? ''); ?></p>
      <?php endif; ?>
    </section>

    <section class="dash-articles" aria-labelledby="articles-title">
      <h2 id="articles-title"><?php echo dash_h(dash_t('Articoli e approfondimenti', 'Articles and insights')); ?></h2>
      <?php if (!$articles): ?>
        <p class="dash-empty"><?php echo dash_h(dash_t('Contenuti in arrivo. Articoli dedicati a questo Paese non ancora disponibili in questa scheda.', 'Content coming soon. Country-specific articles are not yet available in this profile.')); ?></p>
      <?php else: ?>
        <div class="dash-article-grid">
          <?php foreach ($articles as $article): ?>
            <article class="dash-article-card">
              <p class="dash-article-date"><?php echo dash_h(dash_article_text($article, 'date')); ?></p>
              <h3><a href="<?php echo dash_h(dash_url($article['link'])); ?>"><?php echo dash_h(dash_article_text($article, 'title')); ?></a></h3>
              <?php if (dash_article_text($article, 'excerpt') !== ''): ?><p><?php echo dash_h(dash_article_text($article, 'excerpt')); ?></p><?php endif; ?>
              <a class="dash-article-link" href="<?php echo dash_h(dash_url($article['link'])); ?>"><?php echo dash_h(dash_t('Leggi l’articolo', 'Read the article')); ?> →</a>
            </article>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </section>
  </main>
<?php require __DIR__ . '/page-bottom.php'; ?>
