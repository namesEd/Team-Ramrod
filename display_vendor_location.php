<!DOCTYPE html>
<html>
<head>
	<title>Location By Vendor</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
				url: 'get_vendor_location.php',
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					$.each(response, function(index, l) {
						$('#list-addr').append('<li data-loc-id="' + l.locID + '">' + l.address + '</li>');
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
	</script>
</head>
<body>
	<?php require_once "header.php"?>
	<h1>Displays the address from Location as JSON</h1>
	<ul id="list-addr"></ul>
	<?php require_once "footer.php"?>
</body>
</html>
