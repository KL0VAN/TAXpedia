<?php
/**
 * i18n LOCALE (IT/EN) — solo per questa pagina (aboutus/disclaimer.php)
 * - NON usa bootstrap/globale
 * - Lingua da cookie tp_lang (fallback IT); ?lang= ha priorità
 * - Funzioni con prefisso dedicato + protezione anti-redeclare
 */
require_once __DIR__ . '/../i18n/i18n.php';

if (!isset($DSC_SUPPORTED)) $DSC_SUPPORTED = array('it', 'en');

$DSC_LANG = function_exists('tp_lang') ? tp_lang() : 'it';
if (!in_array($DSC_LANG, $DSC_SUPPORTED, true)) $DSC_LANG = 'it';

$DSC_I18N = array(

  // =========================
  // IT
  // =========================
  'it' => array(
    'meta_title' => 'Metodologia, fonti e disclaimer — TAXpedia',
    'h2'         => 'Metodologia, fonti e disclaimer',
    'updated'    => 'Ultimo aggiornamento: 25 settembre 2026',
    'intro'      => 'TAXpedia è un osservatorio indipendente sulla finanza pubblica europea. Il nostro obiettivo è rendere più comprensibili tasse, bilanci pubblici e politiche economiche attraverso dati ufficiali, strumenti interattivi e contenuti divulgativi. Questa pagina descrive i criteri utilizzati per raccogliere, elaborare e presentare le informazioni pubblicate sul sito, insieme ai limiti delle stime prodotte dai nostri strumenti.',

    'h3_sources' => 'Le nostre fonti',
    'p_sources'  => 'TAXpedia utilizza prioritariamente fonti pubbliche, istituzionali e verificabili. A seconda del contenuto, possono includere:',
    'src_1'      => 'ministeri delle finanze, amministrazioni pubbliche e autorità fiscali nazionali;',
    'src_2'      => 'documenti di bilancio, rendiconti e banche dati pubbliche;',
    'src_3'      => 'Eurostat, Commissione europea e altre istituzioni dell’Unione europea;',
    'src_4'      => 'istituti nazionali di statistica, banche centrali e organismi internazionali;',
    'src_5'      => 'pubblicazioni accademiche e centri di ricerca, quando utili a integrare o interpretare i dati ufficiali.',
    'p_sources_final' => 'Le fonti specifiche vengono indicate, quando possibile, nelle pagine dei calcolatori, negli articoli e nei materiali educativi. La disponibilità e il livello di dettaglio dei dati possono variare tra i Paesi: gli anni di riferimento o il grado di aggiornamento delle informazioni potrebbero quindi non essere sempre identici per tutti i 27 Stati membri.',

    'h3_process' => 'Raccolta e verifica dei dati',
    'p_process'  => 'Prima della pubblicazione, i dati vengono selezionati e controllati dalla redazione di TAXpedia. Il processo comprende:',
    'process_1'  => 'l’individuazione delle fonti istituzionali più recenti disponibili;',
    'process_2'  => 'il confronto tra fonti differenti, quando necessario;',
    'process_3'  => 'la verifica dell’unità di misura, dell’anno di riferimento e della definizione degli indicatori;',
    'process_4'  => 'l’organizzazione dei dati in categorie comuni e la revisione del contenuto prima della pubblicazione.',
    'p_process_final' => 'Quando un valore deriva da un’elaborazione di TAXpedia e non è riportato direttamente dalla fonte, viene presentato come stima o risultato indicativo.',

    'h3_calc'    => 'Metodologia dei calcolatori fiscali',
    'p_calc'     => 'Il calcolo delle imposte è una stima indicativa basata sulle aliquote e sugli scaglioni di reddito inseriti in TAXpedia per il Paese selezionato. Per semplicità non vengono considerati, a titolo esemplificativo: detrazioni, deduzioni, crediti d’imposta, bonus, agevolazioni, rimborsi, addizionali locali o altre variabili personali e normative che possono incidere sul risultato finale. Di conseguenza, l’importo mostrato può differire da quello effettivamente dovuto in sede di dichiarazione o liquidazione.',

    'h3_spending' => 'Come viene rappresentata la spesa pubblica',
    'p_spending'  => 'Una volta stimato il carico fiscale, TAXpedia ne rappresenta la distribuzione tra le principali funzioni della spesa pubblica. La ripartizione viene realizzata applicando all’importo stimato le percentuali ricavate dai bilanci pubblici e dalle altre fonti istituzionali utilizzate per ciascun Paese.',
    'p_spending_note' => 'Questa rappresentazione mostra in modo intuitivo il peso relativo delle diverse aree di intervento pubblico. Non significa che le imposte versate dal singolo contribuente siano direttamente destinate o vincolate alle specifiche voci visualizzate: le entrate fiscali confluiscono generalmente nel bilancio pubblico e contribuiscono complessivamente al finanziamento delle attività dello Stato.',

    'h3_data'    => 'Comparabilità tra i Paesi',
    'p_compare'  => 'I 27 Stati membri utilizzano sistemi fiscali, strutture amministrative e classificazioni di bilancio differenti. Per rendere possibile il confronto, TAXpedia organizza i dati all’interno di categorie comuni e più facilmente comprensibili. Questo processo può richiedere il raggruppamento di voci simili, la riconduzione di classificazioni differenti a una categoria comune, la conversione di valute o unità di misura e l’arrotondamento dei valori.',
    'p_data'     => 'Le spese totali e le percentuali per settore possono risultare diverse da quelle riportate da altre fonti (anche giornalistiche) per motivi quali:',
    'li_1'       => 'aggiornamenti diversi (anni di riferimento non coincidenti o release successive);',
    'li_2'       => 'metriche differenti (spesa in rapporto al PIL vs spesa in rapporto alle entrate dello Stato);',
    'li_3'       => 'criteri di classificazione dei capitoli di spesa differenti da quelli adottati da TAXpedia.',
    'p_final'    => 'Le percentuali sono elaborate dal nostro team a partire da dati ufficiali, con possibili arrotondamenti e riclassificazioni. In alcuni casi, per effetto di aggregazioni, arrotondamenti o riclassificazioni, la somma dei valori potrebbe non coincidere perfettamente con i totali.',
    'p_compare_note' => 'Il confronto consente di evidenziare differenze generali tra i Paesi, ma non elimina tutte le diversità istituzionali e contabili esistenti. I risultati devono quindi essere interpretati come strumenti di orientamento e non come confronti perfettamente equivalenti in ogni dettaglio.',

    'h3_editorial' => 'Articoli, glossario e materiali educativi',
    'p_editorial'  => 'Gli articoli pubblicati da TAXpedia combinano dati, documenti istituzionali e contributi provenienti da fonti qualificate. La redazione mira a distinguere i dati dalle interpretazioni, indicare le fonti principali, segnalare le stime e spiegare i concetti tecnici con un linguaggio accessibile. Eventuali analisi o interpretazioni degli autori non rappresentano posizioni ufficiali delle istituzioni citate.',
    'p_education'  => 'Il glossario e le risorse dell’EU Youth Tax Literacy Program hanno finalità didattiche. Le definizioni vengono semplificate per rendere accessibili concetti fiscali, economici e finanziari a un pubblico non specialistico e possono quindi non includere tutte le eccezioni o interpretazioni previste dalla normativa.',
    
    'h3_agg'     => 'Aggiornamento dei dati',
    'p_agg'      => 'Per garantire la massima attualità possibile utilizziamo i dati dell’ultimo consuntivo disponibile. Questo può non coincidere con le previsioni contenute nelle manovre di bilancio o con successive variazioni intervenute dopo la pubblicazione del consuntivo. La data riportata nelle singole pagine indica l’ultimo aggiornamento del contenuto, ma non implica necessariamente che tutte le fonti utilizzate si riferiscano allo stesso periodo.',

    'h3_corrections' => 'Correzioni e segnalazioni',
    'p_corrections'  => 'Nonostante il lavoro di verifica, la presenza di errori, omissioni o dati non aggiornati non può essere esclusa. Segnalazioni, richieste di chiarimento o proposte di correzione possono essere inviate a team@taxpedia.eu. Le segnalazioni vengono esaminate dalla redazione e, quando fondate, possono portare alla modifica o all’aggiornamento del contenuto interessato.',

    'h3_info'    => 'Uso delle informazioni e responsabilità',
    'p_info'     => 'I contenuti e i risultati mostrati su TAXpedia hanno finalità informative ed educative e non costituiscono consulenza fiscale, legale o contabile. Pur impegnandoci per accuratezza e chiarezza, non garantiamo l’assenza di errori, omissioni o aggiornamenti mancanti. L’uso delle informazioni avviene sotto la responsabilità dell’utente.',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'meta_title' => 'Methodology, sources and disclaimer — TAXpedia',
    'h2'         => 'Methodology, sources and disclaimer',
    'updated'    => 'Last updated: 25 September 2026',
    'intro'      => 'TAXpedia is an independent observatory on European public finance. Our goal is to make taxes, public budgets and economic policies easier to understand through official data, interactive tools and educational content. This page describes the criteria used to collect, process and present the information published on the website, together with the limitations of the estimates produced by our tools.',

    'h3_sources' => 'Our sources',
    'p_sources'  => 'TAXpedia primarily uses public, institutional and verifiable sources. Depending on the content, these may include:',
    'src_1'      => 'ministries of finance, public administrations and national tax authorities;',
    'src_2'      => 'budget documents, financial statements and public databases;',
    'src_3'      => 'Eurostat, the European Commission and other European Union institutions;',
    'src_4'      => 'national statistical institutes, central banks and international organisations;',
    'src_5'      => 'academic publications and research centres, when useful to supplement or interpret official data.',
    'p_sources_final' => 'Specific sources are indicated, where possible, on calculator pages, in articles and in educational materials. The availability and level of detail of the data may vary between countries: reference years or update frequency may therefore not always be identical across all 27 Member States.',

    'h3_process' => 'Data collection and verification',
    'p_process'  => 'Before publication, data are selected and checked by the TAXpedia editorial team. The process includes:',
    'process_1'  => 'identifying the most recent institutional sources available;',
    'process_2'  => 'comparing different sources when necessary;',
    'process_3'  => 'checking units of measurement, reference years and indicator definitions;',
    'process_4'  => 'organising data into common categories and reviewing the content before publication.',
    'p_process_final' => 'When a value is produced through a TAXpedia calculation rather than reported directly by a source, it is presented as an estimate or indicative result.',

    'h3_calc'    => 'Tax calculator methodology',
    'p_calc'     => 'The tax calculation is an indicative estimate based on the tax rates and income brackets entered in TAXpedia for the selected country. For simplicity\'s sake, it does not take into account, for example, deductions, tax credits, bonuses, incentives, refunds, local surcharges, or other personal and regulatory variables that could affect the final result. As a result, the amount shown may differ from the amount actually due upon tax return or settlement.',

    'h3_spending' => 'How public spending is represented',
    'p_spending'  => 'Once the tax burden has been estimated, TAXpedia represents its distribution across the main functions of public spending. The estimated amount is allocated using percentages derived from public budgets and the other institutional sources used for each country.',
    'p_spending_note' => 'This representation provides an intuitive view of the relative weight of different areas of public intervention. It does not mean that taxes paid by an individual taxpayer are directly assigned or earmarked for the specific items shown: tax revenues generally flow into the public budget and collectively finance government activities.',

    'h3_data'    => 'Comparability between countries',
    'p_compare'  => 'The 27 Member States use different tax systems, administrative structures and budget classifications. To make comparison possible, TAXpedia organises data into common and more easily understandable categories. This process may require grouping similar items, mapping different classifications to a common category, converting currencies or units of measurement, and rounding values.',
    'p_data'     => 'Total expenses and percentages by sector may differ from those reported by other sources (including journalistic sources) for reasons such as:',
    'li_1'       => 'different updates (non-coinciding reference years or subsequent releases);',
    'li_2'       => 'different metrics (spending as a percentage of GDP vs spending as a percentage of government revenue);',
    'li_3'       => 'classification criteria for expenditure chapters different from those adopted by TAXpedia.',
    'p_final'    => 'Percentages are calculated by our team based on official data, subject to rounding and reclassification. In some cases, due to aggregations, rounding, or reclassifications, the sum of the values may not exactly match the totals.',
    'p_compare_note' => 'The comparison highlights general differences between countries but cannot eliminate every institutional and accounting difference. Results should therefore be interpreted as guidance rather than as perfectly equivalent comparisons in every detail.',

    'h3_editorial' => 'Articles, glossary and educational materials',
    'p_editorial'  => 'Articles published by TAXpedia combine data, institutional documents and contributions from qualified sources. The editorial team aims to distinguish data from interpretation, cite the main sources, identify estimates and explain technical concepts in accessible language. Any analysis or interpretation by the authors does not represent the official position of the institutions cited.',
    'p_education'  => 'The glossary and EU Youth Tax Literacy Program resources are intended for educational purposes. Definitions are simplified to make fiscal, economic and financial concepts accessible to non-specialist audiences and may therefore not include every exception or interpretation provided for in legislation.',

    'h3_agg'     => 'Data update',
    'p_agg'      => 'To ensure maximum up-to-dateness, we use data from the latest available financial statements. This may differ from the forecasts contained in budget measures or from subsequent changes that occurred after the financial statements were published. The date shown on each page indicates when the content was last updated, but it does not necessarily mean that all sources refer to the same period.',

    'h3_corrections' => 'Corrections and reports',
    'p_corrections'  => 'Despite our verification process, errors, omissions or outdated data cannot be completely excluded. Reports, requests for clarification or proposed corrections can be sent to team@taxpedia.eu. Reports are reviewed by the editorial team and, when substantiated, may result in the relevant content being corrected or updated.',

    'h3_info'    => 'Use of information and responsibilities',
    'p_info'     => 'The content and results displayed on TAXpedia are for informational and educational purposes only and do not constitute tax, legal, or accounting advice. While we strive for accuracy and clarity, we do not guarantee the absence of errors, omissions, or missing updates. Use of the information is at the user\'s own risk.',
  ),
);

