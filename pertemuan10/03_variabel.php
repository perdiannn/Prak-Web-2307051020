<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Variabel PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <main class="content">
        <h1>Variabel PHP</h1>

        <?php
            $nama = "Dedy";
            $umur = 23;
            $programStudi = "Manajemen Informatika";
        ?>

        <p>Nama: <?= $nama ?></p>
        <p>Umur: <?= $umur ?> tahun</p>
        <p>Program Studi: <?= $programStudi ?></p>

        <a class="back" href="index.php">Kembali ke Menu</a>
    </main>
</div>
</body>
</html>
