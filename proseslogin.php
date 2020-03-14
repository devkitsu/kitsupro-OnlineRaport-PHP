<?php
include ("config.php");
date_default_timezone_set('Asia/Jakarta');

$username = mysqli_escape_string($con, $_POST['username']);
$password = mysqli_escape_string($con, md5($_POST['password']));

$sql = mysqli_query($con, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$row = mysqli_fetch_array ($sql);
if ($row!=null) {
    $_SESSION['id_user'] = $row['id_user'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['username'] = $username;
    $_SESSION['status'] = $row['status'];
    if ($row['status'] == "Admin"){
      header('location:on-admin/');
    }else {
      header('location:on-walimurid/');
    }
} else{
	$sql = mysqli_query($con, "SELECT * FROM guru WHERE nuptk='$username' AND password='$password'");
	$row = mysqli_fetch_array ($sql);
	if ($row!=null) {
      $_SESSION['nuptk'] = $row['nuptk'];
      $_SESSION['password'] = $row['password'];
      $_SESSION['nama'] = $row['nama'];
      $_SESSION['status'] = $row['status'];
    	header('location:on-walikelas/');
	} else {
		header('location:index.php?error');
	}
}
?>
