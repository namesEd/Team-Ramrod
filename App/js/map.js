/********** BEGINNING OF GOOGLE MAPS API */
var currentInfoWindow = null;
var markers = [];

function createGeocoder(locationName, address,city, map, markers) {
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
                title: locationName + ': ' + address + city ,
                locationName: locationName,
                address:    address
            });

            // Add the marker to the markers array
            marker.locId = markers.length;
            markers.push(marker);

            // Define an info window object
            var infowindow = new google.maps.InfoWindow({
                content: '<strong>'+locationName+'<strong><br>'+ address + " " + city +
                '<br><br><a href="https://www.google.com/maps/dir/?api=1&destination='  + 
                encodeURIComponent(address) + '" target="_blank">Get Directions</a>'
            });

            // Add a click listener to the marker to show the info window
            marker.addListener('click', function() {
                if (currentInfoWindow){
                    currentInfoWindow.close();
                }
                infowindow.open(map, marker);
                currentInfoWindow = infowindow;
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

    
    //var infoContainer = document.getElementById('info-container');
    $(document).ready(function() {
        $.ajax({
            url: 'get_locations.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                var $list = $('#list-addr');
                $.each(response, function(index, l) {
                    var locationName = l.location_name;
                    var address = l.address;
                    var city = l.city;
                    var $item = $('<li data-loc-id="' + markers.length + '">' + locationName +': '+ address + " " + city + '</li>');
                $item.click(createListItemClosure(locationName, address, city));
                $list.append($item);
                // Call the createGeocoder function to geocode each address
                createGeocoder(locationName, address, city, map, markers); 
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
    infoContainer.innerHTML = '';
});
    
}

// Create a closure to hold location data for each list item
function createListItemClosure(locationName, address, city) {
    return function() {
        var locationMarker = null;
        for (var i = 0; i < markers.length; i++) {
            if (markers[i].title.indexOf(locationName) >= 0 && markers[i].title.indexOf(address) >= 0 && markers[i].title.indexOf(city) >= 0) {
                locationMarker = markers[i];
                break;
            }
        }
        // close current info window if one is opened
        if (locationMarker) {
            if (currentInfoWindow){
                currentInfoWindow.close()
            }
            var infowindow = new google.maps.InfoWindow({
                content: '<strong>'+locationName+'<strong><br>'+ address + city +
                '<br><br><a href="https://www.google.com/maps/dir/?api=1&destination='  + 
                encodeURIComponent(address) + '" target="_blank">Get Directions</a>'
            });
            infowindow.open(map, locationMarker);
            //Set the current info window to the new one
            currentInfoWindow = infowindow;
        }
    };
}