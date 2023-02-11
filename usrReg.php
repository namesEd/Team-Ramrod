<!doctype html>


<html class="no-js" lang="">
    <head>

		  <link rel="stylesheet" href="App/css/usrReg.css">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel='stylesheet'>
 			<link rel="stylesheet" href="App/css/Homepage.css">
 			<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    	


		  <!-- Jquery CDN -->
		  <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

		  <!-- AJAX CDN -->
		  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		  <script src="usrReg.js"></script>

		  <script type = "text/javascript" src="App/js/Hompage.js"></script>




    </head>
    <body>

	<header-component></header-component>
    
    <h2> Register an Account </h2>
    
  



<div>
  
   
	<form action= "register.php" method="POST" class = "spaced" id="form1">
     
    <div class="flex-parent-element">
    		<div class="flex-child-element magenta">
			 			<p>

				      <label>First name: <input class="rcorners " type="text" name="first_name" id="first_name"/></label>
				    </p>
				</div>
	     
		
				<div class="flex-child-element green">
								<p>							   
							    <label>Last name: <input class="rcorners"  type="text" name="last_name" id="last_name" /></label>
							   </p>
				  </div>
	  </div>

	  <div class="flex-parent-element">

			<div class="flex-child-element magenta">
		    <p>
		      
		      <label>Username: <input class="rcorners "  type="text" name="username" id="username" /></label>
		    </p>
	  	</div>


	  	<div class="flex-child-element green">

	  		
	  		<p>
		   
		      
		      <label>Email:<input class="rcorners "  type="email" name="email" id="email" /></label>
		    </p>
			

		  </div>

		</div>
	 
  <div class="flex-parent-element">

  	<div  class="flex-child-element magenta">
	    <p>
	    
	      <label>Password<input class="rcorners "  type="password" name = "password" /></label>
	    </p>
	 	</div>

	 	<div class="flex-child-element green">
	    <p>
	 			<label>Re-Type Password : <input class="rcorners "  type="password" name="rpword" id="rpword" /></label>
	    </p >
	 
	  </div>

	</div>

	<div class="flex-parent-element">
		
		<!--div class="flex-child-element magenta">
	    <p>
	       <label>DOB(xxxx-xx-xx) : <input class="rcorners "  type="text" name="dob" id="dob" /></label>
	    </p>
	  </div -->
	     
	  <div class="flex-child-element green">
			<p>
	       <button type="submit" name = "submit" class="button button2 btn btn-primary btn-rounded"> Submit </button>
	    </p>
	  </div>

 	</div>
  </form>


	<?php 
  	//error messages displayed to user
  	if (isset($_GET["error"])) {
		if ($_GET["error"] == "emptyinput") {
			echo "<p> Fill in all fields to register!</p>";
		} elseif ($_GET["error"] == "stmtfailed") {
			echo "<p>There was an error!</p>";
		} elseif ($_GET["error"] == "passwordmismatch") {
			echo "<p>Passwords do not match</p>";
		}  elseif ($_GET["error"] == "userexists") {
			echo "<p>This username or email is taken</p>";
		}  elseif ($_GET["error"] == "none") {
			echo "<p>You have registered! Please login.</p>";
			} 
  	}
  ?>

 <div class="c2">
   <img class="img-fluid" src="placeholder.png" alt="Placeholder">
 </div>
 
 </div>

  <h3> Have an Account already login here</h3>
  <button class="btn btn-success btn-rounded button button2" > Login </button> 

    </body>
</html>