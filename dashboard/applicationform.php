<?php
session_start();
require_once 'admin/class.admin.php';
include_once ('admin/session.php');



$reg_user = new USER();

if (isset($_POST['signup'])) {


    $fname = trim($_POST['fname']);
    $fname = strip_tags($fname);
    $fname = htmlspecialchars($fname);

    $lname = trim($_POST['lname']);
    $lname = strip_tags($lname);
    $lname = htmlspecialchars($lname);

    $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);

    $upass = $_POST['upass'];

    $phone = trim($_POST['phone']);
    $phone = strip_tags($phone);
    $phone = htmlspecialchars($phone);

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $type = trim($_POST['type']);
    $type = strip_tags($type);
    $type = htmlspecialchars($type);

    $reg_date = trim($_POST['reg_date']);

    $work = trim($_POST['work']);
    $work = strip_tags($work);
    $work = htmlspecialchars($work);

    $acc_no = trim($_POST['acc_no']);
    $acc_no = strip_tags($acc_no);
    $acc_no = htmlspecialchars($acc_no);

    $addr = trim($_POST['addr']);
    $addr = strip_tags($addr);
    $addr = htmlspecialchars($addr);

    $sex = trim($_POST['sex']);
    $sex = strip_tags($sex);
    $sex = htmlspecialchars($sex);

    $dob = trim($_POST['dob']);
    $dob = strip_tags($dob);
    $dob = htmlspecialchars($dob);

    $marry = trim($_POST['marry']);
    $marry = strip_tags($marry);
    $marry = htmlspecialchars($marry);

    $secretq = trim($_POST['secretq']);
    $secretq = strip_tags($secretq);
    $secretq = htmlspecialchars($secretq);
    
    $secretans = trim($_POST['secretans']);
    $secretans = strip_tags($secretans);
    $secretans = htmlspecialchars($secretans);

    $nextkin = trim($_POST['nextkin']);
    $nextkin = strip_tags($nextkin);
    $nextkin = htmlspecialchars($nextkin);

    $nextkinre = trim($_POST['nextkinre']);
    $nextkinre = strip_tags($nextkinre);
    $nextkinre = htmlspecialchars($nextkinre);

    $t_bal = trim($_POST['t_bal']);
    $t_bal = strip_tags($t_bal);
    $t_bal = htmlspecialchars($t_bal);

    $a_bal = trim($_POST['a_bal']);
    $a_bal = strip_tags($a_bal);
    $a_bal = htmlspecialchars($a_bal);

    $currency = trim($_POST['currency']);
    $currency = strip_tags($currency);
    $currency = htmlspecialchars($currency);

    $cot = trim($_POST['cot']);
    $cot = strip_tags($cot);
    $cot = htmlspecialchars($cot);

    $tax = trim($_POST['tax']);
    $tax = strip_tags($tax);
    $tax = htmlspecialchars($tax);

    $imf = trim($_POST['imf']);
    $imf = strip_tags($imf);
    $imf = htmlspecialchars($imf);
    
    $pin_auth = trim($_POST['pin_auth']);
    $pin_auth = strip_tags($pin_auth);
    $pin_auth = htmlspecialchars($pin_auth);

    $pin = trim($_POST['pin']);
    $pin = strip_tags($pin);
    $pin = htmlspecialchars($pin);
    
    $verify = trim($_POST['verify']);
    $verify = strip_tags($verify);
    $verify = htmlspecialchars($verify);
    
    $status = trim($_POST['status']);
    $status = strip_tags($status);
    $status = htmlspecialchars($status);



    $stmt = $reg_user->runQuery("SELECT * FROM account WHERE email=:email");
    $stmt1 = $reg_user->runQuery("SELECT * FROM account WHERE uname=:uname");
    $stmt->execute(array(":email" => $email));
    $stmt1->execute(array(":uname" => $uname));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);


    if ($stmt->rowCount() > 0 || $stmt1->rowCount() > 0) {
        $msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  Email or Username already exists! Please, try another one!
			  </div>
			  ";
    } else {
        if ($reg_user->createsign($fname, $mname, $lname, $uname, $upass, $phone, $email, $type, $reg_date, $work, $acc_no, $addr, $sex, $dob, $marry,  $secretq, $secretans, $nextkin, $nextkinre, $t_bal, $a_bal, $currency, $cot, $tax, $imf, $pin_auth, $pin, $verify, $status)) {
            $id = $reg_user->lasdID();

$stmt = $reg_user->runQuery("SELECT * FROM bank_settings WHERE id = '1'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
	    
	$bank_name  = $row["bank_name"];
	$bank_address  = $row["bank_address"];
	$bank_domain  = $row["bank_domain"];
	$bank_logo  = $row["bank_logo"];


            $messag = "	<!DOCTYPE html>
<html xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office' lang='en'>

<head>
	<title></title>
	<meta charset='UTF-8'>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
	<style>
		* {
			box-sizing: border-box;
		}

		body {
			margin: 0;
			padding: 0;
		}

		a[x-apple-data-detectors] {
			color: inherit !important;
			text-decoration: inherit !important;
		}

		#MessageViewBody a {
			color: inherit;
			text-decoration: none;
		}

		p {
			line-height: inherit
		}

		@media (max-width:520px) {
			.row-content {
				width: 100% !important;
			}

			.stack .column {
				width: 100%;
				display: block;
			}
		}
	.bdesign{
		    background-image: url('https://online-access.zcsavings.com/assets/img/header.png');
		}
	</style>
</head>

<body style='background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>
<table class='row row-2' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td>
<table class='row-content stack' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' role='presentation' border='0' width='500' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border: 0px;' width='50%'>
<table class='text_block' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='padding: 15px 10px 15px 10px;'>
<div style='font-family: sans-serif;'>
<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
<p style='margin: 0; font-size: 10px;'><span style='font-size: 10px;'>$bank_address</span></p>
<p style='margin: 0; font-size: 10px;'><span style='font-size: 10px;'>$bank_mobile</span></p>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</td>
<td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border: 0px;' width='50%'>
<table class='image_block' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='width: 100%; padding: 5px 0px 5px 0px;'>
<div style='line-height: 10px;' align='center'><img style='display: block; height: auto; border: 0; width: 225px; max-width: 100%;' src='$bank_logo' width='225' /></div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='row row-3' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td>
<table class='row-content stack' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' role='presentation' border='0' width='500' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border: 0px;' width='100%'>
<div class='spacer_block' style='height: 35px; line-height: 35px; font-size: 1px;'> </div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='row row-4' style='height: 161px; width: 100%;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr style='height: 161px;'>
<td class='bdesign'>
<table class='row-content' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' role='presentation' border='0' width='500' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 30px; padding-bottom: 30px; border: 0px;' width='100%'>
<table class='text_block' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='10'>
<tbody>
<tr>
<td>
<div style='font-family: sans-serif;'>
<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
<p style='margin: 0; font-size: 22px;'><span style='font-size: 22px; color: #ffffff;'><strong>Hello Customer!</strong></span></p>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='row row-5' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td>
<table class='row-content stack' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' role='presentation' border='0' width='500' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border: 0px;' width='100%'>
<table class='divider_block' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='10'>
<tbody>
<tr>
<td>
<div align='center'>
<table style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;'> </td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='row row-6' style='height: 68px; width: 100%;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr style='height: 68px;'>
<td style='height: 68px;'>
<table class='row-content stack' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' role='presentation' border='0' width='500' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td class='column' style='font-weight: 400; text-align: left; vertical-align: top; border: 0px none; width: 488.167px;'>
<table class='text_block' style='word-break: break-word; width: 100%;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='padding-top: 5px; padding-bottom: 5px; width: 100%;'>
<div style='font-family: sans-serif;'>
<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
<p style='margin: 0;'>Congratulations,</p>
<p style='margin: 0;'>Your Application have been recieved and is being checked, you will recieve a reply from our Accounts Department shortly.</p>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</td>
<td class='column' style='font-weight: 400; text-align: left; vertical-align: top; border: 0px none; width: 9.83333px;'>&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='row row-7' style='height: 10px; width: 100%;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr style='height: 10px;'>
<td style='height: 10px;'>&nbsp;</td>
</tr>
</tbody>
</table>
<table class='row row-11' style='height: 10px; width: 100%;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr style='height: 10px;'>
<td style='height: 10px;'>&nbsp;</td>
</tr>
</tbody>
</table>
<table class='row row-12' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td>
<table class='row-content stack' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #1d9df0; color: #000000; width: 500px;' role='presentation' border='0' width='500' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border: 0px;' width='50%'>
<table class='text_block' style='word-break: break-word; width: 198.795%;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td style='padding: 15px 10px; width: 100%;'>
<div style='font-family: sans-serif;'>
<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
<p style='margin: 0;'><span style='color: #ffffff;'><strong>We sent this email to $fname $lname </strong></span></p>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</td>
<td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border: 0px;' width='50%'>&nbsp;</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='row row-13' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td>
<table class='row-content stack' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' role='presentation' border='0' width='500' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border: 0px;' width='100%'>
<table class='divider_block' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='10'>
<tbody>
<tr>
<td>
<div align='center'>
<table style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0'>
<tbody>
<tr>
<td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;'> </td>
</tr>
</tbody>
</table>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
<table class='row row-14' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #161313;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td>
<table class='row-content stack' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' role='presentation' border='0' width='500' cellspacing='0' cellpadding='0' align='center'>
<tbody>
<tr>
<td class='column' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 25px; padding-bottom: 25px; border: 0px;' width='100%'>
<table class='text_block' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;' role='presentation' border='0' width='100%' cellspacing='0' cellpadding='10'>
<tbody>
<tr>
<td>
<div style='font-family: sans-serif;'>
<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
<p style='margin: 0;'><span style='color: #ffffff;'>Please Note that your once your Internet Banking is activated and you will need a combination of your account number and password to access your online banking </span></p>
</div>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>	<!-- End -->
</body>

</html>


";




            $subject = "Hello $fname - Your Application have been recieved!"; 
            $send_otp_mobile = preg_replace('/[^0-9]/', '', $_POST['phone']);
            $reg_user->send_mail($email, $messag, $subject);
            //$reg_user->otp($send_otp_mobile, $subject);






             header('Location: application-success.php');

            
        } else {
            echo "Sorry , Query could no execute...";
        }
    }
}
?>
<?php include 'header.php'; ?>

