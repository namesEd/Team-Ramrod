<?php

require 'connect.php';
session_start();
$userID = $_SESSION['userID'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT a.allergy FROM allergies a JOIN user_allergies ua ON a.allergyID = ua.allergyID WHERE ua.userID = $userID";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}

$allergies = array();
while ($row = mysqli_fetch_assoc($result)) {
    $allergies[] = $row;
}

echo json_encode($allergies);

mysqli_close($conn);

?>
