<?php

    header("Content-Type:application/json");

    // start session
    // session_start();

    $response = array();

    // if(!isset($_SESSION['username'])) {
    //     $response['error'] = true;
    //     $response['message'] = "Invalid request";
    // }
    // else {

        if(isset($_POST['id'])) {

            require_once('config.php');

            $id = $_POST['id'];

            $SELECT = "SELECT `id`, `name`, `username`,`phone`,`password`,`date` FROM `users` WHERE id = ? LIMIT 1";
            $stmt = $conn -> prepare($SELECT);
            $stmt->bind_param("s", $id);

            $stmt->execute();

            $stmt->store_result();

            // if username or password is wrong
            if($stmt->num_rows === 0)
            {   
                $response['error'] = true;
                $response['message'] = "This user doesn't exist";
            }
            else {

                // initialize selected columns to vairable in order to access data
                $stmt->bind_result($id, $name, $username, $phone, $password, $date);
                
                // fetch data
                $stmt->fetch();

                $response['error'] = false;
                $response['message'] = "Profile catched successfully";

                $response['id'] = $id;
                $response['name'] = $name;
                $response['username'] = $username;
                $response['phone'] = $phone;
                $response['password'] = $password;
                $response['date'] = $date;

            }

        }
        
        else{

            $response['error'] = true;
            $response['message'] = "Invalid request";
        }

    // }

    $json_response = json_encode($response);
    echo $json_response;

?>