<body>
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
          <div class="container-fluid">
            <a class="navbar-brand  ms-lg-0 ms-3 " href="<?php echo $site_url; ?>">
<img style="width: 220px;" src="../assets/img/brand/blue.png" alt="LOGO" data-default="placeholder" data-max-width="80" width="14%">
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="">
                    </a>
                </li>
                  <li class="nav-item">
                  <a class="nav-link me-2" href="https://home.eparwisecapital.com">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Home
                  </a>
                </li>
                <li class="nav-item">
                 <a class="nav-link me-2" href="https://home.eparwisecapital.com/why-us/what-we-offer.php">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    About Us
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="https://home.eparwisecapital.com/contact/contact-us.php">
                    <i class="fas fa-mobile opacity-6 text-dark me-1"></i>
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
                                          <!-- GTranslate: https://gtranslate.io/ -->
<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:32px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/32.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/32a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
-->
</style>

<br /><select class="form-select w-30" onchange="doGTranslate(this);"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-5">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                  
                       <!--- APPLY STARTS HER---->
                    
     <!-- Table -->
      <div class="row" >
        <div class="col" >
          <div class="card shadow"  >
           
           	
		
		 <?php if (isset($msg1)) echo $msg1; ?>
                      <?php if (isset($msg)) echo $msg; ?>
            
             
           <form role="form" style="width:98%; padding-left:15px; "  method="POST" enctype="multipart/form-data">
              
	          <div class="form-group mt-4 p-3">    

                     
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="input-sm validate[required] form-control" placeholder="First Name" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Middle Name (Optional)</label>
                            <input type="text" name="mname" class="input-sm form-control" placeholder="Middle Name" required> 
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="input-sm validate[required] form-control" placeholder="Last Name" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="input-sm validate[required] form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Password</label>
                            <input type="text" name="upass" class="input-sm validate[required] form-control" placeholder="Password" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Occupation</label>
                            <input type="text" name="work" class="input-sm validate[required] form-control" placeholder="Occupation" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Phone(Type without +)</label>
                            <input type="text" name="phone" class="input-sm validate[required] form-control" placeholder="Eg 1 452 3456 776" required>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" class="input-sm validate[required] form-control" placeholder="Email Address" required>
                        </div>

                    </div>
                                         <div class="row">

                         <div class="col-md-3 form-group">
                            <label>Security Question</label>
                            <input type="text" name="secretq" class="input-sm validate[required] form-control" placeholder="Security Question">
                        </div>
                        
                         <div class="col-md-3 form-group">
                            <label>Security Question Answer</label>
                            <input type="text" name="secretans" class="input-sm validate[required] form-control" placeholder="Security Question Answer">
                        </div>
                        
                         <div class="col-md-3 form-group">
                            <label>Next of Kin</label>
                            <input type="text" name="nextkin" class="input-sm validate[required] form-control" placeholder="Next of Kin">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Next of kin Relationship</label>
                            <input type="text" name="nextkinre" class="input-sm validate[required] form-control" placeholder="Next of kin Relationship: Daughter,son ...">
                        </div>                        </div>

                    <div class="row">
                        <div class="col-md-3 form-group">
                                        <label>Date dd/MM/yyy</label>
                                        <div class="input-icon ">
                                            <input  type="datetime-local" name="dob" class="input-sm validate[required] form-control " placeholder="Eg, 21/12/2019" required />
                                            <span class="add-on">
                                                <i class="sa-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                    

                        <div class="col-md-2 form-group">
                            <label>Marital Status</label>
                            <select name="marry" class="form-select   input-sm validate[required]" required>
                                <option value="USD">-----Select Status-----</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Gender</label>
                            <select  name="sex" class="form-select  input-sm validate[required]" required>
                                <option value="USD">-------Select Sex-------</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Account Type</label>
                            <select name="type" class="form-select input-sm validate[required]" required>
                                <option value="">---Select Type---</option>
                                <option value="Savings">Savings</option>
                                <option value="Current">Current</option>
                                 <option value="Checking">Checking</option>
                                <option value="Fixed Deposit">Fixed Deposit</option>
                                 <option value="NON-Resident">NON-Resident</option>
                                <option value="Online Banking">Online Banking</option>
                                 <option value="Joint Account">Joint Account</option>
                                <option value="DOMICILIARY ACCOUNT">DOMICILIARY ACCOUNT</option>
                            </select>
                        </div>

                     

