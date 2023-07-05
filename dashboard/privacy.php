<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';
if(!isset($_SESSION['acc_no'])){
	
header("Location: login.php");
exit(); 
}
$reg_user = new USER();

$user_home = new USER();


$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_GET['subject'])){
	
$subject=$_GET['subject'];	

$msg = $reg_user->runQuery("SELECT * FROM message WHERE subject='$subject'");
$msg->execute();
$show = $msg->fetch(PDO::FETCH_ASSOC);


}


?>

<?php include 'header.php'; ?>

<body class="g-sidenav-show bg-gray-100">
   
     <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/brand/blue.png" class="navbar-brand-img h-100" alt="main_logo">
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link  " href="summary.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>shop </title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1716.000000, -439.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(0.000000, 148.000000)">
                        <path class="color-background opacity-6" d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                        <path class="color-background" d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="statement.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"><svg>
            <i class="fa fa-file-excel-o text-dark text-lg me-1"></i> 
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g id="office" transform="translate(153.000000, 2.000000)">
                        <path class="color-background opacity-6" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z"></path>
                        <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Transaction History</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="make_tranfers.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center"><svg>
                <i class="fa fa-send text-dark text-lg me-1"></i>                <title>spaceship</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(4.000000, 301.000000)">
                        <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                        <path class="color-background opacity-6" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                        <path class="color-background opacity-6" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"></path>
                        <path class="color-background opacity-6" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Bank Transfer</span>
          </a>
        </li>
        <li class="nav-item">
            <li class="nav-item">
          <a class="nav-link  " href="inbox.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
        <i class="fas fa-envelope-open-text text-dark  text-lg me-1"></i>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Inbox</span>
          </a>
        </li>
         <li class="nav-item">
          <a class="nav-link  " href="contact_support.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
<i class="fas fa-comment-dollar text-dark text-lg me-1"></i> <title>Contact</title>
             <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(4.000000, 301.000000)">
                        <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                        <path class="color-background opacity-6" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                        <path class="color-background opacity-6" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z"></path>
                        <path class="color-background opacity-6" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Contact us/Tickets</span>
          </a>
        </li>
        <li class="nav-item">
            <li class="nav-item">
          <a class="nav-link  " href="apply_for_loan.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
<i class="fas fa-hand-holding-usd text-dark text-lg me-1"></i>                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Get a Loan</span>
          </a>
        </li>
          <a class="nav-link  " href="cryptocurrency.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
<i class="fa fa-btc text-dark text-lg me-1"></i>                <title>box-3d-50</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2319.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(603.000000, 0.000000)">
                        <path class="color-background" d="M22.7597136,19.3090182 L38.8987031,11.2395234 C39.3926816,10.9925342 39.592906,10.3918611 39.3459167,9.89788265 C39.249157,9.70436312 39.0922432,9.5474453 38.8987261,9.45068056 L20.2741875,0.1378125 L20.2741875,0.1378125 C19.905375,-0.04725 19.469625,-0.04725 19.0995,0.1378125 L3.1011696,8.13815822 C2.60720568,8.38517662 2.40701679,8.98586148 2.6540352,9.4798254 C2.75080129,9.67332903 2.90771305,9.83023153 3.10122239,9.9269862 L21.8652864,19.3090182 C22.1468139,19.4497819 22.4781861,19.4497819 22.7597136,19.3090182 Z"></path>
                        <path class="color-background opacity-6" d="M23.625,22.429159 L23.625,39.8805372 C23.625,40.4328219 24.0727153,40.8805372 24.625,40.8805372 C24.7802551,40.8805372 24.9333778,40.8443874 25.0722402,40.7749511 L41.2741875,32.673375 L41.2741875,32.673375 C41.719125,32.4515625 42,31.9974375 42,31.5 L42,14.241659 C42,13.6893742 41.5522847,13.241659 41,13.241659 C40.8447549,13.241659 40.6916418,13.2778041 40.5527864,13.3472318 L24.1777864,21.5347318 C23.8390024,21.7041238 23.625,22.0503869 23.625,22.429159 Z"></path>
                        <path class="color-background opacity-6" d="M20.4472136,21.5347318 L1.4472136,12.0347318 C0.953235098,11.7877425 0.352562058,11.9879669 0.105572809,12.4819454 C0.0361450918,12.6208008 6.47121774e-16,12.7739139 0,12.929159 L0,30.1875 L0,30.1875 C0,30.6849375 0.280875,31.1390625 0.7258125,31.3621875 L19.5528096,40.7750766 C20.0467945,41.0220531 20.6474623,40.8218132 20.8944388,40.3278283 C20.963859,40.1889789 21,40.0358742 21,39.8806379 L21,22.429159 C21,22.0503869 20.7859976,21.7041238 20.4472136,21.5347318 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Cryptocurrency</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link  " href="security.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>settings</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(304.000000, 151.000000)">
                        <polygon class="color-background opacity-6" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                        <path class="color-background opacity-6" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z"></path>
                        <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Security</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="myprofile.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-user-circle text-dark text-lg me-1"></i>                <title>customer-support</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(1.000000, 0.000000)">
                        <path class="color-background opacity-6" d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"></path>
                        <path class="color-background" d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"></path>
                        <path class="color-background" d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="virtual_card.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
              <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Bank cards</span>
          </a>
        </li>
        <li class="nav-item">
            <li class="nav-item">
          <a class="nav-link " href="security_tips.php">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
