<!DOCTYPE html>
<html>
<head>
	<title>Medications</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
				url: 'get_meds.php',
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					$.each(response, function(index, m) {
						$('#med-list').append('<li data-med-id="' + m.medicationID + '">' + m.medication + '</li>');
					});
				},
		error: function(xhr, status, error) {
		    if (xhr.status === 401) {
		        window.location.replace("userLogin.php?error=notallowed");
		    } else {
		        alert('Error: ' + error);
		    }
		}			});
		});

		$(document).on('click', '#med-list li', function() {
			var medicationID = $(this).data('med-id');
			$.ajax({
				url: 'add_user_medications.php',
				type: 'POST',
				data: { medicationID : medicationID },
					success: function(response) {
						// Update the page with the new medical problem

						//fade animation that displays an h2 tag if a problem
						//is added to the database - G.Z
						$('#m-added').append('<h2 class="added">  added successfully </h2>');

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
	<h1>Medication Selection</h1>
	<ul id="med-list"></ul>
	<div id="m-added"></div>
</body>
</html>
