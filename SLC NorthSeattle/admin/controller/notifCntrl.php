<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	include '../model/notification.php';
	
	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();
	
	$notification = new Notification($conn);
	$req;
	$notif;
	$notif_id;
	if(isset($_POST['req'])){
		$req = $_POST['req'];
	}
	
	if(isset($_POST['notif'])){
		$notif = $_POST['notif'];
	}
	
	if(isset($_POST['notif_id'])){
		$notif_id = $_POST['notif_id'];
	}

	switch($req){
		case 'load':
			echo $notification->loadNotification();
			break;
			
		case 'add':
			echo $notification->addNotification($notif);
			break;
			
		case 'delete':
			echo $notification ->deleteNotification($notif_id);
			break;
			
		default:
			break;
	}
	

?>
