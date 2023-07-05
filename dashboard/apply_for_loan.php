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



$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");

$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));

$row = $stmt->fetch(PDO::FETCH_ASSOC);

$email = $row['email'];
$fname = $row['fname'];
$lname = $row['lname'];

if(isset($_POST['loan']))

{

	$tc = rand(00000,99999);



	$sender_name = trim($_POST['sender_name']);

	$sender_name = strip_tags($sender_name);

	$sender_name = htmlspecialchars($sender_name);
	
	
	
	$reqtype = trim($_POST['reqtype']);

	$reqtype = strip_tags($reqtype);

	$reqtype = htmlspecialchars($reqtype);
	
	
	$lamount = trim($_POST['lamount']);

	$lamount = strip_tags($lamount);
	
	$lamount = htmlspecialchars($lamount);
	
	
	
	$income = trim($_POST['income']);

	$income = strip_tags($income);

	$income = htmlspecialchars($income);
	
	
	
	$occup = trim($_POST['occup']);

	$occup = strip_tags($occup);

	$occup = htmlspecialchars($occup);
	

	$employer = trim($_POST['employer']);

	$employer = strip_tags($employer);

	$employer = htmlspecialchars($employer);
	
	

	$reason = trim($_POST['reason']);

	$reason = strip_tags($reason);

	$reason = htmlspecialchars($reason);


	$tick = $reg_user->runQuery("SELECT * FROM loan");

	

	$tick->execute();



	$show = $tick->fetch(PDO::FETCH_ASSOC);

	$date = $show['date'];

		if($reg_user->loan($tc,$sender_name,$reqtype,$lamount,$income,$occup,$employer,$reason))

		{			

			$id = $reg_user->lasdID();	

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
				
			$message = "<!DOCTYPE html>
<html>
 <head>
  <title>
  </title>
  <meta content='summary_large_image' name='twitter:card'>
  <meta content='website' property='og:type'>
  <meta content='' property='og:description'>
  <meta content='https://zm14avf184.preview-posted-stuff.com/V2-8rP5-13st-oDlf-6olj/' property='og:url'>
  <meta content='https://pro-bee-beepro-thumbnails.s3.amazonaws.com/messages/758056/741484/1463162/7168201_large.jpg' property='og:image'>
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

		.bee-row-3,
		.bee-row-4,
		.bee-row-5,
		.bee-row-6,
		body {
			background-color: #fff
		}

		body {
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
		.bee-row-7 .bee-col-1 .bee-block-2 {
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

		.bee-row-1,
		.bee-row-2,
		.bee-row-7 {
			background-repeat: no-repeat
		}

		.bee-row-1 .bee-row-content,
		.bee-row-2 .bee-row-content,
		.bee-row-7 .bee-row-content,
		.bee-row-8 .bee-row-content {
			background-repeat: no-repeat;
			color: #000
		}

		.bee-row-1 .bee-col-1,
		.bee-row-1 .bee-col-2,
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
		.bee-row-8 .bee-col-1 {
			padding-bottom: 5px;
			padding-top: 5px
		}

		.bee-row-1 .bee-col-1 .bee-block-1,
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
		.bee-row-7 .bee-col-1 .bee-block-3,
		.bee-row-8 .bee-col-1 .bee-block-2 {
			padding: 10px
		}

		.bee-row-3 .bee-row-content,
		.bee-row-4 .bee-row-content,
		.bee-row-5 .bee-row-content,
		.bee-row-6 .bee-row-content {
			background-color: #0e97ff;
			background-repeat: no-repeat;
			color: #000
		}

		.bee-row-8 {
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
       <img alt='' class='bee-center bee-fixedwidth' src='$bank_logo' style='max-width:300px;'>
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
        <p style='line-height: 14px;'>
         Your ticket was successfully opened! We will respond to your request within 24 hours.
        </p>
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
         <span style='color: #ffffff; line-height: 14px;'>
          <strong style=''>
           Ticket Number
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
          $tc
         </span>
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
         <span style='color: #ffffff; line-height: 14px;'>
          <strong style=''>
           Request Type
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
          $reqtype
         </span>
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
         <span style='color: #ffffff; line-height: 14px;'>
          <strong style=''>
           Date Opened
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
          $date
         </span>
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
         <span style='color: #ffffff; line-height: 14px;'>
          <strong style=''>
           Message
           <br style=''>
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
          $reason
         </span>
        </p>
       </div>
      </div>
     </div>
    </div>
   </div>
   <div class='bee-row bee-row-7'>
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
   <div class='bee-row bee-row-8'>
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
</html>";
  
			
			$subject = "Your Loan Request Ticket [$tc] Has Been Opened";
						
			$reg_user->send_mail($email,$message,$subject);	

			
			$msg1 = "

					<div class='alert alert-success  mt-4' style='width: 320px;color: white;' fade in  alert-dismissible>
            <a href='#' class='close2 mx-2' data-dismiss='alert' aria-label='close'>&times;</a>
						<strong>Loan Request Initiated, Thank you...</strong>

                     

			  		</div>

					";

		}

		else

		{

			echo "Sorry, Loan request was not opened";

		}		

}

include_once ('counter.php');

?>


<?php include 'header.php'; ?>
<?php include 'aside.php'; ?>


    <div class="container-fluid my-3 py-3">
      <div class="row">
           <hr class="horizontal dark mt-1 mb-3">
        <div class="col-md-4 mt-md-0 mt-4 ">

<!-- MORTGAGE LOAN CALCULATOR BEGIN -->
<script type="text/javascript">
mlcalc_default_calculator = 'loan';
mlcalc_currency_code      = '';
mlcalc_amortization       = 'year_nc';
mlcalc_purchase_price     = '300,000';
mlcalc_down_payment       = '20';
mlcalc_mortgage_term      = '30';
mlcalc_interest_rate      = '4.5';
mlcalc_property_tax       = '3,000';
mlcalc_property_insurance = '1,500';
mlcalc_pmi                = '0.52';
mlcalc_loan_amount        = '250,000';
mlcalc_loan_term          = '15';
</script>
<script type="text/javascript">if(typeof jQuery == "undefined"){document.write(unescape("%3Cscript src='" + (document.location.protocol == 'https:' ? 'https:' : 'http:') + "//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' type='text/javascript'%3E%3C/script%3E"));mlcalc_jquery_noconflict=1;};</script><div style="font-weight:normal;font-size:9px;font-family:Tahoma;padding:0;margin:0;border:0;text-align:center;background:transparent;color:#EEEEEE;width:500px;text-align:right;padding-right:10px;" id="mlcalcWidgetHolder"><script type="text/javascript">document.write(unescape("%3Cscript src='https://www.mlcalc.com/widget-wide.js' type='text/javascript'%3E%3C/script%3E"));</script><a href="" style="font-weight:normal;font-size:9px;font-family:Tahoma;color:#EEEEEE;text-decoration:none;"></a></div>
<!-- MORTGAGE LOAN CALCULATOR END -->

                                  <form autocomplete="off" method="post" >

          </div>
        <div class="col-md-7">
          <div class="card">
            <div class="card-header pb-0 p-3">
            </div>
            <div class="card-body p-3">
                
                <!--- add form -->
                
                
            <form autocomplete="off" method="post" >

          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Please Take out time to make calculations before you make loan request. Once a Loan is approved you will get message. </h6>
            </div>
             <div class="row  wt-5">
                  <div class="col-md-12">
                    <div class="card-body">
                  <strong>Name</strong>: <?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?> <br>
                  <strong>Sex</strong> <?php echo $row['sex']; ?>  <br>
                  <strong>Marital Status</strong>: <?php echo $row['marry']; ?><br>  
                  <strong>Mobile No</strong>: <?php echo $row['phone']; ?> <br>
                  <strong>Address</strong>: <?php echo $row['addr']; ?><br>
                  <strong>Occupation</strong>: <?php echo $row['work']; ?> <br> 
                  <strong>Email</strong>: <?php echo $row['email']; ?> <br>
                  <strong>To</strong>: <?php echo $site_initial; ?> loan Department

                  </div> </div> </div>
            <div class="content ps-3">
                                   
                                            <div class="col-md-6">
                                            <div class="form-group">
                                              
                                                <label >                                             <?php if(isset($msg1)) echo $msg1;  ?>
</label>
                                                <input type="hidden" class="form-control"  name="sender_name" value="<?php echo $row['fname']; ?> " />

                                            </div>
                                        </div>
                                        
        
                                            <div class="row  mt-4 w-90 mx-auto">
                                            <div class="col-md-5 w-95">
                                            <div class="form-group">
                                            <select class="form-select form-control" name="reqtype" required="">
                                            <option value="">------Request Type------</option> 
                                            <option class="form-group" value="Loan request">Loan request</option>
                                            <option class="form-group" value="Cancel Loa">Cancel Loan</option> 
                                            <option class="form-group" value="Increase requested Amount">Increase requested Amount</option>
                                            <option class="form-group" value="Pay loan">Pay loan</option>
                            </select>
                            </div>
                            </div>
                            
                                            <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="lamount" placeholder="Desired loan amount" value="" required>                                        </div>
                                            
                            
                                            <div class="input-group mb-2">
                                            <input class="datepicker form-control" name="income" placeholder="Annual Income" type="text" required>                                            </div>
                                            
                                      
                                               <div class="input-group mb-2">
                                            <input class="datepicker form-control" name="occup" placeholder="Job title" type="text" required>                                            </div>
                                           
                                           <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="employer" placeholder="Employer Name" value="" required>                                       </div>
                                           
                                          
                                           <div class="input-group mb-2">
                                            <textarea type="textbox" class="form-control" name="reason" placeholder="what will the loan be used for?" value=""></textarea>                                        </div></div></div>
                                            	
                                    <div class="row  mt-5 mx-auto">
                                        <div class="col-md-12">
                                            <button type="submit" name="loan"  class="col-12 btn btn-info btn-fill pull-right">Request Loan</button>
                                        </div>
                                    </div>
            </div>            </div>            </div>
        </div>
      </div>
      </form>
      
        </div>
      </div>
        <?php include 'footer.php'; ?>