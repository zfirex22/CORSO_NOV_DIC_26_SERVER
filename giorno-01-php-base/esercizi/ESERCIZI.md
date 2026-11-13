# Giorno 1 – Esercizi del pomeriggio (PHP di base)

## Prima di iniziare

1. Crea una cartella `php-giorno-01` e aprila in VS Code (File > Apri cartella).
2. Ogni esercizio è un file `.php` separato, con il nome indicato nel titolo.
3. Apri il terminale di VS Code (Terminale > Nuovo terminale). Il terminale deve
   trovarsi nella cartella `php-giorno-01`.
4. Controlla la versione di PHP con `php -v`. Questi esercizi presuppongono PHP 8 o successivo.

**Come si eseguono**
- Esercizi 1.1, 1.2, 1.3, 1.4 e 1.7: si eseguono nel terminale, per esempio `php es-1-1.php`.
  Il risultato compare nel terminale.
- Esercizi 1.5 e 1.6: sono pagine web. Nel terminale scrivi `php -S localhost:8000`
  e lascialo aperto: è un piccolo server web. Poi apri nel browser
  `http://localhost:8000/calendario.php` oppure `http://localhost:8000/scheda-libro.php`.
  Per fermare il server, nel terminale premi Ctrl+C.

**Regole valide per tutti gli esercizi**
- Ogni `echo` che stampa nel terminale deve finire con `"\n"`, altrimenti le righe
  si attaccano una all'altra. Esempio: `echo "Codice: $codice\n";`
- Nei file che usano le date (1.2, 1.4, 1.5, 1.6) scrivi come prima riga dopo `<?php`:
  `date_default_timezone_set('Europe/Rome');`
  Senza questa riga PHP potrebbe usare l'ora di Londra e sbagliare di un'ora.
- Se nel terminale le lettere accentate o il simbolo € escono come caratteri strani,
  scrivi `chcp 65001` nel terminale e riesegui.
- Le funzioni nuove sono indicate negli aiuti: cercale sul manuale https://www.php.net
  scrivendo il nome nella casella di ricerca in alto.

---

## 1.1 – Il codice di collocazione (25 minuti) – `es-1-1.php`

In biblioteca ogni libro ha un codice scritto sullo scaffale. Il codice è formato da:
prime 3 lettere del cognome dell'autore, prime 3 lettere del genere, anno, numero
di inventario. Le parti sono separate da un trattino `-`.

Crea quattro variabili:
```php
$cognome = "Calvino";
$genere  = "Romanzo";
$anno    = 1957;
$numero  = 42;
```

**Passo 1.** Stampa il codice senza il numero. Le lettere devono essere maiuscole e le
parti separate da trattini. Usa la concatenazione con il punto `.`.
Risultato atteso:
```
CAL-ROM-1957
```

**Passo 2.** Aggiungi in fondo il numero di inventario scritto sempre con 5 cifre,
completando con zeri a sinistra (42 diventa 00042, 7 diventerebbe 00007).
Risultato atteso:
```
CAL-ROM-1957-00042
```

**Passo 3.** Ottieni lo stesso codice del passo 2 con una sola chiamata a `sprintf`,
senza concatenazioni e senza `str_pad`. Le prime tre lettere maiuscole
le calcoli prima, come nel passo 1.
Il risultato deve essere identico a quello del passo 2.

**Passo 4.** Prova con altri valori, cambiando le variabili:
- `"Eco"` e `"Giallo"`: il cognome ha esattamente 3 lettere.
- `"Fo"` e `"Giallo"`: il cognome ha solo 2 lettere.

Rispondi in un commento nel file:
- Che codice esce in ciascun caso?
- `substr` dà errore se il testo è più corto di 3 lettere?
- Che problema ha un codice come `FO-GIA-1957-00042` rispetto agli altri?

Facoltativo: fai in modo che la sigla abbia sempre 3 lettere, completando con `X`
(`"Fo"` diventa `FOX`).

