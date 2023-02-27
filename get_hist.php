<?php
session_start();
require 'connect.php';

if (!isset($_SESSION["userID"])) {
    http_response_code(401);
    header("Location: userLogin.php?error=notallowed");
    exit();
}

$userID = $_SESSION['userID'];

$stmt = $conn->prepare("SELECT * FROM view_profile WHERE userID = ?");
$stmt->bind_param("i", $userID);
$stmt->execute();

$result = $stmt->get_result();
$rows = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();
$conn->close();

try {
    $pdo = new PDO('mysql:host=localhost;dbname=ramrod', 'ramrod', 'Fiwv0%Xig');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('SELECT * FROM user_history');
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($result);
} catch (PDOException $e) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=UTF-8');
    echo 'Database error: ' . $e->getMessage();
    exit();
}
?>
