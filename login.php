<?php 

if(isset($_POST["submit"])) {
  $username = $_POST['uname'];
  $password = $_POST["pword"];

  require "connect.php";
  require "functions_inc.php";
  require 'utility.php';
  
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


}