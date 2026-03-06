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

6. Card homepage:
- usa il flag `in_homepage` nella entry dati
- usa `home_order` per ordinamento homepage.

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
- `in_homepage` e `home_order` (solo se deve apparire in homepage).
7. Test finale rapido:
- apri pagina con `?lang=it`
- apri pagina con `?lang=en`
- verifica titolo, H2, testo, immagine
- verifica card archivio -> pagina corretta.
- verifica homepage coerente (se `in_homepage=true`).

## Cosa Non Toccare

1. Include globali `header.php` / `footer.php`.
2. Struttura base HTML (`doctype`, `meta charset`, `viewport`, CSS globali, favicon).
3. Sistema lingua (`tp_lang`) gia presente.
