<?php
// Esercizio 1.5 - il calendario delle aperture
$aperture = 0;
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Calendario delle aperture</title>
    <style>
        body { font-family: system-ui, sans-serif; margin: 2rem; }
        td, th { padding: .3rem 1rem; border-bottom: 1px solid #ddd; text-align: left; }
    </style>
</head>
<body>
    <h1>Prossime due settimane</h1>
    <table>
        <tr><th>Data</th><th>Giorno</th><th>Orario</th></tr>
        <?php for ($i = 0; $i <= 13; $i++) {
            $giorno = strtotime("+$i days");
            $numero = (int) date('N', $giorno);

            if ($numero === 7) {
                continue;            // la domenica non compare
            }
            $aperture++;

            $nome = match ($numero) {
                1 => "lunedì", 2 => "martedì", 3 => "mercoledì",
                4 => "giovedì", 5 => "venerdì", 6 => "sabato",
            };
            $orario = $numero === 6 ? "chiude alle 13:00" : "9:00 - 19:00";
        ?>
            <tr>
                <td><?= date('d/m/Y', $giorno) ?></td>
                <td><?= $nome ?></td>
                <td><?= $orario ?></td>
            </tr>
        <?php } ?>
    </table>
    <p>Giorni di apertura: <?= $aperture ?></p>
</body>
</html>
