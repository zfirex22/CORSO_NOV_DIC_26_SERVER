# Giorno 2 – Esercizi del pomeriggio (array, funzioni, pagine PHP)
 
## Prima di iniziare
 
1. Copia la cartella `partenza` nella tua cartella di lavoro e rinominala `catalogo`.
   È il catalogo della biblioteca che abbiamo costruito a lezione.
2. Apri la cartella `catalogo` in VS Code (File > Apri cartella).
3. Apri il terminale di VS Code (Terminale > Nuovo terminale). Il terminale deve
   trovarsi nella cartella `catalogo`.
 
**Come si eseguono**
- Esercizi 2.1 e 2.2: si eseguono nel terminale, per esempio `php es-2-1.php`.
  Il risultato compare nel terminale.
- Esercizi 2.3, 2.4 e 2.5: sono pagine del catalogo. Nel terminale scrivi
  `php -S localhost:8000` e lascialo aperto. Poi apri nel browser l'indirizzo della
  pagina, per esempio `http://localhost:8000/autori.php`.
  Per fermare il server, nel terminale premi Ctrl+C.
  Se ti serve il terminale mentre il server è acceso, aprine un secondo con il `+`.
 
**Regole valide per tutti gli esercizi**
- Ogni `echo` che stampa nel terminale deve finire con `"\n"`, altrimenti le righe
  si attaccano una all'altra.
- Se nel terminale le lettere accentate, le stelle o il simbolo € escono come caratteri
  strani, scrivi `chcp 65001` nel terminale e riesegui.
- Le funzioni nuove sono indicate negli aiuti: cercale sul manuale https://www.php.net
  scrivendo il nome nella casella di ricerca in alto.
 
**Cosa trovi già pronto nella cartella `catalogo`**
- `libri.php`: l'elenco dei libri. Ogni libro è un array associativo con i campi
  `titolo`, `autore`, `genere` e gli altri visti a lezione.
  Si carica con `$libri = require __DIR__ . '/libri.php';`
- `parti/testata.php` e `parti/piede.php`: l'inizio e la fine di ogni pagina HTML.
- la funzione `e()`: stampa un testo in modo sicuro dentro l'HTML (vedi esercizio 2.4).
- `index.php`: la pagina del catalogo con la tabella dei libri e il form di ricerca.
 
---
 
## 2.1 – Il registro dei prestiti (30 minuti) – `es-2-1.php`
 
La biblioteca tiene un registro dei libri in prestito. È un array associativo:
- la **chiave** è il titolo del libro;
- il **valore** è il cognome della persona che lo ha preso.
 
Copia questo array all'inizio del file:
```php
$prestiti = [
    'Il nome della rosa'  => 'Rossi',
    'Le città invisibili' => 'Bianchi',
    "L'isola di Arturo"   => 'Rossi',
];
```
Nota: `"L'isola di Arturo"` è tra virgolette doppie perché contiene un apostrofo.
 
**Passo 1. Nuovo prestito.** Il signor Verdi prende `Il pendolo di Foucault`.
Aggiungilo al registro con una sola riga: `$prestiti['titolo'] = 'cognome';`
 
**Passo 2. Restituzione.** `Le città invisibili` viene restituito.
Toglilo dal registro con `unset($prestiti['...']);`
 
**Passo 3. Stampa il registro.** Usa:
```php
foreach ($prestiti as $titolo => $lettore) {
    // stampa una riga
}
```
Risultato atteso:
```
Il nome della rosa: in prestito a Rossi
L'isola di Arturo: in prestito a Rossi
Il pendolo di Foucault: in prestito a Verdi
```
 
**Passo 4. Un libro è in prestito?** Controlla se `Marcovaldo` è nel registro.
Usa `isset($prestiti['Marcovaldo'])`, che restituisce `true` se la chiave esiste.
Risultato atteso:
```
Marcovaldo: disponibile
```
Prova anche con `Il nome della rosa`: deve stampare `Il nome della rosa: in prestito`.
 
