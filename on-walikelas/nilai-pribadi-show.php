<?php
  include "_header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Nilai Kepribadian dan Ekstrakulikuler Siswa</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body table-responsive">
          <table class="table" id="example3" class="display nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th width="15%" class="bg-success"><center>NISN</center></th>
                <th width="15%" class="bg-success"><center>Nama Siswa</center></th>
                <th width="5%" class="bg-info"><center>Sikap</center></th>
                <th width="5%" class="bg-info"><center>Disiplin</center></th>
                <th width="5%" class="bg-info"><center>Kerapihan</center></th>
                <th width="5%" class="bg-danger"><center>Ekstrakulikuler</center></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $id = $_REQUEST['id_raport'];
              $sql = "SELECT * FROM raport
                        INNER JOIN siswa ON siswa.nisn=raport.nisn
                        INNER JOIN nilai_ekskul ON nilai_ekskul.id_raport=raport.id_raport
                        INNER JOIN nilai_kepribadian ON nilai_kepribadian.id_raport=raport.id_raport
                        WHERE nilai_ekskul.id_raport='$id' AND
                        nilai_kepribadian.id_raport='$id' ";
              $query = mysqli_query($con, $sql);
              while ($data = mysqli_fetch_array($query)){
                ?>
                <tr>
                  <td class="bg-success"><center><?php print $data['nisn'];?></center></td>
                  <td class="bg-success"><center><?php print $data['nm_siswa'];?></center></td>
                  <td class="bg-info"><center><?php print $data['sikap'];?></center></td>
                  <td class="bg-info"><center><?php print $data['disiplin'];?></center></td>
                  <td class="bg-info"><center><?php print $data['kerapihan'];?></center></td>
                  <td class="bg-danger"><center><?php print $data['predikat'];?></center></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
            <br><a href="nilai-pribadi.php" class="btn btn-danger flat">Kembali</a>
            <!--<a href="nilai-pribadi-edit.php?id_raport=<?php print $id ?>" class="btn btn-info flat">Update</i></a>
 --> </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
  include "_footer.php";
?>
