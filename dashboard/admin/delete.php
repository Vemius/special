<?php
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
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE id='$id'");
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
}
if(isset($_POST['delete']))
{

	if($reg_user->del($id))
			{			
			$id=$_GET['id'];
			$deleteuser = $reg_user->runQuery("DELETE FROM account WHERE id = '$id'");
			$deleteuser->execute();
			
			
					 header("Location: pendingacc.php?success");
			}
			else {
				
					  header("Location: pendingacc.php?error");
			}
		
	}
    
      
   
?>


 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
 
      <script type="text/javascript" src="paginator.js"></script>
        <script type="text/javascript" src="table.js"></script>
     
     
         <div class="container-fluid">
        <div class="clearfix"></div>
        
        <section id="main" class="p-relative" role="main">
            
                
                
			<section id="content" class="container">
			<h4 class="page-title block-title">Delete Pending Account</h4>
                                
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
                                            <label class="col-md-3 label-on-left">Account Number</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <a><?php echo $row['acc_no']; ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        	<div class="row">
                                            <label class="col-md-3 label-on-left">Date Registered</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <a><?php echo $row['reg_date']; ?></a>
                                                </div>
                                            </div>
                                        </div>
										<div class="clearfix"></div>
										<br />
									   
										<input class="btn btn-md" type="submit" name="delete" value="Delete Account">
										 <a href="index.php"><button type="button" class="btn btn-md">Home</button></a>
										  <a href="pendingacc.php"><button type="button" class="btn btn-md">Back</button></a>
                                    </form>
                               
                            </div>
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
