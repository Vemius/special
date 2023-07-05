<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password)
INPUT UR SQL DETAILS HERE  */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'machsrhe_nfed');
define('DB_PASSWORD', 'itid@123.=');
define('DB_NAME', 'machsrhe_itid');



//ONLINE BANKING DATA SETTINGS
$site_title = 'Danamon Trust Bank';
$site_address = 'Akdere, Mehmet Ali Altın Cd No:51, 06590 Mamak/Ankara, Turkey';
$site_initial = 'Danamon Trust Bank';
$site_url = 'https://home.danamontrust.com';
$site_online = 'https://ibank.danamontrust.com';
$site_email = 'info@danamontrust.com';
$support_email = 'support@danamontrust.com'; 
$site_mobile = ''; 
$live_chat_id = ''; 
$site_logo= '/assets/img/brand/blue.png';
$site_fav= '/assets/img/favicon.png'; 
$site_loan= '/assets/img/brand/loan_logo.png'; 



//WEBSITE COLOR SETTINGS
$digital_forest_script_menu = '#34bab0';
$digital_forest_script_menu_font = 'black';

$digital_forest_script_header = '#140a01';
$digital_forest_script_header_font = 'white';

$tab = '#0c8a80';
$tab_font = 'white';


$page_loader = '#d45706';


//PAYMENT SETTINGS
$btc_wallet = 'YHSGJ9929jJSWKK3992JKKKSKS822992';

$bank_name = 'Bank of America';
$bank_address = 'NRG Wodland Ave Austine #72222 TX USA';
$bank_account = '0292938929292'; 
$account_name = 'MargonPro Limited'; 
$swift_code = 'WHSY82992H'; 
$routing_no = '10109292992929-9292'; 




class Database
{
   /* Do not set or touch any thing here */  
    private $host = "DB_SERVER";
    private $db_name = "DB_NAME";
    private $username = "DB_USERNAME";
    private $password = "DB_PASSWORD";
    public $conn;
     
    public function dbConnection()
	{
     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        }
		catch(PDOException $exception)
		{
            echo "Connection error: " . $exception->getMessage();
        }
         
        return $this->conn;
    }
}
/* Attempt to connect to MySQL database */
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}



?>