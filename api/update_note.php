<?php


    header("Content-Type:application/json");

    $response = array();

    if(isset($_POST['id'],$_POST['title'], $_POST['body'])) {

        require_once('config.php');

        $id = $_POST['id'];
        $title = $_POST['title'];
        $body = $_POST['body'];

        $INSERT = "UPDATE `note` SET `title`=?,`body`=? WHERE `id`=?";
        $stmt = $conn -> prepare($INSERT);
        $stmt->bind_param("sss", $title, $body, $id);
        
        // if insertion is ok no problem
        if ($stmt -> execute()) {
            $response['error'] = false;
            $response['message'] = "Note updated successfully ID: " . $conn->insert_id;
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