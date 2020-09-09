<?php

    header("Content-Type:application/json");

    $response = array();

    if(isset($_POST['username'], $_POST['pass'])) {

        require_once('config.php');

        $username = $_POST['username'];
        $password = md5($_POST['pass']);

        $SELECT = "SELECT `id`, `username` FROM `users` WHERE username = ? AND password = ? LIMIT 1";
        $stmt = $conn -> prepare($SELECT);
        $stmt->bind_param("ss", $username,$password);

        $stmt->execute();

        $stmt->store_result();

        // if username or password is wrong
        if($stmt->num_rows === 0)
        {   
            $response['error'] = true;
            $response['message'] = "Username or password is wrong";
        }
        else {

             // initialize selected columns to vairable in order to access data
             $stmt->bind_result($id, $username);
            
             // fetch data
             $stmt->fetch();

             $SELECT = "SELECT `activated` FROM `activation` WHERE `id`=? ";
             $show = $conn -> prepare($SELECT);
             $show->bind_param("s", $id);
     
             $show->execute();
     
             $show->store_result();
     
             // if username or password is wrong
             if($show->num_rows === 0) {
                $response['error'] = true;
                $response['id'] = $id;
                $response['message'] = "This user not activated";    
             }   
             else {
                
                // start session
                session_start();
                
                $_SESSION['id'] = $id;
                $_SESSION['username'] = $username;

                $response['error'] = false;
                $response['message'] = "Login is successfull ";
             }  

   

        }

    }
    
    else{

        $response['error'] = true;
        $response['message'] = "Invalid request";
    }

    $json_response = json_encode($response);
    echo $json_response;
    
?>