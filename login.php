 <?php
//Start the Session
header("X-Robots-Tag: noindex, nofollow", true);
session_start();

require('include/dbconfig.php');
require_once 'include/class.user.php';

$reg_user = new USER();




//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['acc_no']) and isset($_POST['upass'])) {
//3.1.1 Assigning posted values to variables.

    $acc_no = $_POST['acc_no'];
    $upass = $_POST['upass'];
    $upass = ($upass);

//3.1.2 Checking the values are existing in the database or not
    $query = "SELECT * FROM account WHERE acc_no='$acc_no' and upass='$upass'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);


    $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $log = $reg_user->runQuery("UPDATE account SET logins = logins + 1 WHERE '$acc_no'");
   

    $status = $row['status'];
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
    if ($count == 0) {
    $msg = "<div id='alert' class='alert alert-danger alert-dismissible'>
                <a href='#' class='close2' data-dismiss='alert' aria-label='close'>&times;</a>
                Invalid Account No or Password!
            </div>";
} elseif ($status == 'DISABLED') {
    $msg = "<div id='alert' class='alert alert-inverse' alert-dismissible>
                <a href='#' class='close2' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Sorry! Your Account Has Been Disabled For Violation of Our Terms!</strong>
            </div>";
} elseif ($status == 'CLOSED') {
    $msg = "<div id='alert' class='alert alert-inverse' alert-dismissible>
                <a href='#' class='close2' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Sorry! That Account No Longer Exists!</strong>
            </div>";
} elseif ($status == 'SUSPEND') {
    $msg = "<div id='alert' class='alert alert-danger alert-dismissible'>
                <a href='#' class='close2' data-dismiss='alert' aria-label='close'>&times;</a>
                Due to unauthorized activities detected from our system, you have been suspended from operating online activities in your account. To reactivate, please visit the nearest bank branch or contact support@eparwisecapital.com
            </div>";
    } else {
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
        $_SESSION['acc_no'] = $acc_no;
         $_SESSION['acc_no'] = $acc_no;
        // Redirect user to dashboard/summary.php
        // header("Location: dashboard/summary.php");
    }
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['acc_no'])) {
    $code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
    $sender = "<?php echo $site_title; ?>"; /* sender id */
    $message = "Please enter this code to continue proceed
				$code";


    $message = "
				<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>[SUBJECT]</title>
  <style type='text/css'>
  body {
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   padding-top: 0 !important;
   padding-bottom: 0 !important;
   margin:0 !important;
   width: 100% !important;
   -webkit-text-size-adjust: 100% !important;
   -ms-text-size-adjust: 100% !important;
   -webkit-font-smoothing: antialiased !important;
 }
 .tableContent img {
   border: 0 !important;
   display: block !important;
   outline: none !important;
 }
 a{
  color:#382F2E;
}

p, h1{
  color:#382F2E;
  margin:0;
}

div,p,ul,h1{
  margin:0;
}
p{
font-size:13px;
color:#99A1A6;
line-height:19px;
}
h2,h1{
color:#444444;
font-weight:normal;
font-size: 22px;
margin:0;
}
a.link2{
padding:15px;
font-size:13px;
text-decoration:none;
background:#2D94DF;
color:#ffffff;
border-radius:6px;
-moz-border-radius:6px;
-webkit-border-radius:6px;
}
.bgBody{
background: #f6f6f6;
}
.bgItem{
background: #2C94E0;
}

@media only screen and (max-width:480px)
		
{
		
table[class='MainContainer'], td[class='cell'] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class='specbundle'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		
	}
	td[class='specbundle1'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		
	}	
td[class='specbundle2'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
	}
	td[class='specbundle3'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
		padding-bottom:20px !important;
	}
	td[class='specbundle4'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		text-align:center !important;
		
	}
		
td[class='spechide'] 
	{
		display:none !important;
	}
	    img[class='banner'] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class='left_pad'] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		 
}
	
@media only screen and (max-width:540px) 

{
		
table[class='MainContainer'], td[class='cell'] 
	{
		width: 100% !important;
		height:auto !important; 
	}
td[class='specbundle'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		
	}
	td[class='specbundle1'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		
	}		
td[class='specbundle2'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
	}
	td[class='specbundle3'] 
	{
		width:90% !important;
		float:left !important;
		font-size:14px !important;
		line-height:18px !important;
		display:block !important;
		padding-left:5% !important;
		padding-right:5% !important;
		padding-bottom:20px !important;
	}
	td[class='specbundle4'] 
	{
		width: 100% !important;
		float:left !important;
		font-size:13px !important;
		line-height:17px !important;
		display:block !important;
		padding-bottom:20px !important;
		text-align:center !important;
		
	}
		
td[class='spechide'] 
	{
		display:none !important;
	}
	    img[class='banner'] 
	{
	          width: 100% !important;
	          height: auto !important;
	}
		td[class='left_pad'] 
	{
			padding-left:15px !important;
			padding-right:15px !important;
	}
		
	.font{
		font-size:15px !important;
		line-height:19px !important;
		
		}
}

