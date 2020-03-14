<?php
  include "_header.php";
  $nm_kelas = $_REQUEST['nm_kelas'];
  $smt = $_REQUEST['semester'];
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
        <?php
        $id = $_REQUEST['id_raport'];
        $sql3 = "SELECT * FROM siswa
                  INNER JOIN raport ON siswa.nisn=raport.nisn
                  WHERE raport.id_raport='$id' ";
        $query3 = mysqli_query($con, $sql3);
        $data3 = mysqli_fetch_array($query3);
          ?>
        <div class="form-group">
          <a href="nilai-amik.php" class="btn btn-danger flat">Kembali</a>
        </div>
        <table class="table" id="example3" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
              <th width="10%"><center>Nama Siswa</center></th>
              <th>Kelas</th>
              <th width="85%">Semester</th>
          </tr>
      </thead>
      <tbody>
          <tr>
            <td><center><?php print $data3['nm_siswa'];?></center></td>
            <td><?php print $_REQUEST['nm_kelas'];?></td>
            <td><?php print $_REQUEST['semester'];?></td>
        </tr>
    </tbody>
</table><br>
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Nilai Akademik Siswa</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table" id="example3" class="display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width="10%" class="bg-warning"><center>Mata Pelajaran</center></th>
                <th width="5%" class="bg-success"><center>KH</center></th>
                <th width="5%" class="bg-info"><center>NH</center></th>
                <th width="5%" class="bg-info"><center>UTS</center></th>
                <th width="5%" class="bg-info"><center>UAS</center></th>
                <th width="5%" class="bg-info"><center>KKM</center></th>
                <th width="5%" class="bg-info"><center>Nilai Akhir</center></th>
                <th width="5%" class="bg-info"><center>PRE</center></th>
                <th width="15%" class="bg-info"><center>Huruf</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = $_REQUEST['id_raport'];
              $sql = "SELECT * FROM nilai_akademik
                        INNER JOIN raport ON nilai_akademik.id_raport=raport.id_raport
                        INNER JOIN mata_pelajaran ON mata_pelajaran.kd_mapel=nilai_akademik.kd_mapel
                        WHERE nilai_akademik.id_raport='$id' ";
              $query = mysqli_query($con, $sql);
              while ($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <td class="bg-warning"><center><?php print $data['nm_mapel'];?></center></td>
                  <td class="bg-success"><center><?php print $data['kehadiran'];?></center></td>
                  <td class="bg-info"><center><?php print $data['nilai_harian'];?></center></td>
                  <td class="bg-info"><center><?php print $data['uts'];?></center></td>
                  <td class="bg-info"><center><?php print $data['uas'];?></center></td>
                  <td class="bg-info"><center><?php print $data['kkm'];?></center></td>
                  <td class="bg-info"><center><?php print $data['nilai'];?></center></td>
                  <td class="bg-info"><center><?php print $data['predikat'];?></center></td>
                  <td class="bg-info"><center><?php print $data['huruf_akademik'];?></center></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <br>
            <a href="nilai-amik-edit.php?id_raport=<?php print $id ?>&nm_kelas=<?php print $nm_kelas; ?>&semester=<?php print $smt; ?>" class="btn btn-info flat">Update</i></a>
            </div>
</div>
<div class="box box-primary box-solid">
  <div class="box-header with-border">
    <h3 class="box-title">Nilai Praktek Siswa</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body table-responsive">
      <table class="table" id="example3" class="display nowrap" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="10%" class="bg-warning"><center>Mata Pelajaran</center></th>
          <th width="5%" class="bg-success"><center>Nilai</center></th>
          <th width="5%" class="bg-info"><center>Predikat</center></th>
          <th width="15%" class="bg-info"><center>Huruf</center></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $id = $_REQUEST['id_raport'];
        $sql2 = "SELECT * FROM nilai_praktek
                  INNER JOIN raport ON nilai_praktek.id_raport=raport.id_raport
                  INNER JOIN mata_pelajaran ON mata_pelajaran.kd_mapel=nilai_praktek.kd_mapel
                  WHERE nilai_praktek.id_raport='$id' ";
        $query2 = mysqli_query($con, $sql2);
        while ($data2 = mysqli_fetch_array($query2)){
          ?>
          <tr>
            <td class="bg-warning"><center><?php print $data2['nm_mapel'];?></center></td>
            <td class="bg-success"><center><?php print $data2['nilai'];?></center></td>
            <td class="bg-info"><center><?php print $data2['predikat'];?></center></td>
            <td class="bg-info"><center><?php print $data2['huruf_nilai'];?></center></td>
          </tr>
          <?php } ?>
        </tbody>
    </table><br>
      </div></div>
</section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
  include "_footer.php";
?>
