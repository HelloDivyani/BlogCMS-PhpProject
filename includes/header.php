<?php

  session_start(); 
 
		include("includes/config.php");
		include("includes/db.php");

		$query="SELECT * FROM categories";
		$categories=$db->query($query);
		$_SESSION['loggedIn']='false';



?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>BlogBook</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

   

    <!-- Custom styles for this template -->
    <link href="css/blog.css" rel="stylesheet">

    
  </head>

  <body>
    
    <div class="blog-masthead">
	  <a href="#" style="float:left;font-family:sans-serif;font-size:30px;margin-left:30px;color:white">BlogBook</a>	
	   <a class="blog-nav-item " style="margin-left:134px;text-align:center;font-size:20px;font-family:sans-serif;color:white" href="index.php">Home</a>
	    <a class="blog-nav-item " style="text-align:center;font-size:20px;font-family:sans-serif;color:white" href="contact.php">Contact Us</a>
		  <?php
		   //session_destroy();
		    if(isset($_SESSION['username']))
			{
			    echo"<a class='blog-nav-item' style='text-align:center;font-size:20px;font-family:sans-serif;color:white' href='Profile.php'>Profile</a>";
			 echo"<a class='blog-nav-item' style='text-align:center;font-size:20px;font-family:sans-serif;color:white' href='logout.php'>Logout</a>";
			
				
			}
			else{
				echo " <a class='blog-nav-item ' style='text-align:center;font-size:20px;font-family:sans-serif;color:white' href='signUpIndex.php'>Sign Up</a>
		   <a class='blog-nav-item ' style='text-align:center;font-size:20px;font-family:sans-serif;color:white' href='loginIndex.php'>Sign In</a>";
			}
		     
		  ?>
		
		 
		<br>
		
      <div class="container">
	  
        <nav class="blog-nav">
	    	  
	
		
		   <?php
		     if($categories->num_rows >0 )
			 {
				 while($row=$categories->fetch_assoc())
				 {
					 if(isset($_GET['category']) && $_GET['category'] == $row['id'])
				     {
						 ?>
						 
					 
					 
				 
			 
		   
		   
          <a class="blog-nav-item active" href="index.php?category=<?php echo $row['id'];?>"><?php echo $row['text'];?></a>
					 <?php }else echo "<a class='blog-nav-item' href='index.php?category=$row[id]'>$row[text]</a>";
					 

			 }}?>
         
        </nav>
      </div>
    </div>

    <div class="container">

      

      <div class="row">