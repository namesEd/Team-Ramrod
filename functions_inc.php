<?php
session_start();
require_once 'connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
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
		header("Location: user_reg.php?error=stmtFailed");
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

function isVendor($userID, $conn) {
	$query = "SELECT userID FROM users WHERE isVendor = 'yes' AND userID = ?;";
	$stmt = mysqli_prepare($conn, $query);
	mysqli_stmt_bind_param($stmt, 'i', $userID);
	mysqli_stmt_execute($stmt);
	$getResult = mysqli_stmt_get_result($stmt);
	$result = mysqli_fetch_assoc($getResult);
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	if($result) {
		return true;
	}
	else {
		return false;
	}
}

function loginUser($conn, $username, $password) 
{	
	//check for username or email to login the user 
	$userExists = userExists($conn, $username);

	if ($userExists === false) {
		header("Location: user_login.php?error=incorrectlogin");
		exit();
	}
	$hashedPass = $userExists["password"];
  	$verifyPassword = password_verify($password, $hashedPass);

  	if($verifyPassword === false) {
    	header("Location: user_login.php?error=incorrectlogin");
    	exit(); 
  	} else if($verifyPassword === true) {
	    $_SESSION['userID'] = $userExists["userID"];
	    $_SESSION['username'] = $userExists["username"];

	    $userID = $_SESSION['userID'];
	    $isVendor = isVendor($userID, $conn);
	    if ($isVendor === false) {
	    	$_SESSION['isVendor'] = true;
	    	header("Location: home.php");
	    	exit();
	    } else {
	    	$_SESSION['isVendor'] = false;
	    	header("Location: home.php");
	    	exit();
	    }
	}
}