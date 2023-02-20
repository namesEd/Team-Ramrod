<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    <link rel="stylesheet" href="App/css/header.css">
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
                <label><input type="text" name="uname" placeholder="Username/Email"></label>
              </p>
              <p>
                <label><input type="password" name="pword" placeholder="Password"></label>
              </p>
              <button id="log" type="submit" name="submit">Log In</button>
        </form>
    <?php 
        //error messages displayed to user
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p> Fill in all fields to login!</p>";
            } elseif ($_GET["error"] == "incorrectlogin") {
                echo "<p>Username or Password incorrect</p>";
            } elseif ($_GET["error"] == "incorrectlogin") {
                echo "<p>Change later. Password bug</p>";
            }
        }
    ?>
    </div>
</main>
    
</body>
</html>
