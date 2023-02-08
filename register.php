<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  require 'utility.php';
  require 'connect.php';
#test   

  $first_name = sanitize($_POST["first_name"]);
  $last_name = sanitize($_POST["last_name"]); 
  $email = sanitize($_POST["email"]);
  $username = sanitize($_POST["username"]);
  $password = sanitize($_POST["password"]);
  $password_confirmation = sanitize($_POST["rpword"]);

  //Check if fields are empty
  if (strlen($username) == 0 || strlen($password) == 0 || strlen($repeat_password) == 0 || strlen($first_name) == 0 || strlen($last_name) == 0 || strlen($email) == 0 ) {
    $_SESSION["error"] = "All fields must be filled to register user.";
    echo "All fields are required.";
    header("Location: usrReg.html");
  } elseif ($password != $password_confirmation) {
      echo "Error: passwords do not match";
    } else {
    //Check if username is in database
    $check_user ="SELECT username FROM users WHERE username = '$username';";
    $result_user = $conn->query($check_user);
    //Check if email is in database
    
    if($result_user -> num_rows > 0 ) {
      echo 'Error: This username already exists';
      //$conn->close();
    } else { 
      $sql = "INSERT INTO users (first_name, last_name, email, username, password)
      VALUES ('$first_name', '$last_name', '$email', '$username', '$password')";
      if ($conn->query($sql) === TRUE) {  //Insert new user into db
        $_SESSION['message'] = "You have successfully registered, please login";
        
        //redirect the user to a new page (either login or homepage)
        header("Location: login.html");
        exit;
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
  }
  $conn->close();
}
?>
