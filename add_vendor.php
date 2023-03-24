<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'connect.php';
require 'utility.php';

if (isset($_SESSION["userID"])) {
    $userID = $_SESSION['userID'];
} else {
    header("Location: user_login.php?error=notallowed");
}

// Check if the form has been submitted
if (!isset($_POST['submit'])) {
    header("Location: vendor_reg.php");
    exit();
}

$message = "";

$vendor_name = sanitize($_POST['vendor']);
$locID = $_POST['location'];

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO vendors (userID, locID, vendor_name) VALUES (?, ?, ?)");
$stmt->bind_param("iis", $userID, $locID, $vendor_name);

// Set the parameter values and execute the statement
if ($stmt->execute()) {
    // Set success message
    $_SESSION['message'] = "Vendor inserted successfully.";
    header("Location: vendor_reg.php");
} else {
    // Set error message
    $_SESSION['message'] = "Error inserting vendor.";
    header("Location: vendor_reg.php");
}

$conn->close();
?>