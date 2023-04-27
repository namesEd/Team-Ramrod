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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type = "text/javascript" src="App/js/user_profile.js"></script>
    <script type = "text/javascript" src="App/js/user_data.js"></script>




    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simplebar@6.2.4/dist/simplebar.css"/>
  

</head>
<body>
    <?php require_once "header.php"?>
  
    <div id="profile-header"></div>



   <div class="card border-secondary overflow-hidden text-center w-90 h-70 mt-5">
  <div id="profHead" class="card-header-text-center">
      
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">

            <li class="nav-item" role="presentation">

                <button class="nav-link" id="pills-ham-tab" data-bs-toggle="pill" data-bs-target="#pills-ham" type="button" role="tab" aria-controls="pills-ham" aria-selected="true">H.A.M</button>
                
            </li>


            <li class="nav-item" role="presentation">

                <button class="nav-link" id="pills-general-tab" data-bs-toggle="pill" data-bs-target="#pills-general" type="button" role="tab" aria-controls="pills-general" aria-selected="false">Account Info</button>
                
            </li>
          
      </ul>

  </div>

  <div class="tab-content" id="pills-tabContent">

    <div class="tab-pane fade show active" id="pills-ham" role="tabpanel" aria-labelledby="pills-ham-tab">
          <div class="container">
                <div class="card-body">
                    <div class="class-group">
                      <div class="d-flex">
                        <div class="card border-info flex-grow-1">
                          <div class="card-header">
                            <h2 class="display-6">History</h2>
                          </div>
                          <div class="card-body overflow-scroll text-center" id="style-7">
                            <ul class="list-group list-group-flush" id="user-hist"></ul>
                          </div>
                        </div>
                        <div class="card border-info flex-grow-1">
                          <div class="card-header">
                            <h2 class="display-6">Allergies</h2>
                          </div>
                          <div class="card-body overflow-scroll" id="style-7">
                            <ul class="list-group list-group-flush" id="user-allergies"></ul>
                          </div>
                        </div>
                        <div class="card border-info flex-grow-1">
                          <div class="card-header">
                            <h2 class="display-6">Medications</h2>
                          </div>
                          <div class="card-body overflow-scroll" id="style-7">
                            <ul class="list-group list-group-flush" id="user-meds"></ul>
                          </div>
                        </div>
                      </div>
                    </div>
              </div>
          </div>
    </div>


    <div class="tab-pane fade" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab"> 
      <div class="container">
          <div class="card text-dark border-dark mb-4 w-75 h-100 mt-5 mx-auto">
            <div class="card-header">
              <h3 class="display-6">Profile Details</h3>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Email</p>
                  
                </div>
                <div class="col-sm-9 email">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Username</p>
                  
                </div>
                <div class="col-sm-9 username">
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <p class="mb-0">Insurance</p>
                  
                </div>
                <div class="col-sm-9 insurance">
                </div>
              </div>
            </div>

            <div class="card-footer ">
              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="display_allergies.php" target="_blank"><button class="btn btn-sm btn-outline-info text-dark">Add/Edit Med Prob</button></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="display_insurance.php" target="_blank"><button class="btn btn-sm btn-outline-info text-dark">Add/Edit Insurance</button></a>
                </li>
                <li class="nav-item">
                 <a class="nav-link active" aria-current="page" href="#" target="_blank"><button class="btn btn-sm btn-outline-info text-dark">Become a Vendor!</button></a>
                </li>
              </ul>
            </div>
          </div>
      </div>
    </div>

</div>
</div> 


    <?php require_once "footer.php"?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

 <script src="https://cdn.jsdelivr.net/npm/simplebar@6.2.4/dist/simplebar.min.js"></script>

     <script type = "text/javascript" src="App/js/user_profile_class.js"></script>
</html>
