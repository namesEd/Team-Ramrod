<?php
  require "header.php";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>RowdyHealth</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Links that are needed for fonts, icons and for header-->
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="App/css/Homepage.css">
    <script type = "text/javascript" src="App/js/Hompage.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

  </head>

  <body>
    <!--Call for the header icon-->
    <header-component></header-component>
    <div id="map"></div>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB5exh7JYQlhm_leOXPpi8WkfEjlhwrHe4&callback=initMap&v=weekly">
    </script>

  </body>
</html>
