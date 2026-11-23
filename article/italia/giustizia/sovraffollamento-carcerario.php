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
    'title' => 'Perché non basta l’edilizia penitenziaria: le possibili soluzioni al sovraffollamento carcerario - TAXpedia',
    'meta_desc' => 'Il problema del sovraffollamento carcerario è sovente parte del dibattito pubblico, ma non sembra sempre chiaro come affrontarlo. Ma per capire come agire occorre prima di tutto comprendere le dimensioni e la portata della questione.',
    'h2' => 'Perché non basta l’edilizia penitenziaria: le possibili soluzioni al sovraffollamento carcerario',
    'subtitle' => 'Il problema del sovraffollamento carcerario è sovente parte del dibattito pubblico, ma non sembra sempre chiaro come affrontarlo. Ma per capire come agire occorre prima di tutto comprendere le dimensioni e la portata della questione.',
    'updated' => '',
    'author' => 'A cura di Lorenzo Oliva',
    'sources' => 'Fonti',
    'sources_aria' => 'Fonti dell’articolo',
    'collab' => 'Articolo realizzato in collaborazione con',
    'partner_alt' => 'Orizzonte Giuridico',
    'body' => <<<'HTML'
      <section class="article-section">
        <h3>Il problema esiste: rigetto della tesi del sovraffollamento virtuale</h3>
        <p>Nonostante per gli addetti ai lavori la questione del sovraffollamento sia palese ed acclarata, esistono ancora scettici nell’opinione pubblica sulla sua effettiva esistenza.</p>
        <p>Una delle controtesi più affermate è quella secondo cui il sovraffollamento sovente denunciato fosse meramente “virtuale” poiché il calcolo dei posti segue i requisiti di abitabilità delle abitazioni civili, ovvero 9 metri quadrati per il primo detenuto e 5 metri quadrati per ogni detenuto successivo. Tale superficie è giudicata eccessiva, a fronte dello standard di 4 metri quadrati in celle condivise e 6 in celle singole fissato dal Comitato Europeo contro la Tortura (CPT) in seno al Consiglio d’Europa.</p>
        <p>Addirittura, la Corte Europea dei Diritti dell’Uomo (CEDU) – nella Sentenza Torreggiani e altri contro Italia del 2013 – ha introdotto una presunzione di trattamento inumano e degradante solo quando ogni cella ha una superficie inferiore ai 3 metri quadrati. Questo parametro ha subito poi alcune evoluzioni nella giurisprudenza sovranazionale e interna, ma rimane comunque un punto fermo adeguato a valutare le condizioni inumane e degradanti. Se dunque si può parlare di sovraffollamento, i numeri sarebbero sostanzialmente più contenuti.</p>
        <p>Questa posizione ha trovato riscontro da più lati dell’opinione pubblica, ma presenta alcune criticità. In primo luogo, Antigone riporta che il 42,9% degli istituti visitati dall’associazione nel 2025 non è nemmeno in grado di garantire il rispetto del parametro dei 3 metri quadrati, che comunque, si ricorda, è una soglia minima quasi inderogabile.</p>
        <p>Secondariamente, la capienza regolamentare riportata nei dati ufficiali tende a sottostimare il problema reale del sovraffollamento, perché i posti effettivamente disponibili sono spesso meno a causa di ristrutturazioni e inagibilità. Anche senza considerare tutte le carenze legate alla qualità della vita dei detenuti, come la presenza di docce e acqua calda, la situazione è indiscutibilmente drammatica.</p>
      </section>

      <section class="article-section">
        <h3>L’impatto del sovraffollamento sul bilancio nazionale</h3>
        <p>Assodata l’esistenza del problema, ha merito domandarsi perché la necessità di una sua soluzione è impellente per il paese. L’obiettivo oggi non è quello di analizzare le implicazioni umane che simili condizioni possano produrre sulle persone ristrette, bensì di concentrarsi su un tema che pare essere ben più pregnante per l’opinione pubblica: le ricadute economiche del fenomeno. Nonostante, infatti, il tema possa sembrare solo legato ai diritti umani, la questione interessa anche le casse dello stato sotto più profili.</p>
        <p>In primo luogo, il costo sociale di una detenzione inumana e degradante – e dunque non rieducativa – è altissimo: l’aumento dei tassi di recidiva. Un soggetto che, scontata la pena, inizia a lavorare invece di tornare ad essere recluso porta un notevole vantaggio alla società: in senso positivo, perché – pagando le imposte e offrendo manodopera, beni e servizi – contribuisce alla crescita nazionale; in senso negativo, perché permette di risparmiare il costo del mantenimento e le spese processuali, che non sempre il condannato riesce a risarcire in toto. Questo vantaggio viene oggi spesso perso, in quanto circa sette condannati su dieci sono già precedentemente stati in carcere almeno una volta. Ma il sovraffollamento carcerario ha anche un costo ben più diretto e tangibile: i risarcimenti. La sopracitata sentenza Torreggiani della CEDU infatti impone all’Italia una serie di interventi correttivi che non si limitino a prevenire future violazioni ma a risarcire le vittime di quelle già poste in atto. L’Italia ha ottemperato a quest’ultima prescrizione prevedendo la possibilità di richiedere una riduzione della pena di un giorno per ogni dieci giorni di detenzione inumana e degradante, liquidabili se necessario in denaro nella misura di 8 euro al giorno (art. 35-ter, Legge sull’ordinamento penitenziario).</p>
        <p>La misura si è però rivelata insufficiente, come dimostra l’aumento costante – nonostante le prescrizioni della sentenza Torreggiani – dei ricorsi ex art. 35-ter o.p. per condizioni inumane e degradanti. Il tasso di accoglimento dei reclami fatti dalle persone ancora ristrette si aggira tra il 50 e il 60% e, al crescere degli stessi, aumenteranno inevitabilmente i risarcimenti per chi, ad esempio, ha già scontato la pena.</p>
        <p>Infine, i costi di gestione delle strutture carcerarie sono piuttosto ingenti. Circa il 30% della spesa del Ministero della Giustizia nel bilancio del 2026 è riservato al Dipartimento dell’Amministrazione Penitenziaria (DAP): sono circa 3 miliardi e mezzo di euro – spesa aumentata del 3% rispetto all’anno precedente – che si traducono in un costo medio giornaliero per detenuto di 150 euro. Questa cifra include però solo il personale di polizia penitenziaria, parte della manutenzione e il mantenimento dei detenuti. Non sono presenti, per esempio, le spese sanitarie, di competenza del Servizio Sanitario Nazionale.</p>
      </section>

      <section class="article-section">
        <h3>Smontare il miraggio dell’edilizia penitenziaria</h3>
        <p>Alla pars destruens segue la pars construens: bisogna trovare delle soluzioni al problema, che riescano a bilanciare l’esigenza di sicurezza dei cittadini con i costi umani, sociali ed economici del sovraffollamento. Un punto di partenza potrebbe essere la soluzione che più di frequente viene proposta nel dibattito politico: la costruzione di nuove carceri. L’edilizia penitenziaria sembra essere la panacea di tutti i mali in questo annoso dibattito, ma davvero è questa la risposta più adatta?</p>
        <p>Per comprenderlo, conviene analizzare il “Programma dettagliato degli interventi di edilizia penitenziaria per gli anni 2025-2027”, redatto dal Commissario straordinario per l’edilizia penitenziaria, nominato nel 2024. Il piano ha promesso la realizzazione di oltre 10mila posti detentivi nel triennio considerato, con una spesa complessiva di oltre 1,3 miliardi di euro.</p>
        <p>La promessa di “nuovi posti” è, però, fuorviante. Una fase del piano è infatti dedicata a riqualificazioni di posti inagibili attraverso la manutenzione straordinaria. I posti recuperati non sono dunque guadagnati, in quanto già potenzialmente conteggiati nella capienza regolamentare citata.</p>
        <p>Inoltre, la relazione che il commissario ha presentato alla Camera dei Deputati il 6 Maggio del 2026 dipinge un quadro sensibilmente meno ambizioso rispetto agli obiettivi originariamente prefissati. I posti concretamente in realizzazione al momento attuale sarebbero circa cinquemila per un costo di 450 milioni di euro, la metà di quelli promessi dal progetto. In alcuni casi, come per l’ampliamento delle carceri esistenti con strutture prefabbricate e nuovi padiglioni detentivi, le ragioni sono esplicitamente di carattere tecnico ed economico. Nel caso, invece, della riqualificazione dei posti già esistenti, l’aggiornamento del commissario presenta una lacuna di programmazione non ancora spiegata di circa 800 posti.</p>
        <p>Queste circostanze, unite all’elevatissimo costo della gestione carceraria, portano a pensare che l’edilizia penitenziaria non sia la soluzione più adatta al problema del sovraffollamento, perlomeno riguardo all’impatto sulle finanze dello stato. La Corte dei Conti, infatti, ha sottolineato in una delibera del 2025 le debolezze di questa visione: non solo gli obiettivi dei piani possono facilmente essere disattesi, ma il miglioramento delle condizioni detentive non può limitarsi a un calcolo aritmetico. La vivibilità in carcere è infatti molto più complessa. Le condizioni di vita in carcere sono problematiche non solo per la mancanza di spazi, ma anche per la privazione di servizi essenziali, come docce, acqua calda e riscaldamento.</p>
        <p>Inoltre, aumentare gli spazi senza contestualmente potenziare l’organico – non solo di agenti di polizia penitenziaria ma anche di educatori, funzionari amministrativi e personale medico – non può che portare a un aggravamento delle condizioni di abbandono e disagio che vengono sovente denunciate.</p>
        <p>A queste necessità si aggiungono gli investimenti necessari per l’attuazione pratica della sentenza 10/2024 della Corte Costituzionale: la decisione impone infatti alle amministrazioni carcerarie di permettere colloqui intimi senza sorveglianza con il coniuge in libertà, per garantire il diritto all’affettività dei detenuti.</p>
      </section>

      <section class="article-section">
        <h3>La necessità di proposte strutturali</h3>
        <p>Un intervento netto sulla popolazione detenuta potrebbe rappresentare un modo iniziale di affrontare il problema. Le proposte legislative presentate dalle opposizioni in chiave deflattiva ci offrono un ottimo punto di partenza in questo senso.</p>
        <p>La proposta di legge Giachetti, per esempio, propone di ampliare gli sconti di pena della liberazione anticipata. Ma si potrebbe mettere in atto un meccanismo potenzialmente ancora più incisivo: l’utilizzo obbligato di misure meno afflittive del carcere (come i domiciliari) qualora si superino i livelli massimi previsti di sovraffollamento. Imporre un limite massimo assoluto di detenuti per ogni struttura sarebbe forse la soluzione più efficace, perché costringerebbe il Governo a migliorare le condizioni delle carceri per portare avanti eventuali politiche securitarie. Essenzialmente, è uno strumento alternativo ai rimedi interni previsti dopo la sentenza Torreggiani, che sembrano non aver cambiato a sufficienza lo status quo.</p>
        <p>Un’altra soluzione è rappresentata dai provvedimenti di clemenza generali (amnistie e indulti), che però hanno due notevoli difetti: da una parte, necessitano di un ampio capitale politico, in quanto l’art. 79 della Costituzione prevede che possano essere approvati solo con il voto della maggioranza dei ⅔ dei componenti di ciascuna Camera ; dall’altra, sono soluzioni temporanee che non risolvono il problema in modo strutturale e non sono perciò sempre apprezzate neanche da chi promuove la riduzione del sovraffollamento.</p>
        <p>Un’ulteriore strada per ridurre non solo la popolazione carceraria, ma anche i costi del processo sarebbe la modifica normativa di numerose figure di reato, che oggi riportano pene troppo alte e discrezionali. Spingendosi oltre, si potrebbe anche depenalizzare molte condotte di scarso allarme sociale (i cosiddetti reati bagatellari). Una trasformazione di tali reati in illeciti amministrativi non ne ridurrebbe l’efficacia repressiva. Il procedimento amministrativo, infatti, non è sottoposto alle stesse garanzie di quello penale, ed è perciò privo della lentezza e della complessità ad esse conseguenti. Chi commette un illecito amministrativo dunque potrebbe essere sanzionato prima e più facilmente, mentre in sede penale gli imputati contano sovente sul decorso della prescrizione.</p>
        <p>La depenalizzazione costituirebbe un intervento diametralmente opposto alla tendenza panpenalistica del legislatore, ossia alla convinzione che a fronte di una situazione – o, in alcuni casi, anche solo a una percezione – di insicurezza si debba rispondere principalmente con la creazione di nuovi reati e l’inasprimento delle pene. Esempi recenti di cui si è molto discusso sono il cosiddetto “Decreto Rave”, i Decreti Sicurezza o il Decreto Caivano: leggi che si ispirano sempre a una logica di risposta emergenziale, piuttosto che di risoluzione di un problema strutturale.</p>
        <p>Oltre alla riduzione numerica delle persone ristrette, possono essere operati anche interventi preventivi: la rieducazione e il reinserimento sociale attraverso il lavoro possono essere veicoli eccellenti di riduzione della recidiva, come dimostra per esempio il caso della colonia penale agricola dell’Isola di Gorgona, che riporta un tasso di recidiva inferiore del 30% rispetto alla media nazionale. Il progetto Recidiva Zero del CNEL riporta inoltre che a fine 2024, a fronte di una media nazionale del 70%, la recidiva dei detenuti che hanno ottenuto un inserimento professionale stabile fuori dal carcere può addirittura scendere sino al 2%.</p>
        <p>È chiaro dunque che assicurare un lavoro dignitoso e retribuito fuori e dentro le mura carcerarie è la strada da seguire, con però un caveat fondamentale: i salari devono essere in linea con i contratti collettivi nazionali del lavoro. In ordinamenti in cui il lavoro carcerario è quasi gratuito – come in alcuni stati degli Stati Uniti – il suo effetto rieducativo è infatti fortemente depotenziato, mentre al contrario aumentano gli effetti criminogeni della detenzione.</p>
      </section>

      <section class="article-section">
        <h3>I presupposti per un’azione immediata: diritti sulla carta e attuazione pratica</h3>
        <p>Nell’analizzare i possibili profili di intervento, si realizza che il sovraffollamento è prima di tutto un problema sostanziale, piuttosto che formale. L’assetto normativo già presente, senza necessità di ulteriori modifiche, permetterebbe di ridurre significativamente la popolazione carceraria.</p>
        <p>Basti pensare all’ingente numero di detenuti che hanno una pena residua da scontare inferiore ai tre anni e che, dunque, possono spesso accedere alle misure alternative. Anche l’utilizzo della custodia cautelare in carcere – già intesa dal nostro ordinamento come extrema ratio – potrebbe essere ulteriormente ridotto attraverso un’applicazione più rigorosa delle esigenze cautelari e un maggiore investimento negli strumenti fondamentali per l’attuazione di misure meno afflittive, come i braccialetti elettronici per i domiciliari.</p>
      </section>

      <section class="article-section">
        <h3>La soluzione: evitare le scorciatoie e correggere il sistema</h3>
        <p>Insomma, la lezione che possiamo ricavare da questa disamina è chiara: l’edilizia penitenziaria, oltre ad essere costosa e complessa da portare avanti, non è la soluzione al sovraffollamento. Tanto afferma il Comitato Europeo per la Prevenzione della Tortura, che raccomanda una politica concreta di riforma del sistema penale.</p>
      </section>
