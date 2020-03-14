<?php
include "_header.php";

if (isset($_REQUEST['update'])){
  $id = $_REQUEST['id_walikelas'];
  $kelas = $_REQUEST['kelas'];
  $guru = $_REQUEST['guru'];

    $sql = "UPDATE wali_kelas SET nuptk='$guru', id_kelas='$kelas' WHERE id_walikelas='$id'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data walikelas BERHASIL diupdate!');window.location='index.php';</script>";
    }else{
      print "<script>alert('Data walikelas GAGAL diupdate!');history.go(-1);</script>";
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
          <h3 class="box-title"><a href="<?php print $root; ?>on-admin"><button  class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</button></a></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <?php
            $id = $_REQUEST['id_walikelas'];
            $sql = "SELECT * FROM wali_kelas WHERE id_walikelas='$id'";
            $query = mysqli_query($con, $sql);
            $result = mysqli_fetch_array($query);
            ?>
            <br/>
            <form class="form form-horizontal" method="POST">
                <div class="form-group">
                <label class="col-md-2 control-label">Guru</label>
                <div class="col-md-5">
                  <select name="guru" class="form-control">
                    <option>- Pilih Guru -</option>
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
              <label class="col-md-2 control-label">Kelas</label>
              <div class="col-md-5">
                <select name="kelas" class="form-control">
                  <option>- Pilih Kelas -</option>
                  <?php
                  $sql2 = "SELECT * FROM kelas ORDER BY nm_kelas ASC";
                  $query2 = mysqli_query($con, $sql2);
                  while ($result2 = mysqli_fetch_array($query2)){
                    ?>
                    <option value="<?php print $result2['id_kelas']; ?>"><?php print $result2['nm_kelas']; ?></option>
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
