<!DOCTYPE html>
<html>
<head>
	<title>Medications</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
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
		}			});
		});

		$(document).on('click', '#med-list li', function() {
			var medicationID = $(this).data('med-id');
			$.ajax({
				url: 'functions_profile.php',
				type: 'POST',
				data: {medicationID : medicationID,functionName: 'addMedications'},
				dataType: 'json',
					success: function(response) {
						// Update the page with the new medical problem

						//fade animation that displays an h2 tag if a problem
						//is added to the database - G.Z
						$('#m-added').append('<h2 class="added">  added successfully </h2>');

			                setTimeout(function() {
			 
			                	$('.added').fadeOut('fast');
			                	$(this).remove();

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
	<?php require_once "header.php"?>
	<h1>Medication Selection</h1>
	<ul id="med-list"></ul>
	<div id="m-added"></div>
	<?php require_once "footer.php"?>
</body>
</html>
