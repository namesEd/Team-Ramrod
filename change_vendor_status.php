<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'connect.php';

if (!isset($_SESSION["userID"])) {
    header("Location: user_login.php?error=notallowed");
    exit();
}
$userID = $_SESSION['userID'];

if (isset($_POST["submit"])) {

  $stmt = $conn->prepare("UPDATE users SET isVendor = 'yes' WHERE userID = ?");
  $stmt ->bind_param("i", $userID);

  if ($stmt->execute()) {
    $_SESSION['message'] = "You're a Vendor!";
    header("Location: vendor_reg.php");
    exit();
} else {
    $_SESSION['message'] = "Error becoming vendor..";
    header("Location: user_profile.php");
    exit();
  }


} 

?>
