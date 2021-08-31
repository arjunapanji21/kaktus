<?php 
 $link = mysqli_connect("localhost", "arjuna", "arjuna", "db_kaktus");

 if (!$link) {
 	echo "Error: Unable to connect to MySQL.";
 	exit;
 }

 ?>