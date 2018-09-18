<?php
include 'connection.php';
include 'session.php';

//create database object
$db = new DBclass();
$conn = $db->connect();
if(isset($_POST['id']) && isset($_POST['request'])){
    $id = $_POST['id'];		
    $request = $_POST['request'];
    $session = new Session($id,$conn);
	
	switch($request){
			
		case 'START':
			$currStatus = $session->getStatus();
				
			if($currStatus == 'HOLD'){
				
				$session->start();	
			
			}
			
			break;
			
		case 'END':
			
			$currStatus = $session->getStatus();
			
			if($currStatus == "START"){
				
				$session->done();
				
			}else if($currStatus == "HOLD"){
				
				$session->changeStatus("END");
			
			}
			break;
			
		case 'HOLD':
			
			$currStatus = $session->getStatus();
			
			if($currStatus == "START"){
				
				$session->hold();
			}
			break;
			
		default:
			echo 'Req does not match any case';
			break;	
	}
}else{
    echo "fail";
}


?>