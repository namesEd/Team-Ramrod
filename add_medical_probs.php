<?php
session_start();
require 'connect.php';
$userID = $_SESSION['userID'];

if (isset($_POST['probID'])) {
    $probID = $_POST['probID'];

    $stmt = $conn->prepare("INSERT INTO medical_history (userID, medical_problemID) VALUES (?, ?)");
    $stmt->bind_param("ii", $userID, $probID);
    
    if ($stmt->execute()) {
        $rows_affected = $stmt->affected_rows;
        var_dump($rows_affected);
        $response = array('status' => 'success', 'message' => 'Medical problem inserted successfully');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Error inserting medical problem');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'No medical problem submitted');
    echo json_encode($response);
}

$conn->close();
?>
