<?php require_once "header.php"?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vendor Creation</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="App/css/header.css">
    <script type = "text/javascript" src="App/js/header.js"></script>

	<script type = "text/javascript" src="App/js/vendor_reg.js"></script>


	<link rel="stylesheet" href="App/css/vendor_reg.css">
</head>
<body>


	<div>
		<form id="vendForm" action="/create-user" method="post">
		  <label for="name">Company Name:</label>
		  <input type="text" id="name" name="name" required>

		  <label for="email">Company Email:</label>
		  <input type="email" id="email" name="email" required>



		  <label for="address">Address:</label>
		  <input type="text" id="address" name="address" required>

		  <label for="city">City:</label>
		  <input type="text" id="city" name="city" required>

		  <label for="state">State:</label>
		  <input type="text" id="state" name="state" required>

		  <button onclick="getLocation()"> autofill location </button>

		  <label for="password">Password:</label>
		  <input type="password" id="password" name="password" required>


		  <label for="confirm-password">Confirm Password:</label>
		  <input type="password" id="confirm-password" name="confirm-password" required>


		  <input type="submit" value="Create">
		</form>
	</div>


</body>
</html>
