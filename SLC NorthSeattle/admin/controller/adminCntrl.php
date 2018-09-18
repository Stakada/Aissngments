<?php
//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	include '../model/admin.php';

	//connect to the database
    $db = new DBclass();
    $conn = $db->connect();

	$req;
	$admin_id;
	$FirstName;
	$LastName;
	$email;
	$password;

	if(isset($_GET['req'])){
		$req = $_GET['req'];
	}
	if(isset($_GET['admin_id'])){
		$admin_id = $_GET['admin_id'];
	}
	if(isset($_GET['FirstName'])){
		$FirstName= $_GET['FirstName'];
	}
	if(isset($_GET['LastName'])){
		$LastName = $_GET['LastName'];
	}
	if(isset($_GET['email'])){
		$email = $_GET['email'];
	}
	if(isset($_GET['password'])){
		$password = $_GET['password'];
	}
	
	$admin = new Admin($conn);
	switch($req){
		case 'add':
			$admin->add($FirstName, $LastName, $email, $password);
			break;
		case 'delete':
			$admin->delete($admin_id);
			break;
		default:
			$admin->load();
			break;
	}
?>