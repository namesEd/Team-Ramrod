<?php
session_start();
require 'connect.php';

if (!isset($_SESSION["userID"])) {
    header("Location: user_login.php?error=notallowed");
    exit();
}
$userID = $_SESSION['userID'];

$stmt = $conn->prepare("SELECT email, username, isVendor FROM users WHERE userID = ?");
$stmt ->bind_param("i", $userID); 

$stmt->execute();
$result = $stmt->get_result();

$data = array();
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
$stmt ->close();
$conn->close();

header("Content-Type: application/json");
echo json_encode($data);

?>
