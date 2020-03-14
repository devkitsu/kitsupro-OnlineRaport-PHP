<?php
include "_header.php";
$is_success = true;
$is_success = false;
$message = "";

// action add
if (isset($_REQUEST['add'])){
  $nama_sekolah = $_REQUEST['nama_sekolah'];
  $npsn = $_REQUEST['npsn'];
  $nis_nss_nds = $_REQUEST['nis_nss_nds'];
  $kepala_sekolah = $_REQUEST['kepala_sekolah'];
  $alamat_sekolah = $_REQUEST['alamat_sekolah'];
  $kode_pos = $_REQUEST['kode_pos'];
  $telp_sekolah = $_REQUEST['telp_sekolah'];
  $desa_kelurahan = $_REQUEST['desa_kelurahan'];
  $kecamatan = $_REQUEST['kecamatan'];
  $kabupaten = $_REQUEST['kabupaten'];
  $prov = $_REQUEST['prov'];
  $web = $_REQUEST['web'];
  $email = $_REQUEST['email'];
  $nip_kepala_sekolah = $_REQUEST['nip_kepala_sekolah'];

  $sql = "INSERT INTO tb_sekolah (nama_sekolah, npsn, nis_nss_nds, kepala_sekolah, alamat_sekolah, kode_pos, telp_sekolah, desa_kelurahan, kecamatan, kabupaten, prov, web, email, nip_kepala_sekolah) VALUES('$nama_sekolah', '$npsn', '$nis_nss_nds', '$kepala_sekolah', '$alamat_sekolah', '$kode_pos', '$telp_sekolah', '$desa_kelurahan', '$kecamatan', '$kabupaten', '$prov', '$web', '$email', '$nip_kepala_sekolah')";
  $query = mysqli_query($con, $sql);

  if ($query){
    $message = "Data sekolah berhasil diinput!";
  }else{
    $message = "Proses input data gagal! Silahkan ulangi kembali.";
  }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1><i class="fa fa-university" aria-hidden="true"></i> 
    DATA SEKOLAH
    <small>SMK NEGERI 1 BRONDONG</small></h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title"></h3>
            
            <div class="box-tools pull-right">
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
          </div>
          
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <br/>
            <form method="POST" class="form-horizontal">
              <?php
              $sql = "SELECT * FROM tb_sekolah";
              $query = mysqli_query($con, $sql);
              $data = mysqli_fetch_array($query);
              ?>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Sekolah</label>
                  <div class="col-sm-6">
                    <input name="nama_sekolah" type="text" class="form-control" placeholder="Nama Sekolah" value="<?php print $data['nama_sekolah']; ?>" autofocus="on" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">NPSN</label>
                  <div class="col-sm-6">
                    <input name="npsn" type="text" class="form-control" placeholder="NPSN" value="<?php print $data['npsn']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">NSS</label>
                  <div class="col-sm-6">
                    <input name="nis_nss_nds" type="text" class="form-control" placeholder="NNS" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-6">
                    <input name="alamat_sekolah" type="text" class="form-control" placeholder="Alamat" value="<?php print $data['alamat_sekolah']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kode Pos</label>
                  <div class="col-sm-6">
                    <input name="kode_pos" type="text" class="form-control" placeholder="Kode Pos" value="<?php print $data['kode_pos']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telepon</label>
                  <div class="col-sm-6">
                    <input name="telp_sekolah" type="text" class="form-control" placeholder="No. Telepon Sekolah" value="<?php print $data['telp_sekolah']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kelurahan</label>
                  <div class="col-sm-6">
                    <input name="desa_kelurahan" type="text" class="form-control" placeholder="Kelurahan" value="<?php print $data['desa_kelurahan']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-6">
                    <input name="kecamatan" type="text" class="form-control" placeholder="Kecamatan" value="<?php print $data['kecamatan']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kabupaten</label>
                  <div class="col-sm-6">
                    <input name="kabupaten" type="text" id="kabupaten" class="form-control" placeholder="Kabupaten" value="<?php print $data['kabupaten']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Provinsi</label>
                  <div class="col-sm-6">
                    <input name="prov" type="text" id="prov" class="form-control" placeholder="Provinsi" value="<?php print $data['prov']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Website</label>
                  <div class="col-sm-6">
                    <input name="web" type="text" class="form-control" placeholder="Website" value="<?php print $data['web']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">E-mail</label>
                  <div class="col-sm-6">
                    <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php print $data['email']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Kepala Sekolah</label>
                  <div class="col-sm-6">
                    <input  name="kepala_sekolah" type="text" class="form-control" placeholder="Nama Kepala Sekolah" value="<?php print $data['kepala_sekolah']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">NIP Kepala Sekolah</label>
                  <div class="col-sm-6">
                    <input name="nip_kepala_sekolah" type="text" class="form-control" placeholder="NIP Kepala Sekolah" value="<?php print $data['nip_kepala_sekolah']; ?>" required="required" />
                  </div>
                </div>

                <div class="form-group" style="margin-bottom: 20px;">
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-6">
                    <input type="submit" name="add" value="SIMPAN" class="btn btn-md btn-primary" />
                  </div>
                </div>
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
  include "_footer.php";
  ?>