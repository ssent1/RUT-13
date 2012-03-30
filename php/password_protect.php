<?php

###############################################################
# Page Password Protect 2.13
###############################################################
# Visit http://www.zubrag.com/scripts/ for updates
############################################################### 
#
# Usage:
# Set usernames / passwords below between SETTINGS START and SETTINGS END.
# Open it in browser with "help" parameter to get the code
# to add to all files being protected. 
#    Example: password_protect.php?help
# Include protection string which it gave you into every file that needs to be protected
#
# Add following HTML code to your page where you want to have logout link
# <a href="http://www.example.com/path/to/protected/page.php?logout=1">Logout</a>
#
###############################################################

/*
-------------------------------------------------------------------
SAMPLE if you only want to request login and password on login form.
Each row represents different user.

$LOGIN_INFORMATION = array(
  'zubrag' => 'root',
  'test' => 'testpass',
  'admin' => 'passwd'
);

--------------------------------------------------------------------
SAMPLE if you only want to request only password on login form.
Note: only passwords are listed

$LOGIN_INFORMATION = array(
  'root',
  'testpass',
  'passwd'
);

--------------------------------------------------------------------
*/

##################################################################
#  SETTINGS START
##################################################################

// Add login/password pairs below, like described above
// NOTE: all rows except last must have comma "," at the end of line
$LOGIN_INFORMATION = array(
  'dawn' => 'rut13dawn',
  'daphne' => 'rut13daphne'
);

// request login? true - show login and password boxes, false - password box only
define('USE_USERNAME', true);

// User will be redirected to this page after logout
define('LOGOUT_URL', './index.html');

// time out after NN minutes of inactivity. Set to 0 to not timeout
define('TIMEOUT_MINUTES', 5);

// This parameter is only useful when TIMEOUT_MINUTES is not zero
// true - timeout time from last activity, false - timeout time from login
define('TIMEOUT_CHECK_ACTIVITY', true);

##################################################################
#  SETTINGS END
##################################################################


///////////////////////////////////////////////////////
// do not change code below
///////////////////////////////////////////////////////

// show usage example
if(isset($_GET['help'])) {
  die('Include following code into every page you would like to protect, at the very beginning (first line):<br>&lt;?php include("' . str_replace('\\','\\\\',__FILE__) . '"); ?&gt;');
}

// timeout in seconds
$timeout = (TIMEOUT_MINUTES == 0 ? 0 : time() + TIMEOUT_MINUTES * 60);

// logout?
if(isset($_GET['logout'])) {
  setcookie("verify", '', $timeout, '/'); // clear password;
  header('Location: ' . LOGOUT_URL);
  exit();
}

