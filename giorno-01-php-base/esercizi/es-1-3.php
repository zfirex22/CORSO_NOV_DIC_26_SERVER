<?php 

$genere = "Giallo";

$scaffale = match($genere) {
    "Romanzo" => "A",
    "Giallo" => "B",
    "Fantascienza" => "C",
    default => "Chiedi al bancone"
};

echo "Il genere " . $genere . " è nello scaffale " . $scaffale;