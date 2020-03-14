<?php
  include "_header.php";

  $sql2 = "SELECT * FROM guru, wali_kelas WHERE guru.nuptk=wali_kelas.nuptk
          AND guru.nama='$username'";
  $query2 = mysqli_query ($con, $sql2);
  $data2 = mysqli_fetch_array($query2);
  $kelas = $data2['id_kelas'];

  if (isset($_REQUEST['add'])){
    $id = $_REQUEST['id_raport'];
    $id_ekskul = $_REQUEST['ekskul'];
    $ekskul = $_REQUEST['nilai_ekskul'];
    $sikap = $_REQUEST['sikap'];
    $disiplin = $_REQUEST['disiplin'];
    $rapih = $_REQUEST['rapih'];

    $sql = "INSERT INTO nilai_kepribadian (id_raport,sikap,disiplin,kerapihan)
            VALUES ('$id','$sikap','$disiplin','$rapih');";
    $sql.= "INSERT INTO nilai_ekskul (id_raport,kd_ekskul,predikat)
            VALUES ('$id','$id_ekskul','$ekskul')";
      $query = mysqli_multi_query($con, $sql);
      if (mysqli_affected_rows($con)>0){
        print "<script>alert('Data Nilai BERHASIL ditambahkan!');window.location='nilai-pribadi-show.php?id_raport=$id';</script>";
      }else{
        print "<script>alert('Data Nilai GAGAL dditambahkan!');history.go(-1);</script>";
      }
    }
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"><i class="ion ion-trophy"></i> Input Nilai Kepribadian dan Ekstrakulikuler</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form method="POST" class="form-horizontal">
                <center><h4><label class="label label-success">NILAI KEPRIBADIAN SISWA</label></h4></center><br>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Sikap</label>
                  <div class="col-sm-2">
                      <select class="form-control" name="sikap">
                        <option>- Pilih -</option>
                        <option value="A">Baik (A)</option>
                        <option value="B">Cukup Baik (B)</option>
                        <option value="C">Kurang (C)</option>
                      </select></div>
                  <label class="col-sm-1 control-label">Disiplin</label>
                  <div class="col-sm-2">
                      <select class="form-control" name="disiplin">
                        <option>- Pilih -</option>
                        <option value="A">Baik (A)</option>
                        <option value="B">Cukup Baik (B)</option>
                        <option value="C">Kurang (C)</option>
                      </select></div>
                  <label class="col-sm-1 control-label">Kerapihan</label>
                  <div class="col-sm-2">
                      <select class="form-control" name="rapih">
                        <option>- Pilih -</option>
                        <option value="A">Baik (A)</option>
                        <option value="B">Cukup Baik (B)</option>
                        <option value="C">Kurang (C)</option>
                      </select> </div>
                </div><br>
                <center><h4><label class="label label-info">NILAI EKSTRAKULIKULER SISWA</label></h4></center><br>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ekstrakulikuler</label>
                  <div class="col-sm-2">
                      <select class="form-control" name="ekskul">
                        <option>- Pilih -</option>
                        <?php
                        $sql2 = "SELECT * FROM ekskul";
                        $query2 = mysqli_query ($con, $sql2);
                        while($data2 = mysqli_fetch_array($query2)){
                        ?>
                        <option value="<?php print $data2['id_ekskul']?>"><?php print $data2['nm_ekskul']?></option>
                    <?php }?>
                      </select></div>
                  <label class="col-sm-1 control-label">Nilai</label>
                  <div class="col-sm-2">
                      <select class="form-control" name="nilai_ekskul">
                        <option>- Pilih -</option>
                        <option value="A">Baik (A)</option>
                        <option value="B">Cukup Baik (B)</option>
                        <option value="C">Kurang (C)</option>
                      </select></div>
                </div><br>
                <div class="form-group">
                  <div class="col-md-1"></div>
                  <div class="col-md-6"><button type="submit" name="add" class="btn btn-primary flat"><i class="fa fa-check"></i> SIMPAN NILAI</button>
                  <a href="nilai-pribadi.php" class="btn btn-danger flat">Kembali</a></div>
                </div>
            </form>
                <!-- /.box-header -->
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
