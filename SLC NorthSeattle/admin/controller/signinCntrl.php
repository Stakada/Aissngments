<?php
	//set headers to NOT cache a page
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include '../model/connection.php';
	
	$db = new DBclass();
	$conn = $db->connect();

	$email;
	$pass;
	if(isset($_POST['email']) && isset($_POST['pass'])){
		$email = $_POST['email'];
		$pass = $_POST['pass'];
	}
	
	$sql = "SELECT `email`, `password` FROM `Admin` WHERE `email` = '$email' AND `password` = '$pass'";
	
	$result = $conn->query($sql);
	if($result->rowCount() == 1){
		echo true;
	}else{
		echo false;
	}

?>