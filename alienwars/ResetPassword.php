<!DOCTYPE html>
<html><!-- Sets the page to HTML 5 for compatibility with browsers -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><!-- Defines the Header of the page --><meta name="author" content="Jordon Brooks" ><meta name="description" content="Alien Wars sign-up"><meta name="keywords" content="Jordon, Brooks, Jordon's, Software, jordonbc's, Website, GlassOS, Glass, OS,
		Jpad, Open, Source, web, browser, JDE, Desktop, Environment, jordons, jordon, python, programming, software">
	<title>Jordon&#39;s Website - Alien Wars Password Reset</title>
	<!-- Sets the title of the page --><!-- Sets the character set used the the website --><!-- Cascading Style sheets for the website -->
	<link href="../main.css" media="screen and (min-width: 1000px)" rel="stylesheet" type="text/css" />
	<link href="../mobile.css" media="screen and (max-width: 999px)" rel="stylesheet" type="text/css" />
	<link href="../styles/orange/orangeTheme.css" rel="stylesheet" type="text/css" /><!-- For the user Themes -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" media="screen and (min-width: 1336px)" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" media="screen and (min-width: 1336px)" rel="stylesheet" type="text/css" />
	<link href="../styles/dark/darkTheme.css" rel="alternate stylesheet" title="dark" type="text/css" /><!-- Dark Theme --><script type="text/javascript" src="../scripts/styleSwitcher.js"></script><!-- JavaScript for the CSS Changer --><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"><!-- View-port -->
</head>
<!-- Closes the header -->
<body><!-- Defines the content of the page -->
<div align="center"><!-- Center's the Navigation bar -->
<div class="topbar"><!-- Defines the Top bar -->
<nav><!-- The HTML 5 Navigation tags --><img alt="My logo" height="60" src="../images/title/logo.png" width="60" /> <!-- Puts the logo on the website --> <!-- Links to most used webpages --> <a href="../index.html">Home</a> <a href="../software.html">Software</a> <a href="../hardware.html">Hardware</a> <a href="../cv.html">CV</a> <a href="../about.html">About</a> <a href="../links.html">Links</a> <a href="../sitemap.html">Sitemap</a> <a href="../games.html">Games</a> <a href="https://forum.jordonbc.bnettech.pw">Forums</a> <a class="active" href="ResetPassword.php">Alien Wars Password Reset</a> <!--<a href="help.html" style="float: right;">Help</a>--></nav>
<!-- End of navigation --></div>
<!-- End of topbar -->

<div class="wrapper" width="device-width"><content> <!-- Tells the browser that this is content -->
<h1>Alien Wars Password Reset</h1>

<p style="text-align: center;">We will send a password reset link to the provided email address if your registered with us.</p>

<fieldset style="width:30%"><legend>Reset Password</legend>

<form action="ResetPassword.php" method="POST">

<table border="0">
	<tbody>
		<tr>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input name="email" type="text" /></td>
		</tr>
	</tbody>
</table>
<input style="background-color: #888;border: none;color: white;padding: 5px 32px;text-align: center;text-decoration: none;display: inline-block;
    font-size: 16px;" id="button" name="submit" type="submit" value="Reset my password" />
</form>
</fieldset>
<?php
ini_set("include_path", '/home/jordonbcx/php:' . ini_get("include_path") );

//echo '<p style="color: #F00">PHP RUNNING</p>';

//file name: forgotpassword.php
//Title:Build your own Forgot Password PHP Script
//if(!isset($_GET['email'])){
//	                  echo'<form action="ResetPassword.php">
//	                      Enter Your Email Id:
//	                         <input type="text" name="email" />
//	                        <input type="submit" value="Reset My Password" />
//	                         </form>'; exit();
//	       }

