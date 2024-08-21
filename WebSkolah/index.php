<?php
require_once("content.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $sekolah; ?></title>
</head>
<body>
    <h1><?= $judul; ?></h1>
    <p><?= $isi; ?></p>
    <hr>
    <h1><?= $jadwal; ?></h1>

    <table border="1">
        <thead>
            <tr>
                <th><?= $hari[0]; ?></th>
                <th><?= $hari[1]; ?></th>
                <th><?= $hari[2]; ?></th>
                <th><?= $hari[3]; ?></th>
                <th><?= $hari[4]; ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $pljrn[10];?></td>
                <td><?= $pljrn[4];?></td>
                <td><?= $pljrn[6];?></td>
                <td><?= $pljrn[3];?></td>
                <td><?= $pljrn[12];?></td>
            </tr>
            <tr>
                <td><?= $pljrn[2]; ?></td>
                <td><?= $pljrn[5]; ?></td>
                <td><?= $pljrn[10]; ?></td>
                <td><?= $pljrn[9]; ?></td>
                <td><?= $pljrn[1]; ?></td>
            </tr>
            <tr>
                <td><?= $pljrn[5]; ?></td>
                <td><?= $pljrn[10]; ?></td>
                <td><?= $pljrn[11]; ?></td>
                <td><?= $pljrn[6]; ?></td>
                <td><?= $pljrn[3]; ?></td>
            </tr>
            <tr>
                <td><?= $pljrn[1]; ?></td>
                <td><?= $pljrn[7]; ?></td>
                <td><?= $pljrn[10]; ?></td>
                <td><?= $pljrn[9]; ?></td>
                <td><?= $pljrn[10]; ?></td>
            </tr>
            <tr>
                <td><?= $pljrn[9]; ?></td>
                <td><?= $pljrn[8]; ?></td>
                <td><?= $pljrn[6]; ?></td>
                <td><?= $pljrn[9]; ?></td>
                <td><?= $pljrn[10]; ?></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <img src="images/<?= $img[0];?>" alt="">
</body>
</html>
