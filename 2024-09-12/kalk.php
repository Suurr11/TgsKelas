
<form action="" method="post">
<input type="number" name="angka" placeholder="angka 1" required>
<input type="number" name="angka2" placeholder="angka 2" required>
<select name="operasi">
            <option value="add">Tambah (+)</option>
            <option value="subtract">Kurang (-)</option>
            <option value="multiply">Kali (*)</option>
            <option value="divide">Bagi (/)</option>
        </select>
<button type="submit" name="hasil">hasil</button> 
</form>


<?php

if (isset($_POST["hasil"])) {
    $angka = $_POST ["angka"];
    $angka2 = $_POST ["angka2"];
    $operasi = $_POST ["operasi"];
}



if ($operasi == "tambah") {
    $hasil = $angka1 + $angka2;
} elseif ($operasi == "kurang") {
    $hasil = $angka1 - $angka2;
} elseif ($operasi == "kali") {
    $hasil = $angka1 * $angka2;
} elseif ($operasi == "bagi") {
    if ($angka2 != 0) {
        $hasil = $angka1 / $angka2;
    } else {
        $hasil = "Tidak bisa membagi dengan nol!";
    }
}

echo "<h2>Hasil: $hasil</h2>";

?>
    