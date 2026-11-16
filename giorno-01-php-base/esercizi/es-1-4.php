<?php 

$prestito = strtotime("2026-11-13");

$scadenza = strtotime("+30 days", $prestito);

$giornoSetPrestito = match(date("N", $prestito)) {
    "1" => "Lunedì",
    "2" => "Martedì",
    "3" => "Mercoledì",
    "4" => "Giovedì",
    "5" => "Venerdì",
    "6" => "Sabato",
    "7" => "Domenica",
    };
    $giornoSetScadenza = match(date("N", $scadenza)) {
        "1" => "Lunedì",
        "2" => "Martedì",
        "3" => "Mercoledì",
        "4" => "Giovedì",
        "5" => "Venerdì",
        "6" => "Sabato",
        "7" => "Domenica",
        };
        

echo "Prestito: " . $giornoSetPrestito . " " .date("d/m/Y", $prestito)."\n";
echo "Scadenza: " . $giornoSetScadenza . " " .date("d/m/Y", $scadenza) ."\n";

 if (date("N",$scadenza) == "7") {
    echo "Scadenza spostata a Lunedì " . date("d/m/Y", strtotime("+1 day", $scadenza));
};