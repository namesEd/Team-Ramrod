<?php
session_start();
require 'connect.php';
$userID = $_SESSION['userID'];
  
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION['userID'];
} else {
    header("Location: userLogin.php?error=notallowed");
    exit();
}

$stmt = $conn->prepare("SELECT * from allergies");
$stmt->execute();
$result = $stmt->get_result();

$data = array();
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();

header("Content-Type: application/json");
echo json_encode($data);
?>