<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <style type="text/css">
  div.dataTables_wrapper {
    padding-right: 10px;
    width: 2300px;
    margin: 0 auto;
  }
</style>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1><i class="fa fa-line-chart"></i>
    NILAI SISWA
    <small>SMK PUSTEK SERPONG</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Nilai Siswa</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box box-primary box-solid">
    <div class="box-body">
      <br/>
      <?php
      $sql3="SELECT user.id_user, wali_murid.id_wali FROM  user, wali_murid
      	WHERE user.username='" . $_SESSION['username'] . "'";
      $qry3 = mysqli_query($con, $sql3)  or die ("SQL Error".mysqli_error($con));
      $data3=mysqli_fetch_array($qry3);
      $id_wali = $data3['id_wali'];

      $sql2 = "SELECT * FROM siswa WHERE id_wali = '$id_wali'";
      $query2 = mysqli_query($con, $sql2);
      $data2 = mysqli_fetch_array($query2);
      $nisn = $data2['nisn'];

      $id = $_SESSION['username'];
      $sql = "SELECT * FROM raport WHERE nisn = '$nisn'";
      $query = mysqli_query($con, $sql);
      $data = mysqli_fetch_array($query);
      ?>
      <form class="form form-horizontal" method="POST">
        <div class="col-md-2">
          <label class="control-label" class="control-label class="control-label"">NISN</label>
        </div>
        <div class="form-group col-md-4">
          <input class="form-control" type="text" value="<?php print $data['nisn'];?>" name="nisn" readonly="">
        </div>

        <div class="col-md-2">
          <label class="control-label">JURUSAN</label>
        </div>
        <div class="form-group col-md-4">
          <input class="form-control" type="text" value="<?php print $data2['jurusan'];?>" name="jurusan" readonly="">
        </div>

        <div class="col-md-2">
          <label class="control-label">NAMA</label>
        </div>
        <div class="form-group col-md-4">
          <input class="form-control" type="text" value="<?php print $data2['nm_siswa'];?>" name="nm_siswa" readonly="">
        </div>
        <div class="col-md-2">
          <label class="control-label">WALI KELAS</label>
        </div>
        <div class="form-group col-md-4">
          <input class="form-control" type="text" value="<?php print $data['nm_guru'];?>" name="nm_guru" readonly="">
        </div>

        <div class="col-md-2">
          <label class="control-label">KELAS</label>
        </div>
        <div class="form-group col-md-4">
          <select class="form-control" name="kelas">
            <option value="tapel_none">- Pilih Kelas -</option>
            <option value="">X</option>
          </select>
        </div>
        <div class="col-md-2">
          <label class="control-label">SMT</label>
        </div>
        <div class="form-group col-md-4">
          <select class="form-control" name="smt">
            <option value="tapel_none">- Pilih Semester -</option>
            <option value="">1</option>
          </select>
        </div>
        <div class="col-md-12">
          <button class="btn btn-md btn-primary flat pull-right">LIHAT NILAI</button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
  </div>

  <!-- Default box -->
  <div class="box box-primary box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">Nilai Siswa</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table" id="example3" class="display nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th width="15%">Mata Pelajaran</th>
            <th width="5%" class="bg-success"><center>KH</center></th>
            <th width="5%" class="bg-danger"><center>NH</center></th>
            <th width="5%" class="bg-danger"><center>UTS</center></th>
            <th width="5%" class="bg-danger"><center>UAS</center></th>
            <th width="5%" class="bg-danger"><center>KKM</center></th>
            <th width="5%" class="bg-danger"><center>PRE</center></th>
            <th width="5%" class="bg-warning"><center>NP</center></th>
            <th width="5%" class="bg-warning"><center>PRE</center></th>
            <th width="5%" class="bg-info"><center>NE</center></th>
            <th width="5%" class="bg-success"><center>SKP</center></th>
            <th width="5%" class="bg-success"><center>DSP</center></th>
            <th width="5%" class="bg-success"><center>RPH</center></th>
            <th width="5%" class="bg-danger"><center>Nilai Akhir</center></th>
            <th width="5%" class="bg-danger"><center>Huruf</center></th>
          </tr>
        </thead>
        <tbody>
          <?php
          $id = $_SESSION['username'];
          $sql = "SELECT nilai_akademik.*, nilai_ekskul.*, nilai_kepribadian.*, nilai_praktek.*
                    FROM nilai_akademik, nilai_ekskul, nilai_kepribadian, nilai_praktek
                    WHERE nilai_akademik.id_raport='$id' AND nilai_ekskul.id_raport='$id' AND
                    nilai_kepribadian.id_raport='$id' AND nilai_praktek.id_raport='$id' ";
          $query = mysqli_query($con, $sql);
          while ($data = mysqli_fetch_array($query)){
            ?>
            <tr>
              <td></td>
              <td class="bg-danger"><center><?php print $data['n_tugas1'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_tugas2'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_tugas3'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_tugas4'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_tugas5'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian1'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian2'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian3'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian4'];?></center></td>
              <td class="bg-warning"><center><?php print $data['n_harian5'];?></center></td>
              <td class="bg-info"><center><?php print $data['uts'];?></center></td>
              <td class="bg-info"><center><?php print $data['uas'];?></center></td>
              <td class="bg-info"><center><?php print $data['nilai_akhir_np'];?></center></td>
              <td class="bg-info"><center><?php print $data['pre_np'];?></center></td>
              <td class="bg-danger"><center><?php print $data['n_proses1'];?></center></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <br/>
        <b>Deskripsi:</b>
        <ol>
          <li>KH = Nilai Kehadiran</li>
          <li>NH = Nilai Harian</li>
          <li>UTS = Nilai UTS</li>
          <li>UAS = Nilai UAS</li>
          <li>NE = Nilai Ekstrakulikuler</li>
          <li>NP = Nilai Praktek</li>
          <li>SKP = Nilai Sikap</li>
          <li>DSP = Nilai Kedisiplinan</li>
          <li>RPH = Nilai Kerapihan</li>
          <li>PRE = Predikat</li>
        </ol>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="" class="btn btn-sm btn-danger flat"><i class="fa fa-file-pdf-o"></i>&nbsp; DOWNLOAD .PDF</a>
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->
    <div class="box box-primary box-solid">
      <div class="box-header with-border">
        <h3 class="box-title">Peringkat Siswa</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
        </div>
      </div>
      <div class="box-body table-responsive">
        <table class="table" id="example3" class="display nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th width="15%">Nama Siswa</th>
              <th width="5%" class="bg-success"><center>NISN</center></th>
              <th width="5%" class="bg-danger"><center>Nilai Akhir</center></th>
              <th width="5%" class="bg-danger"><center>Predikat</center></th>
              <th width="5%" class="bg-danger"><center>Huruf</center></th>
              <th width="5%" class="bg-danger"><center>Peringkat</center></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $id = $_SESSION['username'];
            $sql = "SELECT nilai_akademik.*, nilai_ekskul.*, nilai_kepribadian.*, nilai_praktek.*
                      FROM nilai_akademik, nilai_ekskul, nilai_kepribadian, nilai_praktek
                      WHERE nilai_akademik.id_raport='$id' AND nilai_ekskul.id_raport='$id' AND
                      nilai_kepribadian.id_raport='$id' AND nilai_praktek.id_raport='$id' ";
            $query = mysqli_query($con, $sql);
            while ($data = mysqli_fetch_array($query)){
              ?>
              <tr>
                <td></td>
                <td class="bg-danger"><center><?php print $data['n_tugas1'];?></center></td>
                <td class="bg-danger"><center><?php print $data['n_tugas2'];?></center></td>
                <td class="bg-danger"><center><?php print $data['n_tugas3'];?></center></td>
                <td class="bg-danger"><center><?php print $data['n_tugas4'];?></center></td>
                <td class="bg-danger"><center><?php print $data['n_tugas5'];?></center></td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
          <br/>
      </div><br><br>    
        <!-- /.box-footer-->
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include "_footer.php";
?>
