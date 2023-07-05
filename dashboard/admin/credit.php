<?php
session_start();
require_once ('class.admin.php');
include_once ('session.php');

$reg_user = new USER();

if (!isset($_SESSION['email'])) {

    header("Location: login.php");

    exit();
}

$stmt = $reg_user->runQuery("SELECT * FROM account");
$stmt->execute();

$credit = $reg_user->runQuery("SELECT * FROM account");
$credit->execute();

$emailuser = $reg_user->runQuery("SELECT * FROM account");
$emailuser->execute();

$debit = $reg_user->runQuery("SELECT * FROM account");
$debit->execute();


if (isset($_POST['his'])) {
     $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $amount = trim($_POST['amount']);
    $amount = strip_tags($amount);
    $amount = htmlspecialchars($amount);
	
	
    $bank_name = trim($_POST['bank_name']);
    $bank_name = strip_tags($bank_name);
    $bank_name = htmlspecialchars($bank_name);

    $acc_name = trim($_POST['acc_name']);
    $acc_name = strip_tags($acc_name);
    $acc_name = htmlspecialchars($acc_name);

	
	$transtype = trim($_POST['transtype']);
    $transtype = strip_tags($transtype);
    $transtype = htmlspecialchars($transtype);
	
	
	$acc_no = trim($_POST['acc_no']);
    $acc_no = strip_tags($acc_no);
    $acc_no = htmlspecialchars($acc_no);
	
	 $swift = trim($_POST['swift']);
    $swift = strip_tags($swift);
    $swift = htmlspecialchars($swift);
	
	 $routing = trim($_POST['routing']);
    $routing = strip_tags($routing);
    $routing = htmlspecialchars($routing);

    $remarks = trim($_POST['remarks']);
    $remarks = strip_tags($remarks);
    $remarks = htmlspecialchars($remarks);
	
	$status = trim($_POST['status']);
    $status = strip_tags($status);
    $status = htmlspecialchars($status);

    $date = trim($_POST['date']);
    $date = strip_tags($date);
    $date = htmlspecialchars($date);
    

    $alerts = $reg_user->runQuery("SELECT * FROM transfer");
    $alerts->execute();

    if ($reg_user->his($amount, $bank_name, $acc_name, $acc_no, $transtype, $swift, $routing, $remarks, $email, $status, $date)) {
        $id = $reg_user->lasdID();


        $msg = "<div class='alert alert-info'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>History Successfully Added!</strong> 
			  </div>";
    } else {
        $msg = "Error!";
    }
}
if (isset($_POST['credit'])) {
    
     $uname = trim($_POST['uname']);
    $uname = strip_tags($uname);
    $uname = htmlspecialchars($uname);
    
    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $amount = trim($_POST['amount']);
    $amount = strip_tags($amount);
    $amount = htmlspecialchars($amount);
	
	
    $bank_name = trim($_POST['bank_name']);
    $bank_name = strip_tags($bank_name);
    $bank_name = htmlspecialchars($bank_name);

    $acc_name = trim($_POST['acc_name']);
    $acc_name = strip_tags($acc_name);
    $acc_name = htmlspecialchars($acc_name);

	
	$transtype = trim($_POST['transtype']);
    $transtype = strip_tags($transtype);
    $transtype = htmlspecialchars($transtype);
	
	
	$acc_no = trim($_POST['acc_no']);
    $acc_no = strip_tags($acc_no);
    $acc_no = htmlspecialchars($acc_no);
	
	 $swift = trim($_POST['swift']);
    $swift = strip_tags($swift);
    $swift = htmlspecialchars($swift);
	
	 $routing = trim($_POST['routing']);
    $routing = strip_tags($routing);
    $routing = htmlspecialchars($routing);

    $remarks = trim($_POST['remarks']);
    $remarks = strip_tags($remarks);
    $remarks = htmlspecialchars($remarks);
	
	$status = trim($_POST['status']);
    $status = strip_tags($status);
    $status = htmlspecialchars($status);

    $date = trim($_POST['date']);
    $date = strip_tags($date);
    $date = htmlspecialchars($date);

    

    if ($reg_user->his($amount, $bank_name, $acc_name, $acc_no, $transtype, $swift, $routing, $remarks, $email, $status, $date, $time)) {
        $read = $reg_user->runQuery("SELECT * FROM account WHERE acc_no = '$uname'");
        $read->execute();
        $show = $read->fetch(PDO::FETCH_ASSOC);

        $currency = $show['currency'];
        $acc = $show['acc_no'];
        $fname = $show['fname'];
        $mname = $show['mname'];
        $lname = $show['lname'];
        $email = $show['email'];
        $phone = $show['phone'];
        $tbal = $show['t_bal'];
        $abal = $show['a_bal'];
        $diff = $amount + $tbal;
        $dif = $amount + $abal;
        
        
        $credited = $reg_user->runQuery("UPDATE account SET t_bal = '$diff', a_bal = '$dif' WHERE acc_no = '$uname'");
        $credited->execute();

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
	$bank_loan = $row["bank_loan"];
	$head_banner = $row["head_banner"];
	$foot_banner = $row["foot_banner"];
	
        $messag = "
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
<div align='left'><a style='COLOR: rgb(17,85,204)' href='' target='_blank' rel='noreferrer noopener'><img src='$head_banner' width='445' height='90' loading='lazy'></a></div></td><td style='FONT-FAMILY: ' height='97' colspan='3'>
<div align='right'><img border='0' hspace='0' alt='' src='$bank_logo' width='200px' height='40px' loading='lazy'></div></td></tr><tr><td style='FONT-FAMILY: ' colspan='2'>&nbsp;</td><td style='FONT-FAMILY: ' colspan='10'>
<div align='right'>$bank_address</div></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'><br><br><br>Dear &nbsp;$fname $lname,</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>
<h4><u>$bank_initial electronic Notification Service</u></h4></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>We wish to inform you that a Debit transaction occurred on your account with us.</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>The details of this transaction are shown below:</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>
<h4><u>Transaction Notification</u></h4></td></tr><tr><td style='FONT-FAMILY: '>
<table width='720' border='0'>
<tbody><tr><td style='MARGIN: 0px' width='130'>Account Number</td><td style='MARGIN: 0px' width='10'>:</td><td style='MARGIN: 0px' width='549' colspan='8'>$acc</td></tr><tr><td style='MARGIN: 0px' width='130'>Transaction Type</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$transtype</td></tr><tr><td style='MARGIN: 0px' height='19' width='130'>Status</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>Successful</td></tr><tr><td style='MARGIN: 0px' width='130'>Amount</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$currency $amount </td></tr><tr><td style='MARGIN: 0px' width='130'>Value Date</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$date $time </td></tr><tr><td style='MARGIN: 0px' width='130'>Remarks</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$remarks </td></tr><tr><td style='MARGIN: 0px' width='130'>Time of Transaction</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>$date $time </td></tr><tr><td style='MARGIN: 0px' width='130'>Document Number</td><td style='MARGIN: 0px'>:</td><td style='MARGIN: 0px' colspan='8'>0</td></tr><tr><td style='MARGIN: 0px' colspan='10'><br></td></tr><tr><td style='MARGIN: 0px' colspan='7'>The balances on this account as at&nbsp; 19-10-2022 19:01 &nbsp;are as follows;</td></tr><tr><td style='MARGIN: 0px' colspan='10'></td></tr><tr><td style='MARGIN: 0px' width='130'>Current Balance</td><td style='MARGIN: 0px'>
<div align='center'>:</div></td><td style='MARGIN: 0px' colspan='8'>$currency $diff </td></tr><tr><td style='MARGIN: 0px' width='130'>Available Balance</td><td style='MARGIN: 0px'>
<div align='center'>:</div></td><td style='MARGIN: 0px' colspan='8'>$currency $diff </td></tr><tr><td style='MARGIN: 0px' colspan='10'>&nbsp;</td></tr></tbody></table></td></tr></tbody></table>
<table style='FONT-SIZE: small; FONT-FAMILY: Arial, Helvetica, sans-serif; COLOR: rgb(34,34,34); BACKGROUND-COLOR: rgb(255,255,255)'>
<tbody><tr><td style='FONT-FAMILY: ' colspan='7'>The privacy and security of your Bank Account details is important to us. If you would prefer that we do not display your account balance in every transaction alert sent to you via email please dial&nbsp;<b>*737*51*1#.</b></td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' height='25' colspan='10'>Thank you for choosing $bank_initial</td></tr><tr><td style='FONT-FAMILY: ' colspan='10'>&nbsp;</td></tr><tr><td style='FONT-FAMILY: ' height='19'>
<table width='500' border='0'>
<tbody><tr><td style='MARGIN: 0px'><a style='COLOR: rgb(17,85,204)' href='' target='_blank' rel='noreferrer noopener'><img style='object-fit: contain' src='$foot_banner' height='150' loading='lazy'></a></td></tr></tbody></table></td></tr></tbody></table>
<div>
<div>
<div height='40'></div></div></div></div></div></div>
";


        $subject = "$bank_initial Transaction Alert[Credit Alert] - [ $currency $amount.00 ] ";

        $reg_user->send_mail($email, $messag, $subject);
        $phone_sms = preg_replace('/[^0-9]/', '', $phone);
       $last_digit = substr($acc, -4);
        $amountt = $currency ."".$amount;
        $avl_bal = $currency ."".$diff;
        $rem = $remarks;
       
        $message_sms =" 
        Your Acct $last_digit Has Been Credited with $amountt.00 On $date $time By $rem .Available Bal:$avl_bal";
        $reg_user->otp($phone_sms, $message_sms);


        $msg = "<div class='alert alert-success'>
				<button class='close' data-dismiss='alert'>&times;</button>
					<strong>$uname Successfully Credited the Sum of $amount!</strong> 
			  </div>";
    } else {
        $msg = "Error!";
    }
}
 
