<?php
/**
 * i18n LOCALE (IT/EN) - solo per questa pagina (calculator/menu.php)
 * - Usa il bootstrap i18n globale per risolvere lingua e fallback
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */
require_once __DIR__ . '/../i18n/i18n.php';

$TPM_LANG = tp_lang();
$TPM_I18N = array(
  'it' => array(
    'meta_title'   => 'Menu Calcolatori per Nazione - TAXpedia',
    'h1'           => 'Calcolatori per Nazione',
    'sub'          => 'Scegli un calcolatore nazionale e scopri come si divide la spesa pubblica nei diversi paesi europei. Nuovi paesi presto in arrivo.',
    'aria_select'  => 'Seleziona un calcolatore nazionale',
    'btn_conf'     => 'Confronta diversi paesi Europei',

    'it_name'      => 'Italia',
    'fr_name'      => 'Francia',
    'de_name'      => 'Germania',
    'es_name'      => 'Spagna',
    'be_name'      => 'Belgio',
    'nl_name'      => 'Olanda',
    'lu_name'      => 'Lussemburgo',
    'at_name'      => 'Austria',
    'hr_name'      => 'Croazia',
    'pl_name'      => 'Polonia',
    'pt_name'      => 'Portogallo',
    'si_name'      => 'Slovenia',
    'bg_name'      => 'Bulgaria',
    'dk_name'      => 'Danimarca',
    'gr_name'      => 'Grecia',
    'hu_name'      => 'Ungheria',
    'ie_name'      => 'Irlanda',
    'cz_name'      => 'Cechia',
    'ro_name'      => 'Romania',
    'se_name'      => 'Svezia',
    'lv_name'      => 'Lettonia',
    'ee_name'      => 'Estonia',
    'lt_name'      => 'Lituania',
    'sk_name'      => 'Slovacchia',
    'fi_name'      => 'Finlandia',
    'cy_name'      => 'Cipro',
    'mt_name'      => 'Malta',

    'foot'         => 'Calcolatore spesa pubblica ',
    'coming'       => 'Presto disponibile',
    'work_progress' => 'Lavori in corso',
  ),

  'en' => array(
    'meta_title'   => 'Country Calculators Menu - TAXpedia',
    'h1'           => 'Calculators by country',
    'sub'          => 'Choose a national calculator and see how public spending is divided across European countries. New countries coming soon.',
    'aria_select'  => 'Select a national calculator',
    'btn_conf'     => 'Compare different European countries',

    'it_name'      => 'Italy',
    'fr_name'      => 'France',
    'de_name'      => 'Germany',
    'es_name'      => 'Spain',
    'be_name'      => 'Belgium',
    'nl_name'      => 'Netherlands',
    'lu_name'      => 'Luxembourg',
    'at_name'      => 'Austria',
    'hr_name'      => 'Croatia',
    'pl_name'      => 'Poland',
    'pt_name'      => 'Portugal',
    'si_name'      => 'Slovenia',
    'bg_name'      => 'Bulgaria',
    'dk_name'      => 'Denmark',
    'gr_name'      => 'Greece',
    'hu_name'      => 'Hungary',
    'ie_name'      => 'Ireland',
    'cz_name'      => 'Czechia',
    'ro_name'      => 'Romania',
    'se_name'      => 'Sweden',
    'lv_name'      => 'Latvia',
    'ee_name'      => 'Estonia',
    'lt_name'      => 'Lithuania',
    'sk_name'      => 'Slovakia',
    'fi_name'      => 'Finland',
    'cy_name'      => 'Cyprus',
    'mt_name'      => 'Malta',

    'foot'         => 'Public spending calculator',
    'coming'       => 'Soon available',
    'work_progress' => 'Work in progress',
  ),
);

