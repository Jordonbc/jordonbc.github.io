<!DOCTYPE html> <!-- Defines the document type to HTML 5 -->
<html> <!-- Sets the page to HTML 5 for compatibility with browsers -->
	<head> <!-- Defines the Header of the page -->
        
        <meta name="author" content="Jordon Brooks" >
		<meta name="description" content="Alien Wars sign-up">
		<meta name="keywords" content="Jordon, Brooks, Jordon's, Software, jordonbc's, Website, GlassOS, Glass, OS,
		Jpad, Open, Source, web, browser, JDE, Desktop, Environment, jordons, jordon, python, programming, software">
        
		<title>Jordon's Website - Alien Wars Sign-up</title> <!-- Sets the title of the page -->
		<meta charset="UTF-8"> <!-- Sets the character set used the the website -->

		<!-- Cascading Style sheets for the website -->		
		
		<link rel="stylesheet" type="text/css" href="../main.css" media="screen and (min-width: 1000px)">
		<link rel="stylesheet" type="text/css" href="../mobile.css" media="screen and (max-width: 999px)">
        
        <link rel="stylesheet" type="text/css" href="../styles/orange/orangeTheme.css">
		
		<!-- For the user Themes -->		
		
		<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css' media="screen and (min-width: 1336px)">
		<link href='https://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css' media="screen and (min-width: 1336px)">
		
		<link rel="alternate stylesheet" type="text/css" href="../styles/dark/darkTheme.css" title="dark"> <!-- Dark Theme -->
		
		<script type="text/javascript" src="scripts/styleSwitcher.js"></script> <!-- JavaScript for the CSS Changer -->
		
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
                        			<a href="../games.html">Games</a>
                        			<a href="https://forum.jordonbc.bnettech.pw">Forums</a>
                        			<a class="active" href="signup.php">Alien Wars Sign-up</a>
						
						<!--<a href="help.html" style="float: right;">Help</a>-->
					</nav> <!-- End of navigation -->
				</div> <!-- End of topbar -->			
			
			<div class="wrapper" width="device-width">
				<content> <!-- Tells the browser that this is content -->
				    <h1>Alien Wars Signup</h1>
				    <p style="Text-align: Center;">This form will allow you to create an account only to be used by Alien Wars. The account you create will include an email address, password and game information such as levels, kills and account status. This is only required to play online.</p>
                    <fieldset style="width:30%"><legend>Sign-up form</legend> <table border="0"> <form method="POST" action="signup.php"> <tr> <tr> <td>E-mail</td><td> <input type="text" name="email"></td> </tr> <tr> <td>Username (Min: 4, Max: 9)</td><td> <input type="text" name="user" maxlength="9"></td> </tr> <tr> <td>Password</td><td> <input type="password" name="pass"></td> </tr> <tr> <td>Confirm Password </td><td><input type="password" name="cpass"></td> </tr> <tr> <td></td> </tr> </table> <input style="background-color: #888;border: none;color: white;padding: 5px 32px;text-align: center;text-decoration: none;display: inline-block;
    font-size: 16px;" id="button" type="submit" name="submit" value="Sign-Up" /> </form><br>
    
<?php
$DB_HOST='localhost';
$DB_NAME='jordonbc_AlienWars';
$DB_USER='jordonbc_AW';
$DB_PASSWORD='erip7loX?.Nl';
$SALT=PASSWORD_DEFAULT;
$date = date("Y-m-d H:i:s");

$con=mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD, $DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysqli_select_db($con, $DB_NAME) or die("Failed to connect to MySQL: " . mysql_error());


$userName = $_POST['user'];
$email = $_POST['email'];
$PasswordText =  $_POST['pass'];
$cpassword = $_POST['cpass'];
$password=password_hash($PasswordText, $SALT);



if(isset($_POST['submit']))
{
	if (filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		if(!empty($userName) and !empty($PasswordText)) //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
		{
			if (strlen($userName)<= 9 && strlen($userName)>= 4)
			{
				if ($PasswordText == $cpassword)
				{   
					$Test="SELECT * FROM members WHERE username = $userName OR email = $email";
					$query = mysqli_query($con,$Test);
					if (!$query)
					{
						$query = "INSERT INTO members (username, email, password, DateCreated) VALUES ('$userName','$email','$password', '$date')";
						$data = mysqli_query ($con,$query);
						if($data)
						{
							echo '<p style="color: #0F0; text-align: center;">YOUR REGISTRATION IS COMPLETED...</p>';
						}
						else
						{
							echo '<p style="color: #F00; text-align: center;">Error creating user or Username maybe taken</p>';
						}
					}
					else
					{
						echo '<p style="color: #F00; text-align: center;">SORRY...USERNAME IS TAKEN OR YOU ARE ALREADY A REGISTERED USER</p>';
					}
				}
				else
				{
					echo '<p style="color: #F00; text-align: center;">password does not match!</p>';
				}
			}
			if (strlen($userName)<= 9) {echo '<p style="color: #F00; text-align: center;">Username cannot be greater than 9 characters!</p>';}
			else {echo '<p style="color: #F00; text-align: center;">Username cannot be less than 4 characters!</p>';}
		}
		else
		{
			echo '<p style="color: #F00; text-align: center;">Username and password cannot be blank!</p>';
		}	
	}
	else
	{
		echo '<p style="color: #F00; text-align: center;">Email is not valid!</p>';
	}
}
?>

</fieldset>
					<!--<p style="color: #f00; text-align: center;">WARNING: DO NOT USE YOUR EVERYDAY PASSWORD IT IS NOT SECURE!</p>-->
			<p style="color: #F00; text-align: center; font-size: 18pt;">Inappropriate usernames will be deleted.</p>
			<br>
			<a class="download" href="ResetPassword.php">Reset my password!</a>
			</content>
			</div>
			<br>
			<br>
			<br>
		</div>
	</body>
</html>