<?php
// Esercizio 1.4 - la scadenza del prestito
$prestito = strtotime('2026-11-13');
// 13/11 + 30 giorni = domenica 13/12: diventa lunedi' 14/12
// prova anche strtotime('2026-10-31'): scade lunedi' 30/11 e resta com'e'

echo "Prestito: " . date('d/m/Y', $prestito) . "\n";

$scadenza = strtotime('+30 days', $prestito);
$nota = "";

if (date('N', $scadenza) == 7) {               // domenica: la biblioteca e' chiusa
    $scadenza = strtotime('+1 day', $scadenza);
    $nota = " (spostata al lunedì)";
}

// il giorno della settimana in italiano (le funzioni si vedono domani)
$nomeGiorno = match ((int) date('N', $scadenza)) {
    1 => "lunedì",
    2 => "martedì",
    3 => "mercoledì",
    4 => "giovedì",
    5 => "venerdì",
    6 => "sabato",
    7 => "domenica",
};

echo "Scadenza: $nomeGiorno " . date('d/m/Y', $scadenza) . $nota . "\n";
