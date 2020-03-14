<?php
include "_header.php";

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="ion ion-android-person-add"></i> INPUT DATA SISWA
      <small>SMK PUSTEK SERPONG</small></h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">
                <a href="guru.php" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a> </h3>
                <div class="box-tools pull-right">
                 <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                 title="Collapse">
                 <i class="fa fa-minus"></i></button>
               </div>
             </div>

             <!-- /.box-header -->
             <div class="box-body">
              <br/>

              <form action="store-siswa.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                  <div class="form-group">
                      <label class="col-sm-2 control-label">NISN:</label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="nisn" placeholder="NISN Siswa 10 digit" minlength="10" maxlength="10"  required >
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Nama Siswa:</label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="nm_siswa" required >
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Kelamin:</label>
                      <div class="col-sm-2">
                          <select class="form-control selectlive" name="jkel" required="" >
                            <option value="" selected disabled>- Jenis Kelamin -</option>
                            <option value="L">Laki - Laki</option>
                            <option value="P">Perempuan</option>
                          </select>
                      </div>
                      <label class="col-sm-2 control-label">Wali Murid:</label>
                      <div class="col-sm-2">
                          <select class="form-control selectlive" name="wali" required="" >
                            <option value="" selected disabled>- Wali Murid -</option>
                            <?php $sql="SELECT * FROM  wali_murid ORDER BY id_wali ASC";
                            $qry = mysqli_query($con, $sql)  or die ("SQL Error".mysqli_error($con));
                            while($data=mysqli_fetch_array($qry)){ ?>
                            <option value="<?php print $data['id_wali']; ?>"><?php print $data['nm_ayah']; ?> - <?php print $data['nm_ibu']; ?></option>
                        <?php }?>
                          </select>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Tempat Lahir:</label>
                      <div class="col-sm-2">
                          <input type="text" class="form-control" name="tmpt_lahir" required >
                      </div>
                      <label class="col-sm-2 control-label">Tanggal Lahir:</label>
                      <div class="col-sm-2">
                          <input type="date" class="form-control" name="tgl_lahir" required >
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Agama:</label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="agama" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat:</label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="alamat" required>
                      </div>
                  </div>
                  <div class="form-group">
                      <label class="col-sm-2 control-label">Sekolah Asal:</label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="sekolah_asal" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Alamat Sekolah:</label>
                      <div class="col-sm-6">
                          <input type="text" class="form-control" name="almt_sklh_asal" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">No. Ijazah:</label>
                      <div class="col-sm-2">
                          <input type="text" class="form-control" name="no_ijazah" required>
                      </div>
                      <label class="col-sm-2 control-label">Tahun Ijazah:</label>
                      <div class="col-sm-2">
                          <input type="text" class="form-control" name="thn_ijazah"  minlength="4" maxlength="4"required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Kelas:</label>
                      <div class="col-sm-2">
                          <select class="form-control selectlive" name="kelas" required="" >
                            <option value="" selected disabled>- Pilih Kelas -</option>
                            <?php $sql="SELECT * FROM  kelas ORDER BY nm_kelas ASC";
                            $qry = mysqli_query($con, $sql)  or die ("SQL Error".mysqli_error($con));
                            while($data=mysqli_fetch_array($qry)){ ?>
                            <option value="<?php print $data['id_kelas']; ?>"><?php print $data['nm_kelas']; ?></option>
                        <?php }?>
                          </select>
                      </div>
                      <label class="col-sm-2 control-label">Tgl. Diterima:</label>
                      <div class="col-sm-2">
                          <input type="date" class="form-control" name="tgl_diterima" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Jurusan:</label>
                      <div class="col-sm-6">
                              <select class="form-control selectlive" name="jurusan" required="" >
                                <option value="" selected disabled>- Pilih Jurusan -</option>
                                <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                                <option value="Teknik Kendaraan Ringan (TKR)">Teknik Kendaraan Ringan (Otomotif)</option>
                                <option value="Teknik Komputer dan Jaringan (TKJ)">Teknik Komputer dan Jaringan</option>
                                <option value="Multimedia (MM)">Multimedia</option>
                                <option value="Administrasi Perkantoran (AP)">Administrasi Perkantoran</option>
                                <option value="Akuntansi (AK)">Akuntansi</option>
                              </select>
                      </div>
                  </div>
                  <div class="form-group">
                  <label class="col-sm-2 control-label">Foto:</label>
                  <div class="col-sm-6">
                      <input type="file"  name="userfile" value="" class="form-control" required>
                  </div>
              </div>

                <div class="form-group" style="margin-bottom: 20px;">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <input type="submit" value="SIMPAN" name="add" class="btn btn-md btn-primary flat" />
                  </div></div>
                </form>

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
    include "_footer.php"
    ?>
