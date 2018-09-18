<?php
class tutorType{
	private $conn;
	
	public function __construct($conn){
		$this->conn = $conn;
	}
	
	public function loadType(){
		$sql = "SELECT * FROM TutorType";
		$result = $this->conn->query($sql);
		$json = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){

			$json['TutorTypes'][] = array(
				'tt_id'=>$row['tt_id'],
				'type'=>$row['type']
			);
		}

		echo json_encode($json);

		$this->conn = null;
	}
	
	public function addType($name){
		$sql = "INSERT INTO `TutorType`(`type`) VALUES ('$name')";
		$result = $this->conn->query($sql);
		if($result){
			return true;
		}
		return false;
	}
	
	public function deleteType($tt_id){
		$sql = "DELETE FROM `TutorType` WHERE `tt_id` = $tt_id";
		$result = $this->conn->query($sql);
		if($result){
			return true;
		}
		return false;
	}


}
?>