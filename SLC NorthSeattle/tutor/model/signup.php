<?php 
    include 'connection.php';
    include 'tutor.php';
    //create database object
    $db = new DBclass();
    $conn = $db->connect();

    if(isset($_POST['username']) && isset($_POST['sid'])){
        $username = $_POST['username'];
        $sid = $_POST['sid'];		
        //create server object
        $tutor = new Tutor($username, $sid, null, $conn);
		signUp($tutor);
    }

	function signUp($tutor){
		if($tutor->checkSid()){
			echo 'exist';
		}else{
			if($tutor->signUp()){
				echo 'true';
			}else{
				echo 'false' ;
			}
		}
	}
	$conn = null;
?>
