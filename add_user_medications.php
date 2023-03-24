<?php
require 'connect.php';
session_start();
$userID = $_SESSION['userID'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['medicationID'])) {
    $medicationID = $_POST['medicationID'];
    $sql = "INSERT INTO user_medications (userID, medicationID) VALUES ('$userID', '$medicationID')";
    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: medicationID not set";
}
mysqli_close($conn);
?>