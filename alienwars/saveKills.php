<?php header('Access-Control-Allow-Origin: *');
$username = $_GET['fname'];
$password = $_GET['fpass'];
$Kills = $_GET['Kills'];
$con=mysqli_connect("localhost","jordonbc_AW","erip7loX?.Nl","jordonbc_AlienWars");
// Check connection
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$test="SELECT password FROM members WHERE username='".$username."'"; 
$DBPass = mysqli_query($con, $test);
//$HashedPassword = mysqli_fetch_array($DBPass);
while($row = mysqli_fetch_array($DBPass))
	  {
	  	$HashedPassword=$row['password'];
	  }	
$PasswordVerify = password_verify($password, $HashedPassword);

if($PasswordVerify)
{
	$qz = "UPDATE members SET Kills='$Kills' where username='".$username."'" ; 
	$qz = str_replace("\'","",$qz);
	$result = mysqli_query($con,$qz);
	if ($result)
	{
	  echo "Kills successfully updated!";
	}
	else
	{
	  echo "Error while saving your level...";
	}
}


mysqli_close($con);
?>