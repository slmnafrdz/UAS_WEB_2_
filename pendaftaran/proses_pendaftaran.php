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

    $nama          = mysqli_real_escape_string($conn, $_POST['nama']);
    $email         = mysqli_real_escape_string($conn, $_POST['email']);
    $whatsapp      = mysqli_real_escape_string($conn, $_POST['whatsapp']);
    $alamat        = mysqli_real_escape_string($conn, $_POST['alamat']);
    $kecamatan     = mysqli_real_escape_string($conn, $_POST['kecamatan']);
    $kelurahan     = mysqli_real_escape_string($conn, $_POST['kelurahan']);
    $paket         = mysqli_real_escape_string($conn, $_POST['paket']);
    $tipe_bangunan = mysqli_real_escape_string($conn, $_POST['tipe_bangunan']);

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
