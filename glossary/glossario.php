<?php
/**
 * Glossario — TAXpedia
 *
 * Obiettivi UX/UI:
 * - chiarezza per non tecnici + credibilità (registro istituzionale)
 * - navigazione A–Z immediata
 * - termini linkabili (permalink)
 * - ricerca client-side
 *
 * i18n:
 * - cookie tp_lang (fallback IT)
 * - ?lang= ha priorità
 *
 * NOTE FUTURE:
 * - A–Z e sezioni sono generate dinamicamente in base alla lingua:
 *   in EN i termini iniziano con lettere diverse (Tax rate -> T, Public debt -> P, ...).
 * - Gli anchor (#letter-* / #term) vengono “corretti” con uno scroll offset calcolato
 *   (header sticky/fixed + barra A–Z sticky), evitando che le lettere risultino coperte.
 */

if (!function_exists('glos_get_lang')) {
  function glos_get_lang() {
    $lang = 'it';
    if (isset($_GET['lang'])) {
      $lang = strtolower(trim((string) $_GET['lang']));
    } elseif (isset($_COOKIE['tp_lang'])) {
      $lang = strtolower(trim((string) $_COOKIE['tp_lang']));
    }
    return in_array($lang, array('it','en'), true) ? $lang : 'it';
  }
}
$GLOS_LANG = glos_get_lang();

