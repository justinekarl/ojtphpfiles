<?php
require_once 'db_config.php';
$response = array();

error_log("search===");
error_log($_POST['keyword'].': discriminator -> '.$_POST['discriminator'].':'.$_POST['admin'].':'.$_POST['agent_id']);
error_log("===search");
if (isset($_POST['discriminator']) && isset($_POST['keyword'])) {
	
	$discriminator = $_POST['discriminator'];
	$keyword = $_POST['keyword'];
	$isAdmin = $_POST['admin'];
	$agentId = $_POST['agent_id'];
	
	if($discriminator == 'searchLogs'){
		$query =" SELECT * FROM transaction_logs LEFT JOIN agent ON agent.id_agent = transaction_logs.agent_id ";
		
		if(isset($_POST['all_log'])){
            if(isset($_POST['user'])){
                $query .=" WHERE (item LIKE '%".$keyword."%' and transaction_logs.agent_id = ".$agentId.") or (agent.full_name LIKE '%".$keyword."%' and transaction_logs.agent_id = ".$agentId.") ORDER BY date_created DESC";
            }else{
                $query .=" WHERE (item LIKE '%".$keyword."%') or (agent.full_name LIKE '%".$keyword."%')  ORDER BY date_created DESC";
            }

		}else{
			$query .=" WHERE (item LIKE '%".$keyword."%') or (agent.full_name LIKE '%".$keyword."%')  and not transaction_logs.deleted ORDER BY date_created DESC";
		}
		error_log($query);
		$items = array();
		$result = mysqli_query($link,$query);
		while($continents =mysqli_fetch_assoc($result)){
			$transactionLogs = array();
			foreach($continents  as $key => $value){
				array_push($transactionLogs, array($key => $value));
			}
			array_push($items, $transactionLogs);
		}
		
		if(sizeof($items) > 0){
			$response["success"] = 1;
			$response["data_needed"] = $items;
		//	error_log(json_encode($response));
			echo json_encode($response);
		}
		
		else {
			$response["success"] = 0;
			$response["data_needed"] = "None";
			echo json_encode($response);
		}
		
	}	
	else if ($discriminator == 'searchUsers'){
		$response = array();
		$query =" SELECT id_agent,user_name,password,student_number,full_name,admin,borrowed.not_clear,borrowed.not_clear FROM agent ";
		$query .=" left join (select agent_id,count(borrowed.agent_id) > 0 as not_clear from borrowed group by borrowed.agent_id) as borrowed on agent.id_agent = borrowed.agent_id ";
		$query .=" WHERE (full_name LIKE '%".$keyword."%') and admin = 0 and deleted = 0";
		$query .=" order by full_name ASC ";
		$items = array();
		$result = mysqli_query($link,$query);
		while($continents =mysqli_fetch_assoc($result)){
			$transactionLogs = array();
			foreach($continents  as $key => $value){
				array_push($transactionLogs, array($key => $value));
			}
			array_push($items, $transactionLogs);
		}
		
		error_log("7------>".json_encode($items)."<------");
		if(sizeof($items) > 0){
			$response["success"] = 1;
			$response["data_needed"] = $items;
			error_log(json_encode($response));
			echo json_encode($response);
		}
		
		else {
			$response["success"] = 0;
			$response["data_needed"] = "None";
			echo json_encode($response);
		}
	}
	
	else if ($discriminator == 'searchBorrowed'){
		//a:searchBorrowed:true:5
		$response = array();
		if($isAdmin == 'true' || true){
			$query = "SELECT concat('ITEM: ',borrowed.item,'\n','Borrower: ',agent.full_name,'\n','Date Borrowed: ',DATE_FORMAT(borrowed.date_created,'%m-%d-%y %r')) as item ";
			$query .=" FROM borrowed ";
			$query .=" left join agent on agent.id_agent = borrowed.agent_id ";
			$query .=" WHERE (item LIKE '%".$keyword."%') or (agent.full_name LIKE '%".$keyword."%') order by date_created desc ";
		}else{
			$query = "SELECT concat(item,'\n','Date Borrowed: ', DATE_FORMAT(borrowed.date_created,'%m-%d-%y %r')) as item FROM borrowed where agent_id=".$agentId." and (item LIKE '%".$keyword."%') order by date_created desc";
		} 
		error_log($query);
		$items = [];
		$itemResults = mysqli_fetch_all(mysqli_query($link,$query));
		if(sizeof($itemResults) > 0){
			for ($ctr = 0; $ctr < sizeof($itemResults); $ctr++){
				array_push($items, $itemResults[$ctr][0]);
			}
		}
		
		if(sizeof($items) > 0){
			$response["success"] = 1;
			$response["data_needed"] = $items;
			error_log(json_encode($response));
			echo json_encode($response);
		}else {		
		$response["success"] = 0;
		$response["data_needed"] = "None";
		echo json_encode($response);
		}
	}else if ($discriminator == 'searchReturned'){
		$response = array();
		if($isAdmin == 'true'){
			$query = "SELECT concat('ITEM: ',returned.item,'\n','Borrower: ',agent.full_name,'\n','Date returned: ',DATE_FORMAT(returned.date_created,'%m-%d-%y %r')) as item ";
			$query .=" FROM returned ";
			$query .=" left join agent on agent.id_agent = returned.agent_id ";
			$query .=" WHERE (item LIKE '%".$keyword."%') order by date_created desc ";
		}else{
			$query = "SELECT concat(item,'\n','Date returned: ', DATE_FORMAT(returned.date_created,'%m-%d-%y %r')) as item FROM returned where agent_id=".$agentId." and (item LIKE '%".$keyword."%') order by date_created desc";
		}
		error_log($query);
		$items = [];
		$itemResults = mysqli_fetch_all(mysqli_query($link,$query));
		if(sizeof($itemResults) > 0){
			for ($ctr = 0; $ctr < sizeof($itemResults); $ctr++){
				array_push($items, $itemResults[$ctr][0]);
			}
		}
		
		if(sizeof($items) > 0){
			$response["success"] = 1;
			$response["data_needed"] = $items;
			error_log(json_encode($response));
			echo json_encode($response);
		}else {
			$response["success"] = 0;
			$response["data_needed"] = "None";
			echo json_encode($response);
		}
	}else if($discriminator == "searchQr"){
		
		$response = array();
		$query = "select * from qr_codes WHERE (item LIKE '%".$keyword."%') order by id_qr_codes desc";
		
		$items = array();
		$result = mysqli_query($link,$query);
		
		while($continents =mysqli_fetch_assoc($result)){
			$transactionLogs = array();
			foreach($continents  as $key => $value){
				array_push($transactionLogs, array($key => $value));
			}
			array_push($items, $transactionLogs);
		}
		error_log("4------>".json_encode($items)."<------");
		if(sizeof($items) > 0){
			$response["success"] = 1;
			$response["data_needed"] = $items;
			error_log(json_encode($response));
			echo json_encode($response);
		}
		
		else {
			$response["success"] = 0;
			$response["data_needed"] = "None";
			echo json_encode($response);
		}
		
	}
	
	
}


?>