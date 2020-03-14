<?php
include "_header.php";

$nis_nisn = $_SESSION['username'];
$sql = "SELECT * FROM tb_mapel_siswa WHERE nis_nisn='$nis_nisn'";
$query = mysqli_query($con,$sql);
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><i class="fa fa-book"></i>
        JADWAL PELAJARAN
        <small>SMK NEGERI 1 BRONDONG</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal Pelajaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="box box-primary box-solid">
        <div class="box-body">
          <br/>
          <form class="form form-horizontal" method="POST">
            <div class="col-md-2">
              <label>NIS/NISN</label>
            </div>
            <div class="form-group col-md-4">
              <input class="form-control" type="text" name="nis_nisn" readonly="">
            </div>

            <div class="col-md-2">
              <label>JURUSAN</label>
            </div>
            <div class="form-group col-md-4">
              <input class="form-control" type="text" name="jurusan" readonly="">
            </div>

            <div class="col-md-2">
              <label>NAMA</label>
            </div>
            <div class="form-group col-md-4">
              <input class="form-control" type="text" name="nama" readonly="">
            </div>

            <div class="col-md-2">
              <label>KELAS / TAPEL</label>
            </div>
            <div class="form-group col-md-4">
              <select class="form-control" name="kelas_tapel">
                <option value="">X - GANJIL</option>
                <option value="">X - GENAP</option>
                <option value="">XI - GANJIL</option>
                <option value="">XI - GENAP</option>
                <option value="">XII - GANJIL</option>
                <option value="">XII - GENAP</option>
              </select>
            </div>

            <div class="col-md-12">
              <button class="btn btn-md btn-primary flat pull-right">LIHAT JADWAL</button>
            </div>
          </form>
        </div>
        <!-- /.box-body -->
      </div>

      <!-- Default box -->
      <div class="box box-primary box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Jadwal Pelajaran</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
            title="Collapse">
            <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body table-responsive">
            <?php
              //while ($result = mysqli_fetch_array($query)){
            ?>
            <table id="example2" class="table table-striped">
              <thead>
                <tr>
                  <th width="10%"><center>JAM</center></th>
                  <th>SENIN</th>
                  <th>SELASA</th>
                  <th>RABU</th>
                  <th>KAMIS</th>
                  <th>JUM'AT</th>
                  <th>SABTU</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><center><b>06.45 - 07.00</b></center></td>
                  <td><?php echo $query['nis_nisn'];?></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>07.00 - 07.40</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>07.40 - 08.20</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>08.20 - 09.00</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>09.00 - 09.40</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>09.40 - 10.20</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>10.50 - 11.30</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>11.30 - 12.10</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>12.30 - 13.10</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>13.10 - 13.50</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>13.50 - 14.30</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>

                <tr>
                  <td><center><b>14.30 - 15.10</b></center></td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                  <td>a</td>
                </tr>
                <?php //} ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <button class="btn btn-md btn-danger flat"><i class="fa fa-file-pdf-o"></i>&nbsp; EXPORT TO .PDF</button>
          </div>
          <!-- /.box-footer-->
        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
    include "_footer.php";
    ?>