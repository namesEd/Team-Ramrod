<?php

require "connect.php";
$userID = $_SESSION['userID'];
// get the selected medical problem from the form submission
if(isset($_POST["submit"])) {

	$problem_id = $_POST['problem'];

	// query the medical_problems table to get the name of the selected problem
	$query = "SELECT problem FROM medical_problems WHERE id = " . $problem_id;
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	$problem_name = $row['problem'];

	// insert the selected problem into the profile table
	$query = "INSERT INTO profile (history, userID) VALUES ('" . $problem_name . "', " . $user_id . ")";
	mysqli_query($conn, $query);

	header("Location: userHealth.php?message=success");
	exit();

} else {
	header("Location: userHealth.php");
	exit();
}