<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (aboutus/privacy.php)
 * - NON usa bootstrap/globale
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */

if (!isset($PRV_SUPPORTED)) $PRV_SUPPORTED = array('it', 'en');

$PRV_LANG = 'it';
if (isset($_GET['lang'])) {
  $PRV_LANG = strtolower(trim((string) $_GET['lang']));
} elseif (isset($_COOKIE['tp_lang'])) {
  $PRV_LANG = strtolower(trim((string) $_COOKIE['tp_lang']));
}
if (!in_array($PRV_LANG, $PRV_SUPPORTED, true)) $PRV_LANG = 'it';

$PRV_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title' => 'Privacy Policy — TAXpedia',

    'h2'      => 'Privacy & Cookie Policy',
    'updated' => 'Ultimo aggiornamento: 26/11/2025',
    'intro'   => 'Benvenuto su Taxpedia.eu, un sito di informazione economica e fiscale. Questa pagina descrive come trattiamo i dati personali degli utenti e come utilizziamo i cookie.',

    'h3_1' => '1. Dati personali raccolti',
    'p1'   => <<<'HTML'
Raccogliamo e trattiamo i seguenti dati personali:<br/>
        - Dati di navigazione: indirizzo IP, browser utilizzato, pagine visitate, tempo di permanenza, ecc. (in forma anonima o aggregata).<br/>
        - Cookie tecnici: necessari al funzionamento del sito e alla memorizzazione delle preferenze (es. consenso cookie).<br/>
        - Dati forniti volontariamente dall’utente: email o informazioni inviate tramite contatti diretti.
HTML
    ,

    'h3_2' => '2. Finalità del trattamento',
    'p2'   => <<<'HTML'
I dati vengono trattati per:<br/>
        - Consentire il corretto funzionamento del sito.<br/>
        - Migliorare l’esperienza utente.<br/>
        - Raccogliere statistiche anonime sul traffico e sulle visite tramite servizi come Statcounter.<br/>
        - Rispondere a eventuali richieste inviate dagli utenti.
HTML
    ,

    'h3_3' => '3. Titolare del trattamento',
    'p3'   => <<<'HTML'
Il titolare del trattamento è:<br/>
        TAXpedia<br/>
        Email: team@taxpedia.eu
HTML
    ,

    'h3_4' => '4. Base giuridica',
    'p4'   => 'La base giuridica del trattamento per i cookie analitici è il consenso dell’utente, fornito tramite il banner cookie al primo accesso.',

    'h3_5' => '5. Cookie Policy',
    'p5'   => <<<'HTML'
<strong>Cookie Policy:</strong><br/>
        <strong>Cosa sono i cookie?</strong><br/>
        I cookie sono piccoli file di testo che i siti web inviano al dispositivo dell’utente per migliorare la navigazione, analizzare il traffico e memorizzare preferenze.<br/><br/>
        <strong>Tipologie di cookie utilizzate su questo sito:</strong><br/>
        - <strong>Tecnici Necessari:</strong> Questi cookie sono indispensabili per il corretto funzionamento del sito (es. salvataggio consenso cookie).<br/>
        - <strong>Analitici (Statcounter):</strong> Utilizziamo Statcounter in modalità anonima per raccogliere statistiche aggregate su visite e traffico.<br/>
        - <strong>Non utilizziamo cookie di profilazione o pubblicità.</strong><br/><br/>
        <strong>Gestione dei cookie:</strong><br/>
        L’utente può gestire o revocare il consenso all’uso dei cookie non tecnici in qualsiasi momento attraverso:<br/>
        - Il banner al primo accesso<br/>
        - Le impostazioni del browser<br/>
        - Le impostazioni del tuo dispositivo<br/><br/>
        Puoi anche eliminare manualmente i cookie già installati.
HTML
    ,

    'h3_6' => '6. Servizi di terze parti e link esterni',
    'p6'   => <<<'HTML'
Statcounter: utilizzato in modalità anonima per statistiche aggregate. I dati possono essere trasferiti negli Stati Uniti nel rispetto delle Clausole Contrattuali Standard di Statcounter.<br/><br/>
        Link esterni a Instagram, LinkedIn e Threads: il sito contiene collegamenti a profili social. L’interazione con questi link può comportare l’uso di cookie da parte di tali piattaforme.<br/><br/>
        Instagram: <a href="https://privacycenter.instagram.com/" title="Privacy Policy">Privacy Policy</a><br/><br/>
        LinkedIn: <a href="https://www.linkedin.com/legal/privacy-policy" title="Privacy Policy">Privacy Policy</a>
HTML
    ,

    'h3_7' => '7. Trasferimento dati fuori dall’UE',
    'p7'   => 'I dati vengono trattati principalmente all’interno dell’Unione Europea. Tuttavia, alcuni servizi come Statcounter possono trasferire dati in paesi extra-UE (es. Stati Uniti). Tali trasferimenti avvengono in conformità alle normative GDPR tramite Clausole Contrattuali Standard.',

    'h3_8' => '8. Conservazione dei dati',
    'p8'   => 'I dati vengono conservati per il tempo necessario a raggiungere le finalità sopra descritte. I dati statistici raccolti tramite cookie analitici sono conservati in forma anonima.',

    'h3_9' => '9. Modifiche alla presente policy',
    'p9'   => 'Ci riserviamo il diritto di modificare questa Privacy & Cookie Policy in qualsiasi momento. Le modifiche verranno pubblicate su questa pagina con data di aggiornamento.',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title' => 'Privacy Policy — TAXpedia',

    'h2'      => 'Privacy & Cookie Policy',
    'updated' => 'Last updated: 26/11/2025',
    'intro'   => 'Welcome to Taxpedia.eu, an economics and tax information website. This page explains how we process users’ personal data and how we use cookies.',

    'h3_1' => '1. Personal data collected',
    'p1'   => <<<'HTML'
