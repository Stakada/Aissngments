<?php 
//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	include '../model/tutor.php';
	
	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();
	
	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();
	$req;
	$start;
	$end;
	$center;
	$sid;
	if( isset($_POST['sid']) && isset($_POST['start']) && isset($_POST['end'])){
		$sid = $_POST['sid']; 
		$start = $_POST['start']; 
		$end = $_POST['end'];
	}
	$tutor = new Tutor($conn, $start, $end);

	echo $tutor->loadTutor($sid);
	

?>