<?php
session_start();
// require 'connect.php';
require 'utility.php';
require 'connect.php';
require_once 'functions_inc.php';
// $userID = $_SESSION['userID'];
  
if (isset($_SESSION["userID"])) {
    $userID = $_SESSION['userID'];
	$_SESSION['isLoggedIn'] = true;
} else {
	$_SESSION['isLoggedIn'] = false;
}
?>

   <header-component loginStatus='<?= $_SESSION['isLoggedIn'] ?>'></header-component>
   <article-component loginStatus='<?= $_SESSION['isLoggedIn'] ?>'></article-component>
