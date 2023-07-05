<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if(!isset($_SESSION['acc_no'])){
	
header("Location: login.php");
exit(); 
}

$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$stat = $row['status'];
if($stat == 'DORMANT/INACTIVE'){
	header('Location: summary.php?dormant');
	exit();
}$stat = $row['status'];
if($stat == 'ON HOLD'){
	header('Location: summary.php?hold');
	exit();
}
if(isset($_POST['transfer'])){
	$email = $row['email'];
	
	$amount = trim($_POST['amount']);
	$amount = strip_tags($amount);
	$amount = htmlspecialchars($amount);
	
	$acc_no = trim($_POST['acc_no']);
	$acc_no = strip_tags($acc_no);
	$acc_no = htmlspecialchars($acc_no);
	
	$acc_name = trim($_POST['acc_name']);
	$acc_name = strip_tags($acc_name);
	$acc_name = htmlspecialchars($acc_name);
	
	$bank_name = trim($_POST['bank_name']);
	$bank_name = strip_tags($bank_name);
	$bank_name = htmlspecialchars($bank_name);
	
	$swift = trim($_POST['swift']);
	$swift = strip_tags($swift);
	$swift = htmlspecialchars($swift);
	
	$routing = trim($_POST['routing']);
	$routing = strip_tags($routing);
	$routing = htmlspecialchars($routing);
		
	$type = trim($_POST['type']);
	$type = strip_tags($type);
	$type = htmlspecialchars($type);
	
	$remarks = trim($_POST['remarks']);
	$remarks = strip_tags($remarks);
	$remarks = htmlspecialchars($remarks);
	
		$cout = trim($_POST['cout']);
	$cout = strip_tags($cout);
	$cout = htmlspecialchars($cout);
	
		$transtype = trim($_POST['transtype']);
	$transtype = strip_tags($transtype);
	$transtype = htmlspecialchars($transtype);
	
	
	
	if($reg_user->temp($email,$amount,$acc_no,$acc_name,$bank_name,$swift,$routing,$type,$remarks,$cout,$transtype)){
if (isset($_SESSION['acc_no']))
	     $codeq = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 $sql = "UPDATE account SET tmp_otp = '$codeq' WHERE acc_no ='$acc_no'";
 if(mysqli_query($link, $sql))
 $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


$stmt = $reg_user->runQuery("SELECT * FROM bank_settings WHERE id = '1'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
	    
	$bank_name  = $row["bank_name"];
	$bank_address  = $row["bank_address"];
	$bank_domain  = $row["bank_domain"];

  $sender = "$bank_name"; /* sender id */
    $message = "Please enter this code to continue proceed your domestic transfer $code";


    $message = "<HTML>

<HEAD>
  <META name=GENERATOR content='MSHTML 11.00.9600.20139'>
</HEAD>

<BODY style='FONT-FAMILY: @Arial Unicode MS'>
  <table width='100%' align='center' bgcolor='#f3f3f3' border='0'>
    <tbody><span style='font-family: sans-serif;'>
      </span>
      <tr style='font-size: small; font-family: Arial, Helvetica, sans-serif; white-space: normal; word-spacing: 0px; text-transform: none; font-weight: 400; color: rgb(34, 34, 34); font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: rgb(243, 243, 243); text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;'><span style='font-family: sans-serif;'>
        </span>
        <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'>
    <span style='font-family: sans-serif;'>
          </span>
          <table style='height: 29px; width: 800px; padding: 30px 20px 10px;' cellspacing='0' width='900' align='center' bgcolor='white' border='0'>
            <tbody><span style='font-family: sans-serif;'>
              </span>
              <tr><span style='font-family: sans-serif;'>
                </span>
                <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;' align='center'><span style='font-family: sans-serif;'>
                  </span>
                  <table cellspacing='0' width='100%' border='0'>
                    <tbody><span style='font-family: sans-serif;'>
                      </span>
                      <tr><span style='font-family: sans-serif;'>
                        </span>
                        <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'><br><span style='font-family: sans-serif;'>
                          </span>
                          <table style='height: 38px; width: 97px;' cellspacing='0' width='97' align='right' border='0'>
                            <tbody><span style='font-family: sans-serif;'>
                              </span>
                              <tr><span style='font-family: sans-serif;'>
                                </span>
                                <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'><img style='height: 35px; width: 155px;' border='0' src='https://asia-shine.shop/assets/img/brand/blue.png' width='155' align='baseline' height='100'></td>
                              </tr>
                            </tbody>
                          </table><span style='font-family: sans-serif;'>
                          </span>
                          <table style='height: 67px; width: 274px;' cellspacing='0' width='274' align='left' border='0'>
                            <tbody><span style='font-family: sans-serif;'>
                              </span>
                              <tr><span style='font-family: sans-serif;'>
                                </span>
                                <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'><span style='font-family: sans-serif;'>Address:1829 collistions way</span><br><span style='font-family: sans-serif;'>Phone No: 238047322233</span></td>
                              </tr>
                            </tbody>
                          </table><br><br><br><br><span style='font-family: sans-serif;'>
                          </span>
                          <table style='height: 48px; width: 543px; padding: 30px 10px 10px;' align='center' bgcolor='white' border='0'>
                            <tbody><span style='font-family: sans-serif;'>
                              </span>
                              <tr><span style='font-family: sans-serif;'>
                                </span>
                                <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'><span style='font-size: 14px; font-family: sans-serif;'>Dear $fname $lname,</span><br><span style='font-size: 14px; font-family: sans-serif;'>Please enter OTP to complete your Transfer Process</span></td>
                              </tr>
                            </tbody>
                          </table><span style='font-family: sans-serif;'>
                          </span>
                          <table cellspacing='0' width='100%' border='0'>
                            <tbody><span style='font-family: sans-serif;'>
                              </span>
                              <tr><span style='font-family: sans-serif;'>
                                </span>
                                <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr><span style='font-family: sans-serif;'>
                      </span>
                      <tr></tr>
                    </tbody>
                  </table><span style='font-family: sans-serif;'>
                  </span>
                  <table style='height: 20px; width: 549px; padding: 5px 20px 3px;' align='center' bgcolor='#0076b6' border='0'>
                    <tbody><span style='font-family: sans-serif;'>
                      </span>
                      <tr><span style='font-family: sans-serif;'>
                        </span>
                        <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'><span style='font-family: sans-serif;'>
                          </span>
                          <h4 align='center'><span style='font-weight: bold; font-size: 32px; color: rgb(255, 255, 255); font-family: sans-serif;'>$codeq</span></h4>
                        </td>
                      </tr>
                    </tbody>
                    <tbody style='font-size: medium; font-family: Helvetica, Arial, serif; color: rgb(0, 0, 0);'><span style='font-family: sans-serif;'>
                      </span>
                      <tr><span style='font-family: sans-serif;'>
                        </span>
                        <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'></td>
                      </tr><span style='font-family: sans-serif;'>
                      </span>
                      <tr><span style='font-family: sans-serif;'>
                        </span>
                        <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'></td>
                      </tr>
                    </tbody>
                  </table><span style='font-family: sans-serif;'>
                  </span>
                  <table style='padding: 30px 20px 10px;' bgcolor='white' border='0'>
                    <tbody><span style='font-family: sans-serif;'>
                      </span>
                      <tr><span style='font-family: sans-serif;'>
                        </span>
                        <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'><br><img style='height: 43px; width: 311px;' border='0' src='https://asia-shine.shop/assets/img/brand/security.png' width='599' align='middle' height='83'></td>
                      </tr>
                    </tbody>
                  </table><span style='font-family: sans-serif;'>
                  </span>
                  <table style='height: 85px; width: 493px; padding: 10px 20px 30px;' bgcolor='white' border='0'>
                    <tbody><span style='font-family: sans-serif;'>
                      </span>
                      <tr><span style='font-family: sans-serif;'>
                        </span>
                        <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'><br><span style='font-family: sans-serif;'>Remember not to click any links in suspicious looking emails.</span></td>
                      </tr>
                    </tbody>
                  </table><span style='font-family: sans-serif;'>
                  </span>
                  <table style='padding: 30px 20px 50px;' bgcolor='#ef880b' border='0'>
                    <tbody><span style='font-family: sans-serif;'>
                      </span>
                      <tr><span style='font-family: sans-serif;'>
                        </span>
                        <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px; height: 114px;'><br><span style='background-color: rgba(0, 0, 0, 0); font-family: sans-serif;'>
                          </span><span style='background-color: rgba(0, 0, 0, 0); color: rgb(255, 255, 255); font-family: sans-serif;'>The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</span><br></td>
                      </tr>
                    </tbody>
                  </table><span style='background-color: rgb(242, 242, 242); color: rgb(255, 255, 255); font-family: sans-serif;'>
                  </span>
                  <table style='height: 46px; width: 27px; padding: 30px 20px 50px;' align='center' bgcolor='white' border='0'>
                    <tbody><span style='font-family: sans-serif;'>
                      </span>
                      <tr><span style='font-family: sans-serif;'>
                        </span>
                        <td style='font-family: Roboto, RobotoDraft, Helvetica, Arial, sans-serif; margin: 0px;'><br><span style='font-family: sans-serif;'>$Bank_Name</span><br><img style='height: 32px; width: 77px;' border='0' src='https://asia-shine.shop/assets/img/brand/fdc.png' width='642' align='middle' height='258'></td>
                      </tr>
                    </tbody>
                  </table><span style='background-color: rgb(243, 243, 243); font-family: sans-serif; font-size: 13px; font-weight: bold;'>&nbsp;</span>
                </td>
              </tr>
            </tbody>
          </table>
        </td>
      </tr>
    </tbody>
  </table>
</BODY>

</HTML>


";

  
    $acc_no = $_SESSION['acc_no'];

    $queri = " UPDATE account SET tmp_otp = '$codeq' WHERE acc_no ='$acc_no'";
    $resulti = mysqli_query($connection, $queri) or die(mysqli_error($connection));


$subject = "Confirm Transfer OTP";
  $reg_user->send_mail($row['email'], $message, $subject);
      $acc_no = $_SESSION['acc_no'];
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

	     $reg_user->send_mail($row['email'], $message, $subject);
        $phone = preg_replace('/[^0-9]/', '', $row['phone']);
        $mobile_msg = "Dear " . $row['fname'] . ", Please use the One Time Passcode (OTP): " . $codeq . " to complete your Transfer process";
        //$reg_user->otp($phone,$mobile_msg);
       
	header("Location: verify.php");
	}
	
}
	

?>


 <?php include 'header.php'; ?>
 
 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'mobmenu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
   <!---begin of Main Menu View View Here   only from Digital Forest Team-->
   <?php include 'mainmenu.php'; ?>

     <!---End of Main Menu View Here   only from Digital Forest Team-->
     
     
     
  
    <div class="container-fluid mt--7">
      
      
      
      
      
      
      
     <div class="row">
       
        <div class="col-xl-8 order-xl-1"><br><br>
          <div class="card bg"> 
           <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Same-Bank Transfer</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Help</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
              
              <form autocomplete="off" method="post" >
          
                              <?php if(isset($error)){ echo $error;}?>
                    			    				<?php if(isset($errorcot)){ echo $errorcot;}?>
                    								<?php if(isset($errortax)){ echo $errortax;}?>
                    								<?php if(isset($errorpin)){ echo $errorpin;}?>
                    								<?php if(isset($insufficient)){ echo $insufficient;}?>
                    								<?php if(isset($amounterror)){ echo $amounterror;}?>
                    									<?php if(isset($errorotp)){ echo $errorotp;}?>
                    									
                <h6 class="heading-small text-muted mb-4">Compulsory Transfer Form</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Amount (<?php echo $row['currency']; ?>)</label>
                        <input id="input-username" class="form-control form-control-alternative"  placeholder="Eg 23678" name="amount" type="number" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Beneficiary Account Name</label>
                        <input id="input-email" class="form-control form-control-alternative" placeholder="Beneficiary Name" name="acc_name" type="text" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Beneficiary Account Number</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative"  placeholder="Beneficiary Account Number" name="acc_no" type="number" required>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Bank Name</label>
                        <input id="input-last-name" class="form-control form-control-alternative" placeholder="Bank Name" name="bank_name" type="text" required>
                        <input type="hidden" class="form-control" name="uname" value="<?php echo $row['email']; ?> "/>
                      </div>
                    </div>
                    
                    
                    <input class="form-control" placeholder="Bank Address" name="swift" type="hidden" value="DOMESTIC" required>
                    <input class="form-control" placeholder="Swiftcode" name="routing" type="hidden" value="DOMESTIC" required>  
                    <input class="form-control" placeholder="Swiftcode" name="cout" type="hidden" value="Domestic-Transfer" required> 
                    <input class="form-control" placeholder="Swiftcode" name="transtype" type="hidden" value="DOMESTIC" required>
                    
                    
                  </div>
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Naration/Purpose</label>
                        <textarea class="form-control" placeholder="Funds Description" name="remarks" type="text" required></textarea>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Select Account Type</label>
                        <select class="form-control form-control-alternative" name="inline_radio" required >
                                        <option value="">Select Account Type</option>
                                        <option value="Savings">Savings Account</option>
                                        <option value="Current">Current Account</option>
                                        <option value="Checking">Checking Account</option>
                                        <option value="Fixed Deposit">Fixed Deposit</option>
                                        <option value="Non Resident">Non Resident Account</option>
                                        <option value="Online Banking">Online Banking</option>
                                        <option value="Domicilary Account">Domicilary Account</option>
                                        <option value="Joint Account">Joint Account</option>
                        </select>    
                      </div>
                    </div>
                  </div>
                  
                    
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Account Owner Authorization</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                         <button class="btn btn-warning" type="submit" name="transfer"> Make Transfer>></button>
                      </div>
                    </div>
                  </div>
                 
                </div>
                
              </form>
              
              
              
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     