<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login') {
    // Jika tidak ada session login, arahkan kembali ke halaman login
    header("Location: ../login/login.php?pesan=belum_login");
    exit();
}
