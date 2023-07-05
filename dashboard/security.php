<?php
session_start();
include_once ('../include/session.php');

require_once '../include/class.user.php';
if (!isset($_SESSION['acc_no'])) {

    header("Location: login.php");
    exit();
}
$reg_user = new USER();

$user_home = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
if ($stat == 'Dormant/Inactive') {
    header('Location: summary.php?dormant');
    exit();
}
if (isset($_POST['reset-pass'])) {
    $pass = $_POST['upass1'];
    $cpass = $_POST['upass'];

    if ($cpass !== $pass) {
        $msg1 = "<div class='alert alert-danger' fade in  alert-dismissible>
			<a href='#' class='close2' data-dismiss='alert' aria-label='close'>&times;</a>
Sorry! Passwords Doesn't match. 
						</div>";
    } else {

        //notify the user via email and sms - your password has been changed

        if (($_POST['oldpass']) == $row['upass']) {
            $timezone = date_default_timezone_get();
            date_default_timezone_set($timezone);
            $date = date('m/d/Y h:i:s a', time());
            $subject = "Password successfully changed!";
            $message = "Dear " . $row['fname'] . " your Internet banking password has been changed " . $date . " if you did't do it ,Contact customer care Immediately";
            $reg_user->send_mail($row['email'], $message, $subject);
            $phone = preg_replace('/[^0-9]/', '', $row['phone']);
            $mobile_msg = "Dear " . $row['fname'] . " your Internet banking password has been changed " . $date . " if you did't do it ,Contact customer care Immediately";
            //$reg_user->otp($phone,$mobile_msg);


            $password = ($cpass);
            $stmt = $reg_user->runQuery("UPDATE account SET upass=:upass WHERE acc_no=:acc_no");
            $stmt->execute(array(":upass" => $password, ":acc_no" => $_SESSION['acc_no']));

            $msg1 = "<div class='alert alert-success'  fade in  alert-dismissible'>
    <a href='#' class='close2' data-dismiss='alert' aria-label='close'>&times;</a>
     Password Changed!
        </div>";
        } elseif (empty($pass) || empty($cpass)) {
            $msg1 = "<div class='alert alert-danger' fade in alert-dismissible'>
    <a href='#' class='close2' data-dismiss='alert' aria-label='close'>&times;</a>
						Fill out the new and confirm password!
						</div>";
        } else {
            $msg1 = "<div class='alert alert-danger'  fade in  alert-dismissible>
            <a href='#' class='close2' data-dismiss='alert' aria-label='close'>&times;</a>
						Old Password doesn't match!
						</div>";
        }
    }
}


