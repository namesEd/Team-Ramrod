<?php 
session_start(); 
require "utilities.php";
require "connect.php"

if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
  unset($_SESSION['message']);
}

if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    header("Location: HomePage.html");
}

if(isset($_POST) && !empty($_POST)) {
<<<<<<< Updated upstream
    if (!empty($_POST['DJ_Name']) && !empty($_POST['password'])) {
        $db = get_connection();
        $stmt = $db->prepare("SELECT * FROM user WHERE DJ_Name = ?");
        $stmt->bind_param("s", $DJ_Name);
        $stmt->execute();
=======
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $conn = get_connection();

>>>>>>> Stashed changes
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        echo $row['name'];
        if ($_POST['password'] == $row['password']) {
          $_SESSION['email'] = $row['email'];
          $_SESSION['active'] = true;
          $_SESSION['logged_in'] = true;
          header("Location:  HomePage.html");
        } else {
          echo "Invalid username or password. Try again.";
          echo $_POST['password'];
        }
      }
    }

?>