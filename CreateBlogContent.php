<?php

$success="";
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
//echo "Something";
if(isset($_REQUEST['SubmitPost']))
{
	//echo"Here";
	
include('signup/connection.php');

$body=mysqli_escape_string($conn,filter_var(strip_tags($_REQUEST['text']),FILTER_SANITIZE_STRIPPED));
$title=$_SESSION['BlogTitle'];
$category_id=$_SESSION['BlogCategory'];
$username=$_SESSION['BlogAuthor'];
$d=$_SESSION['BlogDate'];
$keyword=$_SESSION['BlogKey'];


$insertquery="INSERT INTO posts (title,category,date,body,author,keywords) VALUES('$title','$category_id','$d','$body','$username','$keyword')";
$result=mysqli_query($conn,$insertquery) or die("Your query is not right");

if($result)
{
	$success="Added SuccessFully";
//	echo"$success";

header('Location:index.php');	


}
else
{
	$success="Some Error Occured ";
}
	
}

?>
  
<!DOCTYPE HTML>
<html>

<head>

<title>Add Blog</title>

<link rel="stylesheet" type="text/css" href="css/writeblog.css"/>
</head>
<body>
<div style="float:left" id="form-main">
  
    <form style="float:left" class="form" id="form1">
      
      
  
  <p style="margin:40px" class="text">
       
		<textarea  style="height:560px;width:1430px" name="text" id="comment" placeholder="Write Blog!!!">
		</textarea>
      </p>
          
    
      
      <div class="submit">
        <input type="submit" name='SubmitPost' value="Post to BlogBook" id="button-blue"/>
       
    </form>
  </div>
  </body>
  
  </html>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  