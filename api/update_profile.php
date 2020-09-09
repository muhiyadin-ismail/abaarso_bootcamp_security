<?php


    header("Content-Type:application/json");

    $response = array();

    if(isset($_POST['name'], $_POST['username'], $_POST['phone'], $_POST['pass'])) {

        require_once('config.php');

        // take current time
        $now = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
        $regDate = $now -> format("Y-m-d H:i:s");

        $id = $_POST['id'];
        $name = $_POST['name'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];

        if($_POST['pass'] === "password") {
            $UPDATE = "UPDATE `users` SET `name`=?,`username`=?,`phone`=? WHERE `id`=?";
            $stmt = $conn -> prepare($UPDATE);
            $stmt->bind_param("ssss", $name, $username, $phone, $id);
        }
        else {
            $password = md5($_POST['pass']);
            
            $UPDATE = "UPDATE `users` SET `name`=?,`username`=?,`phone`=?, `password`=? WHERE `id`=?";
            $stmt = $conn -> prepare($UPDATE);
            $stmt->bind_param("sssss", $name, $username, $phone, $password, $id);
        }
        
        // if updating profile is ok no problem
        if ($stmt -> execute()) {
            $response['error'] = false;
            $response['message'] = "User updated successfully ID: " . $id;
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