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

$tc =  $row['tc'];


}


?>

<?php include 'header.php'; ?>
<?php include 'aside.php'; ?>


    <!-- End Navbar -->
    
    <?php
 $msg = $reg_user->runQuery("SELECT * FROM message WHERE subject='$subject'");
$msg->execute();
$show = $msg->fetch(PDO::FETCH_ASSOC);?>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="card mb-4">
            <div class="card-header p-3 pb-0">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <p class="text-sm mb-0">
                  <b> From:  <?php echo $show['sender_name']; ?></b>
                  <b>To:  <?php echo $row['fname']; ?> <?php echo $row['lname']; ?> </b>

                  </p>
                  <p class="text-sm">
                    <b>Date: <?php echo $show['date']; ?></b>
                  </p>
                </div>
 <img src="../assets/img/brand/blue.png" class="w-40 me-3 mb-0" alt="main_logo">              </div>
            </div>
            <div class="card-body p-5 pt-5">
              <hr class="horizontal dark mt-0 mb-6">
              <div class="row">
                <h2><?php echo $show['subject']; ?></h2>
                <div class="card-header p-3">
              <p class="mb-0"><?php echo $show['msg']; ?></p>
            </div>
                                                                   

                
                <hr class="horizontal dark mt-6 mb-0">
                <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                  <a href="inbox.php" class="btn bg-gradient-info mb-0">Close</a>

                </div>
             </div>
             
                </div>
                <div class="card-footer bg-secondary p-3 pb-0">
              <div class="row">
                <div class="card-body p-5  pt-4">
              <p class="mb-0 text-sm text-white">The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</p>
            </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
              <?php include 'footer.php'; ?>