<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require 'utility.php';
  require 'connect.php';

  $first_name = sanitize($_POST["first_name"]);
  $last_name = sanitize($_POST["last_name"]); 
  $email = sanitize($_POST["email"]);
  $username = sanitize($_POST["username"]);
  $password = sanitize($_POST["password"]);


  //Check if username is in database
  $check_user ="SELECT username FROM users WHERE username = '$username';";
  $result = $conn->query($check_user);
  

  $sql = "INSERT INTO users (first_name, last_name, email, username, password) 
    VALUES ('$first_name', '$last_name', '$email', '$username', '$password')";


  if($result -> num_rows > 0 ) {
    echo 'Error: This username already exists';
    $conn->close();
  } elseif ($conn->query($sql) === TRUE) {  //Insert new user into db
    $_SESSION['message'] = "You have successfully registered, and will be redirected to the login page.";
    header("Location: login.html");
    exit;
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  $conn->close();
}
?>
