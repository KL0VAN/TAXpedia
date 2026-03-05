<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa sezione (new-article.php)
 * - NON usa bootstrap
 * - Legge lingua da cookie tp_lang (e opzionalmente da ?lang=)
 * - Funzioni con nome dedicato + anti-redeclare
 */

if (!isset($NA_SUPPORTED)) $NA_SUPPORTED = array('it', 'en');

$NA_LANG = 'it';
if (isset($_GET['lang'])) {
  $NA_LANG = strtolower(trim((string)$_GET['lang']));
} elseif (isset($_COOKIE['tp_lang'])) {
  $NA_LANG = strtolower(trim((string)$_COOKIE['tp_lang']));
}
if (!in_array($NA_LANG, $NA_SUPPORTED, true)) $NA_LANG = 'it';

$NA_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'posts_title' => 'I nostri articoli',
    'posts_sub'   => 'Approfondimenti chiari e verificati su tasse, spesa pubblica e bilancio dello Stato.',

    'tag_news' => 'Novità',
    'gloss_title' => 'Il nuovo Glossario',
    'gloss_excerpt' => 'Qualche termine non ti è chiaro? Consulta il nostro glossario, brevi definizioni dei termini più tecnici',
    'gloss_aria' => "Leggi l'approfondimento",
    'gloss_btn'  => 'Apri →',

    'tag_article' => 'Articolo',
    'bridge_title' => 'Quanto costa il Ponte sullo Stretto?',
    'bridge_excerpt' => 'Analisi tecnica del costo del progetto.',
    'bridge_aria' => 'Leggi l’articolo sul Ponte sullo Stretto',
    'bridge_btn'  => 'Apri →',

    'tag_calc' => 'Calcolatore',
    'fr_title' => 'Da cosa è composta la spesa pubblica francese?',
    'fr_excerpt' => 'Inserisci un reddito lordo, vedi il conteggio delle tasse e la ripartizione.',
    'fr_aria' => 'Vai al calcolatore',
    'fr_btn'  => 'Apri →',

    'all_articles' => 'Tutti gli articoli',
  ),


  // =========================
  // EN
  // =========================
  'en' => array(
    'posts_title' => 'Our articles',
    'posts_sub'   => 'Clear, verified insights on taxes, public spending, and the State budget.',

    'tag_news' => 'News',
    'gloss_title' => 'The new Glossary',
    'gloss_excerpt' => 'Not sure about a term? Check our glossary: short definitions of the most technical terms.',
    'gloss_aria' => 'Read the article',
    'gloss_btn'  => 'Open →',

    'tag_article' => 'Article',
    'bridge_title' => 'How much does the Messina Bridge cost?',
    'bridge_excerpt' => 'Technical analysis of the project cost.',
    'bridge_aria' => 'Read the Messina Bridge article',
    'bridge_btn'  => 'Open →',

    'tag_calc' => 'Calculator',
    'fr_title' => 'What makes up French public spending?',
    'fr_excerpt' => 'Enter a gross income, see the tax calculation and the breakdown.',
    'fr_aria' => 'Go to the calculator',
    'fr_btn'  => 'Open →',

    'all_articles' => 'All articles',
  ),
);

if (!function_exists('na_t')) {
  function na_t($key) {
    global $NA_I18N, $NA_LANG;

    if (isset($NA_I18N[$NA_LANG]) && isset($NA_I18N[$NA_LANG][$key])) {
      return $NA_I18N[$NA_LANG][$key];
    }
    if (isset($NA_I18N['it']) && isset($NA_I18N['it'][$key])) {
      return $NA_I18N['it'][$key];
    }
    return '';
  }
}

if (!function_exists('na_e')) {
  function na_e($key) {
    return htmlspecialchars(na_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>

<section class="posts" aria-labelledby="posts-title">
  <div class="container">
    <div class="section-head">
      <h2 id="posts-title"><?php echo na_e('posts_title'); ?></h2>
      <p class="section-sub">
        <?php echo na_e('posts_sub'); ?>
      </p>
    </div>

    <div class="posts-grid">
      
      <a class="post-card post-card-link" href="/article/italia/infrastrutture/ponte.php" aria-label="Apri: Quanto costa il Ponte sullo Stretto?">
        <div class="post-thumb" style="--thumb:url('italia/imm/ponte.png')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-tag"><?php echo na_e('tag_article'); ?></p>
              <time class="post-date" datetime="2025-01-01">19/12/2025</time>
            </div>
            <h3 class="post-title"><?php echo na_e('bridge_title'); ?></h3>
            <p class="post-excerpt"><p class="post-excerpt"><?php echo na_e('bridge_excerpt'); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo na_e('bridge_btn'); ?></span>
        </div>
      </a>

      <a class="post-card post-card-link" href="/calculator/france/france.php" aria-label="Apri: Da cosa è composta la spesa pubblica francese?">
          <div class="post-thumb" style="--thumb:url('france/imm/french-flag.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-tag"><?php echo na_e('tag_calc'); ?></p>
              <time class="post-date" datetime="2025-01-01">15/12/2025</time>
            </div>
            <h3 class="post-title"><?php echo na_e('fr_title'); ?></h3>
            <p class="post-excerpt"><?php echo na_e('fr_excerpt'); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo na_e('fr_btn'); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link" href="/glossary/glossario.php" aria-label="Apri: Il nuovo Glossario">
          <div class="post-thumb" style="--thumb:url('italia/imm/glossario.png')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-tag"><?php echo na_e('tag_news'); ?></p>
              <time class="post-date" datetime="2025-01-01">09/12/2025</time>
            </div>
            <h3 class="post-title"><?php echo na_e('gloss_title'); ?></h3>
            <p class="post-excerpt"><?php echo na_e('gloss_excerpt'); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo na_e('gloss_btn'); ?></span>
          </div>
        </a>
    </div>

    <div class="cta-center" style="margin-top:1.25rem">
      <!-- FIX: path assoluto per non “perdere cartelle” se incluso da altre pagine -->
      <a class="btn btn-outline" href="/article/articoli.php"><?php echo na_e('all_articles'); ?></a>
    </div>
  </div>
</section>
