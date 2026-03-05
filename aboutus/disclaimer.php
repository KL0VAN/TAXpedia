<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (aboutus/disclaimer.php)
 * - NON usa bootstrap/globale
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */

if (!isset($DSC_SUPPORTED)) $DSC_SUPPORTED = array('it', 'en');

$DSC_LANG = 'it';
if (isset($_GET['lang'])) {
  $DSC_LANG = strtolower(trim((string) $_GET['lang']));
} elseif (isset($_COOKIE['tp_lang'])) {
  $DSC_LANG = strtolower(trim((string) $_COOKIE['tp_lang']));
}
if (!in_array($DSC_LANG, $DSC_SUPPORTED, true)) $DSC_LANG = 'it';

$DSC_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title' => 'Disclaimer — TAXpedia',
    'h2'         => 'Disclaimer',

    'h3_calc'    => 'Il Calcolatore',
    'p_calc'     => 'Il calcolo delle imposte è una stima indicativa basata sulle aliquote e sugli scaglioni di reddito inseriti in TAXpedia. Per semplicità non vengono considerati, a titolo esemplificativo: detrazioni, deduzioni, crediti d’imposta, bonus, agevolazioni, rimborsi, addizionali locali o altre variabili personali e normative che possono incidere sul risultato finale. Di conseguenza, l’importo mostrato può differire da quello effettivamente dovuto in sede di dichiarazione o liquidazione.',

    'h3_data'    => 'Dati, fonti e metodologia',
    'p_data'     => 'Le spese totali e le percentuali per settore possono risultare diverse da quelle riportate da altre fonti (anche giornalistiche) per motivi quali:',
    'li_1'       => 'aggiornamenti diversi (anni di riferimento non coincidenti o release successive);',
    'li_2'       => 'metriche differenti (spesa in rapporto al PIL vs spesa in rapporto alle entrate dello Stato);',
    'li_3'       => 'criteri di classificazione dei capitoli di spesa differenti da quelli adottati da TAXpedia.',
    'p_final'    => 'Le percentuali sono elaborate dal nostro team a partire da dati ufficiali, con possibili arrotondamenti e riclassificazioni. In alcuni casi, per effetto di aggregazioni, arrotondamenti o riclassificazioni, la somma dei valori potrebbe non coincidere perfettamente con i totali.',
    
    'h3_agg'     => 'Aggiornamento dei dati',
    'p_agg'      => 'Per garantire la massima attualità possibile utilizziamo i dati dell’ultimo consuntivo disponibile. Questo può non coincidere con le previsioni contenute nelle manovre di bilancio o con successive variazioni intervenute dopo la pubblicazione del consuntivo.',

    'h3_info'    => 'Uso delle informazioni e responsabilità',
    'p_info'     => 'I contenuti e i risultati mostrati su TAXpedia hanno finalità informative ed educative e non costituiscono consulenza fiscale, legale o contabile. Pur impegnandoci per accuratezza e chiarezza, non garantiamo l’assenza di errori, omissioni o aggiornamenti mancanti. L’uso delle informazioni avviene sotto la responsabilità dell’utente.',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title' => 'Disclaimer — TAXpedia',
    'h2'         => 'Disclaimer',

    'h3_calc'    => 'The calculator',
    'p_calc'     => 'The tax calculation is an indicative estimate based on the tax rates and income brackets entered in TAXpedia. For simplicity\'s sake, it does not take into account, for example, deductions, tax credits, bonuses, incentives, refunds, local surcharges, or other personal and regulatory variables that could affect the final result. As a result, the amount shown may differ from the amount actually due upon tax return or settlement.',

    'h3_data'    => 'Data, sources and methodology',
    'p_data'     => 'Total expenses and percentages by sector may differ from those reported by other sources (including journalistic sources) for reasons such as:',
    'li_1'       => 'different updates (non-coinciding reference years or subsequent releases);',
    'li_2'       => 'different metrics (spending as a percentage of GDP vs spending as a percentage of government revenue);',
    'li_3'       => 'classification criteria for expenditure chapters different from those adopted by TAXpedia.',
    'p_final'    => 'Percentages are calculated by our team based on official data, subject to rounding and reclassification. In some cases, due to aggregations, rounding, or reclassifications, the sum of the values ​​may not exactly match the totals.',

    'h3_agg'     => 'Data update',
    'p_agg'      => 'To ensure maximum up-to-dateness, we use data from the latest available financial statements. This may differ from the forecasts contained in the budget measures or from subsequent changes that occurred after the financial statements were published.',

    'h3_info'    => 'Use of information and responsibilities',
    'p_info'     => 'The content and results displayed on TAXpedia are for informational and educational purposes only and do not constitute tax, legal, or accounting advice. While we strive for accuracy and clarity, we do not guarantee the absence of errors, omissions, or missing updates. Use of the information is at the user\'s own risk.',
  ),
);

if (!function_exists('dsc_t')) {
  function dsc_t($key) {
    global $DSC_LANG, $DSC_I18N;

    $lang = isset($DSC_LANG) ? $DSC_LANG : 'it';
    $dict = isset($DSC_I18N) ? $DSC_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('dsc_e')) {
  function dsc_e($key) {
    return htmlspecialchars(dsc_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($DSC_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo dsc_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css"  />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
      <div class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2><?php echo dsc_e('h2'); ?></h2>
      <h3><?php echo dsc_e('h3_calc'); ?></h3>
      <p><?php echo dsc_e('p_calc'); ?></p>
      <h3><?php echo dsc_e('h3_data'); ?></h3>
      <p><?php echo dsc_e('p_data'); ?></p>
      <ul>
        <li><?php echo dsc_e('li_1'); ?></li>
        <li><?php echo dsc_e('li_2'); ?></li>
        <li><?php echo dsc_e('li_3'); ?></li>
      </ul>
      <p><?php echo dsc_t('p_final'); ?></p>
      <h3><?php echo dsc_t('h3_agg'); ?></h3>
      <p><?php echo dsc_t('p_agg'); ?></p>
      <h3><?php echo dsc_t('h3_info'); ?></h3>
      <p><?php echo dsc_t('p_info'); ?></p>
      </div>
  </main>
  <!-- ===================== FOOTER ===================== -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
