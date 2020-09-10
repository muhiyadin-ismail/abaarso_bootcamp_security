<?php


    header("Content-Type:application/json");
    require_once('twilio.php');

    $response = array();

    if(isset($_POST['name'], $_POST['username'], $_POST['phone'], $_POST['pass'])) {

        require_once('config.php');

        // take current time
        $now = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
        $regDate = $now -> format("Y-m-d H:i:s");

        $name = $_POST['name'];
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $password = md5($_POST['pass']);

        $INSERT = "INSERT INTO `users`(`name`, `username`, `phone`, `password`, `date`) VALUES (?,?,?,?,?)";
        $stmt = $conn -> prepare($INSERT);
        $stmt->bind_param("sssss", $name, $username, $phone, $password, $regDate);
        
        // if insertion is ok no problem
        if ($stmt -> execute()) {

            $user_id = $conn->insert_id;
            $verification = rand(1000,9999);

            send_otp($verification);

            $ISERT = "REPLACE INTO `verification`(`id`, `name`, `verification`, `date`) VALUES (?,?,?,?)";
            $inst = $connection -> prepare($ISERT);
            $inst->bind_param("ssss", $user_id, $name, $verification, $regDate);
            
            // if insertion is ok no problem
            if ($inst -> execute()) {
                $response['error'] = false;
                $response['reg_id'] = $user_id;
                $response['message'] = "User registered successfully ID: " . $user_id;
            }
            else {
                $response['error'] = true;
                $response['message'] = "ERROR: User registered but unable to generate verification code";
            }

            
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