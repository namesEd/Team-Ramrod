<?php 
require "functions_inc.php";
require "connect.php";
require "utility.php";

if(isset($_POST["submit"])) {
  $username = sanitize($_POST['uname']);
  $password = sanitize($_POST["pword"]);

  if(emptyLogin($username, $password) === true) {
    header("Location: userLogin.php?error=emptyinput");
    exit();
  }
  loginUser($conn, $username, $password);

} else {
    header("location: userLogin.php");
    exit();
}