<?php
header('Content-Type: application/json');

require_once('koneksi.php');

// $sqlQuery = "SELECT * FROM tbl_kaktus"; // data keseluruhan
// $sqlQuery = "SELECT * FROM tbl_kaktus WHERE time > now() - interval 24 hour"; // data 1 hari terakhir
$sqlQuery = "SELECT * FROM tbl_kaktus ORDER BY id DESC LIMIT 30"; // data 1 menit terakhir

$result = mysqli_query($link,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($link);

echo json_encode($data);
?>