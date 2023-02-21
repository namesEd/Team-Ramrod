<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medical History</title>


  
  <link rel="stylesheet" href="App/css/header.css">
  <link rel="stylesheet" href="App/css/userHealth.css">

  <script type = "text/javascript" src="App/js/Hompage.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


</head>
<body>


  <header-component></header-component>
  <form action="userHealth.php" method="post">

      
      <div class="container" >
        <div class = "item">
          <input type="checkbox" id="type1" name="ham[]" value="type1">
          <label for="type1">Diabetes: Type 1</label><br>
      


        <input type="checkbox" id="type2" name="ham[]" value="type2">
        <label for="type2">Diabetes: Type 2</label><br>
        
        <input type="checkbox" id="cancer" name="ham[]" value="cancer">
        <label for="cancer">Cancer</label><br>


        <input type="submit">

        </div>
      
      </div>

  </form>

</body>


<?php 
  $ham = $_POST['ham'];


  for ($x = 0; $x < 3; $x+=1) {
      echo $ham[$x];
      echo "\n";
  } 


 ?>


</html>