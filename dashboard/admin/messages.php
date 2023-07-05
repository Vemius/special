<?php
session_start();
require_once 'class.admin.php';
include_once ('session.php');
if(!isset($_SESSION['email'])){
	
header("Location: login.php");

exit(); 
}
$reg_user = new USER();


$account = $reg_user->runQuery("SELECT * FROM account");
$account->execute();
$stmt = $reg_user->runQuery("SELECT * FROM message ORDER BY id DESC LIMIT 200");
$stmt->execute();

if(isset($_POST['message']))
{
	
	$sender_name = trim($_POST['sender_name']);
	$sender_name = strip_tags($sender_name);
	$sender_name = htmlspecialchars($sender_name);
	
	$reci_name = trim($_POST['reci_name']);
	$reci_name = strip_tags($reci_name);
	$reci_name = htmlspecialchars($reci_name);
	
	$subject = trim($_POST['subject']);
	$subject = strip_tags($subject);
	$subject = htmlspecialchars($subject);
	
	$msg = trim($_POST['msg']);
	$msg = strip_tags($msg);
	$msg = htmlspecialchars($msg);
	
	
	
	
		if($reg_user->message($sender_name,$reci_name,$subject,$msg))
		{			
			$id = $reg_user->lasdID();	
			
			$msg = "
					<div class='alert alert-success'>
						<button class='close' data-dismiss='alert'>&times;</button>
						<strong>Sent!</strong>.
                     
			  		</div>
					";
		}
		else
		{
			echo "Sorry, Message was not sent";
		}		
}

?>
 <?php include 'count.php'; ?>

  
 <?php include 'headeradmin.php'; ?>
 

 <!---begin of Mobile View Here   only from Digital Forest Team-->
 
       <?php include 'menu.php'; ?>
  
  <!---End of Mobile View Here   only from Digital Forest Team-->
  
     
        <br><br><br><br><br><br><br>
  
    <div class="container-fluid mt--7">
     <!-- Table -->
      <div class="row">
        <div class="col">
          <div class="card shadow" >
            <div class="card-header border-0">
              <h3 class="mb-0"><a href=""   class="btn btn-danger">REPLY TICKETS</a></h3>
              <hr>
              <a data-toggle="modal" href="#compose-message" title="Compose Message" class="btn btn-success">
                                    <i class="sa-list-add">COMPOSE/REPLY</i>
                                </a>
            </div>
          
           <div class="card-body">
               
               	<?php if(isset($msg)) echo $msg;  ?>
               	
               	
               
                        <table class="table-responsive table table-bordered table-hover tile">
                            <thead>
		
                                <tr>
                                    <th><b>SENDER</b></th>
									<th><b>TO</b></th>
									<th><b>DATE</b></th>
                                    <th><b>MESSAGE</b></th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
							
		 <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)){?>
                                <tr>
                                    <td><?php echo $row['sender_name']; ?></td>
                                    <td><?php echo $row['reci_name']; ?></td>
                                    <td><?php echo $row['date']; ?></td>
                                    <td><?php echo $row['msg']; ?></td>
                                    <td><a href="dec.php?id=<?php echo $row['id']; ?>" title="Delete " rel="tooltip" class="pull-left list-check"><i class="fa fa-ban"></i>DELETE</a></td>
                                </tr>
                                 <?php }?>
                         </tbody>
                        </table>
                    </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                 
                
                
                 <div class="modal fade" id="compose-message">
                    <div class="modal-dialog">
                        <div class="modal-content">
						<form class="form-group" method="POST">
                            <div class="modal-header">
							
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Compose Message</h4>
                            </div>
                            <select class="form-control primary" name="sender_name">
                                <option class="form-control" >Sender</option>
                                <option class="form-control" style="background-color:#000" value="Customer Care">Customer Care</option>
                                <option class="form-control" style="background-color:#000" value="Account Officer">Account Officer</option>
                                <option class="form-control" style="background-color:#000" value="Service Department">Service Department</option>
                            </select>
							<select class="form-control primary"name="reci_name">
                                <option class="form-control" >To</option>
								<?php while($show = $account->fetch(PDO::FETCH_ASSOC)){?>
                                <option class="form-control" style="background-color:#000" value="<?php echo $show['uname']; ?>"><?php echo $show['fname']; ?> <?php echo $show['lname']; ?></option>
                                <?php }?>
                            </select>
                            <div class=" form-control">
                                <input type="text" class="form-control input-transparent" name="subject" placeholder="Subject...">
                                <input type="hidden" class="form-control input-transparent" name="message_status" value="1">
                            </div>
                            <div class="p-relative">
                                <div class="message-options">
                                    <img src="img/icon/tile-actions.png" alt="">
                                </div>
                                <textarea class="message-editor form-control" name="msg" placeholder="Message..."></textarea>
                            </div>
                            <div class="modal-footer m-0">
                                <button class="btn" data-dismiss="modal">Cancel</button>
								<button class="btn" type="subit" name="message">Send</button>
                            </div>
						</form>
                        </div>
                    </div>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
             
             
               </div>
        </div>
      </div>
     </div>
 
    
       <?php include 'foot.php'; ?>   
                