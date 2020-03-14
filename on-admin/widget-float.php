<div class="row">
  <div class="col-md-12">
    <!-- TABLE: LATEST ORDERS -->
    <div class="col-md-12">
      <!-- PRODUCT LIST -->
      <div class="box box-danger">
        <div class="box-header with-border">
          <h3 class="box-title">Profil Admin</h3>

          <div class="box-tools pull-right">
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
                  <th width="20%">Nama</th>
                  <th width="20%">Email</th>
                  <th width="20%">No Tlp</th>
                  <th width="20%">Username</th>
                  <th width="10%"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $id_user=$_SESSION['username'];
                $sql = "SELECT * FROM user WHERE username='$id_user'";
                $query = mysqli_query($con, $sql);
                $result = mysqli_fetch_array($query);

                $id = $result['id_user'];
                $sql2 = "SELECT * FROM profil_admin WHERE id_user=$id";
                $query2 = mysqli_query($con, $sql2);

                $no = 1;
                while ($result2 = mysqli_fetch_array($query2)){
                  ?>
                  <tr>
                    <td><center><?php print $no++; ?></center></td>
                    <td><?php print $result2['nama']; ?></td>
                    <td><?php print $result2['email']; ?></td>
                    <td><?php print $result2['tlp']; ?></td>
                    <td><?php print $result['username']; ?></td>
                    <td><a href="admin-edit.php?id_admin=<?php print $result2['id_admin'];?>" class="btn btn-xs btn-primary flat tip-bottom" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                    </td></tr>
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
                    <a type="button" class="btn btn-box-tool" href="kelas-add.php">ADD</i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th width="5%"><center>NO</center></th>
                        <th width="5%">Kelas</th>
                        <th width="10%"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $sql2 = "SELECT * FROM kelas ";
                      $query2 = mysqli_query($con, $sql2);

                      $no = 1;
                      while ($result2 = mysqli_fetch_array($query2)){
                        ?>
                        <tr>
                          <td><center><?php print $no++; ?></center></td>
                          <td><?php print $result2['nm_kelas']; ?></td>
                          <td><a href="kelas-edit.php?id_kelas=<?php print $result2['id_kelas'];?>" class="btn btn-xs btn-primary flat tip-bottom" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                          <a href="?delkelas=<?php print $result2['id_kelas'];?>" class="btn btn-xs btn-danger flat tip-bottom" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Apakah Anda yakin untuk menghapus data kelas <?php print $result['nm_kelas'];?> ?');"><i class="fa fa-trash"></i></a>
                      </td></tr>
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
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Ekstrakulikuler</h3>
                      <div class="box-tools pull-right">
                          <a type="button" class="btn btn-box-tool" href="ekstra-add.php">ADD</i></a>
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
                              <th width="12%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            $sql2 = "SELECT * FROM ekskul, guru WHERE ekskul.id_pembina=guru.nuptk";
                            $query2 = mysqli_query($con, $sql2);

                            $no = 1;
                            while ($result2 = mysqli_fetch_array($query2)){
                              ?>
                              <tr>
                                <td><center><?php print $no++; ?></center></td>
                                <td><?php print $result2['nm_ekskul']; ?></td>
                                <td><?php print $result2['nama']; ?></td>
                                <td><a href="ekstra-edit.php?id_ekskul=<?php print $result2['id_ekskul'];?>" class="btn btn-xs btn-primary flat tip-bottom" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                <a href="?delekskul=<?php print $result2['id_ekskul'];?>" class="btn btn-xs btn-danger flat tip-bottom" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Apakah Anda yakin untuk menghapus data kelas <?php print $result['nm_ekskul'];?> ?');"><i class="fa fa-trash"></i></a>
                            </td></tr>
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
                        <div class="box box-warning">
                          <div class="box-header with-border">
                            <h3 class="box-title">Wali Kelas</h3>
                            <div class="box-tools pull-right">
                                <a type="button" class="btn btn-box-tool" href="walikelas-add.php">ADD</i></a>
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
                                    <th width="20%">Nama</th>
                                    <th width="20%">Kelas</th>
                                    <th width="12%"></th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $sql2 = "SELECT * FROM wali_kelas
                                        INNER JOIN guru ON guru.nuptk=wali_kelas.nuptk
                                        INNER JOIN kelas ON kelas.id_kelas=wali_kelas.id_kelas
                                        ORDER BY kelas.nm_kelas ASC";
                                  $query2 = mysqli_query($con, $sql2);
                                  $no = 1;
                                  while ($result2 = mysqli_fetch_array($query2)){
                                    ?>
                                    <tr>
                                      <td><center><?php print $no++; ?></center></td>
                                      <td><?php print $result2['nama']; ?></td>
                                      <td><?php print $result2['nm_kelas']; ?></td>
                                      <td><a href="walikelas-edit.php?id_walikelas=<?php print $result2['id_walikelas'];?>" class="btn btn-xs btn-primary flat tip-bottom" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                                      <a href="?delwali=<?php print $result2['id_walikelas'];?>" class="btn btn-xs btn-danger flat tip-bottom" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Apakah Anda yakin untuk menghapus data wali kelas?');"><i class="fa fa-trash"></i></a>
                                  </td></tr>
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
    <?php
    if (isset($_REQUEST['delkelas'])){
        $id = $_REQUEST['delkelas'];
        $sql = "DELETE FROM kelas WHERE id_kelas='$id'";
        $query = mysqli_query($con, $sql);

        if ($query){
            print "<script>alert('Data kelas berhasil dihapus!');history.go(-1);</script>";
        }else{
            print "<script>alert('Data kelas gagal dihapus. Silahkan ulangi kembali!');history.go(-1);</script>";
        }
    } else if (isset($_REQUEST['delekskul'])){
        $id = $_REQUEST['delekskul'];
        $sql = "DELETE FROM ekskul WHERE id_ekskul='$id'";
        $query = mysqli_query($con, $sql);

        if ($query){
            print "<script>alert('Data ekskul berhasil dihapus!');history.go(-1);</script>";
        }else{
            print "<script>alert('Data ekskul gagal dihapus. Silahkan ulangi kembali!');history.go(-1);</script>";
        }
    } else if (isset($_REQUEST['delwali'])){
        $id = $_REQUEST['delwali'];
        $sql = "DELETE FROM wali_kelas WHERE id_walikelas='$id'";
        $query = mysqli_query($con, $sql);

        if ($query){
            print "<script>alert('Data wali kelas berhasil dihapus!');history.go(-1);</script>";
        }else{
            print "<script>alert('Data wali kelas gagal dihapus. Silahkan ulangi kembali!');history.go(-1);</script>";
        }
    }
    ?>
