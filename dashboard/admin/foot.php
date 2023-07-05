<footer class="footer">
             <div class="row align-items-center justify-content-xl-between">
          <div class="col-xl-6">
            <div class="copyright text-center text-xl-left text-muted">
              &copy; <script type="text/javascript">
var d = new Date()
document.write(d.getFullYear())
</script> Copyright: <a href="" class="font-weight-bold ml-1" target="_blank"> <?php echo $site_initial; ?></a>
            </div>
          </div>
         
        </div>                                       
      </footer>
    </div>
  </div>
  <!--   Core   -->
  <script src="../../assets/js/plugins/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/js/plugins/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!--   Optional JS   -->
  <script src="../../assets/js/plugins/chart.js/dist/Chart.min.js"></script>
  <script src="../../assets/js/plugins/chart.js/dist/Chart.extension.js"></script>
  <!--   Argon JS   -->
  <script src="../../assets/js/argon-dashboard.min.js?v=1.1.2"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "argon-dashboard-free"
      });
  </script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
  
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../assetsdash/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    
    <!--   Datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
      
    <!-- extension responsive -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    
    <script src="../assetsdash/vendors/chart.js/Chart.min.js"></script>
    <script src="../assetsdash/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.resize.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.categories.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.stack.js"></script>
    <script src="../assetsdash/vendors/flot/jquery.flot.pie.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assetsdash/js/off-canvas.js"></script>
    <script src="../assetsdash/js/hoverable-collapse.js"></script>
    <script src="../assetsdash/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assetsdash/js/dashboard.js"></script>
    <!-- End custom js for this page -->

        
    <script>
    $(document).ready(function() {
        $('table.display').DataTable({
            responsive: true
        });
    } );  
    
    </script>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

</body>

</html>