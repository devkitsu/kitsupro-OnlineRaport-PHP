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
$nm_ayah = htmlspecialchars($_POST['nm_ayah']);
$nm_ibu = htmlspecialchars($_POST['nm_ibu']);
$alamat = htmlspecialchars($_POST['alamat']);
$tlp = htmlspecialchars($_POST['tlp']);
$kerja_ayah = htmlspecialchars($_POST['kerja_ayah']);
$kerja_ibu = htmlspecialchars($_POST['kerja_ibu']);

$sql="SELECT * FROM  wali_murid where id_user='$id' AND id_wali='$id_wali'";
$qry = mysqli_query($con, $sql)  or die ("SQL Error".mysqli_error($con));
if (mysqli_num_rows($qry) == 0) {
    $sql= "INSERT INTO wali_murid (id_user, nm_ayah, nm_ibu, almt_ortu, tlp_ortu, kerja_ayah, kerja_ibu)
            VALUES ('$id', '$nm_ayah', '$nm_ibu', '$alamat', '$tlp', '$kerja_ayah', '$kerja_ibu')";
    $hasil = mysqli_query($con, $sql);
    if($hasil==true){
        echo "<script>window.alert('Tambah data berhasil'); window.location.href='profile.php'</script>";
    }else{
        echo "<script>window.alert('Tambah data gagal!'); window.location.href='profile-ortu-ubah.php'</script>";
        echo mysqli_error($con);
    }
} else{
    $sql= "UPDATE wali_murid SET nm_ayah='$nm_ayah', nm_ibu='$nm_ibu', almt_ortu='$alamat', tlp_ortu='$tlp',
                                kerja_ayah='$kerja_ayah', kerja_ibu='$kerja_ibu' WHERE id_wali='$id_wali'";
    $hasil = mysqli_query($con, $sql);
    if($hasil==true){
        echo "<script>window.alert('Update data berhasil'); window.location.href='profile.php'</script>";
    }else{
        echo "<script>window.alert('Update data gagal!'); window.location.href='profile-ortu-ubah.php'</script>";
        echo mysqli_error($con);
    }
}
?>
