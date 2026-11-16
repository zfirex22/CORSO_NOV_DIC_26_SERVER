<?php 

$titolo = "Titolo Incredibile";
$autore = "Pippo";
$anno = 1967;
$pagine = 619;
$disponibile = true;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $titolo ?></h1>
    <h2>Autore: <?= $autore ?></h2>
    <p><?= $anno ?></p>
    <p><?= $pagine ?> Pagine</p>
    <p><?= $disponibile ? "Disponibile" : "In Prestito"  ?></p>
    <?php if ($pagine > 400) { ?>
    <strong>Libro lungo</strong>
    <?php } ?>
    <footer>
        <p>Pagina generata il <?= date("d/m/Y H:i:s") ?></p></footer>
</body>
</html>