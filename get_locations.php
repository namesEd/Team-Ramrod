<?php
session_start();
require 'connect.php';

$stmt = $conn->prepare("SELECT l.location_name, l.address, l.city, l.state, l.zip, 
    l.phone_number, l.start_hour, l.end_hour, s.specialty_type FROM 
    location l INNER JOIN specialty s ON l.locID = s.locID; ");

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
