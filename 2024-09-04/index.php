<?php

$judol = "belajar php";
$judol1 = "siswa rpl";
$judol2 = "smkn 2 buduran";
$judols = ["beljaar php","siswa rpl","smkn 2 buduran"];


echo $judols [0];
for ($i=0; $i < 3; $i++) { 
    echo "<br>";
    echo $i;
    echo $judols[$i];

}

foreach ($judols as $key) {
    echo "<br>";
    echo $key;

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $judol4?></h1>
    <h1><?= $judol4?></h1>
    <h1><?= $judol4?></h1>
    <h1><?= $judol4?></h1>
    <h1><?= $judol4?></h1>
    <h1><?= $judol4?></h1>
    <h1><?= $judol4?></h1>


    <h2><?= $judol1?></h2>
    <h3><?= $judol2?></h3>
    <h4><? echo $judol?></h4>

    <h1><?= $judols[0];?></h1>
    <h2><?= $judols[1];?></h2>
    <h3><?= $judols[2];?></h3>

    <?php
    for ($i=0; $i < 3; $i++) { 
        echo "<h1>";
        echo $judols [$i];
        echo "</h1>";
    }
    
    ?>
    <h1>menampilkan php</h1>

    <?php
    for ($i=0; $i < 3; $i++) { 
        ?>
        <h1><?= $judols [$i]?></h1>
        <?php
    }
    ?>

    <?php
    foreach ($judols as $key) {
        echo "<h2>";
        echo $key;
        echo"</h2>";
        echo "<br>";
    }
    ?>

    <?php
    foreach ($judols as $key) {
        ?>
        <h2><?= $key?></h2>
        <?php
    }
    ?>

    <?php

    for ($i=1; $i < 10; $i++) { 
        echo "<h$i>";
        echo "smkn 2 buduran";
        echo "</h$i>";
    }
    ?>

    <?php
    for ($i=6; $i > 0; $i--) { 
        echo "<h$i>"."smkn 2 buduran"."</h$i>";
    }
    ?>

</body>
</html>