<?php
include "../config.php";
include "_privileges.php";

$username = $_SESSION['nama'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Raport Digital SMK PUSTEK Serpong</title>
  <link rel="icon" href="<?php print $root; ?>dist/img/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="description" content="Sistem Raport Digital SMK PUSTEK Serpong">
  <meta name="keywords" content="raport, online, smk, pustek, serpong, web">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php print $root; ?>bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php print $root; ?>dist/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php print $root; ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php print $root; ?>dist/css/skins/_all-skins.min.css">

</head>
<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?php print $root; ?>on-walikelas" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src="../dist/img/smk-mini.png" height="50" weight="auto" alt="logo SMK"/></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>SMK PUSTEK </b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <p>
                    Halo, Selamat datang <b><?php echo $_SESSION['nama']; ?></b>
                  </p>
              </a>
            </li>
          </ul>
        </div>

      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
              <?php
              $sql = "SELECT * FROM guru WHERE nama='$username'";
              $query = mysqli_query ($con, $sql);
              $data = mysqli_fetch_array($query);
              if ($data['foto'] == ''){
                ?><img src="<?php print $root;?>img/user-default.png" class="img-circle" alt="User Image" width="50px" height="50px"><?php
              }else{
                ?><img src="<?php print $root;?>img/img-guru/<?php print $data['foto']; ?>" class="img-circle" alt="Image" width="50px" height="50px"> <?php
              }
              ?></div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['nama']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i>Wali Kelas</a>
          </div>
        </div>
        <br/>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php include "_menu.php"; ?>
      </section>
      <!-- /.sidebar -->
    </aside>
    <?php
    $timeout = 10; // Set timeout minutes
    $logout_redirect_url = "$root"; // Set logout URL

    $timeout = $timeout * 60; // Converts minutes to seconds
    if (isset($_SESSION['start_time'])) {
      $elapsed_time = time() - $_SESSION['start_time'];
      if ($elapsed_time >= $timeout) {
        session_destroy();
        echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
      }
    }
    $_SESSION['start_time'] = time();
    ?>
