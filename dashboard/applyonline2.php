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
   
           <form role="form" style="width:98%; padding-left:15px; "  method="POST" enctype="multipart/form-data">
          
          <div class="form-group mt-4 p-3">    
		 <textarea name="terms" rows="12" readonly="readonly" cols="55" style="width: 98%;border: 0px;" autocomplete="off" >
				     
				     
<?php echo $site_title; ?> TERMS AND CONDITIONS 

VIEW ONLINE CONDITIONS.

Before you can start using our online service you must agree to be bound by the conditions below.  You must read the conditions before you 
decide whether to accept them.  If you agree to be bound by these conditions, please click the I accept button below.  If you click on the
Decline button, you will not be able to continue your registration for our online services. We strongly recommend that you print a copy of 
these conditions for your reference.

1. DEFINITIONS.
In these conditions the following words have the following meanings.

- ACCOUNT  any account which you hold and access via our online service.

- ADDITIONAL SECURITY DETAILS  the additional information you give us to
 help us identify you including the additional security question you 
provide yourself.

- IDENTITY DETAILS  the access code we may provide you with.

- <?php echo $site_title; ?> ACCOUNT NUMBER, PASSWORD and ACCOUNT PIN   you choose to identify 
yourself when you use our online service.

- WE, US and OUR  mean <?php echo $site_title; ?>, registered address <?php echo $site_address; ?>

- YOU, YOUR and YOURSELF  refer to the person who has entered into this 
agreement with us.

2. USING THE ONLINE SERVICE.

a. These conditions apply to your use of our online service and in relation to any accounts.  They explain the relationship between you and
 us in relation to our online service.  You should read these conditions carefully to understand how these services work and your and our rights
 and duties under them.  If there is a conflict between these conditions and your account conditions, these conditions will apply.  This means 
that, when you use our online service both sets of conditions will apply unless they contradict each other in which case, the relevant condition
 in these conditions apply.

b. If any of your accounts is a joint account, these conditions apply to all of you together and any of you separately.  If more than one of you
 uses our online service you must each choose your own username, password and additional security details.

c. By registering to use our online service, you accept these conditions and agree that we may communicate with you by e-mail or through our website.

d. When you use our online service you must follow the instructions we give you from time to time.  You are responsible for ensuring that your 
computer, software and other equipment are capable of being used with our online service.

e. Our online sites are secure.  Disconnection from the Internet or leaving these sites will not automatically log you off.  You must always
 use the log off facility when you are finished and never leave your machine unattended while you are logged in.  As a security measure, if 
you have not used the sites for more than a specified period of time we will ask you to log in again. 

3. WHAT RULES APPLY TO SECURITY?

a. As part of the registration for our online service you must provide us with identity details before we will allow you to use the services 
for the first time.  You must enter your identity details immediately after signing in, so we can identify you.

b. Every time you use our online service you must give us your username, your password and the answer to an additional security question.

c. You can change your username or password online by following the instructions on the screen.  

d. For administration or security reasons, we can require you to choose a new username or change your password before you use (or carry on using)
 our online service.

e. You must not write down, store (whether encrypted or otherwise) on your computer or let anyone else know your password, identity details or
 additional security details, and the fact that they are for use with your accounts.

f. If you think that someone else knows your password or any of your additional security details or has used any of them to use our online 
service, you must do the following:

- For your password, change it online as soon as possible.  If you have difficulty changing your password, you must phone us on +41 22 539 11 13
 immediately.  You can give us your username if you phone to change your password.

- For your additional security details, you will need to phone us immediately to change your additional security details.

g. We may give the police or any prosecuting authority any information they need if we think it will help them find out if someone else is 
using your username, password or any of your additional security details.

h. We may also keep any e-mails sent to or from us.  We do this to check what was written and also to help train our staff.

i. If we think that:

- someone else is trying to use our service for your accounts;

- the wrong username, password or any of your additional security 
details have has been used for your account;

- you or someone else is using our online service illegally;

- you are not keeping to these conditions or the conditions of any of 
your accounts; or 

- your username, password  or any of your additional security details 
might be known or used by someone else,

we can stop you (or someone else) using our online service.  We will tell you as soon as possible if we do this.

j. We may require you to provide one or more of the additional security details and/or enter your password again before we accept instructions 
about your account.

k. You must not tell anyone your password or additional security details.  You can give the Helpdesk your username if you need help to 
change your password or need to report that someone else knows your password, username or additional security details.

l. For your protection, we occasionally check requests to move or transfer money. Therefore, some transactions may be subject to a delay 
of up to 24 hours whilst these checks are carried out.

4. WHAT IS THE EXTENT OF YOUR LIABILITY?

a. If you are a victim of online fraud, we guarantee that you wont lose any money on your accounts and will always be reimbursed in full.

b. Unless you are a victim of fraud you are responsible for all instructions and other information sent using your username, password or
 additional security details.

c. You will not be held responsible for any instructions or information sent after you have told us that someone knows your password or 
additional security details and has used any of them to access our online service.

d. <?php echo $site_title; ?> do not accept responsibility for any loss you or anybody else may suffer because any instructions or information you sent us are sent in 
error, fail to reach us or are distorted unless you have been the victim of fraud.

e. <?php echo $site_title; ?> do not accept responsibility for any loss you or anybody else may suffer because any instructions or information we send you fail to reach
 you or are distorted unless you have been the victim of fraud.

5. HOW WE CAN CHANGE THESE CONDITIONS

a. <?php echo $site_title; ?> change these conditions for any reason by giving you written notice or publishing the change on our website.

b. We may send all written notices to you at the last e-mail address you gave us.  You must let us know immediately if you change your e-mail 
address (you can do so online), to make sure that we have your current e-mail address at all times.

6. GENERAL

<?php echo $site_title; ?> service is available to you if you are 18 years of age or over.
</textarea>
<br><br>
<a href="applyonline.php"  class="btn bg-gradient-danger" type="submit" name="create"><i class="fas fa-power-off text-white text-lg me-3" aria-hidden="true"></i>  Decline</a>
&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
           <a href="applicationform.php"  class="btn bg-gradient-success" type="submit" name="create"><i class="fas fa-check text-white text-lg me-3" aria-hidden="true"></i>  I Accept</a>
	 <br><br>
		  </div>
	 
            
            </div>


  
            

            </form>
             
 
        
          </div>
        </div>
      </div>  
     
 
      
      
     
      <!-- Footer -->
       <?php include 'footer.php'; ?>
                        
