<?php


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

?>