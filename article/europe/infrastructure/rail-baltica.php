<?php
$i18nPath = __DIR__ . '/../../../i18n/i18n.php';
require_once $i18nPath;

if (!function_exists('tpl_article_get_lang')) {
  function tpl_article_get_lang() {
    if (function_exists('tp_lang')) {
      return tp_lang();
    }

    $lang = 'it';
    if (isset($_GET['lang'])) {
      $lang = strtolower(trim((string) $_GET['lang']));
    } elseif (isset($_COOKIE['tp_lang'])) {
      $lang = strtolower(trim((string) $_COOKIE['tp_lang']));
    }

    return in_array($lang, array('it', 'en'), true) ? $lang : 'it';
  }
}

$TPL_ARTICLE_LANG = tpl_article_get_lang();

if (!function_exists('tpl_article_h')) {
  function tpl_article_h($value) {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
  }
}

$TPL_ARTICLE_I18N = array(
  'it' => array(
    'title' => 'Rail Baltica: quanto costa collegare i Paesi baltici all’Europa? - TAXpedia',
    'meta_desc' => 'Costi, finanziamenti e benefici di Rail Baltica, la nuova ferrovia europea che collegherà Estonia, Lettonia e Lituania alla rete dell’Europa centrale.',
    'h2' => 'Rail Baltica: quanto costa collegare i Paesi baltici all’Europa?',
    'subtitle' => 'Una linea a scartamento europeo per integrare il Baltico, rafforzare i collegamenti con il resto dell’Unione e sostenere anche la mobilità militare.',
    'updated' => 'Ultimo aggiornamento: 16 settembre 2026',
    'author' => 'A cura di <a href="/aboutus/team/francesco-calabrese-vallino.php?lang=it" style="text-decoration: underline;">Francesco Calabrese Vallino</a>',
    'sources' => 'Fonti',
    'sources_aria' => 'Fonti dell’articolo',
    'cost_caption' => 'Evoluzione delle stime di costo di Rail Baltica',
    'body' => <<<'HTML'
      <section class="article-section">
        <h3>Un pezzo d’Europa ancora ferroviariamente separato</h3>
        <p>Estonia, Lettonia e Lituania fanno parte dell’Unione Europea dal 2004 e sono oggi integrate nello spazio Schengen e nell’area dell’euro. Sul piano ferroviario, però, resta ancora visibile una delle eredità della loro storia sovietica: gran parte delle reti dei tre Paesi utilizza uno scartamento di 1.520 millimetri, diverso dallo standard europeo di 1.435 millimetri.</p>
        <aside class="article-explainer" aria-label="Che cos’è lo scartamento ferroviario?">
          <strong>Che cos’è lo scartamento?</strong>
          <p>È la distanza tra le due rotaie di un binario. Se due reti adottano misure diverse, gli stessi treni non possono passare direttamente dall’una all’altra senza soluzioni tecniche specifiche o trasbordi.</p>
        </aside>
        <p>Rail Baltica nasce per superare questa discontinuità, creando un nuovo collegamento ferroviario a scartamento europeo lungo l’asse nord-sud del Baltico.</p>
        <p>Il tracciato principale collegherà Tallinn, Pärnu, Riga, Panevėžys e Kaunas, proseguendo poi verso la Polonia e Varsavia, con un ulteriore collegamento verso Vilnius. A nord, Tallinn rappresenta anche il punto di connessione con Helsinki, oggi raggiungibile via traghetto attraverso il Golfo di Finlandia.</p>
        <p>Rail Baltica punta così a creare un corridoio continuo tra il Nord Europa, i Paesi baltici e la rete ferroviaria dell’Europa centrale.</p>
      </section>

      <section class="article-section">
        <h3>Quanto costa Rail Baltica?</h3>
        <p>Il principale interrogativo che accompagna oggi Rail Baltica riguarda il suo costo. Le stime sono infatti aumentate in modo considerevole rispetto a quelle iniziali.</p>
        <div class="article-table-wrap">
          <table class="article-table article-table--costs">
            <caption>Evoluzione delle stime di costo di Rail Baltica</caption>
            <thead><tr><th scope="col">Scenario</th><th scope="col">Costo stimato</th></tr></thead>
            <tbody>
              <tr><th scope="row">Stima iniziale del progetto</th><td><strong>€5,8 miliardi</strong></td></tr>
              <tr><th scope="row">Prima fase prevista entro il 2030</th><td><strong>€15,3 miliardi</strong></td></tr>
              <tr><th scope="row">Progetto completo, stima attuale</th><td><strong>€23,8 miliardi</strong></td></tr>
            </tbody>
          </table>
        </div>
        <div class="article-stat"><span>+291%</span><p>Aumento del costo stimato dell’intero progetto rispetto alle previsioni iniziali, secondo la Corte dei conti europea.</p></div>
        <p>Ma come si passa da 5,8 a quasi 24 miliardi di euro?</p>
        <p>La stima del 2017 si basava innanzitutto su un progetto ancora relativamente preliminare. Con l’avanzamento della progettazione è stato possibile definire con maggiore precisione opere, quantità e costi, facendo emergere spese inizialmente sottostimate.</p>
        <p>Nel frattempo è cambiato anche il progetto stesso. Sono stati aggiunti collegamenti regionali, modificati alcuni standard tecnici e rafforzati i requisiti legati a sicurezza, prestazioni e interoperabilità. A questi elementi si sono poi aggiunte nuove esigenze strategiche, in particolare quelle relative alla mobilità militare.</p>
        <p>Una parte consistente dell’aumento deriva infine dal contesto economico. Tra il 2017 e il 2023 i Paesi baltici hanno registrato complessivamente circa il 40% di inflazione, mentre sono aumentati i prezzi dell’energia, dei materiali e delle costruzioni. Pandemia, difficoltà nelle catene di approvvigionamento e guerra in Ucraina hanno ulteriormente aggravato il quadro.</p>
        <p>I 15,3 miliardi e i 23,8 miliardi si riferiscono inoltre a due obiettivi diversi: la prima cifra riguarda la fase necessaria a rendere operativo il collegamento principale entro il 2030, mentre la seconda rappresenta il costo stimato del progetto nella sua configurazione completa.</p>
      </section>

      <section class="article-section">
        <h3>Chi paga?</h3>
        <p>Rail Baltica è un progetto europeo anche dal punto di vista finanziario. Il principale strumento utilizzato è il <em>Connecting Europe Facility</em> (CEF), il programma dell’Unione Europea dedicato alle grandi infrastrutture strategiche.</p>
        <p>Per le spese ammissibili, il contributo europeo può coprire generalmente fino all’85% dei costi, mentre la quota restante viene finanziata principalmente da Estonia, Lettonia e Lituania.</p>
        <div class="funding-card" role="img" aria-label="A marzo 2026 erano assicurati 4,4 miliardi di euro, mentre 10,9 miliardi risultavano ancora da finanziare per completare la prima fase stimata in 15,3 miliardi.">
          <div class="funding-card__head"><span><small>Già assicurati</small>€4,4 mld</span><span><small>Prima fase</small>€15,3 mld</span></div>
          <div class="funding-bar"><span style="width:28.8%"></span></div>
          <p><strong>Circa €10,9 miliardi ancora da reperire</strong><br><small>Situazione a marzo 2026</small></p>
        </div>
        <p>A marzo 2026 risultavano assicurati circa 4,4 miliardi di euro di finanziamenti complessivi, su un costo stimato di 15,3 miliardi di euro per la sola prima fase. I fondi già assicurati coprivano quindi meno di un terzo del costo stimato.</p>
        <p>Una parte significativa delle risorse, circa 10,9 miliardi, dovrà arrivare dal prossimo Quadro finanziario pluriennale europeo 2028-2034. Rail Baltica diventa così anche una scelta politica: l’UE dovrà decidere quanto continuare a investire nel progetto e quale priorità attribuirgli rispetto alle altre grandi infrastrutture europee.</p>
      </section>

      <section class="article-section">
        <h3>Cosa otteniamo in cambio?</h3>
        <p>Se i costi sono elevati, la domanda successiva è inevitabile: quali benefici dovrebbe produrre Rail Baltica?</p>
        <p>L’analisi costi-benefici commissionata dal progetto stima circa <strong>45,4 miliardi di euro di benefici complessivi</strong> a fronte dei 15,3 miliardi necessari per la prima fase.</p>
        <p>Il dato va però interpretato con cautela. Non si tratta di denaro che ritornerà direttamente nei bilanci pubblici, ma di una stima che somma effetti economici, ambientali, logistici e sociali lungo l’intero ciclo di vita dell’infrastruttura.</p>
        <div class="benefit-grid">
          <div><strong>Trasporti</strong><p>Tempi di percorrenza più brevi, maggiore capacità per le merci e un collegamento diretto con l’Europa centrale.</p></div>
          <div><strong>Economia</strong><p>Più scambi commerciali, mercati baltici più competitivi e nuovi investimenti attorno ai principali nodi.</p></div>
          <div><strong>Ambiente</strong><p>Meno emissioni, traffico e consumi energetici trasferendo passeggeri e merci alla ferrovia.</p></div>
          <div><strong>Integrazione</strong><p>Una delle principali discontinuità ferroviarie dell’Unione verrebbe finalmente eliminata.</p></div>
        </div>
        <p>Il promotore del progetto stima inoltre un possibile impatto sul PIL dei Paesi baltici nell’ordine dello 0,5-0,7%, oltre a benefici economici indiretti valutati tra 15,5 e 23,5 miliardi di euro nel periodo considerato.</p>
      </section>

      <section class="article-section">
        <h3>Da progetto economico a infrastruttura strategica</h3>
        <p>Quando Rail Baltica è stata concepita, le motivazioni principali erano soprattutto economiche: migliorare i trasporti, aumentare gli scambi e rafforzare l’integrazione dei Paesi baltici con il resto dell’Unione.</p>
        <p>Dopo il 2022, a queste motivazioni se ne è aggiunta una nuova: la sicurezza.</p>
        <p>Una rete ferroviaria interoperabile con quella dell’Europa occidentale permette infatti di spostare più facilmente non solo passeggeri e merci, ma anche personale, mezzi ed equipaggiamenti militari.</p>
        <p>Rail Baltica è così diventata una vera infrastruttura <em>dual-use</em>, pensata per un utilizzo civile ma rilevante anche per la mobilità militare. Il suo ruolo assume particolare importanza considerando la posizione geografica di Estonia, Lettonia e Lituania lungo il fianco orientale dell’Unione Europea e della NATO.</p>
        <p>Una ferrovia nata per avvicinare Tallinn e Riga a Varsavia, Berlino e al resto d’Europa è diventata quindi anche un’infrastruttura strategica per collegare logisticamente il Baltico agli altri Paesi europei. Questo nuovo valore strategico aiuta anche a spiegare perché alcuni requisiti tecnici e di sicurezza siano diventati più ambiziosi rispetto alle prime versioni del progetto.</p>
      </section>

      <section class="article-section">
        <h3>Arriverà davvero nel 2030?</h3>
        <p>Il 2030 resta la data simbolo di Rail Baltica. È entro quella scadenza che dovrebbe diventare operativa una prima connessione ferroviaria continua tra Estonia, Lettonia, Lituania, Polonia e il resto della rete europea.</p>
        <p>Ma il 2030 non rappresenta necessariamente il completamento dell’intero progetto.</p>
        <p>La strategia attuale prevede infatti una realizzazione per fasi, concentrando inizialmente le risorse sulle infrastrutture indispensabili per rendere operativo il corridoio principale. Alcune componenti potranno essere completate successivamente.</p>
        <p>Ed è proprio qui che emergono i dubbi. Il costo della prima fase è arrivato a 15,3 miliardi di euro, mentre una parte significativa dei finanziamenti deve ancora essere assicurata. A questo si aggiungono i ritardi già accumulati e la complessità di coordinare un unico grande progetto infrastrutturale tra quattro diversi Stati.</p>
      </section>

      <section class="article-section">
        <h3>Ma quanto costa non costruirla?</h3>
        <p>Il confronto reale non è necessariamente tra 23,8 miliardi e zero. Non costruire Rail Baltica significherebbe anche mantenere per decenni una parte dell’Unione ferroviariamente meno integrata, con una rete non pienamente interoperabile con quella dell’Europa centrale e maggiori difficoltà nei collegamenti di passeggeri, merci e, oggi, anche nella logistica strategica.</p>
        <p>È naturalmente impossibile attribuire un prezzo preciso a questo scenario. Ma è proprio qui che Rail Baltica mostra le due facce delle grandi infrastrutture europee.</p>
        <p>Da un lato ci sono costi crescenti, ritardi, stime iniziali rivelatesi troppo ottimistiche e una forte dipendenza dai finanziamenti pubblici. Dall’altro c’è la possibilità di eliminare una barriera infrastrutturale che continua a separare tre Stati membri - quattro, considerando anche il collegamento navale con Helsinki - dal cuore della rete ferroviaria europea.</p>
        <p>Rail Baltica diventa così qualcosa di più di una ferrovia. È un test sulla capacità dell’Unione di trasformare l’integrazione politica ed economica in infrastrutture fisiche comuni.</p>
        <p>Stabilire se quasi 24 miliardi di euro siano troppi significa quindi chiedersi non soltanto quanto costi costruire Rail Baltica, ma anche quanto valga per l’Europa collegare davvero il Baltico al resto dell’Unione.</p>
      </section>
HTML,
    'source_list' => <<<'HTML'
      <p><a href="https://www.railbaltica.org/news/rail-baltica-introduces-the-outcomes-of-the-updated-cost-benefit-analysis/" target="_blank" rel="noopener noreferrer">RB Rail AS - Updated Cost-Benefit Analysis</a>: costi della prima fase e del progetto completo, inflazione, benefici e impatto economico stimato.</p>
      <p><a href="https://www.eca.europa.eu/ECAPublications/SR-2026-02/SR-2026-02_EN.pdf" target="_blank" rel="noopener noreferrer">Corte dei conti europea - Relazione speciale 02/2026</a>: evoluzione dei costi e ritardi delle grandi infrastrutture di trasporto europee.</p>
      <p><a href="https://www.railbaltica.org/news/rail-baltica-hosts-diplomatic-briefing-for-heads-of-mission-in-riga/" target="_blank" rel="noopener noreferrer">RB Rail AS - Briefing del 25 marzo 2026</a>: finanziamenti assicurati e avanzamento della prima fase.</p>
      <p><a href="https://cinea.ec.europa.eu/programmes/connecting-europe-facility_en" target="_blank" rel="noopener noreferrer">Commissione europea, CINEA - Connecting Europe Facility</a>: programma europeo di finanziamento delle infrastrutture strategiche.</p>
HTML,
  ),

  'en' => array(
    'title' => 'Rail Baltica: What Does It Cost to Connect the Baltic States to Europe? - TAXpedia',
    'meta_desc' => 'The costs, financing and benefits of Rail Baltica, the new European-gauge railway linking Estonia, Latvia and Lithuania to Central Europe.',
    'h2' => 'Rail Baltica: What Does It Cost to Connect the Baltic States to Europe?',
    'subtitle' => 'A European-gauge line designed to integrate the Baltic region, strengthen links with the rest of the EU and support military mobility.',
    'updated' => 'Last updated: 16 September 2026',
    'author' => 'By <a href="/aboutus/team/francesco-calabrese-vallino.php?lang=en" style="text-decoration: underline;">Francesco Calabrese Vallino</a>',
    'sources' => 'Sources',
    'sources_aria' => 'Article sources',
    'cost_caption' => 'Evolution of Rail Baltica cost estimates',
    'body' => <<<'HTML'
      <section class="article-section">
        <h3>A part of Europe still separated by rail</h3>
        <p>Estonia, Latvia and Lithuania have been members of the European Union since 2004 and are now integrated into both the Schengen area and the euro area. Their railways, however, still bear a visible legacy of Soviet history: most of the three countries’ networks use a 1,520 mm track gauge, rather than the 1,435 mm European standard.</p>
        <aside class="article-explainer" aria-label="What is track gauge?">
          <strong>What is track gauge?</strong>
          <p>It is the distance between the two rails of a railway track. When two networks use different gauges, the same trains cannot travel directly between them without specific technical solutions or transfers.</p>
        </aside>
        <p>Rail Baltica is intended to overcome this break by creating a new European-gauge railway along the Baltic region’s north-south axis.</p>
        <p>The main route will connect Tallinn, Pärnu, Riga, Panevėžys and Kaunas before continuing towards Poland and Warsaw, with an additional link to Vilnius. To the north, Tallinn also provides the connection point with Helsinki, currently reached by ferry across the Gulf of Finland.</p>
        <p>Rail Baltica therefore aims to establish a continuous corridor between Northern Europe, the Baltic states and Central Europe’s railway network.</p>
      </section>

      <section class="article-section">
        <h3>How much does Rail Baltica cost?</h3>
        <p>The main question surrounding Rail Baltica today is its cost. Estimates have risen considerably compared with the original figures.</p>
        <div class="article-table-wrap">
          <table class="article-table article-table--costs">
            <caption>Evolution of Rail Baltica cost estimates</caption>
            <thead><tr><th scope="col">Scenario</th><th scope="col">Estimated cost</th></tr></thead>
            <tbody>
              <tr><th scope="row">Original project estimate</th><td><strong>€5.8 billion</strong></td></tr>
              <tr><th scope="row">First phase planned by 2030</th><td><strong>€15.3 billion</strong></td></tr>
              <tr><th scope="row">Full project, current estimate</th><td><strong>€23.8 billion</strong></td></tr>
            </tbody>
          </table>
        </div>
        <div class="article-stat"><span>+291%</span><p>Increase in the full project’s estimated cost compared with the original forecast, according to the European Court of Auditors.</p></div>
        <p>How, then, did the estimate rise from €5.8 billion to almost €24 billion?</p>
        <p>The 2017 estimate was based on a project that was still at a relatively preliminary stage. As design work advanced, structures, quantities and costs could be defined more accurately, revealing expenditure that had initially been underestimated.</p>
        <p>The project itself also changed. Regional links were added, certain technical standards were modified and requirements related to safety, performance and interoperability were strengthened. New strategic needs, especially military mobility, were added as well.</p>
        <p>A substantial part of the increase also reflects the economic environment. Between 2017 and 2023, the Baltic states experienced around 40% cumulative inflation, while energy, materials and construction costs rose. The pandemic, supply-chain disruption and the war in Ukraine made the situation more difficult.</p>
        <p>The €15.3 billion and €23.8 billion figures also refer to two different objectives: the first is the phase required to make the main connection operational by 2030, while the second is the estimated cost of the project in its complete configuration.</p>
      </section>

      <section class="article-section">
        <h3>Who pays?</h3>
        <p>Rail Baltica is European from a financial as well as an infrastructural perspective. Its main funding instrument is the Connecting Europe Facility (CEF), the EU programme for major strategic infrastructure.</p>
        <p>For eligible expenditure, EU support can generally cover up to 85% of costs, with most of the remaining share financed by Estonia, Latvia and Lithuania.</p>
        <div class="funding-card" role="img" aria-label="By March 2026, 4.4 billion euros had been secured and 10.9 billion remained to be financed for the 15.3-billion-euro first phase.">
          <div class="funding-card__head"><span><small>Secured</small>€4.4bn</span><span><small>First phase</small>€15.3bn</span></div>
          <div class="funding-bar"><span style="width:28.8%"></span></div>
          <p><strong>Approximately €10.9 billion still to be secured</strong><br><small>Position as of March 2026</small></p>
        </div>
        <p>As of March 2026, approximately €4.4 billion in total funding had been secured, against an estimated €15.3 billion for the first phase alone. The funding already in place therefore covered less than one third of its estimated cost.</p>
        <p>A significant share of the resources - around €10.9 billion - will have to come from the EU’s next 2028-2034 Multiannual Financial Framework. Rail Baltica is therefore also a political choice: the EU will have to decide how much more to invest and how to rank the project against other major European infrastructure.</p>
      </section>

      <section class="article-section">
        <h3>What do we get in return?</h3>
        <p>If the costs are high, the next question is inevitable: what benefits should Rail Baltica produce?</p>
        <p>The project’s commissioned cost-benefit analysis estimates approximately <strong>€45.4 billion in total benefits</strong>, compared with the €15.3 billion required for the first phase.</p>
        <p>This figure requires caution. It is not money that will flow directly back into public budgets, but an estimate combining economic, environmental, logistical and social effects over the infrastructure’s full life cycle.</p>
        <div class="benefit-grid">
          <div><strong>Transport</strong><p>Shorter journey times, more rail freight capacity and a direct connection to Central Europe.</p></div>
          <div><strong>Economy</strong><p>More trade, more competitive Baltic markets and new investment around major hubs.</p></div>
          <div><strong>Environment</strong><p>Lower emissions, congestion and energy use as traffic shifts from road and air to rail.</p></div>
          <div><strong>Integration</strong><p>One of the EU’s main remaining railway discontinuities would finally be removed.</p></div>
        </div>
        <p>The project promoter also estimates a potential impact of 0.5-0.7% on Baltic GDP, along with indirect economic benefits valued at between €15.5 billion and €23.5 billion over the period considered.</p>
      </section>

      <section class="article-section">
        <h3>From economic project to strategic infrastructure</h3>
        <p>When Rail Baltica was conceived, its main motivations were economic: improving transport, increasing trade and strengthening the Baltic states’ integration with the rest of the Union.</p>
        <p>After 2022, another motivation was added: security.</p>
        <p>A railway interoperable with Western Europe’s network can move not only passengers and freight more easily, but also military personnel, vehicles and equipment.</p>
        <p>Rail Baltica has thus become genuine <em>dual-use</em> infrastructure: designed for civilian use but also relevant to military mobility. This is especially important given the position of Estonia, Latvia and Lithuania on the eastern flank of both the EU and NATO.</p>
        <p>A railway created to bring Tallinn and Riga closer to Warsaw, Berlin and the rest of Europe has therefore also become strategic logistical infrastructure connecting the Baltic region to other European countries. This new strategic value also helps explain why technical and safety requirements have grown more ambitious than in the project’s earliest versions.</p>
      </section>

      <section class="article-section">
        <h3>Will it really arrive in 2030?</h3>
        <p>2030 remains Rail Baltica’s headline date. By then, the first continuous railway connection between Estonia, Latvia, Lithuania, Poland and the rest of the European network is intended to become operational.</p>
        <p>But 2030 does not necessarily mean completion of the full project.</p>
        <p>The current strategy phases delivery, initially concentrating resources on the infrastructure needed to operate the main corridor. Some components may be completed later.</p>
        <p>This is where doubts emerge. The first phase now costs an estimated €15.3 billion, while a substantial share of the financing has yet to be secured. Added to this are the delays already accumulated and the complexity of coordinating one major infrastructure project across four different countries.</p>
      </section>

      <section class="article-section">
        <h3>But what is the cost of not building it?</h3>
        <p>The real comparison is not necessarily between €23.8 billion and zero. Not building Rail Baltica would also mean leaving part of the Union less integrated by rail for decades, with a network that is not fully interoperable with Central Europe and more difficult passenger, freight and - today - strategic logistics connections.</p>
        <p>It is impossible to give this scenario a precise price. Yet this is exactly where Rail Baltica reveals the two sides of major European infrastructure.</p>
        <p>On one side are rising costs, delays, initial estimates that proved too optimistic and heavy dependence on public funding. On the other is the possibility of removing an infrastructure barrier that still separates three Member States - four if Helsinki’s sea connection is included - from the heart of Europe’s railway network.</p>
        <p>Rail Baltica is therefore becoming more than a railway. It is a test of the Union’s ability to turn political and economic integration into shared physical infrastructure.</p>
        <p>Deciding whether almost €24 billion is too much therefore means asking not only what Rail Baltica costs to build, but also what truly connecting the Baltic region to the rest of the Union is worth to Europe.</p>
      </section>
HTML,
    'source_list' => <<<'HTML'
      <p><a href="https://www.railbaltica.org/news/rail-baltica-introduces-the-outcomes-of-the-updated-cost-benefit-analysis/" target="_blank" rel="noopener noreferrer">RB Rail AS - Updated Cost-Benefit Analysis</a>: first-phase and full-project costs, inflation, benefits and estimated economic impact.</p>
      <p><a href="https://www.eca.europa.eu/ECAPublications/SR-2026-02/SR-2026-02_EN.pdf" target="_blank" rel="noopener noreferrer">European Court of Auditors - Special Report 02/2026</a>: cost evolution and delays affecting major European transport projects.</p>
      <p><a href="https://www.railbaltica.org/news/rail-baltica-hosts-diplomatic-briefing-for-heads-of-mission-in-riga/" target="_blank" rel="noopener noreferrer">RB Rail AS - Briefing of 25 March 2026</a>: secured financing and progress on the first phase.</p>
      <p><a href="https://cinea.ec.europa.eu/programmes/connecting-europe-facility_en" target="_blank" rel="noopener noreferrer">European Commission, CINEA - Connecting Europe Facility</a>: the EU funding programme for strategic infrastructure.</p>
HTML,
  ),
);

