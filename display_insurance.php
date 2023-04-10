<!DOCTYPE html>
<html>
<head>
	<title>Insurance</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<!--script src="App/js/display_insurance.js"></script-->
	<script src="App/js/clicked.js"></script>
	<link rel="stylesheet" href="App/css/display_insurance.css">
</head>
<body>
	<?php
	require_once "header.php";
	if (isset($_SESSION['message'])) {
		echo "<p>" . $_SESSION['message'] . "</p>";
		unset($_SESSION['message']);
	}
	if (isset($_SESSION['error'])) {
		echo "<p>" . $_SESSION['error'] . "</p>";
		unset($_SESSION['error']);
	}
	?>
    <h1>Enter your insurance information:</h1>
    <form id = "insurance_form" action = "add_insurance.php" method = "post">
        <label for="policy_number">Policy Number:</label>
        <input type="text" id="policy_number" name="policy_number"><br><br>
        <label for="insurance_name">Insurance Name:</label>
        <input type="text" id="insurance_name" name="insurance_name"><br><br>
        <input type="submit" value="Submit" name="submit">
    </form>
    <div id = "insurance_added"></div>
	<?php require_once "footer.php"?>
</body>
</html>
