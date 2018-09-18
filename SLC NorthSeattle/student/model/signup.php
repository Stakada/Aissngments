<?php 
    include 'connection.php';
    include 'student.php';
    //create database object
    $db = new DBclass();
    $conn = $db->connect();

    if(isset($_POST['username']) && isset($_POST['sid'])){
        $username = $_POST['username'];
        $sid = $_POST['sid'];		
        //create server object
        $student = new Student($username, $sid, $conn);
    }
	if($student->checkSid()){
		echo('siddup');
	}else{
		
		if($student->checkStudent()){
			echo('studentdup');
		}else{
			if($student->signUp()){
				echo('true');
			}else{
				echo('false');
			}
		}	
	}
?>
