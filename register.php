<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    header("Location:usrReg.html?error=emptyInput");
    exit();
    }
  
  
  if(passwordMismatch($password, $password_repeat) !== false) {
    echo "Error: passwords do not match";
    header("Location: usrReg.html?error=passwordmismatch");
    exit();
  }
  

  //Check if username is in database
  $check_user ="SELECT username FROM users WHERE username = '$username';";
  $result = $conn->query($check_user);
  //Check if email is in database
  
  if($result -> num_rows > 0 ) {
    echo 'Error: This username already exists';
    header("Location: usrReg.html?error=usernametaken");
    exit();
    } else { 
        $sql = "INSERT INTO users (first_name, last_name, email, username, password)
        VALUES ('$first_name', '$last_name', '$email', '$username', '$password')";
        
        if ($conn->query($sql) === TRUE) {  
            //Inserts new user into db
            $_SESSION['message'] = "You have successfully registered, please login";
            //redirect the user to a new page (either login or homepage)
            header("Location: login.html");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}

?>