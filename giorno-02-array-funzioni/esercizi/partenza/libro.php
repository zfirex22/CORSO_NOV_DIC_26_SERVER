<?php
/*
 * 03 - IL DETTAGLIO DI UN LIBRO: libro.php?id=8
 */
require __DIR__ . '/funzioni.php';
$libri = require __DIR__ . '/libri.php';

// (int) converte in numero: "8" -> 8, "abc" -> 0
$id = (int) ($_GET['id'] ?? 0);
$libro = trovaLibro($libri, $id);

if ($libro === null) {
    http_response_code(404);   // il codice HTTP "non trovato"
    $titoloPagina = 'Libro non trovato';
    require __DIR__ . '/parti/testata.php';
    echo '<h1>Libro non trovato</h1><p><a href="index.php">Torna al catalogo</a></p>';
    require __DIR__ . '/parti/piede.php';
    exit;   // ferma lo script
}

$titoloPagina = $libro['titolo'];
require __DIR__ . '/parti/testata.php';
?>

<h1><?= e($libro['titolo']) ?></h1>
<p><?= e($libro['autore']) ?>, <?= $libro['anno'] ?></p>
<p><?= $libro['pagine'] ?> pagine - <?= e($libro['genere']) ?></p>
<p><?= $libro['disponibile'] ? 'Disponibile' : 'In prestito' ?></p>
<p><a href="index.php">Torna al catalogo</a></p>

<?php require __DIR__ . '/parti/piede.php'; ?>
