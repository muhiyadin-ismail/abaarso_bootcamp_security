<?php


    header("Content-Type:application/json");

    $response = array();

    if(isset($_POST['id'])) {

        require_once('config.php');

        // take current time
        $now = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
        $regDate = $now -> format("Y-m-d H:i:s");

        $id = $_POST['id'];

        $DELETE = "DELETE FROM `note` WHERE `id` = ?";
        $stmt = $conn -> prepare($DELETE);
        $stmt->bind_param("s", $id);
        
        // if insertion is ok no problem
        if ($stmt -> execute()) {
            $response['error'] = false;
            $response['message'] = "Note : ". $id ." deleted successfully ";
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