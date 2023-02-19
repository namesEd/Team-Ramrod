<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_POST["submit"])) {
  require 'utility.php';
  require 'connect.php';
  require_once 'functions_inc.php';
#test   

  $first_name = sanitize($_POST["first_name"]);
  $last_name = sanitize($_POST["last_name"]); 
  $email = sanitize($_POST["email"]);
  $username = sanitize($_POST["username"]);
  $password = sanitize($_POST["password"]);
  $password_repeat = sanitize($_POST["rpword"]);



  //Check if fields are empty
  if (emptyInputReg($first_name, $last_name, $email, $username, $password, $password_repeat) !== false) {
    header("Location:userReg.php?error=emptyinput");
    exit();
    }
  
  //check for valid username
  if(invalidUsername($username) !== false) { 
    header("Location: userReg.php?error=invalidusername");
    exit();
    }

  if(invalidEmail($email) !== false) { 
    header("Location: userReg.php?error=invalidemail");
    exit();
    }

  if(invalidPassword($password) !== false) {
    header("Location: userReg.php?error=invalidpassword");
    exit();
  }

  //check if paswords match
  if(passwordMismatch($password, $password_repeat) !== false) {
    echo "Error: passwords do not match";
    header("Location: userReg.php?error=passwordmismatch");
    exit();
  }

  //check is username or email is in the db
  if(userExists($conn, $username, $email) !== false) {
    header("Location: userReg.php?error=userexists");
    exit();
  }

  //else: insert user into database
  $sql = "INSERT INTO users (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: userReg.php?error==stmtfailed");
    exit();
  }
  $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, 'sssss', $first_name, $last_name, $email, $username, $hashed_pass);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: userReg.php?error=none");
  exit();

} else {
  header("Location: userReg.php");
exit();
}
?>