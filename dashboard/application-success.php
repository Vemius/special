<?php
session_start();
require_once 'admin/class.admin.php';
include_once ('admin/session.php');

$reg_user = new USER();
 
?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Registration Acknowledgement Page</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
</head>
<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <center>  <h4 style="color:green;  font-weight:700;"class="modal-title">Acknowledgment Successful</h4></center>
                
            </div>
            <div class="modal-body">
               
                                                         <p style="text-align:center;"><strong style="color:green;">Dear Customer,</strong> Please wait till Our Customer Service validate your account, 
                                         then you can login to you account.</p>
                    		  <p style="text-align:center;">This Process can take <strong style="color:green;">1-2 business working days</strong>, once your account is validated, you will be notify through your registered 
                    		  email address</p>
                    		  <p style="text-align:center;">A details of <?php echo $bank_name; ?> Registration has been sent your email address including the <strong style="color:orange;"><?php echo $bank_name; ?> 10 Digit Account </strong>
                    		  Number and other mogul information</p> 
                    		  
                    		 <p style="text-align:center;">kindly check your mail for further information</p> 
                    		 
                    		 <p>&nbsp;</p>
                    		 <p>FOR: <?php echo $site_title; ?>, Member FDIC</p>
                <form>
                    <hr>
                    <center><button type="submit" class="btn btn-danger"><a style="color:white; font-weight:700;" href="login.php">CLICK OKAY</a></button></center>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>