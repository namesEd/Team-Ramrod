<?php 

if(isset($_POST["submit"])) {
  $username = $_POST['uname'];
  $password = $_POST["pword"];

  require "connect.php";
  require "functions_inc.php";
  require 'utility.php';
<<<<<<< HEAD

  if(emptyLogin($username, $password) === true) {
      echo("Here");
    header("Location: userLogin.php?error=emptyinput");
    exit();
  }
  echo("Should not reach here");
  loginUser($conn, $username, $password);

} else {
    header("location: userLogin.php");
    exit();
=======
  
  if (emptyInputLogin($username, $password) !== false) {
    header("Location:userLogin.php?error=emptyinput");
    exit();
  }

  loginUser($conn, $username, $password) {
    $userExists = userExists($conn, $username, $username)
  } else {
    header("location: userLogin.php");
    exit();
  }


>>>>>>> c6e4ce058904723bc6a951e36ac5650d213369c5
}