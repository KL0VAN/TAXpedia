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
    'title' => 'Una crescita economica in Europa sempre più debole rispetto a quella della Cina e degli USA: basterebbe un’Unione più coesa ideologicamente o le cause sono strutturali? - TAXpedia',

    'h2' => 'Una crescita economica in Europa sempre più debole rispetto a quella della Cina e degli USA: basterebbe un’Unione più coesa ideologicamente o le cause sono strutturali?',
    'subtitle' => '',
    'updated' => 'Ultimo aggiornamento: 2 luglio 2026',

    'p1' => 'Due anni dopo la nascita dell’euro, l’Unione europea segnava una crescita moderata ma stabile del PIL, registrando un +2,4%; gli Stati Uniti un +3,9%; e la Cina, in fase di boom industriale, un +10,1%. Nel 2010, dopo la crisi finanziaria, il PIL europeo saliva del 2,1%, quello americano del 2,6% e quello cinese del 10%. Nel 2016 il PIL europeo registrava +1,8%, quello cinese 6,8% e quello americano 1,7%. Nel 2024, l’Unione europea segna 0,8%, la Cina 4,5-5,5% e gli USA +2,4-2,9%. Le previsioni per il 2030 mantengono lo stesso trend: la Cina in leggero calo, vista la fine della fase di boom (+3,3%); gli Usa verso l’1,8% (a causa dell’amministrazione Trump); e l’Europa verso una crescita leggermente ottimista dell’1,4%, in un contesto di recupero post-inflazione e di crisi energetica. In una situazione di crescente incertezza geopolitica, in cui l’Unione Europea ha perso gran parte della stretta collaborazione con il suo alleato storico, gli USA, la stabilità economica assume un ruolo ancora più rilevante, e ci si chiede quindi come sia possibile che l’Unione europea sia passata da una crescita simile a quella americana a una inferiore della metà.',
    'p2' => 'Ciò che emerge dai dati iniziali è la continua discesa dell’Unione europea nel mercato internazionale, mentre i suoi competitor si ritagliano una posizione sempre più importante, e tale rilevanza economica va di pari passo con quella geopolitica, sempre più cruciale alla luce degli avvenimenti in Medio Oriente.',
    'p3' => 'Il primo elemento che contraddistingue l’Unione europea dalle altre due superpotenze economiche è l’estrema eterogeneità interna e lo sviluppo diverso tra le aree dell’Europa Occidentale (già storicamente più solida) e dell’Europa Centrale, rispetto a quelle dell’Europa del Sud, soprattutto dopo la crisi del 2008. Nel pre-2008, l’Europa Centrale è quella che è cresciuta di più, con una media tra 4 e 6%, mentre l’Europa occidentale si attestava sul 2% e l’Europa del Sud sul 3%. Dopo la crisi del 2008, l’Europa occidentale ha rallentato, arrivando a 1-1,8%; l’Europa del Sud è rimasta tra lo 0 e l’1%; e l’Europa centrale ha rallentato, attestandosi intorno al 3%. Infine, negli ultimi anni si attestano tutte tra l’1 e il 2,5%.',
    'p4' => 'Questa crescita a due livelli ha un impatto particolarmente rilevante a livello europeo. Infatti, se si paragona la crescita della produttività in Cina, negli Stati Uniti e nell’Europa, il dato è incredibile: la Cina è cresciuta dal 2005 al 2023 in “Pil per ora di lavoro” del 170% circa; gli Stati Uniti di un numero compreso tra il 25 e il 30%; e l’Unione europea, facendo una media tra le economie maggiori, solamente del 10/15%.',
    'p5' => 'Le divergenze tra il caso cinese e quello americano risiedono nel fatto che la Cina sta raggiungendo l’apice della sua crescita, mentre l’America è in una fase di naturale discesa, pur sempre abbastanza positiva. Perché, invece, l’Europa registra una stagnazione pressoché continua? Le due principali spiegazioni possono essere di natura strutturale o politica. Il neo-funzionalismo, teoria molto apprezzata negli anni ’60 e ’70, spinge verso la seconda risposta: una maggiore integrazione europea potrebbe favorire una crescita più coesa. Una differenza così grande tra le aree europee non spinge affatto verso un piano di coesione e unione, perché gli stati più ricchi esigeranno sempre condizioni più favorevoli e non eguali. Una maggiore coesione e unione economica rafforzerebbero, però, tutti gli stati membri e, di conseguenza, favorirebbero una collaborazione politica più forte e una maggiore velocità decisionale. Questo potrebbe essere ciò di cui ha bisogno l’Unione Europea, che, oltre al rallentamento nella crescita, deve affrontare anche la diffusione di partiti populisti e nazionalisti che ne minacciano la struttura e le politiche economiche unitarie. <br>Una seconda motivazione è invece di natura strutturale: da un punto di vista tecnologico, i progressi cinesi e americani sono superiori a quelli europei; la struttura economica del Vecchio Continente è più arretrata e la produttività è inferiore per cause esterne e, di conseguenza, la crescita economica è naturalmente inferiore. Inoltre, la demografia gioca un ruolo chiave, poiché l’Europa registra una crescita solo del +0,2/0,3%, mentre gli Stati Uniti registrano una crescita del +1% (per via dell’immigrazione). La Cina è in leggero ribasso (-0,1%), ma, vista la popolazione che ammonta già a oltre il triplo di quella europea e al quadruplo di quella americana, ciò non implica automaticamente una crescita pro capite.',
    'p6' => 'Sebbene la situazione, a questo punto, sembri destinata a un ruolo sempre più marginale, l’Unione ha un grande vantaggio rispetto agli altri due stati: la presenza della democrazia più sana e strutturata al mondo. Secondo V-dem, istituto di ricerca sulla qualità della democrazia, l’UE ha una media compresa tra 0,85 e 0,9 (dove 1 rappresenta la democrazia perfettamente sana), gli USA intorno allo 0,6 e la Cina 0,05. E forse il motivo alla base della rischiosa situazione in cui si trova l’Unione europea tra la bassa crescita e la stagnazione è la mancata capacità di sfruttare questo vantaggio, dovuta alla carenza di coesione a livello strutturale e decisionale che, vista la lentezza e le difficoltà nel prendere decisioni, la fa rimanere indietro sul piano economico, nonostante una democrazia considerata più sana.',

    'author' => 'A cura di <a href="/aboutus/team/tommaso-prever.php?lang=it" style="text-decoration: underline;">Tommaso Prever</a>',

    'sources' => 'Fonti',
    'src1' => '',
  ),
  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'Economic growth in Europe is increasingly weaker than in China and the United States: would a more ideologically cohesive Union be enough, or are the causes structural? - TAXpedia',

    'h2' => 'Economic growth in Europe is increasingly weaker than in China and the United States: would a more ideologically cohesive Union be enough, or are the causes structural?',
    'subtitle' => '',
    'updated' => 'Last updated: 2 July 2026',

    'p1' => 'Two years after the creation of the euro, the European Union recorded moderate but stable GDP growth, at +2.4%; the United States recorded +3.9%; and China, then experiencing an industrial boom, reached +10.1%. In 2010, after the financial crisis, European GDP rose by 2.1%, American GDP by 2.6%, and Chinese GDP by 10%. In 2016, European GDP grew by +1.8%, Chinese GDP by 6.8%, and American GDP by 1.7%. In 2024, the European Union recorded 0.8%, China between 4.5% and 5.5%, and the United States between +2.4% and +2.9%. Forecasts for 2030 maintain the same trend: China is expected to slow slightly, given the end of its boom phase (+3.3%); the United States is projected to move towards 1.8% due to the Trump administration; and Europe towards a slightly optimistic growth rate of 1.4%, in a context of post-inflation recovery and energy crisis. In a situation of growing geopolitical uncertainty, in which the European Union has lost much of its close cooperation with its historic ally, the United States, economic stability takes on an even more important role. This raises the question of how the European Union went from growth similar to that of the United States to growth that is less than half of it.',
    'p2' => 'What emerges from the initial data is the European Union\'s continuous decline in the international market, while its competitors carve out an increasingly important position for themselves. This economic relevance goes hand in hand with geopolitical relevance, which is becoming ever more crucial in light of developments in the Middle East.',
    'p3' => 'The first element that distinguishes the European Union from the other two economic superpowers is its extreme internal heterogeneity and the different levels of development between the areas of Western Europe, already historically more solid, and Central Europe, compared with Southern Europe, especially after the 2008 crisis. Before 2008, Central Europe was the region that grew the most, with an average between 4% and 6%, while Western Europe stood at around 2% and Southern Europe at 3%. After the 2008 crisis, Western Europe slowed down, reaching 1-1.8%; Southern Europe remained between 0% and 1%; and Central Europe also slowed, settling at around 3%. Finally, in recent years, all of these areas have stood between 1% and 2.5%.',
    'p4' => 'This two-speed growth has a particularly significant impact at the European level. Indeed, when comparing productivity growth in China, the United States and Europe, the figure is striking: from 2005 to 2023, China grew by around 170% in terms of “GDP per hour worked”; the United States grew by between 25% and 30%; and the European Union, taking an average of the major economies, grew by only 10-15%.',
    'p5' => 'The differences between the Chinese and American cases lie in the fact that China is reaching the peak of its growth, while the United States is in a phase of natural decline, although still relatively positive. Why, then, is Europe experiencing almost continuous stagnation? The two main explanations may be structural or political. Neo-functionalism, a theory widely appreciated in the 1960s and 1970s, points towards the second answer: greater European integration could foster more cohesive growth. Such a large difference between European areas does not encourage a plan of cohesion and union, because richer states will always demand more favourable, rather than equal, conditions. However, greater cohesion and economic union would strengthen all Member States and, consequently, promote stronger political cooperation and faster decision-making. This could be what the European Union needs, as it faces not only slowing growth, but also the spread of populist and nationalist parties that threaten its structure and common economic policies. <br>A second explanation is structural in nature: from a technological point of view, Chinese and American progress is greater than European progress; the economic structure of the Old Continent is more backward and productivity is lower due to external causes. As a result, economic growth is naturally weaker. Demography also plays a key role, since Europe records growth of only +0.2/0.3%, while the United States records +1% growth, mainly because of immigration. China is in slight decline (-0.1%), but given that its population is already more than three times that of Europe and four times that of the United States, this does not automatically imply per capita growth.',
    'p6' => 'Although the situation, at this point, seems to point towards an increasingly marginal role, the Union has one major advantage over the other two states: the presence of the healthiest and most structured democracy in the world. According to V-Dem, a research institute on the quality of democracy, the EU has an average score between 0.85 and 0.9, where 1 represents a perfectly healthy democracy; the United States stands at around 0.6; and China at 0.05. Perhaps the reason behind the risky situation in which the European Union finds itself, between low growth and stagnation, is its inability to make use of this advantage. This is due to a lack of cohesion at the structural and decision-making level, which, given the slowness and difficulty of taking decisions, leaves it behind economically, despite being considered a healthier democracy.',

    'author' => 'By <a href="/aboutus/team/tommaso-prever.php?lang=en" style="text-decoration: underline;">Tommaso Prever</a>',

    'sources' => 'Sources',
    'src1' => '',
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
      <div style="min-height:396px" id="datawrapper-vis-8J0aQ"><script type="text/javascript" defer src="https://datawrapper.dwcdn.net/8J0aQ/embed.js" charset="utf-8" data-target="#datawrapper-vis-8J0aQ"></script><noscript><img src="https://datawrapper.dwcdn.net/8J0aQ/full.png" alt="La crescita europea resta più debole di Stati Uniti e Cina (Linee)" /></noscript></div>
      <p><?php echo ponte_e('p2'); ?></p>
      <p><?php echo ponte_e('p3'); ?></p>
      <p><?php echo ponte_e('p4'); ?></p>
      <p><?php echo ponte_t('p5'); ?></p>
      <p><?php echo ponte_e('p6'); ?></p>

      <p style="color: black;"><?php echo ponte_t('author'); ?></p>

      <hr style="margin:2rem 0; opacity:.25;">

      <section aria-label="Collaborazioni e fonti">
        <p style="text-align:center; margin:0 0 .5rem;"><strong><?php echo ponte_e('sources'); ?></strong></p>
        <p><a href="https://onlinelibrary.wiley.com/doi/10.1111/ecin.12100" style="color: black;">Basso, G., Cuberes, D. Political Ideology and Economic Growth: Evidence from the French Democracy. Economic Inquiry.</a></p>
        <p><a href="https://books.google.it/books?id=wiTtnUn5qGs" style="color: black;">European Commission / Eurostat. Trends in Economic Growth in the EU.</a></p>
        <p>Hayes-Renshaw, F., Wallace, H., Pollack, M. A. European Politics. 8th edition.</p>
        <p><a href="https://www.intereconomics.eu/contents/year/2021/number/2/article/cohesive-growth-in-europe-a-tale-of-two-peripheries.html" style="color: black;">Marelli, E., Signorelli, M. Cohesive Growth in Europe: A Tale of Two Peripheries. Intereconomics, 56(2), 2021.</a></p>
        <p><a href="https://www.aeaweb.org/articles?id=10.1257/jep.22.1.25" style="color: black;">van Ark, B., O’Mahony, M., Timmer, M. P. The Productivity Gap between Europe and the United States: Trends and Causes. Journal of Economic Perspectives, Vol. 22, No. 1 (2008), pp. 25-44.</a></p>
        <p><a href="https://www.v-dem.net" style="color: black;">V- Dem Democracy reports</a></p>
        <p><a href="https://data.worldbank.org/indicator/NY.GDP.MKTP.KD.ZG" style="color: black;">World Bank Group. World Development Indicators - GDP growth (annual %). Indicatore: NY.GDP.MKTP.KD.ZG.</a></p>
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
