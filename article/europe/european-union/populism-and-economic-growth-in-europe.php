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
    'title' => 'Populismo ed economia in Europa: cambiare l’establishment è la soluzione per la crescita? - TAXpedia',

    'h2' => 'Populismo ed economia in Europa: cambiare l’establishment è la soluzione per la crescita?',
    'subtitle' => '',
    'updated' => 'Ultimo aggiornamento: 16 luglio 2026',

    'p1' => 'Negli ultimi anni, abbiamo assistito a una crescita continua dei partiti populisti in tutta Europa: in Italia, Movimento 5 Stelle, Lega e Fratelli d\'Italia; in Spagna, Vox e Podemos; in Francia, Rassemblement National e La France insoumise; e in Germania, Alternative für Deutschland. In Italia, nel 2014, sommavano circa il 27% dei consensi, mentre i sondaggi attuali del 2026 li danno al 47%. In Spagna da 0 a 15%. In Francia, si è passati dal 25% al 31%. In Germania, da 0 a 19%. Sappiamo che la diffusione è legata alla sfiducia nei confronti dei partiti tradizionali, non considerati più in grado di risolvere la crisi economica, ma la fiducia riposta nei partiti che chiedono un cambio di establishment è davvero la soluzione?',
    'p2' => 'È bene iniziare con una definizione di populismo. Cas Mudde (2007), uno dei maggiori studiosi del fenomeno, lo definisce un\'ideologia debole (basata su poche idee) che divide la società tra popolo puro ed élite corrotta. Tra questi due gruppi c’è una lotta morale tra il bene del popolo e il male dell’élite. Nel contesto delle democrazie liberali, negli ultimi anni, i partiti populisti -contrari a questo sistema- sono in continua ascesa. Il terzo concetto base, oltre al popolo e all’élite, è la volontà generale, contrapposta alla volontà di tutti. Rifacendosi a Rousseau, la prima corrisponde alla capacità di organizzare i vari interessi e di governare; la seconda, invece, rappresenta solo la somma dei vari interessi. Ovviamente, i politici dovrebbero seguire la volontà generale, e i politici populisti dicono di essere gli unici a farlo, muovendo una forte critica ai politici tradizionali che, seguendo uno schema aristocratico, trattano i cittadini in modo passivo. Questa è la base ideologica.',
    'p3' => 'Da un punto di vista economico, quindi, i dettami principali mirano ad aiutare il “popolo”, con il protezionismo e il nazionalismo economico contrapposti alla globalizzazione, considerata causa della perdita di potere popolare. Un’analisi del Kiel Institute, uno dei più importanti think tank in ambito economico internazionale, può aiutare a comprendere appieno l’impatto economico. Come loro notano, l’elemento che caratterizza i partiti populisti sia a destra sia a sinistra è l’uso di questo odio nei confronti della classe dirigente corrotta. Questo, a livello economico, si traduce in un indebolimento dell’economia del paese, visto che, come promesso, vanno contro la legge e i sistemi politici di controllo, rendendo però la vita ancora più difficile al “popolo” che dichiarano di difendere. I partiti populisti di destra si concentrano sulle differenze etniche e culturali, accusando le élite di stare dalla parte dei migranti e non del vero “popolo”. A sinistra, invece, attaccano le élite finanziarie in quanto “saccheggiatrici” delle risorse del popolo. La loro analisi ha individuato un pattern: in media, dopo 15 anni di governo, il PIL è del 10% più basso in un governo populista rispetto a un non populista. I motivi? Il protezionismo, portato avanti con una retorica nazionalista che porta a imporre dazi e barriere agli investimenti internazionali. In secondo luogo, il fatto che vadano contro la legge, indebolendo le istituzioni democratiche, senza alcuna preoccupazione. Questi elementi hanno un effetto negativo sulla crescita economica, perché le istituzioni democratiche servono a proteggere dagli interventi arbitrari e a favorire gli investimenti e il libero scambio. Di conseguenza, i partiti populisti possono solo cercare di essere demagogici e di convincere che aiutino l’economia, ma i dati mostrano il contrario. ',
    'p4' => 'Inoltre, come dimostra un’ulteriore analisi di Brzozowki e Gorzelak (2025), la presenza di governi populisti è associata a uno spread più elevato sui titoli nazionali (e, di conseguenza, i mercati finanziari li considerano portatori di rischio). Però, se sono presenti forti salvaguardie fiscali, la situazione migliora; quando sono deboli, la presenza di partiti populisti aumenta lo spread di 7 punti per ogni aumento del 10% dei posti che hanno in parlamento, mentre quando sono forti, lo spread aumenta solo di 3,8 punti percentuali. Perciò, la vittoria di un partito populista comporta costi fiscali e un impatto negativo sull’economia. Infatti, come nota Locatelli (2026), negli ultimi anni si è verificata una continua depoliticizzazione della politica fiscale europea, che potrebbe essere stata alla base dell’ascesa dei partiti populisti: a causa di debiti sempre crescenti, sono state introdotte regole fiscali sempre più tecniche cosicché non potessero esserci critiche di natura politica. Ma questo ha creato un altro tipo di disaccordi e controversie, e questo sistema di governo tecnocratico ha permesso agli attori politici di contestare le leggi, invocando un sistema più semplice, con la risposta populista che si è mostrata tale.',
    'p5' => 'Ma consideriamo casi sia a sinistra che a destra in cui questo è accaduto e in cui non è accaduto. In Italia, per esempio, c’è una forte pressione populista, con un governo chiaramente di questa matrice rimasto al potere per 2 anni (Lega/M5S), ma vi sono forti vincoli istituzionali legati all’UE e una Costituzione più strutturata. Di conseguenza, la rottura con l’establishment e il collasso economico non si sono verificati: però non c’è stata nemmeno una crescita. Invece, in Ungheria, dopo Fidesz, il partito di Viktor Orbán è rimasto al potere tra il 2010 e il 2026; la pressione populista, a causa di salvaguardie e meccanismi di difesa più deboli, ha avuto un impatto più marcato: infatti, la crescita iniziale, sull’onda ottimistica, è stata positiva, ma dal 2020 in poi si sono alternati recessione e crescita stagnante. E anche lo spread, a supporto della teoria esposta in precedenza, è aumentato. Per fare un confronto, il Bund tedesco è preso come punto di riferimento a spread 0. In Italia, è passato da circa 100-200 nel 2020 a essere sotto i 100 ora. In Ungheria, invece, da 100 a 450. Di conseguenza, il rischio finanziario ha chiaramente un legame con il tipo di governo, populista o meno, anche se i meccanismi di salvaguardia nazionale e il legame con l’UE hanno altresì un impatto.',
    'p6' => 'Consideriamo ora, invece, la Spagna e la Finlandia, con due governi, rispettivamente di centrosinistra e centrodestra, ma di stampo più tradizionale, non populista. La Spagna ha registrato una crescita maggiore (2-3,5%) con uno spread compreso tra 90 e 110, mentre la Finlandia ha registrato una crescita più bassa (0-1%) con uno spread compreso tra 20 e 40. Sembra quindi che la soluzione proposta dai partiti populisti, quella di cambiare semplicemente l’establishment, non abbia ancora riscontro nei fatti e non comporti un’immediata crescita, poiché le istituzioni e il contesto macroeconomico restano gli elementi più rilevanti e gli esperimenti populisti sono stati, per il momento, in gran parte fallimentari.',

    'author' => 'A cura di <a href="/aboutus/team/tommaso-prever.php?lang=it" style="text-decoration: underline;">Tommaso Prever</a>',

    'sources' => 'Fonti',
    'src1' => '',
  ),
  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'Populism and the Economy in Europe: Is Changing the Establishment the Solution for Growth? - TAXpedia',

    'h2' => 'Populism and the Economy in Europe: Is Changing the Establishment the Solution for Growth?',
    'subtitle' => '',
    'updated' => 'Last updated: 16 July 2026',

    'p1' => 'In recent years, we have witnessed a continuous rise of populist parties across Europe: in Italy, the Five Star Movement, Lega and Brothers of Italy; in Spain, Vox and Podemos; in France, Rassemblement National and La France insoumise; and in Germany, Alternative für Deutschland. In Italy, in 2014, they accounted for around 27% of support, while current polls in 2026 place them at 47%. In Spain, from 0 to 15%. In France, from 25% to 31%. In Germany, from 0 to 19%. We know that this spread is linked to distrust toward traditional parties, which are no longer considered capable of solving the economic crisis. But is the trust placed in parties calling for a change of establishment really the solution?',
    'p2' => 'It is useful to begin with a definition of populism. Cas Mudde (2007), one of the leading scholars of the phenomenon, defines it as a thin ideology, based on only a few ideas, that divides society between the pure people and the corrupt elite. Between these two groups, there is a moral struggle between the good of the people and the evil of the elite. In the context of liberal democracies, in recent years, populist parties — opposed to this system — have been continuously rising. The third basic concept, in addition to the people and the elite, is the general will, opposed to the will of all. Drawing on Rousseau, the former corresponds to the ability to organize different interests and govern; the latter, instead, represents only the sum of different interests. Obviously, politicians should follow the general will, and populist politicians claim to be the only ones doing so, while strongly criticizing traditional politicians who, following an aristocratic pattern, treat citizens passively. This is the ideological foundation.',
    'p3' => 'From an economic point of view, therefore, the main principles aim to help the “people”, with protectionism and economic nationalism opposed to globalization, which is considered the cause of the loss of popular power. An analysis by the Kiel Institute, one of the most important think tanks in the field of international economics, can help us fully understand the economic impact. As they note, the element that characterizes populist parties on both the right and the left is the use of this hatred toward the corrupt ruling class. At the economic level, this translates into a weakening of the country’s economy, since, as promised, they go against the law and political systems of control, ultimately making life even more difficult for the “people” they claim to defend. Right-wing populist parties focus on ethnic and cultural differences, accusing the elites of siding with migrants rather than with the real “people”. On the left, instead, they attack financial elites as “plunderers” of the people’s resources. Their analysis identified a pattern: on average, after 15 years of government, GDP is 10% lower under a populist government than under a non-populist one. The reasons? Protectionism, pursued through nationalist rhetoric that leads to the imposition of tariffs and barriers to international investment. Secondly, the fact that they go against the law, weakening democratic institutions without any concern. These elements have a negative effect on economic growth, because democratic institutions serve to protect against arbitrary interventions and to encourage investment and free trade. As a result, populist parties can only try to be demagogic and convince people that they help the economy, but the data show the opposite.',
    'p4' => 'Furthermore, as shown by a further analysis by Brzozowki and Gorzelak (2025), the presence of populist governments is associated with a higher spread on national bonds and, consequently, financial markets consider them as bearers of risk. However, if strong fiscal safeguards are in place, the situation improves; when they are weak, the presence of populist parties increases the spread by 7 points for every 10% increase in the seats they hold in parliament, while when they are strong, the spread increases by only 3.8 percentage points. Therefore, the victory of a populist party entails fiscal costs and a negative impact on the economy. Indeed, as Locatelli (2026) notes, in recent years there has been a continuous depoliticization of European fiscal policy, which may have been at the root of the rise of populist parties: because of ever-growing debts, increasingly technical fiscal rules were introduced so that there could be no political criticism. But this created another kind of disagreement and controversy, and this technocratic system of governance allowed political actors to challenge the laws, calling for a simpler system, with the populist response proving to be exactly that.',
    'p5' => 'But let us consider cases both on the left and on the right in which this has happened and in which it has not. In Italy, for example, there is strong populist pressure, with a government clearly belonging to this tradition that remained in power for two years, Lega/Five Star Movement, but there are strong institutional constraints linked to the EU and a more structured Constitution. As a result, the break with the establishment and economic collapse did not occur; however, there was no growth either. In Hungary, instead, after Fidesz, Viktor Orbán’s party remained in power between 2010 and 2026; populist pressure, due to weaker safeguards and defense mechanisms, had a more marked impact: indeed, initial growth, on the wave of optimism, was positive, but from 2020 onward recession and stagnant growth alternated. And the spread, supporting the theory outlined above, also increased. For comparison, the German Bund is taken as the benchmark with a spread of 0. In Italy, it went from around 100–200 in 2020 to below 100 today. In Hungary, instead, from 100 to 450. Consequently, financial risk clearly has a connection with the type of government, populist or not, although national safeguards and the connection with the EU also have an impact.',
    'p6' => 'Let us now consider Spain and Finland, with two governments, respectively centre-left and centre-right, but of a more traditional, non-populist nature. Spain recorded higher growth, between 2% and 3.5%, with a spread between 90 and 110, while Finland recorded lower growth, between 0% and 1%, with a spread between 20 and 40. It therefore seems that the solution proposed by populist parties, namely simply changing the establishment, has not yet been confirmed by the facts and does not lead to immediate growth, since institutions and the macroeconomic context remain the most relevant elements, and populist experiments have so far largely failed.',
    
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
      <p><?php echo ponte_e('p2'); ?></p>
      <p><?php echo ponte_e('p3'); ?></p>
      <p><?php echo ponte_e('p4'); ?></p>
      <p><?php echo ponte_e('p5'); ?></p>
      <p><?php echo ponte_e('p6'); ?></p>

      <p><?php echo ponte_t('author'); ?></p>

      <hr style="margin:2rem 0; opacity:.25;">

      <section aria-label="Collaborazioni e fonti">
        <p style="text-align:center; margin:0 0 .5rem;"><strong><?php echo ponte_e('sources'); ?></strong></p>
        <p><a style="color:black;" href="https://academic.oup.com/book/866">Cas Mudde & Cristóbal Rovira Kaltwasser. (2017). Populism: A Very Short Introduction. Oxford University Press.</a></p>
        <p><a style="color:black;" href="https://www.kielinstitut.de/publications/kiel-focus/the-economic-consequences-of-populism/">Kiel Institute for the World Economy. (n.d.). The economic consequences of populism. Kiel Focus.</a></p>
        <p><a style="color:black;" href="https://papers.ssrn.com/sol3/papers.cfm?abstract_id=5743407">Papers SSRN. (2026). Pricing populism: Populist parties, fiscal rules and sovereign bond spreads in Europe (SSRN Working Paper No. 5743407).</a></p>
        <p><a style="color:black;" href="https://doi.org/10.1080/07036337.2026.2649954">Tandfonline / Taylor & Francis. (2026). The depoliticisation of fiscal policy in the EU.</a></p>
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
