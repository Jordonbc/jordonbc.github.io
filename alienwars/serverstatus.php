<!DOCTYPE html> <!-- Defines the document type to HTML 5 -->
<html manifest="website.appcache"> <!-- Sets the page to HTML 5 for compatibility with browsers -->
	<head> <!-- Defines the Header of the page -->
        
        <meta name="author" content="Jordon Brooks" >
		<meta name="description" content="My Games">
		<meta name="keywords" content="Jordon, Brooks, Jordon's, Software, jordonbc's, Website, GlassOS, Glass, OS,
		Jpad, Open, Source, web, browser, JDE, Desktop, Environment, jordons, jordon, python, programming, software">
        
		<title>Jordon's Website - Games</title> <!-- Sets the title of the page -->
		<meta charset="UTF-8"> <!-- Sets the character set used the the website -->

		<!-- Cascading Style sheets for the website -->		
		
		<link rel="stylesheet" type="text/css" href="../main.css" media="screen and (min-width: 1000px)">
		<link rel="stylesheet" type="text/css" href="../mobile.css" media="screen and (max-width: 999px)">
        
        <link rel="stylesheet" type="text/css" href="../styles/orange/orangeTheme.css">
		
		<!-- For the user Themes -->		
		
		<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' media="screen and (min-width: 1336px)">
		<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css' media="screen and (min-width: 1336px)">
		
		<link rel="alternate stylesheet" type="text/css" href="../styles/dark/darkTheme.css" title="dark"> <!-- Dark Theme -->
		
		<script type="text/javascript" src="../scripts/styleSwitcher.js"></script> <!-- JavaScript for the CSS Changer -->
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"> <!-- View-port -->
	</head> <!-- Closes the header -->
	<body> <!-- Defines the content of the page -->
		<div align="center"> <!-- Center's the Navigation bar -->
			<div class="topbar"> <!-- Defines the Top bar -->
					<nav> <!-- The HTML 5 Navigation tags -->
						<img src="../images/title/logo.png" alt="My logo" width="60" height="60"/> <!-- Puts the logo on the website -->
						
						<!-- Links to most used webpages -->						
												
						<a href="../index.html">Home</a>
						<a href="../software.html">Software</a>
						<a href="../hardware.html">Hardware</a>
						<a href="../cv.html">CV</a>
						<a href="../about.html">About</a>
						<a href="../links.html">Links</a>
						<a href="../sitemap.html">Sitemap</a>
                        			<a class="active" href="serverstatus.html">Server Status</a>
                        			<a href="https://forum.jordonbc.bnettech.pw">Forums</a>
						
						<!--<a href="help.html" style="float: right;">Help</a>-->
					</nav> <!-- End of navigation -->
				</div> <!-- End of topbar -->			
			
			<div class="wrapper" width="device-width">
				<content> <!-- Tells the browser that this is content -->
					<h1>Server Status</h1>
                            
<?php

function GetServerStatus($site, $port)
{
    $status = array("OFFLINE", "ONLINE");
    $fp = fsockopen($site, $port, $errno, $errstr, 10);
    if (!$fp) {
        return $status[0];
    } else
      { return $status[1];}
};

$IsServerOnline = GetServerStatus("jordonbc.bnettech.pw", 443);

echo "<h3>jordonbc.bnettech.pw: ";

if ($IsServerOnline == "ONLINE")
{
    echo '<b style="color: #0f0">' . $IsServerOnline . '</b>';
    
} else {echo '<b style="color: #f00">' . $IsServerOnline . '</b>';}

echo "</h3>";

function TestDatabaseCon($host, $uname, $pass, $db)
{
    $status = array("OFFLINE", "ONLINE");
     
    $con = mysql_connect($host,$uname,$pass);
    
    if (!$con) {
      return $status[0];
        
    } else {return $status[1];}
    
};

$IsServerOnline = TestDatabaseCon("localhost", "jordonbc_AW", "erip7loX?.Nl", 'jordonbc_AlienWars');

echo "<h3>Alien Wars Account Database: ";

if ($IsServerOnline == "ONLINE")
{echo '<b style="color: #0f0">' . $IsServerOnline . '</b>';
} else {echo '<b style="color: #f00">' . $IsServerOnline . '</b>';}

echo '</h3>';

$IsServerOnline = GetServerStatus("forum.jordonbc.bnettech.pw", 443);

echo "<h3>forums.jordonbc.bnettech.pw: ";

if ($IsServerOnline == "ONLINE")
{
    echo '<b style="color: #0f0">' . $IsServerOnline . '</b>';
    
} else {echo '<b style="color: #f00">' . $IsServerOnline . '</b>';}

echo "</h3>";

$IsServerOnline = GetServerStatus("nextcloud.jordonbc.bnettech.pw", 443);

echo "<h3>nextcloud.jordonbc.bnettech.pw: ";

if ($IsServerOnline == "ONLINE")
{
    echo '<b style="color: #0f0">' . $IsServerOnline . '</b>';
    
} else {echo '<b style="color: #f00">' . $IsServerOnline . '</b>';}

echo "</h3>";

?>
<!--<br><br>-->
<!--<p style="color: #F00; text-align: center;">Alien Wars be offline for maintenance on Sunday 21st May 2017 between 12:00PM to 14:00. During this time you will not be able to login to your account.</p>-->
				</content>
			</div>
			<br>
			<br>
			<br>
		</div>
	</body>
</html>
