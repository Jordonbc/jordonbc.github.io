<?php
$Session = session_start();

?>

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
	<link href="../styles/dark/darkTheme.css" rel="alternate stylesheet" title="dark" type="text/css" /><!-- Dark Theme --><script type="text/javascript" src="scripts/styleSwitcher.js"></script><!-- JavaScript for the CSS Changer --><meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"><!-- View-port -->
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

<fieldset style="width:30%"><legend>Reset Password</legend>

<form method="post" action="">
	<table>
	<tr>
		<td><p>Enter your new password:</p></td>
		<td><input type="password" name="password" /></td>
	</tr>
	<tr>
		<td><p>Enter your new password again:</p></td>
		<td><input type="password" name="password2" /></td>
	</tr>
	</table>
	<input style="background-color: #888;border: none;color: white;padding: 5px 32px;text-align: center;text-decoration: none;display: inline-block;
    font-size: 16px;" type="submit" name="submit" value="Change Password">
</form>

<?php
//file reset.php
//title:Build your own Forgot Password PHP Script
//echo '<p style="colour: #F00">PHP running</p>';
$token=$_GET['token'];
//echo '<p style="colour: #F00">Token = '.$token.'</p>';
include("Settings.php");
if ($_POST['submit']){
connect();
//echo '<p style="colour: #F00">Submit button pressed</p>';
if ($token){
$q="SELECT * FROM members WHERE token='".$token."'";
$reply=mysql_query($q);
if ($reply) {
	//echo '<p style="colour: #F00">Token test Passed</p>';
	$pass=$_POST['password'];
	
	$pass2 = $_POST['password2'];
	
	if($pass && $pass2)
	//echo '<p style="colour: #F00">Password: '.$pass.' and Password2: '.$pass2.'</p>';
	{
	//echo '<p style="colour: #F00">pass: '.$pass.' and pass2: '.$pass2.'</p>';
	if ($pass == $pass2)
		{
		//echo '<p style="colour: #F00">passwords match</p>';
		$q="SELECT email FROM members WHERE token='".$token."'"; // Does an account exist with that token?
		$reply=mysql_query($q); // Sends the message to mysql
		//echo mysql_num_rows($reply);
		if (mysql_num_rows($reply) == 1) { // Checks if at least 1 account exists
		    //echo '<p style="color: #0F0; text-align: center;">Found ' . mysql_num_rows($reply) . ' account</p>';
			$q="UPDATE members SET password='".password_hash($pass, PASSWORD_DEFAULT)."' WHERE token='".$token."'"; // Sets the password of the account
			//echo '<p style="color: #F00; text-align: center;">Updating Password!</p>';
			$r=mysql_query($q); // Sends the message to mysql
			$q = "UPDATE members SET token='' WHERE token='".$token."'";
			$t = mysql_query($q);
			if ($r) {echo '<p style="color: #0F0; text-align: center;">Your password is changed successfully</p>';}
			if(!$r){echo '<p style="colour: #F00">Error: ' . mysql_error() . '</p>';}
			//if ($t) {echo '<p style="color: #0F0; text-align: center;">Token successfully removed!</p>';}
			
			else {echo '<p style="color: #F00; text-align: center;">Token is invalid!</p>';}
		    
		}
		else {echo '<p style="colour: #F00">Error: Account not found!</p>';}
		}
	    else {echo '<p style="color: #F00; text-align: center;">Passwords do not match!</p>';}
	}
	else {echo '<p style="color: #F00; text-align: center;">Passwords do not exist!</p>';}
}
else {echo '<p style="color: #F00; text-align: center;">Cannot access database!</p>';}
}
else {echo '<p style="color: #F00; text-align: center;">Token Does not present!</p>';}
}
if (!Session) {echo '<p style="color: #F00; text-align: center;">Error With Session</p>';}

?>

</fieldset>

<!--<p style="color: #f00; text-align: center;">WARNING: DO NOT USE YOUR EVERYDAY PASSWORD IT IS NOT SECURE!</p>--> </content></div>
<br />
<br />
&nbsp;</div>
</body>
</html>
