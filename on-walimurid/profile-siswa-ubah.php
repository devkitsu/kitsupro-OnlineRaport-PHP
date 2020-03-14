<?php
include "_header.php";
include "_privileges.php";

$sql="SELECT user.id_user, wali_murid.id_wali FROM  user, wali_murid
	WHERE user.username='" . $_SESSION['username'] . "'";
$qry = mysqli_query($con, $sql)  or die ("SQL Error".mysqli_error($con));
$data=mysqli_fetch_array($qry);
$id = $data['id_wali'];
$sql2 = "SELECT * FROM wali_murid WHERE id_wali='$id'";
$query2 = mysqli_query($con,$sql2);
$data2 = mysqli_fetch_array($query2);

$sql3 = "SELECT * FROM siswa WHERE id_wali='$id'";
$query3 = mysqli_query($con,$sql3);
$data3 = mysqli_fetch_array($query3);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><i class="fa fa-user-circle-o"></i> UBAH DATA SISWA
			<small>SMK PUSTEK SERPONG</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php print $root; ?>on-siswa/"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Data Pribadi</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<!-- Profile Image -->
					<div class="box box-primary">
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
				<div class="col-md-8">
							<!-- Data Orangtua-->
								<br/>
								<form class="form form-horizontal" action="store-siswa.php" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<div class="col-sm-9">
											<input type="hidden" class="form-control" value="<?php print  $data2['id_wali'];?>">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Wali Murid:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control"  name="id_wali" value="<?php print  $_SESSION['username'];?>"readonly >
										</div>
									</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">NISN:</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="nisn" placeholder="NISN Siswa 10 digit" minlength="10" maxlength="10" value="<?php print $data3['nisn'];?>" required >
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Nama Siswa:</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="nm_siswa" value="<?php print $data3['nm_siswa'];?>"required >
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Jenis Kelamin:</label>
											<div class="col-sm-9">
												<select class="form-control selectlive" name="jkel" required="" >
									              <option value="" selected disabled>- Jenis Kelamin -</option>
									              <option value="L">Laki - Laki</option>
									              <option value="P">Perempuan</option>
									            </select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Tempat Lahir:</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" name="tmpt_lahir" value="<?php print $data3['tmpt_lahir'];?>"required >
											</div>
											<label class="col-sm-3 control-label">Tanggal Lahir:</label>
											<div class="col-sm-3">
												<input type="date" class="form-control" name="tgl_lahir" value="<?php print $data3['tgl_lahir'];?>"required >
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Agama:</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="agama" value="<?php print $data3['agama'];?>"required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Alamat:</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="alamat" value="<?php print $data3['alamat'];?>"required>
											</div>
										</div>
										<div class="form-group">
											<label class="col-sm-3 control-label">Sekolah Asal:</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="sekolah_asal" value="<?php print $data3['sekolah_asal'];?>"required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Alamat Sekolah:</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" name="almt_sklh_asal" value="<?php print $data3['almt_sklh_asal'];?>"required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">No. Ijazah:</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" name="no_ijazah" value="<?php print $data3['no_ijazah'];?>"required>
											</div>
											<label class="col-sm-3 control-label">Tahun Ijazah:</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" name="thn_ijazah" value="<?php print $data3['thn_ijazah'];?>" minlength="4" maxlength="4"required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Kelas:</label>
											<div class="col-sm-3">
												<input type="text" class="form-control" name="kelas_diterima" value="<?php print $data3['kelas_diterima'];?>"required>
											</div>
											<label class="col-sm-3 control-label">Tgl. Diterima:</label>
											<div class="col-sm-3">
												<input type="date" class="form-control" name="tgl_diterima" value="<?php print $data3['tgl_diterima'];?>"required>
											</div>
										</div>

										<div class="form-group">
											<label class="col-sm-3 control-label">Jurusan:</label>
											<div class="col-sm-9">
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
									<div class="row">
								          <div class="col-xs-6">
								            <button type="submit" class="btn btn-primary btn-block btn-flat">Ubah</button>
								          </div><!-- /.col -->
								          <div class="col-xs-6">
								            <a type="button" href="profile.php" class="btn btn-primary btn-block btn-flat">Kembali</a>
								          </div><!-- /.col -->
								        </div>
								</form>
							<!-- Data Orangtu -->
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
