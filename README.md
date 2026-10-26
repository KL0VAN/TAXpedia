# TAXpedia

PHP, HTML, CSS and native JavaScript; local development on Windows, production hosting on Linux.

## Local preview

Run from this directory:

```powershell
php -S 127.0.0.1:8000
```

Open http://127.0.0.1:8000/aboutus/aboutus.php?lang=it (or `lang=en`).
Use the existing server if port 8000 is already occupied. Current local PHP: 8.5.11.

## Project guidance

See [AGENTS.md](AGENTS.md) for standards and safety rules, [PLAN.md](PLAN.md) for the audit and future tasks, and [TASK1_REPORT.md](TASK1_REPORT.md) for changes and validation.

About Us logos live in `aboutus/imm/logo/`; portraits live in `aboutus/imm/people/`.
The two article-owned logo copies remain in `article/italia/imm/` to preserve existing article URLs.
`aboutus/imm/map.png` is retained. Public Country Profiles live in `dashboard/`; `1.TESTER/` is reserved for experiments and is empty after the verified migration. Git cannot record an empty directory.

See [dashboard/README.md](dashboard/README.md) for routes, article filters and release checks.

## File structure

```text
www.taxpedia.eu-14(5)
├─ 1.TESTER
├─ aboutus
│  ├─ imm
│  │  ├─ logo
│  │  │  ├─ logo-cvn.png
│  │  │  ├─ logo-gfe.png
│  │  │  ├─ logo-gfe.webp
│  │  │  ├─ logo-tm.jpg
│  │  │  ├─ logo_democraseeds.jpg
│  │  │  └─ logo_rethink.png
│  │  ├─ people
│  │  │  ├─ Alessandro.jpg
│  │  │  ├─ calabrese.jpg
│  │  │  ├─ cervillio.jpg
│  │  │  ├─ lorenzo.jpg
│  │  │  ├─ Ludovico.jpg
│  │  │  ├─ ottilia.jpg
│  │  │  └─ ribic.jpg
│  │  └─ map.png
│  ├─ team
│  │  ├─ alessandro-marangoni.php
│  │  ├─ francesco-calabrese-vallino.php
│  │  ├─ ludovico-prunster.php
│  │  ├─ luka-ribic.php
│  │  ├─ ottilia-ogliari.php
│  │  ├─ riccardo-cervillio.php
│  │  └─ tommaso-prever.php
│  ├─ AboutUs.css
│  ├─ aboutus.php
│  ├─ disclaimer.php
│  ├─ impact.php
│  ├─ partner-carousel.js
│  ├─ privacy.php
│  └─ work-with-us.php
├─ article
│  ├─ belgium
│  │  └─ belgium.php
│  ├─ europe
│  │  ├─ european-union
│  │  │  ├─ eu-economic-growth.php
│  │  │  ├─ populism-and-economic-growth-in-europe.php
│  │  │  └─ the-cost-of-a-divided-europe.php
│  │  ├─ infrastructure
│  │  │  └─ rail-baltica.php
│  │  ├─ coesione.php
│  │  ├─ mercato_unico.php
│  │  ├─ migrazione_gestione.php
│  │  ├─ pubblica_amm_ue.php
│  │  ├─ rapporti_vicinato.php
│  │  ├─ risorse_naturali.php
│  │  ├─ sicurezza_difesa.php
│  │  └─ strumenti_speciali.php
│  ├─ france
│  │  ├─ imm
│  │  │  └─ french-flag.jpg
│  │  └─ france.php
│  ├─ germany
│  │  └─ germany.php
│  ├─ italia
│  │  ├─ imm
│  │  │  ├─ amministrazione.png
│  │  │  ├─ difesa.png
│  │  │  ├─ grafico_regionali.png
│  │  │  ├─ infrastrutture.png
│  │  │  ├─ istruzione.png
│  │  │  ├─ logo_democraseeds.jpg
│  │  │  ├─ logo_rethink.png
│  │  │  ├─ Pista_Stelvio.jpg
│  │  │  ├─ politiche_economiche.png
│  │  │  ├─ ponte.png
│  │  │  ├─ urna.jpg
│  │  │  └─ welfare.png
│  │  ├─ infrastrutture
│  │  │  ├─ il-biglietto-non-basta.php
│  │  │  ├─ olimpiadi_2026.php
│  │  │  └─ ponte.php
│  │  ├─ istruzione
│  │  │  └─ ricerca.php
│  │  ├─ altro.php
│  │  ├─ articolo_prova_standard.php
│  │  ├─ bilancio_ue.php
│  │  ├─ costo_regionali.php
│  │  ├─ cultura_sport.php
│  │  ├─ difesa.php
│  │  ├─ giustizia.php
│  │  ├─ infrastrutture_trasporti.php
│  │  ├─ interessi.php
│  │  ├─ istruzione_ricerca.php
│  │  ├─ italy.php
│  │  ├─ politiche_economiche.php
│  │  ├─ protezione_ambientale.php
│  │  ├─ protezione_sociale.php
│  │  ├─ pubblica_amministrazione.php
│  │  ├─ sanita.php
│  │  ├─ sicurezza_ordine.php
│  │  └─ voto_fuorisede.php
│  ├─ netherlands
│  │  └─ netherlands.php
│  ├─ STANDARD Creazione Articoli
│  │  ├─ articolo_prova_standard.php
│  │  ├─ STANDARD_README_INSERIMENTO_ARTICOLI.md
│  │  └─ STANDARD_template_articolo_base.php
│  ├─ thumbs
│  │  ├─ ambiente.jpeg
│  │  ├─ Coesione  resilienza dei Valori europei.jpg
│  │  ├─ Cosa sono gli Strumenti Speciali europei.jpg
│  │  ├─ cultura.jpg
│  │  ├─ difesa.jpg
│  │  ├─ ep-strasbourg.jpg
│  │  ├─ europa.jpg
│  │  ├─ giustizia.jpg
│  │  ├─ glossario.png
│  │  ├─ infrastrutture.jpg
│  │  ├─ interessi.jpg
│  │  ├─ istruzione.jpg
│  │  ├─ italia-flag.jpg
│  │  ├─ Mercato Unico, innovazione e Agenda digitale.jpg
│  │  ├─ Migrazione e gestione delle frontiere.jpg
│  │  ├─ Pista_Stelvio.jpg
│  │  ├─ politiche-economiche.jpg
│  │  ├─ ponte.jpg
│  │  ├─ protezione-sociale.jpg
│  │  ├─ Pubblica Amministrazione nell unione.jpg
│  │  ├─ pubblica-amministrazione.jpg
│  │  ├─ Quanto cosa la diplomazia europea.jpg
│  │  ├─ Quanto costa l'unione Europea.jpg
│  │  ├─ ricerca.jpg
│  │  ├─ risorse Naturali e Ambiente.jpg
│  │  ├─ sanità.jpg
│  │  ├─ sicurezza e difesa europea.jpg
│  │  ├─ sicurezza.jpg
│  │  ├─ trasporti.png
│  │  └─ urna.jpg
│  ├─ article_data.php
│  ├─ articoli.php
│  └─ stylearticoli.css
├─ calculator
│  ├─ austria
│  │  ├─ austria.php
│  │  ├─ calculatorAustria.js
│  │  └─ flagaustria.png
│  ├─ belgium
│  │  ├─ belgium.php
│  │  ├─ calculatorBelgium.js
│  │  └─ flagbelgium.png
│  ├─ bulgaria
│  │  ├─ bulgaria.php
│  │  ├─ calculatorBulgaria.js
│  │  └─ flagbulgaria.png
│  ├─ croatia
│  │  ├─ CROATIA SVG
│  │  │  ├─ croatia-map.css
│  │  │  ├─ croatia-map.js
│  │  │  ├─ croatia-map.php
│  │  │  └─ croatiaHigh.svg
│  │  ├─ calculatorCroatia.js
│  │  ├─ croatia.php
│  │  └─ flagcroatia.png
│  ├─ cyprus
│  │  ├─ calculatorCyprus.js
│  │  ├─ cyprus.php
│  │  └─ flagcyprus.png
│  ├─ czech
│  │  ├─ calculatorCzech.js
│  │  ├─ czech.php
│  │  └─ flagczech.png
│  ├─ denmark
│  │  ├─ calculatorDenmark.js
│  │  ├─ denmark.php
│  │  └─ flagdenmark.png
│  ├─ estonia
│  │  ├─ calculatorEstonia.js
│  │  ├─ estonia.php
│  │  └─ flagestonia.png
│  ├─ finland
│  │  ├─ calculatorFinland.js
│  │  ├─ finland.php
│  │  └─ flagfinland.png
│  ├─ france
│  │  ├─ calculatorFrancia.js
│  │  ├─ flagfrance.png
│  │  └─ france.php
│  ├─ germany
│  │  ├─ calculatorGermany.js
│  │  ├─ flaggermany.png
│  │  └─ germany.php
│  ├─ greece
│  │  ├─ calculatorGreece.js
│  │  ├─ flaggreece.png
│  │  └─ greece.php
│  ├─ hungary
│  │  ├─ calculatorHungary.js
│  │  ├─ flaghungary.png
│  │  └─ hungary.php
│  ├─ ireland
│  │  ├─ calculatorIreland.js
│  │  ├─ flagireland.png
│  │  └─ ireland.php
│  ├─ italia
│  │  ├─ ITALIA SVG
│  │  │  ├─ italia-map.css
│  │  │  ├─ italia-map.js
│  │  │  ├─ italia-map.php
│  │  │  └─ italyHigh.svg
│  │  ├─ calculatorItalia.js
│  │  ├─ flagitaly.png
│  │  └─ italia.php
│  ├─ js
│  │  ├─ lang
│  │  └─ tp-i18n-local.js
│  ├─ latvia
│  │  ├─ calculatorLatvia.js
│  │  ├─ flaglatvia.png
│  │  └─ latvia.php
│  ├─ lithuania
│  │  ├─ calculatorLithuania.js
│  │  ├─ flaglithuania.png
│  │  └─ lithuania.php
│  ├─ luxembourg
│  │  ├─ calculatorLuxembourg.js
│  │  ├─ flagluxembourg.png
│  │  └─ luxembourg.php
│  ├─ malta
│  │  ├─ calculatorMalta.js
│  │  ├─ flagmalta.png
│  │  └─ malta.php
│  ├─ netherlands
│  │  ├─ calculatorNetherlands.js
│  │  ├─ flagnetherlands.png
│  │  └─ netherlands.php
│  ├─ poland
│  │  ├─ calculatorPoland.js
│  │  ├─ flagpoland.png
│  │  └─ poland.php
│  ├─ portugal
│  │  ├─ calculatorPortugal.js
│  │  ├─ flagportugal.png
│  │  └─ portugal.php
│  ├─ romania
│  │  ├─ calculatorRomania.js
│  │  ├─ flagromania.png
│  │  └─ romania.php
│  ├─ slovakia
│  │  ├─ calculatorSlovakia.js
│  │  ├─ flagslovakia.png
│  │  └─ slovakia.php
│  ├─ slovenia
│  │  ├─ calculatorSlovenia.js
│  │  ├─ flagslovenia.png
│  │  └─ slovenia.php
│  ├─ spain
│  │  ├─ calculatorSpain.js
│  │  ├─ flagspain.png
│  │  └─ spain.php
│  ├─ sweden
│  │  ├─ calculatorSweden.js
│  │  ├─ flagsweden.png
│  │  └─ sweden.php
│  ├─ CalculatorStyle.css
│  ├─ menu.php
│  ├─ NazioniController.js
│  └─ NazioniStyle.css
├─ glossary
│  └─ glossario.php
├─ i18n
│  ├─ en.php
│  ├─ i18n.php
│  └─ it.php
├─ imm
│  ├─ flags
│  │  ├─ at.png
│  │  ├─ be.png
│  │  ├─ de.png
│  │  ├─ es.png
│  │  ├─ fr.png
│  │  ├─ hr.png
│  │  ├─ it.png
│  │  ├─ lu.png
│  │  ├─ nl.png
│  │  ├─ pl.png
│  │  ├─ pt.png
│  │  └─ si.png
│  ├─ eu-map.svg
│  ├─ eu-web-awards-finalist-2026.png
│  ├─ instagram.png
│  ├─ linkedin.png
│  ├─ logoT.png
│  └─ threads.png
├─ partials
│  ├─ footer.php
│  ├─ header.php
│  ├─ header.txt
│  ├─ new-article.php
│  └─ web-awards.php
├─ style
│  ├─ StyleGlossario
│  ├─ StyleGlossario.css
│  └─ StyleTesti.css
├─ tools
│  ├─ downloads
│  │  ├─ TAXpedia_Bilancio_UE.pdf
│  │  ├─ TAXpedia_EU_Budget.pdf
│  │  ├─ TAXpedia_IRPEF.pdf
│  │  ├─ TAXpedia_IVA.pdf
│  │  └─ TAXpedia_Tasse101.pdf
│  ├─ chart-preview.css
│  ├─ chart-preview.js
│  ├─ chart-preview.php
│  ├─ comparison.js
│  ├─ comparison.php
│  ├─ comparison_data.php
│  ├─ country_data.php
│  ├─ education.php
│  └─ stylecomparison.css
├─ AGENTS.md
├─ index.php
├─ jsIndex.js
├─ LICENSE
├─ PLAN.md
├─ README.md
├─ sitemap.xml
├─ styleIndex.css
└─ TASK1_REPORT.md
```
