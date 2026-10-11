<?php
$i18nPath = __DIR__ . '/../../../i18n/i18n.php';
if (!is_file($i18nPath)) {
  $i18nPath = __DIR__ . '/../../../i18n/i18n.php';
}
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
    'title' => 'Il biglietto non basta: chi paga davvero il trasporto pubblico? - TAXpedia',
    'meta_desc' => 'Dal Fondo nazionale TPL ai ricavi da biglietti: come viene finanziato il trasporto pubblico italiano, con un focus su Milano e un confronto con Roma, Genova e Napoli.',
    'h2' => 'Il biglietto non basta: chi paga davvero il trasporto pubblico?',
    'subtitle' => 'Dal Fondo nazionale TPL ai biglietti dei passeggeri: seguiamo il percorso delle risorse che finanziano autobus, tram e metropolitane, con un focus sul caso di Milano.',
    'updated' => 'Ultimo aggiornamento: 5 ottobre 2026',
    'author' => 'A cura di <a href="/aboutus/team/francesco-calabrese-vallino.php?lang=it" style="text-decoration: underline;">Francesco Calabrese Vallino</a>',
    'sources' => 'Fonti',
    'sources_aria' => 'Fonti dell’articolo',
    'table_caption' => 'Costo del biglietto singolo e quota dei costi coperta dalla bigliettazione',
    'body' => <<<'HTML'
      <section class="article-section">
        <h3>Il biglietto non paga tutto</h3>
        <p>Ogni giorno milioni di persone salgono su autobus, tram e metropolitane pagando un biglietto o un abbonamento. È la parte più visibile del costo del trasporto pubblico: paghiamo per viaggiare e, intuitivamente, potremmo pensare che siano proprio quei ricavi a finanziare il servizio.</p>
        <p>In realtà non è così. <strong>Le tariffe pagate dai passeggeri coprono solo una parte</strong> delle risorse necessarie a far circolare i mezzi, pagare il personale, garantire manutenzione e continuità del servizio. Accanto ai ricavi da biglietti e abbonamenti intervengono infatti lo Stato, le Regioni e gli enti locali, attraverso trasferimenti e risorse proprie.</p>
        <p>Da qui nasce la domanda: <strong>chi finanzia davvero il trasporto pubblico italiano?</strong></p>
      </section>

      <section class="article-section">
        <h3>Da dove arrivano i soldi</h3>
        <p>Per capire il sistema possiamo immaginare una catena.</p>
        <div class="funding-route"><ol><li><span class="route-dot" aria-hidden="true"></span><strong>Stato</strong></li><li><span class="route-dot" aria-hidden="true"></span><strong>Regioni</strong></li><li><span class="route-dot" aria-hidden="true"></span><strong>Agenzie ed enti locali</strong><small>Contratti di servizio</small></li><li><span class="route-dot" aria-hidden="true"></span><strong>Operatori del TPL</strong></li></ol></div>
        <p>Lo Stato mette a disposizione una parte importante delle risorse attraverso il Fondo nazionale destinato al trasporto pubblico locale. Le Regioni ricevono questi fondi e possono integrarli con risorse proprie. A livello territoriale entrano poi in gioco le Agenzie del TPL e gli enti affidanti, che programmano i servizi e regolano i rapporti economici con le aziende che materialmente fanno circolare autobus, tram e metropolitane. Il biglietto, quindi, è soltanto uno dei flussi che tengono in piedi il sistema.</p>
      </section>

      <section class="article-section">
        <h3>Il Fondo nazionale per il trasporto pubblico locale</h3>
        <p>Il suo nome completo è <em>Fondo nazionale per il concorso finanziario dello Stato agli oneri del trasporto pubblico locale, anche ferroviario</em>. È stato istituito a decorrere dal 2013 e <strong>riguarda le Regioni a statuto ordinario</strong>.</p>
        <p>Per seguire il percorso del denaro senza mischiare annualità differenti prendiamo come riferimento il 2025. In quell’esercizio, sul capitolo 1315 del Ministero delle Infrastrutture e dei Trasporti erano stanziati 5.345.754.000 euro. Sottratti 4,2 milioni destinati al funzionamento dell’Osservatorio, il decreto ripartisce 5.341.554.000 euro. Il provvedimento richiama inoltre la riduzione permanente di un milione di euro prevista per il concorso agli obiettivi di finanza pubblica.</p>
        <p>Ma come si passa da oltre cinque miliardi stanziati a Roma a un autobus che attraversa una città?</p>
      </section>

      <section class="article-section">
        <h3>Da Roma alla Lombardia</h3>
        <p>Nel riparto definitivo del Fondo per il 2025 alla Lombardia sono stati attribuiti complessivamente circa <strong>953,8 milioni di euro</strong>.</p>
        <p>Qui serve però una precisazione. La Lombardia ha una quota storica del 17,36%, ma questa percentuale nel 2025 è stata applicata a una componente del Fondo pari a circa 4,873 miliardi, dalla quale alla Regione derivavano circa 845,9 milioni. Altre risorse sono state poi distribuite sulla base dei costi standard e di ulteriori criteri, portando l’assegnazione complessiva lombarda a 953,8 milioni. Dire semplicemente che «alla Lombardia va il 17,36% del Fondo» sarebbe quindi impreciso.</p>
        <p>Inoltre, il Fondo nazionale <strong>comprende anche il trasporto ferroviario regionale</strong>: la cifra assegnata alla Lombardia non coincide con quanto viene successivamente trasferito alle sole Agenzie territoriali del TPL.</p>
      </section>

      <section class="article-section">
        <h3>Dalla Regione alle Agenzie del TPL</h3>
        <p>Nel maggio 2025 Regione Lombardia ha effettuato una prima assegnazione di <strong>665,95 milioni di euro</strong> alle Agenzie del trasporto pubblico locale. Di queste risorse, circa 515,07 milioni provenivano dal Fondo nazionale, mentre altri 150,87 milioni erano <strong>risorse autonome regionali</strong>.</p>
        <p>La sola Agenzia del TPL della Città metropolitana di Milano, Monza e Brianza, Lodi e Pavia ricevette in questa prima assegnazione circa 437,48 milioni di euro, pari a oltre il 65% delle risorse distribuite alle Agenzie lombarde. Di questi, circa 337,78 milioni erano coperti dal Fondo nazionale e 99,70 milioni da risorse autonome della Regione.</p>
        <p>Un dettaglio importante riguarda il dato dei 671 milioni spesso utilizzato dalla Regione: la delibera di maggio attribuiva circa 666 milioni alle Agenzie per il 2025 e prevedeva separatamente altri 5 milioni per i servizi nelle aree montane e a domanda debole nel 2026.</p>
      </section>

      <section class="article-section">
        <h3>E poi arriviamo a Milano</h3>
        <p>Scendendo ancora di livello, il Rendiconto 2025 del Comune di Milano permette di vedere concretamente le principali fonti che alimentano il sistema.</p>
        <p>Da una parte ci sono i passeggeri: nel 2025 il Comune ha registrato <strong>404,1 milioni di euro</strong> di proventi dalle tariffe del trasporto pubblico locale. Dall’altra c’è il finanziamento pubblico: nello stesso anno il contributo regionale per il TPL riversato dall’Agenzia di bacino al Comune è stato pari a <strong>270,8 milioni di euro</strong>.</p>
        <p>Il costo complessivo del servizio considerato nel Rendiconto 2025 è pari a circa 963 milioni di euro. I ricavi tariffari ne coprono quindi il 42,0%, mentre il contributo regionale rappresenta circa il 28,1%. Rimane una quota residua di circa 288,1 milioni, pari al 29,9%, coperta attraverso risorse comunali e altre entrate.</p>
        <figure class="milan-chart"><figcaption><strong>Milano: chi finanzia il servizio?</strong><span>Costo del servizio considerato: circa 963 milioni € · 2025</span></figcaption><div class="funding-bar" aria-hidden="true"><span class="funding-segment segment-0" style="width:42%">42,0%</span><span class="funding-segment segment-1" style="width:28.1%">28,1%</span><span class="funding-segment segment-2" style="width:29.9%">29,9%</span></div><ul class="funding-legend"><li><i class="segment-0" aria-hidden="true"></i><div><strong>Biglietti e abbonamenti</strong><span>404,1 milioni € · 42,0%</span></div></li><li><i class="segment-1" aria-hidden="true"></i><div><strong>Contributo regionale tramite Agenzia</strong><span>270,8 milioni € · 28,1%</span></div></li><li><i class="segment-2" aria-hidden="true"></i><div><strong>Risorse comunali e altre entrate</strong><span>288,1 milioni € · 29,9%</span></div></li></ul><p class="graphic-source">Fonte: Comune di Milano, Rendiconto 2025. Quota residua calcolata sui valori riportati nell’articolo.</p></figure>
        <p>Confrontando soltanto tariffe e contributo regionale, per ogni euro proveniente dalla bigliettazione compaiono circa 67 centesimi di contributo regionale. Il rapporto rende immediatamente visibile quanto il sistema non possa essere letto attraverso il solo prezzo del biglietto.</p>
        <p>C’è poi un’ulteriore particolarità del modello milanese. Il contratto di servizio tra Comune di Milano e ATM è di tipo <em>gross cost</em>: <strong>i ricavi provenienti dalla vendita dei titoli di viaggio spettano al Comune</strong>, mentre il Comune riconosce ad ATM un corrispettivo annuale per l’erogazione del servizio, calcolato sulla base delle vetture-chilometro effettuate. Il contratto è stato prorogato fino al 31 dicembre 2026.</p>
        <p>In altre parole, quando compriamo un biglietto ATM, quei soldi non costituiscono semplicemente il «fatturato con cui ATM paga gli autobus». Entrano in un sistema più ampio nel quale ricavi tariffari e risorse pubbliche vengono utilizzati dall’ente pubblico per finanziare il servizio previsto dal contratto.</p>
      </section>

      <section class="article-section">
        <h3>Quindi, chi paga davvero?</h3>
        <p>La risposta è: <strong>tutti, ma in modi diversi</strong>.</p>
        <p>Il passeggero contribuisce direttamente quando acquista un biglietto o un abbonamento. Lo Stato finanzia il sistema attraverso il Fondo nazionale. Le Regioni redistribuiscono quelle risorse e aggiungono fondi propri. Agenzie ed enti locali le fanno arrivare ai territori e, attraverso i contratti di servizio, agli operatori che materialmente erogano il trasporto.</p>
        
        <p>Gli importi della catena non sono quote perfettamente sovrapponibili: il Fondo assegnato alla Lombardia comprende anche il trasporto ferroviario, mentre le risorse destinate alle Agenzie combinano fondi nazionali e regionali.</p>
        <p>Il prezzo che vediamo sul biglietto è quindi soltanto la parte più evidente di un meccanismo finanziario molto più grande. Il biglietto non copre l’intero costo del viaggio, ma rappresenta la quota chiesta direttamente a chi quel viaggio lo compie. <mark class="article-highlight">Il resto viene finanziato collettivamente, perché il trasporto pubblico non è considerato soltanto un servizio per chi sale a bordo, ma un’infrastruttura necessaria al funzionamento delle città e dei territori.</mark></p>
      </section>

      <section class="article-section">
        <h3>Confronto con altre città</h3>
        <div class="article-table-wrap">
          <table class="article-table">
            <caption>Costo del biglietto singolo e quota dei costi coperta dalla bigliettazione</caption>
            <thead>
              <tr>
                <th scope="col">Città</th>
                <th scope="col">Biglietto singolo urbano</th>
                <th scope="col">Costi operativi considerati</th>
                <th scope="col">Quota coperta dalla bigliettazione</th>
                <th scope="col">Anno</th>
              </tr>
            </thead>
            <tbody>
              <tr><th scope="row">Milano</th><td>€2,20</td><td>€963,0 milioni</td><td class="share-cell"><strong>42,0%</strong><span class="share-track" aria-hidden="true"><span style="width:42.0%"></span></span></td><td>2025</td></tr>
              <tr><th scope="row">Roma</th><td>€1,50</td><td>€846,3 milioni</td><td class="share-cell"><strong>26,2%</strong><span class="share-track" aria-hidden="true"><span style="width:26.2%"></span></span></td><td>2024</td></tr>
              <tr><th scope="row">Genova</th><td>€2,00</td><td>€223,4 milioni</td><td class="share-cell"><strong>24,8%</strong><span class="share-track" aria-hidden="true"><span style="width:24.8%"></span></span></td><td>2023</td></tr>
              <tr><th scope="row">Napoli</th><td>€1,80<sup>*</sup></td><td>€133,4 milioni</td><td class="share-cell"><strong>35,0%</strong><span class="share-track" aria-hidden="true"><span style="width:35.0%"></span></span></td><td>2023</td></tr>
            </tbody>
          </table>
        </div>
        <p class="article-note"><sup>*</sup> Per Napoli è stato utilizzato il biglietto integrato urbano da 90 minuti, più confrontabile con quelli delle altre città. Il biglietto aziendale costa €1,30 per autobus e funicolari e €1,50 per la metropolitana.</p>
        <p class="article-note"><strong>Nota metodologica.</strong> La percentuale è calcolata dividendo i ricavi complessivi da biglietti e abbonamenti per i costi operativi considerati nella relativa fonte. Le annualità, i perimetri territoriali e i criteri contabili non sono perfettamente omogenei tra le città; il confronto deve quindi essere letto come indicativo. Il prezzo del biglietto singolo è riportato come informazione tariffaria e non è utilizzato direttamente nel calcolo della percentuale.</p>
      </section>