<div class="col-md-3 form-group">
                            <label>Account Currency</label>
                            <select class="input-sm validate[required] form-select" name="currency" required>
                               <option value="">--Select Currency--</option>
<option value="AFN">Afghanistan Afghanis – AFN</option>
<option value="ALL">Albania Leke – ALL</option>
<option value="DZD">Algeria Dinars – DZD</option>
<option value="ARS">Argentina Pesos – ARS</option>
<option value="AUD">Australia Dollars – AUD</option>
<option value="ATS">Austria Schillings – ATS</OPTION>
 
<option value="BSD">Bahamas Dollars – BSD</option>
<option value="BHD">Bahrain Dinars – BHD</option>
<option value="BDT">Bangladesh Taka – BDT</option>
<option value="BBD">Barbados Dollars – BBD</option>
<option value="BEF">Belgium Francs – BEF</OPTION>
<option value="BMD">Bermuda Dollars – BMD</option>
 
<option value="BRL">Brazil Reais – BRL</option>
<option value="BGN">Bulgaria Leva – BGN</option>
<option value="CAD">Canada Dollars – CAD</option>
<option value="XOF">CFA BCEAO Francs – XOF</option>
<option value="XAF">CFA BEAC Francs – XAF</option>
<option value="CLP">Chile Pesos – CLP</option>
 
