<?php

require_once 'db_config.php';
$response = array();

error_log("Saving selected student section id-".$_POST['agentId']);
if (isset($_POST['agentId'])) {
	
	$sectionName = $_POST['sectionName'];

	$sql = "update user set section ='".$_POST['sectionName']."', section_id = (SELECT id FROM section WHERE section_name = '".$_POST['sectionName']."' ) where id = ".$_POST['agentId'];

	error_log($sql);

	 $result=mysqli_query($link,
                $sql);

	 error_log("update student section ".print_r($result,true));
 	 $response['success'] = 1;
}else{
	 $response['success'] = 0;
}

echo json_encode($response);

?>