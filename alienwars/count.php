<!DOCTYPE html>
<html><!-- Sets the page to HTML 5 for compatibility with browsers -->
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><!-- Defines the Header of the page --><meta name="author" content="Jordon Brooks" ><meta name="description" content="Alien Wars sign-up"><meta name="keywords" content="Jordon, Brooks, Jordons, Software, jordonbcs, Website, GlassOS, Glass, OS,
		Jpad, Open, Source, web, browser, JDE, Desktop, Environment, jordons, jordon, python, programming, software">
	<title>Jordon&#39;s Website - Alien Wars Users</title>
	<!-- Sets the title of the page --><!-- Sets the character set used the the website --><!-- Cascading Style sheets for the website -->
	<link href="../main.css" media="screen and (min-width: 1000px)" rel="stylesheet" type="text/css" />
	<link href="../mobile.css" media="screen and (max-width: 999px)" rel="stylesheet" type="text/css" />
	<link href="../styles/orange/orangeTheme.css" rel="stylesheet" type="text/css" /><!-- For the user Themes -->
	<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow" media="screen and (min-width: 1336px)" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Titillium+Web" media="screen and (min-width: 1336px)" rel="stylesheet" type="text/css" />
	<link href="../styles/dark/darkTheme.css" rel="alternate stylesheet" title="dark" type="text/css" /><!-- Dark Theme -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"><!-- View-port -->

</head>
<!-- Closes the header -->
<body><!-- Defines the content of the page -->
<div align="center"><!-- Center's the Navigation bar -->
<div class="topbar"><!-- Defines the Top bar -->
<nav><!-- The HTML 5 Navigation tags --><img alt="My logo" height="60" src="../images/title/logo.png" width="60" /> <!-- Puts the logo on the website --> <!-- Links to most used webpages --> <a href="../index.html">Home</a> <a href="../software.html">Software</a> <a href="../hardware.html">Hardware</a> <a href="../cv.html">CV</a> <a href="../about.html">About</a> <a href="../links.html">Links</a> <a href="../sitemap.html">Sitemap</a> <a href="../games.html">Games</a> <a href="https://forum.jordonbc.bnettech.pw">Forums</a> <a class="active" href="count.php">Alien Wars Users</a> <!--<a href="help.html" style="float: right;">Help</a>--></nav>
<!-- End of navigation --></div>
<!-- End of topbar -->

<div id="wrapper" class="wrapper" width="device-width"><content> <!-- Tells the browser that this is content -->
<h1>Alien Wars Users</h1>

<?php
ini_set("include_path", '/home/jordonbcx/php:' . ini_get("include_path"));
if (!$_POST['email'] && !$_POST['password'])
{
echo '
<fieldset style="width:30%"><legend>Password</legend>

<form action="count.php" method="POST">

<table border="0">
	<tbody>
		<tr>
		</tr>
		<tr>
			<td>E-mail</td>
			<td><input name="email" type="email" /></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input name="password" type="password" /></td>
		</tr>
	</tbody>
</table>
<input style="background-color: #888;border: none;color: white;padding: 5px 32px;text-align: center;text-decoration: none;display: inline-block;
    font-size: 16px;" id="button" name="submit" type="submit" value="Login" />
</form>
</fieldset>
';
}

if ($_POST['submit']){
//echo '<p style="color: #F00">Submit button pressed</p>';
$password=$_POST['password'];
//echo '<p style="color: #F00">'.$password.'</p>';
$email=$_POST['email'];

if ($password && $email){
//echo '<p style="color: #F00">'.$email.'</p>';

if ($email == 'jordonbc@hotmail.co.uk' && $password == 'TbCdM[X7,p]b') {

include("Settings.php");
connect();

$result = mysql_query("SELECT * FROM members");

$UserCount = 0;

while($row = mysql_fetch_assoc($result)){
    $UserCount++;
    //iterate over all the fields
    //echo '<tr>';
    foreach($row as $key => $val){
        //generate output
        //if ($key != 'password') {
        	//if ($key != 'token') {
        	//echo '<td>'.$val.'</td>';
        	//}
        //}
    }
}
$UserNum = $UserCount;
echo '<p style="color: #0F0; text-align: center;font-size: 18pt;">There are currently <b style="color: #0F0;">' . $UserNum . '</b> Registed users for Alien Wars.</p>';

}
}

}

?>
<br>
<br>
</div>
</body>
</html>