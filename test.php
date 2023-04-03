<!DOCTYPE html>
<html>
<head>
	<title>Function Test</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script name="display_medications">
	//Displays the medications in the DB, clicking on a med will add it to the user profile. 
	$(document).ready(function() {
		$.ajax({
			url: 'functions_profile.php',
			type: 'GET',
			data: {functionName: 'getMeds'},
			dataType: 'json',
			success: function(response) {
				$.each(response, function(index, m) {
					$('#med-list').append('<li data-med-id="' + m.medicationID + '">' + m.medication + '</li>');
				});
			},
			error: function(xhr, status, error) {
	    		if (xhr.status === 401) {
	        		window.location.replace("user_login.php?error=notallowed");
	    		} else {
	        		alert('Error: ' + error);
	    		}
			}			
		});
	});

	//changed from add_user_medications.php, changed data to pass the medicationID to the function
	$(document).on('click', '#med-list li', function() {
		var $this = $(this);
	 	var medicationID = $(this).data('med-id');
		$.ajax({
		    url: 'functions_profile.php?functionName=addMedications',
		    type: 'POST',
		    contentType: 'application/x-www-form-urlencoded',
		    data: {medicationID: medicationID},
		    dataType: 'json',
		    success: function(response) {
		        console.log(response);
		  		$("#successMessage").text("New record added successfully!").show();
            	$("#errorMessage").hide(); 
		    },
		    error: function(xhr, status, error) {
		        console.log(error);
		        $("#errorMessage").text("Error adding new record.").show();
        		$("#successMessage").hide();
		    }
		});
	});
	</script>

	<script type="text/javascript" name="display_medical_problems">
	//Displays the medical problems in the DB,
	//clicking on a medical problem will add it to the user profile. 

		$(document).ready(function() {
			$.ajax({
				url: 'functions_profile.php',
				type: 'GET',
				data: {functionName: 'getMedicalProbs'},
				dataType: 'json',
				success: function(response) {
					console.log(response);
					$.each(response, function(index, med) {
						$('#med-probs').append('<li data-id="' + med.probID + '"><button id="myButton">' + 
							med.medical_problem + '</button></li>');
					});
				
					// Add a click event listener to each list item
					$('#med-probs li').click(function() {
						var selectedID = $(this).data('id');	
						// Send an AJAX request to insert the selected medical problem into the database
						$.ajax({
							url: 'functions_profile.php?functionName=addMedicalProblems',
		    				type: 'POST',
		    				contentType: 'application/x-www-form-urlencoded',
		    				data: {'probID': selectedID},
		   					dataType: 'json',
							success: function(response) {
								console.log(response);
								$('#med-added').append('<h2 class="added">  added successfully </h2>');
				                setTimeout(function() {
				                	$('.added').fadeOut('fast');
				                }, 1000);
							},
							error: function(xhr, status, error) {
					            if (xhr.status === 401) {
		                			window.location.replace("user_login.php?error=notallowed");
		            			} else {
									alert('Error: ' + error);
									console.log(xhr);
									console.log(status);
									console.log(error);
								}	
							}
						});
					});
				},
				error: function(xhr, status, error) {
			    	if (xhr.status === 401) {
			        	window.location.replace("user_login.php?error=notallowed");
			    	} else {
			        	alert('Error: ' + error);
			    	}
				}
			});
		});
	</script>

	<script type="text/javascript" name="display_allergies">
	//Displays the allergies in the DB, clicking on an allergy will add it to the user profile. 
		$(document).ready(function() {
			$.ajax({
				url: 'functions_profile.php',
				type: 'GET',
				data: {functionName: 'getAllergies'},
				dataType: 'json',
				success: function(response) {
					$.each(response, function(index, a) {
						$('#allergy-list').append('<li data-allergy-id="' + a.allergyID + '"><button id="myButton">' + a.allergy + '</button></li>');
					});
				},
				error: function(xhr, status, error) {
				    if (xhr.status === 401) {
				        window.location.replace("user_login.php?error=notallowed");
				    } else {
				        alert('Error: ' + error);
				    }
				}			
			});
		});

		$(document).on('click', '#allergy-list li', function() {
			var allergyID = $(this).data('allergy-id');
			$.ajax({

				url: 'functions_profile.php?functionName=addAllergies',
		    	type: 'POST',
		    	contentType: 'application/x-www-form-urlencoded',
		    	data: {'allergyID': allergyID},
		   		dataType: 'json',
				success: function(response) {
					// Update the page with the new medical problem

					//fade animation that displays an h2 tag if a problem
					//is added to the database - G.Z
					$('#a-added').append('<h2 class="added">  added successfully </h2>');

		                setTimeout(function() {
		 
		                	$('.added').fadeOut('fast');

		                }, 1000);
				},
				error: function(xhr, status, error) {
					alert('Error: ' + error);
				}
			});
		});
	</script>

</head>
<body>
	<?php 
		require_once "header.php";

		if (isset($_SESSION['message'])) {
			echo "<p>" . $_SESSION['message'] . "</p>";
			unset($_SESSION['message']);
		}

	?>
	<h1>Testing functions for profile</h1>
	<p> 
		Here I am testing to add all of the ajax calls to make function call instead of individual files. 
	</p>
	<h2>Medication Selection</h1>
	<ul id="med-list"></ul>
	<div id="m-added"></div>
	<div id="successMessage"></div>
	<div id="errorMessage"></div>

	<h2>Medical Problems</h1>
	<div class="contain">
		<div class="contain-bkg">
		<ul id="med-probs"></ul>
		</div>
	</div>
	<div id="med-added"></div>

	<h2>Allergies</h2>

		<div class="contain-bkg">
			<ul id="allergy-list"></ul>
		</div>

	<div id="a-added"></div>
	<div id="med-added"></div>
	<div id="m-added"></div>

	<?php require_once "footer.php"?>
</body>
</html>
