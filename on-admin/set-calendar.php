<?php
include "_header.php";

if (isset($_REQUEST['add'])){
 $kegiatan = mysqli_real_escape_string($con, $_REQUEST['kegiatan']);
 $tapel = mysqli_real_escape_string($con, $_REQUEST['tapel']);
 $mulai = mysqli_real_escape_string($con, $_REQUEST['mulai']);
 $selesai = mysqli_real_escape_string($con, $_REQUEST['selesai']);
 if ($tapel == 'none'){
  print "<script>alert('Silahkan pilih tahun pelajaran terlebih dahulu!');history.go(-1);</script>";
}else{
 $sql = "INSERT INTO tb_kalender SET kegiatan='$kegiatan', tapel='$tapel', mulai='$mulai', selesai='$selesai'";
 $query = mysqli_query($con, $sql);

 if (mysqli_affected_rows($con)>0){
  print "<script>alert('Data kalender akademik berhasil disimpan!');history.go(-1);</script>";
}else{
  print "<script>alert('Gagal menambahkan data kalender akademik. Silahkan ulangi kembali!');history.go('-1');</script>";
}
}
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
  <h1><i class="fa fa-calendar"></i>
   KALENDER AKADEMIK
   <small>SMK Negeri 1 Brondong</small>
 </h1>
 <ol class="breadcrumb">
   <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
   <li class="active">Kalender Akademik</li>
 </ol>
</section>

<!-- Main content -->
<section class="content">
 <!-- Default box -->
 <div class="box box-primary box-solid">
   <div class="box-body">
    <form class="form" method="POST">
     <div class="form-group col-md-4">
      <label>Kegiatan</label>
      <input type="text" class="form-control" name="kegiatan" placeholder="Nama Kegiatan" required="">
    </div>

    <div class="form-group col-md-2">
      <label>Tahun Pelajaran</label>
      <select class="form-control" name="tapel">
        <option value="none">- Tahun Pelajaran -</option>
        <?php
        $sql = "SELECT * FROM tb_tapel ORDER BY tapel ASC";
        $query = mysqli_query ($con, $sql);
        while ($result = mysqli_fetch_array($query)){
          ?>
          <option value="<?php print $result['tapel']; ?>"><?php print $result['tapel']; ?></option>
          <?php } ?>
        </select>
      </div>

      <div class="form-group col-md-3">
       <label>Tanggal Mulai</label>
       <input type="date" class="form-control" name="mulai" required="">
     </div>

     <div class="form-group col-md-3">
       <label>Tanggal Selesai</label>
       <input type="date" class="form-control" name="selesai" required="">
     </div>

     <div class="form-group col-md-12">
      <button type="submit" class="flat btn btn-md btn-primary pull-right" name="add"><i class="fa fa-check"></i>&nbsp; SIMPAN</button>
    </div>
  </form>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->

<div class="box box-primary box-solid">
  <div class="box-header with-border">
   <h3 class="box-title">Kalender Akademik</h3>

   <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
    title="Collapse">
    <i class="fa fa-times"></i></button>
  </div>
</div>
<div class="box-body">
 <table id="example2" class="table table-responsive table-striped">
  <thead>
    <tr>
      <th width="5%"><center>NO</center></th>
      <th width="15%">Tahun Pelajaran</th>
      <th>Kegiatan</th>
      <th>Mulai</th>
      <th>Selesai</th>
      <th><center>TOOLS</center></th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sql = "SELECT * FROM tb_kalender ORDER BY id ASC";
    $query = mysqli_query ($con, $sql);
    $no = 1;
    while ($result = mysqli_fetch_array($query)){
      ?>
      <tr>
        <td><center><?php print $no++; ?></center></td>
        <td><?php print $result['tapel']; ?></td>
        <td><?php print $result['kegiatan']; ?></td>
        <td><?php print dateformat($result['mulai']); ?></td>
        <td><?php print dateformat($result['selesai']); ?></td>
        <td><center>
          <a href="<?php print $root; ?>admin/kalender-akademik/edit?id=<?php print $result['id']; ?>" class="btn btn-xs btn-primary flat tip-bottom" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
          <a href="?del=<?php print $result['id']; ?>" class="btn btn-xs btn-danger flat tip-bottom" data-toggle="tooltip" data-original-title="Delete" onclick="return confirm('Apakah anda yakin untuk menghapus:\n\n<?php print $result['kegiatan']; ?>?');"><i class="fa fa-trash"></i></a>
        </center></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <?php
  if (isset($_REQUEST['del'])){
    $id = $_REQUEST['del'];
    $sql = "DELETE FROM tb_kalender WHERE id='$id'";
    $query = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)>0){
      print "<script>alert('Data kalender akademik berhasil dihapus!');history.go(-1);</script>";
    }else{
      print "<script>alert('Gagal menghapus kalender akademik. Silahkan coba lagi!');history.go(-1);</script>";
    }
  }
  ?>
</div>
<!-- /.box-body -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include "_footer.php";
?>