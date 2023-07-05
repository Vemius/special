<?php
session_start();
include_once ('../include/session.php');
require_once '../include/class.user.php';

$reg_user = new USER();
?>


<?php include 'header.php'; ?>

<body>
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
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
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="">
                    </a>
                </li>
                  <li class="nav-item">
                  <a class="nav-link me-2" href="https://home.eparwisecapital.com">
                    <i class="fa fa-home opacity-6 text-dark me-1"></i>
                    Home
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="https://home.eparwisecapital.com/why-us/index.php">
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
                                          <!-- GTranslate: https://gtranslate.io/ -->
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

<br /><select class="form-select w-30" onchange="doGTranslate(this);"><option value="">Select Language</option><option value="en|af">Afrikaans</option><option value="en|sq">Albanian</option><option value="en|ar">Arabic</option><option value="en|hy">Armenian</option><option value="en|az">Azerbaijani</option><option value="en|eu">Basque</option><option value="en|be">Belarusian</option><option value="en|bg">Bulgarian</option><option value="en|ca">Catalan</option><option value="en|zh-CN">Chinese (Simplified)</option><option value="en|zh-TW">Chinese (Traditional)</option><option value="en|hr">Croatian</option><option value="en|cs">Czech</option><option value="en|da">Danish</option><option value="en|nl">Dutch</option><option value="en|en">English</option><option value="en|et">Estonian</option><option value="en|tl">Filipino</option><option value="en|fi">Finnish</option><option value="en|fr">French</option><option value="en|gl">Galician</option><option value="en|ka">Georgian</option><option value="en|de">German</option><option value="en|el">Greek</option><option value="en|ht">Haitian Creole</option><option value="en|iw">Hebrew</option><option value="en|hi">Hindi</option><option value="en|hu">Hungarian</option><option value="en|is">Icelandic</option><option value="en|id">Indonesian</option><option value="en|ga">Irish</option><option value="en|it">Italian</option><option value="en|ja">Japanese</option><option value="en|ko">Korean</option><option value="en|lv">Latvian</option><option value="en|lt">Lithuanian</option><option value="en|mk">Macedonian</option><option value="en|ms">Malay</option><option value="en|mt">Maltese</option><option value="en|no">Norwegian</option><option value="en|fa">Persian</option><option value="en|pl">Polish</option><option value="en|pt">Portuguese</option><option value="en|ro">Romanian</option><option value="en|ru">Russian</option><option value="en|sr">Serbian</option><option value="en|sk">Slovak</option><option value="en|sl">Slovenian</option><option value="en|es">Spanish</option><option value="en|sw">Swahili</option><option value="en|sv">Swedish</option><option value="en|th">Thai</option><option value="en|tr">Turkish</option><option value="en|uk">Ukrainian</option><option value="en|ur">Urdu</option><option value="en|vi">Vietnamese</option><option value="en|cy">Welsh</option><option value="en|yi">Yiddish</option></select><div id="google_translate_element2"></div>
<script type="text/javascript">
function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
</script><script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-5">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-5 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                  
                       <!--- APPLY STARTS HER---->
                    
     <!-- Table -->
      <div class="row" >
        <div class="col" >
          <div class="card shadow"  >

           
           <form role="form" style="width:88%; padding-left:15px; "  method="POST" enctype="multipart/form-data">
          <div class="formgroup mt-3 p-3">    
		
		 <div class="banner-text">
              <h1 id="intro" class="h2 text-black">Less Hassle, More Hustle</h1>
              <p>Get more with an  <?php echo $site_title; ?> Checking Bank Account.</p>
              <fieldset class="radio-wpr">
                <legend><span class="roboto-medium">Open an Account Today</span></legend>
                <input type="radio" id="small-business-eaccount-1" name="open-account" value="" >
				<label for="small-business-eaccount-1">  <?php echo $site_title; ?> Personal Account Package</label>
<hr>
                <input type="radio" id="small-business-account-1" name="open-account" value="">
				<label for="small-business-account-1">  <?php echo $site_title; ?> Checking Account Package</label> 
              </fieldset>
		
		<div class="mt-4">
			<a href="applyonline2.php"  class="btn bg-gradient-info" type="submit" name="create"><i class="fas fa-user-plus text-white text-lg me-3" aria-hidden="true"></i>  Get Started Now</a>
	
					&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	<a href="login.php"  class="btn bg-gradient-danger" type="submit" name="create"><i class="fas fa-power-off text-white text-lg me-3" aria-hidden="true"></i>  Back to Login</a>
			<br><br>
		  </div>
		  </div>
	 
            
            </div>


  
            

            </form>
             
 
        
          </div>
        </div>
      </div>   </div>
        </div>
      </div>
       
          </div>
        </div>
      </div>
     </main>
 
      
      
     
      <!-- Footer -->
       <?php include 'footer.php'; ?>
                        
