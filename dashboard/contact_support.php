<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if (!isset($_SESSION['acc_no'])) {
    header("Location: ../login.php");
    exit();
}

$user_home = new USER();

$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$email = $row['email'];

$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY id DESC LIMIT 3");
$temp->execute(array(":acc_no" => $_SESSION['acc_no']));
$rows = $temp->fetch(PDO::FETCH_ASSOC);


?>

<?php include 'header.php'; ?>
<?php include 'aside.php'; ?>


    <div class="container-fluid my-3 py-3">
      <div class="row">
           <hr class="horizontal dark mt-1 mb-3">
           
        <div class="col-md-5">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Security Settings</h6>
            </div>
            <div class="card-body">
              <div class="">
                           <img class="w-100 mt-2" src="../assets/img/brand/watchout.gif" alt="logo">

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0"><div class="">
            <p class="text-sm mx-auto"><?php echo $site_title; ?> | <?php echo $support_email; ?></br><?php echo $site_mobile; ?></p>
                       <hr class="horizontal dark mt-1 mb-3">
                      </div></h6>
            </div>
            <div class="card-body p-3">
                
                <!--- add form -->
                
                
            <form autocomplete="off" method="post" id="frmContactus" >

          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Together we can create a strategy that evolves with your needs.</h6>
            </div>
             <div class="row  wt-5">
                  <div class="col-md-12">
                    <div class="card-body">
                  
<div class="landingPageForm__header">
            <div class="landingPageForm__header__txt"><h2></h2>
</div>

            <div class="landingPageForm__header__message">
               
<p><b>Call <?php echo $site_mobile; ?><b> to speak with a <?php echo $site_title; ?> team member from Mon-Fri 9 AM - 6 PM EST.</p>
<p>Please complete the form below for any support related issue</p>

         </div>
        </div>

                    
            <div class="row">
                <div class="col-lg-6 col-m-6 col-sm-6 col-xs-12 landingPageForm__formDetails__dropdown contactInfoTextRow">
         
                </div>
            </div>      <div class="col-md-6">
                                            <div class="form-group">
                                              
                                                <label >                                             
</label>
                                                <input type="hidden" class="form-control"  name="sender_name" value="<?php echo $row['fname']; ?> <?php echo $row['mname']; ?> " />

                                            </div>
                                        </div>

                                            <div class="row  mt-0 w-90 mx-auto">
                                            <div class="form-group">
                 <p><strong>Name</strong>: <?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></p>
                  <p class="text-grey"><strong>To</strong>: <?php echo $site_initial; ?> Customer Care Department</p>
                            </div>
                            </div>       
                                           <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="subject" placeholder="Subject" value="" required>                                       </div>
                                           
                                          
                                           <div class="input-group mb-2">
                                            <textarea type="textbox" class="form-control" name="msg" placeholder="Dear <?php echo $row['fname']; ?> How can we help you today?" value="" required>
                                                
                                            </textarea>                                           </div></div></div>
                                            	
                                    <div class="row  mt-3 mx-auto">
                                            <div class="formgroup text-sm "><p class="text-sm ms-3 ">Click continue once to have a dedicated <?php echo $site_initial; ?>
 team member contact you.</p>
                                        <div class="col-md-12 mt-3">
							<button type="submit" class="btn btn-info" name="submit" id="submit">Submit</button>
							
						 </div>
                                    </div>
            </div>            </div>            </div>   </div>
        </div> </form> <span id="msg"></span>
      </div>
     
                                             

        </div>
      </div>
       <script>
	  jQuery('#frmContactus').on('submit',function(e){
		jQuery('#msg').html('');
		jQuery('#submit').html('Please wait');
		jQuery('#submit').attr('disabled',true);
		jQuery.ajax({
			url:'contactajax.php',
			type:'post',
			data:jQuery('#frmContactus').serialize(),
			success:function(result){
				jQuery('#msg').html(result);
				jQuery('#submit').html('Submit');
				jQuery('#submit').attr('disabled',false);
				jQuery('#frmContactus')[0].reset();
				$("#msg").fadeOut(9000);
				$("#frmContactus").fadeOut(1000);
				

			}
		});
		e.preventDefault();
	  });
	  </script>
        <?php include 'footer.php'; ?>