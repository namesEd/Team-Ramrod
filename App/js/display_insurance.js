var policy_number =''
var insurance_name = ''
$(document).ready(function() {
	// Get the form element
	var insuranceForm = document.getElementById("insurance_form");

	// Add an event listener to the form's submit button
	insuranceForm.addEventListener("submit", function(event) {
		// Prevent the form from submitting and reloading the page
		event.preventDefault();
		// Get the values of the policy number and insurance name fields
		policy_number = document.getElementById("policy_number").value;
		insurance_name = document.getElementById("insurance_name").value;
		console.log("Policy number: " + policy_number);
		console.log("Insurance name: " + insurance_name);
		$.ajax({
		url: "add_insurance.php",
		method: "POST",
		data: {policy_number: policy_number, insurance_name: insurance_name},
			success: function(response) {
				$('#insurance_added').append('<h2>added successfully</h2>')
			  	setTimeout(function() {
		            $('.added').fadeOut('fast');
		        }, 1000);
			}
		// 		error: function(xhr,status,error) {
		// 			alert('Error: ' + error);
		// 		}
		})  
	});
});
