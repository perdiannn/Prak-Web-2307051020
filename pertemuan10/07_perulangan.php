<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Perulangan PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <main class="content">
        <h1>Perulangan PHP</h1>

        <p>Menampilkan angka 1 sampai 7:</p>

        <ul>
            <?php
                for ($i = 1; $i <= 7; $i++) {
                    echo "<li>Angka $i</li>";
                }
            ?>
        </ul>

        <a class="back" href="index.php">Kembali ke Menu</a>
    </main>
</div>
</body>
</html>
