<?php
session_start();

if (!isset($_SESSION['angka'])) {
    $_SESSION['angka'] = rand(1, 100);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tebakan = intval($_POST['tebakan']);
    if ($tebakan < $_SESSION['angka']) {
        $pesan = "Tebakan Anda terlalu rendah!";
    } elseif ($tebakan > $_SESSION['angka']) {
        $pesan = "Tebakan Anda terlalu tinggi!";
    } else {
        $pesan = "Selamat! Anda menebak dengan benar!";
        unset($_SESSION['angka']);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Game Tebak Angka</title>
</head>
<body>
    <h1>Game Tebak Angka</h1>
    <form method="post">
        <label for="tebakan">Masukkan tebakan Anda (1-100):</label>
        <input type="number" id="tebakan" name="tebakan" min="1" max="100" required>
        <button type="submit">Tebak</button>
    </form>
    <?php if (isset($pesan)) { echo "<p>$pesan</p>"; } ?>
</body>
</html>
