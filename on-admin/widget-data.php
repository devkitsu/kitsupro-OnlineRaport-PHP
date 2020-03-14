
    <div class="row">
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <?php
            $sql = "SELECT * FROM siswa";
            $query = mysqli_query($con, $sql);
            $num = mysqli_num_rows($query);
            ?>
            <h3><?php print $num; ?></h3>

            <p>SISWA</p>
          </div>
          <div class="icon">
            <i class="fa fa-user"></i>
          </div>
          <a href="siswa.php" class="small-box-footer">Data Siswa <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <?php
            $sql = "SELECT * FROM guru";
            $query = mysqli_query($con, $sql);
            $num = mysqli_num_rows($query);
            ?>
            <h3><?php print $num; ?></h3>

            <p>GURU</p>
          </div>
          <div class="icon">
            <i class="fa fa-university"></i>
          </div>
          <a href="guru.php" class="small-box-footer">Data Guru <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
          <div class="inner">
            <?php
            $sql = "SELECT * FROM wali_murid";
            $query = mysqli_query($con, $sql);
            $num = mysqli_num_rows($query);
            ?>
            <h3><?php print $num; ?></h3>

            <p>WALI MURID</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="walimurid.php" class="small-box-footer">Data Wali Murid <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <?php
            $sql = "SELECT * FROM mata_pelajaran";
            $query = mysqli_query($con, $sql);
            $num = mysqli_num_rows($query);
            ?>
            <h3><?php print $num; ?></h3>

            <p>MATA PELAJARAN</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="mapel.php" class="small-box-footer">Data Mata Pelajaran <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
