<?php
class Session{
	private $conn;
	private $num;
	private $place;
	private $subject;
	private $student_id;
	private $center;

	public function __construct($conn, $num, $place, $subject, $student_id, $center){
		$this->conn = $conn;
		$this->num = $num;
		$this->place = $place;
		$this->subject = $subject;
		$this->student_id = $student_id;
		$this->center = $center;
	}

	public function sendRequest(){
		$sql = "INSERT INTO `Session`(`Place`, `Number`, `Subject`, `student_id`, `Center`) VALUES ('$this->place',$this->num,'$this->subject',$this->student_id,'$this->center')";
		$result = $this->conn->query($sql);
		if($result){
			return 'true';
		}else{
			return 'false';
		}
		
	}
	
	public function sendNavRequest($tutor_id){
		$sql = "INSERT INTO `Session`(`Subject`,`student_id`, `center`,`tutor_id`) VALUES ('$this->subject', $this->student_id, '$this->center', $tutor_id)";
		$result = $this->conn->query($sql);	
		if($result){
			return 'true';
		}else{
			return 'false';
		}
	}
	public function sendWrtRequest($tutor_id){
		
		$sql = "INSERT INTO `Session`(`Place`, `Number`, `Subject`,`student_id`, `center`,`tutor_id`) VALUES ('$this->place', $this->num, '$this->subject', $this->student_id, '$this->center', $tutor_id)";
		$result = $this->conn->query($sql);	
		if($result){
			return 'true';
		}else{
			return 'false';
		}
	}

	//return false if times of settion with a student_id in writing center is already 2.
	public function isSessionValid(){
		$start = date("Y-m-d", time() - 3600*24) . " 0:00:00";
		$end = date("Y-m-d", time() - 3600*24) . " 23:59:59";

		$sql= "SELECT `student_id` FROM `Session` JOIN SessionTime ON Session.session_id = SessionTime.session_id WHERE center ='Writing' AND `student_id` = $this->student_id AND timeEnd BETWEEN '2018-09-11 00:00:00' AND '2018-09-11 23:59:59'";

		$result = $this->conn->query($sql);
		if($result->rowCount() >= 2){
			return 'false';
		}else{
			return $start;
		}
	}

}
?>