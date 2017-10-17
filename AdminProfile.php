<?php
session_start();
$_SESSION['loggedIn']='true';	
include('signup/connection.php');
$username=$_SESSION['username'];
$sql="SELECT * FROM users WHERE Username='$username'";
$result=mysqli_query($conn,$sql) or die("Your query is not correct");
$row=mysqli_fetch_array($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<title>BlogBook Admin Profile</title>
</head>
<body>
	<a href="logout.php"><button class="loginbutton" type="submit">Logout</button></a>
	<a href="index.php"><button style="margin-top:50px" class="loginbutton" type="submit">Home</button></a>
	<div id="section">
		<h1>Admin Profile</h1>
		<input type="text" readonly value="<?php echo $row['Name'];?>"/>
		<input type="text" readonly name="username" value="<?php echo $row['UserName'];?>"/>
		<input type="email" readonly name="email" value="<?php echo $row['Email'];?>"/>
		<a href="changepassword.php" name="changepassword"><button type="submit">Change Password</button></a>
		<a href="ManageUser.php" name="ManageUsers" ><button type="submit">ManageUsers</button></a>
		
	</div>
</body>
</html>