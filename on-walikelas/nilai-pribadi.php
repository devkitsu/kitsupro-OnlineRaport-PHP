<?php
  include "_header.php";

  $sql2 = "SELECT * FROM guru, wali_kelas WHERE guru.nuptk=wali_kelas.nuptk
          AND guru.nama='$username'";
  $query2 = mysqli_query ($con, $sql2);
  $data2 = mysqli_fetch_array($query2);
  $kelas = $data2['id_kelas'];
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
            <div class="form-group">
                <label class="col-sm-1 control-label">Semester</label>
                <div class="col-md-2">
                    <select class="form-control" name="smt">
                      <option>- Semester -</option>
                      <option value="1">I (Ganjil)</option>
                      <option value="2">II (Genap)</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="submit" name="show" class="btn btn-md btn-primary flat">TAMPIL</button>
                </div>
            </div>
            </form>
                <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped table-hover">
               <thead bgcolor="ececec">
                <tr>
                 <th width="5%"><center>ID<center></th>
                 <th><center>NISN<center></th>
                  <th><center>NAMA SISWA<center></th>
                  <th><center>SEMESTER<center></th>
                  <th><center>KELAS<center></th>
                  <th><center>STATUS<center></th>
                  <th><center>TOOLS<center></th>
                  </tr>
                </thead>
                <tbody>
                 <?php
                 if (isset($_REQUEST['smt'])){
                  $privilege = $_REQUEST['smt'];
                  $sql = "SELECT * FROM siswa
                          INNER JOIN raport ON raport.nisn=siswa.nisn
                          INNER JOIN kelas ON kelas.id_kelas=siswa.kelas_diterima
                          WHERE siswa.kelas_diterima='$kelas' AND raport.semester='$privilege'
                          ORDER BY nm_siswa ASC";
                  $query = mysqli_query ($con, $sql);
                  $no = 1;
                  while ($data = mysqli_fetch_array($query)) {
                    ?>
                    <tr>
                     <td><center><?php $raport = $data['id_raport'];
                               print $data['id_raport']; ?><center></td>
                     <td><center><?php print $data['nisn']; ?><center></td>
                     <td><center><?php print $data['nm_siswa']; ?><center></td>
                     <td><center><?php print $privilege; ?><center></td>
                     <td><center><?php print $data['nm_kelas']; ?><center></td>
                     <td><center>
                         <?php
                         $sql3 = "SELECT * FROM nilai_ekskul, nilai_kepribadian
                                WHERE nilai_ekskul.id_raport='$raport' AND nilai_kepribadian.id_raport='$raport'";
                         $query3 = mysqli_query ($con, $sql3);
                         $data3 = mysqli_fetch_array($query3);
                         if($data3!=NULL){
                         ?>
                         SUDAH INPUT NILAI
                         <?php
                         } else{
                         ?>
                         BELUM INPUT NILAI
                         <?php
                        }
                        ?>
                     </center>
                     </td>
                     <td><center>
                         <?php
                         if($data3!=NULL){
                         ?>
                      <a href="nilai-pribadi-show.php?id_raport=<?php print $data['id_raport']; ?>" class="btn btn-xs btn-info flat tip-bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
                        <?php
                    } else{
                        ?>
                        <a href="nilai-pribadi-input.php?id_raport=<?php print $data['id_raport']; ?>" class="btn btn-xs btn-info flat tip-bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Tambah"><i class="fa fa-plus"></i></a>
                      <a href="nilai-pribadi-show.php?id_raport=<?php print $data['id_raport']; ?>" class="btn btn-xs btn-success flat tip-bottom" data-placement="bottom" data-toggle="tooltip" data-original-title="Lihat"><i class="fa fa-eye"></i></a>
                    </center></td>
                  </tr>
                  <?php
              }
              }
          }
              ?>
            </tbody>
          </table>
        </div>
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
