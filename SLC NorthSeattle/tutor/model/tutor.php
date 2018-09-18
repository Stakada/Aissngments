<?php
class Tutor{
    private $username;
    private $sid;
    private $student_id;
	private $center;
    private $conn;
	
    public function __construct($sid,$conn){
        $this->conn = $conn;
		$this->sid = $sid;
	}
    /* 
        Check the sid exists in the database.
        If so return true otherwise return false.
    */
    public function checkSid(){
        $sql = "SELECT * FROM Tutor WHERE SID = $this->sid";
        $result = $this->conn->query($sql);
        //$this->conn = null;
        if($result-> rowCount() == 1){
            return true;
        }else{
        	return 'false';
		}
    }
    
    
    /*
        Check if the information doesn't exist in the database.
        If no, insert the username and sid, otherwise return false.
    */
    public function signUp($username){
        $sql = "INSERT INTO `Tutor`(`Username`, `SID`) VALUES ('$username',$this->sid)";
        $result = $this->conn->query($sql);
        //$this->conn = null;
        if($result){
            return true;
        }else{
        	return 'false';
		}
    }
	
	
	public function signIn(){
		$id = $this->getTutor_Id();
		
		//check if this tutor is already logged in
		
		//tutor exists
		if($id != false){
			
			//tutor hasn't logged in yet
			if($this->getTk_id() == false){
				
				$sql = "INSERT INTO `TimeKeeper`(`tutor_id`,`center`) VALUES ($id, '$this->center')";

				$result = $this->conn->query($sql);

				if($result){
					return true;
				}
			}else{
				return 'loggedin';
			}
		
		}else{
			
			return 'false';
		}
	}
	
	
	/***********************
	*
	***********************/
	public function signOut(){
		
		$tutor_id = $this->getTutor_Id();
		
		if(!$tutor_id){
			
			return false;
			
		}else{
			
			$sql = "UPDATE TimeKeeper SET logout = NOW() WHERE tutor_id = $tutor_id";

			$result = $this->conn->query($sql);

			if($result){
				return true;
			}else{
				return 'false';	
			}
		}
	}
	
	public function signoutCustomeHour($time){
		$tk_id = $this->getTk_Id();
		
		//$signOut = new DateTime($this->getSigninTime());
		
		//echo $signOut->modify("+$time min");
		
		$timestamp = strtotime($this->getSigninTime());
		$signout = date("Y-m-d H:i:s", strtotime($this->getSigninTime() ."+".$time." minutes"));

		$sql = "UPDATE `TimeKeeper` SET `logout`='$signout' WHERE `tk_id` = $tk_id";
		
		$result = $this->conn->query($sql);
			
		if($result){
			return true;
		}else{
			return 'false';	
		}
		
	}
	
	/************************
    *
	* Return true if login hour is within 8 hours
    * 
	*************************/
	public function isSigninHourValid(){
		$sql ="SELECT TIMESTAMPDIFF(HOUR,login, NOW()) 'Login Time' FROM TimeKeeper JOIN Tutor ON Tutor.tutor_id = TimeKeeper.tutor_id WHERE TimeKeeper.logout IS NULL AND Tutor.sid = $this->sid";
		
		$result = $this->conn->query($sql);
		
		$loginHour = $result->fetchColumn(0);
		if($loginHour >= 8){
			return  'false';
		}
		
		return true; 
		
		
	}
	
	public function getSigninTime(){
		
		$sql ="SELECT `login`
				FROM `TimeKeeper` 
				JOIN Tutor ON TimeKeeper.tutor_id = Tutor.tutor_id
				WHERE Tutor.sid =  $this->sid AND 
					  logout IS NULL";
		
		$result = $this->conn->query($sql);
		$signIn = $result->fetchColumn(0);
		
		return $signIn; 
		
		
	}
    /************************
    *
	* Return tutor_id from tutor table based on given sid.
    * 
	*************************/
	
    private function getTutor_Id(){
		
        $sql = "SELECT `tutor_id` FROM `Tutor` WHERE `sid` = '$this->sid'";
        
		$result = $this->conn->prepare($sql);
        
		$result->execute();
        
		$id= $result->fetchColumn(0);
		
		if($result->rowCount() == 0){
            return false;
        }else{
			return $id;
		}
    }
	
	public function getUsername(){
		
		$sql = "SELECT `username` FROM `Tutor` WHERE `sid` = $this->sid";
		
		$result = $this->conn->prepare($sql);
		
		$result->execute();
				
		$username = $result->fetchColumn(0);
		
		if($result->rowCount() == 0){
			return 'false';
		}else{
			return $username;
		}
	}
	
	private function getTk_id(){
		$tutor_id = $this->getTutor_Id();
		
		$sql = "SELECT `tk_id` FROM `TimeKeeper` WHERE `logout` IS NULL AND `tutor_id` = $tutor_id";
		
		$result = $this->conn->query($sql);
		
		$result->execute();
		
		$tk_id= $result->fetchColumn(0);
		
		if($result->rowCount() == 0){
			return false;
		}else{
			return $tk_id; 
		}
	}
	
	public function setType($center){
		$this->center= $center;
	}
		
	public function setUsername($username){
		$this->$username = $username;
		return $this->username;
	}
	
	
}
?>