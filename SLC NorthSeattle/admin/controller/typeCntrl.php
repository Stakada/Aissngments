<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	include '../model/tutorType.php';
	
	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();
	
	$type = new tutorType($conn);
	$req;
	$type_name;
	$tt_id;

	if(isset($_POST['req'])){
		$req = $_POST['req'];
	}

	if(isset($_POST['type_name'])){
		$type_name = $_POST['type_name'];
	}

	if(isset($_POST['tt_id'])){
		$tt_id = $_POST['tt_id'];
	}

	switch($req){
		case 'load':
			echo $type->loadType();
			break;
			
		case 'add':
			echo $type->addType($type_name);
			break;
			
		case 'delete':
			echo $type->deleteType($tt_id);
			break;
			
		default:
			break;
	}
	

?>
