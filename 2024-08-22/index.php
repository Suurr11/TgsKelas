<?php
require_once("content.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SURYAUUU</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
    <h1>header</h1>
    <li><a href="?">home</a></li>
    <?php
    foreach ($pages as $key => $value) {
    ?>
        <li><a href="?page=<?= $value ;?>"><?= $key ?></a></li>
    <?php
    }
    ?>
    </div>

    <div class="content">
    <h1>konten</h1>

    <?php
    
    //echo $page;
    if (isset($_GET["page"])){
        $page = $_GET["page"];
        if ($page == "contact") {
        
            require_once("pages/contact.php");
        }
        if ($page == "jurusan") {
            require_once("pages/jurusan.php");
        }
        if ($page == "sejarah") {
            require_once("pages/sejarah.php");
        }
        if ($page == "prestasi") {
            require_once("pages/prestasi.php");
        }
    } else {
        echo "<h2>Home </h2>";
    }
    
    ?>
    </div>

    <div class="footer">
    <h1>footer</h1>
    </div>
    
    
    <?php
    foreach ($gambars as $key) {
    ?>
    <img src="images/<?= $key ?>" alt="" srcset="">
    <?php
    }
    ?>
    
</body>
</html>