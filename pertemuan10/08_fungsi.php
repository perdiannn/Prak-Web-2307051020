<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Fungsi PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <main class="content">
        <h1>Fungsi PHP</h1>

        <?php
            function hitungLuas($panjang, $lebar) {
                return $panjang * $lebar;
            }

            $panjang = 10;
            $lebar = 5;
            $luas = hitungLuas($panjang, $lebar);
        ?>

        <p>Panjang: <?= $panjang ?> cm</p>
        <p>Lebar: <?= $lebar ?> cm</p>
        <p>Luas: <?= $luas ?> cm²</p>

        <a class="back" href="index.php">Kembali ke Menu</a>
    </main>
</div>
</body>
</html>
