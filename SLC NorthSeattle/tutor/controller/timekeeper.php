<?php  
    include '../model/connection.php';
    include '../model/tutor.php';
    //create database object
    $db = new DBclass();
    $conn = $db->connect();
    
    if(isset($_POST['sid']) && isset($_POST['req'])){
		
        $sid = $_POST['sid'];
        $req = $_POST['req'];
		
		if(isset($_POST['username'])){
			$username = $_POST['username'];
		}
		if(isset($_POST['time'])){
			$time = $_POST['time'];
		}
        //create server object
        $tutor = new Tutor($sid, $conn);
		
		switch($req){
			case 'checkSid':
				
				echo $tutor->checkSid();
	
				break;
	
			case 'getUsername':

				echo $tutor->getUsername();
				
				break;
				
			case 'checkSigninHour':
				
				echo $tutor->isSigninHourValid();
				
				break;
			
			case 'signin':
				$tutor->setType($_POST['center']);
				echo $tutor->signIn();
				
				break;
			
			case 'signout':
				
				if(!$tutor->signOut()){
					echo 'false';
				}
				
				echo $tutor->signOut();
				break;
				
			case 'signoutCustomeHour':
				echo $tutor->signoutCustomeHour($time);
				break;
				
			case 'signup':
				echo $tutor->signup($username);				
				break;
				
			default:
				
				break;
		}
	}
?>