<?php
/*
 * 02 - FUNZIONI
 * Esecuzione:  php 02-funzioni.php
 */

function giorniDiLetturaNoType( $pagine,  $alGiorno = 25)
{
    return (int) ceil($pagine / $alGiorno);
}
// print_r (giorniDiLetturaNoType("ciao", "50") . "\n"); //genera un fatal error
print_r (giorniDiLetturaNoType("832", "50") . "\n");


// Tipi dei parametri e del valore restituito: facoltativi, ma aiutano a trovare errori
function giorniDiLettura(int $pagine, int $alGiorno = 25): int
{
    return (int) ceil($pagine / $alGiorno);
}

echo giorniDiLettura(503) . "\n";       // 21: usa il default
echo giorniDiLettura(503, 50) . "\n";   // 11
print_r (giorniDiLettura("503", "50") . "\n"); //11 converte automaticamente la stringa in int
//print_r (giorniDiLettura("ciao", "50") . "\n");  //da errore perchè la stringa non ha un valore numerico

function formattaPrezzo(float $prezzo): string
{
    return number_format($prezzo, 2, ',', '.') . " €";
}
echo formattaPrezzo(125853.5) . "\n";

// void: la funzione non restituisce niente
function stampaTitolo(string $titolo): void
{
    echo "== $titolo ==\n";
}
stampaTitolo("Catalogo");

// Le variabili esterne NON sono visibili dentro la funzione: si passano come parametri
$libri = [
    ["titolo" => "Il barone rampante", "autore" => "Italo Calvino", "pagine" => 270],
    ["titolo" => "Il nome della rosa", "autore" => "Umberto Eco", "pagine" => 503],
    ["titolo" => "Le città invisibili", "autore" => "Italo Calvino", "pagine" => 168],
];

function libriDiAutore(array $librini, string $autore): array
{
print_r("autore: " . $autore . "\n");   
$trovati = [];
    foreach ($librini as $libro) {
        if ($libro["autore"] === $autore) {
            $trovati[] = $libro;
        }
    }
    return $trovati;
}


// La stessa cosa con array_filter e una arrow function (fn): è il filter di JavaScript
$autore= "Italo Calvino";
$calvino = array_filter($libri, fn($l) => $l["autore"] === $autore);
echo count($calvino) . " libri dell'autore $autore\n";
