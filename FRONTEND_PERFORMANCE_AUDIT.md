# Frontend performance audit (analisi statica)

Data: 2026-05-14.

## Limite ambiente
Nel container non è disponibile PHP 8.1 richiesto dal progetto (`.php-version`), quindi non è stato possibile avviare il sito e misurare TTFB/FCP/LCP reali con Lighthouse/WebPageTest.

## Pagine analizzate
Dal router frontend le pagine pubbliche principali (home e varianti) passano quasi tutte dallo stesso layout Twig e dallo stesso bundle asset:
- `/` e `/home`
- landing `insufflaggio-cellulosa-*`
- `/faq`, `/privacy`, `/richiedi-preventivo`, `/blog`, ecc.

Quindi il costo di caricamento frontend è sostanzialmente simile per tutte le pagine (a parità di immagini contenuto).

## Bundle caricato globalmente
Dal tema frontend risultano caricati globalmente:
- CSS: `bootstrap.min.css`, `animations.css`, `font-awesome.css`, `main.css`
- JS in head: `modernizr-2.6.2.min.js`, `Delegate.min.js`, `validator.min.js`, `classes.js`
- JS in body: `compressed.js`, `main.js`, Google Maps API
- tracking di terze parti nel `<head>`: GTM, Hotjar, Meta Pixel

### Peso locale minimo (senza terze parti remote)
Somma file locali referenziati in `theme.json`:
- **~1.36 MB** totali (CSS + JS + icone/manifest)

Dettagli principali:
- `main.css`: ~378 KB
- `bootstrap.min.css`: ~139 KB
- `compressed.js`: ~503 KB
- `classes.js`: ~122 KB
- `main.js`: ~64 KB

## Stima tempi di download (solo static asset locali, primo caricamento)
Stima teorica semplificata (senza compressione Brotli/Gzip e senza overhead TCP/TLS):
- 10 Mbps: ~1.1 s
- 5 Mbps: ~2.2 s
- 2 Mbps: ~5.4 s

Con terze parti (GTM/Hotjar/Pixel/Maps), parse/execute JS e immagini hero, il tempo percepito può diventare molto più alto (specialmente mobile).

## Miglioramenti consigliati (priorità)

### 1) Ridurre JS bloccante e peso iniziale
1. Spostare `classes.js` fuori dall'head (defer o load on-demand).
2. Spezzare `compressed.js` in chunk (base + feature) e caricare lazy nelle pagine che lo richiedono.
3. Rimuovere Modernizr 2.6.2 se non realmente usato o sostituirlo con feature detection minimale.

### 2) Alleggerire CSS critico
1. Estrarre critical CSS above-the-fold per home.
2. Caricare `main.css` non critico in modalità non-blocking (preload+onload).
3. Valutare purge/minificazione selettiva di classi inutilizzate.

### 3) Terze parti: posticipare e condizionare
1. GTM/Hotjar/Meta Pixel dopo consenso cookie e/o dopo `window.load`.
2. Google Maps API solo sulle pagine con mappa, non globalmente.
3. Valutare riduzione trigger ed eventi tracking nel primo paint.

### 4) Immagini e media
1. Convertire immagini principali in WebP/AVIF.
2. `loading="lazy"` su immagini sotto la piega.
3. Dimensioni esplicite (`width/height`) per ridurre CLS.

### 5) Caching e compressione server
1. Cache-Control lungo per asset versionati (hash nel nome file).
2. Brotli (preferibile) o Gzip abilitato su CSS/JS.
3. HTTP/2 o HTTP/3 attivo, keep-alive e TLS ottimizzati.

### 6) Misurazione reale continua
1. Lighthouse CI su home + 5 pagine rappresentative.
2. Web Vitals real user monitoring (LCP/INP/CLS per template).
3. Budget performance (es. JS iniziale < 250 KB gzip).

## Piano operativo rapido (2 settimane)
- Settimana 1: defer/lazy JS + Maps on-demand + delay third-party.
- Settimana 2: critical CSS + ottimizzazione immagini + caching/hashing.

Impatto atteso: miglioramento netto di LCP e Time to Interactive sulle pagine pubbliche, con beneficio trasversale su quasi tutto il sito perché i bundle sono condivisi.
