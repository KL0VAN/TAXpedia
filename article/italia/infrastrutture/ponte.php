<?php
/**
 * Ponte sullo Stretto — TAXpedia (IT/EN i18n LOCALE)
 * - NO bootstrap globale
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - NON cambia CSS/classi/struttura DOM/path
 */

if (!function_exists('ponte_get_lang')) {
  function ponte_get_lang() {
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
    'title' => 'Quanto costa veramente il Ponte sullo Stretto di Messina?',
    'meta_desc' => 'Analisi tecnica del costo del Ponte sullo Stretto di Messina, dei rischi di sovraccosto e delle principali voci di spesa.',

    'h2' => 'Quanto costa veramente il Ponte sullo Stretto di Messina?',
    'subtitle' => 'Analisi tecnica del costo del progetto, dei rischi e dei possibili rincari',
    'updated' => 'Ultimo aggiornamento: 17 dicembre 2025',

    'p1' => 'Del Ponte sullo Stretto di Messina si discute ormai dagli anni Settanta. Nel frattempo sono cambiati i governi, i progetti tecnici e perfino il contesto demografico ed economico del Mezzogiorno, ma una cosa è rimasta costante: la difficoltà di reperire le risorse necessarie alla sua realizzazione.',
    'p2a' => 'Oggi il progetto è stato nuovamente approvato dal CIPESS (Comitato Interministeriale per la Programmazione Economica e lo Sviluppo Sostenibile), con un costo complessivo fissato in ',
    'p2_amount' => '13 miliardi e 532 milioni di euro',
    'p2b' => ', interamente coperti – almeno sulla carta – da risorse pubbliche già rese disponibili con le leggi di bilancio 2024 e 2025.',

    'h3_cost' => 'Il costo',
    'p3' => 'Secondo la Società Stretto di Messina, il costo totale del progetto ammonta a 13 miliardi e 532 milioni di euro, così ripartiti:',

    'li1a' => '9 miliardi e 242 milioni',
    'li1b' => ' per i lavori di costruzione, inclusi i collegamenti con la rete infrastrutturale esistente.',
    'li2a' => '1 miliardo e 266 milioni',
    'li2b' => ' per costi di sicurezza, servizi di ingegneria e monitoraggio e opere di mitigazione dell’impatto sociale e territoriale.',
    'li3a' => '1,9 miliardi',
    'li3b' => ' per direzione lavori, controllo ambientale, bonifica delle aree contaminate, ispezioni antisabotaggio, sorveglianza, indagini archeologiche e oneri legati al protocollo di legalità.',
    'li4a' => 'Circa 1,1 miliardi',
    'li4b' => ' per altre spese.',

    'h3_add' => 'Altri costi',
    'p4' => 'Alla spesa di costruzione si aggiungono i costi operativi annuali di gestione, stimati in circa 80 milioni di euro per il periodo 2033–2062, e le spese di manutenzione straordinaria, stimate in 1,64 miliardi di euro tra il 2034 e il 2060.',
    'p5' => 'Prima ancora dell’apertura di un cantiere vero e proprio, per studi, progettazione e gestione della Società Stretto di Messina sono già stati spesi circa 300 milioni di euro.',
    'p6' => 'Come spesso accade nelle grandi opere pubbliche, esiste il rischio di un aumento significativo dei costi. Un caso emblematico è quello del MOSE di Venezia, il cui costo è passato da una stima iniziale di 4,1 miliardi di euro a 6,2 miliardi, con un incremento di circa il 50%.',
    'p7a' => 'A questi rischi si aggiungono quelli legati a sprechi e possibili infiltrazioni criminali, su cui l’Autorità Nazionale Anticorruzione (ANAC) ha già richiamato l’attenzione chiedendo protocolli rigorosi di trasparenza e controllo sugli appalti. In uno scenario di questo tipo, tra sovraccosti, contenziosi e oneri accessori, il costo complessivo dell’opera potrebbe avvicinarsi ai ',
    'p7_amount' => '20 miliardi di euro',
    'p7b' => '.',

    'h3_impact' => 'Influsso economico',
    'p8a' => 'Secondo le stime ufficiali, la costruzione del Ponte avrebbe un impatto economico complessivo di circa ',
    'p8_amount' => '23 miliardi di euro',
    'p8b' => ' sul PIL, generando occupazione e opportunità per imprese italiane ed europee.',

    'img_alt' => 'Progetto del Ponte sullo Stretto di Messina',
    'img_cap' => 'Progetto del Ponte sullo Stretto visto dalla riva della Calabria',

    'p9' => 'Il piano economico-finanziario del ponte prevede che i pedaggi coprano i costi di gestione e manutenzione, con tariffe per le auto tra circa 4 e 7 euro a tratta e circa 100 euro per i mezzi pesanti, livelli inferiori ai costi attuali dei traghetti. Le stime indicano ricavi annui intorno ai 120–130 milioni di euro e un aumento del traffico complessivo nell’area dello Stretto nei prossimi decenni.',
    'p10' => 'Tuttavia, queste previsioni si basano su ipotesi particolarmente ottimistiche (ad esempio una crescita stabile dei flussi di persone e merci nonostante il previsto calo demografico del Mezzogiorno) e restano quindi uno dei punti più discussi nel dibattito economico.',

    'h3_corte' => 'Il no della Corte dei Conti',
    'p11' => 'A novembre la Corte dei Conti ha bloccato l’avvio dei lavori del Ponte sullo Stretto, negando la legittimità della delibera del CIPESS che approvava il progetto definitivo. Tra le motivazioni figurano dubbi sulla copertura finanziaria, possibili rischi ambientali e la violazione di alcune direttive UE in materia di tutela degli habitat naturali. Il provvedimento non determina la cancellazione definitiva del progetto, ma impone una revisione delle parti contestate.',

    'h3_amend' => 'L’ultimo emendamento in manovra',
    'p12' => 'A seguito della decisione della Corte, la maggioranza ha approvato un emendamento alla manovra di bilancio che riprogramma il finanziamento dell’opera, riallocando parte delle risorse inizialmente previste per l’avvio dei cantieri nel 2024 – mai avvenuto – e rinviando una quota dei fondi alle future leggi di bilancio.',

    'collab' => 'Articolo realizzato in collaborazione con',
    'partner_alt' => 'Democraseeds',
    'sources' => 'Fonti',
    'src1' => 'Comitato Interministeriale per la Programmazione Economica e lo Sviluppo Sostenibile (CIPESS)',
    'src2' => 'Ministero delle Infrastrutture e dei Trasporti',
    'src3' => 'Società Stretto di Messina S.p.A.',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'How much does the Messina Strait Bridge really cost?',
    'meta_desc' => 'Technical analysis of the Messina Strait Bridge: project costs, key risk drivers and potential overruns.',

    'h2' => 'How much does the Messina Strait Bridge really cost?',
    'subtitle' => 'Technical analysis of project costs, risks, and potential overruns',
    'updated' => 'Last updated: 17 December 2025',

    'p1' => 'The Messina Strait Bridge has been debated since the 1970s. Over time, governments, technical designs, and even the demographic and economic context of Southern Italy have changed. One issue, however, has remained constant: the difficulty of securing the financial resources required to build it.',
    'p2a' => 'The project has recently been approved once again by CIPESS (the Interministerial Committee for Economic Planning and Sustainable Development), with a total estimated cost of ',
    'p2_amount' => '€13.532 billion',
    'p2b' => '. This amount is formally covered by public funds already allocated through the 2024 and 2025 budget laws.',

    'h3_cost' => 'Project costs',
    'p3' => 'According to the Stretto di Messina Company, the total cost of the project amounts to €13.532 billion, broken down as follows:',

    'li1a' => '€9.242 billion',
    'li1b' => ' allocated to construction works, including connections with the existing transport infrastructure.',
    'li2a' => '€1.266 billion',
    'li2b' => ' for safety-related costs, engineering and monitoring services, and measures aimed at mitigating social and territorial impacts.',
    'li3a' => '€1.9 billion',
    'li3b' => ' for project management, environmental monitoring, land remediation, anti-sabotage inspections, surveillance, archaeological investigations, and compliance with the legality protocol.',
    'li4a' => 'Approximately €1.1 billion',
    'li4b' => ' for other expenses.',

    'h3_add' => 'Additional costs',
    'p4' => 'In addition to construction costs, annual operating expenses are estimated at around €80 million for the period 2033–2062. Extraordinary maintenance costs are projected at €1.64 billion between 2034 and 2060.',
    'p5' => 'Even before the opening of any construction site, approximately €300 million have already been spent on feasibility studies, design activities, and the management of the Stretto di Messina Company.',
    'p6' => 'As is often the case with large public infrastructure projects, there is a significant risk of cost overruns. A notable example is the MOSE project in Venice, whose cost increased from an initial estimate of €4.1 billion to €6.2 billion, representing an increase of around 50%.',
    'p7a' => 'These risks are compounded by concerns over inefficiencies and potential criminal infiltration. The National Anti-Corruption Authority (ANAC) has already drawn attention to these issues, calling for strict transparency and oversight protocols in public procurement. Under such conditions, considering overruns, legal disputes, and ancillary costs, the final cost of the bridge could approach ',
    'p7_amount' => '€20 billion',
    'p7b' => '.',

    'h3_impact' => 'Economic impact',
    'p8a' => 'Official estimates suggest that the construction of the bridge would generate an overall economic impact of approximately ',
    'p8_amount' => '€23 billion',
    'p8b' => ' in terms of GDP, creating employment and business opportunities for Italian and European companies.',

    'img_alt' => 'Messina Strait Bridge project rendering',
    'img_cap' => 'Messina Strait Bridge project rendering, view from the Calabria side',

    'p9' => 'The project’s financial plan also assumes that toll revenues will be sufficient to cover operating and maintenance costs. Proposed tolls range from approximately €4 to €7 per trip for passenger vehicles and around €100 for heavy goods vehicles, remaining below current ferry costs. Annual revenues are estimated at €120–130 million, alongside a projected increase in traffic flows across the Strait in the coming decades.',
    'p10' => 'However, these projections rely on strong assumptions, including sustained growth in passenger and freight movements despite the expected demographic decline in Southern Italy. As a result, they remain one of the most contested aspects of the project among economists.',

    'h3_corte' => 'The Court of Auditors’ rejection',
    'p11' => 'In November, the Italian Court of Auditors halted the launch of construction works by declaring the CIPESS resolution approving the final project unlawful. The ruling cited concerns regarding financial coverage, potential environmental risks, and non-compliance with certain European Union directives on the protection of natural habitats. While the decision does not permanently block the project, it requires a partial revision addressing the issues raised by the Court.',

    'h3_amend' => 'The latest budget amendment',
    'p12' => 'Following the Court’s decision, the parliamentary majority approved an amendment to the budget law rescheduling the project’s financing. Part of the funds originally allocated for the start of construction in 2024—which never took place—have been reallocated, while the remaining resources have been deferred to future budget laws.',

    'collab' => 'Article produced in collaboration with',
    'partner_alt' => 'Democraseeds',
    'sources' => 'Sources',
    'src1' => 'Interministerial Committee for Economic Planning and Sustainable Development (CIPESS)',
    'src2' => 'Ministry of Infrastructure and Transport',
    'src3' => 'Stretto di Messina S.p.A.',
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
<html lang="<?php echo ponte_e($PONTE_LANG); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo ponte_e('title'); ?></title>
  <meta name="description" content="<?php echo ponte_e('meta_desc'); ?>"/>

  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css"/>
  <link rel="stylesheet" href="/style/StyleTesti.css"/>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <article class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">

      <header style="margin-bottom:1.25rem;">
        <h2 class="section-title" style="margin-bottom:.35rem;">
          <?php echo ponte_e('h2'); ?>
        </h2>
        <p class="subtitle" style="margin:.25rem 0 0;">
          <?php echo ponte_e('subtitle'); ?>
        </p>
        <p class="meta" style="margin:.5rem 0 0;">
          <small><?php echo ponte_e('updated'); ?></small>
        </p>
      </header>

      <p><?php echo ponte_e('p1'); ?></p>

      <p>
        <?php echo ponte_e('p2a'); ?>
        <strong><?php echo ponte_e('p2_amount'); ?></strong>
        <?php echo ponte_e('p2b'); ?>
      </p>

      <h3 style="margin-top:1.6rem;"><?php echo ponte_e('h3_cost'); ?></h3>
      <p><?php echo ponte_e('p3'); ?></p>

      <ul>
        <li><strong><?php echo ponte_e('li1a'); ?></strong><?php echo ponte_e('li1b'); ?></li>
        <li><strong><?php echo ponte_e('li2a'); ?></strong><?php echo ponte_e('li2b'); ?></li>
        <li><strong><?php echo ponte_e('li3a'); ?></strong><?php echo ponte_e('li3b'); ?></li>
        <li><strong><?php echo ponte_e('li4a'); ?></strong><?php echo ponte_e('li4b'); ?></li>
      </ul>

      <h3 style="margin-top:1.6rem;"><?php echo ponte_e('h3_add'); ?></h3>
      <p><?php echo ponte_e('p4'); ?></p>
      <p><?php echo ponte_e('p5'); ?></p>
      <p><?php echo ponte_e('p6'); ?></p>

      <p>
        <?php echo ponte_e('p7a'); ?>
        <strong><?php echo ponte_e('p7_amount'); ?></strong>
        <?php echo ponte_e('p7b'); ?>
      </p>

      <h3 style="margin-top:1.6rem;"><?php echo ponte_e('h3_impact'); ?></h3>
      <p>
        <?php echo ponte_e('p8a'); ?>
        <strong><?php echo ponte_e('p8_amount'); ?></strong>
        <?php echo ponte_e('p8b'); ?>
      </p>

      <figure class="media" style="margin:1.25rem 0;">
        <img
          src="../imm/ponte.png"
          alt="<?php echo ponte_e('img_alt'); ?>"
          style="display:block; width:100%; height:auto;"
          loading="lazy"
        >
        <figcaption style="margin-top:.5rem;">
          <small><?php echo ponte_e('img_cap'); ?></small>
        </figcaption>
      </figure>

      <p><?php echo ponte_e('p9'); ?></p>
      <p><?php echo ponte_e('p10'); ?></p>

      <h3 style="margin-top:1.6rem;"><?php echo ponte_e('h3_corte'); ?></h3>
      <p><?php echo ponte_e('p11'); ?></p>

      <h3 style="margin-top:1.6rem;"><?php echo ponte_e('h3_amend'); ?></h3>
      <p><?php echo ponte_e('p12'); ?></p>

      <hr style="margin:2rem 0; opacity:.25;">

      <section aria-label="Collaborazioni e fonti">
        <p style="text-align:center; margin:0 0 .75rem;">
          <?php echo ponte_e('collab'); ?>
        </p>

        <figure style="text-align:center; margin:0 0 1rem;">
          <a href="https://democraseeds.wordpress.com/" target="_blank" rel="noopener noreferrer">
            <img
              src="../imm/logo_democraseeds.jpg"
              alt="<?php echo ponte_e('partner_alt'); ?>"
              width="160"
              height="160"
              loading="lazy"
              style="display:inline-block; border-radius:12px;"
            >
          </a>
        </figure>

        <p style="text-align:center; margin:0 0 .5rem;"><strong><?php echo ponte_e('sources'); ?></strong></p>
        <p style="text-align:center; margin:0;"><?php echo ponte_e('src1'); ?></p>
        <p style="text-align:center; margin:0;"><?php echo ponte_e('src2'); ?></p>
        <p style="text-align:center; margin:0;"><?php echo ponte_e('src3'); ?></p>
      </section>

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
