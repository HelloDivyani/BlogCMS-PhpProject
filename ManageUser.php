<?php
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
	$_SESSION['loggedIn']='true';
$userlevel=0;
include('signup/connection.php');
$sql="SELECT * FROM users WHERE UserLevel='$userlevel' ORDER BY UserName ASC";
$result=mysqli_query($conn,$sql) or die("Your query is not correct");

if(!empty(isset($_GET['permission'])))
{
	//echo "Here";
	//update permission
	$per=1;
	$myuser=$row[4];
	$myquery="UPDATE users SET Permission='$per' WHERE UserName='$myuser'";
	$result1=mysqli_query($conn,$myquery) or die("Your query is not correct");


	
}


?>

<!doctype html>
<html>
<head>
<title>ManageUsers BlogBook</title>
<link rel="stylesheet" type="text/css" href="css/manageuser.css"/>
<script type="text/javascript" src="js/manageUserJS.js">
</script>
</head>
<body>
<h1 style="text-align:center">BlogBook Users</h1>
<a href="index.php" style="margin-left:300px;font-size:20px" >Home</a>
<div class="wrap">
  	<div class="header"><span>Users</span></div>
		<div class="wrap-list">
			<ol class="list">
			<?php
			
			  while($row=mysqli_fetch_array($result))
			  {
				  echo "<li>				
					<a  style='text-align:center;font-family:sans-serif'  href=''><label for='check-1'>$row[4]</label></a>					  
					<label for='delete' >Delete :</label> <input id='delete' name='delete' type='checkbox'>
					<label for='permission'>Permission :</label> <input type='checkbox' id='permission' name='permission'>
					
					
				    </li>";
					
					
					
					
				?>
				 
				
				<?php
				  
			  }
			
			?>
				
				
			</ol>
		</div>
	</div>


</body>
</html>

