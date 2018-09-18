<?php
class Server{
    private $username;
    private $sid;
    private $student_id;
    private $conn;
    public function __construct($username, $sid, $conn){
        $this->username = $username;
        $this->sid = $sid;
        $this->conn = $conn;
    }
    
    public function checkStudent($student_id){
        $sql = "SELECT * FROM `Students` 
                WHERE `student_id` = '$student_id' AND 
                `Username` = '$this->username' AND 
                `SID` = '$this->sid'";
        $resut = $this->conn->query($sql);
        if($result -> rowCount() == 1){
            return true;
        }
        return false;
    }
    
    /*
        Check the username exists in the database.
        If so return true otherwise return false.
    */
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
    
    
    /* 
        Check the sid exists in the database.
        If so return true otherwise return false.
    */
    public function checkSID(){
        $sql = "SELECT * FROM Students WHERE SID = '$this->sid'";
        $result = $this->conn->query($sql);
        //$this->conn = null;
        if($result-> rowCount() == 1){
            return true;
        }
        return false;
    }
    
    
    /*
        Check if the information doesn't exist in the database.
        If no, insert the username and sid, otherwise return false.
    */
    public function signUp(){
        $sql = "INSERT INTO `Students`(`Username`, `SID`) VALUES ('$this->username','$this->sid')";
        $result = $this->conn->query($sql);
        //$this->conn = null;
        if($result){
            return true;
        }
        return false;
    }
    
    /*
        Return id of the user.
    */
    public function getId(){
        $sql = "SELECT `student_id` FROM `Students` WHERE `Username` = '$this->username' 
                AND `SID` = '$this->sid'";
        $result = $this->conn->prepare($sql);
        $result->execute();
        if($result->rowCount() == 0){
            return false;
        }
        $id= $result->fetchColumn(0);
        //$this->conn = null;
        //$id = $result['student_id'];
        return $id;
    }
    
}
?>