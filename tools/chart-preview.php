<?php
require_once __DIR__ . '/../i18n/i18n.php';
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars(tp_lang(), ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="robots" content="noindex, nofollow" />
  <title>Preview chart moderno | TAXpedia</title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/tools/chart-preview.css" />
</head>
<body class="chart-preview-page">
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="chart-preview-shell" id="main">
    <section class="preview-hero" aria-labelledby="preview-title">
      <div class="preview-hero-copy">
        <span class="preview-kicker">Concept grafici TAXpedia</span>
        <h1 id="preview-title">Ripartizione della spesa pubblica</h1>
        <p>
          Una prova isolata per valutare un donut chart piu moderno: centro informativo,
          tooltip leggibili, legenda compatta e colori stabili per categoria.
        </p>
      </div>

      <div class="preview-summary" aria-label="Scenario demo">
        <span>Scenario demo</span>
        <strong>Italia · reddito 31.856 EUR</strong>
      </div>
    </section>

    <section class="preview-panel" aria-label="Grafico demo">
      <div class="preview-panel-head">
        <div>
          <span class="preview-kicker">ECharts donut</span>
          <h2>Dove vanno le tue tasse</h2>
        </div>
        <div class="preview-total">
          <span>Imposta stimata</span>
          <strong id="previewTotal">8.420 EUR</strong>
        </div>
      </div>

      <div class="preview-chart-grid">
        <aside class="preview-legend" aria-label="Categorie di spesa">
          <div class="legend-title">
            <h3>Settori</h3>
            <span>Importi demo</span>
          </div>
          <div id="previewLegend" class="preview-legend-list"></div>
        </aside>

        <div class="preview-chart-card">
          <div id="previewChart" class="preview-chart" role="img" aria-label="Grafico donut della ripartizione della spesa pubblica"></div>
          <div class="preview-active-card" aria-live="polite">
            <span id="activeLabel">Seleziona un settore</span>
            <strong id="activeValue">Passa sul grafico o sulla legenda</strong>
          </div>
        </div>
      </div>
    </section>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <script defer src="https://cdn.jsdelivr.net/npm/echarts@6.0.0/dist/echarts.min.js"></script>
  <script defer src="/tools/chart-preview.js"></script>
</body>
</html>
