<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'connect.php';
require 'utility.php';

if (!isset($_SESSION["userID"])) {
    header("Location: user_login.php?error=notallowed");
    exit();
}
$userID = $_SESSION['userID'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {

    $policy_number = sanitize($_POST['policy_number']);
    $insurance_name = sanitize($_POST['insurance_name']);

    if (empty($policy_number) || empty($insurance_name)) {
        $_SESSION['error'] = "Please fill out all fields.";
        header("Location: display_insurance.php");
        exit();
    }

    $stmt = $conn->prepare("INSERT INTO user_insurance(policy_number, insurance_name, userID) VALUES (?,?,?)");
    if(!$stmt) {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("location: display_insurance.php");
        exit(); 
    }

    if (!$stmt->bind_param("ssi", $policy_number, $insurance_name, $userID)) {
        $_SESSION['error'] = "Error binding parameters: " . $stmt->error;
        header("Location: display_insurance.php");
        exit();
    }

    if (!$stmt->execute()) {
        $_SESSION['error'] = "Error executing statement: " . $stmt->error;
        header("Location: display_insurance.php");
        exit();
    }

    $_SESSION['message'] = "Insurance inserted successfully.";
    header("Location: display_insurance.php");

    $stmt->close();
    $conn->close();
} else {
    header("Location: display_insurance.php");
    exit();
}
?>
