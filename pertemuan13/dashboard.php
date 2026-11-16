<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>
    <p>Selamat datang, <?= htmlspecialchars($_SESSION['nama'] ?? 'Pengguna', ENT_QUOTES, 'UTF-8'); ?>!</p>

    <h3>Menu</h3>
    <ul>
        <li><a href="index.php">Kelola Data Mahasiswa</a></li>
        <li><a href="tambah.php">Tambah Mahasiswa</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
