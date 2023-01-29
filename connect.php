<?php

static $connection; 

function get_connection() {
     static $connection;

     if (!isset($connection)) {
         $connection = mysqli_connect('localhost', 'ekyles', 'Fek9xem' ,'ramrod')
         	or die(mysqli_connect_error());
     }

     if ($connection === false) {                                                   
        echo "Unable to connect to database<br/>";
        echo mysqli_connect_error();
     }

	return $connection
} 
?>                