<?php
include "config.php";

$_SESSION['username'] = '';
unset($_SESSION['username']);
session_unset();
session_destroy();
echo "<script>alert('Anda telah berhasil keluar.'); window.location = 'index.php';</script>";
?>
