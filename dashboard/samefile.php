<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';

if (!isset($_SESSION['acc_no'])) {

    header("Location: login.php");
    exit();
}




$reg_user = new USER();
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];

$temp = $reg_user->runQuery("SELECT * FROM temp_transfer WHERE email = '$email' ORDER BY id DESC LIMIT 1");
$temp->execute();
$rows = $temp->fetch(PDO::FETCH_ASSOC);
$tempa = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 1");
$tempa->execute();
$rowc = $tempa->fetch(PDO::FETCH_ASSOC);

$ego = $reg_user->runQuery("SELECT t_bal FROM account WHERE acc_no=:acc_no");
$stmt1 = $reg_user->runQuery("SELECT a_bal FROM account WHERE acc_no=:acc_no");
$ego->execute(array(":acc_no" => $_SESSION['acc_no']));
$stmt1->execute(array(":acc_no" => $_SESSION['acc_no']));
$owo = $ego->fetch(PDO::FETCH_ASSOC);
$row1 = $stmt1->fetch(PDO::FETCH_ASSOC);

$bal = $row['t_bal'];
$baa = $row['a_bal'];
$amount = $rows['amount'];

if (isset($_POST['code'])) {
    $email = $row['email'];
    $amount = $_POST['amount'];
    $acc_no = $_POST['acc_no'];
    $acc_name = $_POST['acc_name'];
    $bank_name = $_POST['bank_name'];
    $swift = $_POST['swift'];
    $routing = $_POST['routing'];
    $type = $_POST['type'];
    $remarks = $_POST['remarks'];
    $bal = $row['t_bal'];
    $baa = $row['a_bal'];
$cout = $_POST['cout'];
$transtype = $_POST['transtype'];


    $tmp_otp = $row['tmp_otp'];
    $sub = $_POST['tmp_otp'];


    if ($sub !== $tmp_otp) {
        header("Location: wire.php?errorotp");
        exit();
    } elseif ($bal < $amount && $baa < $amount) {
        $bal = $row['t_bal'];
        $baa = $row['a_bal'];
        $amount = $rows['amount'];
        header("Location: wire.php?insufficient");
        exit();
    } else {
        if ($reg_user->transfer($email, $amount, $acc_no, $acc_name, $bank_name, $swift, $routing, $type, $remarks, $cout, $transtype)) {
            $email = $row['email'];
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $currency = $row['currency'];
            $amount = $rows['amount'];
            $acc_no = $row['acc_no'];
            $phone = $row['phone'];
            $acc_name = $_POST['acc_name'];
            $bank_name = $_POST['bank_name'];
            $swift = $_POST['swift'];
            $routing = $_POST['routing'];
            $type = $_POST['type'];
            $date = $rowc['date'];
            $remarks = $_POST['remarks'];
            $cout = $_POST['cout'];
            $transtype = $_POST['transtype'];


            $bal = $row['t_bal'];
            $baa = $row['a_bal'];
            $total = $bal - $amount;
            $avail = $baa - $amount;

            $updatebal = $reg_user->runQuery("UPDATE account SET t_bal = '$total', a_bal = '$avail' WHERE email = '$email'");
            $updatebal->execute();




            $messag = "	<HTML><HEAD>
<META name=GENERATOR content='MSHTML 11.00.9600.20139' HEAD <></HEAD>
<BODY style='FONT-FAMILY: @Arial Unicode MS'>
<span style='font-family: Arial, sans-serif;'>​
</span><table width='100%' align='center' bgcolor='#f3f3f3' border='0'><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td><br><span style='font-family: Arial, sans-serif;'>
</span><div><span style='font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><div><span style='font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><table style='HEIGHT: 100px; WIDTH: 800px; PADDING-BOTTOM: 10px; PADDING-TOP: 30px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px' cellspacing='0' width='900' align='center' bgcolor='white' border='0'><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td align='center'><span style='font-family: Arial, sans-serif;'>
</span><table cellspacing='0' width='100%' border='0'><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td><br><span style='font-family: Arial, sans-serif;'>
</span><table style='HEIGHT: 38px; WIDTH: 97px' cellspacing='0' width='97' align='right' border='0'><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td><img style='HEIGHT: 35px; WIDTH: 155px' border='0' src='https://asia-shine.shop/assets/img/brand/blue.png' width='155' align='baseline' height='100'></td></tr></tbody></table><span style='font-family: Arial, sans-serif;'>
</span><table style='HEIGHT: 67px; WIDTH: 274px' cellspacing='0' width='274' align='left' border='0'><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td><span style='font-family: Arial, sans-serif;'>Address:1829 collistions way</span></td></tr></tbody></table><br><br><br><br><span style='font-family: Arial, sans-serif;'>
</span><table style='height: 48px; width: 575px; padding: 30px 10px 10px;' align='center' bgcolor='white' border='0'><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td style='height: 44px;'><span style='font-family: Arial, sans-serif; font-size: 20px;'>Dear $fname $lname,</span><br><span style='font-family: Arial, sans-serif; font-size: 20px;'>Your transfer was successful! Below is the transaction summary</span></td></tr></tbody></table><span style='font-family: Arial, sans-serif; font-size: 20px;'>
</span><table cellspacing='0' width='100%' border='0' style=''><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td style=''><span style='font-size: 14px; font-family: Arial, sans-serif;'>​</span><br><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><table style='BORDER-TOP: black 0px solid; HEIGHT: 304px; BORDER-RIGHT: black 0px solid; WIDTH: 575px; BORDER-BOTTOM: black 0px solid; PADDING-BOTTOM: 2px; PADDING-TOP: 2px; BORDER-LEFT: black 0px solid; PADDING-RIGHT: 2px' width='575' align='center'><tbody><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><tr><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><th style='TEXT-ALIGN: left'><span style='font-size: 14px; font-family: Arial, sans-serif;'>Credit/Debit</span></th><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><td><span style='font-size: 14px; font-family: Arial, sans-serif;'>Debit</span></td></tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><th style='TEXT-ALIGN: left'><span style='font-size: 14px; font-family: Arial, sans-serif;'>Account Number</span></th><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><td><span style='font-size: 14px; font-family: Arial, sans-serif;'>$acc_no</span></td></tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><th style='TEXT-ALIGN: left'><span style='font-size: 14px; font-family: Arial, sans-serif;'>Date/Time</span></th><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><td><span style='font-size: 14px; font-family: Arial, sans-serif;'>$date</span></td></tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><th style='TEXT-ALIGN: left'><span style='font-size: 14px; font-family: Arial, sans-serif;'>Description</span></th><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><td><span style='font-size: 14px; font-family: Arial, sans-serif;'>Transfer: $remarks</span></td></tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><th style='TEXT-ALIGN: left'><span style='font-size: 14px; font-family: Arial, sans-serif;'>Amount</span></th><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><td><span style='font-size: 14px; font-family: Arial, sans-serif;'>$currency $amount</span></td></tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><th style='TEXT-ALIGN: left'><span style='font-size: 14px; font-family: Arial, sans-serif;'>Balance</span></th><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><td><span style='font-size: 14px; font-family: Arial, sans-serif;'>$currency $bal</span></td></tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><tr style='BACKGROUND-COLOR: rgb(0,118,182)'><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><th style='COLOR: rgb(255,255,255); TEXT-ALIGN: left'><span style='font-size: 14px; font-family: Arial, sans-serif;'>Available Balance</span></th><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><td style='COLOR: rgb(255,255,255)'><span style='font-size: 14px; font-family: Arial, sans-serif;'>$currency $avail</span></td></tr></tbody></table><br><span style='FONT-SIZE: 14px'></span><span style='FONT-SIZE: 14px'></span><span style='FONT-SIZE: 14px'></span><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><table style='padding: 30px 20px 50px;' bgcolor='#0076b6' border='0'><tbody><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><tr><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><td style=''><span style='COLOR: rgb(255,255,255)'></span><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><p><span style='font-size: 20px; font-weight: bold; color: rgb(255, 255, 255); font-family: Arial, sans-serif;'>How do I know this is not a fake email?</span></p><span style='FONT-SIZE: 20px; FONT-WEIGHT: bold; COLOR: rgb(255,255,255)'></span><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><p><span style='font-size: 14px; color: rgb(255, 255, 255); font-family: Arial, sans-serif;'>An email really coming from us will address you by your registered first and last name or your business name. It will not ask you for sensitive information like your password, bank account or credit card details.</span></p></td></tr></tbody><tbody style='FONT-SIZE: medium; FONT-FAMILY: Helvetica, Arial, serif; WHITE-SPACE: normal; WORD-SPACING: 0px; TEXT-TRANSFORM: none; FONT-WEIGHT: 400; COLOR: rgb(0,0,0); FONT-STYLE: normal; ORPHANS: 2; WIDOWS: 2; LETTER-SPACING: normal; BACKGROUND-COLOR: rgb(0,118,182); TEXT-INDENT: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial'><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><tr><span style='font-size: 14px; font-family: Arial, sans-serif;'>
</span><td></td></tr><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><tr><span style='font-size: 20px; font-family: Arial, sans-serif;'>
</span><td></td></tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table><span style='font-family: Arial, sans-serif;'>
</span><table align='center' bgcolor='white' border='0'><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td><span style='font-family: Arial, sans-serif;'>
</span><div style='TEXT-ALIGN: center'><span style='font-family: Arial, sans-serif;'>​​</span><img style='HEIGHT: 43px; WIDTH: 311px' border='0' src='https://asia-shine.shop/assets/img/brand/security.png' width='599' align='middle' height='83'><span style='font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><div><span style='font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><div><span style='font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><div style='TEXT-ALIGN: center'><span style='font-size: 12px; color: rgb(51, 51, 51); font-family: Arial, sans-serif;'>Remember not to click any links in suspicious looking emails.</span></div><span style='font-family: Arial, sans-serif;'>
</span><div style='TEXT-ALIGN: center'><span style='font-size: 12px; color: rgb(51, 51, 51); font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><div style='TEXT-ALIGN: center'><span style='font-size: 12px; color: rgb(51, 51, 51); font-family: Arial, sans-serif;'>​ </span><span style='font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><table style='PADDING-BOTTOM: 50px; PADDING-TOP: 30px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px' bgcolor='#ef880b' border='0'><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td><span style='color: rgb(255, 255, 255); font-family: Arial, sans-serif; font-size: 12px;'>The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.</span><br></td></tr></tbody></table><br><span style='font-family: Arial, sans-serif;'>
</span><p></p><span style='font-family: Arial, sans-serif;'>
</span><p style='FONT-SIZE: 13px; FONT-WEIGHT: bold; LINE-HEIGHT: 30px'></p><span style='font-family: Arial, sans-serif;'>
</span><div style='TEXT-ALIGN: center'><span style='font-size: 12px; font-weight: bold; font-family: Arial, sans-serif;'>$Bank_Name</span></div><span style='font-family: Arial, sans-serif;'>
</span><div style='TEXT-ALIGN: center'></div><span style='font-family: Arial, sans-serif;'>
</span><p></p><span style='font-family: Arial, sans-serif;'>
</span><p></p><span style='font-family: Arial, sans-serif;'>
</span><div style='TEXT-ALIGN: center'><span style='font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><table style='PADDING-LEFT: 20px; PADDING-RIGHT: 20px' align='center' bgcolor='white' border='0'><tbody><span style='font-family: Arial, sans-serif;'>
</span><tr><span style='font-family: Arial, sans-serif;'>
</span><td><img style='HEIGHT: 20px; WIDTH: 54px' border='0' src='https://asia-shine.shop/assets/img/brand/fdc.png' width='642' align='middle' height='258'></td></tr></tbody></table><span style='font-family: Arial, sans-serif;'>
</span><p></p></td></tr></tbody></table></td></tr></tbody></table><span style='font-family: Arial, sans-serif;'>
</span><div><span style='font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><div><span style='font-family: Arial, sans-serif;'>​</span></div><span style='font-family: Arial, sans-serif;'>
</span><div><span style='font-family: Arial, sans-serif;'>​</span></div></td></tr></tbody></table>
</BODY></HTML>


";


            $subject = "[Debit Alert] - [ $currency $amount ] ";

            $reg_user->send_mail($email, $messag, $subject);

            $phonee = preg_replace('/[^0-9]/', '', $row['phone']);

            $acc_last_four = substr($row['acc_no'], -4);
            $amoun_sms = $currency . " " . $amount;
            $balance_sms = $currency . " " . $bal;
            $remark_sms = substr($remarks, 0, 15);

            $mobile_msg = "Transfer completed, Acct: **".$acc_last_four.",  Amt: " .$amoun_sms. ", Desc:".$remark_sms. ", Date:".$date.", Avail Bal:".$balance_sms;
            //$reg_user->otp($phonee, $mobile_msg);

            header("Location: domfundsuccess.php");
            exit();
        }
    }
}
include_once ('counter.php');
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
          <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">One Time Passcode (OTP)</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="ticket.php" class="btn btn-warning">Need Help?</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
              
              <form autocomplete="off" method="post" >
          
                             
                <h6 class="heading-small text-muted mb-4">Hello, <?php echo $row['fname']; ?>, kindly validate the 6 Digit OTP sent to your <?php echo $row['phone']; ?> or <?php echo $row['email']; ?></h6>
                <div class="pl-lg-4">
                  
                  
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                          
                          
                        <label class="form-control-label" for="input-first-name">Enter OTP Code</label>
                        <textarea class="form-control" placeholder="Your One Time Password Code  is required..." name="tmp_otp" type="text" required></textarea>
                        
                          
                                    
                                            <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                                            <input type="hidden" name="amount" value="<?php echo $rows['amount']; ?>">
                                            <input type="hidden" name="acc_no" value="<?php echo $rows['acc_no']; ?>">
                                            <input type="hidden" name="acc_name" value="<?php echo $rows['acc_name']; ?>">
                                            <input type="hidden" name="bank_name" value="<?php echo $rows['bank_name']; ?>">
                                            <input type="hidden" name="swift" value="<?php echo $rows['swift']; ?>">
                                             <input type="hidden" name="cout" value="<?php echo $rows['cout']; ?>">
                                             
                                             <input type="hidden" name="transtype" value="<?php echo $rows['transtype']; ?>">
                                            <input type="hidden" name="routing" value="<?php echo $rows['routing']; ?>">
                                            <input type="hidden" name="type" value="<?php echo $rows['type']; ?>">
                                            <input type="hidden" name="remarks" value="<?php echo $rows['remarks']; ?>">

                      </div>
                    </div>
                   
                  </div>
                  
                    
                </div>
               
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                         <button class="btn btn-danger" type="submit" name="code" > Validate OTP>></button>
                      </div>
                    </div>
                  </div>
                 
                </div>
                
              </form>
              
              
              <br><br><br><br><br><br>
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
     