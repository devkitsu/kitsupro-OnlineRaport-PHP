<?php
include "_header.php";
include "_privileges.php";

$sql="SELECT user.id_user, wali_murid.id_wali FROM  user, wali_murid
	WHERE user.username='" . $_SESSION['username'] . "'";
$qry = mysqli_query($con, $sql)  or die ("SQL Error".mysqli_error($con));
$data=mysqli_fetch_array($qry);

$id = $data['id_wali'];
$sql = "SELECT * FROM wali_murid WHERE id_wali='$id'";
$query = mysqli_query($con,$sql);
$data = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><i class="fa fa-user-circle-o"></i> UBAH DATA WALI MURID
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
								<form class="form form-horizontal" action="store.php" method="post">
									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Ayah:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="nm_ayah" value="<?php print $data['nm_ayah'];?>"required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Nama Ibu:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="nm_ibu" value="<?php print $data['nm_ibu'];?>"required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Alamat:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="alamat" value="<?php print $data['almt_ortu'];?>"required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Telp/HP:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="tlp" value="<?php print $data['tlp_ortu'];?>"required>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-3 control-label">Pekerjaan Ayah:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="kerja_ayah" value="<?php print $data['kerja_ayah'];?>"required>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label">Pekerjaan Ibu:</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="kerja_ibu" value="<?php print $data['kerja_ibu'];?>"required>
										</div>
									</div>
									<br/>
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
