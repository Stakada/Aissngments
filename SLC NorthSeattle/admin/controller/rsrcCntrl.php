<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	include '../model/resource.php';

	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();
	$req;
	$start; 
	$end;

	
	if(isset($_POST['req'])){
		$req = $_POST['req'];
	}
	if(isset($_POST['center'])){
		$center = $_POST['center'];
	}
	if(isset($_POST['start']) && isset($_POST['end'])){
		$start = $_POST['start'];
		$end = $_POST['end'];
	}
	$resource = new Resource($conn, $start, $end);
	
	switch($req){
		case 'accum':
			if($center == 'All'){

				echo $resource->getAccumReport();
			
			}else{
				
				$resource->getAccumReportByCenter($center);
			
			}
			
			break;
		default:
			
			echo $resource->getDetailReportByCenter($center);		
			
			break;
	}
	
?>