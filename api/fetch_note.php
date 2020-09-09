<?php

    header("Content-Type:application/json");

    $response = array();
    $data = array();
    $temp = array();

    if(isset($_POST['id'])) {

        require_once('config.php');

        $user_id = $_POST['id'];

        $SELECT = "SELECT `id`, `title`, `body`, `date` FROM `note` WHERE `user` = ?";
        $stmt = $conn -> prepare($SELECT);
        $stmt->bind_param("s", $user_id);

        $stmt->execute();

        $stmt->store_result();

        // if there is no data
        if($stmt->num_rows === 0)
        {   
            $response['error'] = true;
            $response['message'] = "You don't have notes";
        }
        else {

            // initialize selected columns to vairable in order to access data
            $stmt->bind_result($id, $title, $body, $date);
            
            $response['error'] = false;
            $response['message'] = "Note fetched successfully";
            
            // fetch data
            while($stmt->fetch()) {

                $temp['id'] = $id;
        	    $temp['title'] = $title;
                $temp['body'] = $body;
                $temp['date'] = $date;
                
        	    //Push the data to the array
                array_push($data,$temp);
            }

            // Data assign to response
            $response['data'] = $data;

        }

    }
    
    else{

        $response['error'] = true;
        $response['message'] = "Invalid request";
    }

    $json_response = json_encode($response);
    echo $json_response;
    
?>