<?php
class Subject{
	private $conn;
	
	public function __construct($conn){
		$this->conn = $conn;
	}
	
	public function loadSubjects(){
		$sql = "SELECT * FROM Subjects";
		$result = $this->conn->query($sql);
		$json = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){

			$json['Subjects'][] = array(
				'subject_id' => $row['subject_id'],
				'subject'=>$row['subject'],
				'center'=>$row['center']
			);
		}

		echo json_encode($json);

		$conn = null;
	}
	
	public function loadByCenter($center){
		$sql = "SELECT * FROM Subjects WHERE center ='$center'";
		$result = $this->conn->query($sql);
		$json = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){

			$json['Subjects'][] = array(
				'subject_id' => $row['subject_id'],
				'subject'=>$row['subject'],
				'center'=>$row['center']
			);
		}

		echo json_encode($json);

		$conn = null;
	}
	
	public function addSubject($sub, $center){
		$sql = "INSERT INTO `Subjects`(`subject`, `center`) VALUES ('$sub','$center')";
		$result = $this->conn->query($sql);
		if($result){
			return true;
		}
		return false;
	}
	
	public function deleteSubject($subject_id){
		$sql = "DELETE FROM `Subjects` WHERE `subject_id` = $subject_id";
		$result = $this->conn->query($sql);
		if($result){
			return true;
		}
		return false;
	}


}
?>