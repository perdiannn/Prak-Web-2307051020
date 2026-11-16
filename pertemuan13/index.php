<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: auth.php");
    exit;
}
require_once 'koneksi.php';

$query = "SELECT id, nama, npm FROM mahasiswa ORDER BY id DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <p>Login sebagai: <?= htmlspecialchars($_SESSION['nama'] ?? 'Pengguna', ENT_QUOTES, 'UTF-8'); ?></p>

    <a href="dashboard.php">Dashboard</a> |
    <a href="tambah.php">Tambah Mahasiswa</a> |
    <a href="logout.php">Logout</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr><th>No</th><th>Nama</th><th>NPM</th><th>Aksi</th></tr>
        </thead>
        <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php $no = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($row['npm'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="edit.php?id=<?= (int)$row['id']; ?>">Edit</a></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="4">Belum ada data mahasiswa.</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
