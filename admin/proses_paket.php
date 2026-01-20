<?php
include '../koneksi.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    // --- LOGIKA PAKET WIFI ---
    if ($act == 'add_paket') {
        $nama_paket = mysqli_real_escape_string($conn, $_POST['nama_paket']);
        $kecepatan  = (int)$_POST['kecepatan'];
        $harga      = (int)$_POST['harga'];
        $deskripsi  = mysqli_real_escape_string($conn, $_POST['deskripsi']);

        $query = "INSERT INTO paket (nama_paket, kecepatan, harga, deskripsi) VALUES ('$nama_paket', '$kecepatan', '$harga', '$deskripsi')";
        mysqli_query($conn, $query);
        header("Location: admin_dashboard.php?status=paket_berhasil");
        exit();
    } else if ($act == 'del_paket') {
        $id = (int)$_GET['id'];
        mysqli_query($conn, "DELETE FROM paket WHERE id = $id");
        header("Location: admin_dashboard.php?status=hapus_paket_berhasil");
        exit();
    }
}
