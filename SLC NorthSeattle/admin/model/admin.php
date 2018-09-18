<?php
class Admin{
	private $conn;
	
	public function __construct($conn){
		$this->conn = $conn;
	}
	
	private function checkEmail($email){
		$sql="SELECT email FROM Admin WHERE email = '$email'";
		$result = $this->conn->query($sql);
		
		if($result->rowCount() == 0){
			return 'false';
		}else{
			return 'true';
		}
		
	}
	
	public function load(){
		$sql ="SELECT * FROM Admin";
		$json = array();
		$result = $this->conn->query($sql);
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$json['Admins'][] = array(
				'admin_id' => $row['admin_id'],
				'FirstName' => $row['firstName'],
				'LastName' => $row['lastName'],
				'Email' => $row['email'],
				'Password' => $row['password'],
			);
			
		}
		
		echo json_encode($json);
	}
	
	public function add($FirstName, $LastName, $email, $password){
		
		if($this->checkEmail($email) == 'false'){
			$sql ="INSERT INTO `Admin`(`firstName`, `lastName`, `email`, `password`) VALUES ('$FirstName','$LastName','$email','$password')";
		
			$result = $this->conn->query($sql);
			if($result){
            	echo true;
        	}
        	echo false;	
		}else{
			echo 'false';
		}
		
		
		
		
	}
	
	public function delete($admin_id){
		
		$sql = "DELETE FROM `Admin` WHERE `admin_id` = $admin_id";
		
		$result = $this->conn->query($sql);
		if($result){
            return true;
        }
        return false;
	}
	
		
}
?>