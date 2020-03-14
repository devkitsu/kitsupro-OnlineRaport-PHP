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
		<h1><i class="ion ion-person-stalker"></i> DATA WALI MURID
			<small>SMK PUSTEK SERPONG</small></h1>
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="box-header">
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
										<th width="20%">Nama Ayah</th>
										<th width="20%">Nama Ibu</th>
										<th width="25%">Alamat</th>
										<th width="10%">Kontak</th>
										<th width="15%">Kerja Ayah</th>
										<th width="15%">Kerja Ibu</th>
										<th width="10%"><center>TOOLS</center></th>
									</tr>
								</thead>
								<tbody>
									<?php
									$sql = "SELECT * FROM wali_murid ORDER BY id_wali ASC";
									$query = mysqli_query ($con, $sql);
									while ($data = mysqli_fetch_array($query)) {
										?>
										<tr>
											<td><?php print $data['nm_ayah']; ?></td>
											<td><?php print $data['nm_ibu']; ?></td>
											<td><?php print $data['almt_ortu']; ?></td>
											<td><?php print $data['tlp_ortu']; ?></td>
											<td><?php print $data['kerja_ayah']; ?></td>
											<td><?php print $data['kerja_ibu']; ?></td>
											<td align="center">
												<a onclick="return confirm('Apakah Anda yakin untuk menghapus data?')"; class="btn btn-xs btn-danger flat" data-placement="bottom" data-toggle="tooltip" title="Hapus" href="?del=<?php print $data['id_wali']; ?>"><span class="fa fa-trash"></span></a>
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
								$sql = "DELETE FROM wali_murid WHERE id_wali='$id'";
								$query = mysqli_query($con, $sql);

								if ($query){
									print "<script>alert('Data wali murid berhasil dihapus!');history.go(-1);</script>";
								}else{
									print "<script>alert('Data wali murid gagal dihapus. Silahkan ulangi kembali!');history.go(-1);</script>";
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
