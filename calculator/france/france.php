<?php

if (!function_exists('itlp_get_lang')) {
  function itlp_get_lang() {
    $lang = 'it';
    if (isset($_GET['lang'])) {
      $lang = strtolower(trim((string) $_GET['lang']));
    } elseif (isset($_COOKIE['tp_lang'])) {
      $lang = strtolower(trim((string) $_COOKIE['tp_lang']));
    }
    return in_array($lang, array('it','en'), true) ? $lang : 'it';
  }
}
$ITLP_LANG = itlp_get_lang();

if (!function_exists('itlp_h')) {
  function itlp_h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}

$ITLP_I18N = array(
  // =========================
  // IT
  // =========================
  'it' => array(
    'title' => "Come spende la Francia le tasse dei cittadini? — TAXpedia",
    'meta_desc' => "Inserisci il tuo reddito e scopri come lo Stato utilizza i tuoi contributi.",

    'h1' => "Come spende la Francia le tasse dei cittadini?",
    'subtitle' => "Inserisci il tuo reddito e scopri come lo Stato utilizza i tuoi contributi.",

    'label_income' => "Reddito lordo (€)",
    'income_ph' => "es. 43.356 (reddito medio in Francia)",
    'income_aria' => "Inserisci il tuo reddito lordo in euro",
    'btn_calc' => "Calcola",
    'btn_calc_aria' => "Calcola la ripartizione delle tasse",

    'help_pre' => "Consulta il ",
    'help_link' => "disclaimer",
    'help_post' => " per maggiori informazioni.",
    'help_link_aria' => "Apri il disclaimer in una nuova finestra",

    'results_h2_pre' => "Hai versato circa ",
    'results_h2_post' => " in tasse",
    'results_note' => "Tocca i singoli settori per leggere gli approfondimenti.",

    'box_it_title' => "Spesa statale",
    'box_it_amount' => "Tasse statali stimate:",
    'legend_it_aria' => "Dettaglio (Francia)",
    'legend_title' => "Settore — Importo ",
    'legend_subtle_it' => "(Francia)",
    'legend_note' => "Clicca per aprire il dettaglio. Hover per evidenziare la fetta.",
    'chart_it_aria' => "Grafico ripartizione Francia",
    'explain_it' => "Tocca sul grafico per i dettagli.",
    'comparison_btn' => "Confronta i dati con altri paesi europei",

    'box_eu_title' => "Spesa europea",
    'box_eu_desc' => "Distribuzione del contributo francese al bilancio dell'Unione Europea.",
    'legend_eu_aria' => "Dettaglio (UE)",
    'legend_subtle_eu' => "(UE)",
    'chart_eu_aria' => "Grafico contributo bilancio UE",
    'explain_eu' => "Tocca sul grafico per i dettagli.",
    'sources' => "Fonti",
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => "How does France spend its citizens' taxes? — TAXpedia",
    'meta_desc' => "Enter your income and see how the State allocates your contributions.",

    'h1' => "How does France spend taxpayers’ money?",
    'subtitle' => "Enter your income and see how the State allocates your contributions.",

    'label_income' => "Gross income (€)",
    'income_ph' => "e.g. 43.356 (average income in France)",
    'income_aria' => "Enter your gross income in euros",
    'btn_calc' => "Calculate",
    'btn_calc_aria' => "Calculate the tax allocation breakdown",

    'help_pre' => "See the ",
    'help_link' => "disclaimer",
    'help_post' => " for more information.",
    'help_link_aria' => "Open the disclaimer in a new window",

    'results_h2_pre' => "You have paid approximately ",
    'results_h2_post' => " in taxes",
    'results_note' => "Tap individual sectors to read the detailed notes.",

    'box_it_title' => "National expenditure",
    'box_it_amount' => "Estimated national taxes:",
    'legend_it_aria' => "Breakdown (France)",
    'legend_title' => "Sector — Amount ",
    'legend_subtle_it' => "(France)",
    'legend_note' => "Click to open details. Hover to highlight the slice.",
    'chart_it_aria' => "France allocation chart",
    'explain_it' => "Tap the chart for details.",
    'comparison_btn' => "Compare data with other European countries",

    'box_eu_title' => "European expenditure",
    'box_eu_desc' => "Allocation of France’s contribution to the European Union budget.",
    'legend_eu_aria' => "Breakdown (EU)",
    'legend_subtle_eu' => "(EU)",
    'chart_eu_aria' => "EU contribution chart",
    'explain_eu' => "Tap the chart for details.",
    'sources' => "Sources",
  ),
);

if (!function_exists('itlp_t')) {
  function itlp_t($key) {
    global $ITLP_LANG, $ITLP_I18N;
    if (isset($ITLP_I18N[$ITLP_LANG][$key])) return $ITLP_I18N[$ITLP_LANG][$key];
    if (isset($ITLP_I18N['it'][$key])) return $ITLP_I18N['it'][$key];
    return '';
  }
}

