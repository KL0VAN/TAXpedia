# Prototipo Italia — fase 1

Anteprima IT: <http://127.0.0.1:8000/1.TESTER/calculator-italy-redesign/index.php?lang=it>

Anteprima EN: <http://127.0.0.1:8000/1.TESTER/calculator-italy-redesign/index.php?lang=en>

Avvio dalla radice del progetto: `php -S 127.0.0.1:8000`.

Prototipo locale da sottoporre a revisione. Nessun collegamento nella navigazione pubblica; nessun rilascio, commit o push effettuato. Le due immagini menzionate nella richiesta non erano presenti nell'allegato ricevuto: riferimenti effettivi sono il calcolatore originale e la specifica testuale.

## File e riuso

Soltanto quattro nuovi file in questa directory:

- `index.php`: acquisisce l'HTML di `calculator/italia/italia.php` e adatta il layout in memoria con DOMDocument; mantiene header, footer, traduzioni, mappa, categorie, CTA e fonti. Risolve gli asset relativi rispetto alla pagina originale, aggiunge `noindex` e rimuove il solo controller del vecchio wizard e il tracking Statcounter dalla risposta del prototipo.
- `prototype.css`: stile circoscritto alla pagina del prototipo. Introduzione con input a destra; legenda, donut e dettaglio su tre colonne desktop, due su tablet, impilati su smartphone. Bianco, blu TAXpedia, bordi sobri e CTA gialla. Due override `!important` sono limitati al canvas perché il CSS originale ne forza già larghezza e altezza con `!important`.
- `prototype.js`: sostituisce esclusivamente i renderer `renderPieChart` e `renderLegendInColumn` nella pagina TESTER. Gestisce selezione, legenda accessibile e controlli del prototipo; non contiene aliquote, scaglioni, percentuali di riparto o formule fiscali.
- `README.md`: architettura, verifiche e limiti.

Il motore caricato è sempre `/calculator/italia/calculatorItalia.js`, invariato. `runCalcolo()`, parsing del reddito, formule, dataset e arrotondamento restano quelli originali. Anche Chart.js 4.4.1 proviene dallo stesso URL CDN già usato in produzione. Nessuna nuova dipendenza installata. Le descrizioni dei dettagli provengono dagli estratti pubblicati nel registro esistente `article/article_data.php`, tramite `article/article_helpers.php`; in assenza di contenuto associato viene mostrato un messaggio esplicito, senza inventare spiegazioni.

L'adattatore PHP controlla la presenza dei principali elementi e di un solo controller wizard originale. Se la struttura sorgente cambia in modo incompatibile, risponde 503 chiedendo la revisione del prototipo, invece di applicare un adattamento parziale. Richiede l'estensione PHP DOM, già utilizzata dalla mappa originale. Non è una proposta di architettura definitiva per gli altri calcolatori.

## Donut, selezione e colori

I tre grafici usano gli array di importi prodotti dal motore originale, senza riordinare, ribilanciare o eliminare categorie. Il centro somma gli importi effettivamente rappresentati. La percentuale nella legenda e nel dettaglio è l'importo della categoria diviso per il totale del relativo grafico, non per il totale fiscale complessivo. A totale zero si mostra un anello neutro, senza introdurre una categoria fittizia.

Clic o tap su segmento e legenda selezionano la stessa voce, evidenziata con bordo sul donut e riga attiva con `aria-pressed`. Il dettaglio mostra nome, euro, percentuale e l'eventuale approfondimento originale localizzato. Sul canvas funzionano frecce, Home ed End; i pulsanti della legenda supportano Tab, Invio, Spazio e frecce. Il focus è visibile e il pannello annuncia i cambiamenti. Le selezioni vengono mantenute dopo il ricalcolo e tra categorie regionali equivalenti.

I colori nazionali sono associati agli identificatori delle categorie: rosso per politiche economiche, indaco per protezione sociale, verde per sanità, ocra per istruzione, arancione per infrastrutture, con colori distinti per le altre voci. Il riparto UE usa otto blu separati da bordi chiari. Le categorie regionali equivalenti riusano il colore nazionale, anche quando il testo italiano varia. Etichette, importi e stati attivi rendono l'interazione comprensibile senza affidarsi al solo colore.

## Integrità e definizioni fiscali

Il totale principale comprende imposta statale e addizionale regionale selezionata. La quota UE è già compresa nel riparto statale: non è una terza imposta da sommare. Il donut regionale ripartisce soltanto l'addizionale regionale prodotta dal modello.

