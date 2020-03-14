<?php
include "_header.php";

if (isset($_REQUEST['update'])){
  $id = $_REQUEST['id_kelas'];
  $kelas = $_REQUEST['kelas'];

    $sql = "UPDATE kelas SET nm_kelas='$kelas' WHERE id_kelas='$id'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data kelas BERHASIL diupdate!');window.location='index.php';</script>";
    }else{
      print "<script>alert('Data kelas GAGAL diupdate!');history.go(-1);</script>";
    }
  }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-pencil"></i>
        UPDATE DATA KELAS
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
            $id = $_REQUEST['id_kelas'];
            $sql = "SELECT * FROM kelas WHERE id_kelas='$id'";
            $query = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <br/>
            <form class="form form-horizontal" method="POST">
              <div class="form-group">
                <label class="col-md-2 control-label">Nama Kelas</label>
                <div class="col-md-5">
                  <input type="text" class="form-control" name="kelas" value="<?php print $result['nm_kelas']; ?>" autofocus="on">
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
