<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RowdyHealth</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Links that are needed for fonts, icons and for header-->
   
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="App/css/home.css">
    <link rel="stylesheet" href="App/css/header.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type = "text/javascript" src="App/js/header.js"></script>
    <script type = "text/javascript" src="App/js/map.js"></script>
    <!-- <script type = "text/javascript" src="App/js/providers.js"></script> -->
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  
  </head>

  <body >
  
    <!--Call for the header icon-->
    <?php require_once "header.php"?>
    <div id="map"></div>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5exh7JYQlhm_leOXPpi8WkfEjlhwrHe4&callback=initMap&v=weekly">
    </script>
    <!-- <script type = "text/javascript" src="App/js/providers.js"></script> -->
    <div id="info-container"></div>
    <div id = "list">
    <ul id="list-addr"></ul>
    </div>
    <?php require_once "footer.php"?>
 
  </body>
</html>
  
