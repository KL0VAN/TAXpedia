<?php
require_once __DIR__ . '/../../i18n/i18n.php';
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (difesa.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Dizionario IT/EN locale
 * - Funzioni con prefisso dedicato + anti-redeclare
 */

$DIF_LANG = function_exists('tp_lang') ? tp_lang() : 'it';

$DIF_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'    => 'Difesa — TAXpedia',
    'h2'            => 'Difesa',

    'p1'            => 'La spesa italiana per la difesa nel 2025 è di circa 32,7 mld di euro, pari al 3,4% circa della spesa pubblica complessiva. Questa cifra è destinata a finanziare le attività del Ministero della Difesa, tra cui le missioni militari internazionali e tutte le spese volte alla gestione e alle attività dell’Arma dei Carabinieri.',
    'p2'            => 'In dettaglio, la Legge di Bilancio per il 2025 prevede per il Ministero della Difesa una spesa di circa 31,3 mld di euro, spesi prevalentemente per la Missione 1 del Ministero della Difesa, che prevede la maggior parte delle spese relative alle diverse attività promosse dall’ Arma dei Carabinieri e a tutte le iniziative promosse dall’Esercito Italiano, l\'Aeronautica e la Marina Militare.',
    'p3'            => 'Per quanto riguarda la restante parte del budget, essa è gestita dal Ministero delle Finanze per un totale di circa 1,4 mld di euro, che vengono prevalentemente spesi nella Missione 4 del bilancio, volte alle missioni militari internazionali.',
    'p4'            => 'La spesa per la difesa comprende diverse voci, tra cui:',

    'li1_lbl'       => 'Personale:',
    'li1_desc'      => 'stipendi e retribuzioni per personale vario.',
    'li2_lbl'       => 'Formazione e addestramento:',
    'li2_desc'      => 'fondi adibiti alla formazione e addestramento del personale in tutti i campi trattati in precedenza.',
    'li3_lbl'       => 'Ricerca e innovazione:',
    'li3_desc'      => 'fondi adibiti alla ricerca e alla continua innovazione in questo campo.',

    'img_alt'       => 'Ripartizione spesa difesa',
    'figcaption'    => 'Ripartizione della spesa per la difesa nel 2025.',

    'p5'            => 'In generale in base ai bilanci dei vari Ministeri relativi al triennio 2025-2027 si prevede una spesa costante per quanto riguarda questo settore, senza significativi cambiamenti.',

    'sources_label' => 'Fonti:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero della Difesa 2025-2027',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'    => 'Defence (Difesa) — TAXpedia',
    'h2'            => 'Defence (Difesa)',

    'p1'            => 'Italian defence expenditure in 2025 amounts to approximately €32.7 billion, representing around 3.4% of total public expenditure. These resources finance the activities of the Ministry of Defence, including international military missions and all expenditure related to the management and operations of the Carabinieri Corps.',
    'p2'            => 'Specifically, the 2025 Budget Law allocates approximately €31.3 billion to the Ministry of Defence, mainly under Mission 1, which covers the majority of expenditures related to the activities of the Carabinieri and all initiatives promoted by the Italian Army, Air Force, and Navy.',
    'p3'            => 'The remaining share of the budget, amounting to approximately €1.4 billion, is managed by the Ministry of Economy and Finance, primarily under Mission 4, and is allocated to international military missions.',
    'p4'            => 'Defence expenditure includes several components, such as:',

    'li1_lbl'       => 'Personnel:',
    'li1_desc'      => 'salaries and remuneration for military and civilian staff.',
    'li2_lbl'       => 'Training and education:',
    'li2_desc'      => 'resources allocated to the training and professional development of personnel.',
    'li3_lbl'       => 'Research and innovation:',
    'li3_desc'      => 'funds dedicated to research and continuous technological innovation in the defence sector.',

    'img_alt'       => 'Defence spending breakdown',
    'figcaption'    => 'Defence expenditure breakdown in 2025.',

    'p5'            => 'Overall, based on the 2025–2027 budget forecasts, expenditure in this sector is expected to remain stable, with no significant changes.',

    'sources_label' => 'Sources:',
    'src1'          => 'Bilancio preventivo del Ministero dell’Economia e della Finanza 2025-2027',
    'src2'          => 'Bilancio preventivo del Ministero della Difesa 2025-2027',
  ),
);

if (!function_exists('dif_t')) {
  function dif_t($key) {
    global $DIF_LANG, $DIF_I18N;

    $lang = isset($DIF_LANG) ? $DIF_LANG : 'it';
    $dict = isset($DIF_I18N) ? $DIF_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('dif_e')) {
  function dif_e($key) {
    return htmlspecialchars(dif_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($DIF_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo dif_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo dif_e('h2'); ?></h2>

      <p><?php echo dif_e('p1'); ?></br>
      </br><?php echo dif_e('p2'); ?></br>
      </br><?php echo dif_e('p3'); ?></br>
      </br><?php echo dif_e('p4'); ?></br></p>

      <ul>
        <li><strong><?php echo dif_e('li1_lbl'); ?></strong> <?php echo dif_e('li1_desc'); ?></li>
        <li><strong><?php echo dif_e('li2_lbl'); ?></strong> <?php echo dif_e('li2_desc'); ?></li>
        <li><strong><?php echo dif_e('li3_lbl'); ?></strong> <?php echo dif_e('li3_desc'); ?></li>
      </ul>

      <figure>
        <img src="imm/difesa.png"
        alt="<?php echo dif_e('img_alt'); ?>" align="center"
        width="100%" height="auto" loading="lazy" >
        <figcaption><small><?php echo dif_e('figcaption'); ?></small></figcaption>
      </figure>

      <p></br><?php echo dif_e('p5'); ?></p>
    </section>

    <p align="center"><?php echo dif_e('sources_label'); ?> <br><?php echo dif_e('src1'); ?></p>
    <p align="center"><?php echo dif_e('src2'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
