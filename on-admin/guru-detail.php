<?php
include "_header.php";
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><i class="fa fa-eye"></i> PROFIL GURU
			<small>SMK PUSTEK SERPONG</small></h1>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-4">
					<?php
					$id = $_REQUEST['nuptk'];
					$sql = "SELECT * FROM guru WHERE nuptk='$id'";
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
								?><img height="50px" width="50px" class="profile-user-img img-responsive img-circle" src="<?php print $root; ?>img/img-guru/<?php print $result['foto']; ?>" alt="User profile picture"><?php
							}
							?>
							<br/>
							<h3 class="profile-username text-center"><?php print $result['nama']; ?></h3>
							<p class="text-muted text-center"><?php print $result['nuptk']; ?></p>
						</div>

						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
				<div class="col-md-8">
					<div class="box box-primary">
						<div class="box-header">
							<button type="button" class="btn btn-box-tool pull-right" data-widget="collapse"><i class="fa fa-minus"></i></button>
						</div>
						<div class="box-body">
							<form class="form form-horizontal">
								<div class="form-group">
									<label class="col-md-3 control-label">NUPTK</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['nuptk']; ?>"readonly>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Nama Guru</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['nama']; ?>"readonly>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Tempat, Tanggal Lahir</label>
									<div class="col-md-5">
										<input type="text" class="form-control" value="<?php print $result['tempat_lahir']; ?>"readonly>
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" value="<?php print dateformat($result['tgl_lahir']); ?>"readonly>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Jenis Kelamin</label>
									<div class="col-md-9">
										<?php if($result['jkel']=="L"){
												$data = "Laki - Laki";
											} else{
												$data = "Perempuan";
											}?>
										<input type="text" class="form-control" value="<?php print $data; ?>"readonly>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Agama</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['agama']; ?>"readonly>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Alamat</label>
									<div class="col-md-9">
										<input type="text" class="form-control col-md-4" value="<?php print $result['alamat'];?>"readonly>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">No. Telp/HP</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['tlp'];?>"readonly>
									</div>
								</div>

								<div class="form-group">
									<label class="col-md-3 control-label">Status</label>
									<div class="col-md-9">
										<input type="text" class="form-control" value="<?php print $result['status'];?>"readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3"></label>
									<div class="col-md-9">
										<a href="guru.php" class="btn btn-sm btn-danger flat"><i class="fa fa-arrow-left"></i> KEMBALI</a>
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
