<?php  
    include 'connection.php';
    include 'request.php';

    //create database object
    $db = new DBclass();
    $conn = $db->connect();
    
    if(isset($_POST['place']) && isset($_POST['num']) && isset($_POST['subject']) && isset($_POST['student_id']) && isset($_POST['center'])){
		
        //Check a center
		$place = $_POST['place'];
		$num = $_POST['num'];
		$subject = $_POST['subject'];
		$student_id = $_POST['student_id'];
		$center = $_POST['center'];
		
		if(isset($_POST['tutor_id'])){
			$tutor_id = $_POST['tutor_id'];
		}
		
		$session = new Session($conn, $num, $place, $subject, $student_id, $center);

		if($center === "Writing"){
			if($session->isSessionValid() == true){
			//if($session->isSessionValid() == true){
				echo $session->sendWrtRequest($tutor_id);	
			}else{
				echo 'false';
			}
			
		}else{
			
			echo $session->sendRequest();
		
		}
		
    }

	
	
	
	

    $conn = null;
?>