<?php
session_start();
                                                                                                             
require_once "connect.php";
                                                                                                             
function sanitize($data) {
  $data = trim($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
                                                                                                             
  return $data;
}

if ( ! isset($_SESSION['active'])) {
  $_SESSION['active'] = false;
}
?> 