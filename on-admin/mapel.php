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
        <h3 class="box-title"><a href="mapel-add.php"><button class="btn btn-sm btn-primary flat"><i class="fa fa-plus"></i> TAMBAH DATA</button></a></h3>
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
                <th width="5%"><center>TOOLS</center></th>
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
                <td><center>
                  <a href="mapel-update.php?id=<?php print $data['kd_mapel']; ?>" class="btn btn-xs btn-primary tip-bottom flat" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                  <a href="?del=<?php print $data['kd_mapel'];?>" class="btn btn-xs btn-danger flat tip-bottom" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Apakah Anda yakin untuk menghapus data mata pelajaran <?php print $data['nm_mapel']?>?');"><i class="fa fa-trash"></i></a>
                </center></td>
              </tr>
              <?php
            }
              ?>
            </tbody>
          </table>
          <?php
          if (isset($_REQUEST['del'])){
            $id = $_REQUEST['del'];
            $sql = "DELETE FROM mata_pelajaran WHERE kd_mapel='$id'";
            $query = mysqli_query($con, $sql);
            if (mysqli_affected_rows($con)>0){
              print "<script>alert('Data mata pelajaran berhasil dihapus!');history.go(-1);</script>";
            }else{
              print "<script>alert('Data mata pelajaran gagal dihapus. Silahkan ulangi kembali!');</script>";
            }

          }
          ?>
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
