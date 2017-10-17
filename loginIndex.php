<?php
if(isset($_POST['submit']))
{
session_start();	
$_SESSION['loggedIn']='false';
include('signup/connection.php');
//include('function.php');
$success="";
$error="";
$Successmessage="";
if(empty($_POST['username']) || empty($_POST['password']))
{
	 //Required Field
	$error="Please enter all the details first";
}


else
{
	
$username=$_POST['username'];
$password=$_POST['password'];
	
$username=mysqli_escape_string($conn,filter_var(strip_tags($username),FILTER_SANITIZE_STRIPPED));
$password=mysqli_escape_string($conn,filter_var(strip_tags($password),FILTER_SANITIZE_STRIPPED));

$hash_password = hash('sha256', $password);

$sql="SELECT * FROM users WHERE UserName='$username' AND Password='$hash_password'";
$result=mysqli_query($conn,$sql) or die("Your query is not right");
$row=mysqli_fetch_array($result);

$count=mysqli_num_rows($result);
if($count==1)
{
	
	$Successmessage="Successfully Logged In";
	// to remain signIn for a particular time
		$_SESSION['username']=$username;
		
			if(isset($_POST["rememberme"]))
				{
				setcookie ("username",$_POST["username"],time()+ (10 * 365 * 24 * 60 * 60));
				setcookie ("password",$_POST["password"],time()+ (10 * 365 * 24 * 60 * 60));

			} else {
				//header('Location:Profile.php');
				if(isset($_COOKIE["username"])) {
					setcookie ("username","");}
				if(isset($_COOKIE["password"])) {
					setcookie ("password","");}
			}
						//	
	
	                   
						//echo "Row : $row[7]";
						if($row[7]==0)
						{
							//Non Admin User
							header('Location:Profile.php');
							
						}
						else
						{
							header('Location:AdminProfile.php');
						}
							
						
	
}
if($count==0)
{
	$error = "Sorry Wrong Password and UserName Try Again!!!";
}
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<title>SignIn in BlogBook</title>
</head>
<body>
	<a href="signUpIndex.php"><button class="loginbutton" type="submit">SignUp</button></a>
	<a href="index.php"><button style="margin-top:50px" class="loginbutton" type="submit">Home</button></a>
	<div id="section">
		<h1>SignIn !!!</h1>
		<form method="post">
		<input type="text" name="username" required autocomplete="on" autofocus value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username'];}?>" placeholder="Enter UserName"/>
		<input type="password" name="password"  required autocomplete="on" autofocus value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];}?>" placeholder="Enter Password" />
		<input type="checkbox" name="rememberme">
		<span class="checkboxtext">Remember me</span><br>
		<button type="submit" name="submit">SignIn</button>
		<br>
		
		<span style="color:white;position:relative;top:20px;"><?php if(isset($error))
		{
			echo $error;
		}
		?>
		</span>
		<span style="color:white;position:relative;top:20px;"><?php if(isset($Successmessage))
		{
			echo $Successmessage;
		}
		?>
		</span>
	</div>
</body>
</html>