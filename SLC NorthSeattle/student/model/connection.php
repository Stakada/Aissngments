<?php
class DBclass{
    //devlare log in information
    private $servername = "";
    private $username = "";
    private $password = "";
    private $dbname = "";

    //connection variable
    private $conn;

    //connect to the database
    public function connect(){
        $this->conn = null;
        
        try{
            $conn = new PDO("mysql:host=". $this->servername.";dbname=".$this->dbname,$this->username,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo 'connected';
        }catch(PDOException $exception){
            echo "Error: ".$exception->getMessage();
        }
        return $conn;
    }
}

?>


