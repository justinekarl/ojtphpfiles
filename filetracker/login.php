<?php

require_once 'db_config.php';

$response = array();

// check for required fields
error_log("login");
if (isset($_POST['user_name']) && isset($_POST['password'])) {
    error_log("log in -".$_POST['user_name']."-".$_POST['password']);

    $user_name = $_POST['user_name'];
    $password = $_POST['password'];


    require_once __DIR__ . '/db_connect.php';
    $db = new DB_CONNECT();


    $query = "SELECT * FROM agent where deleted = 0 and user_name='".$user_name."' and password ='".$password."'";
    error_log($query);
    $result_checker = mysqli_query($link,$query);

    $checker  = 0;
    while($continents =mysqli_fetch_assoc($result_checker)){
        $checker  = 1;
        foreach($continents  as $key => $value){
            $response[$key] = $value;
        }
    }

    //transfer
    $result__transfer = mysqli_query($link,"select count(*) as transfer_count from transfer where not deleted and agent_from = ".$response['id_agent']);
    $transferCount = (int) mysqli_fetch_assoc($result__transfer)["transfer_count"];
    error_log("transfer count query = select count(*) as transfer_count from transfer where agent_from = ".$response['id_agent']);
    error_log("transfer count = ".$transferCount);
    if($transferCount != 0){



        $queryTransfer = "select concat('Item ', item ,'has been transfer \n\nfrom: ', agent_from.full_name, ' \nto: ', agent_to.full_name,'\n','Date:', date_created) as transfer_data "
            ." from transfer "
            ." left join agent as agent_from on transfer.agent_from = agent_from.id_agent "
            ." left join agent as agent_to on transfer.agent_to = agent_to.id_agent where not transfer.deleted and agent_from = ".$response['id_agent'];
        error_log($query);
        $result_transfer = mysqli_query($link,$queryTransfer);
       // error_log("transfer".json_encode(mysqli_fetch_row($result_transfer)));

        $data_transfer = [];
        while ($row=mysqli_fetch_row($result_transfer))
        {
            array_push($data_transfer, $row[0]);
        }
        error_log("transfer".json_encode($data_transfer));
        /*while($trans =mysqli_fetch_assoc($result_transfer)){
            foreach($trans  as $key => $value){
                $response[$key] = $value;
            }
        }*/

        $response["success"] = 2;
        $response["message"] = "Transfer Notification";
        $response["transfer_data"] = $data_transfer;
        error_log("transfer".json_encode($response));
        echo json_encode($response);

    }else{
        if($checker > 0){
            $response["success"] = 1;
            error_log(json_encode($response));
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["message"] = "User does not exists";
            error_log(json_encode($response));
            echo json_encode($response);
        }
    }


    //end of transfer





    // check if row inserted or not

} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";

    // echoing JSON response
    error_log(json_encode($response));
    echo json_encode($response);
}
?>
