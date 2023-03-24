<?php
session_start();
require 'connect.php';

if (!isset($_SESSION["userID"])) {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(array("error" => "notauthorized"));
    exit();
}
$userID = $_SESSION['userID'];

$stmt = $conn->prepare("SELECT address from location l INNER JOIN vendors v 
ON v.locID = l.locID INNER JOIN users u ON v.userID = u.userID WHERE u.userID = ?");
$stmt -> bind_param("i", $userID); 

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
