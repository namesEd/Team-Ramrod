$(document).ready(function() {
	$.ajax({
		url: 'get_user_data.php',
		type: 'GET',
		dataType: 'json',
		success: function(response) {

			$('.email').append('<p class="text-muted mb-0">' + response[0].email + '</p>');
			$('.username').append('<p class="text-muted mb-0">' + response[0].username + '</p>');
			$('.insurance').append('<p class="text-muted mb-0">' + response[0].insurance_name + '</p>');

			var vend = response[0].isVendor;

			if(vend == 'yes'){
				$('.userData').append('<h2>' + 'You are a Vendor ' + '</h2>');
			}
			else {
				$('.userData').append('<h2>' + 'You are not a Vendor ' + '</h2>');
			}



			console.log(response);
			// $.each(response, function(index, a) {
			// 	$('.userData').append('<li  data-allergy-id="' + a.allergyID + '"><button id="myButton">' + a.allergy + '</button></li>');
			// });
		},
	error: function(xhr, status, error) {
    if (xhr.status === 401) {
        window.location.replace("user_login.php?error=notallowed");
    } else {
        alert('Error: ' + error);
    }
}			});
});