if (!function_exists('tpm_t')) {
  function tpm_t($key) {
    global $TPM_LANG, $TPM_I18N;

    $lang = isset($TPM_LANG) ? $TPM_LANG : 'it';
    $dict = isset($TPM_I18N) ? $TPM_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('tpm_e')) {
  function tpm_e($key) {
    return htmlspecialchars(tpm_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($TPM_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo tpm_e('meta_title'); ?></title>

  <link rel="icon" href="/imm/logoT.png" type="image/png" />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/styleIndex.css">
  <!-- IMPORTANTE: percorso assoluto + cache busting (Aruba spesso cache aggressiva) -->
  <link rel="stylesheet" href="/calculator/NazioniStyle.css?v=20260208">
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="countries-head">
      <h1 class="countries-title" style="text-align:center"><?php echo tpm_e('h1'); ?></h1>
      <p class="countries-sub"><?php echo tpm_e('sub'); ?></p>
    </section>

    <div class="cta-row" style="text-align: center;">
      <a class="btn btn-primary" href="/tools/comparison.php"><?php echo tpm_e('btn_conf'); ?></a>
    </div>
    <br>

    <section aria-label="<?php echo tpm_e('aria_select'); ?>">
      <div class="country-grid">

        <!-- Italia -->
        <a href="/calculator/italia/italia.php" class="nation-card">
          <span class="nation-flag flag-italy" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('it_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Francia -->
        <a href="/calculator/france/france.php" class="nation-card">
          <span class="nation-flag flag-france" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('fr_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Germania -->
        <a href="/calculator/germany/germany.php" class="nation-card">
          <span class="nation-flag flag-germany" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('de_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Spagna -->
        <a href="/calculator/spain/spain.php" class="nation-card">
          <span class="nation-flag flag-spain" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('es_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Belgio -->
        <a href="/calculator/belgium/belgium.php" class="nation-card">
          <span class="nation-flag flag-belgium" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('be_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Olanda -->
        <a href="/calculator/netherlands/netherlands.php" class="nation-card">
          <span class="nation-flag flag-netherlands" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('nl_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Lussemburgo -->
        <a href="/calculator/luxembourg/luxembourg.php" class="nation-card">
          <span class="nation-flag flag-luxembourg" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('lu_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Austria -->
        <a href="/calculator/austria/austria.php" class="nation-card">
          <span class="nation-flag flag-austria" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('at_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Croazia -->
        <a href="/calculator/croatia/croatia.php" class="nation-card">
          <span class="nation-flag flag-croatia" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('hr_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Polonia -->
        <a href="/calculator/poland/poland.php" class="nation-card">
          <span class="nation-flag flag-poland" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('pl_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Portogallo -->
        <a href="/calculator/portugal/portugal.php" class="nation-card">
          <span class="nation-flag flag-portugal" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('pt_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Slovenia -->
        <a href="/calculator/slovenia/slovenia.php" class="nation-card">
          <span class="nation-flag flag-slovenia" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('si_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Bulgaria -->
        <a href="/calculator/bulgaria/bulgaria.php" class="nation-card">
          <span class="nation-flag flag-bulgaria" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('bg_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Cechia -->
        <a href="/calculator/czech/czech.php" class="nation-card">
          <span class="nation-flag flag-czech" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('cz_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Danimarca -->
        <a href="/calculator/denmark/denmark.php" class="nation-card">
          <span class="nation-flag flag-denmark" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('dk_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Grecia -->
        <a href="/calculator/greece/greece.php" class="nation-card">
          <span class="nation-flag flag-greece" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('gr_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Ungheria -->
        <a href="/calculator/hungary/hungary.php" class="nation-card">
          <span class="nation-flag flag-hungary" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('hu_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Irlanda -->
        <a href="/calculator/ireland/ireland.php" class="nation-card">
          <span class="nation-flag flag-ireland" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('ie_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Romania -->
        <a href="/calculator/romania/romania.php" class="nation-card">
          <span class="nation-flag flag-romania" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('ro_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Svezia -->
        <a href="/calculator/sweden/sweden.php" class="nation-card">
          <span class="nation-flag flag-sweden" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('se_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('foot'); ?></div>
        </a>

        <!-- Lettonia (lavori in corso) -->
        <div class="nation-card is-soon" aria-disabled="true">
          <span class="nation-flag flag-latvia" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('lv_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('work_progress'); ?></div>
        </div>

        <!-- Estonia (lavori in corso) -->
        <div class="nation-card is-soon" aria-disabled="true">
          <span class="nation-flag flag-estonia" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('ee_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('work_progress'); ?></div>
        </div>

        <!-- Lituania (lavori in corso) -->
        <div class="nation-card is-soon" aria-disabled="true">
          <span class="nation-flag flag-lithuania" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('lt_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('work_progress'); ?></div>
        </div>

        <!-- Slovacchia (lavori in corso) -->
        <div class="nation-card is-soon" aria-disabled="true">
          <span class="nation-flag flag-slovakia" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('sk_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('work_progress'); ?></div>
        </div>

        <!-- Finlandia (lavori in corso) -->
        <div class="nation-card is-soon" aria-disabled="true">
          <span class="nation-flag flag-finland" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('fi_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('work_progress'); ?></div>
        </div>

        <!-- Cipro (lavori in corso) -->
        <div class="nation-card is-soon" aria-disabled="true">
          <span class="nation-flag flag-cyprus" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('cy_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('work_progress'); ?></div>
        </div>

        <!-- Malta (lavori in corso) -->
        <div class="nation-card is-soon" aria-disabled="true">
          <span class="nation-flag flag-malta" aria-hidden="true"></span>
          <div class="nation-header">
            <h3 class="nation-name"><?php echo tpm_e('mt_name'); ?></h3>
          </div>
          <div class="nation-foot"><?php echo tpm_e('work_progress'); ?></div>
        </div>

      </div>
    </section>

    <br>
    <div class="cta-row" style="text-align: center;">
      <a class="btn btn-primary" href="/tools/comparison.php"><?php echo tpm_e('btn_conf'); ?></a>
    </div>
  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <!-- IMPORTANTE: percorso assoluto + cache busting -->
  <script src="/calculator/NazioniController.js?v=20260208"></script>
</body>
</html>

