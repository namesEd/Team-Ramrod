<?php
require 'connect.php';
session_start();
$userID = $_SESSION['userID'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

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
mysqli_close($conn);
?>