</style>

<script type='colorScheme' class='swatch active'>
  {
    'name':'Default',
    'bgBody':'f6f6f6',
    'link':'ffffff',
    'color':'99A1A6',
    'bgItem':'2C94E0',
    'title':'444444'
  }
</script>

</head>
<body paddingwidth='0' paddingheight='0' bgcolor='#d1d3d4'  style=' margin-left:5px; margin-right:5px; margin-bottom:0px; margin-top:0px;padding-top: 0; padding-bottom: 0; background-repeat: repeat; width: 100% !important; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-font-smoothing: antialiased;' offset='0' toppadding='0' leftpadding='0'>
  <table width='100%' border='0' cellspacing='0' cellpadding='0' class='tableContent bgBody' align='center'  style='font-family:Helvetica, Arial,serif;'>
  
    <!-- =============================== Header ====================================== -->

  <tr>
    <td class='movableContentContainer' >
    	<div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                   <tr><td height='25'  colspan='3'></td></tr>

                    <tr>
                     
                    </tr>
                </table>
        </div>
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                        <tr><td height='2'  ></td></tr>

                        <tr>
                          <td height='200'  bgcolor='#fdfefe'>
                            <table align='center' border='0' cellspacing='0' cellpadding='0' class='MainContainer'>
  <tr>
    <td></td>
  </tr>
  

                                    <tr>
                                      <td></td>
                                      <td valign='top'>
                                        <table width='300' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                                          <tr>
                                            <td valign='top'>
                                              <div class='contentEditableContainer contentTextEditable'>
                                                <div class='contentEditable' >
                                                  <h1 style='font-size:20px;font-weight:normal;color:blue;line-height:19px;'>Dear $fname, </h1>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr><td height='18'></td></tr>
                                          <tr>
                                            <td valign='top'>
                                              <div class='contentEditableContainer contentTextEditable'>
                                                <div class='contentEditable' >
                                                  <p style='font-size:13px;color:blue;line-height:19px;'>Please use the One Time Password OTP $code to complete your Login Process <br> 
                                                  </p>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          
                                          <tr><td height='1'></td></tr>
                                        </table>
                                      </td>
                                      <td></td>
                                    </tr>
                                  </table>
                                </td>
  </tr>
</table>
</td>
  </tr>

</table>

                          </td>
                        </tr>

                        <tr><td height='0' ></td></tr>
                </table>
       
        
        
        
        <div class='movableContent' style='border: 0px; padding-top: 0px; position: relative;'>
        	<table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>
                  <tr>
                    <td>
                      <table width='600' border='0' cellspacing='0' cellpadding='0' align='center' valign='top' class='MainContainer'>
                        <tr>
                          <td>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0' align='center' valign='top'>

                              <tr>
                                <td>
                                  
                                </td>
                              </tr>
                              
                              <tr>
                                <td valign='top' align='center'>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style=' font-weight:bold;font-size:13px;line-height: 30px;'>CB Online Banking</p>
                                    </div>
    <br>                           <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style='#F00; font-size:13px;line-height: 15px;'>This message is sent to this email to $fname <br /> <br /> <center><b>How do I know this is not a fake email?</b></center> <br />

An email really coming from us will address you by your registered first and last name or your business name. It will not ask you for sensitive information like your password, bank account or credit card details.<br /><br />
                                      </p>
                                      <p style='#F00; font-size:13px;line-height: 15px;'>Remember not to click any links in suspicious looking emails. </p>
                                    </div>
                                  </div>                               </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    <div class='contentEditable' >
                                      <p style='color:#A8B0B6; font-size:13px;line-height: 15px;'>&nbsp;</p>
                                    </div>
                                  </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                  </div>
                                  <div class='contentEditableContainer contentTextEditable'>
                                    
                                  </div>
                                </td>
                              </tr>

                              <tr><td height='28'>&nbsp;</td></tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
          </table>
        </div>
    </td>
  </tr>
</table>


</body>
  </html>


