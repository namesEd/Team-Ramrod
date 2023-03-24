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
	<?php require_once "header.php"?>

	<div>
		<form id="vendForm" action="/create-user" method="post">
		  <label for="name">Company Name:</label>
		  <input type="text" id="name" name="name" required>


		  <label for="address">Address:</label>
		  <input type="text" id="address" name="address" required>

		  <label for="city">City:</label>
		  <input type="text" id="city" name="city" required>

		  <label for="state">State:</label>
		  <input type="text" id="state" name="state" required>

		  <label for="zip">Zipcode:</label>
		  <input type="text" id="zip" name="zip" required>


		  <label for="phone">Phone Number: format (555-555-5555)</label>
		  <input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>


		  <label for="start"> Opening Hour: </label>
		  <input type="time" id="start" name="start" required>


		  <label for="end"> Closing Hour: </label>
		  <input type="time" id="end" name="end" required>



		  <input type="submit" value="Create">

		</form>
	</div>


</body>
</html>
