<?php

session_start();
require_once ('class.admin.php');
include_once ('session.php');

$reg_user = new USER();

if (!isset($_SESSION['email'])) {

    header("Location: login.php");

    exit();
}

$stmt = $reg_user->runQuery("SELECT * FROM account");
$stmt->execute();

$credit = $reg_user->runQuery("SELECT * FROM account");
$credit->execute();

$debit = $reg_user->runQuery("SELECT * FROM account");
$debit->execute();

$mail = $_SESSION['email'];

$ad = $reg_user->runQuery("SELECT * FROM admin WHERE email = '$mail'");
$ad->execute();
$rom = $ad->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['edit'])) {
    $pass = $_POST['upass1'];
    $cpass = $_POST['upass'];
    $email = $_POST['email'];

    if ($cpass !== $pass) {
        $msg = "<div class='alert alert-danger'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sorry!</strong>  Passwords Doesn't match. 
						</div>";
    } else {
        $password = md5($cpass);
        $ed = $reg_user->runQuery("UPDATE admin SET email = '$email', upass = :upass WHERE email=:email");
        $ed->execute(array(":upass" => $password, ":email" => $_SESSION['email']));

        $msg = "<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Login Details Was Successfully Changed!</strong>
						</div>";
    }
}

if (isset($_POST['his'])) {
    $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);

    $amount = trim($_POST['amount']);
    $amount = strip_tags($amount);
    $amount = htmlspecialchars($amount);

    $sender_name = trim($_POST['sender_name']);
    $sender_name = strip_tags($sender_name);
    $sender_name = htmlspecialchars($sender_name);

    $type = trim($_POST['type']);
    $type = strip_tags($type);
    $type = htmlspecialchars($type);

    $remarks = trim($_POST['remarks']);
    $remarks = strip_tags($remarks);
    $remarks = htmlspecialchars($remarks);

    $date = trim($_POST['date']);
    $date = strip_tags($date);
    $date = htmlspecialchars($date);

    $time = trim($_POST['time']);
    $time = strip_tags($time);
    $time = htmlspecialchars($time);

    $alerts = $reg_user->runQuery("SELECT * FROM alerts");
    $alerts->execute();

    if ($reg_user->his($uname, $amount, $sender_name, $type, $remarks, $date, $time)) {
        $id = $reg_user->lasdID();


        $msg = "<div class='alert alert-info'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>History Successfully Added!</strong> 
			  </div>";
    } else {
        $msg = "Error!";
    }
}

