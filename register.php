<!--<?php
include "config.php";
?>-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Raport Digital SMK PUSTEK Serpong</title>
  <link rel="icon" href="dist/img/favicon.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="dist/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition" background="dist/img/boxed-bg.jpg">

  <div class="login-box">
    <div class="login-logo">
      <img src="dist/img/smk.png" height="100" alt="logo SMK"/><br/>
      <!-- SISTEM INFORMASI AKADEMIK -->
    </div><!-- /.login-logo -->
    <div class="login-box-body">
      <p class="login-box-msg"><b>SISTEM INFORMASI RAPORT DIGITAL</b><br/>SMK PUSTEK Serpong</p>
      <p align="center" style="color: #CC0000;"></p>
      <form action="prosesregis.php" id="register" name="register" method="post">
        <div class="form-group has-feedback">
          <input type="text" id="username" name="username" class="form-control" autocomplete="off" placeholder="Username"  required="">
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password" id="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required="">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <select class="form-control selectlive" name="status" required="" >
              <option value="" selected disabled>- Daftar Sebagai -</option>
              <option value="Wali Murid">Wali Murid</option>
            </select>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
          </div><!-- /.col -->
        </div>
      </form>
      </div><!-- /.login-box-body -->
  </div><!-- /.login-box -->

  <!-- jQuery 2.1.4 -->
  <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap 3.3.5 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="plugins/iCheck/icheck.min.js"></script>
</body>
</html>
