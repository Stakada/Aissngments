<?php
    include '../model/connection.php';
	
	$db = new DBclass();
	echo $conn = $db->connect();
$conn = null;
?>