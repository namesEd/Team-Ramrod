<?php
//Include functions for login and register files

function emptyInputReg($first_name, $last_name, $email, $username, $password, $password_repeat)
{
	$result; 
	if (empty($first_name) || empty($last_name) || empty($username) || empty($password) || empty($password_repeat)) { 
		$result = true; 
	} else {
		$result = false; 
	}
	return $result; 
}

function invalidUsername($username) 
{
	$result;
	if (!preg_match('/^[a-zA-Z0-9_]{3,24}$/', $username)) {
		$result = true; 
	} else {
		$result = false;
	}
	return $result; 	
}

function invalidEmail($email) 
{
	$result;
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$result = true;
	} else {
		$result = false;	
	}
		return $result; 
}

function invalidPassword($password)
{
	$result;
	if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{7,24}$/', $password)) {
		$result = true;
	} else {
		$result = false;
	}
	return $result;
}

function passwordMismatch($password, $password_repeat) 
{ 
	$result;
	if ($password !== $password_repeat) { 
		$result = true;
	} else { 
		$result = false; 
	}
	return $result; 
}

function userExists($conn, $username)
{
	$query = "SELECT * FROM users WHERE username = ? OR email = ?;";
	//initialize prepared statment for db connection
	$stmt = mysqli_stmt_init($conn);
	//check if sql query will fail or not before continuing
	if (!mysqli_stmt_prepare($stmt, $query)) {
		header("Location: usrReg.html?error=stmtFailed");
		exit();
	}

	//bind statement before executing
	mysqli_stmt_bind_param($stmt, "ss", $username, $username);
	mysqli_stmt_execute($stmt);

	//Return the results from the prepared statement
	$getResult = mysqli_stmt_get_result($stmt);

	//if username or email exists in database it will return false, which will be used for register.php
	//if the prepared statement returns true, then the user exists and can be verified for login.php
	$result;
	if ($result = mysqli_fetch_assoc($getResult)) {
		return $result;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}

function emptyLogin($username, $password)
{
	echo("Here2");
	$result; 
	if (empty($username) || empty($password)) { 
		$result = true;
		return $result;
	} else {
		return $result;
		$result = false; 
	} 
	return $result;
}

function loginUser($conn, $username, $password) 
{	
	echo("Here3");
	//check for username or email to login the user 
	$userExists = userExists($conn, $username);

	if ($userExists === false) {
		echo("Here4");
		header("Location: userLogin.php?error=incorrectlogin");
		exit();
	}
	$hashedPass = $userExists["password"];
  	$verifyPassword = password_verify($password, $hashedPass);

  	if($verifyPassword === false) {
    	header("Location: userLogin?error=incorrectlogin2");
    	exit(); 
  	} else if($verifyPassword === true) {
	    session_start();
	    $_SESSION['userid'] = $userExists["userID"];
	    $_SESSION['username'] = $userExists["username"];
	    header("Location: HomePage.html");
	    exit();
	}
}