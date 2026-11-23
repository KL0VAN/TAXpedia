<?php
declare(strict_types=1);
require_once __DIR__ . '/../i18n/i18n.php';

$euProfileLanguage = tp_lang();
$euProfileText = static function (string $it, string $en) use ($euProfileLanguage): string {
  return $euProfileLanguage === 'en' ? $en : $it;
};
$euProfileHtml = static function (string $value): string {
  return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
};
?>
    <section class="dash-eu-preview" aria-labelledby="eu-profile-title">
      <div class="dash-eu-preview-mark">
        <img src="/imm/flags/eu-flag.png" width="275" height="183" alt="<?php echo $euProfileHtml($euProfileText('Bandiera dell’Unione europea', 'European Union flag')); ?>" decoding="async">
      </div>
      <div>
        <h2 id="eu-profile-title"><?php echo $euProfileHtml($euProfileText('Scheda Europa', 'European Profile')); ?></h2>
        <p><?php echo $euProfileHtml($euProfileText('Una panoramica dedicata all’Unione europea è in preparazione. Questa sezione raccoglierà contenuti introduttivi, confronti tra i 27 Stati membri e informazioni sul contesto economico e di finanza pubblica europea.', 'A dedicated European Union overview is in preparation. This section will gather introductory content, comparisons between the 27 member states, and information about the broader European economic and public-finance context.')); ?></p>
        <p class="dash-eu-preview-status"><?php echo $euProfileHtml($euProfileText('Contenuto in preparazione', 'Content in preparation')); ?></p>
      </div>
    </section>
