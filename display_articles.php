
<!DOCTYPE html>
<html>
<head>
  <title>Health News</title>
  <link rel="stylesheet" href="App\css\article.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
  <link rel="stylesheet" href="App/css/header.css">
  <script type = "text/javascript" src="App/js/header.js"></script>
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
</head>
<body>
  <header-component></header-component>
  <h1>Health News</h1> 
  <div class="container">
    <div class="dropdown">
      <select class="form-control" id="mySelect">
        <option value="">Search...</option>
<!--         <option value="Anxiety">Anxiety</option>
        <option value="Depression">Depression</option>
        <option value="COPD">COPD</option>
        <option value="Congestive Heart Failure">Congestive Heart Failure</option>
        <option value="High Blood Pressure">High Blood Pressure</option>
        <option value="Diabetes">Diabetes</option>
        <option value="Asthma">Asthma</option>
        <option value="Stroke">Stroke</option>
        <option value="High Cholesterol">High Cholesterol</option>
        <option value="Heart Attack">Heart Attack</option>
 -->
      </select>
    </div>
  </div>
  <div id ="articles"></div>
  <script defer src = "App\js\article.js"></script>
  <?php require_once "footer.php"?>
</body>
</html> 
