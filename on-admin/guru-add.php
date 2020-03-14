<?php
include "_header.php";

if (isset($_REQUEST['add'])){
  $nuptk = $_REQUEST['nuptk'];
  $nama_guru = $_REQUEST['nama'];
  $tmp_lahir = $_REQUEST['tmpt_lahir'];
  $tgl_lahir = $_REQUEST['tgl_lahir'];
  $jk = $_REQUEST['jk'];
  $agama = $_REQUEST['agama'];
  $alamat = $_REQUEST['alamat'];
  $telp_hp = $_REQUEST['telp_hp'];
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  $password = "#pustek".md5(substr($nuptk,13));

  if (($_REQUEST['jk'] == 'jk_none') || ($_REQUEST['status'] == 'status_none')){
    print "<script>alert('Silahkan pilih jenis kelamin dan status terlebih dahulu!');history.go(-1);</script>";
  }else{
    $newphoto = $foto;
    $path = "../img/img-guru/".$newphoto;

    if (move_uploaded_file($tmp, $path)){
      $sql = "INSERT INTO guru (nuptk, nama, alamat, jkel, tempat_lahir, tgl_lahir, tlp, agama, foto, password, status)
              VALUES ('$nuptk', '$nama_guru', '$alamat', '$jk', '$tmp_lahir', '$tgl_lahir', '$telp_hp', '$agama', '$newphoto', '$password','Guru')";
      $query = mysqli_query($con, $sql);
      if (mysqli_affected_rows($con)>0){
        print "<script>alert('Data guru berhasil ditambahkan!');window.location='guru.php';</script>";
      }else{
        print "<script>alert('Maaf, data guru gagal ditambahkan ke database!');</script>";
      }
    } else{
      print "<script>alert('GAGAL! Maaf foto guru gagal diupload. Silahkan ulangi kembali!');</script>";
    }
  }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="ion ion-android-person-add"></i> INPUT DATA GURU
      <small>SMK PUSTEK SERPONG</small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <a href="guru.php" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a> </h3>
                <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                 title="Collapse">
                 <i class="fa fa-minus"></i></button>
               </div>
             </div>

             <!-- /.box-header -->
             <div class="box-body">
              <br/>

              <form method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-sm-2 control-label">NUPTK</label>
                  <div class="col-sm-6">
                    <input name="nuptk" type="text" class="form-control" placeholder="NUPTK Guru" autofocus="on" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Guru</label>
                  <div class="col-sm-6">
                    <input onkeyup="this.value=this.value.toUpperCase()" name="nama" type="text" id="nama" class="form-control" placeholder="Nama Guru" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-6">
                    <input onkeyup="this.value=this.value.toUpperCase()" name="tmpt_lahir" type="text" class="form-control" placeholder="Tempat Lahir" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-6">
                    <input name="tgl_lahir" type="date" id="tgl_lahir" class="form-control" placeholder="Tanggal Lahir" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-6">
                    <select class="form-control" name="jk" id="jk">
                      <option value="jk_none">- Pilih Jenis Kelamin -</option>
                      <option value="L">LAKI-LAKI</option>
                      <option value="P">PEREMPUAN</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat Guru</label>
                  <div class="col-sm-6">
                    <input onkeyup="this.value=this.value.toUpperCase()" name="alamat" type="text" id="alamat" class="form-control" placeholder="Alamat Guru" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-6">
                    <input onkeyup="this.value=this.value.toUpperCase()" name="agama" type="text" id="agama" class="form-control" placeholder="Agama" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No. Telp/HP</label>
                  <div class="col-sm-6">
                    <input size="12" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" name="telp_hp" type="text" id="telp_hp" class="form-control" placeholder="No. Telp/HP Guru" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Foto Guru</label>
                  <div class="col-sm-6">
                    <input type="file" name="foto" class="form-control">
                  </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <input type="submit" value="SIMPAN" name="add" class="btn btn-md btn-primary flat" />
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
    include "_footer.php"
    ?>
