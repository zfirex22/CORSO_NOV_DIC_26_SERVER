<?php
// Esercizio 1.1 - il codice di collocazione
$cognome = "Calvino";
$genere = "Romanzo";
$anno = 1957;
$numero = 42;

// 1. prime tre lettere in maiuscolo
$codice = strtoupper(substr($cognome, 0, 3)) . "-" . strtoupper(substr($genere, 0, 3)) . "-" . $anno;
echo "$codice\n";

// 2. numero di inventario su 5 cifre, con gli zeri davanti
echo $codice . "-" . str_pad($numero, 5, "0", STR_PAD_LEFT) . "\n";

// 3. con sprintf: %s = testo, %d = numero intero, %05d = intero su 5 cifre con zeri
echo sprintf(
    "%s-%s-%d-%05d",
    strtoupper(substr($cognome, 0, 3)),
    strtoupper(substr($genere, 0, 3)),
    $anno,
    $numero
) . "\n";

// 4. substr non da' errore se il testo e' piu' corto: restituisce quello che c'e'
echo strtoupper(substr("Eco", 0, 3)) . "\n";   // ECO
echo strtoupper(substr("Fo", 0, 3)) . "\n";    // FO: il codice diventa piu' corto
