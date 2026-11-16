<?php 

$cognome = "Calvino";
$genere = "Romanzo";
$anno = 1957;
$numero = 42;

$codice = strtoupper(substr($cognome, 0, 3)) . "-" . strtoupper(substr($genere, 0, 3)) . "-" . $anno;

echo $codice . "\n";

$codiceFormattato = sprintf("%s-%05d", $codice, $numero);
echo $codiceFormattato;