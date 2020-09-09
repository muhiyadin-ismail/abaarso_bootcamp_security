<?php


    header("Content-Type:application/json");

    $response = array();

    if(isset($_POST['id'])) {

        require_once('config.php');

        $id = $_POST['id'];
        
        $INSERT = "REPLACE INTO `activation`(`id`, `activated`) VALUES (?,true)";
        $stmt = $conn -> prepare($INSERT);
        $stmt->bind_param("s", $id);
        
        // if insertion is ok no problem
        if ($stmt -> execute()) {

            // start session
            session_start();

            $_SESSION['id'] = $id;
            $_SESSION['username'] = "";

                            
            $response['error'] = false;
            $response['message'] = "User activated successfully ID: " . $id;
        }
        else {
            
            $response['error'] = true;
            $response['message'] = "ERROR: " . mysqli_error($conn) ;
        }
            
        

    }
    
    else{

        $response['error'] = true;
        $response['message'] = "Invalid request";
    }

    $json_response = json_encode($response);
    echo $json_response;

?>