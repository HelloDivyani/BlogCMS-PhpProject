<?php

include("includes/header.php");
if(isset($_GET['category']))
{
	$category=mysqli_real_escape_string($db,$_GET['category']);
	$query="SELECT * FROM posts WHERE category='$category'";
	
}
else
{
	
$query="SELECT * FROM posts";
}
$posts=$db->query($query);



?>
        <div class="col-sm-8 blog-main">
				<div class="blog-header">
				
			  </div>

          <?php
		  if($posts->num_rows > 0)
		  {
			  while($row = $posts->fetch_assoc())
			  {
				  	  
		  
		  ?>
		  
		  
		  
          <div class="blog-post">
            <h2 class="blog-post-title"><a href="single.php?post=<?php echo $row['id'] ?>"><?php echo $row['title']?></a></h2>
			<p class="blog-post-meta"><?php echo $row['date']." "  ?>by <a href="blogger.php?username=<?php echo $row['author'] ?>"><?php echo " ".$row['author']  ?></a></p>

             <?php  
			    $body = $row['body'];
				//echo substr($body,0,400);
				echo $body;
			 
			 ?>
			 <br>
			<a href="single.php?post=<?php echo $row['id'] ?>" class="btn btn-primary">Read More</a>
		</div><!-- /.blog-post -->

		  <?php
		  }}
		  ?>
		  
		  
          


        </div><!-- /.blog-main -->

		<?php


		include("includes/sidebar.php");
		include("includes/footer.php");

		?>