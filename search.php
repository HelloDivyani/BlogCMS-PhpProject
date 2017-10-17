
<?php

$message="";
if(isset($_REQUEST['search']))
{
	$searchq=$_REQUEST['search'];
	
	//echo "R : $searchq";
	$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);
	$q="SELECT * FROM users WHERE UserName LIKE '%{$searchq}%' OR Name LIKE '%{$searchq}%'";
	
	include('signup/connection.php');
	
$result=mysqli_query($conn,$q) or die("Your query is not correct");


$count=mysqli_num_rows($result);
if($count == 0)
{
	$message="Sorry Not Found";
//echo "Here";
	
}




	
}


?>


<!DOCTYPE HTML>
<html>

<head>


<title>BlogBook Search Results</title>

<link rel="stylesheet" type="text/css" href="css/writeblog.css"/>
</head>
<body>
<div id="form-main">
  <div id="form-div">
  <h1 style="text-align:center;font-family:sans-serif;font-size:30px;color:white">Users Search Results</h1>
    <form class="form" id="form1">
	
		<label>Search Users :  </label><br>
      <?php
      
        while($row=mysqli_fetch_array($result))
{
		echo"<p class='name'>";
        echo"<a href='blogger.php?username=$row[4]' style='color:white;font-size:30px'>$row[4]<?a>";
      echo"</p>";
	 
}
	?>
	
	
	    
     
      <a href="index.php" style="margin:90px;text-align:center;font-family:sans-serif;font-size:30px;color:black" name="home"  >Home</a>
    
      
      
      </div>
    </form>
  </div>
  </body>
  
  </html>