if (!function_exists('glos_h')) {
  function glos_h($s) { return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8'); }
}

$GLOS_UI = array(
  'it' => array(
    'title' => 'Glossario — TAXpedia',
    'meta'  => 'Glossario dei principali termini di fiscalità, spesa pubblica e conti delle amministrazioni pubbliche.',
    'h1'    => 'Glossario',
    'intro' => 'Definizioni operative dei principali termini di fiscalità, spesa pubblica e conti delle amministrazioni pubbliche. Voci sintetiche, terminologia tecnica, linguaggio accessibile.',
    'az'    => 'Indice alfabetico (A–Z)',
    'search_label' => 'Cerca nel glossario',
    'search_ph'    => 'Cerca un termine o una parola chiave',
    'count_label'  => 'Voci visualizzate',
    'entries'      => 'Voci',
    'permalink'    => 'Link diretto a',
  ),
  'en' => array(
    'title' => 'Glossary — TAXpedia',
    'meta'  => 'Operational definitions of key terms in taxation, public expenditure and general government accounts.',
    'h1'    => 'Glossary',
    'intro' => 'Operational definitions of key terms in taxation, public expenditure and general government accounts. Concise entries, technical terminology, accessible language.',
    'az'    => 'Alphabetical index (A–Z)',
    'search_label' => 'Search the glossary',
    'search_ph'    => 'Search a term or keyword',
    'count_label'  => 'Entries shown',
    'entries'      => 'Entries',
    'permalink'    => 'Direct link to',
  ),
);

if (!function_exists('glos_t')) {
  function glos_t($key) {
    global $GLOS_LANG, $GLOS_UI;
    if (isset($GLOS_UI[$GLOS_LANG][$key])) return $GLOS_UI[$GLOS_LANG][$key];
    if (isset($GLOS_UI['it'][$key])) return $GLOS_UI['it'][$key];
    return '';
  }
}

/**
 * Glossary data
 * - Mantiene gli ID esistenti (link “stabili”)
 * - Term/def IT migliorati (più tecnici e netti)
 * - EN allineato (public finance / economics register)
 *
 * NOTA: la lettera di raggruppamento non è più “hardcoded”:
 * viene ricalcolata in base al termine mostrato nella lingua attiva.
 */
$GLOSSARY = array(
  'A' => array(
    array(
      'id' => 'accertamento_fiscale',
      'term_it' => 'Accertamento fiscale',
      'def_it'  => 'Procedura con cui l’amministrazione finanziaria verifica la correttezza di dichiarazioni, redditi e imposte versate.',
      'term_en' => 'Tax assessment (audit)',
      'def_en'  => 'Procedure by which the tax authority checks the accuracy of tax returns, declared income, and taxes paid.',
    ),
    array(
      'id' => 'addizionali_fiscali',
      'term_it' => 'Addizionali fiscali',
      'def_it'  => 'Quote aggiuntive rispetto a un’imposta nazionale, riscosse da enti locali come regioni e comuni.',
      'term_en' => 'Local surtaxes',
      'def_en'  => 'Additional tax amounts on top of a national tax, collected by local authorities such as regions and municipalities.',
    ),
    array(
      'id' => 'agevolazioni_fiscali',
      'term_it' => 'Agevolazioni fiscali',
      'def_it'  => 'Misure che riducono il carico fiscale per determinate attività o categorie, tramite detrazioni, deduzioni, aliquote ridotte o crediti d’imposta.',
      'term_en' => 'Tax reliefs',
      'def_en'  => 'Measures that reduce the tax burden for certain activities or groups through deductions, allowances, reduced rates, or tax credits.',
    ),
    array(
      'id' => 'aliquota',
      'term_it' => 'Aliquota',
      'def_it'  => 'Percentuale applicata alla base imponibile per determinare l’imposta dovuta.',
      'term_en' => 'Tax rate',
      'def_en'  => 'Percentage applied to the taxable base to compute the tax due.',
    ),
  ),
  'B' => array(
    array(
      'id' => 'base-imponibile',
      'term_it' => 'Base imponibile',
      'def_it'  => 'Ammontare o valore sul quale si applica l’aliquota per calcolare l’imposta.',
      'term_en' => 'Taxable base',
      'def_en'  => 'Amount or value to which the tax rate is applied in order to determine the tax due.',
    ),
    array(
      'id' => 'bilancio_dello_stato',
      'term_it' => 'Bilancio dello Stato',
      'def_it'  => 'Documento che riepiloga entrate e spese dello Stato in un periodo e stabilisce come le risorse pubbliche vengono raccolte e utilizzate.',
      'term_en' => 'State budget',
      'def_en'  => 'Document that summarises a government’s revenues and expenditures over a period and defines how public resources are raised and used.',
    ),
  ),
  'C' => array(
    array(
      'id' => 'contribuente',
      'term_it' => 'Contribuente',
      'def_it'  => 'Persona fisica o giuridica su cui grava l’obbligazione tributaria.',
      'term_en' => 'Taxpayer',
      'def_en'  => 'Natural or legal person who is legally liable for a tax obligation.',
    ),
    array(
      'id' => 'credito_d_imposta',
      'term_it' => 'Credito d’imposta',
      'def_it'  => 'Somma che può essere sottratta direttamente dall’imposta dovuta, spesso prevista per incentivare spese o investimenti specifici.',
      'term_en' => 'Tax credit',
      'def_en'  => 'Amount that can be deducted directly from the tax due, often granted to encourage specific spending or investments.',
    ),
    array(
      'id' => 'cuneo-fiscale',
      'term_it' => 'Cuneo fiscale',
      'def_it'  => 'Differenza tra costo del lavoro sostenuto dal datore e retribuzione netta percepita dal lavoratore, determinata da imposte e contributi sociali.',
      'term_en' => 'Tax wedge',
      'def_en'  => 'Difference between an employer’s total labour cost and a worker’s net take-home pay, driven by taxes and social security contributions.',
    ),
  ),
  'D' => array(
    array(
      'id' => 'debito-pubblico',
      'term_it' => 'Debito pubblico',
      'def_it'  => 'Ammontare complessivo delle passività finanziarie delle amministrazioni pubbliche verso i creditori.',
      'term_en' => 'Public debt',
      'def_en'  => 'Total stock of financial liabilities of general government owed to creditors.',
    ),
    array(
      'id' => 'deduzioni',
      'term_it' => 'Deduzioni',
      'def_it'  => 'Spese che possono essere sottratte dal reddito complessivo prima del calcolo dell’imposta, riducendo la base imponibile.',
      'term_en' => 'Deductions',
      'def_en'  => 'Expenses that can be subtracted from total income before calculating tax, reducing the taxable base.',
    ),
    array(
      'id' => 'detrazioni',
      'term_it' => 'Detrazioni',
      'def_it'  => 'Importi che riducono l’imposta lorda e concorrono a determinare l’imposta netta.',
      'term_en' => 'Tax credits',
      'def_en'  => 'Amounts deducted from gross tax liability to determine net tax payable.',
    ),
    array(
      'id' => 'dichiarazione-dei-redditi',
      'term_it' => 'Dichiarazione dei redditi',
      'def_it'  => 'Dichiarazione con cui il contribuente comunica all’amministrazione finanziaria redditi e altri elementi rilevanti per la determinazione dell’imposta.',
      'term_en' => 'Income tax return',
      'def_en'  => 'Formal filing through which a taxpayer reports income and other relevant information to the tax authority.',
    ),
  ),
  'E' => array(
    array(
      'id' => 'elusione_fiscale',
      'term_it' => 'Elusione fiscale',
      'def_it'  => 'Comportamenti formalmente legali che sfruttano le norme per ridurre il carico fiscale, aggirando lo spirito della legge.',
      'term_en' => 'Tax avoidance',
      'def_en'  => 'Formally legal arrangements that exploit rules to reduce tax liabilities while going against the intent of the law.',
    ),
    array(
      'id' => 'evasione-fiscale',
      'term_it' => 'Evasione fiscale',
      'def_it'  => 'Inadempimento illecito degli obblighi tributari che comporta il mancato versamento di imposte dovute mediante occultamento o alterazione della base imponibile.',
      'term_en' => 'Tax evasion',
      'def_en'  => 'Illegal non-compliance that results in unpaid taxes, typically through concealment or misreporting of the tax base.',
    ),
  ),
  'G' => array(
    array(
      'id' => 'gettito-fiscale',
      'term_it' => 'Gettito fiscale',
      'def_it'  => 'Entrate tributarie incassate dalle amministrazioni pubbliche in un determinato periodo.',
      'term_en' => 'Tax revenue',
      'def_en'  => 'Taxes collected by general government over a given period.',
    ),
  ),
  'I' => array(
    array(
      'id' => 'imposta',
      'term_it' => 'Imposta',
      'def_it'  => 'Prelievo coattivo senza controprestazione diretta, destinato al finanziamento della spesa pubblica.',
      'term_en' => 'Tax',
      'def_en'  => 'Compulsory, unrequited payment to general government used to finance public expenditure.',
    ),
    array(
      'id' => 'imposte_dirette',
      'term_it' => 'Imposte dirette',
      'def_it'  => 'Imposte che colpiscono direttamente il reddito o il patrimonio del contribuente, come IRPEF e IRES.',
      'term_en' => 'Direct taxes',
      'def_en'  => 'Taxes levied directly on a taxpayer’s income or wealth, such as personal or corporate income taxes.',
    ),
    array(
      'id' => 'imposte_indirette',
      'term_it' => 'Imposte indirette',
      'def_it'  => 'Imposte applicate su consumi o transazioni di beni e servizi, indipendentemente dal reddito del contribuente, come l’IVA.',
      'term_en' => 'Indirect taxes',
      'def_en'  => 'Taxes applied to the consumption or exchange of goods and services, regardless of the taxpayer’s income, such as VAT.',
    ),
    array(
      'id' => 'ires',
      'term_it' => 'IRES',
      'def_it'  => 'Imposta sul Reddito delle Società, applicata al reddito prodotto da società ed enti soggetti a imposizione.',
      'term_en' => 'IRES (corporate income tax)',
      'def_en'  => 'Italy’s corporate income tax (IRES), levied on income earned by companies and certain legal entities.',
    ),
    array(
      'id' => 'irpef',
      'term_it' => 'IRPEF',
      'def_it'  => 'Imposta sul reddito delle persone fisiche; imposta diretta con struttura progressiva per scaglioni di reddito.',
      'term_en' => 'IRPEF (Personal income tax, Italy)',
      'def_en'  => 'Italy’s personal income tax; a direct tax with progressive brackets.',
    ),
    array(
      'id' => 'iva',
      'term_it' => 'IVA',
      'def_it'  => 'Imposta generale sui consumi applicata al valore aggiunto, armonizzata nell’Unione europea.',
      'term_en' => 'VAT (Value Added Tax)',
      'def_en'  => 'General consumption tax levied on value added, harmonised across the European Union.',
    ),
  ),
  'P' => array(
    array(
      'id' => 'partita-iva',
      'term_it' => 'Partita IVA',
      'def_it'  => 'Codice identificativo attribuito ai soggetti passivi ai fini dell’IVA per la registrazione e gli adempimenti fiscali.',
      'term_en' => 'VAT identification number',
      'def_en'  => 'Identification code assigned to VAT-taxable persons for registration and compliance purposes.',
    ),
    array(
      'id' => 'pressione-fiscale',
      'term_it' => 'Pressione fiscale',
      'def_it'  => 'Rapporto tra entrate tributarie e contributive e PIL, espresso in percentuale.',
      'term_en' => 'Tax-to-GDP ratio',
      'def_en'  => 'Ratio of tax and social contribution revenues to GDP, expressed as a percentage.',
    ),
    array(
      'id' => 'pil',
      'term_it' => 'Prodotto Interno Lordo (PIL)',
      'def_it'  => 'Valore dei beni e servizi finali prodotti all’interno di un’economia in un periodo, di norma un anno.',
      'term_en' => 'Gross Domestic Product (GDP)',
      'def_en'  => 'Total value of final goods and services produced within an economy over a given period, usually one year.',
    ),
    array(
      'id' => 'protezione-sociale',
      'term_it' => 'Protezione sociale',
      'def_it'  => 'Funzione della spesa pubblica che finanzia prestazioni e servizi di welfare, inclusi pensioni, disoccupazione e sostegno al reddito.',
      'term_en' => 'Social protection',
      'def_en'  => 'Public expenditure function financing social benefits and services, including pensions, unemployment and income support.',
    ),
  ),
  'R' => array(
    array(
      'id' => 'rapporto-debito-pil',
      'term_it' => 'Rapporto debito/PIL',
      'def_it'  => 'Indicatore che rapporta il debito pubblico al PIL nominale; è espresso in percentuale.',
      'term_en' => 'Debt-to-GDP ratio',
      'def_en'  => 'Public debt divided by nominal GDP, expressed as a percentage.',
    ),
    array(
      'id' => 'ritenuta_alla_fonte',
      'term_it' => 'Ritenuta alla fonte',
      'def_it'  => 'Meccanismo con cui l’imposta viene trattenuta dal soggetto che paga il reddito e versata allo Stato per conto del contribuente.',
      'term_en' => 'Withholding tax',
      'def_en'  => 'Mechanism where tax is withheld by the payer of income and remitted to the government on the taxpayer’s behalf.',
    ),
  ),
  'S' => array(
    array(
      'id' => 'scaglione_di_reddito',
      'term_it' => 'Scaglione di reddito',
      'def_it'  => 'Intervallo di reddito a cui si applica una specifica aliquota in un sistema di imposizione progressiva.',
      'term_en' => 'Income tax bracket',
      'def_en'  => 'Income range to which a specific tax rate applies within a progressive tax system.',
    ),
    array(
      'id' => 'sostituto_d_imposta',
      'term_it' => 'Sostituto d’imposta',
      'def_it'  => 'Soggetto che, per legge, trattiene e versa le imposte dovute da un altro contribuente, ad esempio il datore di lavoro per i dipendenti.',
      'term_en' => 'Withholding agent',
      'def_en'  => 'Entity legally required to withhold and pay taxes on behalf of another taxpayer, such as an employer for employees.',
    ),
    array(
      'id' => 'spesa-pubblica',
      'term_it' => 'Spesa pubblica',
      'def_it'  => 'Totale delle uscite delle amministrazioni pubbliche in un periodo, includendo spesa corrente e in conto capitale.',
      'term_en' => 'Public expenditure',
      'def_en'  => 'Total spending of general government over a period, including current and capital expenditure.',
    ),
  ),
);

/**
 * Helper: determina la lettera A–Z per il raggruppamento, in base al termine mostrato.
 * - Normalizza accenti (traslitterazione ASCII) e prende la prima lettera alfabetica.
 * - Se non trova lettere, usa '#'.
 */
if (!function_exists('glos_group_letter')) {
  function glos_group_letter($term) {
    $s = trim((string)$term);
    if ($s === '') return '#';

    // traslittera per gestire accenti (es. È -> E)
    $ascii = @iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $s);
    if ($ascii === false || $ascii === null) $ascii = $s;

    // trova prima lettera A-Z
    if (preg_match('/[A-Za-z]/', $ascii, $m, PREG_OFFSET_CAPTURE)) {
      $ch = strtoupper($m[0][0]);
      return $ch;
    }
    return '#';
  }
}

