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
    'title' => 'Ricerca, il paradosso italiano: più spesa, ma il gap con l’Europa resta - TAXpedia',

    'h2' => 'Ricerca, il paradosso italiano:',
    'subtitle' => 'più spesa, ma il gap con l’Europa resta',
    'updated' => 'Ultimo aggiornamento: 16 giugno 2026',

    'p1' => 'L’ennesimo paradosso italiano: sebbene l’Italia abbia aumentato la spesa per la ricerca e sviluppo a 29,4 miliardi di euro, essa resta ferma all’ 1,37% del PIL, decisamente sotto la media europea di circa il 2,2%, e lontana da paesi come la Germania o Finlandia, sopra il 3%. Per comprendere il paradosso, è necessario avere la giusta chiave di lettura: a dover ricevere la nostra attenzione non è il valore nominale dell’aumento della spesa per R&S, ma l’aumento effettivo rispetto al PIL del paese. Esso infatti è cresciuto lentamente a partire dal 2010 al 2023, fino al valore sopracitato di 1,37%. Come se non bastasse, anche da un punto di vista occupazionale, il gap tra il nostro paese e la media europea è notevole: i ricercatori ogni 1.000 occupati in Italia sono 7, mentre nell’UE circa 10, facendoci dunque capire che il problema non si limita a “quanto spendiamo”, ma riguarda anche la sfera lavorativa. Per citare un’altra statistica importante, Eurostat segnala che nel 2023 l’UE disponeva di circa 2,15 milioni di ricercatori di cui solo 170 mila italiani.',
    'p2' => 'Adesso torniamo a casa nostra e rispondiamo ad alcune fondamentali domande che ci possono far comprendere meglio la critica appena esposta. Innanzitutto, qual è il vero scopo della spesa per la ricerca e lo sviluppo? I finanziamenti in R&S dovrebbero sostenere la crescita dello stato italiano in diversi settori, come la produzione industriale, la medicina e l’intelligenza artificiale. E chi sono i principali contribuenti? Sicuramente il primo posto è occupato dalle imprese, finanziando circa il 51,1% dell’intera quota, con un valore che arriva a 15 miliardi. Sul secondo gradino, troviamo, forse sorprendentemente, le istituzioni pubbliche, che partecipano fino al 36,9%. Tale percentuale ci fa notare che lo Stato finanzia più di un terzo della R&S italiana. Altro dato molto forte: le istituzioni pubbliche finanziano l’88,7% della propria R&S, ma anche l’80,9% della R&S delle università e il 43,7% della R&S del settore non profit. Quindi il finanziamento pubblico è decisivo soprattutto per università, enti pubblici e ricerca di base. A seguire troviamo i finanziatori esteri con 2,9 miliardi. Tutte le fonti di finanziamento appena citate hanno visto una crescita della spesa dal 2022 al 2023 e un’ulteriore aumento dal 2024 al 2025, a partire dal 3,6% per le imprese, fino al 11,7% per il settore pubblico, la cui espansione nel breve periodo è la più notevole rispetto a quella delle imprese. L\'altra informazione cruciale è sicuramente chi beneficia di tali investimenti e chi porta davvero alla realizzazione di nuove tecnologie e conoscenze: ovviamente, in cima alla graduatoria troviamo le imprese, seguite dall’università, con il 25% del totale e in seguito le istituzioni pubbliche.',
    'p3' => 'Oltre a parlare dei dati di R&S, cioè la spesa effettiva in ricerca e sviluppo, ci si potrebbe anche soffermare velocemente su GBARD, Government Budget Allocations for Research and Development, cioè gli stanziamenti pubblici di bilancio per ricerca e sviluppo, per mostrare che la quota complessiva ammonta a circa 13,5 miliardi, con circa il 40% destinato alle università attraverso FFO (Fondo Finanziamento Ordinario). I fondi della spesa pubblica sono, dunque, fondamentali e costituiscono la principale fonte di sostentamento per le università statali italiane, insieme alla tasse studentesche. Nello specifico il FFO, funziona da colonna vertebrale per il finanziamento della didattica, della ricerca e il funzionamento delle strutture, ⁠esso ammonta a circa 9,4 miliardi annui (dato del 2025), pertanto 336 milioni in più rispetto a quanto era stato allocato nel 2024. Inoltre, il Ministero stanzia altri fondi per l’edilizia universitaria, così che le strutture didattiche siano sicure e adeguate all’apprendimento. Oltre, alla quote per le università, il GBARD destina anche il 13,4% per l’esplorazione e l’utilizzo dello spazio e infine 11,9% per la protezione e la promozione della salute umana e circa il 10% per le produzioni e le tecnologie industriali.',

    'read' => 'Leggi anche: ',
    'article' => 'Italia: Istruzione e Ricerca',

    'author' => 'A cura di <a href="/aboutus/team/ottilia-ogliari.php?lang=it" style="text-decoration: underline;">Ottilia Ogliari</a>',

    'sources' => 'Fonti',
    'src1' => '',
    'collab' => 'Articolo realizzato in collaborazione con',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'title' => 'Research, the Italian paradox: more spending, but the gap with Europe remains - TAXpedia',

    'h2' => 'Research, the Italian paradox:',
    'subtitle' => 'more spending, but the gap with Europe remains',
    'updated' => 'Last updated: 16 June 2026',

    'p1' => 'Another Italian paradox: although Italy has increased its spending on research and development to €29.4 billion, it remains stuck at 1.37% of GDP, well below the European average of around 2.2%, and far from countries such as Germany or Finland, which exceed 3%. To understand this paradox, we need the right perspective: what should draw our attention is not the nominal increase in R&D spending, but the actual increase in relation to the country’s GDP. In fact, this share grew slowly from 2010 to 2023, reaching the aforementioned value of 1.37%. As if that were not enough, from an employment perspective as well, the gap between our country and the European average is significant: there are 7 researchers for every 1,000 employed people in Italy, compared with around 10 in the EU. This shows that the problem is not limited to “how much we spend”, but also concerns the labour market. To cite another important statistic, Eurostat reports that in 2023 the EU had around 2.15 million researchers, of whom only 170,000 were Italian.',

    'p2' => 'Let us now return to Italy and answer some fundamental questions that can help us better understand the criticism just outlined. First of all, what is the real purpose of spending on research and development? R&D funding should support the growth of the Italian state across several sectors, such as industrial production, medicine and artificial intelligence. And who are the main contributors? Companies certainly rank first, financing around 51.1% of the total share, with a value reaching €15 billion. In second place, perhaps surprisingly, we find public institutions, which contribute up to 36.9%. This percentage shows that the State finances more than one third of Italian R&D. Another very striking figure: public institutions fund 88.7% of their own R&D, but also 80.9% of university R&D and 43.7% of R&D in the non-profit sector. Public funding is therefore decisive, especially for universities, public bodies and basic research. This is followed by foreign funders, with €2.9 billion. All the sources of funding just mentioned recorded an increase in spending from 2022 to 2023 and a further increase from 2024 to 2025, ranging from 3.6% for companies to 11.7% for the public sector, whose short-term expansion is the most significant compared with that of companies. The other crucial piece of information is who benefits from these investments and who truly contributes to the creation of new technologies and knowledge: unsurprisingly, companies rank first, followed by universities, with 25% of the total, and then public institutions.',

    'p3' => 'In addition to discussing R&D data, meaning actual spending on research and development, we can also briefly focus on GBARD, Government Budget Allocations for Research and Development, namely public budget allocations for research and development. This shows that the overall amount is around €13.5 billion, with about 40% allocated to universities through the FFO, the Ordinary Financing Fund. Public spending funds are therefore essential and represent the main source of support for Italian state universities, together with student fees. More specifically, the FFO acts as the backbone for financing teaching, research and the operation of university facilities. It amounts to around €9.4 billion per year, according to 2025 data, which is €336 million more than the amount allocated in 2024. In addition, the Ministry allocates further funds for university construction and infrastructure, so that teaching facilities are safe and suitable for learning. Besides the share allocated to universities, GBARD also devotes 13.4% to the exploration and use of space, 11.9% to the protection and promotion of human health, and around 10% to industrial production and technology.',

    'read' => 'Read also: ',
    'article' => 'Italy: Education and Research',

    'author' => 'Edited by <a href="/aboutus/team/ottilia-ogliari.php?lang=en" style="text-decoration: underline;">Ottilia Ogliari</a>',

    'sources' => 'Sources',
    'src1' => '',
    'collab' => 'Article produced in collaboration with',
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

  <style>
    .article-collab {
      margin: 2rem auto 0;
      padding: 1.25rem 1rem 0;
      text-align: center;
    }

    .article-collab__text {
      margin: 0 0 .75rem;
    }

    .article-collab__figure {
      margin: 0;
    }

    .article-collab__link {
      display: inline-flex;
      align-items: center;
      justify-content: center;
    }

    .article-collab__logo {
      display: block;
      width: min(220px, 70vw);
      max-width: 100%;
      height: auto;
      object-fit: contain;
    }

    @media (max-width: 600px) {
      article.feature.feature--large {
        margin: 2rem auto !important;
      }

      .article-collab {
        margin-top: 1.5rem;
        padding-left: .5rem;
        padding-right: .5rem;
      }

      .article-collab__logo {
        width: min(180px, 72vw);
      }
    }
  </style>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
    <article class="feature feature--large" style="margin:4rem auto; max-width:720px; text-align:left;">

      <header style="margin-bottom:1.25rem;">
        <h2 class="section-title" style="margin-bottom:.35rem;">
          <?php echo ponte_e('h2'); ?>
        </h2>
        <h2 style="margin:.25rem 0 0;">
          <?php echo ponte_e('subtitle'); ?>
        </h2>
        <p class="meta" style="margin:.5rem 0 0;">
          <small><?php echo ponte_e('updated'); ?></small>
        </p>
      </header>

      <p><?php echo ponte_e('p1'); ?></p>
      <div style="min-height:238px" id="datawrapper-vis-H6dnZ"><script type="text/javascript" defer src="https://datawrapper.dwcdn.net/H6dnZ/embed.js" charset="utf-8" data-target="#datawrapper-vis-H6dnZ"></script><noscript><img src="https://datawrapper.dwcdn.net/H6dnZ/full.png" alt="Research and development expenditure: Italy remains far from the European target (Bar Chart)" /></noscript></div>
      <div style="height:20px;"></div>
      <p><?php echo ponte_e('p2'); ?></p>
   
      <div style="min-height:559px" id="datawrapper-vis-2cjTk"><script type="text/javascript" defer src="https://datawrapper.dwcdn.net/2cjTk/embed.js" charset="utf-8" data-target="#datawrapper-vis-2cjTk"></script><noscript><img src="https://datawrapper.dwcdn.net/2cjTk/full.png" alt="Who funds Italian research and development? (Pie Chart)" /></noscript></div>
      <div style="height:20px;"></div>
      <p style="text-align:center;"><?php echo ponte_e('read'); ?><a href="/article/italia/istruzione_ricerca.php" style="text-decoration: underline;"><?php echo ponte_e('article'); ?></a></p>
      <p><?php echo ponte_e('p3'); ?></p>

      <p><?php echo ponte_t('author'); ?></p>

      <hr style="margin:2rem 0; opacity:.25;">

      <section aria-label="fonti">
        <p style="text-align:center; margin:0 0 .5rem;"><strong><?php echo ponte_e('sources'); ?></strong></p>
        <p style="text-align:center; margin:0;">Government Budget Allocations for Research and Development</p>
        <p style="text-align:center; margin:0;">Ministero dell'Università e della Ricerca (MUR)</p>
        <p style="text-align:center; margin:0;">Eurostat</p>
        <p style="text-align:center; margin:0;">Istat</p>
      </section>

      <section class="article-collab" aria-label="Collaborazioni">
        <p class="article-collab__text"><?php echo ponte_e('collab'); ?></p>
        <figure class="article-collab__figure">
          <a class="article-collab__link" href="https://www.instagram.com/rethink_uni/" target="_blank" rel="noopener noreferrer">
            <img class="article-collab__logo" src="../imm/logo_rethink.png" alt="Logo rethink_uni" loading="lazy">
          </a>
        </figure>
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
