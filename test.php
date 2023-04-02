<!DOCTYPE html>
<html>
<head>
	<title>Medications</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>
	//changed url from get_meds.php, data added 
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
</head>
<body>
	<?php 
		require_once "header.php";

		if (isset($_SESSION['message'])) {
			echo "<p>" . $_SESSION['message'] . "</p>";
			unset($_SESSION['message']);
		}

	?>
	<h1>Medication Selection</h1>
	<ul id="med-list"></ul>
	<div id="m-added"></div>
	<div id="successMessage"></div>
	<div id="errorMessage"></div>
	<?php require_once "footer.php"?>
</body>
</html>