/**
 * Costruisce una "vista" del glossario per la lingua attiva:
 * - appiattisce tutte le voci
 * - raggruppa per lettera del termine mostrato (IT o EN)
 * - ordina sia le lettere sia le voci all’interno (ordine alfabetico coerente con la lingua)
 */
$GLOSSARY_FLAT = array();
foreach ($GLOSSARY as $bucket => $items) {
  foreach ($items as $it) $GLOSSARY_FLAT[] = $it;
}

$GLOSSARY_VIEW = array();
foreach ($GLOSSARY_FLAT as $it) {
  $term = ($GLOS_LANG === 'en') ? $it['term_en'] : $it['term_it'];
  $L = glos_group_letter($term);
  if (!isset($GLOSSARY_VIEW[$L])) $GLOSSARY_VIEW[$L] = array();
  $GLOSSARY_VIEW[$L][] = $it;
}

// ordina le lettere (A..Z) e lascia eventuale '#' in fondo
uksort($GLOSSARY_VIEW, function($a, $b){
  if ($a === $b) return 0;
  if ($a === '#') return 1;
  if ($b === '#') return -1;
  return strcmp($a, $b);
});

// ordina le voci dentro ogni lettera (per termine nella lingua attiva)
foreach ($GLOSSARY_VIEW as $L => &$items) {
  usort($items, function($x, $y) use ($GLOS_LANG){
    $tx = ($GLOS_LANG === 'en') ? $x['term_en'] : $x['term_it'];
    $ty = ($GLOS_LANG === 'en') ? $y['term_en'] : $y['term_it'];
    // confronto case-insensitive, rispettoso UTF-8 (fallback a strcasecmp)
    if (function_exists('mb_strtolower')) {
      $tx = mb_strtolower($tx, 'UTF-8');
      $ty = mb_strtolower($ty, 'UTF-8');
    } else {
      $tx = strtolower($tx);
      $ty = strtolower($ty);
    }
    return strcmp($tx, $ty);
  });
}
unset($items);

