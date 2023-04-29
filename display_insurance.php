<!DOCTYPE html>
<html>
<head>
	<title>Insurance</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
	<link rel="stylesheet" href="App/css/header.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<script type = "text/javascript" src="App/js/header.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--script src="App/js/display_insurance.js"></script-->
	<script src="App/js/clicked.js"></script>
	<link rel="stylesheet" href="App/css/display_insurance.css">
</head>
<body>

	<?php
	require_once "header.php";
	if (isset($_SESSION['message'])) {
		echo "<p>" . $_SESSION['message'] . "</p>";
		unset($_SESSION['message']);
	}
	if (isset($_SESSION['error'])) {
		echo "<p>" . $_SESSION['error'] . "</p>";
		unset($_SESSION['error']);
	}
	?>

		<div class="container mx-auto">
		<a href="user_profile.php"><button class="btn btn-outline-info btn-lg text-dark"> < Profile </button></a>
		<a href="home.php"><button class="btn btn-outline-info btn-lg text-dark"> Home </button></a>
		</div>



    <h1 class="display-6 mt-5 text-center">Enter your insurance information:</h1>
    	<div class="container mx-auto">
    <form id = "insurance_form" action = "add_insurance.php" method = "post" class="row gy-2 gx-3 align-items-center">
    	<div class="col-auto">
	        <label class="visually-hidden" for="policy_number">Policy Number:</label>
	        <input type="text" id="policy_number" name="policy_number" class="form-control" placeholder="Policy Number"><br><br>
        </div>
        <div class="col-auto">

        <label class="visually-hidden" for="insurance_name">Insurance Name:</label>
		<select id="insurance_name" name="insurance_name" class="form-select">
    	<option value="" disabled selected>Choose insurance</option>
    	<?php
    		require 'connect.php'; 
		    $result = mysqli_query($conn, "SELECT insurance_name FROM insurance");

		    while ($row = mysqli_fetch_assoc($result)) {
		        echo '<option value="' . $row['insurance_list'] . '">' . $row['insurance_list'] . '</option>';
		    }
		    mysqli_close($conn);
		 ?>
		</select>



			<br><br>
		</div>
		<div class="row">
			<div class="col-auto">
        		<input class="btn btn-outline-info text-dark form-submit" type="submit" value="Submit" name="submit">
        	</div>
        </div>
    </form>
    <div id = "insurance_added"></div>
    </div>
    
	<?php require_once "footer.php"?>
</body>
</html>
