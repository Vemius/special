<?php
include "../include/config.php";


$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_GET['subject'])){
	
$subject=$_GET['subject'];	

$msg = $reg_user->runQuery("SELECT * FROM message WHERE subject='$subject'");
$msg->execute();
$show = $msg->fetch(PDO::FETCH_ASSOC);


}

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($show) ){
    
    $sender_name = $row['sender_name'];
    $fname = $row['fname'];
    $lname = $row['lname'];
    $tc = $row['tc'];
    $date = $row['date'];
    $subject = $row['subject'];
    $msg = $row['msg'];

  
    
    
    
    $response .= "<tr>";
    $response .= "<td>Account Details: </td><td></td>";
    $response .= "</tr>";
    
     
    $response .= "<tr>";
    $response .= "<td>Receivers Name : </td><td>".$msg."</td>";
    $response .= "</tr>";
     
    


   
    

}
$response .= "</table>";

echo $response;
exit;