if (isset($_POST['credit'])) {
    $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);

    $amount = trim($_POST['amount']);
    $amount = strip_tags($amount);
    $amount = htmlspecialchars($amount);

    $sender_name = trim($_POST['sender_name']);
    $sender_name = strip_tags($sender_name);
    $sender_name = htmlspecialchars($sender_name);

    $type = trim($_POST['type']);
    $type = strip_tags($type);
    $type = htmlspecialchars($type);

    $remarks = trim($_POST['remarks']);
    $remarks = strip_tags($remarks);
    $remarks = htmlspecialchars($remarks);
    
     $statz = trim($_POST['statz']);
    $statz = strip_tags($statz);
    $statz = htmlspecialchars($statz);

    $date = trim($_POST['date']);
    $date = strip_tags($date);
    $date = htmlspecialchars($date);

    $time = trim($_POST['time']);
    $time = strip_tags($time);
    $time = htmlspecialchars($time);



    if ($reg_user->his($uname, $amount, $sender_name, $type, $remarks, $date, $time, $statz)) {
        $read = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$uname'");
        $read->execute();
        $show = $read->fetch(PDO::FETCH_ASSOC);

        $currency = $show['currency'];
        $acc = $show['acc_no'];
        $fname = $show['fname'];
        $mname = $show['mname'];
        $lname = $show['lname'];
        $email = $show['email'];
        $phone = $show['phone'];
        $tbal = $show['t_bal'];
        $abal = $show['a_bal'];
        $diff = $amount + $tbal;
        $dif = $amount + $abal;

        $credited = $reg_user->runQuery("UPDATE account SET t_bal = '$diff', a_bal = '$dif' WHERE acc_no = '$uname'");
        $credited->execute();

        $id = $reg_user->lasdID();




        $messag = "<!DOCTYPE html>
<html>
 <head>
  <title>
  </title>
  <meta content='summary_large_image' name='twitter:card'>
  <meta content='website' property='og:type'>
  <meta content='' property='og:description'>
  <meta content='https://zm14avf184.preview-posted-stuff.com/V2-8rP5-13st-ZEaa0-47nU/' property='og:url'>
  <meta content='https://pro-bee-beepro-thumbnails.s3.amazonaws.com/messages/758056/741484/1463243/7168554_large.jpg' property='og:image'>
  <meta content='' property='og:title'>
  <meta content='' name='description'>
  <meta charset='utf-8'>
  <meta content='width=device-width' name='viewport'>
  <style>
   .bee-row,
		.bee-row-content {
			position: relative
		}

		.bee-html-block {
			text-align: center
		}

		.bee-row-1,
		.bee-row-11,
		.bee-row-2,
		.bee-row-3,
		.bee-row-4,
		.bee-row-5,
		.bee-row-6,
		.bee-row-7,
		.bee-row-8,
		.bee-row-8 .bee-row-content,
		.bee-row-9 {
			background-repeat: no-repeat
		}

		body {
			background-color: #fff;
			color: #000;
			font-family: Arial, Helvetica Neue, Helvetica, sans-serif
		}

		a {
			color: #0068a5
		}

		* {
			box-sizing: border-box
		}

		body,
		p {
			margin: 0
		}

		.bee-row-content {
			max-width: 500px;
			margin: 0 auto;
			display: flex
		}

		.bee-row-content .bee-col-w4 {
			flex-basis: 33%
		}

		.bee-row-content .bee-col-w6 {
			flex-basis: 50%
		}

		.bee-row-content .bee-col-w8 {
			flex-basis: 67%
		}

		.bee-row-content .bee-col-w12 {
			flex-basis: 100%
		}

		.bee-divider,
		.bee-image {
			overflow: auto
		}

		.bee-divider .center,
		.bee-image .bee-center {
			margin: 0 auto
		}

		.bee-row-1 .bee-col-2 .bee-block-1,
		.bee-row-11 .bee-col-1 .bee-block-2 {
			width: 100%
		}

		.bee-image img {
			display: block;
			width: 100%
		}

		.bee-text {
			overflow-wrap: anywhere
		}

		@media (max-width:520px) {
			.bee-row-content:not(.no_stack) {
				display: block
			}
		}

		.bee-row-1 .bee-row-content,
		.bee-row-10 .bee-row-content,
		.bee-row-11 .bee-row-content,
		.bee-row-12 .bee-row-content,
		.bee-row-2 .bee-row-content,
		.bee-row-3 .bee-row-content,
		.bee-row-4 .bee-row-content,
		.bee-row-5 .bee-row-content,
		.bee-row-6 .bee-row-content,
		.bee-row-7 .bee-row-content,
		.bee-row-9 .bee-row-content {
			background-repeat: no-repeat;
			color: #000
		}

		.bee-row-1 .bee-col-1,
		.bee-row-1 .bee-col-2,
		.bee-row-10 .bee-col-1,
		.bee-row-11 .bee-col-1,
		.bee-row-12 .bee-col-1,
		.bee-row-2 .bee-col-1,
		.bee-row-3 .bee-col-1,
		.bee-row-3 .bee-col-2,
		.bee-row-4 .bee-col-1,
		.bee-row-4 .bee-col-2,
		.bee-row-5 .bee-col-1,
		.bee-row-5 .bee-col-2,
		.bee-row-6 .bee-col-1,
		.bee-row-6 .bee-col-2,
		.bee-row-7 .bee-col-1,
		.bee-row-7 .bee-col-2,
		.bee-row-8 .bee-col-1,
		.bee-row-8 .bee-col-2,
		.bee-row-9 .bee-col-1 {
			padding-bottom: 5px;
			padding-top: 5px
		}

		.bee-row-1 .bee-col-1 .bee-block-1,
		.bee-row-10 .bee-col-1 .bee-block-2,
		.bee-row-11 .bee-col-1 .bee-block-3,
		.bee-row-12 .bee-col-1 .bee-block-2,
		.bee-row-2 .bee-col-1 .bee-block-1,
		.bee-row-2 .bee-col-1 .bee-block-3,
		.bee-row-2 .bee-col-1 .bee-block-4,
		.bee-row-3 .bee-col-1 .bee-block-1,
		.bee-row-3 .bee-col-2 .bee-block-1,
		.bee-row-4 .bee-col-1 .bee-block-1,
		.bee-row-4 .bee-col-2 .bee-block-1,
		.bee-row-5 .bee-col-1 .bee-block-1,
		.bee-row-5 .bee-col-2 .bee-block-1,
		.bee-row-6 .bee-col-1 .bee-block-1,
		.bee-row-6 .bee-col-2 .bee-block-1,
		.bee-row-7 .bee-col-1 .bee-block-1,
		.bee-row-7 .bee-col-2 .bee-block-1,
		.bee-row-8 .bee-col-1 .bee-block-1,
		.bee-row-8 .bee-col-2 .bee-block-1 {
			padding: 10px
		}

		.bee-row-8 .bee-row-content {
			background-color: #36b8ff;
			color: #000
		}

		.bee-row-10 {
			background-color: #364fff
		}

		.bee-row-12 {
			background-color: #f6730e
		}
  </style>
 </head>
 <body>
  <div class='bee-page-container'>
   <div class='bee-row bee-row-1'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w8'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 10px; line-height: 12px;'>
         <span style='font-size: 10px; line-height: 12px;'>
          $bank_address
         </span>
        </p>
        <p style='font-size: 10px; line-height: 12px;'>
         <span style='font-size: 10px; line-height: 12px;'>
          $bank_mobile
         </span>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w4'>
      <div class='bee-block bee-block-1 bee-image'>
       <img alt='' class='bee-center bee-fixedwidth' src='https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/758056_741484/blue.png' style='max-width:150px;'>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-2'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-divider'>
       <div class='center' style='border-top:1px solid #BBBBBB;width:100%;'>
       </div>
      </div>
      <div class='bee-block bee-block-2 bee-spacer'>
       <div class='spacer' style='height:30px;'>
       </div>
      </div>
      <div class='bee-block bee-block-3 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         Dear
         <span style='font-size: 16px; line-height: 19px;'>
          $fname
         </span>
         $lname,
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-4 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         This is a summary of a transaction that has occurred on your account below
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-5 bee-spacer'>
       <div class='spacer' style='height:30px;'>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-3'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Credit/Debit
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $type
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-4'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Account Number
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $acc
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-5'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Date/Time
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $date $time
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-6'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Description
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $remarks
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-7'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Amount
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $currency $amount
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-8'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <span style='color: #ffffff; line-height: 14px;'>
          <strong style=''>
           Available Balance
          </strong>
         </span>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <span style='color: #ffffff; line-height: 14px;'>
          $currency $diff
         </span>
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-9'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-spacer'>
       <div class='spacer' style='height:65px;'>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-10'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-spacer'>
       <div class='spacer' style='height:20px;'>
       </div>
      </div>
      <div class='bee-block bee-block-2 bee-text'>
       <div class='bee-text-content' style='font-size: 12px; line-height: 120%; color: #C0C0C0; font-family: inherit;'>
        <p style='line-height: 14px;'>
         <strong style=''>
          <span style='color: #ffffff; font-size: 24px; line-height: 28px;'>
           How do I know this is not a fake email?
          </span>
         </strong>
        </p>
        <p style='line-height: 14px;'>
         &nbsp;
        </p>
        <p style='line-height: 14px;'>
         <span style='color: #ffffff; line-height: 14px;'>
          An email really coming from us will address you by your registered first and last name or your business name. It will not ask you for sensitive information like your password, bank account or credit card details.
         </span>
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-3 bee-html-block'>
       <div height='40'>
        &nbsp;
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-11'>
    <div class='bee-row-content no_stack'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-spacer'>
       <div class='spacer' style='height:65px;'>
       </div>
      </div>
      <div class='bee-block bee-block-2 bee-image'>
       <img alt='' class='bee-center bee-fixedwidth' src='https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/758056_741484/security.png' style='max-width:325px;'>
      </div>
      <div class='bee-block bee-block-3 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px; text-align: center;'>
         <span style='font-size: 12px; line-height: 14px;'>
          Remember not to click any links in
          <span style='line-height: 14px;'>
           suspicious
          </span>
          looking emails.
         </span>
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-4 bee-spacer'>
       <div class='spacer' style='height:30px;'>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-12'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-spacer'>
       <div class='spacer' style='height:20px;'>
       </div>
      </div>
      <div class='bee-block bee-block-2 bee-text'>
       <div class='bee-text-content' style='color: #C0C0C0; font-size: 12px; line-height: 120%; font-family: inherit;'>
        <p style='line-height: 14px; text-align: justify;'>
         <span style='color: #ffffff; line-height: 13px; font-size: 11px;'>
          &nbsp;The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.
         </span>
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-3 bee-html-block'>
       <div height='40'>
        &nbsp;
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>
";


        $subject = '[Credit Alert] - [$currency $amount] ';

        $reg_user->send_mail($email, $messag, $subject);
        $phone_sms = preg_replace('/[^0-9]/', '', $phone);
       $last_digit = substr($acc, -4);
        $amountt = $currency ."".$amount;
        $avl_bal = $currency ."".$diff;
        $rem = $remarks;
       
        $message_sms =" 
        Your Acct $last_digit Has Been Credited with $amountt.00 On $date $time By $rem .Available Bal:$avl_bal";
        $reg_user->otp($phone_sms, $message_sms);


        $msg = "<div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>$uname Successfully Credited the Sum of $amount!</strong> 
			  </div>";
    } else {
        $msg = "Error!";
    }
}

