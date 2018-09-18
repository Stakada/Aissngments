<?php
//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	include '../model/request.php';
	
	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();

	$req;
	$student_id;
	$num;
	$place;
	$subject;
	$student_id;
	$center;
	$tutor_id;

	if(isset($_GET['req']) && isset($_GET['student_id']) && isset($_GET['num']) && isset($_GET['place']) && isset($_GET['subject']) && isset($_GET['center']))
	{
		$req = $_GET['req'];
		$student_id = $_GET['student_id'];
		$num = $_GET['num'];
		$place = $_GET['place'];
		$subject = $_GET['subject'];
		$student_id = $_GET['student_id'];
		$center = $_GET['center'];
		
		
	}
	if(isset($_GET['tutor_id'])){
		$tutor_id = $_GET['tutor_id'];
	}
	$session = new Session($conn, $num, $place, $subject, $student_id, $center);

	switch($req){
		case 'session':
			echo $session->sendRequest();
			break;
		case 'pageone':
			echo $session->isSessionValid();
			break;
		default:
			break;
	}

	
?>