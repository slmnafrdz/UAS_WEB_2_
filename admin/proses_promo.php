<?php
include '../koneksi.php';

// Cek apakah parameter 'act' ada di URL
if (isset($_GET['act'])) {
    $act = $_GET['act'];

    // TAMBAH PROMO -
    if ($act == 'add_promo') {
        $label = mysqli_real_escape_string($conn, $_POST['label']);
        $judul = mysqli_real_escape_string($conn, $_POST['judul']);
        $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

        $query = "INSERT INTO promo (label, judul, deskripsi) VALUES ('$label', '$judul', '$deskripsi')";
        if (mysqli_query($conn, $query)) {
            header("Location: admin_dashboard.php?status=tambah_promo_berhasil");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    else if ($act == 'del_promo') {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];

            $query = "DELETE FROM promo WHERE id = $id";

            if (mysqli_query($conn, $query)) {
                header("Location: admin_dashboard.php?status=hapus_berhasil");
                exit();
            } else {
                echo "Gagal menghapus: " . mysqli_error($conn);
            }
        }
    }
}
