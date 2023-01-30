<link rel="stylesheet" href="usrReg.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
<link rel="stylesheet" href="Homepage.css">
<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<title>Ramrod register</title>
<?php

require_once("utility.php");
require("usrReg.html")
#include "nav.php";



if (isset($_POST['Register'])) {
    unset($_POST['Register']);
    $db = get_connection();
    $email = htmlspecialchars($_POST['email']);
    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);
    $bday= htmlspecialchars($_POST['dob']);
    $username = htmlspecialchars($_POST['uname']);
    $password = htmlspecialchars($_POST['pword']);
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

