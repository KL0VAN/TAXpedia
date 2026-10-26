<?php
declare(strict_types=1);
require_once __DIR__ . '/shared/bootstrap.php';
$dashboardTitle = dash_t('Paesi dell’Unione Europea', 'European Union countries');
require __DIR__ . '/shared/page-top.php';
?>
  <main class="dash-page dash-menu" id="main">
    <header class="dash-menu-heading">
      <h1><?php echo dash_h($dashboardTitle); ?></h1>
      <p><?php echo dash_h(dash_t('Scegli un Paese per consultare la sua scheda e accedere al calcolatore nazionale.', 'Choose a country to explore its profile and access the national calculator.')); ?></p>
      <a class="dash-button dash-button-primary btn btn-primary" href="<?php echo dash_h(dash_url('/tools/comparison.php')); ?>"><?php echo dash_h(dash_t('Confronta i Paesi', 'Compare countries')); ?></a>
    </header>
    <section aria-label="<?php echo dash_h(dash_t('Seleziona un Paese', 'Select a country')); ?>">
      <div class="dash-country-grid">
        <?php foreach ($DASH_DATA['countries'] as $country): ?>
          <a class="dash-nation-card" href="<?php echo dash_h(dash_url($DASH_BASE . '/countries/' . $country['slug'] . '/index.php')); ?>">
            <img class="dash-nation-flag" src="<?php echo dash_h($country['flag_path']); ?>" alt="" loading="lazy" decoding="async">
            <h2><?php echo dash_h(dash_name($country)); ?></h2>
          </a>
        <?php endforeach; ?>
      </div>
    </section>
  </main>
<?php require __DIR__ . '/shared/page-bottom.php'; ?>
