<?php
// Esercizio 1.3 - Lo scaffale con match
$genere = "Giallo";

$scaffale = match ($genere) {
    "Romanzo" => "A",
    "Giallo", "Thriller" => "B",
    "Saggio" => "C",
    "Poesia" => "D",
    default => "Chiedi al bancone",
};

echo "Il genere $genere è nello scaffale $scaffale\n";
