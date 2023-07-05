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


}


?>

<?php include 'header.php'; ?>
<?php include 'aside.php'; ?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-11 mx-auto">
          <div class="card mb-4">
            <div class="card-header p-3 pb-0">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6>From the Security Desk</h6>
                  <p class="text-sm mb-0"> <b>Address:</b> <?php echo $site_address; ?></p>
                  <p class="text-sm mb-0"> <b>Contact Email: </b>  <?php echo $support_email; ?></p>
                  <p class="text-sm"><b>Website: </b> <?php echo $site_url; ?></p>
                  </p>
                </div>
 <img src="../assets/img/brand/blue.png" class="w-20 me-3 mb-0" alt="main_logo">              </div>
            </div>
            <div class="card-body p-5 pt-5">
              <hr class="horizontal dark mt-0 mb-4">
              <div class="row">
                <h2><?php echo $show['subject']; ?></h2>
                <div class="card-header p-1">
              

<h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Security Information</span></h4>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Opening an account online is fast and secure! You simply review disclosure information and tell us how you want to fund the account.</span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Please note:</span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"></p>
<ul>
   <li style="box-sizing: border-box; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">This process can only be used to add an account for yourself. To open an account with another account owner, please visit one of our branch offices or call us at <?php echo $site_mobile; ?>
</span></li>
</ul>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"></p>
<ul>
   <li style="box-sizing: border-box; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Your new account can be funded electronically or by check. If you choose to make the opening deposit electronically, the funding account must be available for online transfers before you begin this process.</span></li>
</ul>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"></p>
<h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Safeguard Your Account</span></h4>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Want to receive online banking alerts by text message? If so, make sure the Contact Information page includes a mobile phone number.</span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Do you have a phone or other mobile device that is not listed here? If so, you can add a device at any time.</span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Nobody knows your account better than you. That’s why you should never share your card details, internet banking log in and token with anyone over the phone, SMS or email.</span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);"><?php echo $site_initial; ?> is continuously developing and implementing security enhancements to ensure the integrity of our Online Banking platform.</span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Our goal is to protect your online safety, the confidentiality of our customer account and personal data.</span></p>
<div class="border-top pt-3" style="box-sizing: border-box; text-shadow: none; box-shadow: none; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; border-top: 1px solid rgb(213, 220, 236) !important; padding-top: 1rem !important;">
   <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Security Tips</span></h4>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Giving away your Internet Banking login, card details, PIN and codes from your token device, gives anyone total access to your account.</span></li>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);"><?php echo $site_initial; ?> will never ask for any of these details via any form of communication</span></li>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Use your hand or body to shield your PIN when you are conducting transactions at the Automated Teller Machine (ATM) or when making Point of Sale (POS) transactions at retail stores.</span></li>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Create strong passwords for your Internet Banking login and card details. Change them often.</span></li>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Check your bank account statements and card transactions regularly to make sure these only reflect transactions you have made. If you see a transaction you cannot explain, report it to the bank.</span></li>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Subscribe to SMS alerts to be delivered to your cell phone or email, so you can stay updated on your account activity.</span></li>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Always log on to our internet banking service via our website - <?php echo $site_url; ?></span></li>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
   <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Watch out for copycat websites. Don’t fall prey to any website that looks similar to <?php echo $site_initial; ?>’s website.<br> Check the URL carefully. for the green lock ( <i class="fas fa-lock text-success"></i> https:// )</span></li>
</div>


            </div>
                                                                   

                
                <hr class="horizontal dark mt-6 mb-0">
                <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                    
                  <a href="" onclick="window.print();return false;" class="btn bg-gradient-info mb-0 print">Print</a>

                </div>
             </div>
             
                </div>
                <div class="card-footer bg-secondary p-3 pb-0">
              <div class="row">
                <div class="card-body p-5  pt-4">
              <p class="mb-0 text-sm text-white"><?php echo $site_title; ?>
 maintains this website to enhance public
      access to information about its activities and the activities of the 
      European System of Central Banks (ESCB),supervisory tasks and 
      responsibilities. Our goal is to keep this information timely and 
      accurate. However, the ECB accepts no responsibility or liability 
      whatsoever with regard to the material on this website.</p>
            </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
              <?php include 'footer.php'; ?>