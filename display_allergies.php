<!DOCTYPE html>
<html>
<head>
	<title>Allergy List</title>
	

	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<link rel="stylesheet" href="App/css/display_allergies.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	

	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="App/js/display_medical_probs.js"></script>
	<script src="App/js/clicked.js"></script>
	<script src="App/js/display_allergies.js"></script>
	<script type = "text/javascript" src="App/js/display_medications.js"></script>


</head>
<body>
<?php require_once "header.php"?>



	<div class="container">
		<div class="row gx-5 justify-content-center">

			<!-- <div class="contain"> -->
				<div class="col-sm-4">
					<div class="overflow-scroll " id="style-7">

						<ul id="allergy-list"></ul>

						</div>
						<p class=" fw-bolder text-center">Add Allergies</p>
			
				</div>

				<div class="col-sm-4 ">
					

					<div class="overflow-scroll " id="style-7">
						
						<ul id="med-probs"></ul>
						

					</div>
					<p class=" fw-bolder text-center">Add Medical History</p>

				</div>
				<div class="col-sm-4 ">
					<div class="overflow-scroll " id="style-7">

				
						<ul id="med-list"></ul>
								</div>
						<p class=" fw-bolder text-center">Add Current Medications</p>

					<!-- </div> -->
				</div>
				
				
			<!-- </div> -->
		</div>


	</div>

	

	<div id="a-added"></div>
	<div id="med-added"></div>
	<div id="m-added"></div>




	<?php require_once "footer.php"?>
</body>
</html>
