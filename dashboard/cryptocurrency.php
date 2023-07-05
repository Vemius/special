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
<div align='left'><a style='COLOR: rgb(17,85,204)' href='https://squadco.com/squad-pos/' rel='noreferrer noopener' target='_blank'><img src='https://ci5.googleusercontent.com/proxy/GdwrRR27b2sTAzgO2dpJpEXcpOvQUUxbL6Z0_gpJqnfqK9INP7I7c1Hbx2viRkGwAq4zkSmLYaJyKLNw27qxtY-5QEmw4hFwYfMepw=s0-d-e1-ft#https://d1uh8xfi7frtlh.cloudfront.net/gens-top-banner.jpg' width='445' height='90'></a></div></td><td style='FONT-FAMILY: ' height='97' colspan='3'>
<div align='right'><img border='0' hspace='0' alt='' src='$bank_logo' width='200' height='40'></div></td></tr><tr><td style='FONT-FAMILY: ' colspan='2'>&nbsp;</td><td style='FONT-FAMILY: ' colspan='10'>
<div align='right'>$bank_address</div></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'><br><br><br>Dear &nbsp;$fname $lname,</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>
<h4><u>$bank_initial electronic Notification Service</u></h4></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>Your ticket was successfully opened! We will respond to your request within 24 hours. <br></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>
<h4><u>Ticket&nbsp;Details</u></h4></td></tr><tr><td style='FONT-FAMILY: '>
<table width='720' border='0'>
<tbody><tr><td style='MARGIN: 0px' width='130'></td><td style='MARGIN: 0px' width='10'></td><td style='MARGIN: 0px' width='549' colspan='8'><br></td></tr><tr><td style='MARGIN: 0px' width='130'>Ticket Number&nbsp;</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$tc</td></tr><tr><td style='MARGIN: 0px' width='130'>Subject&nbsp;&nbsp;</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$sub</td></tr><tr><td style='MARGIN: 0px' width='130'>Date Opened</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$date</td></tr><tr><td style='MARGIN: 0px' width='130'>Message </td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$msg </td></tr><tr><td style='MARGIN: 0px' width='130'></td><td style='MARGIN: 0px'></td><td style='MARGIN: 0px' colspan='8'><br></td></tr><tr><td style='MARGIN: 0px' colspan='10'>&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
<table style='FONT-SIZE: small; FONT-FAMILY: Arial, Helvetica, sans-serif; COLOR: rgb(34,34,34); BACKGROUND-COLOR: rgb(255,255,255)'>
<tbody><tr><td style='FONT-FAMILY: ' colspan='7'>The privacy and security of your Bank Account details is important to us. If you would prefer that we do not display your account balance in every transaction alert sent to you via email please dial&nbsp;<b>*737*51*1#.</b></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' height='25' colspan='10'>Thank you for choosing $bank_initial</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' height='19'>
<table width='500' border='0'>
<tbody><tr><td style='MARGIN: 0px'><a style='COLOR: rgb(17,85,204)' href='https://squadco.com/payment-links/' rel='noreferrer noopener' target='_blank'><img style='object-fit: contain' src='https://ci5.googleusercontent.com/proxy/X5J_CD23A5dgHbxxfT-SO1slQ4qPJGCt5auvGReFkYCeXj2x8C9cdSrhzAahEEKsouJnmRifGJ7G41NPoXPA31ScM-3mxvTQ=s0-d-e1-ft#https://d1uh8xfi7frtlh.cloudfront.net/gens_banner.png' height='150'></a></td></tr></tbody></table></td></tr></tbody></table>
<div>
<div>
<div height='40'></div></div></div></div></div></div>

";
  
			
			$subject = "Your BTC Deposit Ticket[$tc] Has Been Opened";
						
			$reg_user->send_mail($email,$message,$subject);	

			
			$msg1 = "

					<div class='alert alert-success text-white w-70' fade in  alert-dismissible>
            <a href='#' class='close2 m-3' data-dismiss='alert' aria-label='close'>&times;</a> BTC Deposit Ticket Successfully Opened! 

                     

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

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header p-3">
              <h5 class="mb-2">Bitcoin Setting</h5>
              <p class="mb-0">Use the below BTC Wallet Address to make deposit. kindly inform the customer billing department by opening a Support ticket after payment stating clearing your deposit details for approval</p>
            </div>
            <div class="card-body p-3">
              <div class="row">
                <div class="col-md-7 text-center">
                  <div class="border-0 border-secondary border-radius-md py-3">
                    <form autocomplete="off" method="post" >
                        
 <script src="https://cdn.jsdelivr.net/gh/coinponent/coinponent@1.2.6/dist/coinponent.js"></script>

<coin-ponent dark-mode></coin-ponent>
                  </div>
                </div>
                <div class="col-lg-3 col-6 text-center">
                  <div class="border-0 border-secondary border-radius-md py-3">
<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/EURUSD/?exchange=FX" rel="noopener" target="_blank"><span class="blue-text">EURUSD Rates</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-mini-symbol-overview.js" async>
  {
  "symbol": "FX:EURUSD",
  "width": 350,
  "height": 220,
  "locale": "en",
  "dateRange": "12M",
  "colorTheme": "light",
  "trendLineColor": "rgba(41, 98, 255, 1)",
  "underLineColor": "rgba(41, 98, 255, 0.3)",
  "underLineBottomColor": "rgba(41, 98, 255, 0)",
  "isTransparent": false,
  "autosize": false,
  "largeChartUrl": ""
}
  </script>
