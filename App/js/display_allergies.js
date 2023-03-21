$(document).ready(function() {
	$.ajax({
		url: 'get_allergies.php',
		type: 'GET',
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