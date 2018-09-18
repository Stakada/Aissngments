<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	include '../model/subject.php';
	
	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();
	
	$subject = new Subject($conn);
	$req;
	$sub;
	$subject_id;

	if(isset($_POST['req'])){
		$req = $_POST['req'];
	}
	if(isset($_POST['sub'])){
		$sub = $_POST['sub'];
	}
	if(isset($_POST['center'])){
		$center = $_POST['center'];
	}
	if(isset($_POST['subject_id'])){
		$subject_id = $_POST['subject_id'];
	}

	switch($req){
		case 'load':
			if($center == 'All'){
				echo $subject->loadSubjects();	
			}else{
				echo $subject->loadByCenter($center);
			}
			
			break;
			
		case 'loadByCenter':
			echo $subject->loadByCenter($center);
			break;
			
		case 'add':
			echo $subject->addSubject($sub, $center);
			break;
			
		case 'delete':
			echo $subject->deleteSubject($subject_id);
			break;
			
		default:
			break;
	}
	

?>
