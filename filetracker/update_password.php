<?php
require_once 'db_config.php';
$response = array();

error_log("update password");
if(isset($_POST['new_password']) && isset($_POST['old_password'])){
	
	
	error_log("update password - ".$_POST['new_password']." - ".$_POST['old_password']);
	
	$conn = new mysqli($host, $username, $password, $db_name,$port);
		
	$query = "select count(password) as checker from password where password = '".$_POST['old_password']."'";
	error_log($query);
	
	$checker= 0;
	if ($result = $conn->query($query)) {
		while ($row = $result->fetch_assoc()) {
			$checker = (int)$row['checker'];
		}
		$result->free();
	}
	
	if($checker > 0){
		$sql = "update password set password ='".$_POST['new_password']."'";
		error_log($sql);
		$conn->query($sql);
		$response['success'] = 'Updated';
	}else{
		$response['success'] = 'Incorrect Old Password';
	}
	error_log(json_encode($response));
	echo json_encode($response);
	
}else{
	$response['success'] = 'Update Failed';
	echo json_encode($response);
}

?>