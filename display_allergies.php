<!DOCTYPE html>
<html>
<head>
	<title>Allergy List</title>
	

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<link rel="stylesheet" href="App/css/display_allergies.css">
	

	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="App/js/display_medical_probs.js"></script>
	<script src="App/js/clicked.js"></script>
	<script src="App/js/display_allergies.js"></script>
	<script type = "text/javascript" src="App/js/display_medications.js"></script>


</head>
<body>
<?php require_once "header.php"?>
	<h1>Allergy List</h1>





	<div class="contain">

		<div class="contain-bkg">
			<ul id="allergy-list"></ul>

		</div>
		<div class="btn-contain">
			<div class="btn-group">
			
			<ul id="med-probs"></ul>

			</div>
		</div>
				<div class="btn-contain">
			<div class="btn-group">
			
				<ul id="med-list"></ul>


			</div>
		</div>
	</div>

	<div id="a-added"></div>
	<div id="med-added"></div>
	<div id="m-added"></div>




	<?php require_once "footer.php"?>
</body>
</html>
