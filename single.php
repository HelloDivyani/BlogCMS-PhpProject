<?php

if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
error_reporting(0);
$_SESSION['T']='true';
$pid="";
$id="";
include("includes/header.php");
if(isset($_GET['post']))
{
	$id=mysqli_real_escape_string($db,$_GET['post']);
	$query="SELECT * FROM posts WHERE id='$id'";
	
}


$posts=$db->query($query);
$likes="";
$comments="";


	
if(isset($_REQUEST['like']))
{
	//echo"click";
	if(isset($_SESSION['T']))
	{
		// update likes
		//echo $likes."Like";
		$query1="UPDATE posts SET Likes=Likes+1";
		
		$posts1=$db->query($query1);
	//	echo"Yes";
		session_unset('T');
	}
	//disable button
}


if(isset($_POST['PostComment']))
{
	// GET cOMMENT Message,email,name ,post_id and insert it in database
    	
    
//include('signup/connection.php');
//echo "Here";
$CommentName=$_REQUEST['cname'];
$CommentEmail=$_REQUEST['cemail'];
$message=$_REQUEST['comments'];
$sql="INSERT INTO mycomments (post_id,Name,Email,Message) VALUES('$id','$CommentName','$CommentEmail','$message')";
	$posts2=$db->query($sql);

	
	
	
}
//echo $id;
$cq="SELECT * FROM mycomments WHERE post_id='$id'";
$posts3=$db->query($cq);

	



?>
        
		<div class="col-sm-8 blog-main">
				<div class="blog-header">
				
			  </div>
			  

			  
			   <?php
		  if($posts->num_rows > 0)
		  {
			  while($row = $posts->fetch_assoc())
			  {
				  //echo "Here";	  
		  
		  ?>
			  
			  
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']?></h2>
			<p class="blog-post-meta"><?php echo $row['date']." " ?>by <a href="blogger.php?username=<?php echo $row['author'] ?>"><?php echo " ".$row['author']  ?></a></p>

             <?php  
			    $body = $row['body'];
				//echo substr($body,0,400);
				echo $body;
				$likes=$row['Likes'];
				$pid=$row['id'];
				//echo "$pid pid";
			 
			 ?>
			 <br>
			<a href="#" class="btn btn-primary">Read More</a>
		</div><!-- /.blog-post -->

		
			  
						  <?php
		                  }}
		                  ?>
		  
		  
          

			  
			
			<h4>Likes : <?php echo $likes ?></h4> 
            <form method="post">
			<input type="submit" name='like' style="font-family:sans-serif" value="Like Post"></input>  <br>
          </form>
          <br>
		  <h3>Add Comment</h3>
		  <br>
		  
		  <div class="comment-area">
		  
							  
				<form method="post" action="">
				 <div class="form-group">
					<label for="exampleInputEmail1">Name</label>
					<input type="text" class="form-control" name='cname' id="name" required autofocus autocomplete="on" placeholder="Please Enter Name">
				  </div>
				  <div class="form-group">
					<label for="exampleInputEmail1">Email</label>
					<input type="email" name='cemail' class="form-control" id="exampleInputWebsite" required autofocus autocomplete="on" placeholder="Please Enter Email">
				  </div>
				  <div class="form-group">
					<label for="exampleInputPassword1">Comment</label>
					<textarea cols="60" required autofocus autocomplete="on" rows="10" name="comments" class="form-control"></textarea>
					</div>
				 
				 
				  <input name="PostComment" type="submit"  class="btn btn-primary" value="Post Comment"></input>
				</form>
				
				
				<br>
				<br>
				<hr>
				 <?php
					  if($posts3->num_rows > 0)
					  {
						  while($row3 = $posts3->fetch_assoc())
						  {
								//  echo"Here";					  
					  ?>
							<div style="margin:15px" class="comment">
						<div class="comment-head">
						<a href="#"><?php echo $row3['Name']?></a>
						
						
						</div>
					     <?php echo $row3['Message']?>
				</div>
			  <?php
		  }}
		  ?>
			  <div style="margin:15px" class="comment">
						<div class="comment-head">
						<a href="#">Andy</a><button style="margin-left:15px" class="btn btn-info btn-xs"> Admin</button>
						
						
						</div>
						This comment is by Admin Andy.
				</div>
			  
			  
			  
		  
		  </div>
		  

		  
		  
		  
         


        </div><!-- /.blog-main -->

		<?php


		include("includes/sidebar.php");
		include("includes/footer.php");

		?>