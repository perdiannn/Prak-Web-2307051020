<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "praktikum_login";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    // Hindari menampilkan detail internal koneksi kepada pengguna.
    error_log("Koneksi database gagal: " . $conn->connect_error);
    die("Koneksi database gagal. Periksa konfigurasi koneksi.php dan database.");
}

$conn->set_charset("utf8mb4");
?>