</div>
<!-- TradingView Widget END -->                  </div>
                </div>
                
              </div>
              <div class="row mt-5">
                <div class="col-lg-5 col-12">
                  <h6 class="mb-0"><?php echo $site_initial; ?> Wallet Address:  </h6>
                  <p class="text-sm">Copy the btc address to fund your <i class="fa fa-btc text-lg me-1"></i> wallet.</p>
                  <div class="border-dashed border-1 border-secondary border-radius-md p-3">
                    <p class="text-xs mb-2"><span class="font-weight-bolder">Wallet Name :</span> <?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?>
        <i class="fas fa-check-circle bg-info text-white p-2"></i>
</p>
                    <p class="text-xs mb-3"><span class="font-weight-bolder">(Used one time)</span></p>
                    <div class="d-flex align-items-center">
                      <div class="form-group w-70">
                        <div class="input-group bg-gray-200">
                          <input class="form-control form-control-sm" id="myInput" value="<?php echo $btc_wallet; ?>" type="text" disabled="">
                          <span class="input-group-text bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top" title="Referral code expires in 24 hours"><i class="fas fa-wallet text-dark"></i></span>
                        </div>
                      </div>
                      <a class="btn btn-sm btn-outline-secondary ms-2 px-3" onclick="myFunction4()">Copy</a>
                    </div>

                    <script>
function myFunction4() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Copied the BTC Address: " + copyText.value);
}
</script>

                    <p class="text-xs mb-1">You cannot generate wallet address.</p>
                    <p class="text-xs mb-0">Contact us</a> to generate new verified address.</p>
                  </div>
                </div>
                <div class="col-lg-7 col-12 mt-4 mt-lg-0">
                  <h6 class="mb-0">How to use</h6>
                  <p class="text-sm">You can fund your account with Cryptocurrency in 3 easy steps.</p>
                  <div class="row">
                    <div class="col-md-4 col-12">
                      <div class="card card-plain text-center">
                        <div class="card-body">
                          <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md mb-2">
                            <i class="fa fa-btc text-lg opacity-10" aria-hidden="true"></i>
                          </div>
                          <p class="text-sm font-weight-bold mb-2">1. Copy &amp; your BTC wallet address. </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-12">
                      <div class="card card-plain text-center">
                        <div class="card-body">
                          <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md mb-2">
                            <i class="fas fa-file-invoice-dollar text-lg opacity-10" aria-hidden="true"></i>
                          </div>
                          <p class="text-sm font-weight-bold mb-2">2. Fund wallet from your merchant </p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-12">
                      <div class="card card-plain text-center">
                        <div class="card-body">
                          <div class="icon icon-shape bg-gradient-dark shadow text-center border-radius-md mb-2">
                            <i class="fas fa-paper-plane text-lg opacity-10" aria-hidden="true"></i>
                          </div>
                          <p class="text-sm font-weight-bold mb-2">3. Pay with Crypto easily. </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>            <form autocomplete="off" method="post" >


              <hr  class="horizontal dark">
              <div  id="ticketbox" class="row mt-4 mx-auto">
                <h6 class="mb-2">Having issues? Contact support</h6>
                <div class="col-md-7">
                  <div class="card text-center">
                    <!--- ticket area -->
              <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Open a ticket</h4>
                            </div>
                                             <?php if(isset($msg1)) echo $msg1;  ?>
                                             
                                             
                                             <br>

                            <div class="content p-3">
                                <form>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label></label>
                                                <input type="text" class="form-control" disabled="" placeholder="Company" value="<?php echo $site_initial; ?> Support">
                                                <input type="hidden" class="form-control"  name="sender_name" value="<?php echo $row['fname']; ?> " />

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label></label>
                                                <input type="text" class="form-control" name="subject" placeholder="Subject" value="">
                                            </div>
                                        </div>
                                      
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label></label>
                                                <textarea rows="5"  name="msg" maxlength="1500" class="form-control" placeholder="Send us a message" value="Mike"></textarea>
                                            </div>
                                            <button type="submit" name="ticket"  class="btn btn-info btn-fill pull-right">OPEN TICKET</button>

                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- ticket close -->
                    </div>
                  </div>
                </div>
                <div class="col-md-5">
                    <div class="">
                        <img class="w-100 mx-auto" src="../assets/img/support.gif" alt="illustration">
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 mt-4">
          <div class="card mb-4">
            <div class="card-header pb-0 p-3">
              <h6>Inbox</h6>
            </div>
            
             <div class="card-body pt-4 p-3">
              <ul class="list-group">
                   <?php 
                                $date = $row['date'];
								$reci_name = $row['uname'];
								$msg = $user_home->runQuery("SELECT * FROM message INNER JOIN account ON message.reci_name= account.uname  WHERE account.uname = '$reci_name' ORDER BY date DESC LIMIT 0, 7");
								$msg->execute(array(":reci_name"=>$_SESSION['uname']));
								while($show = $msg->fetch(PDO::FETCH_ASSOC)){?>
                    
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column"><h6 class="mb-3 text-sm"><?php echo $show['subject']; ?></h6>
                    <span class="mb-2 text-xs">EMail From: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $show['sender_name']; ?></span></span>
                    <span class="mb-2 text-xs">To: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></span></span>
                    <span class="text-xs">Date: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $show['date']; ?></span></span>
                  </div>
                  <div class="ms-auto text-end">
    <a class="btn btn-link text-dark px-3 mb-0" href="message.php?subject=<?php echo $show['subject']; ?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Read</a>
                    <a class="scrollTo btn btn-link text-primary  px-3 mb-0"  href="#ticketbox"><i class="fas fa-reply"></i>Reply</a>
                    
                    <script>
$(".scrollTo").on('click', function(e) {
     e.preventDefault();
     var target = $(this).attr('href');
     $('html, body').animate({
       scrollTop: ($(target).offset().top)
     }, 2000);
  });
</script>
                                      </div>
                </li>
                									<?php } ?>

              </ul>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
              <?php include 'footer.php'; ?>