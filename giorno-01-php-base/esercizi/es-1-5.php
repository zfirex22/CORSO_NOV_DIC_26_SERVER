<?php date_default_timezone_set('Europe/Rome');
$aperture = 0;  ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <caption>Calendario</caption>
        <thead>
            <tr>
                <th>Data</th>
                <th>Giorno</th>
                <th>Orario</th>
            </tr>
        </thead>
        <tbody>            
                <?php for ($i = 0; $i < 14; $i++) {
                    $data = strtotime("+$i days");
                    $giornoSet = match(date("N", $data)) {
                    "1" => "Lunedì",
                    "2" => "Martedì",
                    "3" => "Mercoledì",
                    "4" => "Giovedì",
                    "5" => "Venerdì",
                    "6" => "Sabato",
                    "7" => "Domenica",};
                    if ($giornoSet === "Domenica"){
                        continue;};
                        $aperture++;?>
                    <tr>
                    <td><?= date("d/m/Y",$data);  ?></td>
                    <td><?= $giornoSet; ?></td>
                    <td><?= $giornoSet === "Sabato" ? "9:00 - 13:00": "9:00 - 19:00" ?></td>
                    </tr><?php } ?>         
        </tbody>
    </table>
    <p><?= "Giorni di apertura: " . $aperture?>  </p>
</body>
</html>
