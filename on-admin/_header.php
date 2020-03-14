<?php
include "../config.php";
include "_privileges.php";
?>
<?php
// function format tanggal
function dateformat($date){
  $BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);

  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
  return($result);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Raport Digital SMK PUSTEK Serpong</title>
    <link rel="icon" href="../dist/img/favicon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Sistem Raport Digital SMK PUSTEK Serpong">
    <meta name="keywords" content="raport, online, smk, pustek, serpong, web">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../dist/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
  <script language="javascript">
    function getkey(e)
    {
      if (window.event)
       return window.event.keyCode;
     else if (e)
       return e.which;
     else
       return null;
   }
   function goodchars(e, goods, field)
   {
    var key, keychar;
    key = getkey(e);
    if (key == null) return true;

    keychar = String.fromCharCode(key);
    keychar = keychar.toLowerCase();
    goods = goods.toLowerCase();

// check goodkeys
if (goods.indexOf(keychar) != -1)
  return true;
// control keys
if ( key==null || key==0 || key==8 || key==9 || key==27 )
 return true;

if (key == 13) {
  var i;
  for (i = 0; i < field.form.elements.length; i++)
    if (field == field.form.elements[i])
      break;
    i = (i + 1) % field.form.elements.length;
    field.form.elements[i].focus();
    return false;
  };
// else return false
return false;
}
</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
 <div class="wrapper">

  <header class="main-header">
   <!-- Logo -->
   <a href="<?php print $root; ?>on-admin" class="logo">
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
             Halo, Selamat datang <b><?php echo $_SESSION['username']; ?></b>
           </p>
      </a>
      <ul class="dropdown-menu">
      <!-- Menu Footer-->
      <li class="user-footer">
       <div class="pull-left">
        <a href="index.php" class="btn btn-default btn-flat">Akun Saya</a>
      </div>
      <div class="pull-right">
        <a href="<?php print $root;?>logout.php" class="btn btn-default btn-flat">Logout</a>
      </div>
    </li>
  </ul>
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
      <img src="<?php print $root; ?>/dist/img/user-default.png" class="img-circle" alt="User Image">
    </div>
    <div class="pull-left info">
      <p><?php echo $_SESSION['username']; ?></p>
      <a href="#"><i class="fa fa-circle text-success"></i>Administrator</a>
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
  print "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
}
}
$_SESSION['start_time'] = time();
?>
