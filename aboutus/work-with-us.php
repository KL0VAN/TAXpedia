<?php
require_once __DIR__ . '/../i18n/i18n.php';

if (!function_exists('ponte_get_lang')) {
  function ponte_get_lang() {
    if (function_exists('tp_lang')) {
      return tp_lang();
    }

    $lang = 'it';
    if (isset($_GET['lang'])) {
      $lang = strtolower(trim((string) $_GET['lang']));
    } elseif (isset($_COOKIE['tp_lang'])) {
      $lang = strtolower(trim((string) $_COOKIE['tp_lang']));
    }
    return in_array($lang, array('it','en'), true) ? $lang : 'it';
  }
}
$PONTE_LANG = ponte_get_lang();

if (!function_exists('ponte_h')) {
  function ponte_h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}

$PONTE_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'title' => 'Collabora con noi - TAXpedia',

    'h2' => 'Collabora con noi',
    'subtitle' => 'Ciao, il team di TAXpedia sta cercando di espandersi, se sei interessato compila il form.',

  ),
  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'Economic growth in Europe is increasingly weaker than in China and the United States: would a more ideologically cohesive Union be enough, or are the causes structural? - TAXpedia',

    'h2' => 'Economic growth in Europe is increasingly weaker than in China and the United States: would a more ideologically cohesive Union be enough, or are the causes structural?',
    'subtitle' => '',
  ),
);

if (!function_exists('ponte_t')) {
  function ponte_t($key) {
    global $PONTE_LANG, $PONTE_I18N;
    if (isset($PONTE_I18N[$PONTE_LANG][$key])) return $PONTE_I18N[$PONTE_LANG][$key];
    if (isset($PONTE_I18N['it'][$key])) return $PONTE_I18N['it'][$key];
    return '';
  }
}
if (!function_exists('ponte_e')) {
  function ponte_e($key) {
    return ponte_h(ponte_t($key));
  }
}
?>
<!doctype html>
<html lang="<?php echo ponte_h($PONTE_LANG); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo ponte_e('title'); ?></title>
  <meta name="description" content="<?php echo ponte_e('meta_desc'); ?>"/>

  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css"/>
  <link rel="stylesheet" href="/style/StyleTesti.css"/>

  <style>
    .work-with-us-card {
      box-sizing: border-box;
      width: 100%;
      min-width: 0;
    }

    .work-with-us-form {
      display: block;
      width: 100%;
      max-width: 100%;
      border: 0;
    }

    @media (max-width: 600px) {
      .work-with-us-card {
        margin-top: 2rem !important;
        margin-bottom: 2rem !important;
      }
    }
  </style>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <article class="feature feature--large work-with-us-card" style="margin:4rem auto; max-width:720px; text-align:left;">

      <header style="margin-bottom:1.25rem;">
        <h2 class="section-title" style="margin-bottom:.35rem;">
          <?php echo ponte_e('h2'); ?>
        </h2>
        <p class="subtitle" style="margin:.25rem 0 0;">
          <?php echo ponte_e('subtitle'); ?>
        </p>
      </header>

      <iframe class="work-with-us-form" src="https://docs.google.com/forms/d/e/1FAIpQLSf1RoNHrx6dev-cI6HnoBOPBgGN_oGLTtmzooGaFRSn1Li1-g/viewform?embedded=true" height="1117" frameborder="0" marginheight="0" marginwidth="0" title="Modulo di candidatura TAXpedia">Caricamento…</iframe>

      <hr style="margin:2rem 0; opacity:.25;">

    </article>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <!-- Default Statcounter code for https://www.taxpedia.eu/ -->
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
