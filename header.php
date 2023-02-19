<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
  	<?php
	if (isset($_SESSION["userID"])) { 
		echo "<li><a href = 'HomePage.html'>Home Page</a></li>";
		echo "<li><a href = 'logout.php.html'>Log Out</a></li>";
	} else {
		echo "<li><a href = 'userReg.php'>Register</a></li>";
		echo "<li><a href = 'userLogin.php'>Login</a></li>";
	}
	?>
  </body>
</html>
