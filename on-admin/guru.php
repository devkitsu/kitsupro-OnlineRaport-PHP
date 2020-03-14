<?php
include "_header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1><i class="ion ion-android-person"></i> DATA GURU
    <small>SMK PUSTEK SERPONG</small></h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
     <div class="col-xs-12">
      <div class="box">
       <div class="box-header">
        <h3 class="box-title">
          <a href="guru-add.php" class="btn btn-sm btn-primary flat"><i class="fa fa-user-plus"></i> TAMBAH DATA</a></h3>

        <div class="box-tools">
         <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
         title="Collapse">
         <i class="fa fa-minus"></i></button>
       </div>
     </div>

     <!-- /.box-header -->
     <div class="box-body table-responsive">
      <br/>
      <table id="example1" class="table table-bordered table-hover" >
       <thead bgcolor="ececec">
        <tr>
          <th width="30%">Identitas Guru</th>
          <th width="5%"><center>L/P<center></th>
            <th width="30%"><center>Alamat<center></th>
              <th width="15%"><center>No. Telp/HP<center></th>
                <th width="10%"><center>TOOLS<center></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM guru ORDER BY nama ASC";
                $query = mysqli_query ($con, $sql);
                while ($data = mysqli_fetch_array($query)) {
                  ?>
                  <tr>
                    <td><div class="pull-left image" style="padding-right: 10px;">
                      <?php
                      if ($data['foto'] == ''){
                        ?><img src="<?php print $root;?>img/user-default.png" class="img-circle" alt="User Image" width="50px" height="50px"><?php
                      }else{
                        ?><img src="<?php print $root;?>img/img-guru/<?php print $data['foto']; ?>" class="img-circle" alt="Image" width="50px" height="50px"> <?php
                      }
                      ?>
                    </div>
                    <?php print $data['nuptk']; ?><br/><?php print $data['nama']; ?></td>
                    <td><?php print $data['jkel']; ?></td>
                    <td><?php print $data['alamat']; ?></td>
                    <td><?php print $data['tlp']; ?></td>
                    <td><center>
                    <a href="guru-detail.php?nuptk=<?php print $data['nuptk']; ?>" class="btn btn-xs btn-primary flat tip-bottom" data-toggle="tooltip" data-original-title="Detail"><i class="fa fa-eye"></i></a>
                    <a href="?del=<?php print $data['nuptk']; ?>" class="btn btn-xs btn-danger flat tip-bottom" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Apakah anda yakin untuk menghapus data guru\n\n<?php print $data['nama'];?>?');"><i class="fa fa-trash"></i></a>
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
              $sql = "DELETE FROM guru WHERE nuptk='$id'";
              $query = mysqli_query($con, $sql);

              if ($query){
                echo "<script>alert('Data guru berhasil dihapus!');history.go(-1);</script>";
              }else{
                echo "<script>alert('Gagal menghapus data guru!');history.go(-1);</script>";
              }
            }
            ?>
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
