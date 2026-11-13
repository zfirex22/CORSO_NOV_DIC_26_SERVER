<?php
/*
 * 04 - CONDIZIONI
 * Esecuzione:  php 04-condizioni.php
 * La sintassi è quasi uguale a JavaScript.
 */

$giorniRitardo = 4;

// if / elseif / else  (in PHP elseif è attaccato)
if ($giorniRitardo === 0) {
    echo "Restituito in tempo.\n";
} elseif ($giorniRitardo <= 7) {
    echo "Multa di " . ($giorniRitardo * 0.5) . " euro.\n";
} else {
    echo "Tessera sospesa.\n";
}

// && (e), || (o), ! (non): come in JavaScript
$tesseraValida = false;
$copie = 0;
if ($tesseraValida && $copie > 0) {
    echo "Prestito possibile.\n";
} else {
    echo "Prestito non possibile.\n";
}

$eta = 65;
if ($tesseraValida || $eta>=65){
    echo "Prestito 2 possibile.\n";
} else {
    echo "Prestito 2 non possibile.\n";
}



// ternario
$stato = $copie > 0 ? "disponibile" : "in prestito";
echo "Il libro è $stato.\n";

// match: sceglie un valore in base a un altro. Più compatto di tanti elseif.
$genere = "Fantascienza";
$scaffale = match ($genere) {
    "Romanzo" => "A",
    "Giallo", "Thriller" => "B",
    "Saggio" => "C",
    default => "chiedi al bancone",
};
echo "Scaffale: $scaffale\n";
