<?php 

$annoNascita1 = 1997;
$residente1 = true;

$eta1 = (date("Y") - $annoNascita1);


$costoETessera = match(true) {
    $eta1 <= 13 => [0, "Ragazzi"],
    $eta1 <= 25 => [5, "Giovani"],
    $eta1 <= 64 => [15, "Adulti"],
    default => [8, "Senior"],
    };
    
$costo = $costoETessera[0];
$tessera = $costoETessera[1];

if ($residente1) {
    $costo *= 0.80;    
};
    

echo "Età " . $eta1 . " - tessera " . $tessera . " - costo " . number_format($costo, 2, ",", ".") . " €";






