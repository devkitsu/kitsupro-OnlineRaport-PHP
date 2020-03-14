<ul class="sidebar-menu">
  <li class="header"></li>
  <li>
    <a href="<?php print $root; ?>on-admin">
      <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
      <span class="pull-right-container"></span>
    </a>
  </li>
  <li>
    <a href="users.php">
      <i class="fa fa-user-circle-o"></i> <span>DATA PENGGUNA</span>
      <span class="pull-right-container"></span>
    </a>
  </li>

  <li class="treeview">
    <a href="#">
      <i class="fa fa-line-chart"></i>
      <span>DATA NILAI</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="nilai-amik.php"><i class="fa fa-circle-o"></i> Nilai Akademik</a></li>
      <li><a href="nilai-ekskul.php"><i class="fa fa-circle-o"></i> Nilai Ekstrakulikuler</a></li>
      <li><a href="nilai-pribadi.php"><i class="fa fa-circle-o"></i> Nilai Kepribadian</a></li>
      <li><a href="raport.php"><i class="fa fa-circle-o"></i> Nilai Raport</a></li>
  </ul>
  </li>

  <li>
    <a href="laporan.php">
      <i class="fa fa-newspaper-o"></i> <span>CETAK LAPORAN</span>
      <span class="pull-right-container"></span>
    </a>
  </li>

  <li>
    <a href="<?php print $root;?>logout.php">
      <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
      <span class="pull-right-container"></span>
    </a>
  </li>
</ul>
