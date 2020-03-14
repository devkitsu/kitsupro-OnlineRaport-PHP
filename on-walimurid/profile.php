<?php
include "_header.php";

$sql="SELECT user.id_user, wali_murid.id_wali FROM  user, wali_murid
	WHERE user.username='" . $_SESSION['username'] . "'";
$qry = mysqli_query($con, $sql)  or die ("SQL Error".mysqli_error($con));
$data=mysqli_fetch_array($qry);

$id = $data['id_wali'];

$sql = "SELECT * FROM siswa WHERE id_wali='$id'";
$query = mysqli_query($con,$sql);
$data = mysqli_fetch_array($query);

$sql2 = "SELECT * FROM wali_murid WHERE id_wali='$id'";
$query2 = mysqli_query($con,$sql2);
$data2 = mysqli_fetch_array($query2);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><i class="fa fa-user-circle-o"></i> DATA PRIBADI
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

					<!-- Profile Image -->
					<div class="box box-primary">
						<div class="box-body box-profile">
							<img class="profile-user-img img-responsive img-circle" src="foto-siswa/<?php print $data['foto']; ?>" alt="User profile picture">
							<br/>
							<h3 class="profile-username text-center"><?php print $data['nm_siswa']; ?></h3>
							<p class="text-muted text-center">Wali Murid:<br><?php print $_SESSION['username']; ?></p>
						</div>

						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
				<div class="col-md-8">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#datasiswa" data-toggle="tab">DATA SISWA</a></li>
							<li><a href="#data_orangtua" data-toggle="tab">DATA ORANGTUA & WALI</a></li>
						</ul>
						<div class="tab-content">
							<!-- Data Siswa -->
							<div class="active tab-pane" id="datasiswa">
								<br/>
								<div class="col-xs-12">
									<a type="button" href="profile-siswa-ubah.php" class="btn btn-primary btn-block btn-flat">Ubah Data</a><br>
								</div>
								<form class="form form-horizontal">
									<div class="form-group">
										<label class="col-sm-3 control-label">NISN:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['nisn'];?>"readonly >
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Siswa:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['nm_siswa'];?>"readonly >
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Jenis Kelamin:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['jkel'];?>"readonly >
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Tempat Lahir:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['tmpt_lahir'];?>"readonly >
										</div>
										<label class="col-sm-3 control-label">Tanggal Lahir:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['tgl_lahir'];?>"readonly >
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Agama:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['agama'];?>"readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['alamat'];?>"readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Sekolah Asal:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['sekolah_asal'];?>"readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat Sekolah:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['almt_sklh_asal'];?>"readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">No. Ijazah:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['no_ijazah'];?>"readonly>
										</div>
										<label class="col-sm-3 control-label">Tahun Ijazah:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['thn_ijazah'];?>"readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Kelas:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['kelas_diterima'];?>"readonly>
										</div>
										<label class="col-sm-3 control-label">Tgl. Diterima:</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" value="<?php print $data['tgl_diterima'];?>"readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Jurusan:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data['jurusan'];?>"readonly>
										</div>
									</div>
								</form>
								<br/>
							</div>
							<!-- Data Siswa -->

							<!-- Data Orangtua-->
							<div class="tab-pane" id="data_orangtua">
								<br/><div class="col-xs-12">
									<a type="button" href="profile-ortu-ubah.php" class="btn btn-primary btn-block btn-flat">Ubah Data</a><br>
								</div>
								<form class="form form-horizontal">
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Ayah:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data2['nm_ayah'];?>"readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Ibu:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data2['nm_ibu'];?>"readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data2['almt_ortu'];?>"readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Telp/HP:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data2['tlp_ortu'];?>"readonly>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Pekerjaan Ayah:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data2['kerja_ayah'];?>"readonly>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Pekerjaan Ibu:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" value="<?php print $data2['kerja_ibu'];?>"readonly>
										</div>
									</div>
									<br/>
								</form>
							</div>
							<!-- Data Orangtu -->
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.nav-tabs-custom -->
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
