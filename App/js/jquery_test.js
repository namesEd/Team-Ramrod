$(document).ready(function() {
// Get the list of medical problems using AJAX
$.ajax({
	url: 'get_data.php',
	type: 'GET',
	dataType: 'json',
	success: function(response) {
		$.each(response, function(index, med) {
			$('#med-probs').append('<li><button id="myButton">' + med.probID + ' - ' + med.medical_problem + '</button></li>');
		});
		
		// Add a click event listener to each list item
		$('#med-probs li').click(function() {
			var selectedID = $(this).data('id');
			
			// Send an AJAX request to insert the selected medical problem into the database
			$.ajax({
				url: 'insert_data.php',
				type: 'POST',
				dataType: 'json',
				data: {
					'id': selectedID
				},
				success: function(response) {
					// Update the page with the new medical problem
					//alert('Item added!');
					$('#med-probs').append('<li>' + response.medical_problem + '</li>');
					$('.myButton').css('color', 'red');
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