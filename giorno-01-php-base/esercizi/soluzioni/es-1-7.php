<?php
// Esercizio 1.7 - cosa stampa?
echo "10" + "5", "\n";      // 15: + e' sempre una somma, le stringhe numeriche diventano numeri
echo "10" . "5", "\n";      // 105: il punto unisce le stringhe (in JavaScript era il +)
echo 7 / 2, "\n";           // 3.5: la divisione non tronca
echo intdiv(7, 2), "\n";    // 3: divisione intera
echo 7 % 2, "\n";           // 1: il resto
var_dump("1" == "01");      // true: == confronta due stringhe numeriche come numeri
var_dump("1" === "01");     // false: === vuole anche lo stesso tipo e lo stesso contenuto
var_dump("abc" == 0);       // false in PHP 8 (true in PHP 7!)
var_dump(0.1 + 0.2 == 0.3); // false: i decimali nel computer sono approssimati (come in JS)
$nome = null;
echo $nome ?? "ospite", "\n";   // ospite: ?? usa il valore a destra se a sinistra c'e' null
$autore = "Calvino";
echo 'Autore: $autore', "\n";   // Autore: $autore - tra apici singoli le variabili non si espandono
echo "Autore: $autore", "\n";   // Autore: Calvino
echo "5 mele" + 3, "\n";        // 8, con un Warning: usa il numero iniziale
echo "mele" + 3, "\n";          // errore fatale TypeError: non c'e' nessun numero da usare
