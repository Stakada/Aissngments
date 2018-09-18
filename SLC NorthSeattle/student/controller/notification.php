<?php
	include '../model/connection.php';

	$db = new DBclass();
	$conn = $db->connect();
	
	$sql = "SELECT `notification` FROM `Notification`";
	$result = $conn->query($sql);
	$json = array();

	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		$json['Notification'][] = array(
			'notif' => $row['notification']
		);
	}

	echo json_encode($json);
	$conn = null;
?>