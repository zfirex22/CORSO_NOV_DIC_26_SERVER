<?php
/*
 * 02 - FUNZIONI
 * Esecuzione:  php 02-funzioni.php
 */

// Tipi dei parametri e del valore restituito: facoltativi, ma aiutano a trovare errori
function giorniDiLettura(int $pagine, int $alGiorno = 25): int
{
    return (int) ceil($pagine / $alGiorno);
}

echo giorniDiLettura(503) . "\n";       // 21: usa il default
echo giorniDiLettura(503, 50) . "\n";   // 11

function formattaPrezzo(float $prezzo): string
{
    return number_format($prezzo, 2, ',', '.') . " €";
}
echo formattaPrezzo(12.5) . "\n";

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

function libriDiAutore(array $libri, string $autore): array
{
    $trovati = [];
    foreach ($libri as $libro) {
        if ($libro["autore"] === $autore) {
            $trovati[] = $libro;
        }
    }
    return $trovati;
}

print_r(libriDiAutore($libri, "Italo Calvino"));

// La stessa cosa con array_filter e una arrow function (fn): è il filter di JavaScript
$calvino = array_filter($libri, fn($l) => $l["autore"] === "Italo Calvino");
echo count($calvino) . " libri di Calvino\n";
