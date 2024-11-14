<h1>Kereta</h1>
<?php

if (!isset($_SESSION['email'])) {

    header("location:index.php?menu=login");
}
if (!isset($_SESSION['cart'])) {
    echo "<h1>kereta kosong</h1>";
}
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    unset($_SESSION['cart'][$id]);
}
$isikeranjang = count($_SESSION['cart'])
if ($isikeranjang == 0) {
    header("location:index")
}
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    // echo $id;
    $sql = "SELECT * FROM produk WHERE id=$id";
    // echo $sql;
    $hasil = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_array($hasil);
    // echo $row[1];
    // echo $row[3];
    $jumlahbeli = 0;
    if (!isset($_SESSION['cart'][$id])) {
        $jumlahbeli = 1;
    } else {
        $jumlahbeli = +1;
    }
    $_SESSION['cart'][$id]=['produk' => $row[1],
                            'harga' => $row[3],
                            'id' => $row[0],
                            'jumlah' isset($_SESSION['cart'][$id]? $_SESSION['cart'][$id]['jumlah']+1 : 1)
                            
                        ];
}

?>
<div class="cart">
    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Hapus</th>
            </tr>
            <tbody>

                <?php
                $no = 1;
                foreach ($_SESSION['cart'] as $key) {
                    ?>
                    <tr>
                        <td><?= $no++?></td>
                        <td><?= $key['produk']?></td>
                        <td><?= $key['harga']?></td>
                        <td><?= $key['jumlah']?></td>
                        <td><a href="?menu=cart&hapus= <?=$key['id'] ?>">hapus</a></td>
                    </tr>
                    <?php
                }
                ?>

            </tbody>
        </thead>
    </table>
</div>