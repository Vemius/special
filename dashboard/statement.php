<?php
session_start();
include "../include/config.php";
include_once ('../include/session.php');
require_once '../include/class.user.php';
if (!isset($_SESSION['acc_no'])) {
    header("Location: login.php");
    exit();
}

$user_home = new USER();

$reg_user = new USER();

$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no" => $_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);



$email = $row['email'];

$temp = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ");
$temp->execute(array(":acc_no" => $_SESSION['acc_no']));
$rows = $temp->fetch(PDO::FETCH_ASSOC);


?>

<?php include 'header.php'; ?>
<?php include 'aside.php'; ?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6><strong>Transaction Statement:</strong></h6><p><div class="d-none d-lg-block">Click on Account name to see more details</div>
</p>
            </div>
           <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="example" class="display pagination table  nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr> 
                      <th id="tableasc" class="text-sm font-weight-bold opacity ps-1"  style="width:1%">DATE/TIME</th>
                      <th class="text-sm font-weight-bold opacity ps-1">TRANS TYPE</th>
                      <th class="text-sm font-weight-bold opacity ps-1">ACCOUNT -  NAME</th>
                      <th class="text-sm font-weight-bold opacity ps-1">BANK</th>
                      <th class="text-sm font-weight-bold opacity ps-1">REMARKS</th>
                      <th class="text-sm font-weight-bold opacity ps-1">AMOUNT (<?php echo $row['currency']; ?>)</th>                     
                        <th class="userinfo text-sm d-sm-none"></th>
                </tr>
                 </thead>
             
                  <tbody>

                <?php 
                $acc_no = $_SESSION['acc_no'];
				$email = $row['email'];
				$his = $reg_user->runQuery("SELECT * FROM transfer WHERE email = '$email' ORDER BY date DESC");
				$his->execute(array(":acc_no"=>$_SESSION['acc_no']));
                while($rows = $his->fetch(PDO::FETCH_ASSOC)){

    $id = $row['id'];
    $acc_no = $row['acc_no'];
    $acc_name = $row['acc_name'];
    $transtype = $row['transtype'];
    $bank_name = $row['bank_name'];
    $remarks = $row['remarks'];
    $amount = $row['amount'];
    $status = $row['status'];
    $date = $row['date'];
                ?>
                     <tr> 
                        <td class='text-sm  ps-1'><?php echo $rows['date']; ?></td>
						<td class='text-sm  ps-1'><?php echo $rows['transtype']; ?></td>
						<td style="max-width: 250px; overflow: hidden; text-overflow: ellipsis;" data-id="<?php echo $rows['id']; ?>" class="userinfo cursor-pointer text-sm  ps-1"><?php
// Get the account number from $rows['acc_no']
$number = $rows['acc_no'];

// Replace the first 5 digits with asterisks
$hiddenNumber = "****" . substr($number, 5);

// Display the hidden number
echo $hiddenNumber;
?> - <?php echo $rows['acc_name']; ?></td>
						<td class='text-sm  ps-1' style="max-width: 300px; overflow: hidden; text-overflow: ellipsis;"><?php echo $rows['bank_name']; ?></td>
						<td class='text-sm  ps-1'><?php echo $rows['remarks']; ?></td> 
						<td class='text-sm  ps-1' scope="row"><?php echo number_format ($rows['amount'],2); ?><td data-id="<?php echo $rows['id']; ?>" class='userinfo d-block d-sm-none bg-info text-white cursor-pointer text-sm'>Receipt</td></td>
                  </tr>
                
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
              <script>
		function printDiv(divName){
			var printContents = document.getElementById(divName).innerHTML;
			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents;

			window.print();

			document.body.innerHTML = originalContents;

		}
	</script>
      <!----modal ----->
      <div id='printMe'>

                  <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content mx-auto pt-3 pb-5">
                        <div class="modal-header">
                            <h4 class="modal-title">Transaction Receipt</h4>
                            <img src="../assets/img/brand/blue.png" class="w-30" >
                    <span class="close-button" onclick="closeModal()">&times;</span>
                    </div>
                          <div class="formgroup mx-auto">
                          <hr class="horizontal dark mt-1 mb-3">
                          <h4>Transaction Details</h4>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <hr class="horizontal dark mt-6 mb-0">
                <div class="col-lg-0 col-md-7">
                    
<button onclick="printDiv('printMe')" class="btn bg-gradient-info mb-0 noprint">Print</button>


                </div>
                </div>
                        </div>
                    </div>
                  
                </div>
            </div>                </div>
                </div>


      <!-----modal -------->

          </div>
        </div>
      </div>

<script>
    function closeModal() {
        $('#empModal').modal('hide');
    }
</script>

     
             <?php include 'footer.php'; ?>
