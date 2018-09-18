<?php
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
	include "../model/connection.php";

	$db = new DBclass();
	$conn = $db->connect();
	
	if(isset($_POST['center'])){
		$center = $_POST['center'];
		
		$sql = "SELECT * FROM Tutor INNER JOIN TimeKeeper ON Tutor.tutor_id = TimeKeeper.tutor_id WHERE center = $center AND TimeKeeper.logout IS NULL";
	}

	$result = $conn->query($sql);
	$json = array();
	
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		
		$name = str_replace('@seattlecolleges.edu', '',$row['username']);
		$dotPos = strpos($name,".");
		$FirstName = substr($name, 0, $dotPos);
		$LastName = substr($name, $dotPos+1);
		
		$json['Tutor'][]= array(
			'tutor_id' => $row['tutor_id'],
			'FirstName' => $FirstName,
			'LastName' => $LastName
		);
	
	}
	echo json_encode($json);
	
	$conn = null;


?>