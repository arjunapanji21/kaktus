<?php 
 $link = mysqli_connect("localhost", "arjuna", "arjuna", "db_kaktus");

 if (!$link) {
 	echo "Error: Unable to connect to MySQL.";
 	exit;
 }
 else {
	echo "Berhasil";
 }
 
 $humidity = $_POST['humid'];
 $persen = ((float)$humidity / 1024.0) * 100.0;
 echo($humidity);
 mysqli_query($link,"INSERT INTO tbl_kaktus (humidity, persen) VALUES ($humidity, $persen)");
?>