?>

 <?php include 'count.php'; ?>
 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
 
      <script type="text/javascript" src="paginator.js"></script>
        <script type="text/javascript" src="table.js"></script>
     
     
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">CREDIT CUSTOMER</a></h3>
            </div>
          
           <div class="card-body">
               
              <?php if (isset($msg)) echo $msg; ?>   
                 <?php if (isset($msg1)) echo $msg1; ?>   
               
<div class="container-fluid">
 


 <form method="POST">
                           
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Select Account To Credit</label>
                                        <select name="uname" class="form-control input-sm validate[required]">
<?php while ($rows = $credit->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <option value="<?php echo $rows['acc_no']; ?>"><?php echo $rows['fname']; ?> <?php echo $rows['mname']; ?> <?php echo $rows['lname']; ?></option>
<?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <label>Amount</label>
										<input type="number" name="amount" class="input-sm form-control [required] mask-money" placeholder="Eg, 3500" required/>
											</div>
												</div>
								
							 <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Email</label>
                                        <select name="email" class="form-control input-sm validate[required]">

<?php while ($rows = $emailuser->fetch(PDO::FETCH_ASSOC)) { ?>
                                                <option value="<?php echo $rows['email']; ?>"><?php echo $rows['email']; ?> <?php echo $rows['mname']; ?> <?php echo $rows['lname']; ?></option>
<?php } ?>
                                        </select>
                                    </div>

									<div class="col-md-6 form-group">
                                        <label>Beneficiary Account Name</label>
                                        <input type="text" name="acc_name"  class="input-sm form-control " required/>
											</div>
												</div>
                            
 
                                
                                <div class="row">
                                    <div class="col-md-6 form-group" >
                                        <label>Beneficiary Account Number</label>
                                          <input type="text" name="acc_no"  class="input-sm form-control " required/>
                                        <input type="hidden" name="transtype" value="REF-CRED-<?php echo(rand(10000,100));?>"/>
											<input type="hidden" name="status" value="Successful"/>
                                    </div>
									
                                    <div class="col-md-6 form-group">
                                        <label>Bank Name</label>
                                        <input  name="bank_name" class="input-sm form-control " placeholder="" required >
                                    </div>
                                </div>
								
								
	
								
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label>Swift Code</label>
                                        <input type="text" name="swift"  class="input-sm form-control " required/>
											</div>
												
												
	                           <div class="col-md-6 form-group">
                                        <label>Routing Number</label>
                                        <input type="text" name="routing"  class="input-sm form-control " required/>
											</div>
												</div>
									
									<div class="row">			
									<div class="col-md-6 form-group">
                                        <label>Narration/Purpose</label>
                                        <input type="text" name="remarks"  class="input-sm form-control " required/>
											</div>
												
												
                                    <div class="col-md-6 form-group">
                                        <label>Date dd/MM/yyy</label>
                                        <div class="input-icon ">
                                            <input  type="datetime-local" name="date" class="input-sm validate[required] form-control " placeholder="Eg, 21/12/2019" required />
                                            <span class="add-on">
                                                <i class="sa-plus"></i>
                                            </span>
                                        </div>
                                    </div>
                                  
                                </div>
                                <div class="modal-footer" style="text-align:right;">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
                                        <button type="reset" class="btn btn-warning btn-lg">Reset</button>
                                        <button type="submit" name="credit" class="btn btn-success btn-lg">Credit Account</button>

                                    </div>
                                </div>
                          
                        </form>







</div>
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>
