<?php
class Notification{
	private $conn;
	
	public function __construct($conn){
		$this->conn = $conn;
	}
	
	public function loadNotification(){
		$sql = "SELECT * FROM Notification";
		$result = $this->conn->query($sql);
		$json = array();
		while($row = $result->fetch(PDO::FETCH_ASSOC)){

			$json['Notification'][] = array(
				'notif_id' => $row['notif_id'],
				'notification'=>$row['notification']
			);
		}

		echo json_encode($json);

		$conn = null;
	}
	
	public function addNotification($notif){
		$sql = "INSERT INTO `Notification`(`notification`) VALUES ('$notif')";
		$result = $this->conn->query($sql);
		if($result){
			return true;
		}
		return false;
	}
	
	public function deleteNotification($notif_id){
		$sql = "DELETE FROM `Notification` WHERE `notif_id`= $notif_id";
		$result = $this->conn->query($sql);
		if($result){
			return true;
		}
		return false;
	}


}
?>