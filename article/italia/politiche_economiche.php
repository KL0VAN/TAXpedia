<?php
require_once __DIR__ . '/../../i18n/i18n.php';
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (politiche_economiche.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Dizionario IT/EN locale
 * - Funzioni con prefisso dedicato + anti-redeclare
 */

$ECO_LANG = function_exists('tp_lang') ? tp_lang() : 'it';

$ECO_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'    => 'Politiche economiche — TAXpedia',
    'h2'            => 'Politiche economiche',

    'p1'            => 'La spesa italiana per le politiche economiche nel 2025 è di circa 191,9 mld di euro, pari al 20,9% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare le attività di numerosi Ministeri fra cui quelli che hanno un maggiore portafoglio in merito sono il Ministero dell’Economia e delle Finanze e il Ministero delle Imprese e del Made in Italy.',
    'p2'            => 'In dettaglio, la Legge di Bilancio per il 2025 prevede per il Ministero dell’Economia e delle Finanze una spesa di circa 156,1 mld di euro allocati prevalentemente per la Missione 7 e il Programma 1.4 del bilancio del Ministero. Questi fondi sono stati adibiti per il sostegno di numerose imprese in diversi settori mediante aiuti sia a livello fiscale sia a livello di incentivi volti allo sviluppo e all’espansione delle imprese. Nel Programma 2.4 inoltre si fa riferimento a incentivi e aiuti rilasciati anche al pubblico privato, come ad esempio il bonus per le bollette di gas e energia che riguarda le famiglie in difficoltà. Anche il Ministero delle Imprese e del Made in Italy rilascia numerosi incentivi rivolti alla promozione e aiuti di imprese proprio per cercare di rilanciare il Made in Italy. Come detto in precedenza vi sono altri numerosi Ministeri che partecipano alle spese di questo settore e questi fondi sono riservati a politiche volte sempre allo sviluppo del mercato italiano su diversi fronti.',
    'p3'            => 'La spesa per le politiche economiche comprende diverse voci, tra cui:',

    'li1_lbl'       => 'Personale:',
    'li1_desc'      => 'stipendi e retribuzioni per personale vario impegnato nei diversi programmi relativi ai Ministeri.',
    'li2_lbl'       => 'Incentivi riservati ai privati e al mondo del retail:',
    'li2_desc'      => 'gran parte dei fondi di questo settore sono spesi per finanziare numerose imprese e per aiutare le famiglie in difficoltà.',
    'li3_lbl'       => 'Programma Made in Italy:',
    'li3_desc'      => 'rilancio dell’artigianato e del fabbricato in Italia per rilanciare il paese.',

    'img_alt'       => 'Ripartizione spesa politiche economiche',
    'figcaption'    => 'Ripartizione della spesa per le politiche economiche nel 2025.',

    'p4'            => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa destinata a diminuire per quanto riguarda questo settore.',

    'sources_label' => 'Fonti:',
    'src1'          => 'Bilancio preventivo del Ministero dell\'agricoltura, della sovranità alimentare e delle foreste 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero del Lavoro e delle Politiche Sociali 2025-2027',
    'src3'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src4'          => 'Bilancio preventivo del Ministero delgli Affari Esteri 2025-2027',
    'src5'          => 'Bilancio preventivo del Ministero del Made in Italy 2025-2027',
    'src6'          => 'Bilancio preventivo del Ministero del Turismo 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'    => 'Economic Policies (Politiche economiche) — TAXpedia',
    'h2'            => 'Economic Policies (Politiche economiche)',

    'p1'            => 'Italian expenditure on economic policies in 2025 amounts to approximately €191.9 billion, corresponding to about 20.9% of total public expenditure. These resources are allocated to finance the activities of several Ministries, among which the most significant in terms of financial volume are the Ministry of Economy and Finance and the Ministry of Enterprises and Made in Italy.',
    'p2'            => 'Specifically, the 2025 Budget Law provides for expenditure of approximately €156.1 billion under the Ministry of Economy and Finance, mainly allocated to Mission 7 and Programme 1.4 of the Ministry’s budget. These funds are used to support a large number of enterprises across different sectors through both tax relief measures and incentives aimed at business development and expansion. Programme 2.4 also includes incentives and financial support granted to households and the private sector, such as subsidies for gas and electricity bills targeting families in economic difficulty. The Ministry of Enterprises and Made in Italy also provides a wide range of incentives aimed at promoting and supporting businesses, with the objective of revitalising and strengthening the Made in Italy industrial and productive system. As mentioned above, several other Ministries contribute to expenditure in this sector, with resources allocated to policies consistently aimed at fostering the development of the Italian market across multiple areas.',
    'p3'            => 'Expenditure on economic policies includes several components, such as:',

    'li1_lbl'       => 'Personnel:',
    'li1_desc'      => 'salaries and remuneration for staff involved in the various ministerial programmes.',
    'li2_lbl'       => 'Incentives for private entities and the retail sector:',
    'li2_desc'      => 'a substantial share of these funds is used to finance businesses and to support households facing economic hardship.',
    'li3_lbl'       => 'Made in Italy programme:',
    'li3_desc'      => 'initiatives aimed at revitalising craftsmanship and domestic manufacturing in order to strengthen the national economy.',

    'img_alt'       => 'Economic policies spending breakdown',
    'figcaption'    => 'Economic policies expenditure breakdown in 2025.',

    'p4'            => 'Overall, based on the 2025–2027 budgets of the relevant Ministries, expenditure in this sector is expected to decline.',

    'sources_label' => 'Sources:',
    'src1'          => 'Bilancio preventivo del Ministero dell\'agricoltura, della sovranità alimentare e delle foreste 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero del Lavoro e delle Politiche Sociali 2025-2027',
    'src3'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src4'          => 'Bilancio preventivo del Ministero delgli Affari Esteri 2025-2027',
    'src5'          => 'Bilancio preventivo del Ministero del Made in Italy 2025-2027',
    'src6'          => 'Bilancio preventivo del Ministero del Turismo 2025-2027',
  ),
);

