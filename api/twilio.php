<?php

    function send_otp($body) {
            
            $to = '+252634778031';
            $from = '+18647744641';
            // $body = '444';

            $id = 'ACaafe90ba7cae78522a4d8474094be247';
            $token = '97fd301ce92bf14442b6d2b1e5cb3712';
            //extract data from the post
            //set POST variables
            $url = 'https://api.twilio.com/2010-04-01/Accounts/ACaafe90ba7cae78522a4d8474094be247/Messages.json';
            $fields = array(
                'To' => urlencode($to),
                'From' => urlencode($from),
                'Body' => urlencode($body)
            );

            $fields_string = "";

            //url-ify the data for the POST
            foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
            rtrim($fields_string, '&');

            //open connection
            $ch = curl_init();

            //set the url, number of POST vars, POST data
            curl_setopt($ch,CURLOPT_URL, $url);
            curl_setopt($ch,CURLOPT_POST, count($fields));
            curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($ch, CURLOPT_USERPWD, "$id:$token");

            //execute post
            $result = curl_exec($ch);

            //close connection
            // curl_close($ch);
    }
    

?>