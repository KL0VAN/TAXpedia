<?php
require_once __DIR__ . '/../../i18n/i18n.php';
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (giustizia.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Dizionario IT/EN locale
 * - Funzioni con prefisso dedicato + anti-redeclare
 */

$GIU_LANG = function_exists('tp_lang') ? tp_lang() : 'it';

$GIU_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'    => 'Giustizia — TAXpedia',
    'h2'            => 'Giustizia',

    'p1'            => 'La spesa italiana per la giustizia nel 2025 è di circa 11,8 mld di euro, pari al 1,3% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare numerose attività che vengono attribuite a due Ministeri, quello relativo all’Economia e alle Finanze e quello specificatamente destinato alla Giustizia. In dettaglio, la Legge di Bilancio per il 2025 prevede per il Ministero dell’Economia e della Finanza una spesa di circa 570 mln di euro spesi prevalentemente per la Missione 19, che si occupa di auto governare questo settore. La restante parte, che ammonta a circa 11,2 mld di euro, è gestita dal Ministero della Giustizia nella Missione 1 del bilancio e viene destinata al mantenimento e alla creazione di nuove strutture penitenziarie, alla reintegrazione dei detenuti nel mondo del lavoro e, ovviamente la maggior parte dei fondi viene usato per il funzionamento dell’apparato della giurisdizione civile e penale.',
    'p2'            => 'La spesa per la giustizia comprende diverse voci, tra cui:',

    'li1_lbl'       => 'Personale:',
    'li1_desc'      => 'stipendi e retribuzioni per personale vario, sia inerente l’apparato penitenziario che quello giuridico.',
    'li2_lbl'       => 'Fondi per il settore penitenziario:',
    'li2_desc'      => 'parte dei fondi di questo settore sono adibiti al mantenimento e alla creazione di nuove strutture penitenziarie.',
    'li3_lbl'       => 'Fondi per il settore giuridico:',
    'li3_desc'      => 'maggior parte dei fondi che vengono usati per il funzionamento dell’intero settore relativo alla giustizia.',

    'p3'            => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa costante per quanto riguarda questo settore, senza significativi cambiamenti.',

    'sources_label' => 'Fonti:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero di Grazia e Giustizia 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'    => 'Justice (Giustizia) — TAXpedia',
    'h2'            => 'Justice (Giustizia)',

    'p1'            => 'Italian expenditure on justice in 2025 amounts to approximately €11.8 billion, corresponding to about 1.3% of total public expenditure. These resources are allocated to finance a wide range of activities attributed to two Ministries: the Ministry of Economy and Finance and the Ministry of Justice. Specifically, the 2025 Budget Law provides for expenditure of approximately €570 million under the Ministry of Economy and Finance, mainly allocated to Mission 19, which is responsible for the overall governance of this sector. The remaining share, amounting to approximately €11.2 billion, is managed by the Ministry of Justice under Mission 1 of its budget and is allocated to the maintenance and construction of new penitentiary facilities, the reintegration of detainees into the labour market, and, above all, to the functioning of the civil and criminal judicial system.',
    'p2'            => 'Justice-related expenditure includes several components, such as:',

    'li1_lbl'       => 'Personnel:',
    'li1_desc'      => 'salaries and remuneration for staff employed in both the penitentiary system and the judicial sector.',
    'li2_lbl'       => 'Penitentiary sector funding:',
    'li2_desc'      => 'resources allocated to the maintenance and construction of new prison facilities.',
    'li3_lbl'       => 'Judicial sector funding:',
    'li3_desc'      => 'the largest share of funds, used to ensure the functioning of the justice system as a whole.',

    'p3'            => 'Overall, based on the 2025–2027 budgets of the relevant Ministries, expenditure in this sector is expected to remain stable, with no significant changes.',

    'sources_label' => 'Sources:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero di Grazia e Giustizia 2025-2027',
  ),
);

if (!function_exists('giu_t')) {
  function giu_t($key) {
    global $GIU_LANG, $GIU_I18N;

    $lang = isset($GIU_LANG) ? $GIU_LANG : 'it';
    $dict = isset($GIU_I18N) ? $GIU_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('giu_e')) {
  function giu_e($key) {
    return htmlspecialchars(giu_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($GIU_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo giu_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo giu_e('h2'); ?></h2>

      <p><?php echo giu_e('p1'); ?></br>
      </br><?php echo giu_e('p2'); ?></br></p>

      <ul>
        <li><strong><?php echo giu_e('li1_lbl'); ?></strong> <?php echo giu_e('li1_desc'); ?></li>
        <li><strong><?php echo giu_e('li2_lbl'); ?></strong> <?php echo giu_e('li2_desc'); ?></li>
        <li><strong><?php echo giu_e('li3_lbl'); ?></strong> <?php echo giu_e('li3_desc'); ?></br></li>
      </ul>

      <p></br><?php echo giu_e('p3'); ?></p>
    </section>

    <p align="center"><?php echo giu_e('sources_label'); ?> <br><?php echo giu_e('src1'); ?></p>
    <p align="center"><?php echo giu_e('src2'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
