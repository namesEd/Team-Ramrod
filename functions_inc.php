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


function userExists($conn, $username, $email)
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
	mysqli_stmt_bind_param($stmt, "ss", $username, $email);
	mysqli_stmt_execute($stmt);

	// getResult returns the results from the prepared statement
	$getResult = mysqli_stmt_get_result($stmt);

	//if username or email exists in database it will return false, which will be used for register.php
	//if the prepared statement returns true, then the user exists and can be verified for login.php
	if ($data = mysqli_fetch_assoc($getResult)) {
		return $row;
	}
	else {
		$result = false;
		return $result;
	}

	mysqli_stmt_close($stmt);
}





?>