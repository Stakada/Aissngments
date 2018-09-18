<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	include '../model/student.php';
	
	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();
	$req;
	$start;
	$end;
	$center;
	$sid;
	
	if(isset($_POST['req'])){
		$req = $_POST['req'];
	}
	if(isset($_POST['center'])){
		$center= $_POST['center'];
	}

	if(isset($_POST['sid'])){
		$sid = $_POST['sid'];
	}

	if(isset($_POST['start']) && isset($_POST['end'])){
		$start = $_POST['start'];
		$end = $_POST['end'];
	}

	$studentReport = new Student($conn, $start, $end);
	

	switch($req){
		case 'load':
			if($center == 'All'){
				
				echo $studentReport->loadAll();
			}else{
				echo $studentReport->loadByCenter($center);
			}
			break;
		case 'loadStudent':
			echo $studentReport->loadStudent($sid);
			break;
			
	}


?>