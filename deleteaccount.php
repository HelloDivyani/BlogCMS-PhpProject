<?php
$_SESSION['loggedIn']='true';
//If Account is deleted 
session_start();
include('connection.php');
$username=$_SESSION['username'];
$sql="DELETE FROM users WHERE UserName='$username'";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Delete Account</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<body>
	<div class="verification">
		<?php if($result){
			
			echo "Your account has been deleted successfully";
			
		}  ?>
	</div>
</body>
</head>
</html>