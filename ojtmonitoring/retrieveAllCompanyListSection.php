<?php

require_once 'db_config.php';
$response = array();

error_log("get company list ALL");
if (isset($_POST['agentid'])) {
    $agent_id = $_POST['agentid'];
    //if($agent_id =='all'){


       $query = "select concat('id~',a.id),concat('company_name~',coalesce(name,'')),Concat('address~',coalesce(address,'')),Concat('phone_number~',coalesce(phonenumber,'')),Concat('company_type~',coalesce(department,'')),concat('description~', coalesce(description,'')),concat('moa_certified,', CASE WHEN moa_certified = 1 THEN 'Yes' ELSE 'NO' END),concat('will_provide_allowance,',case when does_provide_allowance = 1 THEN 'Yes' ELSE 'NO' END),CONCAT('allowance,',coalesce(allowance,'')),concat('ojt_needed,',coalesce(ojt_number,'')),concat('college_needed,' ,coalesce(b.college,''))
       from user a 
        left join company_profile b on a.id = b.user_id 
       where accounttype = 3 
            

       ";

       //AND not exists (SELECT 1 from section WHERE company_id = user_id)


    $items = [];
    error_log($query);
    
    $itemResults = mysqli_fetch_all(mysqli_query($link,$query));



    if(sizeof($itemResults) > 0){
        for ($ctr = 0; $ctr < sizeof($itemResults); $ctr++){
            array_push($items, $itemResults[$ctr]);
        }
    }

    
    error_log("6------>".json_encode($items)."<------");
    if(sizeof($items) > 0 || $selectedCount > 0){
        $response["success"] = 1;
        $response["data_needed"] = $items;
        error_log(json_encode($response));
        echo json_encode($response);
    }else {
        $response["success"] = 0;
        $response["data_needed"] = "None";
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["data_needed"] = "None";
    echo json_encode($response);
}
?>