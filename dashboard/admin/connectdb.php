<?php
class Database
{


    private $host = "localhost";
    private $db_name = "machsrhe_itid";
    private $username = "machsrhe_nfed";
    private $password = "itid@123.=";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;
	    $DB_con = null;
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
			
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}

$connection = mysqli_connect('localhost', 'machsrhe_nfed', 'itid@123.=');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, 'machsrhe_itid');
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}

//ONLINE BANKING DATA SETTINGS
$site_title = 'Danamon Trust ';
$site_address = 'Akdere, Mehmet Ali Alt覺n Cd No:51, 06590 Mamak/Ankara, Turkey';
$site_initial = 'Danamon Trust ';
$site_url = 'https://danamontrust.com';
$site_online = 'https://ibank.danamontrust.com';
$site_email = 'info@danamontrust.com';
$support_email = 'support@danamontrust.com'; 
$site_mobile = ''; 
$live_chat_id = ''; 
$site_logo= '/assets/img/brand/blue.png';
$site_fav= '/assets/img/favicon.png'; 
$site_loan= '/assets/img/brand/loan_logo.png'; 



$DB_host = "localhost";
$DB_user = "machsrhe_nfed";
$DB_pass = "itid@123.=";
$DB_name = "machsrhe_itid";


     $host = "localhost";
    $database = "machsrhe_itid";
    $username = "machsrhe_nfed";
    $password = "itid@123.=";

try
{
	$DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
	$DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}