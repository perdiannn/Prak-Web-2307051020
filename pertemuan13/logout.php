<?php
session_start();

// Kosongkan data sesi.
$_SESSION = [];

// Hapus cookie sesi jika cookie digunakan.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

session_destroy();
header("Location: auth.php");
exit;
?>