<option value="CNY">China Yuan Renminbi – CNY</option>
<option value="CNY">RMB (China Yuan Renminbi) – CNY</option>
<option value="COP">Colombia Pesos – COP</option>
<option value="XPF">CFP Francs – XPF</option>
<option value="CRC">Costa Rica Colones – CRC</option>
<option value="HRK">Croatia Kuna – HRK</option>
 
<option value="CYP">Cyprus Pounds – CYP</option>
<option value="CZK">Czech Republic Koruny – CZK</option>
<option value="DKK">Denmark Kroner – DKK</option>
<option value="DEM">Deutsche (Germany) Marks – DEM</OPTION>
<option value="DOP">Dominican Republic Pesos – DOP</option>
<option value="NLG">Dutch (Netherlands) Guilders – NLG</OPTION>
 
<option value="XCD">Eastern Caribbean Dollars – XCD</option>
<option value="EGP">Egypt Pounds – EGP</option>
<option value="EEK">Estonia Krooni – EEK</option>
<option value="EUR">Euro – EUR</option>
<option value="FJD">Fiji Dollars – FJD</option>
<option value="FIM">Finland Markkaa – FIM</OPTION>
 
<option value="FRF*">France Francs – FRF*</OPTION>
<option value="DEM">Germany Deutsche Marks – DEM</OPTION>
<option value="XAU">Gold Ounces – XAU</option>
<option value="GRD">Greece Drachmae – GRD</OPTION>
<option value="GTQ">Guatemalan Quetzal – GTQ</OPTION>
<option value="NLG">Holland (Netherlands) Guilders – NLG</OPTION>
<option value="HKD">Hong Kong Dollars – HKD</option>
 
