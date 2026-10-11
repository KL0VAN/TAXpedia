<?php
require_once __DIR__ . '/../../../i18n/i18n.php';

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
    'title' => 'Perché l’Europa non può più permettersi di essere divisa - TAXpedia',

    'h2' => 'Perché l’Europa non può più permettersi di essere divisa',
    'subtitle' => '',
    'meta_desc' => 'Perché una maggiore integrazione europea può ridurre i costi della frammentazione nei settori della difesa, del mercato unico e del bilancio UE.',
    'p1' => 'Mario Draghi ha recentemente affermato che, per rispondere alla crescente pressione dei competitor, l’Unione Europea deve concentrarsi su tre problemi: sviluppare un piano di decarbonizzazione più competitivo, ridurre il divario tecnologico con la Cina e gli Stati Uniti e, infine, rafforzare la sicurezza. In un contesto geopolitico di sempre maggiore incertezza e di tensione tra grandi potenze, fra tutte la Cina e gli Stati Uniti, accompagnato, al contempo, dalla presenza degli altri paesi BRICS originali (Brasile, Russia, India e Sudafrica) e dall’ingresso di nuovi in questo gruppo (Egitto, Etiopia, Indonesia, Iran, Arabia Saudita ed Emirati Arabi), la domanda su quale sia il ruolo dell’Europa sorge sempre più spontanea e rilevante. E questo non è solo un discorso astratto sul futuro dell’Europa, ma basato su un’analisi economica fondamentale: un’Unione Europea più integrata e federale garantirebbe costi minori e benefici maggiori, rispetto all’attuale Unione - frammentata e ostaggio degli stati membri. Questa analisi si concentrerà sui benefici nei settori della difesa, del mercato unico e, infine, sul bilancio europeo.',
    'p2' => 'Prima di tutto, è bene partire da alcuni dati economici. Secondo uno studio dell’Unione Europea di novembre 2024, il costo di un’UE priva di una difesa comune comporta spese in questo ambito comprese tra 18 e 57 miliardi annui. Una maggiore cooperazione difensiva porterebbe vantaggi a tutti gli stati, grazie a incentivi finanziari e a una politica comune, assicurando, ovviamente, maggiore sicurezza ed efficacia. Questa, poiché dovrà necessariamente essere affiancata da una politica estera comune, implicherebbe processi decisionali più semplici in materia. Inoltre, se intesa in senso federale, apporterebbe benefici economici, poiché eviterebbe di disperdere gli investimenti in 27 diversi ministeri nazionali, permettendo quindi di ottimizzare le spese. Ma quali sono le difficoltà che impediscono una maggiore integrazione in materia di difesa? Principalmente due: la prima è la paradossale presenza di una imponente capacità militare, senza però un equipaggiamento di livello a causa della scarsa collaborazione tra gli stati membri (infatti il personale militare attivo, ammonta a circa 1.3-1.5 milioni in UE e a 1.3 milioni negli Stati Uniti ma i primi collaborano con sistemi differenti, aumentando costi e disorganizzazione); la seconda è la mancanza di investimenti in innovazione tecnologica nel settore, con un mercato comune non proprio definibile tale, il che causa grandi sprechi economici e la mancanza di un sistema di difesa ben organizzato.',
    'p3' => 'Il secondo tema è quello del mercato unico. Dopo esser nato in un contesto decisamente più piccolo, quando l’Unione Europea era ancora nota come Comunità Europea, esso aveva l’obiettivo di promuovere una maggiore collaborazione e solidarietà tra gli stati membri. Oggi, come sottolineato anche da Enrico Letta in un report sul mercato unico (2024), sono necessarie nuove misure perché ciò che un tempo era sufficiente non basta più. Ora, il libero mercato, basato fino ad oggi su quattro libertà (libertà di movimento di persone, beni, servizi e capitali), deve compiere un passo successivo, includendo una “quinta libertà”: la libera circolazione in ambito di ricerca, innovazione e educazione. Questo permetterebbe di unire al meglio le migliori menti europee, favorendo una maggiore cooperazione tra gli stati e incrementando la competitività. Infatti, uno studio della Commissione Europea di Paolo Pasimeni (2023) ha recentemente concluso che l’introduzione del mercato comune nel 1993 ha avuto un impatto economico tale da comportare una crescita del Pil del 3 o 4%, creando 3,6 milioni di posti di lavoro. E se questo è stato possibile con una forma di mercato, comunque, ancora imperfetta e in un mondo meno globalizzato, in cui non era ancora necessaria, come oggi, una stretta collaborazione, quanto importante potrebbe diventare se includesse, come propone Letta, energia, ricerca, finanza, telecomunicazioni e difesa, con alla base una maggiore ricerca condivisa?',
    'p4' => 'Infine, consideriamo il bilancio europeo. L’attuale bilancio UE 2021-2027 ammonta a circa 1200 miliardi di euro, pari a una media di 174 miliardi l’anno (circa l’1% del pil europeo, visto che quest’ultimo è pari a 18.000 miliardi di euro). La proposta della Commissione per il settennato 2028-2034 presenta un leggero aumento, ma non ha ancora ricevuto l’approvazione degli Stati membri, alcuni dei quali premono per un ridimensionamento. È chiaro che le decisioni continuano a basarsi sul principio del “giusto ritorno”, anche perché la maggior parte delle risorse che compongono il bilancio dell’Unione europea sono frutto di trasferimenti diretti degli Stati membri. Confrontando il bilancio dell’UE con quello di Stati federali, notiamo immediatamente la differenza. Gli Stati Uniti hanno un bilancio pari al 22-24% del Pil, mentre la Germania ha un bilancio pari al 12-14% del Pil e le principali entrate sono costituite da risorse proprie. Ciò di cui avrebbe bisogno l’Unione oggi è di un bilancio più sostanzioso, alimentato da vere risorse proprie e non più dipendente dai trasferimenti diretti degli Stati, capace così di finanziare beni pubblici europei e affrontare adeguatamente le sfide comuni.',
    'p5' => 'A questo si aggiungono due ulteriori elementi. Primo, la necessità di unanimità nel Consiglio dell’Unione Europea su temi fondamentali quali la politica estera, la difesa e l’allargamento dell’Unione, la cui mancanza rende difficile una risposta coordinata, poiché il veto su queste ed altre questioni strategiche ostacola prese di posizione concrete ed efficaci. Secondo, il fatto che l’Unione europea sia stata costruita per un altro mondo, in un’altra epoca, in cui gli stati europei si potevano permettere di non essere uniti, potendo contare ad esempio sulla partnership con gli Stati Uniti. Oggi, la situazione è differente: tra gli Stati Uniti, che intraprendono una politica isolazionista sul piano economico e interventista al di fuori dei propri confini, la Cina in continua crescita economica, la Russia sempre più vicina ai confini europei occidentali e gli altri paesi dei BRICS sempre più uniti e coesi, la necessità di essere più uniti economicamente e politicamente non si è mai rivelata così urgente. Il costo della non unità, quindi, rischia di non essere solo più economico, ma anche esistenziale, e sembra chiaro che Mario Draghi abbia proprio ragione nell’affermare che, se l’Europa non passerà da confederazione a federazione, il possibile conto da pagare sarà quello di entrare in una fase di stagnazione economica permanente e di irrilevanza politica. L’innovazione che l’Europa dovrà affrontare sarebbe quindi quella di trovarsi, per la prima volta, sempre più fuori dai giochi mondiali.',
    'updated' => 'Ultimo aggiornamento: 1 ottobre 2026',


    'author' => 'A cura di <a href="/aboutus/team/tommaso-prever.php?lang=it" style="text-decoration: underline;">Tommaso Prever</a>',
    'collab' => 'Articolo realizzato in collaborazione con',
    'partner_alt' => 'Gioventù Federalista Europea',

    'sources' => 'Fonti',
    'src1' => '',
  ),
  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'Why Europe Can No Longer Afford to Be Divided - TAXpedia',

    'h2' => 'Why Europe Can No Longer Afford to Be Divided',
    'subtitle' => '',
    'meta_desc' => 'Why deeper European integration could reduce the costs of fragmentation in defence, the Single Market and the EU budget.',
    'p1' => 'Mario Draghi has recently argued that, to respond to growing pressure from competitors, the European Union must focus on three challenges: developing a more competitive decarbonisation plan, closing the technological gap with China and the United States and, finally, strengthening security. In a geopolitical context of increasing uncertainty and tension among major powers, above all China and the United States, alongside the original BRICS countries (Brazil, Russia, India and South Africa) and the entry of new members into the group (Egypt, Ethiopia, Indonesia, Iran, Saudi Arabia and the United Arab Emirates), the question of Europe’s role is becoming increasingly relevant. This is not merely an abstract debate about Europe’s future, but one grounded in a fundamental economic analysis: a more integrated and federal European Union would generate lower costs and greater benefits than the current Union, which remains fragmented and constrained by its Member States. This analysis focuses on the benefits in defence, the Single Market and, finally, the European budget.',
    'p2' => 'First, it is useful to start with some economic data. According to a European Union study from November 2024, the cost of an EU without a common defence amounts to between €18 and €57 billion per year. Greater defence cooperation would benefit all Member States through financial incentives and a common policy, while also providing greater security and effectiveness. Since this would necessarily need to be accompanied by a common foreign policy, it would also imply simpler decision-making processes. If developed along federal lines, it would also bring economic benefits by avoiding the dispersion of investments across 27 different national ministries and therefore allowing spending to be optimised. What prevents greater integration in defence? Mainly two factors: first, the paradoxical presence of substantial military capacity without adequate equipment because of limited cooperation among Member States (active military personnel amount to around 1.3–1.5 million in the EU and 1.3 million in the United States, but European forces operate with different systems, increasing costs and disorganisation); second, insufficient investment in technological innovation in the sector and a common market that is not truly common, generating economic waste and preventing the creation of a well-organised defence system.',
    'p3' => 'The second issue is the Single Market. It was created in a much smaller context, when the European Union was still known as the European Community, with the objective of promoting greater cooperation and solidarity among Member States. Today, as Enrico Letta also stressed in his 2024 report on the Single Market, new measures are needed because what was once sufficient is no longer enough. The free market, so far based on four freedoms — the free movement of people, goods, services and capital — must take a further step by including a “fifth freedom”: free movement in research, innovation and education. This would help bring together Europe’s best minds, encourage greater cooperation among states and increase competitiveness. A European Commission study by Paolo Pasimeni (2023) concluded that the introduction of the Single Market in 1993 had an economic impact equivalent to 3–4% GDP growth and created 3.6 million jobs. If this was possible with a market that was still imperfect and in a less globalised world, how important could it become if, as Letta proposes, it also included energy, research, finance, telecommunications and defence, supported by more shared research?',
    'p4' => 'Finally, consider the European budget. The current 2021–2027 EU budget amounts to around €1.2 trillion, an average of €174 billion per year, or roughly 1% of European GDP, which is around €18 trillion. The Commission proposal for 2028–2034 provides for a slight increase, but it has not yet been approved by the Member States, some of which are pressing for a reduction. Decisions continue to be shaped by the principle of “juste retour”, also because most resources making up the EU budget come from direct transfers by Member States. Comparing the EU budget with those of federal states immediately reveals the difference. The United States has a budget equal to 22–24% of GDP, while Germany’s federal budget is equal to 12–14% of GDP and its main revenues consist of own resources. What the Union needs today is a more substantial budget financed by genuine own resources rather than direct transfers from states, capable of funding European public goods and adequately addressing common challenges.',
    'p5' => 'Two further elements should be added. First, unanimity is required in the Council of the European Union on fundamental issues such as foreign policy, defence and EU enlargement. This makes a coordinated response difficult because vetoes on these and other strategic issues can obstruct concrete and effective positions. Second, the European Union was built for another world and another era, when European states could afford not to be united, relying for example on their partnership with the United States. Today the situation is different: between a United States pursuing an economically isolationist policy while remaining interventionist beyond its borders, China’s continuing economic growth, Russia increasingly close to Europe’s western borders and the other BRICS countries becoming more united and cohesive, the need for greater economic and political unity has rarely appeared so urgent. The cost of disunity therefore risks being not only economic but existential. Draghi has argued that, unless Europe moves from a confederation towards a federation, the price could be permanent economic stagnation and political irrelevance. Europe’s challenge would then be facing, for the first time, the prospect of becoming increasingly marginal in global affairs.',
    'updated' => 'Last updated: 1 October 2026',

    'author' => 'By <a href="/aboutus/team/tommaso-prever.php?lang=en" style="text-decoration: underline;">Tommaso Prever</a>',
    'collab' => 'Article produced in collaboration with',
    'sources' => 'Sources',
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

