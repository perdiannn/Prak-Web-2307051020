<?php
session_start();
require_once 'koneksi.php';

$pesan = "";

// Jika sudah login, langsung ke dashboard.
if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $nama = trim($_POST['nama'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nama === '' || $password === '') {
        $pesan = "Nama pengguna dan password wajib diisi.";
    } elseif (strlen($password) < 6) {
        $pesan = "Password minimal 6 karakter.";
    } else {
        $stmt = $conn->prepare("SELECT id FROM users WHERE nama = ?");
        $stmt->bind_param("s", $nama);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $pesan = "Nama pengguna sudah terdaftar.";
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $insert = $conn->prepare("INSERT INTO users (nama, password) VALUES (?, ?)");
            $insert->bind_param("ss", $nama, $hash);

            if ($insert->execute()) {
                $pesan = "Registrasi berhasil. Silakan login menggunakan akun tersebut.";
            } else {
                $pesan = "Registrasi gagal. Periksa struktur tabel users.";
            }
            $insert->close();
        }
        $stmt->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $nama = trim($_POST['nama'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($nama === '' || $password === '') {
        $pesan = "Nama pengguna dan password wajib diisi.";
    } else {
        $stmt = $conn->prepare("SELECT id, nama, password FROM users WHERE nama = ?");
        $stmt->bind_param("s", $nama);
        $stmt->execute();
        $stmt->bind_result($userId, $namaDatabase, $hashPassword);

        if ($stmt->fetch() && password_verify($password, $hashPassword)) {
            $stmt->close();

            session_regenerate_id(true);
            $_SESSION['user_id'] = $userId;
            $_SESSION['nama'] = $namaDatabase;

            header("Location: dashboard.php");
            exit;
        } else {
            $pesan = "Login gagal. Nama pengguna atau password tidak sesuai.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login dan Registrasi</title>
</head>
<body>
    <h2>Login dan Registrasi</h2>

    <?php if ($pesan !== ''): ?>
        <p role="status"><?= htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8'); ?></p>
    <?php endif; ?>

    <h3>Login</h3>
    <form method="POST" action="auth.php">
        <label for="login_nama">Nama pengguna:</label><br>
        <input id="login_nama" type="text" name="nama" autocomplete="username" required><br><br>
        <label for="login_password">Password:</label><br>
        <input id="login_password" type="password" name="password" autocomplete="current-password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>

    <hr>

    <h3>Registrasi</h3>
    <form method="POST" action="auth.php">
        <label for="register_nama">Nama pengguna:</label><br>
        <input id="register_nama" type="text" name="nama" autocomplete="username" required><br><br>
        <label for="register_password">Password (minimal 6 karakter):</label><br>
        <input id="register_password" type="password" name="password" minlength="6" autocomplete="new-password" required><br><br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>
