<?php

require 'connect.php';
session_start();
$userID = $_SESSION['userID'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT u.userID, u.first_name, u.last_name, mp.medical_problem
FROM medical_history mh
INNER JOIN medical_problems mp ON mh.medical_problemID = mp.probID
INNER JOIN users u ON u.userID = mh.userID
WHERE u.userID = $userID ORDER BY u.userID";


$result = mysqli_query($conn, $sql);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}

$problems = array();
while ($row = mysqli_fetch_assoc($result)) {
    $problems[] = $row;
}

echo json_encode($problems);

mysqli_close($conn);

?>
