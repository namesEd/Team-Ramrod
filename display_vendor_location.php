<!DOCTYPE html>
<html>
<head>
	<title>Location By Vendor</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script type = "text/javascript" src="App/js/map.js"></script>
	
	
</head>
<body>
	<?php require_once "header.php"?>
	<h1>Displays the address from Location as JSON</h1>
	<ul id="list-addr"></ul>
	<script 
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5exh7JYQlhm_leOXPpi8WkfEjlhwrHe4&callback=initMap&v=weekly">
   </script>
	<?php require_once "footer.php"?>
</body>
</html>