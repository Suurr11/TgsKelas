<form action="" method="get">
    <input type="number" name="angka" placeholder="angka">
    <input type="number" name="angka2" placeholder="angka2">
    <input type="submit" name="tambah" value="tambah">
    <input type="submit" name="kali" value="kali">
    <input type="submit" name="kurang" value="kurang">
    <input type="submit" name="bagi" value="bagi">
</form> 

<?php

if (isset($_GET['tambah'])) {
    $angka = $_GET ["angka"];
    $angka2 = $_GET ["angka2"];
    $hasil = $angka + $angka2;
    echo $hasil;
}
if (isset($_GET['kali'])) {
    $angka = $_GET ["angka"];
    $angka2 = $_GET ["angka2"];
    $hasil = $angka * $angka2;
    echo $hasil;
}
if (isset($_GET['kurang'])) {
    $angka = $_GET ["angka"];
    $angka2 = $_GET ["angka2"];
    $hasil = $angka - $angka2;
    echo $hasil;
}
if (isset($_GET['bagi'])) {
    $angka = $_GET ["angka"];
    $angka2 = $_GET ["angka2"];
    $hasil = $angka / $angka2;
    echo $hasil;
}

?>