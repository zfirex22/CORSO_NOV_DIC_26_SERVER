<?php
/*
 * 01 - IL PRIMO SCRIPT
 * Esecuzione da terminale:  php 01-ciao.php
 *
 * JavaScript gira nel BROWSER. PHP gira sul SERVER: riceve la richiesta,
 * esegue il codice e manda al browser il risultato (di solito HTML).
 * Il browser non vede mai il codice PHP.
 */

// echo scrive l'output: qui nel terminale, in una pagina nel browser
echo "Ciao dalla biblioteca!\n"; // \n = a capo

// ogni istruzione finisce con il punto e virgola (in PHP è obbligatorio)
echo "Versione di PHP: " . PHP_VERSION . "\n"; // il punto unisce le stringhe
echo "scritto da me";
// Un file con solo PHP inizia con <?php e non ha il tag di chiusura.
