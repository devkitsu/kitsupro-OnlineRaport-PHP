<?php
include "_header.php";
$is_success = true;
$is_success = false;
$message = "";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1><i class="ion ion-person-stalker"></i> DATA SISWA
			<small>SMK PUSTEK SERPONG</small></h1>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
							<h3 class="box-title">
					          <a href="siswa-add.php" class="btn btn-sm btn-primary flat"><i class="fa fa-user-plus"></i> TAMBAH DATA</a></h3>

							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
								title="Collapse">
								<i class="fa fa-minus"></i></button>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body table-responsive">
							<br/>
							<table id="example1" class="table table-bordered table-responsive table-striped table-hover">
								<thead bgcolor="ececec">
									<tr>
										<th width="25%">Identitas Siswa</th>
										<th width="5%"><center>L/P</center></th>
										<th width="20%">Tempat, Tanggal Lahir</th>
										<th width="15%">Diterima Kelas</th>
										<th width="10%">Jurusan</th>
										<th width="15%">Tanggal Diterima</th>
										<th width="10%"><center>TOOLS</center></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM siswa, kelas WHERE siswa.kelas_diterima=kelas.id_kelas
											ORDER BY nm_siswa ASC";
									$query = mysqli_query ($con, $sql);
									while ($data = mysqli_fetch_array($query)) {
										?>
										<tr>
											<td>
												<div class="pull-left image" style="padding-right: 10px;">
													<?php
													if ($data['foto'] == ''){
														?><img src="<?php print $root; ?>/img/user-default.png" class="img-circle" alt="User Image" width="50px" height="50px"><?php
													}else{
														?><img src="<?php print $root;?>on-walimurid/foto-siswa/<?php print $data['foto']; ?>" class="img-circle" alt="Image" width="50px" height="50px"> <?php
													}
													?>
												</div>
												<?php print $data['nisn']; ?><br/><?php print $data['nm_siswa']; ?>
											</td>
											<td><center>
												<?php print $data['jkel']; ?><br/></center></td>
											<td><?php print $data['tmpt_lahir']; ?>, <?php print dateformat($data['tgl_lahir']); ?></td>
											<td><?php print $data['nm_kelas']; ?></td>
											<td><?php print $data['jurusan']; ?></td>
											<td><?php print dateformat($data['tgl_diterima']); ?></td>
											<td align="center">
												<a class="btn btn-xs btn-warning flat" data-placement="bottom" data-toggle="tooltip" title="Detail" href="<?php print $root; ?>on-admin/siswa-detail.php?nisn=<?php print $data['nisn']; ?>"><span class="fa fa-eye"></span></a>
												<a onclick="return confirm('Apakah Anda yakin untuk menghapus:\n\n<?php print $data['nisn']; ?> - <?php print $data['nm_siswa']; ?>')"; class="btn btn-xs btn-danger flat" data-placement="bottom" data-toggle="tooltip" title="Hapus" href="?del=<?php print $data['nisn']; ?>"><span class="fa fa-trash"></span></a>
											</td>
										</tr>
										<?php
									}
									?>
								</tbody>
							</table>
							<?php
							if (isset($_REQUEST['del'])){
								$id = $_REQUEST['del'];
								$sql = "DELETE FROM siswa WHERE nisn='$id'";
								$query = mysqli_query($con, $sql);

								if ($query){
									print "<script>alert('Data siswa berhasil dihapus!');history.go(-1);</script>";
								}else{
									print "<script>alert('Data siswa gagal dihapus. Silahkan ulangi kembali!');history.go(-1);</script>";
								}
							}
							?>
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
