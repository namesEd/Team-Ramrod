<?php
session_start();
require 'connect.php';
require 'utility.php';

if (isset($_SESSION["userID"])) {
    $userID = $_SESSION['userID'];
} else {
    header("Location: user_login.php?error=notallowed");
}

$message = "";

if (isset($_POST['submit'])) {
    $vendor_name = sanitize($_POST['vendor']);
    $locID = $_POST['location'];
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO vendor (userID, locID, vendor_name) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $userID, $locID, $vendor_name);
    
    // Set the parameter values and execute the statement
    if ($stmt->execute()) {
        // Set success message
        $message = "Vendor inserted successfully.";
    } else {
        // Set error message
        $message = "Error inserting vendor.";
    }
}

$conn->close();
?>