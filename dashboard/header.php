<html lang="en" type="text/css" media="print" />
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title> Account Login | <?php echo $site_title; ?> </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
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


.panel-default {
    opacity: 0.9;
    margin-top: 70px;
}

@media print {
               .noprint {
                  visibility: hidden;
               }
            }
@media print{@page {size: potrait}}

.btn-sm, .btn-xs {
    padding: 5px 40%;
    font-size: 15px;
    line-height: 1.5;
    border-radius: 3px;
}
.close2 {
    letter-spacing: -.025rem;
    color: #ffffff;
    font-weight: normal;
    font-size: 30px;
}

.form-group.last { margin-bottom:0px; } 
    
.btn-success {
    color: 
#fff;
background-color:
#187718;
border-color:
    #187718;
}
..alert-dismissible2 {
    
}
.alert2 {
    position: sticky;
}
 .alert-danger2 {

    color: #fff;
    background-color: #e30909;
    width: 60%;
align-self: center;
padding: 10px;

}

.btn2 {
padding: 0.74rem 1.78rem;
font-size: 0.75rem;
border-radius: 0rem;
}

.bgback {
    background-image: url('../img/favicon.png');
    background-position-x: right;
    background-repeat: no-repeat;
    background-attachment: fixed;
}
* {
  margin: 0;
  padding: 0;
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}
.mobile-list {
	display: none:
}
@media only screen and (max-width: 800px) {
.navbar .desktop-list {
	display: none;
}
.mobile-list {
    list-style-type: none;
    z-index: 99999;
    display: flex;
	color: white;
	position: fixed;
	bottom: 0;
	left: 0;
	justify-content: space-around;
	align-items: center;
	width: 100%;
	padding: 10px;
	background-color: red;
	height: 66px;
    border-radius: 63px;
    background-image: linear-gradient(0deg, #7A72C8 0%, #1cf4f4 100%);
}
.mobile-list i {
	font-size: 7vmin;
	cursor: pointer;

}

.mobile-list li:hover i {
	color: blue;
}
}

/* Center the loader */
#loader {
    position: fixed;
  left: 0px;
  top: 0px;
  width: 100%;
  height: 100%;
  z-index: 9999;
  background: url('/assets/img/loader/loading.gif') 
              50% 50% no-repeat rgb(249,249,249);
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

tr:hover {
  background: #f2f3ff;
  outline: none;
}

&::first-letter {
  text-transform: capitalize;
}

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}

.icon a.active {
    color: #fff;
    background-image: linear-gradient(310deg, #cb0c9f 0%, #cb0c9f 100%);

}
.active .nav-item {
    color: #fff;
    background-color: #04AA6D;
    
    
}
#sidenav-collapse-main ul li a:hover:not(.active) {
  background-image: linear-gradient(310deg, #ff814b 0%, #d90f0f 100%);
  color: #fff;
  
}
#dashboardsExamples ul li a.active {
  background-image: linear-gradient(310deg, #ff814b 0%, #d90f0f 100%);
  color: #fff;
  
}
.color:active{
 color: white;
}
.color:not(.active){
 color: black;
}
.crip {
    bottom: 50pt !important;
}
</style> 
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>
  
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- old scripts end-->

</head>
