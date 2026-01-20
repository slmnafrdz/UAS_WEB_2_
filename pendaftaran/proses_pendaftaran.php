<?php
include '../koneksi.php';

if (isset($_GET['act']) && $_GET['act'] == 'del_daftar') {
    $id = $_GET['id'];
    $sql = "DELETE FROM pendaftaran WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Data berhasil dihapus'); window.location.href='../admin/admin_dashboard.php';</script>";
    }
    exit; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama          = $_POST['nama'];
    $email         = $_POST['email'];
    $whatsapp      = $_POST['whatsapp'];
    $alamat        = $_POST['alamat'];
    $kecamatan     = $_POST['kecamatan'];
    $kelurahan     = $_POST['kelurahan'];
    $paket         = $_POST['paket'];
    $tipe_bangunan = $_POST['tipe_bangunan'];

    $sql = "INSERT INTO pendaftaran (nama, email, whatsapp, alamat, kecamatan, kelurahan, paket, tipe_bangunan) 
            VALUES ('$nama', '$email', '$whatsapp', '$alamat', '$kecamatan', '$kelurahan', '$paket', '$tipe_bangunan')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Pendaftaran Berhasil! Tim Rexindonet akan segera menghubungi Anda.');
                window.location.href='pendaftaran.php';
              </script>";  
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
