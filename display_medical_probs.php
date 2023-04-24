<!DOCTYPE html>
<html>
<head>
	<title>Medical Problems</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="App/js/display_medical_probs.js"></script>
	<script src="App/js/clicked.js"></script>
	<link rel="stylesheet" href="App/css/display_medical_probs.css">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">

</head>
<body>
	<?php require_once "header.php"?>
	<h1>Medical Problems</h1>

	<div class="contain">
		<div class="contain-bkg">
		<ul id="med-probs"></ul>

		</div>
	</div>
	<div id="med-added"></div>
	<?php require_once "footer.php"?>
</body>
</html>
