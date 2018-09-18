<?php
class Student{
    private $username;
    private $sid;
    private $student_id;
    private $conn;
    public function __construct($username, $sid, $conn){
        $this->username = $username;
        $this->sid = $sid;
        $this->conn = $conn;
    }
    
    public function checkStudent(){
        $sql = "SELECT * FROM `Students` 
                WHERE `Username` = '$this->username' AND 
                `SID` = '$this->sid'";
        $result = $this->conn->query($sql);
        if($result -> rowCount() == 1){
            return true;
        }
        return false;
    }
    
    public function checkUsername(){
        $sql = "SELECT * FROM Students 
				WHERE Username = '$this->username'";
        $result = $this->conn->query($sql);
        //$this->conn = null;
        if($result-> rowCount() == 1){
            return true;
        }
        return false;   
    }
    
    
    public function checkSID(){
        $sql = "SELECT * FROM Students WHERE SID = '$this->sid'";
        $result = $this->conn->query($sql);
        //$this->conn = null;
        if($result-> rowCount() == 1){
            return true;
        }
        return false;
    }
    
    
    public function signUp(){
        $sql = "INSERT INTO `Students`(`Username`, `SID`) VALUES ('$this->username','$this->sid')";
        $result = $this->conn->query($sql);
        //$this->conn = null;
        if($result){
            return true;
        }
        return false;
    }
    

    public function getUsername(){
        $sql = "SELECT `Username` FROM `Students` WHERE `SID` = $this->sid";
        $result = $this->conn->prepare($sql);
        $result->execute();
		
		$username = $result->fetchColumn(0);
		
        if($result->rowCount() == 0){
            return 'false';
        }else{
        	return $username;
		}
    }
	
	public function signIn(){
		$sql = "SELECT `student_id` FROM `Students` WHERE `SID` = $this->sid";
		$result=$this->conn->query($sql);
		
		$student_id = $result->fetchColumn(0);
		
		if($result->rowCount(0) == 0){
			return 'false';
		}else{
			return $student_id;
		}
	}
    
}
?>