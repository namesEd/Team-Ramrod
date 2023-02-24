<?php
  session_start();
  require "connect.php";
  
  if (isset($_SESSION["userID"])) {
    $userID = $_SESSION['userID'];
  } else {
    header("Location: userLogin.php?error=notallowed");
    exit();
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medical History</title>


  
  <link rel="stylesheet" href="App/css/header.css">
  <link rel="stylesheet" href="App/css/userHealth.css"><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>

  <script type = "text/javascript" src="App/js/Hompage.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>


</head>
<body>


  <header-component></header-component>
  <form class="container" action="health.php" method="post">

    
   
        



          <select name="problem">
            <?php
            // query the medical problems table
            $query = "SELECT * FROM medical_problems";
            $result = mysqli_query($conn, $query);
            
            // loop through the results and create an option for each problem
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=\"" . $row['id'] . "\">" . $row['problem'] . "</option>";
            }
            ?>


          </select>

          <input type="submit" name="submit" value="submit">

        

      
      

  
  </form>

      <?php 

       if (isset($_GET["message"])) {
            if ($_GET["message"] == "success") {
              echo <<<HTML
                    <div id="popup-container">
                      <div id="popup-content">
                          <p>Medical History Successfully added!</p>
                          <button class="button" onclick="window.location.href='userHealth.php';"> Add More </button>
                          
                          <br>
                          <p>Done?</p>
                          <button class="button2" onclick="window.location.href='HomePage.php';"> Go Home </button>


                      </div>
                    </div>
                  HTML;
        } 
       }

        $ham = $_POST['ham'];


        for ($x = 0; $x < 3; $x+=1) {
            echo $ham[$x];
            echo "\n";
        } 



       ?>

</body>






</html>