<?php
/*
 * 01 - ARRAY
 * Esecuzione:  php 01-array.php
 */

// ARRAY INDICIZZATO: come in JavaScript, l'indice parte da 0
$titoli = ["Il barone rampante", "Il nome della rosa", "Lessico famigliare"];
echo $titoli[0] . "\n";
echo count($titoli) . "\n";          // quanti elementi (in JS: length)

$titoli[] = "Marcovaldo";             // aggiunge in fondo (in JS: push)
echo implode(", ", $titoli) . "\n";   // unisce in una stringa (in JS: join)
var_dump(in_array("Marcovaldo", $titoli)); // c'è? (in JS: includes)

// ARRAY ASSOCIATIVO: chiavi con un nome. È l'equivalente dell'oggetto JavaScript.
$libro = [
    "titolo" => "Il barone rampante",
    "autore" => "Italo Calvino",
    "anno" => 1957,
];
echo $libro["titolo"] . " di " . $libro["autore"] . "\n";
$libro["pagine"] = 270;               // aggiungere una chiave

// print_r: mostra tutto il contenuto, utile per capire com'è fatto un array
print_r($libro);

// foreach con chiave e valore
foreach ($libro as $chiave => $valore) {
    echo "$chiave: $valore\n";
}

// ARRAY DI ARRAY ASSOCIATIVI: la forma dei dati che arriveranno dal database
$libri = [
    ["titolo" => "Il barone rampante", "autore" => "Italo Calvino", "anno" => 1957],
    ["titolo" => "Il nome della rosa", "autore" => "Umberto Eco", "anno" => 1980],
    ["titolo" => "Lessico famigliare", "autore" => "Natalia Ginzburg", "anno" => 1963],
];

foreach ($libri as $l) {
    echo "{$l['titolo']} ({$l['anno']})\n";   // dentro le virgolette doppie: graffe e apici singoli
}

// array_column: prende una colonna da tutti gli elementi
print_r(array_column($libri, "titolo"));

// ordinare per anno
usort($libri, fn($a, $b) => $a["anno"] <=> $b["anno"]);
echo $libri[0]["titolo"] . " è il più vecchio\n";
// <=> restituisce -1, 0 o 1: è il confronto che serve a usort (come a - b in JS)
