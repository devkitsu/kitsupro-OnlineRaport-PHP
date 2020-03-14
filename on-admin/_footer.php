<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Sistem Raport Digital | SMK PUSTEK Serpong</b>
    </div>
    <strong>Copyright &copy; 2019 <a href="http://smk.pustekserpong.com" target="_blank">SMK PUSTEK Serpong</a></strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php print $root; ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php print $root; ?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap color picker -->
<script src="<?php print $root; ?>plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?php print $root; ?>plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- jQuery 2.2.3 -->
<script src="<?php print $root; ?>plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php print $root; ?>bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> -->
<!-- SlimScroll -->
<script src="<?php print $root; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php print $root; ?>plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php print $root; ?>dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php print $root; ?>dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
