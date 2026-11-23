<?php
// Suggested location: /opencall/europa-sotto-casa.php
$CALL_EMAIL = 'contributors@taxpedia.eu';
$siteRoot = rtrim($_SERVER['DOCUMENT_ROOT'], '/');
require_once $siteRoot . '/i18n/i18n.php';

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
'title' => 'L’Europa sotto casa — Open call | TAXpedia',
'meta_desc' => 'Racconta come le risorse europee trasformano il tuo territorio. La call TAXpedia per giovani contributori, studenti universitari e non.',
'h2' => 'L’Europa sotto casa',
'subtitle' => 'Storie, risorse e trasformazioni nei territori europei.',
'updated' => 'Open call per contributori',
'author' => 'A cura della redazione TAXpedia',
'body' => '<section class="article-section" id="tema"><h3>L’Europa si racconta anche da vicino</h3><p>Una linea di tram, una scuola rinnovata, un percorso di formazione, un edificio restituito alla comunità. Le risorse europee possono entrare nella vita quotidiana attraverso interventi molto diversi, spesso poco conosciuti.</p><p>Con <strong>L’Europa sotto casa</strong>, TAXpedia invita nuovi contributori a raccontare un progetto del proprio territorio: da quale bisogno nasce, come viene finanziato e che cosa cambia per le persone.</p><p>Cerchiamo storie documentate, capaci di spiegare sia i risultati sia i limiti: ritardi, difficoltà di accesso e obiettivi non raggiunti fanno parte del racconto.</p><p><strong>La domanda guida:</strong> Che cosa cambia nel tuo territorio grazie alle risorse europee? Quanto è stato finanziato, chi ne beneficia e che cosa resta da migliorare?</p></section>
<section class="article-section" id="destinatari"><h3>A chi si rivolge</h3><p>La call si rivolge soprattutto a giovani, studenti universitari e non, giovani lavoratori e persone interessate all’Europa e alla vita dei territori.</p><p>Non sono richiesti titoli di studio specifici, iscrizione universitaria o precedenti esperienze giornalistiche. Puoi proporre un articolo anche se è la prima volta che scrivi per una pubblicazione.</p><p>Puoi partecipare individualmente o insieme ad altre persone, con un singolo contributo e senza un impegno continuativo nella redazione. Non sono previsti vincoli di cittadinanza o residenza: conta la pertinenza della proposta.</p></section>
<section class="article-section" id="argomenti"><h3>Da dove puoi partire</h3><ul><li><strong>Mobilità:</strong> trasporto pubblico, ferrovie locali e percorsi ciclabili.</li><li><strong>Spazi e servizi:</strong> scuole, biblioteche e riqualificazione dei quartieri.</li><li><strong>Ambiente ed energia:</strong> recupero ambientale, efficienza energetica e prevenzione dei rischi.</li><li><strong>Formazione e lavoro:</strong> corsi, opportunità e percorsi di inserimento.</li><li><strong>Imprese e territori:</strong> innovazione, aree rurali e servizi nelle zone periferiche.</li></ul><p>Sono esempi, non categorie obbligatorie. Il caso può riguardare qualsiasi paese dell’Unione europea, purché il collegamento con risorse o programmi europei sia verificabile.</p></section>
<section class="article-section" id="candidatura"><h3>Prima fase: proponi la tua idea</h3><p>Per partecipare non serve un articolo già scritto. Prepara:</p><ol><li><strong>Un abstract di 150–250 parole</strong>, con titolo provvisorio, luogo o progetto scelto, domanda centrale e taglio dell’articolo.</li><li><strong>Una breve presentazione</strong> di te e del tuo interesse per l’argomento. Non serve un curriculum.</li><li><strong>Due o tre fonti iniziali</strong>, preferibilmente documenti, dati o pagine ufficiali, con i relativi link.</li></ol><p>Invia l’abstract nella lingua originale e in inglese. Se scrivi direttamente in inglese, è sufficiente una sola versione. Indica nome e contatto email di tutti gli autori. Le proposte saranno valutate per coerenza con il tema, chiarezza, qualità delle fonti, originalità e fattibilità.</p></section>
<section class="article-section" id="articolo"><h3>Seconda fase: dall’idea all’articolo</h3><p>Per le proposte selezionate, il percorso previsto è il seguente:</p><ol><li><strong>Confronto con la redazione.</strong> Si concordano domanda centrale, struttura, referente e termine di consegna.</li><li><strong>Stesura.</strong> Prepara e invia alla redazione un articolo indicativamente di 800–1.200 parole, escluse le fonti, nella lingua originale e in inglese. Se scrivi direttamente in inglese, è sufficiente una sola versione. Eventuali variazioni si concordano con il referente.</li><li><strong>Revisione.</strong> La redazione verifica chiarezza, dati e fonti e propone eventuali integrazioni.</li><li><strong>Versione finale.</strong> L’autore recepisce le modifiche concordate e aggiorna entrambe le versioni linguistiche.</li><li><strong>Pubblicazione.</strong> Dopo l’approvazione editoriale, l’articolo viene pubblicato sul sito e sui nostri canali social.</li></ol><p>L’accettazione dell’abstract permette di accedere alla fase di sviluppo. La pubblicazione dipende dalla valutazione del testo finale e dal completamento della revisione.</p></section>
<section class="article-section" id="criteri"><h3>Che cosa deve raccontare l’articolo</h3><p>Parti dal bisogno del territorio, spiega l’intervento e ricostruisci l’origine delle risorse. Distingui il costo totale dalla quota europea e gli obiettivi annunciati dai risultati documentati.</p><p>Usa un linguaggio accessibile e collega le fonti ai dati citati. Quando un’informazione non è disponibile, segnalalo. Interviste e fotografie sono facoltative; le immagini devono avere crediti e autorizzazioni all’uso.</p><p>Il contributo deve essere originale. Segnala eventuali pubblicazioni precedenti, affiliazioni o interessi legati al progetto raccontato. L’autore resta responsabile dell’accuratezza di testo, traduzioni e fonti, anche quando utilizza strumenti di intelligenza artificiale.</p></section>',
'contact_title' => 'Come inviare la proposta',
'send' => 'Invia il tuo abstract',
'subject' => 'Open call — L’Europa sotto casa — Proposta articolo',
'nav' => 'In questa pagina',
'links' => '<a href="#tema">Il tema</a> · <a href="#destinatari">Destinatari</a> · <a href="#argomenti">Argomenti</a> · <a href="#candidatura">Candidatura</a> · <a href="#articolo">Seconda fase</a> · <a href="#criteri">Criteri editoriali</a>',
'contact' => 'Invia abstract, presentazione e fonti iniziali a:',
),
'en' => array(
'title' => 'Europe on Your Doorstep — Open call | TAXpedia',
'meta_desc' => 'Tell the story of European funding in your community. TAXpedia’s call for young contributors, including students and people outside higher education.',
'h2' => 'Europe on Your Doorstep',
'subtitle' => 'Stories, funding and change in European communities.',
'updated' => 'Open call for contributors',
'author' => 'By the TAXpedia editorial team',
'body' => '<section class="article-section" id="tema"><h3>Europe, seen up close</h3><p>A tram line, a renovated school, a training programme, a building brought back into community use. European funding can reach everyday life through many different projects, often with little public recognition.</p><p>With <strong>Europe on Your Doorstep</strong>, TAXpedia invites new contributors to explore a project in their area: the need behind it, how it is funded and what changes for people.</p><p>We welcome evidence-based stories covering achievements and limitations alike, including delays, barriers to access and unmet objectives.</p><p><strong>The guiding question:</strong> What changes in your area thanks to European funding? How much was allocated, who benefits and what still needs improvement?</p></section>
<section class="article-section" id="destinatari"><h3>Who can take part?</h3><p>The call is primarily aimed at young people, including university students, people outside higher education, young workers and anyone interested in Europe and local communities.</p><p>No specific qualification, university enrolment or previous journalism experience is required. You can pitch an article even if this would be your first publication.</p><p>You may contribute individually or with co-authors, submitting a single article without joining the editorial team on an ongoing basis. There are no citizenship or residency restrictions: the relevance of your proposal is what matters.</p></section>
<section class="article-section" id="argomenti"><h3>Where to start</h3><ul><li><strong>Mobility:</strong> public transport, local railways and cycling routes.</li><li><strong>Spaces and services:</strong> schools, libraries and neighbourhood regeneration.</li><li><strong>Environment and energy:</strong> environmental restoration, energy efficiency and risk prevention.</li><li><strong>Education and work:</strong> training, opportunities and employment programmes.</li><li><strong>Businesses and regions:</strong> innovation, rural areas and services in peripheral communities.</li></ul><p>These are examples, not mandatory categories. Your case may concern any EU country, provided its connection to European funding or programmes can be verified.</p></section>
<section class="article-section" id="candidatura"><h3>Stage one: pitch your idea</h3><p>You do not need a finished article to apply. Prepare:</p><ol><li><strong>A 150–250-word abstract</strong> including a working title, your chosen place or project, the central question and your proposed angle.</li><li><strong>A short introduction</strong> about yourself and your interest in the topic. A CV is not required.</li><li><strong>Two or three initial sources</strong>, preferably official documents, data or webpages, with links.</li></ol><p>Submit your abstract in its original language and in English. If you write directly in English, only one version is needed. Include the names and email contacts of all authors. Proposals will be assessed for relevance, clarity, source quality, originality and feasibility.</p></section>
<section class="article-section" id="articolo"><h3>Stage two: from idea to article</h3><p>For selected proposals, the planned process is:</p><ol><li><strong>Editorial discussion.</strong> Agree on the central question, outline, editorial contact and delivery date.</li><li><strong>Writing.</strong> Prepare an article of approximately 800–1,200 words, excluding sources, in the original language and in English, and send both versions to the editorial team. If you write directly in English, only one version is needed. Variations can be agreed with your editor.</li><li><strong>Review.</strong> The team checks clarity, data and sources and suggests any additions.</li><li><strong>Final version.</strong> The author incorporates agreed changes and updates both language versions.</li><li><strong>Publication.</strong> Following editorial approval, the article is published on our website and social media channels.</li></ol><p>Acceptance of an abstract gives access to the development stage. Publication depends on the assessment of the final text and completion of the review process.</p></section>
<section class="article-section" id="criteri"><h3>What should your article explain?</h3><p>Start with a local need, explain the project and trace its funding. Distinguish the total cost from the EU contribution, and announced objectives from documented results.</p><p>Use accessible language and link sources to the figures you cite. Identify information gaps. Interviews and photographs are optional; images must include credits and permission for use.</p><p>Your contribution must be original. Disclose previous publication, affiliations or interests connected to the project. Authors remain responsible for the accuracy of their text, translations and sources, including when using AI tools.</p></section>',
'contact_title' => 'How to submit your proposal',
'send' => 'Send your abstract',
'subject' => 'Open call — Europe on Your Doorstep — Article proposal',
'nav' => 'On this page',
'links' => '<a href="#tema">The theme</a> · <a href="#destinatari">Who can apply</a> · <a href="#argomenti">Topics</a> · <a href="#candidatura">Your proposal</a> · <a href="#articolo">Stage two</a> · <a href="#criteri">Editorial criteria</a>',
'contact' => 'Send your abstract, introduction and initial sources to:',
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


  <style>
    #main.call-page { width:100%; max-width:1200px; margin:0 auto; padding:64px 40px 80px; box-sizing:border-box; text-align:left; }
    .call-page *, .call-page *::before, .call-page *::after { box-sizing:border-box; }
    .call-page .call-layout { display:block; width:100%; margin:0; padding:0; background:none; border:0; border-radius:0; box-shadow:none; font-family:"Inter",sans-serif; }
    .call-page .call-hero { margin:0 0 28px; padding:0 0 40px; border-bottom:4px solid #ffcc00; }
    .call-page .call-hero h1 { font-family:"Merriweather",serif; font-size:clamp(2.4rem,5.5vw,4.6rem); line-height:1.12; letter-spacing:-.045em; max-width:950px; margin:0 0 24px; color:#003399; }
    .call-page .call-subtitle { font-size:clamp(1.1rem,2vw,1.45rem); line-height:1.55; margin:0 0 24px; max-width:780px; }
    .call-page .call-meta { font-size:.8rem; font-weight:600; letter-spacing:.05em; text-transform:uppercase; margin:0 0 18px; }
    .call-page .call-nav { font-size:.85rem; line-height:2.5; padding:0 0 28px; margin:0 0 12px; border-bottom:1px solid rgba(0,51,153,.18); }
    .call-page .call-nav a { color:inherit; text-decoration:none; border-bottom:1px solid currentColor; padding-bottom:3px; white-space:nowrap; }
    .call-page .call-content { display:grid; grid-template-columns:minmax(0,1fr) minmax(0,1fr); column-gap:72px; row-gap:0; }
    .call-page .article-section { min-width:0; margin:0; padding:36px 0; border-bottom:1px solid rgba(0,51,153,.18); scroll-margin-top:100px; }
    .call-page .article-section h3 { font-family:"Merriweather",serif; font-size:1.45rem; line-height:1.35; margin:0 0 22px; }
    .call-page p,.call-page li { font-size:1rem; line-height:1.8; }
    .call-page p { margin:0 0 16px; }
    .call-page p:last-child { margin-bottom:0; }
    .call-page ul,.call-page ol { padding-left:1.3rem; margin:0 0 20px; }
    .call-page li { padding-left:5px; margin-bottom:12px; }
    .call-page li::marker { color:#003399; font-weight:800; }
    .call-page #tema { grid-column:1 / -1; display:grid; grid-template-columns:minmax(0,1fr) minmax(0,2fr); column-gap:64px; }
    .call-page #tema h3 { grid-row:1 / 5; font-size:1.8rem; max-width:300px; }
    .call-page #tema p { grid-column:2; }
    .call-page #candidatura { grid-column:1 / -1; }
    .call-page #articolo { grid-column:1 / -1; }
    .call-page #articolo ol { display:grid; grid-template-columns:repeat(3,minmax(0,1fr)); gap:24px 40px; padding-left:1.4rem; margin-top:28px; }
    .call-page #articolo li { padding:0 12px 0 4px; }
    .call-page #criteri { grid-column:1 / -1; max-width:850px; border-bottom:0; }
    .call-page .call-note { padding:18px 0 18px 22px; border-left:3px solid #ffcc00; margin-top:24px; }
    .call-page .call-note p { margin-top:8px; }
    .call-page #invio { margin-top:24px; padding:32px 0; border-top:4px solid #ffcc00; border-bottom:0; border-left:0; max-width:none; }
    .call-page #invio p { max-width:850px; }
    .call-page .call-button { display:inline-block; background:#003399; color:#fff; border-radius:5px; padding:14px 24px; text-decoration:none; margin:12px 0 20px; font-weight:600; }
    .call-page .call-credit { margin-top:32px; font-size:.8rem; opacity:.7; }
    .call-page a:focus-visible { outline:3px solid #ffcc00; outline-offset:5px; }
    @media(max-width:800px) {
      #main.call-page { padding:36px 22px 56px; }
      .call-page .call-content { grid-template-columns:minmax(0,1fr); }
      .call-page #tema { display:block; }
      .call-page #tema h3 { max-width:none; }
      .call-page #articolo ol { grid-template-columns:minmax(0,1fr); gap:12px; }
      .call-page .article-section { padding:28px 0; }
      .call-page .call-hero { padding-bottom:28px; }
    }
  </style>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="call-page" id="main">
    <div class="call-layout">
      <header class="call-hero">
        <p class="call-meta">
          <small><?php echo tpl_article_e('updated'); ?></small>
        </p>
        <h1>
          <?php echo tpl_article_e('h2'); ?>
        </h1>
        <p class="call-subtitle">
          <?php echo tpl_article_e('subtitle'); ?>
        </p>
      </header>

      <nav class="call-nav" aria-label="<?php echo tpl_article_e('nav'); ?>"><?php echo tpl_article_t('links'); ?></nav>
      <div class="call-content">
        <?php echo tpl_article_t('body'); ?>
      </div>
      <section class="article-section call-note" id="invio">
        <h3><?php echo tpl_article_e('contact_title'); ?></h3>
        <p><?php echo tpl_article_e('contact'); ?> <strong><?php echo tpl_article_h($CALL_EMAIL); ?></strong></p>
        <a class="call-button" href="<?php echo tpl_article_h('mailto:' . $CALL_EMAIL . '?subject=' . rawurlencode(tpl_article_t('subject'))); ?>"><?php echo tpl_article_e('send'); ?></a>
      </section>

      <?php if (tpl_article_t('author') !== ''): ?>
        <p class="call-credit"><?php echo tpl_article_t('author'); ?></p>
      <?php endif; ?>

    </div>
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
