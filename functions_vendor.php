<?php
session_start();
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
        case 'add_address.php':
            getMeds($conn);
            break;
        case 'display_vendor_location.php':
            addMedications($userID, $conn);
            break;
        // add more cases as needed
        default:
            echo json_encode(array("error" => "invalidfunctionname"));
            break;
    }
}

function addAddress($conn) {

    // Check if button has been clicked
    if (!isset($_POST['add'])) {
        header("Location: vendorTest.php");
        exit();
    }

    $message = "";

    $vendor_name = sanitize($_POST['vendor']);
    $locID = $_POST['location'];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO location(location_name, address, city, state, zip,
        location_type, phone_number, start_hour, end_hour) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssisiii", $location_name, $address, $vendor_name);

    // Set the parameter values and execute the statement
    if ($stmt->execute()) {
        // Set success message
        $_SESSION['message'] = "address inserted successfully.";
        header("Location: vendorTest.php");
    } else {
        // Set error message
        $_SESSION['message'] = "Error inserting address.";
        header("Location: vendorTest.php");
    }

    $conn->close();
}


?>