if (!function_exists('itlp_e')) {
  function itlp_e($key) {
    return itlp_h(itlp_t($key));
  }
};
?>

<!doctype html>
<html lang="<?php echo itlp_h($ITLP_LANG); ?>">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?php echo itlp_e('title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png" />
  <meta name="description" content="<?php echo itlp_e('meta_desc'); ?>" />

  <!-- Font identici alla home -->
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet" />

  <!-- Stili: prima global (home), poi specifici calcolatrice -->
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="../CalculatorStyle.css" />

  <!-- Chart.js + logica calcolatrice -->
  <script defer src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
  <script defer src="calculatorFrancia.js"></script>
</head>
<body>
  <!-- ===================== HEADER (identico alla home) ===================== -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <!-- ===================== CONTENUTO CALCOLATRICE ===================== -->
  <main class="container" id="main">
    <h1 class="page-title"><?php echo itlp_e('h1'); ?></h1>
    <p class="subtitle"><?php echo itlp_e('subtitle'); ?></p>

    <form id="calc-form" class="calc-form" novalidate>
      <label class="label" for="reddito"><?php echo itlp_e('label_income'); ?></label>
      <div class="input-row">
        <input id="reddito" type="text" inputmode="numeric" placeholder="<?php echo itlp_e('income_ph'); ?>" required aria-label="<?php echo itlp_e('income_aria'); ?>" />
        <button id="btn-calcola" type="submit" class="btn btn-primary" aria-label="<?php echo itlp_e('btn_calc_aria'); ?>"><?php echo itlp_e('btn_calc'); ?></button>
      </div>
      <p class="help">
        <?php echo itlp_e('help_pre'); ?>
        <a
          class="foot-plain-link"
          href="/aboutus/disclaimer.php"
          target="_blank"
          rel="noopener noreferrer"
          aria-label="<?php echo itlp_e('help_link_aria'); ?>"
        ><?php echo itlp_e('help_link'); ?></a><?php echo itlp_e('help_post'); ?>
      </p>
    </form>

    <div id="risultati" class="results" hidden aria-live="polite" aria-atomic="true">
      <h2 class="results-head"><?php echo itlp_e('results_h2_pre'); ?><span id="totaleTasse" class="totale"></span><?php echo itlp_e('results_h2_post'); ?></h2>
      <p class="results-head"><small><?php echo itlp_e('results_note'); ?></small></p>

      <!-- BOX FRANCE -->
      <section class="box">
        <h2 class="box-title" id="titolo-italia"><?php echo itlp_e('box_it_title'); ?></h2>
        <div class="box-grid">
          <aside id="legend-italia" class="legend-col" aria-label="<?php echo itlp_e('legend_it_aria'); ?>">
            <div class="legend-header">
              <h3 class="legend-title"><?php echo itlp_e('legend_title'); ?><span class="legend-subtle"><?php echo itlp_e('legend_subtle_it'); ?></span></h3>
              <p class="legend-note"><?php echo itlp_e('legend_note'); ?></p>
            </div>
          </aside>

          <div class="chart-col">
            <div class="canvas-wrap">
              <canvas id="graficoItalia" role="img" aria-label="<?php echo itlp_e('chart_it_aria'); ?>" width="300" height="380"></canvas>
              <div id="explanation-it" class="explanation"><?php echo itlp_e('explain_it'); ?></div>
            </div>
          </div>
        </div>
      </section>

      <div class="cta-row" style="text-align: center;">
        <a class="btn btn-primary" href="/tools/comparison.php?a=FR"><?php echo itlp_e('comparison_btn'); ?></a>
      </div><br>

      <!-- BOX UE -->
      <section class="box">
        <h2 class="box-title" id="titolo-ue"><?php echo itlp_e('box_eu_title'); ?></h2>
        <p class="region-amount"><?php echo itlp_e('box_eu_desc'); ?></p>
        <div class="box-grid">
          <aside id="legend-ue" class="legend-col" aria-label="<?php echo itlp_e('legend_eu_aria'); ?>">
            <div class="legend-header">
              <h3 class="legend-title">
                <?php echo itlp_e('legend_title'); ?>
                <span class="legend-subtle"><?php echo itlp_e('legend_subtle_eu'); ?></span>
              </h3>
            </div>
          </aside>

          <div class="chart-col">
            <div class="canvas-wrap">
              <canvas id="graficoUE" role="img" aria-label="<?php echo itlp_e('chart_eu_aria'); ?>" width="300" height="380"></canvas>
              <div id="explanation-ue" class="explanation"><?php echo itlp_e('explain_eu'); ?></div>
            </div>
          </div>
        </div>
      </section>
      <section class="box" style="text-align: left;">
      <h2 class="box-title" id="fonti"><?php echo itlp_e('sources'); ?></h2>
      <ul>
        <li>Le budget de l’État voté pour 2025 – Chiffres clés</li>
      </ul>
      </section>
    </div>
  </main>

  <!-- ===================== FOOTER (identico alla home) ===================== -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <!-- Statcounter code for https://www.taxpedia.eu/ -->
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
