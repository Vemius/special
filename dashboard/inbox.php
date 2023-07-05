<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if(!isset($_SESSION['acc_no'])){
	
header("Location: login.php");
exit(); 
}
$user_home = new USER();



$stmt = $user_home->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


?>

<?php include 'header.php'; ?>
<?php include 'aside.php'; ?>

    <!-- End Navbar -->
    
        <div class="col-lg-6 mx-auto">
          <div class="card">
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></h6>
            </div>
            <div class="card-body pb-0 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-0">
                  <div class="w-100">
                    <div class="d-flex mb-2">
                      <span class="me-4 text-lg font-weight-bolder text-capitalize">Available Balance</span>
                      <span class="me-4 text-lg  text-capitalize"><?php echo $row['currency']; ?><?php echo $english_format_number = number_format( $row['a_bal'] , 2, '.', ','); ?></span>
                      </div>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="w-100">
                    <div class="d-flex mb-2">
                      <span class="me-4 text-mfont-weight-bold text-capitalize">Account Number: <?php echo $row['acc_no']; ?> | Account type: <?php echo $row['type']; ?>  </span>
                        <p class="d-inline-block text-danger mb-0"> </p>                    </div>
                    <div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-gradient-dark w-100" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                  <div class="w-100">
                    <div class="d-flex mb-2">
                      <span class="me-2 text-sm font-weight-bold text-capitalize">Logged in IP: <?PHP

function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


$user_ip = getUserIP();

echo $user_ip; // Output IP address [Ex: 177.87.193.134]


?></span>
                      <span class="ms-auto text-sm font-weight-bold"></span>
                    </div>
                    <div>
                      <div class="progress progress-md">
                        <div class="progress-bar bg-gradient-danger w-100" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="card-footer pt-0 p-3 d-flex align-items-center">
              <div class="w-60">
                <p class="text-sm">
                  Always Keep your <b>PASSWORD</b> Safe. We will never ask you for your login details via mail. <b>Contact customer care on</b> <?php echo $site_mobile; ?>.
                </p>
              </div>
              <div class="w-40 text-end">
                <a class="btn bg-gradient-dark mb-0 text-end" href="statement.php">Transaction History</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-11 mx-auto m-3">
          <div class="card">
            <div class="table-responsive p-4">
            <table id="example"class="table align-items-center no-wrap" cellspacing="0" width="100%">

                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Subject</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                  </tr>
                </thead>
                <tbody>
                    <?php 
								$date = $row['date'];
								$reci_name = $row['uname'];
								$msg = $user_home->runQuery("SELECT * FROM message INNER JOIN account ON message.reci_name= account.uname  WHERE account.uname = '$reci_name' ORDER BY date DESC LIMIT 0, 5");
								$msg->execute(array(":reci_name"=>$_SESSION['uname']));
								while($show = $msg->fetch(PDO::FETCH_ASSOC)){?>
                    
                    
                  <tr >
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3" alt="avatar image">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?php echo $show['sender_name']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-sm cursor-pointer text-secondary mb-0"><a href="message.php?subject=<?php echo $show['subject']; ?>"><div class="email-title"><?php echo $show['subject']; ?></p>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-sm"><?php echo $show['email']; ?></span>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-sm"><?php echo $show['date']; ?></span>
                    <a class="d-block d-sm-none bg-info text-sm p-2 text-white mt-4 mb-4" href="message.php?subject=<?php echo $show['subject']; ?>">Read message</a>
                    </td>

                  </tr>
                  
                  									<?php } ?>

                  
                  </tr>
                </tbody>
              </table>
            </div>
            </div>
          </div>
        </div>
      </div>
        </div>
      </div>
                    <?php include 'footer.php'; ?>
					