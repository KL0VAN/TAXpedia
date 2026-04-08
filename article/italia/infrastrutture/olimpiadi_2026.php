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
    'title' => 'Cosa ci hanno lasciato le Olimpiadi? - TAXpedia',

    'h2' => 'Cosa ci hanno lasciato le Olimpiadi?',
    'subtitle' => '',
    'updated' => 'Ultimo aggiornamento: 20 marzo 2026',

    'p1' => '5 miliardi e 720 milioni di euro di cui 4 miliardi e 120 milioni solo per le infrastrutture. Queste sono le stime dei costi delle Olimpiadi invernali 2026. Cifre da record. Per farci un’idea di come ogni cittadino ha contribuito alla realizzazione di questo evento facciamo due conti. Semplificando, se approssimiamo il numero dei contribuenti italiani a 41 milioni, applicando una semplice divisione si scopre che ogni contribuente ha pagato circa €100 (€97,56) per la realizzazione delle sole infrastrutture, nonché il 70% della somma totale.',
    'p2_h3' => 'Quanto ne ricava l’economia del Paese?',
    'p2' => 'L’indotto economico stimato è 319 milioni di euro per le Olimpiadi e 31 milioni di euro per le Paralimpiadi. Un gruzzolo di monete in confronto alla spesa iniziale. D’altronde si sa, le Olimpiadi non sono una via di guadagno per i Paesi, basti pensare ai giochi estivi del 2024 dove su 7 miliardi investiti, l’utile è stato di 75 milioni (sempre guardando le stime).',
    
    'p3_h3' => 'E ai cittadini cosa rimane?',
    'p3_1' => 'Dopo le creazioni catastrofiche delle così dette “cattedrali nel deserto”, dal 2020 l’obiettivo dei Giochi Olimpici è creare un patrimonio collettivo. Infatti da Tokyo, sono state introdotte 118 riforme per rendere i Giochi più flessibili, economici e sostenibili, predisponendo dei piani di riutilizzo delle infrastrutture. Lo scopo è quello di riqualificare l’esistente e di costruire solo il necessario.
Le Olimpiadi invernali 2026 hanno cercato di seguire appieno questo intento. Costruito sul terreno dell’ex scalo Romana, nasce il Villaggio Olimpico e Paralimpico di Milano destinato a rifiorire come uno studentato universitario da 1700 posti letto, dove accorgimenti quali pompe di calore, fotovoltaico da 1MW, sistema di recupero delle acque piovane, portano all’annullamento delle sue emissioni.
Hanno gioito di un rinnovamento le piste di Bormio e gli impianti dello Stelvio. Livigno è stato valorizzato con cinque nuove piste e con la realizzazione dello Snow Park, poi fulcro delle discipline di freestyle e snowboard.',
    'p3_2' => 'Non sempre però questo proposito di dare nuova vita a infrastrutture già presenti sul territorio è stato seguito.
Come ben sappiamo, le gare di bob si sono disputate a Cortina d’Ampezzo insieme a skeleton, slittino e altre 13 discipline olimpiche. In particolare è stato deciso di costruire da zero la pista Eugenio Monti, che ha richiesto 118 milioni di euro per la sua costruzione. Quello che forse non molti sanno è che una pista con tutte le carte in tavola per partecipare ai Giochi già era presente a Cesena Torinese. Cesena Pariol, nome della pista, aveva già ospitato gli stessi Giochi già 20 anni prima, nel 2006, la coppa del mondo di bob nel 2009 e i campionati mondiali di slittino nel 2011, ultimo anno di attività. Perché non è stata ristrutturata ma si è preferito la costruzione di una nuova struttura?
Inoltre, nel piano originale, usato se vogliamo anche come giustificazione della realizzazione della nuova pista, questa doveva ospitare, in un futuro imminente (10-12 marzo 2026), i Campionati italiani di bob, skeleton e slittino. Invece, visti i problemi tecnico-strutturali, le gare sono state annullate.
Gli obiettivi, i valori delle Olimpiadi vengono sempre seguiti? Abbiamo generato “cattedrali nel deserto” o migliorato la situazione delle infrastrutture? Conviene ancora fare le Olimpiadi?
Solamente con il tempo scopriremo se avremo raggiunto il traguardo olimpico.',

    'author' => 'A cura di Matteo Cairoli e Filippo Canepa',

    'sources' => 'Fonti',
    'src1' => '',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    'h2' => 'What did the Olympics leave us?',
    'subtitle' => '',
    'updated' => 'Last update: 20 March 2026',

    'p1' => '5 billion and 720 million euros, of which 4 billion and 120 million were spent on infrastructure alone. These are the estimated costs of the 2026 Winter Olympics. Record-breaking figures. To understand how much each citizen contributed to the realization of this event, let’s do some quick math. Simplifying, if we approximate the number of Italian taxpayers at 41 million, a simple division shows that each taxpayer paid about €100 (€97.56) for the construction of infrastructure alone, which represents 70% of the total amount.',
    
    'p2_h3' => 'How much does the country’s economy gain from it?',
    'p2' => 'The estimated economic impact is 319 million euros for the Olympics and 31 million euros for the Paralympics. A small pile of coins compared to the initial spending. After all, it is well known that the Olympics are not a profitable venture for countries. Just think of the 2024 Summer Games where, out of 7 billion invested, the profit was only 75 million (again according to estimates).',
    
    'p3_h3' => 'And what do citizens gain from it?',
    'p3_1' => 'After the disastrous creations of the so-called “cathedrals in the desert”, since 2020 the goal of the Olympic Games has been to create a collective legacy. Starting with Tokyo, 118 reforms were introduced to make the Games more flexible, affordable, and sustainable, including plans for the reuse of infrastructure. The aim is to redevelop what already exists and build only what is necessary.
