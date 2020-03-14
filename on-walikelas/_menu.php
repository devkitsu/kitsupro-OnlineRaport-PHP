<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATION</li>
  <li>
    <a href="<?php print $root;?>on-walikelas">
      <i class="fa fa-dashboard"></i> <span>DASHBOARD</span>
      <span class="pull-right-container"></span>
    </a>
  </li>
  <li>
    <a href="account.php">
      <i class="fa fa-user-circle-o"></i> <span>DATA PRIBADI</span>
      <span class="pull-right-container"></span>
    </a>
  </li>
  <li>
    <a href="raport.php">
      <i class="fa fa-book"></i> <span>DATA RAPORT</span>
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
      <li><a href="nilai-amik.php"><i class="fa fa-circle-o"></i> Nilai Akademik <br> &ensp;&ensp;&nbsp; dan Praktek</a></li>
      <li><a href="nilai-pribadi.php"><i class="fa fa-circle-o"></i> Nilai Kepribadian <br> &ensp;&ensp;&nbsp; dan Ekstrakulikuler</a></li>
  </ul>
  </li>
  <li>
    <a href="<?php print $root; ?>logout.php">
      <i class="fa fa-sign-out"></i> <span>LOGOUT</span>
      <span class="pull-right-container"></span>
    </a>
  </li>

</ul>
