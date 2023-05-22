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


    if (empty($location_name) || empty($type)|| empty($address) || empty($city) || empty($state) ||
        empty($zip) || empty($phone_number) || empty($start_hour) || empty($end_hour)){
        $_SESSION['error'] = "Please fill out all fields.";
        header("Location: location_insert.php");
        exit();
    }

    $start_time = date('h:i:s', strtotime($start_hour));
    $end_time = date('h:i:s', strtotime($end_hour));
    
    $stmt = $conn->prepare("INSERT INTO location(location_name, address, city, state, zip, phone_number, start_hour, end_hour, 
        type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("Location: location_insert.php");
        exit();
    }

    if (!$stmt->bind_param("ssssissss", $location_name, $address, $city, $state, $zip, $phone_number, $start_time, $end_time, $type)) {
        $_SESSION['error'] = "Error binding parameters: " . $stmt->error;
        header("Location: location_insert.php");
        exit();
    }

    if (!$stmt->execute()) {
        $_SESSION['error'] = "Error executing statement: " . $stmt->error;
        header("Location: location_insert.php");
        exit();
    }

    $_SESSION['message'] = "Location inserted successfully.";
    header("Location: vendor_reg.php");

    $stmt->close();

    $locID = $conn->insert_id;

    $specialty_types = isset($_POST['specialty']) ? $_POST['specialty'] : array();


    $stmt_specialty = $conn->prepare("INSERT INTO specialty(locID, specialty_type) VALUES (?,?)");
    if (!$stmt_specialty) {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("Location: location_insert.php");
        exit();
    }

    foreach ($specialty_types as $specialty_type) {
        $specialty_type = sanitize($specialty_type);

        if (!$stmt_specialty->bind_param("is", $locID, $specialty_type)) {
            $_SESSION['error'] = "Error binding parameters: " . $stmt_specialty->error;
            header("Location: location_insert.php");
            exit();
        }

        if (!$stmt_specialty->execute()) {
            $_SESSION['error'] = "Error executing statement: " . $stmt_specialty->error;
            header("Location: location_insert.php");
            exit();
        }
    }

    $stmt_specialty->close();

    $accepted_insurances = isset($_POST['insurance_list']) ? $_POST['insurance_list'] : array();


    $stmt_insurance = $conn->prepare("INSERT INTO location_insurance(locID, insurance_list) VALUES (?,?)");
    if (!$stmt_insurance) {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("Location: location_insert.php");
        exit();
    }

    foreach ($accepted_insurances as $accepted_insurance) {
        $accepted_insurance = sanitize($accepted_insurance);

        if (!$stmt_insurance->bind_param("is", $locID, $accepted_insurance)) {
            $_SESSION['error'] = "Error binding parameters: " . $stmt_insurance->error;
            header("Location: location_insert.php");
            exit();
        }

        if (!$stmt_insurance->execute()) {
            $_SESSION['error'] = "Error executing statement: " . $stmt_insurance->error;
            header("Location: location_insert.php");
            exit();
        }
    }

    $stmt_insurance->close();




    $conn->close();
} else {
    header("Location: location_insert.php");
    exit();
}
?>
