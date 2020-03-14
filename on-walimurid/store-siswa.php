<?php
include "../config.php";
include "_privileges.php";

$sql="SELECT user.id_user, wali_murid.id_wali FROM  user, wali_murid
	WHERE user.username='" . $_SESSION['username'] . "'";
$qry = mysqli_query($con, $sql)  or die ("SQL Error".mysqli_error($con));
$data=mysqli_fetch_array($qry);

$id = $data['id_user'];
$id_wali = $data['id_wali'];
// ambil data dari form
$nisn = htmlspecialchars($_POST['nisn']);
$nm_siswa = htmlspecialchars($_POST['nm_siswa']);
$jkel = htmlspecialchars($_POST['jkel']);
$tmpt_lahir = htmlspecialchars($_POST['tmpt_lahir']);
$tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
$agama = htmlspecialchars($_POST['agama']);
$alamat = htmlspecialchars($_POST['alamat']);
$sekolah_asal = htmlspecialchars($_POST['sekolah_asal']);
$almt_sklh_asal = htmlspecialchars($_POST['almt_sklh_asal']);
$no_ijazah = htmlspecialchars($_POST['no_ijazah']);
$thn_ijazah = htmlspecialchars($_POST['thn_ijazah']);
$kelas_diterima = htmlspecialchars($_POST['kelas_diterima']);
$tgl_diterima = htmlspecialchars($_POST['tgl_diterima']);
$jurusan = htmlspecialchars($_POST['jurusan']);

	    $sql= "UPDATE siswa SET nm_siswa='$nm_siswa', jkel='$jkel', tmpt_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir',
	                agama='$agama', alamat='$alamat', sekolah_asal='$sekolah_asal', almt_sklh_asal='$almt_sklh_asal',
					thn_ijazah='$thn_ijazah', no_ijazah='$no_ijazah', kelas_diterima='$kelas_diterima', tgl_diterima='$tgl_diterima',
					jurusan='$jurusan' WHERE nisn='$nisn'";
	    $hasil = mysqli_query($con, $sql);
	    if($hasil==true){
	        echo "<script>window.alert('Update data berhasil'); window.location.href='profile.php'</script>";
	    }else{
	        echo "<script>window.alert('Update data gagal!'); window.location.href='profile-siswa-ubah.php'</script>";
	        echo mysqli_error($con);
	    }
?>
