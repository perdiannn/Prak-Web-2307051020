<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit;
}
require_once 'koneksi.php';

$pesan = "";
$nama = "";
$npm = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['simpan'])) {
    $nama = trim($_POST['nama'] ?? '');
    $npm = trim($_POST['npm'] ?? '');

    if ($nama === '' || $npm === '') {
        $pesan = "Nama dan NPM wajib diisi.";
    } else {
        $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, npm) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $npm);

        if ($stmt->execute()) {
            $stmt->close();
            header("Location: index.php");
            exit;
        }

        $pesan = "Data gagal disimpan. Pastikan struktur tabel sesuai dan NPM tidak duplikat jika dibuat unik.";
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <p>Login sebagai: <?= htmlspecialchars($_SESSION['nama'] ?? 'Pengguna', ENT_QUOTES, 'UTF-8'); ?></p>

    <?php if ($pesan !== ''): ?>
        <p role="alert"><?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>

    <form method="POST" action="tambah.php">
        <label for="nama">Nama:</label><br>
        <input id="nama" type="text" name="nama" value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
        <label for="npm">NPM:</label><br>
        <input id="npm" type="text" name="npm" value="<?= htmlspecialchars($npm, ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
        <button type="submit" name="simpan">Simpan</button>
    </form>

    <br>
    <a href="index.php">Kembali ke Data Mahasiswa</a> |
    <a href="dashboard.php">Dashboard</a> |
    <a href="logout.php">Logout</a>
</body>
</html>