HTML,
    'collab' => 'Articolo realizzato in collaborazione con',
    'partner_alt' => 'TrasportaMilano',
    'source_list' => <<<'HTML'
      <p><a href="https://www.mit.gov.it/normativa/decreto-interministeriale-n-337-del-17122025">Ministero delle Infrastrutture e dei Trasporti - Decreto interministeriale n. 337/2025</a>: stanziamento, perimetro e riparto definitivo del Fondo nazionale TPL per il 2025.</p>
      <p><a href="https://www.lombardiaspeciale.regione.lombardia.it/wps/wcm/connect/e50b7d05-9256-4e1d-b127-ddf67ffba9e6/16.GIUNTA_12-05.pdf?MOD=AJPERES">Regione Lombardia - DGR XII/4355 del 12 maggio 2025</a>: prima assegnazione 2025 alle Agenzie del TPL.</p>
      <p><a href="https://www.lombardianotizie.online/tpl-lombardia-2025/">Lombardia Notizie - 12 maggio 2025</a>: dettaglio dei 671 milioni comunicati dalla Regione.</p>
      <p><a href="https://www2.comune.milano.it/documents/20126/517255227/02%2BRelazione%2Bsulla%2Bgestione%2B2025.pdf/3d1a24a0-1fa9-9b59-9757-0064a6e0fb4a?t=1778840185820">Comune di Milano - Relazione sulla gestione, Rendiconto 2025</a>: proventi tariffari, contributo regionale e costo del servizio.</p>
      <p><a href="https://www.atm.it/it/IlGruppo/ChiSiamo/Documents/Carta%20della%20Mobilit%C3%A0%20ATM%202026.pdf">ATM - Carta della Mobilità 2026</a>: contratto di servizio in regime <em>gross cost</em>, titolarità comunale dei ricavi e proroga al 31 dicembre 2026.</p>
      <p><a href="https://trasparenza.atac.roma.it/moduli/downloadFile.php?file=oggetto_allegati/2515316142023792990O__Obilancio_atac_al_31122024.pdf">ATAC - Bilancio di esercizio 2024</a>, <a href="https://www.amt.genova.it/amt/wp-content/uploads/2024/10/BILANCIO-DI-ESERCIZIO-CIVILISTICO-2023.pdf">AMT Genova - Bilancio di esercizio 2023</a> e <a href="https://trasparenza.comune.napoli.it/flex/cm/pages/ServeAttachment.php/L/IT/D/1%252Fb%252F6%252FD.90d72acad55cf88490f9/P/BLOB%3AID%3D28295/E/pdf?mode=download">Comune di Napoli - Relazione sul TPL urbano 2023</a>: costi operativi e ricavi tariffari utilizzati nel confronto.</p>
      <p>Tariffe: <a href="https://www.atm.it/it/ViaggiaConNoi/Biglietti/Pagine/Tipologie.aspx">ATM Milano</a>, <a href="https://www.atac.roma.it/biglietti-e-abbonamenti">ATAC Roma</a>, <a href="https://www.amt.genova.it/amt/biglietti-e-abbonamenti-2/biglietti-e-carnet/">AMT Genova</a> e <a href="https://www2.anm.it/images/stories/tabella_principali_tariffe_maggio_24.pdf">ANM Napoli</a>.</p>
