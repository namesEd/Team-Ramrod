<link rel="stylesheet" href="App/css/usrReg.css">
<title>Ramrod register</title>
<?php

require_once("utility.php");
require("usrReg.html")
#include "nav.php";



if (isset($_POST['Register'])) {
    unset($_POST['Register']);
    $db = get_connection();
    $email = htmlspecialchars($_POST['email']);
    $fname = htmlspecialchars($_POST['first_name']);
    $lname = htmlspecialchars($_POST['last_name']);
    $bday= htmlspecialchars($_POST['birthday']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    if (strlen($username) == 0 || strlen($password) == 0 || strlen($fname) == 0 || strlen($lname) == 0 || strlen($email) == 0) {
	    $_SESSION["error"] = "Make sure to fill in all the fields!";
	    header("Location: usrReg.html");
    }

        $statement = $db->prepare("CALL RegisterUser(? ,? ,? ,? ,?)");
        $statement->bind_param('sssss', $email, $fname, $lname, password_hash($password, PASSWORD_DEFAULT), $bday, $username);
    
        if ($statement->execute()) {
            mysqli_stmt_bind_result($statement, $res_id, $res_error);
    
            $statement->fetch();
    
            // If user id is null, then something went wrong in registration
            if (is_null($res_id)) {
                $_SESSION["error"] = $res_error;
                header("Location: usrReg.html");
            }
            else {
                echo '<script type="text/javascript">'; 
                echo 'alert("Your account has been set! Please log in!");';
                echo 'window.location.href = "login.php";';
                echo '</script>';
            }
        }
        else {
            echo "Error getting result: " . mysqli_error($db);
            die();
        }
}
?>
<?php if (!isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == false): ?>
    <br/><br/><br/><br/><br/><br/>
<h1 class = "spaced" >Sign Up</h1>
<form action= "signup.php" method="POST" class = "spaced">
    E-Mail: <input type="email" name="email" required />
    <br />
    First Name: <input type="text" name="fname" required autofocus/>
    <br/>
    Last Name: <input type="text" name="lname" required />
    <br />
    Password: <input type="password" name="password" required />
    <br />
    Birthday: <input type="date" name="bday" required />
    <br />
    Username: <input type="text" name="username" required autofocus/>
    <br/>
    <input type="submit" value="Sign Up" name="Register"/>
</form>
<?php else: ?>
<h1>You're already logged in</h1>
<?php endif; ?>
