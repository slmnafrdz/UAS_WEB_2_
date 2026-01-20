<?php
session_start();
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $user     = mysqli_real_escape_string($conn, $_POST['username']);
    $pass     = mysqli_real_escape_string($conn, $_POST['password']);
    $role     = 'pelanggan';

    $cek_user  = "SELECT username FROM tbl_user WHERE username='$user'";
    $hasil_cek = mysqli_query($conn, $cek_user);

    if (mysqli_num_rows($hasil_cek) > 0) {
        echo "<script>alert('Username sudah terdaftar! Gunakan username lain.'); window.location='register.php';</script>";
    } else {
        $sql = "INSERT INTO tbl_user (nama, username, password, role) 
                VALUES ('$nama', '$user', '$pass', '$role')";

        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Pendaftaran Berhasil! Silakan Login'); window.location='../login/login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
