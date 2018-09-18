<?php
class Resource{
	private $conn;
	private	$start;
	private $end;
	
	public function __construct($conn, $start, $end){
		$this->conn = $conn;
		$this->start = $start;
		$this->end = $end;
	}
	
	public function getAccumReport(){
		$sql="SELECT Subject, COUNT(Subject) AS 'Access', SEC_TO_TIME(SUM(TIMESTAMPDIFF(Second, timeStart, timeEnd))) AS 'Total', Center 
			FROM Session JOIN SessionTime ON Session.session_id = SessionTime.session_id 
			WHERE timeEnd BETWEEN '$this->start' AND '$this->end'
			GROUP BY Subject";
		$result = $this->conn->query($sql);
		$json = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$json['Accum_Report'][] = array(
				'Subject' => $row['Subject'],
				'Center' => $row['Center'],
				'Access' => $row['Access'],
				'Total' => $row['Total']
			);
		}
		
		echo json_encode($json);
		
		$this->conn = null;
	}
	
	public function getAccumReportByCenter($req){
		$sql="SELECT Subject, COUNT(Subject) AS 'Access', SEC_TO_TIME(SUM(TIMESTAMPDIFF(Second, timeStart, timeEnd))) AS 'Total', Center
			FROM Session JOIN SessionTime ON Session.session_id = SessionTime.session_id 
			WHERE timeEnd BETWEEN '$this->start' AND '$this->end' AND Session.center = '$req'
			GROUP BY Subject";
		$result = $this->conn->query($sql);
		$json = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$json['Accum_Report'][] = array(
				'Subject' => $row['Subject'],
				'Center' => $row['Center'],
				'Access' => $row['Access'],
				'Total' => $row['Total']
			);
		}
		
		echo json_encode($json);
		
		$this->conn = null;
		
	}
	
	public function getDetailReportByCenter($center){
		$sql = "SELECT Center, Subject, timeStart, timeEnd FROM Session JOIN SessionTime ON Session.session_id = SessionTime.session_id WHERE timeEnd BETWEEN '$this->start' AND '$this->end' AND Session.center = '$center'";
		
		$result = $this->conn->query($sql);
		$json = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$json['Detail_Report'][] = array(
				'Center' => $row['Center'],
				'Subject' => $row['Subject'],
				'timeStart' => $row['timeStart'],
				'timeEnd' => $row['timeEnd']
			);
		}
		
		echo json_encode($json);
		
		$this->conn = null;
	
	}
}



?>