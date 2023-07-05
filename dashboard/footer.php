
 <div class="crip">
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="ba825368-2ca1-4ad0-af5b-d338faefd0d8";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>
  <footer class="footer py-4">
     
    <div class="container">
      <div class="row ">
        <div class="col-lg-12 mb-0 mx-auto text-center text-sm d-none d-lg-block">
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">© <script>
                  document.write(new Date().getFullYear())
                </script>, <i class="fa fa-bank"> <?php echo $site_initial; ?></a></i>                   

          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-l-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Terms | Conditions
          </a>
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Security Tips
          </a>
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Privacy
          </a>
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Policy
          </a>
     
        </div>
      </div>
    </div>
  </footer>
  


  <!--   Core JS Files   -->
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
    $(document).ready(function () {
        $('table#example').DataTable({
        "searching": true,
        "paging": true,
        "order": [[ 0, 'desc' ]],  
        responsive: true


} );
});
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