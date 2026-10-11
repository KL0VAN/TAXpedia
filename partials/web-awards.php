<?php
require_once __DIR__ . '/../i18n/i18n.php';

$wa_is_en = (tp_lang() === 'en');

$wa_t = static function (string $it, string $en) use ($wa_is_en): string {
  return $wa_is_en ? $en : $it;
};

$wa_h = static function (string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};

$wa_vote_url = 'https://eurid.eu/en/about-eurid/eu-web-awards/#peoples-choice';
?>

<section class="web-awards-banner" aria-labelledby="web-awards-title">
  <div class="container web-awards-banner__inner">
    <div class="web-awards-banner__brand">
      <img
        class="web-awards-banner__logo"
        src="/imm/eu-web-awards-finalist-2026.png"
        width="2048"
        height="515"
        alt="<?php echo $wa_h($wa_t('.eu Web Awards — Finalista 2026', '.eu Web Awards — 2026 Finalist')); ?>"
        loading="lazy"
        decoding="async">
    </div>

    <div class="web-awards-banner__copy">
      <p class="web-awards-banner__eyebrow">People&rsquo;s Choice 2026</p>
      <h2 class="web-awards-banner__title" id="web-awards-title">
        <?php echo $wa_h($wa_t('TAXpedia è finalista!', 'TAXpedia is a finalist!')); ?>
      </h2>
      <p class="web-awards-banner__text">
        <?php echo $wa_h($wa_t(
          'Siamo tra i cinque progetti selezionati nella categoria People’s Choice. Aiutaci a portare l’educazione economica europea sul podio.',
          'We are among the five projects selected in the People’s Choice category. Help us put European economic education on the podium.'
        )); ?>
      </p>
    </div>

    <div class="web-awards-banner__actions">
      <a
        class="web-awards-banner__button"
        href="<?php echo $wa_h($wa_vote_url); ?>"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="<?php echo $wa_h($wa_t('Vota TAXpedia sul sito ufficiale EURid (si apre in una nuova scheda)', 'Vote for TAXpedia on the official EURid website (opens in a new tab)')); ?>">
        <?php echo $wa_h($wa_t('Vota TAXpedia', 'Vote for TAXpedia')); ?>
        <span aria-hidden="true">&rarr;</span>
      </a>
      <p class="web-awards-banner__deadline">
        <?php echo $wa_h($wa_t('Votazioni aperte fino al 31 ottobre', 'Voting is open until 31 October')); ?>
      </p>
    </div>
  </div>
</section>
