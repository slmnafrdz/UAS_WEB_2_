<?php
session_start();
include '../koneksi.php'; // Sesuaikan arah file koneksi Anda

$user = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$user' AND password='$pass'");
$data = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) > 0) {
    // 1. Simpan data ke Session
    $_SESSION['login_user'] = $data['username'];
    $_SESSION['role']       = $data['role'];
    $_SESSION['nama']       = $data['nama'];
    $_SESSION['status'] = 'login';

    if ($data['role'] == 'admin') {
        echo "<script>alert('Selamat Datang Admin!'); window.location='../admin/admin_dashboard.php';</script>";
    } else {
        header("Location: ../Rexidonet.php");
    }
} else {
    echo "<script>alert('Username atau Password Salah!'); window.location='../login/login.php';</script>";
}
