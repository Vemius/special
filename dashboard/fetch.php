<?php
    include('connect.php');
    $ids = array();
    // $ids = implode(",",$_POST["id"]);
    $ids = $_POST["id"];
    
    
    // $deactive = "UPDATE message SET active=0 where n_id IN(".$ids.")";
    $deactive = "UPDATE message SET active=0 where n_id= ".$ids." ";
    
    $result = mysqli_query($connection,$deactive);
    echo mysqli_error($connection);

?>