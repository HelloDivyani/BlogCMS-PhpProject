<?php

$mytitle="";
$mycategory="";
$mykey="";
session_start();
$success="";
$message="";
$post_id="";
$pid="";
if(isset($_GET['post']))
{
	  
include('signup/connection.php');


$post_id=mysqli_escape_string($conn,filter_var(strip_tags($_GET['post']),FILTER_SANITIZE_STRIPPED));
// Table posts title category body keywords
 
  $query="SELECT * FROM posts WHERE id='$post_id'";
  $result=mysqli_query($conn,$query) or die("Your query is not right");
  $row=mysqli_fetch_array($result);
 
  $mytitle=$row[1];
  $mycategory=$row[2];
  $mykey=$row[6];
  $pid=$row[0];
  $_SESSION['pid']=$pid;
 // echo $pid."HerePId";
  
  // Set these values in input field
}


$category_id="";

if(isset($_REQUEST['writeContent']))
{
	
	
include('signup/connection.php');


$title=mysqli_escape_string($conn,filter_var(strip_tags($_REQUEST['title']),FILTER_SANITIZE_STRIPPED));

$category=mysqli_escape_string($conn,filter_var(strip_tags($_REQUEST['category']),FILTER_SANITIZE_STRIPPED));
$keyword=mysqli_escape_string($conn,filter_var(strip_tags($_REQUEST['keyword']),FILTER_SANITIZE_STRIPPED));

// new values enter
//find Out Whether it is new Category
$findquery="SELECT * FROM categories WHERE text='$category'";
$result=mysqli_query($conn,$findquery) or die("Your query is not right");
$row=mysqli_fetch_array($result);
error_reporting(0);
$count=mysqli_num_rows($result);
if($count==1)
{
	// Category Already Exist
	// Get Category_ID
	$category_id=$row[0];
	//echo "Category Id : $category_id";
}
if($count==0)
{
	//Not exixts
	//Add in Categories Table
	$addquery="INSERT INTO categories (text) VALUES('$category')";
	$result=mysqli_query($conn,$addquery) or die("Your query is not right");
	$row1=mysqli_fetch_array($result);
	//echo "Row : $row1[0]";
      $findquery="SELECT * FROM categories WHERE text='$category'";
$result=mysqli_query($conn,$findquery) or die("Your query is not right");
$row=mysqli_fetch_array($result);
$category_id=$row[0];
	
	

}
$d=date('d/m/y');
$_SESSION['BlogTitle']=$title;
$_SESSION['BlogCategory']=$category_id;
$_SESSION['BlogAuthor']=$_SESSION['username'];
$_SESSION['BlogDate']=$d;
$_SESSION['BlogKey']=$keyword;


$myuser=$_SESSION['username'];


//$insertquery="INSERT INTO posts (category,author) VALUES('$category_id','$myuser')";
//$result=mysqli_query($conn,$insertquery) or die("Your query is not right");

header('Location:editBody.php');	

}






?>

<!DOCTYPE HTML>
<html>

<head>

<title>Edit Blog</title>

<link rel="stylesheet" type="text/css" href="css/writeblog.css"/>
</head>
<body>
<div id="form-main">
  <div id="form-div">
  <h1 style="text-align:center;font-family:sans-serif;font-size:30px;color:white">Edit Blog !!!</h1>
    <form class="form" id="form1">
      
      <p class="name">
        <input name="title" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input"  value="<?php echo $mytitle ?>" required autofocus placeholder="Title" id="name" />
      </p>
      
	    <p class="name">
        <input name="category" value="<?php echo $mycategory ?>" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" required autofocus placeholder="Category" id="category" />
      </p>
	  <p class="name">
        <input name="keyword" value="<?php echo $mykey ?>" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" required autofocus placeholder="Add a Keyword" id="category" />
      </p>
     
      <input type="submit" style="margin:90px;text-align:center;font-family:sans-serif;font-size:30px;color:black" name="writeContent"  value="Edit Blog Content"></input>
    
      
      
      </div>
    </form>
  </div>
  </body>
  
  </html>