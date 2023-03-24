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

// Check if button has been clicked
if (!isset($_POST['add'])) {
    header("Location: vendorTest.php");
    exit();
}

$message = "";

$vendor_name = sanitize($_POST['vendor']);
$locID = $_POST['location'];

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO location(location_name, address, city, state, zip,
    location_type, phone_number, start_hour, end_hour) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssisiii", $location_name, $address, $vendor_name);

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