<?php

for ($i=1; $i <= 10; $i++) { 
    echo $i;
}
echo "<br>";
for ($i=10; $i > 0; $i--) { 
    echo $i;
}
echo"<br>";

$ganjel = 7%2;
echo $ganjel;

echo "<br>";
for ($i=1; $i < 100; $i++) { 
    $ganjel = $i %2;
    // echo $ganjel;

    if ($ganjel == 0) {
        echo $i;
    }
}
// --------------------IF-------------------------------
echo "<br>";
$kkm = 80;
$nilai = 75;
if ($nilai > $kkm) {
    echo "lulos";
} else {
    echo "gak lolos";
}

echo "<br>";
$status = "tidak lulos";

if ($nilai > $kkm) {
    $status = "lulos";
    
} 
echo $status;
echo "<br>";

$rapot = 0;
$tugas = 0;
if ($tugas == 1) {
    $rapot = 80;
}
echo $rapot;
echo "<br>";


$bulan = 10;
$tgl = 11;
$ket = "salah";
if ($bulan > 0 && $bulan < 13) {
    // $ket = "benar";

if ($tgl > 0 && $tgl < 32) {
    // $ket = "benar";
    
    if ($bulan = 1 && $tgl > 0 && $tgl < 20) {
        $ket = "aquarius";
    }

    if ($bulan = 1 && $tgl > 19 && $tgl < 32) {
        $ket = "capricorn";
    }
    if ($bulan = 2 && $tgl > 0 && $tgl < 20) {
        $ket = "Libra";
    }
    if ($bulan = 2 && $tgl > 19 && $tgl < 29) {
        $ket = "aries";
    }
    if ($bulan = 3 && $tgl > 0 && $tgl < 20) {
        $ket = "Taurus";
    }
    if ($bulan = 3 && $tgl > 19 && $tgl < 32) {
        $ket = "Leo";
    }
    if ($bulan = 4 && $tgl > 0 && $tgl < 20) {
        $ket = "Sagittarius";
    }
    if ($bulan = 4 && $tgl > 19 && $tgl < 32) {
        $ket = "Gemini";
    }
    if ($bulan = 5 && $tgl > 0 && $tgl < 20) {
        $ket = "Virgo";
    }
    if ($bulan = 5 && $tgl > 19 && $tgl < 32) {
        $ket = "Scorpio";
    }
    if ($bulan = 6 && $tgl > 0 && $tgl < 20) {
        $ket = "Niggarius";
    }
    if ($bulan = 6 && $tgl > 19 && $tgl < 32) {
        $ket = "Rayrus";
    }
    if ($bulan = 7 && $tgl > 0 && $tgl < 20) {
        $ket = "Rafus";
    }
    if ($bulan = 7 && $tgl > 19 && $tgl < 32) {
        $ket = "Barus";
    }
    if ($bulan = 8 && $tgl > 0 && $tgl < 20) {
        $ket = "Darus";
    }
    if ($bulan = 8 && $tgl > 19 && $tgl < 32) {
        $ket = "Surus";
    }
    if ($bulan = 9 && $tgl > 0 && $tgl < 20) {
        $ket = "Fayrus";
    }
    if ($bulan = 9 && $tgl > 19 && $tgl < 32) {
        $ket = "Kayrus";
    }
    if ($bulan = 10 && $tgl > 0 && $tgl < 20) {
        $ket = "Kontrus";
    }
    if ($bulan = 10 && $tgl > 19 && $tgl < 32) {
        $ket = "Wolfus";
    }
    if ($bulan = 11 && $tgl > 0 && $tgl < 20) {
        $ket = "Rayrus";
    }
    if ($bulan = 11 && $tgl > 19 && $tgl < 32) {
        $ket = "Skibidius";
    }
    if ($bulan = 12 && $tgl > 0 && $tgl < 20) {
        $ket = "Raurus";
    }
    if ($bulan = 12 && $tgl > 19 && $tgl < 32) {
        $ket = "Paus";
    }
    
    
    }
}
echo $ket;

echo "<br>";
?>