";



    $acc_no = $_SESSION['acc_no'];

    $queri = " UPDATE account SET tmp_otp = '$code' WHERE acc_no ='$acc_no'";
    $resulti = mysqli_query($connection, $queri) or die(mysqli_error($connection));

    $subject = "Login Verification";
    $stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$acc_no'");
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($_SESSION['acc_no']) && $row['phone_verify'] == 1) {
        header('Location: dashboard/pin_auth.php');
        exit();
    } else {
        $reg_user->send_mail($row['email'], $message, $subject);
        $phone = preg_replace('/[^0-9]/', '', $row['phone']);
        $mobile_msg = "Dear " . $row['fname'] . ", Please use the One Time Passcode (OTP): " . $code . " to complete your login process";
        $reg_user->otp($phone,$mobile_msg);
        header('Location: dashboard/otp.php');
    }
} else {
    
}
//3.2 When the user visits the page first time, simple login form will be displayed.
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title> Account Login | <?php echo $site_title; ?> </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="assets/css/special.css" rel="stylesheet" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <style>


.panel-default {
    opacity: 0.9;
    margin-top: 70px;
}

.btn-sm, .btn-xs {
    padding: 5px 40%;
    font-size: 15px;
    line-height: 1.5;
    border-radius: 3px;
}
.close2 {
    letter-spacing: -.025rem;
    color: #ffffff;
    font-weight: bolder;
    font-size: 20px;
}

.form-group.last { margin-bottom:0px; } 
    
.btn-success {
    color: 
#fff;
background-color:
#187718;
border-color:
    #187718;
}
 .alert-danger {

    color: #fff;
    background-color: #e30909;
    border-color: #eed3d7;

}
</style> 
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-sticky my-0 py-2 start-0 end-0 mx-auto">
          <div class="container-fluid">
            <a class="navbar-brand  ms-lg-0 ms-3 " href="">
<img style="width: 220px;" src="assets/img/brand/blue.png" alt="LOGO" data-default="placeholder" data-max-width="80" width="14%">
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
                  <a class="nav-link me-2" href="https://home.eparwisecapital.com/">
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
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  
                                         <?php
if (isset($_GET['inactive'])) {
    ?>
                        <div class='alert alert-info col-4'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry!</strong> This Account is not Activated Contact Customer Care Activate it. 
                        </div>
    <?php
}
?>
  <main class="main-content  mt-0" style="background-image: url(../assets/img/loginback.jpg);background-repeat: no-repeat;">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
        <div class="card card-body blur text-md-start text-center px-sm-3 shadow-lg mt-sm-7 py-sm-2">
                <div class="card-header pb-0 text-left bg-transparent">
                                        <?php if (isset($msg)) echo $msg; ?>

              <form autocomplete="off" method="POST">

                  <h3 class="font-weight-bolder text-warning text-gradient">Welcome back</h3>
<p><span style="color: #5C5C5C;">Secure Site 
                                <img src="../assets/img/secure.png" width="18" height="21"></span> </p>                 <!-- GTranslate: https://gtranslate.io/ -->
<a href="#" onclick="doGTranslate('en|sq');return false;" title="Albanian" class="gflag nturl" style="background-position:-300px -400px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Albanian" /></a><a href="#" onclick="doGTranslate('en|ar');return false;" title="Arabic" class="gflag nturl" style="background-position:-100px -0px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Arabic" /></a><a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="German" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Russian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Spanish" /></a>

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

<br /><select class="form-select" onchange="doGTranslate(this);"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>

                </div>
                <div class="card-body">
                  <form role="form">
                    <label></label>
                    <div class="mb-3">
                      <input type="text" name="acc_no"  class="form-control" placeholder="<?php echo $site_initial; ?> Acc Number No.: E.g 0927847634" aria-label="Email" aria-describedby="email-addon">
                    </div>
                    <label></label>
                    <div class="mb-3">
                      <input type="password" name="upass"class="form-control" placeholder="Your Password" aria-label="Password" aria-describedby="password-addon">
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" name="login" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Don't have an account?
                    <a href="../dashboard/applyonline.php" class="text-info text-gradient font-weight-bold">Sign up</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('assets/img/curved-images/curved6.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
    <footer class="footer py-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-0 mx-auto text-center text-sm">
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">© <script>
                  document.write(new Date().getFullYear())
                </script>, <i class="fa fa-bank"> <?php echo $site_initial; ?></a></i>                   

          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-l-5 me-3 mb-sm-0 mb-2">
            About Us
          </a>
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Terms | Conditions
          </a>
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Security Tips
          </a>
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Privacy
          </a>
          <a href="<?php echo $site_url; ?>" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
            Policy
          </a>
     
        </div>
      </div>
    </div></div></div>
  </footer>
<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="5cb7d8cc-b4b6-4653-9d9b-1d454011d5fc";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Core JS Files   -->
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Hide the alert div after 4 seconds
        setTimeout(function() {
            $('#alert').fadeOut('slow');
        }, 3000);
    });
</script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>