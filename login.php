<?php 

if(isset($_POST["submit"])) {
  $username = $_POST['uname'];
  $password = $_POST["pword"];

  require "connect.php";
  require "functions_inc.php";
  require 'utility.php';

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
}