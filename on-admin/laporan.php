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
		<h1><i class="fa fa-user-circle-o"></i> LAPORAN DATA
			<small>SMK PUSTEK SERPONG</small></h1>
			<ol class="breadcrumb">
				<li><a href="<?php print $root; ?>on-siswa/"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Laporan Data</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#datanilai" data-toggle="tab">NILAI</a></li>
							<li><a href="#data_orangtua" data-toggle="tab">WALI MURID</a></li>
							<li><a href="#dataguru" data-toggle="tab">WALI KELAS</a></li>
							<li><a href="#datauser" data-toggle="tab">PENGGUNA</a></li>
							<li><a href="#datakelas" data-toggle="tab">KELAS</a></li>
						</ul>
						<div class="tab-content">
							<!-- Data Siswa -->
							<div class="active tab-pane" id="datanilai">
								<a href="nilai-exportxls.php" class="btn btn-sm btn-danger flat"><i class="fa fa-download" aria-hidden="true"></i> EKSPOR (.xls)</a>
								<br>
								<form class="form form-horizontal">

								</form>
							</div>
							<!-- Data Siswa -->

							<!-- Data Orangtua-->
							<div class="tab-pane" id="data_orangtua">
								<a href="walimurid-exportxls.php" class="btn btn-sm btn-danger flat"><i class="fa fa-download" aria-hidden="true"></i> EKSPOR (.xls)</a>
								<br>
								<form class="form form-horizontal">

								</form>
							</div>
							<!-- Data Orangtu -->

							<!-- Data Guru-->
							<div class="tab-pane" id="dataguru">
								<a href="walikelas-exportxls.php" class="btn btn-sm btn-danger flat"><i class="fa fa-download" aria-hidden="true"></i> EKSPOR (.xls)</a>
								<br>
								<form class="form form-horizontal">

								</form>
							</div>
							<!-- Data Guru -->

							<!-- Data User-->
							<div class="tab-pane" id="datauser">
								<a href="user-exportxls.php" class="btn btn-sm btn-danger flat"><i class="fa fa-download" aria-hidden="true"></i> EKSPOR (.xls)</a>
								<br>
								<form class="form form-horizontal">

								</form>
							</div>
							<!-- Data User-->

							<!-- Data kelas-->
							<div class="tab-pane" id="datakelas">
								<a href="kelas-exportxls.php" class="btn btn-sm btn-danger flat"><i class="fa fa-download" aria-hidden="true"></i> EKSPOR (.xls)</a>
								<br>
								<form class="form form-horizontal">

								</form>
							</div>
							<!-- Data kelas -->
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
