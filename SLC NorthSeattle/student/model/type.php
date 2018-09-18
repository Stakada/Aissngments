<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include 'connection.php';

	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();

	$sql="SELECT * FROM TutorType";
	$result = $conn->query($sql);
	$json = array();
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		
		$json['TutorTypes'][] = array(
			'tt_id'=>$row['tt_id'],
			'type'=>$row['type']
		);
	}

	echo json_encode($json);

	$conn = null;
?>