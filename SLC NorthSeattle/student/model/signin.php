<?php  
    include 'connection.php';
    include 'student.php';
    //create database object
    $db = new DBclass();
    $conn = $db->connect();
    
    if(isset($_POST['sid'])){
        $sid = $_POST['sid'];
        //create server object
        $student = new Student('none', $sid, $conn);
    }
	
	$req = $_POST['req'];

	switch($req){
		case 'getUsername':
			echo $student->getUsername();
			
			break;
		case 'signin':
			echo $student->signIn();
			break;
		default:
			break;
	}
	
    $conn = null;
?>