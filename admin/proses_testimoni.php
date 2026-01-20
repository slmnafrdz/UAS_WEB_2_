<?php
include '../koneksi.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    // LOGIKA TAMBAH TESTIMONI 
    if ($act == 'add_testimoni') {
        $nama      = mysqli_real_escape_string($conn, $_POST['nama']);
        $pekerjaan = mysqli_real_escape_string($conn, $_POST['pekerjaan']);
        $pesan     = mysqli_real_escape_string($conn, $_POST['pesan']);
        $bintang   = (int)$_POST['bintang'];

        $query = "INSERT INTO testimoni (nama, pekerjaan, pesan, bintang) VALUES ('$nama', '$pekerjaan', '$pesan', '$bintang')";

        if (mysqli_query($conn, $query)) {
            header("Location: admin_dashboard.php?status=tambah_testi_berhasil");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    //LOGIKA HAPUS TESTIMONI 
    else if ($act == 'del_testi') {
        if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $query = "DELETE FROM testimoni WHERE id = $id";
            if (mysqli_query($conn, $query)) {
                header("Location: admin_dashboard.php?status=hapus_testi_berhasil");
                exit();
            } else {
                echo "Gagal menghapus: " . mysqli_error($conn);
            }
        }
    }
}
