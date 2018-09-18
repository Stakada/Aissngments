<?php
class Student{
	private $conn;
	private $start;
	private $end;
	
	public function __construct($conn,$start,$end){
		$this->conn = $conn;
		$this->start = $start;
		$this->end = $end;
	}
	
	public function loadAll(){
		$sql ="SELECT Username, SID, COUNT(timeEnd) as 'Access', SEC_TO_TIME(TIMESTAMPDIFF (SECOND,timeStart,timeEnd)) AS 'Total' FROM `Students` JOIN Session ON Students.student_id = Session.student_id JOIN SessionTime ON Session.session_id = SessionTime.session_id WHERE timeEnd IS NOT NULL AND timeEnd between '$this->start' AND '$this->end' GROUP BY Username";	
		$json = array();
		$result = $this->conn->query($sql);
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$json['Students'][] = array(
				'Username' => $row['Username'],
				'SID'	   => $row['SID'],
				'Access'   => $row['Access'],
				'Total'    => $row['Total']
			); 
		}
		
		echo json_encode($json);
		
		$this->conn = null;
	}
	
	public function loadByCenter($center){
		$sql ="SELECT Username, SID, COUNT(timeEnd) as 'Access', SEC_TO_TIME(TIMESTAMPDIFF(SECOND,timeStart,timeEnd)) AS 'Total' FROM `Students` 
		JOIN Session ON Students.student_id = Session.student_id 
		JOIN SessionTime ON Session.session_id = SessionTime.session_id 
		WHERE timeEnd IS NOT NULL AND Session.center = '$center' AND timeEnd between '$this->start' AND '$this->end' GROUP BY Username";
		$json = array();
		$result = $this->conn->query($sql);
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$json['Students'][] = array(
				'Username' => $row['Username'],
				'SID'	    => $row['SID'],
				'Access'    => $row['Access'],
				'Total'     => $row['Total']
			); 
		}
		
		echo json_encode($json);
		
		$this->conn = null;
	}
	
	public function loadStudent($sid){
		$sql="SELECT (login - INTERVAL 1 HOUR) 'Login', (logout - INTERVAL 1 HOUR) 'Logout', SEC_TO_TIME(TIMESTAMPDIFF(second, login, logout)) as 'Total', center 
		from TimeKeeper 
		JOIN Tutor ON Tutor.tutor_id = TimeKeeper.tutor_id 
		WHERE Tutor.sid = $sid AND login BETWEEN '$this->start' AND '$this->end'";
		$json = array();
		$result = $this->conn->query($sql);
		
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$json['Student'][] = array(
				'Login' =>$row['Login'],
				'Logout' => $row['Logout'],
				'Total' => $row['Total'],
				'Type' => $row['center']
			); 
		}
		
		echo json_encode($json);
		
		$this->conn = null;
	}
}


?>