HTML,
  ),

  'en' => array(
    'title' => 'A Ticket Is Not Enough: Who Really Pays for Public Transport? - TAXpedia',
    'meta_desc' => 'From Italy’s National Public Transport Fund to fare revenue: how public transport is financed, with a focus on Milan and a comparison with Rome, Genoa and Naples.',
    'h2' => 'A Ticket Is Not Enough: Who Really Pays for Public Transport?',
    'subtitle' => 'From the National Public Transport Fund to passenger fares: we follow the flow of money financing buses, trams and metro systems, with a focus on Milan.',
    'updated' => 'Last updated: 5 October 2026',
    'author' => 'By <a href="/aboutus/team/francesco-calabrese-vallino.php?lang=en" style="text-decoration: underline;">Francesco Calabrese Vallino</a>',
    'sources' => 'Sources',
    'sources_aria' => 'Article sources',
    'table_caption' => 'Single-ticket price and share of costs covered by fare revenue',
    'body' => <<<'HTML'
      <section class="article-section">
        <h3>The ticket does not pay for everything</h3>
        <p>Every day, millions of people board buses, trams and metro trains after buying a ticket or travel pass. This is the most visible part of the cost of public transport: we pay to travel and might intuitively assume that this revenue finances the service.</p>
        <p>In fact, <strong>fares cover only part</strong> of the resources needed to operate vehicles, pay staff and ensure maintenance and service continuity. Alongside ticket and pass revenue, the national government, Regions and local authorities contribute through transfers and their own resources.</p>
        <p>This raises a question: <strong>who really finances public transport in Italy?</strong></p>
      </section>

      <section class="article-section">
        <h3>Where the money comes from</h3>
        <p>The system can be understood as a chain.</p>
        <div class="funding-route"><ol><li><span class="route-dot" aria-hidden="true"></span><strong>National government</strong></li><li><span class="route-dot" aria-hidden="true"></span><strong>Regions</strong></li><li><span class="route-dot" aria-hidden="true"></span><strong>Agencies and local authorities</strong><small>Service contracts</small></li><li><span class="route-dot" aria-hidden="true"></span><strong>Public transport operators</strong></li></ol></div>
        <p>The national government provides a significant share of resources through the National Public Transport Fund. Regions receive this funding and may add resources of their own. Local public transport agencies and awarding authorities then plan services and regulate the financial relationship with the companies that operate buses, trams and metro systems. The ticket is therefore only one of the financial flows supporting the system.</p>
      </section>

      <section class="article-section">
        <h3>The National Public Transport Fund</h3>
        <p>Its full name is the <em>National Fund for the State’s financial contribution to the costs of local public transport, including rail</em>. It was established from 2013 and <strong>covers Italy’s ordinary-statute Regions</strong>.</p>
        <p>To follow the flow of money without mixing different periods, we use 2025 as the reference year. In that financial year, €5,345,754,000 was allocated under chapter 1315 of the Ministry of Infrastructure and Transport. After deducting €4.2 million for the Observatory’s operating costs, the decree distributes €5,341,554,000. It also refers to the permanent €1 million reduction introduced as a contribution to public-finance objectives.</p>
        <p>But how does more than €5 billion allocated in Rome translate into a bus crossing a city?</p>
      </section>

      <section class="article-section">
        <h3>From Rome to Lombardy</h3>
        <p>Under the final 2025 allocation, Lombardy received approximately <strong>€953.8 million</strong>.</p>
        <p>This figure requires some explanation. Lombardy has a historical share of 17.36%, but in 2025 this percentage was applied to a €4.873 billion component of the Fund, producing approximately €845.9 million for the Region. Further resources were allocated using standard costs and other criteria, bringing Lombardy’s overall allocation to €953.8 million. It would therefore be inaccurate simply to say that Lombardy receives 17.36% of the entire Fund.</p>
        <p>The national Fund <strong>also includes regional rail</strong>. The amount assigned to Lombardy consequently differs from the amount later transferred solely to local public transport agencies.</p>
      </section>

      <section class="article-section">
        <h3>From the Region to public transport agencies</h3>
        <p>In May 2025, the Lombardy Region made an initial allocation of <strong>€665.95 million</strong> to local public transport agencies. Approximately €515.07 million came from the national Fund, while €150.87 million consisted of <strong>the Region’s own resources</strong>.</p>
        <p>The agency covering the Metropolitan City of Milan, Monza and Brianza, Lodi and Pavia received approximately €437.48 million in this first allocation, more than 65% of the resources distributed to Lombardy’s agencies. Of this amount, approximately €337.78 million was covered by the national Fund and €99.70 million by the Region’s own resources.</p>
        <p>An important detail concerns the €671 million figure often used by the Region: the May resolution allocated approximately €666 million to the agencies for 2025 and separately provided another €5 million for transport in mountain and low-demand areas in 2026.</p>
      </section>

      <section class="article-section">
        <h3>And then we arrive in Milan</h3>
        <p>Moving further down the chain, the City of Milan’s 2025 financial statements show the main sources supporting the system.</p>
        <p>Passengers are one source: in 2025 the City recorded <strong>€404.1 million</strong> in local public transport fare revenue. Public funding is another: in the same year, the regional contribution transferred to the City through the transport agency amounted to <strong>€270.8 million</strong>.</p>
        <p>The total cost of the service considered in the 2025 statements was approximately €963 million. Fare revenue therefore covered 42.0%, while the regional contribution represented approximately 28.1%. A remaining share of approximately €288.1 million, or 29.9%, was covered through municipal resources and other revenue.</p>
        <figure class="milan-chart"><figcaption><strong>Milan: who funds the service?</strong><span>Service cost considered: approximately €963 million · 2025</span></figcaption><div class="funding-bar" aria-hidden="true"><span class="funding-segment segment-0" style="width:42%">42.0%</span><span class="funding-segment segment-1" style="width:28.1%">28.1%</span><span class="funding-segment segment-2" style="width:29.9%">29.9%</span></div><ul class="funding-legend"><li><i class="segment-0" aria-hidden="true"></i><div><strong>Tickets and travel passes</strong><span>€404.1 million · 42.0%</span></div></li><li><i class="segment-1" aria-hidden="true"></i><div><strong>Regional contribution through the agency</strong><span>€270.8 million · 28.1%</span></div></li><li><i class="segment-2" aria-hidden="true"></i><div><strong>Municipal resources and other revenue</strong><span>€288.1 million · 29.9%</span></div></li></ul><p class="graphic-source">Source: City of Milan, 2025 financial statements. Remaining share calculated from the figures reported in the article.</p></figure>
        <p>Comparing fares and the regional contribution alone, every euro from fare revenue was accompanied by approximately 67 cents of regional funding. This immediately shows why the system cannot be understood solely through the ticket price.</p>
        <p>Milan also has a distinctive contractual model. The service contract between the City of Milan and ATM is a <em>gross-cost</em> contract: <strong>fare revenue belongs to the City</strong>, which pays ATM an annual fee for operating the service, calculated according to vehicle-kilometres supplied. The contract has been extended until 31 December 2026.</p>
        <p>In other words, the money paid for an ATM ticket is not simply the revenue with which ATM pays for buses. It enters a broader system in which fare revenue and public resources are used by the public authority to finance the service set out in the contract.</p>
      </section>

      <section class="article-section">
        <h3>So, who really pays?</h3>
        <p>The answer is: <strong>everyone, but in different ways</strong>.</p>
        <p>Passengers contribute directly when they buy a ticket or pass. The national government finances the system through the Fund. Regions redistribute these resources and add their own funding. Agencies and local authorities channel the money to local services and, through service contracts, to the operators that provide transport.</p>
        
        <p>The figures in this chain are not perfectly overlapping shares: Lombardy’s allocation also includes regional rail, while the resources assigned to agencies combine national and regional funding.</p>
        <p>The price displayed on a ticket is therefore only the most visible part of a much larger financial mechanism. A ticket does not cover the full cost of a journey; it represents the share charged directly to the passenger. <mark class="article-highlight">The rest is financed collectively because public transport is not merely a service for those on board, but an essential part of the infrastructure on which cities and territories depend.</mark></p>
      </section>

      <section class="article-section">
        <h3>Comparison with other cities</h3>
        <div class="article-table-wrap">
          <table class="article-table">
            <caption>Single-ticket price and share of costs covered by fare revenue</caption>
            <thead>
              <tr>
                <th scope="col">City</th>
                <th scope="col">Single urban ticket</th>
                <th scope="col">Operating costs considered</th>
                <th scope="col">Share covered by fares</th>
                <th scope="col">Year</th>
              </tr>
            </thead>
            <tbody>
              <tr><th scope="row">Milan</th><td>€2.20</td><td>€963.0 million</td><td class="share-cell"><strong>42.0%</strong><span class="share-track" aria-hidden="true"><span style="width:42.0%"></span></span></td><td>2025</td></tr>
              <tr><th scope="row">Rome</th><td>€1.50</td><td>€846.3 million</td><td class="share-cell"><strong>26.2%</strong><span class="share-track" aria-hidden="true"><span style="width:26.2%"></span></span></td><td>2024</td></tr>
              <tr><th scope="row">Genoa</th><td>€2.00</td><td>€223.4 million</td><td class="share-cell"><strong>24.8%</strong><span class="share-track" aria-hidden="true"><span style="width:24.8%"></span></span></td><td>2023</td></tr>
              <tr><th scope="row">Naples</th><td>€1.80<sup>*</sup></td><td>€133.4 million</td><td class="share-cell"><strong>35.0%</strong><span class="share-track" aria-hidden="true"><span style="width:35.0%"></span></span></td><td>2023</td></tr>
            </tbody>
          </table>
        </div>
        <p class="article-note"><sup>*</sup> For Naples, the 90-minute integrated urban ticket was used because it is more comparable with the tickets offered in the other cities. ANM’s operator-only ticket costs €1.30 for buses and funiculars and €1.50 for the metro.</p>
        <p class="article-note"><strong>Methodological note.</strong> The percentage is calculated by dividing total ticket and pass revenue by the operating costs considered in the relevant source. The years, geographical scopes and accounting criteria are not perfectly consistent across cities, so the comparison should be treated as indicative. The single-ticket price is included as tariff information and is not used directly to calculate the percentage.</p>
      </section>
HTML,
    'collab' => 'Article produced in collaboration with',
    'partner_alt' => 'TrasportaMilano',
    'source_list' => <<<'HTML'
      <p><a href="https://www.mit.gov.it/normativa/decreto-interministeriale-n-337-del-17122025">Italian Ministry of Infrastructure and Transport - Interministerial Decree No. 337/2025</a>: size, scope and final 2025 allocation of the National Public Transport Fund.</p>
      <p><a href="https://www.lombardiaspeciale.regione.lombardia.it/wps/wcm/connect/e50b7d05-9256-4e1d-b127-ddf67ffba9e6/16.GIUNTA_12-05.pdf?MOD=AJPERES">Lombardy Region - Resolution XII/4355 of 12 May 2025</a>: first 2025 allocation to local public transport agencies.</p>
      <p><a href="https://www.lombardianotizie.online/tpl-lombardia-2025/">Lombardia Notizie - 12 May 2025</a>: breakdown of the €671 million announced by the Region.</p>
      <p><a href="https://www2.comune.milano.it/documents/20126/517255227/02%2BRelazione%2Bsulla%2Bgestione%2B2025.pdf/3d1a24a0-1fa9-9b59-9757-0064a6e0fb4a?t=1778840185820">City of Milan - 2025 Management Report</a>: fare revenue, regional contribution and service cost.</p>
      <p><a href="https://www.atm.it/it/IlGruppo/ChiSiamo/Documents/Carta%20della%20Mobilit%C3%A0%20ATM%202026.pdf">ATM - 2026 Mobility Charter</a>: gross-cost service contract, municipal ownership of fare revenue and extension to 31 December 2026.</p>
      <p><a href="https://trasparenza.atac.roma.it/moduli/downloadFile.php?file=oggetto_allegati/2515316142023792990O__Obilancio_atac_al_31122024.pdf">ATAC - 2024 Financial Statements</a>, <a href="https://www.amt.genova.it/amt/wp-content/uploads/2024/10/BILANCIO-DI-ESERCIZIO-CIVILISTICO-2023.pdf">AMT Genoa - 2023 Financial Statements</a> and <a href="https://trasparenza.comune.napoli.it/flex/cm/pages/ServeAttachment.php/L/IT/D/1%252Fb%252F6%252FD.90d72acad55cf88490f9/P/BLOB%3AID%3D28295/E/pdf?mode=download">City of Naples - 2023 Urban Public Transport Report</a>: operating costs and fare revenue used in the comparison.</p>
      <p>Fares: <a href="https://www.atm.it/it/ViaggiaConNoi/Biglietti/Pagine/Tipologie.aspx">ATM Milan</a>, <a href="https://www.atac.roma.it/biglietti-e-abbonamenti">ATAC Rome</a>, <a href="https://www.amt.genova.it/amt/biglietti-e-abbonamenti-2/biglietti-e-carnet/">AMT Genoa</a> and <a href="https://www2.anm.it/images/stories/tabella_principali_tariffe_maggio_24.pdf">ANM Naples</a>.</p>
HTML,
  ),
);