**Passo 5. Ordina per titolo.** `ksort($prestiti);` ordina l'array in base alle chiavi,
cioè ai titoli. Attenzione: `ksort` non restituisce l'array ordinato, modifica
direttamente `$prestiti`. Quindi NON scrivere `$prestiti = ksort($prestiti);`.
Poi ristampa il registro con lo stesso `foreach` del passo 3.
Risultato atteso:
```
Il nome della rosa: in prestito a Rossi
Il pendolo di Foucault: in prestito a Verdi
L'isola di Arturo: in prestito a Rossi
```
 
**Passo 6. Quanti libri ha Rossi?** `array_count_values($prestiti)` conta quante volte
compare ogni valore e restituisce un array come questo: `['Rossi' => 2, 'Verdi' => 1]`.
Usalo per stampare:
```
Rossi ha 2 libri in prestito
```
Se preferisci, fai lo stesso con un `foreach` e una variabile contatore.
 
**Passo 7. `print_r` e `var_dump`.** Stampa l'intero array prima con
`print_r($prestiti);` e poi con `var_dump($prestiti);`.
Rispondi in un commento nel file: quale informazione in più mostra `var_dump`?
(Guarda cosa compare accanto a ogni valore, per esempio `string(5)`.)
 
---
 
## 2.2 – Funzioni per le stringhe (50 minuti) – `es-2-2.php`
 
Questo file va messo nella cartella `catalogo`, perché al passo 5 usa `libri.php`.
 
Scrivi quattro funzioni. Per ognuna indica il tipo dei parametri e del risultato,
come nell'intestazione già scritta qui sotto. Dopo ogni funzione provala con almeno
due chiamate e stampa il risultato.
 
**Passo 1. `iniziali(string $autore): string`**
Restituisce le iniziali del nome, ognuna seguita da un punto.
```php
echo iniziali("Italo Calvino") . "\n";   // I.C.
echo iniziali("Umberto Eco") . "\n";     // U.E.
```
Aiuto:
- `explode(" ", $autore)` divide il testo dove ci sono spazi e restituisce un array
  di parole: `["Italo", "Calvino"]`.
- `$parola[0]` è la prima lettera di una parola.
- Con un `foreach` sulle parole costruisci il risultato aggiungendo lettera e punto.
 
**Passo 2. `stelle(int $voto, int $massimo = 5): string`**
Restituisce tante stelle piene quante il voto, e stelle vuote fino al massimo.
```php
echo stelle(3) . "\n";       // ★★★☆☆
echo stelle(7, 10) . "\n";   // ★★★★★★★☆☆☆
```
Aiuto: `str_repeat('★', 3)` restituisce `★★★`. Le stelle vuote sono `$massimo - $voto`.
Puoi copiare i due simboli da qui: ★ ☆
 
**Passo 3. `euro(float $importo): string`**
Restituisce l'importo nel formato italiano: due decimali, virgola per i decimali,
punto per le migliaia, simbolo € alla fine.
```php
echo euro(1234.5) . "\n";   // 1.234,50 €
echo euro(8) . "\n";        // 8,00 €
```
Aiuto: `number_format($importo, 2, ',', '.')`. Gli argomenti sono: il numero, quanti
decimali, il separatore dei decimali, il separatore delle migliaia.
 
**Passo 4. `slug(string $titolo): string`**
Uno "slug" è il titolo trasformato in modo da poterlo usare in un indirizzo web:
tutto minuscolo, senza accenti, con un trattino al posto di spazi e apostrofi.
```php
echo slug("Se questo è un uomo") . "\n";   // se-questo-e-un-uomo
echo slug("L'isola di Arturo") . "\n";     // l-isola-di-arturo
```
Aiuto: fai tre trasformazioni una dopo l'altra, salvando ogni volta il risultato
nella stessa variabile.
1. `strtolower($testo)` porta tutto in minuscolo.
2. `strtr($testo, ['à' => 'a', 'è' => 'e', 'é' => 'e', 'ì' => 'i', 'ò' => 'o', 'ù' => 'u'])`
   sostituisce le lettere accentate.
3. `str_replace([' ', "'"], '-', $testo)` sostituisce spazi e apostrofi con `-`.
 
