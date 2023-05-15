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



  if (emptyInputReg($first_name, $last_name, $email, $username, $password, $password_repeat) !== false) {
    header("Location:user_reg.php?error=emptyinput");
    exit();
    }
  
  if(invalidUsername($username) !== false) { 
    header("Location: user_reg.php?error=invalidusername");
    exit();
    }

  if(invalidEmail($email) !== false) { 
    header("Location: user_reg.php?error=invalidemail");
    exit();
    }

  if(invalidPassword($password) !== false) {
    header("Location: user_reg.php?error=invalidpassword");
    exit();
  }

  if(passwordMismatch($password, $password_repeat) !== false) {
    echo "Error: passwords do not match";
    header("Location: user_reg.php?error=passwordmismatch");
    exit();
  }

  if(userExists($conn, $username, $email) !== false) {
    header("Location: user_reg.php?error=userexists");
    exit();
  }

  $sql = "INSERT INTO users (first_name, last_name, email, username, password) VALUES (?, ?, ?, ?, ?);";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: user_reg.php?error==stmtfailed");
    exit();
  }
  $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
  mysqli_stmt_bind_param($stmt, 'sssss', $first_name, $last_name, $email, $username, $hashed_pass);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  header("Location: user_reg.php?error=none");
  exit();

} else {
  header("Location: user_reg.php");
exit();
}
?>