We collect and process the following personal data:<br/>
        - Browsing data: IP address, browser used, pages visited, time spent, etc. (in anonymous or aggregated form).<br/>
        - Technical cookies: necessary for the site to function and to store preferences (e.g., cookie consent).<br/>
        - Data voluntarily provided by the user: email address or information sent via direct contact.
HTML
    ,

    'h3_2' => '2. Purposes of processing',
    'p2'   => <<<'HTML'
Data are processed to:<br/>
        - Ensure the website works correctly.<br/>
        - Improve the user experience.<br/>
        - Collect anonymous traffic and visit statistics via services such as Statcounter.<br/>
        - Reply to any requests sent by users.
HTML
    ,

    'h3_3' => '3. Data controller',
    'p3'   => <<<'HTML'
The data controller is:<br/>
        TAXpedia<br/>
        Email: team@taxpedia.eu
HTML
    ,

    'h3_4' => '4. Legal basis',
    'p4'   => 'The legal basis for processing analytics cookies is the user’s consent, provided through the cookie banner on first access.',

    'h3_5' => '5. Cookie Policy',
    'p5'   => <<<'HTML'
<strong>Cookie Policy:</strong><br/>
        <strong>What are cookies?</strong><br/>
        Cookies are small text files that websites send to the user’s device to improve browsing, analyze traffic, and store preferences.<br/><br/>
        <strong>Types of cookies used on this website:</strong><br/>
        - <strong>Necessary technical cookies:</strong> These cookies are essential for the proper functioning of the website (e.g., storing cookie consent).<br/>
        - <strong>Analytics (Statcounter):</strong> We use Statcounter in anonymous mode to collect aggregated statistics on visits and traffic.<br/>
        - <strong>We do not use profiling or advertising cookies.</strong><br/><br/>
        <strong>Managing cookies:</strong><br/>
        Users can manage or withdraw consent for non-technical cookies at any time through:<br/>
        - The banner on first access<br/>
        - Browser settings<br/>
        - Your device settings<br/><br/>
        You can also manually delete cookies already stored.
HTML
    ,

    'h3_6' => '6. Third-party services and external links',
    'p6'   => <<<'HTML'
Statcounter: used in anonymous mode for aggregated statistics. Data may be transferred to the United States in accordance with Statcounter’s Standard Contractual Clauses.<br/><br/>
        External links to Instagram, LinkedIn and Threads: the website contains links to social profiles. Interaction with these links may involve the use of cookies by those platforms.<br/><br/>
        Instagram: <a href="https://privacycenter.instagram.com/" title="Privacy Policy">Privacy Policy</a><br/><br/>
        LinkedIn: <a href="https://www.linkedin.com/legal/privacy-policy" title="Privacy Policy">Privacy Policy</a>
HTML
    ,

    'h3_7' => '7. Data transfers outside the EU',
    'p7'   => 'Data are processed mainly within the European Union. However, some services such as Statcounter may transfer data to non-EU countries (e.g., the United States). Such transfers take place in compliance with the GDPR through Standard Contractual Clauses.',

    'h3_8' => '8. Data retention',
    'p8'   => 'Data are kept for the time necessary to achieve the purposes described above. Statistics collected via analytics cookies are retained in anonymous form.',

    'h3_9' => '9. Changes to this policy',
    'p9'   => 'We reserve the right to change this Privacy & Cookie Policy at any time. Changes will be published on this page with an updated date.',
  ),
);

if (!function_exists('prv_t')) {
  function prv_t($key) {
    global $PRV_LANG, $PRV_I18N;

    $lang = isset($PRV_LANG) ? $PRV_LANG : 'it';
    $dict = isset($PRV_I18N) ? $PRV_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('prv_e')) {
  function prv_e($key) {
    return htmlspecialchars(prv_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($PRV_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo prv_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css"  />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
  <div class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2><?php echo prv_e('h2'); ?></h2>
      <p><small><?php echo prv_e('updated'); ?></small></p>

      <p><?php echo prv_e('intro'); ?></p>

      <h3><?php echo prv_e('h3_1'); ?></h3>
      <p><?php echo prv_t('p1'); ?></p>

      <h3><?php echo prv_e('h3_2'); ?></h3>
      <p><?php echo prv_t('p2'); ?></p>

      <h3><?php echo prv_e('h3_3'); ?></h3>
      <p><?php echo prv_t('p3'); ?></p>

      <h3><?php echo prv_e('h3_4'); ?></h3>
      <p><?php echo prv_e('p4'); ?></p>

      <h3><?php echo prv_e('h3_5'); ?></h3>
      <p><?php echo prv_t('p5'); ?></p>

      <h3><?php echo prv_e('h3_6'); ?></h3>
      <p><?php echo prv_t('p6'); ?></p>
      Threads: <a href="https://help.instagram.com/515230437301944" title="Privacy Policy">Privacy Policy</a></p>

      <h3><?php echo prv_e('h3_7'); ?></h3>
      <p><?php echo prv_e('p7'); ?></p>

      <h3><?php echo prv_e('h3_8'); ?></h3>
      <p><?php echo prv_e('p8'); ?></p>

      <h3><?php echo prv_e('h3_9'); ?></h3>
      <p><?php echo prv_e('p9'); ?></p>
  </div>
  </main>
  <!-- ===================== FOOTER ===================== -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
</body>
</html>
