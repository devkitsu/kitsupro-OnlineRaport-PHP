<?php

if(!isset($_SESSION['username'])){
	print "<script>alert('Silahkan login terlebih dahulu!');window.location = '$root';</script>";
}
if($_SESSION['status']!="Wali Murid"){
	session_destroy();
	session_unset();
	print "<script>alert('Maaf, hak akses ditolak! Silahkan login kembali.'); window.location = '$root';</script>";
}
?>
