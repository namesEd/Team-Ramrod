<!DOCTYPE html>
<html>
<head>
	<title>Allergy List</title>
	

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<link rel="stylesheet" href="App/css/display_allergies.css">
	

	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="App/js/clicked.js"></script>
	<script src="App/js/display_allergies.js"></script>


</head>
<body>
<?php require_once "header.php"?>
	<h1>Allergy List</h1>





	<div class="contain">
		<button  onClick="window.location.href='user_profile.php'" id="profBtn"> View Profile </button>
		<div class="contain-bkg">
			<ul id="allergy-list"></ul>

		</div>
		<div class="btn-group">
			<button  onClick="window.location.href='display_medical_probs.php'" id="hisBtn"> Add History </button>
			<button  onClick="window.location.href='display_medications.php'" id="medBtn"> Add Medications </button>
		</div>
	</div>

	<div id="a-added"></div>




	<?php require_once "footer.php"?>
</body>
</html>
