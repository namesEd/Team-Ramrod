window.onload = function() {
  document.getElementById("vendForm").reset();
};


function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  const lat = position.coords.latitude;
  const lng = position.coords.longitude;
  const url = `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`;
  fetch(url)
    .then(response => response.json())
    .then(data => {
      const city = data.address.city || data.address.town || data.address.village;
      const state = data.address.state;
      document.getElementById("city").value = city;
      document.getElementById("state").value = state;
    })
    .catch(error => console.error(error));
}

