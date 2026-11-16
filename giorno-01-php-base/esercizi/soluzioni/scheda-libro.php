<?php
// Esercizio 1.6 - Una pagina PHP
$titolo = "Il nome della rosa";
$autore = "Umberto Eco";
$anno = 1980;
$pagine = 503;
$disponibile = false;
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title><?= $titolo ?> - Bookshelf</title>
</head>
<body>
    <h1><?= $titolo ?></h1>
    <p>Autore: <?= $autore ?></p>
    <p>Anno: <?= $anno ?> - Pagine: <?= $pagine ?></p>
    <p><?= $disponibile ? "Disponibile" : "In prestito" ?></p>

    <?php if ($pagine > 400) { ?>
        <p>Libro lungo</p>
    <?php } ?>

    <footer>
        <p>Pagina generata il <?= date('d/m/Y') ?> alle <?= date('H:i') ?></p>
    </footer>
</body>
</html>
<?php
// Con Ctrl+U si vede solo l'HTML prodotto: al posto del codice PHP ci sono i valori.
