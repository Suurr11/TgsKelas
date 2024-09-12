<form action="" method="post">
    <input type="number" name="bulan" placeholder="masukkan bln">
    <input type="number" name="tanggal" placeholder="masukkan tgl">
    <input type="submit" value="kirem" name="tombol">
</form>

<?php

if (isset ($_POST["tombol"])) {
    $bulan = $_POST ["bulan"];
    $tanggal = $_POST ["tanggal"];

    echo $bulan;

    $ket = "SALAH";
    if ($bulan > 0 && $bulan < 13 && $tanggal > 0 && $tanggal < 32) {
        // $ket = "Benar anjg";
        if ($bulan == 1 ) {
            if ($tanggal > 0 && $tanggal < 20) {
                $ket = "akuarius";
            }
        }
        if ($tanggal > 19 && $tanggal < 32) {
            $ket = "Jawarius";
        }
    }
    echo $ket;

}


?>








<form method="post" action="">
        <input type="number" name="num1" placeholder="Angka Pertama" required>
        <select name="operation">
            <option value="add">Tambah (+)</option>
            <option value="subtract">Kurang (-)</option>
            <option value="multiply">Kali (*)</option>
            <option value="divide">Bagi (/)</option>
        </select>
        <input type="number" name="num2" placeholder="Angka Kedua" required>
        <button type="submit" name="calculate">Hitung</button>
    </form>

    <?php
    if (isset($_POST['calculate'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];
        $result = 0;

        switch ($operation) {
            case 'add':
                $result = $num1 + $num2;
                break;
            case 'subtract':
                $result = $num1 - $num2;
                break;
            case 'multiply':
                $result = $num1 * $num2;
                break;
            case 'divide':
                if ($num2 != 0) {
                    $result = $num1 / $num2;
                } else {
                    echo "Tidak bisa membagi dengan nol!";
                    exit;
                }
                break;
        }

        echo "<h3>Hasil: $result</h3>";
    }
    ?>
</body>
</html>