include_once ('counter.php');
?>
<?php include 'header.php'; ?>
<?php include 'aside.php'; ?>


    <div class="container-fluid my-3 py-3">
      <div class="row">
        <div class="col-sm-6">
          <label class="form-label">Security Question</label>
          <input class="form-control" value="<?php echo $row['secretq']; ?>" name="choices-questions" id="choices-questions" disabled="">
          
        </div>
        <div class="col-sm-6">
          <label class="form-label">Your Answer</label>
          <div class="form-group">
            <input class="form-control" type="<?php echo $row['secretans']; ?>" placeholder="Enter your answer" value="*********" readonly />
          </div>
        </div>
         <div class="col-sm-6">
          <label class="form-label">Next of Kin</label>
          <input class="form-control" value="<?php echo $row['nextkin']; ?>" name="choices-questions" id="choices-questions" disabled="">
          
        </div>
        <div class="col-sm-6">
          <label class="form-label">Relationship</label>
          <div class="form-group">
            <input class="form-control" type="text" placeholder="Enter your answer" value="<?php echo $row['nextkinre']; ?>" readonly />
          </div>
        </div>
        <hr class="horizontal dark mt-1 mb-3">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Security Settings</h6>
            </div>
            <div class="card-body p-3">
              <div class="form-group d-flex align-items-center justify-content-between">
                <span class="text-sm">Notify me via email when logging in</span>
                <div class="form-check form-switch ms-3">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault30" checked="checked">
                </div>
              </div>
              <div class="form-group d-flex align-items-center justify-content-between">
                <span class="text-sm">Send SMS confirmation for all online payments</span>
                <div class="form-check form-switch ms-3">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault31" checked="checked">
                </div>
              </div>
              <div class="form-group d-flex align-items-center justify-content-between">
                <span class="text-sm">Check which devices accessed your account</span>
                <div class="form-check form-switch ms-3">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault32" checked="checked">
                </div>
              </div>
              <div class="form-group d-flex align-items-center justify-content-between">
                <span class="text-sm">Find My Device, make sure your device can be found if it gets lost</span>
                <div class="form-check form-switch ms-3">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault33">
                </div>
              </div>
              <div class="form-group d-flex align-items-center justify-content-between">
                <span class="text-sm">Lock your device with a PIN, pattern, or password</span>
                <div class="form-check form-switch ms-3">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault34">
                </div>
              </div>
              <div class="form-group d-flex align-items-center justify-content-between">
                <span class="text-sm">Manage what apps have access to app-usage data on your device</span>
                <div class="form-check form-switch ms-3">
                  <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault35" checked="checked">
                </div>
              </div>
              <div class="row mt-5">
                <div class="col-lg-8 col-12 actions text-end ms-auto">
                  <button class="btn btn-outline-primary btn mb-0" type="reset">Back</button>
                  <a href="contact_support.php"><button class="btn bg-gradient-primary btn mb-0" type="button">Contact for Kyc Update</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 mt-md-0 mt-4">
          <div class="card">
            <div class="card-header p-3 pb-0">
              <div class="d-flex align-items-center">
                <h6 class="mb-0">
                  Two factor authentication
                </h6>
                <button class="btn btn-s bg-gradient-dark  mb-0 p-2 ms-auto">
                  Enabled
                </button>
              </div>
            </div>
            <div class="card-body p-3">
              <p class="text-muted text-sm mb-4 mt-sm-5 mt-3">
                Two-factor authentication adds an additional
                layer of security to your account by requiring more
                than just a password to log in.
              </p>
              <div class="card">
                <div class="card-body border-radius-lg bg-gradient-dark p-3">
                  <h6 class="mb-0 text-white">
                    Questions about security?
                  </h6>
                  <p class="text-white text-sm mb-4">
                    Have a question, concern, or comment
                    about security? Please contact us.
                  </p>
                   <a href="contact_support.php"><button class="btn bg-gradient-light mb-0">Contact Us</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row gx-4 mt-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header p-3 pb-0">
              <h6 class="mb-1">Change password</h6>
              <p class="text-sm mb-0">
                Change Account Password
              </p>
            </div>
                          <form method="POST">
                              
 <?php
                                    if (isset($msg1)) {
                                        echo $msg1;
                                    }
                                    ?>
                                    
                                    
            <div class="card-body p-3">
              <label class="form-label">Current password</label>
              <div class="form-group">
                <input class="form-control" type="password" name="oldpass" placeholder="Current password">
              </div>
              <label class="form-label">New password</label>
              <div class="form-group">
                <input class="form-control" type="password" name="upass1" minlength="6" placeholder="New password">
              </div>
              <label class="form-label">Confirm new password</label>
              <div class="form-group">
                <input class="form-control" type="password" name="upass" minlength="6" placeholder="Confirm password">
              </div>
              <button class="btn bg-gradient-dark w-100 mb-0" name="reset-pass" type="submit">Update password</button>
            </div>
          </div>
        </div>	
        </form>
        <div class="col-md-6 mt-md-0 mt-4">
          <div class="card">
            <div class="card-header p-3 pb-0">
              <h6 class="mb-1">
                Password requirements
              </h6>
              <p class="text-sm mb-0">
                Please follow this guide for a strong password:
              </p>
            </div>
            <div class="card-body p-3">
              <ul class="text-muted ps-4 mb-0">
                <li>
                  <span class="text-sm">One special characters</span>
                </li>
                <li>
                  <span class="text-sm">Min 6 characters</span>
                </li>
                <li>
                  <span class="text-sm">One number (2 are recommended)</span>
                </li>
                <li>
                  <span class="text-sm">Change it often</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>        </div>
        </div>
      </div>
        <?php include 'footer.php'; ?>