if (isset($_POST['debit'])) {
    $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);

    $amount = trim($_POST['amount']);
    $amount = strip_tags($amount);
    $amount = htmlspecialchars($amount);

    $sender_name = trim($_POST['sender_name']);
    $sender_name = strip_tags($sender_name);
    $sender_name = htmlspecialchars($sender_name);

    $type = trim($_POST['type']);
    $type = strip_tags($type);
    $type = htmlspecialchars($type);

    $remarks = trim($_POST['remarks']);
    $remarks = strip_tags($remarks);
    $remarks = htmlspecialchars($remarks);

    $date = trim($_POST['date']);
    $date = strip_tags($date);
    $date = htmlspecialchars($date);
    
    $statz = trim($_POST['statz']);
    $statz = strip_tags($statz);
    $statz = htmlspecialchars($statz);

    $time = trim($_POST['time']);
    $time = strip_tags($time);
    $time = htmlspecialchars($time);

    $readd = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$uname'");
    $readd->execute();
    $shows = $readd->fetch(PDO::FETCH_ASSOC);

    $email = $shows['email'];

    $name = $shows['fname'];
    $tbal = $shows['t_bal'];
    $abal = $shows['a_bal'];

    if ($tbal < $amount && $abal < $amount) {
        $msg = "<div class='alert alert-warning'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>The Amount ($amount) to be Debited is Higher Than $name's Account Balance ($tbal)</strong> 
			  </div>";
    } elseif ($reg_user->his($uname, $amount, $sender_name, $type, $remarks, $date, $time, $statz)) {
        $readd = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$uname'");
        $readd->execute();
        $shows = $readd->fetch(PDO::FETCH_ASSOC);

        $currency = $shows['currency'];
        $acc = $shows['acc_no'];
        $fname = $shows['fname'];
        $mname = $shows['mname'];
        $lname = $shows['lname'];
        $email = $shows['email'];
        $phone = $shows['phone'];
        $tbal = $shows['t_bal'];
        $abal = $shows['a_bal'];
        $diffi = $tbal - $amount;
        $difi = $abal - $amount;

        $debited = $reg_user->runQuery("UPDATE account SET t_bal = '$diffi', a_bal = '$difi' WHERE acc_no = '$uname'");
        $debited->execute();

        $id = $reg_user->lasdID();




        $msg = "<div class='alert alert-info'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>$uname Successfully Debited the Sum of $amount!</strong> 
			  </div>";



        $messag = "
			
		<!DOCTYPE html>
<html>
 <head>
  <title>
  </title>
  <meta content='summary_large_image' name='twitter:card'>
  <meta content='website' property='og:type'>
  <meta content='' property='og:description'>
  <meta content='https://zm14avf184.preview-posted-stuff.com/V2-8rP5-13st-ZEaa0-47nU/' property='og:url'>
  <meta content='https://pro-bee-beepro-thumbnails.s3.amazonaws.com/messages/758056/741484/1463243/7168554_large.jpg' property='og:image'>
  <meta content='' property='og:title'>
  <meta content='' name='description'>
  <meta charset='utf-8'>
  <meta content='width=device-width' name='viewport'>
  <style>
   .bee-row,
		.bee-row-content {
			position: relative
		}

		.bee-html-block {
			text-align: center
		}

		.bee-row-1,
		.bee-row-11,
		.bee-row-2,
		.bee-row-3,
		.bee-row-4,
		.bee-row-5,
		.bee-row-6,
		.bee-row-7,
		.bee-row-8,
		.bee-row-8 .bee-row-content,
		.bee-row-9 {
			background-repeat: no-repeat
		}

		body {
			background-color: #fff;
			color: #000;
			font-family: Arial, Helvetica Neue, Helvetica, sans-serif
		}

		a {
			color: #0068a5
		}

		* {
			box-sizing: border-box
		}

		body,
		p {
			margin: 0
		}

		.bee-row-content {
			max-width: 500px;
			margin: 0 auto;
			display: flex
		}

		.bee-row-content .bee-col-w4 {
			flex-basis: 33%
		}

		.bee-row-content .bee-col-w6 {
			flex-basis: 50%
		}

		.bee-row-content .bee-col-w8 {
			flex-basis: 67%
		}

		.bee-row-content .bee-col-w12 {
			flex-basis: 100%
		}

		.bee-divider,
		.bee-image {
			overflow: auto
		}

		.bee-divider .center,
		.bee-image .bee-center {
			margin: 0 auto
		}

		.bee-row-1 .bee-col-2 .bee-block-1,
		.bee-row-11 .bee-col-1 .bee-block-2 {
			width: 100%
		}

		.bee-image img {
			display: block;
			width: 100%
		}

		.bee-text {
			overflow-wrap: anywhere
		}

		@media (max-width:520px) {
			.bee-row-content:not(.no_stack) {
				display: block
			}
		}

		.bee-row-1 .bee-row-content,
		.bee-row-10 .bee-row-content,
		.bee-row-11 .bee-row-content,
		.bee-row-12 .bee-row-content,
		.bee-row-2 .bee-row-content,
		.bee-row-3 .bee-row-content,
		.bee-row-4 .bee-row-content,
		.bee-row-5 .bee-row-content,
		.bee-row-6 .bee-row-content,
		.bee-row-7 .bee-row-content,
		.bee-row-9 .bee-row-content {
			background-repeat: no-repeat;
			color: #000
		}

		.bee-row-1 .bee-col-1,
		.bee-row-1 .bee-col-2,
		.bee-row-10 .bee-col-1,
		.bee-row-11 .bee-col-1,
		.bee-row-12 .bee-col-1,
		.bee-row-2 .bee-col-1,
		.bee-row-3 .bee-col-1,
		.bee-row-3 .bee-col-2,
		.bee-row-4 .bee-col-1,
		.bee-row-4 .bee-col-2,
		.bee-row-5 .bee-col-1,
		.bee-row-5 .bee-col-2,
		.bee-row-6 .bee-col-1,
		.bee-row-6 .bee-col-2,
		.bee-row-7 .bee-col-1,
		.bee-row-7 .bee-col-2,
		.bee-row-8 .bee-col-1,
		.bee-row-8 .bee-col-2,
		.bee-row-9 .bee-col-1 {
			padding-bottom: 5px;
			padding-top: 5px
		}

		.bee-row-1 .bee-col-1 .bee-block-1,
		.bee-row-10 .bee-col-1 .bee-block-2,
		.bee-row-11 .bee-col-1 .bee-block-3,
		.bee-row-12 .bee-col-1 .bee-block-2,
		.bee-row-2 .bee-col-1 .bee-block-1,
		.bee-row-2 .bee-col-1 .bee-block-3,
		.bee-row-2 .bee-col-1 .bee-block-4,
		.bee-row-3 .bee-col-1 .bee-block-1,
		.bee-row-3 .bee-col-2 .bee-block-1,
		.bee-row-4 .bee-col-1 .bee-block-1,
		.bee-row-4 .bee-col-2 .bee-block-1,
		.bee-row-5 .bee-col-1 .bee-block-1,
		.bee-row-5 .bee-col-2 .bee-block-1,
		.bee-row-6 .bee-col-1 .bee-block-1,
		.bee-row-6 .bee-col-2 .bee-block-1,
		.bee-row-7 .bee-col-1 .bee-block-1,
		.bee-row-7 .bee-col-2 .bee-block-1,
		.bee-row-8 .bee-col-1 .bee-block-1,
		.bee-row-8 .bee-col-2 .bee-block-1 {
			padding: 10px
		}

		.bee-row-8 .bee-row-content {
			background-color: #36b8ff;
			color: #000
		}

		.bee-row-10 {
			background-color: #364fff
		}

		.bee-row-12 {
			background-color: #f6730e
		}
  </style>
 </head>
 <body>
  <div class='bee-page-container'>
   <div class='bee-row bee-row-1'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w8'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 10px; line-height: 12px;'>
         <span style='font-size: 10px; line-height: 12px;'>
          $bank_address
         </span>
        </p>
        <p style='font-size: 10px; line-height: 12px;'>
         <span style='font-size: 10px; line-height: 12px;'>
          $bank_mobile
         </span>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w4'>
      <div class='bee-block bee-block-1 bee-image'>
       <img alt='' class='bee-center bee-fixedwidth' src='https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/758056_741484/blue.png' style='max-width:150px;'>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-2'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-divider'>
       <div class='center' style='border-top:1px solid #BBBBBB;width:100%;'>
       </div>
      </div>
      <div class='bee-block bee-block-2 bee-spacer'>
       <div class='spacer' style='height:30px;'>
       </div>
      </div>
      <div class='bee-block bee-block-3 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         Dear
         <span style='font-size: 16px; line-height: 19px;'>
          $fname
         </span>
         $lname,
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-4 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         This is a summary of a transaction that has occurred on your account below
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-5 bee-spacer'>
       <div class='spacer' style='height:30px;'>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-3'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Credit/Debit
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $type
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-4'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Account Number
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $acc
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-5'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Date/Time
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $date $time
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-6'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Description
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $remarks
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-7'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <strong style=''>
          Amount
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $currency $amount
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-8'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <span style='color: #ffffff; line-height: 14px;'>
          <strong style=''>
           Available Balance
          </strong>
         </span>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         <span style='color: #ffffff; line-height: 14px;'>
          $currency $diff
         </span>
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-9'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-spacer'>
       <div class='spacer' style='height:65px;'>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-10'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-spacer'>
       <div class='spacer' style='height:20px;'>
       </div>
      </div>
      <div class='bee-block bee-block-2 bee-text'>
       <div class='bee-text-content' style='font-size: 12px; line-height: 120%; color: #C0C0C0; font-family: inherit;'>
        <p style='line-height: 14px;'>
         <strong style=''>
          <span style='color: #ffffff; font-size: 24px; line-height: 28px;'>
           How do I know this is not a fake email?
          </span>
         </strong>
        </p>
        <p style='line-height: 14px;'>
         &nbsp;
        </p>
        <p style='line-height: 14px;'>
         <span style='color: #ffffff; line-height: 14px;'>
          An email really coming from us will address you by your registered first and last name or your business name. It will not ask you for sensitive information like your password, bank account or credit card details.
         </span>
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-3 bee-html-block'>
       <div height='40'>
        &nbsp;
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-11'>
    <div class='bee-row-content no_stack'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-spacer'>
       <div class='spacer' style='height:65px;'>
       </div>
      </div>
      <div class='bee-block bee-block-2 bee-image'>
       <img alt='' class='bee-center bee-fixedwidth' src='https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/758056_741484/security.png' style='max-width:325px;'>
      </div>
      <div class='bee-block bee-block-3 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px; text-align: center;'>
         <span style='font-size: 12px; line-height: 14px;'>
          Remember not to click any links in
          <span style='line-height: 14px;'>
           suspicious
          </span>
          looking emails.
         </span>
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-4 bee-spacer'>
       <div class='spacer' style='height:30px;'>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-12'>
    <div class='bee-row-content'>
     <div class='bee-col bee-col-1 bee-col-w12'>
      <div class='bee-block bee-block-1 bee-spacer'>
       <div class='spacer' style='height:20px;'>
       </div>
      </div>
      <div class='bee-block bee-block-2 bee-text'>
       <div class='bee-text-content' style='color: #C0C0C0; font-size: 12px; line-height: 120%; font-family: inherit;'>
        <p style='line-height: 14px; text-align: justify;'>
         <span style='color: #ffffff; line-height: 13px; font-size: 11px;'>
          &nbsp;The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.
         </span>
        </p>
       </div>
      </div>
      <div class='bee-block bee-block-3 bee-html-block'>
       <div height='40'>
        &nbsp;
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
 </body>
</html>


";



        $subject = "[Debit Alert] -  [$currency $amount]";

        $reg_user->send_mail($email, $messag, $subject);
        $phone_sms = preg_replace('/[^0-9]/', '', $phone);
        $last_digit = substr($acc, -4);
        $amountt = $currency ."".$amount;
       $avl_bal = $currency ."".$diffi;
        $rem = $remarks;
       
        $message_sms =
        "
        Your Acct $last_digit 
        Has Been Debited with $amountt.00 On $date $time By $rem .Available Bal:$avl_bal
      ";
          $reg_user->otp($phone_sms, $message_sms);
          
      $msg1 = "<div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>$uname Successfully Debited the Sum of $amount!</strong> 
			  </div>";     
    } else {
        $msg = "Error!";
    }
}

