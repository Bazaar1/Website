<?php
define('DB_HOST', 'xo.cpjjpvym5u94.eu-west-2.rds.amazonaws.com');
define('DB_NAME', 'xo');
define('DB_USER','root');
define('DB_PASSWORD','xxxx');

$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

function NewUser()
{
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$email = $_POST['email'];
	$password =  $_POST['pass'];
	$query = "INSERT INTO WebsiteUsers (firstname,lastname,email,pass) VALUES ('$firstname','$lastname','$email','$password')";
	$data = mysql_query ($query)or die(mysql_error());
	if($data)
	{
	echo "YOUR REGISTRATION IS COMPLETED...";
	}
	else
	{
	echo "Registartaion Failed. Please try again later";
	}
}

function SignUp()
{
if(!empty($_POST['email']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM WebsiteUsers WHERE email = '$_POST[email]'") or die(mysql_error());

	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
	echo "Working";
#		NewUser();
	}
	else
	{
	echo "SORRY";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>
