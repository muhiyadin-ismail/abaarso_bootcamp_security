<?php

    header("Content-Type:application/json");

    $response = array();

    if(isset($_POST['pass'])) {

        require_once('config.php');

        $id = $_POST['id'];
        $pass = md5($_POST['pass']);

        $ISERT = "UPDATE `users` SET `password`=? WHERE `id`=?";
        $inst = $connection -> prepare($ISERT);
        $inst->bind_param("ss", $pass, $id);
        
        // if insertion is ok no problem
        if ($inst -> execute()) {

            // start session
            session_start();

            $_SESSION['id'] = $id;
            $_SESSION['username'] = "";

                            
            $response['error'] = false;
            $response['message'] = "Password changed successfully ";

        }
        else {
            $response['error'] = true;
            $response['message'] = "ERROR: Unable to change password PLEASE TRY AGAIN LATER";
        } 

    }
    
    else{

        $response['error'] = true;
        $response['message'] = "Invalid request";
    }

    $json_response = json_encode($response);
    echo $json_response;
    
?>