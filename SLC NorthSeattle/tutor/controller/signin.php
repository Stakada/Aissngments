<?php  
    include '../model/connection.php';
    //create database object
    $db = new DBclass();
    $conn = $db->connect();
    
    if(isset($_POST['sid'])){
        $sid = $_POST['sid'];
    }
	
	$sql = "SELECT `sid` FROM `Tutor` WHERE `sid` = $sid";
	
	$result = $conn->query($sql);
	
	if($result->rowCount() == 1){
		
		echo true;
		
	}else{
		
		echo 'false';

	}

    $conn = null;
?>