Il motore arrotonda separatamente le categorie a due decimali. Di conseguenza il totale rappresentato dal donut UE può differire di pochi centesimi dalla voce nazionale «Bilancio UE», così come il donut regionale può differire dall'addizionale stimata. Il prototipo conserva questi scarti e li dichiara a video.

Esempi verificati identici tra originale e prototipo (euro):

| Reddito / regione | Totale imposte | Imposta statale | Addizionale | Donut UE | Donut regionale |
| --- | ---: | ---: | ---: | ---: | ---: |
| 15.000 / Lombardia | 3.634,50 | 3.450,00 | 184,50 | 86,25 | 184,50 |
| 50.000 / Lombardia | 14.908,30 | 14.140,00 | 768,30 | 353,48 | 768,28 |
| 80.000 / Lazio | 29.464,00 | 27.040,00 | 2.424,00 | 675,98 | 2.424,00 |
| 100.000 / Abruzzo | 38.404,00 | 35.640,00 | 2.764,00 | 890,98 | Non disponibile |

Nel codice sorgente le distribuzioni regionali sono commentate come **placeholder**. Non vengono certificate o corrette da questo lavoro. Sono presenti solo per Veneto, Liguria, Campania, Sicilia, Toscana, Marche, Lombardia, Puglia, Lazio, Emilia-Romagna e Piemonte. Le altre regioni conservano il messaggio originale di indisponibilità del riparto, pur mantenendo il calcolo dell'addizionale. Non sono stati aggiunti dati, anni fiscali o attribuzioni a fonti.

## Verifiche eseguite

- PHP 8.5.12: `php -l index.php`; JavaScript: `node --check prototype.js`; controllo whitespace Git e dei nuovi file.
- 24 casi registrati prima dell'intervento: 12 combinazioni reddito/regione in IT e EN, inclusi 28.000 e 50.000 con il centesimo successivo, redditi piccoli, nessuna regione, regioni disponibili e indisponibili. Confronto esatto di totale, imposta statale, addizionale, etichette e di ogni importo nazionale, UE e regionale.
- Altri 40 confronti: tutte le 20 regioni selezionabili, a reddito 65.000, nelle due lingue. Nessuna differenza dall'originale.
- Controllati totali centrali, percentuali, ordine delle categorie e selezione di tutte le righe dei tre grafici in IT/EN.
- Browser reale Chrome su Windows via Playwright: clic sui segmenti, legenda, tastiera, focus, ricalcolo reattivo senza perdita del cursore, cambio regione, mappa, input errati e recupero, assenza del riparto, importi arrotondati a zero.
- Screenshot esaminati e controlli di overflow alle larghezze 1440, 1024, 768, 390 e 320 pixel, in entrambe le lingue; donut quadrati e layout adattato. Touch verificato tramite emulazione mobile Chrome, non su dispositivo fisico.
- Menu condiviso, chiusura con Escape e cambio IT/EN mantenendo la route del prototipo. Avviso senza JavaScript e modalità movimento ridotto verificati. Animazioni dei grafici disattivate.
- 77 URL locali di pagine e asset controllati; inclusi gli approfondimenti delle 22 categorie nazionali/UE nelle due lingue. Casing controllato per ogni segmento del percorso e per gli asset `url()` dei CSS. Nessun 404 o errore JavaScript rilevato.
- Per i test ripetibili è stata intercettata la stessa build Chart.js 4.4.1 con una copia QA esterna al sito. Verificato anche un avvio reale senza intercettazione: CDN disponibile e donut funzionanti.
- Confronto SHA-256 di tutti i 306 file preesistenti: nessuna modifica e nessuna perdita, compresi i lavori locali precedenti sulla Dashboard. Backup, script QA e screenshot rimangono fuori dalla directory del sito.

## Limiti e revisione

L'esecuzione è stata verificata con PHP 8.5.12. Le API PHP utilizzate sono disponibili su 8.4, ma non è stato eseguito un runtime PHP 8.4.27 né effettuato un test su Aruba/Linux. Non sono stati eseguiti test su Safari, Firefox, dispositivi fisici o lettori di schermo. Il calcolatore continua a richiedere JavaScript e il CDN Chart.js esistente; senza JavaScript viene fornito un avviso, non un risultato fiscale simulato.

Il prototipo non modifica i limiti del modello fiscale o i placeholder regionali. Prima di un eventuale rilascio occorreranno approvazione visiva, valutazione editoriale dei dati già esistenti e una decisione separata su come integrare la presentazione nella pagina pubblica. Nessun altro Paese è stato interessato.
