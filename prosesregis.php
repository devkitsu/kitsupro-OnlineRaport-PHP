<?php
include ("config.php");
date_default_timezone_set('Asia/Jakarta');

$username = mysqli_escape_string($con, $_POST['username']);
$password = md5($_POST['password']);
$status = mysqli_escape_string($con, $_POST['status']);

$sql = "INSERT INTO user (username, password, status) VALUES ('$username','$password','$status')";
$hasil = mysqli_query($con, $sql);
if ($hasil == true) {
	echo "<script>window.alert('Daftar akun berhasil'); window.location.href='index.php'</script>";
} else {
	echo "<script>window.alert('Daftar akun gagal!'); window.history.back()'</script>";
	echo mysqli_error($con);
}
?>
