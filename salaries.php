<?php
	 header("Access-Control-Allow-Origin: *");
	$string = file_get_contents("salaries.json");
	$json_a = json_decode($string, true);
	echo json_encode($json_a);
?>