Aiuto: `substr($testo, 0, 3)`, `strtoupper($testo)`, `str_pad($numero, 5, "0", STR_PAD_LEFT)`,
`sprintf("%s-%05d", $testo, $numero)`. In `sprintf`: `%s` = testo, `%d` = numero intero,
`%05d` = numero intero su 5 cifre con zeri davanti.

---

## 1.2 – La tessera della biblioteca (30 minuti) – `es-1-2.php`

La biblioteca rilascia una tessera diversa in base all'età.

Crea due variabili:
```php
$annoNascita = 1996;
$residente   = true;   // true = abita nel comune, false = no
```

**Passo 1.** Calcola l'età come anno corrente meno anno di nascita.
L'anno corrente si ottiene con `date('Y')`. Il calcolo è volutamente approssimato:
non consideriamo se il compleanno di quest'anno c'è già stato.

**Passo 2.** In base all'età trova il tipo di tessera e il costo annuo:

| Età (estremi compresi) | Tessera | Costo annuo |
|---|---|---|
| da 0 a 13 | Ragazzi | gratis |
| da 14 a 25 | Giovani | 5 € |
| da 26 a 64 | Adulti | 15 € |
| 65 o più | Senior | 8 € |

**Passo 3.** Se `$residente` è `true`, il costo ha il 20% di sconto (si paga l'80%).

**Passo 4.** Stampa una riga in questo formato. Il costo va scritto con 2 decimali e la
virgola, come si usa in Italia:
```
Età 30 - tessera Adulti - costo 12,00 €
```
Se la tessera è gratis, la riga diventa:
```
Età 11 - tessera Ragazzi - costo gratuito
```

**Passo 5.** Risolvi l'esercizio due volte nello stesso file: prima con `if / elseif / else`,
poi sotto con `match (true)`. Le due versioni devono stampare la stessa riga.

**Prove da fare** (cambia `$annoNascita` e `$residente`). Con l'anno corrente 2026:

| Anno di nascita | Residente | Risultato atteso |
|---|---|---|
| 2015 | true | Età 11 - tessera Ragazzi - costo gratuito |
| 2013 | true | Età 13 - tessera Ragazzi - costo gratuito |
| 2012 | false | Età 14 - tessera Giovani - costo 5,00 € |
| 1996 | true | Età 30 - tessera Adulti - costo 12,00 € |
| 1996 | false | Età 30 - tessera Adulti - costo 15,00 € |
| 1961 | true | Età 65 - tessera Senior - costo 6,40 € |

Aiuto:
- `number_format($costo, 2, ',', '.')` scrive il numero con 2 decimali, la virgola
  per i decimali e il punto per le migliaia.
- `match (true)` controlla le condizioni in ordine e usa la prima vera:
  ```php
  $tessera = match (true) {
      $eta <= 13 => "Ragazzi",
      $eta <= 25 => "Giovani",
      // ...
  };
  ```

---

## 1.3 – Lo scaffale con match (20 minuti) – `es-1-3.php`

Ogni genere di libro sta in uno scaffale diverso.

Crea una variabile:
```php
$genere = "Giallo";
```

Con `match` ricava la lettera dello scaffale:

| Genere | Scaffale |
|---|---|
| Romanzo | A |
| Giallo | B |
| Thriller | B |
| Saggio | C |
| Poesia | D |
| qualsiasi altro | nessuno scaffale |

Stampa, se il genere ha uno scaffale:
```
Il genere Giallo è nello scaffale B
```
Se il genere non è nella tabella:
```
Il genere Fumetto non ha uno scaffale: chiedi al bancone
```

**Prove da fare:** `"Romanzo"`, `"Thriller"`, `"Poesia"`, `"Fumetto"` e infine
`"giallo"` (minuscolo). Con `"giallo"` minuscolo cosa succede? Spiega il motivo in un commento.

Aiuto:
- In `match` più valori possono dare lo stesso risultato: `"Giallo", "Thriller" => "B",`
- Il caso "qualsiasi altro" si scrive con `default => ...`. Per sapere se stampare la prima
  o la seconda frase, fai restituire a `default` il valore `null` e poi controlla con un `if`.

---

## 1.4 – La scadenza del prestito (30 minuti) – `es-1-4.php`

Un libro si tiene in prestito per 30 giorni. La biblioteca la domenica è chiusa:
se la scadenza cade di domenica, si sposta al lunedì successivo.

**Passo 1.** Crea la data del prestito e stampala nel formato giorno/mese/anno:
```php
$prestito = strtotime('2026-11-13');
```
`strtotime` trasforma una data scritta come testo in un numero (i secondi passati
dal 1° gennaio 1970). `date('d/m/Y', $prestito)` trasforma quel numero di nuovo in testo.

**Passo 2.** Calcola la scadenza aggiungendo 30 giorni:
```php
$scadenza = strtotime('+30 days', $prestito);
```

**Passo 3.** Scrivi il giorno della settimana in italiano, sia per il prestito sia per la
scadenza. `date('N', $data)` restituisce un numero: 1 = lunedì, 2 = martedì, ... 7 = domenica.
Con `match` trasforma il numero nella parola (`"lunedì"`, `"martedì"`, ...).

**Passo 4.** Se la scadenza è di domenica (`date('N', $scadenza) == 7`), aggiungi un giorno
con `strtotime('+1 day', $scadenza)` e scrivi in fondo alla riga `(spostata al lunedì)`.

Risultato atteso con il prestito del 13/11/2026 (la scadenza cade di domenica):
```
Prestito: 13/11/2026 (venerdì)
Scadenza: 14/12/2026 (lunedì) (spostata al lunedì)
```

**Passo 5.** Cambia la data del prestito in `'2026-10-31'` e riesegui. Qui la scadenza
non cade di domenica, quindi non deve essere spostata:
```
Prestito: 31/10/2026 (sabato)
Scadenza: 30/11/2026 (lunedì)
```

---

## 1.5 – Il calendario delle aperture (40 minuti) – `calendario.php`

Questa è una pagina web: si apre nel browser (vedi "Come si eseguono" in cima).

La pagina mostra una tabella con gli orari della biblioteca nei prossimi 14 giorni,
oggi compreso. La domenica la biblioteca è chiusa e non compare nella tabella.

**Passo 1.** Crea la struttura HTML della pagina con una tabella di tre colonne:
Data, Giorno, Orario.

**Passo 2.** Dentro la tabella scrivi un ciclo `for` con `$i` che va da 0 a 13.
A ogni giro la data è:
```php
$giorno = strtotime("+$i days");
```
(con `$i = 0` è oggi, con `$i = 1` è domani, e così via).

**Passo 3.** Se il giorno è domenica, salta al giro successivo con `continue`.

**Passo 4.** Per ogni altro giorno stampa una riga della tabella:
- Data nel formato `13/11/2026`
- Giorno della settimana in italiano (riusa il `match` dell'esercizio 1.4)
- Orario: `9:00 - 13:00` se è sabato, `9:00 - 19:00` negli altri giorni

La riga si stampa con `echo`, per esempio:
```php
echo "<tr><td>$data</td><td>$nomeGiorno</td><td>$orario</td></tr>";
```

**Passo 5.** Sotto la tabella scrivi `Giorni di apertura: 12`. Il 12 non va scritto a mano:
usa una variabile contatore che parte da 0 e aumenta di 1 a ogni giorno stampato.

Risultato atteso (se oggi è venerdì 13/11/2026), prime righe:

| Data | Giorno | Orario |
|---|---|---|
| 13/11/2026 | venerdì | 9:00 - 19:00 |
| 14/11/2026 | sabato | 9:00 - 13:00 |
| 16/11/2026 | lunedì | 9:00 - 19:00 |
| ... | ... | ... |

In 14 giorni ci sono sempre esattamente 2 domeniche, quindi il totale è sempre 12,
qualunque sia il giorno in cui apri la pagina.

---

## 1.6 – Una pagina PHP (45 minuti) – `scheda-libro.php`

Questa è una pagina web: si apre nel browser (vedi "Come si eseguono" in cima).
Si costruisce la scheda di un libro mescolando PHP e HTML nello stesso file.

**Passo 1.** In cima al file, in un blocco `<?php ... ?>`, crea le variabili del libro:
```php
$titolo      = "Il barone rampante";
$autore      = "Italo Calvino";
$anno        = 1957;
$pagine      = 280;
$disponibile = true;
```

**Passo 2.** Sotto il blocco PHP scrivi una pagina HTML completa
(`<!DOCTYPE html>`, `<html>`, `<head>` con `<title>`, `<body>`). Nel body mostra:
- il titolo dentro un `<h1>`
- autore, anno e pagine, ognuno in un `<p>`

Per inserire il valore di una variabile nell'HTML usa `<?= $titolo ?>`.
`<?= ... ?>` è la forma breve di `<?php echo ...; ?>`.

**Passo 3.** Aggiungi un `<p>` che mostra "Disponibile" se `$disponibile` è `true`,
"In prestito" se è `false`. Usa l'operatore ternario dentro `<?= ?>`:
```php
<?= $disponibile ? "Disponibile" : "In prestito" ?>
```

**Passo 4.** Aggiungi la frase "Libro lungo" solo se il libro ha più di 400 pagine.
Qui il ternario non basta: si apre un `if` in PHP, si scrive l'HTML normale,
poi si chiude l'`if`:
```php
<?php if ($pagine > 400) { ?>
    <p>Libro lungo</p>
<?php } ?>
```
Prova con `$pagine = 280` (la frase non compare) e con `$pagine = 450` (compare).
Prova anche `$disponibile = false`.

**Passo 5.** In fondo alla pagina scrivi la data e l'ora in cui la pagina è stata generata:
```
Pagina generata il 13/11/2026 alle 15:20
```
La data si ottiene con `date('d/m/Y')`, l'ora con `date('H:i')`.
Ricarica la pagina dopo un minuto: l'ora cambia?

**Passo 6.** Nel browser premi Ctrl+U: si apre il codice sorgente della pagina,
cioè quello che il browser ha ricevuto dal server. Rispondi in un commento nel file:
- Vedi da qualche parte `<?php`, `<?=` o i nomi delle variabili?
- Cosa c'è al loro posto?
- Chi ha eseguito il codice PHP: il browser o il server?

---

## 1.7 – Cosa stampa? (20 minuti) – `es-1-7.php`

Questo esercizio serve a scoprire come PHP tratta i tipi di dati. Non serve scrivere
codice nuovo: devi prevedere il risultato.

**Passo 1.** Su un foglio scrivi, per ogni riga, cosa ti aspetti che venga stampato.
Non eseguire ancora niente.

**Passo 2.** Copia le righe nel file. La virgola dopo ogni `echo` serve a stampare
anche `"\n"` e andare a capo; `var_dump` va a capo da solo e mostra anche il tipo
del risultato (`bool` = vero/falso).
```php
<?php
echo "10" + "5", "\n";
echo "10" . "5", "\n";
echo 7 / 2, "\n";
echo intdiv(7, 2), "\n";
echo 7 % 2, "\n";
var_dump("1" == "01");
var_dump("1" === "01");
var_dump("abc" == 0);
var_dump(0.1 + 0.2 == 0.3);
$nome = null;
echo $nome ?? "ospite", "\n";
$autore = "Calvino";
echo 'Autore: $autore', "\n";
echo "Autore: $autore", "\n";
echo "5 mele" + 3, "\n";
echo "mele" + 3, "\n";
```

**Passo 3.** Esegui il file e confronta il risultato con quello che avevi scritto.
Attenzione: l'ultima riga produce un errore che ferma il programma. È voluto,
fa parte dell'esercizio.

**Passo 4.** Per ogni riga in cui il risultato è diverso da quello che ti aspettavi,
scrivi sopra la riga un commento che spiega perché.

Aiuto: confronta `==` (uguale nel valore) e `===` (uguale nel valore e nel tipo).
Per `0.1 + 0.2` cerca "precisione dei numeri in virgola mobile".