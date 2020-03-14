<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-user-circle-o"></i> DETAIL SISWA
      <small>SMK PUSTEK SERPONG</small></h1>
      <ol class="breadcrumb">
        <li><a href="<?php print $root; ?>on-siswa/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Pribadi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <?php
          $id = $_REQUEST['nisn'];
          $sql = "SELECT * FROM siswa
                    INNER JOIN wali_murid ON siswa.id_wali=wali_murid.id_wali
                    INNER JOIN kelas ON siswa.kelas_diterima=kelas.id_kelas
                    WHERE siswa.nisn='$id' ";
          $query = mysqli_query($con, $sql);
          $result = mysqli_fetch_array($query);
          ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <?php
              if ($result['foto'] == ''){
                print "<img class='profile-user-img img-responsive img-circle' src='$root/img/user-default.png' alt='User profile picture'>";
              }else{
                ?><img height="50px" width="50px" class="profile-user-img img-responsive img-circle" src="<?php print $root; ?>on-walimurid/foto-siswa/<?php print $result['foto']; ?>" alt="User profile picture"><?php
              }
              ?>
              <br/>
              <h3 class="profile-username text-center"><?php print $result['nm_siswa']; ?></h3>
              <p class="text-muted text-center"><?php print $result['nisn']; ?></p>
            </div>

            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header">
              <a href="siswa.php" class="btn btn-sm btn-danger flat" ><i class="fa fa-arrow-left"></i> BACK</a>
              <button type="button" class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
            <div class="box-body">
              <form class="form form-horizontal">

                <div class="form-group">
                  <label class="col-md-3 control-label">Nama Siswa</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['nm_siswa']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Jenis Kelamin</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['jkel']; ?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Tempat, Tanggal Lahir</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control col-md-4" value="<?php print $result['tmpt_lahir']; ?>, <?php print dateformat($result['tgl_lahir']);?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Agama</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['agama'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Alamat Siswa</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['alamat'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Sekolah Asal</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['sekolah_asal'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Alamat Sekolah</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['almt_sklh_asal'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Tahun Ijazah</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['thn_ijazah'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">No. Ijazah</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['no_ijazah'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Diterima Kelas</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['nm_kelas'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Tanggal Diterima</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print dateformat($result['tgl_diterima']);?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Jurusan</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['jurusan'];?>"readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-3 control-label">Nama Ayah</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['nm_ayah'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Nama Ibu</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['nm_ibu'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Alamat Orangtua</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['almt_ortu'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Telp/HP Orangtua</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['tlp_ortu'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Pekerjaan Orangtua</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['kerja_ayah'];?>"readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-3 control-label">Nama Wali Siswa</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" value="<?php print $result['kerja_ibu'];?>"readonly>
                  </div>
                </div>
                </div>
              </form>
            </div>
          </div>
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
