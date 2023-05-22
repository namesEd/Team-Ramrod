<?php
session_start();
require 'connect.php';
$userID = $_SESSION['userID'];

if (isset($_POST['medicationID'])) {
    $medicationID = $_POST['medicationID'];


    $stmt = $conn->prepare("INSERT INTO user_medications (userID, medicationID) VALUES (?,?)");
    $stmt->bind_param("ii", $userID, $medicationID);
    
    if ($stmt->execute()) {
        $rows_affected = $stmt->affected_rows;
        var_dump($rows_affected);
        $response = array('status' => 'success', 'message' => 'Medication inserted successfully');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Error inserting Medication');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'No Medication submitted');
    echo json_encode($response);
}

$conn->close();
?>
