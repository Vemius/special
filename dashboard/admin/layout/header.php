<?php
session_start();
include ('session.php');


if (!isset($_SESSION['email'])) {

    header("Location: login.php");

    exit();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Update Accounts</title>
    <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta name="format-detection" content="telephone=no">
    <meta charset="UTF-8">

    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="img/favicon.png" type="image/x-icon">
 <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />

    <link href="../assets/css/special.css" rel="stylesheet" />

	<link href="../assets/css/bootstrap-datepicker.css" rel="stylesheet" />
	
	
	 <!--  Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  

    <!--  extension responsive  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <title></title>
	
	<link rel="stylesheet" type="text/css" href="../assets/js/DataTables/datatables.min.css"/>
 
<script type="text/javascript" src="../assets/js/DataTables/datatables.min.js"></script>

	<script src="../assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
        <script src='../assets/js/bootstrap/js/bootstrap.bundle.min.js' type='text/javascript'></script>
        
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
   
      <script type="text/javascript" src="../assets/js/paginator.js"></script>
        <script type="text/javascript" src="../assets/js/table.js"></script>
  
  <style> 
   .icon a.active {
    color: #fff;
    background-image: linear-gradient(310deg, #cb0c9f 0%, #cb0c9f 100%);

}

li a:hover:not(.active) {
  background-color: #cb0c9f;
  color: #fff;
  
}


</style>  
</head>
<body id="skin-blur-lights">

    <header id="header" class="media">
        <a href="index.php" id="menu-toggle"></a> 
        <a class="logo pull-left" href="index.php"><img src="" class="img-responsive" alt=""></a>

        <div class="media-body">
            <div class="media" id="top-menu">

                <div id="time" class="pull-right">
                    <span id="hours"></span>
                    :
                    <span id="min"></span>
                    :
                    <span id="sec"></span>
                </div>


            </div>
        </div>
    </header>

    <div class="clearfix"></div>

    <section id="main" class="p-relative" role="main">

        <!-- Sidebar -->
        <aside id="sidebar">

            <!-- Sidbar Widgets -->
            <div class="side-widgets overflow">
                <!-- Profile Menu -->
                <div class="text-center s-widget m-b-25 dropdown" id="profile-menu">
                    <a href="index.php" data-toggle="dropdown">
                        <img class="profile-pic animated" src="img/htb.jpg" alt="">
                    </a>
                    <ul class="dropdown-menu profile-menu">

                        <li><a href="logout.php">Sign Out</a> <i class="fa fa-sign-out icon left">&#61903;</i><i class="icon right fa fa-sign-out">&#61815;</i></li>
                        <li><a href="#edit" data-toggle="modal">Edit Profile</a><i class="right fa fa-edit fa-2x"></i></li>
                    </ul>
                    <h4 class="m-0">ADMIN</h4>

                </div>

                <!-- Calendar -->
                <div class="s-widget m-b-25">
                    <div id="sidebar-calendar"></div>
                </div>

                <!-- Feeds -->
                <div class="s-widget m-b-25">
                    <h2 class="tile-title">
                      
                    </h2>
                    <div class="">

                       
                    </div>
                    <div class="s-widget-body">
                        <div id="news-feed"></div>
                    </div>
                </div>

                <!-- Projects -->

            </div>

            <!-- Side Menu -->
            <ul class="list-unstyled side-menu">
                <li>
                    <a class="sa-side-home" href="index.php">
                        <span class="menu-item">Dashboard</span>
                    </a>
                </li>
                <li class="dropdown active">
                    <a class="sa-list-vcard" href="">
                        <span class="menu-item">Accounts</span>
                    </a>
                    <ul class="list-unstyled menu-item">
                        <li><a href="create_account.php">Create Account</a></li>
                        <li><a href="view_account.php">View Accounts</a></li>
                        <li><a href="update.php">Update Accounts</a></li>
                        <li><a href="upload.php">Upload Image</a></li>

                    </ul>
                </li>
                <li>
                    <a class="sa-list-secret" href="pending_accounts.php">
                        <span class="menu-item">Pending Accounts</span>
                    </a>
                </li>
                <li>
                    <a class="sa-top-message" href="messages.php">
                        <span class="menu-item">Messages</span>
                    </a>
                </li>
                <li>
                    <a class="sa-list-comment" href="tickets.php">
                        <span class="menu-item">Tickets</span>
                    </a>
                </li>
                <li>
                    <a class="sa-list-database" href="credit_debit_list.php">
                        <span class="menu-item">Credit/Debit History</span>
                    </a>
                </li>
                <li>
                    <a class="sa-list-cc" href="transfer_rec.php">
                        <span class="menu-item">Transaction Records</span>
                    </a>
                </li>
                <li>
                    <a class="sa-list-cog" href="settings.php">
                        <span class="menu-item">Settings</span>
                    </a>
                </li>


            </ul>

        </aside>
		 <section id="content" class="container">
           

            <!-- Required Feilds -->
            <div class="block-area" id="required">
