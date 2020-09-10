<?php

    header("Content-Type:application/json");
    require_once('twilio.php');
    
    $response = array();

    if(isset($_POST['phone'])) {

        require_once('config.php');

        $phone = $_POST['phone'];

        $SELECT = "SELECT `id`, `name`, `username`, `phone`, `password`, `date` FROM `users` WHERE `phone` = ? LIMIT 1";
        $stmt = $conn -> prepare($SELECT);
        $stmt->bind_param("s", $phone);

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
                
                // take current time
                $now = new DateTime('now', new DateTimeZone('Africa/Nairobi'));
                $regDate = $now -> format("Y-m-d H:i:s");


                $user_id = $id;
                $verification = rand(1000,9999);

                $to = "+25263". $phone;
                send_otp($to,$verification)

                $ISERT = "REPLACE INTO `verification`(`id`, `name`, `verification`, `date`) VALUES (?,?,?,?)";
                $inst = $connection -> prepare($ISERT);
                $inst->bind_param("ssss", $user_id, $name, $verification, $regDate);
                
                // if insertion is ok no problem
                if ($inst -> execute()) {
                    $response['error'] = false;
                    $response['reg_id'] = $user_id;
                    $response['message'] = "Verification Send successfully";
                }
                else {
                    $response['error'] = true;
                    $response['message'] = "ERROR: Unable to generate verification code" . mysqli_error($connection);
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