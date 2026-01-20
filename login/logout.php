<?php
session_start();
unset($_SESSION['admin']);
session_destroy();
echo "anda telah logout";
header('location: ../Rexidonet.php');
