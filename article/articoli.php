<?php
require_once __DIR__ . '/../i18n/i18n.php';

$tp_lang = tp_lang();
$is_en = ($tp_lang === 'en');

$__t = function (string $it, string $en) use ($is_en): string {
  return $is_en ? $en : $it;
};

$__h = function (string $s): string {
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
};

$js_i18n = [
  'locale' => $is_en ? 'en' : 'it',
  'allTags' => $__t('Tutti i tag', 'All tags'),
  'noTag' => $__t('Senza tag', 'No tag'),
  'allCountries' => $__t('Tutti i paesi', 'All countries'),
  'noCountry' => $__t('Senza paese', 'No country'),
  'countTpl' => $__t('{shown} di {total} contenuti visibili', '{shown} of {total} visible items'),
];
?>
<!doctype html>
<html lang="<?php echo $__h($tp_lang); ?>">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title><?php echo $__h($__t('I nostri Articoli — TAXpedia', 'Our Articles — TAXpedia')); ?></title>
  <link rel="icon" href="/imm/logoT.png" type="image/png">

  <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@700;800&family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="/styleIndex.css"/>
  <link rel="stylesheet" href="/style/StyleTesti.css"/>
  <link rel="stylesheet" href="stylearticoli.css"/>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/header.php'; ?>

  <main class="container" id="main">
  <!-- ===================== I NOSTRI ARTICOLI ===================== -->
    <div class="container">
      <div class="section-head">
        <h2 id="posts-title"><?php echo $__h($__t('I nostri articoli', 'Our articles')); ?></h2>
        <p class="section-sub">
          <?php echo $__h($__t(
            'Approfondimenti chiari e verificati su tasse, spesa pubblica e bilancio dello Stato.',
            'Clear, verified insights on taxes, public spending, and the state budget.'
          )); ?>
        </p>
      </div>

      <!-- ===================== CONTROLLI: RICERCA + FILTRI (TAG + PAESE) ===================== -->
      <div class="posts-controls" role="region" aria-label="<?php echo $__h($__t('Filtri articoli', 'Article filters')); ?>">
        <div class="posts-controls-row">
          <div class="posts-search">
            <label class="sr-only" for="postSearch"><?php echo $__h($__t('Cerca un articolo', 'Search for an article')); ?></label>
            <input
              id="postSearch"
              type="search"
              placeholder="<?php echo $__h($__t('Cerca per titolo o descrizione…', 'Search by title or description…')); ?>"
              autocomplete="off"
            />
            <button type="button" id="clearSearch" class="search-clear" aria-label="<?php echo $__h($__t('Svuota ricerca', 'Clear search')); ?>" hidden>×</button>
          </div>

          <div class="posts-select">
            <label class="sr-only" for="tagSelect"><?php echo $__h($__t('Filtra per tag', 'Filter by tag')); ?></label>
            <select id="tagSelect" aria-label="<?php echo $__h($__t('Filtra per tag', 'Filter by tag')); ?>">
              <option value=""><?php echo $__h($__t('Tutti i tag', 'All tags')); ?></option>
            </select>
          </div>

          <div class="posts-select">
            <label class="sr-only" for="countrySelect"><?php echo $__h($__t('Filtra per paese', 'Filter by country')); ?></label>
            <select id="countrySelect" aria-label="<?php echo $__h($__t('Filtra per paese', 'Filter by country')); ?>">
              <option value=""><?php echo $__h($__t('Tutti i paesi', 'All countries')); ?></option>
            </select>
          </div>
        </div>

        <p class="posts-count" id="postsCount" aria-live="polite"></p>
      </div>

      <p class="posts-empty" id="postsEmpty" hidden>
        <?php echo $__h($__t('Nessun risultato. Prova a cambiare ricerca o filtri.', 'No results. Try changing your search or filters.')); ?>
      </p>

      <div class="posts-grid">

        <a class="post-card post-card-link"
           href="/article/italia/infrastrutture/ponte.php"
           aria-label="<?php echo $__h($__t('Apri: Quanto costa il Ponte sullo Stretto?', 'Open: How much does the Bridge over the Strait of Messina cost?')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/ponte.png')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Articolo', 'Article')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('19/12/2025', '12/19/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Quanto costa il Ponte sullo Stretto?', 'How much does the Bridge over the Strait of Messina cost?')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Analisi tecnica del costo del progetto.', 'Technical analysis of the project cost.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/calculator/france/france.php"
           aria-label="<?php echo $__h($__t('Apri: Da cosa è composta la spesa pubblica francese?', 'Open: What is French public spending made up of?')); ?>">
          <div class="post-thumb" style="--thumb:url('france/imm/french-flag.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Francia', 'France')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Novità', 'News')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('15/12/2025', '12/15/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Da cosa è composta la spesa pubblica francese?', 'What is French public spending made up of?')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Inserisci un reddito lordo, vedi il conteggio delle tasse e la ripartizione.', 'Enter a gross income, see the tax breakdown and the allocation.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/glossary/glossario.php"
           aria-label="<?php echo $__h($__t('Apri: Il nuovo Glossario', 'Open: The new Glossary')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/glossario.png')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-tag"><?php echo $__h($__t('Novità', 'News')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('09/12/2025', '12/09/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Il nuovo Glossario', 'The new Glossary')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Qualche termine non ti è chiaro? Consulta il nostro glossario, brevi definizioni dei termini più tecnici', 'Is any term unclear? Check our glossary, short definitions of the more technical terms')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="italia/costo_regionali.php"
           aria-label="<?php echo $__h($__t('Apri: Quanto costa votare?', 'Open: How much does it cost to vote?')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/urna.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Articolo', 'Article')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('20/11/2025', '11/20/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Quanto costa votare?', 'How much does it cost to vote?')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Una stima approfondita dei costi per le elezioni regionali del 2025.', 'An in-depth estimate of the costs for the 2025 regional elections.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/protezione_ambientale.php"
           aria-label="<?php echo $__h($__t('Apri: Protezione Ambientale', 'Open: Environmental Protection')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/ambiente.jpeg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Protezione Ambientale', 'Environmental Protection')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t("Quanto valore diamo all'ambiente e alla sua protezione?", 'How much value do we place on the environment and its protection?')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/sanita.php"
           aria-label="<?php echo $__h($__t('Apri: Sanità', 'Open: Healthcare')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/sanità.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Sanità', 'Healthcare')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Spesso oggetto di discussione, ma quanto spendiamo oggi?', 'Often debated, but how much do we spend today?')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/sicurezza_ordine.php"
           aria-label="<?php echo $__h($__t('Apri: Sicurezza e Ordine pubblico', 'Open: Security and Public Order')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/sicurezza.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Sicurezza e Ordine pubblico', 'Security and Public Order')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Spesso confusa con la difesa ma è una spesa a tutti gli effetti.', 'Often confused with defense, but it is an expense in its own right.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/protezione_sociale.php"
           aria-label="<?php echo $__h($__t('Apri: Welfare e Pensioni', 'Open: Welfare and Pensions')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/protezione-sociale.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Welfare e Pensioni', 'Welfare and Pensions')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Una delle spese più rilevanti per il bilancio dello Stato.', 'One of the most significant expenses in the state budget.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/difesa.php"
           aria-label="<?php echo $__h($__t('Apri: Quanto ci costa difenderci?', 'Open: How much does it cost to defend ourselves?')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/difesa.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Quanto ci costa difenderci?', 'How much does it cost to defend ourselves?')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('La spesa per la difesa, spesso oggetto di discussioni, ma quanto ci costa davvero?', 'Defense spending is often debated, but how much does it really cost us?')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/istruzione_ricerca.php"
           aria-label="<?php echo $__h($__t('Apri: Istruzione e Ricerca', 'Open: Education and Research')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/istruzione.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Istruzione e Ricerca', 'Education and Research')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Spesa spesso sottovalutata, ma fondamentale per il Paese.', 'Spending often underestimated, but essential for the country.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/cultura_sport.php"
           aria-label="<?php echo $__h($__t('Apri: Cultura e Sport', 'Open: Culture and Sport')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/cultura.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Cultura e Sport', 'Culture and Sport')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Come influisce la spesa per la cultura nonostante sia la spesa più bassa nel bilancio.', 'How does spending on culture affect us, even though it is the lowest spending item in the budget.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/infrastrutture_trasporti.php"
           aria-label="<?php echo $__h($__t('Apri: Infrastrutture e Trasporti', 'Open: Infrastructure and Transport')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/infrastrutture.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Infrastrutture e Trasporti', 'Infrastructure and Transport')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Quanto viene destinato ad un settore così strategico?', 'How much is allocated to such a strategic sector?')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/interessi.php"
           aria-label="<?php echo $__h($__t('Apri: Interessi sul debito pubblico: cosa sono e quanto pesano', 'Open: Interest on public debt: what it is and how much it weighs')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/interessi.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Interessi sul debito pubblico: cosa sono e quanto pesano', 'Interest on public debt: what it is and how much it weighs')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Perché il “servizio del debito” incide sul bilancio e come si calcola.', 'Why “debt servicing” affects the budget and how it is calculated.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/bilancio_ue.php"
           aria-label="<?php echo $__h($__t("Apri: Quanto costa l'Unione Europea?", 'Open: How much does the European Union cost?')); ?>">
          <div class="post-thumb" style="--thumb:url('europe/imm/europa.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t("Quanto costa l'Unione Europea?", 'How much does the European Union cost?')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t("Qunato e come influisce l'Unione Europea sul bilancio dello Stato.", 'How much, and how, the European Union affects the state budget.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/giustizia.php"
           aria-label="<?php echo $__h($__t('Apri: Il sistema della giustizia: da cosa è composto e quanto costa', 'Open: The justice system: what it consists of and how much it costs')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/giustizia.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Il sistema della giustizia: da cosa è composto e quanto costa', 'The justice system: what it consists of and how much it costs')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Quanto costa allo Stato la macchina della giustizia.', 'How much does the justice machinery cost the state.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/pubblica_amministrazione.php"
           aria-label="<?php echo $__h($__t('Apri: Quanto ci costa la Pubblica Amministrazione?', 'Open: How much does the Public Administration cost us?')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/pubblica-amministrazione.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Quanto ci costa la Pubblica Amministrazione?', 'How much does the Public Administration cost us?')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Dal Parlamento agli uffici comunali, quanto ci costa la Pubblica Amministrazione.', 'From Parliament to municipal offices, how much the Public Administration costs us.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/article/italia/politiche_economiche.php"
           aria-label="<?php echo $__h($__t('Apri: Politiche economiche', 'Open: Economic policies')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/politiche-economiche.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Settore', 'Sector')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Politiche economiche', 'Economic policies')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Da cosa è composta la spesa per le politiche economiche e a quanto ammonta nel 2025?', 'What is spending on economic policies made up of and how much does it amount to in 2025?')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link" href="/article/europe/coesione.php"
           aria-label="<?php echo $__h($__t('Apri: Coesione, Resilienza e Valori europei', 'Open: Cohesion, Resilience and European values')); ?>">
          <div class="post-thumb" style="--thumb:url('europe/imm/Coesione  resilienza dei Valori europei.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Europa', 'Europe')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Coesione, Resilienza e Valori europei', 'Cohesion, Resilience and European Values')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Dallo sviluppo regionale al fondo sociale europeo.', 'From regional development to the European Social Fund.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link" href="/article/europe/risorse_naturali.php"
           aria-label="<?php echo $__h($__t('Apri: Risorse Naturali e Ambiente', 'Open: Natural Resources and Environment')); ?>">
          <div class="post-thumb" style="--thumb:url('europe/imm/risorse Naturali e Ambiente.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Europa', 'Europe')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Risorse Naturali e Ambiente', 'Natural Resources and Environment')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t("Tutte le sovvenzioni europee all'agricoltura e alle politiche marittime.", 'All European subsidies for agriculture and maritime policies.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link" href="/article/europe/mercato_unico.php"
           aria-label="<?php echo $__h($__t('Apri: Mercato Unico, Innovazione e Agenda Digitale', 'Open: Single Market, Innovation and Digital Agenda')); ?>">
          <div class="post-thumb" style="--thumb:url('europe/imm/Mercato Unico, innovazione e Agenda digitale.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Europa', 'Europe')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Mercato Unico, Innovazione e Agenda Digitale', 'Single Market, Innovation and Digital Agenda')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t("A quanto ammonta la spesa per mercato unico, l’innovazione e lo sviluppo digitale?", 'How much does spending on the single market, innovation, and digital development amount to?')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link" href="/article/europe/rapporti_vicinato.php"
           aria-label="<?php echo $__h($__t('Apri: Quanto costa la diplomazia europea?', 'Open: How much does European diplomacy cost?')); ?>">
          <div class="post-thumb" style="--thumb:url('europe/imm/Quanto cosa la diplomazia europea.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Europa', 'Europe')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Quanto costa la diplomazia europea?', 'How much does European diplomacy cost?')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t("Dalle relazioni diplomatiche ai programmi comunitari attivi nei paesi all'estero.", 'From diplomatic relations to EU programs active in countries abroad.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link" href="/article/europe/pubblica_amm_ue.php"
           aria-label="<?php echo $__h($__t("Apri: Pubblica Amministrazione nell'Unione", 'Open: Public Administration in the Union')); ?>">
          <div class="post-thumb" style="--thumb:url('europe/imm/Pubblica Amministrazione nell unione.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Europa', 'Europe')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t("Pubblica Amministrazione nell'Unione", 'Public Administration in the Union')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Dal Parlamento alla Commissione, tutte le spese amministrative delle istituzioni europee.', 'From Parliament to the Commission, all the administrative expenses of the European institutions.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link" href="/article/europe/strumenti_speciali.php"
           aria-label="<?php echo $__h($__t('Apri: Cosa sono gli Strumenti Speciali europei?', 'Open: What are the European Special Instruments?')); ?>">
          <div class="post-thumb" style="--thumb:url('europe/imm/Cosa sono gli Strumenti Speciali europei.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Europa', 'Europe')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Cosa sono gli Strumenti Speciali europei?', 'What are the European Special Instruments?')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t("Le spese per la riserva di solidarietà europea, gli aiuti all'Ucraina e il fondo per le emergenze.", 'Spending for the European solidarity reserve, aid to Ukraine, and the emergency fund.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link" href="/article/europe/migrazione_gestione.php"
           aria-label="<?php echo $__h($__t('Apri: Migrazione e Gestione delle Frontiere', 'Open: Migration and Border Management')); ?>">
          <div class="post-thumb" style="--thumb:url('europe/imm/Migrazione e gestione delle frontiere.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Europa', 'Europe')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Migrazione e Gestione delle Frontiere', 'Migration and Border Management')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t("Quanto spende l'Europa per il controllo dei flussi migratori e la gestione delle frontiere?", 'How much does Europe spend on controlling migration flows and managing borders?')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link" href="/article/europe/sicurezza_difesa.php"
           aria-label="<?php echo $__h($__t('Apri: Sicurezza e Difesa europea', 'Open: European Security and Defense')); ?>">
          <div class="post-thumb" style="--thumb:url('europe/imm/sicurezza e difesa europea.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Europa', 'Europe')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Sicurezza e Difesa europea', 'European Security and Defense')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('La spesa per i programmi di sicurezza delle centrali nucleari e gli investimenti nel settore della difesa.', 'Spending for nuclear power plant security programs and investments in the defense sector.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

        <a class="post-card post-card-link"
           href="/calculator/italia/italia.php"
           aria-label="<?php echo $__h($__t('Apri: Dove vanno le tue tasse? Scoprilo con il calcolatore', 'Open: Where do your taxes go? Find out with the calculator')); ?>">
          <div class="post-thumb" style="--thumb:url('italia/imm/italia-flag.jpg')" aria-hidden="true"></div>
          <div class="post-body">
            <div class="post-top">
              <p class="post-country"><?php echo $__h($__t('Italia', 'Italy')); ?></p>
              <p class="post-tag"><?php echo $__h($__t('Novità', 'News')); ?></p>
              <time class="post-date" datetime="2025-01-01"><?php echo $__h($__t('13/10/2025', '10/13/2025')); ?></time>
            </div>
            <h3 class="post-title"><?php echo $__h($__t('Dove vanno le tue tasse? Scoprilo con il calcolatore', 'Where do your taxes go? Find out with the calculator')); ?></h3>
            <p class="post-excerpt"><?php echo $__h($__t('Inserisci il reddito e vedi la ripartizione: semplice, gratuito, senza registrazione.', 'Enter your income and see the breakdown: simple, free, no registration.')); ?></p>
            <span class="post-open" aria-hidden="true"><?php echo $__h($__t('Apri →', 'Open →')); ?></span>
          </div>
        </a>

      </div>
    </div>
  </main>

  <!-- ===================== FOOTER ===================== -->
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/partials/footer.php'; ?>

  <!-- Default Statcounter code for https://www.taxpedia.eu/ -->
  <script type="text/javascript">
  var sc_project=13170178;
  var sc_invisible=1;
  var sc_security="f093464a";
  </script>
  <script type="text/javascript" src="https://www.statcounter.com/counter/counter.js" async></script>
  <noscript><div class="statcounter"><a title="hit counter" href="https://statcounter.com/" target="_blank"><img class="statcounter" src="https://c.statcounter.com/13170178/0/f093464a/1/" alt="hit counter" referrerPolicy="no-referrer-when-downgrade"></a></div></noscript>
  <!-- End of Statcounter Code -->

<script>
(function () {
  const I18N = <?php echo json_encode($js_i18n, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;

  const grid = document.querySelector(".posts-grid");
  if (!grid) return;

  const searchInput = document.getElementById("postSearch");
  const clearBtn = document.getElementById("clearSearch");
  const tagSelect = document.getElementById("tagSelect");
  const countrySelect = document.getElementById("countrySelect");
  const countEl = document.getElementById("postsCount");
  const emptyEl = document.getElementById("postsEmpty");

  const cards = Array.from(grid.querySelectorAll("a.post-card-link"));

  const normalize = (s) => {
    if (!s) return "";
    try {
      return s
        .toString()
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .trim();
    } catch (e) {
      return s.toString().toLowerCase().trim();
    }
  };

  const textOf = (card, sel) => card.querySelector(sel)?.textContent?.trim() || "";

  // Indicizzazione semplice dei contenuti
  cards.forEach((card) => {
    const title = textOf(card, ".post-title");
    const excerpt = textOf(card, ".post-excerpt");
    const tag = textOf(card, ".post-tag");
    const country = textOf(card, ".post-country");

    card._meta = {
      title,
      excerpt,
      tag,
      country,
      nTitle: normalize(title),
      nExcerpt: normalize(excerpt),
      nTag: normalize(tag),
      nCountry: normalize(country),
    };
  });

  // Popola i menù a tendina leggendo i valori presenti nelle card
  const buildOptions = (selectEl, map, allLabel, noneLabel, hasMissing) => {
    if (!selectEl) return;

    selectEl.innerHTML = "";
    selectEl.add(new Option(allLabel, ""));

    if (hasMissing) selectEl.add(new Option(noneLabel, "__none"));

    Array.from(map.entries())
      .sort((a, b) => a[1].localeCompare(b[1], I18N.locale, { sensitivity: "base" }))
      .forEach(([key, label]) => selectEl.add(new Option(label, key)));
  };

  const tagMap = new Map();
  const countryMap = new Map();
  let hasMissingTag = false;
  let hasMissingCountry = false;

  cards.forEach((c) => {
    if (c._meta.nTag) tagMap.set(c._meta.nTag, c._meta.tag);
    else hasMissingTag = true;

    if (c._meta.nCountry) countryMap.set(c._meta.nCountry, c._meta.country);
    else hasMissingCountry = true;
  });

  buildOptions(tagSelect, tagMap, I18N.allTags, I18N.noTag, hasMissingTag);
  buildOptions(countrySelect, countryMap, I18N.allCountries, I18N.noCountry, hasMissingCountry);

  const applyFilters = () => {
    const q = normalize(searchInput?.value || "");
    const hasQ = q.length > 0;

    const tagKey = tagSelect?.value || "";
    const countryKey = countrySelect?.value || "";

    let shown = 0;

    cards.forEach((card) => {
      const m = card._meta;

      const matchText = !hasQ || m.nTitle.includes(q) || m.nExcerpt.includes(q);

      const matchTag =
        !tagKey ||
        (tagKey === "__none" ? !m.nTag : m.nTag === tagKey);

      const matchCountry =
        !countryKey ||
        (countryKey === "__none" ? !m.nCountry : m.nCountry === countryKey);

      const ok = matchText && matchTag && matchCountry;

      card.style.display = ok ? "" : "none";
      if (ok) shown += 1;
    });

    const total = cards.length;

    if (countEl) {
      countEl.textContent = (I18N.countTpl || "")
        .replace("{shown}", String(shown))
        .replace("{total}", String(total));
    }

    if (emptyEl) emptyEl.hidden = shown !== 0;
    if (clearBtn) clearBtn.hidden = !hasQ;
  };

  const debounce = (fn, ms) => {
    let t;
    return function (...args) {
      clearTimeout(t);
      t = setTimeout(() => fn.apply(this, args), ms);
    };
  };

  applyFilters();

  searchInput?.addEventListener("input", debounce(applyFilters, 60));
  clearBtn?.addEventListener("click", () => {
    searchInput.value = "";
    searchInput.focus();
    applyFilters();
  });

  tagSelect?.addEventListener("change", applyFilters);
  countrySelect?.addEventListener("change", applyFilters);
})();
</script>

</body>
</html>