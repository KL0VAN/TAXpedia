<?php
require_once __DIR__ . '/../i18n/i18n.php';

$wa_is_en = (tp_lang() === 'en');

$wa_t = static function (string $it, string $en) use ($wa_is_en): string {
  return $wa_is_en ? $en : $it;
};

$wa_h = static function (string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};

$wa_results_url = 'https://www.eurid.eu/en/news/meet-the-2026-eu-web-awards-winners/';
?>

<section class="about-page-section awards-recognition" aria-labelledby="awards-title">
  <header class="awards-recognition__head">
    <h2 id="awards-title"><?php echo $wa_h($wa_t('Riconoscimenti', 'Awards & Recognition')); ?></h2>
  </header>

  <div class="awards-recognition__grid">
    <div class="awards-recognition__artwork">
      <img
        src="/imm/eu-web-awards-finalist-2026.png"
        width="2048"
        height="515"
        alt="<?php echo $wa_h($wa_t('Logo ufficiale .eu Web Awards — Finalista 2026', 'Official .eu Web Awards — 2026 Finalist logo')); ?>"
        loading="lazy"
        decoding="async">
    </div>

    <div class="awards-recognition__copy">
      <h3><?php echo $wa_h($wa_t('TAXpedia agli .eu Web Awards 2026', 'TAXpedia at the 2026 .eu Web Awards')); ?></h3>
      <p>
        <?php echo $wa_h($wa_t(
          'TAXpedia è stata selezionata tra i cinque finalisti della categoria People’s Choice degli .eu Web Awards 2026, organizzati da EURid.',
          'TAXpedia was selected among the five finalists in the People’s Choice category of the 2026 .eu Web Awards, organised by EURid.'
        )); ?>
      </p>
      <p class="awards-recognition__team-result">
        <?php echo $wa_h($wa_t(
          'Il team riporta un secondo posto nella categoria People’s Choice.',
          'The team reports a second-place finish in the People’s Choice category.'
        )); ?>
      </p>

      <a
        class="awards-recognition__link"
        href="<?php echo $wa_h($wa_results_url); ?>"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="<?php echo $wa_h($wa_t('Leggi i risultati ufficiali di EURid (si apre in una nuova scheda)', 'Read EURid’s official results (opens in a new tab)')); ?>">
        <?php echo $wa_h($wa_t('Leggi i risultati ufficiali di EURid', 'Read EURid’s official results')); ?>
        <span aria-hidden="true">&rarr;</span>
      </a>
    </div>
  </div>
</section>
