<?php
session_start();
if (($_SESSION['role'] == 'pelanggan')) {
    header("Location: ../Rexidonet.php");
    exit();
}
