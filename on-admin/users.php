<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1><i class="ion ion-android-contacts"></i> DATA USER
   <small>SMK PUSTEK SERPONG</small></h1>
 </section>

 <!-- Main content -->
 <section class="content">
   <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
         <h3 class="box-title">
          <form class="form form-horizontal" method="POST">
            <div class="form-group">
              <div class="col-md-10">
                <select class="form-control" name="privilege">
                  <option>- Pilih Level Pengguna -</option>
                    <option value="Admin">Admin</option>
                    <option value="Wali Murid">Wali Murid</option>
                    <option value="Wali Kelas">Wali Kelas</option>
                </select>
              </div>
              <div class="col-md-2">
                <button type="submit" name="show" class="btn btn-md btn-primary flat">TAMPIL</button>
              </div>
            </form>
          </h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div></div>


          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-striped table-hover">
             <thead bgcolor="ececec">
              <tr>
               <th width="5%"><center>NO<center></th>
                <th>USERNAME</th>
                <th>STATUS</th>
                <th><center>TOOLS<center></th>
                </tr>
              </thead>
              <tbody>
               <?php
               if (isset($_REQUEST['privilege'])){
                $privilege = $_REQUEST['privilege'];
                $query = "SELECT * FROM user WHERE status='$privilege'";
                $sql = mysqli_query ($con, $query);
                $no = 1;
                while ($data = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                   <td><center><?php print $no++; ?></center></td>
                   <td><?php print $data['username']; ?></td>
                   <td><?php print $data['status']; ?></td>
                   <td><center>
                    <a href="?del=<?php print $data['id_user']; ?>" class="btn btn-xs btn-danger flat tip-bottom" data-toggle="Delete" data-original-title="Delete" onclick="return confirm('User <?php print $data['username']; ?> akan dihapus. Lanjutkan?')" ><i class="fa fa-trash"></i></a>
                  </center></td>
                </tr>
                <?php
              }
            }
            ?>
          </tbody>
        </table>
        <?php
        if (isset($_REQUEST['del'])){
            $id = $_REQUEST['del'];
            $sql = "DELETE FROM user WHERE id_user='$id'";
            $query = mysqli_query($con, $sql);

            if ($query){
                print "<script>alert('Data user berhasil dihapus!');history.go(-1);</script>";
            }else{
                print "<script>alert('Data user gagal dihapus. Silahkan ulangi kembali!');history.go(-1);</script>";
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
