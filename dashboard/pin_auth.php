<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';

if (!isset($_SESSION['acc_no'])) {
	
header("Location: login.php");
exit(); 
}
;

if ($_SERVER['HTTP_REFERER'] == $url) {
  header('Location: logout.php'); //redirect to some other page
  exit();
}
$reg_user = new USER();
$stmt = $reg_user->runQuery("SELECT * FROM account WHERE acc_no=:acc_no");
$stmt->execute(array(":acc_no"=>$_SESSION['acc_no']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['code'])){
	$pin_auth = $row['pin_auth'];
	$sub = $_POST['pin_auth'];
	if($sub !== $pin_auth){
		header("Location: pin_auth.php?errorpin");
	}
	else {
		
		
			$msg = "";
					
					
	$sql = " UPDATE account SET pin_verify = '1' WHERE acc_no ='$acc_no'";
	}
}
	
?>

<?php include 'header.php'; ?>
<style>
.alert {
  position: relative;
  padding: 1rem 1.5rem;
  margin-bottom: 1rem;
  border: 1px solid transparent;
  border-radius: 0.25rem;
}

.alert-danger {
  color: #721c24;
  background-color: #f8d7da;
  border-color: #f5c6cb;
}

.alert a.close {
  position: absolute;
  top: 0.5rem;
  right: 0.5rem;
  color: inherit;
  text-decoration: none;
  opacity: 0.8;
}

.alert a.close:hover {
  opacity: 1;
}

.alert p {
  margin-bottom: 0;
  color: white;
}
</style>
<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-sticky  my-0 py-2 start-0 end-0 mx-auto">
          <div class="container-fluid">
            <a class="navbar-brand  ms-lg-0 ms-3 " href="<?php echo $site_url; ?>">
<img style="width: 220px;" src="../assets/img/brand/blue.png" alt="LOGO" data-default="placeholder" data-max-width="80" width="14%">
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto">
                  <li class="nav-item">
                  <a class="nav-link me-2" href="https://home.eparwisecapital.com">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="https://home.eparwisecapital.com/why-us/what-we-offer.php">
                    <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                    About Us
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="https://home.eparwisecapital.com/contact/contact-us.php">
                    <i class="fas fa-mobile opacity-6 text-dark me-1"></i>
                    Contact Us
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  
                                         <?php
if (isset($_GET['inactive'])) {
    ?>
                        <div class='alert alert-info col-4'>
                        <button class='close' data-dismiss='alert'>&times;</button>
                        <strong>Sorry!</strong> This Account is not Activated Contact Customer Care Activate it. 
                        </div>
    <?php
}
?>
  <main class="main-content  mt-0" style="background-image: url(../assets/img/loginback.jpg);background-repeat: no-repeat;">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-body blur text-md-start text-center px-sm-3 shadow-lg mt-sm-7 py-sm-2">

              <div class="card card-plain mt-0">
                <div class="card-header pb-0 text-left bg-transparent text-center">
                <img alt="thumbnail"  style="border-radius:40px;" width="70" src="admin/pic/<?php echo $row['uname']; ?>.jpg"><h5 class="font-weight-bold text-warning text-gradient mt-3"> Welcome! <?php echo $row['fname']; ?></h5></br>
                  <!-- GTranslate: https://gtranslate.io/ -->
<a href="#" onclick="doGTranslate('en|sq');return false;" title="Albanian" class="gflag nturl" style="background-position:-300px -400px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Albanian" /></a><a href="#" onclick="doGTranslate('en|ar');return false;" title="Arabic" class="gflag nturl" style="background-position:-100px -0px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Arabic" /></a><a href="#" onclick="doGTranslate('en|en');return false;" title="English" class="gflag nturl" style="background-position:-0px -0px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="English" /></a><a href="#" onclick="doGTranslate('en|fr');return false;" title="French" class="gflag nturl" style="background-position:-200px -100px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="French" /></a><a href="#" onclick="doGTranslate('en|de');return false;" title="German" class="gflag nturl" style="background-position:-300px -100px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="German" /></a><a href="#" onclick="doGTranslate('en|it');return false;" title="Italian" class="gflag nturl" style="background-position:-600px -100px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Italian" /></a><a href="#" onclick="doGTranslate('en|pt');return false;" title="Portuguese" class="gflag nturl" style="background-position:-300px -200px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Portuguese" /></a><a href="#" onclick="doGTranslate('en|ru');return false;" title="Russian" class="gflag nturl" style="background-position:-500px -200px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Russian" /></a><a href="#" onclick="doGTranslate('en|es');return false;" title="Spanish" class="gflag nturl" style="background-position:-600px -200px;"><img src="//gtranslate.net/flags/blank.png" height="32" width="32" alt="Spanish" /></a>