if(!function_exists('showLoginPasswordProtect')) {

// show login form
function showLoginPasswordProtect($error_msg) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
  <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">

    <title>Distributors | R.U.T. 13 Organic Hair Therapy [Restricted Access]</title>
    
    <!-- ////////////////////////////////// -->
    <!-- //      Start Stylesheets       // -->
    <!-- ////////////////////////////////// -->
    <link href="./css/reset.css" rel="stylesheet" type="text/css" />
    <link href="./css/style.css" rel="stylesheet" type="text/css" />
    <link href="./css/noscript.css" rel="stylesheet" type="text/css" media="screen,all" id="noscript" /><!-- ////////////////////////////////// -->
    <!-- //      Javascript Files        // -->
    <!-- ////////////////////////////////// -->

    <script type="text/javascript" src="./js/jquery.min.js">
</script>
    <script type="text/javascript" src="./js/scroll.js">
</script>
    <script type="text/javascript" src="./js/cufon-yui.js">
</script>
    <script type="text/javascript" src="./js/century-gothic.font.js">
</script>
    <script type="text/javascript">
//<![CDATA[
            Cufon.replace('h1') ('h2') ('h3') ('h4') ('h5') ('h6') ('.big-quote')
            ('.button', { 
                hover: true
             })
            ;
    //]]>
    </script>
    <script src="./js/vtip.js" type="text/javascript">
</script>
    <script src="./js/jquery.cycle.all.js" type="text/javascript">
</script>
    <script type="text/javascript">
//<![CDATA[
    $(function(){     
         $('#slideshow ul').cycle({
            timeout: 5000,  // milliseconds between slide transitions (0 to disable auto advance)
            fx:      'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...            
            pager:   '#pager',  // selector for element to use as pager container
            pause:   0,   // true to enable "pause on hover"
            cleartypeNoBg: true, // set to true to disable extra cleartype fixing (leave false to force background color setting on slides)
            pauseOnPagerHover: 0 // true to pause when hovering over pager link
        });
     });
    //]]>
    </script>
    <script type="text/javascript" src="./js/dropdown.js">
</script><!--[if IE 7]>    
    <style type="text/css">
        ul.list-bottom{width:166px;}
    </style>
<![endif]-->
    <!--[if IE 8]>    
    <style type="text/css">
        #pager{margin:-69px 0px 0px 22px;}
        </style>    
<![endif]-->
</head>
<body>

    <div id="container">
        <!-- BEGIN OF HEADER -->

        <div id="header">
            <!-- begin of logo -->

            <div id="logo">
                <a href="./index.html"><img src="./images-rut13/logo.png" alt="R.U.T. 13 Logo" /></a>
            </div><!-- end of logo -->
            <!-- begin of quote -->

            <div id="quote-top">
                <a href="./store.html"><img src="./images-rut13/buy.png" alt="" /></a>
            </div><!-- end of quote -->
        </div>

        <div id="menu-search">
            <!-- begin of mainmenu -->

            <div id="mainmenu">
                <ul id="menu">
                    <li class="current"><a href="index.html"><img src="images-rut13/home.png" alt="" /></a></li>

                    <li>
                        <a href="products-1.html">Products</a>

                        <ul>
                            <!-- <li><a href="#">Curly Hair</a></li> -->

                            <li><a href="./amplifying-shampoo.html">Amplifying Shampoo</a></li>
<li><a href="./amplifying-conditioner.html">Amplifying Conditioner</a></li>

                    <li><a href="./hydrating-shampoo.html">Daily Hydrating Shampoo</a></li>
<li><a href="./hydrating-conditioner.html">Daily Hydrating Conditioner</a></li>

                            <li><a href="./leave-in-wearable-treatment.html">Leave-In Wearable Treatment</a></li>

                            <li><a href="./optimum-root-lifter.html">Optimum Root Lifter</a></li>

                            <li><a href="./pre-styling-tonic.html">Pre-styling Tonic</a></li>

                            <li><a href="./sculpting-polisher.html">Sculpting Polisher</a></li>

                            <li><a href="./straight-glaze.html">Straight Glaze</a></li>

                            <li><a href="./stronghold-texturizer.html">Stronghold Texturizer</a></li>
                        </ul>
                    </li>

                    <li><a href="./testimonials.html">Why R.U.T. 13?</a></li>

                    <li><a href="./rut13-salons.html">Salons</a></li>

                    <li><a href="./rut-13.html">R.U.T. 13</a></li>

                    <li><a href="contact.html">Contact</a></li>
                    
                    <li><a href="distributors.php">Distributors</a></li>

                    
                </ul>
            </div><!-- end of mainmenu -->
            <!-- begin of search -->
            <div id="search-box">
<!-- Google Custom Search Element -->
<div id="cse" style="width:100%;">Loading</div><script src="http://www.google.com/jsapi" type="text/javascript"></script><script type="text/javascript">google.load('search', '1');google.setOnLoadCallback(function(){var cse = new google.search.CustomSearchControl();cse.draw('cse');}, true);</script></div>
             <!-- end of search -->
        </div>
                <!-- begin of welcome text -->

        <div id="page-title">
            <h1>Please enter your password to access this page.</h1>
        </div><!-- end of welcome text --><!-- END OF HEADER -->
  <style>
    input { border: 1px solid black; }
  </style>
  <div style="width:500px; margin-left:auto; margin-right:auto; text-align:center">
    <form method="post">
    <font color="red"><?php echo $error_msg; ?></font><br />
<?php if (USE_USERNAME) echo 'User name:<br /><input type="input" name="access_login" /><br />Password:<br />'; ?>
    <input type="password" name="access_password" /><p></p><input type="submit" name="Submit" value="Submit" />
  </form>
  <br />
    <h3>If you do not have a distributor user name and password, please <a href="./contact.html">contact us </a>to get your distributor access information.</h3>
<a href="./contact.html" title="Contact if you have forgotten your userid and password">Please contact us if you cannot access the distributor portion section of our website. </a>
  </div>
      <!-- BEGIN OF BOTTOM CONTENT -->
        <div id="page-title">
            <h1></h1>
        </div>
    <div id="bottom-content">
        <!-- begin of bottom-list -->

        <div id="bottom-list-container">
            <div class="box-list">
                <!-- bottom content 1 -->

                <h3>Pages</h3>

                <ul class="list-bottom">
                    <li>R.U.T. 13</a></li><!--                     <li><a href="#">Services</a></li> -->
                    <!--                     <li><a href="#">Portfolio</a></li> -->

                    <li><a href="#">FAQ</a></li>

                    <li><a href="./testimonials.html">Testimonials</a></li>

                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>

            <div class="box-list">
                <!-- bottom content 2 -->

                <h3>Products</h3>

                <ul class="list-bottom">
                    <!-- <li><a href="#">Curly Hair</a></li> -->

                    <li><a href="./amplifying-shampoo.html">Amplifying Shampoo</a></li>
<li><a href="./amplifying-conditioner.html">Amplifying Conditioner</a></li>

                    <li><a href="./hydrating-shampoo.html">Daily Hydrating Shampoo</a></li>
<li><a href="./hydrating-conditioner.html">Daily Hydrating Conditioner</a></li>

                    <li><a href="./leave-in-wearable-treatment.html">Leave-In Wearable Treatment</a></li>

                    <li><a href="./optimum-root-lifter.html">Optimum Root Lifter</a></li>

                    <li><a href="./pre-styling-tonic.html">Pre-styling Tonic</a></li>

                    <li><a href="./sculpting-polisher.html">Sculpting Polisher</a></li>

                    <li><a href="./straight-glaze.html">Straight Glaze</a></li>

                    <li><a href="./stronghold-texturizer.html">Stronghold Texturizer</a></li>
                </ul>
            </div>

            <div class="box-list">
                <!-- bottom content 3 -->
                <!--
<h3>Blogroll</h3>
                <ul class="list-bottom">
                    <li><a href="#">Documentation</a></li>
                    <li><a href="#">Plugins</a></li>
                    <li><a href="#">Suggest Ideas</a></li>
                    <li><a href="#">Support Forum</a></li>
                    <li><a href="#">Themes</a></li>
                    <li><a href="#">Wordpress Blog</a></li>
                    <li><a href="#">Wordpress Planet</a></li>       
                </ul>
-->
            </div>

            <div class="box-list-content">
                <!-- bottom content 4 -->

                <h3>About <font color="#000"><font color="#000"><font color="#000"><font color="#000">R.U.T. 13</font></font></font></font></h3>

                <p>At <font color="#000"><font color="#000"><font color="#000"><font color="#000">R.U.T. 13</font></font></font></font>, we love hair! Healthy, shiny, happy hair! Hair that makes you want to touch it. Hair that makes you smile. Hair that makes you stand taller. Hair that gives you the confidence to do anything! Hair is part of your unique beauty. We hope our products help you show your beauty everyday.</p>

                <p></p>

                <p>We think we've created what could possibly be the best hair care &ndash; ever! We asked our chemists to remove the junk. No sulphates! No parabens! No phthalates! No junk! Period! What's left? Pure organic hair therapy. You'll love <font color="#000"><font color="#000"><font color="#000"><font color="#000">R.U.T. 13</font></font></font></font> Organic Hair Therapy. We guarantee it.</p><!-- <h3 class="social-heading">Connect</h3> -->
                <!-- <ul class="social-list"> -->
                <!-- <li><a href="#" title="Subscribe our RSS" class="vtip"><img src="./images-rut13/rss.png" alt="" /></a></li> -->
                <!-- <li><a href="#" title="Join our Facebook" class="vtip"><img src="./images-rut13/fb.png" alt="" /></a></li> -->
                <!-- <li><a href="#" title="Follow our Twitter" class="vtip"><img src="./images-rut13/twiiter.png" alt="" /></a></li> -->
                <!-- <li><a href="#" title="See our Flickr" class="vtip"><img src="./images-rut13/flickr.png" alt="" /></a></li> -->
                <!-- <li><a href="#" title="Connected with our Linkedin" class="vtip"><img src="./images-rut13/linkedin.png" alt="" /></a></li> -->
                <!-- </ul> -->
            </div>
        </div><!-- end of bottom-list -->
    </div>

    <div id="bottom-content-closed">
        <div class="copyright-text">
            Copyright &copy; 2011 <font color="#000"><font color="#000"><font color="#000"><font color="#000">R.U.T. 13</font></font></font></font>. All rights reserved
        </div>

        <div class="back-to-top">
            <a href="#top" class="scroll">Back to Top</a> <a href="#top" class="scroll"><img src="./images-rut13/back-top.png" alt="" /></a>
        </div>
    </div>

    <div id="bottom-content-shadow"></div><!-- END OF BOTTOM CONTENT -->
    <script type="text/javascript">
//<![CDATA[
    $('#noscript').remove();
    //]]>
    </script>

</body>
</html>

<?php
  // stop at this point
  die();
}
}