**Passo 5. Usa le funzioni sui libri del catalogo.**
Carica i libri:
```php
$libri = require __DIR__ . '/libri.php';
```
Con un `foreach` stampa per ogni libro: iniziali dell'autore, titolo, slug del titolo.
Risultato atteso per il libro di Calvino:
```
I.C. - Il barone rampante - il-barone-rampante
```
Controlla tutte le righe stampate: se qualche slug contiene ancora caratteri come
virgole o lettere accentate maiuscole, scrivi in un commento quali sono e perché
la tua funzione non li ha trasformati.
 
**Passo 6. Cosa succede con un tipo sbagliato?**
In fondo al file aggiungi queste tre chiamate, una alla volta (commenta le altre):
```php
echo stelle("3") . "\n";
echo stelle(3.7) . "\n";
echo stelle("tre") . "\n";
```
Per ognuna scrivi in un commento cosa succede.
 
Poi aggiungi questa riga **subito dopo `<?php`, come prima istruzione del file**
(altrimenti PHP dà errore):
```php
declare(strict_types=1);
```
Riprova le tre chiamate. Rispondi in un commento: cosa cambia?
 
---
 
## 2.3 – La pagina degli autori (45 minuti) – `autori.php`
 
Si apre nel browser: `http://localhost:8000/autori.php`
 
**Passo 1. Struttura della pagina.** Crea `autori.php` partendo da `index.php`:
stesso `require` della testata all'inizio, stesso `require` del piede alla fine.
Nel mezzo metti un `<h1>Autori</h1>`.
 
**Passo 2. Elenco degli autori, senza ripetizioni, in ordine alfabetico.**
- `array_column($libri, 'autore')` restituisce un array con solo gli autori di tutti i
  libri. Se un autore ha 3 libri, compare 3 volte.
- `array_unique(...)` toglie le ripetizioni.
- `sort(...)` ordina in ordine alfabetico. Come `ksort`, modifica l'array e non lo
  restituisce: va scritto su una riga a parte.
 
Mostra gli autori in una lista `<ul>` con un `<li>` per autore.
 
**Passo 3. Numero dei libri accanto a ogni autore.**
Esempio di riga:
```
Italo Calvino (3 libri)
```
Aiuto: `array_count_values(array_column($libri, 'autore'))` restituisce in un colpo
solo un array `autore => numero di libri`, per esempio `['Italo Calvino' => 3, ...]`.
Rispondi in un commento: con questo array, serve ancora `array_unique`?
Come lo ordineresti per nome? (Ricorda: qui gli autori sono le chiavi.)
 
**Passo 4. Menu di navigazione.** Apri `parti/testata.php` e aggiungi due link:
"Catalogo" verso `index.php` e "Autori" verso `autori.php`.
Controlla che i link compaiano e funzionino sia nel catalogo sia nella pagina degli autori.
 
---
 
## 2.4 – La pagina di un autore (45 minuti) – `autore.php`
 
Si apre nel browser: `http://localhost:8000/autore.php?nome=Italo Calvino`
 
La parte dopo `?` si chiama query string. `nome=Italo Calvino` vuol dire che la
pagina riceve un parametro `nome` con valore `Italo Calvino`. In PHP lo leggi con
`$_GET['nome']`.
 
**Passo 1. Link dalla pagina degli autori.**
In `autori.php` ogni nome diventa un link a `autore.php?nome=...`.
Un indirizzo non può contenere spazi, quindi il nome va trasformato con
`urlencode($nome)`: `Italo Calvino` diventa `Italo+Calvino`.
```php
<a href="autore.php?nome=<?= urlencode($autore) ?>"><?= e($autore) ?></a>
```
Quando la pagina riceve il parametro, `$_GET['nome']` contiene di nuovo
`Italo Calvino` con lo spazio: PHP lo riconverte da solo.
 
**Passo 2. Leggi il nome in modo sicuro.**
Se l'indirizzo è solo `autore.php`, senza `?nome=`, scrivere `$_GET['nome']` produce
un avviso. Usa:
```php
$nome = $_GET['nome'] ?? '';
```
 
**Passo 3. Trova i libri dell'autore.** Con un `foreach` sui libri, oppure con
`array_filter`, metti in un nuovo array `$suoiLibri` solo i libri in cui
`$libro['autore']` è uguale a `$nome`.
 
