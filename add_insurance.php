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

//Ensure that the user accessed this page by the submit button and santize inputs. 
if (isset($_POST['submit'])) {

    $policy_number = sanitize($_POST['policy_number']);
    $insurance_name = sanitize($_POST['insurance_name']);

    //Check if input is empty before continuing
    if (empty($policy_number) || empty($insurance_name)) {
        $_SESSION['error'] = "Please fill out all fields.";
        header("Location: display_insurance.php");
        exit();
    }

    //Prepare the statment to preven SQL injections
    $stmt = $conn->prepare("INSERT INTO insurance(policy_number, insurance_name, userID) VALUES (?,?,?)");
    if(!$stmt) {
        $_SESSION['error'] = "Error preparing statement: " . $conn->error;
        header("location: display_insurance.php");
        exit(); 
    }

    //Bind the parameters from the prepared statment
    if (!$stmt->bind_param("ssi", $policy_number, $insurance_name, $userID)) {
        $_SESSION['error'] = "Error binding parameters: " . $stmt->error;
        header("Location: display_insurance.php");
        exit();
    }

    // Execute statement
    if (!$stmt->execute()) {
        $_SESSION['error'] = "Error executing statement: " . $stmt->error;
        header("Location: display_insurance.php");
        exit();
    }

    // Set success message
    $_SESSION['message'] = "Location inserted successfully.";
    header("Location: home.php");

    // Close statement and connection
    $stmt->close();
    $conn->close();
}else {
    header("Location: display_insurance.php");
    exit();

/*
if (isset($_POST['policy_number']) && isset($_POST['insurance_name'])) {
    $policyNumber = $_POST['policy_number'];
    $insuranceName = $_POST['insurance_name'];
    $sql = "INSERT INTO insurance (userID, policy_number, insurance_name) VALUES ('$userID', '$policy_number', '$insurance_name')";
    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: policy_number or insurance_name not set";
}

*/
?>