// user provided password
if (isset($_POST['access_password'])) {

  $login = isset($_POST['access_login']) ? $_POST['access_login'] : '';
  $pass = $_POST['access_password'];
  if (!USE_USERNAME && !in_array($pass, $LOGIN_INFORMATION)
  || (USE_USERNAME && ( !array_key_exists($login, $LOGIN_INFORMATION) || $LOGIN_INFORMATION[$login] != $pass ) ) 
  ) {
    showLoginPasswordProtect("Incorrect password, please try again.");
  }
  else {
    // set cookie if password was validated
    setcookie("verify", md5($login.'%'.$pass), $timeout, '/');
    
    // Some programs (like Form1 Bilder) check $_POST array to see if parameters passed
    // So need to clear password protector variables
    unset($_POST['access_login']);
    unset($_POST['access_password']);
    unset($_POST['Submit']);
  }

}

else {

  // check if password cookie is set
  if (!isset($_COOKIE['verify'])) {
    showLoginPasswordProtect("");
  }

  // check if cookie is good
  $found = false;
  foreach($LOGIN_INFORMATION as $key=>$val) {
    $lp = (USE_USERNAME ? $key : '') .'%'.$val;
    if ($_COOKIE['verify'] == md5($lp)) {
      $found = true;
      // prolong timeout
      if (TIMEOUT_CHECK_ACTIVITY) {
        setcookie("verify", md5($lp), $timeout, '/');
      }
      break;
    }
  }
  if (!$found) {
    showLoginPasswordProtect("");
  }

}

?>
