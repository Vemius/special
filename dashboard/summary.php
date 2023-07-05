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

 <div class="container-fluid py-4">
     <!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div class="tradingview-widget-container__widget"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener" target="_blank"><span class="blue-text"></span></a></div>
  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
  {
  "symbols": [
    {
      "proName": "FOREXCOM:SPXUSD",
      "title": "S&P 500"
    },
    {
      "proName": "FOREXCOM:NSXUSD",
      "title": "US 100"
    },
    {
      "proName": "FX_IDC:EURUSD",
      "title": "EUR/USD"
    },
    {
      "proName": "BITSTAMP:BTCUSD",
      "title": "Bitcoin"
    },
    {
      "proName": "BITSTAMP:ETHUSD",
      "title": "Ethereum"
    }
  ],
  "showSymbolLogo": true,
  "colorTheme": "light",
  "isTransparent": false,
  "displayMode": "adaptive",
  "locale": "en"
}
  </script>
</div>
<!-- TradingView Widget END -->
     </div>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-xl-6 mb-xl-0 mb-4">
              <div class="card bg-transparent shadow-xl">
                <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('../assets/img/curved-images/curved14.jpg');">
                  <span class="mask bg-gradient-dark"></span>
                  <div class="card-body position-relative z-index-1 p-3">
                    <i class="fas fa-wifi text-white p-2"></i>
                    <h5 class="text-white mt-4 mb-5 pb-2">5425&nbsp;&nbsp;&nbsp;2334&nbsp;&nbsp;&nbsp;3010&nbsp;&nbsp;&nbsp;9903</h5>
                    <div class="d-flex">
                      <div class="d-flex">
                        <div class="me-4">
                          <p class="text-white text-sm opacity-8 mb-0">Card Holder</p>
                          <h6 class="text-white mb-0"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></h6>
                        </div>
                        <div>
                          <p class="text-white text-sm opacity-8 mb-0">Expires</p>
                          <h6 class="text-white mb-0"><?php
// Set the timezone to the desired timezone
date_default_timezone_set('America/New_York');

// Get the current year and add one to get the next year
$nextYear = date('Y') + 1;

// Set the date to January 1st of the next year
$date = new DateTime("$nextYear-01-01");