if (!function_exists('tpl_article_t')) {
  function tpl_article_t($key) {
    global $TPL_ARTICLE_LANG, $TPL_ARTICLE_I18N;

    if (isset($TPL_ARTICLE_I18N[$TPL_ARTICLE_LANG][$key])) {
      return $TPL_ARTICLE_I18N[$TPL_ARTICLE_LANG][$key];
    }
    if (isset($TPL_ARTICLE_I18N['it'][$key])) {
      return $TPL_ARTICLE_I18N['it'][$key];
    }

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
    .tpl-article .article-section { margin: 2rem 0; }
    .tpl-article .article-section h3 {
      font-family: "Merriweather", serif;
      font-size: 1.3rem;
      line-height: 1.35;
      margin: 0 0 .8rem;
    }
    .tpl-article {
      width: 100%;
      max-width: 720px;
      min-width: 0;
      box-sizing: border-box;
    }
    .tpl-article *,
    .tpl-article *::before,
    .tpl-article *::after {
      box-sizing: border-box;
    }
    .tpl-article .article-section {
      max-width: 100%;
      min-width: 0;
    }
    .tpl-article .article-table-wrap {
      width: 100%;
      max-width: 100%;
      min-width: 0;
      margin: 1rem 0;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }
    .tpl-article .article-sources a {
       color: inherit;
       text-decoration: underline;
       text-underline-offset: 2px;
      overflow-wrap: anywhere;
      word-break: break-word;
     }
     @media (max-width: 720px) {

  html,
  body {
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
  }

  #main.container {
    width: 100% !important;
    max-width: 100% !important;
    min-width: 0 !important;
    padding-left: 16px !important;
    padding-right: 16px !important;
    box-sizing: border-box !important;
    overflow: hidden;
  }

  #main > .tpl-article {
    width: 100% !important;
    max-width: 100% !important;
    min-width: 0 !important;

    margin-left: 0 !important;
    margin-right: 0 !important;

    box-sizing: border-box !important;
    overflow: hidden;
  }

  .tpl-article .article-section {
    width: 100%;
    max-width: 100%;
    min-width: 0;
  }

  .tpl-article .article-table-wrap {
    display: block;
    width: 100%;
    max-width: 100%;
    min-width: 0;

    overflow-x: auto;
    overflow-y: hidden;

    -webkit-overflow-scrolling: touch;
  }

  .tpl-article .article-table {
    width: 650px;
    min-width: 650px;
    max-width: none;
  }

  .tpl-article .article-flow {
    flex-direction: column;
  }

  .tpl-article .article-flow b {
    transform: rotate(90deg);
  }

  .tpl-article .article-flow--figures b {
    display: none;
  }

  .tpl-article .article-flow--figures span {
    width: 100%;
  }

  .tpl-article .article-sources,
  .tpl-article .article-sources p,
  .tpl-article .article-sources a {
    max-width: 100%;
    overflow-wrap: anywhere;
    word-break: break-word;
  }
}
    .tpl-article .article-table {
      width: 100%;
      min-width: 650px;
      border-collapse: collapse;
      font-family: "Inter", sans-serif;
      font-size: .88rem;
    }
    .tpl-article .article-table caption {
      position: absolute;
      width: 1px;
      height: 1px;
      padding: 0;
      margin: -1px;
      overflow: hidden;
      clip: rect(0, 0, 0, 0);
      white-space: nowrap;
      border: 0;
    }
    .tpl-article .article-table th,
    .tpl-article .article-table td {
      padding: .7rem .6rem;
      border: 1px solid rgba(0, 0, 0, .22);
      text-align: left;
      vertical-align: middle;
    }
    .tpl-article .article-table thead th { background: rgba(0, 0, 0, .055); }
    .tpl-article .article-note {
      font-size: .86rem;
      line-height: 1.55;
      opacity: .88;
    }

    /* Article graphics: TAXpedia blue, light blue and yellow. */
    .tpl-article { --transport-blue:var(--brand, #003399); --transport-light:#8ab9ed; --transport-yellow:#ffdf00; }
    .tpl-article .article-highlight { background:#fff29a; color:inherit; padding:.1em .12em; box-decoration-break:clone; -webkit-box-decoration-break:clone; }
    .tpl-article .funding-route { margin:1.75rem 0; }
    .tpl-article .funding-route ol { display:flex; list-style:none; padding:0; margin:0; }
    .tpl-article .funding-route li { position:relative; flex:1; text-align:center; padding:0 .45rem; font-size:.8rem; line-height:1.45; }
    .tpl-article .funding-route li:not(:last-child)::after { content:""; position:absolute; left:50%; top:9px; width:100%; height:4px; background:var(--transport-blue); }
    .tpl-article .route-dot { position:relative; z-index:1; display:block; width:22px; height:22px; margin:0 auto .7rem; border:4px solid var(--transport-blue); border-radius:50%; background:#fff; }
    .tpl-article .funding-route li:last-child .route-dot { background:var(--transport-yellow); }
    .tpl-article .funding-route small { display:block; margin-top:.5rem; color:var(--transport-blue); font-size:.72rem; font-weight:600; }
    .tpl-article .milan-chart { margin:2rem 0; padding:1.4rem 0; border-top:3px solid var(--transport-blue); border-bottom:1px solid #dce2ea; }
    .tpl-article .milan-chart figcaption strong { display:block; font-size:1.25rem; line-height:1.4; color:var(--transport-blue); }
    .tpl-article .milan-chart figcaption > span { display:block; font-size:.82rem; margin:.5rem 0 1.2rem; }
    .tpl-article .funding-bar { display:flex; width:100%; overflow:hidden; border-radius:4px; }
    .tpl-article .funding-segment { display:flex; align-items:center; justify-content:center; min-height:56px; font-size:.95rem; font-weight:800; }
    .tpl-article .segment-0 { background:var(--transport-blue); color:white; }
    .tpl-article .segment-1 { background:var(--transport-light); color:#102957; }
    .tpl-article .segment-2 { background:var(--transport-yellow); color:#102957; }
    .tpl-article .funding-legend { list-style:none; display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:1rem; padding:0; margin:1.1rem 0; }
    .tpl-article .funding-legend li { display:flex; gap:.5rem; align-items:flex-start; margin:0; font-size:.8rem; line-height:1.5; }
    .tpl-article .funding-legend i { flex:0 0 10px; height:10px; margin-top:5px; border-radius:2px; }
    .tpl-article .funding-legend strong, .tpl-article .funding-legend span { display:block; }
    .tpl-article .funding-legend span { margin-top:.3rem; }
    .tpl-article .graphic-source { font-size:.73rem; line-height:1.5; color:#555; margin:.8rem 0 0; }
    .tpl-article .article-table th, .tpl-article .article-table td { border:0; border-bottom:1px solid #dde3eb; padding:.85rem .7rem; }
    .tpl-article .article-table thead th { background:var(--transport-blue); color:white; font-weight:600; }
    .tpl-article .article-table td { text-align:right; font-variant-numeric:tabular-nums; }
    .tpl-article .article-table tbody tr:first-child { background:#edf3fc; }
    .tpl-article .share-track { display:block; width:100%; height:5px; margin-top:.4rem; background:#e0e5ee; border-radius:3px; }
    .tpl-article .share-track > span { display:block; height:100%; background:var(--transport-blue); border-radius:3px; }
    .tpl-article .article-sources p { font-size:.82rem; line-height:1.65; }
    .tpl-article .article-sources figure { border:0; background:transparent; box-shadow:none; }
    @media(max-width:600px) {
      .tpl-article .funding-route ol { display:block; }
      .tpl-article .funding-route li { padding:0 0 1.5rem 2.4rem; text-align:left; min-height:55px; font-size:.9rem; }
      .tpl-article .funding-route li:last-child { padding-bottom:0; }
      .tpl-article .route-dot { position:absolute; left:0; top:0; margin:0; }
      .tpl-article .funding-route li:not(:last-child)::after { top:11px; left:9px; width:4px; height:100%; }
      .tpl-article .funding-legend { grid-template-columns:1fr; gap:.8rem; }
      .tpl-article .funding-segment { font-size:.8rem; min-height:48px; }
    }
  </style>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <article class="feature feature--large tpl-article" style="margin:4rem auto; max-width:720px; text-align:left;">
      <header style="margin-bottom:1.25rem;">
        <h2 class="section-title" style="margin-bottom:.35rem;">
          <?php echo tpl_article_e('h2'); ?>
        </h2>
        <p class="subtitle" style="margin:.25rem 0 0;">
          <?php echo tpl_article_e('subtitle'); ?>
        </p>
        <p class="meta" style="margin:.5rem 0 0;">
          <small><?php echo tpl_article_e('updated'); ?></small>
        </p>
      </header>

      <?php echo tpl_article_t('body'); ?>

      <?php if (tpl_article_t('author') !== ''): ?>
        <p><?php echo tpl_article_t('author'); ?></p>
      <?php endif; ?>

      <hr style="margin:2rem 0; opacity:.25;">

      <section class="article-sources" aria-label="<?php echo tpl_article_e('sources_aria'); ?>">
        <p style="text-align:center; margin:0 0 .75rem;">
          <?php echo tpl_article_e('collab'); ?>
        </p>

        <figure style="text-align:center; margin:0 0 1rem;">
          <a href="https://www.instagram.com/trasportamilano/" target="_blank" rel="noopener noreferrer">
            <img
              src="/aboutus/imm/logo/logo-tm.jpg"
              alt="<?php echo tpl_article_e('partner_alt'); ?>"
              width="160"
              height="160"
              loading="lazy"
              style="display:inline-block; border-radius:12px;"
            >
          </a>
        </figure>

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
