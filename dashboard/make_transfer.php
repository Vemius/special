<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if(!isset($_SESSION['acc_no'])){
	
header("Location: login.php");
exit(); 
}
$reg_user = new USER();

$user_home = new USER();


$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_GET['subject'])){
	
$subject=$_GET['subject'];	

$msg = $reg_user->runQuery("SELECT * FROM message WHERE subject='$subject'");
$msg->execute();
$show = $msg->fetch(PDO::FETCH_ASSOC);


}


?>

<?php include 'header.php'; ?>
<?php include 'aside.php'; ?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card mb-4">
            <div class="card-header p-3 pb-0">
              <div class="d-flex justify-content-between mt-3 mx-auto align-items-center">
                  <h5>Welcome to your transfer options.</h5>
 <img src="../assets/img/brand/blue.png" class="w-20 me-3 mb-0" alt="main_logo">              </div>
            </div>
          
            <div class="card-body">
              <hr class="horizontal dark">
                  <h6>Select Transfer mode to continue</h6>
                  <p class="text-sm mb-0">                  </p>                </div
                <div class="card-header p-3">
              <p class="mb-0">
                </div</div>
                  </a></div></p>
            </div><div class="col-8 mx-auto">
                <div class="row">
                   <div class="col-sm p-3">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="">
                          <a class="" href="samebank_transfer.php">
                        <img src="../assets/img/favicon.png" style="
    width: 65px;">
                      </a></div><a class="" href="samebank_transfer.php">
                    </a></div><a class="" href="samebank_transfer.php">
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0"><?php echo $site_initial; ?> account</h6>
                      <span class="text-xs">Bank Transfer</span>
                      <hr class="horizontal dark my-3">
                    </div>
                  </a></div></div>
                   <div class="col-sm p-3">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                          <a class="" href="other_transfer.php">
                        <i class="fas fa-landmark opacity-10" aria-hidden="true"></i>
                      </a></div><a class="" href="other_transfer.php">
                    </a></div><a class="" href="other_transfer.php">
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Other Bank</h6>
                      <span class="text-xs">Bank Transfer</span>
                      <hr class="horizontal dark my-3">
                    </div>
                  </a></div></div>
                  <div class="col-sm p-3">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-success shadow text-center border-radius-lg">
                          <a class="" href="international_transfer.php">
                        <i class="fas fa-landmark opacity-10" aria-hidden="true"></i>
                      </a></div><a class="" href="international_transfer.php">
                    </a></div><a class="" href="international_transfer.php">
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Wire / international</h6>
                      <span class="text-xs">Bank Transfer</span>
                      <hr class="horizontal dark my-3">
                    </div></div>
                     <hr class="horizontal dark mt-6 mb-0">     
             
                </div>
                <div class="card-footer bg-secondary p-3 pb-0">
              
                </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
              <?php include 'footer.php'; ?>