<style type="text/css">
<!--
a.gflag {vertical-align:middle;font-size:32px;padding:1px 0;background-repeat:no-repeat;background-image:url(//gtranslate.net/flags/32.png);}
a.gflag img {border:0;}
a.gflag:hover {background-image:url(//gtranslate.net/flags/32a.png);}
#goog-gt-tt {display:none !important;}
.goog-te-banner-frame {display:none !important;}
.goog-te-menu-value:hover {text-decoration:none !important;}
body {top:0 !important;}
#google_translate_element2 {display:none!important;}
-->
</style>

<br /><select class="form-select" onchange="doGTranslate(this);"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>

                </div>
             <?php if (isset($msg)) {
  echo $msg;
  ?> 
  <div class='alert alert-success mt-3'>
    <script type='text/javascript'>
      function Redirect() {
        window.location='summary.php';
      }
      document.write ('');
      setTimeout(function() {
        Redirect();
      }, 6000);
    </script>
    <center><img src='loading.gif' width='180px' /></center>
    <center>
      <strong style='color:white;'>Verified Fetching Your Banking Dashboard..
      </strong>
    </center>
  </div>
  <?php
} else {
  if(isset($_GET['errorpin'])) {
    ?>
   <div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <p>Invalid 2FA PIN Verification.</p>
</div>

<script>
$(".alert-dismissible").fadeTo(2000, 500).slideUp(500, function(){
  $(".alert-dismissible").alert('close');
});
</script>
    <?php
  } else if(isset($errorpin)) {
    echo $errorpin;
  }
}
?>

							
							 <form autocomplete="off" method="POST">
                <div class="card-body">
                    <div class="mb-3">
                      <input type="password"  name="pin_auth" id="code" class="form-control" maxlength="6" placeholder="Please Enter Your 2Factor PIN " aria-label="Code" aria-describedby="password-addon">
                    </div>
                    <a href="#demo" class="btn bg-gradient-info" data-toggle="collapse"><i class="fa fa-keyboard mx-1"></i>Stay safe, use virtual pad </a>
  <div id="demo" class="collapse">
                     <div class="form-group">   
   <div class="btn-group ml-1 mt-2" role="group" aria-label="Basic example">
    <div class="">
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;"  class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '1';">1</button>
        <button type="button" style="background-color: black; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '2';">2</button>
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '3';">3</button>
        <button type="button" style="background-color: black; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '7';">7</button>
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;"class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '8';">8</button>
    </div>
    <div class="">
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '4';">4</button>
        <button type="button" style="background-color: black; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '5';">5</button>
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '6';">6</button>
        <button type="button" style="background-color: black; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '9';">9</button>
        <button type="button" style="background-color: <?php echo $tab; ?>; color:white; font-weight:700;" class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value + '0';">0</button>
    </div>      
    <div class="">
        <button type="button" style="background-color: black; color:white; font-weight:700;"  class="btn btn-outline-secondary py-3" onclick="document.getElementById('code').value=document.getElementById('code').value.slice(0, -1);"><i class="fas fa-backspace"></i></button>
    </div>         
            
    </div>
    </div>
    </div>
                    <div class="text-center">
                      <button type="submit" onclick="window.location.href='logout.php'" name="code" class="btn bg-gradient-info w-100 mt-4 mb-0">Continue</button>
                    </div>
                </div>
              </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-4 text-sm mx-auto">
                    Forgotten pin?
                    <a href="../dashboard/logout.php" class="text-info text-gradient font-weight-bold">Log out</a>
                  </p>
                </div>
            </div>
                          </div>

            </form>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/curved14.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>


<script>
  $('.alert-danger2').fadeTo(2000, 500).slideUp(500, function() {
    $(this).alert('close');
  });
</script>

    <?php include '../dashboard/footer.php'; ?>