<?php
include "_header.php";

if (isset($_REQUEST['update'])){
  $id = $_REQUEST['id_ekskul'];
  $ekskul = $_REQUEST['ekskul'];
  $pembina = $_REQUEST['pembina'];
  $sql2 = "SELECT * FROM guru WHERE nuptk='$pembina'";
  $query2 = mysqli_query($con, $sql2);
  $result = mysqli_fetch_array($query2);

  $sql3 = "SELECT * FROM ekskul WHERE id_ekskul='$ekskul'";
  $query3 = mysqli_query($con, $sql3);
  $result3 = mysqli_fetch_array($query3);
  if (($pembina==$result['nuptk']) && ($ekskul==$result3['id_ekskul'])){
        print "<script>alert('Data pembina ekskul BERHASIL diubah!');window.location='index.php';</script>";
  } else {
  if(($result['nuptk']==$pembina) && ($result3['id_ekskul']=!$ekskul)){
    $sql = "UPDATE ekskul SET nm_ekskul='$ekskul' WHERE id_ekskul='$id'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data nama ekskul BERHASIL diupdate!');window.location='index.php';</script>";
    }else{
      print "<script>alert('Data nama ekskul GAGAL diupdate!');history.go(-1);</script>";
    }
} else if (($result['nuptk']=!$pembina) && ($result3['id_ekskul']==$ekskul)){
    $sql = "UPDATE ekskul SET id_pembina='$pembina' WHERE id_ekskul='$id'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data pembina ekskul BERHASIL diubah!');window.location='index.php';</script>";
    }else{
      print "<script>alert('Data pembina ekskul GAGAL diubah!');history.go(-1);</script>";
    }
} else{
    $sql = "UPDATE ekskul SET nm_ekskul='$ekskul', id_pembina='$pembina' WHERE id_ekskul='$id'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data ekskul BERHASIL diubah!');window.location='index.php';</script>";
    }else{
      print "<script>alert('Data ekskul GAGAL diubah!');history.go(-1);</script>";
    }
}
}
}
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-pencil"></i>
        UPDATE DATA EKSTRAKULIKULER
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
            $id = $_REQUEST['id_ekskul'];
            $sql = "SELECT * FROM ekskul WHERE id_ekskul='$id'";
            $query = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <br/>
            <form class="form form-horizontal" method="POST">
              <div class="form-group">
                <label class="col-md-2 control-label">Nama Ekskul</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="ekskul" value="<?php print $result['nm_ekskul']; ?>" autofocus="on">
                </div>
              </div>
              <div class="form-group">
                  <label class="col-md-2 control-label">Pembina</label>
                   <div class="col-md-5">
                  <select class="form-control" name="pembina">
                    <option>- Pilih Pembina -</option>
                    <?php
                    $sql = "SELECT * FROM guru ORDER BY nuptk ASC";
                    $query = mysqli_query($con, $sql);
                    while ($result = mysqli_fetch_array($query)){
                      ?>
                      <option value="<?php print $result['nuptk']; ?>"><?php print $result['nama']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
              </div>
              </div>
              <div class="form-group">
                <div class="col-md-2"></div>
                <div class="col-md-5"><button type="submit" name="update" class="btn btn-primary flat"><i class="fa fa-check"></i> UPDATE</button></div>
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
