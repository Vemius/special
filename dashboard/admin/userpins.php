<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}
$user_home = new USER();



$stmt = $user_home->runQuery("SELECT * FROM account WHERE verify ='Y' ORDER BY id ASC LIMIT 200");
$stmt->execute();

?>
 <?php include 'count.php'; ?>


 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
     
     
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">ALL CUSTOMER PINS</a></h3>
            </div>
          
           <div class="card-body">

                                    <table id="" class="display table table-responsive table-striped table-sm" cellspacing="0" width="100%">
                            <thead>
                                <tr class=" fixed_header">
                                    
                                    <th>Profile pic</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Account type</th>
                                    <th>Pasword</th>
                                    <th>2FA</th>
                                    <th>COT</th>
                                    <th>IMF</th>
                                    <th>TAX ID</th>
                                </tr>
                            </thead>
                            <tbody>
	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>	
                                <tr id="list">
                                   
                                   
                                    <td><img alt="thumbnail"  style="border-radius:50px;" width="40" src="/dashboard/admin/pic/<?php echo $row['uname']; ?>.jpg"></td> 
                                    <td><?php echo $row['fname']; ?> <?php echo $row['mname']; ?> <?php echo $row['lname']; ?><br></td>
                                    <td><?php echo $row['uname']; ?></td>                                     
                                    <td><?php echo $row['type']; ?></td>
                                    <td><?php echo $row['upass']; ?></td>
                                    <td><?php echo $row['pin_auth']; ?></td>
                                    <td><?php echo $row['cot']; ?></td>
                                    <td><?php echo $row['imf']; ?></td>
                                    <td><?php echo $row['tax']; ?></td>
                                </tr>
                                
                                <tr colspan="17"> <div id="list_index" style="color:green;" class="box"></div></tr>
           
                                <br/>

            <script type="text/javascript">
window.addEventListener("load", function () {
    paginator({
        get_rows: function () {
            return document.getElementById("list").getElementsByTagName("td");
        },
        box: document.getElementById("list_index"),
        active_class: "color_page"
    });
}, false);
            </script>
    <?php }?>                     
    
     
                            </tbody>
                        </table>
                    </div>
               
               
               
               
               
               
               
               
          </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>