<option value="HUF">Hungary Forint – HUF</option>
<option value="ISK">Iceland Kronur – ISK</option>
<option value="XDR">IMF Special Drawing Right – XDR</option>
<option value="INR">India Rupees – INR</option>
<option value="IDR">Indonesia Rupiahs – IDR</option>
<option value="IRR">Iran Rials – IRR</option>
 
<option value="IQD">Iraq Dinars – IQD</option>
<option value="IEP*">Ireland Pounds – IEP*</OPTION>
<option value="ILS">Israel New Shekels – ILS</option>
<option value="ITL*">Italy Lire – ITL*</OPTION>
<option value="JMD">Jamaica Dollars – JMD</option>
<option value="JPY">Japan Yen – JPY</option>
 
<option value="JOD">Jordan Dinars – JOD</option>
<option value="KES">Kenya Shillings – KES</option>
<option value="KRW">Korea (South) Won – KRW</option>
<option value="KWD">Kuwait Dinars – KWD</option>
<option value="LBP">Lebanon Pounds – LBP</option>
<option value="LUF">Luxembourg Francs – LUF</OPTION>
 
<option value="MYR">Malaysia Ringgits – MYR</option>
<option value="MTL">Malta Liri – MTL</option>
<option value="MUR">Mauritius Rupees – MUR</option>
<option value="MXN">Mexico Pesos – MXN</option>
<option value="MAD">Morocco Dirhams – MAD</option>
<option value="NLG">Netherlands Guilders – NLG</OPTION>
 
<option value="NZD">New Zealand Dollars – NZD</option>
<option value="NOK">Norway Kroner – NOK</option>
<option value="OMR">Oman Rials – OMR</option>
<option value="PKR">Pakistan Rupees – PKR</option>
<option value="XPD">Palladium Ounces – XPD</option>
<option value="PEN">Peru Nuevos Soles – PEN</option>
 
<option value="PHP">Philippines Pesos – PHP</option>
<option value="XPT">Platinum Ounces – XPT</option>
<option value="PLN">Poland Zlotych – PLN</option>
<option value="PTE">Portugal Escudos – PTE</OPTION>
<option value="QAR">Qatar Riyals – QAR</option>
<option value="RON">Romania New Lei – RON</option>
 
