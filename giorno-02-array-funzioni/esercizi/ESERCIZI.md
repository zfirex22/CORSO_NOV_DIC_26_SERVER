# Giorno 2 – Esercizi del pomeriggio (array, funzioni, pagine PHP)

Copia la cartella `partenza` nella tua cartella di lavoro e rinominala `catalogo`:
è il catalogo della lezione. Gli esercizi 2.1 e 2.2 si eseguono nel terminale,
gli altri sono pagine del catalogo (dalla cartella `catalogo`: `php -S localhost:8000`).

---

## 2.1 – Il registro dei prestiti (30 minuti) – `es-2-1.php`
Un array associativo in cui la chiave è il titolo e il valore è il cognome di chi lo ha in prestito:
```php
$prestiti = [
    'Il nome della rosa' => 'Rossi',
    'Le città invisibili' => 'Bianchi',
    "L'isola di Arturo" => 'Rossi',
];
```
1. Registra un nuovo prestito: `Il pendolo di Foucault` a `Verdi`.
2. `Le città invisibili` viene restituito: toglilo con `unset`.
3. Stampa `Il nome della rosa: in prestito a Rossi` per ogni prestito, con `foreach ($prestiti as $titolo => $lettore)`.
4. Controlla se `Marcovaldo` è in prestito e stampa `in prestito` o `disponibile`
   (`isset` oppure `array_key_exists`).
5. Ordina il registro per titolo (`ksort`) e ristampalo.
6. Quanti libri ha in prestito Rossi? (`array_count_values` sui valori, oppure un ciclo)
7. Stampa l'intero array con `print_r` e con `var_dump`: che differenza c'è?

## 2.2 – Funzioni per le stringhe (50 minuti) – `es-2-2.php`
Scrivi queste funzioni, con i tipi dei parametri e del risultato. Provale con
almeno due chiamate ciascuna.
1. `iniziali(string $autore): string` – `iniziali("Italo Calvino")` → `"I.C."`
   (aiuto: `explode(" ", $autore)`, poi la prima lettera di ogni parola).
2. `stelle(int $voto, int $massimo = 5): string` – `stelle(3)` → `"★★★☆☆"` (`str_repeat`).
3. `euro(float $importo): string` – `euro(1234.5)` → `"1.234,50 €"`.
4. `slug(string $titolo): string` – il titolo trasformato per un indirizzo web:
   `slug("Se questo è un uomo")` → `"se-questo-e-un-uomo"`,
   `slug("L'isola di Arturo")` → `"l-isola-di-arturo"`.
   Aiuto: `strtolower`, poi `strtr($testo, ['à' => 'a', 'è' => 'e', 'é' => 'e', 'ì' => 'i',
   'ò' => 'o', 'ù' => 'u'])`, poi `str_replace([' ', "'"], '-', $testo)`.
5. Metti il file nella cartella `catalogo`, carica i libri con
   `$libri = require __DIR__ . '/libri.php';` e stampa per ognuno
   `I.C. - Il barone rampante - il-barone-rampante`.
6. Cosa succede se chiami `stelle("tre")`? E `stelle(3.7)`? Aggiungi in cima al file
   `declare(strict_types=1);` e riprova: cosa cambia?

## 2.3 – La pagina degli autori (45 minuti) – `autori.php`
1. Nuova pagina con la stessa testata e lo stesso piede del catalogo (`require`).
2. L'elenco degli autori **senza ripetizioni** in ordine alfabetico:
   `array_unique(array_column($libri, 'autore'))`, poi `sort`.
3. Accanto a ogni autore il numero dei suoi libri.
4. Nella testata (`parti/testata.php`) aggiungi i link "Catalogo" e "Autori".

## 2.4 – La pagina di un autore (45 minuti) – `autore.php`
1. L'indirizzo è `autore.php?nome=Italo Calvino`. Nella pagina degli autori ogni nome diventa
   un link a questa pagina: per mettere un nome con gli spazi in un indirizzo si usa
   `urlencode($nome)`.
2. La pagina mostra il nome dell'autore e l'elenco dei suoi libri, con il link al dettaglio.
3. Se l'autore non ha libri (nome sbagliato o mancante): codice 404 e "Autore non trovato".
4. Usa `e()` per tutto quello che arriva da `$_GET`. Prova:
   `autore.php?nome=<b>ciao</b>`: cosa compare? E senza `e()`?

## 2.5 – Filtro per genere (40 minuti) – `index.php`
1. Sopra la tabella del catalogo, una fila di link: Tutti, Romanzo, Racconti, Giallo, Saggio.
   Ogni link porta a `index.php?genere=Giallo` (Tutti: `index.php`).
2. Con `$_GET['genere']` mostra solo i libri di quel genere; il genere attivo è in grassetto.
3. Il titolo della pagina diventa `Catalogo - Giallo (4 libri)`.
4. (Difficile) Ricerca e genere insieme: nel form di ricerca aggiungi
   `<input type="hidden" name="genere" value="...">` con il genere attivo.
