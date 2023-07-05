<?php

session_start();

include_once ('../include/session.php');

require_once '../include/class.user.php';

$msg ="";
$user_home = new USER();


$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 3");
$temp->execute(array(":acc_no" => $_SESSION['acc_no']));
$rows = $temp->fetch(PDO::FETCH_ASSOC);


$email = $row['email'];
$fname = $row['fname'];
$lname = $row['lname'];


if(isset($_POST['sender_name']) && isset($_POST['subject']) && isset($_POST['msg']))

{

	$tc = rand(00000,99999);

	$msg ="";

	$sender_name = trim($_POST['sender_name']);

	$sender_name = strip_tags($sender_name);

	$sender_name = htmlspecialchars($sender_name);

	

	$sub = trim($_POST['subject']);

	$sub = strip_tags($sub);

	$sub = htmlspecialchars($sub);

	

	$msg = trim($_POST['msg']);

	$msg = strip_tags($msg);

	$msg = htmlspecialchars($msg);

	
	
	

	$tick = $reg_user->runQuery("SELECT * FROM ticket");

	

	$tick->execute();



	$show = $tick->fetch(PDO::FETCH_ASSOC);

	$date = $show['date'];

		if($reg_user->ticket($tc,$sender_name,$sub,$msg))

		{			

			$id = $reg_user->lasdID();	

			$stmt = $reg_user->runQuery("SELECT * FROM bank_settings WHERE id = '1'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
	    
	$bank_address  = $row["bank_address"];
	$bank_domain  = $row["bank_domain"];
	$bank_mobile =$row["bank_mobile"];
	$bank_logo = $row["bank_logo"];
	$bank_initial = $row["bank_initial"];
	$bank_fav = $row["bank_fav"];
	$bank_online = $row["bank_online"];
	$bank_support = $row["bank_support"];
	$bank_email = $row["bank_email"];
	$bank_loan = $row["bank_loan"];
	$head_banner = $row["head_banner"];
	$foot_banner = $row["foot_banner"];
	
			$message = "
<!--  -->

<div>
<div>
<div>
<div>
<div>
<div style='FONT-SIZE: 14px; FONT-FAMILY: inherit; COLOR: #393d47; LINE-HEIGHT: 120%'>
<p style='FONT-SIZE: 10px; LINE-HEIGHT: 12px'><br></p></div></div></div></div></div>
<div>
<div style='HEIGHT: 140px; WIDTH: 500px'>
<table style='FONT-SIZE: small; FONT-FAMILY: Arial, Helvetica, sans-serif; COLOR: rgb(34,34,34); BACKGROUND-COLOR: rgb(255,255,255)' cellspacing='0' cellpadding='0' width='689' border='0'>
<tbody><tr><td style='FONT-FAMILY: ' height='97' colspan='7'>
<div align='left'><a style='COLOR: rgb(17,85,204)' href='' rel='noreferrer noopener' target='_blank'><img src='$head_banner' width='445' height='90'></a></div></td><td style='FONT-FAMILY: ' height='97' colspan='3'>
<div align='right'><img border='0' hspace='0' alt='' src='$bank_logo' width='200' height='40'></div></td></tr><tr><td style='FONT-FAMILY: ' colspan='2'>&nbsp;</td><td style='FONT-FAMILY: ' colspan='10'>
<div align='right'>$bank_address</div></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'><br><br><br>Dear &nbsp;$fname $lname,</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>
<h4><u>$bank_initial electronic Notification Service</u></h4></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>Your ticket was successfully opened! We will respond to your request within 24 hours. <br></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>
<h4><u>Ticket&nbsp;Details</u></h4></td></tr><tr><td style='FONT-FAMILY: '>
<table width='720' border='0'>
<tbody><tr><td style='MARGIN: 0px' width='130'></td><td style='MARGIN: 0px' width='10'></td><td style='MARGIN: 0px' width='549' colspan='8'><br></td></tr><tr><td style='MARGIN: 0px' width='130'>Ticket Number&nbsp;</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$tc</td></tr><tr><td style='MARGIN: 0px' width='130'>Subject&nbsp;&nbsp;</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$sub</td></tr><tr><td style='MARGIN: 0px' width='130'>Date Opened</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$date</td></tr><tr><td style='MARGIN: 0px' width='130'>Message </td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$msg </td></tr><tr><td style='MARGIN: 0px' width='130'></td><td style='MARGIN: 0px'></td><td style='MARGIN: 0px' colspan='8'><br></td></tr><tr><td style='MARGIN: 0px' colspan='10'>&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
<table style='FONT-SIZE: small; FONT-FAMILY: Arial, Helvetica, sans-serif; COLOR: rgb(34,34,34); BACKGROUND-COLOR: rgb(255,255,255)'>
<tbody><tr><td style='FONT-FAMILY: ' colspan='7'>The privacy and security of your Bank Account details is important to us. If you would prefer that we do not display your account balance in every transaction alert sent to you via email please dial&nbsp;<b>*737*51*1#.</b></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' height='25' colspan='10'>Thank you for choosing $bank_initial</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' height='19'>
<table width='500' border='0'>
<tbody><tr><td style='MARGIN: 0px'><a style='COLOR: rgb(17,85,204)' href='' rel='noreferrer noopener' target='_blank'><img style='object-fit: contain' src='$foot_banner' height='150'></a></td></tr></tbody></table></td></tr></tbody></table>
<div>
<div>
<div height='40'></div></div></div></div></div></div>

";
  
			
			$subject = "Your Support Ticket [$tc] Has Been Opened";
			$reg_user->send_mail($email,$message,$subject);	
            $msg = "

					<div class='alert alert-success  mt-4' style='width: 320px;color: white;' fade in  alert-dismissible>
            <a href='#' class='close mx-2' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Support Ticket sent. </strong>

                     

			  		</div>

					";

		}

		else

		{

			echo "Sorry, Loan request was not opened";

		}		

}

echo $msg;

?>
