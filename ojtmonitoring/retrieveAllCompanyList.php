<?php

require_once 'db_config.php';
$response = array();

error_log("get company list");
if (isset($_POST['agentid'])) {
    $agent_id = $_POST['agentid'];
    //if($agent_id =='all'){


    $hasCreatedResume = "SELECT count(*) cnt FROM resume_details WHERE user_id = ".$agent_id;

    $result_checker = mysqli_query($link,$hasCreatedResume);
    $checker = (int) mysqli_fetch_assoc($result_checker)["cnt"]; 

    $response["has_resume"] = $checker;


     $countSelectedCompanyQry = "SELECT count(*) cnt FROM student_company_selected WHERE user_id = {$agent_id}";
     $result_check = mysqli_query($link,$countSelectedCompanyQry);
     $selectedCount = (int) mysqli_fetch_assoc($result_check)["cnt"];
     $response["selected_company_count"] = $selectedCount;


       $query = "select concat('id~',b.id),concat('company_name~',coalesce(name,'')),Concat('address~',coalesce(address,'')),Concat('phone_number~',coalesce(phonenumber,'')),Concat('company_type~',coalesce(department,'')),concat('description~', coalesce(description,'')),concat('moa_certified,', CASE WHEN moa_certified = 1 THEN 'Yes' ELSE 'NO' END),concat('will_provide_allowance,',case when does_provide_allowance = 1 THEN 'Yes' ELSE 'NO' END),CONCAT('allowance,',coalesce(allowance,'')),concat('ojt_needed,',coalesce(ojt_number,'')),concat('college_needed,' ,coalesce(b.college,'')),concat('selected~',(c.id is not null and c.id > 0)),concat('accepted~',(d.id is not null and d.id > 0)),concat('rating~',a.rating) from user a left join company_profile b on a.id = b.user_id 
            left join student_company_selected c ON c.company_id = b.id AND c.user_id = '".$agent_id."'
            left join company_ojt d ON d.user_id = c.user_id AND d.company_id = a.id

       where accounttype = 3 and a.id IN (SELECT company_id FROM company_course_to_accept WHERE course_id IN (SELECT id FROM course_look_up WHERE name IN (SELECT trim(course) FROM user where id = '".$agent_id."')))
            ORDER BY a.rating DESC

       ";


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