**Passo 4. Autore non trovato.** Se `$suoiLibri` è vuoto (nome sbagliato o mancante):
- imposta il codice di risposta 404 con `http_response_code(404);`
- mostra il messaggio "Autore non trovato".
 
Attenzione all'ordine: `http_response_code(404)` deve essere chiamato **prima** del
`require` della testata. Il codice di risposta viene inviato insieme al primo HTML;
se la testata è già stata stampata, è troppo tardi per cambiarlo.
 
Per controllare: nel browser premi F12, scheda "Rete" (Network), ricarica la pagina
e guarda la colonna "Stato": deve essere 404.
 
**Passo 5. Pagina dell'autore.** Se i libri ci sono, mostra:
- il nome dell'autore in un `<h1>`;
- l'elenco dei suoi libri, ognuno con il link alla pagina di dettaglio
  (lo stesso link usato nella tabella di `index.php`).
 
Prove da fare:
- `autore.php?nome=Italo Calvino` → elenco dei libri di Calvino
- `autore.php?nome=Pinco Pallino` → "Autore non trovato", stato 404
- `autore.php` → "Autore non trovato", stato 404
 
**Passo 6. Perché serve `e()`.** Tutto quello che arriva da `$_GET` lo scrive
l'utente nell'indirizzo, quindi può contenere qualsiasi cosa, anche codice HTML.
Per questo va sempre stampato con `e()`.
Apri `autore.php?nome=<b>ciao</b>` e osserva come compare "ciao" nella pagina.
Poi togli temporaneamente `e()` dalla stampa del nome e riprova.
Rispondi in un commento: cosa cambia? Cosa potrebbe fare un utente malintenzionato
al posto di `<b>`? Alla fine rimetti `e()`.
 
---
 
## 2.5 – Filtro per genere (40 minuti) – `index.php`
 
Questa volta modifichi la pagina del catalogo che esiste già.
 
**Passo 1. Fila di link.** Sopra la tabella aggiungi cinque link:
```
Tutti | Romanzo | Racconti | Giallo | Saggio
```
- "Tutti" porta a `index.php`
- gli altri portano a `index.php?genere=Romanzo`, `index.php?genere=Giallo` e così via.
 
Aiuto: metti i generi in un array e stampa i link con un `foreach`, invece di scrivere
cinque `<a>` a mano. I nomi dei generi devono essere scritti esattamente come in
`libri.php` (maiuscole comprese): controllali aprendo il file.
 
**Passo 2. Mostra solo i libri del genere scelto.**
- Leggi il genere con `$genere = $_GET['genere'] ?? '';`
- Se `$genere` non è vuoto, tieni solo i libri con `$libro['genere'] === $genere`.
  Se è vuoto, mostra tutti i libri.
- Il link del genere attivo va in grassetto (`<strong>`). Se non c'è un genere attivo,
  in grassetto va "Tutti".
 
**Passo 3. Titolo con genere e conteggio.** Il titolo `<h1>` della pagina diventa:
- con un genere scelto: `Catalogo - Giallo (4 libri)`
- senza genere: `Catalogo (N libri)` con il numero totale.
 
Il numero non va scritto a mano: è `count()` dell'array dei libri filtrati.
Se il conteggio è 1, scrivi `1 libro` e non `1 libri`.
 
Prova `index.php?genere=Fantascienza`, un genere che non esiste: cosa compare?
Va bene così? Rispondi in un commento.
 
**Passo 4 (difficile). Ricerca e genere insieme.**
Scegli "Giallo", poi fai una ricerca con il form: il filtro per genere si perde,
perché il form invia solo i suoi campi.
Per tenerlo, dentro il form di ricerca aggiungi un campo nascosto con il genere attivo:
```php
<?php if ($genere !== ''): ?>
    <input type="hidden" name="genere" value="<?= e($genere) ?>">
<?php endif; ?>
```
Poi fai in modo che la pagina applichi entrambi i filtri: prima il genere, poi la
ricerca (o il contrario: il risultato è lo stesso).
Prova: genere "Giallo" + ricerca di una parola presente in un giallo e in un libro
di altro genere. Deve comparire solo il giallo.
 