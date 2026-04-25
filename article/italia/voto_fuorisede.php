<?php
require_once __DIR__ . '/../../i18n/i18n.php';

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
    'title' => 'Il prezzo del voto - TAXpedia',

    'h2' => 'Il prezzo del voto',
    'subtitle' => '',
    'updated' => 'Ultimo aggiornamento: 10 aprile 2026',

    'p1' => 'L’Articolo 48 della Costituzione Italiana dichiara che sono elettori tutti i cittadini, uomini e donne, che hanno raggiunto la maggiore età. Ma ne siamo proprio sicuri? È fuori di dubbio che votare sia uno dei diritti fondamentali alla base della nostra democrazia, ma è altrettanto vero che non tutti fattivamente riescono a farlo e il Referendum sulla giustizia del 22-23 marzo 2026 ne è la prova più recente.  A oggi, si stimano circa 4,5–5 milioni di elettori fuori sede in Italia tra lavoratori, studenti e ospiti di strutture ospedaliere. Questi, per adempiere a un loro diritto e dovere, sono costretti a rientrare nei loro comuni di appartenenza affrontando considerevoli spese, che spesso portano la maggior parte a rinunciare.',
  
    'p2' => 'A pesare sui portafogli dei fuorisede sono principalmente gli spostamenti di qualsivoglia natura, nonostante diverse compagnie abbiano provveduto a fornire sconti specifici per i weekend di voto -  fino al 60%-70% per Trenitalia, per la Compagnia Italiana di Navigazione; ITA Airways ha rivisto le sue tariffe, così come  i pedaggi autostradali sono stati ridotti, se non addirittura aboliti. Se, come esempio, applichiamo tali incentivi al Referendum del 2025, ipotizzando che tutti i 67.300 fuorisede votanti li abbiano sfruttati, questi sarebbero i dati: se un rientro “tipo” costa a prezzo pieno tra gli 80 e i 120 € A/R in treno, e se gli sconti ammontano tra il 60 e il 70%, dunque l’incentivo vale tra i 50 e gli 80 € per ogni viaggio elettorale, allora si avrebbe che il valore complessivo degli incentivi sarebbe nell’ordine dei 4 milioni di euro. Estendendo il calcolo a tutti 4,5–5 milioni di fuorisede, si parlerebbe potenzialmente di circa 250–300 milioni di euro di sconti complessivi su una singola tornata elettorale (5.000.000 × 60 € = 300 mln). Cifre decisamente insostenibili per la spesa statale considerando che in media una tornata elettorale costa meno della metà. Tuttavia, nonostante il calo dei prezzi, ancora solo una piccolissima fetta di fuorisede decide di fare questo sforzo, abbassando così la percentuale di votanti. Non sarebbe, dunque, più conveniente per ambo le parti, stato e cittadini, istituire il voto per i fuorisede da remoto? Evitando così che gli Italiani affrontino spese inutili, si prendano ferie o saltino ore di studio per votare, o che addirittura decidano di desistere?',
    
    'read' => 'Leggi anche: ',
    'article' => 'Quanto costa votare?',

    'p3' => 'Conseguentemente, alcune proposte più strutturate, per trovare una soluzione al problema, sono state presentate da associazioni come The Good Lobby e campagne come “Voto dove vivo”: si potrebbe infatti considerare l’opzione di inviare a domicilio la scheda elettorale, (come avviene per i residenti all’estero), da rispedire poi per posta, oppure votazioni anticipate per i fuorisede, così che le schede possano essere poi reindirizzate per tempo ai comuni di riferimento, tralasciando soluzioni più radicali come il voto digitale che porta con sé ancora molte incognite come la sicurezza, l’anonimato e l’affidabilità.',

    'author' => 'A cura di Ottilia Ogliari',

    'sources' => 'Fonti',
    'src1' => '',
  ),

  // =========================
  // EN
  // =========================
  'en' => array(
    
    'h2' => 'The price of voting',
    'subtitle' => '',
    'updated' => 'Last updated: 10 April 2026',

    'p1' => 'Article 48 of the Italian Constitution states that all citizens, men and women, who have reached the age of majority are entitled to vote. But are we really sure about that? There is no doubt that voting is one of the fundamental rights at the core of our democracy, but it is equally true that not everyone is actually able to exercise it, and the 22-23 March 2026 referendum on justice is the most recent proof of this. As of today, there are an estimated 4.5 to 5 million non-resident voters in Italy, including workers, students, and patients staying in hospital facilities. In order to fulfill both a right and a civic duty, they are forced to return to their home municipalities, facing considerable expenses that often lead most of them to give up.',

    'p2' => 'What weighs most heavily on the wallets of non-resident voters is travel of any kind, despite the fact that several companies have offered specific discounts for voting weekends - up to 60%-70% for Trenitalia and the Italian Navigation Company; ITA Airways has revised its fares, and motorway tolls have also been reduced, if not completely waived. If, for example, we apply these incentives to the 2025 referendum, assuming that all 67,300 non-resident voters made use of them, these would be the figures: if a “typical” round trip costs between €80 and €120 at full price by train, and if the discounts amount to between 60% and 70%, then the incentive would be worth between €50 and €80 for each electoral journey, meaning that the overall value of the incentives would be in the region of €4 million. Extending the calculation to all 4.5-5 million non-resident voters, this would potentially amount to around €250-300 million in total discounts for a single election round (5,000,000 × €60 = €300 million). These figures are clearly unsustainable for public spending, considering that an average election round costs less than half that amount. However, despite the drop in prices, only a very small share of non-resident voters still decides to make this effort, thus lowering voter turnout. Would it not, therefore, be more convenient for both parties, the state and the citizens, to establish remote voting for non-resident voters? This would prevent Italians from facing unnecessary expenses, taking time off work, missing hours of study in order to vote, or even deciding not to vote at all.',

    'read' => 'Read also: ',
    'article' => 'How much does it cost to vote?',

    'p3' => 'Consequently, some more structured proposals to find a solution to the problem have been put forward by associations such as The Good Lobby and campaigns such as “I vote where I live”: one option could be to send the ballot paper directly to voters’ homes (as already happens for residents abroad), to then be returned by post, or to introduce early voting for non-resident voters, so that the ballots can then be redirected in time to the relevant municipalities, setting aside more radical solutions such as digital voting, which still raises many uncertainties regarding security, anonymity, and reliability.',

    'author' => 'Edited by Ottilia Ogliari',

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

      <figure class="media" style="margin:1.25rem 0;">
        <img
          src="/article/italia/imm/urna.jpg"
          alt="<?php echo ponte_e('img_alt'); ?>"
          style="display:block; width:100%; height:auto;"
          loading="lazy"
        >
      </figure> 

      <p style="text-align:center;"><?php echo ponte_e('read'); ?><a href="/article/italia/costo_regionali.php" style="text-decoration: underline;"><?php echo ponte_e('article'); ?></a></p>
      <p><?php echo ponte_e('p3'); ?></p>

      <p><?php echo ponte_e('author'); ?></p>

      <hr style="margin:2rem 0; opacity:.25;">

      <section aria-label="Collaborazioni e fonti">
        <p style="text-align:center; margin:0 0 .5rem;"><strong><?php echo ponte_e('sources'); ?></strong></p>
        <p style="text-align:center; margin:0;">Ministero dell'Università e della Ricerca</p>
        <p style="text-align:center; margin:0;">Ministero dell'Interno</p>
        <p style="text-align:center; margin:0;">Campagna “Voglio votare fuorisede”</p>
        <p style="text-align:center; margin:0;">ANVUR</p>
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