HTML,
    'source_list' => <<<'HTML'
      <p><a href="https://www.giustizia.it/giustizia/it/mg_1_14_1.page?contentId=SST1510914#">Ministero della Giustizia — Statistiche sui detenuti presenti, giugno 2026</a></p>
      <p><a href="https://www.giustizia.it/giustizia/it/mg_1_29_13_1_1.page">Ministero della Giustizia — Bilancio di previsione, triennio 2025–2027</a></p>
      <p><a href="https://www.garantedetenutilazio.it/comitato-europeo-contro-la-tortura-deve-essere-fissato-un-limite-di-detenuti-da-rispettare-scrupolosamente/">Garante dei detenuti per la regione Lazio — Comitato europeo contro la tortura e limite dei detenuti</a></p>
      <p><a href="https://www.rapportoantigone.it/ventunesimo-rapporto-sulle-condizioni-di-detenzione/">“Senza Respiro”, XXI rapporto di Antigone sulle condizioni di detenzione</a></p>
      <p><a href="https://www.rapportoantigone.it/ventiduesimo-rapporto-sulle-condizioni-di-detenzione/">“Tutto Chiuso”, XXII rapporto di Antigone sulle condizioni di detenzione</a></p>
      <p><a href="https://www.cnel.it/comunicazione-e-stampa/notizie/news/detail/2024/12/26/carceri-con-il-lavoro-la-recidiva-scende-al-2">Consiglio Nazionale dell’Economia e del Lavoro — Carceri: con il lavoro la recidiva scende al 2%</a></p>
      <p><a href="https://www.giurisprudenzapenale.com/2013/04/01/torreggiani-strasburgo-condanna-italia/">Corte Europea dei Diritti dell’Uomo — Torreggiani e altri contro Italia (Giurisprudenza Penale)</a></p>
      <p><a href="https://www.avvenire.it/attualita/unisola-le-vigne-lavoro-e-dignita-a-gorgona-il-riscatto-oltre-le-sbarre_109679">Avvenire — Un’isola, le vigne, lavoro e dignità: a Gorgona il riscatto oltre le sbarre</a></p>
      <p><a href="https://www.senato.it/leggi-e-documenti/disegni-di-legge/scheda-ddl?did=56082">Senato.it — A. C. 552 (proposta di legge Giachetti)</a></p>
      <p><a href="https://salute.regione.emilia-romagna.it/carcere">Regione Emilia-Romagna — Salute in carcere</a></p>