<i class="fas fa-user-shield text-dark text-lg me-1"></i>
<title>credit-card</title>
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                    <g transform="translate(1716.000000, 291.000000)">
                      <g transform="translate(453.000000, 454.000000)">
                        <path class="color-background opacity-6" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"></path>
                        <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                      </g>
                    </g>
                  </g>
                </g>
              </svg>
            </div>
            <span class="nav-link-text ms-1">Security Tips</span>
          </a>
        </li>
       </ul>
    </div>
      </div>
      <a class="btn bg-gradient-secondary mt-4 w-80" href="service_agreement.php" type="button">Service agreement</a>
    </div>
      </div>
      <a class="btn bg-gradient-primary mt-4 w-80" href="privacy.php" type="button">Privacy statement</a>
    </div>
  </aside> 
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here...">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
 <li class="nav-item d-flex align-items-center">
              <a href="logout.php" class="nav-link text-body font-weight-bold px-0">
                <i class="fas fa-power-off -alt text-grey me-sm-1"> </i>
                <span class="d-sm-inline d-none">Logout</span>
              </a>
            </li>
          <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
                    <li class="nav-item px-3 d-flex align-items-center">
              <a href="security.php" class="nav-link text-body p-0">
                <i class="fa fa-cog cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="" class="nav-link text-dark p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                <li class="mb-2">
                    <?php       
								$date = $row['date'];
								$reci_name = $row['uname'];
								$msg = $user_home->runQuery("SELECT * FROM message INNER JOIN account ON message.reci_name= account.uname  WHERE account.uname = '$reci_name' ORDER BY date DESC LIMIT 0, 5");
								$msg->execute(array(":reci_name"=>$_SESSION['uname']));
								while($show = $msg->fetch(PDO::FETCH_ASSOC)){?>
								
                  <a class="dropdown-item border-radius-md" href="message.php?subject=<?php echo $show['subject']; ?>">
                    <div class="d-flex py-1">
                      <div class="my-auto">
                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                      </div>
                      <div class="d-flex flex-column justify-content-center">
                        <h6 class="text-sm font-weight-normal mb-1">
                          <span class="font-weight-bold">New message</span> from <?php echo $show['sender_name']; ?>
                        </h6>
                        <p class="text-xs text-secondary mb-0">
                          <i class="fa fa-clock me-1"></i>
                          <?php echo $show['date']; ?>
                        </p>
                      </div>
                    </div>
                  </a>
                </li>                    <?php } ?>

    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-lg-11 mx-auto">
          <div class="card mb-4">
            <div class="card-header p-3 pb-0">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6></h6>
                  <p class="text-sm mb-0"> <b>Address:</b> <?php echo $site_address; ?></p>
                  <p class="text-sm mb-0"> <b>Contact Email: </b>  <?php echo $support_email; ?></p>
                  <p class="text-sm"><b>Website: </b> <?php echo $site_url; ?></p>
                  </p>
                </div>
 <img src="../assets/img/brand/blue.png" class="w-20 me-3 mb-0" alt="main_logo">              </div>
            </div>
            <div class="card-body p-5 pt-5">
              <hr class="horizontal dark mt-0 mb-4">
              <div class="row">
                <h2><?php echo $show['subject']; ?></h2>
                <div class="card-header p-1">
                    
                    
                    

