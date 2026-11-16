<?php
// Esercizio 1.2 - la tessera della biblioteca
$annoNascita = 1996;
$residente = true;

$eta = date('Y') - $annoNascita;

// Versione con if / elseif
if ($eta <= 13) {
    $tessera = "Ragazzi";
    $costo = 0;
} elseif ($eta <= 25) {
    $tessera = "Giovani";
    $costo = 5;
} elseif ($eta <= 64) {
    $tessera = "Adulti";
    $costo = 15;
} else {
    $tessera = "Senior";
    $costo = 8;
}

// Versione con match (true): vince il primo ramo vero, dall'alto
$tessera2 = match (true) {
    $eta <= 13 => "Ragazzi",
    $eta <= 25 => "Giovani",
    $eta <= 64 => "Adulti",
    default    => "Senior",
};

if ($residente) {
    $costo = $costo * 0.8;   // 20% di sconto
}

$testoCosto = $costo == 0
    ? "gratuito"
    : number_format($costo, 2, ",", ".") . " €";

echo "Età $eta - tessera $tessera - costo $testoCosto\n";
echo "Con match: $tessera2\n";
