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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    
    <script type = "text/javascript" src="App/js/header.js"></script>
    <script type = "text/javascript" src="App/js/user_profile_class.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type = "text/javascript" src="App/js/user_profile.js"></script>

</head>
<body>
    <?php require_once "header.php"?>
  
    <div id="profile-header"></div>


                <div class="card border-secondary overflow-hidden text-center w-90 h-50">
                    <!-- <div class = "Profile"> -->
                    <div class="card-header text-center"></div>

                    <div class="container">
              


                  

                    <div class="card-body">
                          
                          <div class="row gx-4">

                      
                        <div class="col-sm-4">
                            <h2>History</h2>
                            <div class="overflow-scroll"id="style-7">
                         
                                <ul class="list-group list-group-flush " id="user-hist"></ul>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <h2>Allergies</h2>
             
                            <div class ="overflow-scroll" id="style-7">
                                
                                <ul class="list-group list-group-flush" id="user-allergies"></ul>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <h2>Medications</h2>
                            <div class="overflow-scroll "id="style-7">
                             
                                <ul class="list-group list-group-flush" id="user-meds"></ul>
                            </div>
                        </div>
                    </div>
                </div>
        
        </div>
    </div>
    
    <!-- </div> -->

    <?php require_once "footer.php"?>
</body>
</html>