require_once ('class.admin.php');


?>

 <?php include 'count.php'; ?>


 <?php include 'headeradmin.php'; ?>
 
 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
  

     
     
     
  
    <div class="container-fluid mt--7">
      <div class="row">
        <div class="col-xl-8 mb-5 mb-xl-0">
          <div class="card bg-gradient-default shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col"> 
                  <b style="color:white;">Bank Manager</b>
                </div>
                <div class="col">
                  <ul class="nav nav-pills justify-content-end">
                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                        <span class="d-none d-md-block">Type: Admin</span>
                        <span class="d-md-none">M</span>
                      </a>
                    </li>
                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                      <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                        <span class="d-none d-md-block">Status: ACTIVE</span>
                        <span class="d-md-none">W</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas id="chart-sales" class="chart-canvas"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card shadow">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col"> 
                
                <a href="credit.php" class="btn btn-sm btn-warning">Credit Customer</a>
                <a href="debit.php" class="btn btn-sm btn-warning">Debit Customer</a>
                   <b>Security Tips</b> <P>Change your Internet banking Password Frequently to keep your Account Safe <a href="#" class="btn btn-sm btn-primary">Reset Password</a></P>
                    
                </div>
              </div>
            </div>
            <div class="card-body">
                                  <h6>ALL UPLOADED IMAGES </h6>
<?php
$files = glob("pic/*.*");
for ($i = 0; $i < count($files); $i++) {
    $image = $files[$i];
    $supported_file = array(
        'gif',
        'jpg',
        'jpeg',
        'png'
    );
    $base = basename($image);
    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    if (in_array($ext, $supported_file)) {
        // show only image name if you want to show full path then use this code // echo $image."<br />";
        echo '<img src="' . $image . '" title="' . $base . '" height="50px" width="45px"/>' . "&nbsp;";
    } else {
        continue;
    }
}
?>
            </div>
          </div>
        </div>
      </div>
     
     
     
       <?php include 'foot.php'; ?>
      
     