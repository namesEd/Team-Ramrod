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

/*
// Check if button has been clicked
if (!isset($_POST['submit'])) {
    header("Location: location_insert.php");
    exit();
} else { 
    */

if (isset($_POST['submit'])) {

    $location_name = sanitize($_POST['loc_name']);
    $address = sanitize($_POST['address']);
    $city = sanitize($_POST['city']);
    $state = sanitize($_POST['state']);
    $zip = sanitize($_POST['zip']);
    $phone_number = sanitize($_POST['phone']);
    $start_hour = sanitize($_POST['startTime']);
    $end_hour = sanitize($_POST['endTime']);


    // Validate input fields
    if (empty($location_name) || empty($address) || empty($city) || empty($state) || empty($zip) || empty($phone_number) || empty($start_hour) || empty($end_hour)) {
        $_SESSION['error'] = "Please fill out all fields.";
        header("Location: location_insert.php");
        exit();
    }

    $_SESSION['message'] = "Here";

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO location(location_name, address, city, state, zip, phone_number, start_hour, end_hour) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("Location: location_insert.php");
        exit();
    }

    // Bind parameters
    if (!$stmt->bind_param("ssssisii", $location_name, $address, $city, $state, $zip, $phone_number, $start_hour, $end_hour)) {
        $_SESSION['error'] = "Error binding parameters: " . $stmt->error;
        header("Location: location_insert.php");
        exit();
    }

    // Execute statement
    if (!$stmt->execute()) {
        $_SESSION['error'] = "Error executing statement: " . $stmt->error;
        header("Location: location_insert.php");
        exit();
    }

    // Set success message
    $_SESSION['message'] = "Location inserted successfully.";
    header("Location: vendor_reg.php");

    // Close statement and connection
    $stmt->close();
    $conn->close();
} else {
    header("Location: location_insert.php");
    exit();
}
?>
