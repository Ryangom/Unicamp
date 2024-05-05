<footer class="main-footer d-flex justify-content-center" style="color:white">
    <strong>Copyright &copy; 2019-2021 <a href="#">Unicamp</a>.</strong>
    All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="./assets/dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script>
  $('.aa').click(function(){
                  var p=document.getElementById('std');
                  var wme =window.open("","","width=900,height=700");
                  wme.document.write(p.outerHTML);
                  wme.focus();
                  wme.print();
                  wme.close();
                })

</script>

<script src="./assets/js/admin.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="assets/dist/js/demo.js"></script>
<script src="assets/dist/js/pages/dashboard2.js"></script> -->
</body>
</html>