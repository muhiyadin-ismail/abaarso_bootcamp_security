<?php


    header("Content-Type:application/json");

    $response = array();

    if(isset($_POST['id'],$_POST['title'], $_POST['body'])) {

        require_once('config.php');

        // take current time
        $now = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
        $regDate = $now -> format("Y-m-d H:i:s");

        $id = $_POST['id'];
        $title = $_POST['title'];
        $body = $_POST['body'];

        $INSERT = "INSERT INTO `note`(`user`,`title`, `body`, `date`) VALUES (?,?,?,?)";
        $stmt = $conn -> prepare($INSERT);
        $stmt->bind_param("ssss", $id, $title, $body, $regDate);
        
        // if insertion is ok no problem
        if ($stmt -> execute()) {
            $response['error'] = false;
            $response['message'] = "Note registered successfully ID: " . $conn->insert_id;
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