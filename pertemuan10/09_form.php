<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form dan PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <main class="content">
        <h1>Integrasi Form dengan PHP</h1>

        <form method="POST" action="">
            <label for="nama">Masukkan nama:</label>
            <input type="text" id="nama" name="nama" required>
            <button type="submit">Kirim</button>
        </form>

        <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $nama = trim($_POST["nama"] ?? "");

                if ($nama !== "") {
                    echo "<p>Halo, "
                        . htmlspecialchars($nama, ENT_QUOTES, "UTF-8")
                        . "! Selamat Datang.</p>";
                }
            }
        ?>

        <a class="back" href="index.php">Kembali ke Menu</a>
    </main>
</div>
</body>
</html>
