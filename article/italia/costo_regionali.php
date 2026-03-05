<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (costo_regionali.php)
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Dizionario IT/EN locale
 * - Funzioni con prefisso dedicato + anti-redeclare
 */

if (!isset($CR_SUPPORTED)) $CR_SUPPORTED = array('it', 'en');

$CR_LANG = 'it';
if (isset($_GET['lang'])) {
  $CR_LANG = strtolower(trim((string) $_GET['lang']));
} elseif (isset($_COOKIE['tp_lang'])) {
  $CR_LANG = strtolower(trim((string) $_COOKIE['tp_lang']));
}
if (!in_array($CR_LANG, $CR_SUPPORTED, true)) $CR_LANG = 'it';

$CR_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title'     => 'Quanto costano le elezioni regionali?',

    'h2'             => 'Quanto costa votare?',
    'h3_stima'       => 'Stima dei costi delle elezioni regionali 2025',
    'last_update'    => 'Ultimo aggiornamento: 20 novembre 2025',

    'p_intro'        => 'Le elezioni regionali muovono una “macchina” complessa, solo nel 2025 circa 18 milioni di italiani andranno a votare in più di 20 mila seggi. In questo articolo quantifichiamo quanto costa l’organizzazione della tornata 2025 nelle regioni al voto, distribuendo la spesa in sei voci: personale dei seggi, stampa e materiale, logistica e sicurezza, comunicazione istituzionale, incentivi al voto, informatizzazione e gestione dati.',

    'h3_comp'        => 'Come si compone la spesa elettorale',

    'h4_staff'       => 'Personale dei seggi (circa 37%)',
    'p_staff'        => 'Il personale dei seggi assorbe la quota più rilevante. Per ogni sezione è previsto un Presidente (compenso €150) e scrutatori/segretari (compenso €120 ciascuno). Rientrano nella voce anche gli straordinari del personale comunale e le maggiorazioni connesse ai seggi speciali (ospedali, carceri, domicilio).',

    'h4_log'         => 'Logistica e sicurezza (circa 30%)',
    'p_log'          => 'La spesa riguarda tutto ciò che serve per aprire e tenere operativi i seggi: dall\'allestimento delle cabine e delle urne, al trasporto dei materiali. In questo è compresa anche la vigilanza, la consegna e il ritiro delle schede elettorali e dei verbali.',

    'h4_print'       => 'Stampa e materiale (circa 23%)',
    'p_print'        => 'Comprende la stampa delle schede elettorali e di tutto il materiale cartaceo (registri, verbali, istruzioni), oltre alla produzione dei timbri, uno per ogni sezione, e all’acquisto dei materiali necessari ai seggi.',

    'h4_it'          => 'Informatizzazione e gestione dati (circa 6%)',
    'p_it'           => 'La spesa è composta dal costo dei sistemi informatici per raccogliere, controllare e diffondere i risultati e i dati sull’affluenza. A questa si aggiungono i costi per la sicurezza informatica.',

    'h4_comm'        => 'Comunicazione istituzionale (circa 3%)',
    'p_comm'         => 'Comprende il costo delle campagne informative, avvisi e pagine web dedicate per le informazioni ufficiali ai cittadini su date, orari, documenti necessari, sezioni e servizi.',

    'h4_incent'      => 'Incentivi al voto (circa 1%)',
    'p_incent'       => 'Gli incentivi al voto raccolgono tutte le agevolazioni e i rimborsi per facilitare il voto, tra cui gli sconti su treni, autobus, traghetti o i contributi per rientri dall’estero o da altre regioni.',

    'img_alt'        => 'Ripartizione della spesa elettorale in sei voci',
    'figcaption'     => 'Ripartizione della spesa elettorale per le regionali del 2025.',

    'h3_regions'     => 'Qual è il costo per le singole regioni',
    'p_total'        => 'A quanto ammonta la spesa totale? il costo per questa tornata elettorale si aggira intorno ai 50 milioni di euro, così suddivisi:',

    'li1'            => 'Campania — 14,0 mln €',
    'li2'            => 'Toscana — 11,5 mln €',
    'li3'            => 'Puglia — 9,7 mln €',
    'li4'            => 'Veneto — 9,0 mln €',
    'li5'            => 'Calabria — 7,0 mln €',
    'li6'            => 'Marche — 3,8 mln €',
    'li7'            => 'Valle d’Aosta — 0,36 mln €',

    'p_pays'         => 'E chi paga? Per le elezioni regionali gli oneri ricadono sul bilancio della Regione ma una parte delle spese viene anticipata dai Comuni e rimborsata successivamente.',

    'h3_method'      => 'Come abbiamo calcolato questi dati',
    'p_method'       => 'Le spese totali sono basate su dati ufficiali dove disponibili e su stime per le restanti regioni, calcolate in proporzione al numero di sezioni elettorali. Gli importi sono arrotondati e potrebbero differire dai consuntivi che saranno pubblicati successivamente.',

    'collab'         => 'Articolo realizzato in collaborazione con',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title'     => 'How much do regional elections cost?',

    'h2'             => 'How much does it cost to vote?',
    'h3_stima'       => 'Estimated costs of the 2025 regional elections',
    'last_update'    => 'Last updated: 20 November 2025',

    'p_intro'        => 'Regional elections set in motion a complex “machine”: in 2025 alone, about 18 million Italians will vote at more than 20,000 polling stations. In this article, we quantify the cost of organising the 2025 round of voting in the regions going to the polls, breaking the expenditure down into six categories: polling station staff, printing and materials, logistics and security, institutional communication, voting incentives, digitisation, and data management.',

    'h3_comp'        => 'How election spending is structured',

    'h4_staff'       => 'Polling station staff (approx. 37%)',
    'p_staff'        => 'Polling station staff accounts for the largest share. Each polling station is assigned a President (allowance €150) and scrutineers/secretaries (allowance €120 each). This category also includes overtime for municipal staff and additional payments related to special polling stations (hospitals, prisons, home voting).',

    'h4_log'         => 'Logistics and security (approx. 30%)',
    'p_log'          => 'This covers everything needed to open and keep polling stations operational: from setting up booths and ballot boxes to transporting materials. It also includes surveillance, as well as the delivery and collection of ballot papers and official reports.',

    'h4_print'       => 'Printing and materials (approx. 23%)',
    'p_print'        => 'This includes the printing of ballot papers and all paper materials (registers, reports, instructions), as well as the production of stamps—one for each polling station—and the purchase of the materials needed at the stations.',

    'h4_it'          => 'Digitisation and data management (approx. 6%)',
    'p_it'           => 'This consists of the cost of IT systems used to collect, verify, and disseminate results and turnout data. Added to this are the costs of cybersecurity.',

    'h4_comm'        => 'Institutional communication (approx. 3%)',
    'p_comm'         => 'This covers the cost of information campaigns, notices, and dedicated web pages providing citizens with official information on dates, times, required documents, polling stations, and services.',

    'h4_incent'      => 'Voting incentives (approx. 1%)',
    'p_incent'       => 'Voting incentives include all concessions and reimbursements that make it easier to vote, such as discounts on trains, buses, and ferries, or contributions for returning from abroad or from other regions.',

    'img_alt'        => 'Breakdown of election expenditure across six categories',
    'figcaption'     => 'Breakdown of election expenditure for the 2025 regional elections.',

    'h3_regions'     => 'What is the cost for individual regions?',
    'p_total'        => 'What is the total expenditure? The cost for this electoral round is estimated at around 50 million euros, broken down as follows:',

    'li1'            => 'Campania — €14.0 million',
    'li2'            => 'Tuscany — €11.5 million',
    'li3'            => 'Apulia — €9.7 million',
    'li4'            => 'Veneto — €9.0 million',
    'li5'            => 'Calabria — €7.0 million',
    'li6'            => 'Marche — €3.8 million',
    'li7'            => 'Aosta Valley — €0.36 million',

    'p_pays'         => 'And who pays? For regional elections, the costs fall on the Region’s budget, but a portion of the expenses is advanced by municipalities and reimbursed later.',

    'h3_method'      => 'How we calculated these figures',
    'p_method'       => 'Total expenses are based on official data where available and on estimates for the remaining regions, calculated in proportion to the number of polling stations. Amounts are rounded and may differ from the final outturn figures that will be published later.',

    'collab'         => 'Article produced in collaboration with',
  ),
);