<h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Policy</span></h4>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">At <?php echo $site_title; ?>, we put you first and are thus committed to protecting and respecting your privacy.</span></p>
<p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">We are committed to being transparent about how we collect, process, share and manage data about you (our customers and other natural persons where applicable).</span></p>
<div class="border-top pt-3" style="box-sizing: border-box; text-shadow: none; box-shadow: none; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; border-top: 1px solid rgb(213, 220, 236) !important; padding-top: 1rem !important;">
   <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Cookies: What Are They?</span></h4>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="box-sizing: border-box; text-shadow: none; font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">A “cookie” is a small text file that is stored on your computer, tablet or phone when you visit a website. Some cookies are deleted when you close your browser. These are known as session cookies. Others remain on your device until they expire, or you delete them from your cache. These are known as persistent cookies and enable us to remember things about you as a returning visitor. To find out more about cookies, including how to see what cookies have been set and how to manage and delete them, visit<span>&nbsp;</span><a href="http://www.allaboutcookies.org/" style="box-sizing: border-box;color: rgb(0, 123, 255);text-decoration: none;background-color: transparent;text-shadow: none;box-shadow: none;">http://www.allaboutcookies.org/</a>. By clicking and opening this link you are migrating from <?php echo $site_title; ?> secure site to a third-party website.</span></p>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">We make no representation as to the security features on the site or the level of security available on the site. It is your responsibility to protect your devise or system through which you access the third party’s website.</span></p>
   <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Alternatively, you can search the internet for other independent information on cookies.</span></p>
   <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
      <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Cookies – How We Use Them</span></h4>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">If you delete cookies relating to this website we will not remember things about you, including your cookie preferences, and you will be treated as a first-time visitor the next time you visit the site. We use cookies (and other similar technologies) to:</span></p>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Provide products and services that you request and to provide a secure online environment</span></li>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Manage our marketing relationships.</span></li>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Improve the performance of our services.</span></li>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Help us decide which of our products, services and offers may be relevant for your need.</span></li>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Give you a better online experience and track website performance</span></li>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Help us make our website more relevant to you</span></li>
      <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
      <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
         <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">EU General Data Protection Regulations (GDPR)</span></h4>
         <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);"><?php echo $site_title; ?> Privacy Policy Statement on the EU General Data Protection Regulations (GDPR)</span></p>
         <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">This web site is administered by <?php echo $site_title; ?></span></p>
         <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">This policy statement shall apply to the processing of personal data obtained from the data subjects as defined in the GDPR</span></p>
         <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);"><?php echo $site_initial; ?> is committed to safeguarding your personal data as required under the GDPR to the extent permitted under the laws. <?php echo $site_title; ?> may collect your personal data, either directly (where you are asked to provide the data) or indirectly (from third parties including members of the FBN Holdings Group, Credit Bureaus, other Banks and Financial institutions). <?php echo $site_title; ?> will, however, only use this personal data in accordance with the purposes set forth in this Privacy Statement and is committed to safeguarding the personal information collected. This statement sets out details of our data protection policy, the use of cookies and the exercise of your rights in respect of your personal data.</span></p>
         <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
            <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Purposes Of Processing</span></h4>
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);"><?php echo $site_title; ?> collects and processes information about you for the following purposes;</span></p>
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
            <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Providing service to you as a customer.</span></li>
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
            <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Conducting its business,informing and making available products and services that may be of interest to you preventing crime and managing security risk complying with legal and regulatory requirements</span></li>
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
            <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Developing web statistics.The information you provide may also be used to contact you when necessary,</span></li>
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
            <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Calls, emails, text messages and other communications may be recorded by <?php echo $site_initial; ?> where required by the law, regulation or for quality assurance purposes in a bid to serve you better.</span></li>
            <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
            <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
               <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Personal Data: <?php echo $site_title; ?> may collect and process the following data:</span></p>
               <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Names (which may include alias), date of birth, gender, nationality (which includes ethnic origin), permanent residential address, biometric data, email addresses and telephone numbers, Bank account details (where applicable), information about deposits, and asset and liability statements for guarantors, details of shareholding, information about tax residency status and tax nationality, details of public positions held by you or held by your immediate family (spouse, partner, children and their spouses and partners, parents) and close associates. Information about any regulatory matters connected to you. Footage from CCTV within the Bank’s premises</span></p>
               <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
                  <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Sensitive Data</span></h4>
                  <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);"><?php echo $site_initial; ?> does not seek to collect sensitive personal data (such as data revealing political opinions, religious beliefs, and health or sex life. Your prior consent will be requested where such data is needed. Note that, your unsolicited provision to <?php echo $site_title; ?> of sensitive personal data is an indication of your consent for the processing of such data by <?php echo $site_initial; ?> .</span></p>
                  <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);"><?php echo $site_title; ?> may process information about criminal offences and convictions where required by law.</span></p>
                  <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
                     <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Your Rights</span></h4>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);"><?php echo $site_title; ?> is happy to inform you of your rights in relation to your personal data that it processes. Note however, that your exercise of any of these rights may result in our inability to provide some services and/or products to you in which case the Bank will withdraw the affected service and/or product. Find examples of such rights below:</span></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">You may at any time;</span></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Request for access to your personal data held by <?php echo $site_title; ?></span></li>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Request that your personal data held by <?php echo $site_title; ?> be deleted or destroyed</span></li>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Request that <?php echo $site_title; ?> modifies or updates your personal data to rectify any inaccurate data which it holds</span></li>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Request that <?php echo $site_title; ?> delivers to you or a third party your personal data held by <?php echo $site_title; ?></span></li>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Request that <?php echo $site_title; ?> restricts the processing your personal data held by it.</span></li>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Request that your personal data should not be processed for the purpose of marketing.</span></li>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <li style="box-sizing: border-box;"><span style="font-size: 16px; font-style: normal; font-weight: 300; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(0, 0, 0);">Decline a consent request from <?php echo $site_initial; ?> or withdraw your consent for the processing of your personal data by <?php echo $site_title; ?></span></li>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Further to the above rights, you may lodge complaints or make enquiries concerning the processing of your personal data through any of our channels detailed in the contact section below:</span></p>
                     <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">A full description of your rights under the GDPR is contained in Articles 12- 23 of the GDPR</span></p>
                     <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
                        <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Cookies</span></h4>
                        <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);"><?php echo $site_initial; ?> may gather and analyse information regarding usage of this web site, including domain name, the number of hits, the pages visited, previous/subsequent sites visited and length of user session. This information may be gathered by using a cookie. A cookie is a small text file placed on your hard drive by our web page server. You can choose whether or not to use a cookie by altering the settings of your browser. A cookie will make the use of this web site faster and easier.</span></p>
                        <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
                           <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Accepting Or Rejecting Cookies</span></h4>
                           <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">You can configure your internet browser to warn you each time a new cookie is about to be stored on your computer so that you may make a decision whether to accept or reject it. Please refer to your internet browser’s help section for specific instructions. Please note that some parts of our website may not function properly if you reject cookies.</span></p>
                           <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
                              <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Third Party Sites</span></h4>
                              <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Please note that this Privacy Statement does not extend to third party sites linked to this web site.</span></p>
                              <div class="border-top pt-3" style="box-sizing: border-box;text-shadow: none;box-shadow: none;border-top: 1px solid rgb(213, 220, 236) !important;padding-top: 1rem !important;">
                                 <h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize;"><span style="font-size: 1.13rem; font-style: normal; font-weight: 500; font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: inherit;">Data Security</span></h4>
                                 <p style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1rem; text-shadow: none; line-height: 24px;"><span style="font-size: 0.999rem; font-style: normal; font-weight: normal; font-family: Rubik, sans-serif; color: rgb(0, 0, 0);">Adequate security measures are in place to ensure that personal data collected by <?php echo $site_initial; ?> is not altered, accessed without requisite authority, or accidentally lost. The personal data we collect are accessed to the extent required for business by authorised personnel, agents, contractors and members of the FBN Holdings Group who are under an obligation of confidentiality.​</span></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<h4 class="card-title" style="box-sizing: border-box; margin-top: 0px; margin-bottom: 1.125rem; line-height: 1.2; text-shadow: none; text-transform: capitalize; font-variant-ligatures: normal; font-variant-caps: normal; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><br></h4>


            </div>
                                                                   

                
                <hr class="horizontal dark mt-6 mb-0">
                <div class="col-lg-6 col-md-6 col-12 my-auto text-end">
                    
                  <a href="" onclick="window.print();return false;" class="btn bg-gradient-info mb-0 print">Print</a>

                </div>
             </div>
             
                </div>
                <div class="card-footer bg-secondary p-3 pb-0">
              <div class="row">
                <div class="card-body p-5  pt-4">
              <p class="mb-0 text-sm text-white"><?php echo $site_title; ?>
 maintains this website to enhance public
      access to information about its activities and the activities of the 
      European System of Central Banks (ESCB),supervisory tasks and 
      responsibilities. Our goal is to keep this information timely and 
      accurate. However, the ECB accepts no responsibility or liability 
      whatsoever with regard to the material on this website.</p>
            </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
              <?php include 'footer.php'; ?>