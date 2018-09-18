<?php
class DBclass{
    //devlare log in information
     private $servername = "localhost";
    private $username = "root";
    private $password = "W0rds2say";
    private $dbname = "slc";


    //connection variable
    private $conn;

    //connect to the database
    public function connect(){
        $this->conn = null;
        
        try{
            $conn = new PDO("mysql:host=". $this->servername.";dbname=".$this->dbname,$this->username,$this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $exception){
            echo "Error: ".$exception->getMessage();
        }
        return $conn;
    }
}

?>


