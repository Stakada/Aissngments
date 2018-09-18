<?php  
    include 'connection.php';
    include 'server.php';
    //create database object
    $db = new DBclass();
    $conn = $db->connect();
    
    if(isset($_POST['username']) && isset($_POST['sid'])){
        $username = $_POST['username'];
        $sid = $_POST['sid'];
        //create server object
        $server = new Server($username, $sid, $conn);
    }

    if($server->checkUsername() && $server->checkSID()){
        //login success
        if(!$server->getID()){
            echo false; 
        }else{
            //$id = $server->getID();
            echo $server->getID();   
        }
    }else{
        echo false;
    }
    $conn = null;
/*$res = array();
//if($this->username != null && $this->sid != null){
$sql="SELECT * FROM Students WHERE Username = '$username' AND SID = '$sid' ";
$result = $conn->query($sql);
if($result->rowCount() > 0){
    $res['status'] = "loggedin";
    $res['id'] = $row['id'];
    $res['username'] = $row['Username'];
    $res['sid']=$row['SID'];
}else{
    $res['status'] = "error";
}
echo json_encode($res);
$conn = null;*/
?>