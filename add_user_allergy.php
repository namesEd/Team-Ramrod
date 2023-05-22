<?php
session_start();
require 'connect.php';
$userID = $_SESSION['userID'];

if (isset($_POST['allergyID'])) {
    $allergyID = $_POST['allergyID'];

    $stmt = $conn->prepare("INSERT INTO user_allergies (userID, allergyID) VALUES (?,?)");
    $stmt->bind_param("ii", $userID, $allergyID);
    
    if ($stmt->execute()) {
        $rows_affected = $stmt->affected_rows;
        var_dump($rows_affected);
        $response = array('status' => 'success', 'message' => 'Allergy inserted successfully');
        echo json_encode($response);
    } else {
        $response = array('status' => 'error', 'message' => 'Error inserting Allergy');
        echo json_encode($response);
    }
} else {
    $response = array('status' => 'error', 'message' => 'No Allergy submitted');
    echo json_encode($response);
}

$conn->close();
?>
