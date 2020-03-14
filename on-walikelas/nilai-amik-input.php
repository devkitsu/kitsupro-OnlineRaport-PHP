<?php
  include "_header.php";

  $sql2 = "SELECT * FROM guru, wali_kelas WHERE guru.nuptk=wali_kelas.nuptk
          AND guru.nama='$username'";
  $query2 = mysqli_query ($con, $sql2);
  $data2 = mysqli_fetch_array($query2);
  $kelas = $data2['id_kelas'];

  if (isset($_REQUEST['add'])){
    $id = $_REQUEST['id_raport'];
    $mapel = $_REQUEST['mapel'];
    $mapel2 = $_REQUEST['mapel2'];
    $hadir = $_REQUEST['hadir'];
    $harian = $_REQUEST['harian'];
    $uts = $_REQUEST['uts'];
    $uas = $_REQUEST['uas'];
    $praktek = $_REQUEST['praktek'];
    $huruf = $_REQUEST['huruf'];
    $kkm = $_REQUEST['kkm'];
    $nilai_akhir = ($hadir*20/100)+($harian*40/100)+($uts*20/100)+($uas*20/100);

    if($kkm==65){
        $intval = 11;
    } else if($kkm==70){
        $intval = 10;
    } else if($kkm==75){
        $intval = 8;
    } else if($kkm==80){
        $intval = 7;
    }

    $kkm2 = $kkm+$intval;
    $kkm3 = $kkm2+$intval;
    $kkm4 = $kkm3+$intval;
    if($nilai_akhir>$kkm3 && $nilai_akhir <= $kkm4){
        $predikat = "A";
    } else if($nilai_akhir>$kkm2 && $nilai_akhir <= $kkm3){
        $predikat = "B";
    } else if($nilai_akhir>=$kkm && $nilai_akhir <= $kkm2){
        $predikat = "C";
    } else{
        $predikat = "D";
    }

    if($praktek>85 && $praktek <= 100){
        $predikat2 = "A";
    } else if($praktek>75 && $praktek <=85){
        $predikat2 = "B";
    } else if($praktek>=65 && $praktek <= 75){
        $predikat2 = "C";
    } else{
        $predikat2 = "D";
    }

    $sql = "INSERT INTO nilai_akademik (id_raport,kd_mapel,kehadiran,nilai_harian,uts,uas,nilai,kkm,predikat)
            VALUES ('$id','$mapel','$hadir','$harian','$uts','$uas','$nilai_akhir','$kkm','$predikat');";
    $sql.= "INSERT INTO nilai_praktek (id_raport,kd_mapel,nilai,huruf_nilai,predikat)
            VALUES ('$id','$mapel2','$praktek','$huruf','$predikat2')";
      $query = mysqli_multi_query($con, $sql);
      if ($query){
        print "<script>alert('Data Nilai BERHASIL ditambahkan!');window.location='nilai-amik-show.php?id_raport=$id';</script>";
      }else{
        print "<script>alert('Data Nilai GAGAL ditambahkan!');history.go(-1);</script>";
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
            <h3 class="box-title"><i class="ion ion-trophy"></i> Input Nilai Akademik dan Praktek</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <form method="POST" class="form-horizontal">
                <center><h4><label class="label label-success">NILAI AKADEMIK SISWA</label></h4></center><br>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mata Pelajaran</label>
                  <div class="col-sm-2">
                      <select class="form-control" name="mapel">
                        <option>- Pilih -</option>
                        <?php
                        $raport=$_REQUEST['id_raport'];
                        $sql4 = "SELECT * FROM mata_pelajaran, nilai_akademik
                                    WHERE mata_pelajaran.kd_mapel=nilai_akademik.kd_mapel
                                    AND nilai_akademik.id_raport='$raport'";
                        $query4 = mysqli_query ($con, $sql4);
                        $data4 = mysqli_fetch_array($query4);
                        $mapel = $data4['kd_mapel'];

                        $sql3 = "SELECT * FROM mata_pelajaran WHERE kd_mapel<>'$mapel'";
                        $query3 = mysqli_query ($con, $sql3);
                        while($data3 = mysqli_fetch_array($query3)){
                        ?>
                        <option value="<?php print $data3['kd_mapel']?>">(<?php print $data3['kd_mapel']?>) <?php print $data3['nm_mapel']?></option>
                    <?php }?>
                      </select></div>
                  <label class="col-sm-1 control-label">Kehadiran</label>
                  <div class="col-sm-1">
                    <input name="hadir" type="text" class="form-control" placeholder="..." required="required" /></div>
                  <label class="col-sm-1 control-label">Nilai Harian</label>
                  <div class="col-sm-1">
                    <input name="harian" type="text" class="form-control" placeholder="..." required="required" /></div>
                  <label class="col-sm-1 control-label">UTS</label>
                  <div class="col-sm-1">
                    <input name="uts" type="text" class="form-control" placeholder="..." required="required" /></div>
                  <label class="col-sm-1 control-label">UAS</label>
                  <div class="col-sm-1">
                    <input name="uas" type="text" class="form-control" placeholder="..." required="required" /></div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">KKM</label>
                    <div class="col-sm-2">
                      <input name="kkm" type="text" class="form-control" placeholder="..." required="required" /></div>
                  </div><br>
                <center><h4><label class="label label-info">NILAI PRAKTEK SISWA</label></h4></center><br>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Mata Pelajaran</label>
                  <div class="col-sm-2">
                      <select class="form-control" name="mapel2">
                        <option>- Pilih -</option>
                        <?php
                        $raport=$_REQUEST['id_raport'];
                        $sql5 = "SELECT * FROM mata_pelajaran, nilai_praktek
                                    WHERE mata_pelajaran.kd_mapel=nilai_praktek.kd_mapel
                                    AND nilai_praktek.id_raport='$raport'";
                        $query5 = mysqli_query ($con, $sql5);
                        $data5 = mysqli_fetch_array($query5);
                        $mapel2 = $data4['kd_mapel'];

                        $sql6 = "SELECT * FROM mata_pelajaran WHERE kd_mapel<>'$mapel2'";
                        $query6 = mysqli_query ($con, $sql6);
                        while($data6 = mysqli_fetch_array($query6)){
                        ?>
                        <option value="<?php print $data6['kd_mapel']?>">(<?php print $data6['kd_mapel']?>) <?php print $data6['nm_mapel']?></option>
                    <?php }?>
                      </select></div>
                  <label class="col-sm-1 control-label">Nilai</label>
                  <div class="col-sm-1">
                    <input name="praktek" type="text" class="form-control" placeholder="..." /></div>
                  <div class="col-sm-6">
                    <input name="huruf" type="text" class="form-control" placeholder="Huruf Nilai Praktikum" /></div>
                    <br>
                </div>
                <div class="form-group">
                  <div class="col-md-1"></div>
                  <div class="col-md-6"><button type="submit" name="add" class="btn btn-primary flat"><i class="fa fa-check"></i> SIMPAN NILAI</button>
                  <a href="nilai-amik.php" class="btn btn-danger flat">Kembali</a></div>
                </div>
            </form>
            <small>Note: <br>
                - Jika mata pelajaran tidak ada di pilihan, maka nilai mata pelajaran sudah di input
            <br>
                - Hanya ada beberapa mata pelajaran yang memiliki nilai praktikum saja</small>
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
