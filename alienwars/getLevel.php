<?php header('Access-Control-Allow-Origin: *');
$username = $_GET['fname'];
$password = $_GET['fpass'];
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
if ($PasswordVerify)
{
	$qz = "SELECT Level FROM members where username='".$username."'" ; 
	$qz = str_replace("\'","",$qz); 
	$result = mysqli_query($con,$qz);
	while($row = mysqli_fetch_array($result))
	  {
	  echo $row['Level'];
	  }
}
mysqli_close($con);
?>