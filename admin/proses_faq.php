<?php
include '../koneksi.php';

if (isset($_GET['act'])) {
    $act = $_GET['act'];

    if ($act == 'add_faq') {
        $pertanyaan = mysqli_real_escape_string($conn, $_POST['pertanyaan']);
        $jawaban = mysqli_real_escape_string($conn, $_POST['jawaban']);

        $query = "INSERT INTO faq (pertanyaan, jawaban) VALUES ('$pertanyaan', '$jawaban')";
        mysqli_query($conn, $query);
        header("Location: admin_dashboard.php#section-faq");
    } else if ($act == 'del_faq') {
        $id = (int)$_GET['id'];
        mysqli_query($conn, "DELETE FROM faq WHERE id = $id");
        header("Location: admin_dashboard.php#section-faq");
    }
}
