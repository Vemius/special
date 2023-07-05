<?php

session_start();

include_once ('../include/session.php');

require_once '../include/class.user.php';

if(!isset($_SESSION['acc_no'])){

	

header("Location: login.php");

exit(); 

}


date_default_timezone_set($newTimezone);


$reg_user = new USER();



$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");

$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];
$fname = $row['fname'];
$lname = $row['lname'];

if(isset($_POST['ticket']))

{

	$tc = rand(00000,99999);

	

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
    
	    
	$bank_name  = $row["bank_name"];
	$bank_address  = $row["bank_address"];
	$bank_domain  = $row["bank_domain"];
			$message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta name=generator content='mshtml 11.00.9600.20139'></head>
<body style='font-family: @arial unicode ms'>
<table bordercolor=#ce0a00 width='100%' align=center bgcolor=#f3f3f3 border=0>
<tbody>
<tr>
<td><br>
<table style='height: 29px; width: 567px; padding-bottom: 10px; padding-top: 30px; padding-left: 20px; padding-right: 20px' cellspacing=0 width=567 align=center bgcolor=white border=0>
<tbody>
<tr>
<td align=center>
<table cellspacing=0 width='100%' border=0>
<tbody>
<tr>
<td><br>
<table style='height: 38px; width: 97px' cellspacing=0 width=97 align=right border=0>
<tbody>
<tr>
<td><img style='height: 35px; width: 155px' border=0 hspace=0 alt='' src='https://asia-shine.shop/assets/img/brand/blue.png' width=155 align=baseline height=100></td></tr></tbody></table>
<table style='height: 67px; width: 274px' cellspacing=0 width=274 align=left border=0>
<tbody>
<tr>
<td><font size=2>Address:$bank_address</font></td></tr></tbody></table><br><br><br><br></td></tr></tbody></table>
<table style='padding-bottom: 50px; padding-top: 30px; padding-left: 20px' cellspacing=0 width='100%' bgcolor=#0076b6 border=0>
<tbody>
<tr>
<td></td></tr>
<tbody style='font-size: medium; font-family: helvetica, arial, serif; white-space: normal; word-spacing: 0px; text-transform: none; font-weight: 400; color: rgb(0,0,0); font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: rgb(0,118,182); text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial'>
<tr>
<td>
<table cellspacing=0 cellpadding=0 width='100%' border=0>
<tbody>
<tr>
<td class=specbundle4 valign=top width=250><br class=apple-interchange-newline></td></tr>
<tbody style='font-size: medium; font-family: helvetica, arial, serif; white-space: normal; word-spacing: 0px; text-transform: none; font-weight: 400; color: rgb(0,0,0); font-style: normal; orphans: 2; widows: 2; letter-spacing: normal; background-color: rgb(0,118,182); text-indent: 0px; font-variant-ligatures: normal; font-variant-caps: normal; -webkit-text-stroke-width: 0px; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial'>
<tr>
<td>
<table cellspacing=0 cellpadding=0 width='100%' border=0>
<tbody>
<tr>
<td class=specbundle4 valign=top width=250><br class=apple-interchange-newline>
<table cellspacing=0 cellpadding=0 width=250 align=center border=0 valign='top'>
<tbody>
<tr>
<td height=10 colspan=3></td></tr>
<tr>
<td width=10></td>
<td valign=top width=230>
<table cellspacing=0 cellpadding=0 width=230 align=center border=0 valign='top'>
<tbody>
<tr>
<td valign=top>
<div class='contenteditablecontainer contenttexteditable' style='margin: 0px'>
<div class=contenteditable style='margin: 0px'>
<h1 style='font-size: 20px; font-weight: normal; color: rgb(255,255,255); margin: 0px; line-height: 19px'>Dear $fname $lname,</h1></div></div></td></tr>
<tr>
<td height=18></td></tr>
<tr>
<td valign=top>
<div class='contenteditablecontainer contenttexteditable' style='margin: 0px'>
<div class=contenteditable style='margin: 0px'>
<p style='font-size: 13px; color: rgb(207,234,250); margin: 0px; line-height: 19px'>Your ticket was successfully opened! <br>We will respond to your request within 24 hours. <br>Below is the transaction summary.<br><br><br></p>
<h3><font color=#ffffff>Ticket</font></h3></div></div></td></tr>
<tr>
<td height=33>
<table style='border-top: white 1px solid; border-right: white 1px solid; border-bottom: white 1px solid; padding-bottom: 20px; padding-top: 20px; padding-left: 20px; border-left: white 1px solid; padding-right: 20px' width=462>
<tbody>
<tr>
<th style='text-align: left'><font color=#ffffff>Ticket Number</font></th>
<td><font color=#ffffff>$tc</font></td></tr>
<tr>
<th style='text-align: left'><font color=#ffffff>Subject</font></th>
<td><font color=#ffffff>$sub</font></td></tr>
<tr>
<th style='text-align: left'><font color=#ffffff>Date opened</font></th>
<td><font color=#ffffff>$date</font></td></tr>
<tr>
<th style='text-align: left'><font color=#ffffff>message</font></th>
<td><font color=#ffffff>$msg</font></td></tr></tbody></table></td></tr>
<tr>
<td>
<div class='contenteditablecontainer contenttexteditable' style='margin: 0px'>
<div class=contenteditable style='margin: 0px'><font color=#ffffff></font></div></div></td></tr>
<tr>
<td height=15><font color=#ffffff></font></td></tr></tbody></table></td>
<td width=10><font color=#ffffff></font></td></tr></tbody></table></td></tr></tbody></table></td></tr>
<tr>
<td></td></tr></tbody></td></tr></tbody></table></td></tr>
<tr>
<td></td></tr></tbody></td></tr></tbody></table><br>
<table style='padding-bottom: 50px; padding-top: 30px; padding-left: 20px; padding-right: 20px; cellspacing: 0 width=' align=center bgcolor=white border=0 100%?>
<tbody>
<tr>
<td><img style='height: 43px; width: 311px' border=0 hspace=0 alt='' src='https://asia-shine.shop/assets/img/brand/security.png' width=599 align=middle height=83></td></tr></tbody></table><br>
<table style='padding-bottom: 50px; padding-top: 30px; padding-left: 20px; padding-right: 20px; cellspacing: 0 width=' bgcolor=white border=0 100%?>
<tbody>
<tr>
<td><font size=2>This message is sent to you because your email address is on our subscribers list. If you are not interested in receiving more emails like this one, just hit  </font><a href='https://asia-shop.com'><font size=2>Unsubscribe</font></a><font size=2>.<br></font></td></tr></tbody></table>
<table style='padding-bottom: 50px; padding-top: 30px; padding-left: 20px; padding-right: 20px; cellspacing: 0 width=' bgcolor=#ef880b border=0 100%?>
<tbody>
<tr>
<td><font color=#ffffff size=2><br>The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.<br></font></td></tr></tbody></table>
<table style='padding-left: 20px; padding-right: 20px; cellspacing: 0 width=' align=center bgcolor=white border=0 100%?>
<tbody>
<tr>
<td><img style='height: 20px; width: 54px' border=0 hspace=0 alt='' src='https://asia-shine.shop/assets/img/brand/fdc.png' width=642 align=middle height=258></td></tr></tbody></table></p></td></tr></tbody></table></td></tr>
<tr></tr></tbody></table></body></html>";

			
			$subject = "Your Ticket [$tc] Has Been Opened";
						
			$reg_user->send_mail($email,$message,$subject);	

			
			$msg = "

					<div class='alert alert-success'>

						<button class='close' data-dismiss='alert'>&times;</button>

						<strong>Ticket Successfully Opened!</strong> ~$subject~

                     

			  		</div>

					";

		}

		else

		{

			echo "Sorry, ticket was not opened";

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
          <div class="card bg"> 
            <div class="card-header border-0" style="background-color:<?php echo $tab; ?>; color:<?php echo $tab_font; ?>;">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Customer Service Support</h3>
                </div>
                <div class="col-4 text-right">
                  <a href="summary.php" class="btn btn-warning">Home</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              
              
            <form autocomplete="off" method="post" >
                        
              
                 <input type="submit" name="ticket" class="btn btn-warning" value="OPEN TICKET"><br>
           
                
                 <?php if(isset($msg)) echo $msg;  ?><br>
                
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                         
                        <label class="form-control-label" for="input-username">Receiver (Customer Care)</label>
                        <input id="input-username" class="form-control form-control-alternative"  placeholder="Customer Care" name="amount" type="text" disabled>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Message Subject</label>
                        <input id="input-email" class="form-control form-control-alternative" name="subject" placeholder="Type your subject" type="text" required>
                        <input type="hidden" class="form-control"  name="sender_name" value="<?php echo $row['fname']; ?> " />
                      </div>
                    </div>
                  </div>
                  
                  
                  
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Details Messages</label>
                        <textarea class="form-control" name="msg" placeholder="Type your complaint"   type="text" required></textarea>
                      </div>
             
                    
                </div>
                 
               
                
              </form>
              
              
              <br><br><br><br>
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
       
      
      
     
      <!-- Footer -->
       <?php include 'footercopyright.php'; ?>
      
      
     