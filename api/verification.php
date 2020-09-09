<?php

    header("Content-Type:application/json");

    $response = array();

    if(isset($_POST['id'], $_POST['verification'])) {

        require_once('config.php');

        $id = $_POST['id'];
        $verification = $_POST['verification'];

        $SELECT = "SELECT `name`, `date` FROM `verification` WHERE `id` = ? AND `verification` = ? LIMIT 1";
        $stmt = $conn -> prepare($SELECT);
        $stmt->bind_param("ss", $id, $verification);

        $stmt->execute();

        $stmt->store_result();

        // if username or password is wrong
        if($stmt->num_rows === 0)
        {   
            $response['error'] = true;
            $response['message'] = "Verification code is wrong";
        }
        else {

            // initialize selected columns to vairable in order to access data
            $stmt->bind_result($id, $username);
            
            // fetch data
            $stmt->fetch();

            $response['error'] = false;
            $response['message'] = "verified successfully";
        }
        
    }
    
    else{

        $response['error'] = true;
        $response['message'] = "Invalid request";
    }

    $json_response = json_encode($response);
    echo $json_response;
    
?>