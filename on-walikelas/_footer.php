<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Sistem Raport Digital | SMK PUSTEK Serpong</b>
  </div>
  <strong>Copyright &copy; 2019 <a href="http://smk.pustekserpong.com" target="_blank">SMK PUSTEK Serpong</a></strong>
</footer>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable({
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
    $("#example3").DataTable({
      "scrollX": true,
      "paging": false,
      "lengthChange": true,
      "searching": false,
      "ordering": false,
      "info": false,
      "autoWidth": true
    });
  });
</script>
</body>
</html>
