<?php

require_once 'db_config.php';
$response = array();

error_log("get student notif list");
if (isset($_POST['agentid'])) {
    $agent_id = $_POST['agentid'];
    

    $sectionQuery = "SELECT section_id FROM user WHERE id = '$agent_id' ";
    $queryResults = mysqli_fetch_all(mysqli_query($link,$sectionQuery));

    error_log($sectionQuery);

	$conn = new mysqli($host, $username, $password, $db_name,$port);


	$checker= 0;
    if ($result = $conn->query($sectionQuery)) {
        while ($row = $result->fetch_assoc()) {
            $checker = $checker+1;
            
                foreach($row  as $key => $value){
                    $response[$key] = $value;
                }
         }
        $result->free();
    }

    $queryOjt = " SELECT CONCAT('date_created~',COALESCE(CAST(log_date_created as date),'')),CONCAT('message~',COALESCE(message,'')) FROM student_notif WHERE user_id = (SELECT id FROM resume_details WHERE user_id = '$agent_id') ORDER BY log_date_created DESC ";


	 $items = [];
     error_log($queryOjt);

      $queryResults = mysqli_fetch_all(mysqli_query($link,$queryOjt));

       if(sizeof($queryResults) > 0){
	        for ($ctr = 0; $ctr < sizeof($queryResults); $ctr++){
	            array_push($items, $queryResults[$ctr]);
	        }
       }

         error_log("xxx------>".json_encode($items)."<------");
	    if(sizeof($items) > 0){
	        $response["success"] = 1;
	        $response["message_notif"] = $items;
	        error_log(json_encode($response));
	        echo json_encode($response);
	    }else {
	        $response["success"] = 0;
	        $response["message_notif"] = "";
	        echo json_encode($response);
	    }

}


?>