

/********** BEGINNING OF GOOGLE MAPS API */

// Code for the google maps to be displayed
let map,options, infoWindow;
function initMap(){
  options = {
    center:{lat: 35.368713, lng: -118.99526},
    zoom: 8,
  };
  map = new google.maps.Map(document.getElementById('map'), options);
  
  
  // for user location 
  infoWindow = new google.maps.InfoWindow();
  // Creates a new button to find location of user
  const locationButton = document.createElement("button");
  
  locationButton.textContent = "My Location";
  locationButton.classList.add("control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  
  locationButton.addEventListener("click", () =>{
    //This will try HTML5 geolocation
    if (navigator.geolocation){
      navigator.geolocation.getCurrentPosition(
        //Grabs postion and sets the lat and long 
        (position) => {
          const pos ={
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          //Gets postion and displays it in the center of the screen 
          //with message say it was found 
          infoWindow.setPosition(pos);
          infoWindow.setContent("Your Location was Found");
          infoWindow.open(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true,infoWindow, map.getCenter());
        }
        );
      }
      else{
        // Geolocation is not supported 
        handleLocationError(false, infoWindow, map.getCenter());
      }
    });
  }
  // Function to handle errors 
  function handleLocationError(browserHasGeolocation, infoWindow, pos){
    infoWindow.setPostion(pos);
    infoWindow.setContent(
      browserHasGeolocation
      ? "Error: The Geolaction service failed."
      : "Error: Your browser doesn't support geolocation."
      );
      infoWindow.open(map);
    }
    window.initMap = initMap;
    
    /************** END OF GOOGLE MAPS API****************/