 $(document).ready(function() {
    $.ajax({
        url: 'get_hist.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            var fname = response[0].first_name;
            var lname = response[0].last_name;

            $('.profile-header').append('<h2>' + fname + ' ' + lname + '</h2>');

            $.each(response, function(index, hist) {
                $('#user-hist').append('<li>' + hist.medical_problem + '</li>');
            });
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
        }
    });

    $.ajax({
        url: 'get_allergies.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $.each(response, function(index, allerg) {
                $('#user-allerg').append('<li>' + allerg.userID + ' - ' + allerg.medical_problem + '</li>');
            });
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
        }
    });

    $.ajax({
        url: 'get_meds.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            $.each(response, function(index, meds) {
                $('#user-meds').append('<li>' + meds.userID + ' - ' + meds.medical_problem + '</li>');
            });
        },
        error: function(xhr, status, error) {
            alert('Error: ' + error);
        }
    });
});
