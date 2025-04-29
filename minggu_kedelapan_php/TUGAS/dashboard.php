<?php
require 'functions.php';
cekLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Selamat datang, <?= $_SESSION['username'] ?>!</h1>
        <a href="logout.php" class="btn logout">Logout</a>
        
        <h2>Form Input Data</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="umur">Umur:</label>
                <input type="number" id="umur" name="umur" required>
            </div>
            <button type="submit" class="btn">Cek Usia</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = htmlspecialchars($_POST['nama']);
            $umur = (int)$_POST['umur'];
            $status = cekUsia($umur);
            
            echo "<div class='result'>";
            echo "<p>Nama: $nama</p>";
            echo "<p>Umur: $umur tahun</p>";
            echo "<p>Status: $status</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>