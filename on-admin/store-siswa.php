<?php
include "../config.php";
include "_privileges.php";

// ambil data dari form
$nisn = htmlspecialchars($_POST['nisn']);
$nm_siswa = htmlspecialchars($_POST['nm_siswa']);
$jkel = htmlspecialchars($_POST['jkel']);
$wali = htmlspecialchars($_POST['wali']);
$tmpt_lahir = htmlspecialchars($_POST['tmpt_lahir']);
$tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
$agama = htmlspecialchars($_POST['agama']);
$alamat = htmlspecialchars($_POST['alamat']);
$sekolah_asal = htmlspecialchars($_POST['sekolah_asal']);
$almt_sklh_asal = htmlspecialchars($_POST['almt_sklh_asal']);
$no_ijazah = htmlspecialchars($_POST['no_ijazah']);
$thn_ijazah = htmlspecialchars($_POST['thn_ijazah']);
$kelas_diterima = htmlspecialchars($_POST['kelas']);
$tgl_diterima = htmlspecialchars($_POST['tgl_diterima']);
$jurusan = htmlspecialchars($_POST['jurusan']);

$uploaddir = '../on-walimurid/foto-siswa/';
$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$uploadfile = $uploaddir . $fileName;
if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
{
	    $sql= "INSERT INTO siswa (nisn, id_wali, nm_siswa, jkel, tmpt_lahir, tgl_lahir, agama, alamat, sekolah_asal,
				almt_sklh_asal, thn_ijazah, no_ijazah, kelas_diterima, tgl_diterima, jurusan, foto)
	            VALUES ('$nisn', '$wali', '$nm_siswa', '$jkel', '$tmpt_lahir', '$tgl_lahir', '$agama', '$alamat'
				, '$sekolah_asal', '$almt_sklh_asal', '$thn_ijazah', '$no_ijazah', '$kelas_diterima', '$tgl_diterima'
				, '$jurusan', '$fileName')";
	    $hasil = mysqli_query($con, $sql) or die ("SQL Error".mysqli_error($con));
	    if($hasil==true){
	        echo "<script>window.alert('Tambah data berhasil'); window.location.href='siswa.php'</script>";
	    }else{
	        echo "<script>window.alert('Tambah data gagal!'); window.location.href='siswa-add.php'</script>";
	    }
}else{
	echo "<script>window.alert('Foto gagal diupload!'); window.location.href='siswa-add.php'</script>";
}
?>
