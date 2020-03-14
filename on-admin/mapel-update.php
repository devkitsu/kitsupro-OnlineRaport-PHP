<?php
include "_header.php";

if (isset($_REQUEST['update'])){
  $id = $_REQUEST['kd_mapel'];
  $kelas = $_REQUEST['kelas'];
  $nama_mapel = $_REQUEST['nm_mapel'];

    $sql = "UPDATE mata_pelajaran SET nm_mapel='$nama_mapel', kelas='$kelas' WHERE kd_mapel='$id'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data mata pelajaran BERHASIL diupdate!');window.location='mapel.php';</script>";
    }else{
      print "<script>alert('Data mata pelajaran GAGAL diupdate!');history.go(-1);</script>";
    }
  }
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-pencil"></i>
        UPDATE DATA MATA PELAJARAN
        <small>SMK PUSTEK SERPONG</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><a href="<?php print $root; ?>on-admin/mapel.php"><button  class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</button></a></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <?php
            $id = $_REQUEST['id'];
            $sql = "SELECT * FROM mata_pelajaran WHERE kd_mapel='$id'";
            $query = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <br/>
            <form class="form form-horizontal" method="POST">
                <div class="form-group">
                  <label class="col-md-2 control-label">Kode Mata Pelajaran</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="kd_mapel" value="<?php print $result['kd_mapel']; ?>" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-2 control-label">Nama Mata Pelajaran</label>
                  <div class="col-md-5">
                    <input type="text" class="form-control" name="nm_mapel" value="<?php print $result['nm_mapel']; ?>" autofocus="on">
                  </div>
                </div>

                <div class="form-group">
                <label class="col-md-2 control-label">Kelas</label>
                <div class="col-md-5">
                  <select name="kelas" class="form-control">
                    <option>- Pilih Kelas -</option>
                    <option <?php if ($result['kelas']=="X"){ print "selected=''";}?>>X</option>
                    <option <?php if ($result['kelas']=="XI"){ print "selected=''";}?>>XI</option>
                    <option <?php if ($result['kelas']=="XII"){ print "selected=''";}?>>XII</option>
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