if (!function_exists('ponte_article_text')) {
  function ponte_article_text($key) {
    $html = ponte_e($key);
    $phrases = array(
      'costi minori e benefici maggiori', 'difesa, del mercato unico e, infine, sul bilancio europeo',
      'tra 18 e 57 miliardi annui', '27 diversi ministeri nazionali', 'scarsa collaborazione tra gli stati membri',
      'quinta libertà', 'ricerca, innovazione e educazione', '3,6 milioni di posti di lavoro',
      'circa l’1% del pil europeo', 'giusto ritorno', 'vere risorse proprie',
      'necessità di unanimità', 'stagnazione economica permanente e di irrilevanza politica',
      'lower costs and greater benefits', 'defence, the Single Market and, finally, the European budget',
      'between €18 and €57 billion per year', '27 different national ministries', 'limited cooperation among Member States',
      'fifth freedom', 'research, innovation and education', '3.6 million jobs',
      'roughly 1% of European GDP', 'juste retour', 'genuine own resources',
      'unanimity is required', 'permanent economic stagnation and political irrelevance'
    );
    foreach ($phrases as $phrase) {
      $safe = ponte_h($phrase);
      $html = str_replace($safe, '<strong>' . $safe . '</strong>', $html);
    }
    $closing = array(
      'Il costo della non unità, quindi, rischia di non essere solo più economico, ma anche esistenziale',
      'The cost of disunity therefore risks being not only economic but existential'
    );
    foreach ($closing as $phrase) {
      $safe = ponte_h($phrase);
      $html = str_replace($safe, '<strong class="tp-closing">' . $safe . '</strong>', $html);
    }
    return $html;
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
    .tp-article > p strong { font-weight:800; }
    .tp-article .tp-closing { background:#fff29a; padding:.12em .15em; box-decoration-break:clone; -webkit-box-decoration-break:clone; }
    .tp-article .tp-sources > p { font-size:.85rem; line-height:1.6; margin:.65rem 0; overflow-wrap:anywhere; }
    .tp-article .tp-sources a { color:inherit; text-decoration:underline; text-underline-offset:3px; }
    .tp-article .tp-sources a:hover { text-decoration-thickness:2px; }
    .tp-article .tp-sources img { max-width:100%; height:auto; }
  </style>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <article class="feature feature--large tp-article" style="margin:4rem auto; max-width:720px; text-align:left;">

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

      <p><?php echo ponte_article_text('p1'); ?></p>
      <p><?php echo ponte_article_text('p2'); ?></p>
      <p><?php echo ponte_article_text('p3'); ?></p>
      <p><?php echo ponte_article_text('p4'); ?></p>
      <p><?php echo ponte_article_text('p5'); ?></p>

      <p><?php echo ponte_t('author'); ?></p>

      <hr style="margin:2rem 0; opacity:.25;">

      <section class="tp-sources" aria-label="<?php echo ponte_e('sources'); ?>">
        <p style="text-align:center; margin:0 0 .75rem;">
          <?php echo ponte_e('collab'); ?>
        </p>

        <figure style="text-align:center; margin:0 0 1rem;">
          <a href="https://giovanifederalisti.eu/" target="_blank" rel="noopener noreferrer">
            <img
              src="/aboutus/imm/logo/logo-gfe.webp"
              alt="<?php echo ponte_e('partner_alt'); ?>"
              width="160"
              height="100"
              loading="lazy"
              style="display:inline-block; border-radius:12px;"
            >
          </a>
        </figure>

        <p style="text-align:center; margin:0 0 .75rem;"><strong><?php echo ponte_e('sources'); ?></strong></p>
        <p><a href="https://commission.europa.eu/topics/eu-competitiveness_en" target="_blank" rel="noopener noreferrer">Draghi, M. (2024). The Future of European Competitiveness</a></p>
        <p><a href="https://www.eeas.europa.eu/eeas/strategic-compass-security-and-defence_en" target="_blank" rel="noopener noreferrer">European Commission / EEAS (2024). A Strategic Compass for Security and Defence</a></p>
        <p><a href="https://commission.europa.eu/strategy-and-policy/eu-budget_en" target="_blank" rel="noopener noreferrer">European Commission (2024). The EU Budget and its Financing</a></p>
        <p><a href="https://single-market-economy.ec.europa.eu/single-market_en" target="_blank" rel="noopener noreferrer">European Commission (2024). Single Market</a></p>
        <p><a href="https://eda.europa.eu/publications-and-data" target="_blank" rel="noopener noreferrer">European Defence Agency (2023). Defence Data 2022–2023</a></p>
        <p><a href="https://www.imf.org/en/Publications/WEO/weo-database" target="_blank" rel="noopener noreferrer">International Monetary Fund (2024). World Economic Outlook Database</a></p>
        <p><a href="https://www.consilium.europa.eu/en/documents-publications/publications/2024/april/much-more-than-a-market/" target="_blank" rel="noopener noreferrer">Letta, E. (2024). Much More Than a Market</a></p>
        <p><a href="https://www.nato.int/cps/en/natohq/topics_49198.htm" target="_blank" rel="noopener noreferrer">NATO (2024). Defence Expenditure of NATO Countries (2014–2024)</a></p>
        <p>Pasimeni, P. (2023). <em>The Single Market and its impact on the European economy</em>. European Commission.</p>
        <p>Baldwin, R., &amp; Wyplosz, C. (2022). <em>The Economics of European Integration</em>. McGraw-Hill Education.</p>
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
