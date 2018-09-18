<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	
	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();
	
	if(isset($_POST['req'])){
		$req = $_POST['req'];
	}
	$sql;
	
	if($req == 'student'){
	
		$sql = "SELECT COUNT(`student_id`) FROM `Students`";
	
	}else if($req == 'hour'){
	
		$sql = "SELECT SUM(TIMESTAMPDIFF(HOUR, timeStart, timeEnd)) FROM `SessionTime`";
	
	}else{
	
		$sql = "SELECT COUNT(`session_id`) FROM `Session` ";
	
	}
	
	
	$result = $conn->query($sql);
	echo $result->fetchColumn(0);
	$conn = null;
?>