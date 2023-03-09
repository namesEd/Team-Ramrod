<?php
session_start();
require 'connect.php';
$userID = $_SESSION['userID'];

// Check if a medical problem was submitted
if (isset($_POST['medical_problem'])) {
    $medicalProblemID = $_POST['medical_problem'];
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO medical_history (userID, medical_problemID) VALUES (?, ?)");
    $stmt->bind_param("is", $userID, $medicalProblemID);
    
    // Execute the statement
    if ($stmt->execute()) {
        // Return success message
        $response = array('status' => 'success', 'message' => 'Medical problem inserted successfully');
        echo json_encode($response);
    } else {
        // Return error message
        $response = array('status' => 'error', 'message' => 'Error inserting medical problem');
        echo json_encode($response);
    }
} else {
    // Return error message
    $response = array('status' => 'error', 'message' => 'No medical problem submitted');
    echo json_encode($response);
}

$conn->close();
?>
