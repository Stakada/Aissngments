<?php
	header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
    header("Pragma: no-cache"); //HTTP 1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
    include 'connection.php';
    $db = new DBclass();
    $conn = $db->connect();
    //connect to the database
    //$db = new DBclass();
    //$conn = $db->connect();

    if(isset($_GET['center'])){
		$center = $_GET['center'];
	}

	if($center == "Writing" or $center == "Navigator"){
			$sql="SELECT `session_id`, `Place`, `Number`, `Subject`, `Status`, Tutor.username 
				  FROM `Session` 
				  JOIN Tutor ON Session.tutor_id = Tutor.tutor_id 
				  WHERE Status != 'END' AND Center = '$center' 
				  ORDER BY session_id";
			$result = $conn->query($sql);
			$json = array();
			
			while($row = $result->fetch(PDO::FETCH_ASSOC)){
			
        		$json[] = $row;
		
    		}

    		foreach($json as $row){
				$id = $row['session_id'];
				$name = str_replace('@seattlecolleges.edu', '',$row['username']);
				$dotPos = strpos($name,".");
				$FirstName = substr($name, 0, $dotPos);
				$LastName = substr($name, $dotPos+1);
				
				//$color = $row['color'];
				echo "<div style='margin:10px 0px'>"
					.'<p id="status" class="font-weight-bold mr-4 d-inline" font-size:15px;">'.
					$row['Status'] .'</p>'
					."<li id='request' class=" . $id . " style='display:inline-block'>". $row['Place'] 
				   . ' ' .$row['Number'] . ' : '. $row['Subject'] ."<p class='d-inline font-weight-bold ml-3'> Requested Tutor : </p>" . $FirstName .' '. $LastName 
				   . "</li>"
				   //END button
				   . "<button id='$id' type='button' class='btn btn-outline-success d-inline' style='margin:1%;margin-right:100px;float:right;font-size:1vw'>END</button>"

				   //START button     
				   . "<button id='$id' type='button' class='btn btn-outline-primary d-inline' style='margin:1%;float:right;font-size:1vw'>START</button>"
				   . "</div>";
			}
			
	}else{




		//when center is not Writing

		$sql = "SELECT * FROM Session WHERE Status != 'END' AND Center = '$center' ORDER BY session_id";
		$result = $conn->query($sql);
		$json = array();

		while($row = $result->fetch(PDO::FETCH_ASSOC)){

			$json[] = $row;

		}

		foreach($json as $row){
			$id = $row['session_id'];
			//$color = $row['color'];
			echo "<div style='margin:10px 0px'>"
				.'<p id="status" class="font-weight-bold mr-4" style="display:inline-block; font-size:15px;">'.
				$row['Status'] .'</p>'
				."<li id='request'"
			   ."class=$id"
			   . "style='color:black; style='display:inline-block'>". $row['Place'] 
			   . ' ' .$row['Number'] . ' : '. $row['Subject'] 
			   . "</li>"
			   //Complete button
			   . "<button id='$id' type='button' class='btn btn-outline-success' style='margin:1%;margin-right:100px;float:right;display:inline-block;font-size:1vw'>END</button>"

			   //faile button     
			   . "<button id='$id' type='button' class='btn btn-outline-danger' style='margin:1%;float:right;display:inline-block;font-size:1vw'>HOLD</button>"

			   //progress button     
			   . "<button id='$id' type='button' class='btn btn-outline-primary' style='margin:1%;float:right;display:inline-block;font-size:1vw'>START</button>"
			   . "</div>";
		}
	}

    //echo json_encode($json);
    $conn=null;
?>