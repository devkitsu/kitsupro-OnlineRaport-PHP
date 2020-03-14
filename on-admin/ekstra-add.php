<?php
include "_header.php";

if (isset($_REQUEST['add'])){
  $ekstra = $_REQUEST['ekstra'];
  $pembina = $_REQUEST['pembina'];

  if (($_REQUEST['ekstra'] == 'none') || ($_REQUEST['pembina'] == 'none')){
    print "<script>alert('Pastikan Anda telah melengkapi semua form!');history.go(-1);</script>";
  }else{
    $sql = "INSERT INTO ekskul (nm_ekskul, id_pembina) VALUES ('$ekstra','$pembina')";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data ekskul BERHASIL ditambahkan!');window.location='index.php';</script>";
    }else{
      print "<script>alert('Data ekskul GAGAL ditambahkan. Silahkan ulangi kembali!');history.go(-1);</script>";
    }//if affected
  }//if k1
}// if isset
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-plus"></i>
      TAMBAH DATA EKSTRAKULIKULER
      <small>SMK PUSTEK SERPONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><a href="<?php print $root; ?>on-admin" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a></h3>

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
              <label class="col-md-2 control-label">Nama Ekstrakulikuler</label>
              <div class="col-md-5">
                <input type="text" class="form-control" name="ekstra" required="">
              </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">Pembina</label>
                 <div class="col-md-5">
                <select class="form-control" name="pembina">
                  <option>- Pilih Pembina -</option>
                  <?php
                  $sql = "SELECT * FROM guru ORDER BY nuptk ASC";
                  $query = mysqli_query($con, $sql);
                  while ($result = mysqli_fetch_array($query)){
                    ?>
                    <option value="<?php print $result['nuptk']; ?>"><?php print $result['nama']; ?></option>
                    <?php
                  }
                  ?>
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
