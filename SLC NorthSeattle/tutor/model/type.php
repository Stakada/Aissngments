<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include 'connection.php';

	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();
	
	$sql = "SELECT * FROM TutorType";
	$result = $conn->query($sql);
	$json = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		
		$json[] = $row;
			
	}

	foreach($json as $row){
		echo "<option id=".$row['tt_id'].">" . $row['type'] . "</option>";
	}
	$conn = null;



?>