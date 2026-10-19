<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Operator PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <main class="content">
        <h1>Operator PHP</h1>

        <?php
            $a = 10;
            $b = 3;
        ?>

        <p>Nilai A: <?= $a ?></p>
        <p>Nilai B: <?= $b ?></p>
        <p>Penjumlahan: <?= $a + $b ?></p>
        <p>Pengurangan: <?= $a - $b ?></p>
        <p>Perkalian: <?= $a * $b ?></p>
        <p>Pembagian: <?= $a / $b ?></p>
        <p>Sisa bagi: <?= $a % $b ?></p>

        <a class="back" href="index.php">Kembali ke Menu</a>
    </main>
</div>
</body>
</html>
