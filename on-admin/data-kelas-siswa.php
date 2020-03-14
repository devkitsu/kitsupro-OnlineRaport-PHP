<?php
include "_header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-wrench" aria-hidden="true"></i> Setting Kelas Siswa</h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
            
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>

          <!-- /.box-header -->
          <div class="box-body">
            <form name="formkelas" method="POST" action="input-data-kelas-siswa.php" class="form-horizontal">

              <div class="form-group">
                <label class="col-sm-2 control-label">Kelas/Tahun Ajaran</label>
                <div class="col-sm-4">
                  <select name="id_kelas" class="form-control">
                    <option value="pilihkelas" selected> - Pilih Kelas / Tahun Ajaran - </option>
                    <?php
                    $query = "SELECT * FROM tb_kelas";
                    $tampil = mysqli_query($con, $query);
                    while ($data = mysqli_fetch_array($tampil)) {
                      echo "<option value='".$data['nama_kelas']."' '".$data['jurusan']."' '".$data['urut_kelas']."'>".$data['nama_kelas']." ".$data['jurusan']." ".$data['urut_kelas']."</option>";
                    }
                    ?>
                  </select>
                </div></div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">NIS/NISN Siswa</label>
                  <div class="col-sm-4">
                    <input type="text" class="form-control" name="nis_nisn" id="nis_nisn" placeholder="NIS/NISN"/>
                  </div>
                  <div class="col-md-2">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Cari</button>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kelas/Tahun Pelajaran</label>
                  <div class="col-sm-4">
                    <input name="id_kelas" type="text" id="id_kelas" class="form-control" placeholder="ID Kelas" autofocus="on" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Tahun Pelajaran</label>
                  <div class="col-sm-4">
                    <input name="th_ajaran" type="text" id="th_ajaran" class="form-control" placeholder="Tahun Ajaran" autofocus="on" required="required">
                  </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-4">
                    <input type="submit" value="SIMPAN" class="btn btn-md btn-primary">
                    <a href="data-kelas-siswa.php" class="btn btn-md btn-danger">BATAL</a>
                  </div>
                </div>
              </form>
              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="width:800px">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title" id="myModalLabel">Data Siswa</h4>
                    </div>
                    <div class="modal-body">
                      <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                          <tr>
                            <th>NIS/NISN</th>
                            <th>Nama Siswa</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $query = "SELECT * FROM tb_siswa";
                          $sql = mysqli_query ($con,$query);
                          while ($data = mysqli_fetch_array($sql)) {
                            ?>
                            <tr class="pilih" data-siswa="<?php echo $data['nis_nisn']; ?>">
                              <td><?php echo $data['nis_nisn']; ?></td>
                              <td><?php echo $data['nama_siswa']; ?></td>
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
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </section>
            <!-- /.content -->
          </div>
          <!-- /.content-wrapper -->
          
          <!-- page script -->
          <script type="text/javascript">

            $(document).on('click', '.pilih', function (e) {
              document.getElementById("nis_nisn").value = $(this).attr('data-siswa');
              $('#myModal').modal('hide');
            });

            $(function () {
              $("#example1").dataTable();
            });
          </script>
          <?php
          include "_footer.php";
          ?>