if (!function_exists('cr_t')) {
  function cr_t($key) {
    global $CR_LANG, $CR_I18N;

    $lang = isset($CR_LANG) ? $CR_LANG : 'it';
    $dict = isset($CR_I18N) ? $CR_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('cr_e')) {
  function cr_e($key) {
    return htmlspecialchars(cr_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($CR_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo cr_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css"/>
  <link rel="stylesheet" href="/style/StyleTesti.css"/>
</head>
<body>
  <!-- ===================== HEADER (blu + logo testuale oro) ===================== -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <section class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2 class="section-title"><?php echo cr_e('h2'); ?></h2>
      <h3><?php echo cr_e('h3_stima'); ?></h3>
      <p><small><?php echo cr_e('last_update'); ?></small></p>
      <p><?php echo cr_e('p_intro'); ?></p>
      <h3><?php echo cr_e('h3_comp'); ?></h3>
      <h4><?php echo cr_e('h4_staff'); ?></h4>
      <p><?php echo cr_e('p_staff'); ?></p>
      <h4><?php echo cr_e('h4_log'); ?></h4>
      <p><?php echo cr_e('p_log'); ?></p>
      <h4><?php echo cr_e('h4_print'); ?></h4>
      <p><?php echo cr_e('p_print'); ?></p>
      <h4><?php echo cr_e('h4_it'); ?></h4>
      <p><?php echo cr_e('p_it'); ?></p>
      <h4><?php echo cr_e('h4_comm'); ?></h4>
      <p><?php echo cr_e('p_comm'); ?></p>
      <h4><?php echo cr_e('h4_incent'); ?></h4>
      <p><?php echo cr_e('p_incent'); ?></p>
      <figure class="media">
        <img src="imm/grafico_regionali.png"
          alt="<?php echo cr_e('img_alt'); ?>" align="center"
          width="100%" height="auto" loading="lazy" >
        <figcaption><small><?php echo cr_e('figcaption'); ?></small></figcaption>
      </figure>
      <h3><?php echo cr_e('h3_regions'); ?></h3>
      <p><?php echo cr_e('p_total'); ?></p>
      <ul>
        <li><?php echo cr_e('li1'); ?></li>
        <li><?php echo cr_e('li2'); ?></li>
        <li><?php echo cr_e('li3'); ?></li>
        <li><?php echo cr_e('li4'); ?></li>
        <li><?php echo cr_e('li5'); ?></li>
        <li><?php echo cr_e('li6'); ?></li>
        <li><?php echo cr_e('li7'); ?></li>
      </ul>
      <p><?php echo cr_e('p_pays'); ?></p>
      <h3><?php echo cr_e('h3_method'); ?></h3>
      <p><?php echo cr_e('p_method'); ?></p>
    </section>
      <p align="center"><?php echo cr_e('collab'); ?></p>
      <figure align="center">
        <a href="https://democraseeds.wordpress.com/" target="_blank" align="center">
          <img src="imm/logo_democraseeds.jpg"
            alt="" align="center"
            width="160" height="160" loading="lazy" >
        </a>
      </figure>
  </main>

  <!-- ===================== FOOTER ===================== -->
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