HTML,
  ),
  'en' => array(
    'title' => 'Why building prisons is not enough: possible solutions to prison overcrowding - TAXpedia',
    'meta_desc' => 'Prison overcrowding is often part of public debate, yet how to address it is not always clear. To understand how to act, we first need to grasp the scale and scope of the issue.',
    'h2' => 'Why building prisons is not enough: possible solutions to prison overcrowding',
    'subtitle' => 'Prison overcrowding is often part of public debate, yet how to address it is not always clear. To understand how to act, we first need to grasp the scale and scope of the issue.',
    'updated' => '',
    'author' => 'By Lorenzo Oliva',
    'sources' => 'Sources',
    'sources_aria' => 'Article sources',
    'collab' => 'Article produced in collaboration with',
    'partner_alt' => 'Orizzonte Giuridico',
    'body' => <<<'HTML'
      <section class="article-section">
        <h3>The problem is real: rejecting the “virtual overcrowding” argument</h3>
        <p>Although prison overcrowding is an obvious and well-established issue for those working in the field, some members of the public still question whether it actually exists.</p>
        <p>One of the most widespread counterarguments is that the overcrowding frequently reported is merely “virtual”, because prison capacity is calculated using the habitability requirements for residential housing: 9 square metres for the first prisoner and 5 square metres for each additional prisoner. This space is considered excessive compared with the standard of 4 square metres in shared cells and 6 in single cells set by the Council of Europe’s European Committee for the Prevention of Torture (CPT).</p>
        <p>Indeed, in its 2013 judgment in Torreggiani and Others v. Italy, the European Court of Human Rights (ECtHR) introduced a presumption of inhuman and degrading treatment only where cell space falls below 3 square metres. This benchmark has subsequently evolved in supranational and domestic case law, but remains an established reference point for assessing inhuman and degrading conditions. According to this argument, therefore, even if overcrowding exists, its scale would be substantially smaller.</p>
        <p>This position has gained support in different parts of public opinion, but it presents several problems. First, Antigone reports that 42.9% of the institutions visited by the association in 2025 cannot even guarantee compliance with the 3-square-metre benchmark, which, it should be recalled, is a minimum threshold allowing very few exceptions.</p>
        <p>Second, the official capacity reported in government statistics tends to underestimate the actual extent of overcrowding, because the number of places effectively available is often lower due to renovation work and unusable facilities. Even without considering all the shortcomings affecting prisoners’ quality of life, such as access to showers and hot water, the situation is undeniably dire.</p>
      </section>

      <section class="article-section">
        <h3>The impact of overcrowding on the national budget</h3>
        <p>Having established that the problem exists, it is worth asking why finding a solution is so urgent for the country. The aim here is not to examine the human consequences that such conditions may have for people in detention, but to focus on an issue that appears to resonate more strongly with the public: the economic repercussions. Although the subject may seem to concern human rights alone, it also affects public finances in several ways.</p>
        <p>First, the social cost of inhuman and degrading detention — which therefore fails to rehabilitate — is extremely high: higher reoffending rates. Someone who starts working after serving a sentence, instead of returning to prison, brings considerable benefits to society. On the one hand, by paying taxes and providing labour, goods and services, they contribute to national growth; on the other, they save the costs of imprisonment and legal proceedings, which convicted persons are not always able to reimburse in full. Today, this benefit is often lost, as around seven in ten convicted persons have already been in prison at least once. But prison overcrowding also has a much more direct and tangible cost: compensation. The ECtHR’s Torreggiani judgment mentioned above requires Italy to introduce corrective measures that both prevent future violations and compensate the victims of past ones. Italy complied with the latter requirement by allowing prisoners to request a one-day sentence reduction for every ten days spent in inhuman and degrading conditions, with monetary compensation where necessary at a rate of €8 per day (Article 35-ter of the Prison Administration Act).</p>
        <p>However, the measure has proved insufficient, as shown by the steady increase — despite the requirements of the Torreggiani judgment — in applications under Article 35-ter concerning inhuman and degrading conditions. The success rate of complaints submitted by people still in detention is around 50–60%. As their number grows, compensation will inevitably increase for those who, for example, have already served their sentences.</p>
        <p>Finally, the operating costs of prisons are substantial. Around 30% of the Ministry of Justice’s expenditure in the 2026 budget is allocated to the Department of Prison Administration (DAP): approximately €3.5 billion, up 3% on the previous year, translating into an average daily cost of €150 per prisoner. However, this figure only includes prison officers, part of maintenance expenditure and prisoners’ upkeep. It does not include healthcare costs, for example, which fall under the National Health Service.</p>
      </section>

      <section class="article-section">
        <h3>Dispelling the illusion of prison construction</h3>
        <p>After identifying the shortcomings, we must turn to finding solutions that balance citizens’ need for security with the human, social and economic costs of overcrowding. A starting point could be the solution most frequently proposed in political debate: building new prisons. Prison construction appears to be a cure-all in this longstanding debate, but is it really the most appropriate answer?</p>
        <p>To understand this, it is useful to examine the “Detailed Programme of Prison Construction Works for 2025–2027”, drawn up by the Extraordinary Commissioner for Prison Construction, appointed in 2024. The plan promised more than 10,000 prison places over the three-year period, with total expenditure exceeding €1.3 billion.</p>
        <p>However, the promise of “new places” is misleading. One phase of the plan is devoted to restoring unusable places through extraordinary maintenance. Recovered places are therefore not additional places, as they may already be included in the official capacity mentioned above.</p>
        <p>Moreover, the report presented by the Commissioner to the Chamber of Deputies on 6 May 2026 paints a considerably less ambitious picture than the original targets. The places actually being developed would currently number around 5,000, at a cost of €450 million — half the number promised by the project. In some cases, such as the expansion of existing prisons through prefabricated structures and new detention blocks, the reasons are explicitly technical and economic. As regards the refurbishment of existing places, however, the Commissioner’s update leaves an unexplained planning gap of around 800 places.</p>
        <p>These circumstances, together with the extremely high cost of running prisons, suggest that prison construction is not the most suitable solution to overcrowding, at least in terms of its impact on public finances. In a 2025 resolution, the Italian Court of Auditors highlighted the weaknesses of this approach: not only can plans easily fall short of their targets, but improving detention conditions cannot be reduced to an arithmetic calculation. Livability in prison is much more complex. Living conditions are problematic not only because of a lack of space, but also because of the absence of essential services such as showers, hot water and heating.</p>
        <p>Furthermore, increasing space without also strengthening staffing — including not just prison officers, but also educators, administrative staff and medical personnel — can only worsen the frequently reported conditions of neglect and distress.</p>
        <p>These needs are compounded by the investment required to implement Constitutional Court judgment No. 10/2024: the decision requires prison administrations to allow unsupervised intimate visits with a spouse who is not in detention, to safeguard prisoners’ right to intimate relationships.</p>
      </section>

      <section class="article-section">
        <h3>The need for structural proposals</h3>
        <p>A decisive intervention to reduce the prison population could represent an initial way of addressing the problem. Legislative proposals put forward by opposition parties to reduce prisoner numbers offer a useful starting point.</p>
        <p>The Giachetti bill, for example, proposes increasing sentence reductions under the early-release scheme. But a potentially even more effective mechanism could be introduced: mandatory use of measures less restrictive than imprisonment, such as house arrest, whenever prescribed maximum overcrowding levels are exceeded. Setting an absolute maximum number of prisoners for each institution might be the most effective solution, as it would force the Government to improve prison conditions in order to pursue any tough-on-crime policies. Essentially, it is an alternative to the domestic remedies introduced after the Torreggiani judgment, which do not appear to have changed the status quo sufficiently.</p>
        <p>Another solution is general clemency measures, such as amnesties and collective pardons, but these have two significant drawbacks. First, they require considerable political capital, since Article 79 of the Constitution provides that they may only be approved by a two-thirds majority of the members of each House of Parliament. Second, they are temporary solutions that do not address the problem structurally, and are therefore not always welcomed even by those advocating a reduction in overcrowding.</p>
        <p>A further way to reduce both the prison population and the cost of trials would be to amend the rules governing numerous offences, which currently carry excessively severe penalties and leave too much discretion in sentencing. Going further, many forms of conduct causing little social alarm — so-called petty offences — could also be decriminalised. Converting these offences into administrative violations would not reduce the effectiveness of enforcement. Administrative proceedings are not subject to the same safeguards as criminal proceedings, and are therefore free of the resulting delays and complexity. Someone committing an administrative violation could thus be penalised sooner and more easily, whereas defendants in criminal proceedings often count on the limitation period expiring.</p>
        <p>Decriminalisation would run directly counter to the legislature’s tendency to rely on criminal law for every problem: the belief that a situation — or sometimes even merely a perception — of insecurity should primarily be addressed by creating new offences and increasing penalties. Much-discussed recent examples include the so-called “Rave Decree”, the Security Decrees and the Caivano Decree: laws consistently based on an emergency-response approach rather than on resolving a structural problem.</p>
        <p>Alongside reducing the number of people in detention, preventive action is also possible. Rehabilitation and social reintegration through work can be excellent ways to reduce reoffending, as demonstrated, for example, by the agricultural penal colony on the island of Gorgona, which reports a reoffending rate 30% below the national average. CNEL’s Recidiva Zero project also reports that, at the end of 2024, compared with a national average of 70%, reoffending among prisoners who secured stable employment outside prison could fall as low as 2%.</p>
        <p>It is therefore clear that ensuring decent, paid work both inside and outside prison walls is the way forward, with one essential caveat: wages must be consistent with national collective labour agreements. In jurisdictions where prison labour is virtually unpaid — as in some US states — its rehabilitative effect is greatly weakened, while imprisonment’s tendency to encourage further offending increases.</p>
      </section>

      <section class="article-section">
        <h3>The basis for immediate action: rights on paper and implementation in practice</h3>
        <p>When examining possible areas for action, it becomes clear that overcrowding is primarily a practical rather than a formal problem. The existing legal framework, without any further amendments, would already allow a significant reduction in the prison population.</p>
        <p>Consider the large number of prisoners with less than three years left to serve, who can therefore often access alternatives to imprisonment. The use of pre-trial detention in prison — already regarded as a last resort under Italian law — could also be reduced further through a stricter application of the grounds for such detention and greater investment in the tools needed to implement less restrictive measures, such as electronic tags for house arrest.</p>
      </section>

      <section class="article-section">
        <h3>The solution: avoiding shortcuts and fixing the system</h3>
        <p>The lesson from this analysis is clear: prison construction, besides being expensive and complex to carry out, is not the solution to overcrowding. This is also the position of the European Committee for the Prevention of Torture, which recommends a concrete policy of criminal justice reform.</p>
      </section>
HTML,
    'source_list' => <<<'HTML'
      <p><a href="https://www.giustizia.it/giustizia/it/mg_1_14_1.page?contentId=SST1510914#">Ministry of Justice — Prison population statistics, June 2026</a></p>
      <p><a href="https://www.giustizia.it/giustizia/it/mg_1_29_13_1_1.page">Ministry of Justice — Budget estimates, 2025–2027</a></p>
      <p><a href="https://www.garantedetenutilazio.it/comitato-europeo-contro-la-tortura-deve-essere-fissato-un-limite-di-detenuti-da-rispettare-scrupolosamente/">Lazio Regional Prisoners’ Ombudsperson — European Committee for the Prevention of Torture and prison population limits</a></p>
      <p><a href="https://www.rapportoantigone.it/ventunesimo-rapporto-sulle-condizioni-di-detenzione/">“Senza Respiro”, Antigone’s 21st report on detention conditions</a></p>
      <p><a href="https://www.rapportoantigone.it/ventiduesimo-rapporto-sulle-condizioni-di-detenzione/">“Tutto Chiuso”, Antigone’s 22nd report on detention conditions</a></p>
      <p><a href="https://www.cnel.it/comunicazione-e-stampa/notizie/news/detail/2024/12/26/carceri-con-il-lavoro-la-recidiva-scende-al-2">National Council for Economics and Labour — Prisons: with work, reoffending falls to 2%</a></p>
      <p><a href="https://www.giurisprudenzapenale.com/2013/04/01/torreggiani-strasburgo-condanna-italia/">European Court of Human Rights — Torreggiani and Others v. Italy (Giurisprudenza Penale)</a></p>
      <p><a href="https://www.avvenire.it/attualita/unisola-le-vigne-lavoro-e-dignita-a-gorgona-il-riscatto-oltre-le-sbarre_109679">Avvenire — An island, vineyards, work and dignity: a fresh start beyond bars on Gorgona</a></p>
      <p><a href="https://www.senato.it/leggi-e-documenti/disegni-di-legge/scheda-ddl?did=56082">Senato.it — A. C. 552 (Giachetti bill)</a></p>
      <p><a href="https://salute.regione.emilia-romagna.it/carcere">Emilia-Romagna Region — Healthcare in prison</a></p>
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
    .tpl-article .article-flow {
      display: flex;
      align-items: stretch;
      justify-content: center;
      gap: .55rem;
      margin: 1.35rem 0;
    }
    .tpl-article .article-flow span {
      display: flex;
      flex: 1 1 0;
      align-items: center;
      justify-content: center;
      min-width: 0;
      padding: .75rem .65rem;
      border: 1px solid rgba(0, 0, 0, .18);
      border-radius: 8px;
      background: rgba(0, 0, 0, .025);
      font-size: .82rem;
      font-weight: 600;
      line-height: 1.3;
      text-align: center;
    }
    .tpl-article .article-flow b {
      align-self: center;
      flex: 0 0 auto;
      font-size: 1rem;
    }
    .tpl-article .article-flow--figures { flex-wrap: wrap; }
    .tpl-article .article-flow--figures span {
      flex: 1 1 120px;
      flex-direction: column;
      gap: .25rem;
    }
    .tpl-article .article-flow small {
      display: block;
      font-size: .68rem;
      font-weight: 400;
      opacity: .72;
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
  </style>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <article lang="<?php echo tpl_article_h($TPL_ARTICLE_LANG); ?>" class="feature feature--large tpl-article" style="margin:4rem auto; max-width:720px; text-align:left;">
      <header style="margin-bottom:1.25rem;">
        <h2 class="section-title" style="margin-bottom:.35rem;">
          <?php echo tpl_article_e('h2'); ?>
        </h2>
        <p class="subtitle" style="margin:.25rem 0 0;">
          <?php echo tpl_article_e('subtitle'); ?>
        </p>
        <?php if (tpl_article_t('updated') !== ''): ?>
        <p class="meta" style="margin:.5rem 0 0;">
          <small><?php echo tpl_article_e('updated'); ?></small>
        </p>
        <?php endif; ?>
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
          <a href="https://orizzontegiuridico.com/" target="_blank" rel="noopener noreferrer">
            <img
              src="/aboutus/imm/logo/logo-orizzonte.png"
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
