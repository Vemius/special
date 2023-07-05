<?php

$host = "localhost"; /* Host name */
$user = "machsrhe_nfed"; /* User */
$password = "itid@123.="; /* Password */
$dbname = "machsrhe_itid"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
