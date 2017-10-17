<?php
session_start();
$username=$_SESSION['username'];
	
if(isset($_REQUEST['AddBioData']))
{
		
include('signup/connection.php');


$biodata=mysqli_escape_string($conn,filter_var(strip_tags($_REQUEST['biodata']),FILTER_SANITIZE_STRIPPED));
	
	$query="INSERT INTO addbiodata (UserName,BioData) VALUES('$username','$biodata')";
	$result=mysqli_query($conn,$query) or die("Your query is not right");
	
    header('Location:Profile.php');	

	
}


?>

<!DOCTYPE HTML>
<html>

<head>

<title>Add BioData</title>

<link rel="stylesheet" type="text/css" href="css/writeblog.css"/>
</head>
<body>
<div id="form-main">
  <div id="form-div">
  <h1 style="text-align:center;font-family:sans-serif;font-size:30px;color:white">Add BioData !!!</h1>
    <form class="form" id="form1">
      
      <p class="name">
        <textarea name="biodata" type="text"  required autofocus placeholder="BioData" id="biodata" ></textarea>
      </p>
      
	   
     
      <input type="submit" style="margin:96px;text-align:center;font-family:sans-serif;font-size:30px;color:black" name="AddBioData"  value="Add BioData"></input>
    
      
      
      </div>
    </form>
  </div>
  </body>
  
  </html>