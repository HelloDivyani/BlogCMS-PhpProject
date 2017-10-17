<?php

if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
$_SESSION['loggedIn']='true';
$message="";

$username=$_SESSION['username'];

include('signup/connection.php');
if(isset($_POST['submit']))
{
	//session_start();
	if(isset($_POST['newpassword']) && isset($_POST['confirmpassword']))
	{
		// Check if Both are equal
		if(strcmp($_POST['newpassword'],$_POST['confirmpassword'])==0)
		{
			
			
		
		
		
		$newpassword=mysqli_escape_string($conn,filter_var(strip_tags($_POST['confirmpassword']),FILTER_SANITIZE_STRIPPED));
		$confirmpassword=mysqli_escape_string($conn,filter_var(strip_tags($_POST['confirmpassword']),FILTER_SANITIZE_STRIPPED));
		
		$hash_password = hash('sha256', $newpassword);
		
		$sql="UPDATE users SET Password='$hash_password' WHERE UserName='$username'";
		
		$result=mysqli_query($conn,$sql);
		
		if($result)
		{
			//$sql="UPDATE users SET Forgot_Password_Active=1 WHERE Email='$email'";
			
			//$result=mysqli_query($conn,$sql);
			
			$message="SuccessFully Updated Password SignIn!!!";
			//echo "<a href='loginIndex.php'><button class='loginbutton' type='submit'>SignIn</button></a>";
			header('Location:loginIndex.php');
		}
		}
		else
		{
			$message="New Password and Confirm Password Not Match";
		}
	}
	
}
?>


<!DOCTYPE html>
  <html lang="en">
  <head>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
  <title>BlogBook Update Password</title>
  </head>
  <body style="margin-top:67px">
  <a href='Profile.php'><button class='loginbutton' type='submit'>ProfilePage</button></a>
  <div id="section">
  <h1>Update Password</h1>
  <form method="post">
  <input type="password" placeholder="New Password" name="newpassword" required autofocus/>
  <input type="password" placeholder="Confirm Password" name="confirmpassword" required autofocus/>
  <button type="submit" name="submit">Change Password</button>
  <br>
  </span>
		<span style="color:white;position:relative;top:20px;"><?php if(isset($message))
		{
			echo $message;
		}
		?>
		</span>
  </form>
  </div>
  </body>
  </html>
  