// lettere disponibili per la barra A–Z
$letters = array_keys($GLOSSARY_VIEW);

// conteggio voci
$total = count($GLOSSARY_FLAT);
?>
<!doctype html>
<html lang="<?php echo glos_h($GLOS_LANG); ?>">
<head>
  <meta charset="UTF-8">
  <title><?php echo glos_h(glos_t('title')); ?></title>
  <meta name="description" content="<?php echo glos_h(glos_t('meta')); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="icon" href="/imm/logoT.png" type="image/png">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css" />
  <link rel="stylesheet" href="/style/StyleTesti.css" />
  <link rel="stylesheet" href="/style/StyleGlossario.css" />
</head>
<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">

    <section class="glossario-intro">
      <h1><?php echo glos_h(glos_t('h1')); ?></h1>
      <p class="subtitle"><?php echo glos_h(glos_t('intro')); ?></p>
    </section>

    <section class="glossario-tools" aria-label="<?php echo glos_h(glos_t('entries')); ?>">
      <div class="glossario-search">
        <label for="glossarySearch"><?php echo glos_h(glos_t('search_label')); ?></label>
        <input
          id="glossarySearch"
          type="search"
          inputmode="search"
          autocomplete="off"
          placeholder="<?php echo glos_h(glos_t('search_ph')); ?>"
          aria-describedby="glossaryMeta"
        />
      </div>

      <div class="glossario-meta" id="glossaryMeta" aria-live="polite">
        <?php echo glos_h(glos_t('count_label')); ?>:
        <strong><span id="glossaryCount"><?php echo (int)$total; ?></span></strong> / <?php echo (int)$total; ?>
      </div>
    </section>

    <!-- Navigazione A–Z (dinamica per lingua) -->
    <nav class="glossario-az" aria-label="<?php echo glos_h(glos_t('az')); ?>">
      <ul>
        <?php foreach ($letters as $L): ?>
          <li><a href="#letter-<?php echo glos_h($L); ?>"><?php echo glos_h($L); ?></a></li>
        <?php endforeach; ?>
      </ul>
    </nav>

    <?php foreach ($GLOSSARY_VIEW as $L => $items): ?>
      <section class="glossario-section" id="letter-<?php echo glos_h($L); ?>" data-letter-section="<?php echo glos_h($L); ?>">
        <h2 class="glossario-letter"><?php echo glos_h($L); ?></h2>

        <dl class="glossary">
          <?php foreach ($items as $it):
            $term = ($GLOS_LANG === 'en') ? $it['term_en'] : $it['term_it'];
            $def  = ($GLOS_LANG === 'en') ? $it['def_en']  : $it['def_it'];
            $id   = $it['id'];
          ?>
            <div
              class="glossary-item"
              id="<?php echo glos_h($id); ?>"
              data-glossary-item="1"
              data-term="<?php echo glos_h($term); ?>"
              data-def="<?php echo glos_h($def); ?>"
            >
              <dt class="glossary-head">
                <span class="glossary-term"><?php echo glos_h($term); ?></span>
                <a class="glossary-link" href="#<?php echo glos_h($id); ?>" aria-label="<?php echo glos_h(glos_t('permalink') . ' ' . $term); ?>">#</a>
              </dt>
              <dd class="glossary-def"><?php echo glos_h($def); ?></dd>
            </div>
          <?php endforeach; ?>
        </dl>
      </section>
    <?php endforeach; ?>

  </main>

  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <!-- Ricerca client-side (minima, accessibile) -->
  <script>
  (function(){
    var input = document.getElementById('glossarySearch');
    var count = document.getElementById('glossaryCount');
    if(!input) return;

    var items = Array.prototype.slice.call(document.querySelectorAll('[data-glossary-item="1"]'));
    var sections = Array.prototype.slice.call(document.querySelectorAll('[data-letter-section]'));

    function norm(s){
      return (s || '')
        .toLowerCase()
        .normalize('NFD')
        .replace(/[\u0300-\u036f]/g, '');
    }

    function update(){
      var q = norm(input.value.trim());
      var visible = 0;

      items.forEach(function(el){
        var hay = norm((el.getAttribute('data-term') || '') + ' ' + (el.getAttribute('data-def') || ''));
        var show = !q || hay.indexOf(q) !== -1;
        el.hidden = !show;
        if(show) visible++;
      });

      // nasconde le sezioni-lettera vuote
      sections.forEach(function(sec){
        var any = sec.querySelector('[data-glossary-item="1"]:not([hidden])');
        sec.hidden = !any;
      });

      if(count) count.textContent = String(visible);
    }

    input.addEventListener('input', update);
    update();
  })();
  </script>

  <!-- Anchor fix: evita che header sticky + barra A–Z sticky coprano #letter-* e #term -->
  <script>
  (function(){
    function pickHeader(){
      return document.querySelector('header')
        || document.querySelector('#header')
        || document.querySelector('.header')
        || document.querySelector('.site-header');
    }

    function getOffset(){
      var offset = 12; // margine aria

      var hdr = pickHeader();
      if (hdr) {
        var st = window.getComputedStyle(hdr);
        if (st.position === 'sticky' || st.position === 'fixed') {
          offset += hdr.getBoundingClientRect().height;
        }
      }

      var az = document.querySelector('.glossario-az');
      if (az) offset += az.getBoundingClientRect().height;

      return Math.round(offset);
    }

    function scrollToId(id, smooth){
      var el = document.getElementById(id);
      if (!el) return;
      var y = el.getBoundingClientRect().top + window.pageYOffset - getOffset();
      window.scrollTo({ top: y, behavior: smooth ? 'smooth' : 'auto' });
    }

    var az = document.querySelector('.glossario-az');
    if (az) {
      az.addEventListener('click', function(e){
        var a = e.target.closest('a[href^="#letter-"]');
        if (!a) return;
        e.preventDefault();

        var hash = a.getAttribute('href');
        var id = hash.slice(1);

        scrollToId(id, true);
        history.replaceState(null, '', hash);
      });
    }

    document.addEventListener('click', function(e){
      var a = e.target.closest('a.glossary-link[href^="#"]');
      if (!a) return;
      e.preventDefault();

      var hash = a.getAttribute('href');
      var id = hash.slice(1);

      scrollToId(id, true);
      history.replaceState(null, '', hash);
    });

    window.addEventListener('load', function(){
      if (!location.hash) return;
      var id = location.hash.slice(1);
      setTimeout(function(){ scrollToId(id, false); }, 80);
    });
  })();
  </script>

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
