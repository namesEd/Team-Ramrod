<?php
<<<<<<< Updated upstream
session_start();
                                                                                                             
require_once "connect.php";
                                                                                                             
function sanitize($data) {
  $data = trim($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
                                                                                                             
=======

function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

>>>>>>> Stashed changes
  return $data;
}

if ( ! isset($_SESSION['active'])) {
  $_SESSION['active'] = false;
}
?> 