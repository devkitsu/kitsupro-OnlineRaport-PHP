<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-book"></i>
      DATA MATA PELAJARAN
      <small>SMK PUSTEK SERPONG</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <table id="example1" class="table table-striped">
            <thead>
              <tr>
                <th width="5%"><center>NO</center></th>
                <th width="10%">Kode Mata Pelajaran</th>
                <th width="20%">Nama Mata Pelajaran</th>
                <th width="10%">Kelas</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $sql = "SELECT * FROM mata_pelajaran ORDER BY kelas ASC";
              $query = mysqli_query($con, $sql);
              while ($data = mysqli_fetch_array($query)) {
              ?>
              <tr>
                <td><center><?php print $no++; ?></center></td>
                <td><?php print $data['kd_mapel']; ?></td>
                <td><?php print $data['nm_mapel']; ?></td>
                <td><?php print $data['kelas']; ?></td>
              </tr>
              <?php
            }
              ?>
            </tbody>
          </table>
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
