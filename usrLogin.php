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
        <form action="/login.php" method="get">
            <p>
                <label><input type="text" placeholder="Email"></label>
              </p>
              <p>
                <label><input type="password" placeholder="Password"></label>
              </p>
              <button id="log">Log In</button>
        </form>
    </div>
  

</main>
    
</body>
</html>