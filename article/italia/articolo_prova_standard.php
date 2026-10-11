<?php
require_once __DIR__ . '/../../i18n/i18n.php';

$TPS_LANG = function_exists('tp_lang') ? tp_lang() : 'it';

$TPS_I18N = array(
  'it' => array(
    'meta_title' => 'Articolo di prova standard - TAXpedia',
    'meta_desc' => 'Articolo di prova creato con il template standard TAXpedia.',
    'h2' => 'Articolo di prova standard',
    'updated' => 'Ultimo aggiornamento: 06 marzo 2026',
    'p1' => 'Questo articolo e stato creato usando il template standard unico per verificare che il flusso sia replicabile.',
    'p2' => 'La struttura include lingua it/en, header/footer, meta base e immagine con percorso coerente.',
    'img_src' => 'imm/italia-flag.jpg',
    'img_alt' => 'Bandiera italiana usata come immagine di prova',
    'sources_label' => 'Fonti:',
    'sources_detail' => 'Template standard TAXpedia; verifica interna progetto.',
  ),
  'en' => array(
    'meta_title' => 'Standard test article - TAXpedia',
    'meta_desc' => 'Test article created with the TAXpedia standard template.',
    'h2' => 'Standard test article',
    'updated' => 'Last updated: March 06, 2026',
    'p1' => 'This article was created using the single standard template to verify that the workflow is repeatable.',
    'p2' => 'The structure includes it/en language support, header/footer, base meta tags and a consistent image path.',
    'img_src' => 'imm/italia-flag.jpg',
    'img_alt' => 'Italian flag used as test image',
    'sources_label' => 'Sources:',
    'sources_detail' => 'TAXpedia standard template; internal project validation.',
  ),
);

if (!function_exists('tps_t')) {
  function tps_t($key) {
    global $TPS_LANG, $TPS_I18N;
    $lang = isset($TPS_I18N[$TPS_LANG]) ? $TPS_LANG : 'it';
    if (isset($TPS_I18N[$lang][$key])) return $TPS_I18N[$lang][$key];
    if (isset($TPS_I18N['it'][$key])) return $TPS_I18N['it'][$key];
    return '';
  }
}

if (!function_exists('tps_e')) {
  function tps_e($key) {
    return htmlspecialchars(tps_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($TPS_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo tps_e('meta_title'); ?></title>
  <meta name="description" content="<?php echo tps_e('meta_desc'); ?>"/>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo tps_e('h2'); ?></h2>
      <p align="center"><small><?php echo tps_e('updated'); ?></small></p>

      <p><?php echo tps_e('p1'); ?></p>
      <p><?php echo tps_e('p2'); ?></p>

      <figure style="margin:1.25rem 0;">
        <img
          src="<?php echo tps_e('img_src'); ?>"
          alt="<?php echo tps_e('img_alt'); ?>"
          style="display:block; width:100%; height:auto;"
          loading="lazy"
        >
      </figure>
    </section>

    <p align="center"><?php echo tps_e('sources_label'); ?><br><?php echo tps_e('sources_detail'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
