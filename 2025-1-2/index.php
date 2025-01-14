<form action="" method="post">
 <input type="number" name="a" placeholder="Angka 1">
 <select name="operasi">
 <option value="tambah">+</option>
 <option value="kurang">-</option>
 <option value="kali">*</option>
 <option value="bagi">/</option>
 </select>
 <input type="number" name="b" placeholder="Angka 2">
 <button type="submit" name="hitung">Hitung</button>
</form>
<?php 
    function halo($nama, $kelas) {
        echo "Halo, Selamat Datang! $nama $kelas";
        echo "<br>";
    }
    halo("Darma", "XI RPL");
    halo("Rafi", "XII DKV");
    halo("Ryan", "XI MP");
    halo("Alibaba", "XI RPL");
    halo("John Pork", "XI RPL");

    // function tambah($a, $b) {
    //     return $a + $b;
    // }

    // $hasil = tambah(2, 2);
    // echo $hasil;

    function sapa($nama = "Darma") {
        echo "Halo, $nama";
        echo "<br>";
    }

    sapa();
    sapa("Budi");

    function faktorial($n) {
        if ($n = 0 || $n = 1) {
            return 1;
        } else {
            return $n * faktorial($n - 1);
        }
    }

    // echo faktorial(5);


    if (isset($_POST['hitung'])) {
        $a = $_POST['a'];
        $operasi = $_POST['operasi'];
        $b = $_POST['b'];
        echo kalkulator($operasi, $a, $b);
        echo "<br>";
    }

    function tambah($a, $b) {
        return $a + $b;
    }
       
    function kurang($a, $b) {
        return $a - $b;
    }
       
    function kali($a, $b) {
        return $a * $b;
    }
       
    function bagi($a, $b) {
        if ($b == 0) {
        return "Error: Pembagian dengan nol!";
        } else {
        return $a / $b;
        }
    }

    function kalkulator($operasi, $a, $b) {
        switch ($operasi) {
        case "tambah":
        return tambah($a, $b);
        case "kurang":
        return kurang($a, $b);
        case "kali":
        return kali($a, $b);
        case "bagi":
        return bagi($a, $b);
        default:
        return "Error: Operasi tidak valid!";
        }
    }

    // echo kalkulator("tambah", 5, 3); // Output: 8
    // echo "<br>";
    // echo kalkulator("kurang", 10, 4); // Output: 6
    // echo "<br>";
    // echo kalkulator("kali", 7, 2); // Output: 14
    // echo "<br>";
    // echo kalkulator("bagi", 9, 3); // Output: 3
?>