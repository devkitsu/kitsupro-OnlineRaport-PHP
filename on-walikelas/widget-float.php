<div class="row">
  <div class="col-md-12">
    <!-- TABLE: LATEST ORDERS -->
    <div class="col-md-9">
      <!-- PRODUCT LIST -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Siswa</h3>
          <div class="box-tools pull-right">
              <a class="btn btn-box-tool" href="siswa.php"><i class="fa fa-eye"></i></a>
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="table-responsive">
            <table class="table no-margin">
              <thead>
                <tr>
                  <th width="5%">NO</th>
                  <th width="20%">NISN</th>
                  <th width="20%">Nama</th>
                  <th width="20%">JK</th>
                  <th width="20%">Kelas</th>
                  <th width="20%">Jurusan</th>
                  </tr>
              </thead>
              <tbody>
                <?php
                $username=$_SESSION['nama'];
                $sql = "SELECT * FROM guru, wali_kelas WHERE guru.nuptk=wali_kelas.nuptk
                            AND guru.nama='$username'";
                $query = mysqli_query($con, $sql);
                $data = mysqli_fetch_array($query);
                $kelas = $data['id_kelas'];

                $sql2 = "SELECT * FROM siswa, kelas WHERE siswa.kelas_diterima=kelas.id_kelas
                            AND siswa.kelas_diterima='$kelas' ORDER BY siswa.nm_siswa ASC LIMIT 5";
                $query2 = mysqli_query($con, $sql2);
                $no = 1;
                while ($result2 = mysqli_fetch_array($query2)){
                  ?>
                  <tr>
                    <td><?php print $no++; ?></td>
                    <td><?php print $result2['nisn']; ?></td>
                    <td><?php print $result2['nm_siswa']; ?></td>
                    <td><?php print $result2['jkel']; ?></td>
                    <td><?php print $result2['nm_kelas']; ?></td>
                    <td><?php print $result2['jurusan']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>

          <div class="col-md-3">
            <!-- PRODUCT LIST -->
            <div class="box box-warning">
              <div class="box-header with-border">
                <h3 class="box-title">Mata Pelajaran</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-box-tool" href="mapel.php"><i class="fa fa-eye"></i></a>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th width="5%">NO</th>
                        <th width="20%">Mapel</th>
                        <th width="20%">Tingkat</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql2 = "SELECT * FROM mata_pelajaran ORDER BY kelas ASC LIMIT 10 ";
                      $query2 = mysqli_query($con, $sql2);

                      $no = 1;
                      while ($result2 = mysqli_fetch_array($query2)){
                        ?>
                        <tr>
                          <td><?php print $no++; ?></td>
                          <td><?php print $result2['nm_mapel']; ?></td>
                          <td><?php print $result2['kelas']; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>

          <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Kelas</h3>
                <div class="box-tools pull-right">
                    <a class="btn btn-box-tool" href="kelas.php"><i class="fa fa-eye"></i></a>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th width="5%">NO</th>
                        <th width="20%">Kelas</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql2 = "SELECT * FROM kelas ORDER BY nm_kelas ASC LIMIT 5 ";
                      $query2 = mysqli_query($con, $sql2);

                      $no = 1;
                      while ($result2 = mysqli_fetch_array($query2)){
                        ?>
                        <tr>
                          <td><?php print $no++; ?></td>
                          <td><?php print $result2['nm_kelas']; ?></td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>

                <div class="col-md-5">
                  <!-- PRODUCT LIST -->
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Ekstrakulikuler</h3>
                      <div class="box-tools pull-right">
                          <a class="btn btn-box-tool" href="ekskul.php"><i class="fa fa-eye"></i></a>
                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table no-margin">
                          <thead>
                            <tr>
                              <th width="5%"><center>NO</center></th>
                              <th width="20%">Ekstrakulikuler</th>
                              <th width="20%">Pembina</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql2 = "SELECT * FROM ekskul, guru WHERE ekskul.id_pembina=guru.nuptk
                                        ORDER BY nm_ekskul ASC LIMIT 5";
                            $query2 = mysqli_query($con, $sql2);

                            $no = 1;
                            while ($result2 = mysqli_fetch_array($query2)){
                              ?>
                              <tr>
                                <td><center><?php print $no++; ?></center></td>
                                <td><?php print $result2['nm_ekskul']; ?></td>
                                <td><?php print $result2['nama']; ?></td>
                                </tr>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.table-responsive -->
                      </div>
                          <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                      </div>

          <!-- /.col -->
        <!-- /.table-responsive -->
    </div>
