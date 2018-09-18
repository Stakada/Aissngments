<?php
	include 'connection.php';
    include 'tutor.php';
    //create database object
    $db = new DBclass();
    $conn = $db->connect();
    
    if(isset($_POST['sid'])){
		$sid = $_POST['sid'];
	}

	 $sql="SELECT Username FROM Tutor WHERE sid = $sid";
		$result = $conn->prepare($sql);
		$result->execute();
		if($result->rowCount() == 0){
			echo 'false';
		}
		echo $result->fetchColumn(0);
	?>