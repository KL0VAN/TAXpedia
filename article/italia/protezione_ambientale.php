<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (protezione_ambientale.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Dizionario IT/EN locale
 * - Funzioni con prefisso dedicato + anti-redeclare
 */

if (!isset($ENV_SUPPORTED)) $ENV_SUPPORTED = array('it', 'en');

$ENV_LANG = 'it';
if (isset($_GET['lang'])) {
  $ENV_LANG = strtolower(trim((string) $_GET['lang']));
} elseif (isset($_COOKIE['tp_lang'])) {
  $ENV_LANG = strtolower(trim((string) $_COOKIE['tp_lang']));
}
if (!in_array($ENV_LANG, $ENV_SUPPORTED, true)) $ENV_LANG = 'it';

$ENV_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'    => 'Protezione ambientale — TAXpedia',
    'h2'            => 'Protezione ambientale',

    'p1'            => 'La spesa italiana per la protezione ambientale nel 2025 è di circa 21,6 mld di euro, pari al 2,4% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare le attività del Ministero dell’Agricoltura, della Sovranità alimentare e delle Foreste e del Ministero dell’Ambiente e della Sicurezza Energetica, tra cui spese per la promozione e il superamento degli squilibri socio-economici territoriali, spese per i finanziamenti contratti dall’Ilva, incentivi per iniziative volte alla diffusione del settore agricolo fra i giovani, spese per la protezione del territorio e la salvaguardia delle risorse ambientali ed infine spese relative alla salvaguardia del territorio per la produzione energetica.',
    'p2'            => 'In dettaglio, la Legge di Bilancio per il 2025 prevede per il Ministero dell’Agricoltura, della Sovranità alimentare e delle Foreste una spesa di circa 1 mld di euro, volta a politiche europee per lo sviluppo rurale prevalentemente trattate nel programma 1.1 del Ministero. Un’altra spesa importante è sicuramente affidata al Ministero dell’Ambiente e della Sicurezza Energetica pari a circa 3,2 mld di euro che vengono spesi prevalentemente per la salvaguardia dell’ambiente e la ricerca a nuove risorse energetiche, trattate rispettivamente nella Missione 1 e Missione 5 del bilancio del Ministero. Infine vi è la restante spesa di circa 17,4 mld di euro che viene affidata al Ministero dell’Economia e delle Finanze per il riequilibrio di squilibri socio-economico territoriali, trattati nella Missione 20 del Ministero.',
    'p3'            => 'La spesa per la protezione ambientale comprende diverse voci, tra cui:',

    'li1_lbl'       => 'Incentivi e contributi:',
    'li1_desc'      => 'rilasciati principalmente ai giovani per motivarli a intraprendere iniziative e un percorso lavorativo all’interno di questo settore, prevalentemente rilasciati per il settore agricolo.',
    'li2_lbl'       => 'Ricerca e innovazione:',
    'li2_desc'      => 'usati per la ricerca di nuove fonti sostenibile energetiche con lo scopo di generare un minor inquinamento e sfruttamento delle risorse naturali.',
    'li3_lbl'       => 'Personale:',
    'li3_desc'      => 'costi legati agli stipendi del personale adibito alla salvaguardia territoriale.',

    'p4'            => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede un’importante riduzione della spesa in questo campo.',

    'sources_label' => 'Fonti:',
    'src1'          => 'Bilancio preventivo del Ministero dell\'agricoltura, della sovranità alimentare e delle foreste 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero dell\'Ambiente e della Sicurezza Energetica 2025-2027',
    'src3'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'    => 'Environmental Protection (Protezione ambientale) — TAXpedia',
    'h2'            => 'Environmental Protection (Protezione ambientale)',

    'p1'            => 'Italian expenditure on environmental protection in 2025 amounts to approximately €21.6 billion, corresponding to about 2.4% of total public expenditure. These resources are allocated to finance the activities of the Ministry of Agriculture, Food Sovereignty and Forestry and the Ministry of the Environment and Energy Security. This expenditure includes funding aimed at promoting development and addressing territorial socio-economic imbalances, resources allocated to cover liabilities contracted by Ilva, incentives designed to encourage young people to enter the agricultural sector, expenditure related to territorial protection and the safeguarding of environmental resources, and, finally, spending associated with land protection for energy production purposes.',
    'p2'            => 'Specifically, the 2025 Budget Law provides for expenditure of approximately €1 billion under the Ministry of Agriculture, Food Sovereignty and Forestry, mainly allocated to European rural development policies, predominantly covered under Programme 1.1 of the Ministry’s budget. Another significant share of expenditure is allocated to the Ministry of the Environment and Energy Security, amounting to approximately €3.2 billion, which is primarily used for environmental protection and research into new energy resources, addressed respectively under Mission 1 and Mission 5 of the Ministry’s budget. Finally, the remaining expenditure, amounting to approximately €17.4 billion, is managed by the Ministry of Economy and Finance and is aimed at rebalancing territorial socio-economic disparities, addressed under Mission 20 of the Ministry’s budget.',
    'p3'            => 'Expenditure on environmental protection includes several components, such as:',

    'li1_lbl'       => 'Incentives and contributions:',
    'li1_desc'      => 'mainly granted to young people in order to encourage initiatives and professional pathways within this sector, particularly in agriculture.',
    'li2_lbl'       => 'Research and innovation:',
    'li2_desc'      => 'resources allocated to the research and development of new sustainable energy sources, with the aim of reducing pollution and the exploitation of natural resources.',
    'li3_lbl'       => 'Personnel:',
    'li3_desc'      => 'costs related to salaries of staff engaged in territorial and environmental protection activities.',

    'p4'            => 'Overall, based on the 2025–2027 budgets of the various Ministries, a significant reduction in expenditure in this sector is expected.',

    'sources_label' => 'Sources:',
    'src1'          => 'Bilancio preventivo del Ministero dell\'agricoltura, della sovranità alimentare e delle foreste 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero dell\'Ambiente e della Sicurezza Energetica 2025-2027',
    'src3'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
  ),
);

if (!function_exists('env_t')) {
  function env_t($key) {
    global $ENV_LANG, $ENV_I18N;

    $lang = isset($ENV_LANG) ? $ENV_LANG : 'it';
    $dict = isset($ENV_I18N) ? $ENV_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('env_e')) {
  function env_e($key) {
    return htmlspecialchars(env_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($ENV_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo env_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo env_e('h2'); ?></h2>

      <p><?php echo env_e('p1'); ?></br>
      </br><?php echo env_e('p2'); ?></br>
      </br><?php echo env_e('p3'); ?></br></p>

      <ul>
        <li><strong><?php echo env_e('li1_lbl'); ?></strong> <?php echo env_e('li1_desc'); ?></li>
        <li><strong><?php echo env_e('li2_lbl'); ?></strong> <?php echo env_e('li2_desc'); ?></li>
        <li><strong><?php echo env_e('li3_lbl'); ?></strong> <?php echo env_e('li3_desc'); ?></li>
      </ul>

      <p></br><?php echo env_e('p4'); ?></p>
    </section>

    <p align="center"><?php echo env_e('sources_label'); ?> <br><?php echo env_e('src1'); ?></p>
    <p align="center"><?php echo env_e('src2'); ?></p>
    <p align="center"><?php echo env_e('src3'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
