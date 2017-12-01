<?php
//file name: settings.php
//Title:Build your own Forgot Password PHP Script
function connect()
{	
$host="localhost"; //host
$uname="jordonbc_AW";  //username
$pass="erip7loX?.Nl";      //password
$db= 'jordonbc_AlienWars';  //database name
 
$con = mysql_connect($host,$uname,$pass);
 
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
mysql_select_db($db, $con);}