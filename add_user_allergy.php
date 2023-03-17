<?php
require 'connect.php';
session_start();
$userID = $_SESSION['userID'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['allergyID'])) {
    $allergyID = $_POST['allergyID'];
    $sql = "INSERT INTO user_allergies (userID, allergyID) VALUES ('$userID', '$allergyID')";
    if (mysqli_query($conn, $sql)) {
        echo "New record added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: allergyID not set";
}
mysqli_close($conn);
?>
