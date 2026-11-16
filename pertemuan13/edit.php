<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit;
}
require_once 'koneksi.php';

if (!isset($_GET['id']) || !ctype_digit((string)$_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int)$_GET['id'];
$pesan = "";

$stmt = $conn->prepare("SELECT nama, npm FROM mahasiswa WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($nama, $npm);
$ada = $stmt->fetch();
$stmt->close();

if (!$ada) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $namaBaru = trim($_POST['nama'] ?? '');
    $npmBaru = trim($_POST['npm'] ?? '');

    if ($namaBaru === '' || $npmBaru === '') {
        $pesan = "Nama dan NPM wajib diisi.";
        $nama = $namaBaru;
        $npm = $npmBaru;
    } else {
        $update = $conn->prepare("UPDATE mahasiswa SET nama = ?, npm = ? WHERE id = ?");
        $update->bind_param("ssi", $namaBaru, $npmBaru, $id);

        if ($update->execute()) {
            $update->close();
            header("Location: index.php");
            exit;
        }

        $pesan = "Data gagal diperbarui. Pastikan struktur tabel sesuai dan NPM tidak duplikat jika dibuat unik.";
        $update->close();
        $nama = $namaBaru;
        $npm = $npmBaru;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h2>Edit Data Mahasiswa</h2>
    <p>Login sebagai: <?= htmlspecialchars($_SESSION['nama'] ?? 'Pengguna', ENT_QUOTES, 'UTF-8'); ?></p>

    <?php if ($pesan !== ''): ?>
        <p role="alert"><?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>

    <form method="POST" action="edit.php?id=<?= $id; ?>">
        <label for="nama">Nama:</label><br>
        <input id="nama" type="text" name="nama" value="<?= htmlspecialchars($nama, ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
        <label for="npm">NPM:</label><br>
        <input id="npm" type="text" name="npm" value="<?= htmlspecialchars($npm, ENT_QUOTES, 'UTF-8'); ?>" required><br><br>
        <button type="submit" name="update">Update</button>
    </form>

    <br>
    <a href="index.php">Kembali ke Data Mahasiswa</a> |
    <a href="dashboard.php">Dashboard</a> |
    <a href="logout.php">Logout</a>
</body>
</html>
