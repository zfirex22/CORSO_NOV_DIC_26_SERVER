<?php
/*
 * 03 - IL CATALOGO: require, PHP dentro l'HTML, $_GET
 * Esecuzione: dalla cartella 03-catalogo:  php -S localhost:8000
 *             poi  http://localhost:8000
 *
 * require include un altro file PHP. __DIR__ è la cartella di questo file:
 * così il percorso funziona da qualsiasi cartella si avvii il server.
 */
require __DIR__ . '/funzioni.php';
$libri = require __DIR__ . '/libri.php';   // libri.php restituisce l'array con return

// $_GET contiene i parametri dell'indirizzo: index.php?q=calvino -> $_GET['q'] vale "calvino"
// ?? '' : se il parametro manca, stringa vuota (senza, PHP darebbe un Warning)
$q = trim($_GET['q'] ?? '');

if ($q !== '') {
    $libri = array_filter($libri, fn($l) =>
        str_contains(strtolower($l['titolo']), strtolower($q)) ||
        str_contains(strtolower($l['autore']), strtolower($q)));
}

$titoloPagina = 'Catalogo';
require __DIR__ . '/parti/testata.php';
?>

<h1>Catalogo (<?= count($libri) ?> libri)</h1>

<!-- form con method="get": i dati finiscono nell'indirizzo, dove li legge $_GET -->
<form method="get">
    <input type="search" name="q" value="<?= e($q) ?>" placeholder="Titolo o autore">
    <button type="submit">Cerca</button>
</form>

<table>
    <tr><th>Titolo</th><th>Autore</th><th>Anno</th></tr>
    <?php foreach ($libri as $libro) { ?>
        <tr class="<?= $libro['disponibile'] ? '' : 'esaurito' ?>">
            <!-- il link porta l'id del libro nell'indirizzo -->
            <td><a href="libro.php?id=<?= $libro['id'] ?>"><?= e($libro['titolo']) ?></a></td>
            <td><?= e($libro['autore']) ?></td>
            <td><?= $libro['anno'] ?></td>
        </tr>
    <?php } ?>
</table>

<?php if (count($libri) === 0) { ?>
    <p>Nessun libro trovato.</p>
<?php } ?>

<?php require __DIR__ . '/parti/piede.php'; ?>