if (!function_exists('eco_t')) {
  function eco_t($key) {
    global $ECO_LANG, $ECO_I18N;

    $lang = isset($ECO_LANG) ? $ECO_LANG : 'it';
    $dict = isset($ECO_I18N) ? $ECO_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('eco_e')) {
  function eco_e($key) {
    return htmlspecialchars(eco_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($ECO_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo eco_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo eco_e('h2'); ?></h2>

      <p><?php echo eco_e('p1'); ?></br>
      </br><?php echo eco_e('p2'); ?></br>
      </br><?php echo eco_e('p3'); ?></br></p>

      <ul>
        <li><strong><?php echo eco_e('li1_lbl'); ?></strong> <?php echo eco_e('li1_desc'); ?></li>
        <li><strong><?php echo eco_e('li2_lbl'); ?></strong> <?php echo eco_e('li2_desc'); ?></li>
        <li><strong><?php echo eco_e('li3_lbl'); ?></strong> <?php echo eco_e('li3_desc'); ?></li>
      </ul>

      <figure>
        <img src="imm/politiche_economiche.png"
          alt="<?php echo eco_e('img_alt'); ?>" align="center"
          width="100%" height="auto" loading="lazy" >
        <figcaption><small><?php echo eco_e('figcaption'); ?></small></figcaption>
      </figure>

      <p></br><?php echo eco_e('p4'); ?></p>
    </section>

    <p align="center"><?php echo eco_e('sources_label'); ?> <br><?php echo eco_e('src1'); ?></p>
    <p align="center"><?php echo eco_e('src2'); ?></p>
    <p align="center"><?php echo eco_e('src3'); ?></p>
    <p align="center"><?php echo eco_e('src4'); ?></p>
    <p align="center"><?php echo eco_e('src5'); ?></p>
    <p align="center"><?php echo eco_e('src6'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
