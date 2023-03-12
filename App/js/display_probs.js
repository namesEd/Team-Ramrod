$(document).ready(function() {
	// Get the list of medical problems using AJAX
	$.ajax({
		url: 'get_probs.php',
		type: 'GET',	
		dataType: 'json',
		success: function(response) {

			console.log(response);
			$.each(response, function(index, med) {
				$('#med-probs').append('<li data-id="' + med.probID + '"><button id="myButton">' + med.medical_problem + '</button></li>');
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
						'probID': selectedID
					},
					success: function(response) {
						// console.log('Selected ID:', selectedID);
						// Update the page with the new medical problem

						//fade animation that displays an h2 tag if a problem
						//is added to the database - G.Z

						console.log(response);
						$('#med-added').append('<h2 class="added">  added successfully </h2>');

			                setTimeout(function() {
			 
			                	$('.added').fadeOut('fast');

			                }, 1000);


					},
					error: function(xhr, status, error) {
			            if (xhr.status === 401) {
                			window.location.replace("userLogin.php?error=notallowed");
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
		        window.location.replace("userLogin.php?error=notallowed");
		    } else {
		        alert('Error: ' + error);
		    }
		}

	});
});