// Echo the date in the desired format
echo $date->format('m/Y');
?></h6>
                        </div>
                      </div>
                      <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                        <img class="w-60 mt-2" src="../assets/img/logos/mastercard.png" alt="logo">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6">
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                          <a class="" href="make_transfer.php">
                        <i class="fas fa-landmark opacity-10"></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0" >Make Deposit</h6>
                      <span class="text-xs">Bank Transfer</span>
                      <hr class="horizontal dark my-3">
                    </div>
                  </div>
                </div></a>
                <div class="col-md-6 mt-md-0 mt-4">
                  <div class="card">
                    <div class="card-header mx-4 p-3 text-center">
                      <div class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                          <a class="" href="cryptocurrency.php">
                        <i class="fab fa-btc opacity-10" ></i>
                      </div>
                    </div>
                    <div class="card-body pt-0 p-3 text-center">
                      <h6 class="text-center mb-0">Cryptocurrency</h6>
                      <span class="text-xs">Buy bitcoin</span>
                      <hr class="horizontal dark my-3">
                    </div></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 mb-lg-0 mb-4">
              <div class="card mt-4">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Payment Method</h6>
                    </div>
                    <div class="col-6 text-end">
                      <a class="btn bg-gradient-dark mb-0" href="virtual_card.php"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-md-6 mb-md-0 mb-4">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img class="w-10 me-3 mb-0" src="../assets/img/logos/mastercard.png" alt="logo">
                        <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;9903</h6>
                        <a class="ms-auto" href="virtual_card.php"><i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i></a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
                        <img class="w-10 me-3 mb-0" src="../assets/img/logos/visa.png" alt="logo">
                        <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;9299</h6>
                        <a class="ms-auto" href="virtual_card.php"><i class="fas fa-pencil-alt ms-auto text-dark cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Card"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card h-100">
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-12 d-flex align-items-center">
                  <h6 class="mb-0">Welcome <?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></h6>
                </div>
                <div class="col-6 text-end">
                 
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-0">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-1 text-dark font-weight-bold text-sm">Account Balance</h6>
                    <span class="text-xs"><?php echo $row['currency']; ?><?php echo $english_format_number = number_format( $row['a_bal'] , 2, '.', ','); ?></span>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                    
                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><a  href="make_transfer.php"><i class="fa fa-send text-lg me-1"></i>Transfer</button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">BTC wallet</h6>
                    <span class="text-xs">N/A Since <?php echo " " .$today = date("F j, Y"); ; ?></span>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                    
                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa fa-btc text-lg me-1"><a  href="cryptocurrency.php"></i> Buy BTC </button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Ledger Balance</h6>
                    <span class="text-xs"><?php echo $row['currency']; ?><?php echo $english_format_number = number_format( $row['a_bal'] , 2, '.', ','); ?></span>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                    
                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa fa-bar-chart text-lg me-1"><a  href="statement.php"></i> Statement</button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Loan Status</h6>
                    <span class="text-xs">Since <?php echo " " .$today = date("F j, Y"); ; ?></span>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                    
                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fas fas fa-hand-holding-usd text-lg me-1"><a  href="apply_for_loan.php"></i> Apply</button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="text-dark mb-1 font-weight-bold text-sm">Transfer Mode</h6>
                    <span class="text-xs">Since <?php echo " " .$today = date("F j, Y"); ; ?></span>
                  </div>
                  <div class="d-flex align-items-center text-sm">
                    
                    <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-4"><i class="fa fa-money text-lg me-1"><a  href="wire-transfer.php"></i> Wire Transfer</button></a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Tickets / Support</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                   <?php 
								$reci_name = $row['uname'];
								$date = $row['date'];
								$msg = $user_home->runQuery("SELECT * FROM message INNER JOIN account ON message.reci_name= account.uname  WHERE account.uname = '$reci_name' ORDER BY date DESC LIMIT 0, 2");
								$msg->execute(array(":reci_name"=>$_SESSION['uname']));
								while($show = $msg->fetch(PDO::FETCH_ASSOC)){?>
                    
                <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column"><h6 class="mb-3 text-sm"><?php echo $show['subject']; ?></h6>
                    <span class="mb-2 text-xs">Email From: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $show['sender_name']; ?></span></span>
                    <span class="mb-2 text-xs">To: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?></span></span>
                    <span class="text-xs">Date: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $show['date']; ?></span></span>
                  </div>
                  <div class="ms-auto text-end">
    <a class="btn btn-link px-3 mb-0" href="message.php?subject=<?php echo $show['subject']; ?>"><i class="fas fa-pencil-alt  me-2" aria-hidden="true"></i>Read</a>
                    <a class="btn btn-link text-primary text-gradient px-3 mb-0" href="contact_support.php"><i class="fa fa-reply me-2"></i>Reply</a>
                                      </div>
                </li>
                									<?php } ?>

              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <div class="col-md-6">
                  <h6 class="mb-0">Your Transaction's</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end align-items-center">
                  <h6 class="mb-0 me-3">Amount</h6>
                </div>
              </div>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                      <?php 
                $acc_no = $_SESSION['acc_no'];
				$email = $row['email'];
				$his = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY DATE DESC LIMIT 0, 5");
				$his->execute(array(":acc_no"=>$_SESSION['acc_no']));
                while($rows = $his->fetch(PDO::FETCH_ASSOC)){?>
                
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                <a data-id="<?php echo $rows['id']; ?>" class="userinfo cursor-pointer btn btn-icon-only btn-rounded btn-outline-info mb-0 me-3 btn-m d-flex align-items-center justify-content-center"><i class="fas fa-eye fa-2x"></i></a>
                    <div class="d-flex flex-column">
                      <h6 class="mb-1 text-dark text-sm"><?php echo $rows['acc_name']; ?></h6>
                      <span class="text-xs"><?php echo $rows['date']; ?></span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                    - <?php echo $row['currency']; ?><?php echo $rows['amount']; ?>
                  </div>
                </li>
               <?php } ?>
                <script type='text/javascript'>

            $(document).ready(function(){

                $('.userinfo').click(function(){
                   
                    var userid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            // Add response in Modal body
                            $('.modal-body').html(response); 

                            // Display Modal
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>

                </tbody>
              </table>
    </div>
              </div></div>
      <!----modal ----->
                  <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                     <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
	      <div id='printMe'>

                    <div class="modal-content mx-auto pt-3 pb-5">
                        <div class="modal-header">
                            <h4 class="modal-title">Transaction Receipt</h4>
                            <img src="../assets/img/brand/blue.png" class="w-30" >
                                                <span class="close-button" onclick="closeModal()">&times;</span>

                          </div>
                          <div class="formgroup mx-auto">
                          <hr class="horizontal dark mt-1 mb-3">
                          <h6>Transaction Details</h6>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <hr class="horizontal dark mt-6 mb-0">
                <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                    
<button onclick="printDiv('printMe')" class="btn bg-gradient-info mb-0 noprint">Print</button>

                </div>
                        </div>
                    </div>
                  
                </div>
            </div>                </div>
                </div>

      
      <!-----modal -------->
              </ul>
            </div>
          </div>
        </div>
      </div>
      <script>
    function closeModal() {
        $('#empModal').modal('hide');
    }
</script>

  <?php include 'footer.php'; ?>