<option value="ROL">Romania Lei – ROL</option>
<option value="RUB">Russia Rubles – RUB</option>
<option value="SAR">Saudi Arabia Riyals – SAR</option>
<option value="XAG">Silver Ounces – XAG</option>
<option value="SGD">Singapore Dollars – SGD</option>
<option value="SKK">Slovakia Koruny – SKK</option>
 
<option value="SIT">Slovenia Tolars – SIT</option>
<option value="ZAR">South Africa Rand – ZAR</option>
<option value="KRW">South Korea Won – KRW</option>
<option value="ESP">Spain Pesetas – ESP</OPTION> 
 
<option value="SDD">Sudan Dinars – SDD</option>
<option value="SEK">Sweden Kronor – SEK</option>
<option value="CHF">Switzerland Francs – CHF</option>
<option value="TWD">Taiwan New Dollars – TWD</option>
<option value="THB">Thailand Baht – THB</option>
<option value="TTD">Trinidad and Tobago Dollars – TTD</option>
 
<option value="TND">Tunisia Dinars – TND</option>
<option value="TRY">Turkey New Lira – TRY</option>
<option value="AED">United Arab Emirates Dirhams – AED</option>
<option value="GBP">United Kingdom Pounds – GBP</option>
<option value="USD">United States Dollars – USD</option>
<option value="VEB">Venezuela Bolivares – VEB</option>
 
<option value="VND">Vietnam Dong – VND</option>
<option value="ZMK">Zambia Kwacha – ZMK</option>

                            </select>
                        </div>
                        
 
                                            <div class="row">

                        <div class="col-md-12  form-group col-md-3">
                            <label>Home Address</label>
                            <textarea name="addr" class="input-sm validate[required] form-control" placeholder="House or Office Address in full" required></textarea>
                        </div>
                        
                         <div class="col-md-2 form-group">
                            <label></label>
                            
                    </div>
                    </div>
                    </div>
                  
                     <input type="hidden" data-format="dd/MM/yyyy" value="<?php echo " " . date("d/m/Y") ; ?>" name="reg_date" > 
                            
                              <input type="hidden" name="acc_no"  id="acc_no" 
                             
                             value="<?php 
														//Variables
															 
															$DesdeNumero2 = 1;
															$HastaNumero2 = 1;
															$DesdeNumero3 = 10;
															$HastaNumero3 = 10;
															$DesdeNumero = 1;
															$HastaNumero = 10000000000;										
															$letraAleatoria = ($DesdeLetra);
															$letraAleatoria1 = ($DesdeLetra1);
															$letraAleatoria2 = ($DesdeLetra2);
															$numeroAleatorio2 = chr(rand(ord($DesdeNumero2), ord($HastaNumero2)));
															$numeroAleatorio3 = ($DesdeNumero3);
															$numeroAleatorio = rand($DesdeNumero, $HastaNumero);
														
														echo "".$letraAleatoria."".$letraAleatoria1."".$letraAleatoria2."".$numeroAleatorio."";?>" />
                          
                             <input type="text" name="cot" class="input100" value="<?php echo(rand()); ?>" hidden>
                            <input type="text" name="tax" class="input100" value="<?php echo(rand()); ?>" hidden>
                            <input type="text" name="imf" class="input100" value="<?php echo(rand()); ?>" hidden> 
                            <input type="text" name="pin" class="input100" value="<?php echo(rand()); ?>" hidden>
                            
                            <input type="text" name="pin_auth" class="input100" value="004" hidden> 
                            <input type="text" name="verify" class="input100" value="N" hidden>
                             <input type="text" name="status" class="input100" value="Dormant/Inactive" hidden> 
                              
           <button class="btn bg-gradient-danger" type="reset"><i class="fa fa-refresh text-white text-lg me-3" aria-hidden="true"></i>  Reset</button>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
           <button class="btn bg-gradient-success" type="submit" name="signup"><i class="fa fa-user-plus text-white text-lg me-3" aria-hidden="true"></i>  Register</button>

            <br><br>
            </div>


  
            

            </form>
             
 
        
          </div>
        </div>
      </div>
     
 <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker();
        });
    </script>
      
      
     
      <!-- Footer -->
       <?php include 'footer.php'; ?>
                        
