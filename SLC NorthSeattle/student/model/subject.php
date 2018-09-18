<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include 'connection.php';

	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();

	if(isset($_GET['center'])){
		
		$center = $_GET['center'];
		
	}

	$sql = "SELECT *  FROM `Subjects` WHERE `center` ='$center'";

	$result = $conn->query($sql);

	$json = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		
		$json['Subjects'][] = array(		
			'subject' => $row['subject'],
			'center' =>  $row['center']
		);	
	}
	echo json_encode($json);
	
	$conn = null;
?>