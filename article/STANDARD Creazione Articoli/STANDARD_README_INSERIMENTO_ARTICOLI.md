# Standard Inserimento Articoli (Fase 2)

Obiettivo: inserire nuovi articoli con flusso semplice, coerente e ripetibile, senza cambiare architettura.

Fonte unica card:
- `article/article_data.php`
- archivio e homepage leggono entrambi questo file

## Regole Fisse

1. Slug file: solo minuscolo + underscore.
Esempio: `nuovo_articolo.php`.

2. Area file:
- Italia: `article/italia/<nome>.php`
- Europa: `article/europe/<nome>.php`

3. Immagini:
- nomi ASCII semplici (`copertina_articolo.jpg`)
- no spazi, no accenti, no caratteri speciali
- salva in:
  - `article/italia/imm/` per articoli Italia
  - `article/europe/imm/` per articoli Europa

4. Link:
- usa path assoluti nelle card e link interni principali (`/article/...`)
- evita path relativi nelle card archivio.
- usa anche `thumb` con path assoluto (`/article/italia/imm/...` o `/article/europe/imm/...`)
- la card si configura solo in `article/article_data.php`.

5. Bilingue:
- ogni articolo deve avere blocco `it` e blocco `en`
- non pubblicare se manca una delle due lingue.

6. Pubblicazione, filtri e homepage:
- `article/article_data.php` rimane l'unico registro; non modificare manualmente le 27 schede Paese.
- `id`: identificatore unico e stabile, indipendente dal titolo e dalla rinomina del file.
- `date_iso`: data di pubblicazione valida `YYYY-MM-DD`; `date_it` (`DD/MM/YYYY`) e `date_en` (`MM/DD/YYYY`) devono rappresentare la stessa data. Non usare segnaposto o date del filesystem.
- `content_type`: `article`, `sector` oppure `tool`. Calcolatori e glossario sono `tool`.
- `countries`: array di codici ISO maiuscoli, ad esempio `array('IT')` o `array('EE', 'LV', 'LT')`; usa solo associazioni editorialmente giustificate.
- `scope`: `country`, `multi-country`, `eu` o `general`. `scope=eu` non associa automaticamente un articolo a tutti i Paesi.
- `topics`: array di identificatori presenti in `tp_article_topics()` in `article/article_helpers.php`. I tag Articolo/Settore/Novit? restano etichette di tipo, non argomenti.
- `status`: `published` oppure `draft`; solo `published` con `in_archive=true`, data valida e destinazione locale esistente è idoneo alle liste pubbliche.
- `languages`: lingue effettivamente verificate, normalmente `array('it', 'en')`; mantenere lo standard bilingue.
- `authors`: slug autore esistenti, quando applicabile.
- `link` e `thumb`: URL locali con `/`, nome ed estensione esatti; evitare percorsi Windows.
- la homepage mostra automaticamente i cinque contenuti idonei pi? recenti; `in_homepage` e `home_order` restano campi storici di compatibilit? e non ne controllano la selezione.
- le schede Paese mostrano al massimo quattro articoli/settori, ordinati per data, con associazione esplicita al codice del Paese; escludono strumenti e bozze.
- l'archivio usa filtri GET e 12 schede per pagina; esempi: `/article/articoli.php?country=IT&topic=infrastructure&lang=it`, oppure `country=EU` per contenuti di ambito europeo.
- registrare metadati validi è sufficiente per includere il nuovo contenuto nei filtri pertinenti. Non aggiungere liste parallele.
- prima della pubblicazione verificare file, traduzioni, immagini, data, unicit? ID e classificazione; non registrare template o esempi.

## Template Ufficiale

Template unico da copiare:
- `article/STANDARD Creazione Articoli/STANDARD_template_articolo_base.php`

## Procedura Operativa Fissa

1. Scegli area e nome.
2. Copia `article/STANDARD Creazione Articoli/STANDARD_template_articolo_base.php` nella cartella area (`italia` o `europe`).
3. Rinomina il file con slug standard.
4. Compila testi IT/EN nel dizionario (`meta_title`, `h2`, paragrafi, fonti).
5. Inserisci immagine in `imm/` area corretta e aggiorna `img_src`.

6. Aggiungi una sola entry in `article/article_data.php` con:
- `link` assoluto e `thumb` assoluto, `title_it/en`, `excerpt_it/en`, `aria_it/en`
- `in_archive` e `archive_order`
- i metadati di pubblicazione e classificazione descritti al punto 6; la homepage si aggiorna automaticamente.
7. Test finale rapido:
- apri pagina con `?lang=it`
- apri pagina con `?lang=en`
- verifica titolo, H2, testo, immagine
- verifica card archivio -> pagina corretta.
- verifica i filtri Paese/argomento e la homepage automatica; controlla che `draft` non compaia nelle liste pubbliche.

## Cosa Non Toccare

1. Include globali `header.php` / `footer.php`.
2. Struttura base HTML (`doctype`, `meta charset`, `viewport`, CSS globali, favicon).
3. Sistema lingua (`tp_lang`) gia presente.
