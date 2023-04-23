<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Location Insertion</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="App/css/header.css">
    <script type = "text/javascript" src="App/js/header.js"></script>

	<link rel="stylesheet" href="App/css/vendor_reg.css">
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

	<div>
		<form id="vendForm" action="add_address.php" method="post">
			<label for="name">Name of Location:</label>
		  	<input type="text" id="name" name="loc_name">

			<label for="type">Type of Location:</label>
			<select name="loc_type" id="type">
			  	<option value="ER">Emergency Room</option>
			  	<option value="HO">General Hospital</option>
			  	<option value="DR">Doctor's Office</option>
			  	<option value="UC">Urgent Care</option>
				<option value="RX">Pharmacy</option>
				<option value="NA">Other</option>
			</select>
			<br></br>

			<label for="address">Address:</label>
			<input type="text" id="address" name="address" >

			<label for="city">City:</label>
			<input type="text" id="city" name="city" >

			<label for="state">State:</label>
			<select name="state" id="state">
				<option value="AL">Alabama</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District Of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>

			<label for="zip">Zipcode:</label>
			<input type="int" id="zip" name="zip" >


			<label for="phone">Phone Number: format (555-555-5555)</label>
			<input type="tel" id="phone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" >


			<label for="start"> Opening Hour: </label>
			<input type="time" id="start" name="startTime">


			<label for="end"> Closing Hour: </label>
			<input type="time" id="end" name="endTime">

			<br></br>

			<label for="specialty">OPTIONAL: Select a specialty:</label>
			<select id="specialty" name="specialty" multiple>
				<option value="Cardiac">Cardiac Center</option>
				<option value="Stroke">Stroke Center</option>
				<option value="Pediatric">Pediatric Center</option>
				<option value="Orthopedic">Orthopedic</option>
				<option value="Psycho">Mental Health</option>
			</select>

			<input type="submit" value="Create" name="submit">
		</form>
	</div>
</body>
</html>
