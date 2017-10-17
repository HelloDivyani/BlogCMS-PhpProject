<?php
session_start();
$_SESSION['loggedIn']='false';
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset(); 
// destroy the session 
session_destroy(); 
header('Location:index.php');
?>

</body>
</html>