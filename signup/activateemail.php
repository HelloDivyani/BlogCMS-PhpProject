<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
$_SESSION['loggedIn']='false';
$to=$_SESSION['email'];
$activation_code=$_SESSION['activation_code'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];

$subject='Account Confirmation Message';


$body = "
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------<br><br><br><br>
Username: $username <br>
Password:  $password <br><br><br><br>
------------------------
 
Please click this link to activate your account:----------------------<br><br><br><br>
http://localhost/testing/Blogger/signUp/verify.php?email=$to&activation_code=$activation_code";



if(mail($to,$subject,$body,"From:notifydivyani@gmail.com"))
{
//	echo "Thankyou Message Received";
}
else
{
	//echo "Sorry Message Could not be send at this time";
}


?>




