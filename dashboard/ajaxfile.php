<?php
include "../include/config.php";

$userid = $_POST['userid'];

$sql = "select * from transfer where id=".$userid;
$result = mysqli_query($con,$sql);

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $acc_no = $row['acc_no'];
    $acc_name = $row['acc_name'];
    $transtype = $row['transtype'];
    $bank_name = $row['bank_name'];
    $remarks = $row['remarks'];
    $amount = $row['amount'];
    $status = $row['status'];
    $date = $row['date'];
    

    
     
    $response .= "<tr>";
    $response .= "<td><strong>Receivers Name : </strong></td><td>".$acc_name."</td>";
    $response .= "</tr>";
     
    $response .= "<tr>";
    $response .= "<td><strong>Receiving Bank : </strong></td><td>".$bank_name."</td>";
    $response .= "</tr>";
   
    $response .= "<tr>";
    $response .= "<td><strong>Receivers Account No. : </strong></td><td>".$acc_no."</td>";
    $response .= "</tr><br>";
    
    $response .= "<tr>";
    $response .= "<td><strong>Amount : </strong></td><td>USD $".$amount."</td>";
    $response .= "</tr>";
    
    $response .= "<tr>";
    $response .= "<td><strong>Date | Time : </strong></td><td>".$date."</td>";
    $response .= "</tr>";
    
    $response .= "<tr>";
    $response .= "<td><strong>Status : </strong></td><td>".$status."</td>";
    $response .= "</tr>";


   
    

}
$response .= "</table>";

echo $response;
exit;