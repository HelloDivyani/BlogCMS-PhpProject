<?php
$mybody="";
$success="";
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 


$post_id=$_SESSION['pid'];
	  
	  //echo"Post :$post_id";
include('signup/connection.php');

// Based on post_id get the body of post

//$post_id=mysqli_escape_string($conn,filter_var(strip_tags($_GET['post']),FILTER_SANITIZE_STRIPPED));
// Table posts title category body keywords
 
  $query="SELECT * FROM posts WHERE id='$post_id'";
  $result=mysqli_query($conn,$query) or die("Your query is not right");
  $row=mysqli_fetch_array($result);
  
  $mybody=$row[4];
  //echo $mybody;
  
  // Set in input field
  

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
$pid=$_SESSION['pid'];

$insertquery="UPDATE posts SET title = '$title' , category = '$category_id' , body = '$body' , keywords = '$keyword' WHERE id='$pid'";
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

<title>Edit Blog</title>

<link rel="stylesheet" type="text/css" href="css/writeblog.css"/>
</head>
<body>
<div style="float:left" id="form-main">
  
    <form style="float:left" class="form" id="form1">
      
      
  
  <p style="margin:40px" class="text">
       
		<textarea  style="height:560px;width:1430px"  value="" name="text" id="comment" placeholder="Update Blog!!!"><?php echo $mybody ?>
		</textarea>
      </p>
          
    
      
      <div class="submit">
        <input type="submit" name='SubmitPost' value="Update to BlogBook" id="button-blue"/>
       
    </form>
  </div>
  </body>
  
  </html>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  