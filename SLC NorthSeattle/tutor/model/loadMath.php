<?php

//set headers to NOT cache a page
    header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    
    include 'connection.php';
    
    $db = new DBclass();
    $conn = $db->connect();
     
    $sql = "SELECT * FROM `Session`";
    $result = $conn->query($sql);//result = mysqli_query($conn, $sql);
    echo "count: ".$result->rowCount();
    $json = array();
        
        // output data of each row
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $json[] = $row;
        }
    foreach($json as $row){
        $id = $row['ID'];
        echo "<div style='margin:20px 0px'>"
            ."<li id='request'"
           ."class=$id "
           . "style='color:black; display:inline-block'>". $row['Place'] 
           . ' ' .$row['Number'] . ' : '. $row['Subject'] 
           . "</li>"
           //Complete button
           . "<button id='done' type='button' class='btn btn-outline-success' style='margin:1%;margin-right:100px;float:right;display:inline-block;font-size:1vw'>"
                . "Complete"
           . "</button>"
           
           //faile button     
           . "<button id='fail' type='button' class='btn btn-outline-danger' style='margin:1%;float:right;display:inline-block;font-size:1vw'>Failed</button>"
            
           //progress button     
           . "<button id='progress' type='button' class='btn btn-outline-primary' style='margin:1%;float:right;display:inline-block;font-size:1vw'>Progress</button>"
           . "</div>";
    }
        
        
    //echo json_encode($json);
    $conn=null;
    
?>