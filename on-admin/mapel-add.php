<?php
include "_header.php";

if (isset($_REQUEST['add'])){
  $kd_mapel = $_REQUEST['kd_mapel'];
  $nm_mapel = $_REQUEST['nm_mapel'];
  $kelas = $_REQUEST['kelas'];

  if (($_REQUEST['kd_mapel'] == 'none') || ($_REQUEST['nm_mapel'] == 'none') || ($_REQUEST['kelas'] == 'none')){
    print "<script>alert('Pastikan Anda telah melengkapi semua form!');history.go(-1);</script>";
  }else{
    $sql = "INSERT INTO mata_pelajaran (kd_mapel, nm_mapel, kelas) VALUES ('$kd_mapel','$nm_mapel','$kelas')";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data mata pelajaran BERHASIL ditambahkan!');window.location='mapel.php';</script>";
    }else{
      print "<script>alert('Data mata pelajaran GAGAL ditambahkan. Silahkan ulangi kembali!');history.go(-1);</script>";
    }//if affected
  }//if k1
}// if isset
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-plus"></i>
      TAMBAH DATA MATA PELAJARAN
      <small>SMK PUSTEK SERPONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><a href="<?php print $root; ?>on-admin/mapel.php" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a></h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <br/>
          <form class="form form-horizontal" method="POST">
              <div class="form-group">
                <label class="col-md-2 control-label">Kode Mata Pelajaran</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" placeholder="Kode Mata Pelajaran" name="kd_mapel" required="">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Nama Mata Pelajaran</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" placeholder="Nama Mata Pelajaran" name="nm_mapel" required="">
                </div>
              </div>
              <div class="form-group">
              <label class="col-md-2 control-label">Kelas</label>
              <div class="col-md-5">
                <select class="form-control" name="kelas">
                  <option value="none">- Pilih Kelas -</option>
                  <option value="X">X</option>
                  <option value="XI">XI</option>
                  <option value="XII">XII</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-2"></div>
              <div class="col-md-5"><button type="submit" name="add" class="btn btn-primary flat"><i class="fa fa-check"></i> SIMPAN</button></div>
            </div>

          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php
  include "_footer.php";
  ?>
