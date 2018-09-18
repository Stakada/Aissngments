<?php
class Session{
	
	private $conn;
	private $id;
	
	public function __construct($id, $conn){
		$this->id = $id;
		$this->conn = $conn;
	}
	
	public function start(){
		$this->changeStatus('START');
		$sql="INSERT INTO `SessionTime`(`timeStart`,`session_id`) VALUES (NOW(), $this->id)";
		$result = $this->conn->query($sql);
	}
	
	public function done(){
		$this->changeStatus('END');
		$sql="UPDATE `SessionTime` SET `timeEnd`=NOW() WHERE `session_id` = $this->id";
		$result = $this->conn->query($sql);
	}
	
	public function hold(){
		$this->changeStatus('HOLD');
		$sql="UPDATE `SessionTime` SET `timeEnd`=NOW() WHERE `session_id` = $this->id";
		$result = $this->conn->query($sql);
	}
	
	public function changeStatus($status){
		$sql="UPDATE `Session` SET `Status`='$status' WHERE `session_id` = $this->id";
		$result = $this->conn->query($sql);
	}
	
	public function getStatus(){
		$sql="SELECT `Status` FROM `Session` WHERE `session_id` = $this->id";
		$result = $this->conn->query($sql);
		
		return $username = $result->fetchColumn(0);
	}
	
}
?>