<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="App/css/Homepage.css">
    <script type = "text/javascript" src="App/js/Hompage.js"></script>
    <title>Login</title>
</head>
<body id="loginbody">

    <header-component></header-component>
<main>
    <div id="form">
        <form action="login.php" method="post">
            <p>
<<<<<<<< HEAD:usrLogin.php
                <label><input type="text" name="uname" placeholder="Username/Email"></label>
========
                <label><input type="text" name = "uname" placeholder="Username/Email"></label>
>>>>>>>> c6e4ce058904723bc6a951e36ac5650d213369c5:userLogin.php
              </p>
              <p>
                <label><input type="password" name="pword" placeholder="Password"></label>
              </p>
<<<<<<<< HEAD:usrLogin.php
              <button id="log" type="submit" name="submit">Log In</button>
        </form>
    <?php 
        //error messages displayed to user
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p> Fill in all fields to login!</p>";
            } elseif ($_GET["error"] == "incorrectlogin1") {
                echo "<p>Change later. Username bug</p>";
            } elseif ($_GET["error"] == "incorrectlogin2") {
                echo "<p>Change later. Password bug</p>";
            }
        }
========
              <button id="log" name="submit">Log In</button>
        </form>
    <?php 
    //error messages displayed to user
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "emptyinput") {
            echo "<p> Fill in all fields to register!</p>";
        } elseif ($_GET["error"] == "incorrectlogin") {
            echo "<p>Wrong login information</p>";
        } 
    }
>>>>>>>> c6e4ce058904723bc6a951e36ac5650d213369c5:userLogin.php
    ?>
    </div>
</main>
    
</body>
</html>
