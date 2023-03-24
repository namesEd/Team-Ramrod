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
		data: {medicationID : medicationID},
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