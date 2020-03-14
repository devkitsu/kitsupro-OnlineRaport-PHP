<?php
  include "_header.php";

  $sql2 = "SELECT * FROM guru, wali_kelas WHERE guru.nuptk=wali_kelas.nuptk
          AND guru.nama='$username'";
  $query2 = mysqli_query ($con, $sql2);
  $data2 = mysqli_fetch_array($query2);
  $kelas = $data2['id_kelas'];

  if (isset($_REQUEST['edit'])){
    $nm_kelas = $_REQUEST['nm_kelas'];
    $smt = $_REQUEST['semester'];
    $id = $_REQUEST['id_raport'];
    $huruf = $_REQUEST['huruf'];

    $sql = "UPDATE nilai_akademik set huruf_akademik='$huruf' where id_raport='$id'";
      $query = mysqli_query($con, $sql);
      if ($query){
        print "<script>alert('Data Nilai BERHASIL diupdate!');window.location='nilai-amik-show.php?id_raport=$id&nm_kelas=$nm_kelas&semester=$smt';</script>";
      }else{
        print "<script>alert('Data Nilai GAGAL diupdate!');history.go(-1);</script>";
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
            <h3 class="box-title"><i class="ion ion-trophy"></i> Ubah Nilai Akademik</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form method="POST" class="form-horizontal">
                <?php
                $id = $_REQUEST['id_raport'];
                $sql2 = "SELECT * FROM raport
                INNER JOIN nilai_akademik ON nilai_akademik.id_raport=raport.id_raport
                WHERE nilai_akademik.id_raport='$id'";
                $query2 = mysqli_query ($con, $sql2);
                $data2 = mysqli_fetch_array($query2);
                ?>
                <center><h4><label class="label label-success">NILAI AKADEMIK SISWA</label></h4></center><br>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nilai</label>
                  <div class="col-sm-1">
                      <input class="form-control" value="<?php print $data2['nilai'];?>" readonly></div>
                      <div class="col-sm-2">
                  <input type="text" class="form-control" name="huruf" placeholder="Huruf Nilai Akhir" required></div>
                </div><br>
                <div class="form-group">
                  <div class="col-md-1"></div>
                  <div class="col-md-6"><button type="submit" name="edit" class="btn btn-primary flat"><i class="fa fa-check"></i> SIMPAN NILAI</button>
                  <a href="nilai-amik-show.php?id_raport=<?php print $id ?>" class="btn btn-danger flat">Kembali</a></div>
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
