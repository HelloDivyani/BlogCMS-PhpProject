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
<title>BlogBook ProfilePage</title>
</head>
<body>
<div style="">
	<a href="logout.php"><button class="loginbutton" type="submit">Logout</button></a>
	<a href="index.php"><button style="margin-top:50px" class="loginbutton" type="submit">Home</button></a>
	<a href="AddBlog.php"><button style="" class="loginbutton" type="submit">Create a Blog</button></a>
	<a href="myBlogs.php"><button style="" class="loginbutton" type="submit">My Blogs</button></a>
	<a href="addBioData.php?username=<?php echo $username ?>"><button style="" class="loginbutton" type="submit">Add Bio Data</button></a>
	
	</div>
	<div style="" id="section">
		<h1>Profile Details</h1>
		<input  type="text" readonly value="<?php echo $row['Name'];?>"/>
		<input type="text" readonly name="username" value="<?php echo $row['UserName'];?>"/>
		<input type="email" readonly name="email" value="<?php echo $row['Email'];?>"/>
		<a href="changepassword.php" name="changepassword"><button type="submit">Change Password</button></a>
		<a href="" name="DeleteAccount" ><button type="submit">Delete Account</button></a>
		
	</div>
</body>
</html>