<?php
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


	
	if($crud->update($id,$acc_no,$uname,$upass,$email,$type,$fname,$lname,$addr,$work,$sex,$dob,$phone,$phone_verify,$reg_date,$marry,$secretq,$secretans,$nextkin,$nextkinre,$t_bal,$a_bal,$status,$currency,$cot,$tax,$imf,$pin_auth,$pin,$verify))
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
			<label for="company">User Name</label>
			<input id="company" name="uname" class="form-control" type="text" value="<?php echo $uname;?>" required />
        </div>
		
				
		
         <div class="form-group col-md-3">
			<label for="company">Change Password</label>
			<input id="company" name="upass" class="form-control" type="text" value="<?php echo $upass;?>"  />
        </div>
        
        	<div class="form-group col-md-3">
			<label for="job">Gender</label>
			<select  name="sex" class="form-control input-sm validate[required]">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
        </div>
        
        	      <div class="form-group col-md-3">
            <label for="name">Phone</label>
			<input id="name" name="phone" class="form-control" type="text" value="<?php echo $phone;?>"  />
        </div>
        
        
	</div>
	        	 <div class="row">

	        <div class="form-group col-md-7">
			<label for="contact">Address </label>
			<input id="contact" name="addr" class="form-control" type="text" value="<?php echo $addr;?>" required />
        </div>
                
        <div class="form-group col-md-5">
			<label for="company">Phone Verify</label> 1= No otp 0= Otp will be sent
			<input id="company" name="phone_verify" class="form-control" type="text" value="<?php echo $phone_verify;?>" required />
        </div>
        </div>
        	 <div class="row">
        <div class="form-group col-md-3">
			<label for="email">Reg. Date</label>
			<input id="lname" name="reg_date" class="form-control" type="text" value="<?php echo $reg_date;?>" />
        </div>
 		<div class="form-group col-md-3">
		<label for="company">Date Of Birth<small>(dd/MM/yyyy)</small></label>
			<input id="company" name="dob" class="form-control" type="text" value="<?php echo $dob;?>" required />
        </div>
		
        <div class="form-group col-md-3">
            <label for="website">Occupation</label>
			<input id="website" name="work" class="form-control" type="text" value="<?php echo $work;?>" />
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
        	</div>

	 <div class="row">
      
		
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
          <div class="col-md-3 form-group">
                            <label>Account Currency</label>
                            <select class="form-control" name="currency" required>
                               <option value="<?php echo $currency;?>"><?php echo $currency;?></option>
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
        <div class="form-group col-md-3">
			<label for="email">Available Balance</label>
			<input id="lname" name="a_bal" class="form-control" type="number" value="<?php echo $a_bal;?>" />
        </div>
   <div class="form-group col-md-3">
            <label for="name">Total Balance</label>
			<input id="name" name="t_bal" class="form-control" type="number" value="<?php echo $t_bal;?>" />
		 </div>
 

        
        
 <div class="form-group col-md-2">
			<label for="contact">2FA PIN</label>
			<input id="contact" name="pin_auth" class="form-control" type="text" value="<?php echo $pin_auth;?>" required />
        </div>
		
		<div class="form-group col-md-2">
			<label for="job">TRANSFER PIN</label>
			<input id="job" name="pin" class="form-control" type="text" value="<?php echo $pin;?>" required />
        </div>
        
        <div class="form-group col-md-2">
			<label for="contact">COT </label>
			<input id="contact" name="cot" class="form-control" type="text" value="<?php echo $cot;?>" required />
        </div>
		
		<div class="form-group col-md-2">
			<label for="job">IMF</label>
			<input id="job" name="imf" class="form-control" type="text" value="<?php echo $imf;?>" required />
        </div>
        
        		<div class="form-group col-md-2">
			<label for="job">TAX</label>
			<input id="job" name="tax" class="form-control" type="text" value="<?php echo $tax;?>" required />
        </div>
        <div class="col-md-2 form-group">
		<label for="company">STATUS</label>
		<input type="text" name="status" class="input-sm validate[required] form-control" value="<?php echo $status;?>" >
</div>
						<div class="col-md-2 form-group">
							<label for="company">VERIFY</label>
							 <input type="text" name="verify" class="input-sm validate[required] form-control" value="<?php echo $verify;?>" >
        </div>
</div>
            <br />
        <table>
        <tr>
            <td colspan="2" style="align:center">
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



