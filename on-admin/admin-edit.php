<?php
include "_header.php";

if (isset($_REQUEST['update'])){
  $id = $_REQUEST['id_admin'];
  $nama = $_REQUEST['nama'];
  $email = $_REQUEST['email'];
  $kontak = $_REQUEST['kontak'];
  $username = $_REQUEST['username'];

  $sql2 = "SELECT * FROM user, profil_admin WHERE user.id_user=profil_admin.id_user";
  $query2 = mysqli_query($con, $sql2);
  $result = mysqli_fetch_array($query2);
  $id_user=$result['id_user'];

    $sql = "UPDATE profil_admin SET nama='$nama', email='$email', tlp='$kontak' WHERE id_admin='$id';";
    $sql.= "UPDATE user SET username='$username' WHERE id_user='$id_user'";
    $query = mysqli_multi_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Profil BERHASIL diupdate!');window.location='index.php';</script>";
    }else{
      print "<script>alert('Profil GAGAL diupdate!');history.go(-1);</script>";
    }
} else if (isset($_REQUEST['update-pass'])){
  $id = $_REQUEST['id_admin'];
  $pass = md5($_REQUEST['pass']);

  $sql2 = "SELECT * FROM user, profil_admin WHERE user.id_user=profil_admin.id_user";
  $query2 = mysqli_query($con, $sql2);
  $result = mysqli_fetch_array($query2);
  $id_user=$result['id_user'];

    $sql = "UPDATE user SET password='$pass' WHERE id_user='$id_user'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Password BERHASIL diupdate!');window.location='index.php';</script>";
    }else{
      print "<script>alert('Password GAGAL diupdate!');history.go(-1);</script>";
    }
  }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-pencil"></i>
        UPDATE PROFIL
        <small>SMK PUSTEK SERPONG</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><a href="<?php print $root; ?>on-admin"><button  class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</button></a></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
        </div>
          </div>
          <div class="box-body">
            <?php
            $id = $_REQUEST['id_admin'];
            $sql = "SELECT * FROM profil_admin, user WHERE profil_admin.id_admin='$id' AND profil_admin.id_user=user.id_user";
            $query = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <br/>
            <form class="form form-horizontal" method="POST">
              <div class="form-group">
                <label class="col-md-2 control-label">Nama</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="nama" value="<?php print $result['nama']; ?>" autofocus="on">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Email</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="email" value="<?php print $result['email']; ?>" autofocus="on">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Kontak</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="kontak" value="<?php print $result['tlp']; ?>" autofocus="on">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Username</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="username" value="<?php print $result['username']; ?>" autofocus="on">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-2 control-label">Password</label>
                <div class="col-md-5">
                  <input type="password" class="form-control" name="pass">
                  <small>Jika dikosongkan, maka password tidak berubah</small>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-2"></div>
                <div class="col-md-2"><button type="submit" name="update" class="btn btn-primary flat"><i class="fa fa-check"></i> UPDATE DATA</button></div>
                <div class="col-md-2"><button type="submit" name="update-pass" class="btn btn-primary flat"><i class="fa fa-check"></i> UPDATE PASSWORD</button></div>
              </div>

            </form>
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
