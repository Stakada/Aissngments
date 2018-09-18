<?php
class Tutor{
	private $conn;
	private $start;
	private $end;
	
	public function __construct($conn,$start,$end){
		$this->conn = $conn;
		$this->start = $start;
		$this->end = $end;
	}
	
	/*public function loadAll(){
		$sql="SELECT username, sid, TIMESTAMPDIFF(SECOND, login, logout) AS 'Total' FROM Tutor JOIN TimeKeeper ON Tutor.tutor_id = TimeKeeper.tutor_id 
		WHERE TimeKeeper.login BETWEEN $this->start AND $this->end
		GROUP BY username";	
		
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
		
		$conn = null;
	}
	
	public function loadByCenter($center){
		$sql="SELECT username, sid, TIMESTAMPDIFF(SECOND, login, logout) AS 'Total' center AS 'Resource'
		FROM Tutor JOIN TimeKeeper ON Tutor.tutor_id = TimeKeeper.tutor_id
		FROM 
		WHERE center_id = $center AND TimeKeeper.login BETWEEN $this->start AND $this->end
		GROUP BY username";
		
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
		
		$conn = null;
	}*/
	
	public function loadTutor($sid){
		$sql="SELECT login, logout, SEC_TO_TIME(TIMESTAMPDIFF(second, login, logout)) 'total', `center` from TimeKeeper JOIN Tutor ON Tutor.tutor_id = TimeKeeper.tutor_id WHERE Tutor.sid = $sid AND logout BETWEEN '$this->start' AND '$this->end'";
		
		$result = $this->conn->query($sql);
		$json = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$json['Tutor'][] = array(
				'Login' =>$row['login'],
				'Logout' => $row['logout'],
				'Total' => $row['total'],
				'Type' => $row['center']
			); 
		}
		
		echo json_encode($json);
		
		$conn = null;
	}
}


?>