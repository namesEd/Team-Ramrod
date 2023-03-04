$(document).ready(function() {
	// Get the list of medical problems using AJAX
	$.ajax({
		url: 'get_probs.php',
		type: 'GET',
		dataType: 'json',
		success: function(response) {
			$.each(response, function(index, med) {
				$('#med-probs').append('<li><button id="myButton">' + med.medical_problem + '</button></li>');
			});
			
			// Add a click event listener to each list item
			$('#med-probs li').click(function() {
				var selectedID = $(this).data('id');
				
				// Send an AJAX request to insert the selected medical problem into the database
				$.ajax({
					url: 'insert_probs.php',
					type: 'POST',
					dataType: 'json',
					data: {
						'medical_problem': selectedID
					},
					success: function(response) {
						// Update the page with the new medical problem

						//fade animation that displays an h2 tag if a problem
						//is added to the database - G.Z
						$('#med-added').append('<h2 class="added">  added successfully </h2>');

			                setTimeout(function() {
			 
			                	$('.added').fadeOut('fast');

			                }, 1000);


					},
					error: function(xhr, status, error) {
						alert('Error: ' + error);
							console.log(xhr);
							console.log(status);
							console.log(error);
					}
				});
			});
		},
		error: function(xhr, status, error) {
			alert('Error: ' + error);
		}
	});
});