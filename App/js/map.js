

/********** BEGINNING OF GOOGLE MAPS API */

function createGeocoder(locationName, address, map, markers) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            var lat = results[0].geometry.location.lat();
            var lng = results[0].geometry.location.lng();

            // Define the marker position
            var markerPosition = new google.maps.LatLng(lat, lng);

            // Define a new marker object
            var marker = new google.maps.Marker({
                position: markerPosition,
                map: map,
                title: locationName + ': ' + address
            });

            // Add the marker to the markers array
            markers.push(marker);

            // Define an info window object
            var infowindow = new google.maps.InfoWindow({
                content: '<strong>'+locationName+'<strong><br>'+ address
            });

            // Add a click listener to the marker to show the info window
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });

        } else {
            console.log('Geocode was not successful for the following reason: ' + status);
        }
    });
}

function initMap() {
    // Define the map center and zoom level
    var mapCenter = new google.maps.LatLng(35.368713,-118.99526);
    var mapZoom = 12;

    // Create a new map object
    map = new google.maps.Map(document.getElementById('map'), {
        center: mapCenter,
        zoom: mapZoom
    });

    var markers = [];

    $(document).ready(function() {
        $.ajax({
            url: 'get_locations.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $.each(response, function(index, l) {
                    var locationName = l.location_name;
                    var address = l.address;
                    $('#list-addr').append('<li data-loc-id="' + l.locID + '">' + locationName +': '+ address + '</li>');
                    createGeocoder(locationName, address, map, markers); // Call the createGeocoder function to geocode each address
                });
            },
            error: function(xhr, status, error) {
                if (xhr.status === 401) {
                    window.location.replace("user_login.php?error=notallowed");
                } else {
                    alert('Error: ' + error);
                }
            }
        });
    });

    // Add a click listener to the map to close any open info windows
    google.maps.event.addListener(map, 'click', function() {
        infowindow.close();
    });

    // Add a click listener to each marker to display an info window
    for (var i = 0; i < markers.length; i++) {
        var infowindow = new google.maps.InfoWindow();
        google.maps.event.addListener(markers[i], 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(marker.title);
                infowindow.open(map, marker);
            }
        })(markers[i], i));
    }
}