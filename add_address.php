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

if (isset($_POST['submit'])) {

    $location_name = sanitize($_POST['loc_name']);
    $type = sanitize($_POST['loc_type']);
    $address = sanitize($_POST['address']);
    $city = sanitize($_POST['city']);
    $state = sanitize($_POST['state']);
    $zip = sanitize($_POST['zip']);
    $phone_number = sanitize($_POST['phone']);
    $start_hour = sanitize($_POST['startTime']);
    $end_hour = sanitize($_POST['endTime']);
    $insurance = sanitize($_POST['insurance']);


    // Validate input fields
    if (empty($location_name) || empty($type)|| empty($address) || empty($city) || empty($state) ||
        empty($zip) || empty($phone_number) || empty($start_hour) || empty($end_hour) 
        || empty($insurance) || empty($specialty_types)){
        $_SESSION['error'] = "Please fill out all fields.";
        header("Location: location_insert.php");
        exit();
    }

    $start_time = date('h:i:s', strtotime($start_hour));
    $end_time = date('h:i:s', strtotime($end_hour));
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO location(location_name, address, city, state, zip, phone_number, start_hour, end_hour, 
        type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("Location: location_insert.php");
        exit();
    }

    // Bind parameters
    if (!$stmt->bind_param("ssssissss", $location_name, $address, $city, $state, $zip, $phone_number, $start_time, $end_time, $type)) {
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

    //prepare and execute the the specialty statment 

    //get the value of the recently added location ID
    $locID = $conn->insert_id;

    foreach($specialty_types as $specialty_type) { 
        $specialty_type = $_POST['specialty'];


        $stmt = $conn->prepare("INSERT INTO specialty(locID, specialty_type) VALUES (?,?)");
        if (!$stmt) {
            $_SESSION['error'] = "Error preparing statement: " . $conn->error;
            header("Location: location_insert.php");
            exit();
        }

        // Bind parameters
        if (!$stmt->bind_param("is", $locID, $specialty_type)) {
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
    }

    //Send data to insurance accepts location



    $conn->close();
} else {
    header("Location: location_insert.php");
    exit();
}
?>
