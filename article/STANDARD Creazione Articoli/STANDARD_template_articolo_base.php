<?php
/**
 * TEMPLATE BASE ARTICOLO TAXpedia
 * Uso previsto:
 * 1) Copia questo file in `article/italia/` oppure `article/europe/`
 * 2) Rinominalo con slug minuscolo + underscore (es: nuovo_articolo.php)
 * 3) Compila i testi IT/EN nel dizionario qui sotto
 * 4) Aggiungi una entry in `article/article_data.php` per pubblicare la card
 *
 * Nota: il require con ../../ e' corretto quando il file si trova in
 * article/italia/ oppure article/europe/.
 */
require_once __DIR__ . '/../../i18n/i18n.php';

$TPL_LANG = function_exists('tp_lang') ? tp_lang() : 'it';

$TPL_I18N = array(
  'it' => array(
    'meta_title' => 'Titolo articolo - TAXpedia',
    'meta_desc' => 'Breve descrizione IT dell articolo.',
    'h2' => 'Titolo articolo',
    'updated' => 'Ultimo aggiornamento: 06 marzo 2026',
    'p1' => 'Primo paragrafo in italiano.',
    'p2' => 'Secondo paragrafo in italiano.',
    'img_src' => 'imm/italia-flag.jpg',
    'img_alt' => 'Descrizione immagine in italiano',
    'sources_label' => 'Fonti:',
    'sources_detail' => 'Fonte 1; Fonte 2.',
  ),
  'en' => array(
    'meta_title' => 'Article title - TAXpedia',
    'meta_desc' => 'Short EN description of the article.',
    'h2' => 'Article title',
    'updated' => 'Last updated: March 06, 2026',
    'p1' => 'First paragraph in English.',
    'p2' => 'Second paragraph in English.',
    'img_src' => 'imm/italia-flag.jpg',
    'img_alt' => 'Image description in English',
    'sources_label' => 'Sources:',
    'sources_detail' => 'Source 1; Source 2.',
  ),
);

if (!function_exists('tpl_t')) {
  function tpl_t($key) {
    global $TPL_LANG, $TPL_I18N;
    $lang = isset($TPL_I18N[$TPL_LANG]) ? $TPL_LANG : 'it';
    if (isset($TPL_I18N[$lang][$key])) return $TPL_I18N[$lang][$key];
    if (isset($TPL_I18N['it'][$key])) return $TPL_I18N['it'][$key];
    return '';
  }
}

if (!function_exists('tpl_e')) {
  function tpl_e($key) {
    return htmlspecialchars(tpl_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($TPL_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo tpl_e('meta_title'); ?></title>
  <meta name="description" content="<?php echo tpl_e('meta_desc'); ?>"/>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title" align="center"><?php echo tpl_e('h2'); ?></h2>
      <p align="center"><small><?php echo tpl_e('updated'); ?></small></p>

      <p><?php echo tpl_e('p1'); ?></p>
      <p><?php echo tpl_e('p2'); ?></p>

      <figure style="margin:1.25rem 0;">
        <img
          src="<?php echo tpl_e('img_src'); ?>"
          alt="<?php echo tpl_e('img_alt'); ?>"
          style="display:block; width:100%; height:auto;"
          loading="lazy"
        >
      </figure>
    </section>

    <p align="center"><?php echo tpl_e('sources_label'); ?><br><?php echo tpl_e('sources_detail'); ?></p>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