if ($_POST['submit']){
//echo '<p style="color: #F00">Submit button pressed</p>';
$email=$_POST['email'];
if ($email){
//echo '<p style="color: #F00">'.$email.'</p>';

include("Settings.php");
require_once("Mail.php");
connect();
$q="SELECT email FROM members WHERE email='".$email."'";
$r=mysql_query($q);
$n=mysql_num_rows($r);
if (!$n){mysql_error();}
//if($n==0){echo "Email id is not registered";mysql_error();}
//$token=getRandomString(10);
//$token=str_replace("\", "", $token);

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function RandomizeToken($times = 10) {
    $t = '';
    for ($r = 0; $r < $times; $r++) {
        $t = generateRandomString(64);
    }
    return (string)$t;
}

$token = RandomizeToken(rand(10, 100));
//echo '<p style="color: #F00">' . $token . '</p>';

//$token=password_hash($email, PASSWORD_DEFAULT);
//$token=substr($token, 0, 10);

$q="UPDATE members SET token='".$token."' where email='".$email."'" ;
$test = mysql_query($q);
if (!$test){
echo '<p style="color: #F00; text-align: center;">'.mysql_error().'</p>';
die();
}

 function mailresetlink($to,$token){
 
$uri = 'https://'. $_SERVER['HTTP_HOST'] . '/alienwars';
//<a href="'.$uri.'/PassReset.php?token='.$token.'">Reset Password</a>

// support email password: ~73NQ;&1a?]d

//'.$uri.'/ResetPass.php?token='.$token

//'Please use this token to change your password '.$uri.'/PassReset.php?token='.$token

$subject = 'Alien Wars Password Reset';
//$message = 
//'
//<html>
//	<head>
//		<title>$subject</title>
//	</head>
//	<body>
//		<p>Please click the link below to change your password for Alien Wars.<br><a href="'.$uri.'/PassReset.php?token='.$token.'">'.$uri.'/PassReset.php?token='.$token.'</a></p>
//	</body>
//</html>
//';
$message = 
'
<!DOCTYPE html>
<html><!-- Sets the page to HTML 5 for compatibility with browsers -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><!-- Defines the Header of the page --><meta name="author" content="Jordon Brooks" ><meta name="description" content="Alien Wars sign-up"><meta name="keywords" content="Jordon, Brooks, Jordon&#39;s, Software, jordonbc&#39;s, Website, GlassOS, Glass, OS,
		Jpad, Open, Source, web, browser, JDE, Desktop, Environment, jordons, jordon, python, programming, software">
	<title>Jordon&#39;s Website - Alien Wars Password Reset</title>
	<!-- Sets the title of the page --><!-- Sets the character set used the the website --><!-- Cascading Style sheets for the website -->
	<link href="https://jordonbc.bnettech.pw/main.css" media="screen and (min-width: 1000px)" rel="stylesheet" type="text/css" />
	<link href="https://jordonbc.bnettech.pw/mobile.css" media="screen and (max-width: 999px)" rel="stylesheet" type="text/css" />
	<link href="https://jordonbc.bnettech.pw/styles/orange/orangeTheme.css" rel="stylesheet" type="text/css" /><!-- For the user Themes -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" media="screen and (min-width: 1336px)" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" media="screen and (min-width: 1336px)" rel="stylesheet" type="text/css" />
	<link href="https://jordonbc.bnettech.pw/styles/dark/darkTheme.css" rel="alternate stylesheet" title="dark" type="text/css" /><!-- Dark Theme --><script type="text/javascript" src="https://jordonbc.bnettech.pw/scripts/styleSwitcher.js"></script><!-- JavaScript for the CSS Changer --><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"><!-- View-port -->
</head>
<!-- Closes the header -->
<body><!-- Defines the content of the page -->
<div align="center"><!-- Center&#39;s the Navigation bar -->
<div class="topbar"><!-- Defines the Top bar -->
<nav>
<img alt="My logo" height="60" src="https://jordonbc.bnettech.pw/images/title/logo.png" width="60" />
<a href="index.html">Home</a>
<a href="software.html">Software</a>
<a href="hardware.html">Hardware</a>
<a href="cv.html">CV</a>
<a href="about.html">About</a>
<a href="links.html">Links</a>
<a href="sitemap.html">Sitemap</a>
<a href="games.html">Games</a>
<a href="https://forum.jordonbc.bnettech.pw">Forums</a>
<a class="active" href="ResetPassword.php">Alien Wars Password Reset</a>
</nav>
<!-- End of navigation --></div>
<!-- End of topbar -->

<div class="wrapper" width="device-width"><content> <!-- Tells the browser that this is content -->
<h1>Alien Wars Password Reset</h1>

<p>Please click on the link below to change your password:</p>
<br>
<a href="'.$uri.'/PassReset.php?token='.$token.'">'.$uri.'/PassReset.php?token='.$token.'</a>

<!--<p style="color: #f00; text-align: center;">WARNING: DO NOT USE YOUR EVERYDAY PASSWORD IT IS NOT SECURE!</p>--> </content></div>
<br />
<br />
&nbsp;</div>
</body>
</html>
';

$sent = mail($to, $subject, $message, 'From: Alien Wars Support <support@jordonbc.bnettech.pw>' . "\r\n" . 'Content-type: text/html; charset=iso-8859-1' . "\r\n");

if($sent){
	echo '
		<p style="color: #F00; text-align: center;">We have sent the password reset link to your E-mail: <b>'.$to.'</b></p>';
}
if (!$sent){
	echo '<p style="color: #F00; text-align: center;">There was a problem sending the email, Please contact support@jordonbc.bnettech.pw for help</p><br>';
}


}

//mail($to,'Please use this link to change your password: $token, 'From: Alien Wars Support <Support@jordonbc.bnettech.pw>' . "\r\n");
}
if (!$email) {echo '<p style="color: #F00">No Email Address was entered!</p>';}
if (!$token) {echo '<p style="color: #F00">No token was generated!</p>';}
if ($email && $token){mailresetlink($email,$token);}
else {echo '<p style="color: #F00">Either no E-mail or token was provided!</p>';}
}
?>
<!--<p style="color: #f00; text-align: center;">WARNING: DO NOT USE YOUR EVERYDAY PASSWORD IT IS NOT SECURE!</p>--> </content></div>
<br />
<br />
&nbsp;</div>
</body>
</html>



