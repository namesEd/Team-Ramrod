<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

require 'connect.php';

if (!isset($_SESSION["userID"])) {
    header('HTTP/1.1 401 Unauthorized');
    echo json_encode(array("error" => "notauthorized"));
    exit();
}


$userID = $_SESSION['userID'];

if(isset($_GET['functionName'])) {
    $functionName = $_GET['functionName'];
    switch ($functionName) {
        case 'getMeds':
            getMeds($conn);
            break;
        case 'addMedications':
            addMedications($userID, $conn);
            break;
        case 'getMedicalProbs':
            getMedicalProbs($conn);
            break;
        // add more cases as needed
        case 'addMedicalProblems':
            addMedicalProblems($conn, $userID);
            break;
        case 'getAllergies':
            getAllergies($conn);
            break;
        case 'addAllergies':
            addAllergies($conn, $userID);
            break;
        default:
            echo json_encode(array("error" => "invalidfunctionname"));
            break;
    }
}

function getMeds($conn)
{
    $stmt = $conn->prepare("SELECT * from medications");
    $stmt->execute();
    $result = $stmt->get_result();
    $data = array();
    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    header("Content-Type: application/json");
    echo json_encode($data);
    $conn->close();
}

function addMedications($userID, $conn)
{
    if (isset($_POST['medicationID'])) {  
        $medicationID = $_POST['medicationID'];
        $sql = "INSERT INTO user_medications (userID, medicationID) 
        VALUES ('$userID', '$medicationID')";
        if (mysqli_query($conn, $sql)) {
            if (mysqli_affected_rows($conn) > 0) {
               $response = array("status" => "success");
                echo json_encode($response);
            } else {
                $error_msg = "Error: " . $sql . "<br>" . mysqli_error($conn);
                $response = array("status" => "error", "message" => $error_msg);
            }
        } else {
            $response = array("status" => "error", "message" => "medicationID not set");

        }
    } else {
        echo "Error: medicationID not set";
        echo json_encode(array("status" => "error"));
    }
    mysqli_close($conn);
}


function getMedicalProbs($conn)
{

    $stmt = $conn->prepare("SELECT * FROM medical_problems");
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    header("Content-Type: application/json");

    echo json_encode($data);
}

function addMedicalProblems($conn, $userID)
{
    if (isset($_POST['probID'])) {
        $probID = $_POST['probID'];

        $stmt = $conn->prepare("INSERT INTO medical_history (userID, medical_problemID) VALUES (?, ?)");
        $stmt->bind_param("ii", $userID, $probID);
        
        if ($stmt->execute()) {
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
}

function getAllergies($conn) 
{
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
}

function addAllergies($conn, $userID) 
{
    if (isset($_POST['allergyID'])) {
        $allergyID = $_POST['allergyID'];
        $sql = "INSERT INTO user_allergies (userID, allergyID) VALUES (?, ?)";
        $stmt = $conn -> prepare("INSERT INTO user_allergies (userID, allergyID) VALUES (?, ?)");
        $stmt -> bind_param("ii", $userID, $allergyID);

        if($stmt->execute()) {
            $response = array('status' => 'success', 'message' => 'Allergy inserted successfully');
            echo json_encode($response);
        } else {
            $respone = array('status' => 'error', 'message' => 'Allergy failed to insert');
            echo json_encode($response);
        } 
    } else {
        $response = array('status' => 'error', 'message' => 'No Allergy Selected');
        echo json_encode($response);
    }
$conn->close();
}

?>
