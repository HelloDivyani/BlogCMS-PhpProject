<?php

$message="";
if(isset($_GET['username']))
{
    
include('signup/connection.php');

$username=mysqli_escape_string($conn,filter_var(strip_tags($_GET['username']),FILTER_SANITIZE_STRIPPED));
$query="SELECT * FROM users WHERE UserName='$username'";

	$result=mysqli_query($conn,$query) or die("Your query is not right");
 $row=mysqli_fetch_array($result);
	// Name and Email
	error_reporting(0);
$count=mysqli_num_rows($result);
if($count==0)
{
	//invalid username
	$message="User Not Found on BlogBook";
}
	$name=$row[1];
	$email=$row[2];
	//BioData
	$query="SELECT * FROM addbiodata WHERE UserName='$username'";
	$result=mysqli_query($conn,$query) or die("Your query is not right");
 $row=mysqli_fetch_array($result);
 $bio=$row[1];
 
 //echo "Bio $bio";
if($result)
{
	$message="Found in BlogBook";
}	

	
	
	
	
}



?>

<!DOCTYPE HTML>
<html>

<head>


<title>BlogBook Blogger</title>

<link rel="stylesheet" type="text/css" href="css/writeblog.css"/>
</head>
<body>
<div id="form-main">
  <div id="form-div">
  <h1 style="text-align:center;font-family:sans-serif;font-size:30px;color:white">Blogger Information</h1>
    <form class="form" id="form1">
      
      <p class="name">
	  <label>Name : </label>
        <input name="Name" type="text"  readonly value="<?php echo $name ?>" autofocus  id="name" />
      </p>
      
	    <p class="name">
		<label>UserName : </label>
        <input name="UserName" readonly value="<?php echo $username?>"  type="text" autofocus placeholder="Category" id="UserName" />
      </p>
	  <p class="name">
	  <label>Email : </label>
        <input name="email" type="text" autofocus readonly value="<?php echo $email ?>"  id="email" />
      </p>
	   <p class="name">
	   <label >BioData : </label>
        <input name="biodata" type="text" autofocus readonly value="<?php echo $bio ?>"  id="biodata" ></input>
      </p>
     
      <a href="index.php" style="margin:90px;text-align:center;font-family:sans-serif;font-size:30px;color:white" name="home"  >Home</a><br>
	<a href="UserBlogs.php?username=<?php echo $username?>" style="margin:90px;text-align:center;font-family:sans-serif;font-size:30px;color:white" name="home"  >My BlogBook</a>
    
      
      
      </div>
    </form>
  </div>
  </body>
  
  </html>