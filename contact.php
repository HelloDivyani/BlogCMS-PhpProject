<?php
$success="";


if(isset($_POST['submitContact']))
{
	
include('signup/connection.php');


$name=mysqli_escape_string($conn,filter_var(strip_tags($_POST['viewerName']),FILTER_SANITIZE_STRIPPED));

$email=mysqli_escape_string($conn,filter_var(strip_tags($_POST['contactEmail']),FILTER_VALIDATE_EMAIL));

$message=mysqli_escape_string($conn,filter_var(strip_tags($_POST['message']),FILTER_SANITIZE_STRIPPED));

$sql="INSERT INTO contact (Name,Email,Message) VALUES('$name','$email','$message')";
	$result=mysqli_query($conn,$sql);

	if($result)
	{
		$success="Thanks For Contacting Us..";
	}
	

}

?>




<link rel="stylesheet" href="contact.css"></link>


<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Quick Contact</h3>
    <h4>Contact us today, and get reply with in 24 hours!</h4>
    <fieldset>
      <input placeholder="Your name" type="text" name='viewerName' tabindex="1" autocomplete="on" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" name='contactEmail' type="email" autofocus autocomplete="on" tabindex="2" required>
    </fieldset>
    
    
    <fieldset>
      <textarea placeholder="Type your Message Here...." tabindex="5" name='message' autofocus required></textarea>
    </fieldset>
    <fieldset>
      <button name="submitContact" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
  <span style="text-align:center;color:black;font-family:sans-serif;font-size:30px" class="text"><?php if(isset($success)) {echo $success;}?></span>
 <a href="index.php" style="font-size:30px;fonr-family:sans-derif;color:black">Home</a>
  
</div>