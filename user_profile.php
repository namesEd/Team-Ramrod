<!DOCTYPE html>
<html lang="en">
<head>

    <title>User Profile</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="App/css/home.css">
    <link rel="stylesheet" href="App/css/header.css">
    <link rel="stylesheet" href="App/css/user_profile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
    
    <script type = "text/javascript" src="App/js/header.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type = "text/javascript" src="App/js/user_profile.js"></script>

</head>
<body>
    <?php require_once "header.php"?>
  
    <div id="profile-header"></div>

    <div class = "Profile">

    <div class="hist">
        <h2>History</h2>
        <ul id="user-hist"></ul>
    </div>

    <div class = "alleg">
        <h2>Allergies</h2>
        <ul id="user-allergies"></ul>
    </div>

    <div class="meds">
        <h2>Medications</h2>
        <ul id="user-meds"></ul>
    </div>
    
    </div>

    <?php require_once "footer.php"?>
</body>
</html>
