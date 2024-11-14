<div class="produk">
    <h1>Produk</h1>
<?php

    $sql = "SELECT * FROM produk";
    // echo $sql;
    $hasil = mysqli_query($koneksi, $sql);
    $baris = mysqli_num_rows($hasil);
    echo $baris;

    if ($baris == 0) {
        echo "<h1>produk kosong</h1>";
    } else {
        while ($row = mysqli_fetch_array($hasil)) {
            ?>



    <div class="detail">
        <img src="images/<?= $row[5]?>" alt="">
        <h3><?= $row[1] ?></h3>
        <p><?= $row[2]?></p>

        <p>stock : <strong><?= $row[4]?></strong></p>
        <h3><?= $row[3]?></h3>
        <a href="?menu=cart&add=<?= $row[0]?>"><button>B E L I</button></a>
    </div>


            <?php
        }
    }

?>
<link rel="stylesheet" href="style.css">


</div>