<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Integrasi HTML dan PHP</title>
</head>
<body>
    <div class="container">
        <main class="content">
            <h1>Data Mahasiswa</h1>

            <?php
            $nama = "Ferdi";
            $npm = 2307051020;
            $jurusan = "Manajemen Informatika";
            ?>

            <p>Nama: <?php echo $nama; ?></p>
            <p>NPM: <?php echo $npm; ?></p>
            <p>Jurusan: <?php echo $jurusan; ?></p>

            <a class="back" href="index.php">Kembali ke Menu</a>
        </main>
    </div>
</body>
</html>