if (!function_exists('dsc_t')) {
  function dsc_t($key) {
    global $DSC_LANG, $DSC_I18N;

    $lang = isset($DSC_LANG) ? $DSC_LANG : 'it';
    $dict = isset($DSC_I18N) ? $DSC_I18N : array();

    if (isset($dict[$lang]) && isset($dict[$lang][$key])) return $dict[$lang][$key];
    if (isset($dict['it']) && isset($dict['it'][$key])) return $dict['it'][$key];
    return '';
  }
}

if (!function_exists('dsc_e')) {
  function dsc_e($key) {
    return htmlspecialchars(dsc_t($key), ENT_QUOTES, 'UTF-8');
  }
}
?>
<!doctype html>
<html lang="<?php echo htmlspecialchars($DSC_LANG, ENT_QUOTES, 'UTF-8'); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo dsc_e('meta_title'); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css"  />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
      <div class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">
      <h2><?php echo dsc_e('h2'); ?></h2>
      <p style="opacity:.72; margin-top:-.4rem;"><?php echo dsc_e('updated'); ?></p>
      <p><?php echo dsc_e('intro'); ?></p>

      <h3><?php echo dsc_e('h3_sources'); ?></h3>
      <p><?php echo dsc_e('p_sources'); ?></p>
      <ul>
        <li><?php echo dsc_e('src_1'); ?></li>
        <li><?php echo dsc_e('src_2'); ?></li>
        <li><?php echo dsc_e('src_3'); ?></li>
        <li><?php echo dsc_e('src_4'); ?></li>
        <li><?php echo dsc_e('src_5'); ?></li>
      </ul>
      <p><?php echo dsc_e('p_sources_final'); ?></p>

      <h3><?php echo dsc_e('h3_process'); ?></h3>
      <p><?php echo dsc_e('p_process'); ?></p>
      <ol>
        <li><?php echo dsc_e('process_1'); ?></li>
        <li><?php echo dsc_e('process_2'); ?></li>
        <li><?php echo dsc_e('process_3'); ?></li>
        <li><?php echo dsc_e('process_4'); ?></li>
      </ol>
      <p><?php echo dsc_e('p_process_final'); ?></p>

      <h3><?php echo dsc_e('h3_calc'); ?></h3>
      <p><?php echo dsc_e('p_calc'); ?></p>

      <h3><?php echo dsc_e('h3_spending'); ?></h3>
      <p><?php echo dsc_e('p_spending'); ?></p>
      <p><?php echo dsc_e('p_spending_note'); ?></p>

      <h3><?php echo dsc_e('h3_data'); ?></h3>
      <p><?php echo dsc_e('p_compare'); ?></p>
      <p><?php echo dsc_e('p_data'); ?></p>
      <ul>
        <li><?php echo dsc_e('li_1'); ?></li>
        <li><?php echo dsc_e('li_2'); ?></li>
        <li><?php echo dsc_e('li_3'); ?></li>
      </ul>
      <p><?php echo dsc_e('p_final'); ?></p>
      <p><?php echo dsc_e('p_compare_note'); ?></p>

      <h3><?php echo dsc_e('h3_editorial'); ?></h3>
      <p><?php echo dsc_e('p_editorial'); ?></p>
      <p><?php echo dsc_e('p_education'); ?></p>

      <h3><?php echo dsc_e('h3_agg'); ?></h3>
      <p><?php echo dsc_e('p_agg'); ?></p>

      <h3><?php echo dsc_e('h3_corrections'); ?></h3>
      <p><?php echo dsc_e('p_corrections'); ?></p>

      <h3><?php echo dsc_e('h3_info'); ?></h3>
      <p><?php echo dsc_e('p_info'); ?></p>
      </div>
  </main>
  <!-- ===================== FOOTER ===================== -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>
</body>
</html>
