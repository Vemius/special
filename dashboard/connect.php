<?php
   define('HOST','localhost');
   define('PWD','itid@123.=');
   define('USERNAME','trusvbsz_epaitid');
   define('DB','trusvbsz_epbnk');
   
   $connection = mysqli_connect(HOST,USERNAME,PWD,DB);
   if($connection){
       return $connection;
   }else{
       echo "Connect problem".mysqli_connect_error();
   }

?>