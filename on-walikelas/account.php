<?php
include "_header.php";

if (isset($_REQUEST['simpan'])){
  $nuptk = $_REQUEST['nuptk'];
  $nama = $_REQUEST['nama'];
  $alamat= $_REQUEST['alamat'];

  if ($_REQUEST['nama'] == 'none'){
    print "<script>alert('Pastikan Anda telah melengkapi semua form!');history.go(-1);</script>";
  }else{
    $sql = "UPDATE guru SET nama='$nama', alamat='$alamat' WHERE nuptk='$nuptk'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Profil BERHASIL diperbarui!');window.location='account.php';</script>";
    }else{
      print "<script>alert('Profil GAGAL diperbarui. Silahkan ulangi kembali!');history.go(-1);</script>";
    }//if affected
  }//if k1
} else if (isset($_REQUEST['simpan-pass'])){
  $nuptk = $_REQUEST['nuptk'];
  $pass = md5($_REQUEST['pass']);

  if ($_REQUEST['pass'] == 'none'){
    print "<script>alert('Pastikan Anda telah melengkapi semua form!');history.go(-1);</script>";
  }else{
    $sql = "UPDATE guru SET password='$pass' WHERE nuptk='$nuptk'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Password BERHASIL diperbarui!');window.location='account.php';</script>";
    }else{
      print "<script>alert('Password GAGAL diperbarui. Silahkan ulangi kembali!');history.go(-1);</script>";
    }//if affected
  }//if k1
}// if isset
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

 <!-- Main content -->
 <section class="content">
  <div class="row">
   <div class="col-xs-12">
    <div class="box">
     <div class="box-header">
      <h3 class="box-title"><i class="ion ion-person"></i> Akun Saya</h3>

      <div class="box-tools pull-right">
       <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
     </div>

     <!-- /.box-header -->
     <div class="box-body">
      <form method="POST" class="form-horizontal">
          <?php
          $sql = "SELECT * FROM guru, wali_kelas WHERE guru.nuptk=wali_kelas.nuptk AND guru.nama='$username'";
          $query = mysqli_query($con, $sql);
          $data = mysqli_fetch_array($query);
          ?>
       <div class="form-group">
        <label class="col-sm-2 control-label">NUPTK</label>
        <div class="col-sm-4">
         <input name="nuptk" type="text" id="nip_nik" class="form-control" placeholder="NIP / NIK" autofocus="on" value="<?php print $data['nuptk']?>" readonly>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Nama Lengkap</label>
        <div class="col-sm-4">
         <input name="nama" type="text" id="nama" class="form-control" placeholder="Nama Lengkap" autofocus="on" value="<?php print $data['nama']?>"required="required">
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-4">
         <input name="status" type="text" id="status" class="form-control" placeholder="Status" autofocus="on" value="<?php print $data['status']?>" readonly>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-4">
         <input name="alamat" type="text" id="nama" class="form-control" placeholder="Nama Lengkap" autofocus="on" value="<?php print $data['alamat']?>"required="required">
        </div>
       </div>
       <div class="form-group" style="margin-bottom: 20px;">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4">
         <input type="submit" name="simpan" value="SIMPAN DATA" class="btn btn-md btn-primary" />
        </div></div>
       <div class="form-group">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4">
         <label class="label label-success">DETAIL LOGIN</label>
        </div>
       </div>

       <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-4">
         <input name="pass" type="password" id="pass" class="form-control" placeholder="Password" autofocus="on" value="<?php print $data['password']?>" required="required">
        </div>
       </div>

       <div class="form-group" style="margin-bottom: 20px;">
        <label class="col-sm-2 control-label"></label>
        <div class="col-sm-4">
         <input type="submit" name="simpan-pass" value="UPDATE PASSWORD" class="btn btn-md btn-primary" />
        </div></div>
       </form>
      </div>
      <!-- /.box-body -->
     </div>
     <!-- /.box -->
    </div>
    <!-- /.col -->
   </div>
   <!-- /.row -->
  </section>
  <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <?php
 include "_footer.php";
 ?>
