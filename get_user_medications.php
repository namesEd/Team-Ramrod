<?php

require 'connect.php';
session_start();
$userID = $_SESSION['userID'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT m.medication FROM medications m JOIN user_medications um 
    ON m.medicationID = um.medicationID WHERE um.userID = $userID";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}

$medications = array();
while ($row = mysqli_fetch_assoc($result)) {
    $medications[] = $row;
}

echo json_encode($medications);

mysqli_close($conn);

?>
