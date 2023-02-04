<?php

function sanitize($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);

  return $data;
}

if ( ! isset($_SESSION['active'])) {
  $_SESSION['active'] = false;
}
?> 