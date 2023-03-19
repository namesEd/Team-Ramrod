 $(document).ready(function() {
    $.ajax({
        url: 'get_user_medical_probs.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // var fname = response[0].first_name;
            // var lname = response[0].last_name;

            console.log(response[0].first_name);


            $('#profile-header').append('<h2 class="name">' + response[0].first_name + ' ' + response[0].last_name + '</h2>');

            $.each(response, function(index, hist) {
                $('#user-hist').append('<li>' + hist.medical_problem + '</li>');
            });
        },
        error: function(xhr, status, error) {
            if (xhr.status === 401) {
                window.location.replace("user_login.php?error=notallowed");
            } else {
                alert('Error: ' + error);
                console.log(xhr);
                console.log(status);
                console.log(error);
            }   
        }
    });

    $.ajax({
        url: 'get_user_allergies.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $.each(response, function(index, a) {
                $('#user-allergies').append('<li>' + a.allergy + '</li>');
            });
        },
        error: function(xhr, status, error) {
            if (xhr.status === 401) {
                window.location.replace("userLogin.php/?error=notallowed");
            }else{ 
                alert('Error: ' + error);
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
            }
        }
    });
    $.ajax({
        url: 'get_user_medications.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $.each(response, function(index, meds) {
                $('#user-meds').append('<li>' + meds.medication + '</li>');
            });
        },
        error: function(xhr, status, error) {
            if (xhr.status === 401) {
                window.location.replace("userLogin.php/?error=notallowed");
            }else{ 
                alert('Error: ' + error);
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
            }
        }
    });
});
