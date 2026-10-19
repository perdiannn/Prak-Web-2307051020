<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tipe Data PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <main class="content">
        <h1>Tipe Data dan Array</h1>

        <?php
            $nama = "Muhammad";
            $umur = 20;
            $nilai = 85.5;
            $aktif = true;
            $hobi = ["Membaca", "Coding", "Olahraga"];
        ?>

        <p>String: <?= $nama ?></p>
        <p>Integer: <?= $umur ?></p>
        <p>Float: <?= $nilai ?></p>
        <p>Boolean: <?= $aktif ? "True" : "False" ?></p>

        <p>Array hobi:</p>
        <ul>
            <?php foreach ($hobi as $item): ?>
                <li><?= htmlspecialchars($item) ?></li>
            <?php endforeach; ?>
        </ul>

        <a class="back" href="index.php">Kembali ke Menu</a>
    </main>
</div>
</body>
</html>
