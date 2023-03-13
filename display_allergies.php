<!DOCTYPE html>
<html>
<head>
	<title>My Allergies</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
				url: 'get_allergies.php',
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					$.each(response, function(index, a) {
						$('#allergy-list').append('<li data-allergy-id="' + a.allergyID + '">' + a.allergy + '</li>');
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

		$(document).on('click', '#allergy-list li', function() {
			var allergyID = $(this).data('allergy-id');
			$.ajax({
				url: 'add_user_allergy.php',
				type: 'POST',
				data: { allergyID: allergyID },
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
	<h1>My Allergies</h1>
	<ul id="allergy-list"></ul>
	<div id="a-added"></div>
</body>
</html>