The 2026 Winter Olympics have tried to fully follow this approach. Built on the land of the former Scalo Romana railway yard, the Milan Olympic and Paralympic Village was created and is destined to flourish as a university student residence with 1,700 beds. Features such as heat pumps, 1MW photovoltaic panels, and a rainwater recovery system allow the complex to achieve zero emissions.
The slopes of Bormio and the facilities of Stelvio have also benefited from renovation. Livigno has been enhanced with five new slopes and the construction of the Snow Park, which later became the hub for freestyle and snowboard disciplines.',
    
    'p3_2' => 'However, this intention to give new life to existing infrastructure in the area has not always been followed.
As we know, the bobsleigh competitions were held in Cortina d’Ampezzo together with skeleton, luge, and 13 other Olympic disciplines. In particular, it was decided to build the Eugenio Monti track from scratch, which required 118 million euros for its construction. What perhaps not many people know is that a track fully suitable for hosting the Games already existed in Cesana Torinese. Cesana Pariol, the name of the track, had already hosted the same Games 20 years earlier, in 2006, the Bobsleigh World Cup in 2009, and the Luge World Championships in 2011, the last year it was in operation. Why was it not renovated and instead a new structure built?
Moreover, in the original plan, used if you will also as a justification for building the new track, it was supposed to host the Italian Championships in bobsleigh, skeleton, and luge in the near future (10–12 March 2026). Instead, due to technical and structural problems, the competitions were canceled.
Are the goals and values of the Olympics always followed? Have we created “cathedrals in the desert” or improved infrastructure? Is it still worth hosting the Olympics?
Only time will tell whether we have truly reached the Olympic finish line.',

    'author' => 'Written by Matteo Cairoli and Filippo Canepa',

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

      <h3 style="margin-top:1.6rem;"><?php echo ponte_e('p2_h3'); ?></h3>
      <p><?php echo ponte_e('p2'); ?></p>

      <h3 style="margin-top:1.6rem;"><?php echo ponte_e('p3_h3'); ?></h3>
      <p><?php echo ponte_e('p3_1'); ?></p>

      <figure class="media" style="margin:1.25rem 0;">
        <img
          src="../imm/Pista_Stelvio.jpg"
          alt="<?php echo ponte_e('img_alt'); ?>"
          style="display:block; width:100%; height:auto;"
          loading="lazy"
        >
        <figcaption style="margin-top:.5rem;">
          <small><?php echo ponte_e('img_cap'); ?></small>
        </figcaption>
      </figure>

      <p><?php echo ponte_e('p3_2'); ?></p>

      <p><?php echo ponte_e('author'); ?></p>

      <hr style="margin:2rem 0; opacity:.25;">

      <section aria-label="Collaborazioni e fonti">
        <p style="text-align:center; margin:0 0 .5rem;"><strong><?php echo ponte_e('sources'); ?></strong></p>
        <p style="text-align:center; margin:0;">Fondazione Milano Cortina 2026</p>
        <p style="text-align:center; margin:0;">SIMICO – Società Infrastrutture Milano Cortina</p>
        <p style="text-align:center; margin:0;">Dipartimento per lo Sport</p>
        <p style="text-align:center; margin:0;">CIO / IOC</p>
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