if (!function_exists('tpl_article_t')) {
  function tpl_article_t($key) {
    global $TPL_ARTICLE_LANG, $TPL_ARTICLE_I18N;
    if (isset($TPL_ARTICLE_I18N[$TPL_ARTICLE_LANG][$key])) return $TPL_ARTICLE_I18N[$TPL_ARTICLE_LANG][$key];
    if (isset($TPL_ARTICLE_I18N['it'][$key])) return $TPL_ARTICLE_I18N['it'][$key];
    return '';
  }
}

if (!function_exists('tpl_article_e')) {
  function tpl_article_e($key) {
    return tpl_article_h(tpl_article_t($key));
  }
}
?>
<!doctype html>
<html lang="<?php echo tpl_article_h($TPL_ARTICLE_LANG); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title><?php echo tpl_article_e('title'); ?></title>
  <meta name="description" content="<?php echo tpl_article_e('meta_desc'); ?>"/>

  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css"/>
  <link rel="stylesheet" href="/style/StyleTesti.css"/>

  <style>
    .tpl-article { width:100%; max-width:720px; min-width:0; box-sizing:border-box; }
    .tpl-article *, .tpl-article *::before, .tpl-article *::after { box-sizing:border-box; }
    .tpl-article .article-section { max-width:100%; min-width:0; margin:2rem 0; }
    .tpl-article .article-section h3 { margin:0 0 .8rem; font-family:"Merriweather",serif; font-size:1.3rem; line-height:1.35; }
    .tpl-article .article-explainer { margin:1.25rem 0; padding:1rem 1.1rem; border-left:4px solid #f2c94c; border-radius:0 10px 10px 0; background:rgba(242,201,76,.14); }
    .tpl-article .article-explainer p { margin:.35rem 0 0; }
    .tpl-article .article-table-wrap { width:100%; max-width:100%; min-width:0; margin:1rem 0; overflow-x:auto; -webkit-overflow-scrolling:touch; }
    .tpl-article .article-table { width:100%; min-width:520px; border-collapse:collapse; font-family:"Inter",sans-serif; font-size:.9rem; }
    .tpl-article .article-table caption { position:absolute; width:1px; height:1px; padding:0; margin:-1px; overflow:hidden; clip:rect(0,0,0,0); white-space:nowrap; border:0; }
    .tpl-article .article-table th, .tpl-article .article-table td { padding:.75rem .7rem; border:1px solid rgba(0,0,0,.2); text-align:left; vertical-align:middle; }
    .tpl-article .article-table thead th { background:rgba(0,0,0,.055); }
    .tpl-article .article-table--costs td { white-space:nowrap; }
    .tpl-article .article-stat { display:flex; align-items:center; gap:1rem; margin:1.2rem 0; padding:1rem 1.15rem; border-radius:12px; background:#12304a; color:#fff; }
    .tpl-article .article-stat span { flex:0 0 auto; color:#f2c94c; font-family:"Inter",sans-serif; font-size:1.65rem; font-weight:800; }
    .tpl-article .article-stat p { margin:0; font-size:.92rem; line-height:1.5; }
    .tpl-article .funding-card { margin:1.35rem 0; padding:1.15rem; border:1px solid rgba(0,0,0,.16); border-radius:12px; background:rgba(0,0,0,.02); font-family:"Inter",sans-serif; }
    .tpl-article .funding-card__head { display:flex; justify-content:space-between; gap:1rem; font-size:1.25rem; font-weight:800; }
    .tpl-article .funding-card__head span:last-child { text-align:right; }
    .tpl-article .funding-card small { display:block; font-size:.72rem; font-weight:400; opacity:.72; }
    .tpl-article .funding-bar { height:16px; margin:.85rem 0; overflow:hidden; border-radius:999px; background:#d8dee4; }
    .tpl-article .funding-bar span { display:block; height:100%; border-radius:inherit; background:#f2c94c; }
    .tpl-article .funding-card p { margin:.25rem 0 0; text-align:center; }
    .tpl-article .benefit-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:.8rem; margin:1.25rem 0; }
    .tpl-article .benefit-grid div { min-width:0; padding:1rem; border:1px solid rgba(0,0,0,.15); border-radius:10px; background:rgba(0,0,0,.02); }
    .tpl-article .benefit-grid p { margin:.35rem 0 0; font-size:.9rem; line-height:1.5; }
    .tpl-article .article-sources a { color:inherit; text-decoration:underline; text-underline-offset:2px; overflow-wrap:anywhere; word-break:break-word; }
    @media (max-width:720px) {
      html, body { width:100%; max-width:100%; overflow-x:hidden; }
      #main.container { width:100%!important; max-width:100%!important; min-width:0!important; padding-left:16px!important; padding-right:16px!important; box-sizing:border-box!important; overflow:hidden; }
      #main > .tpl-article { width:100%!important; max-width:100%!important; min-width:0!important; margin-left:0!important; margin-right:0!important; box-sizing:border-box!important; overflow:hidden; }
      .tpl-article .article-table-wrap { display:block; width:100%; max-width:100%; min-width:0; overflow-x:auto; overflow-y:hidden; }
      .tpl-article .article-table { width:520px; min-width:520px; max-width:none; }
      .tpl-article .benefit-grid { grid-template-columns:1fr; }
      .tpl-article .article-sources, .tpl-article .article-sources p, .tpl-article .article-sources a { max-width:100%; overflow-wrap:anywhere; word-break:break-word; }
    }
  </style>
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <article class="feature feature--large tpl-article" style="margin:4rem auto; max-width:720px; text-align:left;">
      <header style="margin-bottom:1.25rem;">
        <h2 class="section-title" style="margin-bottom:.35rem;"><?php echo tpl_article_e('h2'); ?></h2>
        <p class="subtitle" style="margin:.25rem 0 0;"><?php echo tpl_article_e('subtitle'); ?></p>
        <p class="meta" style="margin:.5rem 0 0;"><small><?php echo tpl_article_e('updated'); ?></small></p>
      </header>

      <?php echo tpl_article_t('body'); ?>

      <?php if (tpl_article_t('author') !== ''): ?>
        <p><?php echo tpl_article_t('author'); ?></p>
      <?php endif; ?>

      <hr style="margin:2rem 0; opacity:.25;">
      <section class="article-sources" aria-label="<?php echo tpl_article_e('sources_aria'); ?>">
        <p style="text-align:center; margin:0 0 .5rem;"><strong><?php echo tpl_article_e('sources'); ?></strong></p>
        <?php echo tpl_article_t('source_list'); ?>
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
  <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
  <noscript><div class="statcounter"><a title="hit counter" href="https://statcounter.com/" target="_blank" rel="noopener"><img class="statcounter" src="https://c.statcounter.com/13170178/0/f093464a/1/" alt="hit counter" referrerpolicy="no-referrer-when-downgrade"></a></div></noscript>
  <!-- End of Statcounter Code -->
</body>
</html>
